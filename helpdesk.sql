-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 10:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityID` int(11) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityID`, `city`) VALUES
(1, 'Arnhem'),
(2, 'Nijmegen'),
(3, 'Amsterdam');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `adress` varchar(250) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `FK_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `name`, `adress`, `postalcode`, `phonenumber`, `FK_city`) VALUES
(4, 'Hans', 'Hanzestraat', '4321AQ', '0612345678', 1),
(10, 'gert', 'sdfghjk', '1234qw', '0687654321', 1),
(11, 'Ruben', 'sdfghj', '1234as', '0687654321', 2),
(12, 'Test', 'Test', '1234TT', '0687654321', 2),
(14, 'Pieter', 'asdfghjkl', '1234qw', '0612345678', 2),
(15, 'Pieter', 'zypendaalseweg 167', '7894 A', '0612378456', 1),
(17, 'Rob', 'Hanzestraat', '7894AB', '0612345678', 2);

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `priorityID` int(11) NOT NULL,
  `priority_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`priorityID`, `priority_name`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High'),
(4, 'Critical');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL,
  `roletype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `roletype`) VALUES
(1, 'user'),
(2, 'employee'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `ticket_type` int(11) NOT NULL DEFAULT 1,
  `ticket_name` varchar(255) NOT NULL,
  `ticket_content` varchar(255) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `ticket_status` int(11) NOT NULL DEFAULT 1,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketID`, `userID`, `email`, `customer_name`, `ticket_type`, `ticket_name`, `ticket_content`, `employeeID`, `ticket_status`, `date_time`, `priority`) VALUES
