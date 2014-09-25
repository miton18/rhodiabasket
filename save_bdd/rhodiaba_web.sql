-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Client :  sql-02.redheberg.com
-- Généré le :  Jeu 25 Septembre 2014 à 10:21
-- Version du serveur :  5.5.37-log
-- Version de PHP :  5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rhodiaba_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `nom` varchar(50) NOT NULL,
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`nom`) VALUES
('benjamines'),
('benjamins'),
('cadets'),
('cadettes'),
('dirigeant'),
('minimes'),
('minimes (fille)'),
('minimes (garcon)'),
('poussines'),
('poussins'),
('seniors (fille)'),
('seniors (garcon)');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(50) DEFAULT NULL,
  `licence` varchar(50) NOT NULL COMMENT 'N° de licence',
  `nom` text NOT NULL COMMENT 'Nom du joueur',
  `prenom` text NOT NULL COMMENT 'Prénom du joueur',
  `tel` int(10) NOT NULL COMMENT 'N° telephone',
  `ville` text NOT NULL COMMENT 'Ville',
  `mail` text NOT NULL COMMENT 'E-mail du joueur',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `cat` (`categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`ID`, `categorie`, `licence`, `nom`, `prenom`, `tel`, `ville`, `mail`) VALUES
(22, 'seniors (fille)', 'VT812079', 'BOSLAND', 'Christelle', 670555172, 'Montseveroux', 'christelle.bosland@laposte.net'),
(25, 'seniors (fille)', 'VT 86 13 87', 'ROBERT ', 'FANNY', 679750530, 'Vienne', 'robert.fanny@voila.fr'),
(26, 'seniors (fille)', 'VT 82 01 42', 'PETIT', 'CHARLOTTE', 613311293, 'Maclas', 'cachapetit@netcourrier.com'),
(27, 'seniors (fille)', 'VT 87 13 96', 'TORSIELLO ', 'KARINE', 683316739, 'Condrieu', 'karine.torsiello@gmail.com'),
(28, 'seniors (fille)', 'VT 85 29 13', 'ROBIN ', 'LAURIANNE', 661954325, 'Penol', 'lauriane.robin@hotmail.fr'),
(29, 'seniors (fille)', 'VT 84 05 64', 'SARRAZIN', 'BETTY', 618244483, 'Mantaille', 'bettysarrazin@hotmail.fr'),
(30, 'seniors (fille)', 'VT 86 13 92', 'GIOVANDO', 'ELODIE', 689636977, 'St Pierre de Boeuf', 'R@RHODIA.FR'),
(31, 'seniors (fille)', 'VT 89 12 17', 'ZANARDELLI', 'CORALIE', 600000000, 'R', 'R@RHODIA.FR'),
(32, 'seniors (fille)', 'VT 85 03 11 ', 'MATHAIS', 'CAROLINE', 762640572, 'Roussillon', 'R@RHODIA.FR'),
(33, 'seniors (fille)', 'VT 89 09 98', 'SOTON', 'MELANIE', 671367543, 'R', 'soton.melanie@gmail.com'),
(34, 'seniors (fille)', 'RH 73 61 95 ', 'ODIMBA', 'LAURENCED', 600000000, 'R', 'R@RHODIA.FR'),
(35, 'seniors (fille)', 'VT 65 07 17', 'SAGAN', 'VALERIE', 631803680, 'Condrieu', 'vsm65@orange.fr'),
(36, 'seniors (fille)', 'VT 82 01 01', 'CROUZET', 'SOPHIE', 600000000, 'R', 'R@RHODIA.FR'),
(37, 'seniors (fille)', 'VT 64 03 29', 'BILLES', 'MARIE PIERRE ', 600000000, 'R', 'R@RHODIA.FR'),
(38, 'seniors (fille)', 'VT 90 01 12', 'BERLAND', 'CHLOE', 600000000, 'R', 'R@RHODIA.FR'),
(39, 'seniors (fille)', 'VT 90 27 54 ', 'SANCHEZ', 'CYRIELLE', 600000000, 'R', 'R@RHODIA.FR'),
(40, 'seniors (fille)', 'VT 94 53 32', 'CALLAY', 'PAULINE', 600000000, 'R', 'R@RHODIA.FR'),
(41, 'seniors (fille)', 'VT 86 14 83', 'JANKOV', 'INGRID', 600000000, 'R', 'R@RHODIA.FR'),
(42, 'seniors (fille)', 'BC 97 70 28', 'PANIGUTTI', 'ALICE', 600000000, 'R', 'R@RHODIA.FR'),
(43, 'seniors (fille)', 'VT 00 00 00', 'NEW', 'CLAIRE', 600000000, 'R', 'R@RHODIA.FR'),
(44, 'dirigeant', 'VT622230', 'Zerr', 'Anne-edith', 2147483647, 'ROUSSILLON', 'anne-edith.zerr@orange.fr'),
(45, 'dirigeant', 'VT630522', 'UNTERNAHRER', 'Veronique', 611376928, 'salaise sur sanne', 'v.unternahrer38@gmail.com'),
(46, 'dirigeant', 'VT640590', 'BERLAND', 'Corinne', 640056936, 'Clonas sur Vareze', 'quinou11@free.fr'),
(47, 'dirigeant', 'VT750607', 'BREYER', 'Nicolas', 672380032, 'ROUSSILLON', 'nico.breyer@wanadoo.fr'),
(48, 'dirigeant', 'VT710571', 'CAMARA', 'Ousmane', 676786327, 'Tournon sur Rhone', 'o.camara@neuf.fr'),
(49, 'dirigeant', 'VT520314', 'DELEGLISE', 'André', 682402578, 'ROUSSILLON', 'anne-edith.zerr@orange.fr'),
(50, 'cadets', 'BC992799', 'BRAUN', 'Abel', 603407157, 'Le Péage de Roussillon', 'monocbfree.fr'),
(51, 'cadets', 'BC997701', 'NEHAD', 'Otthman', 674872454, 'Le Péage de Roussillon', 'chera38@hotmail.fr'),
(52, 'cadets', 'BC005478', 'NEHAD', 'Bilal', 778022433, 'Le Péage de Roussillon', 'chera38@hotmail.fr'),
(53, 'cadets', 'BC005715', 'SLIMANI', 'Badis', 651673525, 'Le Péage d Roussillon', 'nadir.s@neuf.fr'),
(54, 'cadets', 'BC992349', 'BAYTURK', 'Alperen', 652861240, 'Roussillon', 'bayturk.ayse@gmail.com'),
(55, 'cadets', 'BC990515', 'PERROT ', 'Nathan ', 642705781, 'Maclas', 'nathan009@hotmail.fr'),
(56, 'cadets', 'BC990038', 'LARDON', 'Morgan', 614891228, 'Cours et Buis', 'laloumina@hotmail.fr'),
(57, 'cadets', 'BC992832', 'WARDANI', 'Salim', 601224717, 'Roussillon', 'veronique.wardani@sfr.fr'),
(58, 'cadets', 'BC981158', 'VEYCHARD ', 'Théo', 689542108, 'St Michel Sur Rhône', 'christian.veychard@orange.fr'),
(59, 'cadets', '', 'BREGNIAS', 'Clément', 602105931, 'Roussillon', 'angele3859@hotmail;fr'),
(60, 'cadets', 'BC993335', 'VALLERANT ', 'Maxime', 640786508, 'Le Péage de Roussillon', 'regis.vallerant@free.fr'),
(61, 'poussines', 'BC054156', 'BELAHBIB', 'DJAOUIDA', 615189802, 'SALAISE SUR SANNE', 'khellof.belahbib@free.fr'),
(62, 'seniors (fille)', 'VT 00 00 00', 'Porchreon', 'SOPHIE', 600000000, 'R', 'R@RHODIA.FR'),
(63, 'poussines', 'BC058444', 'CHARREL', 'MAELLE', 687476909, 'SALAISE SUR SANNE', 'allmaud@voila.fr'),
(64, 'poussines', 'BC057421', 'BEGOT', 'MERYL', 662262311, 'VILLE SOUS ANJOU', 'jb.maconnerie@orange.fr'),
(65, 'poussines', 'BC051427', 'BOURGUIGNON', 'LEE-LOU', 686983784, 'SALAISE SUR SANNE', 'nadege.bourguignon@gmail.com'),
(66, 'cadets', '', 'CABRERO', 'Giovanni', 673159682, 'Le Péage de Roussillon', ''),
(67, 'cadets', 'BC999625', 'GESKOFF', 'Sofiane ', 675872519, 'Agnin', 'frednelly@orange.fr'),
(68, 'cadets', 'BC997535', 'LAMBERT', 'Clovis ', 667861718, 'La Chapelle de Surieu', 'paulinpascale@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`login`, `password`) VALUES
('anthony', 'c7345f8136575af84b13ce97721d23fb2070319e'),
('charlotte', 'e577737c3f42de792a66d21108430e88ee11dd65'),
('coralie', '8aef2b54fbf60a385300c08af5c782993538324d'),
('cyrielle', '62bd8a110c50b2e57dca22cead342b4ff4ac0111'),
('edith', '3617b92e5588c676aebdee9090044a3075fa88d0'),
('elsa', '0387d8a2adad87393aa656a4aa818a4b101fe261'),
('entraineur', '7cf5ee1bd35e9670a533e10ded0b80627bf561d6'),
('karine', '9094c6025c87cecb5d97cca89aead6b7bc3d53cc'),
('loris', 'b2150d6ff30507bd6859f3bd024c7bab08869290'),
('malik', '5b6558dcfd7c1d73e132beaf2952d7f55f250f07'),
('melanie', '3511a8f66d24e204342e1f1c45b3b7c8cd18c5df'),
('nicolas', '98b2425c5644922e0e77fb1315fc5e2af0cd5a27'),
('ousmane', 'a1a222a4a167c208fe6b72dfa3b8379a2ef834a0'),
('root', '435b41068e8665513a20070c033b08b9c66e4332'),
('tristan', '4cffb06df5d9e6fbef2e092ed997d2ad9093cdbe'),
('valerie', '93a0c885dd9812b3f79ceda72735745cd6b12572');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `refnom` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`nom`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
