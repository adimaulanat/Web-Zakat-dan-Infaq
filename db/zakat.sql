-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 06:28 PM
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
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `status`, `nama`, `email`) VALUES
('adi', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 'adi maulana', 'adimaulana@gmail.con'),
('admin', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'Fajar Panca', 'admin@gmail.com'),
('admin2', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'tesadmin', 'admin@gmail.co.id'),
('fajarpanca', '6f8de55c789477d5158eb81bdfdd3015', 0, 'fajarpancas', 'fajarpanca@gmail.com'),
('fajarpancas', 'be963885b1e3bd7bbe1f6f924458589a', 1, 'Fajar Panca', 'fajarpanca@gmai.com'),
('fajarpancass', '8bd5a17d5db7f0860110eba98dac464c', 1, 'pancaaaa', 'fajarpancasaputra@gmail.com'),
('panca', 'c9e023417fa66e852e4d1f920c051017', 0, 'panca', 'panca@gmail.com'),
('username', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 'user2', 'username@gmail.com');

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
  `nama_infaq` varchar(255) NOT NULL,
  `nominal_infaq` int(11) NOT NULL,
  `slip_gaji` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `tanggal_verifikasi` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infaq`
--

INSERT INTO `infaq` (`id`, `username`, `nama_infaq`, `nominal_infaq`, `slip_gaji`, `bukti_pembayaran`, `tanggal_input`, `tanggal_bayar`, `tanggal_verifikasi`, `status`) VALUES
(14, 'username', 'Infaq 1', 4000, 'rainy15.png', 'uang_logam_lima_ratus_rupiah_gambar_melati10.jpg', '2019-04-29', '2019-04-29', '0000-00-00', 1),
(15, 'username', 'Infaq 2', 50000, 'rainy16.png', '', '2019-04-29', '0000-00-00', '0000-00-00', 0),
(16, 'username', 'Infaq 3', 90000, 'rainy17.png', '', '2019-04-29', '0000-00-00', '0000-00-00', 0),
(17, 'username', 'Infaq 4', 50000, 'rainy18.png', '', '2019-04-29', '0000-00-00', '0000-00-00', 0),
(18, 'username', 'Infaq 5', 84000, 'rainy19.png', '', '2019-04-29', '0000-00-00', '0000-00-00', 0),
(19, 'username', 'Infaq 6', 90200, 'rainy20.png', '', '2019-04-29', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `unit_usaha_syariah`
--

CREATE TABLE `unit_usaha_syariah` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(1000) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `produk` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_usaha_syariah`
--

INSERT INTO `unit_usaha_syariah` (`id`, `nama`, `lokasi`, `foto`, `produk`) VALUES
(1, 'Koperasi Simpan Pinjam Syariah Artha Prima Lestari', 'Jl. Mohamad Toha No. 355 A Rt. 07 Rw. 05 Kelurahan Ciseureuh Kecamatan Regol Kota Bandung', 'bap.jpg', 'Simpan Pinjam'),
(2, 'Koperasi Simpan Pinjam dan Pembiayaan Syariah BMT Itqan', 'Jl. Padasuka No. 160 Kelurahan Pasirlayung Kecamatan Cibeunying Kidul Kota Bandung', 'artikelbmtitqan-b-1.jpg', 'Simpan Pinjam'),
(3, 'Koperasi Simpan Pinjam dan Pembiayaan Syariah Investama', 'Jl. Soekarno Hatta No. 550 Kelurahan Sekejati Kecamatan Buahbatu Kota Bandung', 'mutiara-nusantara-investama.jpg', 'Simpan Pinjam'),
(4, 'Koperasi Jasa Keuangan Syariah BMT Barrah', 'Jl. Kiara Sari Asri No. 10 Terusan Kiaracondong Kelurahan Margasari Buahbatu Kota Bandung', '-vEMaJRM_400x400.jpg', 'Simpan Pinjam'),
(5, 'Koperasi Simpan Pinjam dan Pembiyaan Syariah Al-Falah Mandiri Sejahtera', 'Jl. Stasiun Kaiarcondong No. 39 RT.05 RW.01 kelurahan Kebun Jayanti KEcamatan Kiaracondong Kota Bandung', 'RAT-KSPPS-BMT-Al-Falah-Tahun-Buku-2016.jpg', 'Simpan Pinjam dan Pembiayaan Syariah');

-- --------------------------------------------------------

--
-- Table structure for table `zakat`
--

CREATE TABLE `zakat` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_zakat` varchar(255) NOT NULL,
  `nominal_gaji` int(11) NOT NULL,
  `nominal_zakat` int(11) NOT NULL,
  `slip_gaji` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(355) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `tanggal_verifikasi` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zakat`
--

INSERT INTO `zakat` (`id`, `username`, `nama_zakat`, `nominal_gaji`, `nominal_zakat`, `slip_gaji`, `bukti_pembayaran`, `tanggal_input`, `tanggal_bayar`, `tanggal_verifikasi`, `status`) VALUES
(69, 'username', 'Zakat 1', 9000000, 225000, 'rainy8.png', 'uang_logam_lima_ratus_rupiah_gambar_melati9.jpg', '2019-04-29', '2019-04-29', '0000-00-00', 1),
(70, 'username', 'Zakat 2', 10000000, 250000, 'rainy9.png', '', '2019-04-29', '0000-00-00', '0000-00-00', 0),
(71, 'username', 'Zakat 3', 8000000, 200000, 'rainy10.png', '', '2019-04-29', '0000-00-00', '0000-00-00', 0),
(72, 'username', 'Zakat 4', 2000000, 50000, 'rainy11.png', '', '2019-04-29', '0000-00-00', '0000-00-00', 0),
(73, 'username', 'Zakat 5', 7000000, 175000, 'rainy12.png', '', '2019-04-29', '0000-00-00', '0000-00-00', 0),
(74, 'username', 'Zakat 6', 4000000, 100000, 'rainy13.png', '', '2019-04-29', '0000-00-00', '0000-00-00', 0);

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
-- Indexes for table `unit_usaha_syariah`
--
ALTER TABLE `unit_usaha_syariah`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `unit_usaha_syariah`
--
ALTER TABLE `unit_usaha_syariah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `zakat`
--
ALTER TABLE `zakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
