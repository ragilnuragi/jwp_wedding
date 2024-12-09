-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2024 pada 04.54
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wedding_jewepe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_catalogue`
--

CREATE TABLE `tb_catalogue` (
  `catalogue_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `package_name` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(11) NOT NULL,
  `status_publish` enum('publish','draft') NOT NULL,
  `user_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_catalogue`
--

INSERT INTO `tb_catalogue` (`catalogue_id`, `image`, `package_name`, `description`, `price`, `status_publish`, `user_id`, `created_at`, `updated_at`) VALUES
(7, '20240614_624701288.jpeg', 'Paket Pernikahan Adat Sunda', '<p><span style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Bagi kamu yang tinggal di Jawa Barat, pernikahan adat Sunda mungkin jadi pernikahan impianmu. Dalam pelaksanaannya, pernikahan adat Sunda memiliki sederet prosesi yang harus dilalui. Prosesi adat ini juga mengandung makna tersendiri bagi pengantin. Lalu kira-kira berapa ya rincian b</span><span style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">iaya pernikahan</span><span style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">&nbsp;adat Sunda? Berikut rincian dari kami:</span><br></p><li style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Undangan ustadz untuk pengajian</li><li style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Biaya penghulu&nbsp;</li><li style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Sewa gedung dan dekorasi</li><li style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Catering untuk 500 tamu</li><li style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Makanan saat akad nika</li><li style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Undangan Rp4.000 per lembar</li><li style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Souvenir Rp.5000&nbsp;</li><li style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Wardrobe mulai dari</li><li style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Riasan mulai dari</li><li style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Seserahan dan upacara adat</li><li style=\"font-family: \" open=\"\" sans\",=\"\" serif;=\"\" color:=\"\" rgb(94,=\"\" 94,=\"\" 94);=\"\" font-size:=\"\" 14px;\"=\"\">Hiburan dan Dokumentasi</li>', '60000000', 'publish', 1, '2024-06-14 11:43:45', '2024-06-14 19:03:12'),
(8, '20240616_605545372.jpg', 'Paket Pernikahan Adat Jawa', '<p><span style=\"color: rgb(33, 37, 41); font-family: Mulish, sans-serif; text-align: justify;\">Prosesi pernikahan adat Jawa memiliki rangkaian upacara atau ritual yang berbeda dengan adat lainnya. Tentunya, masing-masing ritual tersebut memerlukan biaya yang harus dipersiapkan oleh kedua mempelai.</span></p><p><span style=\"color: rgb(33, 37, 41); font-family: Mulish, sans-serif; text-align: justify;\">Bagi kamu yang ingin tahu rincian pernikahan adat Jawa, Berikut adalah rinciannya:</span></p><ul><li><span style=\"color: rgb(33, 37, 41); font-family: Mulish, sans-serif; text-align: justify;\">Tata Rias dan Busana</span></li><li><span style=\"color: rgb(33, 37, 41); font-family: Mulish, sans-serif; text-align: justify;\">Pemasangan Tarub</span></li><li><span style=\"color: rgb(33, 37, 41); font-family: Mulish, sans-serif; text-align: justify;\">Dekorasi pelaminan</span></li><li><span style=\"color: rgb(33, 37, 41); font-family: Mulish, sans-serif; text-align: justify;\">Proses Siraman</span></li><li style=\"text-align: justify;\"><font color=\"#212529\" face=\"Mulish, sans-serif\">Midodoreni</font></li><li style=\"text-align: justify;\"><font color=\"#212529\" face=\"Mulish, sans-serif\">Akad</font></li><li style=\"text-align: justify;\"><font color=\"#212529\" face=\"Mulish, sans-serif\">Panggih</font></li><li style=\"text-align: justify;\"><font color=\"#212529\" face=\"Mulish, sans-serif\">Dokumentasi</font></li><li style=\"text-align: justify;\"><font color=\"#212529\" face=\"Mulish, sans-serif\">Peralatan Kamar</font></li><li style=\"text-align: justify;\"><font color=\"#212529\" face=\"Mulish, sans-serif\">Peralatan Acara</font></li><li style=\"text-align: justify;\"><font color=\"#212529\" face=\"Mulish, sans-serif\">Cathering</font></li><li style=\"text-align: justify;\"><font color=\"#212529\" face=\"Mulish, sans-serif\">Sewa Gedung</font></li></ul>', '55000000', 'publish', 1, '2024-06-14 14:42:08', '2024-06-16 03:46:28'),
(9, '20240616_1186113193.jpg', 'Paket Pernikahan Adat Batak', '<div><span style=\"font-size: 15px; color: rgb(17, 17, 17); font-family: Raleway;\">Berikut rincian Paket Pernikanan Batak:</span><br></div><div><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Raleway; text-align: center; list-style-position: inside; list-style-image: none; color: rgb(17, 17, 17); font-size: 15px;\"><li style=\"margin: 0px; list-style: inside none disc; text-align: left;\">Ruangan dengan Air Condition</li><li style=\"margin: 0px; list-style: inside none disc; text-align: left;\">Makana Adat Batak paket standard</li><li style=\"text-align: left;\">Set Up Long Table + taplak meja + skirting, kursi + cover</li><li style=\"text-align: left;\">Bunga untuk dekorasi meja adat</li><li style=\"text-align: left;\">Sound System di Ballroom untuk MC berikut 2 (dua) wireless microphone</li><li style=\"text-align: left;\">Kapasitas listrik untuk Sound System 5.000 watt</li><li style=\"text-align: left;\">Karpet merah dengan panjang ± 35m / 1 (satu) jalur</li><li style=\"margin: 0px; list-style: inside none disc; text-align: left;\">2 (dua) set meja penerima tamu</li><li style=\"margin: 0px; list-style: inside none disc; text-align: left;\">4 (empat) buah buku tamu</li><li style=\"margin: 0px; list-style: inside none disc; text-align: left;\">4 (empat) buah kotak Ang Pao</li><li style=\"margin: 0px; list-style: inside none disc; text-align: left;\">2 (dua) ruang rias untuk persiapan panitia</li><li style=\"margin: 0px; list-style: inside none disc; text-align: left;\">2 (dua) ruang rias pengantin lengkap dengan set up cofee break untuk 10 (sepuluh) orang</li><li style=\"margin: 0px; list-style: inside none disc; text-align: left;\">Sarana parkir untuk 2.000 mobil</li></ul></div>', '200000000', 'publish', 1, '2024-06-14 14:42:20', '2024-06-16 03:50:53'),
(12, '20240616_843037615.jpeg', 'Paket Pernikahan Sederhana', '<p><span style=\"font-size: inherit;\">Rincian Paket Sederhana Rumahan:</span></p><ul><li><span style=\"font-size: inherit;\">Mahar atau Maskawin</span></li><li>Cincin Pernikahan</li><li><span style=\"font-size: inherit;\">Hantaran atau Seserahan</span></li><li><span style=\"font-size: inherit;\">Tempat dan Dekorasi Pernikahan</span></li><li><span style=\"box-sizing: inherit; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; border-width: 0px; background-repeat: no-repeat;\">Katering</span></li><li><span style=\"box-sizing: inherit; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; border-width: 0px; background-repeat: no-repeat;\">Busana dan Tata Rias Pengantin</span></li><li><span style=\"box-sizing: inherit; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; border-width: 0px; background-repeat: no-repeat;\">Dokumentasi Pernikahan</span></li><li><span style=\"box-sizing: inherit; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; border-width: 0px; background-repeat: no-repeat;\">Undangan dan Souvenir Pernikahan</span></li><li><span style=\"box-sizing: inherit; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; border-width: 0px; background-repeat: no-repeat;\">Entertainment</span></li><li><span style=\"box-sizing: inherit; font-size: inherit; line-height: inherit; margin: 0px; padding: 0px; border-width: 0px; background-repeat: no-repeat;\">Biaya Tidak Terduga</span></li></ul><p></p>', '46000000', 'publish', 1, '2024-06-16 04:14:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(11) NOT NULL,
  `catalogue_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `wedding_date` date NOT NULL,
  `status` enum('requested','approved','cancelled') NOT NULL,
  `user_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `catalogue_id`, `name`, `email`, `phone_number`, `address`, `wedding_date`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 7, 'Ragil Nurfadillah', 'ragil.nurfadillah@gmail.com', '087788877788', 'JL. Kusuma Jaya', '2024-06-29', 'cancelled', 1, '2024-06-15 15:08:35', '2024-06-16 04:43:56'),
