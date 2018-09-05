-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2018 a las 15:44:12
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

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
  `comentario_usu` varchar(20000) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_usu` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `mg_ip_usu` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_noti` int(11) NOT NULL,
  `accion` int(11) NOT NULL,
  `visto` int(11) NOT NULL,
  `id_public_noti` int(11) NOT NULL,
  `id_usu_noti` int(11) NOT NULL
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
  `nmg_ip` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones_anonimos`
--

CREATE TABLE `publicaciones_anonimos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` varchar(20000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones_usuarios`
--

CREATE TABLE `publicaciones_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `contenido` varchar(20000) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--

CREATE TABLE `seguidores` (
  `id_segui` int(11) NOT NULL,
  `envia_solicitud` int(11) NOT NULL,
  `recibe_solicitud` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Índices para tablas volcadas
--

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
  ADD KEY `com_id_usu` (`com_id_usu`);

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
  ADD KEY `mg_id_usu` (`mg_id_usu`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_noti`),
  ADD KEY `id_public_noti` (`id_public_noti`),
  ADD KEY `id_usu_noti` (`id_usu_noti`);

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
  ADD KEY `nmg_id_usu` (`nmg_id_usu`);

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
-- Indices de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`id_segui`),
  ADD KEY `envia_solicitud` (`envia_solicitud`),
  ADD KEY `seguidores_ibfk_2` (`recibe_solicitud`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios_anonimos`
--
ALTER TABLE `comentarios_anonimos`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios_usuarios`
--
ALTER TABLE `comentarios_usuarios`
  MODIFY `id_com_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `me_gusta_anonimos`
--
ALTER TABLE `me_gusta_anonimos`
  MODIFY `id_mg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `me_gusta_usuarios`
--
ALTER TABLE `me_gusta_usuarios`
  MODIFY `id_mg_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_noti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `no_me_gusta_anonimos`
--
ALTER TABLE `no_me_gusta_anonimos`
  MODIFY `id_nmg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `no_me_gusta_usuarios`
--
ALTER TABLE `no_me_gusta_usuarios`
  MODIFY `id_nmg_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `publicaciones_anonimos`
--
ALTER TABLE `publicaciones_anonimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `publicaciones_usuarios`
--
ALTER TABLE `publicaciones_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `id_segui` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios_anonimos`
--
ALTER TABLE `comentarios_anonimos`
  ADD CONSTRAINT `comentarios_anonimos_ibfk_1` FOREIGN KEY (`com_id_publicacion`) REFERENCES `publicaciones_anonimos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios_usuarios`
--
ALTER TABLE `comentarios_usuarios`
  ADD CONSTRAINT `comentarios_usuarios_ibfk_1` FOREIGN KEY (`com_id_usu`) REFERENCES `publicaciones_usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `me_gusta_anonimos`
--
ALTER TABLE `me_gusta_anonimos`
  ADD CONSTRAINT `me_gusta_anonimos_ibfk_1` FOREIGN KEY (`mg_id_publicacion`) REFERENCES `publicaciones_anonimos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `me_gusta_usuarios`
--
ALTER TABLE `me_gusta_usuarios`
  ADD CONSTRAINT `me_gusta_usuarios_ibfk_1` FOREIGN KEY (`mg_id_usu`) REFERENCES `publicaciones_usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`id_public_noti`) REFERENCES `publicaciones_usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`id_usu_noti`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `no_me_gusta_anonimos`
--
ALTER TABLE `no_me_gusta_anonimos`
  ADD CONSTRAINT `no_me_gusta_anonimos_ibfk_1` FOREIGN KEY (`nmg_id_publicacion`) REFERENCES `publicaciones_anonimos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `no_me_gusta_usuarios`
--
ALTER TABLE `no_me_gusta_usuarios`
  ADD CONSTRAINT `no_me_gusta_usuarios_ibfk_1` FOREIGN KEY (`nmg_id_usu`) REFERENCES `publicaciones_usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones_usuarios`
--
ALTER TABLE `publicaciones_usuarios`
  ADD CONSTRAINT `publicaciones_usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`envia_solicitud`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seguidores_ibfk_2` FOREIGN KEY (`recibe_solicitud`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
