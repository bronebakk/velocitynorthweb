<?php
/**
 * Code Snippet #14 — TEMP one-shot setter (safe to delete)
 * 
 * scope: global | active: False | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */


add_action('init', function(){
    if (!isset($_GET['ca_cta']) || $_GET['ca_cta'] !== 'vn2026') return;
    if (!headers_sent()) header('Content-Type: text/plain; charset=utf-8');
    $ca = get_option('ca_settings', array());
    if (!is_array($ca)) $ca = array();
    echo "cta_url before: ".(isset($ca['cta_url'])?$ca['cta_url']:'(unset)')."\n";
    $ca['cta_url'] = '';
    update_option('ca_settings', $ca);
    echo "cta_url after:  '".(isset($ca['cta_url'])?$ca['cta_url']:'')."'  (empty = CTA hidden)\n";
    exit;
});

