-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 08-05-2023 a les 18:49:14
-- Versió del servidor: 10.4.27-MariaDB
-- Versió de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `campeoneslol`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `campeon`
--

CREATE TABLE `campeon` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `nivel` int(11) NOT NULL,
  `ataque` int(11) NOT NULL,
  `armadura` int(11) NOT NULL,
  `vida` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `campeon`
--

INSERT INTO `campeon` (`id`, `nombre`, `nivel`, `ataque`, `armadura`, `vida`, `id_usuario`) VALUES
(1, 'Sejuani', 17, 240, 50, 1700, 1),
(10, 'Kled', 20, 40, 100, 3000, 5),
(11, 'Riven', 52, 80, 40, 1200, 4),
(12, 'Yasuo', 12, 34, 100, 3456, 7),
(13, 'Morgana', 23, 34, 54, 500, 4),
(14, 'Ahri', 23, 58, 67, 1380, 6);

-- --------------------------------------------------------

--
-- Estructura de la taula `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `id_tipo_habilidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `habilidades`
--

INSERT INTO `habilidades` (`id`, `nombre`, `descripcion`, `id_tipo_habilidad`) VALUES
(7, 'Embestida', 'Golpe en una dirección', 12),
(8, 'Hechizo Luminoso', 'Esfera de luz que atrapa e inflige daño mágico', 13),
(9, 'Chispa Final', 'Rayo de luz que inflige daño mágico en area', 8),
(10, 'Hoja del exilio', 'Lanza una serie de golpes muy veloces', 9),
(11, 'Tempestad de acero', 'Inflige daño a los enemigos', 10),
(12, 'Muro de viento', 'Bloquea todos los proyectiles', 8),
(13, 'Hoja cortante', 'Aumenta el daño de ataque y alcance', 11);

-- --------------------------------------------------------

--
-- Estructura de la taula `habilidades_campeones`
--

CREATE TABLE `habilidades_campeones` (
  `id` int(11) NOT NULL,
  `id_campeon` int(11) NOT NULL,
  `id_habilidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `habilidades_campeones`
--

INSERT INTO `habilidades_campeones` (`id`, `id_campeon`, `id_habilidad`) VALUES
(5, 1, 7),
(6, 11, 10),
(7, 12, 13),
(8, 13, 8),
(9, 14, 9);

-- --------------------------------------------------------

--
-- Estructura de la taula `tipo_habilidad`
--

CREATE TABLE `tipo_habilidad` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `tipo_habilidad`
--

INSERT INTO `tipo_habilidad` (`id`, `tipo`) VALUES
(8, 'Magico'),
(9, 'Daño Fisico'),
(10, 'Daño verdadero'),
(11, 'Reducción armadura'),
(12, 'Heridas graves'),
(13, 'Penetración magica');

-- --------------------------------------------------------

--
-- Estructura de la taula `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre_cuenta` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `region` varchar(40) NOT NULL,
  `pais` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_cuenta`, `password`, `region`, `pais`) VALUES
(1, 'robert', '202cb962ac59075b964b07152d234b70', 'Europa', 'España'),
(4, 'Laura', '99c5e07b4d5de9d18c350cdf64c5aa3d', 'EU', 'Francia'),
(5, 'Eric', '29988429c481f219b8c5ba8c071440e1', 'NA', 'Canada'),
(6, 'Victor', 'ffc150a160d37e92012c196b6af4160d', 'EUNE', 'Suecia'),
(7, 'Jesus', '110d46fcd978c24f306cd7fa23464d73', 'RU', 'Russia');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `campeon`
--
ALTER TABLE `campeon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campeon_ibfk_1` (`id_usuario`);

--
-- Índexs per a la taula `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habilidades_ibfk_1` (`id_tipo_habilidad`);

--
-- Índexs per a la taula `habilidades_campeones`
--
ALTER TABLE `habilidades_campeones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habilidades_campeones_ibfk_1` (`id_campeon`),
  ADD KEY `habilidades_campeones_ibfk_2` (`id_habilidad`);

--
-- Índexs per a la taula `tipo_habilidad`
--
ALTER TABLE `tipo_habilidad`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `campeon`
--
ALTER TABLE `campeon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la taula `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la taula `habilidades_campeones`
--
ALTER TABLE `habilidades_campeones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la taula `tipo_habilidad`
--
ALTER TABLE `tipo_habilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la taula `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `campeon`
--
ALTER TABLE `campeon`
  ADD CONSTRAINT `campeon_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriccions per a la taula `habilidades`
--
ALTER TABLE `habilidades`
  ADD CONSTRAINT `habilidades_ibfk_1` FOREIGN KEY (`id_tipo_habilidad`) REFERENCES `tipo_habilidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriccions per a la taula `habilidades_campeones`
--
ALTER TABLE `habilidades_campeones`
  ADD CONSTRAINT `habilidades_campeones_ibfk_1` FOREIGN KEY (`id_campeon`) REFERENCES `campeon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `habilidades_campeones_ibfk_2` FOREIGN KEY (`id_habilidad`) REFERENCES `habilidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
