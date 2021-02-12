-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : ven. 12 fév. 2021 à 14:30
-- Version du serveur :  10.5.4-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `exe_oo_1_table`
--

-- --------------------------------------------------------

--
-- Structure de la table `thenews`
--

DROP TABLE IF EXISTS `thenews`;
CREATE TABLE IF NOT EXISTS `thenews` (
  `idtheNews` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `theNewsTitle` varchar(150) NOT NULL,
  `theNewsText` text NOT NULL,
  `theNewsDate` datetime DEFAULT current_timestamp(),
  `theUser_idtheUser` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idtheNews`),
  KEY `fk_theNews_theUser_idx` (`theUser_idtheUser`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thenews`
--

INSERT INTO `thenews` (`idtheNews`, `theNewsTitle`, `theNewsText`, `theNewsDate`, `theUser_idtheUser`) VALUES
(8, 'L’acteur canadien Christopher Plummer est mort', 'Il était connu pour un film qu’il n’aimait pas et désignait sous ses seules initiales « S.M. » pour The Sound of Music, titre original de La Mélodie du bonheur, énorme succès signé Robert Wise en 1955. Dans ce film musical et sentimental, il joue un capitaine autrichien, veuf et antinazi, lequel tombe amoureux – et vice versa – de la gouvernante de sa nombreuse progéniture, interprétée par Julie Andrews. De son personnage de Georg von Trapp, il disait avec l’ironie qui était sa marque : « Il faut beaucoup de métier pour remplir cette carcasse vide. » Il était aussi le plus vieil acteur à n’avoir jamais remporté un Oscar. Christopher Plummer est décédé vendredi 5 février, à Weston dans le Connecticut, des suites d’une mauvaise chute. Il avait 91 ans.\r\n\r\nNé le 13 décembre 1929 à Toronto d’un père financier et d’une mère, Isabella Mary, née Abott, petite-fille d’un premier ministre canadien, il est élevé à Montréal, en français et en anglais, par sa mère – ses parents s’étant séparés à sa naissance. Il ne revoit son père qu’à l’âge de 17 ans lorsque ce dernier vient l’applaudir dans un théâtre québécois où il fait ses débuts. « Nous nous sommes revus ensuite une ou deux fois, et puis plus rien », écrit-il dans son autobiographie In Spite of Myself (Vintage, 2008, non traduit). Amertume ou humour noir ? Il confessait n’avoir aucun souvenir de ses parents : « Je ne me souviens que du chien. »', '2021-02-12 15:19:00', 5),
(9, 'Les psys à travers le miroir déformant du cinéma', '«Mes films sont une sorte de psychanalyse, sauf que c\'est moi qui suis payé et ça, ça change tout.» Comme Woody Allen, de nombreux réalisateurs et réalisatrices ont truffé leur film de psy. De Hitchcock aux Sopranos en passant par Hannibal Lecter dans Le silence des agneaux, ils sont récurrents à l\'écran, jusqu\'à devenir un genre à part entière. Psychiatres, psychologues, psychanalystes… Leur distinction est souvent floue et leurs représentations assez éloignées de la réalité.\r\n\r\nBienveillants ou manipulateurs, ridicules et impuissants à soigner leurs patients ou bien encore dangereux psychopathes, les psys de l\'écran suscitent le rire ou la crainte. Leur représentation influe ainsi sur leur image sociale, et certains patients ne consulteront pas, alors qu\'ils en ont besoin. Ceci pose donc une question de santé publique: comment sont représentés les psys à l\'écran?', '2021-02-02 12:19:00', 5),
(15, '«Kadaver», «The Antenna» et «Peninsula»: horreur au cube', 'À l’approche de l’Halloween, les sorties de films d’horreur se multiplient. Rien que cette semaine, une quantité assez folle de titres prennent d’assaut les diverses plateformes de visionnement et de vidéo sur demande. En provenance de Norvège, de Turquie et de Corée du Sud, trois d’entre eux se distinguent. Ce, tout en ayant en commun d’avoir pour toiles de fond des sociétés ravagées — au propre ou au figuré. Faisant écho à des préoccupations bien actuelles, lesdits contextes vont de l’hécatombe nucléaire à une pandémie, en passant par une dictature insidieuse. Il s’agit de Kadaver, de The Antenna et de Peninsula, respectivement.\r\n\r\nLe plus abouti du trio, Kadaver (Chair humaine), premier long métrage du Norvégien Jarand Herdal, se déroule dans un monde postapocalyptique dévasté. Tout un chacun fait ce qu’il peut pour subsister, mais le désespoir fait de nombreuses victimes. On suit une petite famille — Leonora, une ancienne actrice, Jacob, son mari, et Alice, leur fille — après qu’un homme mystérieux les eut conviés à un festin dans un manoir sis en surplomb de la cité. Lors de cette soirée de gala où une pièce immersive est jouée, Alice disparaît, à l’instar de maints convives…\r\n\r\nLa révélation présentée au deuxième acte n’étonnera personne, mais elle est en l’occurrence accessoire. C’est que l’intérêt de Kadaver réside au premier chef dans son atmosphère : aussi sinistre qu’envoûtant, le film est d’abord et avant tout un conte macabre régi par une logique de circonstances. Hormis celle, évidente, à Lewis Carroll, les références aux frères Grimm abondent. C’est dire que la cruauté s’invite à table.', '2021-02-12 15:26:00', 5),
(16, '«Parasite» remporte les SAG Awards', 'Parasite a remporté le prix le plus prestigieux des Screen Actors Guild Awards, une victoire historique qui place ce film sud-coréen en bonne position avant les Oscar.\r\n\r\nCe film, déjà Palme d’or au Festival de Cannes l’an dernier, a remporté le prix du « meilleur ensemble d’acteurs », récompense la plus prisée de cette compétition, dont le palmarès constitue un indicateur pour les Oscar.\r\n\r\n« Je suis un peu gêné avec l’impression que nous sommes maintenant les parasites d’Hollywood », a plaisanté l’un des acteurs du film, Lee Sun-kyun.\r\n\r\n\r\nPlus sérieusement, le réalisateur Bong Joon-ho a reconnu que les chances de réussite de son film aux Oscar augmentaient désormais.\r\n\r\nDrame familial, mâtiné de thriller avec aussi une dimension sociale, Parasite raconte comment une famille désœuvrée s’invite dans le quotidien d’une riche famille, début d’un engrenage incontrôlable. Il a connu un succès mondial depuis sa sortie, de la Corée du Sud aux États-Unis, en passant par l’Europe.\r\n\r\nIl avait également remporté dix jours auparavant le prix du meilleur film en langue étrangère lors de la cérémonie des Golden Globes, les récompenses remises par l’Association de la presse étrangère d’Hollywood.\r\n\r\n« Bien que le titre soit “Parasites”, je pense que ce film traite surtout de la coexistence et comment nous pouvons tous vivre ensemble », a commenté l’acteur Song Kang-ho, qui interprète le père de cette famille « parasite ».', '2020-01-12 15:27:00', 5),
(17, 'En une phrase, le boys band BTS provoque la colère des internautes chinois', 'Il n’est pas facile de faire rimer K-pop, histoire et diplomatie. C’est ce que viennent de découvrir les rois de la pop sud-coréenne (K-pop) BTS. Le septuor – dont le nom est l’abréviation de Bangtan Sonyeondan, qui signifie « boy-scouts résistants aux balles » – s’est vu remettre, le 7 octobre, le prix James A. Van Fleet, et a réussi à se mettre à dos une partie de ses fans chinois.\r\n\r\nCette récompense, qui porte le nom du général commandant les forces américaines et de l’ONU entre 1951 et 1953 en Corée, a été remise au groupe par la Korea Society, qui fait la promotion des relations américano-coréennes. Elle récompense chaque année des personnalités sud-coréennes ou américaines contribuant au rapprochement entre les deux pays. En août, BTS est devenu le premier groupe 100 % sud-coréen à arriver en tête des hits aux Etats-Unis, avec son nouveau tube, Dynamite.\r\n\r\nDurant un discours préenregistré en anglais, RM, le chanteur de BTS, a rendu hommage à « l’histoire douloureuse que nos deux nations partagent et aux sacrifices d’innombrables hommes et femmes ».\r\n\r\nCette allusion à la guerre de Corée, qui a débuté il y a soixante-dix ans, a mis le feu aux poudres : des internautes chinois reprochent aux stars sud-coréennes d’oublier dans leur hommage les milliers de combattants chinois qui ont été tués au cours des trois années du conflit.', '2020-01-14 15:29:00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `theuser`
--

DROP TABLE IF EXISTS `theuser`;
CREATE TABLE IF NOT EXISTS `theuser` (
  `idtheUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `theUserLogin` varchar(60) NOT NULL,
  `theUserPwd` varchar(60) NOT NULL,
  PRIMARY KEY (`idtheUser`),
  UNIQUE KEY `theUserLogin_UNIQUE` (`theUserLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `theuser`
--

INSERT INTO `theuser` (`idtheUser`, `theUserLogin`, `theUserPwd`) VALUES
(1, 'Mattia', 'Mattia'),
(2, 'Bryan', 'Bryan'),
(3, 'Rocio', 'Rocio'),
(4, 'Audrey', 'Audrey'),
(5, 'Marjorie', 'Marjorie'),
(6, 'Jessica', 'Jessica'),
(7, 'Alain', 'Alain'),
(8, 'Chihab', 'Chihab'),
(9, 'Kieran', 'Kieran'),
(10, 'Adrien', 'Adrien'),
(11, 'Clovis', 'Clovis'),
(12, 'Saadallah', 'Saadallah'),
(13, 'Virgile', 'Virgile'),
(14, 'Michaël', 'Michaël');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `thenews`
--
ALTER TABLE `thenews`
  ADD CONSTRAINT `fk_theNews_theUser` FOREIGN KEY (`theUser_idtheUser`) REFERENCES `theuser` (`idtheUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
