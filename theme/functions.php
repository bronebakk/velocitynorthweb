<?php
/**
 * Velocity North Theme Functions
 *
 * @package VelocityNorth
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme setup
 */
function velocitynorth_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption' ) );
    add_theme_support( 'custom-logo' );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'velocitynorth' ),
    ) );
}
add_action( 'after_setup_theme', 'velocitynorth_setup' );

/**
 * Enqueue styles
 */
function velocitynorth_scripts() {
    wp_enqueue_style( 'velocitynorth-style', get_stylesheet_uri(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'velocitynorth_scripts' );

/**
 * Set front page to "Home" page after import
 */
function velocitynorth_set_front_page() {
    $home = get_page_by_path( 'home' );
    if ( $home ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $home->ID );
    }
}
add_action( 'after_switch_theme', 'velocitynorth_set_front_page' );

/**
 * Remove default WP emoji scripts (cleaner output)
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Add custom body class
 */
function velocitynorth_body_class( $classes ) {
    $classes[] = 'vn-theme';
    return $classes;
}
add_filter( 'body_class', 'velocitynorth_body_class' );

/**
 * HubSpot form dark theme overrides — contact page only
 */
function velocitynorth_hubspot_styles() {
    if ( ! is_page( 'contact' ) ) return;
    echo '<style>
    .hs-form-frame { font-family: "JetBrains Mono", "Courier New", monospace !important; }
    .hs-form-frame h1, .hs-form-frame h2, .hs-form-frame h3 {
        background: linear-gradient(135deg, #f0ada2 0%, #db4434 50%, #f0ada2 100%);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        font-size: 1.5rem !important; font-weight: 700 !important; margin-bottom: 0.75rem !important;
    }
    .hs-form-frame p, .hs-form-frame .hs-richtext, .hs-form-frame .hs-richtext p { color: #ba8077 !important; font-size: 0.875rem !important; }
    .hs-form-frame label { color: #ba8077 !important; font-size: 0.75rem !important; letter-spacing: 0.05em !important; text-transform: uppercase !important; }
    .hs-form-frame input[type=text], .hs-form-frame input[type=email],
    .hs-form-frame input[type=tel], .hs-form-frame input[type=number],
    .hs-form-frame textarea, .hs-form-frame select {
        background: #0d0d0d !important; color: #f0ada2 !important;
        border: 1px solid rgba(219,68,52,0.3) !important; border-radius: 0 !important;
        padding: 0.625rem 0.75rem !important; width: 100% !important;
        font-family: inherit !important; font-size: 0.875rem !important; box-shadow: none !important;
    }
    .hs-form-frame input[type=text]:focus, .hs-form-frame input[type=email]:focus,
    .hs-form-frame input[type=tel]:focus, .hs-form-frame textarea:focus { border-color: #db4434 !important; outline: none !important; }
    .hs-form-frame input[type=submit], .hs-form-frame .hs-button {
        background: #db4434 !important; color: #fff !important;
        border: 2px solid #db4434 !important; border-radius: 0 !important;
        padding: 0.75rem 2rem !important; font-family: inherit !important;
        font-size: 0.875rem !important; letter-spacing: 0.05em !important;
        text-transform: uppercase !important; cursor: pointer !important;
    }
    .hs-form-frame input[type=submit]:hover, .hs-form-frame .hs-button:hover { background: transparent !important; color: #db4434 !important; }
    .hs-form-frame .hs-error-msgs, .hs-form-frame .hs-error-msg { color: #db4434 !important; font-size: 0.75rem !important; }
    .hs-form-frame .legal-consent-container, .hs-form-frame .legal-consent-container p { color: #886660 !important; font-size: 0.75rem !important; }
    .hs-form-frame .hs-form-booleancheckbox-display input { accent-color: #db4434 !important; }
    .hs-form-frame .iti__selected-dial-code, .hs-form-frame .iti__flag-container { background: #0d0d0d !important; color: #f0ada2 !important; border-color: rgba(219,68,52,0.3) !important; }
    .hs-form-frame .iti__country-list { background: #1e1e1e !important; color: #f0ada2 !important; border-color: rgba(219,68,52,0.3) !important; }
    </style>';
}
add_action( 'wp_head', 'velocitynorth_hubspot_styles' );
