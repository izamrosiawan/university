<?php
/*
Template Name: Kontak & Lokasi
*/
get_header();
?>
<section class="page-hero">
    <div class="container">
        <h1 class="section-title">Kontak & Lokasi</h1>
        <p class="section-desc">Hubungi kami untuk informasi PPDB, agenda sekolah, atau kolaborasi.</p>
    </div>
</section>

<section class="section">
    <div class="container contact-grid">
        <div class="card">
            <h2>Kirim Pesan</h2>
            <form>
                <div class="form-field">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" placeholder="Nama orang tua / wali" />
                </div>
                <div class="form-field">
                    <label for="email">Email</label>
                    <input id="email" type="email" placeholder="email@contoh.com" />
                </div>
                <div class="form-field">
                    <label for="telepon">Nomor Telepon</label>
                    <input id="telepon" type="text" placeholder="08xxxxxxxxxx" />
                </div>
                <div class="form-field">
                    <label for="pesan">Pesan</label>
                    <textarea id="pesan" rows="4" placeholder="Tulis pesan Anda..."></textarea>
                </div>
                <button class="btn" type="submit">Kirim Pesan</button>
            </form>
        </div>
        <div class="card">
            <h2>Informasi Kontak</h2>
            <p><strong>Alamat:</strong> Jl. Wonokromo III No. 12, Surabaya</p>
            <p><strong>Telepon:</strong> (031) 555-1234</p>
            <p><strong>Email:</strong> info@sdnwonokromo3.sch.id</p>
            <div class="card-soft">
                <h3>Ikuti Kami</h3>
                <p>Facebook - Instagram - YouTube</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <h2 class="section-title">Lokasi Kami</h2>
        <div class="map-embed">
            <p>Sematkan Google Maps di sini</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Pertanyaan Umum</h2>
        <div class="grid grid-2">
            <div class="faq-item">
                <h4>Kapan pendaftaran PPDB dibuka?</h4>
                <p>Informasi PPDB diumumkan setiap tahun ajaran baru melalui halaman PPDB dan media sosial sekolah.</p>
            </div>
            <div class="faq-item">
                <h4>Apakah tersedia layanan antar jemput?</h4>
                <p>Saat ini sekolah belum menyediakan layanan antar jemput, namun tersedia informasi mitra transportasi.</p>
            </div>
            <div class="faq-item">
                <h4>Bagaimana cara mengajukan kunjungan sekolah?</h4>
                <p>Silakan mengisi form kontak atau menghubungi nomor sekolah untuk penjadwalan.</p>
            </div>
            <div class="faq-item">
                <h4>Apakah ada program beasiswa?</h4>
                <p>Informasi beasiswa disampaikan melalui wali kelas dan pengumuman resmi sekolah.</p>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>
