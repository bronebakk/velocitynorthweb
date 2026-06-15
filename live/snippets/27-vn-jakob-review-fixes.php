<?php
/**
 * Code Snippet #27 — VN — Jakob review fixes
 * Truth-gap section alignment, testimonials grid margins, tools CTA white text.
 * scope: front-end | active: True | priority: 30
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('wp_head', function(){ ?>
<style id="vn-jakob-fixes">
/* #1 — restore horizontal container padding on all home sections (vn-h__section
   shorthand padding was zeroing it, misaligning truth-gap vs hero) */
.vn-h__wrap{ padding-left:32px !important; padding-right:32px !important; }
/* #4 — testimonials grid + filters not cramped against the margin */
.vn-tst-grid, .vn-tst-filters{ max-width:1180px !important; margin-left:auto !important; margin-right:auto !important; padding-left:32px !important; padding-right:32px !important; box-sizing:border-box; }
/* #5 — Tools CTA: white text on the red button (was red-on-red) */
.vn-h__section.vn-h__case{ padding-left:32px !important; padding-right:32px !important; }
.vn-tool-cta{ background:var(--primary) !important; color:#fff !important; }
.vn-tool-cta:hover{ background:var(--primary-strong) !important; filter:none !important; }
@media(max-width:760px){ .vn-h__wrap, .vn-tst-grid, .vn-tst-filters{ padding-left:20px !important; padding-right:20px !important; } }
</style>
<?php }, 1100);
