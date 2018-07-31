/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : solicitudescj

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-07-25 09:16:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for careers
-- ----------------------------
DROP TABLE IF EXISTS `careers`;
CREATE TABLE `careers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` varchar(1) DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of careers
-- ----------------------------

-- ----------------------------
-- Table structure for postulants
-- ----------------------------
DROP TABLE IF EXISTS `postulants`;
CREATE TABLE `postulants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `identificacion` varchar(13) DEFAULT NULL,
  `semestre` int(2) DEFAULT NULL,
  `career_id` int(11) DEFAULT NULL,
  `direccion` longtext,
  `celular` varchar(10) DEFAULT NULL,
  `correo_institucional` varchar(50) DEFAULT NULL,
  `cedula_archivo` longtext,
  `papeleta_archivo` longtext,
  `foto_archivo` longtext,
  `curriculum_archivo` longtext,
  `certificado_matricula` longtext,
  `certificado_no_arrastre` longtext,
  `solicitud_sellada` longtext,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(1) DEFAULT 'A',
  `convencional` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of postulants
-- ----------------------------
INSERT INTO `postulants` VALUES ('5', 'Anthony William', 'Espinoza Fajardo', '0926339730', '7', null, 'Guayaquil', '982364756', null, null, null, null, null, null, null, null, '2018-07-24 15:13:18', '2018-07-24 15:13:18', 'A', '2364756');

-- ----------------------------
-- Table structure for requests
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) DEFAULT '5',
  `postulant_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of requests
-- ----------------------------
INSERT INTO `requests` VALUES ('1', '5', '5', '2018-07-24 15:13:18', '2018-07-24 15:13:18');

-- ----------------------------
-- Table structure for states
-- ----------------------------
DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` varchar(1) DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `abv` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of states
-- ----------------------------
INSERT INTO `states` VALUES ('1', 'AUTORIZADO', 'A', null, null, 'AU');
INSERT INTO `states` VALUES ('2', 'APROBADO', 'A', null, null, 'AP');
INSERT INTO `states` VALUES ('3', 'NEGADO', 'A', null, null, 'NE');
INSERT INTO `states` VALUES ('4', 'ABANDONO', 'A', null, null, 'AB');
INSERT INTO `states` VALUES ('5', 'INACTIVO', 'A', null, null, 'IN');
