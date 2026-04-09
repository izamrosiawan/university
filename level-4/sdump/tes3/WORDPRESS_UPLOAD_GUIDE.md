# 🚀 PANDUAN PUSH KE WORDPRESS - SDN Wonokromo III Theme

Folder `tes3` sudah siap dipush ke WordPress! Berikut panduan lengkapnya.

---

## 📦 File yang Sudah Disiapkan

Semua file WordPress theme sudah dibuat dengan struktur yang benar:

### ✅ Core Files
- `style.css` - Main stylesheet dengan theme header
- `functions.php` - Theme setup dan customizer
- `script.js` - JavaScript functionality

### ✅ Template Files (12 files)
- `header.php` - Navigation header
- `footer.php` - Footer dengan contact info
- `index.php` - Homepage
- `single.php` - Single post/berita
- `page.php` - Static pages
- `archive.php` - Category/archive pages
- `search.php` - Search results
- `404.php` - Error page
- `comments.php` - Comments template

### ✅ Supporting Files
- `editor-style.css` - Block editor styling
- `README.md` - Dokumentasi lengkap
- `SETUP_GUIDE.md` - Setup checklist

---

## 🔧 CARA UPLOAD KE WORDPRESS

### Metode 1: Upload via FTP / File Manager

**Langkah-langkah:**

1. **Connect ke hosting via FTP**
   - Gunakan FileZilla, WinSCP, atau file manager hosting
   - Masukkan credentials FTP dari hosting

2. **Navigate ke folder themes**
   ```
   /public_html/wp-content/themes/bra
   ```

3. **Upload folder `tes3`**
   - Drag-drop atau upload seluruh folder `tes3`
   - Tunggu sampai selesai

4. **Verify di WordPress Dashboard**
   - Login ke WordPress
   - Go to: **Appearance → Themes**
   - Cari theme "SDN Wonokromo III"
   - Klik **Activate**

---

### Metode 2: Upload via WordPress Dashboard

**Langkah-langkah:**

1. **Compress folder tes3**
   ```
   Right-click folder tes3 → Send to → Compressed (zipped) folder
   ```
   Akan terbuat file `tes3.zip`

2. **Upload theme**
   - Go to: **Appearance → Themes**
   - Klik **Add New**
   - Klik **Upload Theme**
   - Pilih file `tes3.zip`
   - Klik **Install Now**

3. **Activate theme**
   - Klik **Activate** setelah upload selesai

---

### Metode 3: Upload via Hosting Control Panel

**Jika menggunakan cPanel:**

1. **Login ke cPanel**
2. **File Manager**
3. **Navigate ke:** `public_html/wp-content/themes/`
4. **Upload** folder `tes3`

---

## ⚙️ KONFIGURASI AWAL (PENTING!)

Setelah activate theme, ikuti langkah ini:

### 1. Set Site Identity

```
Dashboard → Appearance → Customize → Site Identity
```

- ✅ Upload logo sekolah
- ✅ Isi Site Title: "SDN Wonokromo III"
- ✅ Isi tagline: "Membangun Generasi Penerus"
- ✅ Upload favicon

### 2. Customize Theme Settings

```
Dashboard → Appearance → Customize → SDN Wonokromo III Settings
```

**Hero Section:**
- Judul: "Selamat Datang di SDN Wonokromo III"
- Subtitle: "Membangun Generasi Penerus Bangsa..."

**Welcome Section:**
- Title: "Sambutan Kepala Sekolah"
- Name: "Ibu/Bapak Nama Kepala Sekolah"
- Message: [Copy dari berita.html welcome section]
- Image: Upload foto kepala sekolah

**Footer Settings:**
- Phone: "(021) 123-4567"
- Email: "info@sdnwonokromo3.sch.id"
- Address: "Jalan Pendidikan No. 123, Jakarta"

### 3. Create Navigation Menu

```
Dashboard → Appearance → Menus
```

- ✅ Create new menu "Main Menu"
- ✅ Add pages/links:
  - Home
  - Profil Sekolah
  - Galeri Kegiatan
  - Berita & Pengumuman
  - Kontak & Lokasi

- ✅ Set to "Primary Menu" location

### 4. Setup Homepage

```
Dashboard → Settings → Reading
```

- ✅ Select: "A static page"
- ✅ Homepage: [Pilih halaman Home]
- ✅ Posts page: [Pilih halaman Berita]
- ✅ Save

### 5. Create Required Pages

Buat halaman-halaman berikut di **Pages → Add New**:

1. **Home** - Leave blank, theme will populate
2. **Profil Sekolah** - Isi dengan content
3. **Galeri Kegiatan** - Add photos/gallery
4. **Berita & Pengumuman** - This is posts page
5. **Kontak & Lokasi** - Add contact form

### 6. Setup Categories

```
Dashboard → Posts → Categories
```

Buat kategori:
- Berita
- Agenda
- Info PPDB
- Prestasi Siswa
- Pengumuman

