-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2023 a las 22:20:19
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
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `AluNombre` varchar(30) DEFAULT NULL,
  `AluLegajo` int(11) DEFAULT NULL,
  `AluOtrosDatos` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`AluNombre`, `AluLegajo`, `AluOtrosDatos`) VALUES
('Juan Perez', 1, 'Fecha de nacimiento: 1995-05-10'),
('Maria Rodriguez', 2, 'Fecha de nacimiento: 1994-08-15'),
('Luis Sanchez', 3, 'Fecha de nacimiento: 1996-02-20'),
('Lautaro Dupuy', 4, 'Fecha de nacimiento: 1997-07-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `AsiAsignatura` int(11) DEFAULT NULL,
  `AsiNombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`AsiAsignatura`, `AsiNombre`) VALUES
(1, 'Matemáticas'),
(2, 'Historia'),
(3, 'Lengua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `DocDocente` varchar(8) DEFAULT NULL,
  `DocNombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`DocDocente`, `DocNombre`) VALUES
('999999', 'Profesor Martin'),
('888888', 'Profesora Julieta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `ExaFecha` datetime DEFAULT NULL,
  `AluLegajo` int(11) DEFAULT NULL,
  `DocDocente` varchar(8) DEFAULT NULL,
  `ExaNota` decimal(5,2) DEFAULT NULL,
  `AsiAsignatura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`ExaFecha`, `AluLegajo`, `DocDocente`, `ExaNota`, `AsiAsignatura`) VALUES
('2023-10-23 10:00:00', 1, '999999', 8.50, 1),
('2023-11-23 14:30:00', 2, '999999', 7.00, 1),
('2023-11-28 09:15:00', 1, '888888', 9.00, 2),
('2023-12-15 11:30:00', 3, '888888', 7.50, 2),
('2023-12-20 13:45:00', 4, '999999', 6.00, 1),
('2023-12-25 10:00:00', 3, '888888', 8.00, 2),
('2023-12-30 15:30:00', 5, '888888', 4.00, 2),
('2024-01-05 14:00:00', 6, '999999', 3.50, 1),
('2024-01-10 09:00:00', 7, '888888', 2.00, 2),
('2023-02-15 14:30:00', 4, '999999', 4.00, 1),
('2023-03-10 09:15:00', 4, '888888', 3.50, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
