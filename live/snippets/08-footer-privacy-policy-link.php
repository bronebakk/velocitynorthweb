<?php
/**
 * Code Snippet #8 — Footer — Privacy Policy link
 * Appends Privacy Policy link to footer navigation list.
 * scope: front-end | active: True | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
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
