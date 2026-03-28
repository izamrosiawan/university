<?php

if (!defined('SDN_WONOKROMO_VERSION')) {
    define('SDN_WONOKROMO_VERSION', '1.0.0');
}

function sdn_wonokromo_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 80,
        'width'  => 80,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    register_nav_menus(array(
        'primary' => __('Menu Utama', 'sdn-wonokromo'),
    ));
}
add_action('after_setup_theme', 'sdn_wonokromo_setup');

function sdn_wonokromo_assets() {
    wp_enqueue_style(
        'sdn-wonokromo-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap',
        array(),
        null
    );
    wp_enqueue_style('sdn-wonokromo-style', get_stylesheet_uri(), array('sdn-wonokromo-fonts'), SDN_WONOKROMO_VERSION);

    wp_enqueue_script('sdn-wonokromo-script', get_template_directory_uri() . '/assets/js/main.js', array(), SDN_WONOKROMO_VERSION, true);
}
add_action('wp_enqueue_scripts', 'sdn_wonokromo_assets');

function sdn_wonokromo_excerpt_length($length) {
    return 16;
}
add_filter('excerpt_length', 'sdn_wonokromo_excerpt_length');

function sdn_wonokromo_register_sidebar() {
    register_sidebar(array(
        'name'          => __('Footer Kontak', 'sdn-wonokromo'),
        'id'            => 'footer-kontak',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'sdn_wonokromo_register_sidebar');
