-- Buat database kalau belum ada
CREATE DATABASE IF NOT EXISTS rental_studio;
USE rental_studio;

-- Tabel studio
CREATE TABLE studio (
    id_studio INT PRIMARY KEY AUTO_INCREMENT,
    nama_studio VARCHAR(100) NOT NULL,
    lokasi VARCHAR(255),
    harga_per_jam DECIMAL(10,2) NOT NULL,
    fasilitas TEXT
);

-- Tabel penyewa
CREATE TABLE penyewa (
    id_penyewa INT PRIMARY KEY AUTO_INCREMENT,
    nama_penyewa VARCHAR(100) NOT NULL,
    kontak VARCHAR(100),
    tipe_penyewa ENUM('Pribadi', 'Band', 'Komunitas') DEFAULT 'Pribadi'
);

-- Tabel peminjaman
CREATE TABLE peminjaman (
    id_peminjaman INT PRIMARY KEY AUTO_INCREMENT,
    id_studio INT,
    id_penyewa INT,
    tanggal_pinjam DATE NOT NULL,
    jam_mulai TIME NOT NULL,
    jam_selesai TIME NOT NULL,
    FOREIGN KEY (id_studio) REFERENCES studio(id_studio),
    FOREIGN KEY (id_penyewa) REFERENCES penyewa(id_penyewa)
);
