<?php
/**
 * Code Snippet #11 — HubSpot cookie banner — terminal styling
 * Restyles the HubSpot EU cookie consent banner to match the dark terminal design.
 *
 * Scope: front-end  |  Priority: 10  |  Active: True
 *
 * SOURCE OF TRUTH: This snippet lives in the WordPress database (Code Snippets
 * plugin) on velocitynorth.ai. This file is an exported backup/record only.
 * Editing this file does NOT change the live site — edit via the Code Snippets
 * REST API or WP Admin → Snippets, then re-export.
 */

add_action('wp_head', function() { ?>
<style id="vn-cookie-banner">
#hs-eu-cookie-confirmation { background:#141210 !important; border:1px solid rgba(219,68,52,.35) !important; box-shadow:0 18px 40px -10px rgba(0,0,0,.55) !important; border-radius:0 !important; }
#hs-eu-cookie-confirmation #hs-eu-cookie-confirmation-inner { background:#141210 !important; padding:20px 24px !important; }
#hs-eu-cookie-confirmation #hs-eu-cookie-confirmation-inner p,
#hs-eu-cookie-confirmation #hs-eu-policy-wording,
#hs-eu-cookie-confirmation #hs-eu-policy-wording p { color:#ba8077 !important; font-family:'Space Mono',monospace !important; font-size:.72rem !important; line-height:1.6 !important; }
#hs-eu-cookie-confirmation #hs-eu-policy-wording a,
#hs-eu-cookie-confirmation a { color:#db4434 !important; }
#hs-eu-cookie-confirmation #hs-eu-cookie-confirmation-buttons-area { margin-top:10px !important; }
#hs-eu-cookie-confirmation #hs-eu-confirmation-button {
  background:#db4434 !important; border:2px solid #db4434 !important; color:#fff !important;
  font-family:'Aldrich',sans-serif !important; text-transform:uppercase !important; letter-spacing:.08em !important;
  font-size:.72rem !important; padding:9px 22px !important; border-radius:0 !important; }
#hs-eu-cookie-confirmation #hs-eu-decline-button {
  background:transparent !important; border:2px solid rgba(219,68,52,.45) !important; color:#ba8077 !important;
  font-family:'Aldrich',sans-serif !important; text-transform:uppercase !important; letter-spacing:.08em !important;
  font-size:.72rem !important; padding:9px 22px !important; border-radius:0 !important; }
#hs-eu-cookie-confirmation #hs-eu-decline-button:hover { color:#db4434 !important; }
</style>
<?php }, 50);
