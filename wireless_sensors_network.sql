-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2023 at 03:19 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u398174963_cfm`
--

-- --------------------------------------------------------

--
-- Table structure for table `wireless_sensors_network`
--

CREATE TABLE `wireless_sensors_network` (
  `id` int(11) NOT NULL,
  `devicetype` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `macaddress` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `regtime` datetime NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `configtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `repeaterid` int(11) NOT NULL,
  `deviceconfigrequired` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wireless_sensors_network`
--

INSERT INTO `wireless_sensors_network` (`id`, `devicetype`, `macaddress`, `regtime`, `name`, `location`, `configtime`, `updatetime`, `repeaterid`, `deviceconfigrequired`) VALUES
(1, 'repeater-node', 'C4:5B:BE:70:D0:A2', '2023-01-27 08:08:15', 'R1', 'Division A', '2023-01-27 08:46:21', '2023-01-27 08:46:37', 5, 0),
(2, 'repeater-node', '84:CC:A8:88:7A:78', '2023-01-27 08:14:34', 'R2', 'Utilities', '2023-01-27 08:46:05', '2023-01-27 08:46:37', 5, 0),
(3, 'sensor-node', '5C:CF:7F:57:26:FE', '2023-01-27 08:20:47', 'DHT22', 'Utilities', '2023-01-27 08:45:56', '2023-01-27 08:46:34', 2, 0),
(4, 'sensor-node', '30:83:98:80:04:84', '2023-01-27 08:24:08', 'DHT11', 'Division A', '2023-01-27 08:46:17', '2023-01-27 08:46:39', 1, 0),
(5, 'coordinator-node', 'E8:68:E7:CE:30:DD', '2023-01-27 08:31:44', 'Coordinator', '', '2023-01-27 08:31:44', '2023-01-27 08:31:44', -1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wireless_sensors_network`
--
ALTER TABLE `wireless_sensors_network`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wireless_sensors_network`
--
ALTER TABLE `wireless_sensors_network`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
