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
    if (!isset($_GET['ca_pdftest']) || $_GET['ca_pdftest'] !== 'vn2026') return;
    if (!headers_sent()) header('Content-Type: text/plain; charset=utf-8');
    @set_time_limit(150);
    // FRESH scan (ignore 4h cache) so we test current output
    delete_transient('ca_scan_'.md5('digtective.com'));
    $r = (new CA_Scanner('https://digtective.com'))->run();
    if (!is_array($r)) { echo "scan failed\n"; exit; }
    $pdf = (new CA_Report($r))->build_pdf();
    echo "overall: ".$r['overall']."/".$r['grade']."\n";
    echo "categories: ".implode(', ', array_keys($r['categories']))."\n";
    echo "pdf bytes: ".strlen($pdf)." | starts %PDF: ".(substr($pdf,0,4)==='%PDF'?'YES':'NO')."\n";
    echo "cookie_inventory rows: ".count($r['cookie_inventory'])."\n";
    // temp write check
    $tmp = get_temp_dir(); echo "temp dir writable: ".(is_writable($tmp)?'YES':'NO')." (".$tmp.")\n";
    // send a real report to the owner so the attachment can be verified
    $sent = (new CA_Mailer())->send_report('yann@velocitynorth.ai', $r, $pdf);
    echo "send_report -> ".($sent?'SENT':'FAILED')." (attachment to yann@velocitynorth.ai)\n";
    exit;
});

