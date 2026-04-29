# 📝 PANDUAN MEMBUAT PAGES MANUAL

Ikuti langkah-langkah di bawah untuk membuat semua pages secara manual di WordPress.

## 🚀 Langkah Awal

1. **Login ke WordPress Admin**
   - Buka: `http://localhost/namaproject/wp-admin`
   - Login dengan akun admin

2. **Aktivkan Theme tes4**
   - Pergi ke **Appearance > Themes**
   - Cari "SDN Wonokromo III"
   - Klik **Activate**

---

## 📄 Membuat Pages

### 1️⃣ Halaman Beranda

1. Pergi ke **Pages > Add New**
2. **Title:** Beranda
3. **Content:** Copy-paste konten dari tes1/index.html atau gunakan template `template-beranda.php`
4. **Page Attributes > Template:** Pilih "Halaman Beranda"
5. Publish

**Tips:** 
- Ganti dummy images dengan real images
- Update link di quick buttons ke pages yang sudah dibuat

---

### 2️⃣ Halaman Profil Sekolah

1. Pergi ke **Pages > Add New**
2. **Title:** Profil Sekolah
3. **Content:** Copy-paste konten profil
4. **Page Attributes > Template:** Pilih "Halaman Profil Sekolah"
5. Publish

**Konten untuk di-copy:**
```
Sejarah SDN Wonokromo III
SDN Wonokromo III didirikan pada tahun 1985 dengan visi untuk menyediakan pendidikan berkualitas bagi masyarakat sekitar. Sekolah ini telah berkembang dari sebuah institusi kecil dengan fasilitas sederhana menjadi sekolah modern yang dilengkapi dengan berbagai sarana penunjang pembelajaran.

Selama lebih dari 40 tahun, SDN Wonokromo III telah menghasilkan ribuan alumni yang tersebar di berbagai profesi dan bidang kehidupan. Kami terus berinovasi dan beradaptasi dengan perkembangan zaman untuk memberikan pendidikan terbaik bagi generasi muda Indonesia.

Perjalanan kami dipenuhi dengan pencapaian dan prestasi yang membanggakan, dari prestasi akademik hingga karakter siswa yang kuat dan bermoral. Kami berterima kasih kepada semua guru, tenaga kependidikan, siswa, dan orang tua yang telah berkontribusi dalam membangun sekolah ini.
```

---

### 3️⃣ Halaman Galeri Kegiatan

1. Pergi ke **Pages > Add New**
2. **Title:** Galeri Kegiatan
3. **Content:** Gunakan template `template-galeri.php`
4. **Page Attributes > Template:** Pilih "Halaman Galeri Kegiatan"
5. Publish

**Langkah tambahan:**
- Upload images ke Media > Upload
- Edit content untuk ganti placeholder images dengan real images
- Setiap image harus memiliki alt text

---

### 4️⃣ Halaman Berita & Pengumuman

1. Pergi ke **Pages > Add New**
2. **Title:** Berita & Pengumuman
3. **Content:** Gunakan template `template-berita.php`
4. **Page Attributes > Template:** Pilih "Halaman Berita & Pengumuman"
5. Publish

**Tips:**
- Page ini akan menampilkan posts terbaru secara otomatis
- Buat beberapa posts agar terlihat bagus

---

### 5️⃣ Halaman Kontak & Lokasi

1. Pergi ke **Pages > Add New**
2. **Title:** Kontak & Lokasi
3. **Content:** Gunakan template `template-kontak.php`
4. **Page Attributes > Template:** Pilih "Halaman Kontak & Lokasi"
5. Publish

**Langkah tambahan:**
- Contact form sudah built-in
- Update email ke email sebenarnya
- Integrasikan Google Maps (optional):
  - Ganti placeholder map dengan embed code Google Maps

---

## 🍔 Membuat Menu

Setelah semua pages dibuat:

1. Pergi ke **Appearance > Menus**
2. Klik **Create a new menu**
3. **Menu name:** Main Menu
4. Tambahkan pages:
   - Beranda
   - Profil Sekolah
   - Galeri Kegiatan
   - Berita & Pengumuman
   - Kontak & Lokasi

5. **Display location:**
   - Centang ✅ "Primary Menu"

6. Klik **Save Menu**

**Menu akan otomatis tampil di navbar theme!**

---

## 📰 Membuat Beberapa Posts (Opsional)

Untuk halaman Berita terlihat lebih bagus, buat beberapa posts:

1. Pergi ke **Posts > Add New**
2. **Title:** Judul Berita
3. **Content:** Isi berita
4. **Featured Image:** Upload gambar
5. **Categories:** Pilih kategori yang sesuai
6. Publish

Buat minimal 3 posts agar halaman Berita terlihat penuh.

---

## 🖼️ Upload Images

Semua template sudah siap dengan placeholder images. Untuk upload real images:

1. Pergi ke **Media > Add New**
2. Upload gambar dari folder tes1/assets
3. Setiap gambar beri nama deskriptif dan alt text
4. Update pages dengan mengganti placeholder images

---

## ✅ Checklist Setelah Selesai

- ✅ 5 Pages dibuat (Beranda, Profil, Galeri, Berita, Kontak)
- ✅ Menu "Main Menu" dibuat dan di-assign ke Primary Menu Location
- ✅ Template di-assign ke setiap page
- ✅ Images di-upload dan di-update di pages
- ✅ Minimal 3 posts dibuat
- ✅ Contact form sudah aktif
- ✅ Menu navigasi tampil di navbar

---

## 📱 Testing

Setelah selesai, test website:

1. **Homepage** - Check hero section dan quick buttons
2. **Navigation** - Klik semua menu items
3. **Pages** - Buka semua pages dan verify konten
4. **Contact Form** - Coba submit form
5. **Responsiveness** - Buka di mobile browser

---

## 🎨 Customization Tips

### Mengubah Warna Theme
Pergi ke **Appearance > Customize**
- Edit CSS di background atau gunakan custom CSS

### Mengubah Logo
- Appearance > Customize > Site Identity
- Upload custom logo

### Mengubah Deskripsi
- Settings > General
- Update "Tagline"

---

## 🆘 Troubleshooting

**Q: Menu tidak muncul?**
A: Pastikan menu sudah di-assign ke "Primary Menu" location

**Q: Pages tidak muncul dengan template?**
A: Pastikan template sudah di-select di Page Attributes

**Q: Images tidak muncul?**
A: Check browser console untuk error, pastikan image URLs benar

**Q: Contact form tidak kirim?**
A: Pastikan WordPress email sudah dikonfigurasi dengan benar di Settings > General

---

## 📞 Support

Jika ada pertanyaan atau kesulitan, silakan hubungi tim development.

---

**Version:** 1.0  
**Created:** April 29, 2026  
**Theme:** SDN Wonokromo III WordPress Theme (tes4)
