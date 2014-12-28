-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Dez 2014 um 17:14
-- Server Version: 5.6.21
-- PHP-Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `gp20`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `credentials`
--

CREATE TABLE IF NOT EXISTS `credentials` (
`id` int(11) NOT NULL,
  `username` char(3) COLLATE latin1_german1_ci NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 NOT NULL,
  `salt` varchar(23) CHARACTER SET latin1 NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `isNewsman` tinyint(1) NOT NULL DEFAULT '0',
  `isLocked` tinyint(1) NOT NULL DEFAULT '0',
  `isEnabled` tinyint(1) NOT NULL DEFAULT '0',
  `enable_token` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `regiter_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `credentials`
--

INSERT INTO `credentials` (`id`, `username`, `password`, `salt`, `isAdmin`, `isNewsman`, `isLocked`, `isEnabled`, `enable_token`, `regiter_date`) VALUES
(1, 'PER', '123', '', 0, 0, 0, 0, NULL, '0000-00-00 00:00:00'),
(2, 'hhh', '123', '', 0, 0, 0, 0, NULL, '2014-12-23 15:28:50'),
(3, 'asc', '123', '', 0, 0, 0, 0, NULL, '2014-12-23 15:28:50'),
(4, 'jbs', '123', '', 0, 0, 0, 0, NULL, '2014-12-23 15:28:50'),
(5, 'fsc', '123', '', 0, 0, 0, 0, NULL, '2014-12-23 15:28:50'),
(6, 'pau', '123', '', 0, 0, 0, 0, NULL, '2014-12-23 15:28:50'),
(7, 'php', '123', '', 0, 0, 0, 0, NULL, '2014-12-23 15:28:50'),
(8, 'lks', '123', '', 0, 0, 0, 0, NULL, '2014-12-23 15:28:50'),
(9, 'ruf', '123', '', 0, 0, 0, 0, NULL, '2014-12-23 15:28:50'),
(10, 'gab', '123', '', 0, 0, 0, 0, NULL, '2014-12-23 20:59:09');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `data`
--

CREATE TABLE IF NOT EXISTS `data` (
`id` int(11) NOT NULL,
  `first_name` varchar(32) COLLATE latin1_german1_ci NOT NULL,
  `last_name` varchar(32) COLLATE latin1_german1_ci NOT NULL,
  `tag` char(3) COLLATE latin1_german1_ci NOT NULL,
  `team` varchar(32) COLLATE latin1_german1_ci NOT NULL,
  `email` varchar(128) COLLATE latin1_german1_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `data`
--

INSERT INTO `data` (`id`, `first_name`, `last_name`, `tag`, `team`, `email`) VALUES
(3, 'Alexander', 'Schuster', 'ASC', 'Black Arrow Racing', ''),
(10, 'Gabriel', 'Feyertag', 'FEY', 'SpeedBros', ''),
(2, 'Heinrich', 'Halama', 'HAL', 'Black Arrow Racing', ''),
(4, 'Julian', 'Breitner', 'JBS', 'SpeedBros', ''),
(7, 'Philipp ', 'Passecker', 'PAS', 'Ultimatives Noobteam', ''),
(1, 'Kevin', 'Per', 'PER', 'Mirage Team', ''),
(9, 'Alexander', 'Ruf', 'RUF', 'Molten Tyre', ''),
(5, 'Florian', 'Schellnast', 'SCH', 'SpeedBros', ''),
(8, 'Lukas', 'Staindl', 'STA', 'Molten Tyre', ''),
(6, 'Paul', 'Zellhofer', 'ZEL', 'Ultimatives Noobteam', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `galerie`
--

CREATE TABLE IF NOT EXISTS `galerie` (
`id` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `file_type` enum('Image','Video') COLLATE latin1_german1_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `alternative_text` varchar(1024) COLLATE latin1_german1_ci NOT NULL,
  `href` varchar(767) COLLATE latin1_german1_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`alternative_text`, `href`) VALUES
('', 'images/map_kottingbrunn.jpg'),
('', 'images/map_langenzersdorf.jpg'),
('', 'images/map_wien.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `author` char(3) COLLATE latin1_german1_ci NOT NULL,
  `title` varchar(256) COLLATE latin1_german1_ci NOT NULL,
  `href` varchar(1024) COLLATE latin1_german1_ci NOT NULL,
  `preview_href` varchar(1024) COLLATE latin1_german1_ci NOT NULL,
  `preview_img_href` varchar(767) COLLATE latin1_german1_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`id`, `author`, `title`, `href`, `preview_href`, `preview_img_href`, `date`) VALUES
(1, 'PER', 'Neue Seite, neues Glück (July-Release)', 'news/Artikel/temp.html', 'news/Previews/temp.html', 'images/map_kottingbrunn.jpg', '2015-04-08'),
(2, 'ASC', 'Dezimiertes Fahrerfeld im zweiten Rennen', 'news/Artikel/dz.html', 'news/Previews/dz.html', 'images/map_wien.jpg', '2014-12-16'),
(3, 'ASC', 'Dezimiertes Fahrerfeld im zweiten Rennen', 'news/Artikel/dz.html', 'news/Previews/dz.html', 'images/map_wien.jpg', '2014-12-16'),
(4, 'ASC', 'Dezimiertes Fahrerfeld im zweiten Rennen', 'news/Artikel/dz.html', 'news/Previews/dz.html', 'images/map_wien.jpg', '2014-12-16'),
(5, 'ASC', 'Dezimiertes Fahrerfeld im zweiten Rennen', 'news/Artikel/dz.html', 'news/Previews/dz.html', 'images/map_wien.jpg', '2014-12-16');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `race`
--

CREATE TABLE IF NOT EXISTS `race` (
`id` int(11) NOT NULL,
  `saison` year(4) NOT NULL,
  `race_date` date NOT NULL,
  `img_href` varchar(767) COLLATE latin1_german1_ci NOT NULL,
  `track_infos` varchar(128) COLLATE latin1_german1_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `race`
--

INSERT INTO `race` (`id`, `saison`, `race_date`, `img_href`, `track_infos`) VALUES
(2, 2014, '2014-12-02', 'images/map_kottingbrunn.jpg', 'Kartcenter Kottingbrunn'),
(3, 2014, '2016-02-24', 'images/map_wien.jpg', 'Monza-Kartbahn Wien'),
(4, 2014, '2017-05-25', 'images/map_langenzersdorf.jpg', 'Daytona Raceways'),
(5, 2013, '2014-12-01', 'images/map_kottingbrunn.jpg', 'Daytona Raceways');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `results`
--

CREATE TABLE IF NOT EXISTS `results` (
`id` int(11) NOT NULL,
  `race` int(11) NOT NULL,
  `ranking` int(10) unsigned NOT NULL,
  `tag` char(3) COLLATE latin1_german1_ci NOT NULL,
  `team` varchar(32) COLLATE latin1_german1_ci NOT NULL,
  `laps` int(11) NOT NULL,
  `diff` varchar(64) COLLATE latin1_german1_ci NOT NULL,
  `best_lap` decimal(10,3) unsigned NOT NULL,
  `score` smallint(5) unsigned NOT NULL,
  `type` enum('race','qualifying') COLLATE latin1_german1_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `results`
--

INSERT INTO `results` (`id`, `race`, `ranking`, `tag`, `team`, `laps`, `diff`, `best_lap`, `score`, `type`) VALUES
(1, 4, 1, 'ASC', 'Black Arrow Racing', 14, '/', '55.300', 21, 'race'),
(2, 4, 1, 'ASC', 'Black Arrow Racing', 8, '/', '55.456', 3, 'qualifying'),
(3, 4, 2, 'SCH', 'SpeedBros', 14, 'k.A', '55.318', 16, 'race'),
(4, 4, 2, 'FEY', 'SpeedBros', 9, '+1.255', '56.711', 2, 'qualifying'),
(5, 4, 3, 'FEY', 'SpeedBros', 14, 'k.A', '55.325', 12, 'race'),
(6, 4, 3, 'SCH', 'SpeedBros', 8, '+2.346', '56.802', 1, 'qualifying');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
`id` int(11) NOT NULL,
  `text` varchar(64) COLLATE latin1_german1_ci NOT NULL,
  `url` varchar(1024) COLLATE latin1_german1_ci NOT NULL,
  `title` varchar(64) COLLATE latin1_german1_ci NOT NULL,
  `isHidden` tinyint(1) NOT NULL DEFAULT '0',
  `fullpage` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `sites`
--

INSERT INTO `sites` (`id`, `text`, `url`, `title`, `isHidden`, `fullpage`) VALUES
(1, 'About', 'about.html', 'About', 0, 0),
(2, 'Ergebnisse', 'ergebnisse.html', 'Ergebnisse', 0, 0),
(3, 'Ergebnisse1', 'ergebnisse1.html', 'Ergebnisse1', 0, 0),
(4, 'Ergebnisse2', 'ergebnisse2.html', 'Ergebnisse2', 0, 0),
(5, 'Fahrerfeld', 'fahrerfeld.php', 'Fahrerfeld', 0, 1),
(6, 'Galerie', 'galerie.html', 'Galerie', 0, 0),
(7, 'Impressum', 'impressum.html', 'Impressum', 0, 0),
(8, 'Startseite', 'index.php', 'Startseite', 0, 0),
(9, 'Kontakt', 'kontakt.html', 'Kontakt', 0, 0),
(10, 'News', 'news.php', 'News', 0, 0),
(11, 'Reglement', 'reglement.html', 'Reglement', 0, 0),
(12, 'Rennen', 'rennen.html', 'Rennen', 0, 0),
(13, 'Sitemap', 'sitemap.html', 'Sitemap', 0, 0),
(14, 'race_view', 'php/race_view.php', 'Rennüberblick', 0, 0),
(15, 'Einzelwertung', 'php/score_table_fahrer.php', 'Einzelwertung', 0, 0),
(16, 'Teamwertung', 'php/score_table_teams.php', 'Teamwertung', 0, 0),
(17, 'Artikel', 'php/artikel.php', 'Artikel: ', 0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `name` varchar(32) COLLATE latin1_german1_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `team`
--

INSERT INTO `team` (`name`) VALUES
('Black Arrow Racing'),
('Mirage Team'),
('Molten Tyre'),
('SpeedBros'),
('Ultimatives Noobteam');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `track_infos`
--

CREATE TABLE IF NOT EXISTS `track_infos` (
  `name` varchar(128) COLLATE latin1_german1_ci NOT NULL,
  `location` varchar(48) COLLATE latin1_german1_ci NOT NULL,
  `curves` int(10) unsigned NOT NULL,
  `length` mediumint(8) unsigned NOT NULL,
  `karts` varchar(16) COLLATE latin1_german1_ci NOT NULL,
  `record_holder` char(3) COLLATE latin1_german1_ci NOT NULL,
  `record_time` varchar(16) COLLATE latin1_german1_ci NOT NULL,
  `website` varchar(128) COLLATE latin1_german1_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `track_infos`
--

INSERT INTO `track_infos` (`name`, `location`, `curves`, `length`, `karts`, `record_holder`, `record_time`, `website`) VALUES
('Daytona Raceways', 'Langenzersdorf', 16, 700, '270ccm/9PS', 'ASC', '55.300', 'www.daytona.at'),
('Kartcenter Kottingbrunn', 'Kottingbrunn', 24, 456, '200ccm/8PS', 'SCH', '44.776', 'www.kartcenter.at'),
('Monza-Kartbahn Wien', 'Wien', 13, 500, '200ccm/9PS', 'ASC', '36.972', 'www.monza-kart.com');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `credentials`
--
ALTER TABLE `credentials`
 ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`), ADD KEY `username_2` (`username`);

