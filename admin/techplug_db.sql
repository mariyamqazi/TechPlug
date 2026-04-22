-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2026 at 08:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techplug_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'admin123@gmail.com', 'admin00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `textbox` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `address`, `phone`, `textbox`) VALUES
(1, 'mariyamqazi', 'marry@gmail.com', 'hyderabad', 902909029, 'Great Products!!'),
(2, 'mariyamqazi', 'marry@gmail.com', 'hyderabad', 902909029, 'good products'),
(3, 'john', 'johnkhan@gmail.com', 'H # R-1696 Near Masjid Alfalah fb area Naseerabad Karachi', 0, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_web`
--

CREATE TABLE `mobile_web` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobile_web`
--

INSERT INTO `mobile_web` (`id`, `username`, `email`, `password`, `dt`) VALUES
(1, 'zainabqazi2', 'zainab@gmail.com', 'abcd', '2026-04-14 22:28:35'),
(2, 'zainabqazi2', 'zainab@gmail.com', 'abcd', '2026-04-14 22:29:20'),
(3, 'zainabqazi2', 'zainab@gmail.com', 'abcd', '2026-04-14 22:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_email`, `product_id`, `product_name`, `product_price`, `product_quantity`, `product_desc`, `order_date`, `status`, `img`) VALUES
(1, 'johnkhan@gmail.com', 1, 'Bang & Olufsen Adapter', 5000, 5, 'Bang & Olufsen Adapter', '2026-02-07 01:11:09', 'Pending', 'adapter.webp'),
(2, 'Harry@yahoo.com', 2, 'Audiocable', 2000, 4, 'Audiocable in matching colors', '2026-02-07 01:13:19', 'Pending', 'audiocable.webp'),
(3, 'sohana@gmail.com', 3, 'Audiocable', 2000, 3, 'Audiocable in matching colors', '2026-02-07 01:14:43', 'Pending', 'cable2.jpg'),
(4, 'aleena@gmail.com', 4, 'Microphone', 4000, 5, 'High Quality sound', '2026-02-07 01:16:34', 'Pending', 'micro2.jpg'),
(6, 'aleena@gmail.com', 5, 'Power Banks', 2000, 3, 'High quality powerbanks keep your phone fully charged!!', '2026-02-07 01:20:56', 'Pending', 'power banks.jpg'),
(7, 'salman@gmail.com', 6, 'PowerBanks', 2500, 2, 'High quality!!', '2026-02-07 01:22:46', 'Pending', 'power banks1.jpg'),
(8, 'harry@gmail.com', 7, 'Wireless Headphones', 5000, 2, 'Good quality!!', '2026-02-07 01:25:02', 'Pending', 'headphone.png'),
(9, 'katty@gmail.com', 7, 'Wireless Headphones', 4000, 3, 'High quality', '2026-02-07 01:26:05', 'Pending', 'headphone5.jpg'),
(10, 'hina@gmail.com', 9, 'Wireless Headphones', 6000, 1, 'Experience the best echoing sound!!', '2026-02-07 01:28:12', 'Pending', 'Headphone1.webp'),
(11, 'marry@gmail.com', 10, 'Speakers', 8000, 3, 'Experience the premium sounds!!', '2026-02-07 01:30:00', 'Pending', 'speakers.jpg'),
(12, 'zain@gmail.cm', 11, 'Microphones', 7000, 2, 'Experience the best echoing sound', '2026-02-07 01:31:26', 'Pending', 'micro.jpg'),
(13, 'jack@gmail.com', 12, 'Speakers', 4300, 2, 'Experience the best echoing sound!!', '2026-02-07 01:32:39', 'Pending', 'productimg2.jpg'),
(14, 'hamza@gmail.com', 13, 'Microphones', 3500, 2, 'Expereince the best echoing sound!!', '2026-02-07 01:34:20', 'Pending', 'microphon4.jpg'),
(17, 'mariyam@gmail.com', 15, 'iphone 16', 300000, 2, 'Best Phone launched available in different colors!!', '2026-02-07 01:41:04', 'Pending', 'iphone6.png'),
(18, 'sid@gmail.com', 18, 'Premium cover', 1500, 5, 'Premium quality covers with back gold ring plated!!', '2026-02-07 01:43:47', 'Pending', 'mobcovers.avif'),
(19, 'amnakhan11@gmail.com', 0, 'Speakers', 4300, 1, '', '2026-02-07 02:01:30', 'Pending', ''),
(22, 'amnakhan11@gmail.com', 0, 'Speakers', 4300, 1, '', '2026-02-07 02:15:49', 'Pending', '../images/micro.jpg'),
(23, 'amnakhan11@gmail.com', 0, 'Speakers', 4300, 1, '', '2026-02-07 02:17:06', 'Pending', '../images/iphone6.png'),
(24, 'amnakhan11@gmail.com', 0, 'Speakers', 4300, 1, '', '2026-02-07 02:20:10', 'Pending', '../images/headphone5.jpg'),
(25, 'amnakhan11@gmail.com', 0, 'Speakers', 4300, 1, 'High quality!!', '2026-02-07 02:30:39', 'Pending', '../images/power banks1.jpg'),
(26, 'amnakhan11@gmail.com', 0, 'Speakers', 4300, 1, 'Experience the best echoing sound!!', '2026-02-07 02:30:57', 'Pending', '../images/productimg2.jpg'),
(27, 'amnakhan11@gmail.com', 0, 'Speakers', 4300, 1, 'Bang & Olufsen Adapter', '2026-02-07 02:34:55', 'Pending', '../images/adapter.webp'),
(29, 'amnakhan11@gmail.com', 0, 'Speakers', 4300, 1, 'Experience the best echoing sound!!', '2026-02-07 02:40:57', 'Pending', '../images/Headphone1.webp'),
(39, 'hamza@gmail.com', 0, 'Audiocable', 2000, 3, 'Audiocable in matching colors', '2026-02-10 04:51:59', 'Pending', '../images/audiocable.webp'),
(40, 'hamza@gmail.com', 0, 'Microphone', 4000, 1, 'High Quality sound', '2026-02-10 04:52:27', 'Pending', '../images/micro2.jpg'),
(42, 'sara@gmail.com', 0, 'Audiocable', 2000, 1, 'Audiocable in matching colors', '2026-04-14 22:12:29', 'Pending', '../images/audiocable.webp'),
(43, 'zainab@gmail.com', 0, 'Audiocable', 2000, 1, 'Audiocable in matching colors', '2026-04-14 23:11:33', 'Pending', '../images/cable2.jpg'),
(44, 'zainab@gmail.com', 0, 'Bang & Olufsen Adapter', 5000, 1, 'Bang & Olufsen Adapter', '2026-04-14 23:12:16', 'Pending', '../images/adapter.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_web`
--
ALTER TABLE `mobile_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mobile_web`
--
ALTER TABLE `mobile_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
