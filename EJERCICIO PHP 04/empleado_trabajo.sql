-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2023 a las 23:34:56
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
-- Base de datos: `empleado_trabajo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Nombre` varchar(30) DEFAULT NULL,
  `Documento` varchar(8) DEFAULT NULL,
  `EstadoCivil` varchar(15) DEFAULT NULL,
  `CantidadHijos` int(11) DEFAULT NULL,
  `NumeroEmpleado` int(11) NOT NULL,
  `ValorHora` float DEFAULT NULL,
  `Actualizado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Nombre`, `Documento`, `EstadoCivil`, `CantidadHijos`, `NumeroEmpleado`, `ValorHora`, `Actualizado`) VALUES
('Sartre', '12345678', 'Casado', 2, 101, 10.5, 'SI'),
('Socrates', '87654321', 'Soltero', 0, 102, 12, 'SI'),
('Platon', '98765432', 'Casado', 3, 103, 11.2, 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `NumeroEmpleado` int(11) DEFAULT NULL,
  `FechaTrabajo` datetime DEFAULT NULL,
  `CantidadHorasTrabajadas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`NumeroEmpleado`, `FechaTrabajo`, `CantidadHorasTrabajadas`) VALUES
(101, '2023-11-25 08:00:00', 8),
(102, '2023-12-26 09:30:00', 6),
(103, '2023-10-27 07:45:00', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`NumeroEmpleado`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD KEY `NumeroEmpleado` (`NumeroEmpleado`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `trabajo_ibfk_1` FOREIGN KEY (`NumeroEmpleado`) REFERENCES `empleado` (`NumeroEmpleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
