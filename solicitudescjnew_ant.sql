/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : solicitudescjnew_ant

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-08-07 11:28:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for asistencias
-- ----------------------------
DROP TABLE IF EXISTS `asistencias`;
CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(1) DEFAULT 'I',
  `semana` varchar(8) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `horas` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asistencias
-- ----------------------------

-- ----------------------------
-- Table structure for horarios
-- ----------------------------
DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios` (
  `id` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `periodo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of horarios
-- ----------------------------
INSERT INTO `horarios` VALUES ('1', 'horario 1', '1');
INSERT INTO `horarios` VALUES ('2', 'horario 2', '1');
INSERT INTO `horarios` VALUES ('3', 'horario 3', '1');
INSERT INTO `horarios` VALUES ('4', 'horario 4', '1');

-- ----------------------------
-- Table structure for periodos
-- ----------------------------
DROP TABLE IF EXISTS `periodos`;
CREATE TABLE `periodos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `fechai` date DEFAULT NULL,
  `fechai_extraordinaria` date DEFAULT NULL,
  `fechaf` date DEFAULT NULL,
  `fechaf_extraordinaria` date DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `maxtutoria` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of periodos
-- ----------------------------
INSERT INTO `periodos` VALUES ('1', 'ciclo 1 2018-2019', '2018-08-05', null, '2018-08-30', null, 'A', null, null, '2');

-- ----------------------------
-- Table structure for postulants
-- ----------------------------
DROP TABLE IF EXISTS `postulants`;
CREATE TABLE `postulants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `identificacion` varchar(13) DEFAULT NULL,
  `semestre` varchar(50) DEFAULT NULL,
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
  `civil` int(11) DEFAULT '0',
  `penal` int(11) DEFAULT '0',
  `familia` int(11) DEFAULT '0',
  `laboral` int(11) DEFAULT '0',
  `violenciaf` int(11) DEFAULT '0',
  `inquilinato` int(11) DEFAULT '0',
  `fiscalia` int(11) DEFAULT '0',
  `defensoria` int(11) DEFAULT '0',
  `constitucional` int(11) DEFAULT '0',
  `motivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of postulants
-- ----------------------------
INSERT INTO `postulants` VALUES ('24', 'Anthony', 'Espinoza', '0926339730', 'EGRESADO', 'Derecho', 'asd', '0982364756', 'a@ug.edu.ec', '22', '2018-08-03', null, '1', '1', '123', '1', '1', '1', '1', '1', '2018-08-05 12:47:31', '2018-08-05 07:47:31', 'A', '2801544', 'ANUAL', 'VESPERTINO', 'aaa', 'v vv', 'SI', null, null, null, 'SI', null, 'CASADO', null, 'a@ug.edu.ec', '1', '1', '1', '0', '1', '0', '0', '0', '0', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of requests
-- ----------------------------
INSERT INTO `requests` VALUES ('20', '2', '24', '2018-08-05 13:44:23', 'A', '2018-08-05 08:44:23');
INSERT INTO `requests` VALUES ('21', '5', '25', '2018-08-05 10:02:41', 'A', '2018-08-05 10:02:41');
INSERT INTO `requests` VALUES ('22', '5', '26', '2018-08-05 10:11:24', 'A', '2018-08-05 10:11:24');
INSERT INTO `requests` VALUES ('23', '5', '27', '2018-08-05 10:14:26', 'A', '2018-08-05 10:14:26');
INSERT INTO `requests` VALUES ('24', '5', '28', '2018-08-05 10:27:55', 'A', '2018-08-05 10:27:55');
INSERT INTO `requests` VALUES ('25', '5', '29', '2018-08-05 10:29:37', 'A', '2018-08-05 10:29:37');
INSERT INTO `requests` VALUES ('26', '5', '30', '2018-08-05 10:30:42', 'A', '2018-08-05 10:30:42');
INSERT INTO `requests` VALUES ('27', '5', '31', '2018-08-05 10:32:29', 'A', '2018-08-05 10:32:29');
INSERT INTO `requests` VALUES ('29', '2', '33', '2018-08-05 16:33:25', 'A', '2018-08-05 11:33:25');
INSERT INTO `requests` VALUES ('30', '5', '34', '2018-08-07 05:26:24', 'A', '2018-08-07 05:26:24');
INSERT INTO `requests` VALUES ('31', '2', '35', '2018-08-07 07:44:23', 'A', '2018-08-07 07:44:23');
INSERT INTO `requests` VALUES ('32', '5', '36', '2018-08-07 11:22:19', 'A', '2018-08-07 11:22:19');

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
INSERT INTO `states` VALUES ('5', 'PENDIENTE', 'A', '2018-07-29 00:52:15', '2018-07-29 00:52:15', 'PE');
INSERT INTO `states` VALUES ('6', 'AUTORIZADO', 'A', '2018-08-07 06:32:29', '2018-08-07 06:32:29', 'AUI');

-- ----------------------------
-- Table structure for students_teachers
-- ----------------------------
DROP TABLE IF EXISTS `students_teachers`;
CREATE TABLE `students_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_est_id` int(11) DEFAULT NULL,
  `user_doc_id` int(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(5) DEFAULT NULL,
  `horario_id` int(11) DEFAULT NULL,
  `lugar_id` int(11) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `cant_horas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of students_teachers
-- ----------------------------
INSERT INTO `students_teachers` VALUES ('7', '28', '27', 'I', '2018-08-05 14:48:36', '2018-08-05 14:48:36', 'SUP', '3', '1', null, null, null);
INSERT INTO `students_teachers` VALUES ('9', '28', '30', 'A', '2018-08-05 14:22:45', '2018-08-05 14:22:45', 'TUT', null, null, null, null, null);
INSERT INTO `students_teachers` VALUES ('14', '35', '27', 'A', '2018-08-05 16:57:49', '2018-08-05 16:57:49', 'SUP', '1', '1', null, null, null);
INSERT INTO `students_teachers` VALUES ('15', '35', '30', 'A', '2018-08-05 11:51:23', '2018-08-05 11:51:23', 'TUT', null, null, null, null, null);
INSERT INTO `students_teachers` VALUES ('19', '36', '25', 'A', '2018-08-07 08:52:21', '2018-08-07 08:52:21', 'SUP', null, '1', '01:01:00', '01:23:00', null);
INSERT INTO `students_teachers` VALUES ('20', '36', '30', 'A', '2018-08-07 08:51:48', '2018-08-07 08:51:48', 'TUT', null, null, null, null, null);
