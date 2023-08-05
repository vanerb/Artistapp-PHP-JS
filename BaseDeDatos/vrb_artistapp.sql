-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2023 a las 16:22:25
-- Versión del servidor: 8.0.33-0ubuntu0.20.04.2
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vrb_artistapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos`
--

CREATE TABLE `avisos` (
  `id` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `aviso` varchar(255) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `id_usuario` int NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `avisos`
--

INSERT INTO `avisos` (`id`, `titulo`, `aviso`, `fecha_publicacion`, `id_usuario`, `hora`) VALUES
(77, '¡¡IMPORTANTE!!!', 'Estaré en la japan weekend de Valencia stand 330', '2023-05-21', 13, '00:51:20'),
(83, 'Aviso importante sobre la japan weekend', 'Voy a estar en la japan weekend de valencia stand 219', '2023-05-27', 77, '11:42:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Anime'),
(2, 'Manga'),
(3, 'Cosplay'),
(4, 'Cartoon'),
(6, 'Realismo'),
(23, 'Yuri'),
(24, 'Yaoi'),
(26, 'Diseños 3D'),
(29, 'Comic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cesta`
--

CREATE TABLE `cesta` (
  `id` int NOT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cesta_producto`
--

CREATE TABLE `cesta_producto` (
  `id` int NOT NULL,
  `id_cesta` int NOT NULL,
  `id_producto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedido`
--

CREATE TABLE `detalles_pedido` (
  `id` int NOT NULL,
  `id_pedido` int NOT NULL,
  `id_producto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `detalles_pedido`
--

INSERT INTO `detalles_pedido` (`id`, `id_pedido`, `id_producto`) VALUES
(286, 180, 335),
(295, 183, 335),
(300, 184, 333),
(301, 185, 333),
(302, 186, 357),
(304, 187, 332),
(305, 187, 333),
(306, 188, 333),
(308, 189, 336);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ubicacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_usuario` int NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `ubicacion`, `link`, `fecha_inicio`, `fecha_fin`, `id_usuario`, `imagen`) VALUES
(119, 'Japan weekend Valencia', 'Feria de Valencia (Valencia)', 'https://www.japanweekend.com/valencia/', '2023-11-18', '2023-11-19', 13, 'imgevento/94b30312664f1ef70d956a0fb244aace.png'),
(120, 'Salón del comic Valencia', 'Feria de exposiciones (Valencia)', 'https://www.saloncomicvalencia.com', '2024-03-01', '2024-03-03', 13, 'imgevento/aa54573b4430b47078c75716a55cfe83.png'),
(121, 'Mangetsu Puerto de Sagunto', 'Casal Jove (Puerto de Sagunto)', 'https://www.mangetsu.es', '2024-02-03', '2024-02-04', 13, 'imgevento/c5be3b319a0a59ccc829aebac02c9555.png'),
(136, 'MundoFreak X', 'Pabellón Municipal Luis Vilar (Manises)', 'https://www.eventbrite.es/e/entradas-mundofreak-x-otakus-de-la-noche-537958236567', '2023-05-27', '2023-05-29', 69, 'imgevento/f5f329f0ccfc148a8784cff1815c5db3.jpg'),
(148, 'Nippon GO!', 'Nau Jove, Silla', 'https://nippongo.es/valencia2022/', '2023-09-16', '2023-09-17', 13, 'imgevento/60cfe467fc696f62d6adfe7a9faa44a2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_usuariopin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id`, `id_usuario`, `id_usuariopin`) VALUES
(32, 67, 13),
(33, 67, 69),
(39, 13, 44),
(40, 69, 13),
(41, 69, 44),
(43, 13, 77),
(44, 2, 13),
(45, 2, 44),
(48, 44, 13),
(50, 80, 44),
(51, 80, 13),
(52, 13, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `id` int NOT NULL,
  `id_usuario` int NOT NULL,
  `informe` varchar(255) NOT NULL,
  `id_usuarioreferenciado` int NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`id`, `id_usuario`, `informe`, `id_usuarioreferenciado`, `estado`) VALUES
