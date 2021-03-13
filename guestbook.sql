-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2021 at 02:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `title`, `content`, `name`, `email`) VALUES
(1, 'test message', 'content messages', 'username', 'email@gmail.com'),
(2, 'title', 'content', 'name', 'email'),
(4, 'test message1', 'content messages1', 'username1', 'email1@gmail.com'),
(5, 'Lorem ipsum dolor sit amet, ex blandit luptatum eos', 'Lorem ipsum dolor sit amet, ex blandit luptatum eos, duo nobis nonumes mediocritatem cu. Ut summo eligendi nec, vitae prompta theophrastus ad has. Recteque cotidieque duo ex. Mel at sale essent, euripidis evertitur argumentum his ex. Et vidit percipit mel. Meliore assentior ne eos, usu stet tincidunt adversarium id, et prima porro nam. Harum apeirian eu mel, eos etiam saperet docendi cu.', 'Moemen', 'Moemengaballa@gmail.com'),
(6, 'bla bla title', 'content title bla bla', 'MoemenBLa', ''),
(7, 'dwdaw', 'dwwadwadwadw', 'wadwwd', 'wdwdwwadwadwad');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `price` float NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `available`, `user_id`) VALUES
(1, 'update 02 product', 'description for product update 02', 'b1641e18f4c0bdab6a273505034be09e76f617e53b0ff71b35d1c581707903ca.jpg', 50, 1, 1),
(2, 'title for product55', 'description for product55', '32de286940ec9c33b062876f8060243e168593.jpg', 55, 0, 1),
(3, 'title for product3', 'description for product3', 'e973223a7318cad349bbabfede9e6f38٢٠٢٠٠٣١١_١٢٠٠٢٢.jpg', 100, 1, 1),
(5, 'test add product title', 'test add product description', '', 100, 1, 1),
(6, 'title test upload image', 'dest test upload image', '', 125, 1, 1),
(10, 'Product Title Here...', 'Lorem ipsum dolor sit amet, quo denique hendrerit cu, cu prima conclusionemque sed, reque affert nec ea.\r\n\r\n', 'abstract-q-c-380-200-5.jpg', 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'moemen', '123456', 'moemengaballa@gmail.com'),
(6, 'Ahemed', '123456', 'test@gmail.com'),
(7, 'Amira', '12345', 'amira@gmail.com'),
(10, 'moemenE', '1234568', 'moemenE@gmail.com'),
(12, 'Ahemed123', '123456', 'test223@gmail.com'),
(13, 'mera', '12345', 'mera@gmail.com'),
(14, 'nullTest123', 'nulltest', 'nullTest123@gmail.com'),
(18, 'usernaEme123', 'SAWWDAW', 'use123rE@gmail.com'),
(19, 'bla', '5454', 'bla@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relation_user_products` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `relation_user_products` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
