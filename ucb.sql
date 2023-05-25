-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2023 a las 22:33:27
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ucb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beers`
--

CREATE TABLE `beers` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estilo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_fabric` date NOT NULL,
  `fecha_distrib` varchar(255) DEFAULT NULL,
  `consumo_pref` varchar(255) DEFAULT NULL,
  `alcohol` float DEFAULT NULL,
  `temp_guardado` int(11) DEFAULT NULL,
  `ibus` int(11) DEFAULT NULL,
  `img_tapon` varchar(255) DEFAULT NULL,
  `img_botella` varchar(255) DEFAULT NULL,
  `detalles` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `beers`
--

INSERT INTO `beers` (`id`, `nombre`, `estilo`, `descripcion`, `fecha_fabric`, `fecha_distrib`, `consumo_pref`, `alcohol`, `temp_guardado`, `ibus`, `img_tapon`, `img_botella`, `detalles`) VALUES
(1, 'Black Ale', 'Negra', 'Rica cerveza negra espumosa', '2023-05-19', '2023-07', '2023-04', 7.3, 5, 8, '', '', NULL),
(2, 'Sweet Stout', 'Stout', 'Nos encontramos ante una ale oscura, de espuma atractiva y fugaz. El aroma nos descubre las primeras notas a cafÃ©, chocolate y avena. En boca predomina el dulzor, dejando paso al sabor de cafÃ©, chocolate, miel y, al fondo se deja ver la malta.\r\nAun reun', '2023-05-19', '2023-06', '2023-05', 5.3, 6, 26, '', '', NULL),
(4, 'IRISH RED ALE', 'Red Irish', 'Estilo tÃ­pico irlandÃ©s, suave, ligera y de sabores sutiles. Destacan por encima las caracteres dulzones de la malta, presentes en forma de caramelo y pan. De apariencia Ã¡mbar-cobrizo y de espuma muy suave y poco persistente. En general cerveza refresca', '2023-04-06', '2023-08', '2023-06', 4.4, 5, 20, '', '', 'Laravel_Changeorg_part2.pdf'),
(5, 'Bock Tradicional', 'Bock', 'Estilo centroeuropeo, de tipo Lager, con fuerte carÃ¡cter dulce maltoso. (Bock se traduce del alemÃ¡n como Â«Macho cabrÃ­oÂ». Cerveza cristalina, color cobre oscuro y reflejos rubÃ­es, refrescante pero con cuerpo y compleja en sabores tostados, caramelo y', '2023-05-26', '0000-00-00', '2023-07', 6.6, 4, 23, NULL, NULL, NULL),
(6, 'MILKSHAKE MELÃ“N', 'Milckshake', 'India Pale Ale de estilo americano moderno pero con lÃºpulos tambiÃ©n europeos, turbia con gran cantidad de sedimento de lÃºpulo y lactosa sin filtrar, cremosa, altamente amarga en aroma y sabor con un toque dulzÃ³n final, notas a cÃ­tricos y melÃ³n. Serv', '2023-05-19', '0000-00-00', '2023-06', 6.9, 4, 55, 'azul.jpg', 'beer.png', NULL),
(8, 'p', 'p', 'p', '2023-05-19', '0000-00-00', '2023-05', 6, 6, 6, 'azul.jpg', 'beer.png', NULL),
(9, 'prueba', 'pruba', 'img', '2023-05-19', '0000-00-00', '2023-05', 5, 5, 5, 'azul.jpg', 'beer.png', NULL),
(10, 'CZECH PALE LAGER', 'Lager', 'Cerveza de estilo checo pálido, color pajizo y cristalina, con espuma fina y persistente. De cuerpo muy ligero y sutiles aromas florales, herbales y a miel. Predominio de malta en sabores dulces y a grano crudo. Final ligero y refrescante con agradable am', '2023-05-03', '2023-09', '2023-11', 3.9, 4, 24, 'dorada.jpg', '', 'Juan Sanz_info.pdf'),
(11, 'pdf', 'pd', 'ughu', '2023-05-21', '2023-03', '2023-03', 4, 6, 34, '', '', 'Juan Sanz_info.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `id_encargado` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_beer` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `id_user`, `id_beer`, `tipo`, `score`, `comment`, `date`) VALUES
(29, 1, 6, 0, 4, 'fdsa', '2023-05-20'),
(30, 1, 5, 0, 4, 'Muy buena. buen sabor y cuerpo', '2023-05-21'),
(31, 2, 5, 2, 5, 'Genial', '2023-05-21'),
(32, 8, 5, 1, 3, 'Esta bien', '2023-05-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `n_cuenta` varchar(255) DEFAULT NULL,
  `rol` int(11) NOT NULL,
  `encargado` int(11) DEFAULT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_baja` date DEFAULT NULL,
  `pagado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `email`, `password`, `phone`, `n_cuenta`, `rol`, `encargado`, `fecha_alta`, `fecha_baja`, `pagado`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', 666666667, 'ES287528352', 0, 1, '2023-05-16', '0000-00-00', 0),
(2, 'Juan', 'juan.sanz@globant.com', 'juan', 123456789, 'ES2469436346', 2, 1, '2023-05-17', '0000-00-00', 1),
(4, 'Cerezo', 'cer@g.com', '123456', 123456789, 'ES2469436346', 0, 1, '2023-05-18', '0000-00-00', 1),
(5, 'Chava', 'chav@g.com', '123456', 678712434, 'ES2469436346', 0, 1, '2023-05-18', '0000-00-00', 1),
(7, 'eeee', 'eee@e.com', '1234', 123546346, 'ES2469436346', 2, 5, '2023-05-18', '0000-00-00', 0),
(8, 'deliv', 'deliv@gmail.com', '1234', 12464575, 'es4364573', 1, 4, '2023-05-18', '0000-00-00', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_socio` (`id_socio`),
  ADD KEY `fk_encargado` (`id_encargado`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_beer` (`id_beer`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beers`
--
ALTER TABLE `beers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `fk_encargado` FOREIGN KEY (`id_encargado`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_socio` FOREIGN KEY (`id_socio`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_beer` FOREIGN KEY (`id_beer`) REFERENCES `beers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
