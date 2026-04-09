<?php
/**
 * Page Template
 * 
 * @package SDN Wonokromo 3
 */

get_header();
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <!-- Page Content -->
    <section class="page-content">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="page-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>

                <div class="page-body">
                    <?php the_content(); ?>
                </div>

                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sdn-wonokromo-3' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </article>

            <!-- Comments -->
            <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>
        </div>
    </section>

<?php get_footer();
