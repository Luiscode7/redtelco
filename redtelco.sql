-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2018 a las 15:04:21
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
  `id_publicacion_usuarios` int(11) NOT NULL,
  `comentario_usuarios` int(11) NOT NULL
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

--
-- Volcado de datos para la tabla `me_gusta_anonimos`
--

INSERT INTO `me_gusta_anonimos` (`id_mg`, `mg_id_publicacion`, `mg_ip`) VALUES
(48, 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `me_gusta_usuarios`
--

CREATE TABLE `me_gusta_usuarios` (
  `id_mg_usu` int(11) NOT NULL,
  `mg_id_usu` int(11) NOT NULL,
  `mg_ip_usu` int(11) NOT NULL
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
  `nmg_ip_usu` int(11) NOT NULL
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

--
-- Volcado de datos para la tabla `publicaciones_anonimos`
--

INSERT INTO `publicaciones_anonimos` (`id`, `nombre`, `contenido`) VALUES
(3, 'anonimo', 'ayer le fui a hacer una instalación a una clienta viejita de unos 75 años,\r\n y me metió conversa todo el rato, tanto que la garganta se me secó. Le pedí un vaso con agua, pero va al refrigerador y me dice: quiere una cerveza mejor?.. la viejita tenia el refri lleno de coronas jajaj.. tenía pura care\' santa la viejita.'),
(6, 'el cable fino', 'el otro dia tuvimos una charla en la oficina, con un desayuno que nos prometió el jefe. Resulta que llegamos y el desayuno eran 2 galletas y un vaso de jugo.. shhh pah\' eso mejor me hubiera asegurado en mi casa.. no le compro mas al jefe.. ni un brillo =/');

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
(1, 'luis', 'venegas espina', 'luis@gmail.com', '0f9f6938cea5bb9e0267efd1e71fcf75dd649c91', NULL);

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
  ADD KEY `id_publicacion_usuarios` (`id_publicacion_usuarios`);

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
  ADD KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comentarios_usuarios`
--
ALTER TABLE `comentarios_usuarios`
  MODIFY `id_com_usu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `me_gusta_anonimos`
--
ALTER TABLE `me_gusta_anonimos`
  MODIFY `id_mg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `me_gusta_usuarios`
--
ALTER TABLE `me_gusta_usuarios`
  MODIFY `id_mg_usu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `no_me_gusta_anonimos`
--
ALTER TABLE `no_me_gusta_anonimos`
  MODIFY `id_nmg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `no_me_gusta_usuarios`
--
ALTER TABLE `no_me_gusta_usuarios`
  MODIFY `id_nmg_usu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicaciones_anonimos`
--
ALTER TABLE `publicaciones_anonimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `publicaciones_usuarios`
--
ALTER TABLE `publicaciones_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `comentarios_usuarios_ibfk_1` FOREIGN KEY (`id_publicacion_usuarios`) REFERENCES `publicaciones_usuarios` (`id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `publicaciones_usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
