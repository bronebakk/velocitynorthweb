<?php
/**
 * Code Snippet #26 — Single H1 — suppress GP page title
 * Pages use a custom hero H1; remove GPs (hidden) duplicate page-title H1.
 * scope: front-end | active: True | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_filter('generate_show_title', function($show){ if(is_page()) return false; return $show; }, 50);