(98, 44, 'Ha robado contenido', 13, 'resuelta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_evento`
--

CREATE TABLE `listado_evento` (
  `id` int NOT NULL,
  `id_evento` int NOT NULL,
  `id_usuario` int NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `listado_evento`
--

INSERT INTO `listado_evento` (`id`, `id_evento`, `id_usuario`, `estado`) VALUES
(265, 120, 13, 'aceptado'),
(267, 119, 13, 'aceptado'),
(281, 136, 2, 'aceptado'),
(283, 119, 44, 'aceptado'),
(284, 121, 44, 'aceptado'),
(285, 148, 2, 'pendiente'),
(286, 121, 2, 'pendiente'),
(287, 120, 2, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megusta`
--

CREATE TABLE `megusta` (
  `id` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_publicacion` int NOT NULL,
  `megusta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `megusta`
--

INSERT INTO `megusta` (`id`, `id_usuario`, `id_publicacion`, `megusta`) VALUES
(81, 13, 109, 1),
(82, 44, 109, 1),
(83, 13, 107, 0),
(84, 44, 113, 1),
(85, 13, 110, 1),
(86, 13, 113, 1),
(87, 13, 108, 1),
(88, 69, 109, 0),
(89, 13, 126, 1),
(90, 2, 110, 1),
(91, 44, 110, 1),
(93, 44, 107, 1),
(94, 44, 129, 1),
(95, 44, 126, 1),
(96, 67, 110, 1),
(97, 80, 109, 1),
(98, 2, 109, 1),
(99, 13, 136, 1),
(100, 2, 135, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int NOT NULL,
  `id_usuario` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `pago` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_usuario`, `nombre`, `estado`, `direccion`, `telefono`, `pago`) VALUES
(180, 13, 'Paula', 'preparando', 'C/ invent 3 9', '123456789', 34),
(183, 13, 'Vanesa', 'enviado', 'C/ invent 3 9', '123456789', 72),
(184, 77, 'Rosa Melano', 'enviado', 'hahafd', '123456789', 34),
(185, 44, 'araki weekend', 'entregado', 'hahafd', '785475747', 8),
(186, 44, 'Rosa Melano', 'enviado', 'hahafd', '785475747', 6),
(187, 2, 'Vanesa Ribera', 'entregado', 'C/ invent 3 9', '123456789', 34),
(188, 80, 'Jose', 'preparando', 'Cervantes, 3', '565665356', 32),
(189, 13, 'Vanesa', 'preparando', 'C/ invent 3 9', '123456789', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_tipo` int NOT NULL,
  `id_usuario` int NOT NULL,
  `archivos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `imagen`, `id_tipo`, `id_usuario`, `archivos`) VALUES
(332, 'Dibujo Diego Brando', 'Dibujo hecho a mano de Diego Brando anime jojos bizarre adventure', '10.00', 5, 'img/283b139a336ca84c0c4227309bdde29a.jpg', 1, 13, 'Sin archivos'),
(333, 'Dibujo Johnny y Gyro', 'Dibujo de los personajes Jhonny y Gyro (Jojos bizarre adventure) digital disponible solo para descarga digital', '8.00', 996, 'img/1a98c3bf7b45ff3147d192d0aa0b4ffc.png', 2, 44, 'archivos/1a98c3bf7b45ff3147d192d0aa0b4ffc.png'),
(334, 'Print Desafio Champions', 'Dibujo tamaño A3 de Desafio Champions Sendokai', '12.00', 1000, 'img/9a56edfd750b9edf420884ce6cd46a15.png', 1, 13, 'Sin archivos'),
(335, 'Print Remember Me', 'Print de los personajes del juego Remember Me hecho por Indark Games disponible para descargar', '6.00', 998, 'img/0f765b9ffa14fb0f5171a48d618d180a.png', 2, 69, 'archivos/0f765b9ffa14fb0f5171a48d618d180a.png'),
(336, 'Jhonny y Gyro hecho a mano', 'Dibujo de Jhonny y Gyro hecho a mano tamaño A4', '20.00', 0, 'img/a0695c25349c47f7805ab2b3818557de.jpeg', 1, 13, 'Sin archivos'),
(337, 'Dibujo de Once-ler', 'Dibujo original hecho a mano tamaño estandar A4 unico', '12.00', 1, 'img/59dd47d0a2fed4d79353d101542af930.jpeg', 1, 13, 'Sin archivos'),
(356, 'Poster A3 Beyond The Dark', 'Poster tamaño A3 físico del juego Beyond the dark', '3.00', 100, 'img/c3a33fa124542949a15e8376347bcc2e.jpeg', 1, 13, 'Sin archivos'),
(357, 'Personaje original en digital', 'Personaje original en digital nose', '6.00', 999, 'img/b0b7eb4ec05d351c74b4d2a43110e43b.png', 2, 44, 'archivos/b0b7eb4ec05d351c74b4d2a43110e43b.png'),
(384, 'Dibujo hecho a boli BIC', 'Dibujo único hecho a boli BIC 1 única unidad', '10.00', 1, 'img/fa95c94b587b853c1c5a72a2e154248d.jpeg', 1, 44, 'Sin archivos'),
(385, 'Dibujo personajes originales', 'Dibujo en digital de personajes originales ', '10.00', 1000, 'img/2f3ec9247a5f0815bb781ecb4d4eaa5a.jpeg', 2, 44, 'archivos/2f3ec9247a5f0815bb781ecb4d4eaa5a.jpeg'),
(386, 'Personaje original digital', 'Ilustración personaje original disponible para descarga en digital', '6.00', 1000, 'img/1e1d89ae9a112babdca89c9d8d6dcc60.jpeg', 2, 2, 'archivos/1e1d89ae9a112babdca89c9d8d6dcc60.jpeg'),
(387, 'Dibujo unico', 'Dibujo único personaje comic', '10.00', 10, 'img/563e7dc8a52dc8819c1645480ace5ea3.jpeg', 1, 44, 'Sin archivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `id_categoria` int NOT NULL,
  `id_usuario` int NOT NULL,
  `megusta` int NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `tipo`, `id_categoria`, `id_usuario`, `megusta`, `imagen`) VALUES
(107, 'Lon y Zak', 'Boceto hecho a lapiz de desafio champions', 'public', 4, 77, 5, 'publicaciones/124500c9ef2d3d13f1d05146ea31190e.jpeg'),
(108, 'Remember Me', 'Dibujo de Remember Me hecho durante la japan weekend de Valencia', 'public', 2, 44, 1, 'publicaciones/5875208657ffa1732ffdf0097c2bdb65.jpeg'),
(109, 'Dibujo generado por IA', 'Dibujo hecho por una IA para hacer pruebas', 'public', 2, 13, 5, 'publicaciones/7a2be83ad37506fb35370adc2f050c08.jpg'),
(110, 'Dibujo Paul Standley KISS', 'Dibujo retrato de Paul Standley vocalista de KISS', 'public', 1, 44, 4, 'publicaciones/d8a0ef2956a0b10b6eb15018e58823ec.jpeg'),
(111, 'Bocetos comic Infernus', 'Hice algunos bocetos para mi comic Infernus', 'public', 29, 13, 0, 'publicaciones/912d21a8a6567e5600be0f433d060f87.jpeg'),
(113, 'Jensen hecho a lápiz', 'Dibujo hecho a lápiz de Los Cazadores', 'public', 29, 44, 2, 'publicaciones/87dda27588b0e4289b4abd59d56de357.jpeg'),
(126, 'Lon:(', 'MyLover', 'public', 29, 77, 2, 'publicaciones/54fbe75e441d19a797338cf25c852ea2.jpg'),
(129, 'Boceto Dio Brando', 'Boceto a lapiz del personaje Dio Brando', 'public', 2, 44, 1, 'publicaciones/5a2dc6e843de47f863423cb6eaa44664.jpeg'),
(134, 'Dio Brando', 'Dibujo al estilo anime Dio brando', 'public', 1, 44, 0, 'publicaciones/11b9d8b3a4815e3a3e234c5481465e1a.png'),
(135, 'Ronnie James Dio fan art', 'Fan art de ronnie james dio vocalista de DIO, Black Sabbath y Rainbow', 'public', 6, 44, 1, 'publicaciones/aa9184da79e00a386b996a1b4c013393.jpg'),
(136, 'Fan Art de Yakuza 0', 'Fan art de yakuza 0 disponible en nuestro evento de la artista pausartly que estar  en el puesto 311', 'public', 6, 13, 1, 'publicaciones/dc78e4c5dfef98031a54a47d0a6e9569.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `nombre`) VALUES
(1, 'Físico'),
(2, 'Digital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(3, 'Organizador Eventos'),
(5, 'Artista'),
(7, 'Visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `id_tipo` int NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `biografia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `usuario`, `correo`, `contrasena`, `id_tipo`, `imagen`, `biografia`) VALUES
(2, 'Administrador', 'Administrador', 'administrador', 'administrador1@gmail.com', 'ca2b46b4960815fa27f334a13299b552', 1, 'usuarios/4a66c8b206a0ee894d0fd5befade9354.jpg', 'Cuenta de administrador'),
(13, 'Vanesa', 'Ribera Bautista', 'vanerb', 'vribera15@gmail.com', 'ca2b46b4960815fa27f334a13299b552', 3, 'usuarios/f9a15cb62ac50fa9be779804d72993d6.png', 'ABCDEFG'),
(44, 'Paula', 'Ribera Bautista', 'pausartly', 'pausartly@gmail.com', 'ca2b46b4960815fa27f334a13299b552', 5, 'usuarios/183c856d3b5ee50e87a88c583eb3e9df.jpg', 'Aún no tiene'),
(67, 'visitante', 'visitante', 'visitante', 'visitante@gmail.com', 'ca2b46b4960815fa27f334a13299b552', 7, 'usuarios/4a66c8b206a0ee894d0fd5befade9354.jpg', 'Aun no tiene'),
(69, 'Usuario2', 'UsuarioNuevo', 'Larry Capija', 'larrycapija2@gmail.com', 'ca2b46b4960815fa27f334a13299b552', 3, 'media/no-user.png', 'Aun no tiene'),
(76, 'visitante2', 'visitante2', 'visitante2', 'vanesa.ribera15@gmail.com', '115065ceab44c099263f7d0cc9e68313', 7, 'media/no-user.png', 'Aun no tiene'),
(77, 'Rosa Melano', 'uwu', 'Rosa Melano', 'ja@gmail.com', 'ce5e4259e0129bb813d24eaddef0439d', 5, 'usuarios/720bd4b872090d2b794112497b22a6bf.jpg', 'ARAKI LOVER'),
(78, 'usuario3', 'usuario3', 'Elsa Capuntas', 'elsacapuntas@gmail.com', 'ca2b46b4960815fa27f334a13299b552', 5, 'media/no-user.png', 'Aún no tiene'),
(80, 'Jose', 'Socuéllamos', 'jose', 'jose@solvam.es', '5fab03e4586f920f74966e725487ff91', 7, 'usuarios/cca0c207edb7aadea626a84bea369aff.png', 'Trabajo en Solvam');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cesta`
--
ALTER TABLE `cesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `cesta_producto`
--
ALTER TABLE `cesta_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cesta` (`id_cesta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuariopin` (`id_usuariopin`);

--
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuarioreferenciado` (`id_usuarioreferenciado`);

--
-- Indices de la tabla `listado_evento`
--
ALTER TABLE `listado_evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `megusta`
--
ALTER TABLE `megusta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_publicacion` (`id_publicacion`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avisos`
--
ALTER TABLE `avisos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `cesta`
--
ALTER TABLE `cesta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT de la tabla `cesta_producto`
--
ALTER TABLE `cesta_producto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `listado_evento`
--
ALTER TABLE `listado_evento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT de la tabla `megusta`
--
ALTER TABLE `megusta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avisos`
--
ALTER TABLE `avisos`
  ADD CONSTRAINT `avisos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `cesta`
--
ALTER TABLE `cesta`
  ADD CONSTRAINT `cesta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `cesta_producto`
--
ALTER TABLE `cesta_producto`
  ADD CONSTRAINT `cesta_producto_ibfk_1` FOREIGN KEY (`id_cesta`) REFERENCES `cesta` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cesta_producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD CONSTRAINT `detalles_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `detalles_pedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_usuariopin`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `informes`
--
ALTER TABLE `informes`
  ADD CONSTRAINT `informes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `informes_ibfk_2` FOREIGN KEY (`id_usuarioreferenciado`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `listado_evento`
--
ALTER TABLE `listado_evento`
  ADD CONSTRAINT `listado_evento_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `listado_evento_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `megusta`
--
ALTER TABLE `megusta`
  ADD CONSTRAINT `megusta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `megusta_ibfk_2` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_producto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
