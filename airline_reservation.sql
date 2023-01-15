-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 04:19 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE `airline` (
  `airline_id` char(3) NOT NULL,
  `airline_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airline`
--

INSERT INTO `airline` (`airline_id`, `airline_name`) VALUES
('CPA', 'Cebu Pacific Airlines'),
('DNA', 'Davao National Airlines'),
('GSA', 'General Santos Airlines'),
('MNA', 'Manila National Airlines');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `airport_code` char(3) NOT NULL,
  `airport_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`airport_code`, `airport_name`) VALUES
('CNA', 'Cebu National Airport'),
('DNA', 'Davao National Airport'),
('GSA', 'General Santos Airport'),
('MNA', 'Manila National Airport');

-- --------------------------------------------------------

--
-- Table structure for table `booked_information`
--

CREATE TABLE `booked_information` (
  `booked_id` int(10) NOT NULL,
  `reservation_id` int(10) NOT NULL,
  `passenger_id` int(10) NOT NULL,
  `flight_id` int(10) NOT NULL,
  `payment_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_information`
--

INSERT INTO `booked_information` (`booked_id`, `reservation_id`, `passenger_id`, `flight_id`, `payment_id`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `direction`
--

CREATE TABLE `direction` (
  `direction_id` int(10) NOT NULL,
  `origin_airport_code` char(3) NOT NULL,
  `destination_airport_code` char(3) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `direction`
--

INSERT INTO `direction` (`direction_id`, `origin_airport_code`, `destination_airport_code`, `location`) VALUES
(1, 'GSA', 'CNA', 'Gensan to Cebu'),
(2, 'GSA', 'DNA', 'Gensan to Davao'),
(3, 'GSA', 'MNA', 'Gensan to Manila'),
(4, 'CNA', 'DNA', 'Cebu to Davao'),
(5, 'CNA', 'GSA', 'Cebu to Gensan'),
(6, 'CNA', 'MNA', 'Cebu to Manila'),
(7, 'DNA', 'CNA', 'Davao to Cebu'),
(8, 'DNA', 'GSA', 'Davao to Gensan'),
(9, 'DNA', 'MNA', 'Davao to Manila'),
(10, 'MNA', 'CNA', 'Manila to Cebu'),
(11, 'MNA', 'DNA', 'Manila to Davao'),
(12, 'MNA', 'GSA', 'Manila to Gensan');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` int(10) NOT NULL,
  `schedule_id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_id`, `schedule_id`, `image`) VALUES
