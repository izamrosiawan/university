# Analisis Perbandingan ResNet vs EfficientNet

## 📊 Deskripsi Proyek

Notebook `lab-deeplearnig.ipynb` ini melakukan analisis komparatif mendalam antara dua arsitektur CNN state-of-the-art untuk klasifikasi buah-buahan:

### Model yang Dibandingkan:

#### 1. **ResNet18 (Residual Network)**
- **Arsitektur**: 18 layer dengan skip connections
- **Keunggulan**: 
  - Mengatasi vanishing gradient problem
  - Training lebih stabil dan cepat
  - Parameter lebih sedikit (~11M parameters)
- **Transfer Learning**: Menggunakan pretrained weights dari ImageNet

#### 2. **EfficientNet-B0**
- **Arsitektur**: Compound scaling (depth, width, resolution)
- **Keunggulan**:
  - Lebih efisien dalam penggunaan parameter
  - Menggunakan Mobile Inverted Bottleneck Convolution (MBConv)
  - Performa lebih baik dengan parameter lebih sedikit (~5M parameters)
- **Transfer Learning**: Menggunakan pretrained weights dari ImageNet

---

## 📁 Struktur Dataset

```
lab/
├── lab-deeplearnig.ipynb          # Notebook analisis utama
├── dataset/
│   ├── train/
│   │   └── train/                 # 33 folder kelas (Apple Braeburn, Banana, dll)
│   └── valid/                     # 33 folder kelas untuk validasi
└── README_ANALISIS.md             # File ini
```

**Dataset berisi 33 kelas buah-buahan:**
- Apple Braeburn, Apple Granny Smith, Apricot, Avocado, Banana, Blueberry
- Cactus fruit, Cantaloupe, Cherry, Clementine, Corn, Cucumber Ripe
- Grape Blue, Kiwi, Lemon, Limes, Mango, Onion White, Orange
- Papaya, Passion Fruit, Peach, Pear, Pepper Green, Pepper Red
- Pineapple, Plum, Pomegranate, Potato Red, Raspberry, Strawberry
- Tomato, Watermelon

---

## 🚀 Cara Menjalankan

### Prasyarat:
```bash
pip install torch torchvision numpy matplotlib seaborn scikit-learn tqdm pandas
```

### Langkah-langkah:

1. **Buka Jupyter Notebook**
   ```bash
   jupyter notebook lab-deeplearnig.ipynb
   ```

2. **Pastikan dataset sudah ada** di folder `dataset/`

3. **Jalankan semua cell secara berurutan**:
   - Cell 1: Import libraries
   - Cell 2-3: Load dan prepare dataset
   - Cell 4-6: Training & evaluation functions
   - Cell 7-10: ResNet18 (definisi, training, evaluasi)
   - Cell 11-14: EfficientNet-B0 (definisi, training, evaluasi)
   - Cell 15-17: Perbandingan dan visualisasi

4. **Review hasil**:
   - Confusion matrix untuk setiap model
   - Tabel perbandingan metrik
   - Grafik training history
   - Classification report detail

---

## 📊 Metrik Evaluasi

### 1. **Confusion Matrix**
Visualisasi heatmap 33x33 yang menunjukkan:
- Diagonal: Prediksi yang benar
- Off-diagonal: Kesalahan klasifikasi antar kelas

### 2. **Accuracy**
```
Accuracy = (TP + TN) / (TP + TN + FP + FN)
```
Persentase total prediksi yang benar dari semua sample

### 3. **Precision (Weighted Average)**
```
Precision = TP / (TP + FP)
```
Ketepatan model dalam memprediksi kelas positif

### 4. **Recall (Weighted Average)**
```
Recall = TP / (TP + FN)
```
Kemampuan model mendeteksi semua instance dari kelas yang sebenarnya

### 5. **F1-Score (Weighted Average)**
```
F1 = 2 × (Precision × Recall) / (Precision + Recall)
```
Harmonic mean yang menyeimbangkan precision dan recall

---

## ⚙️ Konfigurasi Training

### Hyperparameters:

```python
# Data Augmentation (Training)
- Resize: 224×224
- RandomHorizontalFlip
- RandomRotation: ±10°
- ColorJitter (brightness, contrast, saturation: 0.2)

# Normalization (ImageNet stats)
- Mean: [0.485, 0.456, 0.406]
- Std: [0.229, 0.224, 0.225]

# Training Settings
- Batch Size: 32
- Learning Rate: 0.001
- Optimizer: Adam
- Loss Function: CrossEntropyLoss
- Epochs: 10 (adjustable)
- Dropout: 0.3
```

### Transfer Learning Strategy:
- **Freeze** semua layer pretrained
- **Fine-tune** hanya fully connected layers terakhir
- Tambahkan layer kustom:
  - Dense layer (512 neurons)
  - ReLU activation
  - Dropout (0.3)
  - Output layer (33 classes)

