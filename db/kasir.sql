-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2024 pada 06.58
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
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `abladmin`
--

CREATE TABLE `abladmin` (
  `nomor` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamatktp` varchar(255) NOT NULL,
  `alamattujuan` varchar(255) NOT NULL,
  `perawatpendamping` varchar(50) NOT NULL,
  `nilai` int(50) NOT NULL,
  `perawat` varchar(50) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `jaraktempuh` int(10) NOT NULL,
  `total` int(50) NOT NULL,
  `kasir` varchar(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `abladmin`
--

INSERT INTO `abladmin` (`nomor`, `tanggal`, `nama`, `alamatktp`, `alamattujuan`, `perawatpendamping`, `nilai`, `perawat`, `ruangan`, `supir`, `jaraktempuh`, `total`, `kasir`, `bilang`) VALUES
(1, '2024-05-08', 'satu', 'indramayu', 'cirebon', 'Satu Provinsi (Wil.3)', 20000, '1', 'HCU', 'H.Wastana', 20, 400000, 'kartini', ' Empat Ratus  Ribu Rupiah'),
(2, '2024-05-08', 'dua', 'indramayu', 'cirebon', 'Satu Provinsi (Wil.3)', 20000, '2', 'Arumanis', 'H.Wastana', 10, 200000, 'kartini', ' Dua Ratus  Ribu Rupiah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ablkasir1`
--

CREATE TABLE `ablkasir1` (
  `nomor` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamatktp` varchar(255) NOT NULL,
  `alamattujuan` varchar(255) NOT NULL,
  `perawatpendamping` varchar(50) NOT NULL,
  `nilai` int(50) NOT NULL,
  `perawat` varchar(50) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `jaraktempuh` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `kasir` varchar(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ablkasir1`
--

INSERT INTO `ablkasir1` (`nomor`, `tanggal`, `nama`, `alamatktp`, `alamattujuan`, `perawatpendamping`, `nilai`, `perawat`, `ruangan`, `supir`, `jaraktempuh`, `total`, `kasir`, `bilang`) VALUES
(1, '2024-05-08', 'satu', 'indramayu', 'cirebon', 'Satu Provinsi (Wil.3)', 20000, '1', 'HCU', 'H.Wastana', 20, 400000, 'kartini', ' Empat Ratus  Ribu Rupiah'),
(2, '2024-05-08', 'dua', 'indramayu', 'cirebon', 'Satu Provinsi (Wil.3)', 20000, '2', 'Arumanis', 'H.Wastana', 10, 200000, 'kartini', ' Dua Ratus  Ribu Rupiah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ablkasir2`
--

CREATE TABLE `ablkasir2` (
  `nomor` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamatktp` varchar(255) NOT NULL,
  `alamattujuan` varchar(255) NOT NULL,
  `perawatpendamping` varchar(50) NOT NULL,
  `nilai` int(50) NOT NULL,
  `perawat` varchar(50) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `jaraktempuh` int(10) NOT NULL,
  `total` int(50) NOT NULL,
  `kasir` varchar(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ablkasir3`
--

CREATE TABLE `ablkasir3` (
  `nomor` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamatktp` varchar(255) NOT NULL,
  `alamattujuan` varchar(255) NOT NULL,
  `perawatpendamping` varchar(50) NOT NULL,
  `nilai` int(50) NOT NULL,
  `perawat` varchar(50) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `jaraktempuh` int(10) NOT NULL,
  `total` int(50) NOT NULL,
  `kasir` varchar(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ablkasir4`
--

CREATE TABLE `ablkasir4` (
  `nomor` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamatktp` varchar(255) NOT NULL,
  `alamattujuan` varchar(255) NOT NULL,
  `perawatpendamping` varchar(50) NOT NULL,
  `nilai` int(50) NOT NULL,
  `perawat` varchar(50) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `jaraktempuh` int(10) NOT NULL,
  `total` int(50) NOT NULL,
  `kasir` varchar(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ablkasir5`
--

CREATE TABLE `ablkasir5` (
  `nomor` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamatktp` varchar(255) NOT NULL,
  `alamattujuan` varchar(255) NOT NULL,
  `perawatoendamping` varchar(50) NOT NULL,
  `nilai` int(50) NOT NULL,
  `perawat` varchar(50) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `jaraktempuh` int(10) NOT NULL,
  `total` int(50) NOT NULL,
  `kasir` varchar(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `iduser` int(11) NOT NULL,
  `nomornota` int(50) NOT NULL,
  `nomorsep` varchar(50) NOT NULL,
  `nomormedrec` int(50) NOT NULL,
  `namapasien` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ruangperawatan` varchar(50) NOT NULL,
  `hakrawatkelas` varchar(50) NOT NULL,
  `mulaitanggal` date NOT NULL,
  `sampaitanggal` date NOT NULL,
  `dirawatkelas` varchar(50) NOT NULL,
  `yangmembayar` varchar(50) NOT NULL,
  `yangmenerima` varchar(50) NOT NULL,
  `tanggalbayar` date NOT NULL,
  `realcoastbpjs` int(50) NOT NULL,
  `ditanggungjr` int(50) NOT NULL,
  `realcoast` int(50) NOT NULL,
  `tarifkelas1` int(50) NOT NULL,
  `tarifkelas2` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `nota1` int(50) NOT NULL,
  `nota2` int(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`iduser`, `nomornota`, `nomorsep`, `nomormedrec`, `namapasien`, `alamat`, `ruangperawatan`, `hakrawatkelas`, `mulaitanggal`, `sampaitanggal`, `dirawatkelas`, `yangmembayar`, `yangmenerima`, `tanggalbayar`, `realcoastbpjs`, `ditanggungjr`, `realcoast`, `tarifkelas1`, `tarifkelas2`, `total`, `nota1`, `nota2`, `bilang`) VALUES
(2, 1, '0001', 1, 'satu', 'indramayu', 'Kidang Kencana 1', '1', '2024-05-06', '2024-05-08', '1', 'satu', 'kartini', '2024-05-08', 23000000, 20000000, 3000000, 1500000, 0, 1125000, 1500000, 1125000, ' Satu Juta Seratus Dua Puluh Lima Ribu  Rupiah'),
(2, 2, '0002', 2, 'dua', 'indramayu', 'Kidang Kencana 2', 'VIP', '2024-05-08', '2024-05-08', 'VIP', 'dua', 'kartini', '2024-05-08', 0, 0, 5000000, 3500000, 0, 1500000, 1500000, 2625000, ' Satu Juta Lima Ratus  Ribu Rupiah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir1`
--

CREATE TABLE `kasir1` (
  `iduser` int(11) NOT NULL,
  `nomornota` int(50) NOT NULL,
  `nomorsep` varchar(50) NOT NULL,
  `nomormedrec` int(50) NOT NULL,
  `namapasien` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ruangperawatan` varchar(50) NOT NULL,
  `hakrawatkelas` varchar(50) NOT NULL,
  `mulaitanggal` date NOT NULL,
  `sampaitanggal` date NOT NULL,
  `dirawatkelas` varchar(50) NOT NULL,
  `yangmembayar` varchar(50) NOT NULL,
  `yangmenerima` varchar(50) NOT NULL,
  `tanggalbayar` date NOT NULL,
  `realcoastbpjs` int(50) NOT NULL,
  `ditanggungjr` int(50) NOT NULL,
  `realcoast` int(50) NOT NULL,
  `tarifkelas1` int(50) NOT NULL,
  `tarifkelas2` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `nota1` int(50) NOT NULL,
  `nota2` int(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir1`
--

INSERT INTO `kasir1` (`iduser`, `nomornota`, `nomorsep`, `nomormedrec`, `namapasien`, `alamat`, `ruangperawatan`, `hakrawatkelas`, `mulaitanggal`, `sampaitanggal`, `dirawatkelas`, `yangmembayar`, `yangmenerima`, `tanggalbayar`, `realcoastbpjs`, `ditanggungjr`, `realcoast`, `tarifkelas1`, `tarifkelas2`, `total`, `nota1`, `nota2`, `bilang`) VALUES
(2, 1, '0001', 1, 'satu', 'indramayu', 'Kidang Kencana 1', '1', '2024-05-06', '2024-05-08', '1', 'satu', 'kartini', '2024-05-08', 23000000, 20000000, 3000000, 1500000, 0, 1125000, 1500000, 1125000, ' Satu Juta Seratus Dua Puluh Lima Ribu  Rupiah'),
(2, 2, '0002', 2, 'dua', 'indramayu', 'Kidang Kencana 2', 'VIP', '2024-05-08', '2024-05-08', 'VIP', 'dua', 'kartini', '2024-05-08', 0, 0, 5000000, 3500000, 0, 1500000, 1500000, 2625000, ' Satu Juta Lima Ratus  Ribu Rupiah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir2`
--

CREATE TABLE `kasir2` (
  `iduser` int(11) NOT NULL,
  `nomornota` int(50) NOT NULL,
  `nomorsep` varchar(50) NOT NULL,
  `nomormedrec` int(50) NOT NULL,
  `namapasien` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ruangperawatan` varchar(50) NOT NULL,
  `hakrawatkelas` varchar(50) NOT NULL,
  `mulaitanggal` date NOT NULL,
  `sampaitanggal` date NOT NULL,
  `dirawatkelas` varchar(50) NOT NULL,
  `yangmembayar` varchar(50) NOT NULL,
  `yangmenerima` varchar(50) NOT NULL,
  `tanggalbayar` date NOT NULL,
  `realcoastbpjs` int(50) NOT NULL,
  `ditanggungjr` int(50) NOT NULL,
  `realcoast` int(50) NOT NULL,
  `tarifkelas1` int(50) NOT NULL,
  `tarifkelas2` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `nota1` int(50) NOT NULL,
  `nota2` int(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir3`
--

CREATE TABLE `kasir3` (
  `iduser` int(11) NOT NULL,
  `nomornota` int(50) NOT NULL,
  `nomorsep` varchar(50) NOT NULL,
  `nomormedrec` int(50) NOT NULL,
  `namapasien` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ruangperawatan` varchar(50) NOT NULL,
  `hakrawatkelas` varchar(50) NOT NULL,
  `mulaitanggal` date NOT NULL,
  `sampaitanggal` date NOT NULL,
  `dirawatkelas` varchar(50) NOT NULL,
  `yangmenerima` varchar(50) NOT NULL,
  `yangmembayar` varchar(50) NOT NULL,
  `tanggalbayar` date NOT NULL,
  `realcoastbpjs` int(50) NOT NULL,
  `ditanggungjr` int(50) NOT NULL,
  `realcoast` int(50) NOT NULL,
  `tarifkelas1` int(50) NOT NULL,
  `tarifkelas2` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `nota1` int(50) NOT NULL,
  `nota2` int(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir4`
--

CREATE TABLE `kasir4` (
  `iduser` int(11) NOT NULL,
  `nomornota` int(50) NOT NULL,
  `nomorsep` varchar(50) NOT NULL,
  `nomormedrec` int(50) NOT NULL,
  `namapasien` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ruangperawatan` varchar(50) NOT NULL,
  `hakrawatkelas` varchar(50) NOT NULL,
  `mulaitanggal` date NOT NULL,
  `sampaitanggal` date NOT NULL,
  `dirawatkelas` varchar(50) NOT NULL,
  `yangmembayar` varchar(50) NOT NULL,
  `yangmenerima` varchar(50) NOT NULL,
  `tanggalbayar` date NOT NULL,
  `realcoastbpjs` int(50) NOT NULL,
  `ditanggungjr` int(50) NOT NULL,
  `realcoast` int(50) NOT NULL,
  `tarifkelas1` int(50) NOT NULL,
  `tarifkelas2` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `nota1` int(50) NOT NULL,
  `nota2` int(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir5`
--

CREATE TABLE `kasir5` (
  `iduser` int(11) NOT NULL,
  `nomornota` int(50) NOT NULL,
  `nomorsep` varchar(50) NOT NULL,
  `nomormedrec` int(50) NOT NULL,
  `namapasien` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ruangperawatan` varchar(50) NOT NULL,
  `hakrawatkelas` varchar(50) NOT NULL,
  `mulaitanggal` date NOT NULL,
  `sampaitanggal` date NOT NULL,
  `dirawatkelas` varchar(50) NOT NULL,
  `yangmembayar` varchar(50) NOT NULL,
  `yangmenerima` varchar(50) NOT NULL,
  `tanggalbayar` date NOT NULL,
  `realcoastbpjs` int(50) NOT NULL,
  `ditanggunjr` int(50) NOT NULL,
  `realcoast` int(50) NOT NULL,
  `tarifkelas1` int(50) NOT NULL,
  `tarifkelas2` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `nota1` int(50) NOT NULL,
  `nota2` int(50) NOT NULL,
  `bilang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` enum('admin','kasir1','kasir2','kasir3','kasir4','kasir5') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `name`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'kartini', 'kasir1', 'kartini', 'kasir1'),
(3, 'nasikin', 'kasir2', 'nasikin', 'kasir2'),
(4, 'warnadi', 'kasir3', 'warnadi', 'kasir3'),
(5, 'wanto', 'kasir4', 'wanto', 'kasir4'),
(6, 'dalam', 'kasir5', 'dalam', 'kasir5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abladmin`
--
ALTER TABLE `abladmin`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `ablkasir1`
--
ALTER TABLE `ablkasir1`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `ablkasir2`
--
ALTER TABLE `ablkasir2`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `ablkasir3`
--
ALTER TABLE `ablkasir3`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `ablkasir4`
--
ALTER TABLE `ablkasir4`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `ablkasir5`
--
ALTER TABLE `ablkasir5`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nomornota`);

--
-- Indeks untuk tabel `kasir1`
--
ALTER TABLE `kasir1`
  ADD PRIMARY KEY (`nomornota`);

--
-- Indeks untuk tabel `kasir2`
--
ALTER TABLE `kasir2`
  ADD PRIMARY KEY (`nomornota`);

--
-- Indeks untuk tabel `kasir3`
--
ALTER TABLE `kasir3`
  ADD PRIMARY KEY (`nomornota`);

--
-- Indeks untuk tabel `kasir4`
--
ALTER TABLE `kasir4`
  ADD PRIMARY KEY (`nomornota`);

--
-- Indeks untuk tabel `kasir5`
--
ALTER TABLE `kasir5`
  ADD PRIMARY KEY (`nomornota`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `abladmin`
--
ALTER TABLE `abladmin`
  MODIFY `nomor` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ablkasir1`
--
ALTER TABLE `ablkasir1`
  MODIFY `nomor` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ablkasir2`
--
ALTER TABLE `ablkasir2`
  MODIFY `nomor` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ablkasir3`
--
ALTER TABLE `ablkasir3`
  MODIFY `nomor` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ablkasir4`
--
ALTER TABLE `ablkasir4`
  MODIFY `nomor` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ablkasir5`
--
ALTER TABLE `ablkasir5`
  MODIFY `nomor` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `nomornota` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12347;

--
-- AUTO_INCREMENT untuk tabel `kasir1`
--
ALTER TABLE `kasir1`
  MODIFY `nomornota` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12347;

--
-- AUTO_INCREMENT untuk tabel `kasir2`
--
ALTER TABLE `kasir2`
  MODIFY `nomornota` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT untuk tabel `kasir3`
--
ALTER TABLE `kasir3`
  MODIFY `nomornota` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kasir4`
--
ALTER TABLE `kasir4`
  MODIFY `nomornota` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kasir5`
--
ALTER TABLE `kasir5`
  MODIFY `nomornota` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
