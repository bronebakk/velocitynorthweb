<?php
/**
 * Code Snippet #11 — HubSpot cookie banner — terminal styling
 * Restyles the HubSpot EU cookie consent banner to match the dark terminal design.
 * scope: front-end | active: True | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('wp_head', function() { ?>
<style id="vn-cookie-banner">
#hs-eu-cookie-confirmation { position:fixed !important; top:auto !important; bottom:0 !important; left:0 !important; right:0 !important; width:100% !important; max-width:100% !important; background:#141210 !important; border:1px solid rgba(219,68,52,.35) !important; box-shadow:0 18px 40px -10px rgba(0,0,0,.55) !important; border-radius:0 !important; }
#hs-eu-cookie-confirmation #hs-eu-cookie-confirmation-inner { background:#141210 !important; padding:20px 24px !important; }
#hs-eu-cookie-confirmation #hs-eu-cookie-confirmation-inner p,
#hs-eu-cookie-confirmation #hs-eu-policy-wording,
#hs-eu-cookie-confirmation #hs-eu-policy-wording p { color:#ba8077 !important; font-family:'Space Mono',monospace !important; font-size:.72rem !important; line-height:1.6 !important; }
#hs-eu-cookie-confirmation #hs-eu-policy-wording a,
#hs-eu-cookie-confirmation a { color:#f0ada2 !important; }
#hs-eu-cookie-confirmation #hs-eu-cookie-confirmation-buttons-area { margin-top:10px !important; }
#hs-eu-cookie-confirmation #hs-eu-confirmation-button {
  background:#b5362a !important; border:2px solid #b5362a !important; color:#fff !important;
  font-family:'Aldrich',sans-serif !important; text-transform:uppercase !important; letter-spacing:.08em !important;
  font-size:.72rem !important; padding:9px 22px !important; border-radius:0 !important; }
#hs-eu-cookie-confirmation #hs-eu-decline-button {
  background:transparent !important; border:2px solid rgba(219,68,52,.45) !important; color:#ba8077 !important;
  font-family:'Aldrich',sans-serif !important; text-transform:uppercase !important; letter-spacing:.08em !important;
  font-size:.72rem !important; padding:9px 22px !important; border-radius:0 !important; }
#hs-eu-cookie-confirmation #hs-eu-decline-button:hover { color:#db4434 !important; }
#hs-eu-cookie-confirmation #hs-eu-cookie-settings-button { color:#f0ada2 !important; }
</style>
<?php }, 50);
