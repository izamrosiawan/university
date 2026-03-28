<?php
get_header();
?>
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">SDN Wonokromo III Surabaya</span>
            <h1>Beranda: Kesan Pertama Harus Kuat</h1>
            <p>Lingkungan belajar yang aman, kreatif, dan berkarakter untuk menumbuhkan prestasi siswa sejak dini.</p>
            <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:18px;">
                <a class="btn" href="<?php echo esc_url(home_url('/ppdb')); ?>">Daftar PPDB</a>
                <a class="btn btn-light" href="<?php echo esc_url(home_url('/profil-sekolah')); ?>">Profil Sekolah</a>
            </div>
            <div class="quick-actions">
                <a href="<?php echo esc_url(home_url('/ppdb')); ?>">PPDB</a>
                <a href="<?php echo esc_url(home_url('/kontak')); ?>">Kontak</a>
                <a href="<?php echo esc_url(home_url('/profil-sekolah')); ?>">Profil Sekolah</a>
            </div>
        </div>
        <div class="hero-media">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-4x3.svg'); ?>" alt="Foto kegiatan siswa terbaru" />
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container grid grid-2">
        <div class="card">
            <h2 class="section-title">Sambutan Kepala Sekolah</h2>
            <p class="section-desc">Assalamualaikum warahmatullahi wabarakatuh. Kami menyambut hangat setiap orang tua dan siswa baru untuk belajar dan tumbuh bersama di SDN Wonokromo III.</p>
            <p><strong>Drs. Ahmad Santoso</strong><br/>Kepala Sekolah</p>
        </div>
        <div class="card-soft">
            <h3>Highlight Program Unggulan</h3>
            <p>Program Gemilang menekankan literasi, numerasi, dan karakter siswa melalui pendampingan intensif serta kegiatan berbasis proyek.</p>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-square.svg'); ?>" alt="Program unggulan" />
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Pengumuman Penting</h2>
        <p class="section-desc">Info terbaru seputar agenda sekolah, PPDB, dan kegiatan penting lainnya.</p>
        <div class="news-grid">
            <?php
            $announcement_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'category_name' => 'pengumuman'
            ));

            if (!$announcement_query->have_posts()) {
                $announcement_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3
                ));
            }

            if ($announcement_query->have_posts()) :
                while ($announcement_query->have_posts()) :
                    $announcement_query->the_post();
            ?>
                <article class="news-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-4x3.svg'); ?>" alt="Pengumuman" />
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
                    <p>Belum ada pengumuman. Silakan tambahkan postingan terbaru.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <h2 class="section-title">Program Unggulan Kami</h2>
        <p class="section-desc">Paket program akademik dan karakter yang menjadi kebanggaan SDN Wonokromo III.</p>
        <div class="grid grid-3">
            <div class="card">
                <div class="icon-circle">LG</div>
                <h3>Literasi Gemilang</h3>
                <p>Budaya membaca harian, pojok baca kelas, dan projek literasi tematik.</p>
            </div>
            <div class="card">
                <div class="icon-circle">ST</div>
                <h3>STEM Kreatif</h3>
                <p>Eksperimen sains sederhana, coding dasar, dan klub robotika.</p>
            </div>
            <div class="card">
                <div class="icon-circle">KR</div>
                <h3>Karakter Pancasila</h3>
                <p>Pembinaan karakter, kepedulian sosial, dan kegiatan keagamaan.</p>
            </div>
        </div>
    </div>
</section>

<section class="cta">
    <div class="container">
        <h2>Daftarkan Putra-Putri Anda Sekarang</h2>
        <p>Hubungi kami untuk informasi PPDB dan kunjungan sekolah.</p>
        <a class="btn" href="<?php echo esc_url(home_url('/kontak')); ?>">Hubungi Sekolah</a>
    </div>
</section>
<?php
get_footer();
?>
