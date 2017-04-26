
--
CREATE DATABASE IF NOT EXISTS `img_serv` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `img_serv`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE `image` (
  `id_Image` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `code` varchar(12) NOT NULL,
  `id_User` int(11) DEFAULT NULL,
  `location` varchar(300) CHARACTER SET utf8 NOT NULL,
  `size` varchar(30) CHARACTER SET utf8 NOT NULL,
  `type` varchar(25) NOT NULL,
  `dimensions` varchar(20) NOT NULL,
  `available` varchar(3) CHARACTER SET utf8 NOT NULL,
  `uploadDate` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_User` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(55) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `level` varchar(10) CHARACTER SET utf8 NOT NULL,
  `register_date` varchar(70) CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(300) CHARACTER SET utf8 NOT NULL,
  `images_Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

