<?php
/**
 * Template Name: VVS Landing Page
 * Description: Landing page for The VVS Automation System
 */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VVS Automation System — Förvandla fler förfrågningar till bokade uppdrag</title>
  <meta name="description" content="VVS Automation System hjälper VVS-företag att automatisera leadkvalificering, bokning, uppföljning och kundåteraktivering — så att inget tillfälle går förlorat." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg:          #080b12;
      --surface:     #0e1420;
      --surface2:    #131925;
      --border:      rgba(255,255,255,0.09);
      --border2:     rgba(255,255,255,0.15);
      --accent:      #3b82f6;
      --accent-glow: rgba(59,130,246,0.35);
      --accent2:     #06b6d4;
      --green:       #10b981;
      --text:        #ffffff;
      --muted:       #cbd5e1;
      --muted2:      #94a3b8;
      --radius:      12px;
      --radius-lg:   20px;
    }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      background: var(--bg);
      color: var(--text);
      line-height: 1.6;
      overflow-x: hidden;
    }

    /* ── Nav ─────────────────────────────────────────── */
    nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 100;
      padding: 0 2rem;
      height: 64px;
      display: flex; align-items: center; justify-content: space-between;
      background: rgba(8,11,18,0.85);
      backdrop-filter: blur(16px);
      border-bottom: 1px solid var(--border);
    }
    .nav-logo {
      font-size: 1rem; font-weight: 700; letter-spacing: -0.02em;
      color: var(--text);
      display: flex; align-items: center; gap: 10px;
    }
    .nav-logo-dot {
      width: 8px; height: 8px; border-radius: 50%;
      background: var(--accent);
      box-shadow: 0 0 10px var(--accent);
      animation: pulse 2s infinite;
    }
    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.5} }
    .nav-cta {
      display: inline-flex; align-items: center; gap: 6px;
      padding: 8px 18px; border-radius: 8px;
      background: var(--accent); color: #fff;
      font-size: 0.875rem; font-weight: 600;
      text-decoration: none;
      transition: opacity .2s, box-shadow .2s;
    }
    .nav-cta:hover { opacity: .9; box-shadow: 0 0 20px var(--accent-glow); }

    /* ── Sections / Layout ───────────────────────────── */
    section { position: relative; }

    .container {
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 2rem;
    }

    /* ── Hero ────────────────────────────────────────── */
    #hero {
      min-height: 100vh;
      display: flex; flex-direction: column; align-items: center; justify-content: center;
      text-align: center;
      padding: 120px 2rem 80px;
      overflow: hidden;
    }
    #hero::before {
      content: '';
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse 80% 50% at 50% -10%, rgba(59,130,246,0.18) 0%, transparent 65%),
        radial-gradient(ellipse 50% 30% at 80% 60%, rgba(6,182,212,0.08) 0%, transparent 55%);
      pointer-events: none;
    }

    .badge {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 6px 14px; border-radius: 999px;
      border: 1px solid rgba(59,130,246,0.4);
      background: rgba(59,130,246,0.08);
      font-size: 0.78rem; font-weight: 600; letter-spacing: .06em;
      color: var(--accent2); text-transform: uppercase;
      margin-bottom: 28px;
    }
    .badge-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--accent2); box-shadow: 0 0 6px var(--accent2); }

    h1 {
      font-size: clamp(2.2rem, 5vw, 4rem);
      font-weight: 800;
      letter-spacing: -0.04em;
      line-height: 1.1;
      max-width: 820px;
      margin: 0 auto 24px;
      color: #ffffff;
    }
    h1 .highlight {
      background: linear-gradient(135deg, var(--accent) 0%, var(--accent2) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-sub {
      font-size: 1.15rem; color: var(--muted);
      max-width: 580px; margin: 0 auto 40px;
      line-height: 1.7;
    }

    .btn-primary {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 14px 32px; border-radius: 10px;
      background: var(--accent); color: #fff;
      font-size: 1rem; font-weight: 700;
      text-decoration: none;
      transition: all .25s;
      box-shadow: 0 0 30px rgba(59,130,246,0.4);
    }
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 40px rgba(59,130,246,0.55);
    }
    .btn-primary svg { transition: transform .2s; }
    .btn-primary:hover svg { transform: translateX(3px); }

    /* Dashboard mockup */
    .dashboard {
      position: relative;
      margin-top: 72px;
      width: 100%; max-width: 900px;
      border-radius: var(--radius-lg);
      border: 1px solid var(--border2);
      background: var(--surface);
      overflow: hidden;
      box-shadow: 0 40px 120px rgba(0,0,0,0.6), 0 0 0 1px var(--border);
    }
    .dashboard::before {
      content: '';
      position: absolute; inset: -1px;
      border-radius: var(--radius-lg);
      background: linear-gradient(135deg, rgba(59,130,246,0.2), transparent 50%, rgba(6,182,212,0.1));
      pointer-events: none; z-index: 0;
    }
    .dashboard-bar {
      display: flex; align-items: center; gap: 8px;
      padding: 14px 20px;
      border-bottom: 1px solid var(--border);
      background: rgba(255,255,255,0.02);
    }
    .db-dot { width: 10px; height: 10px; border-radius: 50%; }
    .db-dot:nth-child(1) { background: #ff5f57; }
    .db-dot:nth-child(2) { background: #ffbd2e; }
    .db-dot:nth-child(3) { background: #27c840; }
    .dashboard-title {
      margin-left: auto; margin-right: auto;
      font-size: 0.78rem; font-weight: 600; color: var(--muted2);
      letter-spacing: .04em;
    }
    .dashboard-body { padding: 24px; display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

    /* KPI cards */
    .kpi-row { display: grid; grid-template-columns: repeat(4,1fr); gap: 12px; grid-column: 1/-1; }
    .kpi {
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 16px 18px;
    }
    .kpi-label { font-size: 0.72rem; color: var(--muted2); font-weight: 600; letter-spacing: .05em; text-transform: uppercase; margin-bottom: 8px; }
    .kpi-value { font-size: 1.6rem; font-weight: 800; letter-spacing: -0.04em; color: #fff; }
    .kpi-delta { font-size: 0.72rem; font-weight: 600; color: var(--green); margin-top: 4px; }

    /* Pipeline */
    .pipeline-card {
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 20px;
    }
    .card-title { font-size: 0.8rem; font-weight: 700; letter-spacing: .04em; color: var(--muted); text-transform: uppercase; margin-bottom: 14px; }

    .pipeline-stages { display: flex; flex-direction: column; gap: 10px; }
    .stage-row { display: flex; align-items: center; gap: 12px; font-size: 0.82rem; }
    .stage-label { width: 130px; color: var(--muted); white-space: nowrap; }
    .stage-bar-wrap { flex: 1; height: 8px; background: rgba(255,255,255,0.05); border-radius: 4px; overflow: hidden; }
    .stage-bar { height: 100%; border-radius: 4px; }
    .stage-count { font-weight: 700; font-size: 0.82rem; min-width: 28px; text-align: right; color: #fff; }

    /* Activity feed */
    .activity-card {
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 20px;
    }
    .activity-list { display: flex; flex-direction: column; gap: 10px; }
    .activity-item { display: flex; align-items: flex-start; gap: 12px; }
    .activity-icon {
      width: 28px; height: 28px; border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.75rem; flex-shrink: 0;
    }
    .activity-icon.blue  { background: rgba(59,130,246,0.15); color: var(--accent); }
    .activity-icon.green { background: rgba(16,185,129,0.15); color: var(--green); }
    .activity-icon.cyan  { background: rgba(6,182,212,0.15);  color: var(--accent2); }
    .activity-icon.amber { background: rgba(245,158,11,0.15); color: #f59e0b; }
    .activity-text { font-size: 0.8rem; line-height: 1.5; color: var(--muted); }
    .activity-text strong { color: #ffffff; font-weight: 600; }
    .activity-time { font-size: 0.72rem; color: var(--muted2); }

    /* ── Section base styles ─────────────────────────── */
    .section-pad { padding: 100px 0; }

    .section-label {
      display: inline-flex; align-items: center; gap: 8px;
      font-size: 0.78rem; font-weight: 700; letter-spacing: .1em;
      color: var(--accent); text-transform: uppercase;
      margin-bottom: 16px;
    }
    .section-label::before {
      content: '';
      display: block; width: 16px; height: 2px;
      background: var(--accent);
      border-radius: 2px;
    }

    h2 {
      font-size: clamp(1.8rem, 3.5vw, 2.8rem);
      font-weight: 800; letter-spacing: -0.04em;
      line-height: 1.15; margin-bottom: 20px;
      color: #ffffff;
    }
    .section-intro { font-size: 1.05rem; color: var(--muted); max-width: 520px; line-height: 1.75; }

    /* ── Problem ─────────────────────────────────────── */
    #problem { background: linear-gradient(180deg, var(--bg) 0%, var(--surface) 100%); }
    .problem-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: start; margin-top: 60px; }

    .problem-list { display: flex; flex-direction: column; gap: 20px; }
    .problem-item {
      display: flex; align-items: flex-start; gap: 16px;
      padding: 20px 24px;
      border-radius: var(--radius);
      border: 1px solid var(--border);
      background: rgba(255,255,255,0.02);
      transition: border-color .25s, background .25s;
    }
    .problem-item:hover {
      border-color: rgba(239,68,68,0.3);
      background: rgba(239,68,68,0.04);
    }
    .problem-icon {
      width: 36px; height: 36px; border-radius: 8px; flex-shrink: 0;
      background: rgba(239,68,68,0.12);
      display: flex; align-items: center; justify-content: center;
      color: #ef4444;
    }
    .problem-text strong { display: block; font-weight: 600; font-size: 0.95rem; margin-bottom: 4px; color: #ffffff; }
    .problem-text span { font-size: 0.85rem; color: var(--muted); }

    .stat-block {
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 36px;
      display: flex; flex-direction: column; gap: 28px;
    }
    .big-stat-num {
      font-size: 3.5rem; font-weight: 900; letter-spacing: -0.06em;
      background: linear-gradient(135deg, #ef4444, #f97316);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .big-stat-label { font-size: 0.9rem; color: var(--muted); margin-top: 4px; }
    .divider { height: 1px; background: var(--border); }

    /* ── Solution ────────────────────────────────────── */
    #solution { background: var(--surface); }
    .solution-inner {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 60px; align-items: center;
    }
    .solution-features { display: flex; flex-direction: column; gap: 16px; margin-top: 32px; }
    .sol-feature {
      display: flex; align-items: center; gap: 12px;
      font-size: 0.92rem; color: var(--muted);
    }
    .sol-feature::before {
      content: '';
      width: 18px; height: 18px; border-radius: 50%; flex-shrink: 0;
      background: rgba(16,185,129,0.15);
      border: 1.5px solid var(--green);
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' fill='none'%3E%3Cpath d='M2 6l3 3 5-5' stroke='%2310b981' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
      background-repeat: no-repeat; background-position: center;
    }

    .system-visual {
      position: relative;
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 32px;
      overflow: hidden;
    }
    .system-visual::before {
      content: '';
      position: absolute; top: -40px; right: -40px;
      width: 200px; height: 200px; border-radius: 50%;
      background: radial-gradient(circle, rgba(59,130,246,0.12) 0%, transparent 70%);
    }
    .sys-flow { display: flex; flex-direction: column; gap: 8px; position: relative; z-index: 1; }
    .sys-node {
      display: flex; align-items: center; gap: 14px;
      padding: 14px 18px;
      border-radius: 10px;
      border: 1px solid var(--border);
      background: rgba(255,255,255,0.02);
    }
    .sys-node-icon {
      width: 36px; height: 36px; border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1rem; flex-shrink: 0;
    }
    .sys-node-label { font-size: 0.88rem; font-weight: 600; color: #ffffff; }
    .sys-node-sub { font-size: 0.75rem; color: var(--muted2); }
    .sys-connector {
      width: 2px; height: 14px; margin-left: 31px;
      background: linear-gradient(to bottom, var(--accent), transparent);
      border-radius: 2px;
    }

    /* ── Steps ───────────────────────────────────────── */
    #steps { background: var(--bg); }
    .steps-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 60px; }
    .step-card {
      position: relative;
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 32px 28px;
      transition: border-color .3s, transform .3s;
      overflow: hidden;
    }
    .step-card::before {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(59,130,246,0.04) 0%, transparent 60%);
      opacity: 0; transition: opacity .3s;
    }
    .step-card:hover { border-color: rgba(59,130,246,0.35); transform: translateY(-4px); }
    .step-card:hover::before { opacity: 1; }

    .step-number {
      font-size: 0.72rem; font-weight: 800; letter-spacing: .1em;
      color: var(--accent); text-transform: uppercase;
      margin-bottom: 16px;
      display: flex; align-items: center; gap: 8px;
    }
    .step-number::after { content: ''; flex: 1; height: 1px; background: var(--border); }
    .step-icon {
      width: 48px; height: 48px; border-radius: 12px;
      border: 1px solid var(--border);
      background: rgba(59,130,246,0.08);
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 18px; font-size: 1.3rem;
    }
    .step-card h3 { font-size: 1.1rem; font-weight: 700; letter-spacing: -0.02em; margin-bottom: 10px; color: #ffffff; }
    .step-card p { font-size: 0.88rem; color: var(--muted); line-height: 1.7; }

    /* ── Results ─────────────────────────────────────── */
    #results { background: var(--surface); }
    .results-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 60px; }
    .result-card {
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 28px 24px;
      text-align: center;
      transition: border-color .3s;
    }
    .result-card:hover { border-color: rgba(16,185,129,0.4); }
    .result-value {
      font-size: 2.4rem; font-weight: 900; letter-spacing: -0.05em;
      background: linear-gradient(135deg, var(--green) 0%, var(--accent2) 100%);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
      display: block; margin-bottom: 8px;
    }
    .result-label { font-size: 0.85rem; color: var(--muted); line-height: 1.5; }

    /* ── Who ─────────────────────────────────────────── */
    #who { background: var(--bg); }
    .who-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; margin-top: 60px; }
    .who-list { display: flex; flex-direction: column; gap: 14px; }
    .who-item {
      display: flex; align-items: center; gap: 16px;
      padding: 18px 22px;
      border-radius: var(--radius);
      border: 1px solid var(--border);
      background: rgba(255,255,255,0.02);
      font-size: 0.92rem; font-weight: 500;
      color: var(--muted);
      transition: border-color .25s;
    }
    .who-item:hover { border-color: rgba(59,130,246,0.3); }
    .who-item-icon {
      width: 34px; height: 34px; border-radius: 8px; flex-shrink: 0;
      background: rgba(59,130,246,0.1);
      display: flex; align-items: center; justify-content: center;
      font-size: 0.95rem;
    }

    .fit-box {
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 36px;
    }
    .fit-box h3 { font-size: 1.1rem; font-weight: 700; margin-bottom: 8px; color: #ffffff; }
    .fit-box p { font-size: 0.88rem; color: var(--muted); line-height: 1.7; margin-bottom: 24px; }
    .fit-tag-list { display: flex; flex-wrap: wrap; gap: 8px; }
    .fit-tag {
      padding: 6px 14px; border-radius: 999px;
      background: rgba(59,130,246,0.1);
      border: 1px solid rgba(59,130,246,0.25);
      font-size: 0.8rem; font-weight: 600; color: var(--accent);
    }

    /* ── CTA ─────────────────────────────────────────── */
    #cta {
      background: var(--surface);
      text-align: center;
      overflow: hidden;
    }
    #cta::before {
      content: '';
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse 70% 60% at 50% 120%, rgba(59,130,246,0.2) 0%, transparent 65%),
        radial-gradient(ellipse 40% 40% at 20% 20%, rgba(6,182,212,0.07) 0%, transparent 60%);
      pointer-events: none;
    }
    #cta .container { position: relative; z-index: 1; }
    #cta h2 { max-width: 620px; margin: 0 auto 20px; }
    #cta p { font-size: 1.05rem; color: var(--muted); max-width: 480px; margin: 0 auto 40px; }
    .cta-note { margin-top: 16px; font-size: 0.82rem; color: var(--muted2); }

    /* ── Footer ──────────────────────────────────────── */
    footer {
      border-top: 1px solid var(--border);
      padding: 32px 2rem;
      text-align: center;
      font-size: 0.82rem; color: var(--muted2);
    }
    .footer-inner { max-width: 1100px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; }
    .footer-brand { font-weight: 700; color: var(--muted); }

    /* ── Responsive ──────────────────────────────────── */
    @media (max-width: 768px) {
      .problem-grid, .solution-inner, .who-grid { grid-template-columns: 1fr; }
      .kpi-row { grid-template-columns: repeat(2,1fr); }
      .dashboard-body { grid-template-columns: 1fr; }
      h1 { font-size: 2.1rem; }
      .steps-grid { grid-template-columns: 1fr; }
      .footer-inner { flex-direction: column; text-align: center; }
      nav { padding: 0 1rem; }
    }
    @media (max-width: 480px) {
      .kpi-row { grid-template-columns: 1fr 1fr; }
      .results-grid { grid-template-columns: 1fr 1fr; }
    }

    /* ── Animations ──────────────────────────────────── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeUp .6s ease both; }
    .delay-1 { animation-delay: .1s; }
    .delay-2 { animation-delay: .2s; }
    .delay-3 { animation-delay: .3s; }
    .delay-4 { animation-delay: .4s; }
  </style>
</head>
<body>

<!-- ═══════════════════════════════════ NAV ═══ -->
<nav>
  <div class="nav-logo">
    <div class="nav-logo-dot"></div>
    VVS Automation System
  </div>
  <a href="https://calendly.com/optelyofficial/15min" target="_blank" rel="noopener" class="nav-cta">
    Boka en demo
    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
</nav>

<!-- ═══════════════════════════════════ HERO ══ -->
<section id="hero">
  <div class="badge fade-up"><div class="badge-dot"></div>För VVS-företag</div>

  <h1 class="fade-up delay-1">
    Förvandla fler VVS-förfrågningar<br/>till <span class="highlight">Bokade Uppdrag</span> — Automatiskt
  </h1>

  <p class="hero-sub fade-up delay-2">
    VVS Automation System hjälper VVS-företag att automatisera leadkvalificering,
    bokning, uppföljning och kundåteraktivering — så att inget tillfälle går förlorat.
  </p>

  <a href="https://calendly.com/optelyofficial/15min" target="_blank" rel="noopener" class="btn-primary fade-up delay-3">
    Boka en 15-minuters demo
    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>

  <!-- Dashboard mockup -->
  <div class="dashboard fade-up delay-4">
    <div class="dashboard-bar">
      <div class="db-dot"></div><div class="db-dot"></div><div class="db-dot"></div>
      <span class="dashboard-title">VVS Automation System — Live Pipeline</span>
    </div>
    <div class="dashboard-body">
      <div class="kpi-row">
        <div class="kpi">
          <div class="kpi-label">Nya leads</div>
          <div class="kpi-value">48</div>
          <div class="kpi-delta">↑ 14% denna vecka</div>
        </div>
        <div class="kpi">
          <div class="kpi-label">Kvalificerade</div>
          <div class="kpi-value">31</div>
          <div class="kpi-delta">↑ 22% denna vecka</div>
        </div>
        <div class="kpi">
          <div class="kpi-label">Bokade</div>
          <div class="kpi-value">19</div>
          <div class="kpi-delta">↑ 31% denna vecka</div>
        </div>
        <div class="kpi">
          <div class="kpi-label">Uppdrag vunna</div>
          <div class="kpi-value">12</div>
          <div class="kpi-delta">↑ 18% denna vecka</div>
        </div>
      </div>

      <div class="pipeline-card">
        <div class="card-title">Pipeline-steg</div>
        <div class="pipeline-stages">
          <div class="stage-row">
            <div class="stage-label">Ny förfrågan</div>
            <div class="stage-bar-wrap"><div class="stage-bar" style="width:100%;background:linear-gradient(90deg,#3b82f6,#06b6d4)"></div></div>
            <div class="stage-count">48</div>
          </div>
          <div class="stage-row">
            <div class="stage-label">Kvalificerad</div>
            <div class="stage-bar-wrap"><div class="stage-bar" style="width:65%;background:#3b82f6"></div></div>
            <div class="stage-count">31</div>
          </div>
          <div class="stage-row">
            <div class="stage-label">Möte bokat</div>
            <div class="stage-bar-wrap"><div class="stage-bar" style="width:40%;background:#06b6d4"></div></div>
            <div class="stage-count">19</div>
          </div>
          <div class="stage-row">
            <div class="stage-label">Offert skickad</div>
            <div class="stage-bar-wrap"><div class="stage-bar" style="width:28%;background:#8b5cf6"></div></div>
            <div class="stage-count">13</div>
          </div>
          <div class="stage-row">
            <div class="stage-label">Uppdrag vunnet</div>
            <div class="stage-bar-wrap"><div class="stage-bar" style="width:25%;background:#10b981"></div></div>
            <div class="stage-count">12</div>
          </div>
        </div>
      </div>

      <div class="activity-card">
        <div class="card-title">Live-aktivitet</div>
        <div class="activity-list">
          <div class="activity-item">
            <div class="activity-icon green">✓</div>
            <div>
              <div class="activity-text"><strong>Lars Hansen</strong> bokade ett möte</div>
              <div class="activity-time">2 min sedan · Automatisk bokning</div>
            </div>
          </div>
          <div class="activity-item">
            <div class="activity-icon blue">⚡</div>
            <div>
              <div class="activity-text"><strong>Ny förfrågan</strong> kvalificerades automatiskt</div>
              <div class="activity-time">8 min sedan · Leadkvalificering</div>
            </div>
          </div>
          <div class="activity-item">
            <div class="activity-icon cyan">↩</div>
            <div>
              <div class="activity-text"><strong>Gammal offert</strong> återaktiverad — svar mottaget</div>
              <div class="activity-time">14 min sedan · Offertåteraktivering</div>
            </div>
          </div>
          <div class="activity-item">
            <div class="activity-icon amber">★</div>
            <div>
              <div class="activity-text"><strong>5-stjärnig recension</strong> mottagen från Mette Nielsen</div>
              <div class="activity-time">1 tim sedan · Recensionsmotor</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════ PROBLEM ═ -->
<section id="problem" class="section-pad">
  <div class="container">
    <div class="section-label">Problemet</div>
    <h2>Du får redan tillräckligt med förfrågningar.<br/>Du tappar bara bort dem.</h2>

    <div class="problem-grid">
      <div class="problem-list">
        <div class="problem-item">
          <div class="problem-icon">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          </div>
          <div class="problem-text">
            <strong>Förfrågningar lämnas obesvarade</strong>
            <span>Leads hör av sig och får inget svar — och ringer en konkurrent istället.</span>
          </div>
        </div>
        <div class="problem-item">
          <div class="problem-icon">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
          </div>
          <div class="problem-text">
            <strong>Ingen strukturerad säljprocess</strong>
            <span>Utan ett pipeline glöms uppföljningar bort och affärer faller igenom sprickorna.</span>
          </div>
        </div>
        <div class="problem-item">
          <div class="problem-icon">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
          </div>
          <div class="problem-text">
            <strong>Uppföljning är manuell och inkonsekvent</strong>
            <span>Att förlita sig på minnet innebär att de flesta prospekts aldrig hör av sig igen.</span>
          </div>
        </div>
        <div class="problem-item">
          <div class="problem-icon">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
          </div>
          <div class="problem-text">
            <strong>Offerter blir kalla — och följs aldrig upp</strong>
            <span>Skickade offerter glöms bort. Ingen återaktivering innebär förlorade intäkter.</span>
          </div>
        </div>
        <div class="problem-item">
          <div class="problem-icon">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div class="problem-text">
            <strong>Tidigare kunder kontaktas aldrig igen</strong>
            <span>Dina bästa leads är redan kunder — men inget system tar tillbaka dem.</span>
          </div>
        </div>
      </div>

      <div class="stat-block">
        <div class="big-stat">
          <div class="big-stat-num">78%</div>
          <div class="big-stat-label">av kunderna väljer det första företaget som svarar dem</div>
        </div>
        <div class="divider"></div>
        <div class="big-stat">
          <div class="big-stat-num">5×</div>
          <div class="big-stat-label">mer sannolikt att kvalificera ett lead när du svarar inom 5 minuter</div>
        </div>
        <div class="divider"></div>
        <div class="big-stat">
          <div class="big-stat-num">60%</div>
          <div class="big-stat-label">av affärer stängs i uppföljningen — inte vid första kontakten</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════ SOLUTION ═ -->
<section id="solution" class="section-pad">
  <div class="container">
    <div class="solution-inner">
      <div>
        <div class="section-label">Lösningen</div>
        <h2>Ett system som hanterar hela ditt kundflöde — automatiskt</h2>
        <p class="section-intro">
          VVS Automation System är en strukturerad, heltäckande pipeline som kvalificerar leads,
          bokar möten, skickar uppföljningar, återaktiverar gamla offerter och genererar recensioner
          — utan manuellt arbete.
        </p>
        <div class="solution-features">
          <div class="sol-feature">Omedelbar leadkvalificering — 24/7, ingen manuell granskning</div>
          <div class="sol-feature">Direkt kalenderbokning för kvalificerade prospekts</div>
          <div class="sol-feature">Automatiserade uppföljningssekvenser som aldrig missar en affär</div>
          <div class="sol-feature">Offertåteraktivering som väcker kalla möjligheter till liv</div>
          <div class="sol-feature">Recensions- och hänvisningsmotor som förstärker tillväxten</div>
          <div class="sol-feature">Full pipeline-synlighet — alltid veta var varje lead befinner sig</div>
        </div>
      </div>

      <div class="system-visual">
        <div class="card-title" style="margin-bottom:20px">Hur leads flödar genom systemet</div>
        <div class="sys-flow">
          <div class="sys-node">
            <div class="sys-node-icon" style="background:rgba(59,130,246,0.12);color:#3b82f6;">📥</div>
            <div>
              <div class="sys-node-label">Förfrågan mottagen</div>
              <div class="sys-node-sub">Via webbplats, annonser eller hänvisning</div>
            </div>
          </div>
          <div class="sys-connector"></div>
          <div class="sys-node">
            <div class="sys-node-icon" style="background:rgba(6,182,212,0.12);color:#06b6d4;">🔍</div>
            <div>
              <div class="sys-node-label">Automatisk kvalificering</div>
              <div class="sys-node-sub">Nyckelfrågor ställs omedelbart</div>
            </div>
          </div>
          <div class="sys-connector"></div>
          <div class="sys-node">
            <div class="sys-node-icon" style="background:rgba(139,92,246,0.12);color:#8b5cf6;">📅</div>
            <div>
              <div class="sys-node-label">Möte bokat</div>
              <div class="sys-node-sub">Direkt in i din kalender</div>
            </div>
          </div>
          <div class="sys-connector"></div>
          <div class="sys-node">
            <div class="sys-node-icon" style="background:rgba(245,158,11,0.12);color:#f59e0b;">⚙️</div>
            <div>
              <div class="sys-node-label">Automatiserad uppföljning</div>
              <div class="sys-node-sub">Påminnelser & återaktivering</div>
            </div>
          </div>
          <div class="sys-connector"></div>
          <div class="sys-node">
            <div class="sys-node-icon" style="background:rgba(16,185,129,0.12);color:#10b981;">✅</div>
            <div>
              <div class="sys-node-label">Uppdrag vunnet + Recension begärd</div>
              <div class="sys-node-sub">Automatisk recensions- & hänvisningsbegäran</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════ STEPS ═══ -->
<section id="steps" class="section-pad">
  <div class="container">
    <div style="text-align:center;max-width:600px;margin:0 auto;">
      <div class="section-label" style="justify-content:center;">Hur det fungerar</div>
      <h2>Fem steg. Helt automatiserat.</h2>
      <p class="section-intro" style="margin:0 auto;">
        Varje del av din säljprocess — från första kontakt till återkommande affärer — körs på autopilot.
      </p>
    </div>
    <div class="steps-grid">

      <div class="step-card">
        <div class="step-number">Steg 01</div>
        <div class="step-icon">🔍</div>
        <h3>Leadkvalificering</h3>
        <p>Systemet skickar automatiskt kvalificerande frågor till varje ny förfrågan, filtrerar bort oseriösa leads och säkerställer att bara högintresserade prospekts går vidare.</p>
      </div>

      <div class="step-card">
        <div class="step-number">Steg 02</div>
        <div class="step-icon">📅</div>
        <h3>Bokning & schemaläggning</h3>
        <p>Kvalificerade prospekts guidas att boka direkt in i din kalender — ingen fram och tillbaka, ingen manuell koordinering krävs.</p>
      </div>

      <div class="step-card">
        <div class="step-number">Steg 03</div>
        <div class="step-icon">📊</div>
        <h3>Pipeline-synlighet & uppföljning</h3>
        <p>Varje lead spåras i ett strukturerat CRM-pipeline. Automatiserade uppföljningssekvenser körs i bakgrunden och håller varje möjlighet varm.</p>
      </div>

      <div class="step-card">
        <div class="step-number">Steg 04</div>
        <div class="step-icon">🔔</div>
        <h3>No-Show & offertåteraktivering</h3>
        <p>Automatiska påminnelser minskar no-shows före möten. Kalla offerter återaktiveras med tajmade meddelanden som väcker gamla möjligheter till liv.</p>
      </div>

      <div class="step-card">
        <div class="step-number">Steg 05</div>
        <div class="step-icon">⭐</div>
        <h3>Recensions- & hänvisningsmotor</h3>
        <p>Efter ett avslutat uppdrag ombeds nöjda kunder automatiskt om recensioner och hänvisningar — vilket genererar fler leads utan extra ansträngning.</p>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════ RESULTS ═ -->
<section id="results" class="section-pad">
  <div class="container">
    <div style="text-align:center;max-width:600px;margin:0 auto 60px;">
      <div class="section-label" style="justify-content:center;">Resultat</div>
      <h2>Vad VVS-företag ser efter implementation</h2>
    </div>
    <div class="results-grid">
      <div class="result-card">
        <span class="result-value">+40%</span>
        <div class="result-label">Fler bokade uppdrag från samma antal förfrågningar</div>
      </div>
      <div class="result-card">
        <span class="result-value">~0</span>
        <div class="result-label">Missade förfrågningar — varje lead registreras automatiskt i systemet</div>
      </div>
      <div class="result-card">
        <span class="result-value">−80%</span>
        <div class="result-label">Mindre manuell uppföljningstid för teamet</div>
      </div>
      <div class="result-card">
        <span class="result-value">100%</span>
        <div class="result-label">Pipeline-synlighet — vet exakt var varje affär befinner sig</div>
      </div>
      <div class="result-card">
        <span class="result-value">10h+</span>
        <div class="result-label">Timmar sparade varje vecka på administration, samtal och uppföljning</div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════ WHO ══════ -->
<section id="who" class="section-pad">
  <div class="container">
    <div class="who-grid">
      <div>
        <div class="section-label">För vem</div>
        <h2>Byggd för VVS-företag som är redo att växa</h2>
        <p class="section-intro" style="margin-bottom:32px;">
          VVS Automation System är designat för företag som redan genererar förfrågningar
          och vill konvertera fler av dem — utan att anställa mer personal.
        </p>
        <div class="who-list">
          <div class="who-item">
            <div class="who-item-icon">📣</div>
            Du kör annonser eller har en webbplats som genererar inkommande förfrågningar
          </div>
          <div class="who-item">
            <div class="who-item-icon">📈</div>
            Du vill boka fler uppdrag från de leads du redan får
          </div>
          <div class="who-item">
            <div class="who-item-icon">🤖</div>
            Du vill automatisera kundkommunikation och uppföljning
          </div>
          <div class="who-item">
            <div class="who-item-icon">🗂️</div>
            Du vill ha en strukturerad, repeterbar säljprocess — inte kaos
          </div>
          <div class="who-item">
            <div class="who-item-icon">⏱️</div>
            Du vill spara tid och sluta förlita dig på minnet för uppföljning
          </div>
        </div>
      </div>

      <div class="fit-box">
        <h3>Det här systemet passar dig om du är...</h3>
        <p>Ett VVS-företag med ett aktivt leadflöde som vill förvandla fler förfrågningar till intäkter — utan att lägga till komplexitet eller personal.</p>
        <div class="fit-tag-list">
          <span class="fit-tag">VVS-företag</span>
          <span class="fit-tag">1–20 anställda</span>
          <span class="fit-tag">Kör annonser</span>
          <span class="fit-tag">Webbtrafik</span>
          <span class="fit-tag">Hänvisningsbaserat</span>
          <span class="fit-tag">Tillväxtfokuserat</span>
          <span class="fit-tag">Vill ha automation</span>
          <span class="fit-tag">Vill ha fler uppdrag</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════ CTA ═════ -->
<section id="cta" class="section-pad">
  <div class="container">
    <div class="section-label" style="justify-content:center;">Kom igång</div>
    <h2>Se hur VVS Automation System fungerar</h2>
    <p>
      Boka en gratis 15-minuters demo. Vi går igenom exakt hur systemet fungerar
      och visar hur det skulle se ut för ditt företag.
    </p>
    <a href="https://calendly.com/optelyofficial/15min" target="_blank" rel="noopener" class="btn-primary" style="display:inline-flex;">
      Boka en demo
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
    </a>
    <div class="cta-note">Gratis · Ingen förpliktelse · 15 minuter</div>
  </div>
</section>

<!-- ═══════════════════════════════════ FOOTER ══ -->
<footer>
  <div class="footer-inner">
    <div class="footer-brand">VVS Automation System</div>
    <div>© <?php echo date('Y'); ?> VVS Automation System. Alla rättigheter förbehållna.</div>
  </div>
</footer>

<script>
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.step-card, .result-card, .problem-item, .who-item').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    observer.observe(el);
  });
</script>

</body>
</html>
