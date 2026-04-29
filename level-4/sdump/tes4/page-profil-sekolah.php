<?php
/**
 * Profil Sekolah
 * 
 * @package SDN_Wonokromo
 */

get_header();
?>

<main id="main-content">
    <div class="container">
        <!-- Sejarah SDN Wonokromo III -->
        <section class="profile-section" style="padding: 3rem 0;">
            <h2 style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1.5rem;">Sejarah SDN Wonokromo III</h2>
            <div class="profile-content" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <p>SDN Wonokromo III didirikan pada tahun 1985 dengan visi untuk menyediakan pendidikan berkualitas bagi masyarakat sekitar. Sekolah ini telah berkembang dari sebuah institusi kecil dengan fasilitas sederhana menjadi sekolah modern yang dilengkapi dengan berbagai sarana penunjang pembelajaran.</p>
                <p>Selama lebih dari 40 tahun, SDN Wonokromo III telah menghasilkan ribuan alumni yang tersebar di berbagai profesi dan bidang kehidupan. Kami terus berinovasi dan beradaptasi dengan perkembangan zaman untuk memberikan pendidikan terbaik bagi generasi muda Indonesia.</p>
                <p>Perjalanan kami dipenuhi dengan pencapaian dan prestasi yang membanggakan, dari prestasi akademik hingga karakter siswa yang kuat dan bermoral. Kami berterima kasih kepada semua guru, tenaga kependidikan, siswa, dan orang tua yang telah berkontribusi dalam membangun sekolah ini.</p>
            </div>
        </section>

        <!-- Visi & Misi -->
        <section class="visi-misi-section" style="padding: 3rem 0; display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
            <div class="visi-box" style="background: var(--accent-color); color: white; padding: 2rem; border-radius: 8px;">
                <h2 style="margin-bottom: 1rem;">Visi</h2>
                <p>"Menjadi sekolah dasar yang unggul dalam akademik dan karakter, yang menghasilkan generasi penerus bangsa yang beriman, bertakwa, cerdas, dan berakhlak mulia."</p>
            </div>
            <div class="misi-box" style="background: var(--primary-color); color: white; padding: 2rem; border-radius: 8px;">
                <h2 style="margin-bottom: 1rem;">Misi</h2>
                <ul style="padding-left: 20px;">
                    <li>Menyelenggarakan pembelajaran yang efektif, inovatif, dan bermakna</li>
                    <li>Mengembangkan potensi akademik siswa secara optimal</li>
                    <li>Membangun karakter siswa melalui pendidikan nilai-nilai Pancasila</li>
                    <li>Menyediakan lingkungan belajar yang aman dan nyaman</li>
                    <li>Meningkatkan kompetensi pendidik dan tenaga kependidikan</li>
                    <li>Menjalin kerjasama dengan orang tua dan masyarakat</li>
                </ul>
            </div>
        </section>

        <!-- Staff & Guru -->
        <section class="staff-section" style="padding: 3rem 0;">
            <h2 style="font-size: 2rem; color: var(--primary-color); margin-bottom: 2rem; text-align: center;">Profil Guru & Tenaga Kependidikan</h2>
            <div class="program-grid">
                <div class="program-card">
                    <h3>Kepala Sekolah</h3>
                    <p><strong>Ibu/Bapak Kepala Sekolah</strong></p>
                    <p class="title">S2 Manajemen Pendidikan</p>
                    <p>Berpengalaman lebih dari 20 tahun di bidang pendidikan dengan komitmen tinggi terhadap pengembangan sekolah.</p>
                </div>
                <div class="program-card">
                    <h3>Guru Kelas</h3>
                    <p><strong>Tim Guru Kelas 1-6</strong></p>
                    <p class="title">S1 Pendidikan</p>
                    <p>Profesional dalam pembelajaran terpadu dengan metode yang interaktif dan menyenangkan bagi siswa.</p>
                </div>
                <div class="program-card">
                    <h3>Guru Mata Pelajaran</h3>
                    <p><strong>Tim Guru Spesialis</strong></p>
                    <p class="title">S1 Pendidikan</p>
                    <p>Berpengalaman dalam bidang masing-masing dengan inovasi pembelajaran yang berkelanjutan.</p>
                </div>
            </div>
        </section>

        <!-- Fasilitas -->
        <section class="featured-program" style="padding: 3rem 0; background: var(--light-color); margin: 3rem -20px 0; padding: 3rem 20px;">
            <div class="container">
                <h2 style="text-align: center; margin-bottom: 2rem;">Fasilitas Sekolah</h2>
                <div class="program-grid">
                    <div class="program-card">
                        <h3>📚 Perpustakaan Modern</h3>
                        <p>Ruang perpustakaan yang nyaman dengan koleksi buku lengkap dan akses perpustakaan digital.</p>
                    </div>
                    <div class="program-card">
                        <h3>🔬 Laboratorium Sains</h3>
                        <p>Laboratorium lengkap untuk praktik IPA dan eksperimen pembelajaran sains interaktif.</p>
                    </div>
                    <div class="program-card">
                        <h3>💻 Ruang Komputer</h3>
                        <p>Lab komputer dengan perangkat modern untuk pembelajaran teknologi dan informatika.</p>
                    </div>
                    <div class="program-card">
                        <h3>🏃 Lapangan Olahraga</h3>
                        <p>Lapangan olahraga luas untuk mendukung pembelajaran penjasorkes dan kegiatan ekstrakurikuler.</p>
                    </div>
                    <div class="program-card">
                        <h3>🎨 Ruang Seni</h3>
                        <p>Ruang khusus untuk pembelajaran seni rupa, musik, dan tari yang mendukung kreativitas siswa.</p>
                    </div>
                    <div class="program-card">
                        <h3>🍽️ Kantin Sehat</h3>
                        <p>Kantin yang menyediakan makanan bergizi dan sehat untuk mendukung pertumbuhan siswa.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
get_footer();
