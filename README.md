# 🧮 SPK-SMART (Sistem Penunjang Keputusan Metode SMART)

Proyek ini merupakan implementasi dari **Sistem Penunjang Keputusan (SPK)** menggunakan metode **SMART (Simple Multi Attribute Rating Technique)** berbasis web.  
Dikembangkan dengan framework **CodeIgniter 4**, aplikasi ini membantu dalam proses pengambilan keputusan multi-kriteria seperti pemilihan supplier, karyawan terbaik, atau produk unggulan secara **objektif dan terukur**.

---

## 📋 Daftar Isi
- [Fitur Utama](#-fitur-utama)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Struktur Folder](#-struktur-folder)
- [Prasyarat Instalasi](#-prasyarat-instalasi)
- [Langkah Instalasi](#-langkah-instalasi)
- [Contoh Penggunaan](#-contoh-penggunaan)
- [Kontribusi](#-kontribusi)
- [Lisensi](#-lisensi)
- [Pengembang](#-pengembang)

---

## 🚀 Fitur Utama

- 🧾 **Manajemen Kriteria & Bobot**  
  CRUD untuk menambah, mengubah, dan menghapus kriteria beserta bobotnya.

- 📊 **Input Nilai Parameter**  
  Setiap alternatif (supplier/karyawan/produk) dapat dinilai berdasarkan parameter masing-masing kriteria.

- ⚙️ **Perhitungan Otomatis Metode SMART**  
  Sistem secara otomatis melakukan normalisasi, menghitung nilai utility, dan menghasilkan skor akhir.

- 🏆 **Perankingan Alternatif**  
  Menampilkan hasil akhir berdasarkan skor tertinggi dengan penandaan *alternatif terbaik*.

- 👨‍💼 **Manajemen Pengguna & Login Admin**  
  Akses sistem melalui autentikasi user dengan tampilan dashboard berbasis template SB Admin / AdminLTE.

- 📈 **Visualisasi Hasil**  
  Data hasil perhitungan dan ranking ditampilkan dalam bentuk tabel dan grafik agar mudah dipahami.

---

## 🛠 Teknologi yang Digunakan

| Komponen | Teknologi |
|-----------|------------|
| Backend | PHP 8+ dengan CodeIgniter 4 |
| Frontend | HTML5, CSS3, Bootstrap 5, SB Admin 2 / AdminLTE |
| Database | MySQL / MariaDB |
| Tools | Composer, PHPUnit, phpMyAdmin |
| Template | SB Admin 2 atau AdminLTE (customized) |

---

## 🗂 Struktur Folder

SPK-SMART/
│
├── app/ # Folder utama aplikasi (Controller, Model, View)
│ ├── Controllers/ # Logika utama sistem (Kriteria, Bobot, Parameter, Penilaian, dll)
│ ├── Models/ # Query database & fungsi helper
│ └── Views/ # Tampilan (HTML/Bootstrap)
│
├── public/ # Root folder yang diakses browser
│ ├── assets/ # File CSS, JS, gambar
│ └── index.php # Entry point aplikasi
│
├── writable/ # Cache, logs, uploads
│
├── tests/ # Unit test dengan PHPUnit
│
├── anekabunga.sql # File contoh database
├── composer.json # File dependensi Composer
├── phpunit.xml.dist # Konfigurasi unit testing
├── spark # CLI bawaan CodeIgniter
└── .env.example # Contoh konfigurasi environmen
