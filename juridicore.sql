/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : juridicore

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-07-25 09:15:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('2', 'Usuarios', '/admin/users', '10', '1', '1', null, null);
INSERT INTO `menus` VALUES ('3', 'Roles', '/admin/roles', '10', '0', '1', null, null);
INSERT INTO `menus` VALUES ('8', 'Menu', 'admin/MenuCreate', '10', '2', '1', null, null);
INSERT INTO `menus` VALUES ('10', 'Administrador', '#', '0', '1', '1', null, null);
INSERT INTO `menus` VALUES ('13', 'Venta', 'venta/index', '0', '2', '1', '2018-04-09 19:51:14', '2018-04-09 19:51:14');
INSERT INTO `menus` VALUES ('14', 'Parametros', 'admin/ParametroIndex', '10', '4', '1', '2018-04-10 15:48:29', '2018-04-10 15:49:04');
INSERT INTO `menus` VALUES ('40', 'Sin Nivel', 'Sin Nivel', '0', '0', '1', null, null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_07_12_145959_create_permission_tables', '1');
INSERT INTO `migrations` VALUES ('4', '2018_04_05_003121_create_menus_table', '2');
INSERT INTO `migrations` VALUES ('5', '2018_05_31_144003_create_notifications_table', '3');

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES ('1', '1', 'App\\User');
INSERT INTO `model_has_roles` VALUES ('2', '1', 'App\\User');
INSERT INTO `model_has_roles` VALUES ('2', '21', 'App\\User');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('anthony.espinozaf@gmail.com', '$2y$10$DkR5aPZgWHq9aKKHnc5j6unUtXFwXCOTS9TRCgb1jzjLDCfKVhd82', '2018-04-05 21:19:14');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'users_manage', 'web', '2018-04-05 00:20:50', '2018-04-05 00:20:50');
INSERT INTO `permissions` VALUES ('2', 'Estandar', 'web', '2018-04-05 21:46:29', '2018-04-07 17:19:13');

-- ----------------------------
-- Table structure for role_has_permission
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permission`;
CREATE TABLE `role_has_permission` (
  `permission_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role_has_permission
