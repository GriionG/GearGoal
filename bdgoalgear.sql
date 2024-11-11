-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2024 a las 21:59:12
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdgoalgear`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `id_producto` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id_usuario`, `id_producto`, `cantidad`, `total`, `fecha`) VALUES
(25, 1, 10, 1, 4444, '2024-04-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` bigint(20) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `fkliga` bigint(20) NOT NULL,
  `fkmarca` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre`, `categoria`, `fkliga`, `fkmarca`) VALUES
(21, 'Barcelona FC', 'Masculino', 2, 2),
(22, 'Real Madrid CF', 'Masculino', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liga`
--

CREATE TABLE `liga` (
  `id_liga` bigint(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `pais` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `liga`
--

INSERT INTO `liga` (`id_liga`, `nombre`, `pais`) VALUES
(2, 'La Liga', 'España'),
(3, 'Premier League', 'Inglaterra'),
(4, 'Serie A', 'Italia'),
(5, 'Bundesliga', 'Alemania'),
(6, 'Liga MX', 'Mexico'),
(7, 'League One', 'Francia'),
(8, 'MLS', 'Estados Unidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(4, 'Prima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` bigint(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precioC` int(11) NOT NULL,
  `precioV` int(11) NOT NULL,
  `edicion` varchar(50) NOT NULL,
  `equipacion` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `marca_fk` bigint(20) NOT NULL,
  `equipo_fk` bigint(20) NOT NULL,
  `temporada_fk` bigint(20) NOT NULL,
  `talla_fk` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precioC`, `precioV`, `edicion`, `equipacion`, `cantidad`, `img`, `estado`, `marca_fk`, `equipo_fk`, `temporada_fk`, `talla_fk`) VALUES
(10, 'Real Madrid', 1212, 4444, 'Jugador', 'Segunda', 1000, 'img/subidas/foto-4.jpg', 'Activo', 4, 21, 1, 3),
(11, 'Baarcelona 1999', 1999, 2500, 'Fan', 'Primera', 100, 'img/subidas/foto-20.jpg', 'Activo', 2, 21, 1, 3),
(12, 'Bayern Múinch', 2000, 2400, 'Jugador', 'Primera', 9, 'img/subidas/foto-13.jpg', 'Activo', 2, 22, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id_talla` bigint(20) NOT NULL,
  `nombre` varchar(5) NOT NULL,
  `medida` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id_talla`, `nombre`, `medida`) VALUES
(2, 'S', '109, 40.6, 64, 81, 1'),
(3, 'M', '117, 42, 65, 82, 117'),
(4, 'G', '124, 44.5, 66, 84, 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

CREATE TABLE `temporadas` (
  `id_temporada` bigint(20) NOT NULL,
  `anos` varchar(35) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`id_temporada`, `anos`, `nombre`) VALUES
(1, '2013-2014', 'Clausura'),
(3, '2022-2023', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(70) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `privilegio` varchar(30) NOT NULL,
  `discapasidad` varchar(30) DEFAULT NULL,
  `pregunta` varchar(60) DEFAULT NULL,
  `respuesta` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `password`, `nombre`, `apellidos`, `direccion`, `telefono`, `descripcion`, `privilegio`, `discapasidad`, `pregunta`, `respuesta`) VALUES
(1, 'test@gmail.com', '12345678Abc', 'Cris Test', 'Prueba', 'UTNC', '8781234567', 'vivo en la UTNC', 'Admin', 'Daltonico', '¿Cuál es tu color favorito?', 'Morado'),
(2, 'cristopher38393849@gmail.com', '38393849Go', 'Cristopher Alexis', 'Martinez Suarez', 'las animas col. cumbres 322', '8781370387', 'Casa roja con treventanas en la parte de arriba y un porton color cafe', 'Usuario', 'Miope', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`,`id_producto`),
  ADD KEY `fkcarprod` (`id_producto`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `Iiga` (`fkliga`),
  ADD KEY `fkmarca` (`fkmarca`);

--
-- Indices de la tabla `liga`
--
ALTER TABLE `liga`
  ADD PRIMARY KEY (`id_liga`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `marca_fk` (`marca_fk`,`equipo_fk`,`temporada_fk`,`talla_fk`),
  ADD KEY `fkprodequipo` (`equipo_fk`),
  ADD KEY `fkprodutem` (`temporada_fk`),
  ADD KEY `fkprodutalla` (`talla_fk`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id_talla`);

--
-- Indices de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD PRIMARY KEY (`id_temporada`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `liga`
--
ALTER TABLE `liga`
  MODIFY `id_liga` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id_talla` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  MODIFY `id_temporada` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fkcarprod` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkcaruser` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `fkligaequipo` FOREIGN KEY (`fkliga`) REFERENCES `liga` (`id_liga`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmarcaequipo` FOREIGN KEY (`fkmarca`) REFERENCES `marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fkprodequipo` FOREIGN KEY (`equipo_fk`) REFERENCES `equipos` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkprodumarca` FOREIGN KEY (`marca_fk`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkprodutalla` FOREIGN KEY (`talla_fk`) REFERENCES `tallas` (`id_talla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkprodutem` FOREIGN KEY (`temporada_fk`) REFERENCES `temporadas` (`id_temporada`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
