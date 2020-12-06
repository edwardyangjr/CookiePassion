-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 11:46 PM
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
(1, 'Biscuit', 'Good', '1.61', 0, 'coco', 'images/cookies/cookieNewUpload.png', 1),
(2, 'Caramel Chocolate Pecan Cookie', 'A cookie with caramel bits and chopped pecans for a decadent, chewy delight!', '1.99', 0, 'Caramel, Pecan', 'images/cookies/CaramelChocolatePecanCookie.png', 1),
(3, 'Chocolate Chip / Peanut Butter', 'Big, thick, chewy, and soft cookie loaded with peanut butter and chocolate flavor.', '1.59', 100, 'Chocolate, Peanut Butter.', 'images/cookies/chocolate_chip_peanut_butter_cookie.png', 1),
(4, 'Chocolate Chip Cookie', 'Signature chocolate chip.', '1.50', 100, 'Chocolate', 'images/cookies/floating_chocolate_chip_cookies.png', 1),
(5, 'Chocolate Chocolate Chip', 'Double the  chocolate, double the flavor.', '1.80', 100, 'Chocolate', 'images/cookies/ChocolateChocolateChip.png', 1),
(6, 'Cookies N Cream', 'Classic Oreo with the best cookie.', '2.60', 99, 'Cream, Oreo', 'images/cookies/CookiesNCream.png', 1),
(7, 'Iced Sugar Cookie', 'Simple, but the best in the world.', '1.20', 100, 'Sprinkles, Icing', 'images/cookies/IcedSugarCookie.png', 1),
(8, 'Jam Cookie', 'Where apple jam meets cookie.', '2.10', 99, 'Apple Jam ', 'images/cookies/CaramelApple.png', 1),
(9, 'Jelly Cookie', 'Where jelly meets with cookie.', '3.30', 100, 'Jelly', 'images/cookies/Jelly.png', 1),
(10, 'Kisses Cookie', 'The best chocolate meet with the best cookie.', '5.50', 98, 'Kisses', 'images/cookies/KissesCookie.png', 1),
(11, 'Matcha Green Tea', 'Our new take on a traditional cookie. Infused with tea flavor.', '2.50', 100, 'Matcha', 'images/cookies/MatchaGreenTea.png', 1),
(12, 'Oatmeal Raisin', 'For people looking for a healthier option.', '1.79', 100, 'Oatmeal, Raisin', 'images/cookies/OatmealRaisin.png', 1),
(13, 'Red Velvet Cookie', 'When a traditional cake flavor combine with the best cookie.', '3.50', 100, 'Red Velvet', 'images/cookies/RedVelvet.png', 1),
(14, 'Smores Cookie', 'Bringing camping and cookie together.', '4.50', 100, 'marshmallows', 'images/cookies/Smores.png', 1),
(15, 'Sugar Cookie', 'Simple, but the best in the world.', '0.99', 100, 'Sugar', 'images/cookies/SugarCookie.png', 1),
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
(9, 16, 1, 1, 1),
(10, 16, 4, 5, 1),
(11, 16, 6, 1, 1),
(12, 17, 11, 5, 1),
(13, 17, 12, 1, 1),
(14, 17, 13, 5, 1),
(15, 17, 15, 1, 1),
(16, 18, 3, 1, 1),
(17, 18, 4, 1, 1),
(18, 19, 2, 1, 1),
(19, 21, 1, 1, 1),
(20, 21, 3, 1, 1),
(21, 21, 5, 1, 1),
(22, 22, 1, 1, 1),
(23, 23, 1, 6, 1),
(24, 24, 6, 1, 1),
(25, 25, 1, 44, 1),
(26, 26, 8, 1, 1),
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
  `del` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `privilege`, `del`) VALUES
('admin', 'admin@admin.com', 'admin', 'admin', 1),
('test1234', 'sadaasd@das.com', '$2y$10$1paCT7El/JVBVgKHMrg4reP12QeDJ1/xqC/CBWqWswaUETl2EDVVq', 'user', 1),
('tested', 'tested@gmail.com', '$2y$10$8zGKYUIW.cFuh30CMLOqfeXG6D5OQWolp15WTcOdXbesysdc5JMh6', 'user', 1),
('testNew', 'edfasd@das.com', '$2y$10$2W4ZbvfF33k5NxIeiAvUluHa3JQAWSc.vYDthelgjzTI5hBLm37ZS', 'user', 1),
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
('admin', 16, '11.71', '2020-12-05 03:05:04', 1),
('admin', 17, '32.78', '2020-12-05 04:44:19', 1),
('admin', 18, '3.09', '2020-12-05 05:14:10', 1),
('admin', 19, '1.99', '2020-12-05 22:19:45', 1),
('admin', 20, '0', '2020-12-05 22:25:26', 1),
('admin', 21, '5', '2020-12-06 03:49:18', 1),
('admin', 22, '1.61', '2020-12-06 10:08:09', 1),
('admin', 23, '9.66', '2020-12-06 10:09:01', 1),
('admin', 24, '2.6', '2020-12-06 10:33:25', 1),
('admin', 25, '70.84', '2020-12-06 10:40:38', 1),
('admin', 26, '2.1', '2020-12-06 22:44:47', 1),
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
