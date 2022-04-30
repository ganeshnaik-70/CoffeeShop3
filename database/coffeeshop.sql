-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 19, 2022 at 08:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `baristas`
--

CREATE TABLE `baristas` (
  `baristas_id` int(10) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `about` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baristas`
--

INSERT INTO `baristas` (`baristas_id`, `fname`, `lname`, `password`, `email`, `phone`, `address`, `city`, `country`, `postal_code`, `about`) VALUES
(1, 'Abhay', 'Shetty', 'Abhay123', 'abhay@gmail.com', 7485964115, 'Eliat , jaruselem', 'Akko', 'Isreal', 'ml', 'good barista having more than '),
(2, 'Adil', 'Sha', 'Adil123', 'adil@gmail.com', 2147483647, 'city center', 'Vergo', 'Palestine', '458963', 'Nice at work and good comunicating');

-- --------------------------------------------------------

--
-- Table structure for table `coffeemenu`
--

CREATE TABLE `coffeemenu` (
  `item_no` int(10) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_description` varchar(200) NOT NULL,
  `item_image` varchar(20) NOT NULL,
  `availability` varchar(15) NOT NULL,
  `item_price` int(10) NOT NULL,
  `popularity` int(10) NOT NULL,
  `item_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coffeemenu`
--

INSERT INTO `coffeemenu` (`item_no`, `item_name`, `item_description`, `item_image`, `availability`, `item_price`, `popularity`, `item_type`) VALUES
(1, 'Hot Coffee', 'It is made of pure Coffee and ', 'coffeeitem.jpg', 'available', 15, 7, 'Coffee'),
(2, 'Normal Coffee', 'It is made of pure Coffee and ', 'coffeeitem.jpg', 'available', 5, 5, 'Coffee'),
(3, 'American Coffee', 'It is made of pure Coffee and ', 'coffeeitem.jpg', 'available', 15, 6, 'Coffee'),
(4, 'Cold Coffee', 'its a cold coffee made by pure coffee powder and contains less caffen', 'ice_coffee.jpg', 'available', 20, 7, 'Coffee'),
(5, 'Ice Café', 'To many people, an iced coffee is a couple of shots of espresso mixed with ice cubes and milk or water.', 'ice_coffee.jpg', 'available', 15, 8, 'Coffee'),
(6, 'Cold Coffee', 'its a cold coffee made by pure coffee powder and contains less caffen', 'ice_coffee.jpg', 'available', 20, 7, 'Coffee');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(10) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `cus_type` varchar(10) NOT NULL,
  `date_time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `fname`, `lname`, `password`, `email`, `phone`, `cus_type`, `date_time`) VALUES
(1, 'Ganesh', 'Naik', 'Ganu0987', 'ganeshravinaik2001@g', 8971046276, 'VIP', '2022-01-17 03:07:23pm'),
(2, 'Saber', 'Sab', 'Saber456', 'Saber@gmail.com', 7485965285, 'Regular', '2022-01-17 03:11:00pm'),
(4, 'Kiran', 'Naik', 'Kiru1234', 'kirannaik@gmail.com', 3456782345, 'Regular', '2022-01-17 03:22:28pm'),
(5, 'Lizar', 'all', 'Lizar123', 'lizar@gmail.com', 7485965146, 'VIP', '2022-01-18 08:14:25pm');

-- --------------------------------------------------------

--
-- Table structure for table `drinksmenu`
--

CREATE TABLE `drinksmenu` (
  `item_no` int(10) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_description` varchar(30) NOT NULL,
  `item_image` varchar(20) NOT NULL,
  `availability` varchar(10) NOT NULL,
  `item_price` int(10) NOT NULL,
  `popularity` int(10) NOT NULL,
  `item_type` varchar(10) NOT NULL,
  `age_limit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drinksmenu`
--

INSERT INTO `drinksmenu` (`item_no`, `item_name`, `item_description`, `item_image`, `availability`, `item_price`, `popularity`, `item_type`, `age_limit`) VALUES
(1, 'Cocacola', 'Its a most popular cold drink ', 'colddrinkitem.jpg', 'available', 15, 8, 'Drinks', '7'),
(2, 'Limonana', 'Israel’s classic summer bevera', 'Limonana.jpg', 'available', 50, 9, 'Drinks', '7'),
(3, 'Pepsi', 'famous drink in the world', 'pepsi.jpg', 'available', 20, 7, 'Drinks', '7'),
(4, 'Pepsi + Ice', 'Pepsi is a carbonated soft dri', 'pepsi.jpg', 'available', 20, 7, 'Drinks', '7'),
(5, 'Pepsi + Ice', 'Pepsi is a carbonated soft dri', 'pepsi.jpg', 'available', 20, 7, 'Drinks', '7'),
(6, 'Pepsi + Ice', 'Pepsi is a carbonated soft dri', 'pepsi.jpg', 'available', 20, 7, 'Drinks', '7'),
(7, 'Tubi 60', 'Tubi 60 is a potent liquor tha', 'tubi60.jpg', 'available', 70, 8, 'Drinks', '18'),
(8, 'Arak', 'Another potent liquor, arak ca', 'Arak.jpg', 'available', 80, 10, 'Drinks', '18'),
(9, 'Gold Star', 'The unofficial national beer o', 'tubi60.jpg', 'available', 80, 9, 'Drinks', '18');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `name`, `time`) VALUES
(1, 'ganesh', '2022-01-17 02:23:27p'),
(2, 'ganesh', '2022-01-17 03:05:42p'),
(4, 'admin', '2022-01-17 03:48:02p'),
(5, 'admin', '2022-01-17 03:52:20p'),
(6, 'admin', '2022-01-17 03:53:09p'),
(7, 'Ganesh', '2022-01-17 03:53:50p'),
(8, 'Ganesh', '2022-01-17 03:54:27p'),
(9, 'admin', '2022-01-18 01:06:11p'),
(10, 'Abhay', '2022-01-18 06:24:35p'),
(11, 'admin', '2022-01-18 07:55:04p'),
(12, 'Abhay', '2022-01-18 08:05:18p'),
(13, 'Ganesh', '2022-01-18 08:12:13p'),
(14, 'admin', '2022-01-19 06:41:37a'),
(15, 'admin', '2022-01-19 07:22:19a'),
(16, 'Adil', '2022-01-19 07:45:51a'),
(17, 'Abhay', '2022-01-19 01:06:12p'),
(18, 'Lizar', '2022-01-19 01:32:58p'),
(19, 'Saber', '2022-01-19 01:33:59p'),
(20, 'Saber', '2022-01-19 01:35:18p'),
(21, 'Saber', '2022-01-19 01:35:47p'),
(22, 'admin', '2022-01-19 01:45:43p'),
(23, 'Lizar', '2022-01-19 04:48:56p'),
(24, 'Abhay', '2022-01-19 04:50:25p'),
(25, 'admin', '2022-01-19 08:28:39p');

