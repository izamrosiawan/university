-- 1. Membuat Database
CREATE DATABASE rumah_sakit_sehat_yuk;
USE rumah_sakit_sehat_yuk;

-- 2. Membuat Tabel-Tabel

-- Tabel Pasien
CREATE TABLE Pasien (
    id_pasien INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(255),
    no_hp VARCHAR(15),
    tanggal_lahir DATE,
    golongan_darah VARCHAR(2)
);

-- Tabel Dokter
CREATE TABLE Dokter (
    id_dokter INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(255),
    no_hp VARCHAR(15),
    tanggal_lahir DATE,
    id_poliklinik INT,
    FOREIGN KEY (id_poliklinik) REFERENCES Poliklinik(id_poliklinik)
);

-- Tabel Perawat
CREATE TABLE Perawat (
    id_perawat INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(255),
    no_hp VARCHAR(15),
    tanggal_lahir DATE,
    id_poliklinik INT,
    FOREIGN KEY (id_poliklinik) REFERENCES Poliklinik(id_poliklinik)
);

-- Tabel Apoteker
CREATE TABLE Apoteker (
    id_apoteker INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(255),
    no_hp VARCHAR(15),
    tanggal_lahir DATE
);

-- Tabel Customer Service (CS)
CREATE TABLE CS (
    id_cs INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(255),
    no_hp VARCHAR(15),
    tanggal_lahir DATE
);

-- Tabel Kasir
CREATE TABLE Kasir (
    id_kasir INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(255),
    no_hp VARCHAR(15)
);

-- Tabel Poliklinik
CREATE TABLE Poliklinik (
    id_poliklinik INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    jumlah_dokter INT
);

-- Tabel Obat
CREATE TABLE Obat (
    id_obat INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    jenis_obat VARCHAR(50),
    ukuran VARCHAR(50),
    jumlah INT,
    harga DECIMAL(10, 2),
    id_pemasok INT,
    FOREIGN KEY (id_pemasok) REFERENCES Pemasok(id_pemasok)
);

-- Tabel Pemasok
CREATE TABLE Pemasok (
    id_pemasok INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(255),
    no_hp VARCHAR(15),
    jenis_pemasok VARCHAR(50)
);

-- Tabel Registrasi
CREATE TABLE Registrasi (
    id_registrasi INT PRIMARY KEY AUTO_INCREMENT,
    id_pasien INT,
    id_cs INT,
    id_poliklinik INT,
    id_dokter INT,
    tanggal_registrasi DATE,
    FOREIGN KEY (id_pasien) REFERENCES Pasien(id_pasien),
    FOREIGN KEY (id_cs) REFERENCES CS(id_cs),
    FOREIGN KEY (id_poliklinik) REFERENCES Poliklinik(id_poliklinik),
    FOREIGN KEY (id_dokter) REFERENCES Dokter(id_dokter)
);

-- Tabel Pemeriksaan
CREATE TABLE Pemeriksaan (
    id_pemeriksaan INT PRIMARY KEY AUTO_INCREMENT,
    id_pasien INT,
    id_dokter INT,
    id_perawat INT,
    berat_badan DECIMAL(5, 2),
    tinggi_badan DECIMAL(5, 2),
    suhu DECIMAL(4, 2),
    keluhan TEXT,
    tanggal_pemeriksaan DATE,
    FOREIGN KEY (id_pasien) REFERENCES Pasien(id_pasien),
    FOREIGN KEY (id_dokter) REFERENCES Dokter(id_dokter),
    FOREIGN KEY (id_perawat) REFERENCES Perawat(id_perawat)
);

-- Tabel Resep Obat
CREATE TABLE Resep_Obat (
    id_resep INT PRIMARY KEY AUTO_INCREMENT,
    id_pemeriksaan INT,
    id_obat INT,
    jumlah_obat INT,
    harga_total DECIMAL(10, 2),
    FOREIGN KEY (id_pemeriksaan) REFERENCES Pemeriksaan(id_pemeriksaan),
    FOREIGN KEY (id_obat) REFERENCES Obat(id_obat)
);

-- Tabel Pembayaran
CREATE TABLE Pembayaran (
    id_pembayaran INT PRIMARY KEY AUTO_INCREMENT,
    id_pasien INT,
    id_kasir INT,
    total_bayar DECIMAL(10, 2),
    metode_pembayaran VARCHAR(50),
    tanggal_pembayaran DATE,
    FOREIGN KEY (id_pasien) REFERENCES Pasien(id_pasien),
    FOREIGN KEY (id_kasir) REFERENCES Kasir(id_kasir)
);

-- 3. Memasukkan Data Dummy

