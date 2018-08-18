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
  `ingresos` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
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