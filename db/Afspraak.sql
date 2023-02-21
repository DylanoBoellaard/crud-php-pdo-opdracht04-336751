-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 21 feb 2023 om 15:29
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Nailstudio`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Afspraak`
--

DROP TABLE IF EXISTS `Afspraak`;
CREATE TABLE IF NOT EXISTS `Afspraak` (
  `afspraakID` int(11) NOT NULL AUTO_INCREMENT,
  `kleur1` varchar(10) NOT NULL,
  `kleur2` varchar(10) NOT NULL,
  `kleur3` varchar(10) NOT NULL,
  `kleur4` varchar(10) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `datumTijd` datetime NOT NULL,
  `nagelbijt` varchar(15) NOT NULL,
  `manicure` varchar(15) NOT NULL,
  `nagelreparatie` varchar(15) NOT NULL,
  PRIMARY KEY (`afspraakID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Afspraak`
--

INSERT INTO `Afspraak` (`afspraakID`, `kleur1`, `kleur2`, `kleur3`, `kleur4`, `tel`, `email`, `datumTijd`, `nagelbijt`, `manicure`, `nagelreparatie`) VALUES
(1, '', '', '', 'nee', '+31 6 1234 56 78', 'email@gmail.com', '2023-01-31 16:52:00', 'ja', 'ja', 'ja'),
(2, '', '', '', 'nee', '+31 6 1234 56 78', 'email@gmail.com', '2023-01-31 15:52:00', 'ja', 'ja', 'ja'),
(3, '', '', '', 'nee', '+31 6 1234 56 78', 'email@gmail.com', '2023-01-31 15:52:00', 'ja', 'ja', 'ja'),
(4, '#f28f93', '#1e34e2', '#7e0cd6', '#ff00a1', '+31 6 1234 56 78', 'email@gmail.com', '2023-01-30 16:53:00', 'ja', 'ja', 'ja'),
(5, '#f28f93', '#1e34e2', '#7e0cd6', '#ff00a1', '+31 6 1234 56 78', 'email@gmail.com', '2023-02-01 16:57:00', 'ja', 'ja', 'ja'),
(6, '#6d3133', '#001eff', '#1c1a1f', '#00ff9d', '+31 6 9876 54 32', 'test@hotmail.com', '2015-01-09 07:07:00', 'ja', 'nee', 'nee');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
