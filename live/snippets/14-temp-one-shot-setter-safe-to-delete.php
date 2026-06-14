<?php
/**
 * Code Snippet #14 — TEMP one-shot setter (safe to delete)
 * 
 * scope: global | active: False | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

$o = get_option('rank-math-options-titles', array());
if (!is_array($o)) { $o = array(); }
$o['knowledgegraph_logo'] = 'https://velocitynorth.ai/wp-content/uploads/2026/06/velocitynorth-icon-512.png';
$o['knowledgegraph_logo_id'] = 46;
$o['open_graph_image'] = 'https://velocitynorth.ai/wp-content/uploads/2026/06/velocitynorth-social-1200x630-1.png';
$o['open_graph_image_id'] = 50;
update_option('rank-math-options-titles', $o);
