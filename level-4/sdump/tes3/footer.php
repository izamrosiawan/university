<?php
/**
 * Footer Template
 * 
 * @package SDN Wonokromo 3
 */
?>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4><?php _e( 'Tentang Kami', 'sdn-wonokromo-3' ); ?></h4>
                    <p><?php bloginfo( 'description' ); ?></p>
                </div>
                <div class="footer-section">
                    <h4><?php _e( 'Tautan Cepat', 'sdn-wonokromo-3' ); ?></h4>
                    <ul>
                        <?php 
                            wp_nav_menu( array(
                                'theme_location' => 'footer',
                                'fallback_cb'    => false,
                                'container'      => false,
                                'items_wrap'     => '%3$s',
                                'depth'          => 1,
                            ) );
                        ?>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4><?php _e( 'Kontak Kami', 'sdn-wonokromo-3' ); ?></h4>
                    <p><?php echo get_theme_mod( 'footer_phone', '📞 Telepon: (021) 123-4567' ); ?></p>
                    <p><?php echo get_theme_mod( 'footer_email', '📧 Email: info@sdnwonokromo3.sch.id' ); ?></p>
                    <p><?php echo get_theme_mod( 'footer_address', '📍 Jalan Pendidikan No. 123, Jakarta' ); ?></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php _e( 'Semua hak dilindungi.', 'sdn-wonokromo-3' ); ?></p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
