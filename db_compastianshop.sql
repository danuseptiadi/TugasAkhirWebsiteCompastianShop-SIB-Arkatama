-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2022 pada 09.07
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
-- Database: `db_compastian_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(15) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_gender` varchar(30) NOT NULL,
  `admin_birth` date NOT NULL,
  `admin_number` varchar(15) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_status` enum('active','nonactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_gender`, `admin_birth`, `admin_number`, `admin_email`, `admin_image`, `admin_status`) VALUES
('ADM1000000000', 'Malabi', 'male', '2022-12-01', '0896128144252', 'number', 'ADM1000000000.jpg', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` varchar(15) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `customer_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `customer_id`) VALUES
('cart10000000000', 'PDT10000000000', 'ADM10000000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(15) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_gender` varchar(30) NOT NULL,
  `customer_birth` date NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_number` varchar(15) NOT NULL,
  `customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_gender`, `customer_birth`, `customer_email`, `customer_number`, `customer_image`) VALUES
('CTR1000000000', 'Malabi', 'male', '2022-12-01', 'number', '0896128144252', 'CTR1000000000.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hero`
--

CREATE TABLE `hero` (
  `hero_id` varchar(15) NOT NULL,
  `hero_title` varchar(30) NOT NULL,
  `hero_image` text NOT NULL,
  `hero_status` varchar(30) NOT NULL,
  `last_submit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hero`
--

INSERT INTO `hero` (`hero_id`, `hero_title`, `hero_image`, `hero_status`, `last_submit`) VALUES
('hero10000000000', 'Account Telegram', 'hero10000000000.jpg', 'disetujui', 'ADM1000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `login_id` varchar(15) NOT NULL,
  `login_username` varchar(30) NOT NULL,
  `login_password` varchar(30) NOT NULL,
  `user_role` varchar(30) NOT NULL,
  `user_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `user_role`, `user_id`) VALUES
('LGN1000000000', 'admin', 'admin123', 'admin2', 'ADM1000000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `owner`
--

CREATE TABLE `owner` (
  `owner_id` varchar(15) NOT NULL,
  `owner_name` varchar(30) NOT NULL,
  `owner_gender` varchar(30) NOT NULL,
  `owner_birth` date NOT NULL,
  `owner_email` varchar(50) NOT NULL,
  `owner_number` varchar(15) NOT NULL,
  `owner_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `owner`
--

INSERT INTO `owner` (`owner_id`, `owner_name`, `owner_gender`, `owner_birth`, `owner_email`, `owner_number`, `owner_image`) VALUES
('OWN1000000000', 'Malabi', 'male', '2022-12-01', 'number', '0896128144252', 'OWN1000000000.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` varchar(15) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_description` text NOT NULL,
  `product_varian` varchar(30) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_category` varchar(30) NOT NULL,
  `product_image` text NOT NULL,
  `last_submit` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_varian`, `product_price`, `product_stock`, `product_category`, `product_image`, `last_submit`) VALUES
('PDK10000000000', 'Account Telegram', 'Product bagus', 'account', 1000, 10, 'Acount', 'PDT10000000000.jpg', 'ADM10000000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` varchar(15) NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `product_id` text NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `transaction_process` varchar(30) NOT NULL,
  `testimoni` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `customer_id`, `product_id`, `total_price`, `payment_status`, `transaction_process`, `testimoni`) VALUES
('TRX1000000000', 'CTR1000000000', 'PDT1000000000', 2000, 'sudah di bayar', 'selesai', 'baguss');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
