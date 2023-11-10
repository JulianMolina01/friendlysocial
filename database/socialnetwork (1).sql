-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2023 a las 01:11:44
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
-- Base de datos: `socialnetwork`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friendship`
--

CREATE TABLE `friendship` (
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `friendship_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `friendship`
--

INSERT INTO `friendship` (`user1_id`, `user2_id`, `friendship_status`) VALUES
(1, 2, 1),
(4, 1, 1),
(6, 1, 1),
(5, 1, 1),
(7, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_caption` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_public` char(1) NOT NULL,
  `post_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`post_id`, `post_caption`, `post_time`, `post_public`, `post_by`) VALUES
(1, 'Hola. Yo soy Julián Molina. Desarrollador de Software con sentido humano.\r\nYo podré ayudarles con todo lo que tenga que ver con ingeniería de software.', '2023-10-20 20:53:24', 'Y', 1),
(2, 'ola:)', '2023-10-20 21:41:19', 'N', 2),
(3, 'Holaaaa salundando', '2023-10-20 21:44:52', 'N', 4),
(4, 'Se realizo una actualización en el diseño de la página web.\r\nPruebas de caja blanca y de caja negra en curso...', '2023-10-20 23:08:57', 'N', 1),
(5, 'Mañana habrá una publicación sobre Métodos de códificación.', '2023-10-20 23:12:20', 'N', 1),
(6, '&lt;script type=&quot;text/javascript&quot;&gt;alert(&quot;Hola Mundo&quot;);&lt;/script&gt;', '2023-10-21 16:20:53', 'N', 1),
(7, 'Realizando pruebas de vulnerabilidades. Ataques XSS y CSRF. Asegurando el sistema.\r\n- Evitar XSS y CSRF.\r\n- Evitar ataque de File Upload\r\n- Evitar DDoS\r\n- Evitar Atque de fuerza bruta\r\n- Evtar ataque de directorios', '2023-10-21 16:23:38', 'N', 1),
(8, 'Hola esta es una prueba de publicaci&oacute;n de Daniel', '2023-10-22 22:31:20', 'N', 4),
(9, 'Este es un ejemplo de tarea de Vulnerabilidades:', '2023-10-22 22:34:44', 'N', 1),
(10, 'Hola probando imagen', '2023-10-22 22:36:00', 'Y', 4),
(11, 'Un intento m&aacute;s de subir un PDF', '2023-10-22 22:38:36', 'N', 1),
(12, 'PDF', '2023-10-22 22:43:06', 'N', 1),
(13, 'Un PDF m&aacute;s', '2023-10-22 22:45:02', 'N', 1),
(14, 'Otro intento de subir archivos. PDF', '2023-10-22 22:54:17', 'N', 1),
(15, 'Ok', '2023-10-22 22:55:03', 'N', 1),
(16, 'Chichen Itza', '2023-10-22 22:59:10', 'N', 1),
(17, 'Chichen Itza', '2023-10-22 23:00:33', 'N', 1),
(18, 'Otro PDF', '2023-10-22 23:20:14', 'N', 1),
(19, 'PDF1', '2023-10-22 23:22:56', 'N', 1),
(20, 'Archivo PDF', '2023-10-22 23:26:44', 'N', 1),
(21, 'El humano y la tecnolog&iacute;a.', '2023-10-22 23:40:15', 'Y', 1),
(22, 'Julian Molina ha cambiado su foto de perfil.', '2023-10-22 23:51:43', 'N', 1),
(23, 'Est&aacute; es una publicaci&oacute;n de la 3er entrega del proyecto de apps web y moviles.', '2023-10-24 02:58:10', 'Y', 5),
(24, 'Hola wachones soy Cedrick', '2023-10-24 03:01:51', 'N', 9),
(25, 'Hola wachones soy Cedrick', '2023-10-24 03:02:09', 'Y', 9),
(26, 'Cedrick Marcial Quintero ha cambiado su foto de perfil.', '2023-10-24 03:02:51', 'N', 9),
(27, 'Cedrick Marcial Quintero ha cambiado su foto de perfil.', '2023-10-24 03:02:51', 'N', 9),
(28, 'UWU', '2023-10-24 03:03:23', 'N', 10),
(29, 'ONICHAN BAKA ha cambiado su foto de perfil.', '2023-10-24 03:04:24', 'N', 10),
(30, '⡆⣐⢕⢕⢕⢕⢕⢕⢕⢕⠅⢗⢕⢕⢕⢕⢕⢕⢕⠕⠕⢕⢕⢕⢕⢕⢕⢕⢕⢕\r\n⢐⢕⢕⢕⢕⢕⣕⢕⢕⠕⠁⢕⢕⢕⢕⢕⢕⢕⢕⠅⡄⢕⢕⢕⢕⢕⢕⢕⢕⢕\r\n⢕⢕⢕⢕⢕⠅⢗⢕⠕⣠⠄⣗⢕⢕⠕⢕⢕⢕⠕⢠⣿⠐⢕⢕⢕⠑⢕⢕⠵⢕\r\n⢕⢕⢕⢕⠁⢜⠕⢁⣴⣿⡇⢓⢕⢵⢐⢕⢕⠕⢁⣾⢿⣧⠑⢕⢕⠄⢑⢕⠅⢕\r\n⢕⢕⠵⢁⠔⢁⣤⣤⣶⣶⣶⡐⣕⢽⠐⢕⠕⣡⣾⣶⣶⣶⣤⡁⢓⢕⠄⢑⢅⢑\r\n⠍⣧⠄⣶⣾⣿⣿⣿⣿⣿⣿⣷⣔⢕⢄⢡⣾⣿⣿⣿⣿⣿⣿⣿⣦⡑⢕⢤⠱⢐\r\n⢠⢕⠅⣾⣿⠋⢿⣿⣿⣿⠉⣿⣿⣷⣦⣶⣽⣿⣿⠈⣿⣿⣿⣿⠏⢹⣷⣷⡅⢐\r\n⣔⢕⢥⢻⣿⡀⠈⠛⠛⠁⢠⣿⣿⣿⣿⣿⣿⣿⣿⡀⠈⠛⠛⠁⠄⣼⣿⣿⡇⢔\r\n⢕⢕⢽⢸⢟⢟⢖⢖⢤⣶⡟⢻⣿⡿⠻⣿⣿⡟⢀⣿⣦⢤⢤⢔⢞⢿⢿⣿⠁⢕\r\n⢕⢕⠅⣐⢕⢕⢕⢕⢕⣿⣿⡄⠛⢀⣦⠈⠛⢁⣼⣿⢗⢕⢕⢕⢕⢕⢕⡏⣘⢕\r\n⢕⢕⠅⢓⣕⣕⣕⣕⣵⣿⣿⣿⣾⣿⣿⣿⣿⣿⣿⣿⣷⣕⢕⢕⢕⢕⡵⢀⢕⢕\r\n⢑⢕⠃⡈⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⢃⢕⢕⢕\r\n⣆⢕⠄⢱⣄⠛⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠿⢁⢕⢕⠕⢁\r\n⣿⣦⡀⣿⣿⣷⣶⣬⣍⣛⣛⣛⡛⠿⠿⠿⠛⠛⢛⣛⣉⣭⣤⣂⢜⠕⢑⣡⣴⣿', '2023-10-24 03:05:33', 'N', 10),
(31, '⠀⠀⠀⠋⠙⠛⠋⠉⠑⠾⠿⡆⠈⠛⠋⠈⠟⠉⠁⠈⠛⠛⠋⠉⠙⢿⠁⠉⠉⠽⢿⠛⠉⠉⠉⠛⠙⣿⡿⠋⡡⠄⠀⠀⠀⠀⠀⠀⠀⠠\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢇⠀⠀⠀⠀⠀⠀⠀⠿⢆⠀⠘⢁⡞⢡⠀⠀⠀⢀⡄⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠁⢄⠀⠀⠀⠐⣦⣄⡀⠀⠀⢺⠁⡾⠀⡰⠀⠊⠁⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢻⡿⠛⠀⠀⢸⢀⠉⠴⠠⢖⣤⠀⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠃⠀⠀⠀⠸⢈⠀⡀⠀⠈⠉⠓⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠘⠇⡀⠀⠀⠀⠀⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠘⣿⠀⠀⠀⠀⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⣀⣀⣤⣤⣴⣦⣦⣀⣀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠰⠋⠀⠀⠀⠀⠀⠀⠀⠀\r\n⠀⠀⠀⣠⣾⡿⠛⠛⡉⣉⣉⡀⠀⢤⡉⢳⣄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀\r\n⣀⣤⣾⡿⢋⣴⣖⡟⠛⢻⣿⣿⣽⣆⠙⢦⡙⣧⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣠⠖⠒⠻⠻⠶⣦⣄⠀\r\n⠉⣿⢸⠁⣸⣥⣹⠧⡠⣾⣿⣿⣿⣿⣧⡈⢷⣼⣧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⣿⣾⣿⣿⣶⣦⣈⠈⠻⣤\r\n⠀⢹⡇⢸⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠀⣿⣇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⡟⣫⠀⠙⣿⣿⣿⣿⣷⡄⣽\r\n⠀⠀⠳⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣟⣀⣿⣟⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠸⣷⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⠀⠀⠀⠈⠙⠻⢿⣿⣿⣿⣿⣿⣿⣿⣿⠭⠛⠉⠉⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠸⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⠀⠀⠀⣼⠉⠓⢦⠀⠀⠉⠩⠉⠉⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡠⠒⡊⠙⠉⠉⠉⠓⠲⠤⡀⠀⠀⠙⠿⣿⣿⣿⣿⣿⣿⣿⠏\r\n⠀⠀⠀⠈⢦⡀⠈⡇⠀⠀⡠⠒⠛⢲⣄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠐⠿⣦⣴⣿⣶⣶⠀⠠⠀⣰⣤⣿⣦⠀⠀⠀⠀⠉⠙⠛⠻⠛⠁⠀\r\n⠀⠀⠀⠀⠀⡇⠀⢧⡴⠋⠀⣀⡀⢰⡟⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠙⢛⠃⢀⣄⠀⣿⡿⠟⠉⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀\r\n⠀⠀⠀⠀⠀⡇⠀⠉⠀⣰⠋⢱⠃⢸⡁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠊⠟⠋⠈⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⠖⠋⠉\r\n⠀⠀⠀⠀⠀⢇⠀⣰⡿⠋⠀⠘⢦⠼⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢼⠋⠁⣀⡤⠎\r\n⠀⠀⠀⠀⠀⠈⠋⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠌⠀⢀⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠉⠁⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢦⣄⡀⠀⠀⢀⣀⣠⣴⡿⣿⣦⣀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠙⠛⠻⠿⠉⠉⠉⠉⠉⠑⠋⠙⠻⣦⣄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠙⢳⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠃⠀⠀⠀⠀⠀⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀', '2023-10-24 03:05:46', 'N', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(20) NOT NULL,
  `user_lastname` varchar(20) NOT NULL,
  `user_nickname` varchar(20) DEFAULT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_gender` char(1) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_status` char(1) DEFAULT NULL,
  `user_about` text DEFAULT NULL,
  `user_hometown` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_nickname`, `user_password`, `user_email`, `user_gender`, `user_birthdate`, `user_status`, `user_about`, `user_hometown`) VALUES
