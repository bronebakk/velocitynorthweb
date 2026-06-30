<?php
/**
 * Code Snippet #28 — TEMP deploy 2.4.0 (safe to delete)
 * 
 * scope: global | active: False | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('init', function () {
    if ( ! isset($_GET['ca_deploy']) || $_GET['ca_deploy'] !== 'vn2026' ) { return; }
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/misc.php';
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    WP_Filesystem();
    $plugin = 'compliance-audit-tool/compliance-audit-tool.php';
    $skin = new Automatic_Upgrader_Skin();
    $up   = new Plugin_Upgrader($skin);
    $res  = $up->install('https://velocitynorth.ai/wp-content/uploads/2026/06/compliance-audit-tool-2.4.0.zip', array('overwrite_package' => true));
    $active_after = is_plugin_active($plugin);
    if ( ! $active_after ) { $act = activate_plugin($plugin); $active_after = is_plugin_active($plugin); }
    $data = function_exists('get_plugin_data') ? get_plugin_data(WP_PLUGIN_DIR.'/'.$plugin, false, false) : array();
    wp_send_json(array(
        'install'     => is_wp_error($res) ? ('ERR:'.$res->get_error_message()) : ($res ? true : false),
        'version'     => isset($data['Version']) ? $data['Version'] : '?',
        'dpf_file'    => file_exists(WP_PLUGIN_DIR.'/compliance-audit-tool/includes/class-ca-dpf.php'),
        'active'      => $active_after,
        'messages'    => array_slice((array)$skin->get_upgrade_messages(), -4),
    ));
});

