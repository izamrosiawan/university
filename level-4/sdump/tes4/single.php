<?php
/**
 * The template for displaying single posts
 * 
 * @package SDN_Wonokromo
 */

get_header();
?>

<main id="main-content">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
            <article>
                <?php
                while ( have_posts() ) {
                    the_post();
                    ?>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <div class="entry-meta">
                            <span class="posted-on">
                                <?php esc_html_e( 'Posted on', 'sdn-wonokromo' ); ?>
                                <?php echo esc_html( get_the_date() ); ?>
                            </span>
                            <span class="byline">
                                <?php esc_html_e( 'by', 'sdn-wonokromo' ); ?>
                                <?php the_author(); ?>
                            </span>
                        </div>
                    </header>

                    <?php
                    if ( has_post_thumbnail() ) {
                        ?>
                        <div class="entry-image" style="margin-bottom: 2rem;">
                            <?php the_post_thumbnail( 'sdn-hero' ); ?>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <footer class="entry-footer" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #ddd;">
                        <div class="post-tags">
                            <?php the_tags( '<span>', ' ', '</span>' ); ?>
                        </div>
                    </footer>

                    <?php
                    // Comments
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>
                    <?php
                }
                ?>
            </article>

            <aside id="sidebar" style="background-color: #f9f9f9; padding: 1.5rem; border-radius: 8px;">
                <?php
                if ( is_active_sidebar( 'primary-sidebar' ) ) {
                    dynamic_sidebar( 'primary-sidebar' );
                }
                ?>
            </aside>
        </div>
    </div>
</main>

<?php
get_footer();
