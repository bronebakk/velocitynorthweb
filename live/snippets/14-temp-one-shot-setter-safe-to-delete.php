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
    if (!isset($_GET['ca_btest']) || $_GET['ca_btest'] !== 'vn2026') return;
    if (!headers_sent()) header('Content-Type: text/plain; charset=utf-8');
    if (!class_exists('CA_Scanner')) { echo "PLUGIN NOT LOADED\n"; exit; }
    $url = 'https://www.nordicsport.se';
    $t0 = microtime(true);
    $results = (new CA_Scanner($url))->run();
    $dt = round(microtime(true)-$t0,1);
    if (!is_array($results)) { echo "SCAN ERROR\n"; exit; }
    echo "BEHAVIORAL TEST (".$dt."s)\n";
    echo "overall: ".$results['overall']." (".$results['grade'].")\n";
    echo "behavioral: ".(empty($results['behavioral'])?'(none — worker not called)':json_encode($results['behavioral']))."\n\n";
    echo "Consent-category checks:\n";
    foreach ($results['categories']['consent']['checks'] as $c) {
        echo "  [".strtoupper($c['status'])."] ".$c['text']."\n";
    }
    exit;
});

