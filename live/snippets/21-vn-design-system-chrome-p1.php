<?php
/**
 * Code Snippet #21 — VN Design System — Chrome (P1)
 * Header + nav + mobile menu + footer restyle to new tokens. Layered over #7.
 * scope: front-end | active: True | priority: 21
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('wp_head', function(){ ?>
<style id="vn-ds-chrome">
/* ===== VN DESIGN SYSTEM — P1 GLOBAL CHROME (v2, GP-native mobile menu) ===== */
.site-header{ background:var(--bg) !important; border-bottom:1px solid var(--border) !important; position:sticky; top:0; z-index:200; transition:border-color var(--dur) var(--ease),box-shadow var(--dur) var(--ease); }
.site-header.vn-scrolled{ border-bottom-color:rgba(0,0,0,.16) !important; box-shadow:var(--sh-1); }
.site-header .inside-header.grid-container{ max-width:var(--maxw) !important; width:auto !important; margin:0 auto !important; padding:14px 32px !important; }
.site-description{ display:none !important; }

/* logo */
.main-title a, .site-title a{ font-family:'Aldrich',sans-serif !important; font-size:16px !important; letter-spacing:.05em !important; color:var(--text) !important; text-transform:uppercase; text-decoration:none !important; display:inline-flex; align-items:baseline; }
.main-title a::before, .site-title a::before{ content:'> '; color:var(--dim) !important; margin-right:2px; }
.main-title a::after, .site-title a::after{ content:''; display:inline-block; width:8px; height:.9em; background:var(--primary) !important; margin-left:6px; transform:translateY(1px); animation:vnblink 1.06s steps(2,start) infinite; }
@media (prefers-reduced-motion:reduce){ .main-title a::after, .site-title a::after{ animation:none !important; } }

/* desktop nav */
.main-navigation, .main-navigation .inside-navigation{ background:transparent !important; }
.main-navigation .main-nav > ul > li > a{ font:700 13px/1 'Space Mono',monospace !important; letter-spacing:.04em !important; text-transform:none !important; color:var(--text-body) !important; padding:10px 14px !important; }
.main-navigation .main-nav > ul > li > a:hover,
.main-navigation .main-nav > ul > li:hover > a,
.main-navigation .main-nav > ul > li.sfHover > a{ color:var(--primary-strong) !important; background:transparent !important; }
.main-navigation .main-nav > ul > li.current-menu-item > a{ color:var(--primary-strong) !important; box-shadow:inset 0 -2px 0 var(--primary); }
.main-navigation ul ul{ background:var(--card) !important; border:1px solid var(--border) !important; border-radius:8px !important; box-shadow:var(--sh-card) !important; padding:6px !important; }
.main-navigation ul ul li a{ color:var(--text-body) !important; font-size:12px !important; border-radius:6px; }
.main-navigation ul ul li a:hover{ background:var(--bg-alt) !important; color:var(--primary-strong) !important; }

/* --- Mobile: GeneratePress native toggle + menu, restyled to terminal --- */
.main-navigation .menu-toggle, .mobile-menu-control-wrapper .menu-toggle{ color:var(--text) !important; font:700 12px/1 'Space Mono',monospace !important; letter-spacing:.08em; text-transform:uppercase; background:transparent !important; }
.main-navigation .menu-toggle:hover, .mobile-menu-control-wrapper .menu-toggle:hover{ color:var(--primary-strong) !important; }
.menu-toggle .gp-icon svg, .menu-toggle .gp-icon{ fill:currentColor !important; color:inherit !important; }
.menu-toggle:focus-visible{ outline:2px solid var(--text); outline-offset:2px; }
@media (max-width:768px){
  #site-navigation.toggled, .main-navigation.toggled{ background:var(--bg) !important; border-top:1px solid var(--border) !important; }
  .main-navigation.toggled .main-nav > ul,
  .main-navigation .main-nav > ul.toggled{ background:var(--bg) !important; }
  .main-navigation.toggled .main-nav > ul > li > a,
  .main-navigation .main-nav > ul > li > a{ font:700 15px/1 'Space Mono',monospace !important; padding:16px 24px !important; border-bottom:1px solid var(--border) !important; color:var(--text-body) !important; text-transform:none !important; }
  .main-navigation.toggled .main-nav > ul > li.current-menu-item > a{ box-shadow:inset 3px 0 0 var(--primary) !important; color:var(--primary-strong) !important; }
}


/* Mobile (<=860px): collapse inline desktop menu so the header fits the viewport,
   show GP's native toggle; GP's menu.min.js handles open/close */
@media (max-width:860px){
  .site-header .inside-header.grid-container{ display:flex !important; align-items:center; justify-content:space-between; max-width:100% !important; width:100% !important; box-sizing:border-box; }
  #site-navigation:not(.toggled) .main-nav{ display:none !important; }
  #site-navigation.toggled .main-nav{ display:block !important; }
  .mobile-menu-control-wrapper{ display:flex !important; align-items:center; }
  .mobile-menu-control-wrapper .menu-toggle{ display:inline-flex !important; align-items:center; }
}

/* footer */
.vn-footer{ background:var(--bg-alt) !important; border-top:1px solid var(--border) !important; color:var(--muted) !important; padding:64px 0 32px !important; }
.vn-footer .vn-container{ max-width:var(--maxw) !important; }
.vn-footer .vn-logo-text{ font-family:'Aldrich',sans-serif !important; color:var(--text) !important; text-transform:uppercase; letter-spacing:.04em; }
.vn-footer-grid h4, .vn-footer-grid .vn-label-sm{ font:700 11px/1.4 'Space Mono',monospace !important; letter-spacing:.12em; text-transform:uppercase; color:var(--dim) !important; }
.vn-footer-grid p, .vn-footer .vn-text-muted-sm, .vn-footer .vn-text-dim{ color:var(--muted) !important; font-size:13px !important; }
.vn-footer-links a{ color:var(--muted) !important; font-size:13px !important; }
.vn-footer-links a:hover{ color:var(--primary-strong) !important; }
.vn-footer-bottom{ border-top:1px solid var(--border) !important; padding-top:24px !important; color:var(--dim) !important; }
</style>
<script>
document.addEventListener('DOMContentLoaded', function(){






  var h=document.querySelector('.site-header');
  if(h){ var s=function(){ h.classList.toggle('vn-scrolled', window.scrollY>8); }; window.addEventListener('scroll', s, {passive:true}); s(); }
});
</script>
<?php }, 1001);
