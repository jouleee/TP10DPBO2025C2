# TP10DPBO2025C2
Tugas Praktikum 10 DPBO C2 - Sistem Peminjaman Studio Musik

Aplikasi web sederhana berbasis PHP untuk mengelola penyewaan studio musik. Proyek ini dibangun dengan arsitektur **MVVM**, menggunakan **PDO dan prepared statements** untuk keamanan, serta mendukung **CRUD pada semua tabel** dan **fitur data binding**.

---

## Janji
Saya Julian Dwi Satrio dengan NIM 2300484 mengerjakan Tugas Praktikum 10 dalam Mata Kuliah Desain Pemrograman Berorientasi Objek. Untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah di spesifikasikan. Aamiin.

## 📌 Fitur Utama
- CRUD untuk:
  - Studio
  - Penyewa
  - Peminjaman
- Data binding otomatis dari input form ke objek model
- Arsitektur MVVM (Model-View-ViewModel)
- Penggunaan PDO & prepared statements (anti SQL injection)

---

## 🗃️ Struktur Tabel (MySQL)

### 1. `studio`
| Kolom          | Tipe Data     | Keterangan         |
|----------------|---------------|--------------------|
| id_studio      | INT (PK)      | ID unik studio     |
| nama_studio    | VARCHAR(100)  | Nama studio        |
| lokasi         | VARCHAR(255)  | Lokasi studio      |
| harga_per_jam  | DECIMAL(10,2) | Biaya per jam      |

### 2. `penyewa`
| Kolom         | Tipe Data     | Keterangan               |
|---------------|---------------|--------------------------|
| id_penyewa    | INT (PK)      | ID unik penyewa          |
| nama_penyewa  | VARCHAR(100)  | Nama individu/band       |
| kontak        | VARCHAR(100)  | Email / No HP            |

### 3. `peminjaman`
| Kolom           | Tipe Data     | Keterangan                              |
|-----------------|---------------|-----------------------------------------|
| id_peminjaman   | INT (PK)      | ID unik transaksi peminjaman            |
| id_studio       | INT (FK)      | Relasi ke `studio`                      |
| id_penyewa      | INT (FK)      | Relasi ke `penyewa`                     |
| tanggal_pinjam  | DATE          | Tanggal peminjaman                      |
| jam_mulai       | TIME          | Jam mulai pemakaian                     |
| jam_selesai     | TIME          | Jam selesai                             |

---

## 🏗️ Desain Arsitektur (MVVM)
```
📦 MVVM/
├── 📁 config/
│   └── Database.php
│
├── 📁 database/
│   └── studio.sql
│
├── 📁 model/
│   ├── Peminjaman.php
│   ├── Penyewa.php
│   └── Studio.php
│
├── 📁 viewmodel/
│   ├── PeminjamanViewModel.php
│   ├── PenyewaViewModel.php
│   └── StudioViewModel.php
│
├── 📁 views/
│   ├── 📁 template/
│   │   ├── header.php
│   │   └── footer.php
│   │
│   ├── peminjaman_form.php
│   ├── peminjaman_list.php
│   ├── penyewa_form.php
│   ├── penyewa_list.php
│   ├── studio_form.php
│   └── studio_list.php
│
└── index.php

```


- **Model**: Representasi struktur data & interaksi database.
- **ViewModel**: Menangani logika CRUD & binding data dari view ke model.
- **View**: Antarmuka HTML yang berinteraksi dengan pengguna.

---

## 🔁 Alur Program

1. Pengguna membuka halaman view (contoh: studio_list.php)
2. View akan memanggil ViewModel terkait (StudioViewModel.php)
3. ViewModel akan melakukan aksi sesuai request (add, update, delete, get)
4. ViewModel mengakses Model untuk komunikasi ke database melalui PDO
5. Data dari Model dikirim balik ke View untuk ditampilkan

---

## 🔐 Keamanan
- Semua query menggunakan **PDO** dan **prepared statement**.
- Tidak ada query raw/langsung dari input pengguna.
- Validasi input sederhana dilakukan pada ViewModel.

---

## Dokumentasi


https://github.com/user-attachments/assets/9f9af7be-d885-494b-b732-93336782aed9

