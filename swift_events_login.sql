-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2021 at 11:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swift_events_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_ID` bigint(20) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_type` text NOT NULL,
  `event_color` char(7) NOT NULL,
  `event_img` varchar(255) NOT NULL,
  `event_location` text NOT NULL,
  `event_start` date NOT NULL,
  `event_time` time NOT NULL,
  `event_end` date NOT NULL,
  `event_duration` text NOT NULL,
  `event_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_ID`, `event_name`, `event_type`, `event_color`, `event_img`, `event_location`, `event_start`, `event_time`, `event_end`, `event_duration`, `event_created`) VALUES
(6, 'Real test 1', 'seminar', '#C28B14', 'https://images.unsplash.com/photo-1569025708622-8c9c95a090f1?ixid=MnwxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60', 'online', '2021-04-30', '00:00:00', '2021-04-30', '1 hour', '2021-04-18 15:09:26'),
(14, 'Web Dev SSH', 'class', '#E907E1', 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80', 'GCTU Main Campus', '2021-05-07', '07:00:00', '2021-05-07', '4 hours', '2021-05-06 22:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `Reservation_ID` bigint(20) NOT NULL,
  `user_ID` bigint(20) NOT NULL,
  `user_FirstName` varchar(255) NOT NULL,
  `user_LastName` varchar(255) NOT NULL,
  `user_Email` varchar(255) NOT NULL,
  `Event_ID` bigint(20) NOT NULL,
  `Event_Name` varchar(255) NOT NULL,
  `reserve_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`Reservation_ID`, `user_ID`, `user_FirstName`, `user_LastName`, `user_Email`, `Event_ID`, `Event_Name`, `reserve_Date`) VALUES
(1, 5, 'janelle', 'fintia', 'janie@gamil.com', 6, 'Real test 1', '2021-05-06 23:04:56'),
(11, 5, 'janelle', 'fintia', 'janie@gamil.com', 6, 'Real test 1', '2021-05-07 00:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_firstName` varchar(255) NOT NULL,
  `user_lastName` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phoneNumber` text NOT NULL,
  `company` text NOT NULL,
  `user_class` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_firstName`, `user_lastName`, `user_email`, `user_phoneNumber`, `company`, `user_class`, `password`, `date`) VALUES
(1, 'kelvin', 'agara', 'kelvin.agara@yahoo.com', '0241417694', 'kelvin welding', 'attendee', 'aa7c9c12fc740955ef4dfad670250ff4', '2021-04-12 12:25:20'),
(4, 'john', 'boyega', 'jb@yahoo.com', '02344444', 'no affiliates', 'attendee', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2021-04-12 12:51:12'),
(5, 'janelle', 'fintia', 'janie@gamil.com', '03345678995', '', 'organizer', 'e10adc3949ba59abbe56e057f20f883e', '2021-04-15 00:11:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_ID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `FOREIGN KEY` (`user_ID`),
  ADD KEY `E-FOREIGN KEY` (`Event_ID`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `user_firstName` (`user_firstName`),
  ADD KEY `user_lastName` (`user_lastName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `Reservation_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `E-FOREIGN KEY` FOREIGN KEY (`Event_ID`) REFERENCES `events` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`user_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
