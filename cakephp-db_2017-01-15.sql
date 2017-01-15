-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2017 at 11:11 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cakephp`
--

GRANT USAGE ON *.* TO 'cakephpuser'@'localhost' IDENTIFIED BY PASSWORD '*7C95BAF74F8E89A693A6786412C26551FF79D4F5';

GRANT ALL PRIVILEGES ON `cakephp`.* TO 'cakephpuser'@'localhost';

-- --------------------------------------------------------

--
-- Table structure for table `preguntas`
--

CREATE TABLE `preguntas` (
`id` int(11) NOT NULL,
  `titulo` varchar(47) DEFAULT NULL,
  `contenido` text,
  `idautor` int(11) DEFAULT NULL,
  `seccion` varchar(20) DEFAULT NULL,
  `creado` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preguntas`
--

INSERT INTO `preguntas` (`id`, `titulo`, `contenido`, `idautor`, `seccion`, `creado`) VALUES
(1, 'Necesito ayuda, el codigo no compila. URGENTE!!', 'Estoy iniciandome en la programacion en java. ', 1, 'Informatica', '2015-12-03 19:13:42'),
(2, 'No me pasan el balon ', 'Me considero el mejor del equipo pero me llaman chupon. ', 2, 'Deportes', '2015-12-03 19:13:42'),
(3, 'Me falla el codigo', 'El cakephp es bastante complejo de entender y tengo el siguiente error ', 1, 'Informatica', '2015-12-03 19:14:21'),
(4, 'Quien es el pichichi de la champions', 'No se si es CR o Suarez. ', 2, 'Deportes', '2015-12-03 19:14:49'),
(5, 'Que peli me recomendais?', 'Me gustan las pelis de accion. Recomendadme!!', 4, 'General', '2015-12-04 06:31:35'),
(6, 'Prueba1', 'Prueba1 jaja', 4, 'General', '2015-12-04 10:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `respuestas`
--

CREATE TABLE `respuestas` (
`id` int(11) NOT NULL,
  `contenido` text,
  `idautor` int(11) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `positivo` int(11) DEFAULT NULL,
  `negativo` int(11) DEFAULT NULL,
  `totalvotos` int(11) DEFAULT NULL,
  `idpregunta` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `respuestas`
--

INSERT INTO `respuestas` (`id`, `contenido`, `idautor`, `creado`, `positivo`, `negativo`, `totalvotos`, `idpregunta`) VALUES
(1, 'El error esta en tus variables x y suma.', 3, '2015-12-03 19:14:03', 2, 0, NULL, 1),
(2, 'Mira tutoriales, fijo que te ayudarán.', 2, '2015-12-03 19:14:36', 5, 0, NULL, 1),
(3, 'Por chupón.', 3, '2015-12-03 19:15:08', 6, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
`id` int(11) NOT NULL,
  `nick` varchar(14) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `password`, `nombre`, `apellido`) VALUES
(1, 'DavidRoman2494', '$2a$10$FzdGpF7qDbnNbYzf7ic3weWUUJdXM1RffvcO4H0rGOyaWxaPOAPGq', 'David', 'Román García'),
(2, 'IGD1989', '$2a$10$Fw4hZ/7h0/CB3K/b6L4fdebiOp2oKWejKeHrY4o.ThPvDn4lB/NqO', 'Isaac', 'González Domínguez'),
(3, 'ismasg20', '$2a$10$IoFQIqa/iLuahIpBP6Q3ieDB9.KZ7XiUU8oy2/RUjVU4oOmtltgPu', 'Ismael', 'Sierra García'),
(4, 'braissg13', '$2a$10$utfobJ2EA8/7xGgqlzwAzugONAujK7dxWv.UVXX8UKOXjh6BEvNbi', 'Brais', 'SG'),
(5, 'cubano33', '$2a$10$IaaMhMoEtSZr3JBP7hqbH.bHbtMAHb6I5b4MCNmzmcZEnLWW4oSoC', 'Marino', 'BD'),
(6, 'fififi', 'abcabc', 'FiIII', 'tresmil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `preguntas`
--
ALTER TABLE `preguntas`
 ADD PRIMARY KEY (`id`), ADD KEY `idautor` (`idautor`);

--
-- Indexes for table `respuestas`
--
ALTER TABLE `respuestas`
 ADD PRIMARY KEY (`id`), ADD KEY `idautor` (`idautor`), ADD KEY `idpregunta` (`idpregunta`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `preguntas`
--
ALTER TABLE `preguntas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `respuestas`
--
ALTER TABLE `respuestas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
