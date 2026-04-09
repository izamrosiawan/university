<?php
/**
 * 404 Error Template
 * 
 * @package SDN Wonokromo 3
 */

get_header();
?>

    <!-- 404 Section -->
    <section class="page-header">
        <div class="container">
            <h1><?php _e( 'Halaman Tidak Ditemukan', 'sdn-wonokromo-3' ); ?></h1>
            <p><?php _e( 'Error 404', 'sdn-wonokromo-3' ); ?></p>
        </div>
    </section>

    <!-- 404 Content -->
    <section class="error-404">
        <div class="container">
            <div class="error-content">
                <h2>404</h2>
                <p><?php _e( 'Maaf, halaman yang Anda cari tidak ditemukan.', 'sdn-wonokromo-3' ); ?></p>
                <p><?php _e( 'Halaman mungkin telah dihapus atau URL tidak benar. Silakan periksa kembali atau gunakan menu navigasi di atas.', 'sdn-wonokromo-3' ); ?></p>
                <a href="<?php echo esc_url( home_url() ); ?>" class="btn"><?php _e( 'Kembali ke Beranda', 'sdn-wonokromo-3' ); ?></a>
            </div>

            <!-- Recent Posts -->
            <div class="recent-posts">
                <h3><?php _e( 'Berita Terbaru', 'sdn-wonokromo-3' ); ?></h3>
                <div class="news-grid">
                    <?php
                        $args = array(
                            'posts_per_page' => 3,
                            'post_type'      => 'post',
                        );
                        $query = new WP_Query( $args );
                        
                        if ( $query->have_posts() ) :
                            while ( $query->have_posts() ) : $query->the_post();
                                ?>
                                <article class="news-card">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    <div class="news-content">
                                        <h3><?php the_title(); ?></h3>
                                        <p class="date"><?php echo get_the_date(); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn-small"><?php _e( 'Baca Selengkapnya →', 'sdn-wonokromo-3' ); ?></a>
                                    </div>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();
