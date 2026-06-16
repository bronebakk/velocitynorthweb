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
    if (!isset($_GET['ca_v']) || $_GET['ca_v'] !== 'vn2026') return;
    if (!headers_sent()) header('Content-Type: text/plain; charset=utf-8');
    global $wpdb;
    echo "plugin_version: ".(defined('CA_VERSION')?CA_VERSION:'?')."\n";
    echo "leads_db_version: ".get_option('ca_leads_db')."\n";
    $t = $wpdb->prefix.'ca_leads';
    $cols = $wpdb->get_col("SHOW COLUMNS FROM $t");
    foreach (array('first_name','last_name','company','marketing') as $c)
        echo "  col $c: ".(in_array($c,$cols)?'YES':'MISSING')."\n";
    if (class_exists('Compliance_Audit_Tool')) {
        echo "is_free_email gmail.com: ".(Compliance_Audit_Tool::is_free_email('x@gmail.com')?'BLOCKED':'allowed')."\n";
        echo "is_free_email digtective.com: ".(Compliance_Audit_Tool::is_free_email('x@digtective.com')?'blocked':'ALLOWED')."\n";
    }
    echo "cta_url: '".CA_Settings::get('cta_url','')."'\n";
    exit;
});

