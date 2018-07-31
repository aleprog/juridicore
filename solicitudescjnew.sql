-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `solicitudescjnew` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `solicitudescjnew`;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `postulants` (`id`, `nombres`, `apellidos`, `identificacion`, `semestre`, `carrera`, `direccion`, `celular`, `correo`, `edad`, `fecha_nacimiento`, `horario_t`, `cedula_archivo`, `papeleta_archivo`, `paralelo`, `foto_archivo`, `curriculum_archivo`, `certificado_matricula`, `certificado_no_arrastre`, `solicitud_sellada`, `created_at`, `updated_at`, `estado`, `convencional`, `modalidad`, `horario`, `provincia_id`, `ciudad_id`, `labora`, `direccion_t`, `telefono_t`, `ocupacion`, `discapacidad`, `carnet`, `estado_civil`, `area`) VALUES
(5,	'Anthony Willia',	'Espinoza Fajardo',	'0926339730',	8,	'Sociologia',	'gye',	'982364756',	'a@djd.com',	'55',	'2018-07-11',	'lunes a viernes',	1,	1,	'asd',	1,	0,	0,	0,	1,	'2018-07-30 00:18:17',	'2018-07-30 00:18:17',	'A',	'2364756',	'MODULAR',	'MATUTINO',	'357',	NULL,	'NO',	'dunranm',	'282244',	'desarrollo',	'NO',	'123123',	'SOLTERO',	'DEFENSORIA PUBLICA'),
(16,	'asd',	'qasd',	'0922606262',	7,	'Derecho',	'sdf',	'234',	'a16@gmail.com',	NULL,	NULL,	NULL,	0,	0,	'0',	0,	0,	0,	0,	0,	'2018-07-30 00:37:50',	'2018-07-30 00:37:50',	'A',	'1234',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(17,	'asdfa',	'sdf',	'0926262645',	7,	'Derecho',	'sdf',	'4566',	'a17@gmail.com',	NULL,	'2018-07-06',	NULL,	1,	1,	'0',	1,	1,	1,	1,	1,	'2018-07-30 00:37:22',	'2018-07-30 00:37:22',	'A',	'566',	NULL,	NULL,	NULL,	NULL,	'SI',	NULL,	NULL,	NULL,	'SI',	'12532535',	NULL,	'CIVIL'),
(18,	'prueba',	'espinoza',	'0972725625',	7,	'Sociologia',	'lala',	'22222',	'a646@hotmail.com',	NULL,	NULL,	NULL,	1,	1,	'0',	1,	1,	1,	1,	1,	'2018-07-30 00:52:11',	'2018-07-29 19:52:11',	'A',	'1231231',	NULL,	NULL,	NULL,	NULL,	'SI',	NULL,	NULL,	NULL,	'SI',	NULL,	NULL,	'CIVIL'),
(19,	'JHASDH',	'AKAHSD',	'0927276262',	7,	'Derecho',	'DFAS',	'234',	NULL,	NULL,	NULL,	NULL,	0,	0,	'0',	0,	0,	0,	0,	0,	'2018-07-29 19:57:14',	'2018-07-29 19:57:14',	'A',	'1213',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(20,	'ajkshd',	'kjhsdf',	'0938373763',	7,	'Sociologia',	'kahsd',	'234',	NULL,	NULL,	NULL,	NULL,	0,	0,	'0',	0,	0,	0,	0,	0,	'2018-07-29 19:57:57',	'2018-07-29 19:57:57',	'A',	'12312',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(21,	'asd',	'saada',	'0937373737',	7,	'Sociologia',	'asd',	'3333',	NULL,	NULL,	NULL,	NULL,	0,	0,	'0',	0,	0,	0,	0,	0,	'2018-07-29 20:12:53',	'2018-07-29 20:12:53',	'A',	'123',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(22,	'trddg',	'ufvgv',	'0926570137',	9,	'Derecho',	'iuyt',	'099',	'a@bba.com',	'12',	'2018-07-04',	NULL,	1,	1,	'0',	1,	1,	1,	1,	1,	'2018-07-30 01:37:27',	'2018-07-29 20:37:27',	'A',	NULL,	'SEMESTRAL',	'MATUTINO',	'357',	NULL,	'NO',	NULL,	NULL,	NULL,	'NO',	NULL,	'SOLTERO',	'FAMILIA');

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
(1,	6,	5,	'2018-07-29 14:02:36',	'A',	'2018-07-29 14:02:36'),
(12,	5,	16,	'2018-07-29 13:39:57',	'A',	'2018-07-29 13:39:57'),
(13,	2,	17,	'2018-07-30 00:44:09',	'A',	'2018-07-29 19:44:09'),
(14,	2,	18,	'2018-07-30 00:55:43',	'A',	'2018-07-29 19:55:43'),
(15,	5,	19,	'2018-07-29 19:57:14',	'A',	'2018-07-29 19:57:14'),
(16,	5,	20,	'2018-07-29 19:57:57',	'A',	'2018-07-29 19:57:57'),
(17,	5,	21,	'2018-07-29 20:12:53',	'A',	'2018-07-29 20:12:53'),
(18,	2,	22,	'2018-07-30 01:38:23',	'A',	'2018-07-29 20:38:23');

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
(5,	'PENDIENTE',	'A',	'2018-07-29 10:52:15',	'2018-07-29 10:52:15',	'PE'),
(6,	'AUTORIZADO-DOCUMENTOS INCOMPLETO',	'A',	'2018-07-29 13:25:11',	'2018-07-29 13:25:11',	'AUI');

-- 2018-07-31 20:17:23
