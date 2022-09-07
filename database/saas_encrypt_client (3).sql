-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 02:13 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saas_encrypt_client`
--

-- --------------------------------------------------------

--
-- Table structure for table `mscustomer`
--

CREATE TABLE `mscustomer` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `id_1` int(11) DEFAULT NULL,
  `id_2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mscustomer`
--

INSERT INTO `mscustomer` (`id`, `name`, `email`, `phone`, `address`, `zipcode`, `note`, `createdate`, `id_1`, `id_2`) VALUES
(1, 'RfGF3L5B+iE=', 'ZfGF3L4V2TbzOR8d5A6UvFM=', 'NrbdkO5QnEWlZk5E', 'ROjO/aMY2xq0Z05U5k+avExN/B6iWvQoR3ghgE6CgTrn6ylqfc60fuU=', 'P7famuY=', 'bOWKibUU3QL7ORsG', '2022-09-03 18:17:27', 227, 49024294),
(2, 'zPaf9Q==', '7Na/1UmMnyX7z1QlwEg=', 'tYnpizrTxXCrkUly', 'x9T7/WePm2SmgxQpwkrpgvIccEU=', 'vIvvjjrb', '79m/nGqegTD9zh80', '2022-09-03 18:18:09', 4678, 85747038),
(3, '6HbAZQA=', 'yHbAZQCfPXGUJLggjMCJvrxO8GE=', 'nCWfPELybybEaMk=', '4HuHRhKyLTXKcJYojM6S8qsfrj+ds5Bzptyenw1g80wQ', 'mC6WNEHx', 'y2DCdxytPTWeJYszjsyFoA==', '2022-09-03 19:05:04', 5537, 50947925),
(4, '2O3z6g==', '+O3z6nK70dne2fbFoCc=', 'rKqvsgDki4uOhek=', '0PS311eo3dbQ0rmG92p45Vpf/EYT4I3nU5s=', 'q6ujsAQ=', '/ff45xK/ycvD2rXDvQ==', '2022-09-03 19:48:15', 1631, 28540352),
(5, 'nKffow==', 'vIf/g+4jcTh9zrz0sqI=', '7dav2J99KGgg', 'lYK8qdsnaVB6zbKl7v0=', '692o2Z92', 'soH4j9wlaDw=', '2022-09-03 20:10:26', 2865, 42670327),
(6, 'FoGYdg==', 'NoGYdjgBuhFIR7HkhR8=', 'ZdrPJkpf5EgRGa60', 'GITcWw0CvhRIC/Hohx2hAhexUnzEJtn0Pp9TzjBcGHp/xZbebKY28hGzyQiTiw==', 'YNnPK0pX', NULL, '2022-09-03 20:13:55', 10547, 15260933),
(7, '+z9z', '2z9zLLtAjYb6k/Q=', 'jGIiX+4W15k=', '9Dc6KbpRoezQqLmjR5ARnBpxzmnWFXFO5w==', 'jGspVO0V', NULL, '2022-09-03 20:19:44', 9384, 15131498),
(8, 'Ba9K3cj8a7DY', 'Ja9K3ajfZr/FY6iA5A==', 'dfQUhdqBPO6dfg==', 'CaoM8oHfZvmebaWA5CYUsqgaV0jM8uE=', 'cvIZhNmI', 'LqlI0ZrYe7w=', '2022-09-03 20:26:53', 5497, 71965239),
(9, '/H69iAA8', '3F6dqCAcjo4UbkxE+b5EnNI=', 'ghnA8HRG/9tSMhw=', '8Ufd6QMAoIgFaQ0SsP5IntBWMQOAVg==', 'iR/A/XRH', '2lyWuisYq8kCdV5U//1CgQ==', '2022-09-03 20:47:25', 3230, 23097041),
(10, '4gqqOp8qllwy', 'wiqKGv8Hs3sPL2b1hw==', 'nHndQo1c6iZUMA==', '4CfEO94BuzVeIWv1hyrODtD6VA==', 'mHLVQ41c', NULL, '2022-09-03 20:48:03', 3396, 53311820),
(11, 'ZXGz', 'RVGT3LFz8c3+c6A=', 'HAfDruEkotKuLQ==', 'ZlPS1bZ8sNK9cqIsHnGeWw==', 'FA3Lreos', 'QVCW+ap85Ia9f7gyBWzTD/Q=', '2022-09-03 22:04:21', 13414, 74976888),
(12, '3Zmk0g==', '/bmE8tx3hmo5ln3NIg==', 'peXdrq4u2zA=', '3brP1/N2hiFvmHDNIuU3Kz5xDQ==', 'pOLcrK8s', '+rmL+O58nWQ=', '2022-09-03 22:09:34', 9110, 59241290),
(13, '7v0XqA==', 'zv0XqHWBJA//Nvq4+w==', 'nK5P/Q3TdlCtKg==', '7/BcglSBJESnOPe4+5lXmkoReA==', 'lKVO+QTY', NULL, '2022-09-03 23:07:41', 6331, 32679159),
(14, 'US8AhA==', 'cS8AhBi6hxlDCEStFQ==', 'L39X1WHk3U8=', 'VypEoTGyh10ZBkmtFR8uSREm0F0=', 'LHVQ2Gjn', NULL, '2022-09-03 23:17:55', 9710, 39725472),
(18, 'ePVnGq8=', 'WPVnGq/fao7KmYjrXxI=', 'BqA6TPKtM9yW', 'f/gnXov+aYvN3dP2HBO57zjBsOYH', 'BKY6SvWu', NULL, '2022-09-03 23:19:25', 3482, 35496446),
(19, '9rSc9g==', '1rSc9mssvhKw5TM9gQ==', 'ge/Boxh25U8=', '8rHS2UIstlzj+HA8g32jjFdhAbg=', 'iuzHpB9w', NULL, '2022-09-03 23:19:58', 3206, 67968891),
(20, '8cMWpklTeJE=', '0cMWxmNZeMsAOdc=', 'jJxGtTUFIt1S', '9MFfyWJeMddDONU0mikNOQ==', 'jJRMvj8P', '3Mwbpm9CYpEMO98r', '2022-09-03 23:39:04', 568, 86560217),
(21, '21IqsQ==', '+1IqsdBCesAnzvcU4w==', 'uQBj4KMGI4l90g==', 'wV90+MBTa9lu2KZIrlP6IeGVMtc=', 'ugFp66IC', NULL, '2022-09-03 23:40:44', 12065, 49870985),
(22, 'rpa7uw==', 'jpa7u8FIfDUHb6w4', 'zsTt4bkILGldcPs=', 'tpv78tNbczJOc/w=', 'zcXm5rAO', NULL, '2022-09-03 23:59:08', 732, 95483124),
(23, '1VL8hw==', '9VL8h9R/AqIvFWOD4Q==', 'sAm336Y7UuN/CDnev4id', 'zFevvf1/AqJmCSCC49zBm3FdLpOFkp2IgFMvY43yZmYvuGPb3Zs=', 'twi62qY8', NULL, '2022-09-04 00:01:54', 7142, 32055425),
(24, 'LwWrDA==', 'DwWrDJTl84h4a5fmlQ==', 'QkLnVueht84=', 'MRz/MaHl79woddTnl9/m9pJG', 'SkLsVOai', NULL, '2022-09-05 11:45:47', 14322, 70479253),
(25, '4VTX1A==', 'wVTX1MRI2efg5uCXFQ==', 'hAiPiLQNhb+2+rLJ', '/lye7+BU06626O2XWL4e', 'hQCGg7cP', '01/R3qReyP36p+6dCg==', '2022-09-05 11:49:45', 6611, 52417539),
(26, 'QMbPurq5LrHT', 'YMbPutqbIrTIEeH0SaU=', 'IJ2B5KrUe/OfDKQ=', 'fMOZg/ObJOKWH/v+V74Q3Zk=', 'J52K7as=', 'd9jcpvWALuLESublVbwHjw==', '2022-09-05 15:40:03', 3247, 81040624),
(27, 'TVUNzkKDX7QdRw==', 'bVUNzkLjbpUnZ3ByxeE=', 'KgxLnR+aIsNlIQ==', 'UFha+E3Ue550In5/xeFnnsCU', 'KwxImByR', 'e0Mf3EPOf9A3Zi1lxeFtng==', '2022-09-05 16:42:03', 2694, 28549437),
(28, '/JXm', '3JXm1W4iYr4fKL6X', 'mcO2rCl7MKFTfP8=', '45enwHUtI9EFJO2qIv8+qNJaX1A+52Eo', 'mMO+pyo=', 'yIzi5nQhZrAIOL6XI+d76w==', '2022-09-05 16:55:48', 10146, 83286108);

-- --------------------------------------------------------

--
-- Table structure for table `mscustomer_plain`
--

CREATE TABLE `mscustomer_plain` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `id_1` int(11) NOT NULL,
  `id_2` int(11) NOT NULL,
  `is_encrypted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mscustomer_plain`
--

INSERT INTO `mscustomer_plain` (`id`, `name`, `email`, `phone`, `address`, `zipcode`, `note`, `createdate`, `id_1`, `id_2`, `is_encrypted`) VALUES
(1, 'Kukuh TW', 'kukuhtw@gmail.com', '823981231200', 'Jl Tuyul 30 nomor 129 Pondok Kere Jakarta', '13430', 'bad customer', '2022-09-05 17:53:22', 227, 49024294, 0),
(2, 'ANDI', 'andi@gmail.com', '812738749234', 'Jl Andi 4 nomor 1231', '134230', 'bad customer', '2022-09-05 17:53:22', 4678, 85747038, 0),
(3, 'Bagas', 'bagas_edit@gmail.com', '62881273981', 'Jl Baru 7 nomor 9213 Pondok Kere.', '291021', 'awesome customer', '2022-09-05 17:53:22', 5537, 50947925, 0),
(4, 'Budi', 'budi@gmail.com', '62812873901', 'Jl Tetangga 8 nomor 901213', '13436', 'good customer', '2022-09-05 17:53:22', 1631, 28540352, 0),
(5, 'CICI', 'cici@gmail.com', '283219414', 'Jl Cucu	no 232', '434312', 'moderate', '2022-09-05 17:53:22', 2865, 42670327, 0),
(6, 'Didi', 'didi@gmail.com', '723929380213', 'Jl Dudidi nomor 289312  Pondok Gendut Jakarta.', '213421', '', '2022-09-05 17:53:22', 10547, 15260933, 0),
(7, 'Edi', 'edi@edi.com', '29830231', 'Jl EduEDIT 2323 nomor 224', '203831', '', '2022-09-05 17:53:22', 9384, 15131498, 0),
(8, 'Fifi Edit', 'fifi@fifi.com', '6281283713', 'Jl Fifi 2 nomor 9 Edit.', '145011', 'moderate', '2022-09-05 17:53:22', 5497, 71965239, 0),
(9, 'GUNADI', 'gunadi@gunadi.com', '92390312321', 'Jl. Gunadi 2 nomor 57.', '243402', 'awesome customer', '2022-09-05 17:53:22', 3230, 23097041, 0),
(10, 'HANI EDIT', 'hani@hani.com', '6291238321', 'Jl Hani 8 nomor 12.', '291023', '', '2022-09-05 17:53:22', 3396, 53311820, 0),
(11, 'INA', 'ina@ina.com', '0812992131', 'Jl Ina 1 nomor 1', '829121', 'moderate customer', '2022-09-05 17:53:22', 13414, 74976888, 0),
(12, 'JOKO', 'joko@joko.com', '23232321', 'Jl Joko 9 nomor 21.', '343131', 'moderate', '2022-09-05 17:53:22', 9110, 59241290, 0),
(13, 'Kaka', 'kaka@kaka.com', '9234893432', 'Jl Kaka 9 nomor 12.', '192012', '', '2022-09-05 17:53:22', 6331, 32679159, 0),
(14, 'Lidi', 'lidi@lidi.com', '29389232', 'Jl Lidi 3 nomor 123.', '134501', '', '2022-09-05 17:53:22', 9710, 39725472, 0),
(18, 'Mandi', 'mandi@mandi.co', '343242432', 'Jl. Mandi 23 nomor 2.', '123431', '', '2022-09-05 17:53:22', 3482, 35496446, 0),
(19, 'Nina', 'nina@nina.com', '92343423', 'Jl Nina 23 nomor 123', '215342', '', '2022-09-05 17:53:22', 3206, 67968891, 0),
(20, 'Oni Edit', 'oni@oni.com', '219392381', 'Jl Oni 2 nomor 2', '293838', 'bad customer', '2022-09-05 17:53:22', 568, 86560217, 0),
(21, 'Papi', 'papi@papi.com', '2398348932', 'Jl. Papi 823 nomor 2', '123320', '', '2022-09-05 17:53:22', 12065, 49870985, 0),
(22, 'Rani', 'rani@rani.co', '23838212314', 'Jl. Rani 23', '123414', '', '2022-09-05 17:53:22', 732, 95483124, 0),
(23, 'Sisi', 'sisi@sisi.com', '628127929392393', 'Jl Sisis 2 nomor 3 Pondok Sisi Jakarta', '135420', '', '2022-09-05 17:53:22', 7142, 32055425, 0),
(24, 'Tuti', 'tuti@tuti.com', '92833012', 'Jl Tuti 90 nomor 2', '123123', '', '2022-09-05 17:53:22', 14322, 70479253, 0),
(25, 'Udin', 'udin@udin.com', '081200818211', 'Jl Udin 8 no 81', '108932', 'good customer', '2022-09-05 17:53:22', 6611, 52417539, 0),
(26, 'Vivo Test', 'vivo@vivo.test', '62810901831', 'jl Vivo 1 nomor 1', '12381', 'awesome customer', '2022-09-05 17:53:22', 3247, 81040624, 0),
(27, 'Wawan EDIT', 'wawan@test.com', '0812398312', 'Jl Wawan 1 nomor 4', '182702', 'awesome customer', '2022-09-05 17:53:22', 2694, 28549437, 0),
(28, 'Una', 'una@una.test', '08192731812', 'Jl Una Ani Inu 1 nomor 7', '18921', 'awesome customer', '2022-09-05 17:53:22', 10146, 83286108, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mscustomer`
--
ALTER TABLE `mscustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mscustomer_plain`
--
ALTER TABLE `mscustomer_plain`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mscustomer`
--
ALTER TABLE `mscustomer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `mscustomer_plain`
--
ALTER TABLE `mscustomer_plain`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
