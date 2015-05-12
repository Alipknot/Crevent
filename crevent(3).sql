-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2015 a las 08:17:21
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `crevent`
--
CREATE DATABASE IF NOT EXISTS `crevent` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crevent`;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `bempress`
--
CREATE TABLE IF NOT EXISTS `bempress` (
`ID_empre` int(11)
,`NamEmpresa` varchar(255)
,`Nocli` varchar(60)
,`DescE` text
,`TelE` varchar(10)
,`rating` decimal(7,4)
,`DescCat` varchar(255)
,`ComE` varchar(40)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Calficar`
--

CREATE TABLE IF NOT EXISTS `Calficar` (
  `ID_Cal` int(11) NOT NULL,
  `ID_Empre` int(11) NOT NULL,
  `calificacion` tinyint(4) NOT NULL,
  `ID_User` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Calficar`
--

INSERT INTO `Calficar` (`ID_Cal`, `ID_Empre`, `calificacion`, `ID_User`) VALUES
(1, 2, 3, 'Alferdo'),
(2, 2, 4, 'Alipkno'),
(3, 3, 3, 'Alipkno'),
(4, 4, 3, 'yo'),
(5, 3, 5, 'yo'),
(6, 4, 5, 'Alipkno'),
(7, 6, 3, 'yo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `categoriaid` smallint(6) NOT NULL,
  `DescCat` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoriaid`, `DescCat`) VALUES
(52, 'Arbolito'),
(56, 'Centro de eventos'),
(57, 'Fotografia'),
(60, 'Organización de eventos'),
(61, 'Banqueteria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `RutCliente` varchar(10) NOT NULL,
  `Nocli` varchar(60) NOT NULL,
  `Apcli` varchar(60) NOT NULL,
  `Uscli` varchar(50) NOT NULL,
  `Contracli` varchar(70) NOT NULL,
  `emailCli` varchar(150) NOT NULL,
  `TelCli` varchar(10) NOT NULL,
  `edadcli` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`RutCliente`, `Nocli`, `Apcli`, `Uscli`, `Contracli`, `emailCli`, `TelCli`, `edadcli`) VALUES
