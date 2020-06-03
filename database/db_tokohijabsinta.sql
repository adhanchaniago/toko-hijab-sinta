-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Okt 2018 pada 07.52
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tokohijabsinta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`id_admin` tinyint(2) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `reset` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `nama_admin`, `password`, `email`, `reset`) VALUES
(1, 'admin', 'administrator', '$2y$10$WN1tLi8mvQMn2zwyQIldyOVLNhAE/98hgvlotYJ0w9ijImLYceJyi', 'tokohijabsinta@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_kategori` (
  `id_item` int(7) NOT NULL,
  `id_kategori` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_kategori`
--

INSERT INTO `tbl_detail_kategori` (`id_item`, `id_kategori`) VALUES
(10, 9),
(6, 7),
(5, 5),
(5, 6),
(7, 7),
(8, 8),
(9, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_order`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_order` (
  `id_order` varchar(10) NOT NULL,
  `id_item` int(7) NOT NULL,
  `qty` smallint(4) NOT NULL,
  `biaya` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`id_order`, `id_item`, `qty`, `biaya`) VALUES
('1530142340', 1, 1, 10000);

--
-- Trigger `tbl_detail_order`
--
DELIMITER //
CREATE TRIGGER `penjualan_barang` AFTER INSERT ON `tbl_detail_order`
 FOR EACH ROW BEGIN
	UPDATE t_items i SET i.stok = i.stok - new.qty
    WHERE i.id_item = new.id_item;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_favorit`
--

CREATE TABLE IF NOT EXISTS `tbl_favorit` (
  `id_user` int(7) NOT NULL,
  `id_item` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_favorit`
--

INSERT INTO `tbl_favorit` (`id_user`, `id_item`) VALUES
(1, 1),
(3, 5),
(1, 5),
(1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_img`
--

CREATE TABLE IF NOT EXISTS `tbl_img` (
  `id_item` int(7) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_img`
--

INSERT INTO `tbl_img` (`id_item`, `img`) VALUES
(1, 'img15301166740.jpeg'),
(6, 'img1531277989.jpg'),
(7, 'img1531278933.jpg'),
(8, 'img1531278971.jpg'),
(9, 'img1531279003.jpg'),
(5, 'img15312788870.jpg'),
(5, 'img15312788881.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_item`
--

CREATE TABLE IF NOT EXISTS `tbl_item` (
`id_item` int(7) NOT NULL,
  `link` varchar(10) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `harga` int(10) NOT NULL,
  `berat` int(5) NOT NULL,
  `stok` smallint(2) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_item`
--

INSERT INTO `tbl_item` (`id_item`, `link`, `nama_item`, `harga`, `berat`, `stok`, `aktif`, `gambar`, `deskripsi`) VALUES
(1, '1530116670', 'tes1', 10000, 500, 999, 2, 'gambar1530116670.jpg', 'tes juga'),
(2, '1530317634', 'tes2', 150000, 1000, 1000, 2, 'gambar1530317633.jpg', 'akakkakakak'),
(3, '1530321636', 'tes3', 22500, 100, 100, 2, 'gambar1530321636.jpg', 'jajajjaa'),
(4, '1530326770', 'tes4', 14000, 100, 1500, 2, 'gambar1530326770.jpg', 'kakakakakakk'),
(5, '1530844798', ' Hijab Pashmina Instan', 24500, 170, 100, 1, 'gambar1531278887.jpg', 'Hijab Pashmina Instan / Pastan Sabrina 1 Face/Loop\r\n\r\nHijab instan langsung pakai, model pashmina instan, bahan bubblepop. Ukuran pashmina sebelum dijahit 140 sm x 75 cm. Bahan tidak menerawang, jilbab menutupi dada/sampai perut, seperti foto.\r\n\r\nKatalog Warna :\r\n\r\nKunyit\r\nNavy\r\nMoka\r\nDustypink\r\nSilver\r\nAbutua\r\nUngumuda\r\nHitam\r\nCoksu\r\nMerah\r\n\r\nCatatan :\r\n* Produk kami adalah jilbab replika dan merupakan produk rumahan (home industry). Kesamaan warna, ukuran, dan bahan tidak bisa 100 persen.\r\n\r\n* Detail produk kami ada di "Deskripsi Produk", dan jika masih kurang jelas atau ingin melihat real pic nya (photo asli produk), bisa chat dengan CS Kami yang buka setiap hari Senin-Jumat Jam 08.00 sd.17.00 dan Sabtu jam 08.00 sd.15.00.\r\n\r\n* Hati-hati penipuan dengan cara memberikan no hp, pin bbm atau no WA. Lakukan chat dan transaksi pembayaran hanya di marketplace ini.\r\n\r\n* Pengembalian produk (retur) hanya berlaku untuk produk cacat atau salah kirim (tidak sesuai pesanan).\r\n\r\n* Bila warna yang dipilih tidak ada, maka kami akan konfirmasi via Pesan/chat, bila dalam waktu 1x24 jam tdk ada jawaban maka kami mengirimkan warna yang tersedia, kecuali menuliskan : NO VARIAN CANCEL. '),
(6, '1530862262', 'Veil Niqab Aisyah', 248500, 200, 20, 1, 'gambar1531278005.jpg', 'Veil Niqab Aisyah berisi inner yg nyambung dengan niqabnya\r\nMaterials\r\n\r\nChifon Burj Emirate, Inner Jersey'),
(7, '1530863617', 'Niqab Sakinah', 182, 150, 30, 1, 'gambar1531279042.jpg', 'Satu set berisi niqab, inner bandana dan scarf square\r\nMaterials\r\n\r\nCotton\r\nCara perawatan\r\n\r\n• Hand Wash To 30C/86F • Do Not Bleach • Iron Up To 150C/302F • Dry Clean Perchloroethylene • Do Not Tumble Dry '),
(8, '1530863803', 'New Eleador Scarf for Tokohijab', 425000, 180, 20, 1, 'gambar1531279080.jpg', 'Materials\r\n\r\nVoal\r\nCara perawatan\r\n\r\n• Hand Wash To 30C/86F • Do Not Bleach • Iron Up To 150C/302F • Dry Clean Perchloroethylene • Do Not Tumble Dry '),
(9, '1530863987', 'New Oriana Scarf for Tokohijab', 425000, 150, 10, 1, 'gambar1531279097.jpg', 'Materials\r\nMaterials\r\n\r\nSatin\r\nSatin'),
(10, '1531217035', 'hijab', 500000, 200, 1, 2, 'gambar1531217035.png', 'test3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
`id_kategori` smallint(6) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`, `url`) VALUES
(5, 'Hijab Instan', 'hijab-instan'),
(6, 'Pashminah', 'pashminah'),
(7, 'Niqab', 'niqab'),
(8, 'Square-hijab', 'square-hijab'),
(9, 'Test', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id_order` varchar(15) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `total` double NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `pos` int(5) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kurir` varchar(5) NOT NULL,
  `service` varchar(50) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `bts_bayar` date NOT NULL,
  `bukti` varchar(25) NOT NULL,
  `status_proses` enum('belum','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `nama_pemesan`, `email`, `total`, `tujuan`, `pos`, `kota`, `kurir`, `service`, `tgl_pesan`, `bts_bayar`, `bukti`, `status_proses`) VALUES
('1530142340', 'sinta herena', 'sintaherena@gmail.com', 21000, 'jl. raya cirebon', 16690, 'Cirebon', 'pos', 'Paket Kilat Khusus', '2018-06-28', '2018-07-01', 'bukti1530142340.jpg', 'selesai'),
('1531473878', 'sinta herena', 'sintaherena@gmail.com', 188500, 'jalan jakarta', 18888888, 'Jakarta Barat', 'pos', 'Paket Kilat Khusus', '2018-07-13', '2018-07-16', 'bukti1531473878.jpg', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profil_toko`
--

CREATE TABLE IF NOT EXISTS `tbl_profil_toko` (
`id_profil` tinyint(4) NOT NULL,
  `nama_toko` varchar(20) NOT NULL,
  `alamat_toko` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `gplus` varchar(50) NOT NULL,
  `email_toko` varchar(30) NOT NULL,
  `pass_toko` varchar(30) NOT NULL,
  `api_key` varchar(50) NOT NULL,
  `asal` mediumint(9) NOT NULL,
  `rekening` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_profil_toko`
--

INSERT INTO `tbl_profil_toko` (`id_profil`, `nama_toko`, `alamat_toko`, `phone`, `facebook`, `twitter`, `gplus`, `email_toko`, `pass_toko`, `api_key`, `asal`, `rekening`) VALUES
(1, 'Tokohijab', 'Jalan Raya Bogor No.1', '089688880964', 'facebook.com', 'twitter.com', 'googleplus.com', 'koukob9@gmail.com', 'kagakouko', 'b98c92e7597f92a946b034afb0cc7dd4', 79, '777777777777777');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id_user` int(7) NOT NULL,
  `username` varchar(35) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `reset` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `nama_user`, `email`, `password`, `telp`, `alamat`, `reset`) VALUES
(1, 'sinta', 'sinta herena', 'sintaherena@gmail.com', '$2y$10$WN1tLi8mvQMn2zwyQIldyOVLNhAE/98hgvlotYJ0w9ijImLYceJyi', '896888889999', 'jl. bogor raya barat', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`id_admin`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
 ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
 ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tbl_profil_toko`
--
ALTER TABLE `tbl_profil_toko`
 ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `id_admin` tinyint(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
MODIFY `id_item` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
MODIFY `id_kategori` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_profil_toko`
--
ALTER TABLE `tbl_profil_toko`
MODIFY `id_profil` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
