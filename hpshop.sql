-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2022 pada 20.22
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hpshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price_before` int(20) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price_before`, `price`, `quantity`, `image`) VALUES
(4, 1, 6, 'Realme Smart TV 32&#34;', 2550000, 1750000, 1, 'tv-01.webp'),
(10, 1, 6, 'Realme Smart TV 32\"', 2550000, 1750000, 1, 'tv-01.webp'),
(11, 1, 13, 'OPPO Reno6', 4300000, 3999000, 1, 'oppo_oppo_reno_6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hero`
--

CREATE TABLE `hero` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `caption` text NOT NULL,
  `link` text NOT NULL,
  `img` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hero`
--

INSERT INTO `hero` (`id`, `judul`, `caption`, `link`, `img`, `status`) VALUES
(2, 'sakti', 'aku suka captionmu', 'http://localhost/project/compastianshop/Admin/hero', '2hr_01.jpg', 'disetujui'),
(3, 'Amelia', 'aku suka captionmu', 'http://localhost/project/compastianshop/Admin/update_product/11', '3hr_01.jpg', 'disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(2, 3, 'test', '08972', 'sivanaamelia30@gmail.com', 'cash on delivery', 'ds.karangtinggil, kec. pucuk, kab. lamongan,  ls, lamongan, Jawa Timur, Indonesia - 62257', 'Canon EOS 3000D (2000000 x 1) - ', 2000000, '2022-12-13', 'completed'),
(3, 2, 'tyj', '612454578', 'nawepiwo@teleg.eu', 'cash on delivery', '3277 Spring Avenue, tjy, surabaya, tambak sari , 60177', 'Lenovo IdeaPad Slim 3 (4500000 x 2) - ', 9000000, '2022-12-14', 'completed'),
(4, 2, 'sss', '9612454578', 'nawepiwo@teleg.eu', 'cash on delivery', '3277 Spring Avenue, sss, surabaya, tambak sari , 60177', 'Lenovo IdeaPad Slim 3 (4500000 x 2) - ', 9000000, '2022-12-14', 'pending'),
(5, 16, 'akui', '0875634765', 'akui30@gmail.com', 'cash on delivery', 'jalan jalan, tambak sari, surabaya, jawa timur , 60177', 'Lenovo IdeaPad Slim 3 (4499999 x 1) - Realme C21Y (850000 x 1) - ', 5349999, '2022-12-14', 'pending'),
(6, 16, 'akui', '0875634765', 'akui30@gmail.com', 'cash on delivery', 'jalan jalan, tambak sari, surabaya, jawa timur , 60177', 'Lenovo IdeaPad Slim 3 (4499999 x 1) - Realme C21Y (850000 x 1) - ', 5349999, '2022-12-14', 'pending'),
(7, 16, 'adie', '089612454578', 'nawepiwo@teleg.eu', 'credit card', '3277 Spring Avenue, jatim, surabaya, tambak sari , 60177', 'Realme Smart TV 32', 1750000, '2022-12-15', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `produsen` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `price_before` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `produsen`, `details`, `price`, `price_before`, `image_01`, `image_02`, `image_03`) VALUES
(2, 'Canon EOS 3000D', 'Canon', 'Canon EOS 3000D. Kamera DSLR ini memiliki tipe sensor CMOS dengan ukuran 22.3 x 14.9mm serta layar dengan ukuran 2.7&#34;. Video pada kamera ini beresolusi Full HD dengan minimum ISO 100 dan maksimal ISO 12800.', 2000000, 3000000, 'camera-1.webp', 'camera-2.webp', 'camera-3.webp'),
(4, 'Lenovo IdeaPad Slim 3', 'Lenovo', 'Lenovo IdeaPad Slim 3 Laptop adalah laptop dengan layar 14\" dan resolusi 1920 x 1080pixels yang dilengkapi spesifikasi mumpuni. Laptop dengan berat 1.41kg ini ditenagai kartu grafis Integrated Intel UHD Graphics dan didukung sistem operasi Windows 10. ', 4499999, 5250000, 'laptop-1.webp', 'laptop-3.webp', 'laptop-2.webp'),
(6, 'Realme Smart TV 32&#34;', 'Realme', 'Ingin memiliki pengalaman menonton yang lebih menyenangkan? Pasang TV LED Realme Smart TV 32&#34; di rumahmu! Dengan tipe layar 4K yang disertai resolusi 1920 x 1080pixels, kamu akan mendapatkan tampilan visual yang jernih dan tajam. TV ini juga sudah dilengkapi dengan 3 port HDMI dan 2 port USB.', 1750000, 2550000, 'tv-01.webp', 'tv-02.webp', 'tv-03.webp'),
(10, 'Canon EOS 1300D', 'Canon', 'Canon EOS 1300D. Kamera DSLR ini memiliki tipe sensor CMOS dengan ukuran 22.3 x 14.9mm serta layar dengan ukuran 3&#34;. Video pada kamera ini beresolusi Full HD dengan minimum ISO 100 dan maksimal ISO 12800', 3255000, 3900000, 'eos1300D_1.jpg', 'eos1300d_2.jpg', 'eos1300d_3.jpg'),
(11, 'TV LED Samsung TV N5001', 'Samsung', 'Ingin memiliki pengalaman menonton yang lebih menyenangkan? Pasang TV LED Samsung TV N5001 di rumahmu! Dengan tipe layar Full HD yang disertai resolusi 1920 x 1080pixels, kamu akan mendapatkan tampilan visual yang jernih dan tajam. TV ini juga sudah dilengkapi dengan 1 port HDMI dan 1 port USB.', 2100000, 2350000, 'samsungtv_1.jpg', 'samsungtv2.jpg', 'samsungtv_3.jpg'),
(12, 'Laptop ASUS M415 ', 'Asus', 'Laptop ASUS M415 adalah laptop dengan layar 14&#34; dan resolusi 1366 x 768pixels yang dilengkapi spesifikasi mumpuni. Laptop dengan berat 1.6kg ini ditenagai kartu grafis AMD Radeon™ Graphics dan didukung sistem operasi Windows 10 Home. ', 5875000, 6500000, 'asus_1.jpg', 'asus_2.jpg', 'asus_3.jpg'),
(13, 'OPPO Reno6', 'Oppo', 'OPPO Reno6 merupakan smartphone dengan kapasitas 4300mAh dan layar 6.4&#34; yang dilengkapi dengan kamera belakang 64 + 8 + 2MP dengan tingkat densitas piksel sebesar 411ppi dan tampilan resolusi sebesar 1080 x 2400pixels. Dengan berat sebesar 173g, handphone HP ini memiliki prosesor Octa Core. ', 3999000, 4300000, 'oppo_oppo_reno_6.jpg', 'oppo_oppo_reno_6_1.jpg', 'oppo_oppo_reno_6_2.jpg'),
(14, 'Sharp Kulkas SJ-236MG-GB', 'Sharp', 'Urusan menyimpan bahan makanan di rumah jadi lebih mudah dengan Sharp Kulkas SJ-236MG-GB. Kulkas 2 pintu tipe Top Freezer ini dirancang dengan kapasitas 205l dan ukuran 54.5 x 138 x 58.8cm.', 2499000, 2845000, 'kulkas_sharp_1.jpg', 'kulkas_sharp_2.jpg', 'kulkas_sharp_3.jpg'),
(15, 'Eiger Jam Character 4.0', 'Eiger', 'Eiger Jam Character 4.0 Jam Tangan Pria - Black merupakan digital watch yang memadukan antara stainless steel case & strap dan dial. Jam tangan yang didesain sporty ini memiliki fitur EL-backlight, alarm, and counter time serta memiliki water resistant 100 m. Jam tangan ini cocok digunakan untuk kegiatan olahraga air seperti snorkeling atau diving.', 345000, 400000, 'eiger_1.jpg', 'eiger_2.jpg', 'eiger_3.jpg'),
(16, 'Nikon D3500', 'Nikon', 'Nikon D3500. Kamera DSLR ini memiliki tipe sensor CMOS dengan ukuran 23.5 x 15.6mm serta layar dengan ukuran 3&#34;. Video pada kamera ini beresolusi Full HD dengan minimum ISO 100 dan maksimal ISO 25600.', 3999000, 4700000, 'nikon_1.jpg', 'nikon_2.jpg', 'nikon_3.jpg'),
(17, 'LED LG TV 32LM630BPTB', 'LG', 'Ingin memiliki pengalaman menonton yang lebih menyenangkan? Pasang TV LED LG TV 32LM630BPTB di rumahmu! Dengan tipe layar HD yang disertai resolusi 1366 x 768pixels, kamu akan mendapatkan tampilan visual yang jernih dan tajam. TV ini juga sudah dilengkapi dengan 1 port HDMI dan 2 port USB.', 2999999, 3250000, 'lgtv_3.jpg', 'lgtv_1.jpg', 'lgtv_2.jpg'),
(18, 'ASUS ROG GL552VX', 'Asus', 'ASUS ROG GL552VX adalah laptop dengan layar 15.6&#34; dan resolusi 1920 x 1080pixels yang dilengkapi spesifikasi mumpuni. Laptop dengan berat 2.6kg ini ditenagai kartu grafis Nvidia GeForce GTX 950M dan didukung sistem operasi Windows 10', 6599000, 7200000, 'rog_1.jpg', 'rog_2.jpg', 'rog_3.jpg'),
(19, 'Xiaomi Redmi Note 10', 'Xiaomi', 'Xiaomi Redmi Note 10 merupakan smartphone dengan kapasitas 5000mAh dan layar 6.43&#34; yang dilengkapi dengan kamera belakang 48 + 8 + 2 + 2MP dengan tingkat densitas piksel sebesar 409ppi dan tampilan resolusi sebesar 1080 x 2400pixels. Dengan berat sebesar 178.8g, handphone HP ini memiliki prosesor Octa Core. ', 2145000, 2650000, 'redmi_1.jpg', 'redmi_2.jpg', 'redmi_3.jpg'),
(20, 'Jam Tangan AC9225LH', 'Alexandre Christie', 'Mengelola waktu dengan lebih baik akan membantumu beraktivitas lebih efektif dan produktif. Untuk itu, pilih jam tangan digital seperti Alexandre Christie AC9225LH dengan case dari Stainless Steel, PVD dan material tali dari Stainless Steel. Lengkap dengan berbagai fitur canggih, jam tangan digital ini sangat tepat untuk menunjang kegiatanmu sehari-hari.', 6125000, 6700000, 'alex_1.jpg', 'alex_2.jpg', 'alex_3.jpg'),
(21, 'Samsung Galaxy A12', 'Samsung', 'Samsung Galaxy A12 merupakan smartphone dengan kapasitas 5000mAh dan layar 6.5&#34; yang dilengkapi dengan kamera belakang 48 + 2 + 2MP dengan tingkat densitas piksel sebesar 264ppi dan tampilan resolusi sebesar 720 x 1600pixels. Dengan berat sebesar 205g, handphone HP ini memiliki prosesor Octa Core.', 1675000, 2000000, 'a12_1.jpg', 'a12_2.jpg', 'a12_3.jpg'),
(22, 'Sanyo AQR-D187', 'Sanyo', 'Urusan menyimpan bahan makanan di rumah jadi lebih mudah dengan Sanyo AQR-D187. Kulkas 1 pintu tipe Single Door ini dirancang dengan kapasitas 153l dan ukuran 48.6 x 55.4 x 126cm. ', 1315000, 1685000, 'sanyo_1.jpg', 'sanyo2.jpg', 'sanyo_3.jpg'),
(23, 'Sony Alpha A230', 'Sony', 'Sony Alpha A230. Kamera DSLR ini memiliki tipe sensor CCD dengan ukuran 23.5 x 15.7mm serta layar dengan ukuran 2.7&#34;. Video pada kamera ini beresolusi HD dengan minimum ISO 100 dan maksimal ISO 3200.', 1999000, 2350000, 'sony_1.jpg', 'sony_2.jpg', 'sony_3.jpg'),
(24, 'Samsung T4003 TV HD 32&#34;', 'Samsung', 'Ingin memiliki pengalaman menonton yang lebih menyenangkan? Pasang TV LED Samsung T4003 TV HD 32-inch di rumahmu! Dengan tipe layar HD yang disertai resolusi 1366 x 768pixels, kamu akan mendapatkan tampilan visual yang jernih dan tajam. TV ini juga sudah dilengkapi dengan 2 port HDMI dan 1 port USB', 1745000, 2095000, 'poly_1.jpg', 'poly_2.jpg', 'poly_3.jpg'),
(25, 'HP Notebook 14s-dk0073au', 'HP', 'HP Notebook 14s-dk0073au adalah laptop dengan layar 14&#34; dan resolusi 1366 x 768pixels yang dilengkapi spesifikasi mumpuni. Laptop dengan berat 1.47kg ini ditenagai kartu grafis AMD Radeon™ R3 Graphics dan didukung sistem operasi Windows 10 Home.', 4365000, 4825000, 'leno_1.jpg', 'leno_2.jpg', 'leno_3.jpg'),
(26, 'Eiger Tousside Biru', 'eiger', 'Mengelola waktu dengan lebih baik akan membantumu beraktivitas lebih efektif dan produktif. Untuk itu, pilih jam tangan digital seperti Eiger Jam Tangan Pria Tousside warna Biru dengan case dari Plastik dan material tali dari Silicone. Lengkap dengan berbagai fitur canggih, jam tangan digital ini sangat tepat untuk menunjang kegiatanmu sehari-hari.', 389000, 460000, 'eiger2_1.jpg', 'eiger2_2.jpg', 'eiger2_3.jpg'),
(27, 'Sharp SJ-195MD', 'Sharp', 'Sharp SJ-195MD Refrigerator merupakan kulkas 2 pintu dari Sharp yang kini hadir dengan desain terbaru dan pintu datar. Lemari es ini memiliki desain dengan pola garis yang indah dan akan memberikan nilai estetika yang tinggi di rumah Anda. Hadir dengan ukuran (WxHxD) 535x1275x550mm menjadikan lemari es Sharp seri ini dapat ditempatkan di ruang dapur yang tidak terlalu besar.', 2199000, 2460000, 'sharp_1.jpg', 'sharp_2.jpg', 'sharp_3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(4, '1', 'danu@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price_before` int(20) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price_before`, `price`, `image`) VALUES
(8, 1, 2, 'Canon EOS 3000D', 3000000, 2000000, 'camera-1.webp'),
(9, 1, 26, 'Eiger Tousside Biru', 460000, 389000, 'eiger2_1.jpg'),
(10, 1, 2, 'Canon EOS 3000D', 3000000, 2000000, 'camera-1.webp'),
(32, 2, 4, 'Lenovo IdeaPad Slim 3', 5250000, 4499999, 'laptop-1.webp');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
