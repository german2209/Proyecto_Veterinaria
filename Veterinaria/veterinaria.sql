-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2019 a las 15:57:42
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `id_servicio` int(10) NOT NULL,
  `id_empleado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `fecha`, `hora`, `id_cliente`, `id_servicio`, `id_empleado`) VALUES
(2, '2019-11-04', '14:40:00', 14, 4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(10) NOT NULL,
  `nombreC` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombreC`, `apellidos`, `direccion`, `telefono`, `correo`) VALUES
(1, 'Alondra de la Cruz', 'Rodriguez Castillo', 'Torreon,Coahuila', '8714839786', 'robot@hotmail.com'),
(14, 'Brianda San Juana', 'Rangel Rodriguez', 'San Jacinto', '87459635961', 'brianda@hotmail.com'),
(15, 'Ruby ', 'Alvarado ', 'San Marcos', '8714563652', 'ruby@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `fecha_de_compra` date NOT NULL,
  `total` float DEFAULT NULL,
  `id_producto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `cantidad`, `fecha_de_compra`, `total`, `id_producto`) VALUES
(4, 1, '2019-11-28', 1, 5),
(5, 0, '0000-00-00', 0, 2),
(6, 2, '2019-11-28', 445, 2),
(9, 2, '2019-11-30', 8, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `puesto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido`, `telefono`, `correo`, `puesto`) VALUES
(1, 'Alondra', 'Rodriguez', '8714839785', 'robot@hotmail.com', 'Veterinario'),
(8, 'Paulo', 'Luna', '8714839786', 'robot@hotmail.com', 'Veterinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id_mascota` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `raza` varchar(255) NOT NULL,
  `sexo` char(5) NOT NULL,
  `edad` tinyint(10) NOT NULL,
  `tamano` varchar(255) NOT NULL,
  `peso` float NOT NULL,
  `enfermedades` varchar(255) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `id_cliente` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id_mascota`, `nombre`, `especie`, `raza`, `sexo`, `edad`, `tamano`, `peso`, `enfermedades`, `observaciones`, `id_cliente`) VALUES
(16, 'Percy', 'Perro', 'chencha', 'Hembr', 12, 'chico', 12, '123', '23', 1),
(17, 'Chencha', 'Perro', 'rara', 'Hembr', 12, 'Mediano', 10, 'Ninguna', 'Es muy seria', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) NOT NULL,
  `nombre_del_producto` varchar(255) NOT NULL,
  `costo` float NOT NULL,
  `marca` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `precio_de_venta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_del_producto`, `costo`, `marca`, `fabricante`, `precio_de_venta`) VALUES
(2, 'Jabon Neutro', 52, 'Neutro', 'P&G1', 401),
(5, 'Shampo', 12, 'pantene', 'P&G', 401),
(6, 'Talco', 52, 'Bolfo', 'Bayer', 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(10) NOT NULL,
  `nombre_del_servicio` varchar(255) NOT NULL,
  `costo` float NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre_del_servicio`, `costo`, `descripcion`) VALUES
(3, 'Estetica', 180, 'Corte y cepillado de Pelo'),
(4, 'Corte de UÃ±as', 50, 'Cortar uÃ±as'),
(7, 'BaÃ±o', 160, 'Aseo de las mascotas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios2`
--

CREATE TABLE `usuarios2` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios2`
--

INSERT INTO `usuarios2` (`id_usuario`, `nombre`, `username`, `password`, `email`, `tipo`) VALUES
(6, 'Alondra Rodriguez Castilo', 'AloRodriguez', '123Alo', 'robot@hotmail.com', '0'),
(10, 'alondra', 'alo', '123', 'alo@alo.com', '1'),
(11, 'ruby', 'rus', '123', 'ruby@gmail.com', 'Master');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(10) NOT NULL,
  `precio_de_venta` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `id_producto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `fecha`, `cantidad`, `precio_de_venta`, `total`, `id_producto`) VALUES
