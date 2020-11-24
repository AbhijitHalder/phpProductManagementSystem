SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
	KEY `user_id` (`user_id`),
	KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` double(5, 2) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


INSERT INTO `products` (`id`, `name`, `price`, `img`) VALUES
(1, 'Product1', 10.99, 'shein.PNG'),
(2, 'Product2', 15.99, 'inbox.jpg');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$10$C7plelHQADy4ullnaYIV7u748QECpd6tj5yCr1LQrKkC8ofqLKi1a',
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `email`) VALUES
(1, 'admin1', 'admin1', 'admin', 'admin', 'admin@gmail.com'),
(2, 'user1', 'user1', 'user', 'user1', 'user1@gmail.com'),
(3, 'user2', 'user2', 'user', 'user2', 'user2@gmail.com');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
