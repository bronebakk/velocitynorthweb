<?php
/**
 * Code Snippet #32 — VN — Security headers (HSTS, CSP, X-Frame-Options, Referrer/Permissions-Policy)
 * 
 * scope: front-end | active: True | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('send_headers', function () {
  if (is_admin() || headers_sent()) { return; }
  header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
  header('X-Frame-Options: SAMEORIGIN');
  header("Content-Security-Policy: frame-ancestors 'self'; upgrade-insecure-requests");
  header('Referrer-Policy: strict-origin-when-cross-origin');
  header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
  header('X-Content-Type-Options: nosniff');
}, 100);
