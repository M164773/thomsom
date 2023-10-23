-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 07:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `thomsom_botellas`
--

CREATE TABLE `thomsom_botellas` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `hora_entrega` time NOT NULL,
  `fecha_entrega` date NOT NULL,
  `cedula_cliente` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `thomsom_botellas`
--

INSERT INTO `thomsom_botellas` (`id`, `cantidad`, `hora_entrega`, `fecha_entrega`, `cedula_cliente`) VALUES
(14, 9, '13:13:08', '2023-10-22', 4522587),
(15, 9, '13:19:34', '2023-10-22', 30010114);

-- --------------------------------------------------------

--
-- Table structure for table `thomsom_clientes`
--

CREATE TABLE `thomsom_clientes` (
  `cedula` int(8) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ubicacion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `thomsom_clientes`
--

INSERT INTO `thomsom_clientes` (`cedula`, `nombre`, `ubicacion`) VALUES
(4522587, 'Jesús Duque', 'Caracas'),
(30010114, 'José Martínez', 'Mérida');

-- --------------------------------------------------------

--
-- Table structure for table `thomsom_usuario`
--

CREATE TABLE `thomsom_usuario` (
  `usuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `thomsom_usuario`
--

INSERT INTO `thomsom_usuario` (`usuario`, `clave`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thomsom_botellas`
--
ALTER TABLE `thomsom_botellas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula_cliente` (`cedula_cliente`);

--
-- Indexes for table `thomsom_clientes`
--
ALTER TABLE `thomsom_clientes`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thomsom_botellas`
--
ALTER TABLE `thomsom_botellas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `thomsom_botellas`
--
ALTER TABLE `thomsom_botellas`
  ADD CONSTRAINT `thomsom_botellas_ibfk_1` FOREIGN KEY (`cedula_cliente`) REFERENCES `thomsom_clientes` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
