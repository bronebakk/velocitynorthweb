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
    if (!isset($_GET['ca_ftest']) || $_GET['ca_ftest'] !== 'vn2026') return;
    if (!headers_sent()) header('Content-Type: text/plain; charset=utf-8');
    global $wpdb; $t=$wpdb->prefix.'ca_leads';
    $tok = bin2hex(random_bytes(16));
    $results = array('url'=>'https://selftest-'.time().'.example.com','overall'=>63,'grade'=>'C');
    $lead = CA_Leads::record('selftest@example-corp.com', $results, array(
        'first_name'=>'Test','last_name'=>'Person','company'=>'Example Corp',
        'marketing'=>1,'marketing_status'=>'pending','marketing_token'=>$tok,
        'consent_text'=>'I agree...','consent_version'=>CA_Leads::CONSENT_VERSION,'ip'=>'203.0.113.9',
    ));
    $id=(int)$lead['id'];
    $row=$wpdb->get_row($wpdb->prepare("SELECT first_name,company,marketing,marketing_status,consent_version,ip FROM $t WHERE id=%d",$id),ARRAY_A);
    echo "INSERTED id=$id: ".json_encode($row)."\n";
    $email = CA_Leads::confirm_marketing($tok);
    $row2=$wpdb->get_row($wpdb->prepare("SELECT marketing_status,marketing_confirmed_at FROM $t WHERE id=%d",$id),ARRAY_A);
    echo "confirm_marketing returned: ".var_export($email,true)."\n";
    echo "AFTER confirm: ".json_encode($row2)."\n";
    echo "recently_requested(same): ".var_export(CA_Leads::recently_requested('selftest@example-corp.com','selftest-'.'x'),true)." (domain differs -> false expected)\n";
    // cleanup
    $wpdb->delete($t, array('id'=>$id), array('%d'));
    echo "cleaned up test row\n";
    exit;
});

