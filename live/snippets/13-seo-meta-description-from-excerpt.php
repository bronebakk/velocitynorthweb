<?php
/**
 * Code Snippet #13 — SEO — meta description from excerpt
 * Outputs a <meta name=description> from the page/post excerpt (site has no SEO plugin).
 * scope: front-end | active: False | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action( 'wp_head', function () {
	if ( is_singular() ) {
		$e = get_the_excerpt();
		if ( $e ) {
			echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $e ) ) . '">' . "\n";
		}
	}
}, 1 );
