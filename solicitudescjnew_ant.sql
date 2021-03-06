/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : solicitudescjnew_ant

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-08-22 13:33:36
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
  `descripcion` varchar(255) DEFAULT NULL,
  `horas` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asistencias
-- ----------------------------
INSERT INTO `asistencias` VALUES ('33', '32', '25', '2018-08-23', 'I', 'Semana 5', null, '2', '2018-08-22 12:20:15', '2018-08-22 13:30:45', '12:00:00', '14:00:00');
INSERT INTO `asistencias` VALUES ('34', '35', '25', '2018-08-22', 'I', 'Semana 1', null, '0', '2018-08-22 12:20:15', '2018-08-22 12:20:15', '09:00:00', '09:00:00');
INSERT INTO `asistencias` VALUES ('35', '32', '25', '2018-08-24', 'I', 'Semana 1', null, '2', '2018-08-22 13:31:14', '2018-08-22 13:31:14', '09:00:00', '11:00:00');

-- ----------------------------
-- Table structure for asistencias_monitor
-- ----------------------------
DROP TABLE IF EXISTS `asistencias_monitor`;
CREATE TABLE `asistencias_monitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `monitor_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'I',
  `semana` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horas` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of asistencias_monitor
-- ----------------------------

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `etnia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `convencional` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_sexo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instruccion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sector` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ocupacion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `iess` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `ingresos` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bono` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `discapacidad` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_discapacidad` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enfermedad` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_enfermedad` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto_cedula` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `monitor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of clientes
-- ----------------------------

-- ----------------------------
-- Table structure for consultas
-- ----------------------------
DROP TABLE IF EXISTS `consultas`;
CREATE TABLE `consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `practicante_id` int(11) DEFAULT NULL,
  `razon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detalle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `causa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_proceso` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidad_judicial` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `tipo_usuario` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `materia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_judicatura` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_patrocinio` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `defensoria_publica` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pretension_presion` double(8,2) DEFAULT NULL,
  `nombre_juez` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ultima_actividad` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_ultima_actividad` date DEFAULT NULL,
  `estado_caso` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resolucion_judicial` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_resolucion` date DEFAULT NULL,
  `convirtio_patrocinio` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of consultas
-- ----------------------------

-- ----------------------------
-- Table structure for ends
-- ----------------------------
DROP TABLE IF EXISTS `ends`;
CREATE TABLE `ends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(3) DEFAULT 'P',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ends
-- ----------------------------
INSERT INTO `ends` VALUES ('4', '32', '32Final.pdf', '2018-08-21 16:37:19', '2018-08-21 16:37:19', 'AD');

-- ----------------------------
-- Table structure for evaluacionestudiante
-- ----------------------------
DROP TABLE IF EXISTS `evaluacionestudiante`;
CREATE TABLE `evaluacionestudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `e1` varchar(2) DEFAULT NULL,
  `e2` varchar(2) DEFAULT NULL,
  `e3` varchar(2) DEFAULT NULL,
  `e4` varchar(2) DEFAULT NULL,
  `e5` varchar(2) DEFAULT NULL,
  `e6` varchar(2) DEFAULT NULL,
  `e7` varchar(2) DEFAULT NULL,
  `e8` varchar(2) DEFAULT NULL,
  `e9` varchar(2) DEFAULT NULL,
  `e10` varchar(2) DEFAULT NULL,
  `e11` varchar(2) DEFAULT NULL,
  `s1` varchar(2) DEFAULT NULL,
  `ob1` varchar(255) DEFAULT NULL,
  `ob2` varchar(255) DEFAULT NULL,
  `ob3` varchar(255) DEFAULT NULL,
  `ob4` varchar(255) DEFAULT NULL,
  `sugerencias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of evaluacionestudiante
-- ----------------------------
INSERT INTO `evaluacionestudiante` VALUES ('2', '35', '2018-08-16 12:13:10', '2018-08-16 12:13:10', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for evaluacionsupervisor
-- ----------------------------
DROP TABLE IF EXISTS `evaluacionsupervisor`;
CREATE TABLE `evaluacionsupervisor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `e1` varchar(2) DEFAULT NULL,
  `e2` varchar(2) DEFAULT NULL,
  `e3` varchar(2) DEFAULT NULL,
  `e4` varchar(2) DEFAULT NULL,
  `e5` varchar(2) DEFAULT NULL,
  `e6` varchar(2) DEFAULT NULL,
  `e7` varchar(2) DEFAULT NULL,
  `e8` varchar(2) DEFAULT NULL,
  `e9` varchar(2) DEFAULT NULL,
  `e10` varchar(2) DEFAULT NULL,
  `e11` varchar(2) DEFAULT NULL,
  `ob1` varchar(255) DEFAULT NULL,
  `ob2` varchar(255) DEFAULT NULL,
  `ob3` varchar(255) DEFAULT NULL,
  `ob4` varchar(255) DEFAULT NULL,
  `total` varchar(3) DEFAULT NULL,
  `fr1` varchar(3) DEFAULT NULL,
  `fr2` varchar(3) DEFAULT NULL,
  `sum1` varchar(3) DEFAULT NULL,
  `sum2` varchar(3) NOT NULL,
  `nota` varchar(5) DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `fr3` varchar(3) DEFAULT NULL,
  `fr4` varchar(3) DEFAULT NULL,
  `fr5` varchar(3) DEFAULT NULL,
  `sum3` varchar(3) DEFAULT NULL,
  `sum4` varchar(3) DEFAULT NULL,
  `sum5` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of evaluacionsupervisor
