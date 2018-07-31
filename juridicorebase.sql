-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `juridicorebase` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `juridicorebase`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) unsigned NOT NULL DEFAULT '0',
  `order` smallint(6) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menus` (`id`, `name`, `slug`, `parent`, `order`, `enabled`, `created_at`, `updated_at`) VALUES
(2,	'Usuarios',	'/admin/users',	10,	1,	1,	NULL,	NULL),
(3,	'Roles',	'/admin/roles',	10,	0,	1,	NULL,	NULL),
(8,	'Menu',	'admin/MenuCreate',	10,	2,	1,	NULL,	NULL),
(10,	'Administrador',	'#',	0,	1,	1,	NULL,	NULL),
(13,	'Venta',	'venta/index',	0,	2,	1,	'2018-04-09 19:51:14',	'2018-04-09 19:51:14'),
(14,	'Parametros',	'admin/ParametroIndex',	10,	4,	1,	'2018-04-10 15:48:29',	'2018-04-10 15:49:04'),
(40,	'Sin Nivel',	'Sin Nivel',	0,	0,	1,	NULL,	NULL),
(41,	'Solicitudes',	'solicitudes',	0,	0,	1,	'2018-07-29 18:33:00',	'2018-07-29 18:35:32'),
(42,	'Postulante',	'admin/postulantes',	41,	1,	1,	'2018-07-29 18:37:16',	'2018-07-29 18:37:16'),
(43,	'Estudiante',	'admin/estudiante',	0,	2,	1,	'2018-07-29 19:31:54',	'2018-07-29 19:31:54');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2017_07_12_145959_create_permission_tables',	1),
(4,	'2018_04_05_003121_create_menus_table',	2),
(5,	'2018_05_31_144003_create_notifications_table',	3);

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1,	1,	'App\\User'),
(2,	1,	'App\\User'),
(2,	21,	'App\\User'),
(3,	21,	'App\\User'),
(4,	22,	'App\\User'),
(4,	23,	'App\\User'),
(4,	24,	'App\\User'),
(4,	25,	'App\\User'),
(4,	26,	'App\\User');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('anthony.espinozaf@gmail.com',	'$2y$10$DkR5aPZgWHq9aKKHnc5j6unUtXFwXCOTS9TRCgb1jzjLDCfKVhd82',	'2018-04-05 21:19:14');

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'users_manage',	'web',	'2018-04-05 00:20:50',	'2018-04-05 00:20:50'),
(2,	'Estandar',	'web',	'2018-04-05 21:46:29',	'2018-04-07 17:19:13');

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'administrator',	'web',	'2018-04-05 00:20:50',	'2018-04-05 00:20:50'),
(2,	'estandar',	'web',	'2018-04-06 22:20:43',	'2018-04-06 22:20:53'),
(3,	'secretaria',	'web',	'2018-07-29 18:37:43',	'2018-07-29 18:37:43'),
(4,	'estudiante',	'web',	'2018-07-29 19:32:14',	'2018-07-29 19:32:14');

DROP TABLE IF EXISTS `role_has_permission`;
CREATE TABLE `role_has_permission` (
  `permission_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `role_has_permission` (`permission_id`, `role_id`) VALUES
(10,	1),
(3,	1),
(8,	1),
(2,	1),
(12,	23),
(14,	1),
(15,	24),
(17,	24),
(18,	24),
(21,	23),
(19,	25),
(20,	25),
(22,	26),
(23,	27),
(24,	28),
(19,	29),
(19,	26),
(19,	23),
(19,	27),
(19,	28),
(20,	29),
(26,	30),
(27,	30),
(19,	31),
(28,	24),
(29,	29),
(30,	32),
(31,	32),
(32,	32),
(33,	32),
(34,	32),
(35,	32),
(19,	33),
(20,	33),
(36,	32),
(19,	32),
(19,	34),
(36,	34),
(29,	33),
(10,	32),
(38,	32),
(19,	35),
(39,	35),
(19,	36),
(39,	36),
(19,	37),
(39,	37),
(19,	38),
(39,	38),
(10,	34),
(38,	34),
(41,	39),
(42,	39),
(42,	40),
(39,	26),
(39,	23),
(39,	31),
(39,	27),
(39,	28),
(41,	3),
(42,	3),
(43,	4),
(41,	1),
(42,	1);

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2,	1),
(2,	2);

