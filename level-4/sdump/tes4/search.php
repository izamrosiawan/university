<?php
/**
 * Search Results Template
 * 
 * @package SDN_Wonokromo
 */

get_header();
?>

<main id="main-content">
    <div class="container">
        <header class="search-header" style="padding: 2rem 0; border-bottom: 2px solid var(--border-color); margin-bottom: 2rem;">
            <h1>
                <?php
                printf(
                    esc_html__( 'Search Results for: %s', 'sdn-wonokromo' ),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <div class="news-grid">
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    ?>
                    <article class="news-card">
                        <?php
                        if ( has_post_thumbnail() ) {
                            ?>
                            <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'sdn-card' ) ); ?>" alt="<?php the_title_attribute(); ?>" class="news-image">
                            <?php
                        }
                        ?>
                        <div class="news-content">
                            <span class="news-date"><?php echo esc_html( get_the_date() ); ?></span>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php esc_html_e( 'Read More', 'sdn-wonokromo' ); ?>
                            </a>
                        </div>
                    </article>
                    <?php
                }

                the_posts_pagination( array(
                    'prev_text' => esc_html__( '← Previous', 'sdn-wonokromo' ),
                    'next_text' => esc_html__( 'Next →', 'sdn-wonokromo' ),
                ) );
            } else {
                ?>
                <div class="no-posts" style="grid-column: 1 / -1;">
                    <p><?php esc_html_e( 'No results found. Try another search term.', 'sdn-wonokromo' ); ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
