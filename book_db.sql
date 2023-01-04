-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 11:34 AM
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
('MSA', 'Mindanao State Airlines'),
('PNA', 'Philippine National Airlines');

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
('GNA', 'Gensan National Airport'),
('MA', 'Mindanao Airport'),
('MSA', 'Mindanao State Airport');

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

-- --------------------------------------------------------

--
-- Table structure for table `direction`
--

CREATE TABLE `direction` (
  `direction_id` int(10) NOT NULL,
  `origin_airport_code` char(3) NOT NULL,
  `destination_airport_code` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `direction`
--

INSERT INTO `direction` (`direction_id`, `origin_airport_code`, `destination_airport_code`) VALUES
(1, 'GNA', 'MSA'),
(2, 'MA', 'GNA');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` int(10) NOT NULL,
  `schedule_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_id`, `schedule_id`) VALUES
(1, 1);

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
(1, 'noel', 'salazar', '2001-12-25', 'filipino', '09369043349', 'noel.salazar15@yahoo.com'),
(2, 'noel', 'salazar', '2001-12-12', 'fili', '1232141', 'n@gmail.com'),
(3, 'Noel', 'Salazar', '2001-12-25', 'Filipino', '09369043349', 'noel@yahoo.com'),
(4, 'Emannuelle', 'Salazar', '2001-12-25', 'Filipino', '09369043349', 'noel@gmail.com'),
(5, 'Emannuelle', 'Salazar', '2001-12-25', 'Filipino', '09369043349', 'noel@gmail.com');

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
(1, 1, 'Visa', 69, 123, '2023-01-20'),
(2, 2, 'Visa', 69, 123, '2023-01-20'),
(3, 3, 'Visa', 69, 123, '2023-01-12'),
(4, 4, 'Visa', 69, 123, '2023-01-27');

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
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 5, 1);

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
(1, 1, '2022-12-15 19:41:00', '2022-12-21 19:41:00', 'MSA', 69),
(2, 2, '2022-12-16 19:41:00', '2022-12-24 19:42:00', 'MSA', 69);

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
  MODIFY `booked_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `direction`
--
ALTER TABLE `direction`
  MODIFY `direction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passenger_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
