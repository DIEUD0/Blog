-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 05 sep. 2018 à 01:32
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet4`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `categorie` tinyint(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `categorie`, `title`, `post`, `post_date`) VALUES
(1, 1, 'Article 1', 'In arcu odio, consequat sit amet sollicitudin eu, faucibus sollicitudin sapien. Etiam vel massa a dolor pretium finibus. Nam tincidunt diam magna, id gravida orci egestas nec. Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar', '2018-08-18 00:00:00'),
(2, 1, 'Article 2', 'Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar. Ut sed nibh at enim pulvinar interdum vel condimentum felis. Vestibulum tristique posuere neque. Aenean eleifend, nisi non pellentesque interdum, felis felis lobortis nisi, vitae imperdiet magna nunc laoreet metus. Sed nec metus eget lacus porta mollis non nec nibh', '2018-08-19 00:00:00'),
(3, 1, 'Article 3', 'In arcu odio, consequat sit amet sollicitudin eu, faucibus sollicitudin sapien. Etiam vel massa a dolor pretium finibus. Nam tincidunt diam magna, id gravida orci egestas nec. Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar', '2018-08-18 00:00:00'),
(4, 2, 'Article 4', 'Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar. Ut sed nibh at enim pulvinar interdum vel condimentum felis. Vestibulum tristique posuere neque. Aenean eleifend, nisi non pellentesque interdum, felis felis lobortis nisi, vitae imperdiet magna nunc laoreet metus. Sed nec metus eget lacus porta mollis non nec nibh', '2018-08-19 00:00:00'),
(5, 2, 'Article 5', 'In arcu odio, consequat sit amet sollicitudin eu, faucibus sollicitudin sapien. Etiam vel massa a dolor pretium finibus. Nam tincidunt diam magna, id gravida orci egestas nec. Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar', '2018-08-18 00:00:00'),
(6, 1, 'Article 6', 'Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar. Ut sed nibh at enim pulvinar interdum vel condimentum felis. Vestibulum tristique posuere neque. Aenean eleifend, nisi non pellentesque interdum, felis felis lobortis nisi, vitae imperdiet magna nunc laoreet metus. Sed nec metus eget lacus porta mollis non nec nibh', '2018-08-19 00:00:00'),
(7, 2, 'Article 7', 'In arcu odio, consequat sit amet sollicitudin eu, faucibus sollicitudin sapien. Etiam vel massa a dolor pretium finibus. Nam tincidunt diam magna, id gravida orci egestas nec. Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar', '2018-08-18 00:00:00'),
(8, 3, 'Article 8', 'Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar. Ut sed nibh at enim pulvinar interdum vel condimentum felis. Vestibulum tristique posuere neque. Aenean eleifend, nisi non pellentesque interdum, felis felis lobortis nisi, vitae imperdiet magna nunc laoreet metus. Sed nec metus eget lacus porta mollis non nec nibh', '2018-08-19 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`) VALUES
(1, 'Actualité'),
(2, 'Roman'),
(3, 'test'),
(4, 'test4');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `mail`, `author`, `comment`, `comment_date`) VALUES
(1, 1, '', 'gfdh@hgfhfs.fr', 'Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero.', '2018-08-20 00:00:00'),
(2, 2, '', 'gfdh@hgfhfs.fr', 'Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero.Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero.', '2018-08-20 00:00:00'),
(3, 1, '', 'hfgh', 'hgfh', '2018-08-28 20:35:07'),
(4, 2, '', 'hfgh', 'hfgh', '2018-08-28 20:35:14'),
(5, 8, '', 'jhg', 'hgjgh', '2018-08-28 21:12:34'),
(6, 8, '', 'hfg', 'hfgh', '2018-08-29 00:07:10'),
(7, 8, '', 'hgjgh', 'ghjgh', '2018-08-29 11:48:53'),
(8, 7, '', 'chdf', 'hfghfg', '2018-08-29 11:49:41'),
(9, 2, '', 'jhgkjg', 'ikuk', '2018-08-29 14:53:51'),
(10, 6, '', 'gdfg', 'fdg', '2018-09-01 23:16:33'),
(11, 6, '', 'gdfg', 'gdfgdf', '2018-09-01 23:17:03'),
(12, 8, '', 'jghd', 'jhgjgh', '2018-09-03 01:26:11'),
(13, 8, '', 'jghjgh', 'jhgjgh', '2018-09-03 11:43:16'),
(14, 8, 'hkkh', 'khjk', 'khjk', '2018-09-04 19:39:26'),
(15, 8, 'jghjgh', 'jghjg', 'jghjg', '2018-09-04 19:39:30'),
(16, 8, 'gdfgd', 'fdgdf', 'gfdg', '2018-09-04 19:40:23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
