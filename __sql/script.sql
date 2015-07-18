-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-07-2015 a las 18:32:02
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_milugar`
--
CREATE DATABASE IF NOT EXISTS `db_milugar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_milugar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Calificacion_rel_empresa`
--

CREATE TABLE IF NOT EXISTS `Calificacion_rel_empresa` (
  `id` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idusuariofb` int(11) NOT NULL,
  `calificacion` tinyint(4) NOT NULL DEFAULT '1',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empresa`
--

CREATE TABLE IF NOT EXISTS `Empresa` (
  `id` int(11) NOT NULL,
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
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `es_premium` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Empresa`
--

INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(1, 'Pablo Lopez', '345678901', 'Magdalenas Party', 'Magdalenas Party', 'imagen797_logo-small.png', 'magdalenasparty@correoe.com', '9c220c744d0bd9f038f655d13aec14b3', '4833-9127', 2, 1, 'Thames 1795, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.586784, -58.42917560000001', 'Magdalenas Party', 1, 1, 1, '2015-07-16 04:43:17');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(2, 'Julián Domínguez', '321098765', 'De olivas i lustres', 'De olivas i lustres', 'imagen350_logo3.png', 'deolivasilustres@correoe.com', '9362858ac1bf030bf0df8d274a34a403', '4867-3388', 2, 1, 'Gorriti 3972, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5953987, -58.420903299999964', 'De olivas i lustres, Restaurante de tapas mediterraneas, italiana, cocina criolla Argentina', 1, 1, 1, '2015-07-16 05:25:50');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(3, 'Julián Perri', '3344556677', 'Sigue al conejo blanco', 'Sigue al conejo blanco', 'imagen748_logosigueconejoblanco.jpg', 'siguealconejoblanco@gmail.com', 'a9f7a8ab36276e707a793ea99f78d12f', '', 2, 2, 'Godoy Cruz 1585, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.588233, -58.435086100000035', 'Cerveza Artesanal Tirada / Tragos / Picadas / Canastitas / Pizzas / Pantalla Gigante', 1, 0, 0, '2015-07-16 23:19:09');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(4, 'Fernando Moro', '33443344', 'Gibson', 'Gibson', 'imagen355_photo_10514_1.jpg', 'gibsonbar@correoe.com', '53221393cfec6193188d40e363ba3144', '5529-9222', 2, 2, 'Avenida Raúl Scalabrini Ortiz 1398, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5921872, -58.42700179999997', 'Whiskys y maltas • Coctelería simple • Coctelería artesanal\r\nMa a J de 9:00 a 1:00.\r\nV a Sábado de 9:00 al cierre', 1, 1, 1, '2015-07-16 23:29:15');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(5, 'Roberto Gutiérrez', '33223322', 'Franks', 'Franks', 'imagen887_logoNew.png', 'franksbar@correoe.com', 'df72d713f01b8168ae7018c5672fb5d5', '', 2, 2, 'Arévalo 1445, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5832625, -58.44302759999999', 'Whiskys y maltas • Coctelería artesanal • Bodega de vinos\r\nMiércoles a Sábado de 21:00 al cierre.', 1, 0, 0, '2015-07-16 23:38:07');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(6, 'Martín Hernández', '33225544', 'Tijuana Cocina Mex & Bar', 'Tijuana Cocina Mex & Bar', 'imagen113_179569_337751886331910_932518897_n.jpg', 'tijuanacocinamexybar@correoe.com', '177a03aff993d204d2bc736efa87808e', '2058-8905', 1, 1, 'Guatemala 4540, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5875288, -58.42300449999999', 'Chef: Juan Manuel Diego\r\n\r\nEspecialidades\r\nPlatos: Tijuana T-Bone ,alitas BBQ, burritos de jamón ahumado, fajitas mixta especial de entraña y chorizo. Postres: Cheese cake de maracuya con ganache de chocolate blanco y maracuya El Patrón.', 1, 0, 0, '2015-07-16 23:58:33');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(7, 'Ricardo López', '31316464', 'Club 31 Bar & Resto (Buenos Aires Grand Hotel)', 'Club 31 Bar & Resto (Buenos Aires Grand Hotel)', 'imagen928_10676239_1497599707181906_5168224305203092473_n.jpg', 'club31baryresto@correoe.com', 'e41210cc3a3dad900fac51f475bb2116', '4129-9800', 1, 1, 'Avenida General las Heras 1745, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5922183, -58.391139899999985', 'Chef\r\nLuciano Grimaldi\r\n\r\nEspecialidades\r\nRaviolones de cordero con hongos frescos de bariloche, jugo de cocción con tomillo y calabaza confit. Lingote de 2 chocolates, macaron y su helado', 0, 0, 1, '2015-07-17 02:08:48');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(8, 'Agustina Tiscornia', '33557799', 'Tiscornia', 'Tiscornia', 'imagen382_10599279_868133699863351_3293696167281133200_n.jpg', 'tiscorniarestaurante@correoe.com.ar', '552780cea261a41cbc2667d8d1221b20', '4822-6694', 1, 1, 'Antonio Beruti 2751, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5913878, -58.4038448', 'Tiscornia: Restaurante de buena cocina\r\nTe esperamos a pasar un buen momento, disfrutando diversos sabores en un ambiente acogedor. Menú de finger food frío, caliente, plato principal y degustación de postres. Bebida sin alcohol incluida.\r\n\r\nVinos y tragos\r\nOfrecemos nuestra carta de vinos y también te brindamos la posibilidad de que traigas tu propio vino. Te esperamos!\r\n\r\nEventos y Catering\r\nOrganizá eventos en Tiscornia, capacidad máxima 60 personas. Servicio de catering. Consultanos por las diferentes propuestas!', 1, 0, 1, '2015-07-17 02:16:22');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(9, 'Fernando Hernández', '36925847', 'The Temple Bar', 'The Temple Bar', 'imagen135_logo.png', 'templebar@correoe.com.ar', '4fd97a99cb13b7d2213efcd3ac53f999', '4805-0733', 1, 2, 'Avenida General las Heras 1822, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5916302, -58.39209269999998', 'Cerveza tirada • Cerveza artesanal • Whiskys y maltas • Coctelería simple • Coctelería artesanal • Bodega de vinos\r\n\r\nL a V de 10:00 al cierre.\r\nSábado de 21:00 al cierre.', 1, 0, 0, '2015-07-17 02:28:55');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(10, 'Fernando González', '32281756', 'Piegari Ristorante', 'Piegari Ristorante', 'imagen944_logo_header.png', 'piegariristorante@correoe.com.ar', '5c3d6ff79a861c09a71e8aac54ea6bab', '4326-9430', 1, 1, 'Posadas 1042, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5902043, -58.38175339999998', 'Piegari Restaurante se encuentra ubicado en el barrio de La Recoleta dentro del complejo La Recova. Con más de 20 años de trayectoria, se especializan en comida italiana y en carnes argentinas. Sus pescados y mariscos también son una gran opción a tener en cuenta a la hora de elegir de su menú. Efectúan una minuciosa selección con sus materias primas, lo que otorga una impronta fresca a su variedad de platos. El risotto con pulpo o el risotto con calamares son uno de sus platos más requeridos.', 1, 1, 1, '2015-07-17 02:59:05');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(11, 'Ariel Domínguez', '35791357', 'El Estrebe', 'El Estrebe', 'imagen824_logo.png', 'estrebeparrilla@correoe.com.ar', 'ca74319b1c6b42c95892ecf976b073d6', '4803-0282', 1, 1, 'Peña 2475, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5894062, -58.399427100000025', 'Mollejas de corazón, Chinchulines de Cordero, Chorizos Caseros, Chuleton de ojo de Bife, Asado especial, T-bone. Postre de la casa Che-campo: Panqueque estreber (de manzana, con merengue, sambayón tibio), dulce de leche y helado de crema americana con baño de chocolate caliente.', 1, 1, 1, '2015-07-17 03:13:07');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(12, 'Julián Rodríguez', '33557799', 'Sigue al Conejo Blanco', 'Sigue al Conejo Blanco', 'imagen720_0-01.jpg', 'siguealconejoblanco@correoe.com.ar', 'a9f7a8ab36276e707a793ea99f78d12f', '', 2, 2, 'Godoy Cruz 1585, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.588233, -58.435086100000035', 'Cerveza artesanal • Whiskys y maltas • Coctelería simple • Coctelería artesanal\r\n\r\nL a Miércoles de 9:00 a 19:00.\r\nJ de 9:00 a 2:00.\r\nV de 9:00 a 4:30.\r\nSábado de 19:00 a 4:30.', 0, 0, 1, '2015-07-17 16:48:41');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(13, 'Pablo Jimenez', '32547698', 'La Fachada', 'La Fachada', 'imagen037_botonera.png', 'lafachada@correoe.com.ar', '30090d07e52b54d7f130d6cb350a5e6c', '4774-6535', 2, 4, 'Aráoz 1283, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5937101, -58.42744379999999', 'Las pizzas y empanadas de La Fachada, salieron por primera vez a las calles de Colegiales en 1999 cuando, un grupo de tres amigos comenzamos con este proyecto gastronómico. Las Pizzas Extra Large así como las Empandas abiertas y regionales fueron muy bien recibidas por un público que buscaba un sabor casero y con ingredientes de primera calidad. \r\n\r\nCinco años después, abrimos las puertas de una vieja y reciclada casa en Palermo. Un lugar cálido, informal y atendido por nosotros mismos. El objetivo es que los que visiten La Fachada, se sientan como en su propia casa y disfruten de un momento distendido, con buena música y excelentes sabores.', 1, 1, 1, '2015-07-17 16:53:57');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(14, 'Julián González', '35537597', 'Monzu', 'Monzu S.A.', 'imagen041_11014899_989112947789168_1679448809291745843_n.png', 'monzupizza@correoe.com.ar', 'ea25dbf0c41172c50167ae8698c7dbb4', '4862-9223', 2, 4, 'José Antonio Cabrera 3975, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.5963797, -58.42285720000001', '', 1, 0, 1, '2015-07-17 18:00:41');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(15, 'Manuel López', '36366969', 'El Baqueano', 'El Baqueano S.A.', 'imagen005_photo_3998_1.jpg', 'elbaqueano@correoe.com.ar', 'cd476a527caf16e48124cea523200585', '4342-0802', 7, 1, 'Chile 495, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6159809, -58.37298190000001', 'Chef\r\nFernando Pablo Rivarola\r\n\r\nEspecialidades\r\nMenú degustación en 7 pasos se actualiza todas las semanas de acuerdo a la existencia de productos , según su estacionalidad. Especializados en las carnes alternativas de nuestro país: chinchilla, ñandú, cordero, llama, yacar, langosta de río, faisán, perdiz, codorniz, conejo, liebre, cerdo, jabalí. Pescados frescos del atlántico y de rio, mariscos frescos del átlántico. Otros productos autóctonos : papines andinos, brotes, hojas baby y flores comestibles, setas frescas, quesos y dulces regionales, embutidos campestres, vinos de las diferentes regiones vitivinícolas de nuestras tierras.\r\n\r\nOtros\r\nDomingo y lunes al mediodía solo reservas de grupos de 6 personas o más. Horario primavera-verano: martes a sábado de 20 a 0. Horario otoño-invierno: martes a sábado de 19 a 23.', 1, 1, 1, '2015-07-17 19:23:26');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(16, 'Roberto Gutiérrez', '35357575', 'Nacional', 'Nacional', 'imagen348_photo_5132_1.jpg', 'nacionaltapeo@correoe.com.ar', '2cb395ce289bf00d40362486f94dbae2', '4300-2887', 7, 1, 'Perú 858, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6180169, -58.37444579999999', 'Chef\r\nJuan Ignacio Páez Montero\r\n\r\nEspecialidades\r\nTapeo: tapas, bruschettas & focaccias con todos los sabores del mediterráneo ideales para disfrutarlas al aire libre en nuestro patio cervecero. Platos principales: Carpaccio de lomo con hongos confitados, mousse de hierbas y salsa criolla, bondiola caramelizada con peras asadas mas puré de zapallos y jengibre. Postre:Dulce de leche creme brulee con salsa de arándanos.', 0, 0, 1, '2015-07-17 19:29:09');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(17, 'Alejandro Rodríguez', '36963696', 'Brasserie Petanque', 'Brasserie Petanque', 'imagen879_logo.png', 'brasseriepetanque@correoe.com', 'e81bcfc0be0d8623b91d5c0e1b92a320', '4342-7930', 7, 1, 'Defensa 596, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6147121, -58.371842600000036', 'Especialidades: Caracoles, conejo a la mostaza de dijón y steak tartar.\r\n\r\nLunes: cerrado   \r\nMartes: Desde las 12 a 16 y de 20 a cierre\r\nMiércoles: Desde las 12 a 16 y de 20 a cierre\r\nJueves: Desde las 12 a 16 y de 20 a cierre\r\nViernes: Desde las 12 a 16 y de 20 a cierre\r\nSábado: Desde las 12:30 a 16 y de 20 a cierre\r\nDomingo: Desde las 12 a 16 y de 20 a cierre', 1, 1, 1, '2015-07-17 19:37:59');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(18, 'Roberto Barazi', '35793579', 'Babieca Parrilla', 'Babieca Parrilla', 'imagen693_AVP9JXrH_400x400.jpeg', 'babiecaparrilla@correoe.com', 'a165482bbbdf413fb96bd0c4c5c6bb08', '4300-0237', 7, 1, 'Bolívar 1520, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6256811, -58.37265030000003', 'Especialidades: Provoleta Babieca; Parrillada Babieca; Gran Copa Babieca.', 1, 1, 1, '2015-07-17 19:51:33');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(19, 'Damián Goitea', '36369696', 'Tío Felipe', 'Tío Felipe', 'imagen270_photo_1139_1.jpg', 'tiofelipepizza@correoe.com', '9139419b1933735dd8ae34b3b10dc35a', '', 7, 4, 'Balcarce 739, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6163893, -58.37037570000001', 'Especialidades: Pizza, empanadas y faina.\r\n\r\n\r\nHorarios:\r\nLunes: Desde las 08:00 a 02:00   \r\nMartes: Desde las 08:00 a 02:00\r\nMiércoles: Desde las 08:00 a 02:00\r\nJueves: Desde las 08:00 a 02:00\r\nViernes: Desde las 08:00 a 02:00\r\nSábado: Desde las 08:00 a 02:00\r\nDomingo: de 20:00 a cierre', 1, 0, 1, '2015-07-17 20:01:10');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(20, 'Ricardo Serrano', '36366363', 'Krakow Bar', 'Krakow Bar', 'imagen043_11220808_1638379816374719_6408466194170024827_n.jpg', 'krakowbar@correoe.com.ar', '20b76af51811cde4e7123942072c1800', '4342-3916', 7, 2, 'Venezuela 474, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6137222, -58.37285099999997', 'Dentro de los mejores Bares de Buenos Aires, en San Telmo, se encuentra Krakow Bar. Krakow Bar es uno de los Bares que se destaca por su originalidad y tradición. Altamente recomendable para pasar buenos momentos, sentarse y disfrutar de una verdadera pinta de cerveza bien fría, en un ambiente relajado y amistoso. Bautizado así por la pintoresca capital de Polonia, de la época medieval, Krakow-café Bar recrea la magia de los clásicos Bares europeos en Buenos Aires.', 0, 0, 1, '2015-07-17 20:30:44');
INSERT INTO `Empresa` (`id`, `nombre_referente`, `dni_referente`, `nombre`, `razon_social`, `logo`, `email`, `pw`, `telefono`, `idzona`, `idrubro`, `direccion`, `lat_long`, `descripcion`, `habilitado`, `es_premium`, `estado`, `fecha`) VALUES(21, 'Roberto Berruezo', '35799753', 'El Histórico', 'El Histórico S.A.', 'imagen774_logo.png', 'elhistorico@correoe.com.ar', '765af8da17eb03f173e01ade9624cd1b', '4307-4832', 7, 1, 'México 524, Buenos Aires, Ciudad Autonoma de Buenos Aires, Argentina', '-34.6148848, -58.373626599999966', 'Especialidades\r\nEntrada: Carpaccio di lomo di manzo, tomates secos prosciutto di parma con rucola, gambas con crema de ajo. Plato principal: Creppe di zucca gratinado; carre de cerdo a la ciruela; polpo a la gallega. Postre: Volcán de chocolate; bananas salvajes; plato histórico.\r\n\r\n\r\nHorarios:\r\nLunes: Desde las 12 a 16 y de 20 a cierre   \r\nMartes: Desde las 12 a 16 y de 20 a cierre\r\nMiércoles: Desde las 12 a 16 y de 20 a cierre\r\nJueves: Desde las 12 a 16 y de 20 a cierre\r\nViernes: Desde las 12 a 16 y de 20 a cierre\r\nSábado: de 20 a cierre\r\nDomingo: Desde las 12 a 16 y de 20 a cierre', 1, 1, 1, '2015-07-17 20:42:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imagen_rel_empresa`
--

CREATE TABLE IF NOT EXISTS `Imagen_rel_empresa` (
  `id` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `link_imagen` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Imagen_rel_empresa`
--

INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(1, 1, 'Fachada', 'Fachada', 'imagen896_photo_10062_1.jpg', 1, 1, '2015-07-16 05:00:12');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(2, 1, 'Interior 1', 'Interior 1', 'imagen955_photo_10062_2.jpg', 1, 0, '2015-07-16 05:02:35');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(3, 1, 'Interior 2 á', 'Interior 2 á', 'imagen986_photo_10062_3.jpg', 1, 0, '2015-07-16 05:03:06');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(4, 1, 'Ejemplo de comida', 'Ejemplo de comida servida en el restaurante', 'imagen032_photo_10062_4.jpg', 1, 0, '2015-07-16 05:03:52');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(5, 2, 'Imagen 1', 'Imagen 1', 'imagen936_galeria1.jpg', 1, 0, '2015-07-16 05:35:36');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(6, 2, 'Fachada', 'Fachada del restaurante', 'imagen948_galeria2.jpg', 1, 0, '2015-07-16 05:35:48');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(7, 2, 'Interior 1', 'Foto del interior del restaurante', 'imagen967_galeria3.jpg', 1, 0, '2015-07-16 05:36:07');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(8, 2, 'Interior 2', 'Foto del interior del restaurante', 'imagen981_galeria4.jpg', 1, 0, '2015-07-16 05:36:21');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(9, 2, 'Interior 3', 'Foto del interior del restaurante', 'imagen000_galeria5.jpg', 1, 0, '2015-07-16 05:36:40');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(10, 2, 'Interior 4', 'Foto del interior del restaurante', 'imagen033_galeria6.jpg', 1, 0, '2015-07-16 05:37:13');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(11, 2, 'Comida 1', 'Ejemplo de comida ofrecida en el restaurante', 'imagen119_galeria21.jpg', 1, 0, '2015-07-16 05:38:39');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(12, 2, 'Comida 2', 'Ejemplo de comida ofrecida en el restaurante', 'imagen135_galeria22.jpg', 1, 0, '2015-07-16 05:38:55');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(13, 2, 'Comida 3', 'Ejemplo de comida ofrecida en el restaurante', 'imagen144_galeria27.jpg', 1, 0, '2015-07-16 05:39:04');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(14, 3, 'Fachada', 'Fachada del restaurante Sigue al conejo blanco', '838_photo_11916_1.jpg', 1, 1, '2015-07-16 23:20:55');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(15, 3, 'Interior', 'Interior del restaurante', '890_photo_11916_2.jpg', 1, 1, '2015-07-16 23:21:48');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(16, 3, 'Cerveza', 'Cervezas servidas en el restaurante', '910_photo_11916_3.jpg', 1, 1, '2015-07-16 23:22:09');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(17, 3, 'Comida', 'Comidas servidas en el restaurante', '924_photo_11916_4.jpg', 1, 1, '2015-07-16 23:22:11');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(18, 4, 'Interior 1', 'Interior del bar', '410_photo_10514_2.jpg', 1, 1, '2015-07-16 23:30:13');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(19, 4, 'Interior 2', 'Interior del bar', '426_photo_10514_3.jpg', 1, 1, '2015-07-16 23:30:52');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(20, 4, 'Cóctel', 'Cóctel', '448_photo_10514_4.jpg', 1, 1, '2015-07-16 23:30:54');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(21, 5, 'Interior', 'Interior del bar', '915_photo_10636_2.jpg', 1, 1, '2015-07-16 23:39:23');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(22, 5, 'Interior 2', 'Interior del bar', '931_photo_10636_3.jpg', 1, 1, '2015-07-16 23:39:21');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(23, 5, 'Cocktail', 'Ejemplo de Cocktail ofrecido en Franks', '957_photo_10636_4.jpg', 1, 1, '2015-07-16 23:39:19');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(24, 6, 'Fachada', 'Fachada del lugar', '137_photo_10878_1.jpg', 1, 1, '2015-07-16 23:59:00');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(25, 6, 'Interior 1', 'Interior del restaurante', '218_photo_10878_2.jpg', 1, 1, '2015-07-17 00:00:20');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(26, 6, 'Interior 2', 'Interior del restaurante', '235_photo_10878_3.jpg', 1, 1, '2015-07-17 00:04:15');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(27, 6, 'Comida', 'Ejemplo de comida servida en el restaurante', '451_photo_10878_4.jpg', 1, 1, '2015-07-17 00:04:18');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(28, 7, 'Interior 1', 'Interior del restaurante', '965_photo_13716_1.jpg', 1, 1, '2015-07-17 02:09:28');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(29, 7, 'Interior 2', 'Interior del reataurante', '986_photo_13716_2.jpg', 1, 1, '2015-07-17 02:09:51');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(30, 7, 'Interior 3', 'Interior del restaurante', '023_photo_13716_3.jpg', 1, 1, '2015-07-17 02:13:56');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(31, 7, 'Comida', 'Ejemplo de comida servida en el restaurante.', '040_photo_13716_4.jpg', 1, 1, '2015-07-17 02:13:58');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(32, 8, 'Entrada', 'Entrada del restaurante', '402_photo_12032_1.jpg', 1, 1, '2015-07-17 02:19:16');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(33, 8, 'Interior 1', 'Interior del restaurante', '438_photo_12032_2.jpg', 1, 1, '2015-07-17 02:20:43');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(34, 8, 'Imagen 3', 'Imagen 3', '459_photo_12032_3.jpg', 1, 1, '2015-07-17 02:20:56');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(35, 8, 'Detalle de plato', 'Detalle de plato', '472_photo_12032_4.jpg', 1, 1, '2015-07-17 02:20:54');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(36, 9, 'Entrada', 'Entrada del bar', '261_photo_11460_1.jpg', 1, 1, '2015-07-17 02:40:19');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(37, 9, 'Interior 1', 'Interior del bar', '276_photo_11460_2.jpg', 1, 1, '2015-07-17 02:31:47');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(38, 9, 'Interior 2', 'Interior del bar', '286_photo_11460_2.jpg', 1, 1, '2015-07-17 02:31:48');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(39, 9, 'Interior 3', 'Interior del bar', '295_photo_11460_3.jpg', 1, 1, '2015-07-17 02:31:50');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(40, 9, 'Interior 4', 'Interior del bar', '304_photo_11460_4.jpg', 0, 1, '2015-07-17 02:45:29');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(41, 9, 'Interior 4', 'Interior del bar', '150_photo_11460_4.jpg', 1, 0, '2015-07-17 02:45:50');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(42, 10, 'Entrada', 'Entrada del restaurante', '012_photo_198_1.jpg', 1, 1, '2015-07-17 03:01:07');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(43, 10, 'Interior 1', 'Interior del restaurante', '027_photo_198_2.jpg', 1, 1, '2015-07-17 03:01:05');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(44, 10, 'Interior 2', 'Interior del restaurante', '041_photo_198_3.jpg', 1, 1, '2015-07-17 03:01:03');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(45, 10, 'Plato', 'Ejemplo de plato servido por el restaurante', '059_photo_198_4.jpg', 1, 1, '2015-07-17 03:01:01');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(46, 11, 'Entrada', 'Entrada del restaurante', '846_photo_6374_1.jpg', 1, 1, '2015-07-17 03:14:36');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(47, 11, 'Interior 1', 'Interior del restaurante 1', '862_photo_6374_2.jpg', 1, 1, '2015-07-17 03:14:39');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(48, 11, 'Interior 2', 'Interior del restaurante 2', '874_photo_6374_3.jpg', 1, 1, '2015-07-17 03:14:41');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(49, 11, 'Interior 3', 'Interior 3', '896_photo_6374_4.jpg', 1, 0, '2015-07-17 03:14:56');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(50, 13, 'Entrada día', 'Entrada de día', '700_l(7).jpg', 1, 1, '2015-07-17 17:22:54');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(51, 13, 'Entrada noche', 'Entrada de noche', '712_l(4).jpg', 1, 0, '2015-07-17 17:21:52');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(52, 13, 'Pizza 1', 'Ejemplo de pizza servida', '739_o.jpg', 1, 1, '2015-07-17 17:22:56');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(53, 13, 'Pizza 2', 'Ejemplo de pizza servida', '757_l(2).jpg', 1, 1, '2015-07-17 17:22:58');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(54, 13, 'Empanadas', 'Ejemplo de empanadas servidas', '769_l(1).jpg', 1, 1, '2015-07-17 17:23:01');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(55, 13, 'Interior', 'Detalles del interior', '838_l(6).jpg', 1, 0, '2015-07-17 17:23:58');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(56, 15, 'Interior 1', 'Interior del restaurante', '040_photo_3998_2.jpg', 1, 1, '2015-07-17 19:25:04');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(57, 15, 'Interior 2', 'Interior del restaurante', '082_photo_3998_3.jpg', 1, 1, '2015-07-17 19:25:09');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(58, 15, 'Plato', 'Ejemplo de plato servido en el restaurante.', '102_photo_3998_4.jpg', 1, 1, '2015-07-17 19:25:11');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(59, 16, 'Interior 1', 'Interior del restaurante', '379_photo_5132_2.jpg', 1, 0, '2015-07-17 19:29:39');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(60, 16, 'Interior 2', 'Interior del restaurante', '389_photo_5132_3.jpg', 1, 0, '2015-07-17 19:29:49');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(61, 16, 'Plato', 'Ejemplo de plato servido por el restaurante', '403_photo_5132_4.jpg', 1, 0, '2015-07-17 19:30:03');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(62, 17, 'Exterior', 'Exterior del negocio', '907_photo_1961_1.jpg', 1, 1, '2015-07-17 19:39:33');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(63, 17, 'Interior 1', 'Interior del restaurante', '936_photo_1961_2.jpg', 1, 1, '2015-07-17 19:39:31');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(64, 17, 'Interior 2', 'Interior del restaurante', '948_photo_1961_3.jpg', 1, 1, '2015-07-17 19:39:29');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(65, 17, 'Plato', 'Ejemplo de plato servido por el restaurante', '961_photo_1961_4.jpg', 1, 1, '2015-07-17 19:39:27');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(66, 18, 'Interior 1', 'Interior del restaurante', '740_photo_15344_1.jpg', 1, 1, '2015-07-17 19:53:07');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(67, 18, 'Interior 2', 'Interior del restaurante', '749_photo_15344_2.jpg', 1, 1, '2015-07-17 19:53:05');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(68, 18, 'Plato 1', 'Ejemplo de plato servido por el restaurante', '765_photo_15344_3.jpg', 1, 1, '2015-07-17 19:52:58');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(69, 18, 'Plato 2', 'Ejemplo de plato servido por el restaurante', '772_photo_15344_4.jpg', 0, 1, '2015-07-17 19:53:03');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(70, 20, 'Entrada', 'Entrada al restaurante', '118_photo_6731_1.jpg', 1, 1, '2015-07-17 20:32:02');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(71, 20, 'Interior 1', 'Interior del restaurante', '143_photo_6731_2.jpg', 1, 1, '2015-07-17 20:33:51');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(72, 20, 'Interior 2', 'Interior del restaurante', '154_photo_6731_3.jpg', 1, 0, '2015-07-17 20:32:34');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(73, 20, 'Interior 3', 'Interior del restaurante', '164_photo_6731_4.jpg', 1, 1, '2015-07-17 20:33:55');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(74, 21, 'Entrada', 'Entrada', '814_photo_6116_1.jpg', 1, 1, '2015-07-17 20:44:27');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(75, 21, 'Foto 1', 'Foto 1', '821_photo_6116_2.jpg', 1, 1, '2015-07-17 20:44:25');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(76, 21, 'Interior 1', 'Interior del restaurante', '843_photo_6116_3.jpg', 1, 1, '2015-07-17 20:44:23');
INSERT INTO `Imagen_rel_empresa` (`id`, `idempresa`, `titulo`, `descripcion`, `link_imagen`, `estado`, `habilitado`, `fecha`) VALUES(77, 21, 'Mesa', 'Mesa', '859_photo_6116_4.jpg', 1, 1, '2015-07-17 20:44:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rubro`
--

CREATE TABLE IF NOT EXISTS `Rubro` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `icono` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Rubro`
--

INSERT INTO `Rubro` (`id`, `descripcion`, `icono`, `estado`, `habilitado`) VALUES(1, 'Restaurantes', 'imagen409_restaurant.png', 1, 1);
INSERT INTO `Rubro` (`id`, `descripcion`, `icono`, `estado`, `habilitado`) VALUES(2, 'Bares', 'imagen704_bar.png', 1, 1);
INSERT INTO `Rubro` (`id`, `descripcion`, `icono`, `estado`, `habilitado`) VALUES(3, 'Estacionamientos', 'imagen728_parkinggarage.png', 0, 1);
INSERT INTO `Rubro` (`id`, `descripcion`, `icono`, `estado`, `habilitado`) VALUES(4, 'Pizzerías', 'imagen517_pizzaria.png', 1, 1);
INSERT INTO `Rubro` (`id`, `descripcion`, `icono`, `estado`, `habilitado`) VALUES(5, 'Estacionamientos', 'imagen366_parkinggarage.png', 1, 0);
INSERT INTO `Rubro` (`id`, `descripcion`, `icono`, `estado`, `habilitado`) VALUES(6, 'Cafés', 'imagen381_coffee.png', 1, 1);
INSERT INTO `Rubro` (`id`, `descripcion`, `icono`, `estado`, `habilitado`) VALUES(7, 'Música', 'imagen401_music.png', 1, 0);
INSERT INTO `Rubro` (`id`, `descripcion`, `icono`, `estado`, `habilitado`) VALUES(8, 'Zapaterías', 'imagen435_shoes.png', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `nombre`, `email`, `pw`, `telefono`, `direccion`, `estado`, `fecha`) VALUES(1, 'César Rastelli', 'admin@admin.com', '91f5167c34c400758115c2a6826ec2e3', '1511111111', 'Av. Congreso 1050', 1, '2015-04-25 03:39:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Video_rel_empresa`
--

CREATE TABLE IF NOT EXISTS `Video_rel_empresa` (
  `id` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Zona`
--

CREATE TABLE IF NOT EXISTS `Zona` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `lat_long` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `habilitado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Zona`
--

INSERT INTO `Zona` (`id`, `descripcion`, `lat_long`, `estado`, `habilitado`) VALUES(1, 'Recoleta', '-34.5858716, -58.39425460000001', 1, 1);
INSERT INTO `Zona` (`id`, `descripcion`, `lat_long`, `estado`, `habilitado`) VALUES(2, 'Palermo', '-34.5735384, -58.42262340000002', 1, 1);
INSERT INTO `Zona` (`id`, `descripcion`, `lat_long`, `estado`, `habilitado`) VALUES(3, 'Colegiales', '-34.5742627, -58.45151299999998', 1, 0);
INSERT INTO `Zona` (`id`, `descripcion`, `lat_long`, `estado`, `habilitado`) VALUES(4, 'Retiro', '-34.5906823, -58.37850950000001', 1, 1);
INSERT INTO `Zona` (`id`, `descripcion`, `lat_long`, `estado`, `habilitado`) VALUES(5, 'Montserrat', '-34.61240610000001, -58.379055300000005', 1, 0);
INSERT INTO `Zona` (`id`, `descripcion`, `lat_long`, `estado`, `habilitado`) VALUES(6, 'Puerto Madero', '-34.61442, -58.357709099999965', 1, 0);
INSERT INTO `Zona` (`id`, `descripcion`, `lat_long`, `estado`, `habilitado`) VALUES(7, 'San Telmo', '-34.6209112, -58.37136399999997', 1, 1);
INSERT INTO `Zona` (`id`, `descripcion`, `lat_long`, `estado`, `habilitado`) VALUES(8, 'Constitución', '-34.6245988, -58.383428500000036', 1, 1);
INSERT INTO `Zona` (`id`, `descripcion`, `lat_long`, `estado`, `habilitado`) VALUES(9, 'La Boca', '-34.6353802, -58.361604', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Calificacion_rel_empresa`
--
ALTER TABLE `Calificacion_rel_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idempresa` (`idempresa`);

--
-- Indices de la tabla `Empresa`
--
ALTER TABLE `Empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idzona` (`idzona`),
  ADD KEY `idzona_2` (`idzona`),
  ADD KEY `idrubro` (`idrubro`);

--
-- Indices de la tabla `Imagen_rel_empresa`
--
ALTER TABLE `Imagen_rel_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idempresa` (`idempresa`);

--
-- Indices de la tabla `Rubro`
--
ALTER TABLE `Rubro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Video_rel_empresa`
--
ALTER TABLE `Video_rel_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idempresa` (`idempresa`);

--
-- Indices de la tabla `Zona`
--
ALTER TABLE `Zona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Calificacion_rel_empresa`
--
ALTER TABLE `Calificacion_rel_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Empresa`
--
ALTER TABLE `Empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `Imagen_rel_empresa`
--
ALTER TABLE `Imagen_rel_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT de la tabla `Rubro`
--
ALTER TABLE `Rubro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Video_rel_empresa`
--
ALTER TABLE `Video_rel_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Zona`
--
ALTER TABLE `Zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
