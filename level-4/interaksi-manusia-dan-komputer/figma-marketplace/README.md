# 🧩 AgriMart - Marketplace Pertanian Mobile App

Kerangka lengkap UI/UX mobile app marketplace untuk produk pertanian lokal, siap pakai dan bisa dikembangkan lebih lanjut.

---

## 📱 **11 Screen Utama**

1. **Splash Screen** - Loading awal dengan logo
2. **Login** - Halaman masuk pengguna
3. **Register** - Pendaftaran akun baru
4. **Home** - Dashboard pembeli dengan kategori & produk populer
5. **Search & Filter** - Pencarian dengan filter kategori, harga, lokasi
6. **Detail Produk** - Tampilan lengkap produk dengan spesifikasi
7. **Cart** - Keranjang belanja dengan ringkasan total
8. **Checkout** - Konfirmasi alamat, kurir, dan metode pembayaran
9. **Payment** - Pilihan metode pembayaran & konfirmasi
10. **Order Status** - Tracking pesanan real-time
11. **Seller Dashboard** - Dashboard penjual dengan stats & upload produk

---

## 🎨 **Design System**

### **Colors**
- **Primary**: `#1BA098` (Hijau) - CTA utama, branding
- **Primary Light**: `#4AC4BD` - Hover, background
- **Primary Dark**: `#0F7368` - Active state
- **Secondary**: `#2563EB` (Biru) - Accent, alternatif
- **Neutral**: Putih (#FFFFFF), Gray (#9CA3AF), Black (#1F2937)

### **Typography**
- **Font Utama**: Poppins (headings, bold text)
- **Font Secondary**: Inter (body text, descriptions)
- **Sizing**: 11px-32px (mobile-optimized)

### **Spacing & Radius**
- Padding: 8px, 12px, 16px, 20px, 24px
- Border Radius: 6px, 8px, 12px, 16px, 24px (chips), 40px (mobile frame)
- Gap: 8px, 12px, 16px

---

## 🧩 **Komponen Reusable**

✓ **Button** (Primary, Secondary, Small)
✓ **Input Field** (Text, Number, Textarea, Select)
✓ **Product Card** (Grid & List layout)
✓ **Bottom Navigation** (Fixed, 4 items)
✓ **Search Bar** (Icon + Input)
✓ **Filter Chip** (Active/Inactive state)
✓ **Modal Dialog** (Dengan animation)
✓ **Toast Notification** (Auto-dismiss)
✓ **Cart Item** (dengan qty selector)
✓ **Stat Card** (untuk dashboard)
✓ **Category Scroll** (Horizontal scroll)
✓ **Header** (dengan back button & icons)

---

## 📦 **Project Structure**

```
figma-marketplace/
├── index.html          # Entry point (single page app)
├── css/
│   └── style.css       # Semua styling mobile-first
└── js/
    └── app.js          # Logic & screen navigation
```

---

## 🚀 **Cara Pakai**

### **1. Buka di Browser**
```bash
# Windows
start index.html

# MacOS
open index.html

# Linux
firefox index.html
```

### **2. Atau buka dengan Live Server (VS Code)**
- Install extension "Live Server"
- Right-click `index.html` → "Open with Live Server"

---

## ⚡ **Fitur Utama**

✅ **Mobile-First Design** - Optimal untuk ukuran 390x844px
✅ **Responsive** - Scaling otomatis, grid flexibel
✅ **No External Dependencies** - Pure HTML, CSS, JavaScript
✅ **Single Page App** - Navigasi smooth tanpa reload
✅ **State Management** - Cart, user data, product list
✅ **Component System** - Semua komponen reusable di CSS
✅ **Animations** - Smooth transitions & micro-interactions
✅ **Dark Mode Ready** - CSS variables mudah diubah

---

## 🎯 **Navigasi Flow**

```
Splash (3s) 
  ↓
Login/Register
  ↓
Home (Dashboard)
  ├→ Search & Filter
  ├→ Detail Produk
  │  ├→ Add to Cart
  │  └→ Back to Home
  ├→ Cart
  │  ├→ Checkout
  │  │  └→ Payment
  │  │     └→ Order Status
  │  └→ Back to Home
  └→ Seller Dashboard
     └→ Upload Produk
```

---

## 🎨 **Prompt Desain (Untuk Figma AI)**

```
"Design a simple mobile marketplace app for agricultural products. 
Use green (#1BA098) as primary color, clean minimalist layout, 
and easy-to-use interface for low-tech users. 

Include: product cards with images/emoji, search bar, filter chips, 
shopping cart, checkout flow, payment methods, seller dashboard, 
and order tracking. 

Style guide: Poppins font, mobile-first 390x844px, 
light gray backgrounds, white cards with subtle shadows. 

Make it feel trusted, modern, and accessible."
```

---

## 🔧 **Customization**

### **Ubah Warna Primary**
Edit di `css/style.css`:
```css
:root {
    --color-primary: #1BA098;  /* Ubah ke warna yang diinginkan */
}
```

### **Tambah Produk**
Di `js/app.js`, tambahkan ke array `app.products`:
```javascript
{ id: 5, name: 'Kentang', location: 'Lembang', price: 15000, icon: '🥔', ... }
```

### **Ubah Nama App**
Cari `AgriMart` di semua file dan ganti dengan nama brand Anda

---

## 📊 **Data Dummy**

Sudah include:
- 4 produk contoh (apel, wortel, tomat, brokoli)
- 2 seller contoh
- Sample cart items
- Mock order tracking

---

## 🚀 **Next Steps (Integrasi Real)**

Untuk production-ready:

1. **Backend Integration**
   - API untuk authenticate & fetch products
   - Database untuk orders, users, sellers

2. **Payment Gateway**
   - Integrasikan Stripe, Midtrans, atau GCash
   - Handle webhooks untuk konfirmasi pembayaran

3. **Real-time Features**
   - WebSocket untuk order tracking
   - Push notifications

4. **Image Upload**
   - File upload untuk foto produk
   - Cloud storage (AWS S3, Firebase)

5. **Progressive Web App (PWA)**
   - Service workers untuk offline mode
   - App install capability

---

## 📝 **License**

Free to use & modify for educational & commercial purposes.

---

## 💡 **Tips**

- Test di mobile browser untuk experience terbaik
- Gunakan Chrome DevTools → Toggle device toolbar (390x844)
- Semua screen fully functional & navigable
- Smooth animations di setiap transisi screen
- Toast notifications untuk user feedback

Enjoy! 🎉
