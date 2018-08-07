-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `solicitudescjnew_ant` /*!40100 DEFAULT CHARACTER SET latin1 */;
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


-- 2018-08-05 22:42:45
