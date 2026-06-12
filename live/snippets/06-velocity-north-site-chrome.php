<?php
/**
 * Code Snippet #6 — Velocity North — site chrome
 * Terminal-style header + footer + hides default sidebar across all pages.
 * scope: front-end | active: False | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('wp_head', function() { ?>
<style id="vn-chrome-styles">
@import url('https://fonts.googleapis.com/css2?family=Aldrich&family=Space+Mono:wght@400;700&display=swap');

/* === HIDE SIDEBAR EVERYWHERE === */
#right-sidebar, .widget-area.sidebar { display:none !important; }
.right-sidebar .site-content .content-area,
.site-content .content-area { width:100% !important; max-width:100% !important; }

/* === HEADER terminal-style === */
.site-header { background:#121212 !important; border-bottom:1px solid rgba(219,68,52,0.3); }
.site-header .inside-header { padding:14px 32px; }
.site-branding { display:flex; align-items:center; }
.site-title, .main-title { font-family:'Aldrich',sans-serif !important; font-size:1.05rem !important; letter-spacing:.04em; line-height:1.2; margin:0; font-weight:400; }
.site-title a, .main-title a, .site-title { color:#f0ada2 !important; text-decoration:none !important; }
.site-title a::before, .main-title a::before { content:'> '; color:#886660; font-weight:400; }
.site-title a::after, .main-title a::after { content:''; display:inline-block; width:9px; height:1em; background:#db4434; margin-left:6px; vertical-align:-2px; animation:vnTermCursor 1s steps(1) infinite; }
.site-description { display:none !important; }

/* === NAV terminal-style === */
.main-navigation, .main-navigation .inside-navigation { background:#121212 !important; }
.main-navigation .menu li a { font-family:'Space Mono',monospace !important; text-transform:uppercase; letter-spacing:.14em; font-size:.78rem !important; color:#ba8077 !important; padding:18px 16px !important; background:transparent !important; }
.main-navigation .menu li a:hover,
.main-navigation .menu li.current-menu-item > a { color:#db4434 !important; }

/* === FOOTER terminal-style === */
.site-footer, .site-info { background:#121212 !important; color:#886660 !important; border-top:1px solid rgba(219,68,52,0.3); font-family:'Space Mono',monospace !important; font-size:.78rem; }
.site-footer .site-info { border-top:0; padding:0; }
.inside-site-info { padding:18px 32px !important; }
.site-footer a, .site-info a { color:#db4434 !important; text-decoration:none; }

@keyframes vnTermCursor { 50% { opacity:0; } }

</style>
<?php }, 999);
