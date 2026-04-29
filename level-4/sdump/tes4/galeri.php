<?php
/**
 * Galeri Kegiatan
 * 
 * @package SDN_Wonokromo
 */

get_header();
?>

<main id="main-content">
    <div class="container">
        <h1 style="text-align: center; font-size: 2.5rem; color: var(--primary-color); margin: 2rem 0;">Galeri Kegiatan</h1>
        <p style="text-align: center; color: #666; margin-bottom: 2rem;">Koleksi momen berharga dari berbagai kegiatan sekolah kami</p>

        <!-- Filter Buttons -->
        <div class="filter-buttons" style="margin-bottom: 2rem;">
            <button class="filter-btn active" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="pembelajaran">Pembelajaran</button>
            <button class="filter-btn" data-filter="lomba">Lomba & Prestasi</button>
            <button class="filter-btn" data-filter="karakter">Kegiatan Karakter</button>
            <button class="filter-btn" data-filter="edukatif">Kunjungan Edukatif</button>
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-grid">
            <!-- Pembelajaran -->
            <div class="gallery-item pembelajaran" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Pembelajaran Interaktif
                </div>
            </div>
            <div class="gallery-item pembelajaran" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Praktik Laboratorium
                </div>
            </div>
            <div class="gallery-item pembelajaran" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Pembelajaran Kooperatif
                </div>
            </div>

            <!-- Lomba & Prestasi -->
            <div class="gallery-item lomba" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Olimpiade Matematika
                </div>
            </div>
            <div class="gallery-item lomba" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Cerdas Cermat
                </div>
            </div>
            <div class="gallery-item lomba" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Lomba Olahraga
                </div>
            </div>

            <!-- Kegiatan Karakter -->
            <div class="gallery-item karakter" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Upacara Bendera
                </div>
            </div>
            <div class="gallery-item karakter" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Kegiatan Sosial
                </div>
            </div>
            <div class="gallery-item karakter" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Program Literasi
                </div>
            </div>

            <!-- Kunjungan Edukatif -->
            <div class="gallery-item edukatif" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Museum Nasional
                </div>
            </div>
            <div class="gallery-item edukatif" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Taman Nasional
                </div>
            </div>
            <div class="gallery-item edukatif" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #ddd; height: 250px; display: flex; align-items: center; justify-content: center;">
                    📷 Pabrik Edukatif
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
