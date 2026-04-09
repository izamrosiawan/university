<?php
/**
 * Header Template
 * 
 * @package SDN Wonokromo 3
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php endif; ?>
                <h2><?php bloginfo( 'name' ); ?></h2>
            </div>
            <ul class="nav-menu">
                <?php 
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'fallback_cb'    => 'wp_page_menu',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'depth'          => 2,
                    ) );
                ?>
            </ul>
        </div>
    </nav>