-- --------------------------------------------------------

--
-- Table structure for table `mealsmenu`
--

CREATE TABLE `mealsmenu` (
  `item_no` int(10) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_description` varchar(200) NOT NULL,
  `item_image` varchar(50) NOT NULL,
  `availability` varchar(15) NOT NULL,
  `item_price` int(10) NOT NULL,
  `popularity` int(10) NOT NULL,
  `item_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mealsmenu`
--

INSERT INTO `mealsmenu` (`item_no`, `item_name`, `item_description`, `item_image`, `availability`, `item_price`, `popularity`, `item_type`) VALUES
(1, 'Full Meal', 'In full Meal you can get every item for a low cost', 'meals1.jpg', 'available', 40, 5, 'Meals'),
(2, 'half Meal', 'In half Meal you can get almost enogh item for a low cost', 'meals2.jpg', 'available', 25, 8, 'Meals'),
(3, 'Gobi Manchurian', 'its a very teasty and healthy meal good for short time', 'meals3.jpg', 'available', 30, 9, 'Meals'),
(4, 'SHAKSHOUKA', 'SHAKSHOUKA is an Israeli dish made of poached eggs in the sauce of tomatoes,  with cumin or zaatar, paprika, cayenne pepper, and coriander', 'Shakshouka.jpg', 'available', 50, 9, 'Meals'),
(5, 'Lafa Bread', 'LAFA (or, TABOON BREAD) is a traditional Middle Eastern and Iraqi flatbread sold as street food in Israel.', 'lafa_bread.jpg', 'available', 40, 7, 'Meals'),
(6, 'LATKES', 'Latkes are popular Israeli potato pancakes brought to Israel by Ashkenazi Jews.', 'Latkes.jpg', 'available', 30, 6, 'Meals');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` bigint(30) NOT NULL,
  `message` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Ganesh Rav', 'ganeshravinaik2001@g', 2147483647, 'nice web site and good coffee'),
(2, 'Ganesh Rav', 'ganeshravinaik2001@g', 2147483647, 'nice web site and good coffee'),
(3, 'Kiran', 'kirannaik@gmail.com', 123456789, 'good coffee service'),
(4, 'Arjun', 'arjun@gmail.com', 8971046276, 'hello nice webpage'),
(5, 'Ganesh Rav', 'ganeshravinaik2001@g', 8971046276, 'it was nice to spend time here'),
(6, 'Ganesh Rav', 'ganeshravinaik2001@g', 8971046276, 'nice website'),
(7, 'Ganesh Rav', 'ganeshravinaik2001@g', 918971046276, 'nice web site');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_no` int(10) NOT NULL,
  `item_no` int(10) NOT NULL,
  `item_type` varchar(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `table_no` int(10) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_no`, `item_no`, `item_type`, `quantity`, `total`, `table_no`, `status`) VALUES
