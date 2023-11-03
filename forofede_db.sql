-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2023 a las 19:23:00
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `connections`
--

CREATE TABLE `connections` (
  `connectionId` int(11) NOT NULL,
  `contentId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `connections`
--

INSERT INTO `connections` (`connectionId`, `contentId`, `userId`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 4, 1),
(4, 5, 4),
(19, 46, 4),
(20, 47, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE TABLE `content` (
  `contentId` int(11) NOT NULL,
  `contentTitle` varchar(50) NOT NULL,
  `contentText` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `content`
--

INSERT INTO `content` (`contentId`, `contentTitle`, `contentText`) VALUES
(2, 'El maravilloso mundo de podar el césped', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a suscipit quam, ac faucibus tellus. Pellentesque sagittis tellus a eros vestibulum, vitae euismod libero ultricies. Sed at ligula varius dui tempor dignissim ac at ipsum. Suspendisse faucibus, est sit amet euismod volutpat, ipsum mi fringilla sem, sed ultrices ex lectus in justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed vehicula, diam vitae feugiat gravida, lacus lorem posuere nulla, in congue urna nunc eu mauris. Sed tincidunt augue ut diam luctus, at vestibulum nibh elementum. Fusce id condimentum erat. Nunc sit amet tellus justo. In pulvinar elit auctor, porttitor elit eu, imperdiet nisl. Aenean luctus enim vitae velit molestie, et sagittis velit interdum. Duis suscipit turpis risus, eu consequat ante faucibus a.'),
(3, 'La apasionante vida de limpiar alfombras llenas de', 'Pellentesque porta dui vel elit ultricies commodo. Donec laoreet, purus sit amet auctor sagittis, eros est accumsan ligula, et suscipit dolor nibh in tellus. Nulla in lorem sed nisl pulvinar finibus. Vivamus varius efficitur egestas. Proin at dolor id ipsum imperdiet tincidunt. Nam vitae iaculis risus. Nulla dignissim venenatis nulla, sit amet finibus magna molestie ut. Vivamus lacinia vel metus vestibulum consequat. Curabitur vitae dapibus libero. Nullam eu tempus mauris, sit amet malesuada tortor. Mauris efficitur, tellus ut sagittis porta, odio eros porta orci, sit amet scelerisque odio nunc et ligula.'),
(4, 'Echar la siesta es rentable económicamente', 'Donec dictum mauris id neque semper consequat. Quisque faucibus suscipit hendrerit. Ut et faucibus leo. Aliquam malesuada, est a egestas ullamcorper, ligula magna tempor mi, nec ultrices libero est sed sem. Donec sodales, metus a aliquam viverra, justo neque eleifend velit, eget accumsan urna massa vel eros. Fusce posuere ligula nec arcu convallis, egestas facilisis tortor pretium. Pellentesque at viverra ipsum. Curabitur in pharetra metus, nec condimentum turpis. Etiam molestie nibh ut mauris volutpat auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent porta vestibulum imperdiet. Suspendisse efficitur, ipsum eget auctor ullamcorper, est lacus maximus erat, nec sodales lacus diam sit amet erat. Curabitur hendrerit consectetur vehicula. Nulla posuere metus vitae libero mollis, ut porttitor nibh laoreet. Pellentesque porta nulla quam, ut feugiat tellus finibus non. Maecenas varius pulvinar leo et elementum.'),
(5, 'La gallina mola más que el t-rex', 'PRUEBA: Morbi imperdiet tempor neque ut eleifend. Sed laoreet porttitor nisl, ac iaculis neque aliquam vitae. Sed non turpis lobortis ipsum mollis condimentum in eget urna. In ut ullamcorper magna, vitae luctus orci. Proin tincidunt lacus imperdiet, ultricies velit in, accumsan velit. Integer id semper justo, sit amet viverra diam. Quisque pharetra vehicula arcu vel scelerisque. Aliquam erat volutpat. Aenean varius velit dolor, in interdum urna vehicula id. Curabitur vel accumsan enim. Donec a aliquam ligula. Pellentesque ornare faucibus luctus. Vivamus consectetur luctus sollicitudin. Duis elit risus, aliquet eget auctor a, pharetra quis nunc.'),
(46, '¿A qué huelen las nueves en primavera?', 'Muy lejos, más allá de las montañas de palabras, alejados de los países de las vocales y las consonantes, viven los textos simulados. Viven aislados en casas de letras, en la costa de la semántica, un gran océano de lenguas. Un riachuelo llamado Pons fluye por su pueblo y los abastece con las normas necesarias. Hablamos de un país paraisomático en el que a uno le caen pedazos de frases asadas en la boca. Ni siquiera los todopoderosos signos de puntuación dominan a los textos simulados; una vida, se puede decir, poco ortográfica. Pero un buen día, una pequeña línea de texto simulado, llamada Lorem Ipsum, decidió aventurarse y salir al vasto mundo de la gramática. El gran Oxmox le desanconsejó hacerlo, ya que esas tierras estaban llenas de comas malvadas, signos de interrogación salvajes y puntos y coma traicioneros, pero el texto simulado no se dejó atemorizar. Empacó sus siete versales, enfundó su inicial en el cinturón y se puso en camino. Cuando ya había escalado las primeras colinas'),
(47, 'Esto se está llenando de texto aleatorio, ayuda', 'Y, viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro. Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca. Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no te cabe parte dellas.Y, viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro. Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca. Así que, no debes congojarte por las desgracias que a mí me suc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPass` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userBio` varchar(50) NOT NULL,
  `roles` varchar(255) NOT NULL DEFAULT 'visitor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPass`, `userEmail`, `userBio`, `roles`) VALUES
(1, 'federik0', '123', 'fede@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'admin'),
(4, 'Pepit-ho', '456', 'pepy@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'editor'),
(5, 'frasquit-0', '789', 'fasky@mail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'visitor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`connectionId`),
  ADD KEY `contentId` (`contentId`),
  ADD KEY `userId` (`userId`);

--
-- Indices de la tabla `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`contentId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `connections`
--
ALTER TABLE `connections`
  MODIFY `connectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `content`
--
ALTER TABLE `content`
  MODIFY `contentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `connections`
--
ALTER TABLE `connections`
  ADD CONSTRAINT `connections_ibfk_1` FOREIGN KEY (`contentId`) REFERENCES `content` (`contentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `connections_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
