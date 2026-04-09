<?php
/**
 * Archive Template
 * 
 * @package SDN Wonokromo 3
 */

get_header();
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>
                <?php
                    if ( is_category() ) {
                        single_cat_title();
                    } elseif ( is_tag() ) {
                        single_tag_title();
                    } elseif ( is_author() ) {
                        _e( 'Berita dari ', 'sdn-wonokromo-3' );
                        the_author();
                    } elseif ( is_date() ) {
                        _e( 'Berita Arsip', 'sdn-wonokromo-3' );
                    } else {
                        _e( 'Berita', 'sdn-wonokromo-3' );
                    }
                ?>
            </h1>
        </div>
    </section>

    <!-- Archive Content -->
    <section class="archive-content">
        <div class="container">
            <div class="news-grid">
                <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            ?>
                            <article class="news-card">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <div class="news-content">
                                    <span class="category"><?php echo esc_html( get_the_category()[0]->name ); ?></span>
                                    <h3><?php the_title(); ?></h3>
                                    <p class="date"><?php echo get_the_date(); ?></p>
                                    <p><?php echo wp_trim_words( get_the_content(), 15 ); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn-small"><?php _e( 'Selengkapnya →', 'sdn-wonokromo-3' ); ?></a>
                                </div>
                            </article>
                            <?php
                        endwhile;
                    else :
                        echo '<p>' . esc_html__( 'Tidak ada berita yang ditemukan.', 'sdn-wonokromo-3' ) . '</p>';
                    endif;
                ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        </div>
    </section>

<?php get_footer();
