<?php
/**
 * Code Snippet #8 — Footer — Privacy Policy link
 * Appends Privacy Policy link to footer navigation list.
 *
 * Scope: front-end  |  Priority: 10  |  Active: True
 *
 * SOURCE OF TRUTH: This snippet lives in the WordPress database (Code Snippets
 * plugin) on velocitynorth.ai. This file is an exported backup/record only.
 * Editing this file does NOT change the live site — edit via the Code Snippets
 * REST API or WP Admin → Snippets, then re-export.
 */

add_action('wp_head', function() { ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var ul = document.querySelector('.vn-footer-links');
  if (ul) {
    var li = document.createElement('li');
    li.innerHTML = '<a href="/privacy/">Privacy Policy</a>';
    ul.appendChild(li);
  }
});
</script>
<?php }, 20);