--
-- Indizes für die Tabelle `data`
--
ALTER TABLE `data`
 ADD PRIMARY KEY (`tag`), ADD KEY `id` (`id`), ADD KEY `team` (`team`), ADD KEY `team_2` (`team`), ADD KEY `team_3` (`team`);

--
-- Indizes für die Tabelle `galerie`
--
ALTER TABLE `galerie`
 ADD PRIMARY KEY (`id`), ADD KEY `group` (`group`), ADD KEY `group_2` (`group`);

--
-- Indizes für die Tabelle `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`href`);

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD KEY `preview_img_href` (`preview_img_href`), ADD KEY `author` (`author`), ADD KEY `preview_img_href_2` (`preview_img_href`);

--
-- Indizes für die Tabelle `race`
--
ALTER TABLE `race`
 ADD PRIMARY KEY (`id`), ADD KEY `track_infos` (`track_infos`), ADD KEY `track_infos_2` (`track_infos`), ADD KEY `img_href` (`img_href`);

--
-- Indizes für die Tabelle `results`
--
ALTER TABLE `results`
 ADD PRIMARY KEY (`id`), ADD KEY `driver` (`tag`), ADD KEY `team` (`team`), ADD KEY `race` (`race`);

--
-- Indizes für die Tabelle `sites`
--
ALTER TABLE `sites`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`name`);

--
-- Indizes für die Tabelle `track_infos`
--
ALTER TABLE `track_infos`
 ADD PRIMARY KEY (`name`), ADD KEY `record_holder` (`record_holder`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `credentials`
--
ALTER TABLE `credentials`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT für Tabelle `data`
--
ALTER TABLE `data`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT für Tabelle `galerie`
--
ALTER TABLE `galerie`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `race`
--
ALTER TABLE `race`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `results`
--
ALTER TABLE `results`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `sites`
--
ALTER TABLE `sites`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `data`
--
ALTER TABLE `data`
ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`id`) REFERENCES `credentials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `data_ibfk_2` FOREIGN KEY (`team`) REFERENCES `team` (`name`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `galerie`
--
ALTER TABLE `galerie`
ADD CONSTRAINT `galerie_ibfk_1` FOREIGN KEY (`group`) REFERENCES `race` (`id`);

--
-- Constraints der Tabelle `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`preview_img_href`) REFERENCES `images` (`href`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `race`
--
ALTER TABLE `race`
ADD CONSTRAINT `race_ibfk_2` FOREIGN KEY (`img_href`) REFERENCES `images` (`href`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `race_ibfk_3` FOREIGN KEY (`track_infos`) REFERENCES `track_infos` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `results`
--
ALTER TABLE `results`
ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`race`) REFERENCES `race` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `results_ibfk_4` FOREIGN KEY (`tag`) REFERENCES `data` (`tag`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `results_ibfk_5` FOREIGN KEY (`team`) REFERENCES `team` (`name`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `track_infos`
--
ALTER TABLE `track_infos`
ADD CONSTRAINT `track_infos_ibfk_1` FOREIGN KEY (`record_holder`) REFERENCES `data` (`tag`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
