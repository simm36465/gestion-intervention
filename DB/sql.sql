-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 04:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `token`, `username`, `pwd`) VALUES
(1, '2934460cb51b597742dd1d911967bf7c_1634122646', 'admin', '$2y$12$kj2Y/m1zrKxwdRoX3UABkuJasmXZ6MF0zowq0YVYwPFj49BhKBryS');

-- --------------------------------------------------------

--
-- Table structure for table `interventions`
--

CREATE TABLE `interventions` (
  `id` int(11) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `heurdatage` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `urgence` varchar(255) NOT NULL,
  `demandeur` varchar(255) NOT NULL,
  `impact` varchar(255) NOT NULL,
  `intertype` text NOT NULL,
  `intervenant` text NOT NULL,
  `element_associe` varchar(255) NOT NULL,
  `creation_date` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `interdescription` varchar(255) NOT NULL,
  `observation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interventions`
--

INSERT INTO `interventions` (`id`, `ref`, `heurdatage`, `categorie`, `statut`, `urgence`, `demandeur`, `impact`, `intertype`, `intervenant`, `element_associe`, `creation_date`, `lieu`, `titre`, `interdescription`, `observation`) VALUES
(15, 'rENYbA', '2021-10-27 12:43', 'Système > Active Directory', 'Résolu', 'Moyenne', 'Tori Frank', 'Moyenne', 'Incident', 'Mohammed LAKSIR', 'Général', '27/10/2021 12:43', 'Direction régionale de Casablanca', 'testing', '<ul>\n<li>testing</li>\n<li>testing</li>\n<li>testing</li>\n</ul>', '<ul>\n<li>testing</li>\n<li>testing</li>\n<li>testing</li>\n<li>testing</li>\n<li>testing</li>\n</ul>'),
(16, 'yVhkSM', '2021-10-27 14:13', 'Système > Téléphonie IP', 'Résolu', 'Haute', 'Annabell Stott', 'Haute', 'Demande', 'Mohammed LAKSIR', 'Logiciel', '27/10/2021 02:13', 'Administration Centrale', 'test test', '<p>test test</p>', '<ul>\n<li>test test</li>\n<li>test test</li>\n</ul>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interventions`
--
ALTER TABLE `interventions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interventions`
--
ALTER TABLE `interventions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
