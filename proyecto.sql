-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2020 a las 13:01:55
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `PK_IdEquipo` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Contrasenia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Localidad` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Division` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Grupo` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para los equipos que registremos';

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`PK_IdEquipo`, `Nombre`, `Contrasenia`, `Localidad`, `Division`, `Grupo`) VALUES
(1, 'Barcelona', '1234', 'Marchena', '', ''),
(2, 'Sevilla', '123123', 'Sevilla', '1a', '1'),
(4, 'Nuria', 'cc776813221a1ae893d844b9f1c794b6', 'asdas', '1a', '2'),
(12, 'adsad', 'adbf5a778175ee757c34d0eba4e932bc', 'asdsad', '1a', '1'),
(23, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Marchena', '3ª', '3'),
(24, 'Sevilla FC', '21232f297a57a5a743894a0e4a801fc3', 'Sevilla', '3', '2'),
(25, 'FC Barcelona', '21232f297a57a5a743894a0e4a801fc3', 'Barcelona', '3', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `PK_IdJugador` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Apodo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `Posicion` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Dorsal` int(2) DEFAULT NULL,
  `FechaNac` date DEFAULT NULL,
  `Goles` int(11) DEFAULT NULL,
  `Asistencias` int(11) DEFAULT NULL,
  `Tarjetas` int(11) DEFAULT NULL,
  `FK_IdEquipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`PK_IdJugador`, `Nombre`, `Apodo`, `Dni`, `Posicion`, `Dorsal`, `FechaNac`, `Goles`, `Asistencias`, `Tarjetas`, `FK_IdEquipo`) VALUES
(5, 'Jose Antonio', 'Llyto', '47427023Z', 'Delantero', 2, '2020-04-25', 1, 1, 1, 24),
(6, 'jose antonio', 'Llyto', '47427023B', 'Defensa', 21, '2020-04-16', 10, 10, 10, 24),
(10, 'Nuria', 'Nuria', '47428689P', 'Delantero', 21, '2020-04-08', 10, 10, 2, 24),
(13, 'Monolito', 'Monolito', '47428689U', 'Delantero', 45, '2020-05-06', 35, 17, 2, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `PK_IdPersonal` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `Sueldo` double NOT NULL,
  `Funcion` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `FechaAlt` timestamp NOT NULL DEFAULT current_timestamp(),
  `FK_IdEquipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`PK_IdPersonal`, `Nombre`, `Dni`, `Sueldo`, `Funcion`, `FechaAlt`, `FK_IdEquipo`) VALUES
(1, 'Pedro', '47427023Z', 1000, 'Director Deportivo', '2020-04-30 13:56:45', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `PK_IdSocio` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `Cuota` double NOT NULL,
  `FechaAlt` timestamp NOT NULL DEFAULT current_timestamp(),
  `FK_IdEquipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`PK_IdSocio`, `Nombre`, `Dni`, `Cuota`, `FechaAlt`, `FK_IdEquipo`) VALUES
(1, 'jose antonio', '47427023B', 500, '2020-04-28 13:54:13', 24),
(2, 'Nuria', '47427023Z', 900, '2020-04-28 13:54:17', 24),
(3, 'Llyto', '47428689B', 1000, '2020-04-28 13:56:37', 24);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`PK_IdEquipo`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`PK_IdJugador`),
  ADD UNIQUE KEY `Dni` (`Dni`),
  ADD KEY `FK_IdEquipo` (`FK_IdEquipo`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`PK_IdPersonal`),
  ADD UNIQUE KEY `Dni` (`Dni`),
  ADD KEY `FK_IdEquipo` (`FK_IdEquipo`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`PK_IdSocio`),
  ADD UNIQUE KEY `Dni` (`Dni`),
  ADD KEY `FK_IdEquipo` (`FK_IdEquipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `PK_IdEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `PK_IdJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `PK_IdPersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `socio`
--
ALTER TABLE `socio`
  MODIFY `PK_IdSocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `jugador_ibfk_1` FOREIGN KEY (`FK_IdEquipo`) REFERENCES `equipo` (`PK_IdEquipo`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`FK_IdEquipo`) REFERENCES `equipo` (`PK_IdEquipo`);

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `socio_ibfk_1` FOREIGN KEY (`FK_IdEquipo`) REFERENCES `equipo` (`PK_IdEquipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
