-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 09:24 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_name`
--

CREATE TABLE `client_name` (
  `c_id` int(11) NOT NULL,
  `Client_Name` varchar(25) NOT NULL,
  `Code` varchar(25) NOT NULL,
  `Contact_No` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_name`
--

INSERT INTO `client_name` (`c_id`, `Client_Name`, `Code`, `Contact_No`, `Address`) VALUES
(1, 'A', 'A01', 123456789, 'Chennai-01'),
(2, 'B', 'B02', 12345859, 'Chennai-02');

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE `descriptions` (
  `d_id` int(11) NOT NULL,
  `descriptions` longtext NOT NULL,
  `project_info_id` int(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_info`
--

CREATE TABLE `project_info` (
  `id` int(11) NOT NULL,
  `task_name` varchar(25) NOT NULL,
  `t_current_date` varchar(25) NOT NULL,
  `descriptions` varchar(25) NOT NULL,
  `task_type` varchar(25) NOT NULL,
  `client_name` varchar(25) NOT NULL,
  `response` varchar(25) NOT NULL,
  `priority_type` varchar(25) NOT NULL,
  `due_date` varchar(25) NOT NULL,
  `attache_file` varchar(25) NOT NULL,
  `hours_spend` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastupdated_on` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_name`
--

CREATE TABLE `project_name` (
  `id` int(11) NOT NULL,
  `project_name` varchar(25) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_name`
--

INSERT INTO `project_name` (`id`, `project_name`, `client_id`) VALUES
(1, 'Apple', 1),
(2, 'Banana', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_name`
--
ALTER TABLE `client_name`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `project_info`
--
ALTER TABLE `project_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_name`
--
ALTER TABLE `project_name`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_name`
--
ALTER TABLE `client_name`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_info`
--
ALTER TABLE `project_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_name`
--
ALTER TABLE `project_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
