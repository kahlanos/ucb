-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2023 a las 14:31:41
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
  `descripcion` varchar(4000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
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
(1, 'Black Ale', 'Negra', 'Rica cerveza negra espumosa', '2023-05-19', '2023-07', '2023-04', 7.3, 5, 8, 'negra.jpg', '', ''),
(2, 'Sweet Stout', 'Stout', 'Nos encontramos ante una ale oscura, de espuma atractiva y fugaz. El aroma nos descubre las primeras notas a cafÃ©, chocolate y avena. En boca predomina el dulzor, dejando paso al sabor de cafÃ©, chocolate, miel y, al fondo se deja ver la malta.\r\nAun reun', '2023-05-19', '2023-06', '2023-05', 5.3, 6, 26, 'verde.jpg', '', ''),
(4, 'IRISH RED ALE', 'Red Irish', 'Estilo tÃ­pico irlandÃ©s, suave, ligera y de sabores sutiles. Destacan por encima las caracteres dulzones de la malta, presentes en forma de caramelo y pan. De apariencia Ã¡mbar-cobrizo y de espuma muy suave y poco persistente. En general cerveza refresca', '2023-04-06', '2023-08', '2023-06', 4.4, 5, 20, 'roja.jpg', '', 'Laravel_Changeorg_part2.pdf'),
(5, 'Bock Tradicional', 'Bock', 'Estilo centroeuropeo, de tipo Lager, con fuerte carÃ¡cter dulce maltoso. (Bock se traduce del alemÃ¡n como Â«Macho cabrÃ­oÂ». Cerveza cristalina, color cobre oscuro y reflejos rubÃ­es, refrescante pero con cuerpo y compleja en sabores tostados, caramelo y', '2023-05-26', '2023-04', '2023-07', 6.6, 4, 23, 'chapa_bigot.jpg', '', ''),
(6, 'MILKSHAKE MELÃ“N', 'Milckshake', 'India Pale Ale de estilo americano moderno pero con lÃºpulos tambiÃ©n europeos, turbia con gran cantidad de sedimento de lÃºpulo y lactosa sin filtrar, cremosa, altamente amarga en aroma y sabor con un toque dulzÃ³n final, notas a cÃ­tricos y melÃ³n. Serv', '2023-05-19', '2023-10', '2023-06', 6.9, 4, 55, 'azul.jpg', 'beer.png', ''),
(8, 'Mandarina IPA', 'IPA', 'Cerveza estilo IPA refrescante con mezcla de lÃºpulos alemanes y americanos. En ella destaca principalmente el amargor con una leve diferencia entre aromas tropicales y florales contra sabores en boca con toques a naranja y cÃ­tricos, puede ademÃ¡s apreciarse un leve retrogusto amaderado. Cuerpo medio-ligero y espuma densa. Recomendamos acompaÃ±arla de snacks picantes o comida especiada mexicana, tailandesa o similares.', '2023-05-19', '2023-01', '2023-05', 6.2, 6, 35, 'lima.jpg', 'beer.png', ''),
(9, 'Pumpkin Ale', 'Malt', 'Hecha con malta y calabaza asada. Estilo de cerveza de temporada, Naranja opaca semidensa, dulce pero no demasiado, aromatizada con canela, jengibre y vainilla, sin acompaÃ±amiento o con picos de pan.', '2023-05-19', '2023-02', '2023-05', 5.5, 5, 22, 'bronce.jpg', 'beer.png', ''),
(10, 'CZECH PALE LAGER', 'Lagerrrr', 'Cerveza de estilo checo pÃ¡lido, color pajizo y cristalina, con espuma fina y persistente. De cuerpo muy ligero y sutiles aromas florales, herbales y a miel. Predominio de malta en sabores dulces y a grano crudo. Final ligero y refrescante con agradable a', '2023-05-03', '2023-09', '2023-11', 3.9, 4, 24, 'dorada.jpg', '', 'Hoja-de-Personaje-WFRP-4.pdf'),
(11, ' MUNICH HELLES', 'Lager', 'Lager alemana limpia y maltosa. Moderado aroma a grano dulce y sutiles notas del lÃºpulo escondidas. Color amarillo pÃ¡lido y claro, junto a una espuma blanca, cremosa y resistente. En boca primero nos sugiere dulzor dejando, al final un recuerdo amargo de lÃºpulo. El final es suave, seco, sin llegar a ser chispeante pero mordaz.', '2023-05-21', '2023-03', '2023-03', 4.7, 6, 17, 'corona.jpg', '', 'Hoja-de-Personaje-WFRP-4.pdf'),
(12, 'JAPONESA – ARROZ', 'Japonesa', 'Cerveza Laguer ligera de arroz, de aspecto amarillo pajizo. Con poco cuerpo (poco aporte calórico) y buena carbonatación se trata de una laguer refrescante al trago y suave en aromas y sabores. Tiene un sabor neutral en el que ni destacan maltas ni lúpulos, pero el lúpulo japonés le aporta un leve aroma floral, siendo un equilibrio muy fino. Servir muy fría y acompañada de cualquier aperitivo.', '2022-07-27', '2022-10', '2022-11', 5, 6, 28, 'amarilla.jpg', '', ''),
(13, 'EXTRA BELGIAN BLONDE', 'Blonde', 'Cerveza Ale dorada de intensidad moderada con complejidad frutal-especiada, predominando el sabor dulce de la malta y un final seco, acompañado de un agradable picor de la carbonatación. El aroma presenta notas terrosas provenientes del lúpulo, aunque en nariz, se aprecian matices de la malta y del alcohol. La espuma será persistente y cremosa, contrastando con el color dorado y cristalino de la cerveza.', '2022-02-27', '2022-04', '2022-05', 6.8, 5, 27, 'blanca.jpg', '', '');

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

--
-- Volcado de datos para la tabla `deliveries`
--

INSERT INTO `deliveries` (`id`, `id_socio`, `id_encargado`, `estado`, `fecha`) VALUES
(13, 1, 1, 0, '2023-04'),
(14, 2, 1, 0, '2023-04'),
(15, 4, 1, 0, '2023-04'),
(16, 5, 1, 0, '2023-04'),
(18, 8, 4, 0, '2023-04'),
(40, 1, 1, 0, '2023-06'),
(41, 2, 1, 0, '2023-06'),
(42, 4, 1, 0, '2023-06'),
(43, 5, 1, 0, '2023-06'),
(59, 2, 1, 0, '2023-07'),
(61, 10, 4, 0, '2023-07'),
(62, 11, 5, 0, '2023-07'),
(63, 2, 1, 1, '2023-05'),
(65, 10, 4, 0, '2023-05'),
(66, 11, 5, 0, '2023-05');

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

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `img`, `date`) VALUES
(1, 'Cata', 'Cata de nuestras cervezas al aire libre con comida', 'foto1.jpg', '2023-06-10'),
(2, 'Visita a las nuevas instalaciones', 'Visita guiada a nuestras nuevas instalaciones. Aprende el proceso de vuestras cervezas favoritas y fiesta depués', '1654213283032.jpg', '2023-06-22');

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
  `comment` varchar(4000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `id_user`, `id_beer`, `tipo`, `score`, `comment`, `date`) VALUES
