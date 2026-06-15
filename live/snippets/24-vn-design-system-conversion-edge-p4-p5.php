<?php
/**
 * Code Snippet #24 — VN Design System — Conversion + Edge (P4/P5)
 * Tool cards, compliance form align, 404 console, hide comment UI.
 * scope: front-end | active: True | priority: 24
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('wp_head', function(){ ?>
<style id="vn-ds-conv-edge">
/* ===== P4/P5 — CONVERSION + EDGE ===== */
/* Comments disabled -> hide all comment UI */
.comments-area, .comment-respond, #comments, .entry-meta .comments-link, a.comments-link, .gp-icon.icon-comments{ display:none !important; }
/* Tools hub cards */
.vn-tool-card{ display:flex; flex-direction:column; }
.vn-tool-card h2{ font-family:'Aldrich',sans-serif !important; font-weight:400 !important; font-size:22px !important; color:var(--text) !important; margin:0 0 10px !important; }
.vn-tool-card p{ font:15px/1.6 'Space Mono',monospace !important; color:var(--text-body) !important; margin:0 0 16px !important; flex:1; }
.vn-tool-cta{ font:700 13px/1 'Space Mono',monospace !important; letter-spacing:.04em !important; text-transform:uppercase !important; color:var(--primary-strong) !important; text-decoration:none !important; }
.vn-tool-cta:hover{ text-decoration:underline !important; }
/* Compliance Check — align plugin form to tokens */
.ca-form, form.ca-form, .ca-audit, .ca-card{ background:var(--card) !important; border:1px solid var(--border) !important; border-top:2px solid var(--border-accent) !important; border-radius:16px !important; box-shadow:var(--sh-card) !important; }
.ca-form input[type=text], .ca-form input[type=email], .ca-form input[type=url], .ca-audit input{ border-radius:8px !important; border:1px solid rgba(0,0,0,.18) !important; font-family:'Space Mono',monospace !important; }
.ca-form button, .ca-form input[type=submit], .ca-audit button{ background:var(--primary) !important; color:#fff !important; border:0 !important; border-radius:8px !important; font:700 14px/1 'Space Mono',monospace !important; letter-spacing:.04em; padding:13px 22px !important; }
.ca-form button:hover{ background:var(--primary-strong) !important; }
/* 404 / search-empty console */
body.error404 .site-main, body.search-no-results .site-main{ max-width:720px; margin:0 auto; }
.vn-404{ background:var(--console-bg); color:var(--console-text); border-radius:12px; box-shadow:var(--sh-console); padding:24px 26px; font:14px/1.95 'Space Mono',monospace; margin:24px 0; }
.vn-404 a{ color:var(--console-salmon); }
.vn-404 .ok{ color:var(--verified-fill); } .vn-404 .dim{ color:#8A817B; }
</style>
<script>
document.addEventListener('DOMContentLoaded', function(){
  if(document.body.classList.contains('error404')){
    var host=document.querySelector('.inside-article .entry-content, .inside-article .page-content, .content-area .page-content, .site-main .page-content');
    if(host){
      host.innerHTML='<div class="vn-404"><div><span class="ok">$</span> locate '+location.pathname.replace(/</g,'')+'</div><div class="dim">  command not found</div><div>  try <a href="/services/">/services</a> &middot; <a href="/blog/">/blog</a> &middot; <a href="/contact/">/contact</a> &middot; <a href="/">home</a></div></div>';
      var t=document.querySelector('.inside-article .entry-title, .page-header .entry-title');
      if(t){ t.textContent='404 — command not found'; }
    }
  }
});
</script>
<?php }, 1004);