-- ----------------------------
INSERT INTO `role_has_permission` VALUES ('10', '1');
INSERT INTO `role_has_permission` VALUES ('3', '1');
INSERT INTO `role_has_permission` VALUES ('8', '1');
INSERT INTO `role_has_permission` VALUES ('2', '1');
INSERT INTO `role_has_permission` VALUES ('12', '23');
INSERT INTO `role_has_permission` VALUES ('14', '1');
INSERT INTO `role_has_permission` VALUES ('15', '24');
INSERT INTO `role_has_permission` VALUES ('17', '24');
INSERT INTO `role_has_permission` VALUES ('18', '24');
INSERT INTO `role_has_permission` VALUES ('21', '23');
INSERT INTO `role_has_permission` VALUES ('19', '25');
INSERT INTO `role_has_permission` VALUES ('20', '25');
INSERT INTO `role_has_permission` VALUES ('22', '26');
INSERT INTO `role_has_permission` VALUES ('23', '27');
INSERT INTO `role_has_permission` VALUES ('24', '28');
INSERT INTO `role_has_permission` VALUES ('19', '29');
INSERT INTO `role_has_permission` VALUES ('19', '26');
INSERT INTO `role_has_permission` VALUES ('19', '23');
INSERT INTO `role_has_permission` VALUES ('19', '27');
INSERT INTO `role_has_permission` VALUES ('19', '28');
INSERT INTO `role_has_permission` VALUES ('20', '29');
INSERT INTO `role_has_permission` VALUES ('26', '30');
INSERT INTO `role_has_permission` VALUES ('27', '30');
INSERT INTO `role_has_permission` VALUES ('19', '31');
INSERT INTO `role_has_permission` VALUES ('28', '24');
INSERT INTO `role_has_permission` VALUES ('29', '29');
INSERT INTO `role_has_permission` VALUES ('30', '32');
INSERT INTO `role_has_permission` VALUES ('31', '32');
INSERT INTO `role_has_permission` VALUES ('32', '32');
INSERT INTO `role_has_permission` VALUES ('33', '32');
INSERT INTO `role_has_permission` VALUES ('34', '32');
INSERT INTO `role_has_permission` VALUES ('35', '32');
INSERT INTO `role_has_permission` VALUES ('19', '33');
INSERT INTO `role_has_permission` VALUES ('20', '33');
INSERT INTO `role_has_permission` VALUES ('36', '32');
INSERT INTO `role_has_permission` VALUES ('19', '32');
INSERT INTO `role_has_permission` VALUES ('19', '34');
INSERT INTO `role_has_permission` VALUES ('36', '34');
INSERT INTO `role_has_permission` VALUES ('29', '33');
INSERT INTO `role_has_permission` VALUES ('10', '32');
INSERT INTO `role_has_permission` VALUES ('38', '32');
INSERT INTO `role_has_permission` VALUES ('19', '35');
INSERT INTO `role_has_permission` VALUES ('39', '35');
INSERT INTO `role_has_permission` VALUES ('19', '36');
INSERT INTO `role_has_permission` VALUES ('39', '36');
INSERT INTO `role_has_permission` VALUES ('19', '37');
INSERT INTO `role_has_permission` VALUES ('39', '37');
INSERT INTO `role_has_permission` VALUES ('19', '38');
INSERT INTO `role_has_permission` VALUES ('39', '38');
INSERT INTO `role_has_permission` VALUES ('10', '34');
INSERT INTO `role_has_permission` VALUES ('38', '34');
INSERT INTO `role_has_permission` VALUES ('41', '39');
INSERT INTO `role_has_permission` VALUES ('42', '39');
INSERT INTO `role_has_permission` VALUES ('42', '40');
INSERT INTO `role_has_permission` VALUES ('39', '26');
INSERT INTO `role_has_permission` VALUES ('39', '23');
INSERT INTO `role_has_permission` VALUES ('39', '31');
INSERT INTO `role_has_permission` VALUES ('39', '27');
INSERT INTO `role_has_permission` VALUES ('39', '28');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES ('2', '1');
INSERT INTO `role_has_permissions` VALUES ('2', '2');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'administrator', 'web', '2018-04-05 00:20:50', '2018-04-05 00:20:50');
INSERT INTO `roles` VALUES ('2', 'estandar', 'web', '2018-04-06 22:20:43', '2018-04-06 22:20:53');

