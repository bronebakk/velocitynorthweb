<?php
/**
 * Code Snippet #22 — VN Design System — Home (P2)
 * Truth-gap radii/shadow, console depth, logo strip grayscale->color.
 * scope: front-end | active: True | priority: 22
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('wp_head', function(){ ?>
<style id="vn-ds-home">
/* ===== VN DESIGN SYSTEM — P2 HOME ===== */
/* Truth-gap module (D): card radius + lift, console radius + deep shadow */
.vn-h__compare{ border-radius:16px !important; overflow:hidden !important; box-shadow:var(--sh-card) !important; border:1px solid var(--border) !important; }
.vn-h__console{ border-radius:12px !important; overflow:hidden !important; box-shadow:var(--sh-console) !important; }
/* gap pillar emphasis stays; panels keep dividers */
.vn-h__gapval{ font-family:'Aldrich',sans-serif !important; }
/* Stat/value numbers in Aldrich (E) */
.vn-h__num, .vn-h__gapval{ line-height:1 !important; }
/* Client logo strip (J): grayscale at rest -> color on hover */
.vn-h__logos img{ filter:grayscale(1) opacity(.55) !important; transition:filter var(--dur) var(--ease),opacity var(--dur) var(--ease) !important; }
.vn-h__logos img:hover{ filter:grayscale(0) opacity(1) !important; }
.vn-h__clabel{ font:700 13px/1.4 'Space Mono',monospace !important; letter-spacing:.16em !important; text-transform:uppercase; color:var(--dim) !important; }
/* Hero CTAs use the new buttons (already via P0); ensure section rhythm */
.vn-h__section, .vn-h__hero, .vn-h__clients{ /* rhythm handled by existing spacing */ }
</style>
<?php }, 1002);
