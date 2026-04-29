<?php
/**
 * Beranda
 * 
 * @package SDN_Wonokromo
 */

get_header();
?>

<main id="main-content">
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Selamat Datang di SDN Wonokromo III</h1>
            <p>Membangun Generasi Penerus Bangsa yang Berkarakter dan Berprestasi</p>
        </div>
    </section>

    <!-- Quick Access Buttons -->
    <section class="quick-access">
        <div class="container">
            <h2>Akses Cepat</h2>
            <div class="button-grid">
                <a href="#ppdb" class="quick-btn">
                    <span class="icon">📋</span>
                    <span>PPDB</span>
                </a>
                <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'kontak-lokasi' )->ID ) ); ?>" class="quick-btn">
                    <span class="icon">📞</span>
                    <span>Kontak</span>
                </a>
                <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'profil-sekolah' )->ID ) ); ?>" class="quick-btn">
                    <span class="icon">🏫</span>
                    <span>Profil Sekolah</span>
                </a>
                <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'galeri-kegiatan' )->ID ) ); ?>" class="quick-btn">
                    <span class="icon">📸</span>
                    <span>Galeri</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section class="welcome-section">
        <div class="container">
            <div class="welcome-content">
                <div class="welcome-image" style="background: #ddd; padding: 50px; text-align: center; border-radius: 8px;">
                    📷 Foto Kepala Sekolah
                </div>
                <div class="welcome-text">
                    <h2>Sambutan Kepala Sekolah</h2>
                    <p class="title">Ibu/Bapak Kepala Sekolah</p>
                    <p>"Assalamu'alaikum Warahmatullahi Wabarakatuh. Selamat datang di SDN Wonokromo III, institusi pendidikan yang berkomitmen untuk menghasilkan siswa-siswi yang tidak hanya pandai dalam akademik, tetapi juga memiliki karakter yang kuat dan nilai-nilai Pancasila yang tertanam dalam diri.</p>
                    <p>Kami percaya bahwa pendidikan adalah fondasi masa depan bangsa. Dengan dukungan orang tua dan masyarakat, kami terus berinovasi dan meningkatkan kualitas pembelajaran untuk menciptakan generasi penerus yang berkualitas."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Unggulan -->
    <section class="featured-program">
        <div class="container">
            <h2>Program Unggulan</h2>
            <div class="program-grid">
                <div class="program-card">
                    <h3>Program Gemilang</h3>
                    <p>Program pembelajaran inovatif yang menggabungkan teknologi dan metode tradisional untuk hasil maksimal.</p>
                    <a href="#" class="btn-learn-more">Pelajari Lebih Lanjut →</a>
                </div>
                <div class="program-card">
                    <h3>Pendidikan Karakter</h3>
                    <p>Pembentukan karakter siswa melalui kegiatan Pancasila dan pengalaman belajar yang bermakna.</p>
                    <a href="#" class="btn-learn-more">Pelajari Lebih Lanjut →</a>
                </div>
                <div class="program-card">
                    <h3>Ekstrakurikuler Beragam</h3>
                    <p>Berbagai pilihan ekstrakurikuler untuk mengembangkan bakat dan minat siswa di luar akademik.</p>
                    <a href="#" class="btn-learn-more">Pelajari Lebih Lanjut →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="news-section">
        <div class="container">
            <h2>Berita Terbaru</h2>
            <div class="news-grid">
                <?php
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );
                $query = new WP_Query( $args );
                
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
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
                                <a href="<?php the_permalink(); ?>" class="read-more">Selengkapnya →</a>
                            </div>
                        </article>
                        <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
