<?php
/**
 * Code Snippet #1 — Make upload filenames lower case
 * Makes sure that image and file uploads have lower case filenames.

This is a sample snippet. Feel free to use it, edit it, or remove it.
 * scope: global | active: False | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_filter( 'sanitize_file_name', 'mb_strtolower' );
