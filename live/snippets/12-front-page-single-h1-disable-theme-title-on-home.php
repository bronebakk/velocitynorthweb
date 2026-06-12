<?php
/**
 * Code Snippet #12 — Front page — single H1 (disable theme title on home)
 * Removes the GeneratePress entry-title <h1> from the DOM on the front page so the hero is the only H1. Added by Compliance Audit setup.
 * scope: front-end | active: True | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_filter( 'generate_show_title', function ( $show ) {
	return is_front_page() ? false : $show;
} );
