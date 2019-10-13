-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2019 a las 21:18:55
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trabajoso_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_aspirantes`
--

CREATE TABLE `perfil_aspirantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfil_aspirantes`
--

INSERT INTO `perfil_aspirantes` (`id`, `nombre`, `clave`, `correo`, `edad`, `sexo`) VALUES
(2, '', '13', 'as', 0, ''),
(3, 'Don quijote', '1234', 'asfa@as', 50, 'F'),
(4, 'Don quijote', '1234', 'asfa@as', 50, 'e'),
(5, 'El nombre', 'la contraseña', 'el correo', 50, 'M'),
(6, 'El nombre', 'a', 'el correo', 2000, 'M'),
(7, 'Ricado', '1.', 'f', 2000, 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_aspirantes2`
--

CREATE TABLE `perfil_aspirantes2` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfil_aspirantes2`
--

INSERT INTO `perfil_aspirantes2` (`id`, `nombre`, `clave`, `correo`, `fecha`, `sexo`) VALUES
(1, 'Ricado', '1234', 'riscaf@yimeil.com', '2000-12-31', 'M'),
(2, 'Ricado', 'a', 'riscaf@yimeil.com', '2000-12-31', 'M'),
(3, 'a', 'a', 'a', '2000-12-31', 'M'),
(4, 'a', 'a', 'a', '2000-12-31', 'M'),
(5, 'a', 'a', '2', '2000-12-31', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_empresas`
--

CREATE TABLE `perfil_empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfil_empresas`
--

INSERT INTO `perfil_empresas` (`id`, `nombre`, `clave`, `correo`) VALUES
(1, 'Empresita', '1234', 'empresita@gmail.com'),
(2, 'Empresita', '12345', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfil_aspirantes`
--
ALTER TABLE `perfil_aspirantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil_aspirantes2`
--
ALTER TABLE `perfil_aspirantes2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil_empresas`
--
ALTER TABLE `perfil_empresas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfil_aspirantes`
--
ALTER TABLE `perfil_aspirantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `perfil_aspirantes2`
--
ALTER TABLE `perfil_aspirantes2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `perfil_empresas`
--
ALTER TABLE `perfil_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
