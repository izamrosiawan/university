<?php
/**
 * Functions.php - Theme Functions
 * 
 * @package SDN Wonokromo 3
 */

/**
 * Set up theme defaults and register supported features
 */
function sdn_wonokromo_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Add custom logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add post thumbnail support
    add_theme_support( 'post-thumbnails' );

    // Add title tag support
    add_theme_support( 'title-tag' );

    // Add HTML5 support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ) );

    // Register Navigation Menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'sdn-wonokromo-3' ),
        'footer'  => esc_html__( 'Footer Menu', 'sdn-wonokromo-3' ),
    ) );

    // Add editor style support
    add_theme_support( 'editor-styles' );
    add_editor_style( 'editor-style.css' );

    // Load text domain for translations
    load_theme_textdomain( 'sdn-wonokromo-3', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'sdn_wonokromo_setup' );

/**
 * Enqueue scripts and styles
 */
function sdn_wonokromo_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'sdn-wonokromo-style', get_stylesheet_uri(), array(), '1.0.0', 'all' );

    // Enqueue main script
    wp_enqueue_script( 'sdn-wonokromo-script', get_template_directory_uri() . '/script.js', array(), '1.0.0', true );

    // Localize script for AJAX or other dynamic data
    wp_localize_script( 'sdn-wonokromo-script', 'sdn_wonokromo_obj', array(
        'home_url' => home_url(),
        'nonce'    => wp_create_nonce( 'sdn_wonokromo_nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'sdn_wonokromo_scripts' );

/**
 * Customize theme settings
 */
function sdn_wonokromo_customize_register( $wp_customize ) {
    // Add panel for theme options
    $wp_customize->add_panel( 'sdn_wonokromo_panel', array(
        'title'       => esc_html__( 'SDN Wonokromo III Settings', 'sdn-wonokromo-3' ),
        'description' => esc_html__( 'Customize your website appearance', 'sdn-wonokromo-3' ),
        'priority'    => 10,
    ) );

    // Hero Section
    $wp_customize->add_section( 'sdn_wonokromo_hero', array(
        'title'       => esc_html__( 'Hero Section', 'sdn-wonokromo-3' ),
        'description' => esc_html__( 'Customize hero section content', 'sdn-wonokromo-3' ),
        'panel'       => 'sdn_wonokromo_panel',
    ) );

    $wp_customize->add_setting( 'hero_title', array(
        'default'           => 'Selamat Datang di SDN Wonokromo III',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'hero_title', array(
        'label'       => esc_html__( 'Hero Title', 'sdn-wonokromo-3' ),
        'section'     => 'sdn_wonokromo_hero',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'hero_subtitle', array(
        'default'           => 'Membangun Generasi Penerus Bangsa yang Berkarakter dan Berprestasi',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'hero_subtitle', array(
        'label'       => esc_html__( 'Hero Subtitle', 'sdn-wonokromo-3' ),
        'section'     => 'sdn_wonokromo_hero',
        'type'        => 'text',
    ) );

    // Welcome Section
    $wp_customize->add_section( 'sdn_wonokromo_welcome', array(
        'title'       => esc_html__( 'Welcome Section', 'sdn-wonokromo-3' ),
        'description' => esc_html__( 'Customize welcome section', 'sdn-wonokromo-3' ),
        'panel'       => 'sdn_wonokromo_panel',
    ) );

    $wp_customize->add_setting( 'welcome_title', array(
        'default'           => 'Sambutan Kepala Sekolah',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'welcome_title', array(
        'label'       => esc_html__( 'Welcome Title', 'sdn-wonokromo-3' ),
        'section'     => 'sdn_wonokromo_welcome',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'welcome_name', array(
        'default'           => 'Ibu/Bapak Kepala Sekolah',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'welcome_name', array(
        'label'       => esc_html__( 'Head Master Name', 'sdn-wonokromo-3' ),
        'section'     => 'sdn_wonokromo_welcome',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'welcome_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'welcome_image', array(
        'label'       => esc_html__( 'Welcome Image', 'sdn-wonokromo-3' ),
        'section'     => 'sdn_wonokromo_welcome',
    ) ) );

    $wp_customize->add_setting( 'welcome_message', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'welcome_message', array(
        'label'       => esc_html__( 'Welcome Message', 'sdn-wonokromo-3' ),
        'section'     => 'sdn_wonokromo_welcome',
        'type'        => 'textarea',
    ) );

    // Footer Section
    $wp_customize->add_section( 'sdn_wonokromo_footer', array(
        'title'       => esc_html__( 'Footer Settings', 'sdn-wonokromo-3' ),
        'description' => esc_html__( 'Customize footer content', 'sdn-wonokromo-3' ),
        'panel'       => 'sdn_wonokromo_panel',
    ) );

    $wp_customize->add_setting( 'footer_phone', array(
        'default'           => '📞 Telepon: (021) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'footer_phone', array(
        'label'       => esc_html__( 'Phone Number', 'sdn-wonokromo-3' ),
        'section'     => 'sdn_wonokromo_footer',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'footer_email', array(
        'default'           => '📧 Email: info@sdnwonokromo3.sch.id',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'footer_email', array(
        'label'       => esc_html__( 'Email Address', 'sdn-wonokromo-3' ),
        'section'     => 'sdn_wonokromo_footer',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'footer_address', array(
        'default'           => '📍 Jalan Pendidikan No. 123, Jakarta',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'footer_address', array(
        'label'       => esc_html__( 'Address', 'sdn-wonokromo-3' ),
        'section'     => 'sdn_wonokromo_footer',
        'type'        => 'text',
    ) );
}
add_action( 'customize_register', 'sdn_wonokromo_customize_register' );

/**
 * Widget areas
 */
function sdn_wonokromo_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'sdn-wonokromo-3' ),
        'id'            => 'primary-sidebar',
        'description'   => esc_html__( 'Primary sidebar widget area', 'sdn-wonokromo-3' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'sdn_wonokromo_widgets_init' );

/**
 * Sanitize color input
 */
function sdn_wonokromo_sanitize_color( $color ) {
    if ( '' === $color ) {
        return '';
    }

    // check if user is allowed to change this setting
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        return new WP_Error( 'sdn_wonokromo_user_does_not_have_permission', esc_html__( 'User does not have permission to change this setting', 'sdn-wonokromo-3' ) );
    }

    // sanitize the input
    return sanitize_hex_color( $color );
}

/**
 * Custom excerpt length
 */
function sdn_wonokromo_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'sdn_wonokromo_excerpt_length' );

/**
 * Custom excerpt more
 */
function sdn_wonokromo_excerpt_more( $more ) {
    return ' ...';
}
add_filter( 'excerpt_more', 'sdn_wonokromo_excerpt_more' );
