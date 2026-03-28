<?php
get_header();
?>
<section class="section">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="card">
                <h1 class="section-title"><?php the_title(); ?></h1>
                <p><small><?php echo esc_html(get_the_date()); ?></small></p>
                <?php if (has_post_thumbnail()) : ?>
                    <div style="margin-bottom:18px;">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                <?php the_content(); ?>
            </article>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php
get_footer();
?>
