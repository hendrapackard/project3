-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2017 at 12:16 PM
-- Server version: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- PHP Version: 5.6.31-4+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(10) UNSIGNED NOT NULL,
  `kode_buku` varchar(11) NOT NULL,
  `id_judul` int(10) UNSIGNED NOT NULL,
  `is_ada` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `id_judul`, `is_ada`) VALUES
(1, '959.223KinE', 1, 'n'),
(2, '959.223KinE', 1, 'y'),
(3, '959.223IdiS', 2, 'n'),
(4, '959.223IdiS', 2, 'n'),
(5, '959.223HarK', 3, 'n'),
(6, '959.223HarK', 3, 'y'),
(7, '090.223SarJ', 4, 'n'),
(8, '090.223SarJ', 4, 'y'),
(9, '959.223MarB', 5, 'n'),
(10, '959.223MarB', 5, 'n'),
(11, '959.223MarM', 6, 'n'),
(12, '959.223MarM', 6, 'n'),
(13, '959.223NunB', 7, 'y'),
(14, '959.223HarK', 8, 'y'),
(15, '959.223MuhS', 9, 'y'),
(16, '959.223NunB', 10, 'n');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_pinjam` int(10) UNSIGNED NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `is_dibayar` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_pinjam`, `jumlah`, `tanggal_pembayaran`, `is_dibayar`) VALUES
(1, 1500, '2017-09-07', 'y'),
(2, 6000, '2017-09-19', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `judul`
--

CREATE TABLE `judul` (
  `id_judul` int(10) UNSIGNED NOT NULL,
  `isbn` varchar(13) NOT NULL DEFAULT '0',
  `judul_buku` varchar(100) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `letak` varchar(20) DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `judul`
--

INSERT INTO `judul` (`id_judul`, `isbn`, `judul_buku`, `penulis`, `penerbit`, `letak`, `cover`) VALUES
(1, '9786022774617', 'Ekonomi SMA Kelas X', 'Kinanti Geminastiti', 'Yrama Widya', 'A', '20170904141155.jpg'),
(2, '9786022415336', 'Sosiologi SMA Kelas X', 'Idianto Muin', 'Penerbit Erlangga', 'B', '20170904141708.jpg'),
(3, '9786023742899', 'Kimia', 'A. Haris Watoni', 'Yrama Widya', 'C', '20170904142110.jpg'),
(4, '9796929457', 'Jendela Hati', 'Sari Pusparini Soleh', 'ROSDA', 'D', '20170904142843.jpg'),
(5, '9786022276390', 'Buku Siswa Matematika SMA Kelas XII', 'Marthen Kanginan', 'Yrama Widya', 'E', '20170904143358.jpg'),
(6, '9789790779680', 'Matematika untuk SMA Kelas XI', 'Marthen Kanginan', 'Yrama Widya', 'F', '20170904143715.jpg'),
(7, '9786022774594', 'Biologi untuk SMA Kelas XII', 'Nunung Nurhayati', 'Yrama Widya', 'G', '20170904144659.jpg'),
(8, '9786022774846', 'Kimia SMA Kelas XII', 'Haris Watoni', 'Yrama Widya', 'H', '20170904145055.jpg'),
(9, '9786022770701', 'Sosiologi SMA Kelas XI', 'Muhammad Taupan', 'Yrama Widya', 'F', '20170904145727.jpg'),
(10, '9786022770589', 'Biologi Kelas XI', 'Nunung Nurhayati', 'Yrama Widya', 'C', '20170904150004.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X A1'),
(2, 'X A2'),
(3, 'X A3'),
(4, 'X A4'),
(5, 'X A5'),
(6, 'X S1'),
(7, 'X S2'),
(8, 'X S3'),
(9, 'XI A1'),
(10, 'XI A2'),
(11, 'XI A3'),
(12, 'XI A4'),
(13, 'XI A5'),
(14, 'XI S1'),
(15, 'XI S2'),
(16, 'XI S3'),
(17, 'XII A1'),
(18, 'XII A2'),
(19, 'XII S1'),
(20, 'XII S2'),
(21, 'XII S3'),
(22, 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(10) UNSIGNED NOT NULL,
  `kode_pinjam` varchar(14) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_buku` int(10) UNSIGNED NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('1','2','3','4') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `kode_pinjam`, `tanggal_pinjam`, `id_user`, `id_buku`, `tanggal_kembali`, `status`) VALUES
(1, '20170904150301', '2017-09-01', 3, 3, '2017-09-07', '4'),
(2, '20170904150820', '2017-09-04', 2, 1, '2017-09-19', '4'),
(3, '20170903151409', '2017-09-03', 8, 11, '2017-09-04', '4'),
(4, '20170904151511', '2017-09-04', 8, 16, '2017-09-04', '4'),
(5, '20170904151933', '2017-09-04', 1, 7, '2017-09-04', '4'),
(6, '20170907080828', '2017-09-07', 2, 7, NULL, '2'),
(7, '20170907081621', '2017-09-07', 3, 8, NULL, '3'),
(8, '20170907083342', '2017-09-07', 3, 3, NULL, '3'),
(9, '20170907104529', '2017-09-07', 2, 3, NULL, '2'),
(10, '20170907105015', '2017-09-07', 8, 11, NULL, '1'),
(11, '20170907105033', '2017-09-06', 8, 16, NULL, '1'),
(12, '20170907105627', '2017-09-07', 12, 9, NULL, '1'),
(13, '20170907105712', '2017-09-07', 12, 10, NULL, '2'),
(18, '20170907120922', '2017-09-07', 6, 2, '2017-09-07', '4'),
(19, '20170911112258', '2017-09-11', 9, 5, NULL, '2'),
(20, '20170913180606', '2017-09-13', 6, 12, NULL, '2'),
(21, '20170913180742', '2017-09-13', 10, 1, NULL, '1'),
(22, '20170913180804', '2017-09-13', 10, 4, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','anggota') NOT NULL DEFAULT 'anggota',
  `is_verified` enum('y','n') NOT NULL DEFAULT 'n',
  `no_induk` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('l','p') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `is_verified`, `no_induk`, `nama`, `jenis_kelamin`, `no_hp`, `id_kelas`) VALUES
(1, 'salamah', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'y', '02030004', 'salamah', 'p', '088824375423', 22),
(2, 'andri', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y', '16170001', 'Andri Budi Trisnaliadi', 'l', '0888234424512', 1),
(3, 'syifa', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y', '16170002', 'Syifa Nur Aisyah Zahra', 'p', '0888234424523', 2),
(4, 'syarif', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y', '15160001', 'Syarif Hidayat', 'l', '081234214561', 9),
(5, 'bambang', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y', '14150001', 'bambang', 'l', '085746127432', 19),
(6, 'cahyati', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y', '15160004', 'Cahyati', 'p', '089712344123', 12),
(7, 'haris', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y', '14150002', 'Harris Abimanyu', 'l', '081234214564', 17),
(8, 'rahayu', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y', '15160006', 'Rahayu Agustine', 'p', '085746127437', 14),
(9, 'irna', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y', '16170003', 'Irna Ratna Ayu', 'p', '085746127433', 6),
(10, 'dewi', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y', '16170004', 'Dewi Lestari', 'p', '081234214569', 2),
(11, 'jurniani', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y', '14150003', 'Jurniani', 'p', '089712344124', 18),
(12, 'usman', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y', '14150007', 'Usman Fauzi', 'l', '089712344126', 21),
(14, 'dahlia', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'n', '15160005', 'Dahlia', 'p', '081234214564', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_judul` (`id_judul`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `judul`
--
ALTER TABLE `judul`
  ADD PRIMARY KEY (`id_judul`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `no_induk` (`no_induk`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_pinjam` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `judul`
--
ALTER TABLE `judul`
  MODIFY `id_judul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_judul`) REFERENCES `judul` (`id_judul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `denda_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
