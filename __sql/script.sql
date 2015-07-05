-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-07-2015 a las 18:06:22
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
  `idusuariofb` int(11) NOT NULL,
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
  `dni_referente` varchar(50) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `razon_social` varchar(250) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `idzona` int(11) DEFAULT NULL,
  `idrubro` int(11) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `lat_long` varchar(250) DEFAULT NULL,
  `descripcion` text,
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `es_premium` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idzona` (`idzona`),
  KEY `idzona_2` (`idzona`),
  KEY `idrubro` (`idrubro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imagen_rel_empresa`
--

CREATE TABLE IF NOT EXISTS `Imagen_rel_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `link_imagen` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idempresa` (`idempresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rubro`
--

CREATE TABLE IF NOT EXISTS `Rubro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) DEFAULT NULL,
  `icono` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
INSERT INTO `Usuario` (`id`, `nombre`, `email`, `pw`, `telefono`, `direccion`, `estado`, `fecha`) VALUES
(1, 'César Rastelli', 'admin@admin.com', '91f5167c34c400758115c2a6826ec2e3', '1511111111', 'Av. Congreso 1050', 1, '2015-04-25 03:39:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Video_rel_empresa`
--

CREATE TABLE IF NOT EXISTS `Video_rel_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idempresa` (`idempresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Zona`
--

CREATE TABLE IF NOT EXISTS `Zona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) DEFAULT NULL,
  `lat_long` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