('111201186', 'Alberto', 'sanchez gonzalez', 'alberton', '123456789', 'algo@cli.com', '98746778', 25),
('190891186', 'Nicolas Alejandro', 'Cancino Cancino', 'Alipknotser', 'hidesuhidesu', 'com16nico@gmail.com', '74384664', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comuna`
--

CREATE TABLE IF NOT EXISTS `Comuna` (
  `NamComuna` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Comuna`
--

INSERT INTO `Comuna` (`NamComuna`) VALUES
('Chiguayante'),
('Concepción'),
('Hualpén'),
('Hualqui'),
('Lota'),
('Otro'),
('San Pedro'),
('Talcahuano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `ID_empre` int(11) NOT NULL,
  `NamEmpresa` varchar(255) NOT NULL,
  `RutCliente` varchar(10) NOT NULL,
  `IDCat` smallint(6) NOT NULL,
  `DescE` text NOT NULL,
  `TelE` varchar(10) NOT NULL,
  `UrlE` varchar(150) DEFAULT NULL,
  `DirE` varchar(150) NOT NULL,
  `ComE` varchar(40) NOT NULL,
  `RegE` varchar(40) NOT NULL,
  `Pais` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`ID_empre`, `NamEmpresa`, `RutCliente`, `IDCat`, `DescE`, `TelE`, `UrlE`, `DirE`, `ComE`, `RegE`, `Pais`) VALUES
(2, 'Empresan', '111201186', 52, 'Esta es una empresa de eventos', '24534536', 'url.com', 'esto aqui', 'Concepción', 'Bio Bio', 'Chile'),
(3, 'Crevent sia', '190891186', 60, 'Crevent es una empresa destinada a ayudarte a sacar lo mejor de ada uno de tus eventos.', '74366897', 'www.crevent.cl', 'Pasaje h casa26', 'Concepción', 'Bio Bio', 'Chile'),
(4, 'emjemplo', '111201186', 52, 'dfsdfsdfsdfdsfs', '435543', 'none', 'none', 'Chiguayante', 'none', 'none'),
(6, 'ejemplo2', '190891186', 60, 'dasfdsfdsf', '3424254', 'www.google.cl', 'holafqasu', 'Hualpén', 'Bio Bio', 'Chile');

--
-- Disparadores `empresa`
--
DELIMITER $$
CREATE TRIGGER `Default_rating` AFTER INSERT ON `empresa`
 FOR EACH ROW INSERT INTO Calficar (ID_Empre, calificacion, ID_User)
Values (new.ID_empre, 3, 'yo')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `searchid` int(11) NOT NULL,
  `param1` varchar(255) DEFAULT NULL,
  `param2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `search`
--

INSERT INTO `search` (`searchid`, `param1`, `param2`) VALUES
(1, '', 'Concepción'),
(2, 'Fotografia', 'Chiguayante'),
(3, 'Arbolito', 'Concepción'),
(4, 'Centro de eventos', 'Hualqui'),
(5, '', 'Chiguayante'),
(6, 'Arbolito', 'Concepción'),
(7, 'Organización de eventos', 'Hualpén'),
(8, 'Centro de eventos', 'Lota'),
(9, 'Banqueteria', 'Hualpén'),
(10, 'Centro de eventos', 'San Pedro'),
(11, 'Centro de eventos', ''),
(12, 'Organización de eventos', ''),
(13, 'Arbolito', 'Lota'),
(14, 'Centro de eventos', 'Chiguayante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_user` varchar(50) NOT NULL,
  `Em_user` varchar(150) DEFAULT NULL,
  `Contra_user` varchar(60) NOT NULL,
  `Nombre_us` varchar(120) DEFAULT NULL,
  `edad_us` tinyint(4) DEFAULT NULL,
  `Dirección_us` varchar(150) DEFAULT NULL,
  `Ciudad_us` varchar(30) DEFAULT NULL,
  `región_us` varchar(60) DEFAULT NULL,
  `typ_Perfil` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_user`, `Em_user`, `Contra_user`, `Nombre_us`, `edad_us`, `Dirección_us`, `Ciudad_us`, `región_us`, `typ_Perfil`) VALUES
('Admin', 'Admin@crevent.cl', '$2a$08$Wfglhh.c8veqV1thINO3NePsoJAzA39/C99Muagx8A7z8piOuY9QG', 'Nicolas', 20, 'pasaje h 26', 'concepcion', 'BioBIo', 2),
('Alferdo', 'nada@verda.cl', '$2a$08$514GMyVcg.qMOZLt8Ts01uu3LV0jvWLtfgEy6ZkRF8YTxl2DeL.xy', 'Nicolas Alejandro Cancino Cancino', 20, 'asd', 'asd', 'asd', 0),
('Alipkno', NULL, '$2a$08$4Owx/o4T0.VvI8XzIZOyN.8TSmfnQIUiezWo73zxa2v2wTczoVi4.', NULL, NULL, NULL, NULL, NULL, 0),
('Alipknoset', NULL, '$2a$08$jxDnyBiOSGNAosMQJIyu5OxfnVh0Z4pZyIJIySxwG8G1Lst3aGYa2', NULL, NULL, NULL, NULL, NULL, 0),
('Alipknot', NULL, '$2a$08$MKZ4Npt.qJvO/0aqo2zFyOAwbKuTJoEEOQVpRkWUIRdx5xAiH971S', NULL, NULL, NULL, NULL, NULL, 0),
('Alipknots', NULL, '$2a$08$yODHMA5NbrPv.0ditcuNWuPvPECHqC4Rkb3znkL6p.WMAzq0TBTyW', NULL, NULL, NULL, NULL, NULL, 0),
('Alipksem', NULL, '$2a$08$4aGUwDASJ4I72wOtfzOGkeiVKhGkgiIEXUR7YmO/Gv3T.GGJ2RfEy', NULL, NULL, NULL, NULL, NULL, 0),
('arbertosu', 'abldam@asds.cl', '$2a$08$mtub4LTav2.Hn2mo3YZ1tOgEoLqy0djU5kWuTJw0CW4TY1kJHQKM2', 'Ar', 32, 'sada', 'fdgfdg', 'gfdgd', 0),
('fdgdgdfgdfg', 'mralipknot@gmail.gb', '$2a$08$TC7tUjJR4zlZvVyeTi4foOz1PsqsdCHHr1GB7890nPTW6mrB3uxOq', 'dfsfsd', 34, 'sada', 'sda', 'asd', 0),
('Nalip', 'com16nicql@gmail.com', '$2a$08$nZVBMhVwagHwHwazcHk6.uGJfX1Px/EgFx5iFrKQ9ua8kIK7otHSm', 'Nicolas', 25, 'Pasaje h casa 26 ', 'ConcepciÃ³n', 'Bio Bio', 0),
('yo', 'sada@salsa.com', '$2a$08$d2EdGCwosM1XGbkKPheo7uqf9k.VmQ7KmhM17f0f6SYEH2vL75YRm', 'asda', 23, 'asd', 'asd', 'asd', 0),
('yosente', 'cliente@cliente.cl', '$2a$08$rchA/evab.jfA8n3nacKA.QYFs9R9o2rLYcOAhvwGHjySLeuKDSYO', 'Clientedes', 38, 'asd', 'asd', 'asd', 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `bempress`
--
DROP TABLE IF EXISTS `bempress`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bempress` AS (select `empresa`.`ID_empre` AS `ID_empre`,`empresa`.`NamEmpresa` AS `NamEmpresa`,`cliente`.`Nocli` AS `Nocli`,`empresa`.`DescE` AS `DescE`,`empresa`.`TelE` AS `TelE`,avg(`Calficar`.`calificacion`) AS `rating`,`categoria`.`DescCat` AS `DescCat`,`empresa`.`ComE` AS `ComE` from ((((`empresa` join `cliente` on((`empresa`.`RutCliente` = `cliente`.`RutCliente`))) join `Calficar` on((`empresa`.`ID_empre` = `Calficar`.`ID_Empre`))) join `categoria` on((`empresa`.`IDCat` = `categoria`.`categoriaid`))) join `Comuna` on((`empresa`.`ComE` = `Comuna`.`NamComuna`))) group by `empresa`.`ID_empre`);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Calficar`
--
ALTER TABLE `Calficar`
  ADD PRIMARY KEY (`ID_Cal`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoriaid`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`RutCliente`);

--
-- Indices de la tabla `Comuna`
--
ALTER TABLE `Comuna`
  ADD PRIMARY KEY (`NamComuna`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID_empre`),
  ADD KEY `FK_cliemp` (`RutCliente`),
  ADD KEY `FK_catemp` (`IDCat`);

--
-- Indices de la tabla `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`searchid`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_user`),
  ADD UNIQUE KEY `Em_user` (`Em_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Calficar`
--
ALTER TABLE `Calficar`
  MODIFY `ID_Cal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoriaid` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `ID_empre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `search`
--
ALTER TABLE `search`
  MODIFY `searchid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `FK_catid` FOREIGN KEY (`IDCat`) REFERENCES `categoria` (`categoriaid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_cliemp` FOREIGN KEY (`RutCliente`) REFERENCES `cliente` (`RutCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