(30, 1, 5, 0, 4, 'Muy buena. buen sabor y cuerpo. Podía salir mejor con unas semanas más de reposo', '2023-05-21'),
(31, 2, 5, 2, 5, 'Genial', '2023-05-21'),
(32, 8, 5, 1, 3, 'Esta bien', '2023-05-21'),
(33, 2, 9, 2, 2, 'Rara', '2023-05-26'),
(34, 1, 2, 0, 3, 'fasdfsdfsdffdf dsfjidsbbfidfiudifu dif hdfd 0fu`d09u0fudsf9u 0dfud0 zxdfkjgnxzl jkd ', '2023-05-26'),
(36, 1, 10, 0, 4, 'Suave y aromática. Buena espuma', '2023-05-27'),
(37, 10, 1, 2, 3, 'Más porfavor', '2023-05-27'),
(38, 10, 9, 2, 4, 'Buena inovación', '2023-05-28'),
(39, 8, 1, 1, 4, 'Mucha espuma, demasiada', '2023-05-28'),
(40, 1, 1, 0, 5, 'Cojonuda!', '2023-05-28');

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
(1, 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 666666667, 'ES287528352', 0, 1, '2023-05-16', '0000-00-00', 0),
(2, 'Juan', 'juan.sanz@globant.com', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', 670244897, 'ES2469436346', 2, 1, '2023-05-10', '0000-00-00', 1),
(4, 'Cerezo', 'cer@g.com', '6ce3541f144d63b854a97146184498bf4e27ec92', 123456789, 'ES2469436346', 0, 1, '2023-05-18', '0000-00-00', 1),
(5, 'Chava', 'chav@g.com', '37a609a640820e8f957f1db783abe4aa0400cf69', 678712434, 'ES2469436346', 0, 1, '2023-05-18', '0000-00-00', 1),
(8, 'deliv', 'deliv@gmail.com', '5aab870fb7380e6b2dcdfb737ab22e6dfbf11e9c', 12464575, 'es4364573', 1, 4, '2023-05-18', '0000-00-00', 1),
(10, 'Socio', 'socio@socio.com', '1753d010ba77fb6ea8a932da68bc8efece85debd', 123456789, 'ES2469436346', 2, 4, '2023-05-26', '0000-00-00', 0),
(11, 'Ana', 'ana@gmail.com', '72019bbac0b3dac88beac9ddfef0ca808919104f', 123356789, 'ES2466546466', 2, 5, '2023-05-26', '0000-00-00', 1),
(12, 'Encargado', 'encargado@encargado.com', 'b36fff89e3b60ca80e12a16d70289d58f6a50f31', 123456789, 'es23552435', 1, 1, '2023-05-28', '0000-00-00', 1),
(16, 'Jorge', 'jorge@jorge.com', '50d6dd880e0f5f9bc21f00cb342db52c02bb7ffc', 123456789, 'es23552435', 2, 4, '2023-05-29', '0000-00-00', 0),
(17, 'Maria', 'maria@maria.com', '888afb4cd1334b0e982472637398b69129531e15', 987654321, '', 2, 12, '2023-05-18', '0000-00-00', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