(2, 7, 'Achmad Mukhlis Prinata', 'mukhlis@gmail.com', '081222144411', 'Jl. baru raya', '2024-06-30', 'approved', 1, '2024-06-15 18:51:45', '2024-06-16 04:43:46'),
(3, 9, 'David', 'david@gmail.com', '08777888444555', 'Jl. Medan Raya', '2024-06-26', 'requested', 0, '2024-06-16 04:20:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_settings`
--

CREATE TABLE `tb_settings` (
  `id` int(11) NOT NULL,
  `website_name` varchar(256) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  `address` text NOT NULL,
  `maps` text NOT NULL,
  `logo` varchar(80) NOT NULL,
  `facebook_url` varchar(256) NOT NULL,
  `instagram_url` varchar(256) NOT NULL,
  `header_bussiness_hour` varchar(160) NOT NULL,
  `time_bussiness_hour` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_settings`
--

INSERT INTO `tb_settings` (`id`, `website_name`, `phone_number`, `email`, `address`, `maps`, `logo`, `facebook_url`, `instagram_url`, `header_bussiness_hour`, `time_bussiness_hour`, `created_at`, `updated_at`) VALUES
(1, 'JWP Wedding Organizer', '0819554447788', 'jwp_wo@gmail.com', 'sss', '<iframe class=\"w-100 rounded\"src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd\"frameborder=\"0\" style=\"height: 100%; min-height: 300px; border:0;\" allowfullscreen=\"\" aria-hidden=\"false\"\r\n                        tabindex=\"0\"></iframe>', '20240614_66300274.png', 'sss', 'sss', 'ssss', 'sss', '2024-06-13 16:29:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$OumROnPmjCcDgxHmAxt1YeSnLqNc5OYlx/tLcV5zxBwXmi0p/kA/i', '2024-06-13 06:23:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_catalogue`
--
ALTER TABLE `tb_catalogue`
  ADD PRIMARY KEY (`catalogue_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `catalogue_id` (`catalogue_id`);

--
-- Indeks untuk tabel `tb_settings`
--
ALTER TABLE `tb_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_catalogue`
--
ALTER TABLE `tb_catalogue`
  MODIFY `catalogue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_settings`
--
ALTER TABLE `tb_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_catalogue`
--
ALTER TABLE `tb_catalogue`
  ADD CONSTRAINT `user_id_catalogue_idx` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `catalogue_id_order_idx` FOREIGN KEY (`catalogue_id`) REFERENCES `tb_catalogue` (`catalogue_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
