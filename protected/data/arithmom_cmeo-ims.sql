-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2013 at 11:17 PM
-- Editted by Gary: 2013-08-16
-- Server version: 5.5.33
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arithmom_cmeo-ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `ageGroup`
--

DROP TABLE IF EXISTS `ageGroup`;
CREATE TABLE IF NOT EXISTS `ageGroup` (
  `idAgeGroup` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `fromAge` int(11) NOT NULL,
  `toAge` int(11) NOT NULL,
  PRIMARY KEY (`idAgeGroup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

DROP TABLE IF EXISTS `donation`;
CREATE TABLE IF NOT EXISTS `donation` (
  `idDonation` int(11) NOT NULL AUTO_INCREMENT,
  `entityId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (entityId) REFERENCES entity(idEntity)',
  `donationDate` date NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `donationReasonId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (donationReasonId) REFERENCES donationReason(idDonationReason)',
  `isThanked` tinyint(1) DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`idDonation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donationReason`
--

DROP TABLE IF EXISTS `donationReason`;
CREATE TABLE IF NOT EXISTS `donationReason` (
  `idDonationReason` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`idDonationReason`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

DROP TABLE IF EXISTS `entity`;
CREATE TABLE IF NOT EXISTS `entity` (
  `idEntity` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `entityTypeId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (entityTypeId) REFERENCES entityType(idEntityType)',
  `address1` varchar(80) DEFAULT NULL,
  `address2` varchar(80) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `phone` varchar(17) DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`idEntity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`idEntity`, `name`, `entityTypeId`, `address1`, `address2`, `city`, `state`, `zip`, `phone`, `comments`) VALUES
(2, 'Parker_G', 1, '411 NW 4th St', '', 'Pendleton', 'OR', '97801', '(541) 278-9295', NULL),
(3, 'Pendleton Yoga and Dance', 2, '33 SW Court St', NULL, 'Pendleton', 'OR', '97801', '(541) 215-2950', NULL),
(4, 'Hillenbrand_F', 1, '47955 St Andrews Rd', '', 'Pendleton', 'OR', '97801', '541-566-0130', '');

-- --------------------------------------------------------

--
-- Table structure for table `entityPerson`
--

DROP TABLE IF EXISTS `entityPerson`;
CREATE TABLE IF NOT EXISTS `entityPerson` (
  `entityId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (entityId) REFERENCES entity(idEntity)',
  `personId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (personId) REFERENCES person(idPerson)',
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`entityID`,`personID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entityPerson`
--

INSERT INTO `entityPerson` (`entityId`, `personId`, `startDate`, `endDate`) VALUES
(2, 1, '2003-06-23', NULL),
(2, 2, '2003-06-23', NULL),
(3, 1, '2011-09-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entityType`
--

DROP TABLE IF EXISTS `entityType`;
CREATE TABLE IF NOT EXISTS `entityType` (
  `idEntityType` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`idEntityType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `entityType`
--

INSERT INTO `entityType` (`idEntityType`, `name`) VALUES
(1, 'Family'),
(2, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `idEvent` int(11) NOT NULL AUTO_INCREMENT,
  `eventDate` date DEFAULT NULL,
  `classLimit` int(11) DEFAULT NULL,
  `description` text,
  `ageGroupId` int(11) DEFAULT NULL COMMENT 'CONSTRAINT FOREIGN KEY (ageGroupId) REFERENCES ageGroup(idAgeGroup)',
  `eventTypeId` int(11) DEFAULT NULL COMMENT 'CONSTRAINT FOREIGN KEY (eventTypeId) REFERENCES eventType(idEventType)',
  `notes` text,
  `sponsoringEntityId` int(11) DEFAULT NULL COMMENT 'CONSTRAINT FOREIGN KEY (sponsoringEntityId) REFERENCES entity(idEntity)',
  PRIMARY KEY (`idEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventType`
--

DROP TABLE IF EXISTS `eventType`;
CREATE TABLE IF NOT EXISTS `eventType` (
  `idEventType` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`idEventType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

DROP TABLE IF EXISTS `membership`;
CREATE TABLE IF NOT EXISTS `membership` (
  `idMembership` int(11) NOT NULL AUTO_INCREMENT,
  `entityId` int(11) DEFAULT NULL COMMENT 'CONSTRAINT FOREIGN KEY (entityId) REFERENCES entity(idEntity)',
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `typeId` int(11) DEFAULT NULL COMMENT 'CONSTRAINT FOREIGN KEY (typeId) REFERENCES membershipType(idMembershipType)',
  `amountPaid` decimal(10,0) DEFAULT NULL,
  `enteredBy` varchar(45) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`idMembership`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `membershipType`
--

DROP TABLE IF EXISTS `membershipType`;
CREATE TABLE IF NOT EXISTS `membershipType` (
  `idMembershipType` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `cost` int(11) NOT NULL,
  `description` text NOT NULL,
  `benefits` text NOT NULL,
  PRIMARY KEY (`idMembershipType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `MembershipType`
-- 

INSERT INTO `membershipType` (`idMembershipType`,`name`,`cost`,`description`,`benefits`) VALUES
 (1,'Seasonal',25,'Includes immediate family in one household - good for 3 months from date of purchase.',''),
 (2, 'Family', 75, 'Includes immediate family in one household', ''),
 (3, 'Family Plus', 100, 'Includes immediate family in one household plus two additional people', ''),
 (4, 'Grandparents', 65, 'Includes two grandparents and all grandchildren', ''),
 (5, 'Foster Parent', 65, 'Active Military ID documentation required at time of purchase', ''),
 (6, 'Childcare Provider 6', 150, 'Documentation required at time of purchase', ''),
 (7, 'Childcare Provider 18', 384, 'Documentation required at time of purchase', '');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `idPerson` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `personTypeId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (personTypeId) REFERENCES personType(idPersonType)',
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(17) DEFAULT NULL,
  `comments` text,
  `doNotContact` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idPerson`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`idPerson`, `firstName`, `lastName`, `birthDate`, `personTypeId`, `email`, `phone`, `comments`, `doNotContact`) VALUES
(1, 'Gary', 'Parker', '1969-10-28', 1, 'gary.parker@gmail.com', '(541) 215-2980', 'CMEO Board Member 2011-2013', NULL),
(2, 'Ruby', 'Miller', '2001-06-23', 2, 'ruby.lupine@gmail.com', '(541) 215-0737', 'daughter of Gary Parker and Michelle Miller', NULL),
(3, 'Julia', 'Miller', '2006-04-16', 2, 'julia.wren@mereshadow.org', '5412789295', 'Gary Parker''s daughter', NULL),
(4, 'Michelle', 'Miller', '1968-12-10', 1, 'michelle.noel.miller@gmail.com', '5412152950', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personType`
--

DROP TABLE IF EXISTS `personType`;
CREATE TABLE IF NOT EXISTS `personType` (
  `idPersonType` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPersonType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `personType`
--

INSERT INTO `personType` (`idpersonType`, `Name`) VALUES
(1, 'Adult'),
(2, 'Child');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

DROP TABLE IF EXISTS `visit`;
CREATE TABLE IF NOT EXISTS `visit` (
  `idVisit` int(11) NOT NULL AUTO_INCREMENT,
  `visitDateTime` datetime NOT NULL,
  `entityId` int(11) DEFAULT NULL COMMENT 'CONSTRAINT FOREIGN KEY (entityId) REFERENCES entity(idEntity)',
  `numberOfMembers` int(11) DEFAULT NULL,
  `numberOfGuests` int(11) DEFAULT NULL,
  `amountPaid` decimal(10,0) DEFAULT NULL,
  `destinationEventId` int(11) NOT NULL  COMMENT 'CONSTRAINT FOREIGN KEY (destinationEventId) REFERENCES event(idEvent)',
  PRIMARY KEY (`idVisit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


/*  Holding back on adding constraints since I had trouble with yii recording 
-- many-to-many updates
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donationEntityId` FOREIGN KEY (`entityId`) REFERENCES `entity` (`idEntity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `donationReasonId` FOREIGN KEY (`donationReasonId`) REFERENCES `donationReason` (`idDonationReason`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `entity`
--
ALTER TABLE `entity`
  ADD CONSTRAINT `entityTypeId` FOREIGN KEY (`entityTypeId`) REFERENCES `entityType` (`idEntityType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `entityPerson`
--
ALTER TABLE `entityPerson`
  ADD CONSTRAINT `entityId` FOREIGN KEY (`entityId`) REFERENCES `entity` (`idEntity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `personId` FOREIGN KEY (`personId`) REFERENCES `person` (`idPerson`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `ageGroupId` FOREIGN KEY (`ageGroupId`) REFERENCES `ageGroup` (`idAgeGroup`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `eventTypeId` FOREIGN KEY (`eventTypeId`) REFERENCES `eventType` (`idEventType`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sponsoringEntityId` FOREIGN KEY (`sponsoringEntityId`) REFERENCES `entity` (`idEntity`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membershipEntityId` FOREIGN KEY (`entityId`) REFERENCES `entity` (`idEntity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `typeId` FOREIGN KEY (`typeId`) REFERENCES `membershipType` (`idMembershipType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `personTypeId` FOREIGN KEY (`personTypeId`) REFERENCES `personType` (`idPersonType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `destinationEventId` FOREIGN KEY (`destinationEventId`) REFERENCES `event` (`idEvent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `visitEntityId` FOREIGN KEY (`entityId`) REFERENCES `entity` (`idEntity`) ON DELETE NO ACTION ON UPDATE NO ACTION;

*/

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

