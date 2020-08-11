-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2020 pada 20.36
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('ichsan', 'd1cd5cade5e5de55a72230e5296d823d');

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `merk_kendaraan` varchar(60) NOT NULL,
  `kebutuhan` varchar(60) NOT NULL,
  `plat` varchar(60) NOT NULL,
  `pemilik` varchar(60) NOT NULL,
  `tanggal` varchar(60) NOT NULL,
  `info` text NOT NULL,
  `jenis_kendaraan` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `nama_product` varchar(60) NOT NULL,
  `jenis_kendaraan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nama_product`, `jenis_kendaraan`) VALUES
(1, 'avanza', 'mobil'),
(2, 'ninja h2r', 'motor'),
(3, 'scania', 'truck'),
(4, 'hino', 'bus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `gmail` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `username`, `password`, `nama`, `gmail`) VALUES
(1, 'ichsan', 'd1cd5cade5e5de55a72230e5296d823d', 'ichsan', 'ichsanarrizqi090@gmail.com'),
(2, 'fajar', '24bc50d85ad8fa9cda686145cf1f8aca', 'fajar shodiq', 'fajarshodiq12@gmai.com'),
(3, 'dimas', '7d49e40f4b3d8f68c19406a58303f826', 'dimas', 'dimas@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghasilan`
--

CREATE TABLE `penghasilan` (
  `nama_barang` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penghasilan`
--

INSERT INTO `penghasilan` (`nama_barang`, `harga`, `jumlah`, `total`) VALUES
('Knalpot', 200000, 1, 200000),
('Oli Castrol', 75000, 1, 75000),
('Oli Castrol', 75000, 2, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `nama_barang`, `harga`, `jumlah`, `total`) VALUES
(33, 'ichsan', 'Oli Castrol', 75000, 4, 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `jenis` varchar(60) NOT NULL,
  `foto` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `nama`, `harga`, `stok`, `jenis`, `foto`) VALUES
(1, 'Oli Castrol', 75000, 4, 'motor', '580060900_4A187D9D-EC7E-42EE-A6CB-2901BB7D31A8.JPG'),
(2, 'Logo', 120000, 12, 'mobil', '1281932685_4B33DB75-9C8C-448A-A778-79867E80000C.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tukang`
--

CREATE TABLE `tukang` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `spesialis` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tukang`
--

INSERT INTO `tukang` (`id`, `username`, `password`, `nama`, `spesialis`, `status`) VALUES
(1, 'agus', 'fdf169558242ee051cca1479770ebac3', 'agus supratman', 'mobil', 'ada'),
(2, 'josua', '9974cb2e89f523f9472699e2cdc6ec01', 'josua', 'motor', 'ada');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemilik` (`pemilik`),
  ADD KEY `jenis_kendaraan` (`jenis_kendaraan`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tukang`
--
ALTER TABLE `tukang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spesialis` (`spesialis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`jenis_kendaraan`) REFERENCES `tukang` (`spesialis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
