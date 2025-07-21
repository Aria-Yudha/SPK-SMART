-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2025 pada 16.15
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anekabunga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` varchar(255) NOT NULL,
  `nilai_bobot` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `nilai_bobot`, `keterangan`, `created_at`, `updated_at`) VALUES
('B01', 30, 'Bobot bernilai 30%', NULL, '2025-05-24 19:05:38'),
('B02', 20, 'Bobot bernilai 20%', '2025-05-06 11:47:23', '2025-05-24 19:06:51'),
('B03', 10, 'Bobot bernilai 10%', '2025-05-24 19:07:27', '2025-05-24 19:36:54'),
('B04', 15, 'Bobot bernilai 15%', '2025-05-24 19:08:47', '2025-05-24 19:08:47'),
('B05', 10, 'Bobot bernilai 10%', '2025-05-26 09:38:55', '2025-05-26 09:38:55'),
('B06', 10, 'Bobot bernilai 10%', '2025-05-26 09:39:25', '2025-05-26 09:39:25'),
('B07', 5, 'Bobot bernilai 5%', '2025-05-26 09:39:37', '2025-05-26 09:40:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_supplier`
--

CREATE TABLE `data_supplier` (
  `id_supplier` int(11) NOT NULL,
  `kode_sup` varchar(30) NOT NULL,
  `nama_sup` varchar(30) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_supplier`
--

INSERT INTO `data_supplier` (`id_supplier`, `kode_sup`, `nama_sup`, `nohp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Amanda Flora ', '0813-8028-9620', 'Jl. Sulaiman Blok 13-14 Rawabelong, Jakarta Barat 11540', '2025-05-26', '2025-05-26'),
(2, 'C2', 'Tiara Florist', '0817-980-7652', 'Jalan Sulaiman No. 14  Rawabelong, Jakarta Barat 11540', '2025-05-26', '2025-05-26'),
(3, 'C3', 'Toko Dels', '0877-7700-8325', 'Jalan Sulaiman No. 18 A  Rawabelong, Jakarta Barat 11540', '2025-05-26', '2025-05-26'),
(4, 'C4', 'Cahaya Puspita', '0859-2060-8180', 'Jl. Majapahit no.28 EF Petojo Selatan, Gambir -  Jakarta Pusat 10160', '2025-05-26', '2025-05-26'),
(5, 'C5', 'PT. Polyurethan Teknologi', '021-586 0868', 'Rukan Taman Meruya Blok N - 33A Meruya Utara, Kembangan - Jakarta 11620', '2025-06-03', '2025-06-03'),
(6, 'C6', 'PORTA Flower', '0817-0200-808', 'Ruko Cordova Blok D No. 15-16 JL. Greenlake city Boulevard Petir, cipondoh - tangerang 15147', '2025-06-03', '2025-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `kd_kriteria` varchar(30) NOT NULL,
  `jenis_kriteria` varchar(255) NOT NULL,
  `id_bobot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `kd_kriteria`, `jenis_kriteria`, `id_bobot`) VALUES
(1, 'Kualitas', 'K1', 'Benefit', 'B01'),
(2, 'Harga ', 'K2', 'Cost', 'B02'),
(3, 'Kualitas Pelayanan', 'K3', 'Benefit', 'B03'),
(4, 'Kecepatan Pengiriman', 'K4', 'Benefit', 'B04'),
(5, 'Ketersediaan Bahan', 'K5', 'Benefit', 'B05'),
(6, 'Variasi Bahan', 'K6', 'Benefit', 'B06'),
(7, 'Tenggat Pembayaran', 'K7', 'Benefit', 'B07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_akhir`
--

CREATE TABLE `nilai_akhir` (
  `id_nilaiakhir` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_utility` int(11) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_akhir`
--

INSERT INTO `nilai_akhir` (`id_nilaiakhir`, `id_supplier`, `id_kriteria`, `id_utility`, `nilai_akhir`) VALUES
(701, 1, 1, 288, 0.3),
(702, 1, 2, 289, 0.2),
(703, 1, 3, 290, 0),
(704, 1, 4, 291, 0.15),
(705, 1, 5, 292, 0.05),
(706, 1, 6, 293, 0),
(707, 1, 7, 294, 0.05),
(708, 2, 1, 295, 0),
(709, 2, 2, 296, 0.2),
(710, 2, 3, 297, 0.1),
(711, 2, 4, 298, 0.15),
(712, 2, 5, 299, 0.05),
(713, 2, 6, 300, 0.1),
(714, 2, 7, 301, 0),
(715, 3, 1, 302, 0.3),
(716, 3, 2, 303, 0.1),
(717, 3, 3, 304, 0.1),
(718, 3, 4, 305, 0.15),
(719, 3, 5, 306, 0.1),
(720, 3, 6, 307, 0.05),
(721, 3, 7, 308, 0.025),
(722, 4, 1, 309, 0.3),
(723, 4, 2, 310, 0),
(724, 4, 3, 311, 0),
(725, 4, 4, 312, 0.15),
(726, 4, 5, 313, 0.05),
(727, 4, 6, 314, 0),
(728, 4, 7, 315, 0),
(729, 5, 1, 316, 0.3),
(730, 5, 2, 317, 0.1),
(731, 5, 3, 318, 0),
(732, 5, 4, 319, 0),
(733, 5, 5, 320, 0),
(734, 5, 6, 321, 0),
(735, 5, 7, 322, 0.05),
(736, 6, 1, 323, 0.3),
(737, 6, 2, 324, 0.2),
(738, 6, 3, 325, 0),
(739, 6, 4, 326, 0),
(740, 6, 5, 327, 0),
(741, 6, 6, 328, 0.05),
(742, 6, 7, 329, 0.025);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_utility`
--

CREATE TABLE `nilai_utility` (
  `id_utility` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `nilai_utility` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_utility`
--

INSERT INTO `nilai_utility` (`id_utility`, `id_supplier`, `id_kriteria`, `id_penilaian`, `nilai_utility`) VALUES
(288, 1, 1, 21, 1),
(289, 1, 2, 22, 1),
(290, 1, 3, 23, 0),
(291, 1, 4, 24, 1),
(292, 1, 5, 25, 0.5),
(293, 1, 6, 26, 0),
(294, 1, 7, 27, 1),
(295, 2, 1, 28, 0),
(296, 2, 2, 29, 1),
(297, 2, 3, 30, 1),
(298, 2, 4, 31, 1),
(299, 2, 5, 32, 0.5),
(300, 2, 6, 33, 1),
(301, 2, 7, 34, 0),
(302, 3, 1, 35, 1),
(303, 3, 2, 36, 0.5),
(304, 3, 3, 37, 1),
(305, 3, 4, 38, 1),
(306, 3, 5, 39, 1),
(307, 3, 6, 40, 0.5),
(308, 3, 7, 41, 0.5),
(309, 4, 1, 42, 1),
(310, 4, 2, 43, 0),
(311, 4, 3, 44, 0),
(312, 4, 4, 45, 1),
(313, 4, 5, 46, 0.5),
(314, 4, 6, 47, 0),
(315, 4, 7, 48, 0),
(316, 5, 1, 63, 1),
(317, 5, 2, 64, 0.5),
(318, 5, 3, 65, 0),
(319, 5, 4, 66, 0),
(320, 5, 5, 67, 0),
(321, 5, 6, 68, 0),
(322, 5, 7, 69, 1),
(323, 6, 1, 70, 1),
(324, 6, 2, 71, 1),
(325, 6, 3, 72, 0),
(326, 6, 4, 73, 0),
(327, 6, 5, 74, 0),
(328, 6, 6, 75, 0.5),
(329, 6, 7, 76, 0.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parameter`
--

CREATE TABLE `parameter` (
  `id_parameter` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_parameter` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `parameter`
--

INSERT INTO `parameter` (`id_parameter`, `id_kriteria`, `nilai_parameter`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kurang Baik', '2025-05-25', '2025-05-25'),
(2, 1, 2, 'Baik', '2025-05-25', '2025-05-25'),
(3, 1, 3, 'Sangat Baik', '2025-05-25', '2025-05-25'),
(7, 2, 1, 'Murah', '2025-05-26', '2025-05-26'),
(8, 2, 2, 'Normal', '2025-05-26', '2025-05-26'),
(9, 2, 3, 'Mahal', '2025-05-26', '2025-05-26'),
(10, 3, 1, 'Kurang Baik', '2025-05-26', '2025-05-26'),
(11, 3, 2, 'Baik', '2025-05-26', '2025-05-26'),
(12, 3, 3, 'Sangat Baik', '2025-05-26', '2025-05-26'),
(13, 4, 1, '4 - 7 Hari', '2025-05-26', '2025-05-26'),
(14, 4, 2, '1 - 3 Hari', '2025-05-26', '2025-05-26'),
(15, 4, 3, 'Di hari yang sama', '2025-05-26', '2025-05-26'),
(16, 5, 1, 'Tidak Menentu', '2025-05-26', '2025-05-26'),
(17, 5, 2, 'Tersedia', '2025-05-26', '2025-05-26'),
(18, 5, 3, 'Selalu Tersedia', '2025-05-26', '2025-05-26'),
(19, 6, 1, '2 Bahan', '2025-05-26', '2025-05-26'),
(20, 6, 2, '3 Bahan', '2025-05-26', '2025-05-26'),
(21, 6, 3, '4 Bahan', '2025-05-26', '2025-05-26'),
(22, 7, 1, '1 Minggu', '2025-05-26', '2025-05-26'),
(23, 7, 2, '2 Minggu', '2025-05-26', '2025-05-26'),
(24, 7, 3, '3 - 4 Minggu', '2025-05-26', '2025-05-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_parameter` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_supplier`, `id_kriteria`, `id_parameter`, `created_at`, `updated_at`) VALUES
(21, 1, 1, 2, '2025-05-26', '2025-05-26'),
(22, 1, 2, 7, '2025-05-26', '2025-05-26'),
(23, 1, 3, 11, '2025-05-26', '2025-05-26'),
(24, 1, 4, 15, '2025-05-26', '2025-05-26'),
(25, 1, 5, 17, '2025-05-26', '2025-05-26'),
(26, 1, 6, 19, '2025-05-26', '2025-05-26'),
(27, 1, 7, 24, '2025-05-26', '2025-05-26'),
(28, 2, 1, 1, '2025-05-26', '2025-05-26'),
(29, 2, 2, 7, '2025-05-26', '2025-05-26'),
(30, 2, 3, 12, '2025-05-26', '2025-05-26'),
(31, 2, 4, 15, '2025-05-26', '2025-05-26'),
(32, 2, 5, 17, '2025-05-26', '2025-05-26'),
(33, 2, 6, 21, '2025-05-26', '2025-05-26'),
(34, 2, 7, 22, '2025-05-26', '2025-05-26'),
(35, 3, 1, 2, '2025-05-26', '2025-05-26'),
(36, 3, 2, 8, '2025-05-26', '2025-05-26'),
(37, 3, 3, 12, '2025-05-26', '2025-05-26'),
(38, 3, 4, 15, '2025-05-26', '2025-05-26'),
(39, 3, 5, 18, '2025-05-26', '2025-05-26'),
(40, 3, 6, 20, '2025-05-26', '2025-05-26'),
(41, 3, 7, 23, '2025-05-26', '2025-05-26'),
(42, 4, 1, 2, '2025-05-26', '2025-05-26'),
(43, 4, 2, 9, '2025-05-26', '2025-05-26'),
(44, 4, 3, 11, '2025-05-26', '2025-05-26'),
(45, 4, 4, 15, '2025-05-26', '2025-05-26'),
(46, 4, 5, 17, '2025-05-26', '2025-05-26'),
(47, 4, 6, 19, '2025-05-26', '2025-05-26'),
(48, 4, 7, 22, '2025-05-26', '2025-05-26'),
(63, 5, 1, 2, '2025-06-03', '2025-06-03'),
(64, 5, 2, 8, '2025-06-03', '2025-06-03'),
(65, 5, 3, 11, '2025-06-03', '2025-06-03'),
(66, 5, 4, 14, '2025-06-03', '2025-06-03'),
(67, 5, 5, 16, '2025-06-03', '2025-06-03'),
(68, 5, 6, 19, '2025-06-03', '2025-06-03'),
(69, 5, 7, 24, '2025-06-03', '2025-06-03'),
(70, 6, 1, 2, '2025-06-03', '2025-06-03'),
(71, 6, 2, 7, '2025-06-03', '2025-06-03'),
(72, 6, 3, 11, '2025-06-03', '2025-06-03'),
(73, 6, 4, 14, '2025-06-03', '2025-06-03'),
(74, 6, 5, 16, '2025-06-03', '2025-06-03'),
(75, 6, 6, 20, '2025-06-03', '2025-06-03'),
(76, 6, 7, 23, '2025-06-03', '2025-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `role`) VALUES
(1, 'Tia', 'tiaanekabunga', 'tia123', 'admin'),
(2, 'Teh Indan', 'indananekabunga', 'indan123', 'owner'),
(5, 'Tia', 'tiaanekabunga', 'tia123', ''),
(6, 'Tia', 'tiaanekabunga', 'tia123', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indeks untuk tabel `data_supplier`
--
ALTER TABLE `data_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_bobot` (`id_bobot`),
  ADD KEY `id_bobot_2` (`id_bobot`);

--
-- Indeks untuk tabel `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  ADD PRIMARY KEY (`id_nilaiakhir`),
  ADD KEY `id_supplier` (`id_supplier`,`id_kriteria`,`id_utility`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_utility` (`id_utility`);

--
-- Indeks untuk tabel `nilai_utility`
--
ALTER TABLE `nilai_utility`
  ADD PRIMARY KEY (`id_utility`),
  ADD KEY `id_supplier` (`id_supplier`,`id_kriteria`,`id_penilaian`),
  ADD KEY `id_penliaian` (`id_penilaian`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_parameter` (`id_parameter`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  MODIFY `id_nilaiakhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=743;

--
-- AUTO_INCREMENT untuk tabel `nilai_utility`
--
ALTER TABLE `nilai_utility`
  MODIFY `id_utility` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT untuk tabel `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id_parameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_bobot`) REFERENCES `bobot` (`id_bobot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  ADD CONSTRAINT `nilai_akhir_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `data_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_akhir_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_akhir_ibfk_3` FOREIGN KEY (`id_utility`) REFERENCES `nilai_utility` (`id_utility`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_utility`
--
ALTER TABLE `nilai_utility`
  ADD CONSTRAINT `nilai_utility_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `data_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_utility_ibfk_2` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_utility_ibfk_3` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `parameter`
--
ALTER TABLE `parameter`
  ADD CONSTRAINT `parameter_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `data_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_parameter`) REFERENCES `parameter` (`id_parameter`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
