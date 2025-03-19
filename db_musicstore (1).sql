-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2021 at 06:45 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_musicstore`
--
CREATE DATABASE IF NOT EXISTS `db_musicstore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_musicstore`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `Customer_id` int(5) NOT NULL,
  `Customer_name` varchar(30) NOT NULL,
  `Customer_email` varchar(30) NOT NULL,
  `Customer_phone` varchar(30) NOT NULL,
  `Customer_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_id`, `Customer_name`, `Customer_email`, `Customer_phone`, `Customer_birth`) VALUES
(1, 'Prayud ChanoChud', 'Pra112@gmailcom', '1111111111', '1974-03-04'),
(2, 'Prawud ChanoChit', 'thetoytoytoytoy@gmail.com', '11222334455', '1995-12-01'),
(3, 'NhuiNhui Harais', 'ShutBody@gmail.com', '1234567890', '1977-07-05'),
(4, 'Alfredd Scggwew', 'YodBody@gmail.com', '5341787940', '1977-12-21'),
(5, 'Haroiii Eiei', 'ITUrboy@gmail.com', '789564612313', '1992-08-20'),
(6, 'ธนกฤต จันทร์โสภา', 'ghost.lawless17@gmail.com', '0910700392', '1999-12-27'),
(7, 'Alex', 'Alex@gmail.com', '06688794', '1997-09-21'),
(8, 'David', 'David@gmail.com', '0894145756', '1989-05-06'),
(9, 'Susan', 'Susan@haha.com', '0784475523', '1999-05-01'),
(10, 'Suzy', 'Suzy@lol.com', '0658974458', '2000-04-25'),
(11, 'golf', 'katv@gg.com', '481515523', '2001-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `Employee_id` int(5) NOT NULL,
  `Employee_firstname` varchar(30) NOT NULL,
  `Employee_lastname` varchar(30) NOT NULL,
  `Employee_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Employee_id`, `Employee_firstname`, `Employee_lastname`, `Employee_birth`) VALUES
(1, 'นายก', 'น๊ะจ๊ะ', '1945-12-05'),
(2, 'นายข', 'ขายดี', '1986-06-07'),
(3, 'นายค', 'ลาซาด้า', '1990-12-05'),
(4, 'นายง', 'ซ็อปปี้', '1995-07-13'),
(5, 'นายจ', 'เฟซบุ๊ค', '1991-07-20'),
(6, 'นายฉ', 'อะไรนะ', '1992-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `Order_id` int(5) NOT NULL,
  `Customer_id` varchar(30) NOT NULL,
  `Product_id` varchar(30) NOT NULL,
  `Employee_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `Customer_id`, `Product_id`, `Employee_id`) VALUES
(1, '3', '11', '1'),
(2, '5', '5', '4'),
(3, '1', '9', '3'),
(4, '2', '10', '2'),
(5, '4', '15', '4'),
(6, '6', '13', '4'),
(7, '7', '3', '1'),
(8, '8', '6', '3'),
(9, '9', '14', '1'),
(10, '10', '1', '2'),
(11, '5', '13', '5'),
(12, '10', '8', '3');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `Product_id` int(5) NOT NULL,
  `Product_name` varchar(30) NOT NULL,
  `Type_id` varchar(30) NOT NULL,
  `Product_price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Product_name`, `Type_id`, `Product_price`) VALUES
(1, 'Music Man jp6', '1', '85,500'),
(2, 'Fender Chris Shiflett Telecast', '1', '26,100 '),
(3, 'Fender Jimi Hendrix Stratocast', '1', '35,100'),
(4, 'Fender Jim Root Jazzmaster', '1', '54,000'),
(5, 'Fender Eric Clapton Stratocast', '1', '62,100'),
(6, 'FENDER MADE IN JAPAN AERODYNE ', '2', '34,200'),
(7, 'FENDER MADE IN JAPAN TRADITION', '2', '32,400'),
(8, 'FENDER PLAYER JAZZ BASS V', '2', '28,800'),
(9, 'FENDER PLAYER JAZZ BASS FRETLE', '2', '24,300'),
(10, 'JACKSON JS SERIES SPECTRA BASS', '2', '13,950'),
(11, 'Mapex Prodigy', '3', '12,900'),
(12, 'Ludwig Element Drive', '3', '20,800'),
(13, 'TAMA Rhythm mate', '3', '31,500'),
(14, 'Ludwig Signet 105 ( made in US', '3', '36,000'),
(15, 'Ludwig Accent Junior Set LJR10', '3', '9,600'),
(16, 'Ibanez G2', '1', '23,423');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

DROP TABLE IF EXISTS `producttype`;
CREATE TABLE `producttype` (
  `Type_id` int(5) NOT NULL,
  `Type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`Type_id`, `Type_name`) VALUES
(1, 'กีต้า'),
(2, 'เบส'),
(3, 'กลอง');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `username` char(50) NOT NULL,
  `userpassword` char(200) NOT NULL,
  `userlevel` int(11) NOT NULL COMMENT '1=admin,0=user',
  `userstatus` int(11) NOT NULL COMMENT '1=active,0=non active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `surname`, `username`, `userpassword`, `userlevel`, `userstatus`) VALUES
(1, 'ธนกฤต', 'จันทร์โสภา', 'ghost.lawless17@gmail.com', '$2y$10$86CPfYM.HJxN3oIfW.F4AuvHgW6J.tRC3oT/7eeWgO940mUl0xo3.', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`Type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `Type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