(1, 'Julian', 'Molina', 'JulianM01', '202cb962ac59075b964b07152d234b70', 'julianmolina1313@gmail.com', 'M', '1997-07-13', 'S', 'Filántropo, Ingeniero de Software, Soporte Técnico, Ético y Coldplayer pronto emprendedor e inversionista.', 'Chiapas'),
(2, 'Bryan Andrew', 'Castro Valencia', 'Andy', '3fc0a7acf087f549ac2b266baf94b8b1', 'bryan.castro04@unach.mx', 'M', '2004-08-24', 'S', 'ola', 'Tuxtla Gutiérrez, Chiapas, Mexico'),
(3, 'Desarrollador', 'Software', 'dev1', '202cb962ac59075b964b07152d234b70', 'devsoftware@gmail.com', 'M', '1996-01-01', 'S', 'Desarrollador de Software.', 'Chiapas'),
(4, 'Daniel', 'Carbajal', 'Bitbeet', '81dc9bdb52d04dc20036dbd8313ed055', 'daniel@gmail.com', 'M', '1996-07-12', 'E', 'Me gusta el software ', 'Tuxtla, Chiapas, Mexico'),
(5, 'Usuario1', 'Apellido1', 'Usuario1', '202cb962ac59075b964b07152d234b70', 'usuario1@gmail.com', 'M', '1996-01-02', 'S', 'Hola, soy el usuario 1', 'Chiapas'),
(6, 'Daniel 2', 'Lopez', 'BitBeet', '81dc9bdb52d04dc20036dbd8313ed055', 'edaniel@gmail.com', 'M', '1996-01-17', 'E', 'Holi', 'Tuxtla'),
(7, 'Jorge Humberto', 'Ruiz Ovalle', 'jruizovalle', '25d55ad283aa400af464c76d713c07ad', 'jruizovalle@hotmail.com', 'M', '1996-01-01', 'M', 'Developer', 'Tuxtla / Chiapas'),
(9, 'Cedrick', 'Marcial Quintero', 'Cendri', '8c416c2812ed806acb66520086da8972', 'cedrick.marcial25@unach.mx', 'M', '2002-12-02', 'S', 'Me gustan los videojuegos :v', ''),
(10, 'ONICHAN', 'BAKA', '', '25d55ad283aa400af464c76d713c07ad', 'onichan@gmail.com', 'F', '1996-01-01', 'M', 'uwu', 'tlaxcala');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_phone`
--

CREATE TABLE `user_phone` (
  `user_id` int(11) DEFAULT NULL,
  `user_phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `friendship`
--
ALTER TABLE `friendship`
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_by` (`post_by`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `user_phone`
--
ALTER TABLE `user_phone`
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `friendship_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `user_phone`
--
ALTER TABLE `user_phone`
  ADD CONSTRAINT `user_phone_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
