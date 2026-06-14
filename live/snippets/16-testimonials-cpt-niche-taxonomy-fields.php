<?php
/**
 * Code Snippet #16 — Testimonials — CPT + niche taxonomy + fields
 * 
 * scope: global | active: True | priority: 10
 *
 * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).
 * This file is an exported backup — editing it does NOT change the live site.
 */

add_action('init', function () {
	register_post_type('testimonial', array(
		'labels' => array('name'=>'Testimonials','singular_name'=>'Testimonial','add_new_item'=>'Add Testimonial','edit_item'=>'Edit Testimonial'),
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_rest' => true,
		'rest_base' => 'testimonials',
		'menu_icon' => 'dashicons-format-quote',
		'supports' => array('title','editor','thumbnail','excerpt','page-attributes','custom-fields'),
		'has_archive' => false,
		'exclude_from_search' => true,
	));
	register_taxonomy('testimonial_niche', 'testimonial', array(
		'labels' => array('name'=>'Niches','singular_name'=>'Niche'),
		'public' => false,
		'show_ui' => true,
		'show_in_rest' => true,
		'rest_base' => 'testimonial-niche',
		'hierarchical' => true,
		'show_admin_column' => true,
	));
	$meta = array('vn_author'=>'string','vn_role'=>'string','vn_company'=>'string','vn_result'=>'string','vn_rating'=>'integer','vn_logo'=>'string','vn_case_url'=>'string');
	foreach ($meta as $k => $type) {
		register_post_meta('testimonial', $k, array(
			'type' => $type, 'single' => true, 'show_in_rest' => true,
			'auth_callback' => function () { return current_user_can('edit_posts'); },
		));
	}
});

