-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 07, 2020 at 02:11 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `description` text,
  `price` varchar(50) NOT NULL DEFAULT '0.00',
  `inventory` int(11) NOT NULL DEFAULT '0',
  `ingredients` text,
  `imageLocation` varchar(100) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cookie`
--

INSERT INTO `cookie` (`id`, `name`, `description`, `price`, `inventory`, `ingredients`, `imageLocation`, `del`) VALUES
(2, 'Caramel Chocolate Pecan Cookie', 'A cookie with caramel bits and chopped pecans for a decadent, chewy delight!', '1.99', 0, 'Caramel, Pecan', 'images/cookies/CaramelChocolatePecanCookie.png', 1),
(3, 'Chocolate Chip / Peanut Butter', 'Big, thick, chewy, and soft cookie loaded with peanut butter and chocolate flavor.', '1.59', 100, 'Chocolate, Peanut Butter.', 'images/cookies/chocolate_chip_peanut_butter_cookie.png', 1),
(4, 'Chocolate Chip Cookie', 'Signature chocolate chip.', '1.50', 100, 'Chocolate', 'images/cookies/floating_chocolate_chip_cookies.png', 1),
(5, 'Chocolate Chocolate Chip', 'Double the  chocolate, double the flavor.', '1.80', 100, 'Chocolate', 'images/cookies/ChocolateChocolateChip.png', 1),
(6, 'Cookies N Cream', 'Classic Oreo with the best cookie.', '2.60', 99, 'Cream, Oreo', 'images/cookies/CookiesNCream.png', 1),
(7, 'Iced Sugar Cookie', 'Simple, but the best in the world. Plus with more sugary goodness. ', '1.20', 100, 'Sprinkles, Icing', 'images/cookies/IcedSugarCookie.png', 1),
(8, 'Jam Cookie', 'Where apple jam meets cookie.', '2.10', 99, 'Apple Jam ', 'images/cookies/CaramelApple.png', 1),
(9, 'Jelly Cookie', 'Where jelly meets with cookie.', '3.30', 100, 'Jelly', 'images/cookies/Jelly.png', 1),
(10, 'Kisses Cookie', 'The best chocolate meet with the best cookie.', '5.50', 98, 'Kisses', 'images/cookies/KissesCookie.png', 1),
(11, 'Matcha Green Tea', 'Our new take on a traditional cookie. Infused with tea flavor.', '2.50', 100, 'Matcha', 'images/cookies/MatchaGreenTea.png', 1),
(12, 'Oatmeal Raisin', 'For people looking for a healthier option.', '1.79', 100, 'Oatmeal, Raisin', 'images/cookies/OatmealRaisin.png', 1),
(13, 'Red Velvet Cookie', 'When a traditional cake flavor combine with the best cookie.', '3.50', 100, 'Red Velvet', 'images/cookies/RedVelvet.png', 1),
(14, 'S\'mores Cookie', 'Bringing camping and cookie together.', '4.50', 100, 'Marshmallows', 'images/cookies/Smores.png', 1),
(15, 'Sugar Cookie', 'Simple, but the best in the world.', '0.99', 100, 'Sugar', 'images/cookies/SugarCookie.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `cookieID` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `del` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `orderId`, `cookieID`, `amount`, `del`) VALUES
(27, 27, 10, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `privilege` varchar(50) NOT NULL DEFAULT 'user',
  `del` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `privilege`, `del`) VALUES
('admin', 'admin@admin.com', 'admin', 'admin', 1),
('user', 'user@user.com', 'user', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

CREATE TABLE `userorder` (
  `username` varchar(50) NOT NULL,
  `orderId` int(11) NOT NULL,
  `total` varchar(50) NOT NULL DEFAULT '0.00',
  `orderTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `del` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`username`, `orderId`, `total`, `orderTime`, `del`) VALUES
('user', 27, '11', '2020-12-06 22:45:40', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
