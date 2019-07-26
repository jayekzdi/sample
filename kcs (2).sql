-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2017 at 12:43 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(30) NOT NULL,
  `account_full_name` varchar(250) NOT NULL,
  `account_username` varchar(250) NOT NULL,
  `account_password` varchar(250) NOT NULL,
  `account_user_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_full_name`, `account_username`, `account_password`, `account_user_type`) VALUES
(1, 'Enrico Natividad', 'admin', 'kagahincs', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `archive_reservation`
--

CREATE TABLE `archive_reservation` (
  `res_id` int(10) NOT NULL,
  `res_full_name` varchar(200) NOT NULL,
  `res_date` varchar(200) NOT NULL,
  `res_time` varchar(200) NOT NULL,
  `res_venue` varchar(250) NOT NULL,
  `res_contact` varchar(200) NOT NULL,
  `res_occasion` varchar(200) NOT NULL,
  `res_no_of_reservation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive_user_account`
--

CREATE TABLE `archive_user_account` (
  `user_id` int(10) NOT NULL,
  `user_full_name` varchar(250) NOT NULL,
  `user_username` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_contact_no` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_bday` varchar(250) NOT NULL,
  `user_gender` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_img`
--

CREATE TABLE `event_img` (
  `id` int(5) NOT NULL,
  `img_name` varchar(250) NOT NULL,
  `img_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_img`
--

INSERT INTO `event_img` (`id`, `img_name`, `img_url`) VALUES
(1, 'Birthdays', 'kag0.jpg'),
(2, 'Wedding', 'kag1.jpg'),
(3, 'Staffs', 'kag3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pax_id` int(100) NOT NULL,
  `side_dishes` varchar(250) NOT NULL,
  `dessert` varchar(250) NOT NULL,
  `juice` varchar(250) NOT NULL,
  `drinks` varchar(250) NOT NULL,
  `soup` varchar(250) NOT NULL,
  `main_dish_pork` varchar(250) NOT NULL,
  `main_dish_chicken` varchar(250) NOT NULL,
  `main_dish_beef` varchar(250) NOT NULL,
  `main_dish_seafood` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pax_id`, `side_dishes`, `dessert`, `juice`, `drinks`, `soup`, `main_dish_pork`, `main_dish_chicken`, `main_dish_beef`, `main_dish_seafood`) VALUES
(1, 'Buttered Vegetable', 'Fruit Salad', '', 'Black Gulaman', 'Sinigang na Hipon', 'Pork Hamonado', 'Chicken Roll', 'Beef Brocoli', 'Fish Fillet'),
(2, 'Buttered Baby Potato', 'Buco Pandan', '', 'Iced Tea', 'Molo Soup', 'Porkloin with Mushroom Sauce', 'Fried Chicken', 'Beef Caldereta', 'Spicy Hipon'),
(3, 'Lumpiang Ubod Hubad', 'Assorted Fresh Fruit', '', 'Four Season', 'Crab and Corn', 'Porkloin in Mushroom with Quail Eggs', 'Chicken Lollipop', 'Kare Kare', 'Seafoods Mix with Creamy Sauce'),
(4, 'Lumpiang Ubod May Balot', 'Bibingkang Kagahin', '', 'Juicer', 'Cream of Mushroom', 'Pork Kaldereta', 'Chicken BBQ', 'Beef Morcon', 'Paela ala Kagahin'),
(5, 'Chopsuey', 'Crema de Fruta', '', '', '', 'Pork Afritada', 'Chicken Pandan', '', ''),
(6, 'Pansit', 'Buco Lychees', '', '', '', 'Inihaw na Liempo', 'Chicken Teryaki', '', ''),
(7, 'Pasta', 'Caramelized Banana', '', '', '', 'Pork BBQ', 'Orange Chicken', '', ''),
(8, 'Potato Salad', 'Jello creme Mud Pie', '', '', '', 'Lumpiang Shanghai', '', '', ''),
(9, 'Palabok', 'Coffee Jello', '', '', '', 'Meat Loaf ala ric', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(10) NOT NULL,
  `res_full_name` varchar(200) NOT NULL,
  `res_date` varchar(200) NOT NULL,
  `res_time` varchar(250) NOT NULL,
  `res_venue` varchar(250) NOT NULL,
  `res_contact` varchar(200) NOT NULL,
  `res_occasion` varchar(200) NOT NULL,
  `res_no_of_reservation` int(20) NOT NULL,
  `res_remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(10) NOT NULL,
  `user_full_name` varchar(200) NOT NULL,
  `user_username` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_contact_no` varchar(200) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_bday` varchar(250) NOT NULL,
  `user_gender` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `user_full_name`, `user_username`, `user_email`, `user_contact_no`, `user_password`, `user_bday`, `user_gender`) VALUES
(1, 'John Joshua Bala', 'jayeksdi', 'jhnbala@gmail.com', '09552131094', 'e2447a4f5b6e8fc32f9523d9750e3cdf', '08/26/1998', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `archive_reservation`
--
ALTER TABLE `archive_reservation`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `archive_user_account`
--
ALTER TABLE `archive_user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`pax_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `archive_reservation`
--
ALTER TABLE `archive_reservation`
  MODIFY `res_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `archive_user_account`
--
ALTER TABLE `archive_user_account`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `pax_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
