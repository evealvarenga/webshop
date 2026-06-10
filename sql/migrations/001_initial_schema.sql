-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2026 a las 21:59:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img`, `category`, `description`) VALUES
(1, 'Twist De Limón', 5000, '153000.png', 'Pastelería', 'Pan dulce de masa aireada con un suave sabor a limón equilibrado con amapolas.'),
(2, 'Roll de Nueces', 5000, '153116.png', 'Pastelería', 'Rollo de masa dulce con relleno de pasas y trozos de nuez.'),
(3, 'Roll de Choco', 5000, '153130.png', 'Pastelería', 'Pan dulce ligeramente crocante con relleno de chocolate.'),
(4, 'Muffin vegano', 6400, '153239.png', 'Pastelería', 'Pan dulce de masa vegana con un suave sabor a manzana con amapolas.'),
(5, 'Muffin DDL', 5000, '153255.png', 'Pastelería', 'Muffin relleno de dulce de leche con chispas de chocolate.'),
(6, 'Black Sugar', 8600, '153312.png', 'Coffee Team', 'Latte con café y azucar negra.'),
(7, 'Dubai Pistacho', 10900, '153326.png', 'Shake Shake Team', 'Milshake de chocolate con pistacho.'),
(8, 'Oreo Shake', 9700, '153340.png', 'Shake Shake Team', 'Milkshake de oreo con topping de snow cup.'),
(9, 'Choco Berry', 9700, '153352.png', 'Shake Shake Team', 'Milkshake de frutilla con chocolate blanco'),
(10, 'Taro Latte', 7800, '153408.png', 'Latte Team', 'Latte de Taro.'),
(11, 'Matcha Latte', 7800, '153421.png', 'Latte Team', 'Latte de Matcha.'),
(12, 'Frutilla Latte', 7800, '153435.png', 'Latte Team', 'Frutilla con leche.'),
(13, 'Jasmine Green', 4700, '153451.png', 'Puro Team', 'Té verde con jazmin.'),
(14, 'Ceylon Tea', 4700, '153503.png', 'Puro Team', 'Té rojo o negro.'),
(15, 'Peach Oolong', 5900, '153516.png', 'Puro Team', 'Té verde con durazno.'),
(16, 'Flower Oolong', 5900, '153527.png', 'Puro Team', 'Té de oolong con flor de olivo.'),
(17, 'Mango Yakult', 7800, '153615.png', 'Fruity Team', 'Té de jazmín con mango, yakult y perlas de mango.'),
(18, 'Fresh lemon tea', 7000, '153628.png', 'Fruity Team', 'Bebida en base a té rojo de ceylán con limón.'),
(19, 'Lemon Berry', 8700, '153640.png', 'Fruity Team', 'Té de jazmín con limón, frutilla y perlas sabor arándano.'),
(20, 'Naranja Maracuya', 7800, '153652.png', 'Fruity Team', 'Té rojo de ceylon con naranja exprimida y maracuyá.'),
(21, 'Marayakult', 7800, '153705.png', 'Fruity Team', ' Bebida a base de té de jazmín, maracuyá y yakult.'),
(22, 'Berry Yakult', 8500, '153717.png', 'Fruity Team', 'Té de oolong, frutilla, yakult, y perlas boom de yakult.'),
(23, 'Lychee Green', 7000, '153729.png', 'Fruity Team', 'Té verde de jazmín con lychee.'),
(24, 'Multiberry', 7000, '153741.png', 'Fruity Team', 'Té verde de oolong con frutos rojos triturados.'),
(25, 'Lychee Lemon', 8500, '153754.png', 'Fuity Team', 'Té de oolong con limón, lychee y gelatina de nata de coco.'),
(26, 'Peach lemon', 8700, '153807.png', 'Fruity Team', 'Té de oolong con durazno y limón.'),
(27, 'Bubble Tea', 7300, '153829.png', 'Bubble Team', 'Té de Ceylon con leche y perlas de tapioca.'),
(28, 'Chocolate Tea', 7900, '153841.png', 'Bubble Team', 'Té rojo con leche, chocolate y perlas de tapioca.'),
(29, 'Black sugar', 7900, '153851.png', 'Bubble Team', 'Bebida con leche, azúcar negra y perlas de tapioca.'),
(30, 'Jasmine', 7300, '153906.png', 'Bubble Team', 'Té de jazmín con leche y perlas de tapioca.'),
(31, 'Black sugar', 7900, '153917.png', 'Bubble Team', 'Té rojo con leche más azúcar negra y perlas de tapioca.'),
(32, 'Bubble pistacho', 9400, '153929.png', 'Bubble Team', 'Té con leche y perlas de tapioca sabor pistacho.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
