-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Úte 28. kvě 2024, 15:50
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `FakultaDB`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `Fakulta`
--

CREATE TABLE `Fakulta` (
  `dekan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vypisuji data pro tabulku `Fakulta`
--

INSERT INTO `Fakulta` (`dekan`) VALUES
('Prof. RNDr. Jan Novák, CSc.');

-- --------------------------------------------------------

--
-- Struktura tabulky `Katedra`
--

CREATE TABLE `Katedra` (
  `zkratka_katedry` varchar(10) NOT NULL,
  `dekan` varchar(100) DEFAULT NULL,
  `webove_stranky` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vypisuji data pro tabulku `Katedra`
--

INSERT INTO `Katedra` (`zkratka_katedry`, `dekan`, `webove_stranky`) VALUES
('KBI', 'Prof. RNDr. Jan Novák, CSc.', 'https://www.ujep.cz/cs/kbi');

-- --------------------------------------------------------

--
-- Struktura tabulky `Predmety`
--

CREATE TABLE `Predmety` (
  `zkratka_katedry` varchar(10) NOT NULL,
  `zkratka` varchar(10) NOT NULL,
  `typ` varchar(20) DEFAULT NULL,
  `nazev` varchar(100) DEFAULT NULL,
  `popis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `Vedouci`
--

CREATE TABLE `Vedouci` (
  `zkratka_katedry` varchar(10) NOT NULL,
  `jmeno` varchar(100) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vypisuji data pro tabulku `Vedouci`
--

INSERT INTO `Vedouci` (`zkratka_katedry`, `jmeno`, `telefon`, `email`) VALUES
('KBI', 'Doc. RNDr. Petr Svoboda, Ph.D.', '+420 123 456 789', 'petr.svoboda@ujep.cz');

-- --------------------------------------------------------

--
-- Struktura tabulky `Zamestnanci`
--

CREATE TABLE `Zamestnanci` (
  `zkratka_katedry` varchar(10) DEFAULT NULL,
  `jmeno` varchar(100) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pozice` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vypisuji data pro tabulku `Zamestnanci`
--

INSERT INTO `Zamestnanci` (`zkratka_katedry`, `jmeno`, `telefon`, `email`, `pozice`) VALUES
('KBI', 'Mgr. Jana Novotná', '+420 987 654 321', 'jana.novotna@ujep.cz', 'lektor');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `Fakulta`
--
ALTER TABLE `Fakulta`
  ADD PRIMARY KEY (`dekan`);

--
-- Indexy pro tabulku `Katedra`
--
ALTER TABLE `Katedra`
  ADD PRIMARY KEY (`zkratka_katedry`),
  ADD KEY `dekan` (`dekan`);

--
-- Indexy pro tabulku `Predmety`
--
ALTER TABLE `Predmety`
  ADD PRIMARY KEY (`zkratka_katedry`,`zkratka`);

--
-- Indexy pro tabulku `Vedouci`
--
ALTER TABLE `Vedouci`
  ADD PRIMARY KEY (`zkratka_katedry`);

--
-- Indexy pro tabulku `Zamestnanci`
--
ALTER TABLE `Zamestnanci`
  ADD KEY `zkratka_katedry` (`zkratka_katedry`);

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `Katedra`
--
ALTER TABLE `Katedra`
  ADD CONSTRAINT `Katedra_ibfk_1` FOREIGN KEY (`dekan`) REFERENCES `Fakulta` (`dekan`);

--
-- Omezení pro tabulku `Predmety`
--
ALTER TABLE `Predmety`
  ADD CONSTRAINT `Predmety_ibfk_1` FOREIGN KEY (`zkratka_katedry`) REFERENCES `Katedra` (`zkratka_katedry`);

--
-- Omezení pro tabulku `Vedouci`
--
ALTER TABLE `Vedouci`
  ADD CONSTRAINT `Vedouci_ibfk_1` FOREIGN KEY (`zkratka_katedry`) REFERENCES `Katedra` (`zkratka_katedry`);

--
-- Omezení pro tabulku `Zamestnanci`
--
ALTER TABLE `Zamestnanci`
  ADD CONSTRAINT `Zamestnanci_ibfk_1` FOREIGN KEY (`zkratka_katedry`) REFERENCES `Katedra` (`zkratka_katedry`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
