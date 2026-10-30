-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2026 at 10:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harusi_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `weddings`
--

CREATE TABLE `weddings` (
  `id` int(11) NOT NULL,
  `couple_names` varchar(150) NOT NULL,
  `wedding_date` date NOT NULL,
  `venue` varchar(150) NOT NULL,
  `wedding_theme` varchar(100) DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weddings`
--

INSERT INTO `weddings` (`id`, `couple_names`, `wedding_date`, `venue`, `wedding_theme`, `budget`, `contact`, `created_at`) VALUES
(1, 'Alicia & Ostin', '2026-12-02', 'uhuru park', 'pink & white', 3000000.00, '0721908217', '2026-10-30 08:56:14'),
(2, 'Evans & vivian', '2026-12-15', 'westland', 'blue and black', 4300000.00, '0193285093', '2026-10-30 08:58:30'),
(3, 'Eddie marks & silvia bilda', '2026-12-28', 'brookhaven garden', 'orange & grey', 8500000.00, '0712098567', '2026-10-30 09:01:14'),
(4, 'Alexandra & Gabriela', '2026-12-18', 'Havilah cornerstone ranch', 'purple & white', 5000000.00, '0721094237', '2026-10-30 09:03:53'),
(6, 'michael & milka', '2026-03-08', 'lavel pixel garden', 'green and white', 3500000.00, '0767890125', '2026-10-30 09:16:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `weddings`
--
ALTER TABLE `weddings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `weddings`
--
ALTER TABLE `weddings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
