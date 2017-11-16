-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 07 Σεπ 2016 στις 16:59:36
-- Έκδοση διακομιστή: 10.1.13-MariaDB
-- Έκδοση PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `store`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `value` int(50) NOT NULL,
  `dateoforder` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `cart`
--

INSERT INTO `cart` (`id`, `username`, `value`, `dateoforder`) VALUES
(1, '', 0, '2016-09-07 15:16:15'),
(2, 'chrisk', 0, '2016-09-07 15:17:06'),
(3, 'chrisk', 0, '2016-09-07 15:18:16'),
(4, 'chrisk', 0, '2016-09-07 15:18:21'),
(5, 'chrisk', 0, '2016-09-07 15:23:55');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `msg_name` varchar(40) NOT NULL,
  `msg_email` varchar(40) NOT NULL,
  `msg_text` text NOT NULL,
  `msg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `messages`
--

INSERT INTO `messages` (`id`, `msg_name`, `msg_email`, `msg_text`, `msg_date`) VALUES
(3, 'hELLO ', 'LALALA@new.gr', 'Hey you ', '2016-08-30'),
(4, 'hELLO ', 'LALALA@new.gr', 'Hey you ', '2016-08-30'),
(5, 'Christos', 'chris@yahoo.gr', 'Hello', '2016-09-01'),
(6, 'Christos', 'chris@yahoo.gr', 'Hello', '2016-09-01');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `product_code` varchar(10) DEFAULT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_img_name` varchar(100) NOT NULL,
  `product_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_price`, `product_img_name`, `product_desc`) VALUES
(1, 'MP001', 'Android Phone ', '100', 'android-phone.jpg', 'Mobile Phone '),
(2, 'ED001', 'External Hard Disk ', '150', 'external-hard-disk.jpg', 'External Hard Drive'),
(3, 'TV001', 'LCD TV', '450', 'lcd-tv.jpg', 'Widescreen Flat 24'''' LCD TV'),
(4, 'LP001', 'Laptop', '850', 'laptop.png', '2.7 GHZ Processor 8GB DDR3 RAM'),
(7, 'DC001', 'Digital Camera', '600', 'camera.jpg', '24 MP Sensor 24 - 700 Zoom Lens'),
(8, 'AP001', 'Apple Phone', '500', 'apple-phone.jpg', '5'''' Inch Screen 8 MP Camera  4G'),
(9, 'SW001', 'Smartwatch', '260', 'smartwatch.jpg', 'Bluetooth 4G Wi - Fi Connection'),
(10, 'HF001', 'Hi - Fi System', '470', 'hi-fi.jpg', 'Dolby Surround High - Quality Sound'),
(11, 'HC001', 'Home Cinema', '1890', 'home-cinema.jpg', 'High - quality Picture & Sound'),
(12, 'VR001', 'VR Glasses', '950', 'vr-glasses.jpg', 'Virtual Reality in your hands');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `creditcard` varchar(60) NOT NULL,
  `date_registered` datetime(6) NOT NULL,
  `access` int(2) NOT NULL,
  `deleted` int(1) NOT NULL,
  `pass_changed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `password`, `email`, `creditcard`, `date_registered`, `access`, `deleted`, `pass_changed`) VALUES
(6, 'aaaaaaaaa', 'aaaaaaaaaaa', 'a8c7439686', 'aa@y.gr', '76d36e98f312e98ff908c8c82c8dd623', '2016-09-07 11:54:48.000000', 0, 0, '2016-09-07'),
(3, 'chris', 'Chris Kat', 'pass', 'chris@yahoo.gr', ' e0323a9039add2978bf5b49550572c7c', '2016-09-02 07:34:19.723465', 2, 0, '0000-00-00'),
(5, 'chrisk', 'User', '5f4dcc3b5a', 'chris@yahoo.gr', 'e0323a9039add2978bf5b49550572c7c', '2016-09-04 20:03:31.000000', 2, 0, '2016-09-04'),
(1, 'heyou', 'Yolo', 'c0cce3961a', 'heyyou@yahoo.gr', '', '2016-08-30 19:39:21.000000', 0, 0, '0000-00-00'),
(4, 'user1', 'User', '5f4dcc3b5a', 'user@user.gr', '', '2016-09-04 20:01:53.000000', 0, 0, '0000-00-00');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `int` (`id`);

--
-- Ευρετήρια για πίνακα `messages`
--
ALTER TABLE `messages`
  ADD UNIQUE KEY `id` (`id`);

--
-- Ευρετήρια για πίνακα `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT για πίνακα `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT για πίνακα `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
