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
    if (!isset($_GET['ca_int']) || $_GET['ca_int'] !== 'vn2026') return;
    if (!headers_sent()) header('Content-Type: text/plain; charset=utf-8');
    echo "plugin_version: ".(defined('CA_VERSION')?CA_VERSION:'?')."\n";
    if (!class_exists('CA_Scanner')) { echo "no scanner\n"; exit; }
    $t0=microtime(true);
    $r = (new CA_Scanner('https://www.nordicsport.se'))->run();
    if (!is_array($r)) { echo "scan error\n"; exit; }
    echo "scan time: ".round(microtime(true)-$t0,1)."s\n";
    echo "overall: ".$r['overall']." (".$r['grade'].")\n";
    echo "categories:\n";
    foreach ($r['categories'] as $k=>$c) echo sprintf("  %-14s %d/100 (%s)\n",$k,$c['score'],$c['grade']);
    echo "accessibility axe-driven? ";
    $axe=false; foreach($r['categories']['accessibility']['checks'] as $c){ if(stripos($c['text'],'axe-core')!==false){$axe=true;} }
    echo ($axe?'YES':'no')."\n";
    echo "cookie_inventory rows: ".count($r['cookie_inventory'])."\n";
    echo "\nNew consent checks (post-consent / multi-page):\n";
    foreach($r['categories']['consent']['checks'] as $c){
        if (stripos($c['text'],'reject')!==false || stripos($c['text'],'pages checked')!==false || stripos($c['text'],'inner pages')!==false)
            echo "  [".strtoupper($c['status'])."] ".$c['text']."\n";
    }
    echo "\nAccessibility checks:\n";
    foreach($r['categories']['accessibility']['checks'] as $c) echo "  [".strtoupper($c['status'])."] ".$c['text']."\n";
    exit;
});

