-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 01 Juillet 2019 à 23:08
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `epiz_24130561_POOPHP`
--

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE `batiment` (
  `id_batiment` int(11) NOT NULL,
  `nom_batiment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `batiment`
--

INSERT INTO `batiment` (`id_batiment`, `nom_batiment`) VALUES
(1, 'batiment A'),
(2, 'batiment B'),
(3, 'Batiment C'),
(8, 'Batiment D'),
(9, 'Batiment E'),
(12, 'Batiment F'),
(13, 'Batiment G');

-- --------------------------------------------------------

--
-- Structure de la table `boursier`
--

CREATE TABLE `boursier` (
  `id_etudiant` int(11) NOT NULL,
  `id_pension` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `boursier`
--

INSERT INTO `boursier` (`id_etudiant`, `id_pension`) VALUES
(1, 3),
(92, 3),
(181, 3),
(182, 3),
(184, 3),
(183, 4);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_chambre` int(11) NOT NULL,
  `nom_chambre` varchar(50) NOT NULL,
  `id_batiment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `nom_chambre`, `id_batiment`) VALUES
(1, 'chambre1', 1),
(2, 'chambre2', 2),
(3, 'chambre 3', 3),
(4, 'chambre 3', 1),
(11, 'ma chambre', 13),
(12, 'chambre 6', 12);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom`, `prenom`, `tel`, `email`, `date_naissance`) VALUES
(1, 'Diop', 'Rokhaya', 778546568, 'rokhaya@gmail.com', '1997-06-04'),
(2, 'niang', 'Fatou', 778526568, 'toufaa@gmail.com', '1995-06-04'),
(24, 'faye', 'fatoumata', 771584192, 'fayefatou@gmail.com', '2019-06-19'),
(27, 'sarr', 'aida', 778545522, 'sarr97@gmail.com', '2019-06-05'),
(42, 'diop', 'mouhsinatou', 778522255, 'mya@gmail.com', '2019-06-05'),
(92, 'Thiam ', 'Kader', 778954569, 'thiamkader@gmail.com', '2019-06-21'),
(97, 'Ndiaye', 'Ndéye Fatou', 778521325, 'fatou1234@gmail.com', '2019-06-25'),
(171, 'gueye', 'soda', 781586562, 'dosa95@gmail.com', '2019-06-14'),
(181, 'gaye', 'khalil', 785205232, 'gaye123@gmail.com', '2019-06-12'),
(182, 'Kandji', 'Kara', 78526523, 'modoukara@gmail.com', '2019-06-12'),
(183, 'Fall', 'Fallou', 785201001, 'fall123@gmail.com', '2019-06-26'),
(184, 'mbaye', 'fatma', 78522325, 'fatima@gmail.com', '2019-07-10');

-- --------------------------------------------------------

--
-- Structure de la table `et_loge`
--

CREATE TABLE `et_loge` (
  `id_etudiant` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `et_loge`
--

INSERT INTO `et_loge` (`id_etudiant`, `id_chambre`) VALUES
(92, 1);

-- --------------------------------------------------------

--
-- Structure de la table `non_loge`
--

CREATE TABLE `non_loge` (
  `adresse` varchar(50) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `non_loge`
--

INSERT INTO `non_loge` (`adresse`, `id_etudiant`) VALUES
('Dakar', 1),
('malika', 2),
('yeumbeul', 24),
('cité sonatel', 27),
('keur massar', 42),
('Fass Mbao', 97),
('yeumbeul', 171);

-- --------------------------------------------------------

--
-- Structure de la table `pension`
--

CREATE TABLE `pension` (
  `id_pension` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pension`
--

INSERT INTO `pension` (`id_pension`, `type`) VALUES
(3, 'Demi_pension'),
(4, 'pension_entiere');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`id_batiment`);

--
-- Index pour la table `boursier`
--
ALTER TABLE `boursier`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_pension` (`id_pension`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `id_batiment` (`id_batiment`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `et_loge`
--
ALTER TABLE `et_loge`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_chambre` (`id_chambre`);

--
-- Index pour la table `non_loge`
--
ALTER TABLE `non_loge`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `pension`
--
ALTER TABLE `pension`
  ADD PRIMARY KEY (`id_pension`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `batiment`
--
ALTER TABLE `batiment`
  MODIFY `id_batiment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT pour la table `pension`
--
ALTER TABLE `pension`
  MODIFY `id_pension` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `boursier`
--
ALTER TABLE `boursier`
  ADD CONSTRAINT `boursier_ibfk_1` FOREIGN KEY (`id_pension`) REFERENCES `pension` (`id_pension`),
  ADD CONSTRAINT `boursier_ibfk_2` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`);

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`id_batiment`) REFERENCES `batiment` (`id_batiment`);

--
-- Contraintes pour la table `et_loge`
--
ALTER TABLE `et_loge`
  ADD CONSTRAINT `et_loge_ibfk_1` FOREIGN KEY (`id_chambre`) REFERENCES `chambre` (`id_chambre`),
  ADD CONSTRAINT `et_loge_ibfk_2` FOREIGN KEY (`id_etudiant`) REFERENCES `boursier` (`id_etudiant`);

--
-- Contraintes pour la table `non_loge`
--
ALTER TABLE `non_loge`
  ADD CONSTRAINT `non_loge_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
