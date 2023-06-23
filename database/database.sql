CREATE DATABASE ventas;
USE ventas;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `codcate` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`codcate`),
  UNIQUE KEY `categoria` (`categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `categorias` (`codcate`, `categoria`) VALUES
(1, 'Camisas'),
(2, 'Pantalones'),
(3, 'Calzado'),
(4, 'Teléfonos'),
(5, 'Pantallas'),
(6, 'Tablets'),
(7, 'Laptop');

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `codmarca` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codmarca`),
  UNIQUE KEY `marca` (`marca`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO `marcas` (`codmarca`, `marca`) VALUES
(1, 'Orange'),
(2, 'Dockers'),
(3, 'Nautica'),
(4, 'LG'),
(5, 'Samsung'),
(6, 'Nike'),
(7, 'Adidas'),
(8, 'Tommy'),
(9, 'Huawei'),
(10, 'Motorola'),
(11, 'HP'),
(12, 'DELL'),
(13, 'iPhone'),
(14, 'Sony');

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `codproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `existencia` int(11) DEFAULT '0',
  `codcate` int(11) DEFAULT NULL,
  `codmarca` int(11) DEFAULT NULL,
  `imagen` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`codproducto`),
  KEY `codcate` (`codcate`),
  KEY `codmarca` (`codmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO `productos` (`codproducto`, `nombre`, `precio`, `existencia`, `codcate`, `codmarca`, `imagen`) VALUES
(1, 'Camisa casual azul', '14.99', 25, 1, 2, '1.jpg'),
(2, 'Camisa casual blanca', '20.00', 25, 1, 1, '2.jpg'),
(3, 'Camisa casual', '49.99', 12, 1, 3, '3.jpg'),
(4, 'Camisa casual manga larga', '18.00', 7, 1, 1, 'nodisponible.jpg'),
(5, 'Camisa manga larga cuadros', '88.00', 0, 1, 3, 'nodisponible.jpg'),
(6, 'Pantalón negro', '53.00', 40, 2, 2, '6.jpg'),
(7, 'Pantalón azul', '48.00', 10, 2, 1, '7.jpg'),
(8, 'Calzado deportivos', '99.87', 9, 3, 6, '8.jpg'),
(9, 'Calzado deportivo', '114.00', 6, 3, 7, '9.jpg'),
(10, 'Calzado casual', '98.00', 10, 3, 8, '10.jpg'),
(11, 'Pantalla LG LED 65', '2749.00', 3, 5, 4, '11.jpg'),
(12, 'Pantalla Samsung Led 70', '999.00', 6, 5, 5, '12.jpg'),
(13, 'Huawei P30 Pro', '1149.00', 20, 4, 9, '13.jpg'),
(14, 'Huawei Y5', '135.00', 7, 4, 9, '14.jpg'),
(15, 'iPhone 11', '1200.00', 5, 4, 13, '15.jpg');

ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`codcate`) REFERENCES `categorias` (`codcate`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`codmarca`) REFERENCES `marcas` (`codmarca`);
COMMIT;

