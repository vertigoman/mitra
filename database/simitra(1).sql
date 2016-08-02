-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2016 at 05:11 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simitra`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `gambarid` int(11) NOT NULL,
  `trxid` int(11) NOT NULL,
  `url` text NOT NULL,
  `primer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfrimasi`
--

CREATE TABLE `konfrimasi` (
  `konfirmid` int(11) NOT NULL,
  `trxid` int(11) NOT NULL,
  `jumlah` text NOT NULL,
  `angsuranke` int(11) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `monitorid` int(11) NOT NULL,
  `trxid` int(11) NOT NULL,
  `angsuranke` int(11) NOT NULL,
  `tglangsur` date NOT NULL,
  `jmlangsur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`monitorid`, `trxid`, `angsuranke`, `tglangsur`, `jmlangsur`) VALUES
(1, 2, 1, '2016-08-21', 288889),
(2, 2, 2, '2016-09-29', 288889),
(3, 3, 1, '2016-08-28', 286111),
(4, 2, 3, '2016-10-22', 288889),
(5, 5, 1, '2016-09-02', 288889);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`) VALUES
(1, 'didinkha', '2634acd060c04d43ab49f0e3acb6dc6d5ae6ace1');

-- --------------------------------------------------------

--
-- Table structure for table `profilmitra`
--

CREATE TABLE `profilmitra` (
  `dataid` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nik` text NOT NULL,
  `alamatjalan` text NOT NULL,
  `alamatkec` text NOT NULL,
  `alamatkab` text NOT NULL,
  `alamatprov` text NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilmitra`
--

INSERT INTO `profilmitra` (`dataid`, `nama`, `nik`, `alamatjalan`, `alamatkec`, `alamatkab`, `alamatprov`, `lat`, `lng`, `username`, `password`) VALUES
(1, 'Minhajuddin Kasman Ar', '123817298122', 'Jl. Soekarno Hatta', 'Tarahan', 'Kabupaten Lampung Selatan', 'Lampung', '-5.509667', '105.342901', 'didinkha', ''),
(2, 'Haidar Nazli', '201923801923809', 'Jl. Sido mulyo', 'Babulang', 'Kabupaten Lampung Selatan', 'Lampung', '-5.557225', '105.372398', 'darken', '-'),
(3, 'Goldi Mahardika Muhammad', '123817298122', 'Jl. Soekarno Hatta', 'Babulang', 'Kabupaten Lampung Selatan', 'Lampung', '-5.557225', '105.372398', 'goldiseno', 'goldi'),
(4, 'Komarudin Nursi', '201923801923809', 'Jl. Sido mulyo', 'Babulang', 'Kabupaten Lampung Selatan', 'Lampung', '-5.557225', '105.372398', 'marko', 'komar'),
(5, 'Mimin S. Kaidati', '201923801923809', 'Jl. Sido mulyo', 'Babulang', 'Kabupaten Lampung Selatan', 'Lampung', '-5.557225', '105.372398', 'mimin', 'asd'),
(8, 'Devi Cantika', '201923801923809', 'Jl. Sido mulyo', 'Argo Mulyo', 'Kabupaten Lampung Barat', 'Lampung', '-5.557225', '105.372398', 'dev', 'dev'),
(11, 'M. Sofri S. Kaidati', '201923801923809', 'Jl. Apapuns', 'Babatan', 'Kabupaten Lampung Selatan', 'Lampung', '-5.557225', '105.372398', 'opi', 'asd'),
(12, 'Imania Juniarti', '123817298122', 'Jl. Sido mulyo', 'Babulang', 'Kabupaten Lampung Selatan', 'Lampung', '-5.557225', '105.372398', 'nia', 'nia');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `trxid` int(11) NOT NULL,
  `dataid` int(11) NOT NULL,
  `nama` text NOT NULL,
  `pinjaman` text NOT NULL,
  `bunga` text NOT NULL,
  `tenor` int(11) NOT NULL,
  `angsuran` text NOT NULL,
  `start` date NOT NULL,
  `deadline` int(11) NOT NULL,
  `finish` date NOT NULL,
  `tenggang` int(11) NOT NULL,
  `imgurl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`trxid`, `dataid`, `nama`, `pinjaman`, `bunga`, `tenor`, `angsuran`, `start`, `deadline`, `finish`, `tenggang`, `imgurl`) VALUES
(2, 1, 'SMP Islam Terpadu Gema Rabbani', '10000000', '400000', 36, '288889', '2016-07-28', 1, '2019-07-28', 3, 'asset/2.JPG'),
(3, 8, 'Konter', '10000000', '300000', 36, '286111', '2016-07-28', 1, '2019-07-28', 3, 'asset/3.JPG'),
(5, 12, 'Kios Keluarga', '10000000', '400000', 36, '288889', '2016-08-01', 2, '2019-08-01', 3, 'asset/5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`gambarid`);

--
-- Indexes for table `konfrimasi`
--
ALTER TABLE `konfrimasi`
  ADD PRIMARY KEY (`konfirmid`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`monitorid`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilmitra`
--
ALTER TABLE `profilmitra`
  ADD PRIMARY KEY (`dataid`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`trxid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `gambarid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konfrimasi`
--
ALTER TABLE `konfrimasi`
  MODIFY `konfirmid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `monitor`
--
ALTER TABLE `monitor`
  MODIFY `monitorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profilmitra`
--
ALTER TABLE `profilmitra`
  MODIFY `dataid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `trxid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
