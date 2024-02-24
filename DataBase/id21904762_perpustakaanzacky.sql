-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2024 at 12:09 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21904762_perpustakaanzacky`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_buku`
--

CREATE TABLE `t_buku` (
  `bukuID` int(11) NOT NULL,
  `kategoriID` int(11) NOT NULL,
  `stok` int(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahunTerbit` int(11) DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_buku`
--

INSERT INTO `t_buku` (`bukuID`, `kategoriID`, `stok`, `deskripsi`, `judul`, `penulis`, `penerbit`, `tahunTerbit`, `foto`) VALUES
(1, 1, 14, 'panduan belajar matematika yang di tulis oleh seorang maste matematika dunia,di dalam buku ini terdapa berbagai cara trik menghitung rumus dan tips-tips menghafal rumus dengan cepat dan membekas.', 'How to master mathematics', 'Musawandile Vincent', 'redPubluc', 2000, 'math.jpg'),
(2, 2, 13, 'Buku panduan belajar untuk siswa-siswi sekolah,dilengkapi dengan gambar-gambar yang menarik agar para pembaca tidak merasa bosan,dilengkapi berbagai cara efesien untuk di pelajari oleh para siswa/i', 'Fisika Paling mudah', 'Chei won seok & Lee jin hee', 'KiwiO', 2012, 'fisika.jpg'),
(3, 3, 14, 'Buku sejarah tentang indonwsia,yang menceritakan tentang sejarah penting si ondonesia,ditulis oleh Dr, Djakariah M PD,seorang sejarahwan terkenal', 'Sejarah Indonesia', 'Dr. Djakariah M,PD', 'IndonesiaKu', 2005, 'sejarah.jpg'),
(4, 1, 23, 'Buku panduan pembelajaar untuk kelas 11,terdapat suara yang dapat so scan dan di dengarkan lewat decice,dan menggunakan metode 363 yang di percaya sebagai metode terbaik belajar fisika', 'Cara simpel belajar fisika', 'Suwah sembiring', 'SaranaBangunNegri', 2016, 'fisika1.jpg'),
(8, 5, 7, 'Sebuah novel ringan yg menceritakan tentang seorang hunter bernama Sung Jinwoo yang hendak memasuki sebuah dugeon,akan tetapi tersapat sesuatu yang tersembunyi di dalam labirin itu dan akan merubah kehidupan Sung Jinwoo', 'Solo Leveling', 'Chu-Gong', 'OooDooo', 2016, 'Solo_Leveling_Webtoon.png'),
(12, 5, 19, 'Sebuah light novel yang menceritakan tentang seorang pemerja kantoran yang mati tertembak oleh orang tidak dikenal  ,dan berinkarnasi menjadi slime berwarna biru', 'Tensei Shittara slime datta ken.', 'Fuse & Mitz Vah.s', 'GC Novelss', 2023, 'images.jpeg'),
(13, 6, 21, 'Sebuah buku panduan untuk pemula yang ingin belajar desain vrafis,buku ini dilengkapi dengan berbagai tips dan trik yang akam mempermudah pembaca untuk mempelajarinya', 'Program tutorial Desain Grafis', 'Lea Wilsen', 'Komputindo', 2019, 'sq (1).jpg'),
(14, 8, 23, 'Sebuah buku filosofi untuk kehidan agar semakin baik lagi', 'Break Throught', 'James Dakota', 'Reoligy', 2021, 's.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_kategoribuku`
--

CREATE TABLE `t_kategoribuku` (
  `kategoriID` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_kategoribuku`
--

INSERT INTO `t_kategoribuku` (`kategoriID`, `kategori`) VALUES
(1, 'Matematika'),
(2, 'Fisika'),
(3, 'Sejarah'),
(4, 'Kimia'),
(5, '(LN) Light Novel'),
(6, 'Tutorial'),
(7, 'Novel'),
(8, 'filosofi');

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `peminjamanID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `bukuID` int(11) DEFAULT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `tenggat_pengembalian` date NOT NULL,
  `statusPeminjaman` enum('dipinjam','dikembalikan','dibatalkan','') DEFAULT NULL,
  `kodePinjam` varchar(255) NOT NULL,
  `jumlahPinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_peminjaman`
--

INSERT INTO `t_peminjaman` (`peminjamanID`, `userID`, `bukuID`, `tgl_peminjaman`, `tgl_pengembalian`, `tenggat_pengembalian`, `statusPeminjaman`, `kodePinjam`, `jumlahPinjam`) VALUES
(19, 2, 4, '2024-02-22', NULL, '2024-02-25', 'dibatalkan', 'PM005', 0),
(20, 2, 3, '2024-02-22', '2024-02-22', '2024-02-25', 'dikembalikan', 'PM006', 0),
(21, 2, 4, '2024-02-22', NULL, '2024-02-25', 'dibatalkan', 'PM007', 0),
(22, 2, 3, '2024-02-22', NULL, '2024-02-25', 'dibatalkan', 'PM008', 0),
(23, 2, 8, '2024-02-22', NULL, '2024-02-25', 'dibatalkan', 'PM009', 0),
(24, 2, 1, '2024-02-22', NULL, '2024-02-25', 'dibatalkan', 'PM010', 0),
(25, 2, 1, '2024-02-22', NULL, '2024-02-25', 'dibatalkan', 'PM011', 0),
(26, 2, 1, '2024-02-22', NULL, '2024-02-25', 'dibatalkan', 'PM012', 0);

--
-- Triggers `t_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `t_peminjaman` FOR EACH ROW BEGIN
update t_buku set stok = stok - new.jumlahPinjam where BukuID = new.BukuID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_after_cancel` AFTER UPDATE ON `t_peminjaman` FOR EACH ROW BEGIN
    IF NEW.statusPeminjaman = 'dibatalkan' THEN
        UPDATE t_buku
        SET stok = stok + OLD.jumlahPinjam
        WHERE bukuID = OLD.bukuID;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_after_return` AFTER UPDATE ON `t_peminjaman` FOR EACH ROW BEGIN
    IF NEW.statusPeminjaman = 'dikembalikan' AND OLD.statusPeminjaman = 'dipinjam' THEN
        UPDATE t_buku
        SET stok = stok + OLD.jumlahPinjam
        WHERE bukuID = OLD.bukuID;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_ulasanbuku`
--

CREATE TABLE `t_ulasanbuku` (
  `ulasanID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `bukuID` int(11) DEFAULT NULL,
  `ulasan` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(14) DEFAULT NULL,
  `namaLengkap` varchar(150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `level` enum('admin','petugas','anggota','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`userID`, `username`, `password`, `email`, `telp`, `namaLengkap`, `alamat`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@email.com', NULL, 'administrator', 'admin', 'admin'),
(2, 'zacky', '236ceca653b5a091401831ba5af5ba0b', 'zackyaryatama@gmail.com', '085624379337', 'M Zacky Aryatama', 'Cikandang ', 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`bukuID`),
  ADD KEY `kategoriID` (`kategoriID`);

--
-- Indexes for table `t_kategoribuku`
--
ALTER TABLE `t_kategoribuku`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`peminjamanID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bukuID` (`bukuID`);

--
-- Indexes for table `t_ulasanbuku`
--
ALTER TABLE `t_ulasanbuku`
  ADD PRIMARY KEY (`ulasanID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bukuID` (`bukuID`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `bukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_kategoribuku`
--
ALTER TABLE `t_kategoribuku`
  MODIFY `kategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `peminjamanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `t_ulasanbuku`
--
ALTER TABLE `t_ulasanbuku`
  MODIFY `ulasanID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD CONSTRAINT `t_buku_ibfk_1` FOREIGN KEY (`kategoriID`) REFERENCES `t_kategoribuku` (`kategoriID`);

--
-- Constraints for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD CONSTRAINT `t_peminjaman_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `t_user` (`userID`),
  ADD CONSTRAINT `t_peminjaman_ibfk_2` FOREIGN KEY (`bukuID`) REFERENCES `t_buku` (`bukuID`);

--
-- Constraints for table `t_ulasanbuku`
--
ALTER TABLE `t_ulasanbuku`
  ADD CONSTRAINT `t_ulasanbuku_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `t_user` (`userID`),
  ADD CONSTRAINT `t_ulasanbuku_ibfk_2` FOREIGN KEY (`bukuID`) REFERENCES `t_buku` (`bukuID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
