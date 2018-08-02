/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : solicitudescjnew

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-08-02 09:24:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for periodos
-- ----------------------------
DROP TABLE IF EXISTS `periodos`;
CREATE TABLE `periodos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `fechai` date DEFAULT NULL,
  `fechaf` date DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of periodos
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
  `carrera` varchar(50) DEFAULT NULL,
  `direccion` longtext,
  `celular` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `edad` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `horario_t` varchar(50) DEFAULT NULL,
  `cedula_archivo` int(1) DEFAULT '0',
  `papeleta_archivo` int(1) DEFAULT '0',
  `paralelo` varchar(50) DEFAULT '0',
  `foto_archivo` int(1) DEFAULT '0',
  `curriculum_archivo` int(1) DEFAULT '0',
  `certificado_matricula` int(1) DEFAULT '0',
  `certificado_no_arrastre` int(1) DEFAULT '0',
  `solicitud_sellada` int(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(1) DEFAULT 'A',
  `convencional` varchar(10) DEFAULT NULL,
  `modalidad` varchar(10) DEFAULT NULL,
  `horario` varchar(10) DEFAULT NULL,
  `provincia_id` varchar(50) DEFAULT NULL,
  `ciudad_id` varchar(50) DEFAULT NULL,
  `labora` varchar(50) DEFAULT NULL,
  `direccion_t` varchar(50) DEFAULT NULL,
  `telefono_t` varchar(50) DEFAULT NULL,
  `ocupacion` varchar(50) DEFAULT NULL,
  `discapacidad` varchar(50) DEFAULT NULL,
  `carnet` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `correo_institucional` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of postulants
-- ----------------------------
INSERT INTO `postulants` VALUES ('5', 'Anthony Willia', 'Espinoza Fajardo', '0926339730', '8', 'Sociologia', 'gye', '982364756', 'a@djd.com', '55', '2018-07-11', 'lunes a viernes', '1', '1', 'asd', '1', '0', '0', '0', '1', '2018-07-29 19:18:17', '2018-07-29 19:18:17', 'A', '2364756', 'MODULAR', 'MATUTINO', '357', null, 'NO', 'dunranm', '282244', 'desarrollo', 'NO', '123123', 'SOLTERO', 'DEFENSORIA PUBLICA', null);
INSERT INTO `postulants` VALUES ('16', 'asd', 'qasd', '0922606262', '7', 'Derecho', 'sdf', '234', 'a16@gmail.com', null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '2018-07-29 19:37:50', '2018-07-29 19:37:50', 'A', '1234', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `postulants` VALUES ('17', 'asdfa', 'sdf', '0926262645', '7', 'Derecho', 'sdf', '4566', 'a17@gmail.com', null, '2018-07-06', null, '1', '1', '0', '1', '1', '1', '1', '1', '2018-07-29 19:37:22', '2018-07-29 19:37:22', 'A', '566', null, null, null, null, 'SI', null, null, null, 'SI', '12532535', null, 'CIVIL', null);
INSERT INTO `postulants` VALUES ('18', 'prueba', 'espinoza', '0972725625', '7', 'Sociologia', 'lala', '22222', 'a646@hotmail.com', null, null, null, '1', '1', '0', '1', '1', '1', '1', '1', '2018-07-29 19:52:11', '2018-07-29 14:52:11', 'A', '1231231', null, null, null, null, 'SI', null, null, null, 'SI', null, null, 'CIVIL', null);
INSERT INTO `postulants` VALUES ('19', 'JHASDH', 'AKAHSD', '0927276262', '7', 'Derecho', 'DFAS', '234', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '2018-07-29 14:57:14', '2018-07-29 14:57:14', 'A', '1213', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `postulants` VALUES ('20', 'ajkshd', 'kjhsdf', '0938373763', '7', 'Sociologia', 'kahsd', '234', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '2018-07-29 14:57:57', '2018-07-29 14:57:57', 'A', '12312', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `postulants` VALUES ('21', 'asd', 'saada', '0937373737', '7', 'Sociologia', 'asd', '3333', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '2018-07-29 15:12:53', '2018-07-29 15:12:53', 'A', '123', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `postulants` VALUES ('22', 'trddg', 'ufvgv', '0926570137', '9', 'Derecho', 'iuyt', '099', 'a@bba.com', '12', '2018-07-04', null, '1', '1', '0', '1', '1', '1', '1', '1', '2018-07-29 20:37:27', '2018-07-29 15:37:27', 'A', null, 'SEMESTRAL', 'MATUTINO', '357', null, 'NO', null, null, null, 'NO', null, 'SOLTERO', 'FAMILIA', null);
INSERT INTO `postulants` VALUES ('23', 'Anthony William', 'Espinoza Fajardo', '0926339731', '7', 'Sociologia', 'Guayaquil', '0972626262', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '2018-08-02 09:20:31', '2018-08-02 09:20:31', 'A', '2364756', null, null, null, null, null, null, null, null, null, null, null, null, 'abb@ug.edu.ec');

-- ----------------------------
-- Table structure for requests
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) DEFAULT '5',
  `postulant_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(1) DEFAULT 'A',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of requests
-- ----------------------------
INSERT INTO `requests` VALUES ('1', '6', '5', '2018-07-29 09:02:36', 'A', '2018-07-29 09:02:36');
INSERT INTO `requests` VALUES ('12', '6', '16', '2018-07-31 15:32:09', 'A', '2018-07-31 15:32:09');
INSERT INTO `requests` VALUES ('13', '2', '17', '2018-07-29 19:44:09', 'A', '2018-07-29 14:44:09');
INSERT INTO `requests` VALUES ('14', '2', '18', '2018-07-29 19:55:43', 'A', '2018-07-29 14:55:43');
INSERT INTO `requests` VALUES ('15', '5', '19', '2018-07-29 14:57:14', 'A', '2018-07-29 14:57:14');
INSERT INTO `requests` VALUES ('16', '5', '20', '2018-07-29 14:57:57', 'A', '2018-07-29 14:57:57');
INSERT INTO `requests` VALUES ('17', '5', '21', '2018-07-29 15:12:53', 'A', '2018-07-29 15:12:53');
INSERT INTO `requests` VALUES ('18', '2', '22', '2018-07-29 20:38:23', 'A', '2018-07-29 15:38:23');
INSERT INTO `requests` VALUES ('19', '5', '23', '2018-08-02 09:20:31', 'A', '2018-08-02 09:20:31');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of states
-- ----------------------------
INSERT INTO `states` VALUES ('1', 'AUTORIZADO', 'A', null, null, 'AU');
INSERT INTO `states` VALUES ('2', 'APROBADO', 'A', null, null, 'AP');
INSERT INTO `states` VALUES ('3', 'NEGADO', 'A', null, null, 'NE');
INSERT INTO `states` VALUES ('4', 'ABANDONO', 'A', null, null, 'AB');
INSERT INTO `states` VALUES ('5', 'PENDIENTE', 'A', '2018-07-29 05:52:15', '2018-07-29 05:52:15', 'PE');
INSERT INTO `states` VALUES ('6', 'AUTORIZADO-DOCUMENTOS INCOMPLETO', 'A', '2018-07-29 08:25:11', '2018-07-29 08:25:11', 'AUI');

-- ----------------------------
-- Table structure for students_teachers
-- ----------------------------
DROP TABLE IF EXISTS `students_teachers`;
CREATE TABLE `students_teachers` (
  `id` int(11) NOT NULL,
  `user_est_id` int(11) DEFAULT NULL,
  `user_doc_id` int(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(5) DEFAULT NULL,
  `periodo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of students_teachers
-- ----------------------------
