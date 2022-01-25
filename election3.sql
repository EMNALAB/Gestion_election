-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 25 déc. 2021 à 16:47
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `election`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(5) NOT NULL,
  `candidate_name` varchar(45) NOT NULL,
  `candidate_state` varchar(45) NOT NULL,
  `candidatevotes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `candidate_name`, `candidate_state`, `candidatevotes`) VALUES
(2, 'Mahdi ABIDI', 'Tunisie', 1),
(3, 'Emna ABIDI', 'Tunisie', 2);

-- --------------------------------------------------------

--
-- Structure de la table `liste_cin`
--

CREATE TABLE `liste_cin` (
  `cin` varchar(8) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `liste_cin`
--

INSERT INTO `liste_cin` (`cin`, `nom`, `prenom`) VALUES
('09000001', 'ben anouer', 'anouer'),
('09000002', 'ben mohamed', 'mohamed'),
('09000003', 'ben Moez ', 'moez'),
('09000004', 'ben amor', 'samia');

-- --------------------------------------------------------

--
-- Structure de la table `states`
--

CREATE TABLE `states` (
  `stateno` int(5) NOT NULL,
  `statename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `states`
--

INSERT INTO `states` (`stateno`, `statename`) VALUES
(1, 'Tunisie');

-- --------------------------------------------------------

--
-- Structure de la table `voters`
--

CREATE TABLE `voters` (
  `voterid` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `cin` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voters`
--

INSERT INTO `voters` (`voterid`, `first_name`, `last_name`, `email`, `password`, `cin`) VALUES
(1, 'anouer', 'gnaoui', 'anouer.gnaoui@gmail.com', 'anouer', '09000001'),
(21, 'mohamed', 'mohamed', 'mohamed@mohamed.com', 'mohamed', '09000002'),
(22, 'moez', 'moez', 'moez@moez.com', 'moez', '09000003');

-- --------------------------------------------------------

--
-- Structure de la table `voting_table`
--

CREATE TABLE `voting_table` (
  `id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `candidateName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voting_table`
--

INSERT INTO `voting_table` (`id`, `voter_id`, `state_name`, `candidateName`) VALUES
(23, 1, 'Tunisie', 'Emna ABIDI'),
(24, 21, 'Tunisie', 'Mahdi ABIDI'),
(26, 22, 'Tunisie', 'Emna ABIDI');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Index pour la table `liste_cin`
--
ALTER TABLE `liste_cin`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`stateno`);

--
-- Index pour la table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`voterid`);

--
-- Index pour la table `voting_table`
--
ALTER TABLE `voting_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voter_id` (`voter_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `states`
--
ALTER TABLE `states`
  MODIFY `stateno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `voters`
--
ALTER TABLE `voters`
  MODIFY `voterid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `voting_table`
--
ALTER TABLE `voting_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
