-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-06-2026 a las 20:57:00
-- Versión del servidor: 8.4.3
-- Versión de PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendacelulares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `nombre`) VALUES
(1, 'Negro'),
(2, 'Blanco'),
(3, 'Gris'),
(4, 'Plateado'),
(8, 'Rojo'),
(9, 'Purpura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`) VALUES
(1, 'Apple Iphone'),
(2, 'Samsung'),
(3, 'OPPO'),
(4, 'Xiaomi'),
(6, 'LANIX'),
(14, 'MSI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_marca` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `nombre`, `id_marca`) VALUES
(14, '17 pro max', 1),
(15, 'Find X5', 3),
(16, 'Find X6', 3),
(17, 'Find X7', 3),
(18, '14 pro', 1),
(19, 'Note 7', 4),
(20, 'Mi Mix', 4),
(21, 'S24', 2),
(22, 'S25 FE', 2),
(23, 'M4', 6),
(24, 'Reno 7', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `id` int NOT NULL,
  `id_marca` int NOT NULL,
  `id_modelo` int NOT NULL,
  `id_color` int NOT NULL,
  `precio_inicial` float NOT NULL,
  `precio_final` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id`, `id_marca`, `id_modelo`, `id_color`, `precio_inicial`, `precio_final`) VALUES
(7, 3, 17, 2, 16000, 16000),
(8, 1, 14, 1, 24000, 24000),
(9, 3, 17, 1, 15000, 15000),
(10, 4, 20, 2, 20000, 20000),
(11, 2, 22, 1, 16000, 16000),
(12, 2, 22, 2, 14000, 14000),
(13, 1, 18, 1, 15000, 15000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int NOT NULL,
  `id_marca` int NOT NULL,
  `id_modelo` int NOT NULL,
  `imei` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `id_color` int NOT NULL,
  `id_precio` int NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vendido` tinyint NOT NULL DEFAULT (0),
  `baja` tinyint NOT NULL DEFAULT (0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id`, `id_marca`, `id_modelo`, `imei`, `id_color`, `id_precio`, `fecha_registro`, `vendido`, `baja`) VALUES
(8, 1, 14, '1234567894445555', 1, 8, '2026-06-03 00:00:00', 1, 0),
(9, 2, 22, '123455555543322211', 2, 12, '2026-06-03 00:00:00', 1, 0),
(10, 4, 20, '11233456789999776', 2, 10, '2026-06-03 00:00:00', 0, 1),
(11, 2, 22, '464664575758678675322', 1, 11, '2026-06-03 00:00:00', 0, 1),
(12, 1, 14, '32425345363353', 1, 8, '2026-06-03 00:00:00', 0, 0),
(13, 1, 18, '19999727332288823266', 1, 13, '2026-06-04 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos_vendidos`
--

CREATE TABLE `telefonos_vendidos` (
  `id` int NOT NULL,
  `id_telefono` int NOT NULL,
  `fecha_vendido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `telefonos_vendidos`
--

INSERT INTO `telefonos_vendidos` (`id`, `id_telefono`, `fecha_vendido`) VALUES
(1, 8, '2026-06-03 00:00:00'),
(2, 9, '2026-06-03 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_baja`
--

CREATE TABLE `telefono_baja` (
  `id` int NOT NULL,
  `id_telefono` int NOT NULL,
  `fecha_baja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `telefono_baja`
--

INSERT INTO `telefono_baja` (`id`, `id_telefono`, `fecha_baja`, `descripcion`) VALUES
(1, 10, '2026-06-04 19:44:16', 'Se rompio la pantalla'),
(2, 11, '2026-06-04 20:38:20', 'ROTO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1_modelosAMarca` (`id_marca`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_modelo` (`id_modelo`),
  ADD KEY `id_color` (`id_color`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `imei` (`imei`),
  ADD KEY `FKtelefonos_marcas` (`id_marca`),
  ADD KEY `FKtelefonos_modelo` (`id_modelo`),
  ADD KEY `FKtelefonos_colores` (`id_color`),
  ADD KEY `FKtelefonos_precios` (`id_precio`);

--
-- Indices de la tabla `telefonos_vendidos`
--
ALTER TABLE `telefonos_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKventas_telefonos` (`id_telefono`);

--
-- Indices de la tabla `telefono_baja`
--
ALTER TABLE `telefono_baja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKbajas_telefonos` (`id_telefono`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `telefonos_vendidos`
--
ALTER TABLE `telefonos_vendidos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `telefono_baja`
--
ALTER TABLE `telefono_baja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `FK1_modelosAMarca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE CASCADE;

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `FKPre.color_marca` FOREIGN KEY (`id_color`) REFERENCES `colores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKPre.marca_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKPre.modelo_marca` FOREIGN KEY (`id_modelo`) REFERENCES `modelos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `FKtelefonos_colores` FOREIGN KEY (`id_color`) REFERENCES `colores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKtelefonos_marcas` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKtelefonos_modelo` FOREIGN KEY (`id_modelo`) REFERENCES `modelos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKtelefonos_precios` FOREIGN KEY (`id_precio`) REFERENCES `precios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `telefonos_vendidos`
--
ALTER TABLE `telefonos_vendidos`
  ADD CONSTRAINT `FKventas_telefonos` FOREIGN KEY (`id_telefono`) REFERENCES `telefonos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `telefono_baja`
--
ALTER TABLE `telefono_baja`
  ADD CONSTRAINT `FKbajas_telefonos` FOREIGN KEY (`id_telefono`) REFERENCES `telefonos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
