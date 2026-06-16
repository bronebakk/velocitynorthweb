<?php
/**
 * Code Snippet #14 — TEMP one-shot setter (safe to delete)
 * 
 * scope: global | active: False | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('init', function () {
	if ( empty($_GET['ca_mailtest']) ) { return; }
	$o = get_option('wp_mail_smtp', array());
	$m = isset($o['mail']['mailer']) ? $o['mail']['mailer'] : '?';
	$tok = !empty($o['gmail']['access_token']) ? 'yes' : 'NO';
	$refresh = !empty($o['gmail']['refresh_token']) ? 'yes' : 'NO';
	$err = '';
	add_action('wp_mail_failed', function ($e) use (&$err) { $err = $e->get_error_message(); });
	$ok = wp_mail('yann@velocitynorth.ai', 'Velocity North - production deliverability test', 'Sent via Google OAuth (published app). Check inbox + Show original for spf/dkim/dmarc=pass.');
	nocache_headers(); header('Content-Type: text/plain; charset=utf-8');
	echo ($ok ? 'RESULT: SENT OK' : 'RESULT: FAILED') . "\nmailer=" . $m . "  authorized=" . $tok . "  refresh_token=" . $refresh . "\nERROR: " . substr($err,0,250) . "\n";
	exit;
});

