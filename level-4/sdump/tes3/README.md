# SDN Wonokromo III - WordPress Theme

Tema WordPress profesional untuk website sekolah SDN Wonokromo III dengan desain modern dan responsif.

## 📋 Daftar Isi

- [Fitur Utama](#fitur-utama)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Struktur File](#struktur-file)
- [Menu yang Tersedia](#menu-yang-tersedia)
- [Halaman Khusus](#halaman-khusus)
- [Customization](#customization)
- [Support](#support)

## ✨ Fitur Utama

- **Desain Responsif**: Tampilan sempurna di semua perangkat (desktop, tablet, mobile)
- **Galeri Foto**: Tampilan galeri dengan filter kategori
- **Berita & Pengumuman**: Sistem publikasi berita dan pengumuman sekolah
- **Halaman Profil**: Informasi lengkap tentang sekolah, visi & misi
- **Kontak & Lokasi**: Formulir kontak dan integrasi Google Maps
- **Homepage Hero**: Bagian hero yang menarik dengan call-to-action
- **Customizer Theme**: Mudah dikustomisasi melalui WordPress Customizer
- **SEO Friendly**: Struktur HTML yang SEO-friendly
- **Aksesibilitas**: Kode yang aksesibel dan standar-compliant

## 💻 Persyaratan Sistem

- WordPress 5.0 atau lebih tinggi
- PHP 7.2 atau lebih tinggi
- MySQL 5.6 atau lebih tinggi
- Browser modern (Chrome, Firefox, Safari, Edge)

## 📥 Instalasi

### Langkah 1: Upload File Theme

1. Download folder `tes3` (theme ini)
2. Buka File Manager WordPress atau gunakan FTP
3. Navigasi ke direktori: `/wp-content/themes/`
4. Upload seluruh folder `tes3` ke direktori themes

### Langkah 2: Aktivasi Theme

1. Login ke WordPress Dashboard
2. Pergi ke **Appearance → Themes**
3. Cari theme "SDN Wonokromo III"
4. Klik tombol **Activate**

### Langkah 3: Setup Menu

1. Pergi ke **Appearance → Menus**
2. Buat menu baru dengan nama "Main Menu"
3. Tambahkan link-link utama:
   - Beranda (Home)
   - Profil Sekolah
   - Galeri Kegiatan
   - Berita & Pengumuman
   - Kontak & Lokasi
4. Di bawah "Display location", centang **Primary Menu**
5. Klik tombol **Save Menu**

### Langkah 4: Buat Halaman Utama

Buat halaman berikut di **Pages → Add New**:

1. **Profil Sekolah** - Isi dengan informasi profil sekolah Anda
2. **Galeri Kegiatan** - Halaman untuk menampilkan galeri foto
3. **Berita & Pengumuman** - Halaman daftar berita
4. **Kontak & Lokasi** - Halaman kontak dengan formulir

Atur halaman Beranda sebagai homepage statis di **Settings → Reading**

## ⚙️ Konfigurasi

### Mengatur Homepage

1. Pergi ke **Settings → Reading**
2. Pilih **A static page** untuk "Your homepage displays"
3. Tentukan halaman mana yang akan ditampilkan di homepage
4. Tentukan halaman untuk berita di bagian "Posts page"
5. Klik **Save Changes**

### Customizer Theme

1. Pergi ke **Appearance → Customize**
2. Buka bagian **SDN Wonokromo III Settings**
3. Customize:
   - **Hero Section**: Judul dan subtitle hero banner
   - **Welcome Section**: Pesan sambutan kepala sekolah
   - **Footer Settings**: Nomor telepon, email, dan alamat

### Logo & Favicon

1. Pergi ke **Appearance → Customize → Site Identity**
2. Upload logo sekolah (rekomendasi: 250x250px)
3. Upload favicon sekolah
4. Isi site title dan tagline
5. Klik **Save & Publish**

### Kategori Berita

Buat kategori berita di **Posts → Categories**:
- Berita
- Agenda
- Info PPDB
- Prestasi Siswa
- Pengumuman

## 📁 Struktur File

```
tes3/
├── style.css              # Main stylesheet
├── script.js              # Main JavaScript
├── functions.php          # Theme functions & hooks
├── header.php             # Header template
├── footer.php             # Footer template
├── index.php              # Homepage template
├── single.php             # Single post template
├── page.php               # Page template
├── archive.php            # Archive/category template
├── comments.php           # Comments template
├── README.md              # This file
└── screenshot.png         # Theme screenshot
```

## 🧭 Menu yang Tersedia

Theme mendukung dua menu location:

1. **Primary Menu** - Menu utama di navbar
2. **Footer Menu** - Menu di footer (opsional)

## 📄 Halaman Khusus

### Homepage (index.php)

Menampilkan:
- Hero section dengan call-to-action
- Quick access buttons
- Welcome section dari kepala sekolah
- Featured programs
- Latest news/berita

### Single Post (single.php)

Menampilkan:
- Judul artikel
- Tanggal dan author
- Gambar featured
- Konten artikel
- Kategori dan tag
- Post navigation
- Comments section

### Page (page.php)

Menampilkan:
- Halaman statis
- Konten fullwidth
- Comments section

### Archive (archive.php)

Menampilkan:
- Daftar berita/artikel
- Filter berdasarkan kategori
- Pagination
- Thumbnail

## 🎨 Customization

### Mengubah Warna

Edit file `style.css` dan ubah variabel CSS:

```css
:root {
    --primary-color: #2c3e50;      /* Warna utama */
    --secondary-color: #e74c3c;    /* Warna sekunder */
    --accent-color: #3498db;       /* Warna aksen */
    --light-color: #ecf0f1;        /* Warna terang */
    --dark-color: #34495e;         /* Warna gelap */
}
```

### Mengubah Font

Tambahkan import Google Fonts di `header.php`:

```php
<link href="https://fonts.googleapis.com/css2?family=YOUR_FONT&display=swap" rel="stylesheet">
```

Kemudian ubah di `style.css`:

```css
body {
    font-family: 'Your Font', sans-serif;
}
```

### Menambah Widget

Widget dapat ditambahkan melalui Dashboard WordPress di **Appearance → Widgets**

## 📝 Membuat Konten

### Membuat Berita

1. Pergi ke **Posts → Add New**
2. Isi judul, konten, dan featured image
3. Pilih kategori yang sesuai
4. Klik **Publish**

### Membuat Halaman

1. Pergi ke **Pages → Add New**
2. Isi judul dan konten
3. Upload featured image jika perlu
4. Klik **Publish**

### Mengunggah Galeri

1. Pergi ke **Media → Add New**
2. Upload foto-foto galeri
3. Gunakan Gutenberg blocks untuk membuat galeri

## 🚀 Optimasi SEO

- Gunakan plugin seperti Yoast SEO atau Rank Math
- Isi meta descriptions untuk setiap halaman
- Gunakan heading tags secara terstruktur
- Optimalkan ukuran gambar (gunakan WP Smush)
- Aktifkan caching dengan plugin seperti WP Super Cache

## 📞 Support

### Masalah Umum

**Q: Menu tidak muncul di navbar**
- A: Buat menu di Appearance → Menus dan set sebagai Primary Menu

**Q: Halaman tidak menampilkan konten**
- A: Pastikan halaman diatur sebagai static homepage di Settings → Reading

**Q: Warna tidak berubah**
- A: Clear browser cache atau gunakan Ctrl+Shift+Delete untuk clear cache

### Kontak Support

Untuk bantuan lebih lanjut, silakan hubungi:
- 📧 Email: info@sdnwonokromo3.sch.id
- 📞 Telepon: (021) 123-4567

## 📄 Lisensi

Theme ini menggunakan GPL v2.0 License. Anda bebas untuk menggunakan, memodifikasi, dan mendistribusikan ulang dengan tetap menjaga lisensi yang sama.

---

**Version**: 1.0.0  
**Last Updated**: April 2026  
**Created for**: SDN Wonokromo III