(1, 1, 'Coffee', 3, 60, 3, 'confirmed'),
(2, 3, 'Coffee', 3, 45, 5, 'confirmed'),
(4, 2, 'Drinks', 1, 50, 1, 'pending'),
(7, 2, 'Drinks', 2, 100, 4, 'pending'),
(8, 1, 'Coffee', 4, 60, 8, 'pending'),
(29, 3, 'Coffee', 2, 30, 6, 'confirmed'),
(30, 1, 'Coffee', 4, 60, 9, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `order_no` int(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `payment_mode` varchar(10) NOT NULL,
  `payment_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_no`, `amount`, `payment_mode`, `payment_status`) VALUES
(1, 29, 30, 'card', 'confirmed'),
(2, 30, 60, 'card', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_no` int(10) NOT NULL,
  `no_of_seat` int(10) NOT NULL,
  `availability` varchar(10) NOT NULL,
  `table_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_no`, `no_of_seat`, `availability`, `table_type`) VALUES
(1, 4, 'Occupied', 'Inside'),
(2, 4, 'Unoccupied', 'Inside'),
(3, 4, 'Occupied', 'Outside'),
(4, 2, 'Occupied', 'Outside'),
(5, 4, 'Occupied', 'Outside'),
(6, 2, 'Occupied', 'Inside'),
(7, 4, 'Unoccupied', 'Inside'),
(8, 2, 'Occupied', 'Inside'),
(9, 4, 'Occupied', 'Outside'),
(10, 2, 'Unoccupied', 'Outsdie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baristas`
--
ALTER TABLE `baristas`
  ADD PRIMARY KEY (`baristas_id`);

--
-- Indexes for table `coffeemenu`
--
ALTER TABLE `coffeemenu`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `drinksmenu`
--
ALTER TABLE `drinksmenu`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `mealsmenu`
--
ALTER TABLE `mealsmenu`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baristas`
--
ALTER TABLE `baristas`
  MODIFY `baristas_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coffeemenu`
--
ALTER TABLE `coffeemenu`
  MODIFY `item_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drinksmenu`
--
ALTER TABLE `drinksmenu`
  MODIFY `item_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mealsmenu`
--
ALTER TABLE `mealsmenu`
  MODIFY `item_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
