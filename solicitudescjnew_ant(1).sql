-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `solicitudescjnew_ant`;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `asistencias` (`id`, `user_id`, `docente_id`, `fecha`, `estado`, `semana`, `descripcion`, `horas`, `created_at`, `updated_at`) VALUES
(1,	35,	27,	'2018-08-05',	'A',	'Semana1',	'hoy no hice nada',	2,	NULL,	'2018-08-05 16:54:55'),
(2,	35,	27,	'2018-08-06',	'I',	'Semana1',	'',	0,	NULL,	'2018-08-05 16:58:32');

DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios` (
  `id` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `periodo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `horarios` (`id`, `descripcion`, `periodo_id`) VALUES
(1,	'horario 1',	1),
(2,	'horario 2',	1),
(3,	'horario 3',	1),
(4,	'horario 4',	1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `periodos` (`id`, `descripcion`, `fechai`, `fechai_extraordinaria`, `fechaf`, `fechaf_extraordinaria`, `estado`, `created_at`, `updated_at`, `maxtutoria`) VALUES
(1,	'ciclo 1 2018-2019',	'2018-08-05',	NULL,	'2018-08-30',	NULL,	'A',	NULL,	NULL,	2);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `postulants` (`id`, `nombres`, `apellidos`, `identificacion`, `semestre`, `carrera`, `direccion`, `celular`, `correo`, `edad`, `fecha_nacimiento`, `horario_t`, `cedula_archivo`, `papeleta_archivo`, `paralelo`, `foto_archivo`, `curriculum_archivo`, `certificado_matricula`, `certificado_no_arrastre`, `solicitud_sellada`, `created_at`, `updated_at`, `estado`, `convencional`, `modalidad`, `horario`, `provincia_id`, `ciudad_id`, `labora`, `direccion_t`, `telefono_t`, `ocupacion`, `discapacidad`, `carnet`, `estado_civil`, `area`, `correo_institucional`, `civil`, `penal`, `familia`, `laboral`, `violenciaf`, `inquilinato`, `fiscalia`, `defensoria`, `constitucional`) VALUES
(24,	'Anthony',	'Espinoza',	'0926339730',	'EGRESADO',	'Derecho',	'asd',	'0982364756',	'a@ug.edu.ec',	'22',	'2018-08-03',	NULL,	1,	1,	'123',	1,	1,	1,	1,	1,	'2018-08-05 17:47:31',	'2018-08-05 12:47:31',	'A',	'2801544',	'ANUAL',	'VESPERTINO',	'aaa',	'v vv',	'SI',	NULL,	NULL,	NULL,	'SI',	NULL,	'CASADO',	NULL,	'a@ug.edu.ec',	1,	1,	1,	0,	1,	0,	0,	0,	0),
(33,	'prueba',	'pruebaa',	'0924931231',	'EGRESADO',	'Sociologia',	'asd',	'0987266262',	'aas@gmail.com',	'22',	'2018-08-10',	NULL,	1,	1,	'as',	1,	1,	1,	1,	1,	'2018-08-05 21:38:49',	'2018-08-05 16:38:49',	'A',	'2801544',	NULL,	'MATUTINO',	'aaaann',	'bbbbb',	'SI',	NULL,	NULL,	NULL,	'SI',	NULL,	'CASADO',	NULL,	'anb@ug.edu.ec',	0,	0,	0,	0,	0,	0,	0,	0,	0);

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) DEFAULT '5',
  `postulant_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(1) DEFAULT 'A',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `requests` (`id`, `state_id`, `postulant_id`, `created_at`, `estado`, `updated_at`) VALUES
(20,	2,	24,	'2018-08-05 18:44:23',	'A',	'2018-08-05 13:44:23'),
(21,	5,	25,	'2018-08-05 15:02:41',	'A',	'2018-08-05 15:02:41'),
(22,	5,	26,	'2018-08-05 15:11:24',	'A',	'2018-08-05 15:11:24'),
(23,	5,	27,	'2018-08-05 15:14:26',	'A',	'2018-08-05 15:14:26'),
(24,	5,	28,	'2018-08-05 15:27:55',	'A',	'2018-08-05 15:27:55'),
(25,	5,	29,	'2018-08-05 15:29:37',	'A',	'2018-08-05 15:29:37'),
(26,	5,	30,	'2018-08-05 15:30:42',	'A',	'2018-08-05 15:30:42'),
(27,	5,	31,	'2018-08-05 15:32:29',	'A',	'2018-08-05 15:32:29'),
(29,	2,	33,	'2018-08-05 21:33:25',	'A',	'2018-08-05 16:33:25');

DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` varchar(1) DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `abv` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `states` (`id`, `descripcion`, `estado`, `created_at`, `updated_at`, `abv`) VALUES
(1,	'AUTORIZADO',	'A',	NULL,	NULL,	'AU'),
(2,	'APROBADO',	'A',	NULL,	NULL,	'AP'),
(3,	'NEGADO',	'A',	NULL,	NULL,	'NE'),
(4,	'ABANDONO',	'A',	NULL,	NULL,	'AB'),
(5,	'PENDIENTE',	'A',	'2018-07-29 05:52:15',	'2018-07-29 05:52:15',	'PE'),
(6,	'AUTORIZADO-DOCUMENTOS INCOMPLETO',	'A',	'2018-07-29 08:25:11',	'2018-07-29 08:25:11',	'AUI');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `students_teachers` (`id`, `user_est_id`, `user_doc_id`, `estado`, `created_at`, `updated_at`, `tipo`, `horario_id`, `lugar_id`) VALUES
(7,	28,	27,	'I',	'2018-08-05 19:48:36',	'2018-08-05 19:48:36',	'SUP',	3,	1),
(9,	28,	30,	'A',	'2018-08-05 19:22:45',	'2018-08-05 19:22:45',	'TUT',	NULL,	NULL),
(14,	35,	27,	'A',	'2018-08-05 21:57:49',	'2018-08-05 21:57:49',	'SUP',	1,	1),
(15,	35,	30,	'A',	'2018-08-05 16:51:23',	'2018-08-05 16:51:23',	'TUT',	NULL,	NULL);

-- 2018-08-06 18:30:33
