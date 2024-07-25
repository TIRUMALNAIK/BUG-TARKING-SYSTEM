-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 04:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bug-track`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `contact`, `image`, `status`, `date`) VALUES
(2, 'Admin', 'Admin Demo', 'admin@gmail.com', '8956856984', 'user/975359.png', 1, '2021-07-02 14:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(11) NOT NULL,
  `programmer_id` int(11) NOT NULL,
  `tester_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `dead_date` date NOT NULL,
  `description` text NOT NULL,
  `test_file` varchar(500) NOT NULL,
  `program_file` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `programmer_id`, `tester_id`, `project_id`, `module_id`, `dead_date`, `description`, `test_file`, `program_file`, `status`, `date`) VALUES
(1, 3, 5, 1, 2, '2021-07-14', 'This is our new Project. Submit it before dead date', 'testing/sample.pdf', 'program/bug-track (1).sql', 1, '2021-07-06 23:48:23'),
(2, 3, 4, 1, 2, '2021-07-08', 'This is our new Project. Submit it before dead date', 'testing/output-metadata.json', 'program/bug-track (1).sql', 1, '2021-07-07 11:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `branch` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `branch`, `address`, `contact`, `email`, `status`, `date`) VALUES
(4, 'Infosys', 'Mangalore', 'hampankatta, Mangalore', '8904652353', 'infosys@gmail.comd', 1, '2021-07-02 15:56:01'),
(5, 'Sun Microtech', 'Bangalore', 'Rajarajeshwari layout, Bangalore', '9787878787', 'sun@gmail.comd', 1, '2021-07-02 15:56:14'),
(6, 'Wipro', 'Mysore', 'HD Kote, Mysore', '8987652353', 'wipro@gmail.comd', 1, '2021-07-06 20:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `company_id`, `status`, `date`) VALUES
(2, 'Front-End Developer Team', 'some description', 4, 1, '2021-07-02 16:04:25'),
(3, 'Back-End Developer Team', 'some description', 5, 1, '2021-07-06 20:45:58'),
(4, 'Head Department', 'some description', 2, 1, '2021-07-06 23:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(500) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `company_id`, `department_id`, `name`, `username`, `contact`, `email`, `status`, `date`, `image`, `type`) VALUES
(3, 5, 3, 'Shantosh hks', 'Shantosh', '8956856985', 'shanthosh@gmail.comd', 1, '2021-07-05 23:07:23', 'user/test.jpg', 'Programmer'),
(4, 4, 2, 'Bharat n', 'Bharat', '8956856985', 'bharat@gmail.comd', 1, '2021-07-05 23:07:23', 'user/asas.png', 'Tester'),
(5, 5, 2, 'ajay', 'Ajay', '8904652353', 'ajay@gmail.comd', 1, '2021-07-06 21:31:03', 'user/update-concept-illustration_114360-2269-removebg-preview.png', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`, `status`, `date`) VALUES
(1, 'Admin Demo', 'MAnoj143@@1', 'Admin', 1, '2021-07-01 14:40:51'),
(2, 'Ajay', 'MAnoj143$$21', 'Manager', 1, '2021-07-01 14:40:51'),
(3, 'Shantosh', 'MAnoj143##3', 'Programmer', 1, '2021-07-01 14:40:51'),
(4, 'Bharat', 'MAnoj143%%4', 'Tester', 1, '2021-07-01 14:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `project_id`, `name`, `description`, `date`) VALUES
(2, 1, 'Transaction', 'Flow of account transaction', '2021-07-06 22:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `project_code` varchar(10) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_code`, `project_name`, `platform`, `type`, `date`, `status`) VALUES
(1, 'PROJ90431', 'E-Trans', 'Mobile Application', 'Image Processing', '2021-07-06 22:10:06', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
