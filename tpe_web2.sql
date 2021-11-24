-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 16:31:50
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
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `id_pelicula` int(10) NOT NULL,
  `calificacion` int(1) NOT NULL,
  `comentario` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `usuario`, `id_pelicula`, `calificacion`, `comentario`) VALUES
(18, 'MatiasGarrido', 6, 3, 'otra vez yo'),
(30, '2', 6, 3, 'sdfff'),
(31, '1', 6, 2, 'asd'),
(32, '1', 6, 2, 'asdaa'),
(33, '1', 6, 2, 'seeii'),
(34, '1', 6, 5, 'asd'),
(36, 'autologin', 6, 1, 'asd'),
(38, '2', 6, 3, 'anda'),
(40, '2', 6, 3, 'asfasf'),
(42, '1', 7, 5, 'Excelente!!! '),
(43, '1', 5, 4, 'Esta buena, es divertida'),
(44, '2', 14, 2, 'No me gusto mucho'),
(45, 'Reni', 14, 3, 'Hay mejores seguro'),
(46, 'Reni', 7, 5, 'Perfecta!! la volveria a ver'),
(47, '2', 7, 4, 'Muy buena como siempre!!'),
(48, 'Roco', 14, 4, 'No es de las mejores pero esta buena'),
(49, 'Roco', 7, 5, 'Me gusto'),
(50, 'Roco', 5, 4, 'Buenaa'),
(51, '1', 27, 5, 'Muy buenaa'),
(52, '1', 8, 4, 'safaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`genero`) VALUES
('Accion'),
('Ciencia Ficcion'),
('Comedia'),
('Drama'),
('Infantil'),
('Romance'),
('Suspenso'),
('Terror');

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
  `genero` varchar(100) NOT NULL,
  `estreno` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `descripcion`, `duracion`, `reparto`, `img`, `genero`, `estreno`) VALUES
