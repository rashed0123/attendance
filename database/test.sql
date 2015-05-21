-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2015 at 07:40 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE IF NOT EXISTS `attendence` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `intime` time DEFAULT '00:00:00',
  `outtime` time DEFAULT '00:00:00',
  `date` date DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `userid`, `intime`, `outtime`, `date`, `timestamp`) VALUES
(1, 1, '10:13:15', '10:29:28', '2011-10-31', '2011-10-31 10:29:46'),
(2, 2, '10:33:18', '10:40:41', '2011-10-31', '2011-10-31 10:41:25'),
(3, 2, '10:43:46', '10:43:55', '2011-10-31', '2011-10-31 10:44:30'),
(4, 2, '10:45:17', '12:00:00', '2011-10-31', '2011-10-31 10:50:26'),
(5, 2, '04:56:12', '10:57:07', '2011-10-31', '2011-10-31 10:57:07'),
(6, 1, '11:00:19', '00:00:00', '2011-10-31', '2011-10-31 11:00:19'),
(7, 1, '02:10:16', '02:11:21', '2015-04-25', '2015-04-25 12:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Aston Martin', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(2, 'Acura', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(3, 'Audi', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(4, 'Bentley', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(5, 'Bmw', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(6, 'Bugatti', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(7, 'Buick', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(8, 'Cadillac', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(9, 'Chevrolet', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(10, 'Chrysler', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(11, 'Dodge', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(12, 'Ferrari', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(13, 'Ford', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(14, 'Gmc', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(15, 'Honda', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(16, 'Hyundai', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(17, 'Infiniti', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(18, 'Jaguar', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(19, 'Jeep', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(20, 'Lamborghini', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(21, 'Lexus', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(22, 'Lincoln', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(23, 'Maserati', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(24, 'Mazda', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(25, 'Mercedes-Benz', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(26, 'Mitsubishi', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(27, 'Tesla', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(28, 'Nissan', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(29, 'Porsche', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(30, 'Rolls Royce', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(31, 'Subaru', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(32, 'Tesla', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(33, 'Toyota', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(34, 'Volkswagen', '2015-04-02 14:01:34', '2015-04-02 14:01:34'),
(35, 'Volvo', '2015-04-02 14:01:34', '2015-04-02 14:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL COMMENT '0 for user, 1 for superadmin, 2 for admin',
  `full_name` varchar(255) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL COMMENT '0 for female 1 for male',
  `email_adds` varchar(512) DEFAULT NULL,
  `mobile` varchar(31) DEFAULT NULL,
  `images_name` varchar(255) DEFAULT NULL,
  `date_birth` varchar(20) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `update_time` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`, `full_name`, `address`, `gender`, `email_adds`, `mobile`, `images_name`, `date_birth`, `time`, `update_time`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Rashedul Hasan', 'House# 55,', 1, 'rashed.0123@gmail.com', '01911915181', NULL, '09/01/2011', NULL, '2015-04-26'),
(2, 'rashed', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, NULL, NULL, 'ed.0123@yahoo.com', NULL, NULL, NULL, '2015-04-25 12:13:55', '2015-04-25'),
(3, 'admin2', '81dc9bdb52d04dc20036dbd8313ed055', 2, NULL, NULL, NULL, 'rashed.0123@yahoo.com', NULL, NULL, NULL, NULL, '2011-09-25'),
(7, 'user', '25e4ee4e9229397b6b17776bfceaf8e7', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `role` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created`, `modified`, `status`) VALUES
(1, 'test420', 'c05cb7b5dcd4dad2be001d8fe2db7d761357a61b', 'test@gmail.com', 'king', '2015-04-07 08:50:16', '2015-04-07 08:50:16', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
