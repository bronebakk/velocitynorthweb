<?php
/**
 * Code Snippet #18 — Author bio box (single posts)
 * Appends a branded author bio box (avatar, name, bio) under blog posts.
 * scope: front-end | active: True | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_filter('the_content', function($content){
    if (!is_singular('post') || !in_the_loop() || !is_main_query()) return $content;
    $aid  = get_the_author_meta('ID');
    $name = esc_html(get_the_author_meta('display_name', $aid));
    $bio  = wp_kses_post(get_the_author_meta('description', $aid));
    if (!$bio) return $content;
    $photo    = 'https://velocitynorth.ai/wp-content/uploads/2026/06/yann-skaalen.png';
    $linkedin = 'https://www.linkedin.com/in/skaalen/';
    $avatar = '<img class="vn-author-photo" src="'.esc_url($photo).'" alt="'.$name.'" width="96" height="96" loading="lazy">';
    $box  = '<div class="vn-author-box">';
    $box .= '<div class="vn-author-avatar">'.$avatar.'</div>';
    $box .= '<div class="vn-author-meta">';
    $box .= '<p class="vn-author-eyebrow">// Written by</p>';
    $box .= '<p class="vn-author-name-lg">'.$name.'</p>';
    $box .= '<p class="vn-author-bio">'.$bio.'</p>';
    $box .= '<a class="vn-author-link" href="'.esc_url($linkedin).'" target="_blank" rel="noopener">Connect on LinkedIn &rarr;</a>';
    $box .= '</div></div>';
    return $content . $box;
}, 20);

add_action('wp_head', function(){
    if (!is_singular('post')) return; ?>
<style>
.vn-author-box{display:flex;gap:1.5rem;margin-top:3rem;padding:1.5rem 1.75rem;background:#FFFFFF;border:1px solid rgba(0,0,0,.10);border-top:2px solid rgba(209,64,47,.45);font-family:'Space Mono',monospace;align-items:flex-start;}
.vn-author-photo{flex:none !important;width:96px !important;height:96px !important;min-width:96px;object-fit:cover !important;object-position:center 18% !important;border-radius:50% !important;display:block;filter:grayscale(.08);}
.vn-author-eyebrow{font-family:'Aldrich',sans-serif;font-size:.6875rem;text-transform:uppercase;letter-spacing:.12em;color:#D1402F;margin:0 0 .35rem;}
.vn-author-name-lg{font-family:'Aldrich',sans-serif;font-size:1.15rem;color:#1A1411;margin:0 0 .6rem;}
.vn-author-bio{font-size:.85rem;line-height:1.65;color:#6E5B55;margin:0 0 .65rem;}
.vn-author-link{font-family:'Aldrich',sans-serif;font-size:.7rem;text-transform:uppercase;letter-spacing:.08em;color:#D1402F;text-decoration:none;}
.vn-author-link:hover{text-decoration:underline;}
@media(max-width:600px){.vn-author-box{flex-direction:column;gap:1rem;}}
</style>
<?php });