(6, '2019-11-29', 2, 2, 45, 2),
(9, '2019-11-03', 2, 2, 4, 5);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistacitas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistacitas` (
`id_cita` int(10)
,`fecha` date
,`hora` time
,`nombreC` varchar(255)
,`nombre_del_servicio` varchar(255)
,`nombre` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistacompra`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistacompra` (
`id_compra` int(10)
,`nombre_del_producto` varchar(255)
,`cantidad` int(10)
,`fecha_de_compra` date
,`total` float
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistamas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistamas` (
`id_mascota` int(10)
,`nombre` varchar(255)
,`especie` varchar(255)
,`raza` varchar(255)
,`sexo` char(5)
,`edad` tinyint(10)
,`tamano` varchar(255)
,`peso` float
,`enfermedades` varchar(255)
,`observaciones` varchar(255)
,`nombreC` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistamascota`
-- (Véase abajo para la vista actual)
--
-- CREATE TABLE `vistamascota` (
-- );

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistaventa`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistaventa` (
`id_venta` int(10)
,`fecha` date
,`nombre_del_producto` varchar(255)
,`cantidad` int(10)
,`precio_de_venta` float
,`total` float
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vistacitas`
--
DROP TABLE IF EXISTS `vistacitas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistacitas`  AS  select `citas`.`id_cita` AS `id_cita`,`citas`.`fecha` AS `fecha`,`citas`.`hora` AS `hora`,`clientes`.`nombreC` AS `nombreC`,`servicios`.`nombre_del_servicio` AS `nombre_del_servicio`,`empleados`.`nombre` AS `nombre` from (((`citas` join `clientes` on(`citas`.`id_cliente` = `clientes`.`id_cliente`)) join `servicios` on(`citas`.`id_servicio` = `servicios`.`id_servicio`)) join `empleados` on(`citas`.`id_empleado` = `empleados`.`id_empleado`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vistacompra`
--
DROP TABLE IF EXISTS `vistacompra`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistacompra`  AS  select `compras`.`id_compra` AS `id_compra`,`productos`.`nombre_del_producto` AS `nombre_del_producto`,`compras`.`cantidad` AS `cantidad`,`compras`.`fecha_de_compra` AS `fecha_de_compra`,`compras`.`total` AS `total` from (`compras` join `productos`) where `compras`.`id_producto` = `productos`.`id_producto` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vistamas`
--
DROP TABLE IF EXISTS `vistamas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistamas`  AS  select `mascotas`.`id_mascota` AS `id_mascota`,`mascotas`.`nombre` AS `nombre`,`mascotas`.`especie` AS `especie`,`mascotas`.`raza` AS `raza`,`mascotas`.`sexo` AS `sexo`,`mascotas`.`edad` AS `edad`,`mascotas`.`tamano` AS `tamano`,`mascotas`.`peso` AS `peso`,`mascotas`.`enfermedades` AS `enfermedades`,`mascotas`.`observaciones` AS `observaciones`,`clientes`.`nombreC` AS `nombreC` from (`mascotas` join `clientes`) where `mascotas`.`id_cliente` = `clientes`.`id_cliente` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vistamascota`
--
DROP TABLE IF EXISTS `vistamascota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistamascota`  AS  select `mascotas`.`id_mascota` AS `id_mascota`,`mascotas`.`especie` AS `especie`,`mascotas`.`raza` AS `raza`,`mascotas`.`sexo` AS `sexo`,`mascotas`.`edad` AS `edad`,`mascotas`.`tamano` AS `tamano`,`mascotas`.`peso` AS `peso`,`mascotas`.`enfermedades` AS `enfermedades`,`mascotas`.`observaciones` AS `observaciones`,`clientes`.`nombreC` AS `nombre` from (`mascotas` join `clientes`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vistaventa`
--
DROP TABLE IF EXISTS `vistaventa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaventa`  AS  select `ventas`.`id_venta` AS `id_venta`,`ventas`.`fecha` AS `fecha`,`productos`.`nombre_del_producto` AS `nombre_del_producto`,`ventas`.`cantidad` AS `cantidad`,`ventas`.`precio_de_venta` AS `precio_de_venta`,`ventas`.`total` AS `total` from (`ventas` join `productos`) where `ventas`.`id_producto` = `productos`.`id_producto` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `fk_cliente_ci` (`id_cliente`),
  ADD KEY `fk_servicio_ci` (`id_servicio`),
  ADD KEY `fk_empleado_ci` (`id_empleado`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_producto_co` (`id_producto`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `fk_cliente` (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `usuarios2`
--
ALTER TABLE `usuarios2`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_producto_ve` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id_mascota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios2`
--
ALTER TABLE `usuarios2`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_cliente_ci` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `fk_empleado_ci` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `fk_servicio_ci` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_producto_co` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

----
464
ALTER TABLE `servicios`
465
  MODIFY `id_servicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
466
​
467
--
468
-- AUTO_INCREMENT de la tabla `usuarios2`
469
--
470
ALTER TABLE `usuarios2`
471
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
472
​
473
--
474
-- AUTO_INCREMENT de la tabla `ventas`
475
--
476
ALTER TABLE `ventas`
477
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
478
​
479
--
480
-- Restricciones para tablas volcadas
481
--
482
​
483
--
484
-- Filtros para la tabla `citas`
485
--
486
ALTER TABLE `citas`
487
  ADD CONSTRAINT `fk_cliente_ci` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
488
  ADD CONSTRAINT `fk_empleado_ci` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`),
489
  ADD CONSTRAINT `fk_servicio_ci` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`);
490
​
491
--
492
-- Filtros para la tabla `compras`
493
--
494
ALTER TABLE `compras`
495
  ADD CONSTRAINT `fk_producto_co` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);
496
​
497
--
498
-- Filtros para la tabla `mascotas`
499
--
500
ALTER TABLE `mascotas`
501
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
502
​
503
--
504
-- Filtros para la tabla `ventas`
505
--
506
ALTER TABLE `ventas`
507
  ADD CONSTRAINT `fk_producto_ve` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);
508
COMMIT;
509
​
510
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
511
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
512
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
513

-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_producto_ve` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
