-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2018 a las 06:19:39
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redtelco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos_usuarios`
--

CREATE TABLE `archivos_usuarios` (
  `id_archivo` int(11) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `archivos_usuarios`
--

INSERT INTO `archivos_usuarios` (`id_archivo`, `archivo`, `id_usuario`, `id_pub`) VALUES
(1, 'Curriculum_Vitae_Luis Venegas.pdf', 7, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_anonimos`
--

CREATE TABLE `comentarios_anonimos` (
  `id_com` int(11) NOT NULL,
  `com_id_publicacion` int(11) NOT NULL,
  `comentario` varchar(20000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_usuarios`
--

CREATE TABLE `comentarios_usuarios` (
  `id_com_usu` int(11) NOT NULL,
  `com_id_usu` int(11) NOT NULL,
  `id_usuario_com` int(11) NOT NULL,
  `comentario_usu` varchar(20000) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_usu` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id_encu` int(11) NOT NULL,
  `id_usu_encu` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_pub_usu`
--

CREATE TABLE `imagen_pub_usu` (
  `id_imagen` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagen_pub_usu`
--

INSERT INTO `imagen_pub_usu` (`id_imagen`, `imagen`, `id_usuario`, `id_pub`) VALUES
(12, '406071.jpg', 7, 48),
(14, '', 7, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `me_gusta_anonimos`
--

CREATE TABLE `me_gusta_anonimos` (
  `id_mg` int(11) NOT NULL,
  `mg_id_publicacion` int(11) NOT NULL,
  `mg_ip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `me_gusta_usuarios`
--

CREATE TABLE `me_gusta_usuarios` (
  `id_mg_usu` int(11) NOT NULL,
  `mg_id_usu` int(11) NOT NULL,
  `id_usuario_mg` int(11) NOT NULL,
  `mg_ip_usu` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `no_me_gusta_anonimos`
--

CREATE TABLE `no_me_gusta_anonimos` (
  `id_nmg` int(11) NOT NULL,
  `nmg_id_publicacion` int(11) NOT NULL,
  `nmg_ip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `no_me_gusta_usuarios`
--

CREATE TABLE `no_me_gusta_usuarios` (
  `id_nmg_usu` int(11) NOT NULL,
  `nmg_id_usu` int(11) NOT NULL,
  `id_usuario_nmg` int(11) NOT NULL,
  `nmg_ip` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_encuesta`
--

CREATE TABLE `opciones_encuesta` (
  `id_op` int(11) NOT NULL,
  `encu_id` int(11) NOT NULL,
  `opciones` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones_anonimos`
--

CREATE TABLE `publicaciones_anonimos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` varchar(20000) COLLATE utf8_spanish_ci NOT NULL,
  `imagenAnonimo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicaciones_anonimos`
--

INSERT INTO `publicaciones_anonimos` (`id`, `nombre`, `contenido`, `imagenAnonimo`, `fecha`) VALUES
(5, 'Anonimo 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,', '', '2018-09-18 12:06:04'),
(10, 'Anonimo 2', 'Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '2018-09-18 12:23:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones_usuarios`
--

CREATE TABLE `publicaciones_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `contenido` varchar(20000) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicaciones_usuarios`
--

INSERT INTO `publicaciones_usuarios` (`id`, `id_usuario`, `contenido`, `fecha`) VALUES
(48, 7, 'publicacion1', '2018-09-20 20:07:02'),
(49, 7, 'publicacion2', '2018-09-20 20:33:05'),
(50, 7, 'probando archivo', '2018-09-20 21:18:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contrasehna` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `foto_perfil` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `contrasehna`, `foto_perfil`) VALUES
(7, 'luis', 'venegas', 'luis@gmail.com', '0f9f6938cea5bb9e0267efd1e71fcf75dd649c91', 'triangleuniverse1.jpg'),
(16, 'freddy', 'turbina', 'luis.venegas007@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos_usuarios`
--
ALTER TABLE `archivos_usuarios`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pub` (`id_pub`);

--
-- Indices de la tabla `comentarios_anonimos`
--
ALTER TABLE `comentarios_anonimos`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `com_id_publicacion` (`com_id_publicacion`);

--
-- Indices de la tabla `comentarios_usuarios`
--
ALTER TABLE `comentarios_usuarios`
  ADD PRIMARY KEY (`id_com_usu`),
  ADD KEY `com_id_usu` (`com_id_usu`),
  ADD KEY `comentarios_usuarios_ibfk_2` (`id_usuario_com`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id_encu`),
  ADD KEY `id_usu_encu` (`id_usu_encu`);

--
-- Indices de la tabla `imagen_pub_usu`
--
ALTER TABLE `imagen_pub_usu`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pub` (`id_pub`);

--
-- Indices de la tabla `me_gusta_anonimos`
--
ALTER TABLE `me_gusta_anonimos`
  ADD PRIMARY KEY (`id_mg`),
  ADD KEY `mg_id_publicacion` (`mg_id_publicacion`);

--
-- Indices de la tabla `me_gusta_usuarios`
--
ALTER TABLE `me_gusta_usuarios`
  ADD PRIMARY KEY (`id_mg_usu`),
  ADD KEY `mg_id_usu` (`mg_id_usu`),
  ADD KEY `me_gusta_usuarios_ibfk_2` (`id_usuario_mg`);

--
-- Indices de la tabla `no_me_gusta_anonimos`
--
ALTER TABLE `no_me_gusta_anonimos`
  ADD PRIMARY KEY (`id_nmg`),
  ADD KEY `nmg_id_publicacion` (`nmg_id_publicacion`);

--
-- Indices de la tabla `no_me_gusta_usuarios`
--
ALTER TABLE `no_me_gusta_usuarios`
  ADD PRIMARY KEY (`id_nmg_usu`),
  ADD KEY `nmg_id_usu` (`nmg_id_usu`),
  ADD KEY `no_me_gusta_usuarios_ibfk_2` (`id_usuario_nmg`);

--
-- Indices de la tabla `opciones_encuesta`
--
ALTER TABLE `opciones_encuesta`
  ADD PRIMARY KEY (`id_op`),
  ADD KEY `encu_id` (`encu_id`);

--
-- Indices de la tabla `publicaciones_anonimos`
--
ALTER TABLE `publicaciones_anonimos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones_usuarios`
--
ALTER TABLE `publicaciones_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publicaciones_usuarios_ibfk_1` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos_usuarios`
--
ALTER TABLE `archivos_usuarios`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comentarios_anonimos`
--
ALTER TABLE `comentarios_anonimos`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios_usuarios`
--
ALTER TABLE `comentarios_usuarios`
  MODIFY `id_com_usu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id_encu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen_pub_usu`
--
ALTER TABLE `imagen_pub_usu`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `me_gusta_anonimos`
--
ALTER TABLE `me_gusta_anonimos`
  MODIFY `id_mg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `me_gusta_usuarios`
--
ALTER TABLE `me_gusta_usuarios`
  MODIFY `id_mg_usu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `no_me_gusta_anonimos`
--
ALTER TABLE `no_me_gusta_anonimos`
  MODIFY `id_nmg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `no_me_gusta_usuarios`
--
ALTER TABLE `no_me_gusta_usuarios`
  MODIFY `id_nmg_usu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opciones_encuesta`
--
ALTER TABLE `opciones_encuesta`
  MODIFY `id_op` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicaciones_anonimos`
--
ALTER TABLE `publicaciones_anonimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `publicaciones_usuarios`
--
ALTER TABLE `publicaciones_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos_usuarios`
--
ALTER TABLE `archivos_usuarios`
  ADD CONSTRAINT `archivos_usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `archivos_usuarios_ibfk_2` FOREIGN KEY (`id_pub`) REFERENCES `publicaciones_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios_anonimos`
--
ALTER TABLE `comentarios_anonimos`
  ADD CONSTRAINT `comentarios_anonimos_ibfk_1` FOREIGN KEY (`com_id_publicacion`) REFERENCES `publicaciones_anonimos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios_usuarios`
--
ALTER TABLE `comentarios_usuarios`
  ADD CONSTRAINT `comentarios_usuarios_ibfk_1` FOREIGN KEY (`com_id_usu`) REFERENCES `publicaciones_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_usuarios_ibfk_2` FOREIGN KEY (`id_usuario_com`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD CONSTRAINT `encuesta_ibfk_1` FOREIGN KEY (`id_usu_encu`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen_pub_usu`
--
ALTER TABLE `imagen_pub_usu`
  ADD CONSTRAINT `imagen_pub_usu_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `imagen_pub_usu_ibfk_2` FOREIGN KEY (`id_pub`) REFERENCES `publicaciones_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `me_gusta_anonimos`
--
ALTER TABLE `me_gusta_anonimos`
  ADD CONSTRAINT `me_gusta_anonimos_ibfk_1` FOREIGN KEY (`mg_id_publicacion`) REFERENCES `publicaciones_anonimos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `me_gusta_usuarios`
--
ALTER TABLE `me_gusta_usuarios`
  ADD CONSTRAINT `me_gusta_usuarios_ibfk_1` FOREIGN KEY (`mg_id_usu`) REFERENCES `publicaciones_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `me_gusta_usuarios_ibfk_2` FOREIGN KEY (`id_usuario_mg`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `no_me_gusta_anonimos`
--
ALTER TABLE `no_me_gusta_anonimos`
  ADD CONSTRAINT `no_me_gusta_anonimos_ibfk_1` FOREIGN KEY (`nmg_id_publicacion`) REFERENCES `publicaciones_anonimos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `no_me_gusta_usuarios`
--
ALTER TABLE `no_me_gusta_usuarios`
  ADD CONSTRAINT `no_me_gusta_usuarios_ibfk_1` FOREIGN KEY (`nmg_id_usu`) REFERENCES `publicaciones_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `no_me_gusta_usuarios_ibfk_2` FOREIGN KEY (`id_usuario_nmg`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opciones_encuesta`
--
ALTER TABLE `opciones_encuesta`
  ADD CONSTRAINT `opciones_encuesta_ibfk_1` FOREIGN KEY (`encu_id`) REFERENCES `encuesta` (`id_encu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones_usuarios`
--
ALTER TABLE `publicaciones_usuarios`
  ADD CONSTRAINT `publicaciones_usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
