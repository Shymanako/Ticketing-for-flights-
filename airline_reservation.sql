-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 03:26 AM
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
('GNA', 'Gensan National Airlines'),
('MSA', 'Mindanao state Airlines');

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
('MA', 'Manila Airport'),
('MNA', 'Mindanao State Airport');

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
(1, 10, 10, 1, 1);

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
(1, 'MNA', 'CNA', 'Cebu'),
(2, 'CNA', 'DNA', 'davao'),
(3, 'MA', 'CNA', 'Manila');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` int(10) NOT NULL,
  `schedule_id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_id`, `schedule_id`, `image`, `description`) VALUES
(1, 1, 'Flight_Image_571.jpg', 'Helo'),
(2, 2, 'Flight_Image_530.jpg', 'Hi'),
(3, 3, 'Flight_Image_417.jpg', 'yummy');

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
(1, 'noel', 'salazar', '1221-12-12', 'f', '123123123', '122@gmail.com'),
(2, 'asdasd', 'asd', '1212-12-12', 'sad', '123123123', '123@gmail.com'),
(3, 'asd', 'asd', '1212-12-12', 'asdasd', '1231231', 'qweq@gmail.com'),
(4, 'asda', 'dasda', '1232-12-31', 'qweqw', '12312321312', 'asd12@gmail.com'),
(5, 'asd', 'asd', '1124-04-23', 'sdada', '123', 'qwe2@yahoo.com'),
(6, 'asd', 'asd', '1231-12-12', 'asdadas', '1231232131', 'dasda@yahoo.com'),
(10, 'qwe', 'qwe', '1212-12-12', 'qweq', '123123123', 'qwe@gmail.com');

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
(1, 10, 'Visa', 125, 123, '2023-01-26');

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
(10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(10) NOT NULL,
  `direction_id` int(7) NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `airline_id` char(3) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `direction_id`, `departure_time`, `arrival_time`, `airline_id`, `price`) VALUES
(1, 1, '2023-01-14 12:03:00', '2023-01-19 12:03:00', 'GNA', 125),
(2, 2, '2023-01-13 12:03:00', '2023-01-17 12:04:00', 'MSA', 69),
(3, 3, '2023-01-11 12:04:00', '2023-01-14 12:04:00', 'GNA', 178);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ticket`
-- (See below for the actual view)
--
CREATE TABLE `ticket` (
`flight_id` int(10)
,`direction_id` int(7)
,`schedule_id` int(10)
);

-- --------------------------------------------------------

--
-- Structure for view `ticket`
--
DROP TABLE IF EXISTS `ticket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ticket`  AS SELECT `f`.`flight_id` AS `flight_id`, `s`.`direction_id` AS `direction_id`, `s`.`schedule_id` AS `schedule_id` FROM (`flight` `f` left join `schedule` `s` on(`f`.`schedule_id` = `s`.`schedule_id`)) ORDER BY `f`.`flight_id` ASC  ;

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
  MODIFY `direction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passenger_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