-- ----------------------------
-- Table structure for tablabase
-- ----------------------------
DROP TABLE IF EXISTS `tablabase`;
CREATE TABLE `tablabase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tabla_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(1) DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tablabase
-- ----------------------------
INSERT INTO `tablabase` VALUES ('3', '1', 'prueba', 'A', '2018-06-02 15:52:19');
INSERT INTO `tablabase` VALUES ('4', '1', 'prueba', 'A', '2018-06-04 15:03:39');

-- ----------------------------
-- Table structure for tb_parametro
-- ----------------------------
DROP TABLE IF EXISTS `tb_parametro`;
CREATE TABLE `tb_parametro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `parametro_id` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nivel` int(4) DEFAULT '4',
  `verificacion` varchar(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1255 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tb_parametro
-- ----------------------------
INSERT INTO `tb_parametro` VALUES ('357', 'PR-TODAS', '43', 'A', null, null, '3', '0');
INSERT INTO `tb_parametro` VALUES ('1024', 'CIU-Guayaquil', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1025', 'CIU-Quito', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1026', 'CIU-Cuenca', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1027', 'CIU-SantoDomingo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1028', 'CIU-Machala', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1029', 'CIU-Duran', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1030', 'CIU-Manta', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1031', 'CIU-Portoviejo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1032', 'CIU-Loja', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1033', 'CIU-Ambato', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1034', 'CIU-Esmeraldas', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1035', 'CIU-Quevedo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1036', 'CIU-Riobamba', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1037', 'CIU-Milagro', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1038', 'CIU-Ibarra', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1039', 'CIU-LaLibertad', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1040', 'CIU-Babahoyo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1041', 'CIU-Sangolqui', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1042', 'CIU-Daule', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1043', 'CIU-Latacunga', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1044', 'CIU-Tulcan', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1045', 'CIU-Chone', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1046', 'CIU-Pasaje', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1047', 'CIU-SantaRosa', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1048', 'CIU-NuevaLoja', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1049', 'CIU-Huaquillas', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1050', 'CIU-ElCarmen', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1051', 'CIU-Montecristi', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1052', 'CIU-Samborondon', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1053', 'CIU-PuertoFranciscodeOrellana', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1054', 'CIU-Jipijapa', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1055', 'CIU-SantaElena', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1056', 'CIU-Otavalo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1057', 'CIU-Cayambe', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1058', 'CIU-BuenaFe', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1059', 'CIU-Ventanas', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1060', 'CIU-VelascoIbarra(ElEmpalme)', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1061', 'CIU-LaTroncal', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1062', 'CIU-ElTriunfo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1063', 'CIU-Salinas', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1064', 'CIU-GeneralVillamil(Playas)', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1065', 'CIU-Azogues', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1066', 'CIU-Puyo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1067', 'CIU-Vinces', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1068', 'CIU-LaConcordia', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1069', 'CIU-RosaZarate(Quinindé)', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1070', 'CIU-Balzar', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1071', 'CIU-Naranjito', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1072', 'CIU-Naranjal', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1073', 'CIU-Guaranda', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1074', 'CIU-LaMana', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1075', 'CIU-Tena', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1076', 'CIU-SanLorenzo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1077', 'CIU-Catamayo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1078', 'CIU-ElGuabo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1079', 'CIU-Pedernales', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1080', 'CIU-Atuntaqui', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1081', 'CIU-BahiadeCaraquez', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1082', 'CIU-PedroCarbo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1083', 'CIU-Macas', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1084', 'CIU-Yaguachi', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1085', 'CIU-Calceta', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1086', 'CIU-Arenillas', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1087', 'CIU-Jaramijo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1088', 'CIU-Valencia', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1089', 'CIU-Machachi', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1090', 'CIU-Shushufindi', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1091', 'CIU-Atacames', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1092', 'CIU-Pi&ntilde;as', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1093', 'CIU-SanGabriel', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1094', 'CIU-Gualaceo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1095', 'CIU-LomasdeSargentillo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1096', 'CIU-Ca&ntilde;ar', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1097', 'CIU-Cariamanga', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1098', 'CIU-Ba&ntilde;osdeAguaSanta', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1099', 'CIU-Montalvo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1100', 'CIU-Macara', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1101', 'CIU-SanMiguel(Salcedo)', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1102', 'CIU-Zamora', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1103', 'CIU-PuertoAyora', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1104', 'CIU-LaJoyadelosSachas', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1105', 'CIU-Salitre', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1106', 'CIU-Tosagua', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1107', 'CIU-Pelileo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1108', 'CIU-Pujili', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1109', 'CIU-Tabacundo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1110', 'CIU-PuertoLopez', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1111', 'CIU-SanVicente', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1112', 'CIU-SantaAnadeVueltaLarga', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1113', 'CIU-Zaruma', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1114', 'CIU-Balao', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1115', 'CIU-Rocafuerte', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1116', 'CIU-Yantzaza', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1117', 'CIU-Cotacachi', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1118', 'CIU-SantaLucia', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1119', 'CIU-Cumanda', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1120', 'CIU-Palestina', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1121', 'CIU-AlfredoBaquerizoMoreno(Jujan)', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1122', 'CIU-NarcisadeJesus(Nobol)', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1123', 'CIU-Mocache', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1124', 'CIU-Puebloviejo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1125', 'CIU-Portovelo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1126', 'CIU-Sucua', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1127', 'CIU-Guano', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1128', 'CIU-Pillaro', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1129', 'CIU-SimonBolivar', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1130', 'CIU-Gualaquiza', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1131', 'CIU-Paute', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1132', 'CIU-Saquisili', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1133', 'CIU-CoronelMarcelinoMaridue&ntilde;a', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1134', 'CIU-Pajan', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1135', 'CIU-SanMiguel', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1136', 'CIU-PuertoBaquerizoMoreno', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1137', 'CIU-Catacocha', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1138', 'CIU-Palenque', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1139', 'CIU-Alausi', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1140', 'CIU-Caluma', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1141', 'CIU-Catarama', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1142', 'CIU-FlavioAlfaro', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1143', 'CIU-Colimes', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1144', 'CIU-Echeandia', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1145', 'CIU-Jama', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1146', 'CIU-GeneralAntonioElizalde(Bucay)', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1147', 'CIU-IsidroAyora', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1148', 'CIU-Muisne', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1149', 'CIU-SantaIsabel', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1150', 'CIU-PedroVicenteMaldonado', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1151', 'CIU-Biblian', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1152', 'CIU-Archidona', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1153', 'CIU-Junin', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1154', 'CIU-Baba', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1155', 'CIU-Valdez(Limones)', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1156', 'CIU-Pimampiro', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1157', 'CIU-CamiloPonceEnriquez', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1158', 'CIU-SanMigueldeLosBancos', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1159', 'CIU-ElTambo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1160', 'CIU-Quinsaloma', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1161', 'CIU-Elangel', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1162', 'CIU-Alamor', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1163', 'CIU-Chambo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1164', 'CIU-SanJosédeChimbo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1165', 'CIU-Celica', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1166', 'CIU-Chordeleg', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1167', 'CIU-Balsas', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1168', 'CIU-Saraguro', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1169', 'CIU-ElChaco', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1170', 'CIU-Giron', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1171', 'CIU-Huaca', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1172', 'CIU-Pichincha', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1173', 'CIU-Chunchi', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1174', 'CIU-Pallatanga', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1175', 'CIU-Marcabeli', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1176', 'CIU-Sigsig', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1177', 'CIU-GeneralLeonidasPlazaGutiérrez(Limon)', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1178', 'CIU-Urcuqui', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1179', 'CIU-Loreto', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1180', 'CIU-Rioverde', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1181', 'CIU-Zumba', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1182', 'CIU-Palora', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1183', 'CIU-Mira', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1184', 'CIU-ElPangui', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1185', 'CIU-PuertoQuito', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1186', 'CIU-Bolivar', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1187', 'CIU-Sucre', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1188', 'CIU-Chillanes', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1189', 'CIU-Quero', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1190', 'CIU-Guamote', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1191', 'CIU-Cevallos', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1192', 'CIU-Zapotillo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1193', 'CIU-VillaLaUnion(Cajabamba)', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1194', 'CIU-SantiagodeMéndez', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1195', 'CIU-Zumbi', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1196', 'CIU-PuertoElCarmendePutumayo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1197', 'CIU-Patate', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1198', 'CIU-Olmedo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1199', 'CIU-PuertoVillamil', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1200', 'CIU-ElDoradodeCascales', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1201', 'CIU-Lumbaqui', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1202', 'CIU-Palanda', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1203', 'CIU-Sigchos', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1204', 'CIU-Pindal', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1205', 'CIU-Guayzimi', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1206', 'CIU-Baeza', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1207', 'CIU-ElCorazon', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1208', 'CIU-Paccha', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1209', 'CIU-Amaluza', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1210', 'CIU-LasNaves', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1211', 'CIU-Logro&ntilde;o', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1212', 'CIU-SanFernando', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1213', 'CIU-Gonzanama', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1214', 'CIU-SanJuanBosco', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1215', 'CIU-28deMayo(SanJosédeYacuambi)', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1216', 'CIU-SantaClara', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1217', 'CIU-Arajuno', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1218', 'CIU-Tarapoa', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1219', 'CIU-Tisaleo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1220', 'CIU-Suscal', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1221', 'CIU-Nabon', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1222', 'CIU-NuevoRocafuerte', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1223', 'CIU-Mocha', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1224', 'CIU-LaVictoria', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1225', 'CIU-Guachapala', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1226', 'CIU-Santiago', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1227', 'CIU-Chaguarpamba', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1228', 'CIU-Penipe', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1229', 'CIU-Taisha', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1230', 'CIU-Chilla', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1231', 'CIU-Paquisha', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1232', 'CIU-CarlosJulioArosemenaTola', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1233', 'CIU-Sozoranga', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1234', 'CIU-Pucara', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1235', 'CIU-Huamboya', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1236', 'CIU-Quilanga', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1237', 'CIU-SanFelipedeO&ntilde;a', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1238', 'CIU-SevilladeOro', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1239', 'CIU-Mera', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1240', 'CIU-PabloSexto', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1241', 'CIU-Olmedo', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1242', 'CIU-Déleg', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1243', 'CIU-LaBonita', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1244', 'CIU-ElPan', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1245', 'CIU-Tiputini', '357', 'A', null, null, '4', '0');
INSERT INTO `tb_parametro` VALUES ('1246', 'Entrevistador', '101', 'A', '2018-07-04 11:28:51', '2018-07-04 11:28:51', '3', '0');
INSERT INTO `tb_parametro` VALUES ('1247', 'NUMERO INCORRECTO', '126', 'A', '2018-07-17 12:05:46', '2018-07-04 12:05:56', '4', '0');
INSERT INTO `tb_parametro` VALUES ('1248', 'VOLVER A LLAMAR', '126', 'A', '2018-07-18 12:05:50', '2018-07-09 12:06:00', '4', '0');
INSERT INTO `tb_parametro` VALUES ('1249', 'POSTULANTES', '126', 'A', '2018-06-26 12:05:52', '2018-07-04 12:06:02', '4', '0');
INSERT INTO `tb_parametro` VALUES ('1250', 'RESCATE CREDITO', '52', 'A', '2018-07-16 18:05:32', '2018-07-16 18:05:32', '4', '3');
INSERT INTO `tb_parametro` VALUES ('1251', 'POSIBLE FRAUDE', '55', 'A', '2018-07-17 09:26:14', '2018-07-17 09:26:14', '4', '6');
INSERT INTO `tb_parametro` VALUES ('1252', 'CAMBIO DE INGRESO RECEP', '54', 'A', '2018-07-17 09:27:36', '2018-07-17 09:27:36', '4', '5');
INSERT INTO `tb_parametro` VALUES ('1253', 'CARRUSEL ACT', '55', 'A', '2018-07-17 09:28:32', '2018-07-17 09:28:32', '4', '6');
INSERT INTO `tb_parametro` VALUES ('1254', 'VENTA POSTERGADA - RECEPCION', '54', 'A', '2018-07-17 09:33:36', '2018-07-17 09:33:36', '4', '5');

-- ----------------------------
-- Table structure for users
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', 'admin@admin.com', '$2y$10$42HlUwqhBfT.SAbH2dY3.e9VC9Ple2liXvlqppc.uuID8OsVKOXSq', 'RfBDtn5MWuEXuqTvs742R90TG0FbiYoXrXBakbxai8591trTpSOci6oDBBe5', '2018-04-05 00:20:51', '2018-07-23 12:07:45', '0926339730', '2018-07-23 12:07:45', 'A', 'Ro18YDqgjQgK0mVs8u7JOpEjYJkVJGKpoFFwbJDI', '202', '49');
INSERT INTO `users` VALUES ('21', 'usuario', 'ajr@gmail.com', '$2y$10$RAVT/P0IuHasWIBRnwxKA.yxuw9Il874aMHT1BJW.SuiCeQp0dKeO', 'HzCeWUA2NdlumyrctShxWe5S7EiFOeb5UkUG1TPyCG2gRHci0w5WWB8A3FTI', '2018-07-23 12:06:11', '2018-07-23 12:06:54', '0000000000', '2018-07-23 12:06:54', 'A', 'b0JMaiUGHwC9qBOTAYGWQhj0yjNOwEEI9mRr7ftU', null, null);
