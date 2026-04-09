# 📦 File Structure - Tema WordPress SDN Wonokromo III

## ✅ File yang Telah Dibuat dalam Folder `tes3`

### Core Theme Files

| File | Deskripsi |
|------|-----------|
| **style.css** | Stylesheet utama dengan semua styling CSS |
| **script.js** | JavaScript untuk interaktivitas (filter, smooth scroll, form validation) |
| **functions.php** | Fungsi-fungsi WordPress, setup theme, customize options |

### Template Files

| File | Deskripsi |
|------|-----------|
| **header.php** | Template header dengan navbar navigation |
| **footer.php** | Template footer dengan contact info |
| **index.php** | Homepage dengan hero, featured programs, latest news |
| **single.php** | Template untuk single post/berita |
| **page.php** | Template untuk halaman statis |
| **archive.php** | Template untuk daftar berita/kategori |
| **search.php** | Template untuk hasil pencarian |
| **404.php** | Template untuk halaman error 404 |
| **comments.php** | Template untuk comments dan discussion |

### Supporting Files

| File | Deskripsi |
|------|-----------|
| **editor-style.css** | CSS untuk WordPress Block Editor |
| **README.md** | Dokumentasi lengkap tentang tema (panduan instalasi, setup, dll) |

---

## 🎨 Fitur-Fitur yang Sudah Diintegrasikan

### ✨ Frontend Features
- ✅ Hero section dengan call-to-action buttons
- ✅ Quick access buttons (PPDB, Kontak, Profil, Galeri)
- ✅ Welcome section dengan sambutan kepala sekolah
- ✅ Featured programs showcase
- ✅ News/berita grid dengan filter kategori
- ✅ Responsive gallery dengan overlay
- ✅ Contact form dengan validasi
- ✅ Footer dengan informasi sekolah
- ✅ Smooth scrolling navigation

### 🔧 WordPress Integration
- ✅ Theme customizer dengan pengaturan khusus
- ✅ Menu system (Primary + Footer menus)
- ✅ Custom logo support
- ✅ Post thumbnails support
- ✅ Widget areas ready
- ✅ Text domain untuk translation
- ✅ Comments support
- ✅ Category/tag support
- ✅ Pagination support

### 📱 Responsive Design
- ✅ Desktop (1200px+)
- ✅ Tablet (768px - 1199px)
- ✅ Mobile (320px - 767px)

---

## 🚀 Cara Menggunakan Theme Ini

### Langkah 1: Upload ke WordPress
```
1. FTP/File Manager ke: /wp-content/themes/
2. Upload folder tes3
3. Dashboard → Appearance → Themes
4. Cari "SDN Wonokromo III" dan Activate
```

### Langkah 2: Setup Dasar
```
1. Dashboard → Appearance → Customize
2. Site Identity: Upload logo, isi judul
3. SDN Wonokromo III Settings: 
   - Hero Section title & subtitle
   - Welcome message
   - Footer contact info
4. Publish changes
```

### Langkah 3: Buat Menu Navigasi
```
1. Dashboard → Appearance → Menus
2. Create New Menu "Main Menu"
3. Add Items: Beranda, Profil, Galeri, Berita, Kontak
4. Set as Primary Menu
5. Save
```

### Langkah 4: Setup Homepage
```
1. Dashboard → Settings → Reading
2. Select "A static page"
3. Homepage: [Pilih halaman Beranda]
4. Posts page: [Pilih halaman Berita]
5. Save Changes
```

### Langkah 5: Mulai Buat Konten
```
1. Dashboard → Posts → Add New
2. Buat berita/artikel
3. Set kategori (Berita, Agenda, PPDB, Prestasi, dll)
4. Upload featured image
5. Publish
```

---

## 📋 Template Pages yang Perlu Dibuat

Buat halaman berikut di **Pages → Add New**:

1. **Profil Sekolah** (slug: profil-sekolah)
   - Isi dengan sejarah, visi, misi, profil guru, fasilitas

