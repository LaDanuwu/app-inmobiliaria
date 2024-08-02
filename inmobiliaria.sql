-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2024 a las 02:13:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `precio` bigint(20) DEFAULT NULL,
  `tamano` int(5) DEFAULT NULL,
  `ciudad` varchar(40) DEFAULT NULL,
  `barrio` varchar(40) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `tipo`, `categoria`, `precio`, `tamano`, `ciudad`, `barrio`, `foto`) VALUES
(1, 'Aparta Estudio', 'Arriendo', 900000, 82, 'Bogotá 2', 'Chapinero 7', 'inmueble-6.png'),
(2, 'Aparta Estudio', 'Venta', 6500000, 78, 'Bogota', 'Usaquen', 'inmueble-2.png'),
(3, 'Apartamento', 'Venta', 250000000, 100, 'Cali', 'Granada', 'inmueble-5.png'),
(4, 'Apartamento', 'Arriendo', 2500000, 70, 'Cartagena', 'Bocagrande', 'inmueble-4.png'),
(6, 'Aparta Estudio', 'Venta', 78000000, 89, 'Bogota', 'Ciudad Bolívar', 'inmueble-3.png'),
(7, 'Casa', 'Venta', 9000000, 64, 'Armenia', 'Castilla', 'inmueble-1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_sol` int(11) NOT NULL,
  `id_inm` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_sol`, `id_inm`, `id_user`, `fecha`) VALUES
(1, 1, 1, '2023-01-15'),
(4, 4, 4, '2023-04-30'),
(11, 1, 7, '2024-07-27'),
(13, 6, 6, '2024-07-27'),
(14, 7, 6, '2024-07-27'),
(15, 1, 9, '2024-07-27'),
(16, 4, 10, '2024-07-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(40) DEFAULT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `clave` varchar(200) DEFAULT NULL,
  `rol` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `telefono`, `correo`, `clave`, `rol`) VALUES
(1, 'Juan', 'Pérez', 3101234567, 'juan.perez@example.com', '202cb962ac59075b964b07152d234b70', 'Usuario'),
(2, 'María', 'Gómez', 3202345678, 'maria.gomez@example.com', '202cb962ac59075b964b07152d234b70', 'Usuario'),
(3, 'Carlos', 'Rodríguez', 3113456789, 'carlos.rodriguez@example.com', '202cb962ac59075b964b07152d234b70', 'Usuario'),
(4, 'Ana', 'Martínez', 3124567890, 'ana.martinez@example.com', '202cb962ac59075b964b07152d234b70', 'Inmobiliaria'),
(5, 'Luis', 'Hernández', 3135678901, 'luis.hernandez@example.com', '202cb962ac59075b964b07152d234b70', 'Usuario'),
(6, 'Alejandra', 'Velazques ', 5959, 'b@b', '202cb962ac59075b964b07152d234b70', 'Usuario'),
(7, 'Gabriel', 'Español', 7844, 'g@g', '202cb962ac59075b964b07152d234b70', 'Inmobiliaria'),
(8, 'karen', 'vega', 5941, 'k@k', '202cb962ac59075b964b07152d234b70', 'Inmobiliaria'),
(9, 'Juan ', 'Almeida', 31264595, 'ju@ju', '202cb962ac59075b964b07152d234b70', 'Usuario'),
(10, 'Maicol', 'Bastidas', 3652149974, 'm@m', '202cb962ac59075b964b07152d234b70', 'Usuario');
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_sol`),
  ADD KEY `id_inm` (`id_inm`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_sol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`id_inm`) REFERENCES `inmuebles` (`id`),
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
