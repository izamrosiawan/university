# Arcade Shooter (Versi Browser Sederhana)

Game tembak-tembakan vertikal sederhana berbasis HTML5 Canvas + JavaScript tanpa library tambahan.

## Cara Main
1. Simpan tiga file: `index.html`, `style.css`, `game.js` dalam satu folder.
2. Buka `index.html` di browser modern (Chrome / Firefox / Edge).
3. Kontrol:
   - Gerak: ← → atau A / D
   - Tembak: Spasi (atau klik / tap pada kanvas)
   - Pause: P
4. Kumpulkan Power-up:
   - Lingkaran Kuning (+): Tambah skor
   - Ungu (×): Menambah jumlah peluru (multi-shot) sementara
   - Biru (S): Shield (pelindung sementara)

## Fitur
- Level meningkat otomatis setiap ±15 detik (kecepatan & jumlah musuh meningkat).
- 3 tipe musuh: basic, zigzag, tank (tank bisa menembak & lebih tebal).
- Power-up acak.
- High Score disimpan di `localStorage`.
- Efek partikel dan suara sederhana (Web Audio API).

## Modifikasi Cepat
- Ubah ukuran kanvas di `index.html` (atribut width/height).
- Kecepatan spawn musuh: properti `spawnRate` di fungsi `newGame()`.
- Warna & bentuk musuh: bagian rendering di `render()`.

Selamat bermain dan bereksperimen!