---

## 📈 Output yang Dihasilkan

### 1. Model Files:
- `resnet18_fruit_classifier.pth` - Trained ResNet18 model
- `efficientnet_b0_fruit_classifier.pth` - Trained EfficientNet-B0 model

### 2. Visualisasi:
- **Confusion Matrix** untuk ResNet18 (16×14 figure)
- **Confusion Matrix** untuk EfficientNet-B0 (16×14 figure)
- **Comparison Bar Chart**: Accuracy, Precision, Recall, F1-Score
- **Training History**: Train vs Validation accuracy per epoch

### 3. Tabel Perbandingan:
```
==================================================
PERBANDINGAN PERFORMA MODEL
==================================================
        Model  Accuracy  Precision  Recall  F1-Score
     ResNet18    0.XXXX     0.XXXX  0.XXXX    0.XXXX
EfficientNet-B0    0.XXXX     0.XXXX  0.XXXX    0.XXXX
==================================================
```

### 4. Classification Report Detail:
- Per-class precision, recall, F1-score
- Support (jumlah sample) per kelas
- Macro dan weighted average

---

## 🔍 Analisis & Interpretasi

### Perbedaan Arsitektur:

| Aspek | ResNet18 | EfficientNet-B0 |
|-------|----------|----------------|
| **Depth** | 18 layers | Variable (scaled) |
| **Skip Connections** | Yes (Residual) | No (MBConv) |
| **Parameters** | ~11M | ~5M |
| **Training Speed** | Faster | Slightly slower |
| **Inference Speed** | Fast | Very fast |
| **Memory Usage** | Moderate | Lower |
| **Typical Use Case** | Medium-sized datasets | Mobile/edge deployment |

### Ekspektasi Hasil:

**EfficientNet-B0** umumnya akan menunjukkan:
- ✓ **Accuracy lebih tinggi** (~1-3% better)
- ✓ **F1-Score lebih baik** terutama pada kelas minoritas
- ✓ **Generalisasi lebih baik** (val accuracy lebih tinggi)

**ResNet18** akan menunjukkan:
- ✓ **Training lebih cepat** (~15-20% faster)
- ✓ **Lebih stabil** (loss curve lebih smooth)
- ✓ **Baseline yang solid** untuk perbandingan

### Interpretasi Confusion Matrix:

**Yang perlu diperhatikan:**
1. **Diagonal dominan** = Model baik
2. **Off-diagonal tinggi** antara kelas tertentu = Kelas sulit dibedakan
   - Contoh: Apple Braeburn vs Apple Granny Smith
   - Atau: Lemon vs Limes
3. **Baris/kolom dengan banyak kesalahan** = Kelas problematik

---

## 💡 Tips & Troubleshooting

### Jika Training Terlalu Lama:
```python
# Kurangi epochs
num_epochs = 5  # instead of 10

# Atau gunakan batch size lebih besar (jika GPU memadai)
batch_size = 64  # instead of 32
```

### Jika Out of Memory:
```python
# Kurangi batch size
batch_size = 16

# Atau kurangi ukuran gambar
transforms.Resize((128, 128))  # instead of (224, 224)
```

### Jika Overfitting Terjadi:
```python
# Tambahkan dropout
nn.Dropout(0.5)  # increase from 0.3

# Atau tambahkan weight decay
optimizer = optim.Adam(model.parameters(), lr=0.001, weight_decay=1e-4)
```

### Jika Underfitting:
```python
# Unfreeze lebih banyak layer
for param in resnet_model.layer4.parameters():
    param.requires_grad = True
```

---

## 📚 Referensi

### Papers:
1. **ResNet**: He et al., "Deep Residual Learning for Image Recognition" (CVPR 2016)
2. **EfficientNet**: Tan & Le, "EfficientNet: Rethinking Model Scaling for CNNs" (ICML 2019)

### Dataset:
- Fruit Classification Dataset (33 classes)
- Sumber: [sesuaikan dengan sumber dataset Anda]

---

## 🎯 Kesimpulan

Notebook ini memberikan framework lengkap untuk:
✅ Membandingkan dua arsitektur CNN modern
✅ Evaluasi komprehensif dengan multiple metrics
✅ Visualisasi yang informatif
✅ Analisis mendalam tentang performa model

**Model terbaik** akan ditentukan berdasarkan:
1. Highest validation accuracy
2. Best F1-Score (terutama jika kelas imbalanced)
3. Lowest overfitting (gap antara train & val accuracy)
4. Fastest inference time (jika deployment consideration)

---

## 📧 Support

Jika ada pertanyaan atau issues, silakan:
1. Check dokumentasi PyTorch dan torchvision
2. Review error messages dengan teliti
3. Pastikan semua dependencies ter-install
4. Verifikasi struktur dataset sudah benar

**Happy Analyzing! 🚀**
