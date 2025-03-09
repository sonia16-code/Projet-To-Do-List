-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 15 mars 2024 à 15:21
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Base de données : `todolist`
--
-- --------------------------------------------------------
--
-- Structure de la table `task`
--
CREATE TABLE `task` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `it_s_done` tinyint(1) DEFAULT '0',
  `creation_date` date NOT NULL,
  `modification_date` date DEFAULT NULL,
  `id_user` int NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
-- --------------------------------------------------------
--
-- Structure de la table `user`
--
CREATE TABLE `user` (
  `id` int NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
--
-- Déchargement des données de la table `user`
--
INSERT INTO `user` (`id`, `pseudo`, `email`, `password`)
VALUES (1, 'Lena', 'lena@gmail.com', '123456'),
  (
    3,
    'Diana',
    'Diana@yahoo.fr',
    '$2y$10$p5GGHngawT3WJ/JgKVAGF.dZI9jBJkGeeHk28ftX1dkbVY/2R8ymm'
  ),
  (
    4,
    'Noor',
    'noor@hotmail.fr',
    '$2y$10$ebOXQW0pDW8p5pc/GF1f2u8F5AjIV3xAIEXk.0rbwauhamPhrBTo2'
  ),
  (
    5,
    'Aziza',
    'aziza@gmail.com',
    '$2y$10$0dC.7cJ/I2ML8ph45KuEW.MCJQmDKWVdBr4ayMWxAJG/NkpVmfotm'
  );
--
-- Index pour les tables déchargées
--
--
-- Index pour la table `task`
--
ALTER TABLE `task`
ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);
--
-- Index pour la table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT pour les tables déchargées
--
--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
MODIFY `id` int NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id` int NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- Contraintes pour les tables déchargées
--
--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;