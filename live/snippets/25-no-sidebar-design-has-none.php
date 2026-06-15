<?php
/**
 * Code Snippet #25 — No sidebar (design has none)
 * Force no-sidebar layout site-wide; the design never shows a widget sidebar.
 * scope: front-end | active: True | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_filter('generate_sidebar_layout', function($layout){ return 'no-sidebar'; }, 50);
