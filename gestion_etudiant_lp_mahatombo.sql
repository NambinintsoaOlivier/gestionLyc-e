-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 fév. 2023 à 16:14
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_etudiant_lp_mahatombo`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `id_absence` int(11) NOT NULL AUTO_INCREMENT,
  `trimestre` varchar(15) NOT NULL,
  `heure` int(11) NOT NULL,
  `id_elev` int(11) NOT NULL,
  `anneescol` varchar(9) NOT NULL,
  `date_jour` int(11) NOT NULL,
  PRIMARY KEY (`id_absence`),
  KEY `id_elev` (`id_elev`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id_absence`, `trimestre`, `heure`, `id_elev`, `anneescol`, `date_jour`) VALUES
(5, '1er trimestre', 2, 2, '2021-2022', 0),
(7, '1er trimestre', 4, 2, '2021-2022', 0),
(8, '1er trimestre', 2, 1, '2021-2022', 0),
(10, '1er trimestre', 0, 0, '2021-2022', 3),
(13, '1er trimestre', 0, 11, '2021-2022', 3),
(14, '1er trimestre', 4, 14, '2021-2022', 0);

-- --------------------------------------------------------

--
-- Structure de la table `anneescolaire`
--

DROP TABLE IF EXISTS `anneescolaire`;
CREATE TABLE IF NOT EXISTS `anneescolaire` (
  `code_annee` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `anneescolaire`
--

INSERT INTO `anneescolaire` (`code_annee`) VALUES
('2021-2022');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `code_classe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_classe` varchar(30) NOT NULL,
  PRIMARY KEY (`code_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`code_classe`, `nom_classe`) VALUES
(1, '6 eme'),
(2, '5 eme'),
(5, '4 eme'),
(6, '3 eme'),
(7, 'Second'),
(8, 'Premiere L'),
(9, 'Premiere S'),
(10, 'Terminal L'),
(11, 'Terminal S');

-- --------------------------------------------------------

--
-- Structure de la table `date_jour`
--

DROP TABLE IF EXISTS `date_jour`;
CREATE TABLE IF NOT EXISTS `date_jour` (
  `id_date` date NOT NULL,
  PRIMARY KEY (`id_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant2`
--

DROP TABLE IF EXISTS `enseignant2`;
CREATE TABLE IF NOT EXISTS `enseignant2` (
  `id_prof` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prof` varchar(30) NOT NULL,
  `prenom_prof` varchar(50) NOT NULL,
  `sexe_prof` varchar(15) NOT NULL,
  `cin_prof` int(14) DEFAULT NULL,
  `adresse` varchar(30) NOT NULL,
  `contact_prof` int(10) DEFAULT NULL,
  `matiere_prof` varchar(12) NOT NULL,
  `duplicata` varchar(30) NOT NULL,
  `num_auto_enseign` int(20) DEFAULT NULL,
  `im` varchar(30) NOT NULL,
  `fonction` varchar(30) NOT NULL,
  `date_delivrance` varchar(10) NOT NULL,
  `diplome_academique` varchar(30) NOT NULL,
  `categorie_proffessionnel` varchar(30) NOT NULL,
  `diplome_pedagogique` varchar(30) NOT NULL,
  `specialite` varchar(30) NOT NULL,
  `enciennete` varchar(30) NOT NULL,
  `classe_tenue` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant2`
--

INSERT INTO `enseignant2` (`id_prof`, `nom_prof`, `prenom_prof`, `sexe_prof`, `cin_prof`, `adresse`, `contact_prof`, `matiere_prof`, `duplicata`, `num_auto_enseign`, `im`, `fonction`, `date_delivrance`, `diplome_academique`, `categorie_proffessionnel`, `diplome_pedagogique`, `specialite`, `enciennete`, `classe_tenue`) VALUES
(1, 'ANDRIA', 'koto', 'femme', 0, '', 325689542, 'SVT', '', 0, '', '', '', '', '', '', '', '', ''),
(2, 'RAZAFY', 'Pascal', 'homme', 0, '', 324568952, '0', '', 0, '', '', '', '', '', '', '', '', ''),
(3, 'RANDRIA', 'Feno', '', 0, '', 0, '0', '', 0, '', '', '', '', '', '', '', '', ''),
(30, 'RAZAFINDRAFARA', '', 'Masculin', 0, '', 0, 'HG', '', 0, '', '', '', '', '', '', '', '', ''),
(43, 'RAZAFINDRAZAKA', 'Pascaline', 'Feminin', 0, '', 0, '', '', 0, '', '', '', '', '', '', '', '', ''),
(45, 'RAKATAKA', 'Cyprien', 'Masculin', 256846, '', 325689542, 'ANG,', '', 284684, '', '', '', '', '', '', '', '', '5 eme,');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_elev` int(11) NOT NULL AUTO_INCREMENT,
  `nom_elev` varchar(25) NOT NULL,
  `prenom_elev` varchar(30) NOT NULL,
  `date_naiss_elev` varchar(10) NOT NULL,
  `lieu_naiss_elev` varchar(25) NOT NULL,
  `sexe_elev` varchar(10) NOT NULL,
  `adresse_elev` varchar(40) NOT NULL,
  `maladie_elev` varchar(25) NOT NULL,
  `nom_classe` varchar(15) NOT NULL,
  `contact_parent` int(11) DEFAULT NULL,
  `nomprenom_pere` varchar(60) NOT NULL,
  `proffession_pere` varchar(15) NOT NULL,
  `nomprenom_mere` varchar(60) NOT NULL,
  `proffession_mere` varchar(15) NOT NULL,
  `nomprenom_tuteur` varchar(60) NOT NULL,
  `proffession_tuteur` varchar(25) NOT NULL,
  `adresse_parent` varchar(30) NOT NULL,
  `annee` varchar(9) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_elev`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_elev`, `nom_elev`, `prenom_elev`, `date_naiss_elev`, `lieu_naiss_elev`, `sexe_elev`, `adresse_elev`, `maladie_elev`, `nom_classe`, `contact_parent`, `nomprenom_pere`, `proffession_pere`, `nomprenom_mere`, `proffession_mere`, `nomprenom_tuteur`, `proffession_tuteur`, `adresse_parent`, `annee`, `date_inscription`) VALUES
(1, 'VOLANA', 'Nambinintsoa Olivier', '2000-07-08', 'Manjakandriana', 'Masculin', 'Mangarano II', '', '6 eme', 331345830, 'VOLANA Lahady Jean', 'Militaire', 'RALALAHARISOA Holinirina Solofomanana', 'MÃ©nagÃ¨re', '', '', '', '2021-2022', '2021-12-21 03:21:06'),
(2, 'VOLANANIRINA', 'Salohy', '2002-02-09', 'Manjakandriana', 'Feminin', 'Mangarano II', '', 'Premiere L', 331345830, 'VOLANA Lahady Jean', 'Militaire', 'RALALAHARISOA Holinirina Solofomanana', 'MÃ©nagÃ¨re', '', '', 'Mangarano II', '2021-2022', '2021-12-21 04:03:06'),
(4, 'VOLA', 'Sahondra', '2003-10-16', 'Manjakandriana', 'Masculin', 'Mangarano II', '', '6 eme', 0, 'RAKOTO Joseph', 'Chauffeur', '', '', '', '', '', '2021-2022', '2022-01-03 00:25:35'),
(8, 'NJARA', 'Pascal', '2001-06-22', 'Manjakandriana', 'Masculin', 'Mangarano II', '', 'Second', 327894561, 'PASCAL Jean', 'Pompier', '', '', '', '', '', '2021-2022', '2022-01-13 02:31:43'),
(10, 'VELOZARA', 'Anita', '2004-07-01', 'Ambodirano', 'Feminin', 'Ankirihiry-Nord', '', '5 eme', 0, 'Anita VELOZARA', '', '', '', '', '', '', '2021-2022', '2022-01-31 02:37:52'),
(11, 'NARINDRA', 'Fenosoa', '2002-06-06', 'Tana', 'Feminin', 'Tanambao 2', '', 'Second', 0, '', '', '', '', '', '', '', '2021-2022', '2022-02-01 02:41:55'),
(12, 'VELOZARA', 'Anita', '0000-00-00', '', 'Masculin', 'Ankirihiry-Nord', '', 'Second', 0, 'Anita VELOZARA', '', '', '', '', '', '', '2021-2022', '2022-02-03 19:27:41'),
(14, 'RAZAFY', 'Sergio', '2022-02-03', 'Tamatave', 'Masculin', '', '', 'Second', 0, '', '', '', '', '', '', '', '2021-2022', '2022-02-08 00:07:49'),
(15, 'RAKOTO', 'Freddy', '2022-06-07', 'Brickaville', 'Masculin', 'Mangarivotra', 'fdsf', '6 eme', 0, 'fdsfds', 'gfdev', 'vfd', 'vfd', 'vfdfv', 'vfd', 'vfd', '2021-2022', '2022-06-28 23:07:07'),
(19, 'WANA', 'Cedric', '2022-06-01', '', 'Masculin', '', '', '6 eme', 0, '', '', '', '', 'gogo', 'asa', '', '2021-2022', '2022-06-28 23:23:51'),
(20, 'RAFANOMENZANTSOA', 'Nadia', '2022-06-10', 'Toamasina', 'Masculin', '', '', '6 eme', 0, '', '', '', '', '', '', '', '2021-2022', '2022-06-28 23:29:40'),
(21, 'FANOMEZANA', 'Kristina', '2022-06-02', '', 'Feminin', '', '', '6 eme', 0, '', '', '', '', 'fdg', 'fds', '', '2021-2022', '2022-06-28 23:30:04'),
(23, 'RAKOTONANDRASANA', 'Jean de Dieu', '2022-06-10', '', 'Masculin', '', '', '6 eme', 0, '', '', '', '', '', '', '', '2021-2022', '2022-06-30 19:01:36'),
(24, 'WILLIAM', 'Claude', '2003-06-18', '', 'Masculin', '', '', '6 eme', 0, '', '', '', '', '', '', '', '2021-2022', '2022-06-30 20:03:22'),
(25, 'fd', 'fdfd', '', 'fff', 'Masculin', 'fff', 'fff', '6 eme', 2543, 'fff', 'ff', 'ff', 'ff', 'ff', 'ff', 'ff', '2021-2022', '2023-01-31 12:53:28'),
(26, 'fd', 'fdfd', '', 'fff', 'Masculin', 'fff', 'fff', '6 eme', 2543, 'fff', 'ff', 'ff', 'ff', 'ff', 'ff', 'ff', '2021-2022', '2023-01-31 12:54:09'),
(27, 'gg', 'ggg', '', 'ggg', 'Masculin', 'gg', 'gg', '6 eme', 561, 'gg', 'gg', 'gg', 'gg', 'gg', '', 'gg', '2021-2022', '2023-01-31 12:54:36');

-- --------------------------------------------------------

--
-- Structure de la table `heure`
--

DROP TABLE IF EXISTS `heure`;
CREATE TABLE IF NOT EXISTS `heure` (
  `id_heure` time NOT NULL,
  PRIMARY KEY (`id_heure`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `code_matiere` int(11) NOT NULL AUTO_INCREMENT,
  `nom_matiere` varchar(30) NOT NULL,
  `coef_matiere` int(1) NOT NULL,
  `classe_mat` varchar(30) NOT NULL,
  PRIMARY KEY (`code_matiere`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`code_matiere`, `nom_matiere`, `coef_matiere`, `classe_mat`) VALUES
(5, 'HG', 3, '6 eme'),
(6, 'Malagasy', 2, 'Second'),
(7, 'HG', 3, 'Premiere L'),
(8, 'Malagasy', 2, '6 eme'),
(10, 'Francais', 2, 'Second'),
(11, 'EAC', 2, 'Second'),
(12, 'Anglais', 2, 'Second'),
(13, 'MATH', 2, 'Second'),
(14, 'SPC', 2, 'Second'),
(15, 'SVT', 2, 'Second'),
(16, 'SES', 2, 'Second'),
(17, 'TICE', 1, 'Second'),
(18, 'EPS', 1, 'Second'),
(19, 'Malagasy', 2, '5 eme'),
(20, 'HG', 2, 'Second');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `id_elev` int(11) NOT NULL,
  `trimestre` varchar(15) NOT NULL,
  `matiere` varchar(20) NOT NULL,
  `note_journaliere` double NOT NULL,
  `note_composition` double NOT NULL,
  `nom_classe` varchar(15) NOT NULL,
  `coeff_matiere` int(11) NOT NULL,
  PRIMARY KEY (`id_note`),
  KEY `code_matiere` (`coeff_matiere`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id_note`, `id_elev`, `trimestre`, `matiere`, `note_journaliere`, `note_composition`, `nom_classe`, `coeff_matiere`) VALUES
(40, 8, '1er trimestre', 'Francais', 12, 7, 'Second', 2),
(51, 11, '1er trimestre', 'MATH', 8, 6, 'Second', 2),
(53, 1, '1er trimestre', 'HG', 9, 14, '6 eme', 3),
(54, 12, '1er trimestre', 'HG', 16, 14, 'Second', 2),
(55, 13, '1er trimestre', 'SVT', 8, 13, 'Second', 2),
(59, 24, '1er trimestre', 'HG', 8, 2, '6 eme', 3),
(161, 4, '1er trimestre', 'Malagasy', 10, 10, '6 eme', 2),
(189, 14, '1er trimestre', 'Malagasy', 10, 12, 'Second', 2),
(192, 19, '1er trimestre', 'HG', 6, 0, '6 eme', 3),
(193, 23, '1er trimestre', 'HG', 8, 8, '6 eme', 3),
(194, 19, '2eme trimestre', 'Malagasy', 12, 8, '6 eme', 2),
(195, 24, '1er trimestre', 'Malagasy', 8, 0, '6 eme', 2),
(196, 11, '3eme trimestre', 'SVT', 8, 13, 'Second', 2);

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `code_parent` int(11) NOT NULL AUTO_INCREMENT,
  `nomprenom_pere` varchar(60) NOT NULL,
  `proffession_pere` varchar(30) NOT NULL,
  `nomprenom_mere` varchar(60) NOT NULL,
  `proffession_mere` varchar(25) NOT NULL,
  `nomprenom_tuteur` varchar(60) NOT NULL,
  `proffession_tuteur` varchar(25) NOT NULL,
  `adresse_parent` varchar(40) NOT NULL,
  `contact_parent` int(10) NOT NULL,
  PRIMARY KEY (`code_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`code_parent`, `nomprenom_pere`, `proffession_pere`, `nomprenom_mere`, `proffession_mere`, `nomprenom_tuteur`, `proffession_tuteur`, `adresse_parent`, `contact_parent`) VALUES
(1, 'VOLANA Lahady Jean', 'Militaire', 'RALALAHARISOA Holinirina Solofomanana', 'MÃ©nagÃ¨re', '', '', '', 331345830),
(3, 'RAKOTO Joseph', 'Chauffeur', '', '', '', '', '', 325711258),
(7, 'PASCAL Jean', 'Pompier', '', '', '', '', '', 327894561),
(9, 'Anita VELOZARA', '', '', '', '', '', '', 0),
(13, '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `nom_p` varchar(50) NOT NULL,
  `date_p` date NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`idp`, `nom_p`, `date_p`, `description`) VALUES
(1, 'Festival des Femmes', '2022-03-08', 'Toutes les étudiants n\'ont pas des cours dans ce jours');

-- --------------------------------------------------------

--
-- Structure de la table `trimestre`
--

DROP TABLE IF EXISTS `trimestre`;
CREATE TABLE IF NOT EXISTS `trimestre` (
  `code_trimestre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_trimestre` varchar(15) NOT NULL,
  PRIMARY KEY (`code_trimestre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `trimestre`
--

INSERT INTO `trimestre` (`code_trimestre`, `nom_trimestre`) VALUES
(3, '1er trimestre'),
(4, '2eme trimestre'),
(5, '3eme trimestre');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'Olivier', '080700', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
