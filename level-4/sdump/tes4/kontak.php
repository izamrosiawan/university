<?php
/**
 * Kontak & Lokasi
 * 
 * @package SDN_Wonokromo
 */

get_header();
?>

<main id="main-content">
    <div class="container">
        <h1 style="text-align: center; font-size: 2.5rem; color: var(--primary-color); margin: 2rem 0;">Kontak & Lokasi</h1>
        <p style="text-align: center; color: #666; margin-bottom: 3rem;">Hubungi kami dan kunjungi sekolah kami</p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-bottom: 3rem;">
            <!-- Informasi Kontak -->
            <div>
                <h2 style="color: var(--primary-color); margin-bottom: 1.5rem;">Informasi Kontak</h2>
                
                <div style="margin-bottom: 2rem; padding: 1rem; background: #f9f9f9; border-radius: 8px;">
                    <h3 style="margin-bottom: 0.5rem;">📍 Alamat Lengkap</h3>
                    <p>Jalan Pendidikan No. 123<br>Kelurahan Wonokromo<br>Kecamatan Wonokromo<br>Jakarta Timur 13410<br>Provinsi DKI Jakarta</p>
                </div>

                <div style="margin-bottom: 2rem; padding: 1rem; background: #f9f9f9; border-radius: 8px;">
                    <h3 style="margin-bottom: 0.5rem;">📞 Nomor Telepon</h3>
                    <p><strong>Utama:</strong> (021) 123-4567<br><strong>Kepala Sekolah:</strong> (021) 123-4568<br><strong>Tata Usaha:</strong> (021) 123-4569<br><strong>Tersedia:</strong> Senin-Jumat, 07:00-16:00 WIB</p>
                </div>

                <div style="margin-bottom: 2rem; padding: 1rem; background: #f9f9f9; border-radius: 8px;">
                    <h3 style="margin-bottom: 0.5rem;">📧 Email</h3>
                    <p><strong>Email Utama:</strong> <a href="mailto:info@sdnwonokromo3.sch.id">info@sdnwonokromo3.sch.id</a><br><strong>Administrasi:</strong> <a href="mailto:admin@sdnwonokromo3.sch.id">admin@sdnwonokromo3.sch.id</a><br><strong>Layanan Siswa:</strong> <a href="mailto:siswa@sdnwonokromo3.sch.id">siswa@sdnwonokromo3.sch.id</a><br><strong>Respons:</strong> Maksimal 24 jam</p>
                </div>

                <div style="margin-bottom: 2rem; padding: 1rem; background: #f9f9f9; border-radius: 8px;">
                    <h3 style="margin-bottom: 0.5rem;">🕐 Jam Operasional</h3>
                    <p><strong>Hari Kerja:</strong> 07:00 - 16:00 WIB<br><strong>Senin-Jumat:</strong> Buka<br><strong>Sabtu & Minggu:</strong> Tutup<br><strong>Libur Nasional:</strong> Tutup</p>
                </div>

                <div style="margin-bottom: 2rem; padding: 1rem; background: #f9f9f9; border-radius: 8px;">
                    <h3 style="margin-bottom: 0.5rem;">📱 Media Sosial</h3>
                    <p><a href="#" target="_blank">📘 Facebook: SDN Wonokromo III</a><br><a href="#" target="_blank">📷 Instagram: @sdnwonokromo3</a><br><a href="#" target="_blank">▶️ YouTube: SDN Wonokromo III</a><br><a href="#" target="_blank">💬 WhatsApp: 0812-3456-7890</a></p>
                </div>
            </div>

            <!-- Contact Form -->
            <div>
                <h2 style="color: var(--primary-color); margin-bottom: 1.5rem;">Hubungi Kami</h2>
                <form class="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap *</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="telepon">Nomor Telepon</label>
                        <input type="tel" id="telepon" name="telepon">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subjek *</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan *</label>
                        <textarea id="pesan" name="pesan" required></textarea>
                    </div>

                    <button type="submit" class="btn-submit">Kirim Pesan</button>
                </form>
            </div>
        </div>

        <!-- Map -->
        <div style="margin-top: 3rem; background: #f9f9f9; padding: 2rem; border-radius: 8px;">
            <h2 style="color: var(--primary-color); margin-bottom: 1.5rem;">Lokasi Sekolah</h2>
            <div style="width: 100%; height: 400px; background: #ddd; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999;">
                📍 Map akan ditampilkan di sini (integrasikan dengan Google Maps)
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
