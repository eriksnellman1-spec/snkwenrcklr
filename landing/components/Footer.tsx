export default function Footer() {
  return (
    <footer className="bg-gray-900 text-gray-400 py-10">
      <div className="mx-auto max-w-6xl px-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm">
        <p className="font-semibold text-white text-base">VVS Automation</p>
        <p>© {new Date().getFullYear()} VVS Automation. All rights reserved.</p>
        <div className="flex gap-6">
          <a href="#features" className="hover:text-white transition">
            Features
          </a>
          <a href="#contact" className="hover:text-white transition">
            Contact
          </a>
        </div>
      </div>
    </footer>
  );
}
