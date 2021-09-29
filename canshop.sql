-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2021 at 04:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `tanggalPesan` datetime NOT NULL,
  `jumlah` int(100) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `stat` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `tanggalPesan`, `jumlah`, `id_cust`, `id_product`, `id_pembayaran`, `stat`) VALUES
(11, '2019-04-29 19:15:59', 2, 2, 2, 12, 0),
(12, '2019-04-29 19:16:06', 3, 2, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `namaCust` varchar(150) NOT NULL,
  `alamatCust` varchar(255) NOT NULL,
  `bankCust` varchar(20) NOT NULL,
  `rekening` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `noHP` int(13) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `password`, `namaCust`, `alamatCust`, `bankCust`, `rekening`, `email`, `noHP`, `foto`) VALUES
(1, 'a', 'aaaabbbb', 'wwww', 'bbbb', 1111, 'erlina.bisa@gmail.com', 0, 'profile2.png'),
(2, 'jeon', 'Jeowandha Ria Wiyani', '', '', 0, 'jeolu.jhenmarie@gmail.com', 0, ''),
(3, 'tania', 'Tania', 'permata 1 k/10', 'mandiri', 333, 'taniaamalik@gmail.com', 83830027, '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `resi` int(20) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `total_pembayaran` int(20) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `id_customer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `resi`, `provinsi`, `kota`, `alamat`, `kode_pos`, `total_pembayaran`, `metode_pembayaran`, `bukti_pembayaran`, `status_pembayaran`, `id_customer`) VALUES
(12, 0, 'DKI Jakarta', 'b', 'wwww', 'c', 284000, 'Mandiri', '', '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `namaProduct` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `stock` int(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `namaProduct`, `harga`, `jenis`, `foto`, `stock`, `deskripsi`) VALUES
(1, 'Pashmina abu-abu tua', 55000, 'hijab', 'product-01.jpg', 15, 'Jilbab pashmina berwarna abu-abu tua dengan bahan katun lembut, tidak kasar dan tidak panas sehingga nyaman dipakai'),
(2, 'Scarf Pink', 42000, 'hijab', 'product-02.jpg', 10, 'Jilbab segi empat berwarna pink dengan kombinasi corak yang manis dan elegan dengan bahan voal yang nyaman dipakai'),
(3, 'Herbivore Glow Natural Skincare', 60000, 'skincare', 'product-03.jpg', 20, 'Series skincare dari Herbivore yang dapat membuat wajah lebih glowing'),
(4, 'Pashmina Ungu', 55000, 'hijab', 'product-04.jpg', 12, 'Jilbab pashmina berwarna ungu dengan bahan kain katun yang dingin sehingga nyaman dipakai'),
(5, 'Scarf Maroon', 44000, 'hijab', 'product-05.jpg', 25, 'Hijab segi empat berwarna merah marun dengan corak floral'),
(6, 'The Face Shop Natural Sun Eco', 35000, 'skincare', 'product-06.jpg', 35, 'Sunscreen dari The Face Shop yang melindungi kulitmu dari sinar matahari'),
(7, 'Pashmina abu-abu Muda', 40000, 'hijab', 'product-07.jpg', 25, 'Jilbab pashmina berwarna abu-abu muda polos dengan bahan diamond streacth berkualitas lembut, tidak licin dan tidak panas.'),
(8, 'Pashmina Pink Pastel', 55000, 'hijab', 'product-08.jpg', 15, 'Jilbab pashmina berwarna pink pastel polos dengan bahan katun lembut, tidak licin dan tidak panas untuk digunakan'),
(9, 'Glow Recipe Watermelon Glow Sleeping Mask', 48000, 'skincare', 'product-09.jpg', 24, 'Sleeping mask yang dapat membuat kulitmu terhidrasi, halus dan membuat wajahmu menjadi lebih cerah dalam semalam'),
(10, 'Hijab Instan Abu-abu Muda', 46000, 'hijab', 'product-10.jpg', 14, 'Hijab instan berwarna abu-abu muda polos dengan panjang depan 75cm dan belakang 105cm. Berbahan wolfis yang memiliki karakteristik lembut, halus, jatuh, dan tidak panas.'),
(11, 'Valjean Labs Revive Day Serum', 45000, 'skincare', 'product-11.jpg', 13, 'Serum yang sangat cocok untuk perawatan peremajaan kulit wajah anda. Mampu membuat kulit wajah sehat terawat, dapat mengencangkan, mencerahkan dan menghaluskan.'),
(12, 'Clean and Clear', 25000, 'skincare', 'product-12.jpg', 28, 'facial cleanser untuk membersihkan wajah yang berminyak membantu mencegah jerawat, minyak berlebih dan komedo, terdiri dari 2 varian untuk pagi dan malan'),
(13, 'Hijab Instan Coklat', 44000, 'hijab', 'product-13.jpg', 21, 'Hijab instan berwarna coklat polos dengan panjang depan 75cm dan belakang 105cm. Berbahan wolfis yang memiliki karakteristik lembut, halus, jatuh, dan tidak panas.'),
(14, 'Scarf Abu-abu', 47000, 'hijab', 'product-14.jpg', 13, 'Hijab segi empat berwarna abu-abu dengan corak floral'),
(15, 'Hijab Instan Biru Muda', 40000, 'hijab', 'product-15.jpg', 22, 'Hijab instan berwarna biru muda dengan panjang depan 75cm dan belakang 105cm. Berbahan wolfis yang memiliki karakteristik lembut, halus, jatuh, dan tidak panas.'),
(16, 'Scarf Kuning', 40000, 'hijab', 'product-16.jpg', 16, 'Hijab segi empat berwarna kuning dengan corak floral');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `item` varchar(32) NOT NULL,
  `quantity` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a` (`id_cust`),
  ADD KEY `b` (`id_product`),
  ADD KEY `c` (`id_pembayaran`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`) USING BTREE;

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `a` FOREIGN KEY (`id_cust`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `b` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `id_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
