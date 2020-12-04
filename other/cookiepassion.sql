-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 05:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookiepassion`
--

-- --------------------------------------------------------

--
-- Table structure for table `cookie`
--

CREATE TABLE `cookie` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(50) NOT NULL DEFAULT '0.00',
  `inventory` int(11) NOT NULL DEFAULT 0,
  `ingredients` text DEFAULT NULL,
  `imageLocation` varchar(100) NOT NULL,
  `del` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cookie`
--

INSERT INTO `cookie` (`id`, `name`, `description`, `price`, `inventory`, `ingredients`, `imageLocation`, `del`) VALUES
(1, 'Biscuit', 'Good', '1.61', 51, 'coco', 'images/cookies/biscuit.png', 1),
(2, 'Caramel Chocolate Pecan Cookie', NULL, '1.99', 0, NULL, 'images/cookies/CaramelChocolatePecanCookie.png', 1),
(3, 'Chocolate Chip / Peanut Butter', NULL, '1.59', 100, NULL, 'images/cookies/chocolate_chip_peanut_butter_cookie.png', 1),
(4, 'Chocolate Chip Cookie', 'Signature chocolate chip.', '1.50', 100, 'Chocolate', 'images/cookies/floating_chocolate_chip_cookies.png', 1),
(5, 'Chocolate Chocolate Chip', NULL, '1.80', 100, NULL, 'images/cookies/ChocolateChocolateChip.png', 1),
(6, 'Cookies N Cream', 'Made with Oreo.', '2.60', 100, 'Cream', 'images/cookies/CookiesNCream.png', 1),
(7, 'Iced Sugar Cookie', 'Normal sugar cookie.', '1.20', 100, NULL, 'images/cookies/IcedSugarCookie.png', 1),
(8, 'Jam Cookie', NULL, '2.10', 100, NULL, 'images/cookies/CaramelApple.png', 1),
(9, 'Jelly Cookie', NULL, '3.30', 100, NULL, 'images/cookies/Jelly.png', 1),
(10, 'Kisses Cookie', NULL, '5.50', 100, NULL, 'images/cookies/KissesCookie.png', 1),
(11, 'Matcha Green Tea', NULL, '2.50', 100, NULL, 'images/cookies/MatchaGreenTea.png', 1),
(12, 'Oatmeal Raisin', NULL, '1.79', 100, NULL, 'images/cookies/OatmealRaisin.png', 1),
(13, 'Red Velvet Cookie', NULL, '3.50', 100, NULL, 'images/cookies/RedVelvet.png', 1),
(14, 'Smores Cookie', NULL, '4.50', 100, NULL, 'images/cookies/Smores.png', 1),
(15, 'Sugar Cookie', NULL, '0.99', 100, NULL, 'images/cookies/SugarCookie.png', 1),
(18, 'New Cookie', 'none', '8.00', 15, 'coco', '', 0),
(19, 'cookiesadasd', '', '50.00', 20, '', '', 0),
(20, 'Test', 'test', '5.00', 100, 'idk', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `cookieID` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `del` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `orderId`, `cookieID`, `amount`, `del`) VALUES
(3, 1, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `privilege` varchar(50) NOT NULL DEFAULT 'user',
  `del` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `privilege`, `del`) VALUES
('admin', 'admin@admin.com', 'admin', 'admin', 1),
('tested', 'tested@gmail.com', '$2y$10$8zGKYUIW.cFuh30CMLOqfeXG6D5OQWolp15WTcOdXbesysdc5JMh6', 'user', 1),
('user', 'user@user.com', 'user', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

CREATE TABLE `userorder` (
  `username` varchar(50) NOT NULL,
  `orderId` int(11) NOT NULL,
  `total` varchar(50) NOT NULL DEFAULT '0.00',
  `orderTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `del` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`username`, `orderId`, `total`, `orderTime`, `del`) VALUES
('admin', 1, '1.50', '2020-11-05 15:10:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cookie`
--
ALTER TABLE `cookie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderIDFK` (`orderId`),
  ADD KEY `cookieIDFK` (`cookieID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `usernameFK` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cookie`
--
ALTER TABLE `cookie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `cookieIDFK` FOREIGN KEY (`cookieID`) REFERENCES `cookie` (`id`),
  ADD CONSTRAINT `orderIDFK` FOREIGN KEY (`orderId`) REFERENCES `userorder` (`orderId`);

--
-- Constraints for table `userorder`
--
ALTER TABLE `userorder`
  ADD CONSTRAINT `usernameFK` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
