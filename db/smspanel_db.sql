-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2017 at 12:51 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smspanel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `sp_contacts`
--

CREATE TABLE `sp_contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `file_title` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_contacts`
--

INSERT INTO `sp_contacts` (`id`, `user_id`, `file_name`, `file_title`) VALUES
(2, 9, 'dsnidanqlwgueye9a6xjccf8omzsmkv2.txt', '20-07-2017-07-45-05_autogenerate'),
(3, 2, '92cbae8aae6c0648b023db2b5b76f691.txt', 'New'),
(4, 9, 'a379d0ab8d3055371f15823bee15ed4b.csv', ''),
(5, 9, '7a7174d478133d4abb66d1409d925e87.csv', ''),
(6, 2, '664606c20e4962063421ab42ff9bd62a.txt', '300contacts'),
(7, 2, '66348518a7a823b83164d63fc2df1de3.txt', '287contacts'),
(8, 2, 'fedbe3fe080dd4087fcbdb2656ef5325.txt', '286contacts');

-- --------------------------------------------------------

--
-- Table structure for table `sp_notifications`
--

CREATE TABLE `sp_notifications` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `opened_by` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_notifications`
--

INSERT INTO `sp_notifications` (`id`, `name`, `description`, `opened_by`) VALUES
(1, 'test1123', 'test1232222 fffff', '2'),
(2, 'Uri', 'Uri test', '2'),
(3, 'new test', 'new test test etest test testset testsetest', '2');

-- --------------------------------------------------------

--
-- Table structure for table `sp_offers_smsideas`
--

CREATE TABLE `sp_offers_smsideas` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `type` enum('offer','idea') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_offers_smsideas`
--

INSERT INTO `sp_offers_smsideas` (`id`, `name`, `description`, `type`) VALUES
(5, 'test', 'test test test test test test test', 'offer'),
(6, 'test', 'test test test test test test testest test test test test test test', 'idea');

-- --------------------------------------------------------

--
-- Table structure for table `sp_registrations`
--

CREATE TABLE `sp_registrations` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `sms_count` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `date_added` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sp_reports`
--

CREATE TABLE `sp_reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_reports`
--

INSERT INTO `sp_reports` (`id`, `user_id`, `date`, `file_id`) VALUES
(1, 2, '2017-07-04', 4),
(2, 6, '2017-07-20', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sp_sms`
--

CREATE TABLE `sp_sms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `scheduled_on` varchar(500) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_sms`
--

INSERT INTO `sp_sms` (`id`, `user_id`, `file_id`, `content`, `scheduled_on`, `time`) VALUES
(2, 2, 3, 'test testest estestest', '20-07-2017', '3PM-7PM'),
(3, 2, 3, 'Happy Diw kjkjkjk kjjkjk jkjkjkjkjjkkjjk', '28-07-2017', '10AM-2PM'),
(4, 2, 3, 'estest est estestest', '21-07-2017', '10AM-2PM'),
(5, 2, 3, 'testes testes testestest steststest', '21-07-2017', '10AM-2PM'),
(6, 2, 8, 'test estest', '30-07-2017', '10AM-2PM');

-- --------------------------------------------------------

--
-- Table structure for table `sp_templates`
--

CREATE TABLE `sp_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_templates`
--

