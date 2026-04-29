<?php
/**
 * The template for displaying pages
 * 
 * @package SDN_Wonokromo
 */

get_header();
?>

<main id="main-content">
    <div class="container">
        <?php
        while ( have_posts() ) {
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'page' ); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
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
                    <?php the_content(); ?>
                </div>

                <?php
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
                ?>
            </article>
            <?php
        }
        ?>
    </div>
</main>

<?php
get_footer();
