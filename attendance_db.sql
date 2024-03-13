-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 10:36 PM
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
-- Database: `attendance_db`
--
CREATE DATABASE IF NOT EXISTS `attendance_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `attendance_db`;

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

DROP TABLE IF EXISTS `attendee`;
CREATE TABLE IF NOT EXISTS `attendee` (
  `attendee_id` int(11) NOT NULL AUTO_INCREMENT,
  `attendee_name` varchar(100) NOT NULL,
  `attendee_dob` date NOT NULL,
  `attendee_contact` varchar(15) NOT NULL,
  `attendee_email` varchar(100) NOT NULL,
  `attendee_speciality` int(11) NOT NULL,
  PRIMARY KEY (`attendee_id`),
  KEY `fk_attendee_specility` (`attendee_speciality`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendee`
--

INSERT INTO `attendee` (`attendee_id`, `attendee_name`, `attendee_dob`, `attendee_contact`, `attendee_email`, `attendee_speciality`) VALUES
(6, 'Kunal Kumar', '2000-11-20', '7090206050', 'mickymousewow@gmail.com', 5),
(7, 'Vishal Raj', '1998-11-01', '7542958567', 'vishalraj01998@gmail.com', 1),
(8, 'Dev Raj', '1985-02-01', '8569878546', 'xyz@gmail.com', 5),
(9, 'Kunal Kumar yadav', '1996-05-05', '748963652', 'mickymousewow@gmail.com', 2),
(10, 'Ayush', '2001-02-26', '9856321478', 'tarzan@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `specilities`
--

DROP TABLE IF EXISTS `specilities`;
CREATE TABLE IF NOT EXISTS `specilities` (
  `speciality_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`speciality_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specilities`
--

INSERT INTO `specilities` (`speciality_id`, `name`) VALUES
(1, 'Admin'),
(2, 'Developer'),
(5, 'Network Engineer'),
(6, 'Others');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendee`
--
ALTER TABLE `attendee`
  ADD CONSTRAINT `fk_attendee_specility` FOREIGN KEY (`attendee_speciality`) REFERENCES `specilities` (`speciality_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
