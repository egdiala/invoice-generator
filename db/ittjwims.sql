-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 09:27 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ittjwims`
--
CREATE DATABASE IF NOT EXISTS `ittjwims` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ittjwims`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `username` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone_number`, `username`, `password`, `company`) VALUES
(1, 'Diala Egwuchukwu', 'dialaegwuchukwu@gmail.com', '08084779698', 'egdiala', '$2y$10$0LrDM/QJ1kayEhsuWImGLOC0XJTJSXfgyIkZ9W1lFv8rqkOIXMsKu', ''),
(2, 'Diala Egwuchukwu', 'dialaegwuchukwu@gmail.com', '08084779698', 'egdiala', '$2y$10$lykAcQYJsiNP1DSKW1hubu5kmq8jnpfCAr3q1JukbH1kidE8q5CiK', ''),
(3, 'Diala Egwuchukwu', 'dialaegwuchukwu@gmail.com', '08084779698', 'egdiala', '$2y$10$Vx3jgb8eJhXNAkD9m9UJ3O0pHMuH16JjwyRVi600ccxTKVMTlxQXC', ''),
(4, 'Diala Egwuchukwu', 'dialaegwuchukwu@gmail.com', '08084779698', 'egdiala', '$2y$10$UWm04fu/pG88CbwG7yAz2.ebonHuD3b8r6JDT76OKPT62JwLQNT9y', ''),
(5, 'Diala Egwuchukwu', 'dialaegwuchukwu@gmail.com', '08084779698', 'egdiala', '$2y$10$dfsCYuuO7VKAPbNVlU3yvuRh/NU8Y.DS1O7Co6n1FQq1ZIR9Uo/Ze', ''),
(6, 'Diala Steve', 'i_diala@yahoo.com', '08084779698', 'steve07', '$2y$10$Y3G59Juzx9VgMQO6VT4kMOOZ7sVmrjJ6a0wDsD1YjHEpikfzfi4Ea', 'ITTJWIMS'),
(7, 's m', 's', 's', 's', '$2y$10$.GNkyfuQV3K82hxJIOk1Zu3y5g5cw8v.thRhY0pj0UgEt5XSJIJ/S', ''),
(8, 's m', 's', 's', 's', '$2y$10$UNm/kVLgPVYS2nJ12cWxBem8iossWcfaXxcBNlhX7IvMSUtcwhoh.', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `customer` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `total` varchar(11) NOT NULL,
  `total_in_words` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_no`, `date`, `customer`, `address`, `total`, `total_in_words`) VALUES
