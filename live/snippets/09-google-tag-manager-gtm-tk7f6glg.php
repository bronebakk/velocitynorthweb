<?php
/**
 * Code Snippet #9 — Google Tag Manager — GTM-TK7F6GLG
 * GTM container: script high in <head> (priority 1) + noscript right after <body> via wp_body_open.
 * scope: front-end | active: True | priority: 1
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('wp_head', function() { ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TK7F6GLG');</script>
<!-- End Google Tag Manager -->
<?php }, 1);

add_action('wp_body_open', function() { ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TK7F6GLG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php });
