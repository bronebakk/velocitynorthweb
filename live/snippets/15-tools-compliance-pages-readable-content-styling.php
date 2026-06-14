<?php
/**
 * Code Snippet #15 — Tools/Compliance pages — readable content styling
 * 
 * scope: front-end | active: True | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('wp_head', function () {
	if ( ! is_page( array(32,47) ) ) return;
	?>
<style id="vn-tools-pages">
html body.page-id-32 .entry-content,
html body.page-id-47 .entry-content {
	max-width:760px !important; margin:0 auto !important; padding:8px 24px 72px !important; color:#2a211e !important;
}
html body.page-id-32 .entry-content p, html body.page-id-47 .entry-content p,
html body.page-id-32 .entry-content li, html body.page-id-47 .entry-content li {
	color:#2a211e !important; font-size:1.02rem; line-height:1.7;
}
html body.page-id-32 .entry-content strong, html body.page-id-47 .entry-content strong { color:#1a1411 !important; }
html body.page-id-32 .entry-content h2, html body.page-id-47 .entry-content h2 {
	color:#000426 !important; font-family:'Aldrich',sans-serif; font-size:1.55rem;
	margin:2.6rem 0 .9rem; padding-bottom:.45rem; border-bottom:2px solid #d1402f;
}
html body.page-id-32 .entry-content h3, html body.page-id-47 .entry-content h3 {
	color:#1a1411 !important; font-family:'Aldrich',sans-serif; font-size:1.12rem; margin:1.7rem 0 .35rem;
}
html body.page-id-32 .entry-content > p:first-of-type,
html body.page-id-47 .entry-content > p:first-of-type { font-size:1.15rem; color:#3a2f2a !important; line-height:1.6; }
html body.page-id-32 .ca-widget { margin:1.5rem auto 2.5rem; }
.vn-tool-cta { display:inline-block; background:#d1402f; color:#fff !important; text-decoration:none;
	font-weight:700; padding:13px 28px; border-radius:10px; font-family:'Space Mono',monospace; }
.vn-tool-cta:hover { filter:brightness(.92); }
html body.page-id-32 .entry-header, html body.page-id-47 .entry-header { display:block !important; max-width:760px; margin:0 auto; padding:8px 24px 0; }
html body.page-id-32 .entry-title, html body.page-id-47 .entry-title { color:#000426 !important; font-family:'Aldrich',sans-serif; font-size:2rem; line-height:1.15; margin:28px 0 4px; padding:0; }
html body.page-id-54 .entry-content { max-width:1140px !important; margin:0 auto !important; padding:8px 24px 72px !important; color:#2a211e !important; }
html body.page-id-54 .entry-content p { color:#2a211e !important; }
html body.page-id-54 .entry-content > p:first-of-type { font-size:1.15rem; color:#3a2f2a !important; }
html body.page-id-54 .entry-header { display:block !important; max-width:1140px; margin:0 auto; padding:8px 24px 0; }
html body.page-id-54 .entry-title { color:#000426 !important; font-family:'Aldrich',sans-serif; font-size:2rem; line-height:1.15; margin:28px 0 4px; padding:0; }
</style>
	<?php
}, 50);
