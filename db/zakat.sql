-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 01:35 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `status`, `nama`) VALUES
('adi', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 'adi maulana'),
('admin', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'Admin'),
('fajarpanca', '6f8de55c789477d5158eb81bdfdd3015', 0, 'fajarpancas'),
('fajarpancas', 'be963885b1e3bd7bbe1f6f924458589a', 1, 'Fajar Panca'),
('panca', 'c9e023417fa66e852e4d1f920c051017', 0, 'panca'),
('username', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` varchar(5000) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `gambar`) VALUES
(1, 'Zakat', 'Menurut Bahasa, kata “zakat” berarti tumbuh, berkembang, subur atau bertambah. Zakat berasal dari bentuk kata \"zaka\" yang berarti suci, baik, berkah, tumbuh, dan berkembang. Dinamakan zakat, karena di dalamnya terkandung harapan untuk beroleh berkah, membersihkan jiwa dan memupuknya dengan berbagai kebaikan (Fikih Sunnah, Sayyid Sabiq: 5)\r\n\r\nMakna tumbuh dalam arti zakat menunjukkan bahwa mengeluarkan zakat sebagai sebab adanya pertumbuhan dan perkembangan harta, pelaksanaan zakat itu mengakibatkan pahala menjadi banyak. Sedangkan makna suci menunjukkan bahwa zakat adalah mensucikan jiwa dari kejelekan, kebatilan dan pensuci dari dosa-dosa.\r\n\r\nDalam Al-Quran disebutkan, “Ambillah zakat dari sebagian harta mereka, dengan zakat itu kamu membersihkan dan menyucikan mereka” (QS. at-Taubah [9]: 103).\r\n\r\nMenurut istilah dalam kitab al-Hâwî, al-Mawardi mendefinisikan zakat dengan nama pengambilan tertentu dari harta tertentu, menurut sifat-sifat tertentu, dan untuk diberikan kepada golongan tertentu. Orang yang menunaikan zakat disebut Muzaki. Sedangkan orang yang menerima zakat disebut Mustahik.\r\n\r\nInfak berasal dari kata anfaqa yang berarti ’mengeluarkan sesuatu (harta) untuk kepentingan sesuatu’. Termasuk ke dalam pengertian ini, infak yang dikeluarkan orang-orang kafir untuk kepentingan agamanya (lihat QS Al-Anfal:36). Sedangkan menurut terminologi syariat, infak berarti mengeluarkan sebagian dari harta atau pendapatan/penghasilan untuk suatu kepentingan yang diperintahkan ajaran Islam.\r\n\r\nJika zakat ada nisabnya, infak tidak mengenal nisab. Infak dikeluarkan oleh setiap orang yang beriman, baik yang berpenghasilan tinggi maupun rendah, apakah ia di saat lapang maupun sempit ( QS. Ali Imran:134). Jika zakat harus diberikan kepada mustahik tertentu (8 asnaf) maka infak boleh diberikan kepada siapa pun juga, misalnya untuk kedua orang tua, anak yatim, dan sebagainya ( QS. Al-Baqarah:215). Sedekah berasal dari kata shadaqa yang berarti ’benar’. Orang yang suka bersedekah adalah orang yang benar pengakuan imannya. Menurut terminologi syariat,pengertian sedekah sama dengan pengertian infak, termasuk juga hukum dan ketentuan-ketentuannya. Hanya saja, jika infak berkaitan dengan materi, sedekah memiliki arti lebih luas menyangkut hal yang bersifal non materiil. Hadits riwayat Imam Muslim dari Abu Dzar,  Rasullullah menyatakan bahwa jika tidak mampu bersedekah dengan harta maka membaca tasbih, membaca takbir, tahmid, tahlil, berhubungan suami-istri, dan melakukan kegiatan amar ma’ruf nahi munkar adalah sedekah.', '1.jpg'),
(2, 'Zakat Penghasilan', 'Zakat profesi atau zakat penghasilan adalah salah satu cara membersihkan harta yang dikenakan pada setiap pekerjaan yang memiliki penghasilan berupa uang yang telah mencapai nisabnya. Menurut Ibnu Abbas, Ibnu Mas’ud, Umar bin Abdul Aziz dan ulama modern seperti Yusuf Qardhawi mereka mengqiyaskan zakat penghasilan dengan zakat pertanian yang dikeluarkan tiap kali didapatkan.\r\n\r\nSama seperti jenis zakat lainnya, zakat penghasilan ini juga termasuk wajib dikeluarkan karena jenis zakat ini merupakan qiyas atau analogi dari zakat harta.\r\n\r\nSemua jenis zakat memiliki hitungan tersendiri yang berbeda, namun syarat dasar nya tetap sama yakni telah mencapai nishab dan haul. Nishab zakat penghasilan setara dengan 653kg gabah (Harga Gabah Rp 5.600,-/kg) atau sebanyak 2,5% dari setiap penghasilan yang telah kita terima. Berikut contoh kasus dan bagaimana cara menghitung zakat penghasilan sesuai dengan fiqih zakat.\r\n\r\nInfak berasal dari kata anfaqa yang berarti ’mengeluarkan sesuatu (harta) untuk kepentingan sesuatu’. Termasuk ke dalam pengertian ini, infak yang dikeluarkan orang-orang kafir untuk kepentingan agamanya (lihat QS Al-Anfal:36). Sedangkan menurut terminologi syariat, infak berarti mengeluarkan sebagian dari harta atau pendapatan/penghasilan untuk suatu kepentingan yang diperintahkan ajaran Islam.\r\n\r\nJika zakat ada nisabnya, infak tidak mengenal nisab. Infak dikeluarkan oleh setiap orang yang beriman, baik yang berpenghasilan tinggi maupun rendah, apakah ia di saat lapang maupun sempit ( QS. Ali Imran:134). Jika zakat harus diberikan kepada mustahik tertentu (8 asnaf) maka infak boleh diberikan kepada siapa pun juga, misalnya untuk kedua orang tua, anak yatim, dan sebagainya ( QS. Al-Baqarah:215). Sedekah berasal dari kata shadaqa yang berarti ’benar’. Orang yang suka bersedekah adalah orang yang benar pengakuan imannya. Menurut terminologi syariat,pengertian sedekah sama dengan pengertian infak, termasuk juga hukum dan ketentuan-ketentuannya. Hanya saja, jika infak berkaitan dengan materi, sedekah memiliki arti lebih luas menyangkut hal yang bersifal non materiil. Hadits riwayat Imam Muslim dari Abu Dzar,  Rasullullah menyatakan bahwa jika tidak mampu bersedekah dengan harta maka membaca tasbih, membaca takbir, tahmid, tahlil, berhubungan suami-istri, dan melakukan kegiatan amar ma’ruf nahi munkar adalah sedekah.', '2.jpg'),
(3, 'Infaq', 'Infaq adalah mengeluarkan harta yang mencakup zakat dan bukan  zakat. Infaq ada yang wajib dan ada yang sunnah. Infaq wajib diantaranya zakat, kafarat, nadzar, dll. Infak sunnah diantara nya, infak kepada fakir miskin sesama muslim, infak bencana alam, infak kemanusiaan, dll. Terkait dengan infak ini Rasulullah SAW bersabda dalam hadits yang diriwayatkan Bukhari dan Muslim ada malaikat yang senantiasa berdo’a setiap pagi dan sore : “Ya Allah SWT berilah orang yang berinfak, gantinya. Dan berkata yang lain : “Ya Allah jadikanlah orang yang menahan infak, kehancuran”.Infaq adalah mengeluarkan harta yang mencakup zakat dan non zakat. Infaq ada yang wajib dan ada yang sunnah. Infaq wajib diantaranya zakat, kafarat, nadzar, dll. Infak sunnah diantara nya, infak kepada fakir miskin sesama muslim, infak bencana alam, infak kemanusiaan, dll. Terkait dengan infak ini Rasulullah SAW bersabda dalam hadits yang diriwayatkan Bukhari dan Muslim ada malaikat yang senantiasa berdo’a setiap pagi dan sore : “Ya Allah SWT berilah orang yang berinfak, gantinya. Dan berkata yang lain : “Ya Allah jadikanlah orang yang menahan infak, kehancuran”.\r\n\r\nInfak berasal dari kata anfaqa yang berarti ’mengeluarkan sesuatu (harta) untuk kepentingan sesuatu’. Termasuk ke dalam pengertian ini, infak yang dikeluarkan orang-orang kafir untuk kepentingan agamanya (lihat QS Al-Anfal:36). Sedangkan menurut terminologi syariat, infak berarti mengeluarkan sebagian dari harta atau pendapatan/penghasilan untuk suatu kepentingan yang diperintahkan ajaran Islam.\r\n\r\nJika zakat ada nisabnya, infak tidak mengenal nisab. Infak dikeluarkan oleh setiap orang yang beriman, baik yang berpenghasilan tinggi maupun rendah, apakah ia di saat lapang maupun sempit ( QS. Ali Imran:134). Jika zakat harus diberikan kepada mustahik tertentu (8 asnaf) maka infak boleh diberikan kepada siapa pun juga, misalnya untuk kedua orang tua, anak yatim, dan sebagainya ( QS. Al-Baqarah:215). Sedekah berasal dari kata shadaqa yang berarti ’benar’. Orang yang suka bersedekah adalah orang yang benar pengakuan imannya. Menurut terminologi syariat,pengertian sedekah sama dengan pengertian infak, termasuk juga hukum dan ketentuan-ketentuannya. Hanya saja, jika infak berkaitan dengan materi, sedekah memiliki arti lebih luas menyangkut hal yang bersifal non materiil. Hadits riwayat Imam Muslim dari Abu Dzar,  Rasullullah menyatakan bahwa jika tidak mampu bersedekah dengan harta maka membaca tasbih, membaca takbir, tahmid, tahlil, berhubungan suami-istri, dan melakukan kegiatan amar ma’ruf nahi munkar adalah sedekah.', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `infaq`
--

CREATE TABLE `infaq` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nominal_infaq` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `tanggal_verifikasi` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infaq`
--

INSERT INTO `infaq` (`id`, `username`, `nominal_infaq`, `bukti_pembayaran`, `tanggal_input`, `tanggal_bayar`, `tanggal_verifikasi`, `status`) VALUES
(1, 'username', 1000, 'rainy.png', '2019-04-02', '2019-04-14', '2019-04-14', 2),
(3, 'adi', 2000, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(4, 'adi', 20000, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(5, 'adi', 323232, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(6, 'adi', 323222, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(7, 'adi', 232222, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(8, 'adi', 10000, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(9, 'adi', 10000000, '', '2019-04-04', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `zakat`
--

CREATE TABLE `zakat` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nominal_gaji` int(11) NOT NULL,
  `nominal_zakat` int(11) NOT NULL,
  `bukti_pembayaran` varchar(355) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `tanggal_verifikasi` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zakat`
--

INSERT INTO `zakat` (`id`, `username`, `nominal_gaji`, `nominal_zakat`, `bukti_pembayaran`, `tanggal_input`, `tanggal_bayar`, `tanggal_verifikasi`, `status`) VALUES
(20, 'adi', 9090909, 227273, '', '2019-04-02', '0000-00-00', '0000-00-00', 0),
(21, 'adi', 9303030, 232576, '', '2019-04-02', '0000-00-00', '0000-00-00', 0),
(22, 'adi', 292992, 7325, '', '2019-04-02', '0000-00-00', '0000-00-00', 0),
(23, 'adi', 500000, 12500, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(24, 'adi', 10000, 250, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(25, 'adi', 20000000, 500000, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(26, 'adi', 1090909090, 27272727, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(27, 'adi', 1000000, 25000, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(28, 'adi', 10000000, 250000, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(29, 'adi', 10000000, 250000, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(30, 'adi', 113, 3, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(32, 'adi', 1000000, 25000, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(33, 'adi', 10000000, 250000, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(34, 'adi', 12, 0, '', '2019-04-04', '0000-00-00', '0000-00-00', 0),
(35, 'username', 1, 0, '', '2019-04-11', '0000-00-00', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infaq`
--
ALTER TABLE `infaq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zakat`
--
ALTER TABLE `zakat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `infaq`
--
ALTER TABLE `infaq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `zakat`
--
ALTER TABLE `zakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
