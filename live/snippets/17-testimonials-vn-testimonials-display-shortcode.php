<?php
/**
 * Code Snippet #17 — Testimonials — [vn_testimonials] display shortcode
 * 
 * scope: front-end | active: True | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_shortcode('vn_testimonials', function ($atts) {
	$a = shortcode_atts(array('niche' => '', 'preview' => ''), $atts);
	$status = array('publish');
	if (current_user_can('edit_posts') || $a['preview'] === '1') { $status[] = 'draft'; }
	$args = array('post_type'=>'testimonial','post_status'=>$status,'posts_per_page'=>-1,'orderby'=>'menu_order date','order'=>'ASC');
	if ($a['niche']) { $args['tax_query'] = array(array('taxonomy'=>'testimonial_niche','field'=>'slug','terms'=>array_map('trim', explode(',', $a['niche'])))); }
	$q = new WP_Query($args);
	if (!$q->have_posts()) { return '<p>No testimonials yet.</p>'; }

	static $css_done = false;
	ob_start();
	if (!$css_done) { $css_done = true; ?>
<style id="vn-tst-css">
.vn-tst-filters{display:flex;flex-wrap:wrap;gap:8px;margin:8px 0 20px}
.vn-tst-filter{background:#fff;border:1px solid #d4d8e0;border-radius:999px;padding:8px 16px;font-size:.85rem;cursor:pointer;font-family:'Space Mono',monospace;color:#2a211e}
.vn-tst-filter.active{background:#d1402f;color:#fff;border-color:#d1402f}
.vn-tst-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:20px;margin:8px 0 32px}
.vn-tst-card{background:#fff;border:1px solid #ead9d4;border-radius:14px;padding:24px;display:flex;flex-direction:column}
.vn-tst-result{font-family:'Aldrich',sans-serif;font-size:1.45rem;line-height:1.1;color:#d1402f;font-weight:700;margin:0 0 10px}
.vn-tst-stars{color:#d1402f;letter-spacing:2px;font-size:.95rem;margin:0 0 10px}
.vn-tst-quote{color:#2a211e;line-height:1.6;font-size:1rem;margin:0 0 16px;flex:1}
.vn-tst-author{font-weight:700;color:#000426;font-size:.95rem}
.vn-tst-role{color:#6e5b55;font-size:.85rem}
.vn-tst-tag{display:inline-block;margin-top:14px;font-size:.68rem;text-transform:uppercase;letter-spacing:.08em;color:#6e5b55;border:1px solid #ead9d4;border-radius:999px;padding:3px 10px;width:max-content}
.vn-tst-more{margin:0 0 14px}
.vn-tst-more summary{color:#d1402f;font-weight:600;cursor:pointer;font-size:.9rem;list-style:none;font-family:'Space Mono',monospace}
.vn-tst-more summary::-webkit-details-marker{display:none}
.vn-tst-more summary::after{content:' \2192'}
.vn-tst-more[open] summary::after{content:' \2191'}
.vn-tst-full{margin-top:12px;color:#2a211e;font-size:.92rem;line-height:1.6}
.vn-tst-full p{margin:0 0 .8rem}
</style>
<?php }

	$show_filters = ($a['niche'] === '');
	if ($show_filters) {
		$terms = get_terms(array('taxonomy'=>'testimonial_niche','hide_empty'=>true));
		if (!is_wp_error($terms) && count($terms) > 1) {
			echo '<div class="vn-tst-filters"><button class="vn-tst-filter active" data-f="all">All</button>';
			foreach ($terms as $t) { echo '<button class="vn-tst-filter" data-f="'.esc_attr($t->slug).'">'.esc_html($t->name).'</button>'; }
			echo '</div>';
		}
	}

	echo '<div class="vn-tst-grid">';
	while ($q->have_posts()) { $q->the_post(); $id = get_the_ID();
		$author=get_post_meta($id,'vn_author',true); $role=get_post_meta($id,'vn_role',true);
		$company=get_post_meta($id,'vn_company',true); $result=get_post_meta($id,'vn_result',true);
		$rating=(int)get_post_meta($id,'vn_rating',true); $case=get_post_meta($id,'vn_case_url',true);
		$slugs=wp_get_post_terms($id,'testimonial_niche',array('fields'=>'slugs'));
		$names=wp_get_post_terms($id,'testimonial_niche',array('fields'=>'names'));
		$nslug=$slugs && !is_wp_error($slugs) ? $slugs[0] : '';
		$nname=$names && !is_wp_error($names) ? $names[0] : '';
		echo '<div class="vn-tst-card" data-niche="'.esc_attr($nslug).'">';
		if ($result) echo '<div class="vn-tst-result">'.esc_html($result).'</div>';
		if ($rating>0) { $s=str_repeat('★',min(5,$rating)).str_repeat('☆',max(0,5-$rating)); echo '<div class="vn-tst-stars">'.$s.'</div>'; }
		echo '<p class="vn-tst-quote">'.esc_html(get_the_excerpt()).'</p>';
		$__full = get_the_content();
		if ( $__full && strlen(wp_strip_all_tags($__full)) > strlen(get_the_excerpt()) + 30 ) {
			echo '<details class="vn-tst-more"><summary>Read the full story</summary><div class="vn-tst-full">'.wpautop(esc_html($__full)).'</div></details>';
		}
		if ($author||$role||$company) {
			echo '<div class="vn-tst-author">'.esc_html(trim($author)).'</div>';
			$meta=trim($role).($role&&$company?', ':'').trim($company);
			if ($meta) echo '<div class="vn-tst-role">'.esc_html($meta).'</div>';
		}
		if ($case) echo '<a class="vn-tst-role" href="'.esc_url($case).'">Read the case study &rarr;</a>';
		if ($nname) echo '<span class="vn-tst-tag">'.esc_html($nname).'</span>';
		echo '</div>';
	}
	echo '</div>';
	wp_reset_postdata();

	if ($show_filters) { ?>
<script>
(function(){var r=document.currentScript.previousElementSibling;while(r&&!r.classList.contains('vn-tst-grid'))r=r.previousElementSibling;
var box=r?r.parentNode:document;var btns=box.querySelectorAll('.vn-tst-filter');var cards=box.querySelectorAll('.vn-tst-card');
btns.forEach(function(b){b.addEventListener('click',function(){btns.forEach(function(x){x.classList.remove('active')});b.classList.add('active');var f=b.getAttribute('data-f');cards.forEach(function(c){c.style.display=(f==='all'||c.getAttribute('data-niche')===f)?'':'none'})})});})();
</script>
<?php }
	return ob_get_clean();
});

