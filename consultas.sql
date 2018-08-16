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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;