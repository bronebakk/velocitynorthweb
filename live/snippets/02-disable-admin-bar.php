<?php
/**
 * Code Snippet #2 — Disable admin bar
 * Turns off the WordPress admin bar for everyone except administrators.

This is a sample snippet. Feel free to use it, edit it, or remove it.
 * scope: front-end | active: False | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action( 'wp', function () {
	if ( ! current_user_can( 'manage_options' ) ) {
		show_admin_bar( false );
	}
} );