### 7. Create Sample Posts/News

Buat minimal 3-5 berita untuk test:

```
Dashboard → Posts → Add New
- Title: "Peluncuran Program Gemilang 2026"
- Category: Berita
- Upload featured image
- Write content
- Publish
```

---

## ✅ CHECKLIST SETELAH SETUP

- [ ] Theme diaktifkan
- [ ] Logo diupload
- [ ] Navigation menu dibuat
- [ ] Homepage diatur sebagai static page
- [ ] Kategori berita dibuat
- [ ] Minimal 3 berita sudah posted
- [ ] Halaman Profil, Galeri, Kontak sudah dibuat
- [ ] Theme customizer settings sudah diisi
- [ ] Website sudah bisa diakses dengan baik

---

## 🎨 CUSTOMIZE WARNA (OPTIONAL)

Jika ingin mengubah warna tema, edit file `style.css`:

```css
:root {
    --primary-color: #2c3e50;      /* Ubah dari sini */
    --secondary-color: #e74c3c;    /* Ubah dari sini */
    --accent-color: #3498db;       /* Ubah dari sini */
}
```

Contoh warna:
- Navy: #1a3a52
- Red: #d32f2f
- Green: #388e3c
- Blue: #1976d2
- Orange: #f57c00

---

## 📝 CONTENT MIGRATION (Dari tes1)

Untuk migrate content dari `tes1` ke WordPress:

### Images/Assets
1. Dashboard → Media
2. Upload semua gambar dari `tes1/assets/`
3. Organize dalam folders

### Content
1. Copy text dari `tes1/index.html` → **Home page**
2. Copy dari `tes1/profil.html` → **Profil Sekolah page**
3. Copy dari `tes1/berita.html` → **Create Posts**
4. Copy dari `tes1/galeri.html` → **Galeri page + Media**
5. Copy dari `tes1/kontak.html` → **Kontak page**

---

## 🔌 RECOMMENDED PLUGINS

Install plugins berikut untuk fungsionalitas lengkap:

### Essential
- **Contact Form 7** atau **WPForms** - Contact form
- **Yoast SEO** - SEO optimization
- **Wordfence** - Security
- **Updraft Plus** - Backup

### Optional
- **Elementor** - Page builder
- **All in One SEO** - SEO alternative
- **WP Super Cache** - Performance
- **Smush** - Image optimization

---

## 🚨 TROUBLESHOOTING

### Theme tidak muncul di Themes list
- Cek folder structure di `/wp-content/themes/tes3/`
- Pastikan `style.css` ada dan header sudah benar
- Refresh browser

### Menu tidak muncul
- Go to **Appearance → Menus**
- Create menu dan set to **Primary Menu** location
- Save

### Homepage shows posts instead of home page
- Go to **Settings → Reading**
- Select "A static page" option
- Set Homepage

### CSS/JS tidak load
- Refresh browser (Ctrl+Shift+Delete)
- Clear WordPress cache jika ada plugin cache
- Check browser console untuk error

### Contact form tidak bekerja
- Install Contact Form 7 atau WPForms
- Create form dan add ke halaman kontak

---

## 📞 SUPPORT & MAINTENANCE

### Regular Maintenance
- Update WordPress setiap bulan
- Update plugins
- Backup database setiap minggu
- Check untuk broken links
- Monitor page performance

### Monitoring
- Check error logs
- Monitor uptime
- Track analytics
- Review comment/spam

---

## 🎓 TIPS SUKSES

1. **Konsisten dalam update**
   - Selalu backup sebelum update
   - Update WordPress dan plugins secara berkala

2. **Security**
   - Install security plugin
   - Gunakan strong password
   - Minimal 2 admin accounts

3. **Performance**
   - Compress images sebelum upload
   - Install caching plugin
   - Use CDN jika possible

4. **Content**
   - Post berita secara regular
   - Update galeri foto
   - Respond ke comments

5. **SEO**
   - Gunakan deskriptif title dan meta
   - Add internal links
   - Publish valuable content

---

## 📊 DASHBOARD OVERVIEW

Setelah setup sempurna, WordPress dashboard akan menampilkan:

- **Homepage** dengan hero, quick buttons, welcome section, programs, berita
- **News/Posts** dengan kategori dan filter
- **Pages** untuk static content (Profil, Galeri, Kontak)
- **Media** dengan organized assets
- **Users/Admin** untuk manage team

---

## 🎉 SELESAI!

Website Anda sudah siap! 

**Next Steps:**
1. ✅ Mulai buat content
2. ✅ Add team members jika perlu
3. ✅ Setup analytics (Google Analytics)
4. ✅ Setup email notifications
5. ✅ Share ke stakeholders!

---

**Theme Version**: 1.0.0  
**Compatible WordPress**: 5.0 - 6.4+  
**PHP Required**: 7.2+  
**Last Updated**: April 2026
