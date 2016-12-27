-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2016 at 07:17 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myscript`
--

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
`id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `status` enum('READ','UNREAD','DRAFT','TRASH') DEFAULT 'UNREAD',
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'UNREAD', '2016-12-26', '2016-12-26 12:07:36'),
(2, 'wsefwsf@tyu.com', 'UNREAD', '2016-12-26', '2016-12-26 12:15:52'),
(3, 'wsefwsf@tyu.com', 'UNREAD', '2016-12-26', '2016-12-26 12:16:26'),
(4, 'test@tyu.com', 'UNREAD', '2016-12-26', '2016-12-26 12:18:46'),
(5, 'wefwegterh@oweurpo.com', 'UNREAD', '2016-12-26', '2016-12-26 12:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `mail_conversation`
--

CREATE TABLE IF NOT EXISTS `mail_conversation` (
`id` int(11) NOT NULL,
  `mail_id` int(11) NOT NULL,
  `description` text,
  `attachment` varchar(100) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_conversation`
--

INSERT INTO `mail_conversation` (`id`, `mail_id`, `description`, `attachment`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, '<p>wadasd</p>\n', 'app keys', 'ACTIVE', '2016-12-26', '2016-12-26 12:18:46'),
(2, 5, '<p>wefwefwefewf</p>\n', 'mavwealth1.png', 'ACTIVE', '2016-12-26', '2016-12-26 12:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ram', 'ram@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ACTIVE', '2016-12-25 00:00:00', '2016-12-25 07:55:28'),
(2, 'sham', 'sham@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ACTIVE', '2016-12-25 00:00:00', '2016-12-25 07:56:03'),
(3, 'guru', 'guru@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ACTIVE', '2016-12-25 00:00:00', '2016-12-25 07:56:03'),
(4, 'raj', 'raj@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ACTIVE', '2016-12-25 00:00:00', '2016-12-25 07:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_mail`
--

CREATE TABLE IF NOT EXISTS `user_has_mail` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mail_id` int(11) NOT NULL,
  `status` enum('SENT','RECEIVED','REPLY','FORWARD','DRAFT','TRASH') NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_mail`
--

INSERT INTO `user_has_mail` (`id`, `user_id`, `mail_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'SENT', '2016-12-26', '2016-12-26 12:18:47'),
(2, 3, 4, 'RECEIVED', '2016-12-26', '2016-12-26 12:18:47'),
(3, 1, 5, 'SENT', '2016-12-26', '2016-12-26 12:22:18'),
(4, 3, 5, 'RECEIVED', '2016-12-26', '2016-12-26 12:22:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_conversation`
--
ALTER TABLE `mail_conversation`
 ADD PRIMARY KEY (`id`), ADD KEY `mailId_indx` (`mail_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_mail`
--
ALTER TABLE `user_has_mail`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `mail_id_indx` (`mail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mail_conversation`
--
ALTER TABLE `mail_conversation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_has_mail`
--
ALTER TABLE `user_has_mail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mail_conversation`
--
ALTER TABLE `mail_conversation`
ADD CONSTRAINT `mail_conversation_ibfk_1` FOREIGN KEY (`mail_id`) REFERENCES `mail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_mail`
--
ALTER TABLE `user_has_mail`
ADD CONSTRAINT `user_has_mail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_has_mail_ibfk_2` FOREIGN KEY (`mail_id`) REFERENCES `mail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