-- ----------------------------
INSERT INTO `evaluacionsupervisor` VALUES ('1', '32', '2018-08-18 12:52:18', '2018-08-18 12:52:18', '5', '5', '5', '5', '4', '4', '4', '3', '3', '3', '2', 'jhh', 'io', 'ooooooooooooooooooooooo', null, '43', '0', '1', '0', '2', '7.82', '25', '3', '3', '4', '9', '12', '20');
INSERT INTO `evaluacionsupervisor` VALUES ('2', '35', '2018-08-18 12:52:36', '2018-08-18 12:52:36', '5', '5', '5', '5', '5', '5', '4', '4', '4', '4', '4', null, null, null, null, '50', '0', '0', '0', '0', '9.09', '25', '0', '5', '6', '0', '20', '30');

-- ----------------------------
-- Table structure for evaluaciontutor
-- ----------------------------
DROP TABLE IF EXISTS `evaluaciontutor`;
CREATE TABLE `evaluaciontutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docente_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `visita` int(11) DEFAULT NULL,
  `e1` varchar(2) DEFAULT NULL,
  `e2` varchar(2) DEFAULT NULL,
  `e3` varchar(2) DEFAULT NULL,
  `e4` varchar(2) DEFAULT NULL,
  `e5` varchar(2) DEFAULT NULL,
  `ec1` varchar(2) DEFAULT NULL,
  `ec2` varchar(2) DEFAULT NULL,
  `ec3` varchar(2) DEFAULT NULL,
  `ec4` varchar(2) DEFAULT NULL,
  `ec5` varchar(2) DEFAULT NULL,
  `vfa` varchar(2) DEFAULT NULL,
  `vfr` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of evaluaciontutor
-- ----------------------------
INSERT INTO `evaluaciontutor` VALUES ('19', '25', '35', '2018-08-16 12:17:01', '2018-08-16 12:17:01', '1', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', 'X', '');

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
  `recepcioni` date DEFAULT NULL,
  `fechaf` date DEFAULT NULL,
  `recepcionf` date DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `notificaf` date DEFAULT NULL,
  `mesi` varchar(15) DEFAULT NULL,
  `mesf` varchar(15) DEFAULT NULL,
  `notificai` date DEFAULT NULL,
  `habilita` varchar(2) DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of periodos
-- ----------------------------
INSERT INTO `periodos` VALUES ('1', 'ciclo 1 2018-2019', '2018-08-05', '2018-08-14', '2018-08-30', '2018-08-05', 'I', '2018-08-20 06:59:10', '2018-08-20 06:59:10', '2018-08-18', '4', '3', '2018-08-09', 'I');
INSERT INTO `periodos` VALUES ('3', 'ciclo 3', '2018-08-19', '2018-07-31', '2018-08-18', '2018-08-09', 'I', '2018-08-21 16:23:32', '2018-08-21 16:23:32', '2018-08-18', 'mayo', '5', '2018-08-10', 'I');
INSERT INTO `periodos` VALUES ('4', 'ciclo prueba', '2018-08-15', '2018-08-07', '2018-08-11', '2018-08-24', 'A', '2018-08-21 16:24:19', '2018-08-21 16:24:19', '2018-08-18', 'mayo', 'junio', '2018-08-14', 'A');

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
  `paralelo` varchar(50) DEFAULT NULL,
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
  `hsitu` int(5) DEFAULT '0',
  `hacademicas` int(5) DEFAULT '0',
  `hclinica` int(5) DEFAULT '0',
  `htrabajoc` int(5) DEFAULT '0',
  `capacitaciones` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of postulants
-- ----------------------------
INSERT INTO `postulants` VALUES ('39', 'asd', 'ddd', '0922606223', '7', 'Derecho', 'asd', '0999999999', null, '22', '2018-08-03', null, '0', '1', 'aaa', '1', '1', '1', '1', '1', '2018-08-22 12:25:46', '2018-08-22 12:25:46', 'A', '3', 'SEMESTRAL', 'MATUTINO', 'guayas', 'guayaquil', 'NO', null, null, null, 'NO', '09226066223', 'SOLTERO', null, 'ab@ug.edu.ec', '0', '1', '0', '0', '0', '0', '0', '0', '0', 'porque si porque si porque si porque si porque si porque si', '160', null, '100', '80', null);
INSERT INTO `postulants` VALUES ('40', 'an', 'ton', '0926339730', '7', 'Sociologia', 'asd', '0999999999', null, '22', '2018-08-17', null, '1', '1', 'd', '1', '1', '1', '1', '1', '2018-08-12 02:00:18', '2018-08-12 02:00:18', 'A', null, 'SEMESTRAL', 'MATUTINO', 'a', 'f', 'NO', null, null, null, 'NO', null, 'SOLTERO', null, 'ab@ug.edu.ec', '0', '0', '0', '0', '0', '1', '0', '0', '1', null, null, null, null, null, null);
INSERT INTO `postulants` VALUES ('54', 'a', 'v', '0999999999', '7', 'Derecho', 's', '0999999999', null, null, null, null, '0', '0', null, '0', '0', '0', '0', '0', '2018-08-21 11:26:40', '2018-08-21 11:26:40', 'A', null, null, null, null, null, null, null, null, null, null, null, null, null, 'aaab@ug.edu.ec', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '160', '80', null, null, '80');
INSERT INTO `postulants` VALUES ('55', 'bryan', 'alcivar', '0926570136', 'EGRESADO', 'Sociologia', 'asdsad', '0999999999', null, '22', '2018-08-03', null, '1', '1', '-', '1', '1', '1', '1', '1', '2018-08-18 13:45:24', '2018-08-18 13:45:24', 'I', null, 'SEMESTRAL', 'VESPERTINO', 'aaa', 'guayquil', 'NO', null, null, null, 'NO', '09226066223', 'SOLTERO', null, 'bryan.alcivarv@ug.edu.ec', '1', '0', '1', '0', '0', '0', '0', '0', '0', 'NEGADO PORQUE SI PRUEBA DE TODO', null, null, null, null, null);
INSERT INTO `postulants` VALUES ('56', 'AS', 'DD', '0922606622', '7', 'Sociologia', 'ASD', '0999999999', null, null, null, null, '0', '0', null, '0', '0', '0', '0', '0', '2018-08-18 13:54:42', '2018-08-18 13:54:42', 'A', null, null, null, null, null, null, null, null, null, null, null, null, null, 'aaab@ug.edu.ec', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for products_photos
-- ----------------------------
DROP TABLE IF EXISTS `products_photos`;
CREATE TABLE `products_photos` (
  `user_id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products_photos
