-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 07:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(15) NOT NULL,
  `a_name` varchar(30) DEFAULT NULL,
  `a_email` varchar(30) DEFAULT NULL,
  `a_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `a_id` int(30) NOT NULL,
  `p_id` int(30) NOT NULL,
  `a_NO` int(5) NOT NULL,
  `sch_id` int(10) NOT NULL,
  `a_date` date NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Approval pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`a_id`, `p_id`, `a_NO`, `sch_id`, `a_date`, `status`) VALUES
(2, 22, 2, 4, '2023-02-15', 'Approved'),
(3, 20, 3, 4, '2023-03-22', 'Your Appointment Has been Cancelled'),
(4, 19, 1, 3, '0000-00-00', 'Approval pending');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `h_id` int(30) NOT NULL,
  `h_email` varchar(30) NOT NULL,
  `h_name` varchar(60) NOT NULL,
  `h_password` varchar(100) NOT NULL,
  `h_nic` varchar(30) NOT NULL,
  `h_contect` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`h_id`, `h_email`, `h_name`, `h_password`, `h_nic`, `h_contect`) VALUES
(1, 'aghakhan@gmail.com', 'Agha Khan Hospital', '123', '42101789562', '03111666666'),
(2, 'Saifee@gmail.com', 'Safiee Hospital', '123', '4511111033', '0300984512'),
(3, 'civil@gmail.com', 'CIvil Hospital', '123', '4210178923', '0308052149'),
(4, 'Liaquat@gmail.com', 'Liaquat National Hospital', '123', '4511115654', '0300990776'),
(5, 'southcity@gmail.com', 'South City Hospital', '123', '42101-1234445-5', '03080408601');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(250) NOT NULL,
  `p_email` varchar(30) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_password` varchar(100) NOT NULL,
  `p_address` varchar(100) NOT NULL,
  `P_nic` varchar(30) NOT NULL,
  `p_dob` date NOT NULL,
  `p_contect` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `p_email`, `p_name`, `p_password`, `p_address`, `P_nic`, `p_dob`, `p_contect`) VALUES
(12, 'misbah@gmail.com', 'misbah', '123', '#karachi', ' 4343-4343434-3', '0000-00-00', '4654454'),
(17, 'farah@gmail.com', 'farah', '123', '#karachi', '42020-23344455-2', '2015-02-21', '03051146466'),
(18, 'baseer@gmail.com', 'baseer', '123', '#karachi', '42020-23344455-2', '2015-02-21', '43545656'),
(19, 'hania@gmail.com', 'hania', '123', 'Chichawatni', '42020-23344455-5', '2014-02-20', '5454545445'),
(20, 'usman@gmail.com', 'usman', '123', '#karachi', ' 4332-343434-3', '2022-05-11', '3434343'),
(21, 'sana@gmail.com', 'sana', '123', '#karachi', '4343-4343433-2', '2022-08-08', '453454454'),
(22, 'haider@gmail.com', 'Haider', '123', 'Karachi', '42101-1234445-5', '2023-01-31', '0316466565'),
(23, 'hassankhan2913@gmail.com', 'hassan', '123', '#karachi', '42101-1234445-5', '2023-02-03', '0316466565');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sch_id` int(15) NOT NULL,
  `h_id` varchar(111) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sch_date` date NOT NULL,
  `sch_time` time NOT NULL,
  `No_p` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sch_id`, `h_id`, `title`, `sch_date`, `sch_time`, `No_p`) VALUES
(3, '1', 'Covid Test', '2023-02-08', '15:03:39', 10),
(4, '2', 'Covid vaccination', '2023-02-08', '15:03:39', 12),
(18, '2', 'Covid Test', '2023-02-10', '20:48:00', 4),
(19, '1', 'Covid Vaccination', '2023-02-02', '11:22:00', 20),
(21, '4', 'Covid Test', '2023-03-10', '01:46:00', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rep_track`
--

CREATE TABLE `tbl_rep_track` (
  `id` int(11) NOT NULL,
  `order_No` bigint(50) NOT NULL,
  `Remark` varchar(255) NOT NULL,
  `status` varchar(150) NOT NULL,
  `posting_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Remark_By` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_record`
--

CREATE TABLE `tbl_test_record` (
  `id` int(15) NOT NULL,
  `order_No` bigint(15) NOT NULL,
  `p_mob_No` bigint(15) NOT NULL,
  `test_type` varchar(100) NOT NULL,
  `test_time_slot` varchar(150) NOT NULL,
  `Report_status` varchar(120) NOT NULL,
  `final_report` varchar(150) NOT NULL,
  `Rep_uploadtime` varchar(200) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `assigned_Emp_id` varchar(150) NOT NULL,
  `assign_name` varchar(200) NOT NULL,
  `assigned_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `vaccine_id` int(15) NOT NULL,
  `h_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `No_p` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`vaccine_id`, `h_id`, `title`, `No_p`) VALUES
(1, 1, 'Pfizer', 12),
(2, 2, 'SinoVAc', 10);

-- --------------------------------------------------------

--
-- Table structure for table `web_user`
--

CREATE TABLE `web_user` (
  `email` varchar(255) NOT NULL,
  `user_type` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_user`
--

INSERT INTO `web_user` (`email`, `user_type`) VALUES
('admin@gmail.com', 'a'),
('aghakhan@gmail.com', 'h'),
('baseer@gmail.com', 'p'),
('civil@gmail.com', 'h'),
('hania@gmail.com', 'p'),
('Liaquat@gmail.com', 'h'),
('Saifee@gmail.com', 'h'),
('sana@gmail.com', 'p'),
('southcity@gmail.com', 'h'),
('usman@gmail.com', 'p');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `sch_id` (`sch_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sch_id`),
  ADD KEY `foreignkey` (`h_id`);

--
-- Indexes for table `tbl_rep_track`
--
ALTER TABLE `tbl_rep_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_test_record`
--
ALTER TABLE `tbl_test_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`vaccine_id`),
  ADD KEY `h_id` (`h_id`);

--
-- Indexes for table `web_user`
--
ALTER TABLE `web_user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `a_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `h_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sch_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_rep_track`
--
ALTER TABLE `tbl_rep_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_test_record`
--
ALTER TABLE `tbl_test_record`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `vaccine_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `ff` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kk` FOREIGN KEY (`sch_id`) REFERENCES `schedule` (`sch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD CONSTRAINT `Doc` FOREIGN KEY (`h_id`) REFERENCES `hospital` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
