-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2021 a las 17:37:48
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculasdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `codigo_pelicula` int(11) NOT NULL,
  `nombre` varchar(170) NOT NULL,
  `director` varchar(50) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`codigo_pelicula`, `nombre`, `director`, `genero`, `imagen`) VALUES
(1, 'EL GOLPE', 'GEORGE ROY HILL', 'COMEDIA', 'El_golpe.jpg'),
(2, 'LOS PAJAROS', 'ALFRED HITCHOCK', 'TERROR', 'Los pajaros.jpg'),
(3, 'SOSPECHOSOS HABITUALES', 'BRYAN SINGER', 'SUSPENSE', 'sospechosos_habituales.jpg'),
(4, 'PIRATAS DEL CARIBE. EN EL FIN DEL MUNDO', 'GORE VERBINSKI', 'AVENTURAS', 'piratas3.jpg'),
(5, 'EL SEÑOR LOS DE LOS ANILLOS. LA COMUNIDAD DEL ANIL', 'PETER JACKSON', 'AVENTURAS', 'señor-anillos-1.jpg'),
(6, 'WILLOW', 'RON HOWARD ', 'AVENTURAS', 'willow.jpg'),
(7, 'BRAVEHEART', 'MEL GIBSON', 'AVENTURAS', 'Braveheart.jpg'),
(8, 'ALIEN, EL OCTAVO PASAJERO', 'RIDLEY SCOTT ', 'TERROR', ''),
(9, 'HOTEL RWANDA', 'TERRY GEORGE', 'DRAMA', ''),
(10, 'CRASH (COLISIÓN)', 'PAUL HAGGIS', 'DRAMA', ''),
(11, 'EL TEMIBLE BURLON', 'ROBERT SIODMAK', 'AVENTURAS', ''),
(12, 'EL NUMERO 23', 'JOEL SCHUMACHER', 'SUSPENSE', ''),
(13, 'BEN-HUR', 'WILLIAM WYLER ', 'DRAMA', ''),
(14, 'SHREK 3', 'CHRIS MILLER', 'COMEDIA', ''),
(15, 'LA LISTA DE SHILDER ', 'STEVEN SPIELBERG', 'DRAMA', ''),
(16, 'LA GRAN EVASION', 'JOHN STURGES', 'BELICA', ''),
(17, 'DOCE DEL PATIBULO', 'ROBERT ALDRICH', 'BELICA', ''),
(18, 'DOCE MONOS', 'TERRY GILLIAM', 'SUSPENSE', ''),
(19, 'AL ESTE DEL EDEN', 'ELIA KAZAN ', 'DRAMA', ''),
(20, 'TIBURON', 'STEVEN SPIELBERG', 'TERROR', ''),
(21, 'MATRIX', ' LARRY Y ANDY WACHOWSKI', 'CIENCIA FICCION', ''),
(22, 'AMERICAN HISTORY X', 'TONY KAYE', 'DRAMA', ''),
(24, 'MOSNTER', 'SS', 'AVENTURAS', 'monstruos_sa_2001.jpg'),
(25, '<B> HOLA </B> ADIOS', 'ASDAS', 'AVENTURAS', ''),
(26, 'Guillermo', 'dave Filony', 'ciencia ficcion', 'Los pajaros.jpg'),
(27, 'Star wars', 'dave Filony', 'ciencia ficcion', 'piratas3.jpg'),
(28, 'hola', 'hola', 'accion', 'piratas3.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`codigo_pelicula`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `codigo_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
