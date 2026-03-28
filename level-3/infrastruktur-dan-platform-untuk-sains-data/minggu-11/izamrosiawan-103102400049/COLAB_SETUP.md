# 🚀 Setup untuk Google Colab

Notebook `main-2.ipynb` udah diupdate supaya bisa jalan di Google Colab dengan GPU gratis!

## 📋 Langkah-langkah Setup

### 1. Upload Notebook ke Colab
1. Buka [Google Colab](https://colab.research.google.com/)
2. Klik **File** → **Upload notebook**
3. Upload file `main-2.ipynb`

### 2. Aktifkan GPU
1. Klik **Runtime** → **Change runtime type**
2. Di **Hardware accelerator**, pilih **GPU** (T4 atau V100)
3. Klik **Save**

### 3. Persiapan Dataset

Ada 2 cara upload dataset:

#### Cara 1: Upload Langsung (Untuk dataset < 100MB)
1. Zip dulu folder `dataset` kamu jadi `dataset.zip`
2. Jalankan cell "Upload dataset zip ke Colab"
3. Klik tombol **Choose Files** dan upload `dataset.zip`
4. Wait sampai selesai extract

#### Cara 2: Via Google Drive (Recommended untuk dataset besar)
1. Upload `dataset.zip` ke Google Drive kamu
2. Jalankan cell "Mount Google Drive"
3. Authorize akses Google Drive
4. Uncomment dan edit cell ini:
   ```python
   !unzip "/content/drive/MyDrive/path/to/your/dataset.zip" -d /content/dataset
   ```
5. Ganti path sesuai lokasi zip kamu di Drive

### 4. Verifikasi Setup
Jalankan cell "Check GPU availability" untuk cek:
- ✅ GPU aktif (NVIDIA-SMI output muncul)
- ✅ Dataset terdeteksi (jumlah classes muncul)

### 5. Training
Sekarang tinggal jalankan cell training kayak biasa:
- Training CNN → ~15-20 menit
- Training ResNet50 → ~10-15 menit  
- Training EfficientNet → ~10-15 menit

**Total waktu:** ~40-50 menit (jauh lebih cepat dari CPU local!)

### 6. Backup Model (Penting!)
Colab session bakal reset setelah 12 jam atau kalau idle terlalu lama.

Jalankan cell backup untuk save model ke Google Drive:
```python
# Backup model otomatis ke Drive
```

Model akan tersimpan di: `MyDrive/lab_models/`

## ⚡ Tips Colab

1. **Keep Colab Alive**: Buka Inspect → Console, paste ini:
   ```javascript
   function KeepClicking(){
      console.log("Clicking");
      document.querySelector("colab-toolbar-button#connect").click()
   }
   setInterval(KeepClicking,60000)
   ```

2. **Monitor GPU Usage**: Klik icon RAM/Disk di kanan atas untuk lihat GPU usage

3. **Download Results**: Setelah training, download semua file hasil:
   - Model files (`.pth`)
   - Visualizations (`.png`)
   - CSV results

4. **Free Tier Limits**:
   - GPU: ~12 jam max per session
   - RAM: ~12-16GB
   - Disk: ~80GB

## 🐛 Troubleshooting

### GPU tidak aktif
```python
!nvidia-smi
# Kalau error, coba:
# Runtime → Change runtime type → GPU → Save
# Runtime → Restart runtime
```

### Dataset not found
Cek path nya:
```python
!ls -la /content/dataset/
!ls -la /content/dataset/train/train/
```

### Out of Memory (OOM)
Reduce batch size:
```python
BATCH_SIZE = 16  # atau 8
```

### Connection timeout
- Colab disconnect karena idle
- Refresh page dan restart runtime
- Kalau udah backup model, tinggal load lagi

## 📊 Expected Performance dengan GPU

**CNN Standar:**
- Train time: ~1-2 menit/epoch
- Total: ~15-20 menit

**ResNet50:**
- Train time: ~1-1.5 menit/epoch
- Total: ~10-15 menit

**EfficientNet:**
- Train time: ~1-1.5 menit/epoch
- Total: ~10-15 menit

**CPU (local) vs GPU (Colab):**
- Speedup: **10-20x lebih cepat!** 🚀

## 💾 Structure Dataset yang Benar

Pastikan structure dataset nya seperti ini:
```
/content/dataset/
├── train/
│   └── train/
│       ├── Apple Braeburn/
│       ├── Apple Granny Smith/
│       ├── Apricot/
│       └── ... (33 classes)
├── valid/
│   ├── Apple Braeburn/
│   ├── Apple Granny Smith/
│   └── ...
└── test/
    └── test/
```

## 🎯 Next Steps

Setelah training selesai:
1. ✅ Check accuracy & metrics
2. ✅ Download confusion matrices
3. ✅ Backup models ke Drive
4. ✅ Download comparison.csv
5. ✅ Download semua visualizations

Happy training! 🔥
