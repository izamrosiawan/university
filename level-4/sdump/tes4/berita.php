<?php
/**
 * Berita & Pengumuman
 * 
 * @package SDN_Wonokromo
 */

get_header();
?>

<main id="main-content">
    <div class="container">
        <h1 style="text-align: center; font-size: 2.5rem; color: var(--primary-color); margin: 2rem 0;">Berita & Pengumuman</h1>
        <p style="text-align: center; color: #666; margin-bottom: 2rem;">Informasi terbaru dan penting dari SDN Wonokromo III</p>

        <!-- Filter Buttons -->
        <div class="filter-buttons" style="margin-bottom: 2rem;">
            <button class="filter-btn active" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="berita">Berita</button>
            <button class="filter-btn" data-filter="agenda">Agenda</button>
            <button class="filter-btn" data-filter="ppdb">Info PPDB</button>
            <button class="filter-btn" data-filter="prestasi">Prestasi Siswa</button>
        </div>

        <!-- Featured News -->
        <div class="featured-news" style="background: var(--light-color); padding: 2rem; border-radius: 8px; margin-bottom: 3rem;">
            <h2>Berita Utama</h2>
            <div class="featured-article" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; align-items: center; margin-top: 1rem;">
                <div style="background: #ddd; height: 300px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                    📷 Gambar Berita Utama
                </div>
                <div>
                    <span class="category berita" style="background: var(--secondary-color); color: white; padding: 0.5rem 1rem; border-radius: 20px; display: inline-block; margin-bottom: 1rem;">Berita</span>
                    <h2>Peluncuran Program Gemilang 2026</h2>
                    <p style="color: #999; margin-bottom: 1rem;">15 Maret 2026</p>
                    <p>SDN Wonokromo III dengan bangga meluncurkan Program Gemilang 2026, sebuah inisiatif pendidikan yang menggabungkan teknologi terkini dengan metode pembelajaran tradisional. Program ini dirancang untuk meningkatkan kualitas pembelajaran siswa.</p>
                    <a href="#" class="btn-learn-more">Baca Selengkapnya →</a>
                </div>
            </div>
        </div>

        <!-- News Grid -->
        <div class="news-grid">
            <!-- Berita -->
            <article class="news-card berita">
                <div style="background: #ddd; height: 200px; border-radius: 8px 8px 0 0; display: flex; align-items: center; justify-content: center;">
                    📷
                </div>
                <div class="news-content">
                    <span class="category" style="background: var(--secondary-color); color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.85rem; display: inline-block; margin-bottom: 0.5rem;">Berita</span>
                    <h3><a href="#">Kunjungan Edukatif ke Museum Nasional</a></h3>
                    <p class="news-date">12 Maret 2026</p>
                    <p>Siswa kelas 5 dan 6 melakukan kunjungan edukatif ke Museum Nasional Indonesia untuk mempelajari sejarah dan budaya bangsa secara langsung.</p>
                    <a href="#" class="read-more">Selengkapnya →</a>
                </div>
            </article>

            <article class="news-card berita">
                <div style="background: #ddd; height: 200px; border-radius: 8px 8px 0 0; display: flex; align-items: center; justify-content: center;">
                    📷
                </div>
                <div class="news-content">
                    <span class="category" style="background: var(--secondary-color); color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.85rem; display: inline-block; margin-bottom: 0.5rem;">Berita</span>
                    <h3><a href="#">Launching Perpustakaan Digital Sekolah</a></h3>
                    <p class="news-date">10 Maret 2026</p>
                    <p>Perpustakaan digital sekolah telah diluncurkan dengan akses ke ribuan buku digital dan sumber pembelajaran online untuk siswa.</p>
                    <a href="#" class="read-more">Selengkapnya →</a>
                </div>
            </article>

            <article class="news-card berita">
                <div style="background: #ddd; height: 200px; border-radius: 8px 8px 0 0; display: flex; align-items: center; justify-content: center;">
                    📷
                </div>
                <div class="news-content">
                    <span class="category" style="background: var(--secondary-color); color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.85rem; display: inline-block; margin-bottom: 0.5rem;">Berita</span>
                    <h3><a href="#">Program Literasi Pancasila Dimulai</a></h3>
                    <p class="news-date">8 Maret 2026</p>
                    <p>Sekolah mulai melaksanakan program literasi Pancasila sebagai bagian dari pendidikan karakter untuk mengembangkan siswa yang berjiwa Pancasila.</p>
                    <a href="#" class="read-more">Selengkapnya →</a>
                </div>
            </article>

            <!-- Agenda -->
            <article class="news-card agenda">
                <div style="background: #ddd; height: 200px; border-radius: 8px 8px 0 0; display: flex; align-items: center; justify-content: center;">
                    📅
                </div>
                <div class="news-content">
                    <span class="category" style="background: var(--accent-color); color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.85rem; display: inline-block; margin-bottom: 0.5rem;">Agenda</span>
                    <h3><a href="#">Hari Buku Nasional Sekolah</a></h3>
                    <p class="news-date">20 Maret 2026</p>
                    <p>Perayaan Hari Buku Nasional dengan berbagai kegiatan literasi dan kolaborasi dengan penerbit lokal untuk membangun budaya membaca.</p>
                    <a href="#" class="read-more">Selengkapnya →</a>
                </div>
            </article>

            <!-- Info PPDB -->
            <article class="news-card ppdb">
                <div style="background: #ddd; height: 200px; border-radius: 8px 8px 0 0; display: flex; align-items: center; justify-content: center;">
                    📋
                </div>
                <div class="news-content">
                    <span class="category" style="background: #27ae60; color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.85rem; display: inline-block; margin-bottom: 0.5rem;">Info PPDB</span>
                    <h3><a href="#">Pendaftaran PPDB TA 2026/2027 Dibuka</a></h3>
                    <p class="news-date">15 Maret 2026</p>
                    <p>Pendaftaran Penerimaan Peserta Didik Baru untuk Tahun Ajaran 2026/2027 sudah dibuka. Silakan kunjungi halaman PPDB untuk informasi selengkapnya.</p>
                    <a href="#" class="read-more">Selengkapnya →</a>
                </div>
            </article>

            <!-- Prestasi Siswa -->
            <article class="news-card prestasi">
                <div style="background: #ddd; height: 200px; border-radius: 8px 8px 0 0; display: flex; align-items: center; justify-content: center;">
                    🏆
                </div>
                <div class="news-content">
                    <span class="category" style="background: #f39c12; color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.85rem; display: inline-block; margin-bottom: 0.5rem;">Prestasi</span>
                    <h3><a href="#">Siswa Meraih Medali Emas Olimpiade</a></h3>
                    <p class="news-date">5 Maret 2026</p>
                    <p>Kami bangga mengumumkan bahwa tim siswa kami telah meraih medali emas di ajang Olimpiade Matematika Nasional tingkat SD.</p>
                    <a href="#" class="read-more">Selengkapnya →</a>
                </div>
            </article>
        </div>
    </div>
</main>

<?php
get_footer();
