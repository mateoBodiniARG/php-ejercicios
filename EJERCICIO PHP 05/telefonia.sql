-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2023 a las 23:55:05
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `telefonia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumos`
--

CREATE TABLE `consumos` (
  `numlin` int(11) DEFAULT NULL,
  `feccon` date DEFAULT NULL,
  `cancon` float DEFAULT NULL,
  `concon` enum('D','T') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consumos`
--

INSERT INTO `consumos` (`numlin`, `feccon`, `cancon`, `concon`) VALUES
(1, '2023-11-20', 345, 'D'),
(1, '2023-11-12', 345, 'T'),
(1, '2023-10-19', 342.4, 'T'),
(2, '2023-12-21', 3451, 'D'),
(2, '2023-10-14', 34325, 'D'),
(3, '2023-11-19', 4500.85, 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulares`
--

CREATE TABLE `titulares` (
  `doctit` varchar(8) DEFAULT NULL,
  `nomtit` varchar(30) DEFAULT NULL,
  `demas` varchar(50) DEFAULT NULL,
  `numlin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `titulares`
--

INSERT INTO `titulares` (`doctit`, `nomtit`, `demas`, `numlin`) VALUES
('222222', 'Valentin Gimbernat', 'Datos extras de Valentin', 1),
('333333', 'Facundo Grimolisi', 'Datos extras de Facundo', 2),
('111111', 'Santiago Gonzales', 'Datos extras de Santiago', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consumos`
--
ALTER TABLE `consumos`
  ADD KEY `numlin` (`numlin`);

--
-- Indices de la tabla `titulares`
--
ALTER TABLE `titulares`
  ADD PRIMARY KEY (`numlin`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consumos`
--
ALTER TABLE `consumos`
  ADD CONSTRAINT `consumos_ibfk_1` FOREIGN KEY (`numlin`) REFERENCES `titulares` (`numlin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
