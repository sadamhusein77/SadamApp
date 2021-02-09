-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2021 pada 23.38
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arkademy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(13) NOT NULL,
  `jumlah` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `keterangan`, `harga`, `jumlah`) VALUES
(1, 'Bootcamp Fullstack Web Developer', 'Batch 8 kloter 3 ', 0, 0),
(2, 'Bootcamp Fullstack Android Developer', 'Batch 8 Kloter 4', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_code` varchar(6) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role_code`, `role_name`) VALUES
(1, 'ADM001', 'Administrator'),
(3, 'STF001', 'Staff'),
(4, 'SPV001', 'Supervisor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `gender` int(1) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `fullname`, `password`, `gender`, `address`, `email`, `foto`, `is_active`, `date_created`, `last_login`) VALUES
(19, 1, 'Sadam Husein', '$2y$10$pQlFX0hI5fwWRTw35KYR8.yeohhc7uD1F31BVTSGBEfvlXY2gnd0K', 1, 'Jl. Mampangprapatan 18 RT/RW:008/005 No. 71 Kel. Durentiga Kec. Pancoran Jakarta Selatan 12760', 'sadamhusein88.sh@gmail.com', 'bitebrands_-_logo_perusahaan_game_populer10.jpg', 1, 1609096273, 1612910005),
(23, 3, 'Husein', '$2y$10$M9dYMtS0Ju2MbMkOPj2pfuVTysTFlq2baEu26uddW3TkN8gKSrBeS', 0, 'Jl. Mampangprapatan 18', 'sadamhusein77.sh@gmail.com', 'drawn-controller-logo-9.jpg', 1, 1611029496, 1612081214),
(24, 3, 'Lucyana Aprianti', '$2y$10$oDz1iYk/sX0BcevVkiGfqOLEeOBi318M5ETMuqo5fdzrOytWFyH4u', 0, '', 'lucyanoaprianti@gmail.com', 'default.jpg', 1, 1611044102, 1611181962);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(1, 'sadamhusein88.sh@gmail.com', 'pOTu39LOooRq4BFrJS4rrTj06/YJjKSFZom/D2VwkFc=', 1609172443);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
