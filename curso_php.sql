-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2021 a las 23:43:13
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curso_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Deportes'),
(4, 'Música'),
(5, 'Turismo'),
(2, 'Videojuegos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `fechaPublicacion` datetime NOT NULL DEFAULT current_timestamp(),
  `autor` varchar(50) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `contenido`, `fechaPublicacion`, `autor`, `idCategoria`) VALUES
(1, 'Los lanzamientos más destacados de agosto: Ghost of Tsushima DC, No More Heroes 3, Hades y más', 'El caluroso mes de agosto llega bien cargado de nuevos lanzamientos muy variados y para todas las plataformas. Los usuarios que posean PS4 y Xbox One aún podrán exprimir al máximo el jugo de sus consolas con algunos videojuegos la mar de destacables. Por su parte, los usuarios de PS5 y Xbox Series X/S, las consolas de nueva generación, podrán nutrir su catálogo con nuevos contenidos destinados a fomentar que el entretenimiento en casa nunca se detenga. Los usuarios de PC y Nintendo Switch tampoco tienen nada que temer, ya que hay varios contenidos que pueden ser de su interés. Este artículo repasa los títulos más destacados que llegarán a las tiendas físicas y digitales el mes que viene.', '2021-07-29 13:59:23', 'Gerard Martí', 2),
(2, 'Fortnite: Llega Bloodsport, el personaje interpretado por Idris Elba en The Suicide Squad', 'Fortnite vuelve a la carga con la colaboración inédita de un personaje de superhéroes. Si hace relativamente poco llegó al popular battle royale la skin de LeBron James por la llegada de Space Jam: Nuevas leyendas, hoy os traemos a Bloodsport, un antihéroe de The Suicide Squad interpretado por el siempre impecable Idris Elba. James Gunn, director de la nueva película inspirada en los personajes de DC Comics, compartió ayer mismo la nueva skin a través de un comunicado oficial desde su Twitter. La nueva skin del personaje pertenece a la Temporada 7 de Fortnite Capítulo 2.', '2021-07-29 14:00:25', 'Gerard Martí', 2),
(3, 'Animal Crossing: New Horizons recibe su actualización 1.11.0', 'Animal Crossing: New Horizons se convirtió en uno de los mayores y mejores refugios para millones de jugadores el año pasado cuando tuvimos que confinarnos en nuestros hogares para intentar frenar la pandemia de la COVID-19 y desde su lanzamiento no ha parado de recibir actualizaciones y eventos para mantener a sus usuarios entretenidos.\r\n\r\nAhora, Nintendo acaba de anunciar que ya podemos descargar su nuevo parche 1.11.0, el cual actualiza los eventos de temporada y ha añadido nuevos objetos veraniegos que podemos comprar en la tienda. Eso sí, la disponibilidad de dichos ítems es por tiempo limitado, así que quizá queráis conseguirlos todos antes de que termine el plazo y perdáis la oportunidad de haceros con ellos hasta el año que viene. Adicionalmente, dicha actualización también trae consigo la corrección de algunos errores, aunque no se ha detallado exactamente qué es lo que han solucionado.', '2021-07-29 14:01:44', 'Carlos Leiva', 2),
(4, 'Un paseo en globo por el espacio: la última, más placentera y barata apuesta turística para viajar al cosmos', 'En octubre de 2014, Alan Eustace, entonces vicepresidente de la compañía Google, saltó al vacío desde un globo espacial a 41.420 metros de altitud batiendo el récord mundial de caída libre. La hazaña fue posible no solo al traje presurizado que llevaba puesto y, por supuesto, al aplomo de Eustace, sino también al equipo que había detrás de ese globo entre los que hoy se encuentran los fundadores de Space Perspectives.\r\n\r\nCapitaneada por la pareja Jane Poynter y Taber MacCallum, esta nueva compañía con sede en Florida ha creado ahora una vela mucho más grande, amén de una experiencia mucho más ambiciosa que une el viaje de lujo con la emoción de explorar el espacio.\r\n\r\nLos viajeros disfrutarán de un viaje de seis horas a bordo de la cápsula espacial Neptune que es impulsada a una velocidad de 20 kilómetros/hora por un gigantesco globo espacial del tamaño de un campo de fútbol. Una vez que la cápsula alcance la altitud máxima de 30.000 metros, permanecerá allí flotando durante dos horas, \"como un cubito de hielo sobre el agua\", para que los viajeros puedan admirar (y compartir) las vistas de 360 grados del planeta Tierra.\r\n\r\nLa experiencia cuesta 125.000 dólares por persona (unos 105.000 euros). Todas las plazas de los primeros cuatro vuelos, previstos para despegar a finales de 2024, están agotadas, aunque la compañía aún no tiene licencia para alcanzar la estratosfera. A la venta están ya los billetes para 2025. ', '2021-07-29 14:04:49', 'MARTA GONZÁLEZ-HONTORIA', 5),
(5, 'Un paseo por El Retiro y otros grandes jardines españoles Patrimonio de la Humanidad', 'España cuenta con cinco jardines históricos y cinco paisajes culturales catalogados como Patrimonio Mundial por la Unesco. Los primeros incluyen las obras de Antoni Gaudí (Parque Güell); La Alhambra, Generalife y Albaicín de Granada (Jardines del Generalife); la catedral, alcázar y Archivo de Indias de Sevilla (Reales Alcázares); el Palmeral de Elche; y los Jardines del Palacio Real de Aranjuez, que se considera también paisaje cultural.\r\n\r\nA esta categoría se acaba de incorporar el Paisaje de la Luz, que incluye el Paseo del Prado y El Retiro. La lista de paisajes culturales de nuestra geografía quedaría completa con Monte Perdido en Pirineos, la sierra de Tramuntana de Mallorca y el yacimiento de Risco Caído y las Montañas Sagradas de Gran Canaria\r\n\r\nSi quiere conocer todos los secretos que esconden algunos de estos parajes, aquí tiene cómo hacerlo. Estas visitas guiadas cumplen con todas las medidas de seguridad: grupo pequeños, distancia de seguridad de un metro entre clientes, audioguías desinfectadas y uso de mascarilla obligatorio. Pero además, estará al aire libre, disfrutando de algunos de los vergeles más cuidados de nuestro país.', '2021-07-29 14:05:44', 'EL MUNDO VIAJES', 5),
(6, 'Muere a los 72 años Dusty Hill, cofundador y bajista de ZZ Top', 'Dusty Hill, cofundador y bajista de la banda estadounidense de rock ZZ Top, murió este miércoles a los 72 años en Houston (EEUU).\r\n\r\nBilly Gibbons y Frank Beard, sus compañeros de aventuras musicales en ZZ Top durante más de medio siglo, anunciaron el fallecimiento de Hill en su página de Facebook. \"Estamos tristes por la noticia de que nuestro \'compadre\' [en español], Dusty Hill, ha fallecido en su casa mientras dormía\", escribieron.\r\n\r\n\"Nosotros, junto a las legiones de fans de ZZ Top en todo el mundo, echaremos de menos tu firme presencia, tu naturaleza buena y tu duradero compromiso para proporcionar ese monumental fondo para el Top (...). Te echaremos mucho de menos, \'amigo\' [en español]\", añadieron.\r\n\r\nEl pasado 23 de julio, ZZ Top reveló que Hill se perdería algunos conciertos debido a unos problemas en la cadera y detalló que el bajista en su lugar sería Elwood Francis.\r\n\r\nPor ahora, no se sabe la causa de la muerte de Hill y tampoco se conoce si está relacionada con esas molestias en la cadera.\r\n\r\nCon sus inconfundibles y larguísimas barbas como seña de identidad a lo largo del tiempo, la banda ZZ Top comenzó en 1970 su andadura con Billy Gibbons a la guitarra, Dusty Hill al bajo y Frank Beard en la batería.\r\n\r\nEn su primera década como formación se dedicaron al blues y el rock con discos como Tres Hombres (1973), en donde estaba la canción La Grange.\r\n\r\nPero su gran momento les llegó en los años 80 cuando actualizaron su propuesta, dejaron parcialmente de lado el sonido de raíz e incorporaron ciertos toques modernos y electrónicos que les llevaron a la cima con discos como Eliminator (1983), que incluía los exitosos temas Gimme All Your Lovin\', Sharp Dressed Man y Legs.\r\n\r\nLos álbumes Afterburner (1985) y Recycler (1990) confirmaron a ZZ Top como una de las bandas más populares del rock estadounidense en aquellos años.\r\n\r\nEl grupo, muy reconocido asimismo por su calidad y energía en directo, también ha demostrado una admirable longevidad y estabilidad, ya que los tres miembros fundadores continuaron tocando juntos y sacando discos durante más de 50 años.\r\n\r\nZZ Top entró en el Salón de la Fama del Rock and Roll en 2004.', '2021-07-29 14:08:00', 'EFE', 4),
(7, 'España se toma una revancha con sabor a cuartos', 'Había ganas de este duelo en el vestuario español, esas noches marcadas a fuego. Son demasiadas cuentas pendientes durante los últimos años, esa querida enemiga Serbia, la que apartó a España cruelmente de las semifinales del reciente Europeo. La selección aseguró en Saitama los cuartos de final a lo grande, con la venganza ante la campeona de Europa en una enorme remontada en la segunda mitad. Y con un nombre propio, el de Maite Cazorla, la dueña del porvenir.\r\n\r\nEn Valencia, aquel día, partido dramático, un tiro libre separó a España de los cuartos, de defender su oro mundial. Cristina Ouviña, tan famosa estos días por su polémico vídeo en el que desveló la fiesta eslovena, acertó el primero para amarrar la prórroga, pero falló el que daba el triunfo. Y en el tiempo extra no hubo forma, como tampoco después contra Rusia, donde la selección femenina, ganadora de siete medallas de carrerilla, se quedó incluso sin billete para el siguiente Mundial.\r\n\r\nEso no se podía olvidar en el encuentro 150 de Lucas Mondelo al frente de la selección, tantos éxitos. Y eso que España amaneció bajo el dominio serbio, una primera parte con el protagonismo de Jelena Brooks (14 puntos), al que intentaban contestar Alba Torrens (11) y Ndour (13).\r\n\r\nLas cosas se complicaron a la vuelta de vestuarios, con el tirón de las de Maljkovic (43-52). Pero en ese abismo apareció como un rayo de esperanza una de esas jugadoras que van a tomar el relevo generacional. Cazorla, con casi tres triples consecutivos (acabó con 17 puntos), lanzó a España, que ya no paró hasta el mismo final. En un abrir y cerrar de ojos, las de Mondelo habían finiquitado el partido, con un último cuarto para enmarcar (26-12).\r\n\r\nCon una ventaja (+15) que las hace soñar fuerte con la primera plaza de grupo, porque Serbia había derrotado a Canadá en la primera jornada. Las canadienses serán el próximo rival, el domingo. Podría valer incluso una derrota por poco margen para ser cabeza de serie en cuartos y evitar así a los cocos: EEUU y Australia.', '2021-07-29 14:09:25', 'LUCAS SÁEZ-BRAVO', 1),
(8, 'Carreño luchará por las medallas tras derrotar a Medvedev en cuartos', 'Carreño luchará por las medallas tras derrotar a Medvedev en cuartos\r\n\r\nEl tenista español Pablo Carreño Busta se ha clasificado para las semifinales del torneo olímpico de los Juegos de Tokyo 2020, que se disputa sobre pista rápida en el Parque de Tenis Ariake, y luchará por las medallas, tras derrotar al ruso Daniil Medvedev, segundo cabeza de serie, en dos sets, por 6-2 y 7-6 (5). Pablo Carreño, de 30 años y reciente ganador del torneo en tierra batida de Hamburgo, impuso su juego sólido desde el fondo de la pista ante Medvedev, número dos del mundo, y ...\r\n\r\nLeer más: https://www.europapress.es/deportes/olimpiadas-00169/noticia-carreno-luchara-medallas-derrotar-medvedev-cuartos-20210729124520.html\r\n\r\n(c) 2021 Europa Press. Está expresamente prohibida la redistribución y la redifusión de este contenido sin su previo y expreso consentimiento.', '2021-07-29 14:13:25', 'europapress', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(18) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `conexion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `clave`, `conexion`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1628113289);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
