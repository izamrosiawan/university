<?php
/*
Template Name: Galeri Kegiatan
*/
get_header();
?>
<section class="page-hero">
    <div class="container">
        <h1 class="section-title">Galeri Kegiatan</h1>
        <p class="section-desc">Dokumentasi kegiatan pembelajaran, prestasi, dan karakter siswa.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="pill-tabs" data-gallery-tabs>
            <button class="active" data-filter="all">Semua</button>
            <button data-filter="pembelajaran">Kegiatan Pembelajaran</button>
            <button data-filter="prestasi">Lomba & Prestasi</button>
            <button data-filter="karakter">Kegiatan Karakter</button>
            <button data-filter="kunjungan">Kunjungan Edukatif</button>
        </div>
        <div class="gallery-grid" data-gallery-grid>
            <?php
            $gallery_items = array(
                array('pembelajaran', 'Kegiatan belajar kolaboratif'),
                array('prestasi', 'Lomba matematika tingkat kota'),
                array('karakter', 'Pembiasaan karakter Pancasila'),
                array('kunjungan', 'Kunjungan edukatif ke museum'),
                array('pembelajaran', 'Praktikum sains'),
                array('prestasi', 'Prestasi siswa berolahraga'),
                array('karakter', 'Kegiatan peduli lingkungan'),
                array('kunjungan', 'Studi lapangan lokal'),
            );

            foreach ($gallery_items as $item) :
                $category = $item[0];
                $label = $item[1];
            ?>
                <figure data-category="<?php echo esc_attr($category); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-4x3.svg'); ?>" alt="<?php echo esc_attr($label); ?>" />
                    <figcaption><?php echo esc_html($label); ?></figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <h2 class="section-title">Video Kegiatan</h2>
        <p class="section-desc">Tambahkan video dokumentasi kegiatan sekolah.</p>
        <div class="grid grid-2">
            <div class="card">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-16x9.svg'); ?>" alt="Video profil sekolah" />
                <h4>Profil Sekolah</h4>
                <p>Video profil singkat SDN Wonokromo III.</p>
            </div>
            <div class="card">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-16x9.svg'); ?>" alt="Video kegiatan siswa" />
                <h4>Kegiatan Siswa</h4>
                <p>Dokumentasi kegiatan ekstrakurikuler dan prestasi.</p>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>