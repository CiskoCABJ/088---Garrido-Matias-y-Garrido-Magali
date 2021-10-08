-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2021 a las 06:17:53
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe_web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(10) NOT NULL,
  `genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `genero`) VALUES
(1, 'Accion'),
(2, 'Drama'),
(3, 'Romanticas'),
(4, 'Terror'),
(5, 'Suspenso'),
(6, 'Ciencia Ficcion'),
(7, 'Comedia'),
(8, 'Infantiles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `duracion` int(3) NOT NULL,
  `reparto` varchar(200) NOT NULL,
  `img` varchar(100) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `estreno` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `descripcion`, `duracion`, `reparto`, `img`, `id_genero`, `estreno`) VALUES
(4, 'Parasite', 'Anto Gi Taek (Song Kang Ho) como su familia están sin trabajo. Cuando su hijo mayor, Gi Woo (Choi Woo Shik), empieza a recibir clases particulares en casa de Park (Lee Sun Gyun), las dos familias, que tienen mucho en común pese a pertenecer a dos mundos totalmente distintos, comienzan una interrelac', 132, 'Andreas Fronk, Anna Elisabeth Rihlmann, Chang Hyae-jin, Cho Yeo-jeong.', 'img\\parasite.jpg', 2, 2019),
(5, 'Toy Story 4', 'Las aventuras de este dúo tan carismático les obligarán de nuevo salir al extraño y gigantesco mundo exterior, en una nueva misión imposible. Con la ayuda de sus amigos, pondrán todo su empeño en cumplir su objetivo y volver a casa sanos y salvos. Protegiéndose y apoyándose unos en otros, juntos con', 90, 'Alan Oppenheimer, Ally Maki, Annie Potts, Betty White.', 'img\\toystory4.jpeg', 8, 2019),
(6, 'Godzilla vs Kong', 'Godzilla y Kong, dos de las fuerzas más poderosas de un planeta habitado por todo tipo de aterradoras criaturas, se enfrentan en un espectacular combate que sacude los cimientos de la humanidad. Monarch (Kyle Chandler) se embarca en una misión de alto riesgo y pone rumbo hacia territorios inexplorad', 113, 'Alexander Skarsgård, Benjamin Rigby, Brad McMurray, Bradd Buckley.', 'img\\godzilla.jpg', 6, 2021),
(7, 'Avengers Endgame', 'Tras los sucesos de “Vengadores: Infinity War”, los superhéroes que sobrevivieron a Thanos se reunen para poner en práctica un plan definitivo que podría acabar con el villano definitivamente. No saben si funcionará, pero es su única oportunidad de intentarlo. Cuarta entrega de la saga “Vengadores”', 182, 'Alexa Whitaker, Alexandra Rachael Rabe, Ami Fujimoto, Angela Bassett.', 'img\\avengersendgame.jpg', 6, 2019),
(8, 'Cowboys', 'Troy y su joven hijo transgénero Joe están huyendo de su madre conservadora en el desierto de Montana, con un detective en la persecución.', 83, 'Ann Dowd, Bob Stephenson, Chris Coy, Gary Farmer, Jillian Bell, John Beasley, John Reynolds, Sasha Knight, Steve Zahn', 'img\\Cowboys.jpg', 2, 2020),
(10, 'Land', 'Cuando su vida se ve sacudida por una serie de inesperados acontecimientos, Edee pierde la habilidad de conectar con el mundo y la gente que una vez la rodeó. Hastiada de su vida, decide retirarse a un bosque en las Montañas Rocosas con unos pocos víveres. Pese a que la belleza de su nuevo hogar es ', 89, 'Adam Quintero, Carlus Fábrega, Ferran Vilajosana, Liah O\'Prey, Lluís Soler', 'img\\land.jpg', 2, 2021),
(11, 'La Jauria', 'Un hombre despierta encadenado en el interior de un coche inhalando monóxido de carbono. Junto a él, hay tres hombres más, aparentemente muertos. Es la imagen del perfecto suicidio colectivo… si fuera un suicidio.', 74, 'Adam Quintero, Carlus Fábrega, Ferran Vilajosana, Liah O\'Prey, Lluís Soler', 'img\\lajauria.jpg', 2, 2019),
(13, 'Maligno', 'Madison es una mujer que tiene unas macabras pesadillas que la dejan completamente paralizada. Aterrada por lo que ve en ellas, Madison no consigue dormir por las noches ni vivir por el día. Pero el terror cada vez se irá apoderando de ella cuando descubra que esas pesadillas no son sueños.', 111, 'Amir Aboulela, Annabelle Wallis, Christina Veronica, George Young,', 'img\\maligno.jpg', 4, 2021),
(14, 'The Curse of Humpty Dumpty', 'Humpty Dumpty tuvo una gran caída, y ha vuelto en forma de muñeco que pertenece a una mujer con demencia que empieza a recordar su oscuro pasado.', 92, 'Antonia Johnstone, Antonia Whillans, Chris Cordell, Danielle Scott, Kate Milner Evans, Kate Sandison, Nicola Wright, Richard Harfst, Sian Altman', 'img\\HumptyDumpty.jpg', 4, 2021),
(15, 'Shrek 2', 'Cuando Shrek y la princesa Fiona regresan de su luna de miel, los padres de ella los invitan a visitar el reino de Muy Muy Lejano para celebrar la boda. Para Shrek, al que nunca abandona su fiel amigo Asno, esto constituye un gran problema. Los padres de Fiona, por su parte, no esperaban que su yerno tuviera un aspecto semejante y, mucho menos, que su hija hubiera cambiado tanto.', 93, 'Shrek', 'img\\Shrek2.jpg', 8, 2004),
(16, 'Capitana Marvel', 'La historia sigue a Carol Danvers mientras ella se convierte en uno de los héroes más poderosos del universo cuando la Tierra se encuentre atrapada en medio de una guerra galáctica entre dos razas alienígenas. Situada en los años 90, Captain Marvel es una historia nueva de un período de tiempo nunca antes visto en la historia del Universo Cinematográfico de Marvel.', 129, 'Abigaille Ozrey, Adam Hart, Akira Akbar, Algenis Perez Soto,', 'img\\CaptainMarvel.jpg', 6, 2019),
(17, 'IT : Capitulo 2', '27 años después, los ex-miembros del Club de los Perdedores, que crecieron y se mudaron lejos de Derry, vuelven a unirse tras una devastadora llamada telefónica.', 169, 'Andy Bean, Ari Cohen, Bill Hader, Bill Skarsgård,', 'img\\it2.jpg', 4, 2019),
(18, 'The Starling', 'Tras sufrir una pérdida, una mujer se las tiene que ver con un pájaro peleón que se ha apoderado de su jardín… y un marido que no encuentra la forma de seguir adelante.', 103, 'Chris O\'Dowd, Daveed Diggs, Don McManus, Edi Patterson.', '', 7, 2021),
(20, 'Harry Potter y la piedra filosofal', 'Harry Potter es un huérfano que vive con sus desagradables tíos, los Dursley, y su repelente primo Dudley. Pocos días antes de su cumpleaños, una serie de misteriosas cartas dirigidas a él y escritas con una estridente tinta verde rompen la monotonía de su vida: Harry es un mago y sus padres también lo eran.', 152, 'Adrian Rawlins, Alan Rickman, Alfred Enoch, Ben Borowiecki.', 'img\\harrypotterpiedra.jpg', 6, 2001),
(21, 'Un pequeño contratiempo', 'Teddy se despierta la mañana después de su boda para descubrir que ha avanzado un año en su vida hasta su primer aniversario. Atrapado en un ciclo interminable de saltos en el tiempo, transportado un año más cada pocos minutos, se enfrenta a una carrera contrarreloj mientras su vida se desmorona a su alrededor.', 90, 'Dena Kaplan, Josh Lawson, Noni Hazlehurst, Rafe Spall, Ronny Chieng, Zahra Newman.', 'img\\unpequeñocontratiempo.jpg', 3, 2021),
(22, 'Long Weekend', 'Un escritor que pasa por un bache conoce a una enigmática mujer que entra en su vida justo en el momento adecuado.', 91, ' Casey Wilson, Damon Wayans Jr., Finn Wittrock, Jim Rash, Wendi McLendon-Covey, Zoe Chao.', 'img\\longweekend.jpg', 3, 2021),
(23, 'It Takes Three', 'Cuando Chris, el chico más guay de la escuela, descubre que Roxy ve a través de su popularidad y su buena apariencia, alista a Cy para que le haga un catfish inverso, dejándole tomar el control de sus cuentas de redes sociales para añadir sustancia a su estilo.', 90, 'Anya Marina, Aurora Perrineau, Blair Mastbaum, Brandon Papo.', 'img\\ittakesthree.jpg', 7, 2021),
(24, 'Into the Waves', 'Dos hermanos atraviesan Tasmania en autostop para llegar al funeral de su madre.', 75, 'Mike Booth, Philippe Klaus.', 'img\\intothewaves.jpg', 2, 2020),
(25, 'Saving Paradise', 'Un despiadado atracador de empresas se ve obligado a volver a sus raíces en un pequeño pueblo donde, de repente, hereda la fábrica de lápices de su padre, casi en quiebra, que es el corazón y el alma de la deprimida comunidad. Con el plazo de ejecución hipotecaria a la vista, debe decidir si deja que cierre o se une a la lucha de la comunidad para salvarla.', 102, 'Andrew Patrick Ralston, Bill Cobbs, James Eckhouse, Johanna Braddy.', 'img\\Savingparadise.jpg', 2, 2021),
(26, 'Naufrago', 'Chuck Noland, un ejecutivo de la empresa multinacional de mensajería FedEx, se ve apartado de su cómoda vida y de su prometida a causa de un accidente de avión que lo deja aislado de la civilización en una remota isla tropical en medio del océano.', 143, 'Tom Hanks, Helen Hunt, Nick Searcy, Chris Noth, Lari White, Geoffrey Blake, Paul Sanchez, Jenifer Lewis.', 'img\\naufrago.jpg', 2, 2000),
(27, 'Cruella', 'Londres, años 70. Decidida a convertirse en una exitosa diseñadora de moda, una joven y creativa estafadora llamada Estella (Emma Stone) se asocia con un par de ladrones para sobrevivir en las calles de la capital británica.', 134, 'Emma Stone, Emma Thompson, Joel Fry, Paul Walter Hauser, John McCrea, Emily Beecham, Mark Strong, Kayvan Novak, Kirby Howell-Baptiste', 'img\\cruella.jpg', 7, 2021),
(28, 'The Hangover', 'Historia de una desmadrada despedida de soltero en la que el novio y tres amigos se montan una gran juerga en Las Vegas. Como era de esperar, a la mañana siguiente tienen una resaca tan monumental que no pueden recordar nada de lo ocurrido la noche anterior.', 100, 'Bradley Cooper, Ed Helms, Zach Galifianakis, Justin Bartha, Heather Graham, Sasha Barrese, Jeffrey Tambor', 'img\\hangover.jpg', 7, 2009),
(29, 'Siete Almas', 'Ben Thomas (Will Smith), un inspector de Hacienda de Los Ángeles, se pone en contacto con algunas personas para ayudarlas, pero las razones que lo mueven a actuar así son un misterio. Sin embargo, cuando conoce a Emily Posa (Rosario Dawson), una joven enferma investigada por hacienda y empieza a sentirse atraído por ella, sus inconfesables planes se tambalean. ', 118, 'Will Smith, Rosario Dawson, Woody Harrelson, Barry Pepper, Elpidia Carrillo, Connor Cruise, Michael Ealy, Robinne Lee.', 'img\\sietealmas.jpg', 2, 2008),
(31, 'Focus', 'Un veterano estafador acoge a una atractiva joven bajo su protectorado, pero las cosas se complican cuando ambos comienzan un romance. ', 104, 'Will Smith, Margot Robbie, Rodrigo Santoro, Stephanie Honore, BD Wong, Adrian Martinez, Robert Taylor.', 'img\\focus.jpg', 7, 2015),
(32, 'I am  Legend', 'Año 2012. Robert Neville (Will Smith) es el último hombre vivo que hay sobre la Tierra, pero no está solo. Los demás seres humanos se han convertido en vampiros y todos ansían beber su sangre. ', 100, 'Will Smith, Alice Braga, Salli Richardson-Whitfield, Paradox Pollack, Charlie Tahan, Darrell Foster, Emma Thompson, Courtney Munch, Willow Smith.', 'img\\soyleyenda.jpg', 6, 2007),
(33, 'Spirit: El indomable', 'La vida de Lucky Prescott cambia para siempre cuando se muda de su casa en la gran ciudad a un pequeño pueblo fronterizo en el que entabla amistad con un caballo salvaje llamado Spirit.', 87, 'Animación.', 'img\\spirit.jpg', 8, 2021),
(34, 'La Era de Hielo', 'Hace muchos, muchos años, tantos como 20.000, una pequeña ardirata de nombre Scrat quería esconder una bellota en el hielo. Pero lo que hace es provocar una semicatástrofe que provoca que todos los animales migren hacia el sur, hacia tierras más cálidas.', 83, 'Animacion.', 'img\\laeradehielo.jpg', 8, 2002);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(400) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_genero` (`id_genero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `tipo_genero` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
