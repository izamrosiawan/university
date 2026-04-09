<?php
/**
 * Search Results Template
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
                    printf(
                        esc_html__( 'Hasil Pencarian: %s', 'sdn-wonokromo-3' ),
                        '<span>' . get_search_query() . '</span>'
                    );
                ?>
            </h1>
        </div>
    </section>

    <!-- Search Results -->
    <section class="search-results">
        <div class="container">
            <?php
                if ( have_posts() ) :
                    ?>
                    <div class="news-grid">
                        <?php
                            while ( have_posts() ) : the_post();
                                ?>
                                <article class="news-card">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    <div class="news-content">
                                        <h3><?php the_title(); ?></h3>
                                        <p class="date"><?php echo get_the_date(); ?></p>
                                        <p><?php echo wp_trim_words( get_the_content(), 15 ); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn-small"><?php _e( 'Baca Selengkapnya →', 'sdn-wonokromo-3' ); ?></a>
                                    </div>
                                </article>
                                <?php
                            endwhile;
                        ?>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination">
                        <?php the_posts_pagination(); ?>
                    </div>
                    <?php
                else :
                    ?>
                    <div class="no-results">
                        <h2><?php _e( 'Tidak Ada Hasil', 'sdn-wonokromo-3' ); ?></h2>
                        <p><?php _e( 'Maaf, tidak ada hasil yang cocok dengan pencarian Anda. Coba gunakan kata kunci yang berbeda.', 'sdn-wonokromo-3' ); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                    <?php
                endif;
            ?>
        </div>
    </section>

<?php get_footer();
