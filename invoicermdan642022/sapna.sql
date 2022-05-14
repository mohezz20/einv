-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 مايو 2022 الساعة 19:49
-- إصدار الخادم: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sapna`
--

-- --------------------------------------------------------

--
-- بنية الجدول `productt`
--

CREATE TABLE `productt` (
  `productt_id` int(11) NOT NULL,
  `productt_name` varchar(255) NOT NULL,
  `tax1` int(11) NOT NULL,
  `tax2` int(11) NOT NULL,
  `tax3` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `order_receiver_name` varchar(250) NOT NULL,
  `order_receiver_address` text NOT NULL,
  `order_total_before_tax` int(11) NOT NULL,
  `order_total_tax1` int(11) NOT NULL,
  `order_total_tax2` int(11) NOT NULL,
  `order_total_tax3` int(11) NOT NULL,
  `order_total_tax` int(11) NOT NULL,
  `order_total_after_tax` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_no`, `order_date`, `order_receiver_name`, `order_receiver_address`, `order_total_before_tax`, `order_total_tax1`, `order_total_tax2`, `order_total_tax3`, `order_total_tax`, `order_total_after_tax`, `order_datetime`) VALUES
(2, '99', '2022-04-04', 'rahma rabie', 'ljlkjljj', 4000, 0, 0, 0, 0, 4000, '2022-04-04 00:00:00'),
(4, '5435', '2022-04-04', 'fwefwe', 'gdhd', 11, 0, 0, 0, 0, 11, '2022-04-04 00:00:00'),
(5, '5435', '2022-04-06', 'retre', 'tretre', 11, 0, 0, 0, 0, 11, '2022-04-04 00:00:00');

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_quantity` int(10) NOT NULL,
  `order_item_price` int(10) NOT NULL,
  `order_item_actual_amount` int(11) NOT NULL,
  `order_item_tax1_rate` int(11) NOT NULL,
  `order_item_tax1_amount` int(11) NOT NULL,
  `order_item_tax2_rate` int(11) NOT NULL,
  `order_item_tax2_amount` int(11) NOT NULL,
  `order_item_tax3_rate` int(11) NOT NULL,
  `order_item_tax3_amount` int(11) NOT NULL,
  `order_item_final_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`order_item_id`, `order_id`, `item_name`, `order_item_quantity`, `order_item_price`, `order_item_actual_amount`, `order_item_tax1_rate`, `order_item_tax1_amount`, `order_item_tax2_rate`, `order_item_tax2_amount`, `order_item_tax3_rate`, `order_item_tax3_amount`, `order_item_final_amount`) VALUES
(2, 2, 'كلادينج 8 مللى', 1000, 4, 4000, 0, 0, 0, 0, 0, 0, 4000),
(5, 4, 'عسل نحل', 11, 1, 11, 0, 0, 0, 0, 0, 0, 11),
(6, 5, 'retert', 11, 1, 11, 0, 0, 0, 0, 0, 0, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productt`
--
ALTER TABLE `productt`
  ADD PRIMARY KEY (`productt_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productt`
--
ALTER TABLE `productt`
  MODIFY `productt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
