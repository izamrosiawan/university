<?php
/**
 * Single Post Template
 * 
 * @package SDN Wonokromo 3
 */

get_header();
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <p><?php echo get_the_date(); ?> | <?php _e( 'by', 'sdn-wonokromo-3' ); ?> <?php the_author(); ?></p>
        </div>
    </section>

    <!-- Post Content -->
    <section class="single-post">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <div class="post-meta">
                    <div class="post-category">
                        <?php _e( 'Kategori: ', 'sdn-wonokromo-3' ); ?>
                        <?php the_category( ', ' ); ?>
                    </div>
                    <div class="post-tags">
                        <?php 
                            if ( get_the_tags() ) {
                                _e( 'Tag: ', 'sdn-wonokromo-3' );
                                the_tags( '', ', ' );
                            }
                        ?>
                    </div>
                </div>

                <!-- Post Navigation -->
                <div class="post-navigation">
                    <?php
                        the_post_navigation( array(
                            'prev_text' => __( '← Berita Sebelumnya', 'sdn-wonokromo-3' ),
                            'next_text' => __( 'Berita Selanjutnya →', 'sdn-wonokromo-3' ),
                        ) );
                    ?>
                </div>

                <!-- Comments -->
                <?php
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
            </article>
        </div>
    </section>

<?php get_footer();
