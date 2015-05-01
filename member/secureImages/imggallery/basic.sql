-- phpMyAdmin SQL Dump
-- version 2.7.0-pl2
-- http://www.phpmyadmin.net
-- 
-- Host: mysql
-- Erstellungszeit: 04. Oktober 2006 um 15:58
-- Server Version: 4.0.21
-- PHP-Version: 4.3.2
-- 
-- Datenbank: `db0_1763_1767`
-- 

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `imgal2_comments`
-- 

CREATE TABLE `imgal2_comments` (
  `id` mediumint(9) NOT NULL auto_increment,
  `image` mediumint(9) NOT NULL default '0',
  `time` datetime NOT NULL default '2006-01-01 12:00:00',
  `user` smallint(6) NOT NULL default '1',
  `ip` varchar(15) NOT NULL default '127.0.0.1',
  `text` text NOT NULL,
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `text` (`text`)
) TYPE=MyISAM AUTO_INCREMENT=23 ;

-- 
-- Daten für Tabelle `imgal2_comments`
-- 


-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `imgal2_galleries`
-- 

CREATE TABLE `imgal2_galleries` (
  `id` smallint(11) NOT NULL auto_increment,
  `name` varchar(127) NOT NULL default '',
  `date` date NOT NULL default '2006-01-01',
  `first` mediumint(9) NOT NULL default '0',
  `folder` varchar(127) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Daten für Tabelle `imgal2_galleries`
-- 

INSERT INTO `imgal2_galleries` (`id`, `name`, `date`, `first`, `folder`) VALUES (1, 'Test', '2006-10-04', 1, 'test');

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `imgal2_pictures`
-- 

CREATE TABLE `imgal2_pictures` (
  `id` mediumint(9) NOT NULL auto_increment,
  `gallery` smallint(6) NOT NULL default '0',
  `filename` varchar(127) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `next` mediumint(9) NOT NULL default '0',
  `photographer` varchar(127) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=4 ;

-- 
-- Daten für Tabelle `imgal2_pictures`
-- 

INSERT INTO `imgal2_pictures` (`id`, `gallery`, `filename`, `name`, `next`, `photographer`) VALUES (1, 1, 'test1.jpg', 'Zoe', 2, 'Michael Bode'),
(2, 1, 'test2.jpg', 'Eröffnung', 3, 'Mathias Kuchner'),
(3, 1, 'test3.jpg', 'Thomas', 0, 'Nico Wiedemann');

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `imgal2_users`
-- 

CREATE TABLE `imgal2_users` (
  `id` smallint(6) NOT NULL auto_increment,
  `name` varchar(127) NOT NULL default '',
  `email` varchar(127) default NULL,
  `homepage` varchar(127) default NULL,
  `place` varchar(127) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM PACK_KEYS=0 AUTO_INCREMENT=16 ;

-- 
-- Daten für Tabelle `imgal2_users`
-- 

INSERT INTO `imgal2_users` (`id`, `name`, `email`, `homepage`, `place`) VALUES (1, 'Anonymous', NULL, NULL, NULL);
