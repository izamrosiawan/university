// === App State ===
const app = {
    currentScreen: 'splash',
    user: null,
    cart: [],
    products: [
        { id: 1, name: 'Apel Segar', location: 'Bandung', price: 45000, icon: '🍎', rating: 4.8, qty: 100, category: 'buah', desc: 'Apel segar langsung dari perkebunan' },
        { id: 2, name: 'Wortel Organik', location: 'Garut', price: 12000, icon: '🥕', rating: 4.5, qty: 200, category: 'sayur', desc: 'Wortel berkualitas tinggi, organik' },
        { id: 3, name: 'Tomat Merah', location: 'Karawang', price: 8000, icon: '🍅', rating: 4.7, qty: 150, category: 'sayur', desc: 'Tomat merah matang sempurna' },
        { id: 4, name: 'Brokoli Hijau', location: 'Cisarua', price: 25000, icon: '🥦', rating: 4.9, qty: 80, category: 'sayur', desc: 'Brokoli segar dan berwarna hijau' },
    ],
    sellers: [
        { id: 1, name: 'Tani Jaya', products: 45, rating: 4.8 },
        { id: 2, name: 'Hasil Bumi', products: 32, rating: 4.6 },
    ]
};

// === Screen Renderer ===
const screens = {
    splash: () => `
        <div class="screen active">
            <div class="splash-content">
                <div class="splash-logo">🌾</div>
                <h1 class="splash-title">AgriMart</h1>
                <p class="splash-subtitle">Marketplace Pertanian Lokal</p>
                <div class="splash-loader-group">
                    <div class="splash-loader" style="animation-delay: 0s;"></div>
                    <div class="splash-loader" style="animation-delay: 0.2s;"></div>
                    <div class="splash-loader" style="animation-delay: 0.4s;"></div>
                </div>
            </div>
        </div>
    `,

    login: () => `
        <div class="screen active">
            <div class="auth-content">
                <div class="auth-header">
                    <div class="auth-icon">👤</div>
                    <h1 class="auth-title">Masuk</h1>
                    <p class="auth-subtitle">Akses akun Anda</p>
                </div>
                
                <form class="auth-form">
                    <div class="input-group">
                        <label class="input-label">Email atau Username</label>
                        <input type="email" class="input-field" placeholder="user@example.com" required>
                    </div>
                    <div class="input-group">
                        <label class="input-label">Password</label>
                        <input type="password" class="input-field" placeholder="••••••••" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="app.handleLogin()">Masuk</button>
                </form>

                <div class="auth-footer">
                    <p class="auth-link">Belum punya akun? <a onclick="app.goTo('register')">Daftar di sini</a></p>
                </div>
            </div>

            <div class="bottom-nav">
                <div class="nav-item active" onclick="app.goTo('login')">
                    <div class="nav-icon">🔐</div>
                    <div class="nav-label">Masuk</div>
                </div>
                <div class="nav-item" onclick="app.goTo('register')">
                    <div class="nav-icon">📝</div>
                    <div class="nav-label">Daftar</div>
                </div>
            </div>
        </div>
    `,

    register: () => `
        <div class="screen active">
            <div class="auth-content">
                <div class="auth-header">
                    <div class="auth-icon">👥</div>
                    <h1 class="auth-title">Daftar</h1>
                    <p class="auth-subtitle">Buat akun baru</p>
                </div>
                
                <form class="auth-form">
                    <div class="input-group">
                        <label class="input-label">Nama Lengkap</label>
                        <input type="text" class="input-field" placeholder="Nama Anda" required>
                    </div>
                    <div class="input-group">
                        <label class="input-label">Email</label>
                        <input type="email" class="input-field" placeholder="email@example.com" required>
                    </div>
                    <div class="input-group">
                        <label class="input-label">Password</label>
                        <input type="password" class="input-field" placeholder="••••••••" required>
                    </div>
                    <div class="input-group">
                        <label class="input-label">Konfirmasi Password</label>
                        <input type="password" class="input-field" placeholder="••••••••" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="app.handleRegister()">Daftar</button>
                </form>

                <div class="auth-footer">
                    <p class="auth-link">Sudah punya akun? <a onclick="app.goTo('login')">Masuk di sini</a></p>
                </div>
            </div>

            <div class="bottom-nav">
                <div class="nav-item" onclick="app.goTo('login')">
                    <div class="nav-icon">🔐</div>
                    <div class="nav-label">Masuk</div>
                </div>
                <div class="nav-item active" onclick="app.goTo('register')">
                    <div class="nav-icon">📝</div>
                    <div class="nav-label">Daftar</div>
                </div>
            </div>
        </div>
    `,

    home: () => `
        <div class="screen active">
            <div class="home-header">
                <div class="home-greeting">Halo,</div>
                <div class="home-name">Pembeli</div>
            </div>

            <div class="screen-content">
                <div class="search-bar">
                    <span class="search-icon">🔍</span>
                    <input type="text" placeholder="Cari produk..." onclick="app.goTo('search')">
                </div>

                <div class="home-section-title">Kategori</div>
                <div class="category-scroll">
                    <div class="category-item active">
                        <div class="category-icon">🍎</div>
                        <div class="category-name">Buah</div>
                    </div>
                    <div class="category-item">
                        <div class="category-icon">🥕</div>
                        <div class="category-name">Sayur</div>
                    </div>
                    <div class="category-item">
                        <div class="category-icon">🌽</div>
                        <div class="category-name">Biji</div>
                    </div>
                    <div class="category-item">
                        <div class="category-icon">🍄</div>
                        <div class="category-name">Jamur</div>
                    </div>
                </div>

                <div class="home-section-title">Produk Terpopuler</div>
                ${app.products.map(p => `
                    <div class="product-card" onclick="app.goTo('detail', ${p.id})">
                        <div class="product-image ${['apple', 'carrot', 'tomato', 'broccoli'][p.id - 1]}">
                            ${p.icon}
                        </div>
                        <div class="product-info">
                            <div class="product-name">${p.name}</div>
                            <div class="product-location">📍 ${p.location}</div>
                            <div class="product-footer">
                                <div>
                                    <div class="product-price">Rp ${p.price.toLocaleString()}</div>
                                    <div class="product-qty">Stok: ${p.qty}</div>
                                </div>
                                <div class="product-rating">⭐ ${p.rating}</div>
                            </div>
                        </div>
                    </div>
                `).join('')}
            </div>

            <div class="bottom-nav">
                <div class="nav-item active" onclick="app.goTo('home')">
                    <div class="nav-icon">🏠</div>
                    <div class="nav-label">Home</div>
                </div>
                <div class="nav-item" onclick="app.goTo('search')">
                    <div class="nav-icon">🔍</div>
                    <div class="nav-label">Cari</div>
                </div>
                <div class="nav-item" onclick="app.goTo('cart')">
                    <div class="nav-icon">🛒</div>
                    <div class="nav-label">Keranjang</div>
                </div>
                <div class="nav-item" onclick="app.goTo('seller')">
                    <div class="nav-icon">🏪</div>
                    <div class="nav-label">Jual</div>
                </div>
            </div>
        </div>
    `,

    search: () => `
        <div class="screen active">
            <div class="header">
                <button class="header-icon" onclick="app.goTo('home')" style="background: transparent;">←</button>
                <div class="header-title">Cari Produk</div>
                <div class="header-icon" style="opacity: 0;"></div>
            </div>

            <div class="screen-content">
                <div class="search-bar">
                    <span class="search-icon">🔍</span>
                    <input type="text" placeholder="Ketik untuk mencari..." autofocus>
                </div>

                <div class="home-section-title">Filter</div>
                <div class="filter-container">
                    <div class="filter-chip active">Semua</div>
                    <div class="filter-chip">Buah</div>
                    <div class="filter-chip">Sayur</div>
                    <div class="filter-chip">Biji</div>
                </div>

                <div class="input-group">
                    <label class="input-label">Harga (Rp)</label>
                    <div style="display: flex; gap: 8px;">
                        <input type="number" class="input-field" placeholder="Min" style="flex: 1;">
                        <input type="number" class="input-field" placeholder="Max" style="flex: 1;">
                    </div>
                </div>

                <div class="home-section-title">Hasil (4)</div>
                ${app.products.map(p => `
                    <div class="product-card" onclick="app.goTo('detail', ${p.id})">
                        <div class="product-image ${['apple', 'carrot', 'tomato', 'broccoli'][p.id - 1]}">
                            ${p.icon}
                        </div>
                        <div class="product-info">
                            <div class="product-name">${p.name}</div>
                            <div class="product-location">📍 ${p.location}</div>
                            <div class="product-footer">
                                <div>
                                    <div class="product-price">Rp ${p.price.toLocaleString()}</div>
                                    <div class="product-qty">Stok: ${p.qty}</div>
                                </div>
                                <div class="product-rating">⭐ ${p.rating}</div>
                            </div>
                        </div>
                    </div>
                `).join('')}
            </div>

            <div class="bottom-nav">
                <div class="nav-item" onclick="app.goTo('home')">
                    <div class="nav-icon">🏠</div>
                    <div class="nav-label">Home</div>
                </div>
                <div class="nav-item active" onclick="app.goTo('search')">
                    <div class="nav-icon">🔍</div>
                    <div class="nav-label">Cari</div>
                </div>
                <div class="nav-item" onclick="app.goTo('cart')">
                    <div class="nav-icon">🛒</div>
                    <div class="nav-label">Keranjang</div>
                </div>
                <div class="nav-item" onclick="app.goTo('seller')">
                    <div class="nav-icon">🏪</div>
                    <div class="nav-label">Jual</div>
                </div>
            </div>
        </div>
    `,

    detail: (productId) => {
        const product = app.products.find(p => p.id === productId);
        if (!product) return '';

        return `
            <div class="screen active">
                <div class="detail-header">
                    <div class="detail-image ${['apple', 'carrot', 'tomato', 'broccoli'][productId - 1]}">
                        ${product.icon}
                    </div>
                    <button class="detail-back" onclick="app.goTo('home')">←</button>
                </div>

                <div class="screen-content">
                    <div class="detail-title">${product.name}</div>
                    <div class="detail-meta">
                        <div class="detail-location">📍 ${product.location}</div>
                        <div class="detail-rating">⭐ ${product.rating}</div>
                    </div>

                    <div class="detail-price">Rp ${product.price.toLocaleString()}/kg</div>

                    <div class="detail-description">
                        ${product.desc}
                    </div>

                    <div class="detail-specs">
                        <div class="detail-spec-item">
                            <span class="detail-spec-label">Stok Tersedia</span>
                            <span class="detail-spec-value">${product.qty} kg</span>
                        </div>
                        <div class="detail-spec-item">
                            <span class="detail-spec-label">Jenis</span>
                            <span class="detail-spec-value">${product.category}</span>
                        </div>
                        <div class="detail-spec-item">
                            <span class="detail-spec-label">Rating</span>
                            <span class="detail-spec-value">${product.rating}/5.0</span>
                        </div>
                    </div>

                    <div class="qty-selector">
                        <label class="qty-label">Jumlah (kg):</label>
                        <button class="qty-button" onclick="app.decreaseQty()">−</button>
                        <div class="qty-display" id="qty-display">1</div>
                        <button class="qty-button" onclick="app.increaseQty()">+</button>
                    </div>

                    <button class="btn btn-primary" onclick="app.addToCart(${productId})">Tambah ke Keranjang 🛒</button>
                </div>

                <div class="bottom-nav">
                    <div class="nav-item" onclick="app.goTo('home')">
                        <div class="nav-icon">🏠</div>
                        <div class="nav-label">Home</div>
                    </div>
                    <div class="nav-item" onclick="app.goTo('search')">
                        <div class="nav-icon">🔍</div>
                        <div class="nav-label">Cari</div>
                    </div>
                    <div class="nav-item" onclick="app.goTo('cart')">
                        <div class="nav-icon">🛒</div>
                        <div class="nav-label">Keranjang</div>
                    </div>
                    <div class="nav-item" onclick="app.goTo('seller')">
                        <div class="nav-icon">🏪</div>
                        <div class="nav-label">Jual</div>
                    </div>
                </div>
            </div>
        `;
    },

    cart: () => {
        const total = app.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

        return `
            <div class="screen active">
                <div class="header">
                    <button class="header-icon" onclick="app.goTo('home')" style="background: transparent;">←</button>
                    <div class="header-title">Keranjang</div>
                    <div class="header-icon" style="opacity: 0;"></div>
                </div>

                <div class="screen-content">
                    ${app.cart.length === 0 ? `
                        <div class="cart-empty">
                            <div class="cart-empty-icon">🛒</div>
                            <p>Keranjang Anda kosong</p>
                            <p style="font-size: 12px; margin-top: 8px;">Mulai berbelanja sekarang!</p>
                        </div>
                    ` : `
                        ${app.cart.map((item, idx) => `
                            <div class="cart-item">
                                <div class="cart-item-image">${item.icon}</div>
                                <div class="cart-item-info">
                                    <div class="cart-item-name">${item.name}</div>
                                    <div class="cart-item-price">Rp ${item.price.toLocaleString()}</div>
                                    <div class="cart-item-qty">
                                        <button class="qty-button" style="width: 24px; height: 24px;" onclick="app.removeFromCart(${idx})">−</button>
                                        <span style="min-width: 30px; text-align: center;">${item.quantity}</span>
                                        <button class="qty-button" style="width: 24px; height: 24px;" onclick="app.addToCartByIdx(${idx})">+</button>
                                    </div>
                                </div>
                            </div>
                        `).join('')}

                        <div class="cart-summary">
                            <div class="summary-row">
                                <span>Subtotal</span>
                                <span>Rp ${total.toLocaleString()}</span>
                            </div>
                            <div class="summary-row">
                                <span>Ongkos Kirim</span>
                                <span>Rp 25.000</span>
                            </div>
                            <div class="summary-row">
                                <span>Diskon</span>
                                <span>−Rp 0</span>
                            </div>
                            <div class="summary-row total">
                                <span>Total</span>
                                <span>Rp ${(total + 25000).toLocaleString()}</span>
                            </div>
                        </div>
                    `}
                </div>

                ${app.cart.length > 0 ? `
                    <div style="padding: 16px; border-top: 1px solid #E5E7EB;">
                        <button class="btn btn-primary" onclick="app.goTo('checkout')" style="margin-top: 0;">Lanjut ke Checkout →</button>
                    </div>
                ` : ''}

                <div class="bottom-nav">
                    <div class="nav-item" onclick="app.goTo('home')">
                        <div class="nav-icon">🏠</div>
                        <div class="nav-label">Home</div>
                    </div>
                    <div class="nav-item" onclick="app.goTo('search')">
                        <div class="nav-icon">🔍</div>
                        <div class="nav-label">Cari</div>
                    </div>
                    <div class="nav-item active" onclick="app.goTo('cart')">
                        <div class="nav-icon">🛒</div>
                        <div class="nav-label">Keranjang</div>
                    </div>
                    <div class="nav-item" onclick="app.goTo('seller')">
                        <div class="nav-icon">🏪</div>
                        <div class="nav-label">Jual</div>
                    </div>
                </div>
            </div>
        `;
    },

    checkout: () => `
        <div class="screen active">
            <div class="header">
                <button class="header-icon" onclick="app.goTo('cart')" style="background: transparent;">←</button>
                <div class="header-title">Checkout</div>
                <div class="header-icon" style="opacity: 0;"></div>
            </div>

            <div class="screen-content">
                <div class="checkout-section">
                    <div class="section-title">📍 Alamat Pengiriman</div>
                    <div class="checkout-info">
                        <div class="info-label">Nama Penerima</div>
                        <div class="info-value">Budi Santoso</div>
                    </div>
                    <div class="checkout-info">
                        <div class="info-label">Alamat Lengkap</div>
                        <div class="info-value">Jl. Raya Bandung No.123, Bandung, 40123</div>
                    </div>
                    <button class="btn btn-secondary" style="margin-top: 8px; padding: 8px 16px;">Ubah Alamat</button>
                </div>

                <div class="checkout-section">
                    <div class="section-title">📦 Pengiriman</div>
                    <div class="checkout-info">
                        <div class="info-label">Kurir</div>
                        <div class="info-value">JNE Reguler</div>
                    </div>
                    <div class="checkout-info">
                        <div class="info-label">Estimasi</div>
                        <div class="info-value">2-3 hari kerja</div>
                    </div>
                </div>

                <div class="checkout-section">
                    <div class="section-title">💳 Metode Pembayaran</div>
                    <div class="checkout-info">
                        <div class="info-label">Pilihan</div>
                        <div class="info-value">
                            <input type="radio" name="payment" checked> Transfer Bank
                            <br style="margin-top: 8px;">
                            <input type="radio" name="payment"> E-Wallet
                            <br style="margin-top: 8px;">
                            <input type="radio" name="payment"> COD
                        </div>
                    </div>
                </div>

                <div class="checkout-section">
                    <div class="section-title">💰 Ringkasan Pesanan</div>
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>Rp 210.000</span>
                    </div>
                    <div class="summary-row">
                        <span>Ongkos Kirim</span>
                        <span>Rp 25.000</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total Bayar</span>
                        <span>Rp 235.000</span>
                    </div>
                </div>
            </div>

            <div style="padding: 16px; border-top: 1px solid #E5E7EB;">
                <button class="btn btn-primary" onclick="app.goTo('payment')" style="margin-top: 0;">Lanjut ke Pembayaran →</button>
            </div>

            <div class="bottom-nav">
                <div class="nav-item" onclick="app.goTo('home')">
                    <div class="nav-icon">🏠</div>
                    <div class="nav-label">Home</div>
                </div>
                <div class="nav-item" onclick="app.goTo('search')">
                    <div class="nav-icon">🔍</div>
                    <div class="nav-label">Cari</div>
                </div>
                <div class="nav-item" onclick="app.goTo('cart')">
                    <div class="nav-icon">🛒</div>
                    <div class="nav-label">Keranjang</div>
                </div>
                <div class="nav-item" onclick="app.goTo('seller')">
                    <div class="nav-icon">🏪</div>
                    <div class="nav-label">Jual</div>
                </div>
            </div>
        </div>
    `,

    payment: () => `
        <div class="screen active">
            <div class="header">
                <button class="header-icon" onclick="app.goTo('checkout')" style="background: transparent;">←</button>
                <div class="header-title">Pembayaran</div>
                <div class="header-icon" style="opacity: 0;"></div>
            </div>

            <div class="screen-content">
                <div class="checkout-section">
                    <div class="section-title">💳 Metode Pembayaran</div>
                    <label style="display: block; padding: 12px; background: var(--color-white); border: 2px solid var(--color-primary); border-radius: 8px; margin-bottom: 8px; cursor: pointer;">
                        <input type="radio" name="payment" checked> <strong>Transfer Bank</strong>
                        <p style="font-size: 11px; color: var(--color-gray); margin-top: 4px;">Biaya gratis, hingga 1 jam</p>
                    </label>
                    <label style="display: block; padding: 12px; background: var(--color-white); border: 1px solid #E5E7EB; border-radius: 8px; margin-bottom: 8px; cursor: pointer;">
                        <input type="radio" name="payment"> <strong>E-Wallet (OVO/DANA)</strong>
                        <p style="font-size: 11px; color: var(--color-gray); margin-top: 4px;">Instant, hingga 5 menit</p>
                    </label>
                    <label style="display: block; padding: 12px; background: var(--color-white); border: 1px solid #E5E7EB; border-radius: 8px; margin-bottom: 8px; cursor: pointer;">
                        <input type="radio" name="payment"> <strong>COD (Bayar Ditempat)</strong>
                        <p style="font-size: 11px; color: var(--color-gray); margin-top: 4px;">Bayar saat barang tiba</p>
                    </label>
                </div>

                <div class="checkout-section">
                    <div class="section-title">📋 Detail Pembayaran</div>
                    <div class="checkout-info">
                        <div class="info-label">No. Pesanan</div>
                        <div class="info-value">#ORD-2026-04-001</div>
                    </div>
                    <div class="checkout-info">
                        <div class="info-label">Total Pembayaran</div>
                        <div class="info-value" style="color: var(--color-primary); font-size: 18px; font-weight: 700;">Rp 235.000</div>
                    </div>
                    <div class="checkout-info">
                        <div class="info-label">Batas Pembayaran</div>
                        <div class="info-value">Hari ini, 20:00 WIB</div>
                    </div>
                </div>
            </div>

            <div style="padding: 16px; border-top: 1px solid #E5E7EB;">
                <button class="btn btn-primary" onclick="app.completePayment()" style="margin-top: 0;">Bayar Sekarang</button>
                <button class="btn btn-secondary" onclick="app.goTo('cart')" style="margin-top: 0;">Batalkan</button>
            </div>

            <div class="bottom-nav">
                <div class="nav-item" onclick="app.goTo('home')">
                    <div class="nav-icon">🏠</div>
                    <div class="nav-label">Home</div>
                </div>
                <div class="nav-item" onclick="app.goTo('search')">
                    <div class="nav-icon">🔍</div>
                    <div class="nav-label">Cari</div>
                </div>
                <div class="nav-item" onclick="app.goTo('cart')">
                    <div class="nav-icon">🛒</div>
                    <div class="nav-label">Keranjang</div>
                </div>
                <div class="nav-item" onclick="app.goTo('seller')">
                    <div class="nav-icon">🏪</div>
                    <div class="nav-label">Jual</div>
                </div>
            </div>
        </div>
    `,

    order: () => `
        <div class="screen active">
            <div class="header">
                <button class="header-icon" onclick="app.goTo('home')" style="background: transparent;">←</button>
                <div class="header-title">Status Pesanan</div>
                <div class="header-icon" style="opacity: 0;"></div>
            </div>

            <div class="screen-content">
                <div class="checkout-section">
                    <div class="section-title">✅ Pesanan Berhasil!</div>
                    <div style="text-align: center; padding: 20px 0;">
                        <div style="font-size: 48px; margin-bottom: 12px;">🎉</div>
                        <div style="font-size: 16px; font-weight: 700; color: var(--color-black); margin-bottom: 8px;">Pembayaran Diterima</div>
                        <div style="font-size: 13px; color: var(--color-gray);">Terima kasih atas pembelian Anda!</div>
                    </div>
                </div>

                <div class="checkout-section">
                    <div class="section-title">📍 Tracking Pesanan</div>
                    <div style="padding: 16px 0;">
                        <div style="display: flex; align-items: flex-start; margin-bottom: 16px;">
                            <div style="color: var(--color-primary); font-size: 20px; margin-right: 12px;">✓</div>
                            <div>
                                <div style="font-weight: 700; color: var(--color-black);">Pembayaran Dikonfirmasi</div>
                                <div style="font-size: 12px; color: var(--color-gray);">14 April 2026, 14:30 WIB</div>
                            </div>
                        </div>
                        <div style="display: flex; align-items: flex-start; margin-bottom: 16px;">
                            <div style="color: var(--color-gray); font-size: 20px; margin-right: 12px;">○</div>
                            <div>
                                <div style="font-weight: 700; color: var(--color-dark-gray);">Barang Dikemas</div>
                                <div style="font-size: 12px; color: var(--color-gray);">Menunggu...</div>
                            </div>
                        </div>
                        <div style="display: flex; align-items: flex-start; margin-bottom: 16px;">
                            <div style="color: var(--color-gray); font-size: 20px; margin-right: 12px;">○</div>
                            <div>
                                <div style="font-weight: 700; color: var(--color-dark-gray);">Barang Dikirim</div>
                                <div style="font-size: 12px; color: var(--color-gray);">Menunggu...</div>
                            </div>
                        </div>
                        <div style="display: flex; align-items: flex-start;">
                            <div style="color: var(--color-gray); font-size: 20px; margin-right: 12px;">○</div>
                            <div>
                                <div style="font-weight: 700; color: var(--color-dark-gray);">Barang Tiba</div>
                                <div style="font-size: 12px; color: var(--color-gray);">Menunggu...</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="checkout-section">
                    <div class="section-title">📦 Detail Pesanan</div>
                    <div class="checkout-info">
                        <div class="info-label">No. Pesanan</div>
                        <div class="info-value">#ORD-2026-04-001</div>
                    </div>
                    <div class="checkout-info">
                        <div class="info-label">Tanggal Pesan</div>
                        <div class="info-value">14 April 2026, 14:00 WIB</div>
                    </div>
                    <div class="checkout-info">
                        <div class="info-label">Total Pesanan</div>
                        <div class="info-value">Rp 235.000</div>
                    </div>
                </div>
            </div>

            <div style="padding: 16px; border-top: 1px solid #E5E7EB;">
                <button class="btn btn-primary" onclick="app.goTo('home')" style="margin-top: 0;">Kembali ke Home</button>
            </div>

            <div class="bottom-nav">
                <div class="nav-item active" onclick="app.goTo('home')">
                    <div class="nav-icon">🏠</div>
                    <div class="nav-label">Home</div>
                </div>
                <div class="nav-item" onclick="app.goTo('search')">
                    <div class="nav-icon">🔍</div>
                    <div class="nav-label">Cari</div>
                </div>
                <div class="nav-item" onclick="app.goTo('cart')">
                    <div class="nav-icon">🛒</div>
                    <div class="nav-label">Keranjang</div>
                </div>
                <div class="nav-item" onclick="app.goTo('seller')">
                    <div class="nav-icon">🏪</div>
                    <div class="nav-label">Jual</div>
                </div>
            </div>
        </div>
    `,

    seller: () => `
        <div class="screen active">
            <div class="header">
                <div style="width: 32px;"></div>
                <div class="header-title">Dashboard Penjual</div>
                <button class="header-icon" onclick="app.showToast('Settings')">⚙️</button>
            </div>

            <div class="screen-content">
                <div class="seller-stats">
                    <div class="stat-card">
                        <div class="stat-value">12</div>
                        <div class="stat-label">Produk</div>
                    </div>
                    <div class="stat-card" style="background: linear-gradient(135deg, var(--color-secondary-light), var(--color-secondary));">
                        <div class="stat-value">4.8</div>
                        <div class="stat-label">Rating</div>
                    </div>
                </div>

                <div class="home-section-title">Menu Cepat</div>
                <div class="seller-menu">
                    <div class="menu-item" onclick="app.goTo('upload')">
                        <div class="menu-icon">📤</div>
                        <div class="menu-title">Upload Produk</div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-icon">📊</div>
                        <div class="menu-title">Laporan Penjualan</div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-icon">📋</div>
                        <div class="menu-title">Kelola Produk</div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-icon">📦</div>
                        <div class="menu-title">Pesanan Masuk</div>
                    </div>
                </div>

                <div class="home-section-title">Produk Terbaru</div>
                <div class="product-grid">
                    ${app.products.slice(0, 4).map((p, idx) => `
                        <div class="product-card">
                            <div class="product-image ${['apple', 'carrot', 'tomato', 'broccoli'][idx]}">
                                ${p.icon}
                            </div>
                            <div class="product-info">
                                <div class="product-name" style="font-size: 12px;">${p.name}</div>
                                <div class="product-price" style="font-size: 12px;">Rp ${p.price.toLocaleString()}</div>
                                <div class="product-qty" style="font-size: 11px;">Stok: ${p.qty}</div>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>

            <button class="fab" onclick="app.goTo('upload')">+</button>

            <div class="bottom-nav">
                <div class="nav-item" onclick="app.goTo('home')">
                    <div class="nav-icon">🏠</div>
                    <div class="nav-label">Home</div>
                </div>
                <div class="nav-item" onclick="app.goTo('search')">
                    <div class="nav-icon">🔍</div>
                    <div class="nav-label">Cari</div>
                </div>
                <div class="nav-item" onclick="app.goTo('cart')">
                    <div class="nav-icon">🛒</div>
                    <div class="nav-label">Keranjang</div>
                </div>
                <div class="nav-item active" onclick="app.goTo('seller')">
                    <div class="nav-icon">🏪</div>
                    <div class="nav-label">Jual</div>
                </div>
            </div>
        </div>
    `,

    upload: () => `
        <div class="screen active">
            <div class="header">
                <button class="header-icon" onclick="app.goTo('seller')" style="background: transparent;">←</button>
                <div class="header-title">Upload Produk</div>
                <div class="header-icon" style="opacity: 0;"></div>
            </div>

            <div class="screen-content">
                <div class="input-group">
                    <label class="input-label">Nama Produk</label>
                    <input type="text" class="input-field" placeholder="Cth: Apel Segar Bandung">
                </div>

                <div class="input-group">
                    <label class="input-label">Kategori</label>
                    <select class="input-field">
                        <option>-- Pilih Kategori --</option>
                        <option>🍎 Buah</option>
                        <option>🥕 Sayur</option>
                        <option>🌽 Biji</option>
                        <option>🍄 Jamur</option>
                    </select>
                </div>

                <div class="input-group">
                    <label class="input-label">Harga (Rp/kg)</label>
                    <input type="number" class="input-field" placeholder="45000">
                </div>

                <div class="input-group">
                    <label class="input-label">Stok (kg)</label>
                    <input type="number" class="input-field" placeholder="100">
                </div>

                <div class="input-group">
                    <label class="input-label">Deskripsi</label>
                    <textarea class="input-field" style="resize: vertical; min-height: 80px;" placeholder="Jelaskan produk Anda..."></textarea>
                </div>

                <div class="input-group">
                    <label class="input-label">Upload Foto</label>
                    <div style="border: 2px dashed var(--color-primary); border-radius: 8px; padding: 32px 16px; text-align: center; cursor: pointer; transition: all 0.3s;">
                        <div style="font-size: 32px; margin-bottom: 8px;">📷</div>
                        <div style="font-size: 13px; font-weight: 600; color: var(--color-primary);">Tap untuk upload foto</div>
                        <input type="file" style="display: none;">
                    </div>
                </div>

                <button class="btn btn-primary" onclick="app.showToast('Produk berhasil diupload!')">Upload Produk 📤</button>
            </div>

            <div class="bottom-nav">
                <div class="nav-item" onclick="app.goTo('home')">
                    <div class="nav-icon">🏠</div>
                    <div class="nav-label">Home</div>
                </div>
                <div class="nav-item" onclick="app.goTo('search')">
                    <div class="nav-icon">🔍</div>
                    <div class="nav-label">Cari</div>
                </div>
                <div class="nav-item" onclick="app.goTo('cart')">
                    <div class="nav-icon">🛒</div>
                    <div class="nav-label">Keranjang</div>
                </div>
                <div class="nav-item active" onclick="app.goTo('seller')">
                    <div class="nav-icon">🏪</div>
                    <div class="nav-label">Jual</div>
                </div>
            </div>
        </div>
    `,
};

// === App Methods ===
app.goTo = function(screenName, productId) {
    const appEl = document.getElementById('app');
    let html = `<div class="mobile-frame">`;

    if (screenName === 'detail' && productId) {
        html += screens.detail(productId);
    } else if (screens[screenName]) {
        html += screens[screenName]();
    } else {
        html += screens.home();
    }

    html += `</div>`;
    appEl.innerHTML = html;

    app.currentScreen = screenName;

    // Auto redirect splash to login
    if (screenName === 'splash') {
        setTimeout(() => app.goTo('login'), 3000);
    }
};

app.handleLogin = function() {
    app.user = { name: 'Pembeli', role: 'buyer' };
    app.goTo('home');
};

app.handleRegister = function() {
    app.user = { name: 'Penjual Baru', role: 'seller' };
    app.goTo('home');
};

app.addToCart = function(productId) {
    const product = app.products.find(p => p.id === productId);
    const qty = parseInt(document.getElementById('qty-display')?.textContent || 1);
    
    const existing = app.cart.find(item => item.id === productId);
    if (existing) {
        existing.quantity += qty;
    } else {
        app.cart.push({
            ...product,
            quantity: qty
        });
    }

    app.showToast(`${product.name} ditambahkan ke keranjang!`);
    app.goTo('cart');
};

app.removeFromCart = function(idx) {
    if (app.cart[idx].quantity > 1) {
        app.cart[idx].quantity--;
    } else {
        app.cart.splice(idx, 1);
    }
    app.goTo('cart');
};

app.addToCartByIdx = function(idx) {
    app.cart[idx].quantity++;
    app.goTo('cart');
};

app.increaseQty = function() {
    const display = document.getElementById('qty-display');
    if (display) {
        display.textContent = parseInt(display.textContent) + 1;
    }
};

app.decreaseQty = function() {
    const display = document.getElementById('qty-display');
    if (display && parseInt(display.textContent) > 1) {
        display.textContent = parseInt(display.textContent) - 1;
    }
};

app.completePayment = function() {
    app.cart = [];
    app.goTo('order');
};

app.showToast = function(msg) {
    const toast = document.createElement('div');
    toast.className = 'toast show';
    toast.textContent = msg;
    document.body.appendChild(toast);

    setTimeout(() => toast.remove(), 2000);
};

// === Init ===
app.goTo('splash');
