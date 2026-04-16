&lt;?php
/**
 * Velocity North Theme Functions
 *
 * @package VelocityNorth
 */

if ( ! defined( &#039;ABSPATH&#039; ) ) {
    exit;
}

/**
 * Theme setup
 */
function velocitynorth_setup() {
    add_theme_support( &#039;title-tag&#039; );
    add_theme_support( &#039;post-thumbnails&#039; );
    add_theme_support( &#039;html5&#039;, array( &#039;search-form&#039;, &#039;comment-form&#039;, &#039;gallery&#039;, &#039;caption&#039; ) );
    add_theme_support( &#039;custom-logo&#039; );

    register_nav_menus( array(
        &#039;primary&#039; =&gt; __( &#039;Primary Menu&#039;, &#039;velocitynorth&#039; ),
    ) );
}
add_action( &#039;after_setup_theme&#039;, &#039;velocitynorth_setup&#039; );

/**
 * Enqueue styles
 */
function velocitynorth_scripts() {
    wp_enqueue_style( &#039;velocitynorth-style&#039;, get_stylesheet_uri(), array(), &#039;1.0.0&#039; );
}
add_action( &#039;wp_enqueue_scripts&#039;, &#039;velocitynorth_scripts&#039; );

/**
 * Set front page to &quot;Home&quot; page after import
 */
function velocitynorth_set_front_page() {
    $home = get_page_by_path( &#039;home&#039; );
    if ( $home ) {
        update_option( &#039;show_on_front&#039;, &#039;page&#039; );
        update_option( &#039;page_on_front&#039;, $home-&gt;ID );
    }
}
add_action( &#039;after_switch_theme&#039;, &#039;velocitynorth_set_front_page&#039; );

/**
 * Remove default WP emoji scripts (cleaner output)
 */
remove_action( &#039;wp_head&#039;, &#039;print_emoji_detection_script&#039;, 7 );
remove_action( &#039;wp_print_styles&#039;, &#039;print_emoji_styles&#039; );

/**
 * Add custom body class
 */
function velocitynorth_body_class( $classes ) {
    $classes[] = &#039;vn-theme&#039;;
    return $classes;
}
add_filter( &#039;body_class&#039;, &#039;velocitynorth_body_class&#039; );
