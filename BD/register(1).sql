-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-03-2024 a las 21:59:41
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `register`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `numero` bigint(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `F_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `edad`, `numero`, `usuario`, `pass`, `correo`, `F_nacimiento`) VALUES
(34, 'joana', 'gonzalez', 12, 4534543456, 'joanG', '', 'joangonzalez005@gmail.com', '2222-02-22'),
(35, 'joan', 'gonzalez', 21, 1234567890, 'juan', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', 'juan@lonches.com', '2222-02-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `accion` varchar(255) DEFAULT NULL,
  `detalles` text,
  `ip` varchar(45) DEFAULT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `accion`, `detalles`, `ip`, `fecha_hora`) VALUES
(1, 'EliminaciÃ³n de usuario', 'Se ha eliminado el usuario con ID: 29', '127.0.0.1', '2024-03-08 18:53:24'),
(2, 'EliminaciÃ³n de usuario', 'Se ha eliminado el usuario con ID: 32', '127.0.0.1', '2024-03-08 18:53:26'),
(3, 'Registro de usuario', 'Se ha insertado un nuevo usuario con nombre: joan y apellido: gonzalez', '127.0.0.1', '2024-03-08 19:16:58'),
(4, 'Registro de usuario', 'Se ha insertado un nuevo usuario con nombre: joan y apellido: gonzalez', '127.0.0.1', '2024-03-08 19:35:57'),
(5, 'Actualizacion de usuario', 'Se ha actualizado el usuario con ID: 34, En el campo \'nombre\', Se cambio el valor: \'joan\' por \'joana\', En el campo \'pass\', Se cambio el valor: \'8cb2237d0679ca88db6464eac60da96345513964\' por \'\'', '127.0.0.1', '2024-03-08 19:58:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
