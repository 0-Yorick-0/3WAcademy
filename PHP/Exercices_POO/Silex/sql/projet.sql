-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 17 Mai 2017 à 15:36
-- Version du serveur: 5.5.54-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `rating` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`,`post_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `author_id`, `post_id`, `content`, `created_at`, `updated_at`, `rating`) VALUES
(31, 17, 16, 'wahouf !', '2017-05-17 14:39:48', NULL, 5),
(32, 17, 16, 'bof', '2017-05-17 14:39:55', NULL, 2),
(33, 17, 15, 'Magnifique', '2017-05-17 14:45:58', NULL, 4),
(34, 17, 16, 'Je vais vous raconter ma vie. Je vais vous raconter ma vie. Je vais vous raconter ma vie. Je vais vous raconter ma vie. Je vais vous raconter ma vie. Je vais vous raconter ma vie. Je vais vous raconter ma vie. Je vais vous raconter ma vie. Je vais vous ra', '2017-05-17 14:49:18', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL COMMENT 'INDEX',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `drawing_src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `numberOfComments` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author_id`, `created_at`, `drawing_src`, `updated_at`, `numberOfComments`, `rating`) VALUES
(5, 'Guillaume', 'Un homme, une conclusion', 3, '2017-05-12 12:18:38', '4saGVJl423TGW8IkRZfX.png', NULL, NULL, NULL),
(15, 'Batte Man', 'Un homme, un batte', 17, '2017-05-15 13:41:32', 'ADQmmh79Fw8oeDpL0WUc.png', '2017-05-17 14:45:58', 1, 4),
(16, 'Macron', 'Un homme, une sodomie', 17, '2017-05-15 14:18:38', 'I5Kfox8rL6nVS7HQfwk2.png', '2017-05-17 14:49:18', 3, 2.16667);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `birthday`, `updated_at`, `created_at`) VALUES
(1, 'Toto', 'bob@gmail.com', 'blabla', '2017-05-10', '2017-05-05 09:44:01', NULL),
(2, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$1meTdhEdZJJ4TS0ZkyKxj.6ltBvC11atK1XlY7VigYPHkRJUBDK4u', '0000-00-00', NULL, '2017-05-11 12:12:22'),
(3, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$of/q/fB6RS5YGyPmqCauduVJq6dP4cnaMUqnHgsPKICEpX/P11DxO', '0000-00-00', NULL, '2017-05-11 12:15:33'),
(4, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$ZmSZX/0kiGIfEAsGCCzZFeJ/jAJdXo3TWeV7Kv6bCUswyg9z0boGS', '0000-00-00', NULL, '2017-05-11 12:18:33'),
(5, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$6mVb8AkMA8gHpQNL2Myl1eNmegVduoOJhJYvmaMWa.fRFKXrifDz2', '0000-00-00', NULL, '2017-05-11 12:19:05'),
(6, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$FcYCR5wEjK62vcK6wLU7VOOGKRPtOArljZBIn8U.uTFjLND0o7Ygi', '0000-00-00', NULL, '2017-05-11 12:20:03'),
(7, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$zK0LIKzZ9Wx9XquAieOlK.xzNS3HjHDX/UzeKbubVB67EtT/sBcpq', '1960-01-01', NULL, '2017-05-11 12:28:27'),
(8, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$IxxeXB/Urkkvxb83z4ilAeDyDTvvdt025aIMCd.zSCBTTjGR7o5BO', '1960-01-01', NULL, '2017-05-11 12:31:23'),
(9, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$8QKRS/vQXaaypwt2D2EvjelM2tJEVB2VQ5hyL3f9oUneO2BeZP4pm', '1960-10-01', NULL, '2017-05-11 12:31:47'),
(10, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$vw6pY.xyqqeCoZ0tpmhgWulRY637Vls1LXzT85ABcWKu/Yotsx8h2', '1960-01-01', NULL, '2017-05-11 13:05:06'),
(11, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$HGL2VPF9CBc5YOTZa/oxMuQ5Q0SI9QnNDF0Zch04F.n3cHEJDgrCa', '1960-01-01', NULL, '2017-05-11 14:18:37'),
(12, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$e1.P6WeO7JB9lxbo4ODsue5esczt4o25KbIP2omZXIykV80aPJIOC', '1960-01-01', NULL, '2017-05-11 14:21:28'),
(13, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$tZ5XeQDwqcBcW2wHprl.z.l3qRc0OVDmE/.dqa07dEpyHTksPtnNS', '1960-01-01', NULL, '2017-05-11 14:21:37'),
(14, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$kWPuOSChrdAk0uVJdn/MruzDqhq1QzIVulBqvFI2JRZ7aot2hCeg.', '1960-01-01', NULL, '2017-05-11 14:22:02'),
(15, 'CeliaCestPasMoi', 'whatdoyoumean@gmail.com', '$2y$10$ELKW05IPzn5sFzQLqAt.8.zEH4ddsRTPpas0WKrws1PkecButf7YG', '1974-01-01', NULL, '2017-05-11 14:23:50'),
(16, 'Guillaume', 'guiguipopons@ponsmail.com', '$2y$10$A3YHXKCj3EvHKpvXKBv.SO/eg2LL264LywCbq6YFx6vcxUEH6GjyS', '1992-08-13', NULL, '2017-05-11 14:51:47'),
(17, 'Batmec', 'brucewayne@gmail.com', '$2y$10$6YgXxN6KeXVh2RInRBNFOOJJ/e6E6vc6p9hhbfX9LFEiWazeE3N4C', '0000-00-00', '2017-05-16 12:42:16', '2017-05-11 15:13:56');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
