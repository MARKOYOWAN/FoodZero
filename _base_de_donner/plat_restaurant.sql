-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 août 2022 à 12:32
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `plat_restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created_on` datetime DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT current_timestamp(),
  `deleted_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `id_user`, `id_parent`, `title`, `description`, `price`, `is_active`, `created_on`, `updated_on`, `deleted_on`) VALUES
(1, 1, NULL, 'Starters', 'This is a section of your menu. Give your section a brief description', NULL, 1, '2022-08-04 09:01:34', '2022-08-04 09:01:34', '2022-08-04 12:01:34'),
(2, 1, 1, 'Grilled Okra and Tomatoes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 20, 1, '2022-08-04 09:05:11', '2022-08-04 09:05:11', '2022-08-04 12:05:11'),
(3, 1, 1, 'Cucumber Salad', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 18, 1, '2022-08-04 09:15:20', '2022-08-04 09:15:20', '2022-08-04 12:15:20'),
(4, 1, 1, 'Basil Pancakes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 12, 1, '2022-08-04 09:15:59', '2022-08-04 09:15:59', '2022-08-04 12:15:59'),
(5, 1, NULL, 'Mains', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, 1, '2022-08-04 09:17:42', '2022-08-04 09:17:42', '2022-08-04 12:17:42'),
(6, 1, 5, 'Deep Sera Snow White Cod Fillet', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 20, 1, '2022-08-04 09:18:16', '2022-08-04 09:18:16', '2022-08-04 12:18:16'),
(7, 1, 5, 'Steak With Rosemary Butter', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 22, 1, '2022-08-04 09:18:29', '2022-08-04 09:18:29', '2022-08-04 12:18:29'),
(8, 1, 5, 'Steak With Rosemary Butter', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 20, 1, '2022-08-04 09:18:41', '2022-08-04 09:18:41', '2022-08-04 12:18:41'),
(9, 1, NULL, 'Steak With Rosemary Butter', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, 1, '2022-08-04 09:21:31', '2022-08-04 09:21:31', '2022-08-04 12:21:31'),
(10, 1, 9, 'Wine Pairing', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 158, 1, '2022-08-04 09:22:02', '2022-08-04 09:22:02', '2022-08-04 12:22:02'),
(11, 1, 9, 'Ntural Wine Pairing', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 90, 1, '2022-08-04 09:22:29', '2022-08-04 09:22:29', '2022-08-04 12:22:29');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `id_users`, `id_menu`, `id_category`, `path`) VALUES
(1, NULL, 1, NULL, 'menu/gtFY8XxnZVCSodf0kP9hbJ2vI6e5yLRw.jpg'),
(2, NULL, 2, NULL, 'menu/1E7VJIyo9lGNheB3Z0WFacxj4Tdzt8K5.jpg'),
(3, NULL, 4, NULL, 'menu/Acr0aI2GZ9POtd6vnkKD1yHCVosNB8T5.jpg'),
(5, NULL, NULL, 9, 'category/HiOx1BEyTvgf5qado89lU0ZSPIhKJwNe.jpg'),
(6, NULL, NULL, 1, 'category/FBydhAMrignfoG5VT2HKtNCXmcv1Yxz0.jpg'),
(7, NULL, NULL, 5, 'category/3bVpSRgI0crOLtv2NYyJMx5sq6zmGUwX.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `subtitle` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created_on` datetime DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT current_timestamp(),
  `deleted_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `title`, `subtitle`, `description`, `display_order`, `is_active`, `created_on`, `updated_on`, `deleted_on`) VALUES
(1, 'Melt in Your Mouth', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2022-08-04 08:53:06', '2022-08-04 08:53:06', '2022-08-04 11:53:06'),
(2, 'The Best Taste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 2, 1, '2022-08-04 08:55:33', '2022-08-04 08:55:33', '2022-08-04 11:55:33'),
(4, 'Cooking Suggestion', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL, 3, 1, '2022-08-04 08:59:52', '2022-08-04 08:59:52', '2022-08-04 11:59:52');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_rs` date DEFAULT NULL,
  `heure_rs` time DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 0,
  `created_on` datetime DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT current_timestamp(),
  `deleted_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `fisrt_name` varchar(45) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `number_phone` varchar(20) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created_on` datetime DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT current_timestamp(),
  `deleted_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `fisrt_name`, `email`, `number_phone`, `password`, `is_active`, `created_on`, `updated_on`, `deleted_on`) VALUES
(1, 'RATSIMBAZAFY', 'Marko William', 'markoyowanratsimbazafy@gmail.com', '+261347178475', '$2y$10$vfgiA2wVgnZZZ5L830JVku7/iV8raFRUk1KQNc6h.dJJSvwB3hIGq', 1, '2022-08-04 08:44:25', '2022-08-04 08:44:25', '2022-08-04 11:44:25');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`,`id_user`),
  ADD KEY `fk_CATEGORY_CATEGORY1_idx` (`id_parent`),
  ADD KEY `fk_CATEGORY_USER1_idx` (`id_user`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_MEDIA_USERS1_idx` (`id_users`),
  ADD KEY `fk_MEDIA_CATEGORY1_idx` (`id_category`),
  ADD KEY `fk_MEDIA_MENU1_idx` (`id_menu`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`,`id_user`),
  ADD KEY `fk_RESERVATION_USER1_idx` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_CATEGORY_CATEGORY1` FOREIGN KEY (`id_parent`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CATEGORY_USER1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_MEDIA_CATEGORY1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_MEDIA_MENU1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_MEDIA_USERS1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_RESERVATION_USER1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
