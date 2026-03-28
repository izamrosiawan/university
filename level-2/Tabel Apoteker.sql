-- Tabel Apoteker (sudah ada)
CREATE TABLE Apoteker (
    id_apoteker INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(255),
    no_hp VARCHAR(15),
    tanggal_lahir DATE
);

-- Tabel Resep_Obat (ditambahkan relasi ke Apoteker)
CREATE TABLE Resep_Obat (
    id_resep INT PRIMARY KEY AUTO_INCREMENT,
    id_pemeriksaan INT,
    id_obat INT,
    id_apoteker INT,  -- Relasi ke Apoteker
    jumlah_obat INT,
    harga_total DECIMAL(10, 2),
    FOREIGN KEY (id_pemeriksaan) REFERENCES Pemeriksaan(id_pemeriksaan),
    FOREIGN KEY (id_obat) REFERENCES Obat(id_obat),
    FOREIGN KEY (id_apoteker) REFERENCES Apoteker(id_apoteker)  -- Relasi ke Apoteker
);

-- Tabel Obat (ditambahkan relasi ke Apoteker)
CREATE TABLE Obat (
    id_obat INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    jenis_obat VARCHAR(50),
    ukuran VARCHAR(50),
    jumlah INT,
    harga DECIMAL(10, 2),
    id_pemasok INT,
    id_apoteker INT,  -- Relasi ke Apoteker
    FOREIGN KEY (id_pemasok) REFERENCES Pemasok(id_pemasok),
    FOREIGN KEY (id_apoteker) REFERENCES Apoteker(id_apoteker)  -- Relasi ke Apoteker
);