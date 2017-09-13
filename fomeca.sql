/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : fomeca

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-13 10:01:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `adecuacionedilicia`
-- ----------------------------
DROP TABLE IF EXISTS `adecuacionedilicia`;
CREATE TABLE `adecuacionedilicia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCapital` int(11) NOT NULL,
  `transmision` decimal(15,0) NOT NULL,
  `produccion` decimal(15,0) NOT NULL,
  `infraestructura` decimal(15,0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idCapitalAdecuacion` (`idCapital`),
  CONSTRAINT `fk_idCapitalAdecuacion` FOREIGN KEY (`idCapital`) REFERENCES `capital` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of adecuacionedilicia
-- ----------------------------

-- ----------------------------
-- Table structure for `capital`
-- ----------------------------
DROP TABLE IF EXISTS `capital`;
CREATE TABLE `capital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSubsidio` int(11) NOT NULL,
  `adecuacionEdilicia` decimal(15,0) NOT NULL,
  `equipamientoTecnologico` decimal(15,0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idSubsidioCapital` (`idSubsidio`),
  CONSTRAINT `fk_idSubsidioCapital` FOREIGN KEY (`idSubsidio`) REFERENCES `subsidio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of capital
-- ----------------------------

-- ----------------------------
-- Table structure for `contraparte`
-- ----------------------------
DROP TABLE IF EXISTS `contraparte`;
CREATE TABLE `contraparte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSubsidio` int(11) DEFAULT NULL,
  `rrhhPermanentes` decimal(15,0) DEFAULT NULL,
  `servicios` decimal(15,0) DEFAULT NULL,
  `otros` decimal(15,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idSubsidioContraparte` (`idSubsidio`),
  CONSTRAINT `fk_idSubsidioContraparte` FOREIGN KEY (`idSubsidio`) REFERENCES `subsidio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of contraparte
-- ----------------------------

-- ----------------------------
-- Table structure for `corriente`
-- ----------------------------
DROP TABLE IF EXISTS `corriente`;
CREATE TABLE `corriente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSubsidio` int(11) NOT NULL,
  `rrhhNoPermanentes` decimal(15,0) NOT NULL,
  `viaticos` decimal(15,0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idSubsidioCorriente` (`idSubsidio`),
  CONSTRAINT `fk_idSubsidioCorriente` FOREIGN KEY (`idSubsidio`) REFERENCES `subsidio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of corriente
-- ----------------------------

-- ----------------------------
-- Table structure for `descripcionadecuacionedilicia`
-- ----------------------------
DROP TABLE IF EXISTS `descripcionadecuacionedilicia`;
CREATE TABLE `descripcionadecuacionedilicia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAdecuacionEdilicia` int(11) DEFAULT NULL,
  `tipoDistincion` int(2) DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `desembolso` decimal(15,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idAdecuacionDescripcionAdecuacion` (`idAdecuacionEdilicia`),
  KEY `tipoDistincion` (`tipoDistincion`),
  CONSTRAINT `fk_idAdecuacionDescripcionAdecuacion` FOREIGN KEY (`idAdecuacionEdilicia`) REFERENCES `adecuacionedilicia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of descripcionadecuacionedilicia
-- ----------------------------

-- ----------------------------
-- Table structure for `descripcionequipamientotecnologico`
-- ----------------------------
DROP TABLE IF EXISTS `descripcionequipamientotecnologico`;
CREATE TABLE `descripcionequipamientotecnologico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEquipamientoTecnologico` int(11) DEFAULT NULL,
  `tipoDistincion` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `finalidad` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precioUnitario` decimal(15,0) DEFAULT NULL,
  `desembolso` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idEquipamientoDescripcionEquipamiento` (`idEquipamientoTecnologico`),
  CONSTRAINT `fk_idEquipamientoDescripcionEquipamiento` FOREIGN KEY (`idEquipamientoTecnologico`) REFERENCES `equipamientotecnologico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of descripcionequipamientotecnologico
-- ----------------------------

-- ----------------------------
-- Table structure for `distincionadecuacionedilicia`
-- ----------------------------
DROP TABLE IF EXISTS `distincionadecuacionedilicia`;
CREATE TABLE `distincionadecuacionedilicia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distincion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of distincionadecuacionedilicia
-- ----------------------------
INSERT INTO `distincionadecuacionedilicia` VALUES ('1', 'Transmisión');
INSERT INTO `distincionadecuacionedilicia` VALUES ('2', 'Producción');
INSERT INTO `distincionadecuacionedilicia` VALUES ('3', 'Infraestructura');
INSERT INTO `distincionadecuacionedilicia` VALUES ('4', 'Digitalización de se');

-- ----------------------------
-- Table structure for `equipamientotecnologico`
-- ----------------------------
DROP TABLE IF EXISTS `equipamientotecnologico`;
CREATE TABLE `equipamientotecnologico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCapital` int(11) NOT NULL,
  `produccion` decimal(15,0) DEFAULT NULL,
  `transmision` decimal(15,0) DEFAULT NULL,
  `infraestructura` decimal(15,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idCapitalEquipamiento` (`idCapital`),
  CONSTRAINT `fk_idCapitalEquipamiento` FOREIGN KEY (`idCapital`) REFERENCES `capital` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of equipamientotecnologico
-- ----------------------------

-- ----------------------------
-- Table structure for `linea`
-- ----------------------------
DROP TABLE IF EXISTS `linea`;
CREATE TABLE `linea` (
  `id` int(1) NOT NULL,
  `nombreLinea` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of linea
-- ----------------------------
INSERT INTO `linea` VALUES ('1', 'Linea 1');
INSERT INTO `linea` VALUES ('2', 'Linea 2');
INSERT INTO `linea` VALUES ('3', 'Linea 3');
INSERT INTO `linea` VALUES ('4', 'Linea 4');
INSERT INTO `linea` VALUES ('5', 'Linea 5');

-- ----------------------------
-- Table structure for `otros`
-- ----------------------------
DROP TABLE IF EXISTS `otros`;
CREATE TABLE `otros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idContraparte` int(11) DEFAULT NULL,
  `rubro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desembolso` decimal(15,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idContraparteOtros` (`idContraparte`),
  CONSTRAINT `fk_idContraparteOtros` FOREIGN KEY (`idContraparte`) REFERENCES `contraparte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of otros
-- ----------------------------

-- ----------------------------
-- Table structure for `persona`
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razonSocial` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nombreFantasia` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `cuit` bigint(12) NOT NULL,
  `tipoPersona` int(1) NOT NULL,
  PRIMARY KEY (`cuit`,`id`),
  UNIQUE KEY `id` (`id`),
  KEY `cuit` (`cuit`),
  KEY `tipoPersona` (`tipoPersona`),
  CONSTRAINT `fk_tipoPersonaId` FOREIGN KEY (`tipoPersona`) REFERENCES `tipopersona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of persona
-- ----------------------------

-- ----------------------------
-- Table structure for `presupuestos`
-- ----------------------------
DROP TABLE IF EXISTS `presupuestos`;
CREATE TABLE `presupuestos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSubsidio` int(11) NOT NULL,
  `razonSocialProveedor` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `desembolso` decimal(15,0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `fk_idSubsidioPresupuestos` (`idSubsidio`),
  CONSTRAINT `fk_idSubsidioPresupuestos` FOREIGN KEY (`idSubsidio`) REFERENCES `subsidio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of presupuestos
-- ----------------------------

-- ----------------------------
-- Table structure for `rrhhnopermanentes`
-- ----------------------------
DROP TABLE IF EXISTS `rrhhnopermanentes`;
CREATE TABLE `rrhhnopermanentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCorriente` int(11) DEFAULT NULL,
  `funcion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `honorarios` decimal(15,0) DEFAULT NULL,
  `meses` int(11) DEFAULT NULL,
  `desembolso` decimal(15,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idCorrienteRrhhNoPermanente` (`idCorriente`),
  CONSTRAINT `fk_idCorrienteRrhhNoPermanente` FOREIGN KEY (`idCorriente`) REFERENCES `corriente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rrhhnopermanentes
-- ----------------------------

-- ----------------------------
-- Table structure for `rrhhpermanentes`
-- ----------------------------
DROP TABLE IF EXISTS `rrhhpermanentes`;
CREATE TABLE `rrhhpermanentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idContraparte` int(11) DEFAULT NULL,
  `rubro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desembolso` decimal(15,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idContraparteRrhhPermanentes` (`idContraparte`),
  CONSTRAINT `fk_idContraparteRrhhPermanentes` FOREIGN KEY (`idContraparte`) REFERENCES `contraparte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rrhhpermanentes
-- ----------------------------

-- ----------------------------
-- Table structure for `servicios`
-- ----------------------------
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idContraparte` int(11) DEFAULT NULL,
  `rubro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desembolso` decimal(15,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idContraparteServicios` (`idContraparte`),
  CONSTRAINT `fk_idContraparteServicios` FOREIGN KEY (`idContraparte`) REFERENCES `contraparte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of servicios
-- ----------------------------

-- ----------------------------
-- Table structure for `subsidio`
-- ----------------------------
DROP TABLE IF EXISTS `subsidio`;
CREATE TABLE `subsidio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuitPersona` bigint(12) NOT NULL,
  `subsidio` decimal(15,0) NOT NULL,
  `gastoCapital` decimal(15,0) NOT NULL,
  `gastoCorriente` decimal(15,0) NOT NULL,
  `proyecto` decimal(15,0) NOT NULL,
  `contraparte` decimal(15,0) NOT NULL,
  `numeroLinea` int(1) DEFAULT NULL,
  `presupuesto` decimal(15,0) NOT NULL,
  `fechaPresentacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `cuit` (`cuitPersona`),
  KEY `numeroLinea` (`numeroLinea`),
  CONSTRAINT `fk_cuitPersonaPersona` FOREIGN KEY (`cuitPersona`) REFERENCES `persona` (`cuit`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_numeroLineaId` FOREIGN KEY (`numeroLinea`) REFERENCES `linea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of subsidio
-- ----------------------------

-- ----------------------------
-- Table structure for `tipopersona`
-- ----------------------------
DROP TABLE IF EXISTS `tipopersona`;
CREATE TABLE `tipopersona` (
  `id` int(1) NOT NULL,
  `tipoPersona` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tipopersona
-- ----------------------------
INSERT INTO `tipopersona` VALUES ('1', 'Persona jurídica sin fines de lucro');
INSERT INTO `tipopersona` VALUES ('2', 'Pueblos originarios');

-- ----------------------------
-- Table structure for `viaticos`
-- ----------------------------
DROP TABLE IF EXISTS `viaticos`;
CREATE TABLE `viaticos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCorriente` int(11) DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desembolso` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_idCorrienteViaticos` (`idCorriente`),
  CONSTRAINT `fk_idCorrienteViaticos` FOREIGN KEY (`idCorriente`) REFERENCES `corriente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of viaticos
-- ----------------------------
