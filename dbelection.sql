-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2014 at 02:06 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbelection`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `AID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `UserName` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `Password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `SY` varchar(20) NOT NULL,
  `Status` int(10) NOT NULL,
  PRIMARY KEY (`AID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`AID`, `Name`, `UserName`, `Password`, `SY`, `Status`) VALUES
(6, 'Bryan Kier Aradanas', 'User123', 'b4af804009cb036a4ccdc33431ef9ac9', '2014-2015', 1),
(7, 'Admin Developer', 'Admin', '0195d901ae8d166fa7a46ef233965063', '0000-0000', 1),
(8, 'Robert Santiago', 'Robert', '684c851af59965b680086b7b4896ff98', '2013-2014', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcandidate`
--

CREATE TABLE IF NOT EXISTS `tblcandidate` (
  `CID` int(5) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) NOT NULL,
  `MidInitial` varchar(5) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `PositionID` int(5) NOT NULL,
  `PartyListID` int(5) NOT NULL,
  `Photo` blob NOT NULL,
  `SY` varchar(20) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tblcandidate`
--

INSERT INTO `tblcandidate` (`CID`, `FirstName`, `MidInitial`, `LastName`, `PositionID`, `PartyListID`, `Photo`, `SY`) VALUES
(7, 'Shastyn', 'D', 'Manuel', 0, 1, 0x2e2e2f70686f746f2f43616e646964617465732f30352d31302d323031342d313431323439303634342e6a7067, '2014-2015'),
(8, 'Kier', 'A', 'Aradanas', 1, 1, 0x2e2e2f70686f746f2f43616e646964617465732f32342d30382d323031342d313430383834383238362e6a7067, '2014-2015'),
(9, 'Rens', 'M', 'Ramos', 2, 1, 0x2e2e2f70686f746f2f43616e646964617465732f31382d30382d323031342d313430383338373131302e6a7067, '2014-2015'),
(10, 'Erwin', 'L', 'Valdez', 3, 1, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138333830352e6a7067, '2014-2015'),
(11, 'Jacky', 'L', 'Hermanos', 0, 2, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138333833352e6a7067, '2014-2015'),
(12, 'Christ', 'T', 'Vicente', 1, 2, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138333834392e6a7067, '2014-2015'),
(13, 'Charmaine', 'C', 'Quilana', 2, 2, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138333835382e6a7067, '2014-2015'),
(14, 'Hylarie', 'M', 'Natividad', 3, 2, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138333838382e6a7067, '2014-2015'),
(15, 'Rodrigos', 'J', 'San Juan', 0, 3, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138333930382e6a7067, '2014-2015'),
(16, 'Justine', 'M', 'Cruz', 1, 3, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138333931382e6a7067, '2014-2015'),
(17, 'Kathy', 'M', 'Cruz', 2, 3, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138333933332e6a7067, '2014-2015'),
(18, 'Ann', 'C', 'Jimenez', 3, 3, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138333934392e6a7067, '2014-2015'),
(19, 'Karen', 'F.', 'Balaria', 4, 1, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138333938302e6a7067, '2014-2015'),
(20, 'Araine', 'J', 'Pabulayan', 5, 1, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138333939362e6a7067, '2014-2015'),
(21, 'Nikk', 'E', 'Ronquillo', 6, 1, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138343034332e6a7067, '2014-2015'),
(23, 'Dan', 'R', 'Baluyot', 8, 1, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138343035382e6a7067, '2014-2015'),
(29, 'hkh', 'j', 'kjlkjl', 0, 0, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138343135312e6a7067, '2014-2015'),
(30, 'bj', 'cg', 'hvhjbk', 7, 1, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138343231332e6a7067, '2014-2015'),
(31, 'dgfd', 's', 'gdfg', 2, 0, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138343234302e6a7067, '2014-2015'),
(33, 'Alvin', 'L.', 'Pascual', 1, 0, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138343239362e6a7067, '2014-2015'),
(35, 'Kate', 'M.', 'Dare', 0, 0, 0x2e2e2f70686f746f2f43616e646964617465732f30312d31302d323031342d313431323138343237322e6a7067, '2014-2015'),
(38, 'janjan', 'j', 'jun', 7, 2, 0x2e2e2f70686f746f2f43616e646964617465732f30362d31302d323031342d313431323538363233332e6a7067, '2014-2015'),
(39, 'Abigael', 'C', 'Cruz', 9, 3, 0x2e2e2f70686f746f2f43616e646964617465732f30382d31302d323031342d313431323739383237372e706e67, '2014-2015');

-- --------------------------------------------------------

--
-- Table structure for table `tblpartylist`
--

CREATE TABLE IF NOT EXISTS `tblpartylist` (
  `PLID` int(5) NOT NULL AUTO_INCREMENT,
  `PLName` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Logo` blob,
  `PLNameAb` varchar(30) NOT NULL,
  `SY` varchar(20) NOT NULL,
  PRIMARY KEY (`PLID`),
  UNIQUE KEY `PLName` (`PLName`),
  UNIQUE KEY `PLName_2` (`PLName`),
  UNIQUE KEY `PLNameAb` (`PLNameAb`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblpartylist`
--

INSERT INTO `tblpartylist` (`PLID`, `PLName`, `Description`, `Logo`, `PLNameAb`, `SY`) VALUES
(1, 'Youth Toward to the Development', 'nonenone', 0x2e2e2f70686f746f2f50617274794c6973742f626c75652e706e67, 'YTD', '2014-2015'),
(2, 'Friendly Leader Aim to Motivate and Enhance Skills', 'Nothing', 0x2e2e2f70686f746f2f50617274794c6973742f7265642e706e67, 'FLAMES', '2014-2015'),
(3, 'Keep Calm and Be a Leader', 'nothing', 0x2e2e2f70686f746f2f50617274794c6973742f677265656e2e706e67, 'KCBL', '2014-2015');

-- --------------------------------------------------------

--
-- Table structure for table `tblposition`
--

CREATE TABLE IF NOT EXISTS `tblposition` (
  `PID` int(5) NOT NULL AUTO_INCREMENT,
  `PositionName` varchar(20) NOT NULL,
  `AllowedVoters` int(5) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tblposition`
--

INSERT INTO `tblposition` (`PID`, `PositionName`, `AllowedVoters`) VALUES
(0, 'President', 1),
(1, 'Vice-President', 1),
(2, 'Secretary', 1),
(3, 'Treasurer', 1),
(4, 'Auditor', 1),
(5, 'P.I.O', 1),
(6, 'Peace Officer', 1),
(7, 'Grade 8 Rep.', 7),
(8, 'Grade 9 Rep.', 8),
(9, 'Grade 10 Rep.', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tblvoter`
--

CREATE TABLE IF NOT EXISTS `tblvoter` (
  `VID` int(10) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) NOT NULL,
  `MidInitial` varchar(5) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `GradeYear` int(10) NOT NULL,
  `Status` int(5) NOT NULL,
  PRIMARY KEY (`VID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `tblvoter`
--

INSERT INTO `tblvoter` (`VID`, `FirstName`, `MidInitial`, `LastName`, `UserName`, `Password`, `GradeYear`, `Status`) VALUES
(1, 'Bryan Kier', 'R.', 'Aradanas', 'Kier', 'Kier', 9, 0),
(2, 'Cedric', 'D.', 'Marce', 'ced', 'ced', 8, 1),
(3, 'Erwin', 'N.', 'Valdez', 'erwin', 'erwin', 9, 0),
(4, 'Jackylyn', 'R.', 'Hermano', 'acky', 'acky', 7, 0),
(5, 'Shastyn', 'D', 'Manuel', 'shastyn', 'shastyn', 8, 0),
(8, 'Christ', 'T', 'Vicente', 'christ', 'christ', 8, 0),
(9, 'Charmaine', 'C', 'Quilana', 'chacha', 'chacha', 8, 0),
(10, 'Ann', 'J', 'Tan', 'annann', '8UAaCW4a5', 7, 0),
(11, 'Joyce', 'C', 'Duria', 'joycee', 'joycee', 9, 0),
(12, 'Jazmeen', 'C', 'Capuyon', 'jazmeen', 'jazmeen', 7, 0),
(13, 'Roshiel', 'A', 'Santos', 'roshiel', 'roshiel', 8, 0),
(14, 'Melvin', 'J', 'Quizon', 'melvin', 'melvin', 9, 0),
(15, 'Justine', 'L', 'Diaz', 'justine', 'justine', 7, 0),
(16, 'Kristine', 'K', 'Lucas', 'kristine', 'kristine', 8, 0),
(17, 'Karlla', 'O', 'Perez', 'karlla', 'karlla', 9, 0),
(18, 'Rosell', 'P', 'Juanito', 'rosell', 'rosell', 7, 0),
(19, 'Winnie', 'G', 'Lopez', 'winnie', 'winnie', 8, 0),
(20, 'Quenie', 'B', 'Timoteo', 'quenie', 'quenie', 8, 0),
(22, 'Benjoe', 'J', 'Lanorio', 'benjoe', 'MgzzSJ2cM', 7, 0),
(23, 'Jerimiah', 'V', 'Martinez', 'jerimiah', 'jerimiah', 8, 0),
(24, 'Dorender', 'F', 'Tamang', 'dorender', 'dorender', 9, 0),
(25, 'Jennilyn', 'D', 'Romero', 'jennilyn', 'jennilyn', 9, 0),
(26, 'Julie', 'C', 'Batarlo', 'juliee', 'y57Gm62SZ', 9, 0),
(27, 'Xavier', 'L', 'Ablanque', 'xavier', 'xavier', 8, 0),
(28, 'Melson', 'G', 'Mendoza', 'melson', 'melson', 8, 0),
(29, 'Perrie', 'R', 'Ricomano', 'perrie', 'perrie', 9, 0),
(30, 'James', 'H', 'Rubio', 'james1', 'james1', 7, 0),
(31, 'Cindie', 'G', 'Scarlet', 'cindie', 'cindie', 8, 0),
(32, 'Arnold', 'K', 'Lim', 'arnold', 'TDUrhb369', 9, 0),
(33, 'Sandara', 'L', 'Park', 'sandara', 'sandara', 7, 0),
(34, 'Eric', 'J', 'Rismal', 'eric12', 'eric12', 8, 0),
(35, 'Khiane', 'K', 'Lacsina', 'khiane', 'khiane', 9, 0),
(36, 'Adellesss', 'J', 'Cruz', 'adelle', '2a6yFNTkU', 7, 0),
(37, 'Trisha', 'M', 'Pangilinan', 'trisha', 'trisha', 7, 0),
(38, 'Meelka', 'M', 'Manalo', 'meelka', 'meelka', 8, 0),
(39, 'Johnny', 'L', 'Manolo', 'johnny', 'johnny', 9, 0),
(40, 'Abigael', 'c', 'Cruz', 'abigael', 'SDbDA46x9', 8, 0),
(41, 'Jessame', 'L', 'Manuel', 'jessame', 'jessame', 8, 0),
(42, 'Jimwel', 'C', 'Pangilinan', 'jimwel', 'jimwel', 8, 0),
(43, 'Jorene', 'M', 'Causo', 'jorene', 'jorene', 9, 0),
(44, 'Sheena', 'P', 'Cruz', 'sheena', 'sheena', 7, 0),
(45, 'Shereen', 'D', 'Nuedez', 'shereen', 'shereen', 8, 0),
(46, 'Alexander', 'S', 'Reyes', 'alexander', '9USmZjsKm', 9, 0),
(47, 'Jonathan', 'L', 'Palomo', 'jonathan', 'jonathan', 9, 0),
(48, 'Kurtny', 'M', 'Lucas', 'kurtny', 'kurtny', 7, 0),
(49, 'Fatima', 'S', 'Cruz', 'fatima', 'fatima', 7, 0),
(50, 'Lourdes', 'H', 'Manuel', 'lourdes', 'lourdes', 8, 0),
(51, 'Dianne', 'C', 'Toress', 'dianne', 'dianne', 9, 0),
(52, 'Pamela', 'O', 'Apuntan', 'pamela', 'pamela', 8, 0),
(53, 'Eloisa', 'K', 'Ramos', 'eloisa', 'eloisa', 7, 0),
(54, 'Minho', 'K', 'Lee', 'minho1', 'minho1', 7, 0),
(55, 'Patricia', 'F', 'Hernandez', 'patricia', 'patricia', 8, 0),
(56, 'Jayson', 'L', 'Macasu', 'jayson', 'jayson', 9, 0),
(57, 'Joshua', 'D', 'Pacheco', 'joshua', 'joshua', 7, 0),
(58, 'Bobbie', 'H', 'Mananghay', 'bobbie', 'bobbie', 8, 0),
(59, 'Jayvee', 'D', 'Lacsina', 'jayvee', 'jayvee', 9, 0),
(60, 'Romell', 'D', 'Esporna', 'romell', 'romell', 7, 0),
(61, 'Jeffrey', 'J', 'Legazpi', 'jeffrey', 'jeffrey', 8, 0),
(62, 'Lecsie', 'K', 'Yamsie', 'lecsie', 'lecsie', 9, 0),
(63, 'Kathie', 'o', 'Perez', 'kathie', 'kathie', 9, 0),
(64, 'Marwel', 'A', 'Opada', 'marwel', 'marwel', 7, 0),
(65, 'Christoper', 'M', 'Tores', 'christop', 'christop', 9, 0),
(66, 'Romeo', 'P', 'Lopez', 'romeo1', 'romeo1', 9, 0),
(67, 'Daniel', 'P', 'Sunga', 'daniel1', 'daniel1', 7, 0),
(68, 'Fifth', 'Z', 'Solomon', 'fifth', 'fifth1', 9, 0),
(69, 'Loisa', 'G', 'Andilao', 'loisa1', 'loisa1', 8, 0),
(70, 'Gilbert', 'J', 'Mandia', 'gilbert', 'gilbert', 8, 0),
(71, 'Channel Courtney', 'R.', 'Rivera', 'Channel', 'Channel', 8, 0),
(72, 'Kean', 'R', 'Belen', 'Kean', '9jjihGQR2', 8, 0),
(73, 'Alvin', 'L.', 'Pascual', 'pascual', '6HA6x2MgY', 7, 0),
(74, 'Ivan', 'C.', 'Lopez', 'ivan', 'ivanlopez', 8, 0),
(75, 'Paula Rescia', 'P.', 'Dalmacio', 'rescia', 'rescia', 8, 0),
(76, 'Sarah Lee', 'C', 'Cipriano', 'Sarah Lee', 'csKf2duGV', 8, 0),
(77, 'Lorenzo', 'P.', 'Aquino', 'Lorenzo', 'lorenzo', 9, 0),
(78, 'Kevin', 'P', 'Brazal', 'brazal', 'B9uKweX4A', 9, 0),
(79, 'Eldon', 'P.', 'Malubag', 'malubag', 'malubag', 8, 0),
(80, 'Reynaldo', 'C.', 'Carpio', 'reynaldo', 'reynaldo', 9, 0),
(81, 'Darren Gabriel', 'R.', 'Hermano', 'darren', 'darren', 9, 1),
(82, 'Audrey Nicole', 'M', 'Hermano', 'Audrey', '47mMev6cd', 7, 0),
(83, 'Andrei Jamerick', 'M.', 'Hermano', 'andrei', 'TjMqpbZ38', 9, 0),
(84, 'Rens Marco', 'B.', 'Hermano', 'marco', 'rensmarco', 8, 0),
(85, 'Rizza Mae', 'B.', 'Hermano', 'rizza', 'rizzamae', 8, 0),
(86, 'John Kyle', 'S.', 'Hermano', 'johnkyle', 'johnkyle', 9, 0),
(87, 'Jannella', 'S.', 'Salvador', 'jannella', 'jannella', 9, 0),
(88, 'Maja', 'S', 'Salvador', 'salvador', 'UepUYzdQ6', 7, 0),
(89, 'Bernard', 'J', 'Opada', 'bernard', 'bernard', 8, 0),
(90, 'Shinny', 'K', 'Legazpi', 'shinny', 'shinny', 9, 0),
(91, 'Jeron', 'D', 'Teng', 'jeron1', 'jeron1', 7, 0),
(92, 'Jeric', 'S', 'Teng', 'jeric1', 'jeric1', 7, 0),
(93, 'Fourth', 'K', 'Solomon', 'fourth', 'fourth', 8, 0),
(94, 'Vickie', 'J', 'DeGuzman', 'vickie', 'vickie', 9, 0),
(95, 'Monique', 'L', 'Perera', 'monique', 'monique', 7, 0),
(96, 'Kendra', 'P', 'Reyes', 'kendra', 'kendra', 8, 0),
(97, 'Scarlet', 'C', 'Jimenez', 'scarlet', 'scarlet', 9, 0),
(98, 'Gailee', 'K', 'Yumang', 'gailee', 'gailee', 8, 0),
(99, 'Bea', 'P', 'Quintan', 'bea123', 'bea123', 7, 1),
(100, 'Jimmy', 'D', 'Fronda', 'jimmy1', 'jimmy1', 8, 0),
(101, 'Jhen', 'i', 'Ang', 'jhen', 'nJhXW4e4k', 9, 0),
(102, 'Dan', 'R', 'Baluyot', 'dan', 'sbpScxdm9', 8, 0),
(103, 'Maricris', 'N.', 'Alvarez', 'mar', '6DAUSPnmQ', 7, 0),
(104, 'Nikk', 'E', 'Ronquillo', 'nikk', 'mKmt62Y3A', 8, 0),
(105, 'Araine', 'J', 'Pabulayan', 'aryan', 'aNdSmSC6d', 7, 0),
(106, 'Karen', 'F.', 'Balaria', 'karen', '6G6x4GW63', 9, 0),
(107, 'negs', 'n', 'negs', 'negs123', 'w7hYb95DM', 8, 0),
(109, 'jkhk', 'j', 'jbjhbkj', 'uhjkk', 'XeXXxu3Gp', 9, 0),
(111, 'jgkjkj', 'j', 'jkh', 'bjkjbnk,', 'iTnfpNi9M', 9, 0),
(112, 'negers', 'N.', 'negers', 'negers123', 'UpkJ32uqh', 9, 0),
(113, 'kl', 'kl', 'kl', 'kl', 'tnGkFi6p4', 7, 0),
(134, 'uio', 'uo', 'uio', 'uoi', 'EYar6RxAW', 8, 0),
(143, 'Sash', 'K', 'Teen', '121212', 'PFiWS8vhr', 7, 0),
(146, 'Dan', 'J', 'Jay', '12345', 't27RVgq7X', 7, 0),
(147, 'Kate', 'M', 'Dare', '12347', 'ZD6XmhEN9', 8, 0),
(148, 'JanJan', 'J', 'Jun', '0987', '4bGDHF7xh', 7, 0),
(149, 'vcvjnnjnj', 'h', 'nhjnjn', 'vvffgbf', 'gq2xxXh9P', 7, 0),
(150, 'you', 's', 'paks', '123', 'jQNw5M6jn', 8, 0),
(151, 'Glen', 'B', 'Cruz', 'cruz', 'UhpUYzdQ6', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblvotes`
--

CREATE TABLE IF NOT EXISTS `tblvotes` (
  `RID` int(5) NOT NULL AUTO_INCREMENT,
  `VoterID` int(5) NOT NULL,
  `CandidateID` int(5) NOT NULL,
  `SY` varchar(20) NOT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tblvotes`
--

INSERT INTO `tblvotes` (`RID`, `VoterID`, `CandidateID`, `SY`) VALUES
(1, 99, 29, '2014-2015'),
(2, 99, 8, '2014-2015'),
(3, 99, 0, '2014-2015'),
(4, 99, 0, '2014-2015'),
(5, 99, 0, '2014-2015'),
(6, 99, 0, '2014-2015'),
(7, 99, 0, '2014-2015'),
(8, 99, 0, '2014-2015'),
(9, 2, 11, '2014-2015'),
(10, 2, 12, '2014-2015'),
(11, 2, 13, '2014-2015'),
(12, 2, 14, '2014-2015'),
(13, 2, 0, '2014-2015'),
(14, 2, 0, '2014-2015'),
(15, 2, 0, '2014-2015'),
(16, 2, 0, '2014-2015'),
(17, 81, 29, '2014-2015'),
(18, 81, 8, '2014-2015'),
(19, 81, 0, '2014-2015'),
(20, 81, 0, '2014-2015'),
(21, 81, 0, '2014-2015'),
(22, 81, 0, '2014-2015'),
(23, 81, 0, '2014-2015'),
(24, 81, 0, '2014-2015');

-- --------------------------------------------------------

--
-- Table structure for table `tblyearselected`
--

CREATE TABLE IF NOT EXISTS `tblyearselected` (
  `YID` int(10) NOT NULL AUTO_INCREMENT,
  `SY` varchar(20) NOT NULL,
  PRIMARY KEY (`YID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblyearselected`
--

INSERT INTO `tblyearselected` (`YID`, `SY`) VALUES
(1, '2014-2015');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
