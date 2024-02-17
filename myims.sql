-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 10:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myims`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Electronics'),
(2, 'Raw Materials'),
(3, 'Pharmaceuticals'),
(4, 'Computing'),
(5, 'Home Kitchen'),
(6, 'Clothes'),
(9, 'Groceries'),
(10, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `address`, `phonenumber`) VALUES
(1, 'Suman', 'Kc', 'Lagankhel', '9876564312'),
(2, 'Suraj', 'Kc', 'Sankhadevi', '9880921212'),
(7, 'Dhiraj', 'Neupane', 'Sinamangal', '9866779809'),
(8, 'Niraj', 'Shrestha', 'Tinkune', '9876679989'),
(9, 'Aman', 'Kc', 'Lubhu', '9842429860');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `categorieid` bigint(20) UNSIGNED NOT NULL,
  `supplierid` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `price`, `totalprice`, `categorieid`, `supplierid`, `date`, `updated_at`) VALUES
(13, 'Samsung SSD 1TB', '8', '3500', '52500', 4, 5, '2023-09-06', '2023-09-06 04:49:23'),
(14, 'Netis Router', '15', '1200', '24000', 1, 4, '2023-09-06', '2023-09-06 00:46:39'),
(15, 'Samsung Galaxy M22', '10', '20000', '200000', 4, 6, '2022-03-31', '2023-09-06 04:52:09'),
(16, 'Router', '8', '1200', '12000', 1, 5, '2023-09-07', '2023-09-06 21:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `sellingprice` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `customer_id`, `user_id`, `quantity`, `sellingprice`, `discount`, `total`, `date`) VALUES
(11, 13, 1, 1, '5', '4500', '500', '22000', '2023-09-06'),
(12, 15, 8, 1, '5', '25000', '0', '125000', '2023-09-06'),
(13, 14, 1, 2, '5', '1800', '0', '9000', '2023-09-05'),
(14, 13, 9, 1, '2', '4000', '500', '7500', '2023-09-06'),
(15, 16, 1, 1, '2', '1500', '0', '3000', '2023-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) NOT NULL,
  `contactperson` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company`, `contactperson`, `contactnumber`, `address`) VALUES
(1, 'Laxmi Groups Ltd', 'Raju Kc', '9876565434', 'Lalitpur'),
(3, 'SagarmathaElectronic', 'Sagar', '9849723636', 'Thapathali'),
(4, 'Suman Hardware Pvt Ltd', 'Suman Khadka', '9878009099', 'Tinkune'),
(5, 'Newroad Hardware Pvt Ltd', 'Naresh Thapa', '9876556687', 'Newroad'),
(6, 'Krishna Enterprises', 'Krishna Karki', '9877667690', 'Minbhawan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(25) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dipen', 'dipen@gmail.com', 1, NULL, '$2y$10$BIP.NqVdHePJ1swNOd/AseSOxR.4vLWx6j6mx6b2lNKBtYaVDzSA6', NULL, '2023-08-07 08:15:03', '2023-08-07 08:15:03'),
(2, 'Ram', 'ram@gmail.com', 0, NULL, '$2y$10$zxsw6MaHkmz92lkmBwrlReKYV9wRnGqwGYjt/8qPQWoj94GGN9QU.', 'Vt9yAvMdxYRTQ8hVDG8zJHJ2SRTVbtL21kc7qCsNf2mpf3hQ7jQWXvBMcE1P', NULL, NULL),
(4, 'Giban', 'giban@gmail.com', 0, NULL, '$2y$10$jjwbpsHenC3GRsYV0wgPue0rHcuMerwg20cXds3PbpP7Ii5UaZU5C', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplierid` (`supplierid`),
  ADD KEY `categorieid` (`categorieid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categorieid` FOREIGN KEY (`categorieid`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `supplierid` FOREIGN KEY (`supplierid`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
