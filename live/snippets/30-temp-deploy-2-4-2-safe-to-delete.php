<?php
/**
 * Code Snippet #30 — TEMP deploy 2.4.2 (safe to delete)
 * 
 * scope: global | active: False | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('init', function () {
    if ( ! isset($_GET['ca_deploy']) || $_GET['ca_deploy'] !== 'vn2026' ) { return; }
    require_once ABSPATH.'wp-admin/includes/file.php'; require_once ABSPATH.'wp-admin/includes/misc.php';
    require_once ABSPATH.'wp-admin/includes/plugin.php'; require_once ABSPATH.'wp-admin/includes/class-wp-upgrader.php';
    WP_Filesystem(); $plugin='compliance-audit-tool/compliance-audit-tool.php';
    $res=(new Plugin_Upgrader(new Automatic_Upgrader_Skin()))->install('https://velocitynorth.ai/wp-content/uploads/2026/06/compliance-audit-tool-2.4.2.zip', array('overwrite_package'=>true));
    if(!is_plugin_active($plugin)) activate_plugin($plugin);
    $d=get_plugin_data(WP_PLUGIN_DIR.'/'.$plugin,false,false);
    wp_send_json(array('install'=>is_wp_error($res)?('ERR:'.$res->get_error_message()):(bool)$res,'version'=>$d['Version']??'?'));
});

