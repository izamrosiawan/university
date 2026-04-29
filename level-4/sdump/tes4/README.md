# SDN Wonokromo III WordPress Theme

## Deskripsi
Theme WordPress untuk SDN Wonokromo III - Sekolah Dasar Negeri Wonokromo III. Theme ini dibangun dengan desain modern dan responsif untuk memberikan pengalaman terbaik bagi pengunjung website sekolah.

## Fitur Utama

- ✅ Design Responsif (Mobile, Tablet, Desktop)
- ✅ Mendukung Custom Logo
- ✅ Menu Navigasi yang Fleksibel
- ✅ Support Post Thumbnails
- ✅ Widget Sidebar
- ✅ Dukungan komentar
- ✅ Pagination
- ✅ Gallery Filter
- ✅ Contact Form
- ✅ SEO Friendly

## Struktur File

```
tes4/
├── style.css              # Main stylesheet dengan theme header
├── functions.php          # Theme functions dan setup
├── index.php             # Main template file
├── header.php            # Header template
├── footer.php            # Footer template
├── single.php            # Single post template
├── page.php              # Page template
├── assets/
│   └── js/
│       └── script.js     # Main JavaScript file
├── README.md             # File dokumentasi ini
└── screenshot.png        # Screenshot theme (optional)
```

## Cara Instalasi

### 1. Upload ke WordPress

1. Download/copy folder `tes4`
2. Upload ke folder `/wp-content/themes/` di server WordPress Anda
3. Login ke WordPress Dashboard
4. Pergi ke **Appearance > Themes**
5. Cari theme "SDN Wonokromo III"
6. Klik **Activate**

### 2. Setup Awal

Setelah mengaktifkan theme:

1. **Setup Logo & Header**
   - Pergi ke **Appearance > Customize**
   - Klik **Site Identity**
   - Upload logo dan atur pengaturan header

2. **Setup Menu**
   - Pergi ke **Appearance > Menus**
   - Buat menu baru
   - Assign ke lokasi **Primary Menu**

3. **Setup Konten**
   - Buat halaman untuk: Beranda, Profil, Galeri, Berita, Kontak
   - Tambahkan post kategori sesuai kebutuhan
   - Setup widgets di sidebar

## Customization

### Mengubah Warna

Edit file `style.css` dan ubah CSS variables di bagian `:root`:

```css
:root {
    --primary-color: #2c3e50;      /* Warna utama */
    --secondary-color: #e74c3c;    /* Warna sekunder */
    --accent-color: #3498db;       /* Warna aksen */
    --light-color: #ecf0f1;        /* Warna terang */
    --dark-color: #34495e;         /* Warna gelap */
    /* ... */
}
```

### Menambah Custom Post Type

Tambahkan di `functions.php`:

```php
function sdn_wonokromo_custom_post_types() {
    register_post_type( 'galeri', array(
        'labels' => array(
            'name' => 'Galeri',
        ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
    ) );
}
add_action( 'init', 'sdn_wonokromo_custom_post_types' );
```

### Menambah Widget Area

Edit `functions.php` di fungsi `sdn_wonokromo_widgets_init()`:

```php
register_sidebar( array(
    'name'          => 'Nama Widget Area',
    'id'            => 'widget-area-id',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) );
```

## Kompatibilitas

- **WordPress Version:** 5.0 atau lebih tinggi
- **PHP Version:** 7.4 atau lebih tinggi
- **Browser Support:** 
  - Chrome (latest)
  - Firefox (latest)
  - Safari (latest)
  - Edge (latest)
  - IE 11 (partial support)

## Hooks dan Filters

### Hooks Tersedia

- `sdn_wonokromo_setup` - Setup theme
- `sdn_wonokromo_enqueue_assets` - Enqueue styles dan scripts

### Filters Tersedia

- `excerpt_length` - Mengubah panjang excerpt
- `excerpt_more` - Mengubah teks "Read More"

## Support & Bantuan

Untuk pertanyaan atau dukungan, silakan hubungi tim development.

## Changelog

### Version 1.0.0
- Initial release
- Basic theme structure
- Responsive design
- Navigation menu
- Gallery dan news section
- Contact form

## License

This theme is licensed under the GPL v2 or later. See the LICENSE file for more information.

---

**Theme Name:** SDN Wonokromo III  
**Version:** 1.0.0  
**Author:** Development Team  
**Last Updated:** April 29, 2026
