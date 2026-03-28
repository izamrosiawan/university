<?php
/*
Template Name: Profil Sekolah
*/
get_header();
?>
<section class="page-hero">
    <div class="container">
        <h1 class="section-title">Profil Sekolah</h1>
        <p class="section-desc">Membangun kepercayaan orang tua melalui transparansi informasi sekolah.</p>
    </div>
</section>

<section class="section">
    <div class="container grid grid-2">
        <div class="card-soft">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-4x3.svg'); ?>" alt="Sejarah SDN Wonokromo III" />
        </div>
        <div>
            <h2 class="section-title">Sejarah SDN Wonokromo III</h2>
            <p>SDN Wonokromo III berdiri sebagai bagian dari komitmen menghadirkan pendidikan dasar yang merata di Surabaya. Sejak awal, sekolah fokus pada pembelajaran aktif dan pembinaan karakter siswa.</p>
            <p>Dengan dukungan guru dan orang tua, sekolah berkembang menjadi pusat kegiatan pendidikan yang ramah anak dan berprestasi.</p>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container grid grid-2">
        <div class="card">
            <h3>Visi</h3>
            <p>Terwujudnya peserta didik yang berkarakter, berprestasi, dan berwawasan lingkungan.</p>
        </div>
        <div class="card">
            <h3>Misi</h3>
            <ul>
                <li>Menyelenggarakan pembelajaran yang aktif dan menyenangkan.</li>
                <li>Mengembangkan budaya literasi dan numerasi.</li>
                <li>Mendorong pembinaan karakter sesuai nilai Pancasila.</li>
            </ul>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Fasilitas Sekolah</h2>
        <p class="section-desc">Fasilitas lengkap dan modern untuk mendukung proses pembelajaran.</p>
        <div class="grid grid-4">
            <div class="card">
                <div class="icon-circle">PB</div>
                <h4>Perpustakaan</h4>
                <p>Koleksi buku beragam untuk meningkatkan literasi siswa.</p>
            </div>
            <div class="card">
                <div class="icon-circle">LK</div>
                <h4>Laboratorium Komputer</h4>
                <p>Belajar teknologi dasar dan pemanfaatan internet aman.</p>
            </div>
            <div class="card">
                <div class="icon-circle">OR</div>
                <h4>Lapangan Olahraga</h4>
                <p>Fasilitas olahraga lengkap untuk kegiatan jasmani.</p>
            </div>
            <div class="card">
                <div class="icon-circle">RS</div>
                <h4>Ruang Sains</h4>
                <p>Eksperimen sederhana untuk memupuk rasa ingin tahu.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <h2 class="section-title">Guru & Tenaga Kependidikan</h2>
        <p class="section-desc">Tim profesional yang siap mendampingi perkembangan siswa.</p>
        <div class="grid grid-4">
            <div class="card">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-square.svg'); ?>" alt="Guru" />
                <h4>Bu Sri Wahyuni, S.Pd</h4>
                <p>Guru Kelas 1</p>
            </div>
            <div class="card">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-square.svg'); ?>" alt="Guru" />
                <h4>Pak Anwar Fauzi, S.Pd</h4>
                <p>Guru Kelas 2</p>
            </div>
            <div class="card">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-square.svg'); ?>" alt="Guru" />
                <h4>Bu Dian Lestari, S.Pd</h4>
                <p>Guru Kelas 3</p>
            </div>
            <div class="card">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder-square.svg'); ?>" alt="Guru" />
                <h4>Pak Dudi Santoso, S.Pd</h4>
                <p>Guru Kelas 4</p>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>
