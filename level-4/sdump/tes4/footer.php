<?php
/**
 * The footer for the theme
 * 
 * @package SDN_Wonokromo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><?php esc_html_e( 'About Us', 'sdn-wonokromo' ); ?></h3>
                    <p><?php bloginfo( 'description' ); ?></p>
                </div>

                <div class="footer-section">
                    <h3><?php esc_html_e( 'Quick Links', 'sdn-wonokromo' ); ?></h3>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'items_wrap'     => '<ul>%3$s</ul>',
                        'fallback_cb'    => 'sdn_wonokromo_footer_menu_fallback',
                        'depth'          => 1,
                    ) );
                    ?>
                </div>

                <div class="footer-section">
                    <h3><?php esc_html_e( 'Contact', 'sdn-wonokromo' ); ?></h3>
                    <p><?php esc_html_e( 'Email: info@example.com', 'sdn-wonokromo' ); ?></p>
                    <p><?php esc_html_e( 'Phone: +62 123 456 789', 'sdn-wonokromo' ); ?></p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>
                    &copy; <?php echo esc_html( date( 'Y' ) ); ?> 
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                    <?php esc_html_e( '- All Rights Reserved', 'sdn-wonokromo' ); ?>
                </p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * Footer menu fallback
 */
function sdn_wonokromo_footer_menu_fallback() {
    echo '<ul>';
    wp_list_pages( array(
        'title_li' => '',
        'depth'    => 1,
    ) );
    echo '</ul>';
}
