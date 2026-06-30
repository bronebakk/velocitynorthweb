<?php
/**
 * Code Snippet #20 — VN Design System — Foundation (P0)
 * Tokens + primitives (terminal, buttons, cards, prose, section/grid, motion). Build P0.
 * scope: front-end | active: True | priority: 20
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('wp_head', function(){ ?>
<style id="vn-ds-foundation">
/* ===== VN DESIGN SYSTEM — P0 FOUNDATION ===== */
:root{
  --bg:#FBFAF8; --bg-alt:#F4F1EF; --card:#FFFFFF;
  --text:#1A1411; --text-body:#2A211E; --muted:#6E5B55; --dim:#766960;
  --primary:#D1402F; --primary-strong:#B5362A;
  --verified:#11854A; --verified-fill:#2FBE71;
  --border:rgba(0,0,0,.10); --border-accent:rgba(209,64,47,.32);
  --grid:rgba(0,0,0,.035);
  --console-bg:#141210; --console-head:#0A0A0A; --console-text:#C9C2BC;
  --console-salmon:#F0ADA2; --console-salmon-dim:#BA8077;
  --sh-1:0 1px 2px rgba(0,0,0,.05);
  --sh-card:0 10px 30px rgba(26,20,17,.08);
  --sh-console:0 24px 60px rgba(0,0,0,.28);
  --dur:160ms; --ease:cubic-bezier(.2,.6,.2,1);
  --maxw:1180px; --prose:720px;
}
@keyframes vnblink{ to{ opacity:0; } }

/* section / grid rhythm (M) */
.vn-section{ padding:96px 0; position:relative; }
.vn-container{ max-width:var(--maxw); margin:0 auto; padding:0 32px; }
.vn-prose-wrap{ max-width:var(--prose); margin:0 auto; }
@media(max-width:760px){ .vn-section{ padding:56px 0; } .vn-container{ padding:0 20px; } }

/* eyebrow */
.vn-eyebrow{ font:700 13px/1.4 'Space Mono',monospace; letter-spacing:.16em; text-transform:uppercase; color:var(--primary-strong); }

/* terminal primitive (K) — stays dark in light mode */
.vn-terminal{ background:var(--console-bg) !important; border-radius:12px; overflow:hidden; box-shadow:var(--sh-console); border:0 !important; }
.vn-terminal__bar{ display:flex; align-items:center; gap:8px; padding:12px 16px; background:var(--console-head); border-bottom:1px solid rgba(255,255,255,.06); font:12px/1 'Space Mono',monospace; color:#8A817B; }
.vn-terminal__dot{ width:11px; height:11px; border-radius:50%; flex:none; }
.vn-terminal__body{ padding:20px 24px; font:14px/1.9 'Space Mono',monospace; color:var(--console-text) !important; }
.vn-terminal__body .ok{ color:var(--verified-fill); } .vn-terminal__body .accent{ color:var(--console-salmon); } .vn-terminal__body .dim{ color:#8A817B; }

/* buttons (F) */
.vn-btn-filled{ font:700 14px/1 'Space Mono',monospace; letter-spacing:.04em; color:#fff !important; background:var(--primary) !important; border:0 !important; border-radius:8px !important; padding:13px 22px !important; min-height:44px; display:inline-flex; align-items:center; gap:8px; cursor:pointer; text-decoration:none; transition:background var(--dur) var(--ease),box-shadow var(--dur) var(--ease); }
.vn-btn-filled:hover,.vn-btn-filled:active{ background:var(--primary-strong) !important; box-shadow:none !important; }
.vn-btn-filled:focus-visible{ outline:2px solid var(--text); outline-offset:2px; }
.vn-btn-filled[disabled],.vn-btn-filled:disabled{ background:#EDE9E6 !important; color:var(--dim) !important; cursor:not-allowed; }
.vn-btn-outline{ font:700 14px/1 'Space Mono',monospace; letter-spacing:.04em; color:var(--primary-strong) !important; background:transparent !important; border:1px solid var(--border-accent) !important; border-radius:8px !important; padding:12px 22px !important; min-height:44px; display:inline-flex; align-items:center; gap:8px; cursor:pointer; text-decoration:none; transition:all var(--dur) var(--ease); }
.vn-btn-outline:hover{ background:var(--primary-strong) !important; border-color:var(--primary-strong) !important; color:#fff !important; box-shadow:none !important; }
.vn-btn-outline:focus-visible{ outline:2px solid var(--text); outline-offset:2px; }

/* cards + stats (E) */
.vn-card{ background:var(--card); border:1px solid var(--border); border-top:1px solid var(--border); border-radius:16px; padding:24px; transition:box-shadow var(--dur) var(--ease); }
.vn-card:hover{ box-shadow:var(--sh-card); }
.vn-grid{ display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:16px; }
.vn-stat-number{ font-family:'Aldrich',sans-serif !important; font-size:clamp(40px,5vw,56px) !important; line-height:1; color:var(--text) !important; }
.vn-stat-number--up{ color:var(--verified) !important; }
.vn-stat-label{ font:12px/1.4 'Space Mono',monospace; letter-spacing:.1em; text-transform:uppercase; color:var(--muted); margin-top:12px; }

.vn-card .vn-stat-number{ color:var(--text) !important; }
.vn-card .vn-stat-number--up{ color:var(--verified) !important; }

/* prose (L) */
.vn-prose{ max-width:var(--prose); font:16px/1.7 'Space Mono',monospace; color:var(--text-body); }
.vn-prose p{ margin:0 0 1em; }
.vn-prose h2,.vn-prose h3{ font-family:'Aldrich',sans-serif; font-weight:400; color:var(--text); line-height:1.2; margin:1.4em 0 .5em; }
.vn-prose h2{ font-size:28px; } .vn-prose h3{ font-size:22px; }
.vn-prose a{ color:var(--primary-strong); text-decoration:underline; text-underline-offset:3px; }
.vn-prose ul{ list-style:none; padding-left:0; }
.vn-prose ul li{ padding-left:22px; position:relative; margin-bottom:6px; }
.vn-prose ul li::before{ content:'\25B8'; position:absolute; left:0; color:var(--primary); }
.vn-prose blockquote{ margin:0 0 1em; padding:4px 0 4px 18px; border-left:3px solid var(--primary); color:var(--text); }
.vn-prose code{ background:var(--bg-alt); color:var(--primary-strong); padding:1px 6px; border-radius:4px; }

/* cursor + reduced motion */
.vn-cursor{ display:inline-block; width:8px; height:.95em; background:var(--primary); margin-left:4px; transform:translateY(1px); animation:vnblink 1.06s steps(2,start) infinite; }
.vn-cursor--green{ background:var(--verified-fill); }
@media (prefers-reduced-motion:reduce){ .vn-cursor{ animation:none; } *{ transition-duration:0ms !important; } }

/* focus-visible baseline */
a:focus-visible,button:focus-visible,input:focus-visible,textarea:focus-visible,summary:focus-visible{ outline:2px solid var(--text); outline-offset:2px; }
</style>
<?php }, 1000);
