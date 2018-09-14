-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 14 sep. 2018 à 18:47
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
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `pass`) VALUES
(1, 'admin', '$2y$10$Pk4Z6n56Xf2A.F84ijJ0E.39H1MmWrTPBUHT2eUv7ggtEHP2asW.q');

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `categorie` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `categorie`, `title`, `post`, `post_date`) VALUES
(1, 1, 'Article 1', '<p>In arcu odio, consequat sit amet sollicitudin eu, faucibus sollicitudin sapien. Etiam vel massa a dolor pretium finibus. Nam tincidunt diam magna, id gravida orci egestas nec. Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar</p>', '2018-08-18 14:00:02'),
(2, 1, 'Article 2', '<p>Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar. Ut sed nibh at enim pulvinar interdum vel condimentum felis. Vestibulum tristique posuere neque. Aenean eleifend, nisi non pellentesque interdum, felis felis lobortis nisi, vitae imperdiet magna nunc laoreet metus. Sed nec metus eget lacus porta mollis non nec nibh</p>', '2018-08-19 15:04:20'),
(4, 2, 'Article 4', '<p>Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar. Ut sed nibh at enim pulvinar interdum vel condimentum felis. Vestibulum tristique posuere neque. Aenean eleifend, nisi non pellentesque interdum, felis felis lobortis nisi, vitae imperdiet magna nunc laoreet metus. Sed nec metus eget lacus porta mollis non nec nibh</p>', '2018-08-22 16:30:00'),
(5, 2, 'Article 5', '<p>In arcu odio, consequat sit amet sollicitudin eu, faucibus sollicitudin sapien. Etiam vel massa a dolor pretium finibus. Nam tincidunt diam magna, id gravida orci egestas nec. Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar</p>', '2018-08-28 09:12:00'),
(6, 1, 'Article 6', '<p>Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar. Ut sed nibh at enim pulvinar interdum vel condimentum felis. Vestibulum tristique posuere neque. Aenean eleifend, nisi non pellentesque interdum, felis felis lobortis nisi, vitae imperdiet magna nunc laoreet metus. Sed nec metus eget lacus porta mollis non nec nibh</p>', '2018-08-29 08:55:00'),
(7, 2, 'Article 7', '<p>In arcu odio, consequat sit amet sollicitudin eu, faucibus sollicitudin sapien. Etiam vel massa a dolor pretium finibus. Nam tincidunt diam magna, id gravida orci egestas nec. Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero. Mauris faucibus libero et arcu fermentum, sit amet iaculis quam pulvinar</p>', '2018-08-31 10:20:00'),
(8, 3, 'Un article', '<p>Ut sed nibh at <em>enim pulvinar&nbsp;</em>nterdum vel condimentum felis. Vestibulum tristique posuere neque. Aenean eleifend, nisi non pellentesque <em>interdum</em>, felis felis <strong>lobortis</strong> nisi.</p>', '2018-09-05 15:48:45'),
(9, 1, 'Article 9', '<p>Illud tamen te esse admonitum volo, primum ut qualis es talem te esse omnes existiment ut, quantum a rerum turpitudine abes, tantum te a verborum libertate seiungas; deinde ut ea in alterum ne dicas, quae cum tibi falso responsa sint, erubescas.</p>\r\n<p>Quis est enim, cui via ista non pateat, qui isti aetati atque etiam isti dignitati non possit quam velit petulanter, etiamsi sine ulla suspicione, at non sine argumento male dicere?</p>', '2018-09-06 16:01:02'),
(12, 1, 'Article random', '<p><strong>Illud tamen te esse ad</strong><em>monitum volo</em>, primum ut qualis es talem te esse omnes existiment ut, quantum a rerum turpitudine abes, tantum te a verborum libertate seiungas; deinde ut ea in alterum ne dicas, quae cum tibi falso responsa sint, erubescas.</p>\r\n<p>Quis est enim, cui via ista non pateat, qui isti aetati atque etiam isti dignitati non possit quam velit petulanter, etiamsi sine ulla suspicione, at non sine argumento male dicere?&nbsp;</p>', '2018-09-14 16:20:02');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`) VALUES
(1, 'Sans catégorie'),
(2, 'Roman'),
(3, 'Film'),
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
  `comment_date` datetime NOT NULL,
  `report` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `mail`, `author`, `comment`, `comment_date`, `report`) VALUES
(26, 12, '2k@gmail.Com', 'Anthony', 'Laus pudoris tui, quod ea te invitum dicere videbamus, ingenii, quod ornate politeque ?', '2018-09-14 16:23:15', 6),
(27, 8, 'test2@gmail.com', 'Michel', 'Allo????', '2018-09-14 17:20:21', 2),
(28, 12, 'jgh@gdfgdfg.fr', 'Daniel', 'Qualis es talem te esse omnes existiment ut, quantum a rerum turpitudine abes', '2018-09-14 18:42:04', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