-- ----------------------------
INSERT INTO `products_photos` VALUES ('32', 'photos/UYoY7L4Hou0VPYlyKjTnbfxu1TRHd1CbB1zWjr7Z.png', '2018-08-12 00:21:27', '2018-08-12 00:21:27');
INSERT INTO `products_photos` VALUES ('32', 'photos/4lupY43JvS4ZJ6REtS8P85sfY6D2iXy6phfLPozH.jpeg', '2018-08-12 00:22:06', '2018-08-12 00:22:06');
INSERT INTO `products_photos` VALUES ('32', 'photos/mo3QuCHPQuB0EjkNzjrvUNvR4tJlFUnC0OvdHQeI.jpeg', '2018-08-12 00:23:07', '2018-08-12 00:23:07');
INSERT INTO `products_photos` VALUES ('32', 'photos/hVPKVcphAf8es3he7ma3eiiA2MFaUwioxHDnPTsX.jpeg', '2018-08-12 11:09:08', '2018-08-12 11:09:08');
INSERT INTO `products_photos` VALUES ('32', 'photos/BaGg9rBwancNVcqA3lsjPwnLUMO8n0QT5w7lv8gA.jpeg', '2018-08-12 13:17:30', '2018-08-12 13:17:30');
INSERT INTO `products_photos` VALUES ('32', 'photos/yR7qsYcdPRZF4aR9pmfY5bsBFbdVkNgAQu4pBBg5.jpeg', '2018-08-14 12:25:42', '2018-08-14 12:25:42');
INSERT INTO `products_photos` VALUES ('35', 'photos/S2WgFdgaPv6zoRXkZjvTL1VTr2gS6MO7kx64MLBO.jpeg', '2018-08-14 13:01:31', '2018-08-14 13:01:31');
INSERT INTO `products_photos` VALUES ('35', 'photos/A8fVFV8G4QXQzJu1s7ZMiPFZcqHGcdYotHZ4L9U9.jpeg', '2018-08-14 13:02:12', '2018-08-14 13:02:12');
INSERT INTO `products_photos` VALUES ('35', 'photos/BNcKpmNSL1iDKdJuziCC3hKVTzy7pIZ7vwLnk2u8.jpeg', '2018-08-14 13:09:15', '2018-08-14 13:09:15');

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

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
INSERT INTO `requests` VALUES ('33', '5', '37', '2018-08-07 11:28:56', 'A', '2018-08-07 11:28:56');
INSERT INTO `requests` VALUES ('34', '5', '38', '2018-08-07 11:29:47', 'A', '2018-08-07 11:29:47');
INSERT INTO `requests` VALUES ('35', '3', '39', '2018-08-21 16:27:25', 'A', '2018-08-21 16:27:25');
INSERT INTO `requests` VALUES ('36', '2', '40', '2018-08-12 02:01:01', 'A', '2018-08-12 02:01:01');
INSERT INTO `requests` VALUES ('37', '5', '41', '2018-08-12 03:20:08', 'A', '2018-08-12 03:20:08');
INSERT INTO `requests` VALUES ('38', '5', '42', '2018-08-12 03:23:26', 'A', '2018-08-12 03:23:26');
INSERT INTO `requests` VALUES ('39', '5', '43', '2018-08-12 03:24:44', 'A', '2018-08-12 03:24:44');
INSERT INTO `requests` VALUES ('40', '5', '44', '2018-08-12 03:25:21', 'A', '2018-08-12 03:25:21');
INSERT INTO `requests` VALUES ('41', '5', '45', '2018-08-12 03:27:17', 'A', '2018-08-12 03:27:17');
INSERT INTO `requests` VALUES ('42', '5', '46', '2018-08-12 05:35:25', 'A', '2018-08-12 05:35:25');
INSERT INTO `requests` VALUES ('43', '5', '47', '2018-08-12 05:38:24', 'A', '2018-08-12 05:38:24');
INSERT INTO `requests` VALUES ('44', '5', '48', '2018-08-12 05:40:16', 'A', '2018-08-12 05:40:16');
INSERT INTO `requests` VALUES ('45', '5', '49', '2018-08-12 05:41:27', 'A', '2018-08-12 05:41:27');
INSERT INTO `requests` VALUES ('46', '5', '50', '2018-08-12 05:42:02', 'A', '2018-08-12 05:42:02');
INSERT INTO `requests` VALUES ('47', '5', '51', '2018-08-12 05:43:47', 'A', '2018-08-12 05:43:47');
INSERT INTO `requests` VALUES ('48', '5', '52', '2018-08-12 05:45:18', 'A', '2018-08-12 05:45:18');
INSERT INTO `requests` VALUES ('49', '5', '53', '2018-08-12 05:45:55', 'A', '2018-08-12 05:45:55');
INSERT INTO `requests` VALUES ('50', '6', '54', '2018-11-15 22:25:58', 'A', '2018-11-15 22:25:58');
INSERT INTO `requests` VALUES ('51', '3', '55', '2018-08-18 13:27:44', 'A', '2018-08-18 13:27:44');
INSERT INTO `requests` VALUES ('52', '6', '56', '2018-08-18 14:02:51', 'A', '2018-08-18 14:02:51');

