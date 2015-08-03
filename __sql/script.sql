-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-08-2015 a las 13:41:38
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `db_milugar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Calificacion_rel_empresa`
--

CREATE TABLE IF NOT EXISTS `Calificacion_rel_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) NOT NULL,
  `idusuariofb` int(11) NOT NULL,
  `calificacion` tinyint(4) NOT NULL DEFAULT '1',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idempresa` (`idempresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `Calificacion_rel_empresa`
--

INSERT INTO `Calificacion_rel_empresa` (`id`, `idempresa`, `idusuariofb`, `calificacion`, `estado`, `fecha`) VALUES
(1, 18, 1, -1, 1, '2015-07-29 01:16:18'),
(2, 18, 2, -1, 1, '2015-07-28 01:13:13'),
(3, 18, 3, -1, 0, '2015-07-28 01:16:27'),
(4, 18, 1, 1, 1, '2015-07-28 01:38:23'),
(5, 18, 1, 1, 1, '2015-07-28 01:38:26'),
(6, 18, 1, -1, 1, '2015-07-28 01:38:35'),
(7, 18, 1, 1, 1, '2015-07-28 01:40:39'),
(8, 18, 1, 1, 1, '2015-07-28 01:40:40'),
(9, 18, 1, 1, 1, '2015-07-28 01:40:41'),
(10, 18, 1, -1, 1, '2015-07-28 01:40:42'),
(11, 18, 1, -1, 1, '2015-07-28 01:40:42'),
(12, 18, 1, -1, 1, '2015-07-28 01:40:43'),
(13, 19, 1, 1, 1, '2015-07-28 01:41:14'),
(14, 19, 1, 1, 1, '2015-07-28 01:41:16'),
(15, 18, 1, -1, 1, '2015-07-28 01:41:51'),
(16, 18, 1, 1, 1, '2015-07-28 01:41:52'),
(17, 18, 1, 1, 1, '2015-07-28 01:41:53'),
(18, 18, 1, 1, 1, '2015-07-28 01:41:53'),
(19, 15, 1, 1, 1, '2015-07-28 01:41:56'),
(20, 15, 1, -1, 1, '2015-07-28 01:41:57'),
(21, 15, 1, -1, 1, '2015-07-28 01:41:57'),
(22, 15, 1, 1, 1, '2015-07-22 01:41:58'),
(23, 18, 10, 1, 1, '2015-07-28 02:26:36'),
(24, 18, 10, -1, 1, '2015-07-28 02:26:37'),
(25, 18, 10, 1, 1, '2015-07-28 02:26:40'),
(26, 18, 10, 1, 1, '2015-07-28 02:27:34'),
(27, 18, 10, -1, 1, '2015-07-28 03:58:57'),
(28, 18, 10, -1, 1, '2015-07-28 04:00:39'),
(29, 18, 10, -1, 1, '2015-07-28 04:00:42'),
(30, 18, 18, 1, 1, '2015-07-28 04:01:07'),
(31, 18, 18, 1, 1, '2015-07-28 04:01:10'),
(32, 18, 18, -1, 1, '2015-07-28 04:01:13'),
(33, 17, 18, 1, 1, '2015-07-28 04:04:33'),
(34, 17, 18, -1, 1, '2015-07-28 04:04:35'),
(35, 17, 18, 1, 1, '2015-07-28 04:04:36'),
(36, 21, 18, 1, 1, '2015-07-28 04:05:37'),
(37, 21, 18, 1, 1, '2015-07-28 04:05:38'),
(38, 4, 2, 1, 1, '2015-07-28 04:22:16'),
(39, 2, 18, 1, 1, '2015-08-02 01:40:42'),
(40, 2, 18, -1, 1, '2015-08-02 01:40:44'),
(41, 13, 18, 1, 1, '2015-08-02 03:17:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empresa`
--

CREATE TABLE IF NOT EXISTS `Empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_referente` varchar(250) DEFAULT NULL,
  `dni_referente` varchar(50) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `razon_social` varchar(250) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `idzona` int(11) DEFAULT NULL,
  `idrubro` int(11) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `lat_long` varchar(250) DEFAULT NULL,
  `descripcion` text,
  `web` varchar(255) NOT NULL,
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `es_premium` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idzona` (`idzona`),
  KEY `idzona_2` (`idzona`),
  KEY `idrubro` (`idrubro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `Empresa`
--

INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `web`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES
(1, 'Pablo Lopez', '345678901', 'Magdalenas Party', 'Magdalenas Party', 'imagen797_logo-small.png', 'magdalenasparty@correoe.com', '9c220c744d0bd9f038f655d13aec14b3', '4833-9127', 2, 1, 'Thames 1795, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.586784, -58.42917560000001', 'Magdalenas Party', '', 1, 1, 1, '2015-07-16 04:43:17'),
(2, 'Julián Domínguez', '321098765', 'De olivas i lustres', 'De olivas i lustres', 'imagen350_logo3.png', 'deolivasilustres@correoe.com', '9362858ac1bf030bf0df8d274a34a403', '4867-3388', 2, 1, 'Gorriti 3972, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5953987, -58.420903299999964', 'De olivas i lustres, Restaurante de tapas mediterraneas, italiana, cocina criolla Argentina', '', 1, 1, 1, '2015-07-16 05:25:50'),
(3, 'Julián Perri', '3344556677', 'Sigue al conejo blanco', 'Sigue al conejo blanco', 'imagen748_logosigueconejoblanco.jpg', 'siguealconejoblanco@gmail.com', 'a9f7a8ab36276e707a793ea99f78d12f', '', 2, 2, 'Godoy Cruz 1585, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.588233, -58.435086100000035', 'Cerveza Artesanal Tirada / Tragos / Picadas / Canastitas / Pizzas / Pantalla Gigante', '', 1, 0, 0, '2015-07-16 23:19:09'),
(4, 'Fernando Moro', '33443344', 'Gibson', 'Gibson', 'imagen355_photo_10514_1.jpg', 'gibsonbar@correoe.com', '53221393cfec6193188d40e363ba3144', '5529-9222', 2, 2, 'Avenida Raúl Scalabrini Ortiz 1398, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5921872, -58.42700179999997', 'Whiskys y maltas • Coctelería simple • Coctelería artesanal\r\nMa a J de 9:00 a 1:00.\r\nV a Sábado de 9:00 al cierre', '', 1, 1, 1, '2015-07-16 23:29:15'),
(5, 'Roberto Gutiérrez', '33223322', 'Franks', 'Franks', 'imagen887_logoNew.png', 'franksbar@correoe.com', 'df72d713f01b8168ae7018c5672fb5d5', '', 2, 2, 'Arévalo 1445, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5832625, -58.44302759999999', 'Whiskys y maltas • Coctelería artesanal • Bodega de vinos\r\nMiércoles a Sábado de 21:00 al cierre.', '', 1, 0, 0, '2015-07-16 23:38:07'),
(6, 'Martín Hernández', '33225544', 'Tijuana Cocina Mex & Bar', 'Tijuana Cocina Mex & Bar', 'imagen113_179569_337751886331910_932518897_n.jpg', 'tijuanacocinamexybar@correoe.com', '177a03aff993d204d2bc736efa87808e', '2058-8905', 1, 1, 'Guatemala 4540, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5875288, -58.42300449999999', 'Chef: Juan Manuel Diego\r\n\r\nEspecialidades\r\nPlatos: Tijuana T-Bone ,alitas BBQ, burritos de jamón ahumado, fajitas mixta especial de entraña y chorizo. Postres: Cheese cake de maracuya con ganache de chocolate blanco y maracuya El Patrón.', '', 1, 0, 0, '2015-07-16 23:58:33'),
(7, 'Ricardo López', '31316464', 'Club 31 Bar & Resto (Buenos Aires Grand Hotel)', 'Club 31 Bar & Resto (Buenos Aires Grand Hotel)', 'imagen928_10676239_1497599707181906_5168224305203092473_n.jpg', 'club31baryresto@correoe.com', 'e41210cc3a3dad900fac51f475bb2116', '4129-9800', 1, 1, 'Avenida General las Heras 1745, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5922183, -58.391139899999985', 'Chef\r\nLuciano Grimaldi\r\n\r\nEspecialidades\r\nRaviolones de cordero con hongos frescos de bariloche, jugo de cocción con tomillo y calabaza confit. Lingote de 2 chocolates, macaron y su helado', '', 0, 0, 1, '2015-07-17 02:08:48'),
(8, 'Agustina Tiscornia', '33557799', 'Tiscornia', 'Tiscornia', 'imagen382_10599279_868133699863351_3293696167281133200_n.jpg', 'tiscorniarestaurante@correoe.com.ar', '552780cea261a41cbc2667d8d1221b20', '4822-6694', 1, 1, 'Antonio Beruti 2751, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5913878, -58.4038448', 'Tiscornia: Restaurante de buena cocina\r\nTe esperamos a pasar un buen momento, disfrutando diversos sabores en un ambiente acogedor. Menú de finger food frío, caliente, plato principal y degustación de postres. Bebida sin alcohol incluida.\r\n\r\nVinos y tragos\r\nOfrecemos nuestra carta de vinos y también te brindamos la posibilidad de que traigas tu propio vino. Te esperamos!\r\n\r\nEventos y Catering\r\nOrganizá eventos en Tiscornia, capacidad máxima 60 personas. Servicio de catering. Consultanos por las diferentes propuestas!', '', 1, 0, 1, '2015-07-17 02:16:22'),
(9, 'Fernando Hernández', '36925847', 'The Temple Bar', 'The Temple Bar', 'imagen135_logo.png', 'templebar@correoe.com.ar', '4fd97a99cb13b7d2213efcd3ac53f999', '4805-0733', 1, 2, 'Avenida General las Heras 1822, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5916302, -58.39209269999998', 'Cerveza tirada • Cerveza artesanal • Whiskys y maltas • Coctelería simple • Coctelería artesanal • Bodega de vinos\r\n\r\nL a V de 10:00 al cierre.\r\nSábado de 21:00 al cierre.', '', 1, 0, 0, '2015-07-17 02:28:55'),
(10, 'Fernando González', '32281756', 'Piegari Ristorante', 'Piegari Ristorante', 'imagen944_logo_header.png', 'piegariristorante@correoe.com.ar', '5c3d6ff79a861c09a71e8aac54ea6bab', '4326-9430', 1, 1, 'Posadas 1042, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5902043, -58.38175339999998', 'Piegari Restaurante se encuentra ubicado en el barrio de La Recoleta dentro del complejo La Recova. Con más de 20 años de trayectoria, se especializan en comida italiana y en carnes argentinas. Sus pescados y mariscos también son una gran opción a tener en cuenta a la hora de elegir de su menú. Efectúan una minuciosa selección con sus materias primas, lo que otorga una impronta fresca a su variedad de platos. El risotto con pulpo o el risotto con calamares son uno de sus platos más requeridos.', '', 1, 1, 1, '2015-07-17 02:59:05'),
(11, 'Ariel Domínguez', '35791357', 'El Estrebe', 'El Estrebe', 'imagen824_logo.png', 'estrebeparrilla@correoe.com.ar', 'ca74319b1c6b42c95892ecf976b073d6', '4803-0282', 1, 1, 'Peña 2475, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5894062, -58.399427100000025', 'Mollejas de corazón, Chinchulines de Cordero, Chorizos Caseros, Chuleton de ojo de Bife, Asado especial, T-bone. Postre de la casa Che-campo: Panqueque estreber (de manzana, con merengue, sambayón tibio), dulce de leche y helado de crema americana con baño de chocolate caliente.', '', 1, 1, 1, '2015-07-17 03:13:07'),
(12, 'Julián Rodríguez', '33557799', 'Sigue al Conejo Blanco', 'Sigue al Conejo Blanco', 'imagen720_0-01.jpg', 'siguealconejoblanco@correoe.com.ar', 'a9f7a8ab36276e707a793ea99f78d12f', '', 2, 2, 'Godoy Cruz 1585, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.588233, -58.435086100000035', 'Cerveza artesanal • Whiskys y maltas • Coctelería simple • Coctelería artesanal\r\n\r\nL a Miércoles de 9:00 a 19:00.\r\nJ de 9:00 a 2:00.\r\nV de 9:00 a 4:30.\r\nSábado de 19:00 a 4:30.', '', 0, 0, 1, '2015-07-17 16:48:41'),
(13, 'Pablo Jimenez', '32547698', 'La Fachada', 'La Fachada', 'imagen037_botonera.png', 'lafachada@correoe.com.ar', '30090d07e52b54d7f130d6cb350a5e6c', '4774-6535', 2, 4, 'Aráoz 1283, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5937101, -58.42744379999999', 'Las pizzas y empanadas de La Fachada, salieron por primera vez a las calles de Colegiales en 1999 cuando, un grupo de tres amigos comenzamos con este proyecto gastronómico. Las Pizzas Extra Large así como las Empandas abiertas y regionales fueron muy bien recibidas por un público que buscaba un sabor casero y con ingredientes de primera calidad. \r\n\r\nCinco años después, abrimos las puertas de una vieja y reciclada casa en Palermo. Un lugar cálido, informal y atendido por nosotros mismos. El objetivo es que los que visiten La Fachada, se sientan como en su propia casa y disfruten de un momento distendido, con buena música y excelentes sabores.', '', 1, 1, 1, '2015-07-17 16:53:57'),
(14, 'Julián González', '35537597', 'Monzu', 'Monzu S.A.', 'imagen041_11014899_989112947789168_1679448809291745843_n.png', 'monzupizza@correoe.com.ar', 'ea25dbf0c41172c50167ae8698c7dbb4', '4862-9223', 2, 4, 'José Antonio Cabrera 3975, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5963797, -58.42285720000001', '', '', 1, 0, 1, '2015-07-17 18:00:41'),
(15, 'Manuel López', '36366969', 'El Baqueano', 'El Baqueano S.A.', 'imagen005_photo_3998_1.jpg', 'elbaqueano@correoe.com.ar', 'cd476a527caf16e48124cea523200585', '4342-0802', 7, 1, 'Chile 495, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6159809, -58.37298190000001', 'Chef\r\nFernando Pablo Rivarola\r\n\r\nEspecialidades\r\nMenú degustación en 7 pasos se actualiza todas las semanas de acuerdo a la existencia de productos , según su estacionalidad. Especializados en las carnes alternativas de nuestro país: chinchilla, ñandú, cordero, llama, yacar, langosta de río, faisán, perdiz, codorniz, conejo, liebre, cerdo, jabalí. Pescados frescos del atlántico y de rio, mariscos frescos del átlántico. Otros productos autóctonos : papines andinos, brotes, hojas baby y flores comestibles, setas frescas, quesos y dulces regionales, embutidos campestres, vinos de las diferentes regiones vitivinícolas de nuestras tierras.\r\n\r\nOtros\r\nDomingo y lunes al mediodía solo reservas de grupos de 6 personas o más. Horario primavera-verano: martes a sábado de 20 a 0. Horario otoño-invierno: martes a sábado de 19 a 23.', '', 1, 1, 1, '2015-07-17 19:23:26'),
(16, 'Roberto Gutiérrez', '35357575', 'Nacional', 'Nacional', 'imagen348_photo_5132_1.jpg', 'nacionaltapeo@correoe.com.ar', '2cb395ce289bf00d40362486f94dbae2', '4300-2887', 7, 1, 'Perú 858, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6180169, -58.37444579999999', 'Chef\r\nJuan Ignacio Páez Montero\r\n\r\nEspecialidades\r\nTapeo: tapas, bruschettas & focaccias con todos los sabores del mediterráneo ideales para disfrutarlas al aire libre en nuestro patio cervecero. Platos principales: Carpaccio de lomo con hongos confitados, mousse de hierbas y salsa criolla, bondiola caramelizada con peras asadas mas puré de zapallos y jengibre. Postre:Dulce de leche creme brulee con salsa de arándanos.', '', 0, 0, 1, '2015-07-17 19:29:09'),
(17, 'Alejandro Rodríguez', '36963696', 'Brasserie Petanque', 'Brasserie Petanque', 'imagen879_logo.png', 'brasseriepetanque@correoe.com', 'e81bcfc0be0d8623b91d5c0e1b92a320', '4342-7930', 7, 1, 'Defensa 596, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6147121, -58.371842600000036', 'Especialidades: Caracoles, conejo a la mostaza de dijón y steak tartar.\r\n\r\nLunes: cerrado   \r\nMartes: Desde las 12 a 16 y de 20 a cierre\r\nMiércoles: Desde las 12 a 16 y de 20 a cierre\r\nJueves: Desde las 12 a 16 y de 20 a cierre\r\nViernes: Desde las 12 a 16 y de 20 a cierre\r\nSábado: Desde las 12:30 a 16 y de 20 a cierre\r\nDomingo: Desde las 12 a 16 y de 20 a cierre', '', 1, 1, 1, '2015-07-17 19:37:59'),
(18, 'Roberto Barazi', '35793579', 'Babieca Parrilla', 'Babieca Parrilla', 'imagen693_AVP9JXrH_400x400.jpeg', 'babiecaparrilla@correoe.com', 'a165482bbbdf413fb96bd0c4c5c6bb08', '4300-0237', 7, 1, 'Bolívar 1520, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6256811, -58.37265030000003', 'Especialidades: Provoleta Babieca; Parrillada Babieca; Gran Copa Babieca.', '', 1, 1, 1, '2015-07-17 19:51:33'),
(19, 'Damián Goitea', '36369696', 'Tío Felipe', 'Tío Felipe', 'imagen270_photo_1139_1.jpg', 'tiofelipepizza@correoe.com', '9139419b1933735dd8ae34b3b10dc35a', '', 7, 4, 'Balcarce 739, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6163893, -58.37037570000001', 'Especialidades: Pizza, empanadas y faina.\r\n\r\n\r\nHorarios:\r\nLunes: Desde las 08:00 a 02:00   \r\nMartes: Desde las 08:00 a 02:00\r\nMiércoles: Desde las 08:00 a 02:00\r\nJueves: Desde las 08:00 a 02:00\r\nViernes: Desde las 08:00 a 02:00\r\nSábado: Desde las 08:00 a 02:00\r\nDomingo: de 20:00 a cierre', '', 1, 0, 1, '2015-07-17 20:01:10'),
(20, 'Ricardo Serrano', '36366363', 'Krakow Bar', 'Krakow Bar', 'imagen043_11220808_1638379816374719_6408466194170024827_n.jpg', 'krakowbar@correoe.com.ar', '20b76af51811cde4e7123942072c1800', '4342-3916', 7, 2, 'Venezuela 474, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6137222, -58.37285099999997', 'Dentro de los mejores Bares de Buenos Aires, en San Telmo, se encuentra Krakow Bar. Krakow Bar es uno de los Bares que se destaca por su originalidad y tradición. Altamente recomendable para pasar buenos momentos, sentarse y disfrutar de una verdadera pinta de cerveza bien fría, en un ambiente relajado y amistoso. Bautizado así por la pintoresca capital de Polonia, de la época medieval, Krakow-café Bar recrea la magia de los clásicos Bares europeos en Buenos Aires.', '', 0, 0, 1, '2015-07-17 20:30:44'),
(21, 'Roberto Berruezo', '35799753', 'El Histórico', 'El Histórico S.A.', 'imagen774_logo.png', 'elhistorico@correoe.com.ar', '765af8da17eb03f173e01ade9624cd1b', '4307-4832', 7, 1, 'México 524, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6148848, -58.373626599999966', 'Especialidades\r\nEntrada: Carpaccio di lomo di manzo, tomates secos prosciutto di parma con rucola, gambas con crema de ajo. Plato principal: Creppe di zucca gratinado; carre de cerdo a la ciruela; polpo a la gallega. Postre: Volcán de chocolate; bananas salvajes; plato histórico.\r\n\r\n\r\nHorarios:\r\nLunes: Desde las 12 a 16 y de 20 a cierre   \r\nMartes: Desde las 12 a 16 y de 20 a cierre\r\nMiércoles: Desde las 12 a 16 y de 20 a cierre\r\nJueves: Desde las 12 a 16 y de 20 a cierre\r\nViernes: Desde las 12 a 16 y de 20 a cierre\r\nSábado: de 20 a cierre\r\nDomingo: Desde las 12 a 16 y de 20 a cierre', '', 1, 1, 1, '2015-07-17 20:42:54'),
(22, 'Adrián López', '36453645', 'Los Maestros', 'Los Maestros', 'imagen234_o.jpg', 'losmaestrospizza@correoe.com', '6c6dab0ce515aa12a682e5b838c0e1d9', '4815-4430', 1, 4, 'Paraná 1249, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5937031, -58.38876170000003', '', '', 1, 0, 1, '2015-07-18 07:03:55'),
(23, 'Alberto Battaglia', '35757535', 'Los Inmortales', 'Los Inmortales', 'imagen701_644284_409678622425164_1152963230_n.jpg', 'losinmortalespizza@correoe.com', '0d56da9f0b522a6d4f52cd51b7429ba0', '4811-2222', 1, 4, 'Paraná 1209, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5944913, -58.38865559999999', '', '', 1, 1, 1, '2015-07-18 07:11:41'),
(24, 'Ricardo Gómez', '35896475', 'Café Martínez', 'Café Martínez', 'imagen565_logotipo.png', 'cafemartinez@correoe.com', '6eabda2dd8e2e09fb46f5713fd356d9b', '4382-1822', 5, 6, 'Av. Belgrano 1775, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6137328, -58.39124939999999', 'Café Martínez es una compañía que opera desde 1933.\r\nSu eje principal es, fue y será el café. Somos importadores, elaboradores y distribuidores de dicho producto. Lo cuidamos en todas sus fases y procesos desde de la planta hasta la taza, es así como conseguimos una de nuestras metas mas preciadas que es la excelencia, tanto en calidad de producto como de atención.', '', 1, 0, 1, '2015-07-18 07:59:26'),
(25, 'front', 'front', 'front', 'front', 'imagen228_2-hand.png', 'front@front.com', 'a3dcb4d229de6fde0db5686dee47145d', 'front', 1, 1, 'asdad', '-34.60845295089817, -58.36915656551514', 'front', '', 0, 0, 0, '2015-07-30 23:50:28'),
(26, 'f', 'f', 'f', 'f', 'imagen261_2-hand.png', 'f@a.com', 'a3dcb4d229de6fde0db5686dee47145d', 'f', 1, 1, 'asdasd', '-34.603737385403306, -58.38133379444275', 'f', '', 0, 0, 0, '2015-07-31 04:34:21'),
(27, 'aa', 'aa', 'aa', 'aa', 'imagen666_2-hand.png', 'aa@aa.com', '86e916352d024f292f6ff0ae210acdfe', 'aa', 7, 2, 'fasdad', '-34.6036844,-58.381559100000004', 'aa', '', 0, 0, 1, '2015-07-31 04:41:06'),
(28, 'gasd', 'asd', 'gasdas', 'asdas', 'imagen847_2-hand.png', 'asd@asd.com', 'a3dcb4d229de6fde0db5686dee47145d', 'asdsad', 8, 4, 'dasd', '-34.6036844,-58.381559100000004', 'gasd', '', 0, 0, 1, '2015-07-31 04:44:07'),
(29, 'qq', 'qq', 'qq', 'qq', 'imagen966_2-hand.png', 'qq@aq.com', '94b8cea57c49a3007225a0c70c475450', 'qq', 1, 4, 'qqqq', '-34.6036844,-58.381559100000004', 'qq', '', 0, 0, 1, '2015-07-31 04:46:06'),
(30, 'gasd', 'asd', 'gasd', 'asd', 'imagen386_2-hand.png', 'empresa@empresa.com', 'a24df02d86e0f2c0c70c1423a90837a8', 'gasd', 8, 2, 'gasdasd', '-34.6036844,-58.381559100000004', 'gasd', 'http://www.asd.com.ar', 1, 0, 1, '2015-07-31 04:53:06'),
(31, '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 8, 2, '', '-34.6036844,-58.381559100000004', '', '', 0, 0, 0, '2015-07-31 04:53:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imagen_rel_empresa`
--

CREATE TABLE IF NOT EXISTS `Imagen_rel_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `link_imagen` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idempresa` (`idempresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Volcado de datos para la tabla `Imagen_rel_empresa`
--

INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES
(1, 1, 'Fachada', 'Fachada', 'imagen896_photo_10062_1.jpg', 1, 1, '2015-07-16 05:00:12'),
(2, 1, 'Interior 1', 'Interior 1', 'imagen955_photo_10062_2.jpg', 1, 0, '2015-07-16 05:02:35'),
(3, 1, 'Interior 2 á', 'Interior 2 á', 'imagen986_photo_10062_3.jpg', 1, 0, '2015-07-16 05:03:06'),
(4, 1, 'Ejemplo de comida', 'Ejemplo de comida servida en el restaurante', 'imagen032_photo_10062_4.jpg', 1, 0, '2015-07-16 05:03:52'),
(5, 2, 'Imagen 1', 'Imagen 1', 'imagen936_galeria1.jpg', 1, 0, '2015-07-16 05:35:36'),
(6, 2, 'Fachada', 'Fachada del restaurante', 'imagen948_galeria2.jpg', 1, 0, '2015-07-16 05:35:48'),
(7, 2, 'Interior 1', 'Foto del interior del restaurante', 'imagen967_galeria3.jpg', 1, 0, '2015-07-16 05:36:07'),
(8, 2, 'Interior 2', 'Foto del interior del restaurante', 'imagen981_galeria4.jpg', 1, 0, '2015-07-16 05:36:21'),
(9, 2, 'Interior 3', 'Foto del interior del restaurante', 'imagen000_galeria5.jpg', 1, 0, '2015-07-16 05:36:40'),
(10, 2, 'Interior 4', 'Foto del interior del restaurante', 'imagen033_galeria6.jpg', 1, 0, '2015-07-16 05:37:13'),
(11, 2, 'Comida 1', 'Ejemplo de comida ofrecida en el restaurante', 'imagen119_galeria21.jpg', 1, 0, '2015-07-16 05:38:39'),
(12, 2, 'Comida 2', 'Ejemplo de comida ofrecida en el restaurante', 'imagen135_galeria22.jpg', 1, 0, '2015-07-16 05:38:55'),
(13, 2, 'Comida 3', 'Ejemplo de comida ofrecida en el restaurante', 'imagen144_galeria27.jpg', 1, 0, '2015-07-16 05:39:04'),
(14, 3, 'Fachada', 'Fachada del restaurante Sigue al conejo blanco', '838_photo_11916_1.jpg', 1, 1, '2015-07-16 23:20:55'),
(15, 3, 'Interior', 'Interior del restaurante', '890_photo_11916_2.jpg', 1, 1, '2015-07-16 23:21:48'),
(16, 3, 'Cerveza', 'Cervezas servidas en el restaurante', '910_photo_11916_3.jpg', 1, 1, '2015-07-16 23:22:09'),
(17, 3, 'Comida', 'Comidas servidas en el restaurante', '924_photo_11916_4.jpg', 1, 1, '2015-07-16 23:22:11'),
(18, 4, 'Interior 1', 'Interior del bar', '410_photo_10514_2.jpg', 1, 1, '2015-07-16 23:30:13'),
(19, 4, 'Interior 2', 'Interior del bar', '426_photo_10514_3.jpg', 1, 1, '2015-07-16 23:30:52'),
(20, 4, 'Cóctel', 'Cóctel', '448_photo_10514_4.jpg', 1, 1, '2015-07-16 23:30:54'),
(21, 5, 'Interior', 'Interior del bar', '915_photo_10636_2.jpg', 1, 1, '2015-07-16 23:39:23'),
(22, 5, 'Interior 2', 'Interior del bar', '931_photo_10636_3.jpg', 1, 1, '2015-07-16 23:39:21'),
(23, 5, 'Cocktail', 'Ejemplo de Cocktail ofrecido en Franks', '957_photo_10636_4.jpg', 1, 1, '2015-07-16 23:39:19'),
(24, 6, 'Fachada', 'Fachada del lugar', '137_photo_10878_1.jpg', 1, 1, '2015-07-16 23:59:00'),
(25, 6, 'Interior 1', 'Interior del restaurante', '218_photo_10878_2.jpg', 1, 1, '2015-07-17 00:00:20'),
(26, 6, 'Interior 2', 'Interior del restaurante', '235_photo_10878_3.jpg', 1, 1, '2015-07-17 00:04:15'),
(27, 6, 'Comida', 'Ejemplo de comida servida en el restaurante', '451_photo_10878_4.jpg', 1, 1, '2015-07-17 00:04:18'),
(28, 7, 'Interior 1', 'Interior del restaurante', '965_photo_13716_1.jpg', 1, 1, '2015-07-17 02:09:28'),
(29, 7, 'Interior 2', 'Interior del reataurante', '986_photo_13716_2.jpg', 1, 1, '2015-07-17 02:09:51'),
(30, 7, 'Interior 3', 'Interior del restaurante', '023_photo_13716_3.jpg', 1, 1, '2015-07-17 02:13:56'),
(31, 7, 'Comida', 'Ejemplo de comida servida en el restaurante.', '040_photo_13716_4.jpg', 1, 1, '2015-07-17 02:13:58'),
(32, 8, 'Entrada', 'Entrada del restaurante', '402_photo_12032_1.jpg', 1, 1, '2015-07-17 02:19:16'),
(33, 8, 'Interior 1', 'Interior del restaurante', '438_photo_12032_2.jpg', 1, 1, '2015-07-17 02:20:43'),
(34, 8, 'Imagen 3', 'Imagen 3', '459_photo_12032_3.jpg', 1, 1, '2015-07-17 02:20:56'),
(35, 8, 'Detalle de plato', 'Detalle de plato', '472_photo_12032_4.jpg', 1, 1, '2015-07-17 02:20:54'),
(36, 9, 'Entrada', 'Entrada del bar', '261_photo_11460_1.jpg', 1, 1, '2015-07-17 02:40:19'),
(37, 9, 'Interior 1', 'Interior del bar', '276_photo_11460_2.jpg', 1, 1, '2015-07-17 02:31:47'),
(38, 9, 'Interior 2', 'Interior del bar', '286_photo_11460_2.jpg', 1, 1, '2015-07-17 02:31:48'),
(39, 9, 'Interior 3', 'Interior del bar', '295_photo_11460_3.jpg', 1, 1, '2015-07-17 02:31:50'),
(40, 9, 'Interior 4', 'Interior del bar', '304_photo_11460_4.jpg', 0, 1, '2015-07-17 02:45:29'),
(41, 9, 'Interior 4', 'Interior del bar', '150_photo_11460_4.jpg', 1, 0, '2015-07-17 02:45:50'),
(42, 10, 'Entrada', 'Entrada del restaurante', '012_photo_198_1.jpg', 1, 1, '2015-07-17 03:01:07'),
(43, 10, 'Interior 1', 'Interior del restaurante', '027_photo_198_2.jpg', 1, 1, '2015-07-17 03:01:05'),
(44, 10, 'Interior 2', 'Interior del restaurante', '041_photo_198_3.jpg', 1, 1, '2015-07-17 03:01:03'),
(45, 10, 'Plato', 'Ejemplo de plato servido por el restaurante', '059_photo_198_4.jpg', 1, 1, '2015-07-17 03:01:01'),
(46, 11, 'Entrada', 'Entrada del restaurante', '846_photo_6374_1.jpg', 1, 1, '2015-07-17 03:14:36'),
(47, 11, 'Interior 1', 'Interior del restaurante 1', '862_photo_6374_2.jpg', 1, 1, '2015-07-17 03:14:39'),
(48, 11, 'Interior 2', 'Interior del restaurante 2', '874_photo_6374_3.jpg', 1, 1, '2015-07-17 03:14:41'),
(49, 11, 'Interior 3', 'Interior 3', '896_photo_6374_4.jpg', 1, 0, '2015-07-17 03:14:56'),
(50, 13, 'Entrada día', 'Entrada de día', '700_l(7).jpg', 1, 1, '2015-07-17 17:22:54'),
(51, 13, 'Entrada noche', 'Entrada de noche', '712_l(4).jpg', 1, 0, '2015-07-17 17:21:52'),
(52, 13, 'Pizza 1', 'Ejemplo de pizza servida', '739_o.jpg', 1, 1, '2015-07-17 17:22:56'),
(53, 13, 'Pizza 2', 'Ejemplo de pizza servida', '757_l(2).jpg', 1, 1, '2015-07-17 17:22:58'),
(54, 13, 'Empanadas', 'Ejemplo de empanadas servidas', '769_l(1).jpg', 1, 1, '2015-07-17 17:23:01'),
(55, 13, 'Interior', 'Detalles del interior', '838_l(6).jpg', 1, 0, '2015-07-17 17:23:58'),
(56, 15, 'Interior 1', 'Interior del restaurante', '040_photo_3998_2.jpg', 1, 1, '2015-07-17 19:25:04'),
(57, 15, 'Interior 2', 'Interior del restaurante', '082_photo_3998_3.jpg', 1, 1, '2015-07-17 19:25:09'),
(58, 15, 'Plato', 'Ejemplo de plato servido en el restaurante.', '102_photo_3998_4.jpg', 1, 1, '2015-07-17 19:25:11'),
(59, 16, 'Interior 1', 'Interior del restaurante', '379_photo_5132_2.jpg', 1, 0, '2015-07-17 19:29:39'),
(60, 16, 'Interior 2', 'Interior del restaurante', '389_photo_5132_3.jpg', 1, 0, '2015-07-17 19:29:49'),
(61, 16, 'Plato', 'Ejemplo de plato servido por el restaurante', '403_photo_5132_4.jpg', 1, 0, '2015-07-17 19:30:03'),
(62, 17, 'Exterior', 'Exterior del negocio', '907_photo_1961_1.jpg', 1, 1, '2015-07-17 19:39:33'),
(63, 17, 'Interior 1', 'Interior del restaurante', '936_photo_1961_2.jpg', 1, 1, '2015-07-17 19:39:31'),
(64, 17, 'Interior 2', 'Interior del restaurante', '948_photo_1961_3.jpg', 1, 1, '2015-07-17 19:39:29'),
(65, 17, 'Plato', 'Ejemplo de plato servido por el restaurante', '961_photo_1961_4.jpg', 1, 1, '2015-07-17 19:39:27'),
(66, 18, 'Interior 1', 'Interior del restaurante', '740_photo_15344_1.jpg', 1, 1, '2015-07-17 19:53:07'),
(67, 18, 'Interior 2', 'Interior del restaurante', '749_photo_15344_2.jpg', 1, 1, '2015-07-17 19:53:05'),
(68, 18, 'Plato 1', 'Ejemplo de plato servido por el restaurante', '765_photo_15344_3.jpg', 1, 1, '2015-07-17 19:52:58'),
(69, 18, 'Plato 2', 'Ejemplo de plato servido por el restaurante', '772_photo_15344_4.jpg', 0, 1, '2015-07-17 19:53:03'),
(70, 20, 'Entrada', 'Entrada al restaurante', '118_photo_6731_1.jpg', 1, 1, '2015-07-17 20:32:02'),
(71, 20, 'Interior 1', 'Interior del restaurante', '143_photo_6731_2.jpg', 1, 1, '2015-07-17 20:33:51'),
(72, 20, 'Interior 2', 'Interior del restaurante', '154_photo_6731_3.jpg', 1, 0, '2015-07-17 20:32:34'),
(73, 20, 'Interior 3', 'Interior del restaurante', '164_photo_6731_4.jpg', 1, 1, '2015-07-17 20:33:55'),
(74, 21, 'Entrada', 'Entrada', '814_photo_6116_1.jpg', 1, 1, '2015-07-17 20:44:27'),
(75, 21, 'Foto 1', 'Foto 1', '821_photo_6116_2.jpg', 1, 1, '2015-07-17 20:44:25'),
(76, 21, 'Interior 1', 'Interior del restaurante', '843_photo_6116_3.jpg', 1, 1, '2015-07-17 20:44:23'),
(77, 21, 'Mesa', 'Mesa', '859_photo_6116_4.jpg', 1, 1, '2015-07-17 20:44:21'),
(78, 22, 'Entrada 1', 'Entrada del restaurante', '275_o(1).jpg', 1, 1, '2015-07-18 07:06:11'),
(79, 22, 'Entrada 2', 'Entrada del restaurante', '287_o(2).jpg', 1, 1, '2015-07-18 07:06:09'),
(80, 22, 'Pizza', 'Ejemplo de pizza servida', '314_o(3).jpg', 1, 1, '2015-07-18 07:06:08'),
(81, 22, 'Pizza y empanada', 'Ejemplo de pizza y empanada servidas', '333_o(4).jpg', 1, 1, '2015-07-18 07:06:05'),
(82, 22, 'Empanadas', 'Ejemplo de empanadas servidas', '363_o(5).jpg', 1, 1, '2015-07-18 07:06:17'),
(83, 23, 'Entrada', 'Entrada', '756_o.jpg', 1, 1, '2015-07-18 07:13:35'),
(84, 23, 'Entrada 2', 'Entrada 2', '764_o(3).jpg', 1, 1, '2015-07-18 07:13:26'),
(85, 23, 'Entrada 3', 'Entrada 3', '776_o(1).jpg', 1, 0, '2015-07-18 07:12:56'),
(86, 23, 'Interior', 'Interior', '803_o(2).jpg', 1, 1, '2015-07-18 07:13:33'),
(87, 24, 'Taza de café', 'Un ejemplo de café y medialunas servido en el local', '704_o(1).jpg', 1, 1, '2015-07-18 08:01:46'),
(88, 24, 'Bebida', 'Ejemplo de bebida servida', '720_o.jpg', 1, 1, '2015-07-18 08:02:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rubro`
--

CREATE TABLE IF NOT EXISTS `Rubro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) DEFAULT NULL,
  `icono` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `Rubro`
--

INSERT INTO `Rubro` (`id`, `descripcion`, `icono`, `estado`, `habilitado`) VALUES
(1, 'Restaurantes', 'imagen409_restaurant.png', 1, 1),
(2, 'Bares', 'imagen704_bar.png', 1, 1),
(3, 'Estacionamientos', 'imagen728_parkinggarage.png', 0, 1),
(4, 'Pizzerías', 'imagen517_pizzaria.png', 1, 1),
(5, 'Estacionamientos', 'imagen366_parkinggarage.png', 1, 0),
(6, 'Cafés', 'imagen381_coffee.png', 1, 1),
(7, 'Música', 'imagen401_music.png', 1, 0),
(8, 'Zapaterías', 'imagen435_shoes.png', 1, 0),
(9, 'fsf', 'imagen349_2-hand.png', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `nombre`, `email`, `pw`, `telefono`, `direccion`, `estado`, `fecha`) VALUES
(1, 'César Rastelli', 'admin@admin.com', '91f5167c34c400758115c2a6826ec2e3', '1511111111', 'Av. Congreso 1050', 1, '2015-04-25 03:39:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Video_rel_empresa`
--

CREATE TABLE IF NOT EXISTS `Video_rel_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idempresa` (`idempresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `Video_rel_empresa`
--

INSERT INTO `Video_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `codigo`, `estado`, `habilitado`, `fecha`) VALUES
(1, 1, 'Resto Bar comidas mexicanas', 'Mejor lugar para venir a disfrutar de unos exquisitos Tacos mexicanos!', 'uQvwTlk0vHc', 1, 0, '2015-07-18 14:31:16'),
(2, 1, 'Nuestro DJ', 'Música Disco-Rock-Tecno-Pop 70-80-90', '7SDyTcraWFM', 1, 0, '2015-07-18 14:32:45'),
(3, 4, 'Bandas en vivo!', 'Cole Morson - Tell Me Band', 'AfTDy2pPzW4', 1, 0, '2015-07-18 14:35:55'),
(4, 4, 'Bandas en vivo!', 'Sweet Little Angel Band', '6sSGkWWyRdM', 1, 0, '2015-07-18 14:36:49'),
(5, 2, 'Video 2', 'Video 2', 'oU-HDfcg5NU', 1, 1, '2015-07-18 07:17:47'),
(6, 2, 'Video 3', 'Video 3', 'Ykf8CyFk4P8', 1, 1, '2015-07-18 07:17:49'),
(7, 4, 'Video 1', 'Video 1', 'MsJYfxasr5E', 1, 1, '2015-07-18 07:22:03'),
(8, 4, 'Video 2', 'Video 2', 'dqmuA98ldG4', 1, 1, '2015-07-18 07:22:02'),
(9, 4, 'Video 3', 'Video 3', 'QdwtQrTFNrQ', 1, 1, '2015-07-18 07:22:00'),
(10, 12, 'Video 1', 'Video 1', 'AQHr2zBPRQY', 0, 1, '2015-07-18 08:08:51'),
(11, 12, 'Video 2', 'Video 2', 'HbFLR57EuXE', 0, 1, '2015-07-18 08:08:45'),
(12, 12, 'Video 3', 'Video 3', 'PX6tg9xoa_s', 0, 1, '2015-07-18 08:08:47'),
(13, 13, 'Video 1', 'Video 1', 'B_mf3hUHRvQ', 1, 1, '2015-07-18 07:21:44'),
(14, 13, 'Video 2', 'Video 2', 'i9Urcbhs22A', 1, 1, '2015-07-18 07:21:41'),
(15, 13, 'Video 3', 'Video 3', 'ByQrMdiHDBA', 1, 1, '2015-07-18 07:21:40'),
(16, 14, 'Video 1', 'Video 1', 'PX6tg9xoa_s', 1, 1, '2015-07-18 08:09:58'),
(17, 14, 'Video 2', 'Video 2', 'HbFLR57EuXE', 1, 1, '2015-07-18 08:09:56'),
(18, 14, 'Video 3', 'Video 3', 'HbFLR57EuXE', 0, 0, '2015-07-18 08:09:37'),
(19, 14, 'Video 3', 'Video 3', 'AQHr2zBPRQY', 1, 1, '2015-07-18 08:09:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Zona`
--

CREATE TABLE IF NOT EXISTS `Zona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) DEFAULT NULL,
  `lat_long` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `Zona`
--

INSERT INTO `Zona` (`id`, `descripcion`, `lat_long`, `estado`, `habilitado`) VALUES
(1, 'Recoleta', '-34.5858716, -58.39425460000001', 1, 1),
(2, 'Palermo', '-34.5735384, -58.42262340000002', 1, 1),
(3, 'Colegiales', '-34.5742627, -58.45151299999998', 1, 0),
(4, 'Retiro', '-34.5906823, -58.37850950000001', 1, 1),
(5, 'Montserrat', '-34.61240610000001, -58.379055300000005', 1, 0),
(6, 'Puerto Madero', '-34.61442, -58.357709099999965', 1, 0),
(7, 'San Telmo', '-34.6209112, -58.37136399999997', 1, 1),
(8, 'Constitución', '-34.6245988, -58.383428500000036', 1, 1),
(9, 'La Boca', '-34.6353802, -58.361604', 1, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Calificacion_rel_empresa`
--
ALTER TABLE `Calificacion_rel_empresa`
  ADD CONSTRAINT `Calificacion_rel_empresa_ibfk_2` FOREIGN KEY (`idempresa`) REFERENCES `Empresa` (`id`);

--
-- Filtros para la tabla `Empresa`
--
ALTER TABLE `Empresa`
  ADD CONSTRAINT `Empresa_ibfk_1` FOREIGN KEY (`idzona`) REFERENCES `Zona` (`id`),
  ADD CONSTRAINT `Empresa_ibfk_2` FOREIGN KEY (`idrubro`) REFERENCES `Rubro` (`id`);

--
-- Filtros para la tabla `Imagen_rel_empresa`
--
ALTER TABLE `Imagen_rel_empresa`
  ADD CONSTRAINT `Imagen_rel_empresa_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `Empresa` (`id`);

--
-- Filtros para la tabla `Video_rel_empresa`
--
ALTER TABLE `Video_rel_empresa`
  ADD CONSTRAINT `Video_rel_empresa_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `Empresa` (`id`);
