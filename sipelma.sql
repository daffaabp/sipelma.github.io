-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2023 pada 15.06
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipelma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `prodi`, `alamat`) VALUES
(210102003, 'Anggreani Syafitri', 'Perempuan', 'Teknik Mesin', 'Bumiayu, Brebes'),
(210102005, 'Daffa Budi Prasetya', 'Laki-Laki', 'Teknik Elektro', 'Purwokerto, Banyumas'),
(210102008, 'Diva Nur Vadia', 'Perempuan', 'Teknik Listrik', 'Adipala, Cilacap'),
(210202004, 'Andre Tri Anggoro', 'Laki-Laki', 'Teknik Informatika', 'Lomanis, Cilacap'),
(210202006, 'Dewi Maharani', 'Perempuan', 'Teknik Elektro', 'Sidanegara, Cilacap'),
(210202007, 'Diah Ayu Rahmawati', 'Perempuan', 'Teknik Listrik', 'Sidanegara, Cilacap'),
(220302005, 'Daniel Inzagi', 'Laki Laki', 'Teknik Informatika', 'Maos, Adipala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_pelanggaran` varchar(100) NOT NULL,
  `point` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `nim`, `tanggal`, `jenis_pelanggaran`, `point`) VALUES
(20, 210102003, '2022-12-07', 'Ngrokok', 30),
(21, 210202004, '2022-12-07', 'Tawuran', 40),
(22, 210102005, '2022-12-14', 'Bullying', 15),
(23, 210202006, '2022-12-06', 'Nyontek', 10),
(24, 210202007, '2022-12-08', 'Bolos', 25),
(25, 210102008, '2022-12-09', 'Bolos', 25),
(26, 210202007, '2022-12-09', 'Bullying', 25),
(27, 210102008, '2023-01-18', 'Bullying', 50),
(28, 220302005, '2023-06-06', 'Tawuran', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'daffa', 'daffa.budi2003@gmail.com', '1234'),
(4, 'ajeng', 'ajengaurelia@gmail.com', 'admin'),
(5, 'salmack', 'salmack2003@gmail.com', '1234'),
(6, 'kukuh', 'yazid.zidan2003@gmail.com', 'admin'),
(7, 'ulul', 'ulul.azmi2003@gmail.com', 'admin'),
(8, 'yazid', 'yazid.zidan2003@gmail.com', '1234'),
(9, 'argo', 'argo2003@gmail.com', '1234'),
(10, 'budi', 'daffabp2003@gmail.com', 'admin'),
(11, 'irsat', 'daffabp2003@gmail.com', '1234'),
(12, 'intan', 'intan2003@gmail.com', '1234'),
(13, 'pinky', 'daffabp2003@gmail.com', 'admin'),
(14, 'dzaki', 'dzaki2003@gmail.com', '12345'),
(15, 'gusniar', 'gusniar@gmail.com', 'admin'),
(16, 'wulan', 'wulan.aulia@gmail.com', '1234'),
(17, 'ajiaja', 'dwiaji2004@gmail.com', 'jiaji'),
(18, 'josep', 'josep@gmail.com', 'josep');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `nim_fk` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