INSERT INTO `sp_templates` (`id`, `name`, `description`, `user_id`) VALUES
(1, 'Diwali', 'Happy Diwali', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sp_update_balance`
--

CREATE TABLE `sp_update_balance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance_updated` int(11) NOT NULL,
  `updated_by` varchar(500) NOT NULL,
  `date_added` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_update_balance`
--

INSERT INTO `sp_update_balance` (`id`, `user_id`, `balance_updated`, `updated_by`, `date_added`) VALUES
(1, 6, 23, '9', '2017-07-13 13:20:31'),
(2, 6, 24, '9', '2017-07-13 13:22:36'),
(3, 2, 25, '9', '2017-07-17 08:10:24'),
(4, 2, 2, '9', '2017-07-20 12:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `sp_users`
--

CREATE TABLE `sp_users` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1=>admin,2=>subadmin,3=>user',
  `expiry_date` varchar(100) NOT NULL,
  `total_credits` int(11) NOT NULL,
  `current_credits` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `rm_name` varchar(500) NOT NULL,
  `rm_contact` varchar(500) NOT NULL,
  `rm_email` varchar(500) NOT NULL,
  `company` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_users`
--

INSERT INTO `sp_users` (`id`, `username`, `password`, `user_type`, `expiry_date`, `total_credits`, `current_credits`, `name`, `email`, `mobile`, `address`, `city`, `status`, `rm_name`, `rm_contact`, `rm_email`, `company`) VALUES
(2, 'demo', '$2y$10$JDfl7cuBtiqXmClfDBtjEui05cVM9cXn5UiO9jH/0ztxzMJa2Vofy', 3, '21-07-2017', 400, 2, 'test_new', 'etstes@test.com', '7878787878', 'test', 'estet', 1, 'test', '3434343434', 'test@test.com', 'testest'),
(5, 'manishdua', '$2y$10$D9GPB23w5UdYWrTT2Ll2GuiIJtYRQj2oYrOMdx56ikuZkJso482Ha', 2, '29-07-2017', 400, 400, 'test', 'test@estest.com', '4545454545', 'test', 'test', 1, 'test', '4545454545', 'test@test.com', 'testest'),
(6, 'demo2', '$2y$10$uHtwUaPsFKkwCcYWFs5Uheo1XpHWwuN/st1GZ26VxPdkhdnAtF.vG', 3, '05-08-2017', 400, 48, 'Snafu28', 'etstes@test.com', '5555555555', 'test', 'test', 1, 'testt', '3434343434', 'test@test.com', 'testest'),
(7, 'enqtest', '$2y$10$G0XuvzU6lMP8.zRnE1YSReeUMxLyuiYCo3kqzL33UhIpURmWdgHr6', 3, '29-07-2017', 400, 400, 'test', 'test@test.com', '5555555555', 'test', 'test', 1, 'test', '3434343434', 'test@test.com', 'testest'),
(8, 'user1', '$2y$10$NK0PpMf8hvxouAaQJhW58eEB5j4areWELP2GGklUlburZ3qEMHhp2', 3, '05-08-2017', 1000, 1000, 'test1', 'test1@test.com', '8989898989', 'Test Address, Test Road', 'estet', 0, 'testt', '3434343434', 'test@test.com', 'test'),
(9, 'admin', '$2y$10$4XT/ZJjgbz4dnOaN8Ohxoe49j8vlPN1TjN058C/./jqSIdj/yPvlW', 1, '', 0, 0, 'Admin', '', '', '', '', 1, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_contacts`
--
ALTER TABLE `sp_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sp_notifications`
--
ALTER TABLE `sp_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_offers_smsideas`
--
ALTER TABLE `sp_offers_smsideas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_registrations`
--
ALTER TABLE `sp_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_reports`
--
ALTER TABLE `sp_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `sp_sms`
--
ALTER TABLE `sp_sms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `sp_templates`
--
ALTER TABLE `sp_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sp_update_balance`
--
ALTER TABLE `sp_update_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sp_users`
--
ALTER TABLE `sp_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sp_contacts`
--
ALTER TABLE `sp_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sp_notifications`
--
ALTER TABLE `sp_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sp_offers_smsideas`
--
ALTER TABLE `sp_offers_smsideas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sp_registrations`
--
ALTER TABLE `sp_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_reports`
--
ALTER TABLE `sp_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sp_sms`
--
ALTER TABLE `sp_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sp_templates`
--
ALTER TABLE `sp_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sp_update_balance`
--
ALTER TABLE `sp_update_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sp_users`
--
ALTER TABLE `sp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sp_contacts`
--
ALTER TABLE `sp_contacts`
  ADD CONSTRAINT `sp_contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sp_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sp_reports`
--
ALTER TABLE `sp_reports`
  ADD CONSTRAINT `sp_reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sp_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sp_reports_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `sp_contacts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sp_sms`
--
ALTER TABLE `sp_sms`
  ADD CONSTRAINT `sp_sms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sp_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sp_sms_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `sp_contacts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sp_templates`
--
ALTER TABLE `sp_templates`
  ADD CONSTRAINT `sp_templates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sp_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sp_update_balance`
--
ALTER TABLE `sp_update_balance`
  ADD CONSTRAINT `sp_update_balance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sp_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
