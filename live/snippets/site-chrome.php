<?php
/**
 * Code Snippet #7 — Velocity North — site chrome v2
 * Full theme CSS (vn-*) + dark header + custom footer + hide GP sidebar/footer.
 *
 * Scope: front-end  |  Priority: 10  |  Active: True
 *
 * SOURCE OF TRUTH: This snippet lives in the WordPress database (Code Snippets
 * plugin) on velocitynorth.ai. This file is an exported backup/record only.
 * Editing this file does NOT change the live site — edit via the Code Snippets
 * REST API or WP Admin → Snippets, then re-export.
 */

add_action('wp_head', function() { ?>
<style id="vn-chrome-styles">

/* Hide sidebar everywhere */
#right-sidebar, .widget-area.sidebar { display:none !important; }
.is-right-sidebar, .is-left-sidebar { display:none !important; }

/* GP header dark + branded */
.site-header { background:#121212 !important; border-bottom:1px solid rgba(219,68,52,0.3) !important; }
.site-header .inside-header { padding:14px 32px; max-width:1280px; margin:0 auto; }
.site-title, .main-title { font-family:'Aldrich',sans-serif !important; font-size:1.05rem !important; letter-spacing:.04em; margin:0; font-weight:400; }
.site-title a, .main-title a, .site-title { color:#f0ada2 !important; text-decoration:none !important; }
.site-title a::before, .main-title a::before { content:'> '; color:#886660; font-weight:400; }
.site-title a::after, .main-title a::after { content:''; display:inline-block; width:9px; height:1em; background:#db4434; margin-left:6px; vertical-align:-2px; animation:vnTermCursor 1s steps(1) infinite; }
.site-description { display:none !important; }
.main-navigation, .main-navigation .inside-navigation { background:#121212 !important; }
.main-navigation .inside-navigation { max-width:1280px; margin:0 auto; }
.main-navigation .menu li a { font-family:'Space Mono',monospace !important; text-transform:uppercase; letter-spacing:.14em; font-size:.78rem !important; color:#ba8077 !important; padding:18px 16px !important; background:transparent !important; }
.main-navigation .menu li a:hover, .main-navigation .menu li.current-menu-item > a { color:#db4434 !important; }
@keyframes vnTermCursor { 50% { opacity:0; } }

/* === Unwrap GP containers on inner pages so .vn-section breathes === */
body:not(.home) .site.grid-container,
body:not(.home) .site-content,
body:not(.home) .content-area,
body:not(.home) .site-main,
body:not(.home) article.page,
body:not(.home) .inside-article,
body:not(.home) .entry-content {
  max-width: none !important;
  width: 100% !important;
  padding: 0 !important;
  margin: 0 !important;
  background: transparent !important;
  border: none !important;
  box-shadow: none !important;
}
body:not(.home) .grid-container { max-width: none !important; padding: 0 !important; }
body:not(.home) .entry-header { display: none !important; }
body:not(.home) .post-navigation, body:not(.home) .comments-area { display: none !important; }

/* Home keeps its own .vn-h__wrap container; still unwrap GP article around it */
body.home .site.grid-container,
body.home .site-content,
body.home .content-area,
body.home .site-main,
body.home article.page,
body.home .inside-article,
body.home .entry-content {
  max-width: none !important;
  width: 100% !important;
  padding: 0 !important;
  margin: 0 !important;
  background: transparent !important;
  border: none !important;
}
body.home .grid-container { max-width: none !important; padding: 0 !important; }
body.home .entry-header { display: none !important; }

/* Hide GPs default footer */
.site-footer { display:none !important; }

/* Body bg dark on inner pages and home (footer blends) */
body { background:#121212 !important; }
body .site { background:transparent !important; }

/* Footer */
.vn-footer { background: var(--color-bg-darker); border-top:1px solid var(--color-border); padding:4rem 0 2rem; color: var(--color-text-muted); font-family:'Space Mono',monospace; }
.vn-footer .vn-container { max-width:1280px; margin:0 auto; padding:0 1.5rem; }
.vn-footer-grid { display:grid; grid-template-columns:2fr 1fr 1fr; gap:3rem; margin-bottom:3rem; }
.vn-footer-grid h4 { color: var(--color-text-muted); margin:0 0 .75rem; }
.vn-footer-grid p { margin: 0 0 .5rem; }
.vn-footer-links { list-style:none; padding:0; margin:0; }
.vn-footer-links li { margin-bottom:.5rem; list-style:none; }
.vn-footer-links a { color: var(--color-text-dim); font-size:.875rem; text-decoration:none; }
.vn-footer-links a:hover { color: var(--color-primary); }
.vn-footer-bottom { border-top:1px solid var(--color-border); padding-top:1.5rem; text-align:center; }
@media (max-width:768px){ .vn-footer-grid { grid-template-columns:1fr; gap:2rem; } }


/* === Theme styles (vn-*) === */
/*
Theme Name: Velocity North
Theme URI: https://velocitynorth.com
Author: Velocity North
Author URI: https://velocitynorth.com
Description: Custom dark theme for Velocity North — performance marketing agency. Features dark background, red/salmon accent colors, monospace typography, terminal-inspired UI elements.
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: velocitynorth
*/

/* ========== RESET & BASE ========== */
@import url('https://fonts.googleapis.com/css2?family=Aldrich&family=Space+Mono:wght@400;700&display=swap');

:root {
  --color-bg: #121212;
  --color-bg-card: #1e1e1e;
  --color-bg-darker: #0a0a0a;
  --color-primary: #db4434;
  --color-secondary: #f0ada2;
  --color-text: #f0ada2;
  --color-text-muted: #ba8077;
  --color-text-dim: #886660;
  --color-border: rgba(219, 68, 52, 0.3);
  --color-card-bg: #0d0d0d;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Space Mono', monospace;
  background-color: var(--color-bg);
  color: var(--color-text);
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
}

/* Grid background overlay */
body::before {
  content: '';
  position: fixed;
  inset: 0;
  background-image:
    linear-gradient(rgba(219,68,52,0.05) 1px, transparent 1px),
    linear-gradient(90deg, rgba(219,68,52,0.05) 1px, transparent 1px);
  background-size: 40px 40px;
  pointer-events: none;
  z-index: 0;
}

a { color: var(--color-primary); text-decoration: none; }
a:hover { text-decoration: underline; }

img { max-width: 100%; height: auto; }

/* ========== LAYOUT ========== */
.vn-container {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

.vn-container-narrow {
  max-width: 768px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

.vn-section {
  padding: 6rem 0;
  position: relative;
}

.vn-section-dark {
  padding: 6rem 0;
  background: var(--color-bg-darker);
  position: relative;
}

.vn-text-center { text-align: center; }

/* ========== TYPOGRAPHY ========== */
.vn-heading-xl {
  font-family: 'Aldrich', sans-serif;
  font-size: clamp(2rem, 5vw, 3.5rem);
  font-weight: 700;
  line-height: 1.1;
  margin-bottom: 1rem;
}

.vn-heading-lg {
  font-family: 'Aldrich', sans-serif;
  font-size: clamp(1.5rem, 3vw, 2.25rem);
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 1rem;
}

.vn-heading-md {
  font-family: 'Aldrich', sans-serif;
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--color-text);
  margin-bottom: 0.5rem;
}

.vn-subheading {
  font-family: 'Aldrich', sans-serif;
  font-size: 0.75rem;
  text-transform: uppercase;
  color: var(--color-primary);
  letter-spacing: 0.05em;
  margin-bottom: 1rem;
}

.vn-gradient-text {
  background: linear-gradient(135deg, var(--color-text) 0%, var(--color-primary) 50%, var(--color-secondary) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.vn-text { color: var(--color-text); font-size: 1rem; }
.vn-text-lg { font-size: 1.125rem; }
.vn-text-muted { color: var(--color-text-muted); margin-bottom: 1rem; }
.vn-text-muted-sm { color: var(--color-text-muted); font-size: 0.875rem; }
.vn-text-dim { color: var(--color-text-dim); font-size: 0.875rem; }

.vn-label {
  font-family: 'Aldrich', sans-serif;
  font-size: 0.75rem;
  text-transform: uppercase;
  letter-spacing: 0.15em;
  color: var(--color-secondary);
  margin-bottom: 1rem;
}

.vn-label-sm {
  font-family: 'Aldrich', sans-serif;
  font-size: 0.6875rem;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--color-secondary);
  margin-bottom: 0.25rem;
}

.vn-cursor { color: var(--color-primary); animation: blink 1s infinite; }

@keyframes blink {
  0%, 100% { opacity: 1; }
  50% { opacity: 0; }
}

.vn-prose p {
  color: var(--color-text-dim);
  margin-bottom: 1.25rem;
  line-height: 1.7;
}

/* ========== CARDS ========== */
.vn-card {
  background: var(--color-card-bg);
  border: 1px solid var(--color-border);
  padding: 1.5rem;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.vn-card:hover {
  border-color: var(--color-primary);
  box-shadow: 0 0 15px rgba(219, 68, 52, 0.2);
}

/* ========== TERMINAL WINDOWS ========== */
.vn-terminal {
  background: var(--color-bg);
  border: 1px solid var(--color-border);
}

.vn-terminal-header {
  background: rgba(219, 68, 52, 0.1);
  border-bottom: 1px solid rgba(219, 68, 52, 0.2);
  padding: 0.5rem 1rem;
  font-family: 'Aldrich', sans-serif;
  font-size: 0.6875rem;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--color-secondary);
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.vn-terminal-body {
  padding: 1.5rem;
}

/* ========== BUTTONS ========== */
.vn-btn-filled {
  display: inline-block;
  background: var(--color-primary);
  color: #fff;
  border: 2px solid var(--color-primary);
  font-family: 'Aldrich', sans-serif;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  font-size: 0.875rem;
  padding: 0.75rem 1.5rem;
  cursor: pointer;
  transition: box-shadow 0.3s ease;
  text-decoration: none;
}

.vn-btn-filled:hover {
  box-shadow: 0 0 25px rgba(219, 68, 52, 0.6);
  text-decoration: none;
}

.vn-btn-outline {
  display: inline-block;
  background: transparent;
  border: 2px solid var(--color-primary);
  color: var(--color-primary);
  font-family: 'Aldrich', sans-serif;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  font-size: 0.875rem;
  padding: 0.75rem 1.5rem;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
}

.vn-btn-outline:hover {
  background: rgba(219, 68, 52, 0.1);
  box-shadow: 0 0 20px rgba(219, 68, 52, 0.4);
  text-decoration: none;
}

.vn-btn-group {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
  margin-top: 1.5rem;
}

/* ========== GRIDS ========== */
.vn-grid-3 {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.5rem;
  margin-top: 2rem;
}

.vn-stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.5rem;
  margin-top: 2rem;
}

.vn-stats-grid-2 {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem;
  margin-bottom: 1rem;
}

.vn-hero-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  align-items: center;
}

.vn-contact-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
}

.vn-service-detail {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
  margin-bottom: 3rem;
}

.vn-service-info { }

.vn-feature-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0.5rem;
}

/* ========== HERO ========== */
.vn-hero {
  min-height: 90vh;
  display: flex;
  align-items: center;
  padding: 6rem 0;
  position: relative;
}

.vn-hero-content { }

.vn-hero-cards { }

/* ========== STATS ========== */
.vn-stat-number {
  font-family: 'Aldrich', sans-serif;
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 700;
  color: var(--color-primary);
  text-shadow: 0 0 20px rgba(219, 68, 52, 0.3);
  margin-bottom: 0.25rem;
}

.vn-stat-value {
  font-family: 'Aldrich', sans-serif;
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 0.25rem;
}

/* ========== FEATURE LISTS ========== */
.vn-feature-list {
  list-style: none;
  padding: 0;
  margin: 0.5rem 0;
}

.vn-feature-list li {
  font-size: 0.875rem;
  color: var(--color-text-dim);
  padding: 0.25rem 0;
  display: flex;
  align-items: flex-start;
}

.vn-bullet {
  color: var(--color-primary);
  margin-right: 0.5rem;
  flex-shrink: 0;
}

.vn-benefit-list {
  list-style: none;
  padding: 0;
  margin: 1rem 0;
}

.vn-benefit-list li {
  font-size: 0.875rem;
  color: var(--color-text-dim);
  padding: 0.75rem 0;
  border-bottom: 1px solid var(--color-border);
}

.vn-benefit-list li:last-child { border-bottom: none; }

/* ========== TESTIMONIALS ========== */
.vn-quote-mark {
  font-size: 2.5rem;
  color: var(--color-secondary);
  opacity: 0.6;
  line-height: 1;
}

.vn-testimonial-author {
  padding-top: 1rem;
  border-top: 1px solid var(--color-border);
  margin-top: 1rem;
}

.vn-author-name {
  font-family: 'Aldrich', sans-serif;
  font-size: 0.875rem;
  color: var(--color-primary);
}

.vn-author-role {
  font-size: 0.75rem;
  color: var(--color-text-muted);
  margin-top: 0.125rem;
}

/* ========== CONTACT ========== */
.vn-contact-info {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.vn-info-item {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
}

.vn-info-icon {
  background: var(--color-card-bg);
  border: 1px solid var(--color-border);
  padding: 0.75rem;
  font-size: 1.25rem;
  flex-shrink: 0;
}

/* ========== WORDPRESS OVERRIDES ========== */
/* Override WP default styles to maintain dark theme */
.entry-content,
.page-content,
.post-content {
  color: var(--color-text);
}

/* Contact Form 7 styling */
.wpcf7 input[type="text"],
.wpcf7 input[type="email"],
.wpcf7 textarea {
  background: var(--color-card-bg);
  border: 1px solid var(--color-border);
  color: var(--color-text);
  padding: 0.75rem 1rem;
  width: 100%;
  font-family: 'Space Mono', monospace;
  font-size: 0.875rem;
}

.wpcf7 input:focus,
.wpcf7 textarea:focus {
  border-color: var(--color-primary);
  outline: none;
}

.wpcf7 label {
  font-family: 'Aldrich', sans-serif;
  font-size: 0.6875rem;
  text-transform: uppercase;
  color: var(--color-secondary);
  display: block;
  margin-bottom: 0.5rem;
}

.wpcf7 input[type="submit"] {
  background: var(--color-primary);
  color: #fff;
  border: 2px solid var(--color-primary);
  font-family: 'Aldrich', sans-serif;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  font-size: 0.875rem;
  padding: 0.75rem 1.5rem;
  cursor: pointer;
  width: 100%;
  transition: box-shadow 0.3s ease;
}

.wpcf7 input[type="submit"]:hover {
  box-shadow: 0 0 25px rgba(219, 68, 52, 0.6);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 768px) {
  .vn-grid-3,
  .vn-stats-grid,
  .vn-hero-grid,
  .vn-contact-grid,
  .vn-service-detail {
    grid-template-columns: 1fr;
  }

  .vn-stats-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .vn-feature-grid {
    grid-template-columns: 1fr;
  }

  .vn-section, .vn-section-dark {
    padding: 3rem 0;
  }

  .vn-hero {
    min-height: auto;
    padding: 3rem 0;
  }
}



/* === LIGHT MODE OVERRIDE (entire site white) === */
:root {
  --color-bg:#FBFAF8 !important;
  --color-bg-card:#FFFFFF !important;
  --color-bg-darker:#F4F1EF !important;
  --color-primary:#D1402F !important;
  --color-secondary:#B5362A !important;
  --color-text:#2A211E !important;
  --color-text-muted:#6E5B55 !important;
  --color-text-dim:#9A8B85 !important;
  --color-border:rgba(209,64,47,0.28) !important;
  --color-card-bg:#FFFFFF !important;
}

body { background:#FBFAF8 !important; color:#2A211E !important; }
body .site { background:transparent !important; }

/* HEADER white */
.site-header { background:#FBFAF8 !important; border-bottom:1px solid rgba(0,0,0,0.10) !important; }
.site-title a, .main-title a, .site-title { color:#1A1411 !important; }
.site-title a::before, .main-title a::before { color:#9A8B85 !important; }
.site-title a::after, .main-title a::after { background:#D1402F !important; }
.main-navigation, .main-navigation .inside-navigation { background:#FBFAF8 !important; }
.main-navigation .menu li a { color:#6E5B55 !important; }
.main-navigation .menu li a:hover, .main-navigation .menu li.current-menu-item > a { color:#D1402F !important; }

/* Dark sections become light, but keep red accent line */
.vn-section-dark { background:#F4F1EF !important; }
.vn-section { color:#2A211E !important; }

/* Gradient headings — readable on white */
.vn-gradient-text {
  background: linear-gradient(135deg,#D1402F 0%,#7a1f15 50%,#D1402F 100%) !important;
  -webkit-background-clip: text !important;
  background-clip: text !important;
  -webkit-text-fill-color: transparent !important;
  color: transparent !important;
}

/* Cards on white */
.vn-card { background:#FFFFFF !important; border:1px solid rgba(0,0,0,0.10) !important; border-top:2px solid rgba(209,64,47,0.28) !important; }
.vn-card .vn-stat-value, .vn-card .vn-stat-number { color:#D1402F !important; }
.vn-card .vn-label-sm { color:#6E5B55 !important; }

/* Buttons */
.vn-btn-filled { background:#D1402F !important; color:#fff !important; border-color:#D1402F !important; }
.vn-btn-outline { color:#B5362A !important; border-color:#D1402F !important; background:transparent !important; }
.vn-btn-filled:hover { background:#B5362A !important; }

/* Labels and prose */
.vn-label { color:#D1402F !important; }
.vn-text-muted { color:#6E5B55 !important; }
.vn-text-muted-sm { color:#6E5B55 !important; }
.vn-text-dim { color:#9A8B85 !important; }
.vn-cursor { color:#D1402F !important; }
.vn-prose, .vn-prose p, .vn-prose li { color:#2A211E !important; }

/* Keep terminal blocks DARK (they are the "code/console" element) */
.vn-terminal { background:#141210 !important; border:1px solid #2a2320 !important; box-shadow:0 18px 40px -20px rgba(0,0,0,0.3); }
.vn-terminal-header { background:#0a0a0a !important; color:#ba8077 !important; border-bottom:1px solid rgba(255,255,255,0.08) !important; }
.vn-terminal-body { color:#C9C2BC !important; }
.vn-terminal-body h3, .vn-terminal-body .vn-heading-md { color:#f0ada2 !important; }
.vn-terminal-body .vn-text-muted-sm { color:#9a8079 !important; }
.vn-terminal-body .vn-feature-list li, .vn-terminal-body .vn-feature-list { color:#C9C2BC !important; }
.vn-bullet { color:#db4434 !important; }

/* Footer white */
.vn-footer { background:#F4F1EF !important; color:#6E5B55 !important; border-top:1px solid rgba(0,0,0,0.10) !important; }
.vn-footer .vn-logo-text { color:#1A1411 !important; }
.vn-footer-grid h4 { color:#6E5B55 !important; }
.vn-footer-grid p, .vn-footer-grid .vn-text-muted-sm { color:#6E5B55 !important; }
.vn-footer-links a, .vn-footer-grid .vn-text-dim, .vn-footer-grid .vn-text-dim a { color:#6E5B55 !important; }
.vn-footer-links a:hover { color:#D1402F !important; }
.vn-footer-bottom { border-top:1px solid rgba(0,0,0,0.10) !important; }

/* Entry title / GP defaults on light */
body .entry-title { color:#1A1411 !important; }

/* Inner page body bg */
body.page, body.single-post, body.blog, body.archive { background:#FBFAF8 !important; color:#2A211E !important; }









/* === SECTION SPACING (tighter, Jakob v3) === */
/* Hero: content-driven, with reasonable minimum */
.vn-h__hero { min-height: auto !important; padding-top: 4.5rem !important; padding-bottom: 4.5rem !important; align-content: center; }
.vn-h__clients { padding: 3rem 0 2.5rem !important; }
.vn-h__clients .vn-h__clabel { margin-bottom: 24px; }
.vn-h__section { padding: 4.5rem 0 !important; }
.vn-h__section.vn-h__case { padding: 4.5rem 0 !important; }

.vn-section { padding: 4.5rem 0 !important; }
.vn-section-dark { padding: 4.5rem 0 !important; }
.vn-hero { min-height: auto !important; padding: 4.5rem 0 !important; }

/* Heading-to-content micro-spacing inside sections */
.vn-h__section h1.vn-h__tg-headline { margin-bottom: 14px !important; }
.vn-h__lede { margin-bottom: 14px !important; }
.vn-h__casebar { margin-bottom: 32px !important; }

@media (max-width: 820px) {
  .vn-h__hero, .vn-hero { padding: 3rem 0 !important; }
  .vn-h__section, .vn-section, .vn-section-dark { padding: 3rem 0 !important; }
  .vn-h__clients { padding: 2rem 0 1.5rem !important; }
}

</style>
<?php }, 999);
add_action('wp_footer', function() { ?>
<footer class="vn-footer">
  <div class="vn-container">
    <div class="vn-footer-grid">
      <div>
        <p class="vn-logo-text" style="margin-bottom:1rem;">&gt; VELOCITY<span style="color: var(--color-primary);">NORTH_</span></p>
        <p class="vn-text-muted-sm">Data-driven growth for serious businesses.<br>Performance marketing, analytics, and technology consulting.</p>
      </div>
      <div>
        <h4 class="vn-label-sm" style="margin-bottom:0.75rem;">Navigation</h4>
        <ul class="vn-footer-links">
          <li><a href="/">Home</a></li>
          <li><a href="/about/">About</a></li>
          <li><a href="/services/">Services</a></li>
          <li><a href="/contact/">Contact</a></li>
        </ul>
      </div>
      <div>
        <h4 class="vn-label-sm" style="margin-bottom:0.75rem;">Contact</h4>
        <p class="vn-text-dim">Gothenburg &amp; Oslo</p>
        <p class="vn-text-dim"><a href="mailto:contact@velocitynorth.com" style="color: var(--color-text-dim);">contact@velocitynorth.com</a></p>
        <p class="vn-text-dim">+47 90 63 96 37</p>
        </div>
    </div>
    <div class="vn-footer-bottom">
      <p class="vn-text-dim" style="font-size:.75rem;">&copy; 2026 Velocity North. All rights reserved.</p>
    </div>
  </div>
</footer>
<?php }, 5);