(5, 'Toy Story 4', 'Las aventuras de este dúo tan carismático les obligarán de nuevo salir al extraño y gigantesco mundo exterior, en una nueva misión imposible. Con la ayuda de sus amigos, pondrán todo su empeño en cumplir su objetivo y volver a casa sanos y salvos. Protegiéndose y apoyándose unos en otros, juntos con', 90, 'Alan Oppenheimer, Ally Maki, Annie Potts, Betty White.', 'img/toystory4.jpeg', 'Infantil', 2019),
(6, 'Godzilla vs Kong', 'Godzilla y Kong, dos de las fuerzas más poderosas de un planeta habitado por todo tipo de aterradoras criaturas, se enfrentan en un espectacular combate que sacude los cimientos de la humanidad.', 113, 'Alexander Skarsgård, Benjamin Rigby, Brad McMurray, Bradd Buckley.', 'img/godzilla.jpg', 'Ciencia Ficcion', 2021),
(7, 'Avengers Endgame', 'Tras los sucesos de “Vengadores: Infinity War”, los superhéroes que sobrevivieron a Thanos se reunen para poner en práctica un plan definitivo que podría acabar con el villano definitivamente. No saben si funcionará, pero es su única oportunidad de intentarlo. Cuarta entrega de la saga “Vengadores”', 182, 'Alexa Whitaker, Alexandra Rachael Rabe, Ami Fujimoto, Angela Bassett.', 'img/avengersendgame.jpg', 'Ciencia Ficcion', 2019),
(8, 'Cowboys', 'Troy y su joven hijo transgénero Joe están huyendo de su madre conservadora en el desierto de Montana, con un detective en la persecución.', 83, 'Ann Dowd, Bob Stephenson, Chris Coy, Gary Farmer, Jillian Bell, John Beasley, John Reynolds, Sasha Knight, Steve Zahn', 'img/Cowboys.jpg', 'Drama', 2020),
(14, 'Curse of Humpty Dumpty', 'Humpty Dumpty tuvo una gran caída, y ha vuelto en forma de muñeco que pertenece a una mujer con demencia que empieza a recordar su oscuro pasado.', 92, 'Antonia Johnstone, Antonia Whillans, Chris Cordell, Danielle Scott, Kate Milner Evans, Kate Sandison, Nicola Wright, Richard Harfst, Sian Altman', 'img/HumptyDumpty.jpg', 'Terror', 2021),
(15, 'Shrek 2', 'Cuando Shrek y la princesa Fiona regresan de su luna de miel, los padres de ella los invitan a visitar el reino de Muy Muy Lejano para celebrar la boda. Para Shrek, al que nunca abandona su fiel amigo Asno, esto constituye un gran problema. Los padres de Fiona, por su parte, no esperaban que su yerno tuviera un aspecto semejante y, mucho menos, que su hija hubiera cambiado tanto.', 93, 'Shrek', 'img/Shrek2.jpg', 'Infantil', 2004),
(16, 'Capitana Marvel', 'La historia sigue a Carol Danvers mientras ella se convierte en uno de los héroes más poderosos del universo cuando la Tierra se encuentre atrapada en medio de una guerra galáctica entre dos razas alienígenas. Situada en los años 90, Captain Marvel es una historia nueva de un período de tiempo nunca antes visto en la historia del Universo Cinematográfico de Marvel.', 129, 'Abigaille Ozrey, Adam Hart, Akira Akbar, Algenis Perez Soto,', 'img/CaptainMarvel.jpg', 'Accion', 2019),
(17, 'IT : Capitulo 2', '27 años después, los ex-miembros del Club de los Perdedores, que crecieron y se mudaron lejos de Derry, vuelven a unirse tras una devastadora llamada telefónica.', 169, 'Andy Bean, Ari Cohen, Bill Hader, Bill Skarsgård,', 'img/it2.jpg', 'Terror', 2019),
(18, 'The Starling', 'Tras sufrir una pérdida, una mujer se las tiene que ver con un pájaro peleón que se ha apoderado de su jardín… y un marido que no encuentra la forma de seguir adelante.', 103, 'Chris ODowd, Daveed Diggs, Don McManus, Edi Patterson.', 'img/thestarling.jpg', 'Drama', 2021),
(20, 'Harry Potter y la piedra filosofal', 'Harry Potter es un huérfano que vive con sus desagradables tíos, los Dursley, y su repelente primo Dudley. Pocos días antes de su cumpleaños, una serie de misteriosas cartas dirigidas a él y escritas con una estridente tinta verde rompen la monotonía de su vida: Harry es un mago y sus padres también lo eran.', 152, 'Adrian Rawlins, Alan Rickman, Alfred Enoch, Ben Borowiecki.', 'img/harrypotterpiedra.jpg', 'Ciencia Ficcion', 2001),
(21, 'Un pequeño contratiempo', 'Teddy se despierta la mañana después de su boda para descubrir que ha avanzado un año en su vida hasta su primer aniversario. Atrapado en un ciclo interminable de saltos en el tiempo, transportado un año más cada pocos minutos, se enfrenta a una carrera contrarreloj mientras su vida se desmorona a su alrededor.', 90, 'Dena Kaplan, Josh Lawson, Noni Hazlehurst, Rafe Spall, Ronny Chieng, Zahra Newman.', 'img/unpequeñocontratiempo.jpg', 'Comedia', 2021),
(23, 'It Takes Three', 'Cuando Chris, el chico más guay de la escuela, descubre que Roxy ve a través de su popularidad y su buena apariencia, alista a Cy para que le haga un catfish inverso, dejándole tomar el control de sus cuentas de redes sociales para añadir sustancia a su estilo.', 90, 'Anya Marina, Aurora Perrineau, Blair Mastbaum, Brandon Papo.', 'img/ittakesthree.jpg', 'Comedia', 2021),
(24, 'Into the Waves', 'Dos hermanos atraviesan Tasmania en autostop para llegar al funeral de su madre.', 75, 'Mike Booth, Philippe Klaus.', 'img/intothewaves.jpg', 'Drama', 2020),
(25, 'Saving Paradise', 'Un despiadado atracador de empresas se ve obligado a volver a sus raíces en un pequeño pueblo donde, de repente, hereda la fábrica de lápices de su padre, casi en quiebra, que es el corazón y el alma de la deprimida comunidad. Con el plazo de ejecución hipotecaria a la vista, debe decidir si deja que cierre o se une a la lucha de la comunidad para salvarla.', 102, 'Andrew Patrick Ralston, Bill Cobbs, James Eckhouse, Johanna Braddy.', 'img/Savingparadise.jpg', 'Romance', 2021),
(26, 'Naufrago', 'Chuck Noland, un ejecutivo de la empresa multinacional de mensajería FedEx, se ve apartado de su cómoda vida y de su prometida a causa de un accidente de avión que lo deja aislado de la civilización en una remota isla tropical en medio del océano.', 143, 'Tom Hanks, Helen Hunt, Nick Searcy, Chris Noth, Lari White, Geoffrey Blake, Paul Sanchez, Jenifer Lewis.', 'img/naufrago.jpg', 'Drama', 2000),
(27, 'Cruella', 'Londres, años 70. Decidida a convertirse en una exitosa diseñadora de moda, una joven y creativa estafadora llamada Estella (Emma Stone) se asocia con un par de ladrones para sobrevivir en las calles de la capital británica.', 134, 'Emma Stone, Emma Thompson, Joel Fry, Paul Walter Hauser, John McCrea, Emily Beecham, Mark Strong, Kayvan Novak, Kirby Howell-Baptiste', 'img/cruella.jpg', 'Drama', 2021),
(28, 'The Hangover', 'Historia de una desmadrada despedida de soltero en la que el novio y tres amigos se montan una gran juerga en Las Vegas. Como era de esperar, a la mañana siguiente tienen una resaca tan monumental que no pueden recordar nada de lo ocurrido la noche anterior.', 100, 'Bradley Cooper, Ed Helms, Zach Galifianakis, Justin Bartha, Heather Graham, Sasha Barrese, Jeffrey Tambor', 'img/hangover.jpg', 'Comedia', 2009),
(29, 'Siete Almas', 'Ben Thomas (Will Smith), un inspector de Hacienda de Los Ángeles, se pone en contacto con algunas personas para ayudarlas, pero las razones que lo mueven a actuar así son un misterio. Sin embargo, cuando conoce a Emily Posa (Rosario Dawson), una joven enferma investigada por hacienda y empieza a sentirse atraído por ella, sus inconfesables planes se tambalean. ', 118, 'Will Smith, Rosario Dawson, Woody Harrelson, Barry Pepper, Elpidia Carrillo, Connor Cruise, Michael Ealy, Robinne Lee.', 'img/sietealmas.jpg', 'Drama', 2008),
(31, 'Focus', 'Un veterano estafador acoge a una atractiva joven bajo su protectorado, pero las cosas se complican cuando ambos comienzan un romance. ', 104, 'Will Smith, Margot Robbie, Rodrigo Santoro, Stephanie Honore, BD Wong, Adrian Martinez, Robert Taylor.', 'img\\focus.jpg', 'Accion', 2015),
(32, 'I am  Legend', 'Año 2012. Robert Neville (Will Smith) es el último hombre vivo que hay sobre la Tierra, pero no está solo. Los demás seres humanos se han convertido en vampiros y todos ansían beber su sangre. ', 100, 'Will Smith, Alice Braga, Salli Richardson-Whitfield, Paradox Pollack, Charlie Tahan, Darrell Foster, Emma Thompson, Courtney Munch, Willow Smith.', 'img/soyleyenda.jpg', 'Drama', 2007),
(33, 'Spirit: El indomable', 'La vida de Lucky Prescott cambia para siempre cuando se muda de su casa en la gran ciudad a un pequeño pueblo fronterizo en el que entabla amistad con un caballo salvaje llamado Spirit.', 87, 'Animación.', 'img/spirit.jpg', 'Infantil', 2021),
(34, 'La Era de Hielo', 'Hace muchos, muchos años, tantos como 20.000, una pequeña ardirata de nombre Scrat quería esconder una bellota en el hielo. Pero lo que hace es provocar una semicatástrofe que provoca que todos los animales migren hacia el sur, hacia tierras más cálidas.', 83, 'Animacion.', 'img/laeradehielo.jpg', 'Infantil', 2002),
(37, 'Emma', 'Guapa, inteligente y rica, la joven Emma Woodhouse es una reina sin rival en su pequeño pueblo. Nueva adaptación de la novela de Jane Austen publicada en 1815 sobre la vida de la joven Emma.', 124, 'Anya Taylor-Joy, Angus Imrie, Letty Thomas, Gemma Whelan, Bill Nighy.', 'img/emma.jpg', 'Romance', 2020),
(38, 'Yo antes de ti', 'Louisa “Lou” Clark (Emilia Clarke), una chica inestable y creativa, reside en un pequeño pueblo de la campiña inglesa. Vive sin rumbo y va de un trabajo a otro para ayudar a su familia a llegar a fin de mes.', 110, 'Emilia Clarke, Sam Claflin, Matthew Lewis, Charles Dance, Vanessa Kirby.', 'img/mebeforeyou.jpg', 'Romance', 2016),
(39, 'Aliados', 'Año 1942 en el protectorado francés de Marruecos, durante la Segunda Guerra Mundial. Max (Brad Pitt) es un espía canadiense del bando aliado que llega a Casablanca y se hace pasar por marido de Marianne.', 124, 'Brad Pitt, Marion Cotillard, Jared Harris, Daniel Betts, Lizzy Caplan, August Diehl.', 'img/aliados.jpg', 'Drama', 2016),
(40, 'Comer, rezar, amar', 'Tras varios fracasos sentimentales, una mujer decide encontrarse a sí misma a través de un viaje por Italia, la India, Bali e Indonesia. Liz Gilbert (Julia Roberts) tenía todo lo que una mujer puede soñar, un marido, una casa y una brillante carrera, pero se encontraba perdida, confusa, insatisfecha.', 146, 'Julia Roberts, Javier Bardem, Billy Crudup, James Franco, Richard Jenkins.', 'img/comerrezaramar.jpg', 'Romance', 2010),
(41, 'Relatos Salvajes', 'La película consta de seis episodios que alternan la intriga, la comedia y la violencia. Sus personajes se verán empujados hacia el abismo y hacia el innegable placer de perder el control, cruzando la delgada línea que separa la civilización de la barbarie.', 119, 'Ricardo Darín, Darío Grandinetti, Leonardo Sbaraglia, Érica Rivas, Oscar Martínez.', 'img/relatossalvajes.jpg', 'Drama', 2014),
(42, 'Hotel Transylvania 4', 'Drac se enfrentará a una de las situaciones más aterradoras vividas hasta el momento. Cuando el misterioso invento de Van Helsing, el \"Rayo Monstrificador\", se vuelve totalmente fuera de control, Drac y sus monstruosos amigos se transforman en humanos, ¡y Johnny se convierte en un monstruo! ', 124, 'Animacion', 'img/HotelTransylvania4.jpg', 'Infantil', 2021),
(43, 'Hunted', 'Cuando Eve conoce a un chico en un bar, poco se espera lo que va a suceder esa noche. En realidad, se ha cruzado con un psicópata (y su muñeco), con el que se enzarza en una persecución nocturna y violenta. ', 87, 'Arieh Worthalter , Lucie Debay , Kevin van Doorslaer', 'img/hunted.jpg', 'Accion', 2021),
(45, 'Last Man Down', 'Después de que la civilización sucumbe a una pandemia mortal y su esposa es asesinada, un soldado de las fuerzas especiales abandona su deber y se convierte en un ermitaño en el desierto nórdico', 87, 'Daniel Stisen , Olga Kent , Daniel Nehme.', 'img/lastmandown.jpg', 'Accion', 2021),
(46, 'La familia Addams 2', 'Los Addams se ven envueltos en más aventuras descabelladas y en divertidos encontronazos con todo tipo de personajes desprevenidos.', 93, 'Oscar Isaac , Charlize Theron , Chloë Grace Moretz', 'img/lafamiliaaddams2.jpg', 'Comedia', 2021),
(47, 'Sin tiempo para morir', 'En ‘No Time to Die’, James Bond (Daniel Craig) se encuentra disfrutando de unas merecidas vacaciones en Jamaica. Sin embargo, su paz termina cuando su amigo de la CIA lo busca para una nueva misión.', 163, 'Daniel Craig , Rami Malek , Léa Seydoux', 'img/sintiempoparamorir.jpg', 'Accion', 2021),
(48, 'The Runners', 'uando su hermana pequeña es secuestrada en una fiesta posterior al regreso a casa en la zona rural del este de Texas, Ryan está en una carrera contrarreloj para salvarla.', 94, 'Micah Lyons , Joey Loomis , Netty Leach.', 'img/therunners.jpg', 'Accion', 2020),
(49, 'Madagascar', 'Alex el león es el rey de la selva urbana: es la atracción estelar del zoo neoyorquino de Central Park. ', 86, 'Ben Stiller , Chris Rock , David Schwimmer.', 'img/madagascar.jpg', 'Infantil', 2005),
(50, 'La Patrulla Canina', 'La patrulla canina está en racha. Cuando Humdinger, su mayor rival, se convierte en alcalde de la cercana Ciudad Aventura y empieza a causar estragos, Ryder y los heroicos cachorros se ponen en marcha para enfrentarlo.', 86, 'Iain Armitage , Will Brisbin , Ron Pardo.', 'img/lapatrullacanina.jpg', 'Infantil', 2021),
(51, 'Monsters Inc.', 'Monsters es la mayor empresa de miedo del mundo de los monstruos y James P. Sullivan es uno de sus mejores Asustadores. ', 93, 'Henry Barrial , Mark Pellegrino , Stephanie Bennett.', 'img/monsterinc.jpg', 'Infantil', 2001),
(52, 'Hombres de Negro 1', 'Durante muchos años los extraterrestres han vivido en la Tierra, mezclados con los humanos, sin que nadie lo supiese. Los Hombres de Negro son unos agentes, pertenecientes a una asociación altamente secreta del gobierno', 94, 'Linda Fiorentino , Tommy Lee Jones , Vincent D\'Onofrio.', 'img/hombresdenegro1.jpg', 'Accion', 1997),
(53, 'Amigos Pasajeros', 'Marcus y Emily hacen amistad en un resort de México con Ron y Kyla, una pareja de locos fiesteros.', 103, 'John Cena , Lil Rel Howery , Meredith Hagner.', 'img/amigospasajeros.jpg', 'Comedia', 2021),
(54, 'Free Guy', 'Un trabajador de un banco descubre que en realidad es un jugador dentro de un videojuego.', 115, 'Ryan Reynolds , Jodie Comer , Lil Rel Howery.', 'img/freeguy.jpg', 'Comedia', 2021),
(55, 'Padres Adoptivos', 'Cuando su hija decide divorciarse, Coline y Andre no pueden aceptarlo porque quieren mucho a su yerno. La única forma de seguir viéndolo es en secreto. Pero, ¿durante cuánto tiempo pueden llevar una doble vida?', 83, 'Josiane Balasko , Didier Bourdon , Bénabar.', 'img/padresadoptivos.jpg', 'Comedia', 2019),
(56, 'Plan B', 'Después de un lamentable primer encuentro sexual, una estudiante de secundaria y su mejor amiga tienen 24 horas para buscar una píldora del Plan B en el corazón de Estados Unidos.', 107, 'Kuhoo Verma , Victoria Moroles , Michael Provost.', 'img/planb.jpg', 'Comedia', 2021),
(57, 'En guerra con mi abuelo', 'El joven Peter se ve obligado a abandonar su habitación cuando su abuelo Ed, recientemente enviudado, se muda a su casa. ', 94, 'Cheech Marin , Christopher Walken , Colin Ford.', 'img/enguerraconmiabuelo.jpg', 'Comedia', 2020),
(59, 'John Wick: Otro Día Para Matar', 'La ciudad de Nueva York se convierte en el patio acribillado a balazos de un ex-asesino mientras él elimina a los gánsteres que destruyeron todo lo que él quería.', 101, 'Keanu Reeves , Michael Nyqvist , Alfie Allen.', 'img/johnwick.jpg', 'Accion', 2014),
(60, 'Rio 2', 'En “Río 2\", Blu, Perla y sus tres hijos llevan una vida perfecta. Cuando Perla decide que los niños tienen que aprender a vivir como auténticas aves, insiste en que la familia se aventure a viajar al Amazonas.', 101, 'Carlinhos Brown , Jake T. Austin , Jemaine Clement.', 'img/rio2.jpg', 'Infantil', 2014),
(61, 'Lucy', 'Johansson da vida a una mujer obligada a ejercer de mula (de drogas) y que adquiere poderes sobrenaturales cuando la bolsa de la droga se rompe y los narcóticos entran en contacto con su cuerpo.', 89, 'Amr Waked , Min-sik Choi , Morgan Freeman.', 'img/lucy.jpg', 'Accion', 2014),
(62, 'Como entrenar a tu dragon 2', 'Han pasado cinco años desde los sucesos que llevaron a Hipo a conseguir entrenar a su dragón, rompiendo la estela de su pueblo vikingo de cazarlos.', 102, 'Cate Blanchett , Craig Ferguson , Gerard Butler.', 'img/comoentrenaratudragon2.jpg', 'Infantil', 2014),
(63, 'SpiderMan 3', 'Tercera entrega de las aventuras del hombre araña de Marvel. Peter Parker consigue por fin un equilibrio entre su devoción por Mary Jane y sus deberes como superhéroe.', 139, 'Tobey Maguire , Kirsten Dunst.', 'img/spiderman3.jpg', 'Ciencia Ficcion', 2007),
(64, 'Algo pasa en Las Vegas', 'Jack y Joy son dos jóvenes que se encuentran, por puro azar, en Las Vegas. Decididos ambos a pasar el fin de semana más loco de sus vidas, poco imaginan que los excesos y la locura del lugar los llevan a convertirse en marido y mujer.', 99, 'Ashton Kutcher , Cameron Diaz , Lake Bel.', 'img/algopasaenlasvegas.jpg', 'Romance', 2008),
(65, 'Busqueda Implacable', 'Una peligrosa banda de criminales que se ha especializado en el rapto de muchachas adolescentes con las que después comercian, secuestra a la joven hija de Bryan, un agente del gobierno de los Estados Unidos retirado', 93, 'Jon Gries , Leland Orser , Liam Neeson.', 'img/busquedaimplacable.jpg', 'Accion', 2008),
(66, 'The medium', 'Una historia espantosa sobre la herencia de un chamán en la región de Isan en Tailandia. Pero la diosa que parece haber tomado posesión de un miembro de la familia resulta no ser tan benevolente como parece.', 131, 'Narilya Gulmongkolpech , Sawanee Utoomma , Sirani Yankittikan.', 'img/themedium.jpg', 'Suspenso', 2021),
(67, 'Dreamland', 'Ambientada en la década de los años 30, en plena devastación producida por el fenómeno medioambiental denominado \"Dust Bowl\".', 98, 'Finn Cole , Margot Robbie , Travis Fimmel.', 'img/dreamland.jpg', 'Suspenso', 2019),
(68, 'My son', 'Cuando el único hijo de un hombre desaparece, éste viaja al pueblo donde vive su ex mujer en busca de respuestas. Para interpretar a un hombre cuya vida se ve enturbiada por el misterio, McAvoy no recibirá un guión de diálogos.', 95, 'James McAvoy , Claire Foy , Gary Lewis.', 'img/myson.jpg', 'Suspenso', 2021),
(69, 'Risen', 'El desastre ocurre cuando un meteoro golpea una pequeña ciudad, volviendo el medio ambiente inhabitable y matando a todo en el área circundante.', 109, 'Nicole Schalmo , Jack Campbell , Caroline McQuade.', 'img/risen.jpg', 'Suspenso', 2021),
(70, 'La Nube', 'A Virginie le resulta difícil conciliar su vida de agricultora con la de madre soltera. Para sacar a su familia adelante y evitar la quiebra de su granja, se entrega en cuerpo y alma a la cría de saltamontes comestibles', 100, 'Suliane Brahim , Sofian Khammes , Marie Narbonne.', 'img/lanube.jpg', 'Suspenso', 2020),
(72, 'Blood Red Sky', 'Una mujer con una misteriosa enfermedad sanguínea se ve obligada a entrar en acción cuando un grupo de terroristas secuestra un vuelo transatlántico nocturno.', 121, 'Peri Baumeister , Carl Anton Koch , Kais Setti.', 'img/bloodredsky.jpg', 'Suspenso', 2021),
(73, 'Lucky', 'May, una autora de autoayuda con todas las respuestas, de repente se ve acosada por un hombre enmascarado que aparece misteriosamente todas las noches. Incluso cuando ella lo mata.', 83, 'Brea Grant , Dhruv Uday Singh , Yasmine Al-Bustami.', 'img/lucky.jpg', 'Suspenso', 2020),
(74, 'The Manor', 'Después de sufrir un derrame cerebral, Judith Albright se muda a un histórico asilo de ancianos, donde comienza a sospechar que algo sobrenatural se está aprovechando de los residentes. ', 81, 'Barbara Hershey , Fran Bennett , Jill Larson.', 'img/themanor.jpg', 'Terror', 2021),
(75, 'Martyrs Lane', 'Leah, de 10 años, tiene terribles pesadillas. Su madre parece distante de alguna manera, perdida en sus pensamientos. ', 97, 'Kiera Thompson , Denise Gough , Sienna Sayer.', 'img/martyrslane.jpg', 'Terror', 2021),
(76, 'Isabelle', 'El sueño de una joven pareja de formar una familia se rompe a medida que descienden a las profundidades de la paranoia y deben luchar para sobrevivir a una presencia maligna que no quiere nada más que sus propias vidas.', 80, 'Amanda Crew , Adam Brody , Zoë Belkin.', 'img/isabelle.jpg', 'Terror', 2019),
(77, 'Injustice', 'Cuando Lois Lane es asesinada, un Superman desquiciado decide tomar el control de la Tierra. Decidido a detenerlo, Batman crea un equipo de héroes que luchan por la libertad.', 78, 'Justin Hartley , Anson Mount , Laura Bailey.', 'img/injustice.jpg', 'Ciencia Ficcion', 2021),
(78, 'Meteor Moon', 'Cuando un meteoro choca contra la luna y cambia su eje, la gravedad de la Tierra empuja a la luna hacia el camino del planeta. Ahora, un grupo de científicos debe descubrir cómo evitar que la luna golpee la Tierra ', 88, 'Chris Boudreaux , Michael Broderick , Anna Harr.', 'img/meteormoon.jpg', 'Ciencia Ficcion', 2020),
(79, 'Infinite', 'Un hombre descubre que sus alucinaciones son en realidad visiones de vidas pasadas.', 106, 'Mark Wahlberg , Chiwetel Ejiofor , Dylan O\'Brien.', 'img/infinite.jpg', 'Ciencia Ficcion', 2021),
(80, 'Skylines', 'Cuando un virus amenaza con convertir a los híbridos alienígenas amistosos que ahora habitan en la Tierra contra los humanos, la capitana Rose Corley debe liderar un equipo de mercenarios de élite en una misión al mundo alienígena.', 110, 'Alexander Siddig , Daniel Bernhardt , Giedre Mockeliunaite.', 'img/skylines.jpg', 'Ciencia Ficcion', 2020),
(81, 'I am Mother', 'Una adolescente (Rugaard) es criada es un refugio subterráneo por una madre robot que ha sido diseñada para repoblar la Tierra en caso de que se produjese una catástrofe. ', 115, 'Clara Rugaard , Hilary Swank , Luke Hawker.', 'img/iammother.jpg', 'Ciencia Ficcion', 2019);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(20) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `pass` varchar(400) NOT NULL,
  `rol` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `mail`, `pass`, `rol`) VALUES
