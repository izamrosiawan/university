<?php
/**
 * The header for the theme
 * 
 * @package SDN_Wonokromo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
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
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                }
                ?>
                <h2>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h2>
            </div>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => 'sdn_wonokromo_menu_fallback',
                'depth'          => 2,
            ) );
            ?>
        </div>
    </nav>

<?php
/**
 * Fallback menu
 */
function sdn_wonokromo_menu_fallback() {
    ?>
    <ul class="nav-menu">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'sdn-wonokromo' ); ?></a></li>
        <?php
        wp_list_pages( array(
            'title_li' => '',
            'depth'    => 1,
        ) );
        ?>
    </ul>
    <?php
}
