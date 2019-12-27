-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-12-2019 a las 16:57:56
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
-- Estructura de tabla para la tabla `formulariosaspirantes`
--

CREATE TABLE `formulariosaspirantes` (
  `idAspirante` int(11) NOT NULL,
  `nivelEstudios` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `profesion` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `otraProfesion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `experiencia` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `formulariosaspirantes`
--

INSERT INTO `formulariosaspirantes` (`idAspirante`, `nivelEstudios`, `profesion`, `otraProfesion`, `experiencia`) VALUES
(37, 'Secundaria', 'Ingeniero Informático', '', 'a'),
(38, 'Secundaria', 'Ingeniero Informático', '', 'aa'),
(41, 'Secundaria', 'Ingeniero Informático', '', 'a'),
(44, 'Secundaria', 'Ingeniero Informático', '', 'aa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulariosempresas`
--

CREATE TABLE `formulariosempresas` (
  `idEmpresa` int(11) NOT NULL,
  `nivelEstudios` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `profesion` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `otraProfesion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `edadBuscada` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `detalles` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `formulariosempresas`
--

INSERT INTO `formulariosempresas` (`idEmpresa`, `nivelEstudios`, `profesion`, `otraProfesion`, `edadBuscada`, `detalles`) VALUES
(36, 'Secundaria', 'Ingeniero Informático', '', '18-24', 'a'),
(39, 'Pregrado Universitario', 'Educador', '', '35-44', 'asfasfsaasffaasfasfsaasffaasfasfsaasffaasfasfsaasffaasfasfsaasffaasfasfsaasffaasfasfsaasffa'),
(40, 'Secundaria', 'Ingeniero Informático', '', '18-24', 'Ofrecemos un empleo para programadores que dominen el lenguaje de programacion c++ salario 3h/h lunes a jueves de 8 a 5 pm con vacaciones de vez en cuando'),
(42, 'Secundaria', 'Ingeniero Informático', '', '55+', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios2`
--

CREATE TABLE `usuarios2` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios2`
--

INSERT INTO `usuarios2` (`id`, `nombre`, `clave`, `correo`, `fecha`, `sexo`, `pais`, `perfil`, `direccion`) VALUES
(1, 'Empresa1', '1234', 'correoEMP1', '0000-00-00', '', 'Argentina', '', NULL),
(2, 'Aspirante1', '1234', 'correoASP1', '1998-01-05', 'M', 'República Dominicana', '', NULL),
(6, 'empresa', '123', '123', '0000-00-00', '', 'Argentina', 'empresa', NULL),
(29, 'nombre incompleto', 'contraseña', 'email@yimeil', '1970-01-01', 'F', 'Perú', 'aspirante', NULL),
(31, 'empresita2', '1234', 'empresita2@', '', '', 'Argentina', 'empresa', NULL),
(33, 'Registro', 'registro', 'registro@', '2000-12-31', 'M', 'Argentina', 'aspirante', NULL),
(34, '12345', '12345', '123@123', '', '', 'Argentina', 'empresa', NULL),
(35, 'abcde', '123456', 'abcde@', '2000-12-31', 'M', 'Argentina', 'aspirante', NULL),
(36, 'empresa', '123456', 'empresa@a.com', '', '', 'Argentina', 'empresa', NULL),
(37, 'juan', '123456', 'juax@gmail.com', '2000-12-31', 'M', 'Argentina', 'aspirante', NULL),
(38, 'kasa', 'kas123', 'kas@gmail.com', '2000-12-31', 'M', 'Argentina', 'aspirante', NULL),
(39, 'CompanyOfFuture', '987654', 'abcdef@gmail.com', '', '', 'Venezuela', 'empresa', 'caracaassss'),
(40, 'Arbolitos Verdes Co,', '123456', 'arbolitosverdesco@gmail.es', '', '', 'Venezuela', 'empresa', 'Avenida Francisco de Miranda, Caracas'),
(41, 'aaaa', '123456', 'lmmontes@gmail.com', '2000-12-31', 'M', 'Argentina', 'aspirante', ''),
(42, 'aaaa', '123456', 'aaaa@gmail.com', '', '', 'Argentina', 'empresa', 'a'),
(43, 'bbbb', '123456', 'perdo123@gmail.com', '2000-12-31', 'M', 'Argentina', 'aspirante', ''),
(44, 'jauna', '123456', 'jauna@gmail.com', '2000-12-31', 'M', 'Argentina', 'aspirante', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios2`
--
ALTER TABLE `usuarios2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios2`
--
ALTER TABLE `usuarios2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