('1', 'maatigarrido@gmail.com', '$2y$10$bKOaPaeslD9r4Cwu5WcGC.kbHyERnLs6SDS1A3T.9m4TAlU4WLerq', 1),
('1111', '1212111', '$2y$10$rYei6MWac7j0oLtRF88Z4OxNWbkpNFSyfwFQ58LrOC42s7EecIOui', NULL),
('2', 'maatigarrido@gmail.comA', '$2y$10$OAgj2Caq50zh9j1uitAsjeohGxKqjAiMPDguUZTLAh5LZtZO5yCXS', NULL),
('3', '3', '$2y$10$92irXjkKyGttoVv44SSJ7upVXNR/2hKA6YRMWHKNEdRwJXjCSbBhW', 1),
('333', '333', '$2y$10$.UkOWggXdV5A8XVp2QQLIuzvFV9fnsm8bjaOoPrWeZoGRBkLM5ybW', 1),
('555', '4445', '$2y$10$mBAgexsNY5vSyeGKRyrwN.frpDqeY95xio0C/1ksgyJ/ET9TkeMQm', NULL),
('7777', 'asdaa', '$2y$10$nZLKafrLuoNkFHlmViJMUeTmVQwfC5RKEV5W3A60Ze69jrSUSeIv.', NULL),
('autologin', '1123', '$2y$10$49XwIs6QFGEF/CiCN8K2Bu0COc3rBaTd0AeUL3QsPJRphZsXpw9mm', NULL),
('k', 'kk', '$2y$10$ViTvKitJgsTnb05P9SGaDu7/3eyc1x7IFT52X2KwhD73fLcBe2W62', NULL),
('Lola', 'contactodgeme@gmail.com', '$2y$10$J0ifgmTEpNSIfNhF45r/LO6G/bjJcP7nqziGn7lK1FIokkyC4jBES', 1),
('MatiasGarrido', 'asdfasf', '$2y$10$5kAD7vMU3KYjaleE28IN9ewW977HOxynQkPmuM19UvNhA8W/KiU4q', NULL),
('Renata2021', 'garridomagali@hotmail.com', '$2y$10$LMB4GS6i5mXDIkv9wXO79ukSvZVsL0sNObCaLMga9GOfwmoV4aWL6', NULL),
('Reni', 'reni@gmai.com', '$2y$10$88uHxv3U6ZV1OxcQAAZj.ODkZijR7EBckSKvbCuV6818M/T8voM.2', NULL),
('Roco', 'roco@g.com', '$2y$10$x/Y9OPIYT.m6KbbdluKsMeRDPteEUxg6H/l7FR1.Ukm6w3Q2YcGqS', NULL),
('sss', 'sss', '$2y$10$bZr2EAMOO2bW6sE3KyfI4.X3nEXMRN6cmngHVQJVyqIAFj2j9MnWO', NULL),
('zzz', 'zzz', '$2y$10$cWKB6glr9yZYGwT6tuNuxu7ynccv9JH82szH2ZFaU6JJfjqG8MrV2', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_pelicula` (`id_pelicula`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`genero`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_genero` (`genero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`);

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `tipo_genero` FOREIGN KEY (`genero`) REFERENCES `generos` (`genero`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
