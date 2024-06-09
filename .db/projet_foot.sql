-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 juin 2024 à 14:11
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_foot`
--

-- --------------------------------------------------------

--
-- Structure de la table `championnat`
--

CREATE TABLE `championnat` (
  `code_championnat` int(10) NOT NULL,
  `nom_du_championnat` varchar(50) NOT NULL,
  `organisateur` varchar(50) NOT NULL,
  `pays` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `surnom` varchar(50) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `poste` varchar(50) DEFAULT NULL,
  `style_jeu` varchar(100) DEFAULT NULL,
  `saison` varchar(20) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `titres_obtenus` varchar(255) DEFAULT NULL,
  `valeur` decimal(10,2) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `code_championnat` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`id`, `nom`, `prenom`, `surnom`, `date_naissance`, `numero`, `poste`, `style_jeu`, `saison`, `pays`, `titres_obtenus`, `valeur`, `photo`, `code_championnat`) VALUES
(1, 'lin', 'xil', 'hkjl', '1980-09-08', 4, 'aTT', 'CFHGJH', 'UI', 'GHAB', 'gfghgf', 678.00, 'https://besthqwallpapers.com/Uploads/7-12-2018/73685/messi-match-barcelona-fc-fcb-argentinian-footballers.jpg', 67),
(2, 'bjhk', ' n,blk', 'nkj', '0000-00-00', 67, 'jhgkljml', ' j,h', 'hij', 'hihop', 'hoiuoop', 8798.00, 'https://besthqwallpapers.com/Uploads/7-12-2018/73685/messi-match-barcelona-fc-fcb-argentinian-footballers.jpg', 78),
(5, 'ett', 'ett', 'ett', '2024-06-29', 3, 'attaquant', ' j,h', '2', 'togo', 'ere', 22.00, 'https://i.eurosport.com/2018/06/30/2364084-49180450-2560-1440.jpg', 0),
(6, 'ett', 'ett', 'ett', '2024-06-29', 3, 'attaquant', ' j,h', '2', 'togo', 'ere', 22.00, 'https://i.eurosport.com/2018/06/30/2364084-49180450-2560-1440.jpg', 0),
(7, 'ronaldo', 'critiano', 'cr7', '2024-06-16', 7, 'lateral gauche', 'offensive', '2', 'portuga', 'ldc', 200.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.w-TJ0BYjDCCKpjlcK0tbhwAAAA%26pid%3DApi&f=1&ipt=3a6961ba20ce74e66f2dbf9f046ef9e2835e5fbd34ee0a2c4dec6a30edc1677a&ipo=images', 66);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`) VALUES
(1, 'df', 'df', '$2y$10$EWwhZh9O.EgjIn6ymdgpquGMBADCds3QpwZpVipYKMDGyCsaAxR0e'),
(2, 'jjj', 'jjjj', '$2y$10$m4.xUBf1TtyMfa9CVvFzIOvgjEb7XzhOexws09Yeg/Y69eggMPnn6'),
(3, 'john', 'ama', '$2y$10$.3ynD3.M5QUHZ0ItIUJbEePa1L8qF0IdKXha8B0AKWB41ITR239AS'),
(4, 'will', 'will', '$2y$10$Vb04zZHSYERfkE2oNT5euuSegbKTNvdgE3rZmKip2YuHl5W09Nfxe');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `championnat`
--
ALTER TABLE `championnat`
  ADD PRIMARY KEY (`code_championnat`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `championnat`
--
ALTER TABLE `championnat`
  MODIFY `code_championnat` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
