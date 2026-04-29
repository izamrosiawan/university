<?php
/**
 * Archive Template
 * 
 * @package SDN_Wonokromo
 */

get_header();
?>

<main id="main-content">
    <div class="container">
        <header class="archive-header" style="padding: 2rem 0; border-bottom: 2px solid var(--border-color); margin-bottom: 2rem;">
            <?php
            if ( is_category() ) {
                echo '<h1>' . single_cat_title( '', false ) . '</h1>';
            } elseif ( is_tag() ) {
                echo '<h1>' . single_tag_title( '', false ) . '</h1>';
            } elseif ( is_date() ) {
                echo '<h1>';
                if ( is_day() ) {
                    echo get_the_date();
                } elseif ( is_month() ) {
                    echo get_the_date( 'F Y' );
                } elseif ( is_year() ) {
                    echo get_the_date( 'Y' );
                }
                echo '</h1>';
            } elseif ( is_author() ) {
                echo '<h1>' . esc_html__( 'Author: ', 'sdn-wonokromo' ) . get_the_author() . '</h1>';
            } else {
                echo '<h1>' . esc_html__( 'Archive', 'sdn-wonokromo' ) . '</h1>';
            }
            
            if ( is_category() || is_tag() ) {
                echo category_description() ?: tag_description();
            }
            ?>
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

                // Pagination
                the_posts_pagination( array(
                    'prev_text' => esc_html__( '← Previous', 'sdn-wonokromo' ),
                    'next_text' => esc_html__( 'Next →', 'sdn-wonokromo' ),
                ) );
            } else {
                echo '<p>' . esc_html__( 'No posts found in this archive.', 'sdn-wonokromo' ) . '</p>';
            }
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
