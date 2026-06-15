<?php
/**
 * Code Snippet #23 — VN Design System — Content (P3)
 * Testimonial cards+filters, blog/archive cards, single-post prose, author box/archive.
 * scope: front-end | active: True | priority: 23
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('wp_head', function(){ ?>
<style id="vn-ds-content">
/* ===== VN DESIGN SYSTEM — P3 CONTENT ===== */

/* show post titles on blog/single/archive (GP entry-header) */
body.blog .entry-header, body.archive .entry-header, body.single .entry-header, body.author .entry-header{ display:block !important; }

/* H · Testimonial cards + filters -> tokens */
.vn-tst-card{ border-radius:16px !important; border:1px solid var(--border) !important; border-top:2px solid var(--border-accent) !important; box-shadow:none !important; transition:box-shadow var(--dur) var(--ease) !important; }
.vn-tst-card:hover{ box-shadow:var(--sh-card) !important; }
.vn-tst-result{ font-family:'Aldrich',sans-serif !important; color:var(--primary) !important; }
.vn-tst-stars{ color:var(--primary) !important; }
.vn-tst-quote{ color:var(--text-body) !important; }
.vn-tst-author{ color:var(--text) !important; }
.vn-tst-role{ color:var(--muted) !important; }
.vn-tst-more summary{ color:var(--primary-strong) !important; }
.vn-tst-tag{ border:1px solid var(--border) !important; color:var(--muted) !important; border-radius:6px !important; font:700 11px/1 'Space Mono',monospace !important; letter-spacing:.06em !important; text-transform:uppercase !important; }
.vn-tst-filter{ border:1px solid var(--border) !important; border-radius:6px !important; background:var(--card) !important; color:var(--text-body) !important; font:700 12px/1 'Space Mono',monospace !important; letter-spacing:.04em !important; text-transform:uppercase !important; padding:9px 15px !important; }
.vn-tst-filter.active{ background:var(--text) !important; color:#fff !important; border-color:var(--text) !important; }

/* Blog / author archive -> branded post cards */
body.blog article.post, body.archive article.post{ background:var(--card) !important; border:1px solid var(--border) !important; border-top:2px solid var(--border-accent) !important; border-radius:16px !important; padding:28px 30px !important; margin:0 auto 24px !important; max-width:820px !important; transition:box-shadow var(--dur) var(--ease); }
body.blog article.post:hover, body.archive article.post:hover{ box-shadow:var(--sh-card); }
body.blog .entry-title, body.archive .entry-title{ font-family:'Aldrich',sans-serif !important; font-weight:400 !important; font-size:clamp(22px,3vw,28px) !important; line-height:1.15 !important; margin:0 0 8px !important; }
body.blog .entry-title a, body.archive .entry-title a{ color:var(--text) !important; text-decoration:none !important; box-shadow:none !important; }
body.blog .entry-title a:hover, body.archive .entry-title a:hover{ color:var(--primary-strong) !important; }
body.blog .entry-meta, body.archive .entry-meta{ font:700 12px/1.4 'Space Mono',monospace !important; letter-spacing:.04em; text-transform:uppercase; color:var(--dim) !important; }
body.blog .entry-meta a, body.archive .entry-meta a{ color:var(--primary-strong) !important; }
body.blog .entry-summary, body.archive .entry-summary, body.blog .entry-content, body.archive .entry-content{ font:16px/1.7 'Space Mono',monospace !important; color:var(--text-body) !important; margin-top:12px !important; }

/* blog featured image rounding */
body.blog .post-image, body.archive .post-image{ margin:0 0 16px !important; }
body.blog .post-image img, body.archive .post-image img{ border-radius:10px !important; display:block; width:100%; height:auto; }
body.single .post-image img{ border-radius:12px !important; }

/* Single post -> prose at 720 */
body.single .entry-header{ max-width:720px !important; margin:0 auto !important; padding:0 24px; }
body.single .entry-title{ font-family:'Aldrich',sans-serif !important; font-weight:400 !important; font-size:clamp(30px,5vw,46px) !important; line-height:1.05 !important; color:var(--text) !important; }
body.single .entry-meta{ font:700 12px/1.4 'Space Mono',monospace !important; letter-spacing:.06em; text-transform:uppercase; color:var(--dim) !important; }
body.single .entry-meta a{ color:var(--primary-strong) !important; }
body.single .entry-content{ max-width:720px !important; margin:24px auto 0 !important; padding:0 24px; font:17px/1.7 'Space Mono',monospace !important; color:var(--text-body) !important; }
body.single .entry-content h2, body.single .entry-content h3{ font-family:'Aldrich',sans-serif !important; font-weight:400 !important; color:var(--text) !important; line-height:1.2; margin:1.4em 0 .5em !important; }
body.single .entry-content h2{ font-size:28px !important; } body.single .entry-content h3{ font-size:22px !important; }
body.single .entry-content a{ color:var(--primary-strong) !important; text-decoration:underline; text-underline-offset:3px; }
body.single .entry-content blockquote{ border-left:3px solid var(--primary) !important; padding:4px 0 4px 18px !important; margin:0 0 1em !important; color:var(--text) !important; }
.vn-author-box{ max-width:720px !important; margin:48px auto 0 !important; }

/* Author archive -> branded header */
body.author .page-header{ max-width:820px !important; margin:0 auto 8px !important; }
</style>
<?php }, 1003);
