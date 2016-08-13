-- phpMyAdmin SQL Dump
-- version 2.6.0-pl2
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 02-02-2006 a las 17:28:51
-- Versión del servidor: 4.1.7
-- Versión de PHP: 5.0.2
-- 
-- Base de datos: `productos`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `categorias`
-- 

CREATE TABLE IF NOT EXISTS `categorias` (
  `category_id` int(11) NOT NULL auto_increment,
  `category_name` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`category_id`)
);

-- 
-- Volcar la base de datos para la tabla `categorias`
-- 

INSERT INTO `categorias` VALUES (1, 'tinto');
INSERT INTO `categorias` VALUES (2, 'blanco');
INSERT INTO `categorias` VALUES (3, 'rosado');
INSERT INTO `categorias` VALUES (4, 'espumoso');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `vinos`
-- 

CREATE TABLE IF NOT EXISTS `vinos` (
  `wine_id` int(11) NOT NULL auto_increment,
  `wine_name` varchar(30) NOT NULL default '',
  `wine_description` text NOT NULL,
  `wine_price` float NOT NULL default '0',
  `wine_category` int(11) NOT NULL default '0',
  PRIMARY KEY  (`wine_id`)
);

-- 
-- Volcar la base de datos para la tabla `vinos`
-- 

INSERT INTO `vinos` VALUES (1, 'Pingus', 'Ribera del Duero', 600.34, 1);
INSERT INTO `vinos` VALUES (2, 'Gran Reserva 904', 'Rioja Alta S.A.', 38.5, 1);
INSERT INTO `vinos` VALUES (3, 'Viña Esmeralda', 'Torres', 15, 2);
INSERT INTO `vinos` VALUES (4, 'Viña Sol', 'Torres', 16.5, 2);
INSERT INTO `vinos` VALUES (5, 'Irache', 'Argentino', 12, 3);
INSERT INTO `vinos` VALUES (6, 'Mmore', 'Sin identificar', 52, 3);
INSERT INTO `vinos` VALUES (7, 'Kripta', 'Cava ', 38.522, 4);
INSERT INTO `vinos` VALUES (8, 'Veuve Clicquot', 'Champagne', 38, 4);