(1, 1, 'flight_image_627.jpg'),
(2, 2, 'Flight_Image_499.jpg'),
(3, 3, 'Flight_Image_219.jpg'),
(4, 4, 'Flight_Image_961.jpg'),
(5, 5, 'Flight_Image_195.jpg'),
(6, 6, 'Flight_Image_370.jpg'),
(7, 7, 'Flight_Image_515.jpg'),
(8, 8, 'Flight_Image_807.jpg'),
(9, 9, 'Flight_Image_705.jpg'),
(10, 10, 'Flight_Image_888.jpg'),
(11, 11, 'Flight_Image_896.jpg'),
(12, 12, 'flight_image_699.jpg'),
(13, 13, 'Flight_Image_419.jpg'),
(14, 14, 'Flight_Image_95.jpg'),
(15, 15, 'Flight_Image_541.jpg'),
(16, 16, 'flight_image_173.jpg'),
(17, 17, 'Flight_Image_670.jpg'),
(18, 18, 'Flight_Image_302.jpg'),
(19, 19, 'Flight_Image_333.jpg'),
(20, 20, 'Flight_Image_37.jpg'),
(21, 21, 'Flight_Image_386.jpg'),
(22, 22, 'Flight_Image_806.jpg'),
(23, 23, 'Flight_Image_488.jpg'),
(24, 24, 'flight_image_188.jpg'),
(25, 25, 'Flight_Image_936.jpg'),
(26, 26, 'Flight_Image_88.jpg'),
(27, 27, 'Flight_Image_833.jpg'),
(28, 28, 'flight_image_432.jpg'),
(29, 29, 'flight_image_826.jpg'),
(30, 30, 'flight_image_980.jpg'),
(31, 31, 'Flight_Image_970.jpg'),
(32, 32, 'flight_image_187.jpg'),
(33, 33, 'flight_image_260.jpg'),
(34, 34, 'flight_image_916.jpg'),
(35, 35, 'Flight_Image_912.jpg'),
(36, 36, 'Flight_Image_420.jpg'),
(37, 37, 'Flight_Image_366.jpg'),
(38, 38, 'Flight_Image_367.jpg'),
(39, 39, 'Flight_Image_39.jpg'),
(40, 40, 'Flight_Image_779.jpg'),
(41, 41, 'Flight_Image_401.jpg'),
(42, 42, 'Flight_Image_986.jpg'),
(43, 43, 'Flight_Image_585.jpg'),
(44, 44, 'Flight_Image_554.jpg'),
(45, 45, 'Flight_Image_450.jpg'),
(46, 46, 'Flight_Image_157.jpg'),
(47, 47, 'Flight_Image_275.jpg'),
(48, 48, 'Flight_Image_252.jpg'),
(49, 49, 'Flight_Image_744.jpg'),
(50, 50, 'Flight_Image_940.jpg'),
(51, 51, 'Flight_Image_303.jpg'),
(52, 52, 'Flight_Image_383.jpg'),
(53, 53, 'Flight_Image_207.jpg'),
(54, 54, 'Flight_Image_7.jpg'),
(55, 55, 'Flight_Image_796.jpg'),
(56, 56, 'Flight_Image_416.jpg'),
(57, 57, 'Flight_Image_823.jpg'),
(58, 58, 'Flight_Image_268.jpg'),
(59, 59, 'Flight_Image_351.jpg'),
(60, 60, 'Flight_Image_948.jpg'),
(61, 61, 'Flight_Image_997.jpg'),
(62, 62, 'Flight_Image_22.jpg'),
(63, 63, 'Flight_Image_926.jpg'),
(64, 64, 'Flight_Image_150.jpg'),
(65, 65, 'Flight_Image_673.jpg'),
(66, 66, 'Flight_Image_599.jpg'),
(67, 67, 'Flight_Image_108.jpg'),
(68, 68, 'Flight_Image_861.jpg'),
(69, 69, 'Flight_Image_98.jpg'),
(70, 70, 'Flight_Image_385.jpg'),
(71, 71, 'Flight_Image_33.jpg'),
(72, 72, 'Flight_Image_596.jpg'),
(73, 73, 'Flight_Image_488.jpg'),
(74, 74, 'Flight_Image_304.jpg'),
(75, 75, 'Flight_Image_823.jpg'),
(76, 76, 'Flight_Image_632.jpg'),
(77, 77, 'Flight_Image_495.jpg'),
(78, 78, 'Flight_Image_816.jpg'),
(79, 79, 'Flight_Image_434.jpg'),
(80, 80, 'Flight_Image_726.jpg'),
(81, 81, 'Flight_Image_254.jpg'),
(82, 82, 'Flight_Image_274.jpg'),
(83, 83, 'Flight_Image_697.jpg'),
(84, 84, 'Flight_Image_57.jpg'),
(85, 85, 'Flight_Image_876.jpg'),
(86, 86, 'Flight_Image_624.jpg'),
(87, 87, 'Flight_Image_254.jpg'),
(88, 88, 'Flight_Image_486.jpg'),
(89, 89, 'Flight_Image_559.jpg'),
(90, 90, 'Flight_Image_385.jpg'),
(91, 91, 'Flight_Image_927.jpg'),
(92, 92, 'Flight_Image_111.jpg'),
(93, 93, 'Flight_Image_983.jpg'),
(94, 94, 'Flight_Image_144.jpg'),
(95, 95, 'Flight_Image_63.jpg'),
(96, 96, 'Flight_Image_486.jpg'),
(97, 97, 'Flight_Image_14.jpg'),
(98, 98, 'Flight_Image_975.jpg'),
(99, 99, 'Flight_Image_527.jpg'),
(100, 100, 'Flight_Image_594.jpg'),
(101, 101, 'Flight_Image_383.jpg'),
(102, 102, 'Flight_Image_181.jpg'),
(103, 103, 'Flight_Image_887.jpg'),
(104, 104, 'Flight_Image_517.jpg'),
(105, 105, 'Flight_Image_126.jpg'),
(106, 106, 'Flight_Image_801.jpg'),
(107, 107, 'Flight_Image_831.jpg'),
(108, 108, 'Flight_Image_209.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passenger_id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `citizenship` varchar(20) NOT NULL,
  `p_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `first_name`, `last_name`, `date_of_birth`, `citizenship`, `p_number`, `email`) VALUES
(1, 'weqwe', 'qwe', '1212-12-12', 'qweqw', '123213', '23@y.com'),
(2, 'qwe', 'qwe', '1212-12-12', 'qweqwe', '32131', 'ewe@y.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `reservation_id` int(10) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `cvc` int(3) NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `reservation_id`, `payment_method`, `payment_amount`, `cvc`, `expiry_date`) VALUES
(1, 1, 'Visa', 1200, 123, '2023-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(10) NOT NULL,
  `passenger_id` int(10) NOT NULL,
  `flight_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `passenger_id`, `flight_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(10) NOT NULL,
  `direction_id` int(7) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_date` date NOT NULL,
  `arrival_time` time NOT NULL,
  `airline_id` char(3) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `direction_id`, `departure_date`, `departure_time`, `arrival_date`, `arrival_time`, `airline_id`, `price`) VALUES
