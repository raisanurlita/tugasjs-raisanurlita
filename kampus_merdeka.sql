-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 08:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampus_merdeka`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `channel` enum('OVO','GOPAY','DANA','VA BCA') NOT NULL,
  `service_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `order_id`, `channel`, `service_fee`) VALUES
(1, 1, 'OVO', '1000.00'),
(2, 2, 'GOPAY', '0.00'),
(3, 3, 'DANA', '0.00'),
(4, 4, 'VA BCA', '1500.00'),
(5, 5, 'VA BCA', '1500.00'),
(6, 6, 'VA BCA', '1500.00'),
(7, 7, 'OVO', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `created_at`) VALUES
(1, 'Gracio ', 'Pamungkas ', 'graciopamungkas@eduwork.com', '089687476161', 'JL. RE Martadinata Kav III No 322A Desa Ancaran', '2023-11-06 01:42:57'),
(2, 'Muhammad', 'Ridwan', 'ridwan@eduwork.com', '089687476262', 'Jl Margorejo Indah Bl B/107', '2023-03-31 11:58:55'),
(3, 'Raisa', 'Nurlita ', 'raisa@eduwork.com', '08587889098', 'Jl mangga No 4 Blok D ', '2023-11-06 01:44:24'),
(4, 'Atika', 'Citra', 'atika@eduwork.com', '089687476464', 'JL Perak Barat No. 22560165', '2023-03-31 11:58:55'),
(5, 'Andre', 'Juan', 'andre@eduwork.com', '08123111222', 'JL RE Martadhinata no 3', '2023-04-05 14:38:34'),
(6, 'Ajeng', 'Kartini', 'kartini@gmail.com', '0892827312', 'JL. Boyolali no 39', '2023-05-10 12:46:04'),
(7, 'Haura', 'Jasmine', 'haurajasmine@azzamine.com', '08968747616', 'Jl.Kayu manis no 58 Blok A', '2023-11-06 01:42:14'),
(8, 'Reisya', 'Greisyia', 'reinz@gmail.com', '0820989876567', 'JL. Rainy No 8', '2023-11-07 20:22:49'),
(9, 'Siswo', 'Handoko ', 'handoko@sinbad.co.id', '089687476161', 'Jl. Jeruk Purut no 22, Jakarta Selatan', '2023-05-10 12:52:28'),
(10, 'Sukoco', 'Sundari', 'sukoco@gmail.com', '08212566778', 'Jl.Kenanga no.9', '2023-11-07 20:19:15'),
(11, 'Hazel', 'Pryanka', 'hazelnut@gmail.com', '08655567890', 'JL. Mentari No.11', '2023-11-07 20:20:06'),
(12, 'Daisya', 'Diandra', 'daisyyy@gmail.com', '0823456789', 'JL.bunga Daisy', '2023-11-07 20:21:23'),
(13, 'Gionatan', 'Angkasa', 'angkasaa@gmail.com', '083255568778', 'JL. Angkasa cloudy', '2023-11-08 00:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` enum('pending','processing','shipped','delivered') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `order_date`, `status`) VALUES
(1, 1, '2023-03-27 19:06:33', 'processing'),
(2, 1, '2023-03-30 19:06:33', 'delivered'),
(3, 2, '2023-03-31 19:06:33', 'shipped'),
(4, 3, '2023-03-22 19:06:33', 'processing'),
(5, 4, '2023-03-12 19:06:33', 'pending'),
(6, 4, '2023-03-31 19:06:33', 'shipped');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `qty`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 1),
(3, 2, 3, 1),
(4, 3, 4, 2),
(5, 4, 2, 1),
(6, 4, 1, 2),
(7, 5, 1, 3),
(8, 6, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1, 'Permen Yupi', '1000.00'),
(2, 'Susu SGM', '50000.00'),
(3, 'Sepatu Nike', '300000.00'),
(4, 'Jaket Puma', '250000.00'),
(5, 'Tas LV', '1000000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_customer` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_order` (`order_id`),
  ADD KEY `fk_id_product` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `fk_id_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `fk_id_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
