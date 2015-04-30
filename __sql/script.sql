-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-04-2015 a las 21:41:10
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `db_milugar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empresa`
--

CREATE TABLE IF NOT EXISTS `Empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `razon_social` varchar(250) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `pw` varchar(55) NOT NULL,
  `telefono` varchar(55) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `descripcion` text,
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Empresa`
--

INSERT INTO `Empresa` (`id`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `direccion`, `descripcion`, `habilitado`, `estado`, `fecha`) VALUES
(1, 'Mi Empresa', 'Mi Empresa SR', NULL, 'empresa@empresa.com', 'empresa', NULL, NULL, NULL, 0, 1, '2015-04-25 04:28:00');

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
(1, 'César Rastelli', 'admin@admin.com', 'admin', NULL, NULL, 1, '2015-04-25 03:39:29');