-- Data Dummy untuk Tabel Pasien
INSERT INTO Pasien (nama, alamat, no_hp, tanggal_lahir, golongan_darah)
VALUES 
('Budi Santoso', 'Jl. Merdeka No. 123', '081234567890', '1990-05-15', 'A'),
('Ani Wijaya', 'Jl. Sudirman No. 45', '081298765432', '1985-10-20', 'B'),
('Citra Dewi', 'Jl. Gatot Subroto No. 67', '081345678901', '1995-03-25', 'O');

-- Data Dummy untuk Tabel Poliklinik
INSERT INTO Poliklinik (nama, deskripsi, jumlah_dokter)
VALUES 
('Poliklinik Umum', 'Melayani pemeriksaan umum', 5),
('Poliklinik Gigi', 'Melayani pemeriksaan gigi', 3),
('Poliklinik Anak', 'Melayani pemeriksaan anak', 4);

-- Data Dummy untuk Tabel Dokter
INSERT INTO Dokter (nama, alamat, no_hp, tanggal_lahir, id_poliklinik)
VALUES 
('Dr. Ani Wijaya', 'Jl. Sudirman No. 45', '081298765432', '1985-10-20', 1),
('Dr. Budi Santoso', 'Jl. Merdeka No. 123', '081234567890', '1990-05-15', 2),
('Dr. Citra Dewi', 'Jl. Gatot Subroto No. 67', '081345678901', '1995-03-25', 3);

-- Data Dummy untuk Tabel Obat
INSERT INTO Obat (nama, jenis_obat, ukuran, jumlah, harga, id_pemasok)
VALUES 
('Paracetamol', 'Obat Demam', '500mg', 100, 5000, 1),
('Amoxicillin', 'Antibiotik', '500mg', 50, 10000, 2),
('Vitamin C', 'Suplemen', '1000mg', 200, 15000, 3);

-- 4. Query Pengelompokan Data

-- Pengelompokan Data Pasien Berdasarkan Poliklinik
SELECT p.nama AS Nama_Pasien, pl.nama AS Nama_Poliklinik
FROM Pasien p
JOIN Registrasi r ON p.id_pasien = r.id_pasien
JOIN Poliklinik pl ON r.id_poliklinik = pl.id_poliklinik;

-- Pengelompokan Data Obat Berdasarkan Pemasok
SELECT pm.nama AS Nama_Pemasok, COUNT(o.id_obat) AS Jumlah_Obat
FROM Obat o
JOIN Pemasok pm ON o.id_pemasok = pm.id_pemasok
GROUP BY pm.nama;

-- Pengelompokan Data Pembayaran Berdasarkan Metode Pembayaran
SELECT metode_pembayaran, COUNT(id_pembayaran) AS Jumlah_Transaksi
FROM Pembayaran
GROUP BY metode_pembayaran;

-- Pengelompokan Data Pemeriksaan Berdasarkan Dokter
SELECT d.nama AS Nama_Dokter, COUNT(p.id_pemeriksaan) AS Jumlah_Pemeriksaan
FROM Pemeriksaan p
JOIN Dokter d ON p.id_dokter = d.id_dokter
GROUP BY d.nama;

-- Pengelompokan Data Resep Obat Berdasarkan Obat
SELECT o.nama AS Nama_Obat, COUNT(ro.id_resep) AS Jumlah_Resep
FROM Resep_Obat ro
JOIN Obat o ON ro.id_obat = o.id_obat
GROUP BY o.nama;

-- Pengelompokan Data Pasien Berdasarkan Golongan Darah
SELECT golongan_darah, COUNT(id_pasien) AS Jumlah_Pasien
FROM Pasien
GROUP BY golongan_darah;

-- Pengelompokan Data Pembayaran Berdasarkan Bulan
SELECT MONTH(tanggal_pembayaran) AS Bulan, SUM(total_bayar) AS Total_Pendapatan
FROM Pembayaran
GROUP BY MONTH(tanggal_pembayaran);

-- Pengelompokan Data Pemeriksaan Berdasarkan Keluhan
SELECT keluhan, COUNT(id_pemeriksaan) AS Jumlah_Pemeriksaan
FROM Pemeriksaan
GROUP BY keluhan;

-- Pengelompokan Data Obat Berdasarkan Stok
SELECT nama, jumlah
FROM Obat
WHERE jumlah < 10;  -- Misalnya, stok kurang dari 10

-- Pengelompokan Data Pasien Berdasarkan Usia
SELECT 
    CASE 
        WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 18 THEN 'Anak-anak'
        WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 18 AND 35 THEN 'Dewasa Muda'
        WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 36 AND 55 THEN 'Dewasa'
        ELSE 'Lansia'
    END AS Kelompok_Usia,
    COUNT(id_pasien) AS Jumlah_Pasien
FROM Pasien
GROUP BY Kelompok_Usia;