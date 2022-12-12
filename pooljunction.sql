-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 08:54 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pooljunction`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(90) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(17, 'Anas Abu Shanab', 'anasakko@hotmail.co.il', 'asdasdsa', '2022-12-01 12:34:02'),
(18, 'anas abu shanab', 'anasakko@hotmail.co.il', 'Anasakko@hotmail.co.il', '2022-12-01 14:04:06'),
(19, 'Anas Abu Shanab', 'anastesting@gmail.com', 'anastesting@gmail.com', '2022-12-06 18:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `img`) VALUES
(23, '7ee040298f6114f13f5158e482e1c275.png'),
(27, 'dc60e0b94afaec7d31478cc58272ab48.png');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'anasakko@hotmail.co.il'),
(2, 'anasakko@hsotmail.co.il');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(9) NOT NULL,
  `price` mediumint(11) NOT NULL,
  `sold` mediumint(9) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `price`, `sold`, `quantity`, `img`, `created_at`, `updated_at`) VALUES
(8, 'Hello World', 'This is some description', 1, 51420, 200, 0, '7ee040298f6114f13f5158e482e1c275.png', '2022-12-11 02:49:40', '2022-12-11 02:49:40'),
(9, 'Karim', 'Ali', 1, 5000, 2410, 200, '2d3b7a58b74903cef5071957ae364168.png', '2022-12-11 02:53:06', '2022-12-12 16:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

CREATE TABLE `products_category` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='updated_at';

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'motors', 'Motors Category', '2022-12-01 12:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(18) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `role` varchar(35) NOT NULL DEFAULT 'customer',
  `email` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `role`, `email`, `password`) VALUES
(1, 'Anas', 'Abu Shanab', '0534505181', 'customer', 'anasakko@hotmail.co.il', '$2y$10$qylkQjFAwtCoLYnrG4hCT.pmJ9aJo0CRn/Du8L0dT/P6o0Bsa3ouu'),
(2, 'Anas', 'Abu Shanab', '0534505181', 'customer', 'tmureckless@hotmail.co.il', '$2y$10$C089cJ/c3o9G2Siq0UJzMuY1Vytx3/8n9089QpqS1sejfLpXz2lES'),
(3, 'אנאס', 'אבו שנב', '0534505181', 'customer', 'tmurecklesss@gmail.com', '$2y$10$saMPj6f.GfYS5jqQJGcW3.hpvBuMQ0AU7vf9UMA06CEmB3yyojvvO'),
(4, 'Anas', 'Abu Shanab', '0534505181', 'customer', 'tmurecklessss@gmail.com', '$2y$10$iJs5Uqh2gQ9A1.1RiWsZrei3MRqLGMrSJiA0zQMZV9ocv6tOchW.q'),
(5, 'Bashar', 'Shaabi', '053-450-51', 'customer', 'bashar@gmail.com', '$2y$10$jFYvz5SU.WYrAOvrUjYOeOphnm99HcoMuPTsJKo853MGs0oTQfOaS'),
(6, 'Anas', 'Abu SHanab', '0534505181', 'customer', 'ans@gmail.com', '$2y$10$u7CSYcHs9XB74hpemTGJoOsrtMjdo5pSjGUJ4iGH1qpypTo0iswBi'),
(7, 'Anas', 'Abu shanab', '0534505181', 'customer', 'anasakko@hotmail.co.ils', '$2y$10$26/.u1aOLf7QXPZ.cZsWD.pAu18.StSmpFx47B4JlicVh7usAMGZ6'),
(8, 'anas', 'test', '0534505181', 'customer', 'anastest2@gmail.comc', '$2y$10$tu4i6J5AzvM/p6Ux.Tsshu6V5iMgG6zYYZ4NN3Es/jkU.dDTm7lGS'),
(9, 'anas', 'abu shanab', '0534505181', 'customer', 'anastesting@gmail.com', '$2y$10$/nub47a.S7ZKCJso2FLhTeljyh2hVS37q730tex0il7DHZhdWg3D2'),
(10, 'tmu', 'reckless', '0534505181', 'customer', 'tmureckless@gmail.com', '$2y$10$dQ1yEBzi24bRcWf/zkuJie3lq1rH1P8r1lbnm76AcWff2rjAIBKFS');

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

CREATE TABLE `users_address` (
  `Idi` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `additional_information` varchar(100) NOT NULL,
  `zip_code` varchar(32) NOT NULL,
  `city` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`Idi`, `user_id`, `street`, `additional_information`, `zip_code`, `city`) VALUES
(1, 1, 'akko p.o box 1186', '', '2471000', 'Akko'),
(2, 2, 'akko p.o box 1186', '', '2471000', 'akko'),
(3, 3, 'פי או בוכס 1186', '', '247000', 'עכו'),
(4, 4, 'akko p.o box 1186', 'Some additonal', '2471000', 'akko'),
(5, 5, 'a', 'a', '2471000', 'a'),
(6, 6, 'anasakko@hotmail.co.il', 'anasakko@hotmail.co.il', '234100', 'anasakko@hotmail.co.il'),
(7, 7, 'Akko 1186', '', '2471000', 'Akko'),
(8, 8, 'anastest2@gmail.comc', '', '241000', 'akko'),
(9, 9, 'anastesting@gmail.com', '', '2471000', 'akko'),
(10, 10, 'tmureckless@gmail.com', '', '247000', 'akko');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_ibfk_1` (`user_id`),
  ADD KEY `cart_ibfk_2` (`product_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_ibfk_1` (`category_id`);

--
-- Indexes for table `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`Idi`),
  ADD KEY `User_Id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products_category`
--
ALTER TABLE `products_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_address`
--
ALTER TABLE `users_address`
  MODIFY `Idi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `products_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_address`
--
ALTER TABLE `users_address`
  ADD CONSTRAINT `users_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