2. **Galeri Kegiatan** (slug: galeri)
   - Gunakan Gutenberg Gallery Block untuk upload foto

3. **Berita & Pengumuman** (slug: berita)
   - Set sebagai Posts page di Settings → Reading

4. **Kontak & Lokasi** (slug: kontak)
   - Tambahkan contact form menggunakan Gutenberg atau plugin contact form
   - Embed Google Maps iframe

5. **Home** (slug: home)
   - Set sebagai homepage di Settings → Reading

---

## 🎨 CSS Variables untuk Customization

Edit di `style.css` untuk mengubah warna:

```css
:root {
    --primary-color: #2c3e50;      /* Navy blue */
    --secondary-color: #e74c3c;    /* Red */
    --accent-color: #3498db;       /* Light blue */
    --light-color: #ecf0f1;        /* Light gray */
    --dark-color: #34495e;         /* Dark gray */
    --white: #ffffff;
    --text-color: #2c3e50;
    --border-color: #bdc3c7;
    --success-color: #27ae60;       /* Green */
}
```

---

## 📞 Customizer Options yang Tersedia

### Hero Section
- Hero Title (string)
- Hero Subtitle (string)

### Welcome Section
- Welcome Title (string)
- Welcome Name (string)
- Welcome Image (image upload)
- Welcome Message (text area)

### Footer Settings
- Phone Number (string)
- Email Address (string)
- Address (string)

---

## 🔗 Struktur URL yang Dihasilkan

Setelah setup, URL akan terstruktur seperti:
```
Domain/                          # Homepage
Domain/profil-sekolah/           # Profil Sekolah page
Domain/galeri/                   # Galeri Kegiatan page
Domain/berita/                   # Berita & Pengumuman page
Domain/kontak/                   # Kontak & Lokasi page
Domain/berita/judul-berita/      # Single post
Domain/category/berita/          # Category archive
Domain/?s=keyword                # Search results
Domain/404/                      # 404 error
```

---

## ✅ Checklist Sebelum Go Live

- [ ] Update WordPress ke versi terbaru
- [ ] Theme sudah activated
- [ ] Logo sekolah sudah diupload
- [ ] Menu navigasi sudah dibuat
- [ ] Homepage sudah diatur
- [ ] Berita kategori sudah dibuat
- [ ] Minimal 3 berita sudah dipublikasikan
- [ ] Contact form sudah setup (plugin)
- [ ] Google Maps embedded di halaman kontak
- [ ] Social media links sudah ditambahkan
- [ ] SSL certificate aktif (HTTPS)
- [ ] Plugins security sudah installed (Wordfence, etc)
- [ ] Backup strategy sudah direncanakan

---

## 📝 Catatan Penting

1. **Plugin Contact Form**: Theme ini tidak include built-in contact form plugin. Install salah satu:
   - WPForms
   - Contact Form 7
   - Forminator
   - Gravity Forms

2. **Gallery Plugin** (Optional): Untuk fitur galeri yang lebih advanced:
   - Elementor (Free version)
   - Gutenberg native blocks sudah cukup

3. **Backup**: Backup database dan files secara regular

4. **Update**: Selalu update WordPress, plugins, dan theme

5. **Performance**: Install caching plugin seperti WP Super Cache atau LiteSpeed Cache

---

## 🎓 Tips Penggunaan

### Membuat Berita Menarik
- Gunakan featured image berkualitas tinggi
- Tulis judul yang menarik dan SEO-friendly
- Gunakan kategori yang konsisten
- Tambahkan excerpt yang informatif

### Optimasi Galeri
- Compress images sebelum upload (gunakan TinyPNG)
- Gunakan deskripsi dan alt text
- Organize dengan folder/category

### SEO Tips
- Install Yoast SEO atau Rank Math
- Gunakan heading hierarchy (h1, h2, h3)
- Buat content yang valuable dan readable
- Add internal links ke artikel lain

---

**Theme Version**: 1.0.0  
**Last Updated**: April 2026  
**WordPress Compatibility**: 5.0+  
**PHP Requirement**: 7.2+
