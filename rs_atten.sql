-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2011 at 05:02 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `rs_atten`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE IF NOT EXISTS `attendence` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `userid` int(11) default NULL,
  `intime` time default '00:00:00',
  `outtime` time default '00:00:00',
  `date` date default NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `userid`, `intime`, `outtime`, `date`, `timestamp`) VALUES
(1, 1, '10:13:15', '10:29:28', '2011-10-31', '2011-10-31 22:29:46'),
(2, 2, '10:33:18', '10:40:41', '2011-10-31', '2011-10-31 22:41:25'),
(3, 2, '10:43:46', '10:43:55', '2011-10-31', '2011-10-31 22:44:30'),
(4, 2, '10:45:17', '12:00:00', '2011-10-31', '2011-10-31 22:50:26'),
(5, 2, '04:56:12', '10:57:07', '2011-10-31', '2011-10-31 22:57:07'),
(6, 1, '11:00:19', '00:00:00', '2011-10-31', '2011-10-31 23:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `username` varchar(255) default NULL,
  `password` varchar(255) default NULL,
  `status` int(3) default NULL COMMENT '0 for user, 1 for superadmin, 2 for admin',
  `full_name` varchar(255) default NULL,
  `address` varchar(512) default NULL,
  `gender` int(1) default NULL COMMENT '0 for female 1 for male',
  `email_adds` varchar(512) default NULL,
  `mobile` varchar(31) default NULL,
  `images_name` varchar(255) default NULL,
  `date_birth` varchar(20) default NULL,
  `time` timestamp NULL default NULL,
  `update_time` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`, `full_name`, `address`, `gender`, `email_adds`, `mobile`, `images_name`, `date_birth`, `time`, `update_time`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Rashedul Hasan', 'House# 55,', 1, 'rashed.0123@gmail.com', '01911915181', NULL, '09/01/2011', NULL, '2011-10-31'),
(2, 'rashed', '81dc9bdb52d04dc20036dbd8313ed055', 0, NULL, NULL, NULL, 'ed.0123@yahoo.com', NULL, NULL, NULL, NULL, '2011-10-31'),
(3, 'admin2', '81dc9bdb52d04dc20036dbd8313ed055', 2, NULL, NULL, NULL, 'rashed.0123@yahoo.com', NULL, NULL, NULL, NULL, '2011-09-25');
