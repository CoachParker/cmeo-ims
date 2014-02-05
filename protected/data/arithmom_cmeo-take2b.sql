-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsqlmoo02
-- Generation Time: Mar 06, 2013 at 12:22 AM
-- Revision Time: 2013 Mar 06 1150
-- Server version: 5.1.56
-- PHP Version: 4.4.9
-- 
-- Database: `cmeo_db`
-- 
CREATE DATABASE `cmeo_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cmeo_db`;

-- --------------------------------------------------------

--
-- Table structure for table `ageGroup`
--

DROP TABLE IF EXISTS `ageGroup`;
CREATE TABLE IF NOT EXISTS `ageGroup` (
  `idageGroup` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `fromAge` int(11) NOT NULL,
  `toAge` int(11) NOT NULL,
  PRIMARY KEY (`idageGroup`),
  UNIQUE KEY `idageGroup_UNIQUE` (`idageGroup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `Donation`
-- 

CREATE TABLE `Donation` (
  `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `EntityID` mediumint(8) unsigned NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (EntityID) REFERENCES Entity(ID)',
  `PersonID` mediumint(8) unsigned DEFAULT NULL COMMENT 'CONSTRAINT FOREIGN KEY (PersonID) REFERENCES Person(ID)',
  `DonationDate` date NOT NULL,
  `Amount` float unsigned NOT NULL,
  `ReasonID` smallint(5) unsigned NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (ReasonID) REFERENCES DonationReason(ID)',
  `IsThanked` varchar(32) DEFAULT NULL,
  `Comments` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `Donation`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `DonationReason`
-- 

CREATE TABLE `DonationReason` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;

-- 
-- Dumping data for table `DonationReason`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `Entity`
-- 

CREATE TABLE `Entity` (
  `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `TypeID` tinyint(3) unsigned NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (TypeID) REFERENCES EntityType(ID)',
  `Name` char(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `Entity`
-- 

INSERT INTO `Entity` VALUES (1, 1, 'Parker_G');

-- --------------------------------------------------------

-- 
-- Table structure for table `EntityPerson`
-- 

CREATE TABLE `EntityPerson` (
  `EntityID` mediumint(8) unsigned NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (EntityID) REFERENCES Entity(ID)',
  `PersonID` mediumint(8) unsigned NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (PersonID) REFERENCES Person(ID)',
  `StartDate` date NOT NULL,
  `EndDate` datetime NOT NULL,
  PRIMARY KEY (`EntityID`,`PersonID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `EntityPerson`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `EntityType`
-- 

CREATE TABLE `EntityType` (
  `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `Name` char(10) NOT NULL COMMENT 'Family,Company',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `EntityType`
-- 

INSERT INTO `EntityType` VALUES (1, 'Family');
INSERT INTO `EntityType` VALUES (2, 'Company');

-- --------------------------------------------------------

-- 
-- Table structure for table `Membership`
-- 

CREATE TABLE `Membership` (
  `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `EntityID` mediumint(8) unsigned NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (EntityID) REFERENCES Entity(ID)',
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `TypeID` tinyint(3) unsigned NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (TypeID) REFERENCES Membership(ID)',
  `AmountPaid` float unsigned NOT NULL,
  `EnteredBy` varchar(50) NOT NULL,
  `CreateDate` date NOT NULL,
  `Comments` text,
  `Other` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

-- 
-- Dumping data for table `Membership`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `MembershipType`
-- 

CREATE TABLE `MembershipType` (
  `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Cost` float unsigned NOT NULL,
  `Description` text NOT NULL,
  `Benefits` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6;

-- 
-- Dumping data for table `MembershipType`
-- 

INSERT INTO `MembershipType` VALUES (1,'Seasonal',25,'Includes immediate family in one household - good for 3 months from date of purchase.','');
INSERT INTO `MembershipType` VALUES (2, 'Family', 75, 'Includes immediate family in one household', '');
INSERT INTO `MembershipType` VALUES (3, 'Family Plus', 100, 'Includes immediate family in one household plus two additional people', '');
INSERT INTO `MembershipType` VALUES (4, 'Grandparents', 65, 'Includes two grandparents and all grandchildren', '');
INSERT INTO `MembershipType` VALUES (5, 'Foster Parent', 65, 'Active Military ID documentation required at time of purchase', '');
INSERT INTO `MembershipType` VALUES (6, 'Childcare Provider 6', 150, 'Documentation required at time of purchase', '');
INSERT INTO `MembershipType` VALUES (7, 'Childcare Provider 18', 384, 'Documentation required at time of purchase', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `Person`
-- 

CREATE TABLE `Person` (
  `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `BirthDate` date DEFAULT NULL,
  `TypeID` tinyint(4) unsigned NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (TypeID) REFERENCES PersonType(ID)',
  `Address1` varchar(80) DEFAULT NULL,
  `Address2` varchar(80) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(2) DEFAULT NULL,
  `Zip` varchar(10) DEFAULT NULL,
  `Email` varchar(80) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  `Comments` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `Person`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `PersonType`
-- 

CREATE TABLE `PersonType` (
  `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(10) NOT NULL COMMENT 'Adult,Child',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8;

-- 
-- Dumping data for table `PersonType`
-- 

INSERT INTO `PersonType` VALUES (1, 'Adult');
INSERT INTO `PersonType` VALUES (2, 'Child');