-- ----------------------------
-- Table structure for semanaobservaciones
-- ----------------------------
DROP TABLE IF EXISTS `semanaobservaciones`;
CREATE TABLE `semanaobservaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semana` varchar(11) DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `docente_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of semanaobservaciones
-- ----------------------------
INSERT INTO `semanaobservaciones` VALUES ('2', 'Semana 1', 'hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola hola', '32', '2018-08-14 12:20:13', '2018-08-14 12:20:13', '25');
INSERT INTO `semanaobservaciones` VALUES ('3', null, null, null, '2018-08-12 10:41:35', '2018-08-12 10:41:35', '25');
INSERT INTO `semanaobservaciones` VALUES ('4', null, null, null, '2018-08-12 10:44:29', '2018-08-12 10:44:29', '25');
INSERT INTO `semanaobservaciones` VALUES ('5', null, null, null, '2018-08-12 10:44:47', '2018-08-12 10:44:47', '25');
INSERT INTO `semanaobservaciones` VALUES ('6', null, null, null, '2018-08-12 10:57:35', '2018-08-12 10:57:35', '25');
INSERT INTO `semanaobservaciones` VALUES ('7', null, null, null, '2018-08-12 10:58:06', '2018-08-12 10:58:06', '25');
INSERT INTO `semanaobservaciones` VALUES ('8', null, null, null, '2018-08-12 11:00:19', '2018-08-12 11:00:19', '25');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of students_teachers
-- ----------------------------
INSERT INTO `students_teachers` VALUES ('23', '32', '30', 'A', '2018-08-11 16:23:33', '2018-08-11 16:23:33', 'TUT', null, null, null, null, null);
INSERT INTO `students_teachers` VALUES ('24', '32', '25', 'A', '2018-08-12 05:01:39', '2018-08-12 05:01:39', 'SUP', null, '1', '10:00:00', '12:00:00', '2');
INSERT INTO `students_teachers` VALUES ('25', '35', '25', 'A', '2018-08-16 12:15:44', '2018-08-16 12:15:44', 'SUP', null, '1', '15:00:00', '17:00:00', '2');
