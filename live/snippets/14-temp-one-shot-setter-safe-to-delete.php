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
    if (!isset($_GET['ca_urltest']) || $_GET['ca_urltest'] !== 'vn2026') return;
    if (!headers_sent()) header('Content-Type: text/plain; charset=utf-8');
    echo "plugin_version: ".(defined('CA_VERSION')?CA_VERSION:'?')."\n\n";
    $inputs = array('www.nordicsport.se','digtective.com','velocitynorth.ai','https://www.velocitynorth.ai');
    foreach ($inputs as $raw) {
        $u = $raw;
        if ($u !== '' && !preg_match('#^https?://#i',$u)) $u = 'https://'.ltrim($u,'/');
        $u = esc_url_raw($u);
        $valid = (bool) filter_var($u, FILTER_VALIDATE_URL);
        $pub   = class_exists('CA_Scanner') ? CA_Scanner::is_public_url($u) : false;
        echo sprintf("input=%-30s normalized=%-34s valid=%s public=%s\n", $raw, $u, $valid?'YES':'no', $pub?'YES':'no');
    }
    exit;
});

