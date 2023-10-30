-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2023 pada 07.51
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_techno`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_obat`
--

CREATE TABLE `tb_jenis_obat` (
  `id_jenis_obat` int(11) NOT NULL,
  `nama_jenis_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jenis_obat`
--

INSERT INTO `tb_jenis_obat` (`id_jenis_obat`, `nama_jenis_obat`) VALUES
(4, 'obat maag'),
(6, 'obat demam'),
(7, 'obat sakit kepala'),
(9, 'obat sakit gigi'),
(14, 'obat flu'),
(19, 'obat diare');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL,
  `id_jenis_obat` int(50) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` int(30) NOT NULL,
  `tanggal_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `id_jenis_obat`, `nama_obat`, `satuan`, `harga`, `stok`, `tanggal_expired`) VALUES
(5, 4, 'mylanta', 'pcs', '6000', 100, '2023-11-11'),
(6, 6, 'paracetamol', 'pcs', '4000', 50, '2023-11-09'),
(7, 7, 'bodrek', 'pcs', '2500', 20, '2023-11-25'),
(9, 7, 'oskadon', 'pcs', '2500', 30, '2023-12-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `is_active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `fullname`, `is_active`) VALUES
(7, 'surengpati', '$2y$10$i6sd6rss8dUq6h7sb1NC4OgfQ41fyKA6MAgWiS3tVQ1PIs4m0ls.6', 'furqon m', 'Tidak Aktif'),
(8, 'admin', '$2y$10$C6y4y0A0abt.rWFzZBQ8Nu1g8UpR8k7s3trJX1xZZQyiiS1cp9w/y', 'affan bahri', 'Aktif'),
(9, 'afnbhr', '$2y$10$lJ3/bbvdCsIWTqapu3E0GuvFU1xhTjkbOpWnAbki2qHkcODmO05fW', 'Affan', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jenis_obat`
--
ALTER TABLE `tb_jenis_obat`
  ADD PRIMARY KEY (`id_jenis_obat`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_obat`
--
ALTER TABLE `tb_jenis_obat`
  MODIFY `id_jenis_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
