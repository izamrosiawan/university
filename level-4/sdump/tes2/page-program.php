<?php
/*
Template Name: Program Sekolah
*/
get_header();
?>
<section class="page-hero">
    <div class="container">
        <h1 class="section-title">Program Sekolah</h1>
        <p class="section-desc">Program akademik dan pengembangan karakter siswa secara holistik.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Program Akademik</h2>
        <div class="grid grid-3">
            <div class="card">
                <h3>Literasi & Numerasi</h3>
                <ul>
                    <li>Pojok baca kelas</li>
                    <li>Penguatan numerasi harian</li>
                    <li>Gerakan membaca 15 menit</li>
                </ul>
            </div>
            <div class="card">
                <h3>STEM Education</h3>
                <ul>
                    <li>Eksperimen sains mingguan</li>
                    <li>Projek teknologi sederhana</li>
                    <li>Kelas coding dasar</li>
                </ul>
            </div>
            <div class="card">
                <h3>Bahasa Asing</h3>
                <ul>
                    <li>English Day</li>
                    <li>Komunikasi dasar</li>
                    <li>Language games</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container grid grid-2">
        <div>
            <h2 class="section-title">Ekstrakurikuler</h2>
            <p class="section-desc">Kegiatan pengembangan minat dan bakat siswa di luar jam belajar.</p>
            <div class="grid grid-2">
                <div class="card">Pramuka</div>
                <div class="card">Seni Tari</div>
                <div class="card">Musik</div>
                <div class="card">Olahraga</div>
            </div>
        </div>
        <div class="card-soft">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-4x3.svg'); ?>" alt="Ekstrakurikuler" />
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Pembinaan Karakter</h2>
        <div class="grid grid-2">
            <div class="card">
                <h3>Pendidikan Karakter</h3>
                <ul>
                    <li>Upacara rutin</li>
                    <li>Program disiplin dan kejujuran</li>
                    <li>Kelas inspirasi</li>
                </ul>
            </div>
            <div class="card">
                <h3>Kepedulian Sosial</h3>
                <ul>
                    <li>Aksi sosial siswa</li>
                    <li>Penghijauan sekolah</li>
                    <li>Peduli lingkungan</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <h2 class="section-title">Fasilitas Penunjang</h2>
        <div class="grid grid-3">
            <div class="card">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-4x3.svg'); ?>" alt="Ruang kelas" />
                <h4>Ruang Kelas Modern</h4>
                <p>Ruang belajar nyaman, terang, dan kondusif.</p>
            </div>
            <div class="card">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-4x3.svg'); ?>" alt="Perpustakaan" />
                <h4>Perpustakaan</h4>
                <p>Sumber bacaan lengkap untuk semua level kelas.</p>
            </div>
            <div class="card">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-4x3.svg'); ?>" alt="Lab komputer" />
                <h4>Lab Komputer & Sains</h4>
                <p>Pembelajaran berbasis teknologi dan eksperimen.</p>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>
