<?php
/**
 * SDN Wonokromo III Theme Functions
 * 
 * @package SDN_Wonokromo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Set up theme defaults and register support for various WordPress features
 */
function sdn_wonokromo_setup() {
    // Add support for core block styles
    add_theme_support( 'wp-block-styles' );
    
    // Add support for full and wide align images
    add_theme_support( 'align-wide' );
    
    // Add support for responsive embedded content
    add_theme_support( 'responsive-embeds' );
    
    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );
    
    // Register custom image sizes
    add_image_size( 'sdn-hero', 1200, 600, true );
    add_image_size( 'sdn-gallery', 400, 300, true );
    add_image_size( 'sdn-card', 400, 250, true );
    
    // Add support for menus
    add_theme_support( 'menus' );
    
    register_nav_menus( array(
        'primary'   => esc_html__( 'Primary Menu', 'sdn-wonokromo' ),
        'footer'    => esc_html__( 'Footer Menu', 'sdn-wonokromo' ),
    ) );
    
    // Add support for title tag
    add_theme_support( 'title-tag' );
    
    // Add support for HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
}
add_action( 'after_setup_theme', 'sdn_wonokromo_setup' );

/**
 * Enqueue theme styles and scripts
 */
function sdn_wonokromo_enqueue_assets() {
    // Enqueue main stylesheet
    wp_enqueue_style(
        'sdn-wonokromo-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );
    
    // Enqueue main script
    wp_enqueue_script(
        'sdn-wonokromo-script',
        get_template_directory_uri() . '/assets/js/script.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
    
    // Add inline script for WordPress functions
    wp_add_inline_script( 'sdn-wonokromo-script', 'var sdn_theme_url = "' . esc_url( get_template_directory_uri() ) . '";' );
}
add_action( 'wp_enqueue_scripts', 'sdn_wonokromo_enqueue_assets' );

/**
 * Register widgetized area
 */
function sdn_wonokromo_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'sdn-wonokromo' ),
        'id'            => 'primary-sidebar',
        'description'   => esc_html__( 'Main sidebar for pages and posts', 'sdn-wonokromo' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'sdn_wonokromo_widgets_init' );

/**
 * Add custom logo support
 */
function sdn_wonokromo_custom_logo() {
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
}
add_action( 'after_setup_theme', 'sdn_wonokromo_custom_logo' );

/**
 * Custom excerpt length
 */
function sdn_wonokromo_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'sdn_wonokromo_excerpt_length' );

/**
 * Custom excerpt more
 */
function sdn_wonokromo_excerpt_more( $more ) {
    return '... <a href="' . esc_url( get_permalink() ) . '" class="read-more">' . esc_html__( 'Read More', 'sdn-wonokromo' ) . '</a>';
}
add_filter( 'excerpt_more', 'sdn_wonokromo_excerpt_more' );

/**
 * Add admin styles
 */
function sdn_wonokromo_admin_styles() {
    wp_enqueue_style(
        'sdn-wonokromo-admin',
        get_template_directory_uri() . '/assets/css/admin.css',
        array(),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'admin_enqueue_scripts', 'sdn_wonokromo_admin_styles' );

/**
 * Sanitize text
 */
function sdn_wonokromo_sanitize_text( $text ) {
    return wp_kses_post( $text );
}

/**
 * Get template part with variables
 */
function sdn_wonokromo_get_template_part( $slug, $name = null, $args = array() ) {
    if ( $args && is_array( $args ) ) {
        extract( $args );
    }
    $templates = array();
    $name      = (string) $name;
    if ( '' !== $name ) {
        $templates[] = "{$slug}-{$name}.php";
    }
    $templates[] = "{$slug}.php";
    
    locate_template( $templates, true, false );
}
?>
