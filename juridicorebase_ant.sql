-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `juridicorebase_ant` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `juridicorebase_ant`;

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


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `abv` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_student` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `role_has_permission`;
CREATE TABLE `role_has_permission` (
  `permission_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `tablabase`;
CREATE TABLE `tablabase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tabla_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(1) DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
  `abv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugarasignado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `persona_id`, `last_login`, `estado`, `session_id`, `abv`, `lugarasignado_id`) VALUES
(1,	'Admin',	'admin@admin.com',	'$2y$10$42HlUwqhBfT.SAbH2dY3.e9VC9Ple2liXvlqppc.uuID8OsVKOXSq',	'oEN3y0iFz0QmC0HtuAo7v9rn5SlMGXlEuHuo2UMx2UdiJukbzb6r6rPRIMsP',	'2018-04-04 19:20:51',	'2018-08-05 16:42:30',	'0926339731',	'2018-08-05 16:42:30',	'A',	'3uOZNr7ohIWY2Dx2979EawPOtoLFbeCFz9GCJSiU',	'202',	NULL),
(21,	'usuario',	'ajr@gmail.com',	'$2y$10$RAVT/P0IuHasWIBRnwxKA.yxuw9Il874aMHT1BJW.SuiCeQp0dKeO',	'j5LDlHSLpQNsAgY5vc3gLnJNUD8tQTDyUpBhGIku2r5wY7sZj24maacYFrp6',	'2018-07-23 07:06:11',	'2018-08-05 16:30:27',	'0000000000',	'2018-08-05 16:30:27',	'A',	'mFXPwTRmJL4fiUhIl2ppZVWge07Zhr9WhNxUgNzl',	'SEC',	NULL),
(25,	'prueba espinoza',	'a646@hotmail.com',	'$2y$10$6htlcFjCAIUpDWb84WnhsO9qL7tqfvwJlh5N0nNSu2novSij6fMa.',	'r43mv4TIwDV2Ss4RRagM63iVo6TuXOLILxojN3hxOnb6QQCgz8M4AXnYvBtt',	'2018-07-29 14:55:43',	'2018-07-29 14:56:27',	'0972725625',	'2018-07-29 19:56:27',	'A',	'lZcIQ865ZSMDqrTV8FjYDqBv8cgHhtS7Dy8QFKYR',	'SUP',	1),
(27,	'Supervisor1',	'tutor1@ug.edu.ec',	'$2y$10$aF.CwX2YmetIofgJt1tYD.UZV8eMNJx3zQfFxoJRVRB5atI1BjRUK',	NULL,	'2018-08-04 17:43:27',	'2018-08-05 14:02:24',	'0922606223',	NULL,	'A',	NULL,	'SUP',	1),
(28,	'Anthony Espinoza',	'a@ug.edu.ec',	'$2y$10$cjaLZbHdKAwZpnJ4V.2V2.IjxdpVqTHu1XA4K9BL5AieY1bU320C6',	'NTntmidZD6kAMFYCqpyxHCnzg4il5sfW64h97wivGEy1gPSWtlEROPZh4iFX',	'2018-08-05 01:46:47',	'2018-08-05 14:16:04',	'0926339730',	'2018-08-05 14:16:04',	'A',	'olj4NtBpNdGZApZ6aUa07qZx0V1wCbcO4D5Alxb5',	NULL,	NULL),
(29,	'Anthony Espinoza',	'a@ug.edu.ec',	'$2y$10$EpgpXd/6ef9iB4edGHR.A./4j./8m7oK2.zFvR2qEiFxHYP3Z/ET2',	NULL,	'2018-08-05 13:44:23',	'2018-08-05 13:44:23',	'0926339730',	NULL,	'A',	NULL,	NULL,	NULL),
(30,	'Tutor1',	'supervisor1@gmail.com',	'$2y$10$z4qluWlU0/XlYEguHMIT0.sfyivI9LThFUHAuiIOd8K3xjx6nI/PC',	NULL,	'2018-08-05 13:57:46',	'2018-08-05 14:02:11',	'0926339732',	NULL,	'A',	NULL,	'TUT',	NULL),
(35,	'prueba pruebaa',	'aas@gmail.com',	'$2y$10$W0Cc3FHBmhW8MIoGFrCio.G0AtxZJw4XnZBTqYzzE6ozYvyfyetk.',	'jhXViFtj6OgAabzIuGwcP04GBYMkCK8Z7CT2S8g18E8Q92nUVsWk5ecrWFj1',	'2018-08-05 16:33:25',	'2018-08-05 16:34:57',	'0924931231',	'2018-08-05 16:34:57',	'A',	'cXDRFWRxZdZ0jCbdGjYgrdxyRsCzVKMJGZwP3sLS',	NULL,	NULL);

-- 2018-08-05 22:42:29
