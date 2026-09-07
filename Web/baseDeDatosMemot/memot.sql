-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2026 a las 18:06:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `memot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `horas_sueño` varchar(50) DEFAULT NULL,
  `dificultad` varchar(100) DEFAULT NULL,
  `metodos_relajacion` varchar(255) DEFAULT NULL,
  `funcion_deseada` varchar(100) DEFAULT NULL,
  `sugerencias` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `id_usuario`, `horas_sueño`, `dificultad`, `metodos_relajacion`, `funcion_deseada`, `sugerencias`, `fecha`) VALUES
(1, 1, 'mas_8', 'estres', 'musica', 'chat_ia', 'buen trabajo', '2026-09-06 00:11:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_sueno`
--

CREATE TABLE `registros_sueno` (
  `id_registro` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_dormir` time NOT NULL,
  `hora_despertar` time NOT NULL,
  `horas_dormidas` decimal(4,2) NOT NULL,
  `calidad_sueno` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros_sueno`
--

INSERT INTO `registros_sueno` (`id_registro`, `id_usuario`, `fecha`, `hora_dormir`, `hora_despertar`, `horas_dormidas`, `calidad_sueno`) VALUES
(1, 1, '2026-06-29', '23:40:00', '10:00:00', 10.33, 4),
(2, 1, '2026-06-28', '20:34:00', '03:30:00', 6.93, 2),
(3, 2, '2026-06-30', '14:27:00', '08:27:00', 18.00, 2),
(4, 1, '2026-07-01', '17:08:00', '23:08:00', 6.00, 2),
(5, 1, '2026-07-03', '06:15:00', '16:20:00', 10.08, 1),
(6, 1, '2026-07-07', '12:00:00', '22:13:00', 10.22, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas_usuario`
--

CREATE TABLE `temas_usuario` (
  `id_tema` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_tema` varchar(50) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `brillo` int(11) DEFAULT NULL,
  `sonido` varchar(50) DEFAULT NULL,
  `volumen` int(11) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `foto` varchar(255) DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `fecha_nacimiento`, `email`, `password`, `fecha_registro`, `foto`) VALUES
(1, 'Sofía', 'Mojica', '2026-06-28', 'sofiatika76@gmail.com', '$2y$10$sc5jrVvq8PciTh2Bf.YYwecl42zk/brvs3SCfdyYyWJj0uh0/JORW', '2026-06-28 22:45:17', 'avatar.png'),
(2, 'gabriel', 'zacarias', '2010-04-27', 'gabzac@gmail.com', '$2y$10$GXqyfc3xNOZtzKnSiMUfZuNTIdO5H3fyxP17NrmXz.G8pDhPEeZoC', '2026-06-30 11:03:19', 'avatar.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_encuestas_usuarios` (`id_usuario`);

--
-- Indices de la tabla `registros_sueno`
--
ALTER TABLE `registros_sueno`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indices de la tabla `temas_usuario`
--
ALTER TABLE `temas_usuario`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registros_sueno`
--
ALTER TABLE `registros_sueno`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `temas_usuario`
--
ALTER TABLE `temas_usuario`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD CONSTRAINT `fk_encuestas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registros_sueno`
--
ALTER TABLE `registros_sueno`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `temas_usuario`
--
ALTER TABLE `temas_usuario`
  ADD CONSTRAINT `temas_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
