-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2015 at 11:48 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE TABLE IF NOT EXISTS `timetrack` (
`timetrackID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `InOut` varchar(3) NOT NULL,
  `TheDay` date NOT NULL,
  `TheTime` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `timetrack`
 ADD PRIMARY KEY (`timetrackID`);

ALTER TABLE `timetrack`
MODIFY `timetrackID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

INSERT INTO `timetrack` (`UserID`, `InOut`, `TheDay`, `TheTime`) VALUES
(1, 'out', '2015-09-28', '17:48:06'),
(1, 'in', '2015-09-28', '13:28:34'),
(1, 'out', '2015-09-28', '13:02:11'),
(1, 'in', '2015-09-28', '08:53:43'),
(1, 'out', '2015-09-25', '17:29:51'),
(1, 'in', '2015-09-25', '13:29:52'),
(1, 'out', '2015-09-25', '13:01:28'),
(1, 'in', '2015-09-25', '08:56:07'),
(1, 'out', '2015-09-24', '17:38:50'),
(1, 'in', '2015-09-24', '13:29:46'),
(1, 'out', '2015-09-24', '13:03:52'),
(1, 'in', '2015-09-24', '08:44:28'),
(1, 'out', '2015-09-23', '17:30:03'),
(1, 'in', '2015-09-23', '13:30:57'),
(1, 'out', '2015-09-23', '13:00:03'),
(1, 'in', '2015-09-23', '08:48:40'),
(1, 'out', '2015-09-22', '17:41:04'),
(1, 'in', '2015-09-22', '13:33:14'),
(1, 'out', '2015-09-22', '13:05:33'),
(1, 'in', '2015-09-22', '08:52:08'),
(1, 'out', '2015-09-21', '17:33:23'),
(1, 'in', '2015-09-21', '13:33:24'),
(1, 'out', '2015-09-21', '13:01:22'),
(1, 'in', '2015-09-21', '08:42:04'),
(2, 'out', '2015-09-28', '17:28:16'),
(2, 'in', '2015-09-28', '09:23:19'),
(2, 'out', '2015-09-25', '17:27:34'),
(2, 'in', '2015-09-25', '09:06:09'),
(2, 'out', '2015-09-24', '17:38:45'),
(2, 'in', '2015-09-24', '10:14:28'),
(2, 'out', '2015-09-23', '17:30:13'),
(2, 'in', '2015-09-23', '08:48:40'),
(2, 'out', '2015-09-22', '17:41:44'),
(2, 'in', '2015-09-22', '09:22:11'),
(2, 'out', '2015-09-21', '17:13:39'),
(2, 'in', '2015-09-21', '09:02:33'),
(2, 'out', '2015-09-28', '13:18:17'),
(2, 'in', '2015-09-28', '16:32:37'),
(2, 'out', '2015-09-28', '11:28:17'),
(2, 'in', '2015-09-28', '12:23:37'),
(2, 'out', '2015-09-25', '12:57:34'),
(2, 'in', '2015-09-25', '14:01:09'),
(2, 'out', '2015-09-24', '12:08:09'),
(2, 'in', '2015-09-24', '12:42:59'),
(2, 'out', '2015-09-23', '11:55:13'),
(2, 'in', '2015-09-23', '13:02:40'),
(2, 'out', '2015-09-22', '13:06:06'),
(2, 'in', '2015-09-22', '13:52:36'),
(2, 'out', '2015-09-21', '12:15:00'),
(2, 'in', '2015-09-21', '14:11:27'),
(3, 'out', '2015-09-28', '17:35:06'),
(3, 'in', '2015-09-28', '12:13:34'),
(3, 'out', '2015-09-28', '12:02:11'),
(3, 'in', '2015-09-28', '08:24:43'),
(3, 'out', '2015-09-25', '17:52:17'),
(3, 'in', '2015-09-25', '12:19:52'),
(3, 'out', '2015-09-25', '12:02:28'),
(3, 'in', '2015-09-25', '08:52:37'),
(3, 'out', '2015-09-24', '17:47:50'),
(3, 'in', '2015-09-24', '12:22:46'),
(3, 'out', '2015-09-24', '12:03:52'),
(3, 'in', '2015-09-24', '08:49:28'),
(3, 'out', '2015-09-23', '17:50:03'),
(3, 'in', '2015-09-23', '12:24:57'),
(3, 'out', '2015-09-23', '12:01:03'),
(3, 'in', '2015-09-23', '08:33:40'),
(3, 'out', '2015-09-22', '17:51:04'),
(3, 'in', '2015-09-22', '12:26:14'),
(3, 'out', '2015-09-22', '12:03:33'),
(3, 'in', '2015-09-22', '08:51:08'),
(3, 'out', '2015-09-21', '18:46:48'),
(3, 'in', '2015-09-21', '12:21:24'),
(3, 'out', '2015-09-21', '12:01:22'),
(3, 'in', '2015-09-21', '08:45:00'),
(4, 'in', '2015-09-23', '11:56:00'),
(4, 'out', '2015-09-23', '11:49:00'),
(4, 'in', '2015-09-21', '14:48:00'),
(4, 'out', '2015-09-21', '14:02:00'),
(4, 'out', '2015-09-28', '17:33:00'),
(4, 'in', '2015-09-28', '12:24:00'),
(4, 'out', '2015-09-28', '12:01:00'),
(4, 'in', '2015-09-28', '08:51:00'),
(4, 'out', '2015-09-25', '17:41:00'),
(4, 'in', '2015-09-25', '12:52:00'),
(4, 'out', '2015-09-25', '12:09:00'),
(4, 'in', '2015-09-25', '08:59:00'),
(4, 'out', '2015-09-24', '17:42:00'),
(4, 'in', '2015-09-24', '12:33:00'),
(4, 'out', '2015-09-24', '12:13:00'),
(4, 'in', '2015-09-24', '08:42:00'),
(4, 'out', '2015-09-23', '17:38:00'),
(4, 'in', '2015-09-23', '12:42:00'),
(4, 'out', '2015-09-23', '12:07:00'),
(4, 'in', '2015-09-23', '09:03:00'),
(4, 'out', '2015-09-22', '17:33:00'),
(4, 'in', '2015-09-22', '12:26:00'),
(4, 'out', '2015-09-22', '12:02:00'),
(4, 'in', '2015-09-22', '09:11:00'),
(4, 'out', '2015-09-21', '17:32:00'),
(4, 'in', '2015-09-21', '12:31:00'),
(4, 'out', '2015-09-21', '12:01:00'),
(4, 'in', '2015-09-21', '08:49:00'),
(5, 'out', '2015-09-28', '17:31:00'),
(5, 'in', '2015-09-28', '13:34:00'),
(5, 'out', '2015-09-28', '13:01:00'),
(5, 'in', '2015-09-28', '08:51:00'),
(5, 'out', '2015-09-25', '17:42:00'),
(5, 'in', '2015-09-25', '13:52:00'),
(5, 'out', '2015-09-25', '13:29:00'),
(5, 'in', '2015-09-25', '08:58:00'),
(5, 'out', '2015-09-24', '17:19:00'),
(5, 'in', '2015-09-24', '08:45:12'),
(5, 'out', '2015-09-23', '17:38:00'),
(5, 'in', '2015-09-23', '13:19:00'),
(5, 'out', '2015-09-23', '13:02:00'),
(5, 'in', '2015-09-23', '08:51:00'),
(5, 'out', '2015-09-22', '17:33:00'),
(5, 'in', '2015-09-22', '13:45:00'),
(5, 'out', '2015-09-22', '13:01:00'),
(5, 'in', '2015-09-22', '08:57:00'),
(5, 'out', '2015-09-21', '17:27:00'),
(5, 'in', '2015-09-21', '08:42:00'),
(6, 'out', '2015-09-28', '17:43:14'),
(6, 'in', '2015-09-28', '08:57:51');

CREATE TABLE IF NOT EXISTS `user` (
`UserID` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `DoorCode` varchar(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `user`
 ADD PRIMARY KEY (`UserID`);
 
 ALTER TABLE `user`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `DoorCode`) VALUES
(1, 'Pete', 'Kempthorne', '0904'),
(2, 'Dave', 'Lister', '3454'),
(3, 'Arnold', 'Rimmer', '9254'),
(4, 'Amy', 'Smith', '8100'),
(5, 'Annie', 'Ling', '0577'),
(6, 'Witch', 'Doctor', '6631');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
