-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 26, 2023 alle 12:58
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opere`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `museo`
--

CREATE TABLE `museo` (
  `CodM` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Citta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `museo`
--

INSERT INTO `museo` (`CodM`, `Nome`, `Citta`) VALUES
(1, 'Louvre', 'Parigi'),
(2, 'Musei Vaticani', 'Città del Vaticano'),
(3, 'British Museum', 'Londra');

-- --------------------------------------------------------

--
-- Struttura della tabella `opera`
--

CREATE TABLE `opera` (
  `CodO` int(11) NOT NULL,
  `Titolo` varchar(50) NOT NULL,
  `DataCreazione` date NOT NULL,
  `CodM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `opera`
--

INSERT INTO `opera` (`CodO`, `Titolo`, `DataCreazione`, `CodM`) VALUES
(1, 'Monnalisa', '1506-03-21', 1),
(2, 'La primavera', '1600-04-22', 2),
(3, 'Bacco', '1650-05-22', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `Username` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `Cognome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`Username`, `Password`, `Nome`, `Cognome`) VALUES
('admin', 'admin', 'Amministratore', 'Bravissimo');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `museo`
--
ALTER TABLE `museo`
  ADD PRIMARY KEY (`CodM`);

--
-- Indici per le tabelle `opera`
--
ALTER TABLE `opera`
  ADD PRIMARY KEY (`CodO`),
  ADD KEY `CodM` (`CodM`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `museo`
--
ALTER TABLE `museo`
  MODIFY `CodM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `opera`
--
ALTER TABLE `opera`
  MODIFY `CodO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `opera`
--
ALTER TABLE `opera`
  ADD CONSTRAINT `opera_ibfk_1` FOREIGN KEY (`CodM`) REFERENCES `museo` (`CodM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
