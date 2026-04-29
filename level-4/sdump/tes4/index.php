<?php
/**
 * Main template file
 * 
 * @package SDN_Wonokromo
 */

get_header();
?>

<main id="main-content">
    <div class="container">
        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <div class="entry-meta">
                            <span class="posted-on">
                                <?php esc_html_e( 'Posted on', 'sdn-wonokromo' ); ?>
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </a>
                            </span>
                            <span class="byline">
                                <?php esc_html_e( 'by', 'sdn-wonokromo' ); ?>
                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                                    <?php the_author(); ?>
                                </a>
                            </span>
                        </div>
                    </header>

                    <?php
                    if ( has_post_thumbnail() ) {
                        ?>
                        <div class="entry-image">
                            <?php the_post_thumbnail( 'sdn-hero' ); ?>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="entry-content">
                        <?php
                        if ( is_singular() ) {
                            the_content();
                        } else {
                            the_excerpt();
                        }
                        ?>
                    </div>

                    <?php
                    if ( ! is_singular() ) {
                        ?>
                        <footer class="entry-footer">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="read-more">
                                <?php esc_html_e( 'Read More', 'sdn-wonokromo' ); ?>
                            </a>
                        </footer>
                        <?php
                    }
                    ?>
                </article>
                <?php
            }

            // Pagination
            the_posts_pagination( array(
                'prev_text' => esc_html__( 'Previous', 'sdn-wonokromo' ),
                'next_text' => esc_html__( 'Next', 'sdn-wonokromo' ),
            ) );
        } else {
            ?>
            <div class="no-posts">
                <p><?php esc_html_e( 'No posts found. Sorry!', 'sdn-wonokromo' ); ?></p>
            </div>
            <?php
        }
        ?>
    </div>
</main>

<?php
get_footer();
