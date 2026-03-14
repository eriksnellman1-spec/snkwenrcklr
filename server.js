const express = require('express');
const path = require('path');
const fs = require('fs');
const { execSync } = require('child_process');

const app = express();
const PORT = 3000;

const DOWNLOADS_DIR = path.join(process.env.HOME, 'Downloads');
const TRASH_DIR = path.join(process.env.HOME, '.local', 'share', 'Trash', 'files');

const IMAGE_EXTS = new Set(['.jpg', '.jpeg', '.png', '.gif', '.webp', '.bmp', '.svg', '.tiff', '.ico']);
const VIDEO_EXTS = new Set(['.mp4', '.webm', '.ogg', '.mov', '.avi', '.mkv', '.m4v', '.flv', '.wmv']);

function ensureDownloadsDir() {
  if (!fs.existsSync(DOWNLOADS_DIR)) {
    fs.mkdirSync(DOWNLOADS_DIR, { recursive: true });
  }
}

function getMediaFiles() {
  ensureDownloadsDir();
  const entries = fs.readdirSync(DOWNLOADS_DIR, { withFileTypes: true });
  return entries
    .filter(e => e.isFile())
    .map(e => {
      const ext = path.extname(e.name).toLowerCase();
      const type = IMAGE_EXTS.has(ext) ? 'image' : VIDEO_EXTS.has(ext) ? 'video' : null;
      if (!type) return null;
      const stat = fs.statSync(path.join(DOWNLOADS_DIR, e.name));
      return {
        name: e.name,
        type,
        size: stat.size,
        modified: stat.mtime,
      };
    })
    .filter(Boolean)
    .sort((a, b) => new Date(b.modified) - new Date(a.modified));
}

function moveToTrash(filename) {
  const filePath = path.join(DOWNLOADS_DIR, filename);
  if (!fs.existsSync(filePath)) {
    throw new Error('File not found');
  }
  // Prevent path traversal
  const resolved = path.resolve(filePath);
  if (!resolved.startsWith(path.resolve(DOWNLOADS_DIR))) {
    throw new Error('Invalid file path');
  }

  const safe = resolved.replace(/"/g, '\\"');
  const platform = process.platform;

  if (platform === 'darwin') {
    // macOS: use AppleScript to move to Trash (preserves Undo in Finder)
    execSync(`osascript -e 'tell app "Finder" to delete POSIX file "${safe}"'`, { stdio: 'pipe' });
  } else {
    // Linux: try gio, fall back to manual Trash
    try {
      execSync(`gio trash "${safe}"`, { stdio: 'pipe' });
    } catch {
      const trashDir = path.join(process.env.HOME, '.local', 'share', 'Trash', 'files');
      fs.mkdirSync(trashDir, { recursive: true });
      fs.renameSync(resolved, path.join(trashDir, filename));
    }
  }
}

// Static frontend
app.use(express.static(path.join(__dirname, 'public')));
app.use(express.json());

// List media files
app.get('/api/files', (req, res) => {
  try {
    const files = getMediaFiles();
    res.json({ files, downloadsDir: DOWNLOADS_DIR });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// Serve a file for preview
app.get('/api/preview/:filename', (req, res) => {
  const filename = req.params.filename;
  const filePath = path.join(DOWNLOADS_DIR, filename);
  const resolved = path.resolve(filePath);

  if (!resolved.startsWith(path.resolve(DOWNLOADS_DIR))) {
    return res.status(403).json({ error: 'Access denied' });
  }
  if (!fs.existsSync(resolved)) {
    return res.status(404).json({ error: 'File not found' });
  }
  res.sendFile(resolved);
});

// Delete (move to trash)
app.delete('/api/files/:filename', (req, res) => {
  try {
    moveToTrash(req.params.filename);
    res.json({ success: true });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

app.listen(PORT, () => {
  console.log(`Downloads Preview running at http://localhost:${PORT}`);
  console.log(`Watching: ${DOWNLOADS_DIR}`);
});
