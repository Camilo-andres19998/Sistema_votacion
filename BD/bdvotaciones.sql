-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bdvotaciones
CREATE DATABASE IF NOT EXISTS `bdvotaciones` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdvotaciones`;

-- Volcando estructura para tabla bdvotaciones.candidato
CREATE TABLE IF NOT EXISTS `candidato` (
  `id` int NOT NULL AUTO_INCREMENT,
  `candidato` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdvotaciones.candidato: ~5 rows (aproximadamente)
INSERT INTO `candidato` (`id`, `candidato`) VALUES
	(32, 'candidato 1'),
	(33, 'Candidato 4'),
	(34, 'Candidato 3'),
	(35, 'Candidato 2'),
	(36, 'Candidato 5');

-- Volcando estructura para tabla bdvotaciones.comunas
CREATE TABLE IF NOT EXISTS `comunas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdvotaciones.comunas: ~14 rows (aproximadamente)
INSERT INTO `comunas` (`id`, `nombre`) VALUES
	(1, 'Huechuraba'),
	(2, 'Cerro Navia'),
	(3, 'Conchalí'),
	(4, 'El Bosque'),
	(5, 'Estación Central'),
	(7, 'Independencia'),
	(8, 'La Cisterna'),
	(9, 'La Florida'),
	(10, 'La Granja'),
	(11, 'La Pintana'),
	(12, 'La Reina'),
	(13, 'Las Condes'),
	(14, 'Lo Barnechea'),
	(15, 'Vitacura');

-- Volcando estructura para tabla bdvotaciones.regiones
CREATE TABLE IF NOT EXISTS `regiones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `region` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdvotaciones.regiones: ~16 rows (aproximadamente)
INSERT INTO `regiones` (`id`, `region`) VALUES
	(1, 'Región de Arica y Parinacota'),
	(2, 'Región de Tarapacá'),
	(3, 'Región de Antofagasta'),
	(4, 'Región de Atacama'),
	(5, 'Región de Coquimbo'),
	(6, 'Región de Valparaíso'),
	(7, 'Región Metropolitana de Santiago'),
	(8, 'Región del Libertador Gral. Bernardo O’Higgins'),
	(9, 'Región del Maule'),
	(10, 'Región del Ñuble'),
	(11, 'Región del Biobío'),
	(12, 'Región de La Araucanía'),
	(13, 'Región de Los Ríos'),
	(14, 'Región de Los Lagos'),
	(15, 'Región de Aysén del Gral. Carlos Ibáñez del Campo'),
	(16, 'Región de Magallanes y de la Antártica Chilena');

-- Volcando estructura para tabla bdvotaciones.votos
CREATE TABLE IF NOT EXISTS `votos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `region` int NOT NULL,
  `candidato` int NOT NULL,
  `como_se_entero` varchar(255) NOT NULL,
  `comuna` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_region` (`region`),
  KEY `fk_voto_candidato` (`candidato`),
  KEY `comuna` (`comuna`),
  CONSTRAINT `fk_comuna` FOREIGN KEY (`comuna`) REFERENCES `comunas` (`id`),
  CONSTRAINT `fk_region` FOREIGN KEY (`region`) REFERENCES `regiones` (`id`),
  CONSTRAINT `fk_voto_candidato` FOREIGN KEY (`candidato`) REFERENCES `candidato` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdvotaciones.votos: ~1 rows (aproximadamente)
INSERT INTO `votos` (`id`, `nombre_apellido`, `alias`, `rut`, `email`, `region`, `candidato`, `como_se_entero`, `comuna`) VALUES
	(1, 'Andres Poblete', 'camilo89', '19.930.920-k', 'camilo@gmail.com', 6, 32, 'tv,redes_sociales', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
