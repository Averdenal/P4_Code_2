-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 fév. 2020 à 21:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `onligne` tinyint(4) DEFAULT NULL,
  `autor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articles_users_idx` (`autor`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date`, `slug`, `onligne`, `autor`) VALUES
(8, 'Aventure', '<p>dLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus id orci at consequat. Nullam orci ipsum, efficitur id ex id, luctus dapibus mauris. Donec quis mauris maximus, dapibus enim non, egestas sapien. Mauris a feugiat lacus. Nam tempor massa ut lacinia semper. Aliquam elementum nulla tortor, quis porttitor orci sodales eget. Morbi a euismod nibh, at dapibus nunc. Nam eget varius neque. Nunc rhoncus placerat lorem, id dapibus justo luctus sed. Suspendisse diam nisl, hendrerit id tellus a, luctus tempus dolor. Etiam quis eros mauris. Proin ac eros vulputate, egestas dolor sit amet, tempor ipsum. Vivamus consectetur est ac rhoncus scelerisque. Nullam sed porttitor justo. Aenean rhoncus felis ultricies arcu lacinia aliquet. Duis iaculis lacus eget elementum vehicula. Quisque feugiat molestie nibh. Proin fringilla venenatis pellentesque. Integer ultricies purus vitae arcu porttitor, eget elementum lacus scelerisque. Fusce fermentum lectus urna, et posuere mi mattis vel. Ut at nisl quam. Maecenas pulvinar, lectus ac posuere tempor, leo metus dapibus ante, in eleifend mauris sem sit amet ante. Ut luctus lacus id posuere iaculis. Curabitur fringilla rhoncus lacus. Ut pharetra velit ut porta mattis. Proin bibendum congue luctus. Aliquam erat volutpat. Cras consectetur lectus nec gravida condimentum. In vitae auctor metus. Sed nisi enim, luctus ac vulputate in, condimentum quis enim. Aliquam nunc mauris, dictum posuere pretium ac, viverra iaculis nisl. Mauris tincidunt aliquam varius. Suspendisse sagittis interdum sem, sed imperdiet mi ultrices laoreet. Etiam sodales nisl eu vehicula posuere. Integer vitae faucibus orci, at condimentum risus. Curabitur in condimentum est. Nullam eget nibh nibh. Phasellus vel dui congue, ullamcorper dui in, congue nulla. Curabitur porta tincidunt consectetur. Nunc sollicitudin suscipit vulputate. Nullam pharetra nisl vel massa vulputate, sed hendrerit libero convallis. Nullam sit amet augue vitae risus vehicula rhoncus. Nam imperdiet, sem vel mattis lacinia, lorem erat placerat quam, sit amet euismod velit libero convallis arcu. Phasellus at tortor ac ligula mattis rutrum sit amet ac lorem. Vivamus rhoncus est purus, non tincidunt mauris consectetur at. Duis ut dignissim nulla, non fermentum velit. Vivamus ultrices egestas fringilla. Morbi felis velit, imperdiet eu odio at, tincidunt fermentum arcu. Nullam tempus vehicula dui sed vehicula. Donec eu ullamcorper eros. Praesent condimentum orci lacus, eu maximus augue tristique eget. Praesent vel viverra nisi. Fusce sed felis justo. Morbi vulputate leo id dignissim viverra. Ut quis condimentum ipsum, at lacinia dui. Etiam non velit nisi. Donec convallis est ac erat bibendum tristique. Fusce convallis sit amet turpis ut commodo. Etiam ut facilisis ipsum, sed mattis nibh. Sed elementum odio eu nisl dictum sodales. Integer facilisis ante ac massa egestas congue. Nullam velit leo, placerat eu tortor aliquam, blandit cursus tortor. Donec a lorem euismod, efficitur justo ac, fermentum odio. Aenean vestibulum in sapien eu blandit. Vestibulum porta ut orci id mattis. Morbi vulputate auctor lacus ac aliquam.</p>', '2020-01-16 11:22:34', 'Aventure', 1, 1),
(23, 'demodemo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus id orci at consequat. Nullam orci ipsum, efficitur id ex id, luctus dapibus mauris. Donec quis mauris maximus, dapibus enim non, egestas sapien. Mauris a feugiat lacus. Nam tempor massa ut lacinia semper. Aliquam elementum nulla tortor, quis porttitor orci sodales eget. Morbi a euismod nibh, at dapibus nunc. Nam eget varius neque. Nunc rhoncus placerat lorem, id dapibus justo luctus sed. Suspendisse diam nisl, hendrerit id tellus a, luctus tempus dolor. Etiam quis eros mauris. Proin ac eros vulputate, egestas dolor sit amet, tempor ipsum. Vivamus consectetur est ac rhoncus scelerisque. Nullam sed porttitor justo. Aenean rhoncus felis ultricies arcu lacinia aliquet.\r\n\r\nDuis iaculis lacus eget elementum vehicula. Quisque feugiat molestie nibh. Proin fringilla venenatis pellentesque. Integer ultricies purus vitae arcu porttitor, eget elementum lacus scelerisque. Fusce fermentum lectus urna, et posuere mi mattis vel. Ut at nisl quam. Maecenas pulvinar, lectus ac posuere tempor, leo metus dapibus ante, in eleifend mauris sem sit amet ante. Ut luctus lacus id posuere iaculis. Curabitur fringilla rhoncus lacus. Ut pharetra velit ut porta mattis. Proin bibendum congue luctus. Aliquam erat volutpat. Cras consectetur lectus nec gravida condimentum.\r\n\r\nIn vitae auctor metus. Sed nisi enim, luctus ac vulputate in, condimentum quis enim. Aliquam nunc mauris, dictum posuere pretium ac, viverra iaculis nisl. Mauris tincidunt aliquam varius. Suspendisse sagittis interdum sem, sed imperdiet mi ultrices laoreet. Etiam sodales nisl eu vehicula posuere. Integer vitae faucibus orci, at condimentum risus. Curabitur in condimentum est. Nullam eget nibh nibh. Phasellus vel dui congue, ullamcorper dui in, congue nulla. Curabitur porta tincidunt consectetur. Nunc sollicitudin suscipit vulputate. Nullam pharetra nisl vel massa vulputate, sed hendrerit libero convallis. Nullam sit amet augue vitae risus vehicula rhoncus.\r\n\r\nNam imperdiet, sem vel mattis lacinia, lorem erat placerat quam, sit amet euismod velit libero convallis arcu. Phasellus at tortor ac ligula mattis rutrum sit amet ac lorem. Vivamus rhoncus est purus, non tincidunt mauris consectetur at. Duis ut dignissim nulla, non fermentum velit. Vivamus ultrices egestas fringilla. Morbi felis velit, imperdiet eu odio at, tincidunt fermentum arcu. Nullam tempus vehicula dui sed vehicula. Donec eu ullamcorper eros. Praesent condimentum orci lacus, eu maximus augue tristique eget. Praesent vel viverra nisi. Fusce sed felis justo.\r\n\r\nMorbi vulputate leo id dignissim viverra. Ut quis condimentum ipsum, at lacinia dui. Etiam non velit nisi. Donec convallis est ac erat bibendum tristique. Fusce convallis sit amet turpis ut commodo. Etiam ut facilisis ipsum, sed mattis nibh. Sed elementum odio eu nisl dictum sodales. Integer facilisis ante ac massa egestas congue. Nullam velit leo, placerat eu tortor aliquam, blandit cursus tortor. Donec a lorem euismod, efficitur justo ac, fermentum odio. Aenean vestibulum in sapien eu blandit. Vestibulum porta ut orci id mattis. Morbi vulputate auctor lacus ac aliquam.', '2020-01-27 20:50:55', 'inde', 1, 1),
(29, 'demonstration de la force', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus id orci at consequat. Nullam orci ipsum, efficitur id ex id, luctus dapibus mauris. Donec quis mauris maximus, dapibus enim non, egestas sapien. Mauris a feugiat lacus. Nam tempor massa ut lacinia semper. Aliquam elementum nulla tortor, quis porttitor orci sodales eget. Morbi a euismod nibh, at dapibus nunc. Nam eget varius neque. Nunc rhoncus placerat lorem, id dapibus justo luctus sed. Suspendisse diam nisl, hendrerit id tellus a, luctus tempus dolor. Etiam quis eros mauris. Proin ac eros vulputate, egestas dolor sit amet, tempor ipsum. Vivamus consectetur est ac rhoncus scelerisque. Nullam sed porttitor justo. Aenean rhoncus felis ultricies arcu lacinia aliquet.\r\n\r\nDuis iaculis lacus eget elementum vehicula. Quisque feugiat molestie nibh. Proin fringilla venenatis pellentesque. Integer ultricies purus vitae arcu porttitor, eget elementum lacus scelerisque. Fusce fermentum lectus urna, et posuere mi mattis vel. Ut at nisl quam. Maecenas pulvinar, lectus ac posuere tempor, leo metus dapibus ante, in eleifend mauris sem sit amet ante. Ut luctus lacus id posuere iaculis. Curabitur fringilla rhoncus lacus. Ut pharetra velit ut porta mattis. Proin bibendum congue luctus. Aliquam erat volutpat. Cras consectetur lectus nec gravida condimentum.\r\n\r\nIn vitae auctor metus. Sed nisi enim, luctus ac vulputate in, condimentum quis enim. Aliquam nunc mauris, dictum posuere pretium ac, viverra iaculis nisl. Mauris tincidunt aliquam varius. Suspendisse sagittis interdum sem, sed imperdiet mi ultrices laoreet. Etiam sodales nisl eu vehicula posuere. Integer vitae faucibus orci, at condimentum risus. Curabitur in condimentum est. Nullam eget nibh nibh. Phasellus vel dui congue, ullamcorper dui in, congue nulla. Curabitur porta tincidunt consectetur. Nunc sollicitudin suscipit vulputate. Nullam pharetra nisl vel massa vulputate, sed hendrerit libero convallis. Nullam sit amet augue vitae risus vehicula rhoncus.\r\n\r\nNam imperdiet, sem vel mattis lacinia, lorem erat placerat quam, sit amet euismod velit libero convallis arcu. Phasellus at tortor ac ligula mattis rutrum sit amet ac lorem. Vivamus rhoncus est purus, non tincidunt mauris consectetur at. Duis ut dignissim nulla, non fermentum velit. Vivamus ultrices egestas fringilla. Morbi felis velit, imperdiet eu odio at, tincidunt fermentum arcu. Nullam tempus vehicula dui sed vehicula. Donec eu ullamcorper eros. Praesent condimentum orci lacus, eu maximus augue tristique eget. Praesent vel viverra nisi. Fusce sed felis justo.\r\n\r\nMorbi vulputate leo id dignissim viverra. Ut quis condimentum ipsum, at lacinia dui. Etiam non velit nisi. Donec convallis est ac erat bibendum tristique. Fusce convallis sit amet turpis ut commodo. Etiam ut facilisis ipsum, sed mattis nibh. Sed elementum odio eu nisl dictum sodales. Integer facilisis ante ac massa egestas congue. Nullam velit leo, placerat eu tortor aliquam, blandit cursus tortor. Donec a lorem euismod, efficitur justo ac, fermentum odio. Aenean vestibulum in sapien eu blandit. Vestibulum porta ut orci id mattis. Morbi vulputate auctor lacus ac aliquam.', '2020-01-27 21:23:14', 'demonstration-de-la-force', 1, 1),
(30, 'Autre Article', '<p>donc un article en plus pour faire le calcule du nombre d\'article</p>', '2020-02-11 21:22:01', 'Autre-Article', 1, 1),
(31, 'salut la vie', '<p>oui encore une d&eacute;mo</p>', '2020-02-13 19:06:39', 'salut-la-vie', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `article` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_commentaires_articles1_idx` (`article`),
  KEY `fk_commentaires_users1_idx` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rangs`
--

DROP TABLE IF EXISTS `rangs`;
CREATE TABLE IF NOT EXISTS `rangs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rangs`
--

INSERT INTO `rangs` (`id`, `name`, `code`) VALUES
(1, 'admin', '1'),
(2, 'subscriber', '2');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rang` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_rangs1_idx` (`rang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `login`, `password`, `email`, `rang`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.admin', 1),
(2, 'demo', 'demo', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@demo.fr', 2),
(3, 'amaury', 'VERDENAL', 'hellrota', '9c94fdf9fd04aab309f61fa70ef71f5e', 'amaury.y.verdenal@gmail.com', 2);

-- --------------------------------------------------------

--
-- Structure de la table `warning`
--

DROP TABLE IF EXISTS `warning`;
CREATE TABLE IF NOT EXISTS `warning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `commentaire` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_warning_commentaires1_idx` (`commentaire`),
  KEY `fk_warning_users1_idx` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_users` FOREIGN KEY (`autor`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_commentaires_articles1` FOREIGN KEY (`article`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaires_users1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_rangs1` FOREIGN KEY (`rang`) REFERENCES `rangs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `warning`
--
ALTER TABLE `warning`
  ADD CONSTRAINT `fk_warning_commentaires1` FOREIGN KEY (`commentaire`) REFERENCES `commentaires` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_warning_users1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