(1, '1', '2019-08-03', 'Diala Egwuchukwu', 'Bayo Oyewale', '0', ''),
(2, '2', '2019-08-02', 'Diala Egwuchukwu', 'Bayo Oyewale', '0', ''),
(3, '3', '2019-08-03', 'Diala Egwuchukwu', 'Bayo Oyewale', '0', ''),
(4, '4', '2019-08-02', 'Diala Stephen', 'Bayo Oyewale 105 A', '0', ''),
(5, '5', '2019-08-14', 'Somto Achiamani', 'Umuchima, Owerri', '0', ''),
(6, '6', '2019-08-14', 'Somto Achiamani', 'Umuchima, Owerri', '0', ''),
(7, '7', '2019-08-08', 'Somto Achiamani', 'Umuchima, Owerri', '0', ''),
(8, '8', '2019-08-13', 'Mike', 'Go Lang', '0', ''),
(9, '9', '2019-08-15', 'Diala Egwuchukwu', 'Bayo Oyewale 105 A', '0', ''),
(10, '10', '2019-08-09', 'Diala Egwuchukwu', 'Bayo Oyewale 105 A', '297664', ''),
(11, '11', '2019-08-02', 'Diala Egwuchukwu', 'Umuchima, Owerri', '32170', ''),
(12, '12', '2019-08-06', 'Egere Samuel', 'Electric Avenue Technologies, Jibowu, Yaba, Lagos State.', '2415000', 'Two million Four hundred and Fifteen thousand Naira Only'),
(13, '13', '2019-08-06', 'Egere Samuel', 'Electric Avenue Technologies, Jibowu, Yaba, Lagos State.', '2415000', 'Two million Four hundred and Fifteen thousand Naira Only'),
(14, '14', '2019-09-11', 'Diala Egwuchukwu', 'Bayo Oyewale', '1700000', 'One Million Seven hundred Thousand Naira Only');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(15) NOT NULL,
  `qty` varchar(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rate` varchar(11) DEFAULT NULL,
  `amount` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `qty`, `description`, `rate`, `amount`) VALUES
(1, 'INV-00000001', '1', 'Samsung Note 8', '100000', '100000'),
(2, 'INV-00000002', '6', 'Samsung Note 8', '1900000', '11400000'),
(3, 'INV-00000003', '6', 'err', '100000', '600000'),
(4, 'INV-00000004', '2', 'Mi Band 5', '434', '868'),
(5, 'INV-00000005', '5', 'Poco F1', '89000', '445000'),
(6, 'INV-00000006', '8', 'Xiaomi Poco F1', '65432', '523456'),
(7, 'INV-00000007', '2', 'Samsung Note 7', '300000', '600000'),
(8, 'INV-00000008', '4', 'Redmi', '44', '176'),
(9, 'INV-00000008', '3', 'Honor', '32', '96'),
(10, 'INV-00000008', '7', 'Galaxy', '64', '448'),
(11, 'INV-00000009', '5', 'Samsung Note 8', '300000', '1500000'),
(12, 'INV-00000009', '87', 'Samsung Note 7', '5000', '435000'),
(13, 'INV-00000010', '54', 'Samsung Note 8', '5211', '281394'),
(14, 'INV-00000010', '5', 'Samsung Note 7', '3254', '16270'),
(15, 'INV-00000011', '6', 'LG Air Conditioner', '5000', '30000'),
(16, 'INV-00000011', '5', 'Mi Band 5', '434', '2170'),
(17, 'INV-00000012', '5', 'Mi Band 5', '100000', '500000'),
(18, 'INV-00000012', '5', 'LG Air Conditioner', '300000', '1500000'),
(19, 'INV-00000012', '4', 'Samsung Note 8', '100000', '400000'),
(20, 'INV-00000012', '3', 'Samsung Note 7', '5000', '15000'),
(21, 'INV-00000013', '5', 'Mi Band 5', '100000', '500000'),
(22, 'INV-00000013', '5', 'LG Air Conditioner', '300000', '1500000'),
(23, 'INV-00000013', '4', 'Samsung Note 8', '100000', '400000'),
(24, 'INV-00000013', '3', 'Samsung Note 7', '5000', '15000'),
(25, 'INV-00000014', '2', 'Samsung Note 7', '100000', '200000'),
(26, 'INV-00000014', '5', 'Mi Band 5', '300000', '1500000');

-- --------------------------------------------------------

--
-- Table structure for table `waybill`
--

CREATE TABLE `waybill` (
  `id` int(11) NOT NULL,
  `waybill_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `customer` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `driver` text NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `total_in_words` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waybill`
--

INSERT INTO `waybill` (`id`, `waybill_no`, `date`, `customer`, `address`, `driver`, `vehicle`, `total`, `total_in_words`) VALUES
(1, 'WBL-00000001', '2019-09-17', 'Diala Egwuchukwu', 'Electric Avenue Technologies, Jibowu, Yaba, Lagos State.', 'Alhaji', 'ISL-197R4', '10', 'Ten'),
(2, 'WBL-00000002', '2019-09-17', 'Diala Egwuchukwu', 'Electric Avenue Technologies, Jibowu, Yaba, Lagos State.', 'Alhaji', 'ISL-197R4', '10', 'Ten'),
(3, 'WBL-00000003', '2019-09-17', 'Diala Egwuchukwu', 'Electric Avenue Technologies, Jibowu, Yaba, Lagos State.', 'Alhaji', 'ISL743R1', '10', 'Ten');

-- --------------------------------------------------------

--
-- Table structure for table `waybill_details`
--

CREATE TABLE `waybill_details` (
  `id` int(11) NOT NULL,
  `waybill_no` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waybill_details`
--

INSERT INTO `waybill_details` (`id`, `waybill_no`, `description`, `qty`, `remark`, `total`) VALUES
(1, 'WBL-00000002', 'LG Air Conditioner', '4', 'INTACT', '10'),
(2, 'WBL-00000002', 'Mi Band 5', '3', 'TAMPERED', '10'),
(3, 'WBL-00000002', 'Samsung Note 8', '1', 'INTACT', '10'),
(4, 'WBL-00000002', 'Samsung Note 7', '2', 'TAMPERED', '10'),
(5, 'WBL-00000003', 'Mi Band 5', '2', 'INTACT', '10'),
(6, 'WBL-00000003', 'LG Air Conditioner', '2', 'TAMPERED', '10'),
(7, 'WBL-00000003', 'Samsung Note 7', '5', 'INTACT', '10'),
(8, 'WBL-00000003', 'Samsung Note 8', '1', 'TAMPERED', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waybill`
--
ALTER TABLE `waybill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waybill_details`
--
ALTER TABLE `waybill_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `waybill`
--
ALTER TABLE `waybill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `waybill_details`
--
ALTER TABLE `waybill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
