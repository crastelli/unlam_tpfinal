SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE Calificacion_rel_empresa;
TRUNCATE TABLE Imagen_rel_empresa;
TRUNCATE TABLE Video_rel_empresa;
TRUNCATE TABLE Rubro;
TRUNCATE TABLE Zona;
TRUNCATE TABLE Empresa;
TRUNCATE TABLE Usuario;
SET FOREIGN_KEY_CHECKS = 1;

-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2015 a las 00:53:51
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `db_milugar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Calificacion_rel_empresa`
--

CREATE TABLE IF NOT EXISTS `Calificacion_rel_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) NOT NULL,
  `calificacion` tinyint(4) NOT NULL DEFAULT '1',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idempresa` (`idempresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empresa`
--

CREATE TABLE IF NOT EXISTS `Empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_referente` varchar(250) DEFAULT NULL,
  `dni_referente` varchar(55) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `razon_social` varchar(250) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `pw` varchar(55) NOT NULL,
  `telefono` varchar(55) DEFAULT NULL,
  `idzona` int(11) DEFAULT NULL,
  `idrubro` int(11) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `lat_long` varchar(150) DEFAULT NULL,
  `descripcion` text,
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `es_premium` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idzona` (`idzona`),
  KEY `idzona_2` (`idzona`),
  KEY `idrubro` (`idrubro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Empresa`
--

INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES
(1, 'César Rastelli', '34111111', 'Mi comercio', 'Mi comercio', 'logo364_adidas-wallpapasWallpapers4Desktop.com.jpg', 'empresa@empresa.com', 'empresa', '55555555', 1, 1, 'Av. Cordoba 4252, Palermo', '-34.58785408317702, -58.43964992370013', '', 0, 0, 1, '2015-04-25 04:28:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imagen_rel_empresa`
--

CREATE TABLE IF NOT EXISTS `Imagen_rel_empresa` (
  `id` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idempresa` (`idempresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rubro`
--

CREATE TABLE IF NOT EXISTS `Rubro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  `icono` varchar(150) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Rubro`
--

INSERT INTO `Rubro` (`id`, `descripcion`, `icono`, `estado`, `habilitado`) VALUES
(1, 'Otros', 'otros.png', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `pw` varchar(55) NOT NULL,
  `telefono` varchar(55) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `nombre`, `email`, `pw`, `telefono`, `direccion`, `estado`, `fecha`) VALUES
(1, 'César Rastelli', 'admin@admin.com', 'admin', '1511111111', 'Av. Congreso 1050', 1, '2015-04-25 03:39:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Video_rel_empresa`
--

CREATE TABLE IF NOT EXISTS `Video_rel_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `codigo` varchar(150) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idempresa` (`idempresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Zona`
--

CREATE TABLE IF NOT EXISTS `Zona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  `coordenadas` text,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Zona`
--

INSERT INTO `Zona` (`id`, `descripcion`, `coordenadas`, `estado`, `habilitado`) VALUES
(1, 'Capital Federal / GBA', '-34.523252132,-54.523252132', 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Calificacion_rel_empresa`
--
ALTER TABLE `Calificacion_rel_empresa`
  ADD CONSTRAINT `Calificacion_rel_empresa_ibfk_2` FOREIGN KEY (`idempresa`) REFERENCES `Empresa` (`id`);

--
-- Filtros para la tabla `Empresa`
--
ALTER TABLE `Empresa`
  ADD CONSTRAINT `Empresa_ibfk_1` FOREIGN KEY (`idzona`) REFERENCES `Zona` (`id`),
  ADD CONSTRAINT `Empresa_ibfk_2` FOREIGN KEY (`idrubro`) REFERENCES `Rubro` (`id`);

--
-- Filtros para la tabla `Imagen_rel_empresa`
--
ALTER TABLE `Imagen_rel_empresa`
  ADD CONSTRAINT `Imagen_rel_empresa_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `Empresa` (`id`);

--
-- Filtros para la tabla `Video_rel_empresa`
--
ALTER TABLE `Video_rel_empresa`
  ADD CONSTRAINT `Video_rel_empresa_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `Empresa` (`id`);
