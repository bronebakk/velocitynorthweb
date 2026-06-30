<?php
/**
 * Code Snippet #34 — TEMP props (safe to delete)
 * 
 * scope: global | active: False | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('init', function () {
    if ( ! isset($_GET['ca_props']) || $_GET['ca_props'] !== 'vn2026' ) { return; }
    $token = CA_Settings::get('hubspot_token','');
    if ('' === $token) { wp_send_json(array('error'=>'no hubspot_token in ca_settings')); }
    $base='https://api.hubapi.com/crm/v3/properties/contacts';
    $hdr=array('Authorization'=>'Bearer '.$token,'Content-Type'=>'application/json');
    $defs=array(
      array('name'=>'compliance_status','label'=>'Compliance Status','type'=>'enumeration','fieldType'=>'select','groupName'=>'contactinformation',
        'options'=>array(
          array('label'=>'Compliant','value'=>'compliant','displayOrder'=>0),
          array('label'=>'At risk','value'=>'at_risk','displayOrder'=>1),
          array('label'=>'Not compliant','value'=>'not_compliant','displayOrder'=>2),
        )),
      array('name'=>'compliance_tier','label'=>'Compliance Tier','type'=>'enumeration','fieldType'=>'select','groupName'=>'contactinformation',
        'options'=>array(
          array('label'=>'Excellent','value'=>'Excellent','displayOrder'=>0),
          array('label'=>'Good','value'=>'Good','displayOrder'=>1),
          array('label'=>'Needs improvement','value'=>'Needs improvement','displayOrder'=>2),
          array('label'=>'Poor','value'=>'Poor','displayOrder'=>3),
          array('label'=>'Critical','value'=>'Critical','displayOrder'=>4),
        )),
    );
    $out=array();
    foreach ($defs as $d) {
      $check=wp_remote_get($base.'/'.$d['name'], array('headers'=>$hdr,'timeout'=>20));
      $code=wp_remote_retrieve_response_code($check);
      if (200===$code) { $out[$d['name']]='exists'; continue; }
      $res=wp_remote_post($base, array('headers'=>$hdr,'timeout'=>20,'body'=>wp_json_encode($d)));
      $rc=wp_remote_retrieve_response_code($res);
      $out[$d['name']]= (201===$rc||200===$rc) ? 'created' : ('ERR '.$rc.': '.substr(wp_remote_retrieve_body($res),0,160));
    }
    wp_send_json($out);
});

