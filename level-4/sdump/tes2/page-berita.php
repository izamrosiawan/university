<?php
/*
Template Name: Berita & Pengumuman
*/
get_header();
?>
<section class="page-hero">
    <div class="container">
        <h1 class="section-title">Berita & Pengumuman</h1>
        <p class="section-desc">Informasi kegiatan terbaru, agenda sekolah, dan prestasi siswa.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Berita Kegiatan Terbaru</h2>
        <div class="news-grid">
            <?php
            $news_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 6
            ));

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) :
                    $news_query->the_post();
            ?>
                <article class="news-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-4x3.svg'); ?>" alt="Berita sekolah" />
                        <?php endif; ?>
                    </a>
                    <div class="news-content">
                        <small><?php echo esc_html(get_the_date()); ?></small>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="card">
                    <p>Belum ada berita terbaru.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container grid grid-3">
        <div class="card">
            <h3>Agenda Sekolah</h3>
            <ul>
                <li>Upacara dan apel pagi rutin</li>
                <li>Rapat komite sekolah</li>
                <li>Class meeting semester</li>
            </ul>
        </div>
        <div class="card">
            <h3>Info Kelulusan / PPDB</h3>
            <p>Informasi PPDB dan kelulusan akan diumumkan melalui halaman resmi sekolah dan grup orang tua.</p>
            <a class="btn btn-outline" href="<?php echo esc_url(home_url('/ppdb')); ?>">Lihat PPDB</a>
        </div>
        <div class="card">
            <h3>Prestasi Siswa</h3>
            <p>Update prestasi siswa dapat dibaca pada postingan kategori Prestasi.</p>
            <a class="btn btn-outline" href="<?php echo esc_url(home_url('/category/prestasi')); ?>">Lihat Prestasi</a>
        </div>
    </div>
</section>
<?php
get_footer();
?>
