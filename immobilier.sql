-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 22, 2019 at 03:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `immobilier`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonces`
--

CREATE TABLE `annonces` (
  `id_annonce` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `titre` text NOT NULL,
  `discription` text NOT NULL,
  `type_bien` set('appartement','villa','commercial','garage') NOT NULL,
  `type_offre` set('Vente','Location') NOT NULL,
  `adresse` text NOT NULL,
  `quartier` text NOT NULL,
  `ville` text NOT NULL,
  `surface` double NOT NULL,
  `nbr_chambre` varchar(30) NOT NULL,
  `prix` double NOT NULL,
  `date_annonce` datetime NOT NULL DEFAULT current_timestamp(),
  `valider` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annonces`
--

INSERT INTO `annonces` (`id_annonce`, `id_user`, `titre`, `discription`, `type_bien`, `type_offre`, `adresse`, `quartier`, `ville`, `surface`, `nbr_chambre`, `prix`, `date_annonce`, `valider`) VALUES
(10, 1, 'annonce 01', 'Residence LOUALOUAT MARJANE  est un complexe rÃ©sidentiel MOYEN STANDING situÃ© en plein coeur du quartier Nahda proche de toutes les comoditÃ©s de la vie quotidienne , dotÃ©e de parking sous-sol et ascenceurs.', 'villa', 'Vente', 'NÂ° 25 Hay Nahda', 'Nahda', 'Casablanca', 350, '5', 500000, '2019-12-22 14:24:16', 1),
(11, 1, 'annonce 002', 'Residence Marjane est un complexe rÃ©sidentiel MOYEN STANDING situÃ© en plein coeur du quartier Nakhil proche de toutes les comoditÃ©s de la vie quotidienne , dotÃ©e de parking sous-sol et ascenceurs.', 'appartement', 'Vente', 'NÂ° 1 Hay Nakhil', 'Nakhil', 'Tiznit', 93, '3', 10000, '2019-12-22 14:31:27', 1),
(12, 10, 'annonce 003', 'Residence Marwa est un complexe rÃ©sidentiel MOYEN STANDING situÃ© en plein coeur du quartier Al Massira proche de toutes les comoditÃ©s de la vie quotidienne , dotÃ©e de parking sous-sol et ascenceurs.', 'commercial', 'Location', 'NÂ° 14 Hay Al Massira', 'Al Massira', 'Agadir', 150, '1', 12000, '2019-12-22 14:35:43', 0),
(13, 10, 'annonce 04', 'Residence Ain Sous est un complexe rÃ©sidentiel MOYEN STANDING situÃ© en plein coeur du quartier Mellah proche de toutes les comoditÃ©s de la vie quotidienne , dotÃ©e de parking sous-sol et ascenceurs.', 'garage', 'Location', 'NÂ° 55 Hay Mellah', 'Mellah', 'Rabat', 80, '2', 4000, '2019-12-22 14:39:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_distinateur` int(11) DEFAULT NULL,
  `sujet` text NOT NULL,
  `message` text NOT NULL,
  `date_msg` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id_photo`, `id_annonce`, `photo`) VALUES
(68, 10, '2.png'),
(69, 10, '3.jpg'),
(70, 11, '1.jpeg'),
(71, 11, '4.jpg'),
(72, 12, '5.jpg'),
(73, 13, '6.jpg'),
(74, 13, '7.jpg'),
(75, 13, '9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_reservation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `id_annonce`, `id_utilisateur`, `date_reservation`) VALUES
(1, 10, 10, '2019-12-22 14:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `type_user` set('Admin','Simple') NOT NULL DEFAULT 'Simple',
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `tel` varchar(60) NOT NULL,
  `email` varchar(70) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `passe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `type_user`, `nom`, `prenom`, `tel`, `email`, `ville`, `passe`) VALUES
(1, 'Admin', 'Ait Fakir', 'El Mehdi', '06 75 34 85 03', 'elmehdiaitfakir@gmail.com', 'Tiznit', 'admin'),
(9, 'Admin', 'Mimoune', 'Marouane', '0610101010', 'merro@gmail.com', 'Ouarzazate', 'MERRO000'),
(10, 'Simple', 'el mehdi', 'alaoui', '0612345687', 'alaoui@gmail.com', 'Agadir', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_distinateur` (`id_distinateur`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `id_annonce` (`id_annonce`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_annonce` (`id_annonce`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_3` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_ibfk_4` FOREIGN KEY (`id_distinateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`id_annonce`) REFERENCES `annonces` (`id_annonce`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`id_annonce`) REFERENCES `annonces` (`id_annonce`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