(10, 22, 'admin', 'Hans', 2, 'sefsfsefsgrh', 'shtrthrtrthtrtt', 0, 1, '0000-00-00 00:00:00', 1),
(14, 22, 'admin', 'Hans', 1, 'test3662y45', 'ytageugfiaf;', 29, 3, '0000-00-00 00:00:00', 4),
(15, 22, 'admin', 'Hans', 1, 'ddwadwwd', 'dawdwawa', 32, 2, '0000-00-00 00:00:00', 1),
(17, 22, 'admin', 'Hans', 1, 'Test', 'Test', 29, 2, '0000-00-00 00:00:00', 1),
(18, 22, 'admin', 'Hans', 1, 'test', 'test', 29, 2, '0000-00-00 00:00:00', 1),
(26, 33, 'user@gmail.com', 'Marvin', 2, 'Website brokey', 'Geen idee', 0, 1, '2021-01-02 20:06:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_actions`
--

CREATE TABLE `ticket_actions` (
  `ticketID` int(11) NOT NULL,
  `action_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `change_state` varchar(255) NOT NULL,
  `change_employee` varchar(255) NOT NULL,
  `change_priority` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_actions`
--

INSERT INTO `ticket_actions` (`ticketID`, `action_time`, `change_state`, `change_employee`, `change_priority`) VALUES
(14, '2021-01-02 20:07:28', '', '', ''),
(14, '2021-01-02 20:27:48', 'TICKET STATE CHANGED TO \"Being worked on.\"', '29', ''),
(14, '2021-01-02 20:53:48', 'From EMPTY to \"Being worked on.\"', '29', ''),
(14, '2021-01-02 20:54:41', 'State got reset', '29', ''),
(14, '2021-01-02 21:02:20', 'From EMPTY to \"Being worked on.\"', '29', ''),
(14, '2021-01-02 21:03:05', 'State got reset', '29', ''),
(14, '2021-01-02 21:03:48', 'State got reset', ' changed to EMPTY', ''),
(14, '2021-01-02 21:04:06', 'From EMPTY to \"Being worked on.\"', '29', ''),
(14, '2021-01-02 21:04:08', 'State got reset', ' changed to EMPTY', ''),
(14, '2021-01-02 21:09:04', 'From EMPTY to \"Being worked on.\"', '29', ''),
(14, '2021-01-02 21:09:07', 'State got reset', 'Array changed to EMPTY', ''),
(14, '2021-01-02 21:09:40', 'From EMPTY to \"Being worked on.\"', '29', ''),
(14, '2021-01-02 21:09:42', 'State got reset', '29 changed to EMPTY', ''),
(14, '2021-01-02 21:09:55', 'From EMPTY to \"Being worked on.\"', '29', ''),
(14, '2021-01-02 21:09:57', 'State got reset', '29 changed to EMPTY', ''),
(14, '2021-01-02 21:49:00', 'From EMPTY to \"Being worked on.\"', '29', ''),
(18, '2021-01-02 21:50:35', 'State got reset to \"Open\"', '32 changed to EMPTY', ''),
(18, '2021-01-02 21:50:38', 'From EMPTY to \"Being worked on.\"', '29', ''),
(18, '2021-01-02 22:04:38', 'State got reset to \"Open\"', '29 changed to EMPTY', ''),
(18, '2021-01-05 19:22:09', 'From EMPTY to \"Being worked on.\"', '29', ''),
(14, '2021-01-05 19:39:08', 'State got reset to \"Open\"', '29 changed to EMPTY', ''),
(14, '2021-01-05 19:40:50', 'From EMPTY to \"Being worked on.\"', '29', '');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status`
--

CREATE TABLE `ticket_status` (
  `statusID` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_status`
--

INSERT INTO `ticket_status` (`statusID`, `status`) VALUES
(1, 'Open'),
(2, 'Being worked on'),
(3, 'Stuck'),
(4, 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_type`
--

CREATE TABLE `ticket_type` (
  `typeID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_type`
--

INSERT INTO `ticket_type` (`typeID`, `type`) VALUES
(1, 'Support ticket'),
(2, 'Complaint');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_views`
--

CREATE TABLE `ticket_views` (
  `ticketID` int(11) NOT NULL,
  `ticket_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_views`
--

INSERT INTO `ticket_views` (`ticketID`, `ticket_views`) VALUES
(14, 140),
(15, 5),
(17, 1),
(18, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `FK_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `password`, `FK_role`) VALUES
(29, 'admin@gmail.com', '$2y$10$iMXzEDtw/iLCgbiw7lnHDepIYWQrmKzLlqK1pIgLpw1kbA2v4hwPG', 3),
(32, 'employee@gmail.com', '$2y$10$SvuKyFZN4Bx/68t0eESYi.b163hFG0hdV36WAgXal6QfFXZDhZ9BC', 2),
(33, 'user@gmail.com', '$2y$10$q7Bky6w/mVd9S7Ibnb9.4uOZudfE5WSFBItsENHcU9IjyPJjd5EoW', 1),
(35, 'admin2@gmail.com', '$2y$10$2dotT2qffwZDdIamUsneGecnuu.ElBjPjdxbgyIZvF7c9JUZHZDMq', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_customer`
--

CREATE TABLE `user_customer` (
  `userID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_customer`
--

INSERT INTO `user_customer` (`userID`, `customerID`) VALUES
(29, 11),
(32, 14),
(33, 15),
(35, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `city` (`FK_city`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`priorityID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`),
  ADD KEY `ticket_state` (`ticket_status`),
  ADD KEY `ticket_type` (`ticket_type`),
  ADD KEY `userID` (`userID`),
  ADD KEY `ticket_priority` (`priority`);

--
-- Indexes for table `ticket_status`
--
ALTER TABLE `ticket_status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `ticket_type`
--
ALTER TABLE `ticket_type`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roles` (`FK_role`);

--
-- Indexes for table `user_customer`
--
ALTER TABLE `user_customer`
  ADD KEY `usrID` (`userID`),
  ADD KEY `cstmrID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `priorityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_type`
--
ALTER TABLE `ticket_type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `city` FOREIGN KEY (`FK_city`) REFERENCES `city` (`cityID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `ticket_priority` FOREIGN KEY (`priority`) REFERENCES `priorities` (`priorityID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ticket_state` FOREIGN KEY (`ticket_status`) REFERENCES `ticket_status` (`statusID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ticket_type` FOREIGN KEY (`ticket_type`) REFERENCES `ticket_type` (`typeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roles` FOREIGN KEY (`FK_role`) REFERENCES `roles` (`roleID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_customer`
--
ALTER TABLE `user_customer`
  ADD CONSTRAINT `cstmrID` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usrID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
