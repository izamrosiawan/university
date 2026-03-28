<?php
get_header();
?>
<section class="section">
    <div class="container">
        <h1 class="section-title"><?php the_archive_title(); ?></h1>
        <div class="news-grid">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="news-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-4x3.svg'); ?>" alt="Berita" />
                        <?php endif; ?>
                    </a>
                    <div class="news-content">
                        <small><?php echo esc_html(get_the_date()); ?></small>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </div>
                </article>
            <?php endwhile; else : ?>
                <p>Belum ada konten.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>