(1, 1, '2023-01-16', '07:30:00', '2023-01-16', '10:45:00', 'GSA', 1200),
(2, 1, '2023-01-16', '13:30:00', '2023-01-16', '16:45:00', 'GSA', 1250),
(3, 1, '2023-01-16', '20:00:00', '2023-01-16', '23:15:00', 'GSA', 1150),
(4, 2, '2023-01-16', '04:30:00', '2023-01-16', '05:45:00', 'GSA', 730),
(5, 2, '2023-01-16', '11:15:00', '2023-01-16', '12:30:00', 'GSA', 770),
(6, 2, '2023-01-16', '18:40:00', '2023-01-16', '19:55:00', 'GSA', 750),
(7, 3, '2023-01-16', '03:00:00', '2023-01-16', '08:15:00', 'GSA', 1400),
(8, 3, '2023-01-16', '12:40:00', '2023-01-16', '17:55:00', 'GSA', 1470),
(9, 3, '2023-01-16', '20:15:00', '2023-01-17', '01:30:00', 'GSA', 1500),
(10, 4, '2023-01-16', '06:45:00', '2023-01-16', '09:30:00', 'CPA', 1050),
(11, 4, '2023-01-16', '11:55:00', '2023-01-16', '14:40:00', 'CPA', 1100),
(12, 4, '2023-01-16', '17:00:00', '2023-01-16', '19:45:00', 'CPA', 1080),
(13, 5, '2023-01-16', '06:50:00', '2023-01-16', '10:05:00', 'CPA', 1200),
(14, 5, '2023-01-16', '11:25:00', '2023-01-16', '14:40:00', 'CPA', 1250),
(15, 5, '2023-01-16', '20:48:00', '2023-01-16', '23:03:00', 'CPA', 1290),
(16, 6, '2023-01-16', '05:50:00', '2023-01-16', '08:50:00', 'CPA', 1300),
(17, 6, '2023-01-16', '12:32:00', '2023-01-16', '15:32:00', 'CPA', 1350),
(18, 6, '2023-01-16', '20:30:00', '2023-01-16', '23:30:00', 'CPA', 1380),
(19, 7, '2023-01-16', '03:45:00', '2023-01-16', '06:30:00', 'DNA', 1030),
(20, 7, '2023-01-16', '10:48:00', '2023-01-16', '13:33:00', 'DNA', 1080),
(21, 7, '2023-01-16', '19:44:00', '2023-01-16', '21:59:00', 'DNA', 1100),
(22, 8, '2023-01-16', '06:45:00', '2023-01-16', '08:00:00', 'DNA', 690),
(23, 8, '2023-01-16', '12:00:00', '2023-01-16', '13:15:00', 'DNA', 750),
(24, 8, '2023-01-16', '17:35:00', '2023-01-16', '18:50:00', 'DNA', 790),
(25, 9, '2023-01-16', '04:25:00', '2023-01-16', '08:55:00', 'DNA', 1320),
(26, 9, '2023-01-16', '11:15:00', '2023-01-16', '15:45:00', 'DNA', 1380),
(27, 9, '2023-01-16', '05:55:00', '2023-01-16', '10:25:00', 'DNA', 1430),
(28, 10, '2023-01-16', '05:20:00', '2023-01-16', '08:20:00', 'MNA', 1270),
(29, 10, '2023-01-16', '12:03:00', '2023-01-16', '15:03:00', 'MNA', 1320),
(30, 10, '2023-01-16', '19:00:00', '2023-01-16', '22:00:00', 'MNA', 1350),
(31, 11, '2023-01-16', '06:15:00', '2023-01-16', '10:45:00', 'MNA', 1370),
(32, 11, '2023-01-16', '13:20:00', '2023-01-16', '17:50:00', 'MNA', 1340),
(33, 11, '2023-01-16', '20:35:00', '2023-01-17', '01:05:00', 'MNA', 1450),
(34, 12, '2023-01-16', '04:45:00', '2023-01-16', '09:45:00', 'MNA', 1550),
(35, 12, '2023-01-16', '11:30:00', '2023-01-16', '16:30:00', 'MNA', 1520),
(36, 12, '2023-01-16', '18:55:00', '2023-01-16', '23:55:00', 'MNA', 1570),
(37, 1, '2023-01-17', '05:40:00', '2023-01-17', '08:55:00', 'GSA', 1210),
(38, 1, '2023-01-17', '13:45:00', '2023-01-17', '16:00:00', 'GSA', 1260),
(39, 1, '2023-01-17', '19:00:00', '2023-01-17', '22:15:00', 'GSA', 1195),
(40, 2, '2023-01-17', '03:25:00', '2023-01-17', '04:40:00', 'GSA', 650),
(41, 2, '2023-01-17', '08:10:00', '2023-07-17', '09:25:00', 'GSA', 830),
(42, 2, '2023-01-17', '15:30:00', '2023-01-17', '16:55:00', 'GSA', 735),
(43, 3, '2023-01-17', '04:45:00', '2023-01-17', '09:45:00', 'GSA', 1540),
(44, 3, '2023-01-17', '12:30:00', '2023-01-17', '17:30:00', 'GSA', 1580),
(45, 3, '2023-01-17', '20:20:00', '2023-01-18', '01:20:00', 'GSA', 1620),
(46, 4, '2023-01-17', '05:55:00', '2023-01-17', '08:40:00', 'CPA', 1030),
(47, 4, '2023-01-17', '11:10:00', '2023-01-17', '13:55:00', 'CPA', 1095),
(48, 4, '2023-01-17', '15:05:00', '2023-01-17', '17:50:00', 'CPA', 1130),
(49, 5, '2023-01-17', '03:15:00', '2023-01-17', '06:30:00', 'CPA', 1270),
(50, 5, '2023-01-17', '09:45:00', '2023-01-17', '13:00:00', 'CPA', 1245),
(51, 5, '2023-01-17', '16:45:00', '2023-01-17', '20:00:00', 'CPA', 1325),
(52, 6, '2023-01-17', '05:10:00', '2023-01-17', '08:10:00', 'CPA', 1350),
(53, 6, '2023-01-17', '11:30:00', '2023-01-17', '14:30:00', 'CPA', 1340),
(54, 6, '2023-01-17', '18:35:00', '2023-01-17', '21:35:00', 'CPA', 1385),
(55, 7, '2023-01-17', '06:00:00', '2023-01-17', '08:45:00', 'DNA', 1085),
(56, 7, '2023-01-17', '11:10:00', '2023-01-17', '13:55:00', 'DNA', 1095),
(57, 7, '2023-01-17', '16:25:00', '2023-01-17', '19:10:00', 'DNA', 1135),
(58, 8, '2023-01-17', '04:55:00', '2023-01-17', '06:10:00', 'DNA', 678),
(59, 8, '2023-01-17', '10:20:00', '2023-01-17', '11:35:00', 'DNA', 765),
(60, 8, '2023-01-17', '14:55:00', '2023-01-17', '16:10:00', 'DNA', 720),
(61, 9, '2023-01-17', '03:40:00', '2023-01-17', '08:10:00', 'DNA', 1355),
(62, 9, '2023-01-17', '11:40:00', '2023-01-17', '16:10:00', 'DNA', 1395),
(63, 9, '2023-01-17', '19:00:00', '2023-01-17', '23:30:00', 'DNA', 1405),
(64, 10, '2023-01-17', '03:30:00', '2023-01-17', '06:30:00', 'MNA', 1330),
(65, 10, '2023-01-17', '09:25:00', '2023-01-17', '12:25:00', 'MNA', 1385),
(66, 10, '2023-01-17', '19:00:00', '2023-01-17', '22:00:00', 'MNA', 1405),
(67, 11, '2023-01-17', '04:15:00', '2023-01-17', '08:45:00', 'MNA', 1430),
(68, 11, '2023-01-17', '11:05:00', '2023-01-17', '15:35:00', 'MNA', 1425),
(69, 11, '2023-01-17', '18:35:00', '2023-01-17', '22:05:00', 'MNA', 1465),
(70, 12, '2023-01-17', '05:45:00', '2023-01-17', '11:00:00', 'MNA', 1560),
(71, 12, '2023-01-17', '13:15:00', '2023-01-17', '18:30:00', 'MNA', 1580),
(72, 12, '2023-01-17', '20:45:00', '2023-01-18', '02:00:00', 'MNA', 1600),
(73, 1, '2023-01-18', '03:30:00', '2023-01-18', '06:45:00', 'GSA', 1190),
(74, 1, '2023-01-18', '09:05:00', '2023-01-18', '12:20:00', 'GSA', 1220),
(75, 1, '2023-01-18', '15:40:00', '2023-01-18', '18:55:00', 'GSA', 1245),
(76, 2, '2023-01-18', '04:20:00', '2023-01-18', '05:35:00', 'GSA', 630),
(77, 2, '2023-01-18', '09:45:00', '2023-01-18', '11:00:00', 'GSA', 685),
(78, 2, '2023-01-18', '15:30:00', '2023-01-18', '16:45:00', 'GSA', 660),
(79, 3, '2023-01-18', '04:30:00', '2023-01-18', '09:45:00', 'GSA', 1525),
(80, 3, '2023-01-18', '12:25:00', '2023-01-18', '17:40:00', 'GSA', 1580),
(81, 3, '2023-01-18', '19:50:00', '2023-01-19', '12:05:00', 'GSA', 1635),
(82, 4, '2023-01-18', '03:55:00', '2023-01-18', '06:10:00', 'CPA', 1110),
(83, 4, '2023-01-18', '09:00:00', '2023-01-18', '11:45:00', 'CPA', 1135),
(84, 4, '2023-01-18', '14:15:00', '2023-01-18', '17:00:00', 'CPA', 1165),
(85, 5, '2023-01-18', '07:30:00', '2023-01-18', '10:45:00', 'CPA', 1235),
(86, 5, '2023-01-18', '13:45:00', '2023-01-18', '17:00:00', 'CPA', 1255),
(87, 5, '2023-01-18', '18:00:00', '2023-01-18', '21:15:00', 'CPA', 1285),
(88, 6, '2023-01-18', '04:45:00', '2023-01-18', '07:45:00', 'CPA', 1305),
(89, 6, '2023-01-18', '09:35:00', '2023-01-18', '12:35:00', 'CPA', 1365),
(90, 6, '2023-01-18', '16:50:00', '2023-01-18', '19:50:00', 'CPA', 1400),
(91, 7, '2023-01-18', '05:40:00', '2023-01-18', '08:25:00', 'DNA', 1175),
(92, 7, '2023-01-18', '11:15:00', '2023-01-18', '14:00:00', 'DNA', 1155),
(93, 7, '2023-01-18', '17:00:00', '2023-01-18', '19:45:00', 'DNA', 1205),
(94, 8, '2023-01-18', '05:55:00', '2023-01-18', '07:10:00', 'DNA', 750),
(95, 8, '2023-01-18', '11:30:00', '2023-01-18', '12:45:00', 'DNA', 685),
(96, 8, '2023-01-18', '15:25:00', '2023-01-18', '16:40:00', 'DNA', 725),
(97, 9, '2023-01-18', '06:15:00', '2023-01-18', '10:45:00', 'DNA', 1435),
(98, 9, '2023-01-18', '12:00:00', '2023-01-18', '16:30:00', 'DNA', 1495),
(99, 9, '2023-01-18', '18:05:00', '2023-01-18', '22:35:00', 'DNA', 1515),
(100, 10, '2023-01-18', '04:30:00', '2023-01-18', '07:30:00', 'MNA', 1375),
(101, 10, '2023-01-18', '10:30:00', '2023-01-18', '13:30:00', 'MNA', 1345),
(102, 10, '2023-01-18', '17:55:00', '2023-01-18', '20:55:00', 'MNA', 1395),
(103, 11, '2023-01-18', '05:20:00', '2023-01-18', '09:50:00', 'MNA', 1465),
(104, 11, '2023-01-18', '11:35:00', '2023-01-18', '16:05:00', 'MNA', 1487),
(105, 11, '2023-01-18', '18:15:00', '2023-01-18', '22:45:00', 'MNA', 1499),
(106, 12, '2023-01-18', '06:45:00', '2023-01-18', '12:00:00', 'MNA', 1535),
(107, 12, '2023-01-18', '14:25:00', '2023-01-18', '19:40:00', 'MNA', 1586),
(108, 12, '2023-01-18', '21:15:00', '2023-01-19', '14:30:00', 'MNA', 1635);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`airline_id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`airport_code`);

--
-- Indexes for table `booked_information`
--
ALTER TABLE `booked_information`
  ADD PRIMARY KEY (`booked_id`);

--
-- Indexes for table `direction`
--
ALTER TABLE `direction`
  ADD PRIMARY KEY (`direction_id`,`origin_airport_code`,`destination_airport_code`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`,`schedule_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`,`reservation_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`,`passenger_id`,`flight_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`,`direction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_information`
--
ALTER TABLE `booked_information`
  MODIFY `booked_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `direction`
--
ALTER TABLE `direction`
  MODIFY `direction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passenger_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
