-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 07:27 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gastron`
--

-- --------------------------------------------------------

--
-- Table structure for table `gastron_client`
--

CREATE TABLE `gastron_client` (
  `id_client` int(11) NOT NULL,
  `csr_no` varchar(50) NOT NULL,
  `name_client` varchar(100) NOT NULL,
  `email_client` varchar(100) NOT NULL,
  `phone_client` varchar(100) NOT NULL,
  `address_client` varchar(100) NOT NULL,
  `city_client` varchar(100) NOT NULL,
  `state_client` varchar(100) NOT NULL,
  `zip_code_client` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gastron_client`
--

INSERT INTO `gastron_client` (`id_client`, `csr_no`, `name_client`, `email_client`, `phone_client`, `address_client`, `city_client`, `state_client`, `zip_code_client`, `created`, `updated`, `active`) VALUES
(1, 'C00001', 'syafiqah abdullah', 'stsyafiqah@gmail.com', '458232', '0139061925', 'ara damansara', 'selangor', '458232', '2018-11-26 20:54:32', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gastron_domestic`
--

CREATE TABLE `gastron_domestic` (
  `id_domestic` int(11) NOT NULL,
  `id_warr` int(11) NOT NULL,
  `inspection_no` varchar(50) NOT NULL,
  `measuring_gas` varchar(50) NOT NULL,
  `date_service` date NOT NULL,
  `test_gas` varchar(50) NOT NULL,
  `alarm_response_time` varchar(50) NOT NULL,
  `alarm_signal_output` varchar(50) NOT NULL,
  `power_test` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gastron_domestic`
--

INSERT INTO `gastron_domestic` (`id_domestic`, `id_warr`, `inspection_no`, `measuring_gas`, `date_service`, `test_gas`, `alarm_response_time`, `alarm_signal_output`, `power_test`, `created`) VALUES
(1, 1, '0000012', '11111112', '2018-12-13', '30%', '14', 'drys', '15%', '2018-12-04 14:49:25'),
(2, 4, '00000123', '111111123', '2018-12-21', '40%', '15', 'drying', '10%', '2018-12-05 07:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `gastron_fixed`
--

CREATE TABLE `gastron_fixed` (
  `id_fixed` int(11) NOT NULL,
  `id_warrs` int(11) NOT NULL,
  `cal_date` date NOT NULL,
  `due_date` date NOT NULL,
  `instruction_from` varchar(50) NOT NULL,
  `instruction_on` varchar(50) NOT NULL,
  `service_details` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `gas_type` varchar(50) NOT NULL,
  `sensor_date` varchar(50) NOT NULL,
  `detector_serial_no` varchar(50) NOT NULL,
  `batt_voltage` varchar(50) NOT NULL,
  `detector` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `cal_gas` varchar(50) NOT NULL,
  `density_lel` varchar(50) NOT NULL,
  `full_range` varchar(50) NOT NULL,
  `zero_before` varchar(50) NOT NULL,
  `zero_after` varchar(50) NOT NULL,
  `span_before` varchar(50) NOT NULL,
  `span_after` varchar(50) NOT NULL,
  `one_alarm` varchar(50) NOT NULL,
  `two_alarm` varchar(50) NOT NULL,
  `three_alarm` varchar(50) NOT NULL,
  `sensor_grade` varchar(50) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gastron_fixed`
--

INSERT INTO `gastron_fixed` (`id_fixed`, `id_warrs`, `cal_date`, `due_date`, `instruction_from`, `instruction_on`, `service_details`, `location`, `gas_type`, `sensor_date`, `detector_serial_no`, `batt_voltage`, `detector`, `receiver`, `cal_gas`, `density_lel`, `full_range`, `zero_before`, `zero_after`, `span_before`, `span_after`, `one_alarm`, `two_alarm`, `three_alarm`, `sensor_grade`, `remark`, `created`) VALUES
(1, 8, '2018-12-06', '2018-12-13', 'sya', 'fiqah', 'monthly service', 'ballroom kitchen', 'gas_type', '[\"2018-12-04\",\"2018-12-20\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"', '[\"GD3\",\"GD2\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"24\",\"24\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"GTD6000EX\",\"GTD6000EX\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"GTC200A\",\"GTC200A\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"IC4H10\",\"IC4H10\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"0-50%LEL\",\"0-50%LEL\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"0-100%LEL\",\"0-100%LEL\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"0\",\"0\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"0\",\"0\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"9\",\"9\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"50\",\"50\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"20\",\"20\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"40\",\"40\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"20\",\"20\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"C\",\"C\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', 'ALL GRADE C SENDOR NEED TO CHNAGE ON NEXT SERVICE testing', '2018-12-06 10:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `gastron_model`
--

CREATE TABLE `gastron_model` (
  `id_model` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `code_model` varchar(100) NOT NULL,
  `desc_model` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gastron_model`
--

INSERT INTO `gastron_model` (`id_model`, `id_products`, `code_model`, `desc_model`, `created`, `updated`, `active`) VALUES
(1, 2, 'GTD6000EX', 'GTD6000EX', '2018-11-26 21:57:42', '0000-00-00 00:00:00', 1),
(2, 2, 'GTD2000EX', 'GTD2000EX', '2018-11-26 22:00:28', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gastron_portable`
--

CREATE TABLE `gastron_portable` (
  `id_portable` int(11) NOT NULL,
  `id_warrantys` int(11) NOT NULL,
  `comp_1` varchar(50) NOT NULL,
  `conc_1` varchar(50) NOT NULL,
  `mole_1` varchar(50) NOT NULL,
  `comp_2` varchar(50) NOT NULL,
  `conc_2` varchar(50) NOT NULL,
  `mole_2` varchar(50) NOT NULL,
  `comp_3` varchar(50) NOT NULL,
  `conc_3` varchar(50) NOT NULL,
  `mole_3` varchar(50) NOT NULL,
  `comp_4` varchar(50) NOT NULL,
  `conc_4` varchar(50) NOT NULL,
  `mole_4` varchar(50) NOT NULL,
  `comp_5` varchar(50) NOT NULL,
  `conc_5` varchar(50) NOT NULL,
  `mole_5` varchar(50) NOT NULL,
  `comp_6` varchar(50) NOT NULL,
  `conc_6` varchar(50) NOT NULL,
  `mole_6` varchar(50) NOT NULL,
  `comp_7` varchar(50) NOT NULL,
  `conc_7` varchar(50) NOT NULL,
  `mole_7` varchar(50) NOT NULL,
  `gas_1` varchar(50) NOT NULL,
  `high_1` varchar(50) NOT NULL,
  `low_1` varchar(50) NOT NULL,
  `twa_1` varchar(50) NOT NULL,
  `stel_1` varchar(50) NOT NULL,
  `gas_2` varchar(50) NOT NULL,
  `high_2` varchar(50) NOT NULL,
  `low_2` varchar(50) NOT NULL,
  `twa_2` varchar(50) NOT NULL,
  `stel_2` varchar(50) NOT NULL,
  `gas_3` varchar(50) NOT NULL,
  `high_3` varchar(50) NOT NULL,
  `low_3` varchar(50) NOT NULL,
  `twa_3` varchar(50) NOT NULL,
  `stel_3` varchar(50) NOT NULL,
  `gas_4` varchar(50) NOT NULL,
  `high_4` varchar(50) NOT NULL,
  `low_4` varchar(50) NOT NULL,
  `twa_4` varchar(50) NOT NULL,
  `stel_4` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gastron_portable`
--

INSERT INTO `gastron_portable` (`id_portable`, `id_warrantys`, `comp_1`, `conc_1`, `mole_1`, `comp_2`, `conc_2`, `mole_2`, `comp_3`, `conc_3`, `mole_3`, `comp_4`, `conc_4`, `mole_4`, `comp_5`, `conc_5`, `mole_5`, `comp_6`, `conc_6`, `mole_6`, `comp_7`, `conc_7`, `mole_7`, `gas_1`, `high_1`, `low_1`, `twa_1`, `stel_1`, `gas_2`, `high_2`, `low_2`, `twa_2`, `stel_2`, `gas_3`, `high_3`, `low_3`, `twa_3`, `stel_3`, `gas_4`, `high_4`, `low_4`, `twa_4`, `stel_4`, `created`) VALUES
(1, 3, 'HYDROGEN SULFIDE', '25PPM1', 'H2S1', 'CARBON MONOXIDE', '26PPM1', 'CO1', 'METHANE', '2.51%(50%LEL)', 'CH41', 'OXYGEN', '119%', 'O21', 'NITROGEN', 'BALANCE1', 'N21', 'OXYGEN', '201%', 'O21', 'NITROGEN', 'NO BALANCE1', 'N21', 'H2S1', '101', '151', '101', '151', 'CO1', '351', '1001', '351', '1001', 'O21', '23.51', '19.51', '', '', 'LEL1', '101', '201', '', '', '2018-12-04 12:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `gastron_product`
--

CREATE TABLE `gastron_product` (
  `id_product` int(11) NOT NULL,
  `code_product` varchar(100) NOT NULL,
  `desc_product` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gastron_product`
--

INSERT INTO `gastron_product` (`id_product`, `code_product`, `desc_product`, `created`, `updated`, `active`) VALUES
(1, 'CH4 DETECTION SYSTEM', 'CH4 DETECTION SYSTEM', '2018-11-26 21:22:16', '0000-00-00 00:00:00', 1),
(2, 'CH8 DETECTION SYSTEM', 'CH8 DETECTION SYSTEM', '2018-11-26 22:00:18', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gastron_technician`
--

CREATE TABLE `gastron_technician` (
  `id_technician` int(11) NOT NULL,
  `name_technician` varchar(50) NOT NULL,
  `phone_technician` varchar(50) NOT NULL,
  `email_technician` varchar(50) NOT NULL,
  `password_technician` varchar(255) NOT NULL,
  `sign_technician` text NOT NULL,
  `type_technician` varchar(50) NOT NULL DEFAULT 'Technician',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gastron_technician`
--

INSERT INTO `gastron_technician` (`id_technician`, `name_technician`, `phone_technician`, `email_technician`, `password_technician`, `sign_technician`, `type_technician`, `created`, `updated`, `active`) VALUES
(1, 'admin', '123', 'admin@gmail.com', 'VUFtSThRL1VhSU1UUUcrZHd5bnNhZz09', '', 'Admin', '2018-11-26 07:17:40', '0000-00-00 00:00:00', 1),
(2, 'wdwe', '0139087213', 'abu@gmail.com', 'VjRsNVhlcm1rT1NUQWZ1ZGtlS0xoZz09', 'd38ca40f0c94ea43627c75317068d26a', 'Technician', '2018-11-30 07:33:17', '0000-00-00 00:00:00', 1),
(3, 'ali', '12345666', 'ali@gmail.com', 'ZVoySUhSK1gxVE00dEJsREROdjNDQT09', '', 'Technician', '2018-12-02 06:40:46', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gastron_warranty`
--

CREATE TABLE `gastron_warranty` (
  `id_warranty` int(11) NOT NULL,
  `year_warranty` varchar(50) NOT NULL,
  `product_warranty` varchar(50) NOT NULL,
  `model_warranty` varchar(50) NOT NULL,
  `client_warranty` int(11) NOT NULL,
  `location_warranty` varchar(50) NOT NULL,
  `next_service_warranty` date NOT NULL,
  `start_date_warranty` date NOT NULL,
  `serial_no_warranty` varchar(50) NOT NULL,
  `type_warranty` varchar(50) NOT NULL,
  `technician_warranty` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gastron_warranty`
--

INSERT INTO `gastron_warranty` (`id_warranty`, `year_warranty`, `product_warranty`, `model_warranty`, `client_warranty`, `location_warranty`, `next_service_warranty`, `start_date_warranty`, `serial_no_warranty`, `type_warranty`, `technician_warranty`, `status`, `created`, `updated`, `active`) VALUES
(1, '3', '1', '2', 1, 'SECRECT RECIPE @ NU SENTRAL', '2018-11-27', '0000-00-00', 'K000000001', 'Domestic', '1', 1, '2018-11-27 06:57:54', '0000-00-00 00:00:00', 1),
(2, '3', '1', '', 1, 'SECRECT RECIPE @ SETAPAK', '2018-11-28', '0000-00-00', 'K000000002', 'Fixed', '1', 0, '2018-11-27 07:07:25', '0000-00-00 00:00:00', 1),
(3, '4', '1', '2', 1, 'OASIS SQUARE @ ARA DAMANSARA', '2018-11-27', '0000-00-00', 'K000000003', 'Portable', '1', 1, '2018-11-27 07:07:46', '0000-00-00 00:00:00', 1),
(4, '5', '2', '1', 1, 'BATU FERINGGI BEACH', '2018-12-20', '0000-00-00', 'K000000004', 'Domestic', '2', 1, '2018-12-02 06:40:10', '0000-00-00 00:00:00', 1),
(5, '5', '2', '3', 1, 'MCD @ NU SENTRAL', '2018-12-28', '2018-12-28', 'k0000123', 'Domestic', '3', 0, '2018-12-04 02:15:34', '0000-00-00 00:00:00', 1),
(6, '4', '2', 'undefined', 1, 'MCD @ NU SENTRAL4', '2018-12-29', '2018-12-29', 'GD2', 'Fixed', '2', 0, '2018-12-04 10:24:07', '0000-00-00 00:00:00', 1),
(7, '4', '2', 'undefined', 1, '', '2018-12-20', '2018-12-29', 'GD2,GD3', 'Fixed', '1', 0, '2018-12-04 10:24:29', '0000-00-00 00:00:00', 1),
(8, '5', '2', '1', 1, 'MCD @ NU SENTRAL', '2018-12-08', '2018-12-28', '[\"GD3\",\"GD2\"]', 'Fixed', '2', 1, '2018-12-04 11:58:00', '0000-00-00 00:00:00', 1),
(9, '6', '2', '1', 1, 'MCD @ NU SENTRAL2', '2018-12-21', '2018-12-15', '[\"GD 1\",\"GD 5\"]', 'Fixed', '2', 0, '2018-12-05 04:20:20', '0000-00-00 00:00:00', 1),
(10, '6', '2', '2', 1, 'MCD @ NU SENTRAL', '2018-12-22', '2018-12-27', '[\"GD2\"]', 'Domestic', '3', 0, '2018-12-05 04:21:11', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gastron_client`
--
ALTER TABLE `gastron_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `gastron_domestic`
--
ALTER TABLE `gastron_domestic`
  ADD PRIMARY KEY (`id_domestic`);

--
-- Indexes for table `gastron_fixed`
--
ALTER TABLE `gastron_fixed`
  ADD PRIMARY KEY (`id_fixed`);

--
-- Indexes for table `gastron_model`
--
ALTER TABLE `gastron_model`
  ADD PRIMARY KEY (`id_model`);

--
-- Indexes for table `gastron_portable`
--
ALTER TABLE `gastron_portable`
  ADD PRIMARY KEY (`id_portable`);

--
-- Indexes for table `gastron_product`
--
ALTER TABLE `gastron_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `gastron_technician`
--
ALTER TABLE `gastron_technician`
  ADD PRIMARY KEY (`id_technician`);

--
-- Indexes for table `gastron_warranty`
--
ALTER TABLE `gastron_warranty`
  ADD PRIMARY KEY (`id_warranty`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gastron_client`
--
ALTER TABLE `gastron_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gastron_domestic`
--
ALTER TABLE `gastron_domestic`
  MODIFY `id_domestic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gastron_fixed`
--
ALTER TABLE `gastron_fixed`
  MODIFY `id_fixed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gastron_model`
--
ALTER TABLE `gastron_model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gastron_portable`
--
ALTER TABLE `gastron_portable`
  MODIFY `id_portable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gastron_product`
--
ALTER TABLE `gastron_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gastron_technician`
--
ALTER TABLE `gastron_technician`
  MODIFY `id_technician` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gastron_warranty`
--
ALTER TABLE `gastron_warranty`
  MODIFY `id_warranty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