DROP TABLE IF EXISTS `tablabase`;
CREATE TABLE `tablabase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tabla_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(1) DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tablabase` (`id`, `tabla_id`, `descripcion`, `estado`, `created_at`) VALUES
(3,	1,	'prueba',	'A',	'2018-06-02 15:52:19'),
(4,	1,	'prueba',	'A',	'2018-06-04 15:03:39');

DROP TABLE IF EXISTS `tb_parametro`;
CREATE TABLE `tb_parametro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `parametro_id` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nivel` int(4) DEFAULT '4',
  `verificacion` varchar(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO `tb_parametro` (`id`, `descripcion`, `parametro_id`, `estado`, `created_at`, `updated_at`, `nivel`, `verificacion`) VALUES
(43,	'PROVINCIAS',	153,	'A',	NULL,	NULL,	2,	'0'),
(126,	'SIN NIVEL',	NULL,	'A',	'2018-07-29 12:44:43',	NULL,	1,	'0'),
(357,	'PR_TODAS',	43,	'A',	NULL,	NULL,	3,	'0'),
(1024,	'CIU-Guayaquil',	357,	'A',	NULL,	NULL,	4,	'0'),
(1025,	'CIU-Quito',	357,	'A',	NULL,	NULL,	4,	'0'),
(1026,	'CIU-Cuenca',	357,	'A',	NULL,	NULL,	4,	'0'),
(1027,	'CIU-SantoDomingo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1028,	'CIU-Machala',	357,	'A',	NULL,	NULL,	4,	'0'),
(1029,	'CIU-Duran',	357,	'A',	NULL,	NULL,	4,	'0'),
(1030,	'CIU-Manta',	357,	'A',	NULL,	NULL,	4,	'0'),
(1031,	'CIU-Portoviejo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1032,	'CIU-Loja',	357,	'A',	NULL,	NULL,	4,	'0'),
(1033,	'CIU-Ambato',	357,	'A',	NULL,	NULL,	4,	'0'),
(1034,	'CIU-Esmeraldas',	357,	'A',	NULL,	NULL,	4,	'0'),
(1035,	'CIU-Quevedo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1036,	'CIU-Riobamba',	357,	'A',	NULL,	NULL,	4,	'0'),
(1037,	'CIU-Milagro',	357,	'A',	NULL,	NULL,	4,	'0'),
(1038,	'CIU-Ibarra',	357,	'A',	NULL,	NULL,	4,	'0'),
(1039,	'CIU-LaLibertad',	357,	'A',	NULL,	NULL,	4,	'0'),
(1040,	'CIU-Babahoyo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1041,	'CIU-Sangolqui',	357,	'A',	NULL,	NULL,	4,	'0'),
(1042,	'CIU-Daule',	357,	'A',	NULL,	NULL,	4,	'0'),
(1043,	'CIU-Latacunga',	357,	'A',	NULL,	NULL,	4,	'0'),
(1044,	'CIU-Tulcan',	357,	'A',	NULL,	NULL,	4,	'0'),
(1045,	'CIU-Chone',	357,	'A',	NULL,	NULL,	4,	'0'),
(1046,	'CIU-Pasaje',	357,	'A',	NULL,	NULL,	4,	'0'),
(1047,	'CIU-SantaRosa',	357,	'A',	NULL,	NULL,	4,	'0'),
(1048,	'CIU-NuevaLoja',	357,	'A',	NULL,	NULL,	4,	'0'),
(1049,	'CIU-Huaquillas',	357,	'A',	NULL,	NULL,	4,	'0'),
(1050,	'CIU-ElCarmen',	357,	'A',	NULL,	NULL,	4,	'0'),
(1051,	'CIU-Montecristi',	357,	'A',	NULL,	NULL,	4,	'0'),
(1052,	'CIU-Samborondon',	357,	'A',	NULL,	NULL,	4,	'0'),
(1053,	'CIU-PuertoFranciscodeOrellana',	357,	'A',	NULL,	NULL,	4,	'0'),
(1054,	'CIU-Jipijapa',	357,	'A',	NULL,	NULL,	4,	'0'),
(1055,	'CIU-SantaElena',	357,	'A',	NULL,	NULL,	4,	'0'),
(1056,	'CIU-Otavalo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1057,	'CIU-Cayambe',	357,	'A',	NULL,	NULL,	4,	'0'),
(1058,	'CIU-BuenaFe',	357,	'A',	NULL,	NULL,	4,	'0'),
(1059,	'CIU-Ventanas',	357,	'A',	NULL,	NULL,	4,	'0'),
(1060,	'CIU-VelascoIbarra(ElEmpalme)',	357,	'A',	NULL,	NULL,	4,	'0'),
(1061,	'CIU-LaTroncal',	357,	'A',	NULL,	NULL,	4,	'0'),
(1062,	'CIU-ElTriunfo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1063,	'CIU-Salinas',	357,	'A',	NULL,	NULL,	4,	'0'),
(1064,	'CIU-GeneralVillamil(Playas)',	357,	'A',	NULL,	NULL,	4,	'0'),
(1065,	'CIU-Azogues',	357,	'A',	NULL,	NULL,	4,	'0'),
(1066,	'CIU-Puyo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1067,	'CIU-Vinces',	357,	'A',	NULL,	NULL,	4,	'0'),
(1068,	'CIU-LaConcordia',	357,	'A',	NULL,	NULL,	4,	'0'),
(1069,	'CIU-RosaZarate(Quinindé)',	357,	'A',	NULL,	NULL,	4,	'0'),
(1070,	'CIU-Balzar',	357,	'A',	NULL,	NULL,	4,	'0'),
(1071,	'CIU-Naranjito',	357,	'A',	NULL,	NULL,	4,	'0'),
(1072,	'CIU-Naranjal',	357,	'A',	NULL,	NULL,	4,	'0'),
(1073,	'CIU-Guaranda',	357,	'A',	NULL,	NULL,	4,	'0'),
(1074,	'CIU-LaMana',	357,	'A',	NULL,	NULL,	4,	'0'),
(1075,	'CIU-Tena',	357,	'A',	NULL,	NULL,	4,	'0'),
(1076,	'CIU-SanLorenzo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1077,	'CIU-Catamayo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1078,	'CIU-ElGuabo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1079,	'CIU-Pedernales',	357,	'A',	NULL,	NULL,	4,	'0'),
(1080,	'CIU-Atuntaqui',	357,	'A',	NULL,	NULL,	4,	'0'),
(1081,	'CIU-BahiadeCaraquez',	357,	'A',	NULL,	NULL,	4,	'0'),
(1082,	'CIU-PedroCarbo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1083,	'CIU-Macas',	357,	'A',	NULL,	NULL,	4,	'0'),
(1084,	'CIU-Yaguachi',	357,	'A',	NULL,	NULL,	4,	'0'),
(1085,	'CIU-Calceta',	357,	'A',	NULL,	NULL,	4,	'0'),
(1086,	'CIU-Arenillas',	357,	'A',	NULL,	NULL,	4,	'0'),
(1087,	'CIU-Jaramijo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1088,	'CIU-Valencia',	357,	'A',	NULL,	NULL,	4,	'0'),
(1089,	'CIU-Machachi',	357,	'A',	NULL,	NULL,	4,	'0'),
(1090,	'CIU-Shushufindi',	357,	'A',	NULL,	NULL,	4,	'0'),
(1091,	'CIU-Atacames',	357,	'A',	NULL,	NULL,	4,	'0'),
(1092,	'CIU-Pi&ntilde;as',	357,	'A',	NULL,	NULL,	4,	'0'),
(1093,	'CIU-SanGabriel',	357,	'A',	NULL,	NULL,	4,	'0'),
(1094,	'CIU-Gualaceo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1095,	'CIU-LomasdeSargentillo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1096,	'CIU-Ca&ntilde;ar',	357,	'A',	NULL,	NULL,	4,	'0'),
(1097,	'CIU-Cariamanga',	357,	'A',	NULL,	NULL,	4,	'0'),
(1098,	'CIU-Ba&ntilde;osdeAguaSanta',	357,	'A',	NULL,	NULL,	4,	'0'),
(1099,	'CIU-Montalvo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1100,	'CIU-Macara',	357,	'A',	NULL,	NULL,	4,	'0'),
(1101,	'CIU-SanMiguel(Salcedo)',	357,	'A',	NULL,	NULL,	4,	'0'),
(1102,	'CIU-Zamora',	357,	'A',	NULL,	NULL,	4,	'0'),
(1103,	'CIU-PuertoAyora',	357,	'A',	NULL,	NULL,	4,	'0'),
(1104,	'CIU-LaJoyadelosSachas',	357,	'A',	NULL,	NULL,	4,	'0'),
(1105,	'CIU-Salitre',	357,	'A',	NULL,	NULL,	4,	'0'),
(1106,	'CIU-Tosagua',	357,	'A',	NULL,	NULL,	4,	'0'),
(1107,	'CIU-Pelileo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1108,	'CIU-Pujili',	357,	'A',	NULL,	NULL,	4,	'0'),
(1109,	'CIU-Tabacundo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1110,	'CIU-PuertoLopez',	357,	'A',	NULL,	NULL,	4,	'0'),
(1111,	'CIU-SanVicente',	357,	'A',	NULL,	NULL,	4,	'0'),
(1112,	'CIU-SantaAnadeVueltaLarga',	357,	'A',	NULL,	NULL,	4,	'0'),
(1113,	'CIU-Zaruma',	357,	'A',	NULL,	NULL,	4,	'0'),
(1114,	'CIU-Balao',	357,	'A',	NULL,	NULL,	4,	'0'),
(1115,	'CIU-Rocafuerte',	357,	'A',	NULL,	NULL,	4,	'0'),
(1116,	'CIU-Yantzaza',	357,	'A',	NULL,	NULL,	4,	'0'),
(1117,	'CIU-Cotacachi',	357,	'A',	NULL,	NULL,	4,	'0'),
(1118,	'CIU-SantaLucia',	357,	'A',	NULL,	NULL,	4,	'0'),
(1119,	'CIU-Cumanda',	357,	'A',	NULL,	NULL,	4,	'0'),
(1120,	'CIU-Palestina',	357,	'A',	NULL,	NULL,	4,	'0'),
(1121,	'CIU-AlfredoBaquerizoMoreno(Jujan)',	357,	'A',	NULL,	NULL,	4,	'0'),
(1122,	'CIU-NarcisadeJesus(Nobol)',	357,	'A',	NULL,	NULL,	4,	'0'),
(1123,	'CIU-Mocache',	357,	'A',	NULL,	NULL,	4,	'0'),
(1124,	'CIU-Puebloviejo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1125,	'CIU-Portovelo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1126,	'CIU-Sucua',	357,	'A',	NULL,	NULL,	4,	'0'),
(1127,	'CIU-Guano',	357,	'A',	NULL,	NULL,	4,	'0'),
(1128,	'CIU-Pillaro',	357,	'A',	NULL,	NULL,	4,	'0'),
(1129,	'CIU-SimonBolivar',	357,	'A',	NULL,	NULL,	4,	'0'),
(1130,	'CIU-Gualaquiza',	357,	'A',	NULL,	NULL,	4,	'0'),
(1131,	'CIU-Paute',	357,	'A',	NULL,	NULL,	4,	'0'),
(1132,	'CIU-Saquisili',	357,	'A',	NULL,	NULL,	4,	'0'),
(1133,	'CIU-CoronelMarcelinoMaridue&ntilde;a',	357,	'A',	NULL,	NULL,	4,	'0'),
(1134,	'CIU-Pajan',	357,	'A',	NULL,	NULL,	4,	'0'),
(1135,	'CIU-SanMiguel',	357,	'A',	NULL,	NULL,	4,	'0'),
(1136,	'CIU-PuertoBaquerizoMoreno',	357,	'A',	NULL,	NULL,	4,	'0'),
(1137,	'CIU-Catacocha',	357,	'A',	NULL,	NULL,	4,	'0'),
(1138,	'CIU-Palenque',	357,	'A',	NULL,	NULL,	4,	'0'),
(1139,	'CIU-Alausi',	357,	'A',	NULL,	NULL,	4,	'0'),
(1140,	'CIU-Caluma',	357,	'A',	NULL,	NULL,	4,	'0'),
(1141,	'CIU-Catarama',	357,	'A',	NULL,	NULL,	4,	'0'),
(1142,	'CIU-FlavioAlfaro',	357,	'A',	NULL,	NULL,	4,	'0'),
(1143,	'CIU-Colimes',	357,	'A',	NULL,	NULL,	4,	'0'),
(1144,	'CIU-Echeandia',	357,	'A',	NULL,	NULL,	4,	'0'),
(1145,	'CIU-Jama',	357,	'A',	NULL,	NULL,	4,	'0'),
(1146,	'CIU-GeneralAntonioElizalde(Bucay)',	357,	'A',	NULL,	NULL,	4,	'0'),
(1147,	'CIU-IsidroAyora',	357,	'A',	NULL,	NULL,	4,	'0'),
(1148,	'CIU-Muisne',	357,	'A',	NULL,	NULL,	4,	'0'),
(1149,	'CIU-SantaIsabel',	357,	'A',	NULL,	NULL,	4,	'0'),
(1150,	'CIU-PedroVicenteMaldonado',	357,	'A',	NULL,	NULL,	4,	'0'),
(1151,	'CIU-Biblian',	357,	'A',	NULL,	NULL,	4,	'0'),
(1152,	'CIU-Archidona',	357,	'A',	NULL,	NULL,	4,	'0'),
(1153,	'CIU-Junin',	357,	'A',	NULL,	NULL,	4,	'0'),
(1154,	'CIU-Baba',	357,	'A',	NULL,	NULL,	4,	'0'),
(1155,	'CIU-Valdez(Limones)',	357,	'A',	NULL,	NULL,	4,	'0'),
(1156,	'CIU-Pimampiro',	357,	'A',	NULL,	NULL,	4,	'0'),
(1157,	'CIU-CamiloPonceEnriquez',	357,	'A',	NULL,	NULL,	4,	'0'),
(1158,	'CIU-SanMigueldeLosBancos',	357,	'A',	NULL,	NULL,	4,	'0'),
(1159,	'CIU-ElTambo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1160,	'CIU-Quinsaloma',	357,	'A',	NULL,	NULL,	4,	'0'),
(1161,	'CIU-Elangel',	357,	'A',	NULL,	NULL,	4,	'0'),
(1162,	'CIU-Alamor',	357,	'A',	NULL,	NULL,	4,	'0'),
(1163,	'CIU-Chambo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1164,	'CIU-SanJosédeChimbo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1165,	'CIU-Celica',	357,	'A',	NULL,	NULL,	4,	'0'),
(1166,	'CIU-Chordeleg',	357,	'A',	NULL,	NULL,	4,	'0'),
(1167,	'CIU-Balsas',	357,	'A',	NULL,	NULL,	4,	'0'),
(1168,	'CIU-Saraguro',	357,	'A',	NULL,	NULL,	4,	'0'),
(1169,	'CIU-ElChaco',	357,	'A',	NULL,	NULL,	4,	'0'),
(1170,	'CIU-Giron',	357,	'A',	NULL,	NULL,	4,	'0'),
(1171,	'CIU-Huaca',	357,	'A',	NULL,	NULL,	4,	'0'),
(1172,	'CIU-Pichincha',	357,	'A',	NULL,	NULL,	4,	'0'),
(1173,	'CIU-Chunchi',	357,	'A',	NULL,	NULL,	4,	'0'),
(1174,	'CIU-Pallatanga',	357,	'A',	NULL,	NULL,	4,	'0'),
(1175,	'CIU-Marcabeli',	357,	'A',	NULL,	NULL,	4,	'0'),
(1176,	'CIU-Sigsig',	357,	'A',	NULL,	NULL,	4,	'0'),
(1177,	'CIU-GeneralLeonidasPlazaGutiérrez(Limon)',	357,	'A',	NULL,	NULL,	4,	'0'),
(1178,	'CIU-Urcuqui',	357,	'A',	NULL,	NULL,	4,	'0'),
(1179,	'CIU-Loreto',	357,	'A',	NULL,	NULL,	4,	'0'),
(1180,	'CIU-Rioverde',	357,	'A',	NULL,	NULL,	4,	'0'),
(1181,	'CIU-Zumba',	357,	'A',	NULL,	NULL,	4,	'0'),
(1182,	'CIU-Palora',	357,	'A',	NULL,	NULL,	4,	'0'),
(1183,	'CIU-Mira',	357,	'A',	NULL,	NULL,	4,	'0'),
(1184,	'CIU-ElPangui',	357,	'A',	NULL,	NULL,	4,	'0'),
(1185,	'CIU-PuertoQuito',	357,	'A',	NULL,	NULL,	4,	'0'),
(1186,	'CIU-Bolivar',	357,	'A',	NULL,	NULL,	4,	'0'),
(1187,	'CIU-Sucre',	357,	'A',	NULL,	NULL,	4,	'0'),
(1188,	'CIU-Chillanes',	357,	'A',	NULL,	NULL,	4,	'0'),
(1189,	'CIU-Quero',	357,	'A',	NULL,	NULL,	4,	'0'),
(1190,	'CIU-Guamote',	357,	'A',	NULL,	NULL,	4,	'0'),
(1191,	'CIU-Cevallos',	357,	'A',	NULL,	NULL,	4,	'0'),
(1192,	'CIU-Zapotillo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1193,	'CIU-VillaLaUnion(Cajabamba)',	357,	'A',	NULL,	NULL,	4,	'0'),
(1194,	'CIU-SantiagodeMéndez',	357,	'A',	NULL,	NULL,	4,	'0'),
(1195,	'CIU-Zumbi',	357,	'A',	NULL,	NULL,	4,	'0'),
(1196,	'CIU-PuertoElCarmendePutumayo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1197,	'CIU-Patate',	357,	'A',	NULL,	NULL,	4,	'0'),
(1198,	'CIU-Olmedo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1199,	'CIU-PuertoVillamil',	357,	'A',	NULL,	NULL,	4,	'0'),
(1200,	'CIU-ElDoradodeCascales',	357,	'A',	NULL,	NULL,	4,	'0'),
(1201,	'CIU-Lumbaqui',	357,	'A',	NULL,	NULL,	4,	'0'),
(1202,	'CIU-Palanda',	357,	'A',	NULL,	NULL,	4,	'0'),
(1203,	'CIU-Sigchos',	357,	'A',	NULL,	NULL,	4,	'0'),
(1204,	'CIU-Pindal',	357,	'A',	NULL,	NULL,	4,	'0'),
(1205,	'CIU-Guayzimi',	357,	'A',	NULL,	NULL,	4,	'0'),
(1206,	'CIU-Baeza',	357,	'A',	NULL,	NULL,	4,	'0'),
(1207,	'CIU-ElCorazon',	357,	'A',	NULL,	NULL,	4,	'0'),
(1208,	'CIU-Paccha',	357,	'A',	NULL,	NULL,	4,	'0'),
(1209,	'CIU-Amaluza',	357,	'A',	NULL,	NULL,	4,	'0'),
(1210,	'CIU-LasNaves',	357,	'A',	NULL,	NULL,	4,	'0'),
(1211,	'CIU-Logro&ntilde;o',	357,	'A',	NULL,	NULL,	4,	'0'),
(1212,	'CIU-SanFernando',	357,	'A',	NULL,	NULL,	4,	'0'),
(1213,	'CIU-Gonzanama',	357,	'A',	NULL,	NULL,	4,	'0'),
(1214,	'CIU-SanJuanBosco',	357,	'A',	NULL,	NULL,	4,	'0'),
(1215,	'CIU-28deMayo(SanJosédeYacuambi)',	357,	'A',	NULL,	NULL,	4,	'0'),
(1216,	'CIU-SantaClara',	357,	'A',	NULL,	NULL,	4,	'0'),
(1217,	'CIU-Arajuno',	357,	'A',	NULL,	NULL,	4,	'0'),
(1218,	'CIU-Tarapoa',	357,	'A',	NULL,	NULL,	4,	'0'),
(1219,	'CIU-Tisaleo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1220,	'CIU-Suscal',	357,	'A',	NULL,	NULL,	4,	'0'),
(1221,	'CIU-Nabon',	357,	'A',	NULL,	NULL,	4,	'0'),
(1222,	'CIU-NuevoRocafuerte',	357,	'A',	NULL,	NULL,	4,	'0'),
(1223,	'CIU-Mocha',	357,	'A',	NULL,	NULL,	4,	'0'),
(1224,	'CIU-LaVictoria',	357,	'A',	NULL,	NULL,	4,	'0'),
(1225,	'CIU-Guachapala',	357,	'A',	NULL,	NULL,	4,	'0'),
(1226,	'CIU-Santiago',	357,	'A',	NULL,	NULL,	4,	'0'),
(1227,	'CIU-Chaguarpamba',	357,	'A',	NULL,	NULL,	4,	'0'),
(1228,	'CIU-Penipe',	357,	'A',	NULL,	NULL,	4,	'0'),
(1229,	'CIU-Taisha',	357,	'A',	NULL,	NULL,	4,	'0'),
(1230,	'CIU-Chilla',	357,	'A',	NULL,	NULL,	4,	'0'),
(1231,	'CIU-Paquisha',	357,	'A',	NULL,	NULL,	4,	'0'),
(1232,	'CIU-CarlosJulioArosemenaTola',	357,	'A',	NULL,	NULL,	4,	'0'),
(1233,	'CIU-Sozoranga',	357,	'A',	NULL,	NULL,	4,	'0'),
(1234,	'CIU-Pucara',	357,	'A',	NULL,	NULL,	4,	'0'),
(1235,	'CIU-Huamboya',	357,	'A',	NULL,	NULL,	4,	'0'),
(1236,	'CIU-Quilanga',	357,	'A',	NULL,	NULL,	4,	'0'),
(1237,	'CIU-SanFelipedeO&ntilde;a',	357,	'A',	NULL,	NULL,	4,	'0'),
(1238,	'CIU-SevilladeOro',	357,	'A',	NULL,	NULL,	4,	'0'),
(1239,	'CIU-Mera',	357,	'A',	NULL,	NULL,	4,	'0'),
(1240,	'CIU-PabloSexto',	357,	'A',	NULL,	NULL,	4,	'0'),
(1241,	'CIU-Olmedo',	357,	'A',	NULL,	NULL,	4,	'0'),
(1242,	'CIU-Déleg',	357,	'A',	NULL,	NULL,	4,	'0'),
(1243,	'CIU-LaBonita',	357,	'A',	NULL,	NULL,	4,	'0'),
(1244,	'CIU-ElPan',	357,	'A',	NULL,	NULL,	4,	'0'),
(1245,	'CIU-Tiputini',	357,	'A',	NULL,	NULL,	4,	'0'),
(1255,	'CARRERAS',	126,	'A',	'2018-07-29 05:43:12',	'2018-07-29 05:43:12',	2,	'0'),
(1256,	'DERECHO',	1255,	'A',	'2018-07-29 05:48:41',	'2018-07-29 05:48:41',	3,	'0'),
(1257,	'SOCIOLOGIA',	1255,	'A',	'2018-07-29 05:49:07',	'2018-07-29 05:49:07',	3,	'0');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `persona_id` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` longtext COLLATE utf8mb4_unicode_ci,
  `extension` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefijo` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `persona_id`, `last_login`, `estado`, `session_id`, `extension`, `prefijo`) VALUES
(1,	'Admin',	'admin@admin.com',	'$2y$10$42HlUwqhBfT.SAbH2dY3.e9VC9Ple2liXvlqppc.uuID8OsVKOXSq',	'myJc6eoU5jjXcoqQ9bRFtNA8poaFVJsQ7JCTjiL4oO8CYi6b3HRYX55ocmLe',	'2018-04-05 00:20:51',	'2018-07-29 20:43:57',	'0926339730',	'2018-07-29 20:43:57',	'A',	'SJ1yn7lLzU54hfGquqDaeOCtDm3NxKJNE74It13V',	'202',	'49'),
(21,	'usuario',	'ajr@gmail.com',	'$2y$10$RAVT/P0IuHasWIBRnwxKA.yxuw9Il874aMHT1BJW.SuiCeQp0dKeO',	'LQ9zmmSYFUg4RYVEREN5YgOdk85yWITYaM2H9DlbIOa1gsj1sO0xxw8RcKcT',	'2018-07-23 12:06:11',	'2018-07-29 20:37:59',	'0000000000',	'2018-07-29 20:37:59',	'A',	'BUbEogEergj2B8mhzAL5fx8l5D2XpXfcz6Dxx0QE',	NULL,	NULL),
(24,	'asdfa sdf',	'a17@gmail.com',	'$2y$10$ecO/M/rdmwU8thX7IQnNmeBAxImjK2gZhhI6YEDmAo03qyB.smbC.',	'Jut9U0QUy6g7VWeBsiOJ813hNQyUVn4vQXl6M2WjWCwk2Hi3ZAp7HphB23w4',	'2018-07-29 19:44:09',	'2018-07-29 19:46:02',	'0926262645',	'2018-07-29 19:46:02',	'A',	'CbtikPVCAVu7vBu4IfNmMC6CQ05OhEaQYhGpJvNF',	NULL,	NULL),
(25,	'prueba espinoza',	'a646@hotmail.com',	'$2y$10$6htlcFjCAIUpDWb84WnhsO9qL7tqfvwJlh5N0nNSu2novSij6fMa.',	'r43mv4TIwDV2Ss4RRagM63iVo6TuXOLILxojN3hxOnb6QQCgz8M4AXnYvBtt',	'2018-07-29 19:55:43',	'2018-07-29 19:56:27',	'0972725625',	'2018-07-29 19:56:27',	'A',	'lZcIQ865ZSMDqrTV8FjYDqBv8cgHhtS7Dy8QFKYR',	NULL,	NULL),
(26,	'trddg ufvgv',	'a@bba.com',	'$2y$10$y/jmuDZ/Cg0bk9z2qhYLnOcB7FR.5ep4XVrst75TmwRTD5ayd.iKu',	'bSvs1fwFyi4Z2C5bQpwEuNegvdZnT2RTpiBOrevQa81snDAm7B6p7N8gBK6t',	'2018-07-29 20:38:23',	'2018-07-29 20:39:49',	'0926570137',	'2018-07-29 20:39:49',	'A',	'sH4u7NUybWj6SJPuic101vZJW5GWmA1mG3mr5ZH9',	NULL,	NULL);

-- 2018-07-31 20:17:49
