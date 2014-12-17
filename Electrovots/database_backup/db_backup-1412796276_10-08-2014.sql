DROP TABLE IF EXISTS tbladmin;

CREATE TABLE `tbladmin` (
  `AID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `UserName` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `Password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `SY` varchar(20) NOT NULL,
  `Status` int(10) NOT NULL,
  PRIMARY KEY (`AID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO tbladmin VALUES("6","Bryan Kier Aradanas","User123","32250170a0dca92d53ec9624f336ca24","2014-2015","1");
INSERT INTO tbladmin VALUES("7","Admin Developer","Admin","0195d901ae8d166fa7a46ef233965063","0000-0000","1");
INSERT INTO tbladmin VALUES("8","Robert Santiago","Robert","684c851af59965b680086b7b4896ff98","2013-2014","0");



DROP TABLE IF EXISTS tblcandidate;

CREATE TABLE `tblcandidate` (
  `CID` int(5) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) NOT NULL,
  `MidInitial` varchar(5) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `PositionID` int(5) NOT NULL,
  `PartyListID` int(5) NOT NULL,
  `Photo` blob NOT NULL,
  `SY` varchar(20) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

INSERT INTO tblcandidate VALUES("7","Shastyn","D","Manuel","0","1","../photo/Candidates/05-10-2014-1412490644.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("8","Kier","A","Aradanas","1","1","../photo/Candidates/24-08-2014-1408848286.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("9","Rens","M","Ramos","2","1","../photo/Candidates/18-08-2014-1408387110.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("10","Erwin","L","Valdez","3","1","../photo/Candidates/01-10-2014-1412183805.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("11","Jacky","L","Hermanos","0","2","../photo/Candidates/01-10-2014-1412183835.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("12","Christ","T","Vicente","1","2","../photo/Candidates/01-10-2014-1412183849.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("13","Charmaine","C","Quilana","2","2","../photo/Candidates/01-10-2014-1412183858.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("14","Hylarie","M","Natividad","3","2","../photo/Candidates/01-10-2014-1412183888.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("15","Rodrigos","J","San Juan","0","3","../photo/Candidates/01-10-2014-1412183908.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("16","Justine","M","Cruz","1","3","../photo/Candidates/01-10-2014-1412183918.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("17","Kathy","M","Cruz","2","3","../photo/Candidates/01-10-2014-1412183933.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("18","Ann","C","Jimenez","3","3","../photo/Candidates/01-10-2014-1412183949.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("19","Karen","F.","Balaria","4","1","../photo/Candidates/01-10-2014-1412183980.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("20","Araine","J","Pabulayan","5","1","../photo/Candidates/01-10-2014-1412183996.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("21","Nikk","E","Ronquillo","6","1","../photo/Candidates/01-10-2014-1412184043.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("23","Dan","R","Baluyot","8","1","../photo/Candidates/01-10-2014-1412184058.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("29","hkh","j","kjlkjl","0","0","../photo/Candidates/01-10-2014-1412184151.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("30","bj","cg","hvhjbk","7","1","../photo/Candidates/01-10-2014-1412184213.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("31","dgfd","s","gdfg","2","0","../photo/Candidates/01-10-2014-1412184240.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("33","Alvin","L.","Pascual","1","0","../photo/Candidates/01-10-2014-1412184296.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("35","Kate","M.","Dare","0","0","../photo/Candidates/01-10-2014-1412184272.jpg","2014-2015");
INSERT INTO tblcandidate VALUES("38","janjan","j","jun","7","2","../photo/Candidates/06-10-2014-1412586233.jpg","2014-2015");



DROP TABLE IF EXISTS tblpartylist;

CREATE TABLE `tblpartylist` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tblpartylist VALUES("1","Youth Toward to the Development","nonenone","../photo/PartyList/blue.png","YTD","2014-2015");
INSERT INTO tblpartylist VALUES("2","Friendly Leader Aim to Motivate and Enhance Skills","Nothing","../photo/PartyList/red.png","FLAMES","2014-2015");
INSERT INTO tblpartylist VALUES("3","Keep Calm and Be a Leader","nothing","../photo/PartyList/green.png","KCBL","2014-2015");



DROP TABLE IF EXISTS tblposition;

CREATE TABLE `tblposition` (
  `PID` int(5) NOT NULL AUTO_INCREMENT,
  `PositionName` varchar(20) NOT NULL,
  `AllowedVoters` int(5) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO tblposition VALUES("0","President","1");
INSERT INTO tblposition VALUES("1","Vice-President","1");
INSERT INTO tblposition VALUES("2","Secretary","1");
INSERT INTO tblposition VALUES("3","Treasurer","1");
INSERT INTO tblposition VALUES("4","Auditor","1");
INSERT INTO tblposition VALUES("5","P.I.O","1");
INSERT INTO tblposition VALUES("6","Peace Officer","1");
INSERT INTO tblposition VALUES("7","Grade 8 Rep.","7");
INSERT INTO tblposition VALUES("8","Grade 9 Rep.","8");
INSERT INTO tblposition VALUES("9","Grade 10 Rep.","9");



DROP TABLE IF EXISTS tblvoter;

CREATE TABLE `tblvoter` (
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
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

INSERT INTO tblvoter VALUES("1","Bryan Kier","R.","Aradanas","Kier","Kier","9","0");
INSERT INTO tblvoter VALUES("2","Cedric","D.","Marce","ced","ced","8","0");
INSERT INTO tblvoter VALUES("3","Erwin","N.","Valdez","erwin","erwin","9","0");
INSERT INTO tblvoter VALUES("4","Jackylyn","R.","Hermano","acky","acky","7","0");
INSERT INTO tblvoter VALUES("5","Shastyn","D","Manuel","shastyn","shastyn","8","0");
INSERT INTO tblvoter VALUES("8","Christ","T","Vicente","christ","christ","8","0");
INSERT INTO tblvoter VALUES("9","Charmaine","C","Quilana","chacha","chacha","8","0");
INSERT INTO tblvoter VALUES("10","Ann","J","Tan","annann","8UAaCW4a5","7","0");
INSERT INTO tblvoter VALUES("11","Joyce","C","Duria","joycee","joycee","9","0");
INSERT INTO tblvoter VALUES("12","Jazmeen","C","Capuyon","jazmeen","jazmeen","7","0");
INSERT INTO tblvoter VALUES("13","Roshiel","A","Santos","roshiel","roshiel","8","0");
INSERT INTO tblvoter VALUES("14","Melvin","J","Quizon","melvin","melvin","9","0");
INSERT INTO tblvoter VALUES("15","Justine","L","Diaz","justine","justine","7","0");
INSERT INTO tblvoter VALUES("16","Kristine","K","Lucas","kristine","kristine","8","0");
INSERT INTO tblvoter VALUES("17","Karlla","O","Perez","karlla","karlla","9","0");
INSERT INTO tblvoter VALUES("18","Rosell","P","Juanito","rosell","rosell","7","0");
INSERT INTO tblvoter VALUES("19","Winnie","G","Lopez","winnie","winnie","8","0");
INSERT INTO tblvoter VALUES("20","Quenie","B","Timoteo","quenie","quenie","8","0");
INSERT INTO tblvoter VALUES("22","Benjoe","J","Lanorio","benjoe","MgzzSJ2cM","7","0");
INSERT INTO tblvoter VALUES("23","Jerimiah","V","Martinez","jerimiah","jerimiah","8","0");
INSERT INTO tblvoter VALUES("24","Dorender","F","Tamang","dorender","dorender","9","0");
INSERT INTO tblvoter VALUES("25","Jennilyn","D","Romero","jennilyn","jennilyn","9","0");
INSERT INTO tblvoter VALUES("26","Julie","C","Batarlo","juliee","y57Gm62SZ","9","0");
INSERT INTO tblvoter VALUES("27","Xavier","L","Ablanque","xavier","xavier","8","0");
INSERT INTO tblvoter VALUES("28","Melson","G","Mendoza","melson","melson","8","0");
INSERT INTO tblvoter VALUES("29","Perrie","R","Ricomano","perrie","perrie","9","0");
INSERT INTO tblvoter VALUES("30","James","H","Rubio","james1","james1","7","0");
INSERT INTO tblvoter VALUES("31","Cindie","G","Scarlet","cindie","cindie","8","0");
INSERT INTO tblvoter VALUES("32","Arnold","K","Lim","arnold","TDUrhb369","9","0");
INSERT INTO tblvoter VALUES("33","Sandara","L","Park","sandara","sandara","7","0");
INSERT INTO tblvoter VALUES("34","Eric","J","Rismal","eric12","eric12","8","0");
INSERT INTO tblvoter VALUES("35","Khiane","K","Lacsina","khiane","khiane","9","0");
INSERT INTO tblvoter VALUES("36","Adellesss","J","Cruz","adelle","2a6yFNTkU","7","0");
INSERT INTO tblvoter VALUES("37","Trisha","M","Pangilinan","trisha","trisha","7","0");
INSERT INTO tblvoter VALUES("38","Meelka","M","Manalo","meelka","meelka","8","0");
INSERT INTO tblvoter VALUES("39","Johnny","L","Manolo","johnny","johnny","9","0");
INSERT INTO tblvoter VALUES("40","Abigael","c","Cruz","abigael","SDbDA46x9","8","0");
INSERT INTO tblvoter VALUES("41","Jessame","L","Manuel","jessame","jessame","8","0");
INSERT INTO tblvoter VALUES("42","Jimwel","C","Pangilinan","jimwel","jimwel","8","0");
INSERT INTO tblvoter VALUES("43","Jorene","M","Causo","jorene","jorene","9","0");
INSERT INTO tblvoter VALUES("44","Sheena","P","Cruz","sheena","sheena","7","0");
INSERT INTO tblvoter VALUES("45","Shereen","D","Nuedez","shereen","shereen","8","0");
INSERT INTO tblvoter VALUES("46","Alexander","S","Reyes","alexander","9USmZjsKm","9","0");
INSERT INTO tblvoter VALUES("47","Jonathan","L","Palomo","jonathan","jonathan","9","0");
INSERT INTO tblvoter VALUES("48","Kurtny","M","Lucas","kurtny","kurtny","7","0");
INSERT INTO tblvoter VALUES("49","Fatima","S","Cruz","fatima","fatima","7","0");
INSERT INTO tblvoter VALUES("50","Lourdes","H","Manuel","lourdes","lourdes","8","0");
INSERT INTO tblvoter VALUES("51","Dianne","C","Toress","dianne","dianne","9","0");
INSERT INTO tblvoter VALUES("52","Pamela","O","Apuntan","pamela","pamela","8","0");
INSERT INTO tblvoter VALUES("53","Eloisa","K","Ramos","eloisa","eloisa","7","0");
INSERT INTO tblvoter VALUES("54","Minho","K","Lee","minho1","minho1","7","0");
INSERT INTO tblvoter VALUES("55","Patricia","F","Hernandez","patricia","patricia","8","0");
INSERT INTO tblvoter VALUES("56","Jayson","L","Macasu","jayson","jayson","9","0");
INSERT INTO tblvoter VALUES("57","Joshua","D","Pacheco","joshua","joshua","7","0");
INSERT INTO tblvoter VALUES("58","Bobbie","H","Mananghay","bobbie","bobbie","8","0");
INSERT INTO tblvoter VALUES("59","Jayvee","D","Lacsina","jayvee","jayvee","9","0");
INSERT INTO tblvoter VALUES("60","Romell","D","Esporna","romell","romell","7","0");
INSERT INTO tblvoter VALUES("61","Jeffrey","J","Legazpi","jeffrey","jeffrey","8","0");
INSERT INTO tblvoter VALUES("62","Lecsie","K","Yamsie","lecsie","lecsie","9","0");
INSERT INTO tblvoter VALUES("63","Kathie","o","Perez","kathie","kathie","9","0");
INSERT INTO tblvoter VALUES("64","Marwel","A","Opada","marwel","marwel","7","0");
INSERT INTO tblvoter VALUES("65","Christoper","M","Tores","christop","christop","9","0");
INSERT INTO tblvoter VALUES("66","Romeo","P","Lopez","romeo1","romeo1","9","0");
INSERT INTO tblvoter VALUES("67","Daniel","P","Sunga","daniel1","daniel1","7","0");
INSERT INTO tblvoter VALUES("68","Fifth","Z","Solomon","fifth","fifth1","9","0");
INSERT INTO tblvoter VALUES("69","Loisa","G","Andilao","loisa1","loisa1","8","0");
INSERT INTO tblvoter VALUES("70","Gilbert","J","Mandia","gilbert","gilbert","8","0");
INSERT INTO tblvoter VALUES("71","Channel Courtney","R.","Rivera","Channel","Channel","8","0");
INSERT INTO tblvoter VALUES("72","Kean","R","Belen","Kean","9jjihGQR2","8","0");
INSERT INTO tblvoter VALUES("73","Alvin","L.","Pascual","pascual","6HA6x2MgY","7","0");
INSERT INTO tblvoter VALUES("74","Ivan","C.","Lopez","ivan","ivanlopez","8","0");
INSERT INTO tblvoter VALUES("75","Paula Rescia","P.","Dalmacio","rescia","rescia","8","0");
INSERT INTO tblvoter VALUES("76","Sarah Lee","C","Cipriano","Sarah Lee","csKf2duGV","8","0");
INSERT INTO tblvoter VALUES("77","Lorenzo","P.","Aquino","Lorenzo","lorenzo","9","0");
INSERT INTO tblvoter VALUES("78","Kevin","P","Brazal","brazal","B9uKweX4A","9","0");
INSERT INTO tblvoter VALUES("79","Eldon","P.","Malubag","malubag","malubag","8","0");
INSERT INTO tblvoter VALUES("80","Reynaldo","C.","Carpio","reynaldo","reynaldo","9","0");
INSERT INTO tblvoter VALUES("81","Darren Gabriel","R.","Hermano","darren","darren","9","0");
INSERT INTO tblvoter VALUES("82","Audrey Nicole","M","Hermano","Audrey","47mMev6cd","7","0");
INSERT INTO tblvoter VALUES("83","Andrei Jamerick","M.","Hermano","andrei","TjMqpbZ38","9","0");
INSERT INTO tblvoter VALUES("84","Rens Marco","B.","Hermano","marco","rensmarco","8","0");
INSERT INTO tblvoter VALUES("85","Rizza Mae","B.","Hermano","rizza","rizzamae","8","0");
INSERT INTO tblvoter VALUES("86","John Kyle","S.","Hermano","johnkyle","johnkyle","9","0");
INSERT INTO tblvoter VALUES("87","Jannella","S.","Salvador","jannella","jannella","9","0");
INSERT INTO tblvoter VALUES("88","Maja","S","Salvador","salvador","UepUYzdQ6","7","0");
INSERT INTO tblvoter VALUES("89","Bernard","J","Opada","bernard","bernard","8","0");
INSERT INTO tblvoter VALUES("90","Shinny","K","Legazpi","shinny","shinny","9","0");
INSERT INTO tblvoter VALUES("91","Jeron","D","Teng","jeron1","jeron1","7","0");
INSERT INTO tblvoter VALUES("92","Jeric","S","Teng","jeric1","jeric1","7","0");
INSERT INTO tblvoter VALUES("93","Fourth","K","Solomon","fourth","fourth","8","0");
INSERT INTO tblvoter VALUES("94","Vickie","J","DeGuzman","vickie","vickie","9","0");
INSERT INTO tblvoter VALUES("95","Monique","L","Perera","monique","monique","7","0");
INSERT INTO tblvoter VALUES("96","Kendra","P","Reyes","kendra","kendra","8","0");
INSERT INTO tblvoter VALUES("97","Scarlet","C","Jimenez","scarlet","scarlet","9","0");
INSERT INTO tblvoter VALUES("98","Gailee","K","Yumang","gailee","gailee","8","0");
INSERT INTO tblvoter VALUES("99","Bea","P","Quintan","bea123","bea123","7","0");
INSERT INTO tblvoter VALUES("100","Jimmy","D","Fronda","jimmy1","jimmy1","8","0");
INSERT INTO tblvoter VALUES("101","Jhen","i","Ang","jhen","nJhXW4e4k","9","0");
INSERT INTO tblvoter VALUES("102","Dan","R","Baluyot","dan","sbpScxdm9","8","0");
INSERT INTO tblvoter VALUES("103","Maricris","N.","Alvarez","mar","6DAUSPnmQ","7","0");
INSERT INTO tblvoter VALUES("104","Nikk","E","Ronquillo","nikk","mKmt62Y3A","8","0");
INSERT INTO tblvoter VALUES("105","Araine","J","Pabulayan","aryan","aNdSmSC6d","7","0");
INSERT INTO tblvoter VALUES("106","Karen","F.","Balaria","karen","6G6x4GW63","9","0");
INSERT INTO tblvoter VALUES("107","negs","n","negs","negs123","w7hYb95DM","8","0");
INSERT INTO tblvoter VALUES("109","jkhk","j","jbjhbkj","uhjkk","XeXXxu3Gp","9","0");
INSERT INTO tblvoter VALUES("111","jgkjkj","j","jkh","bjkjbnk,","iTnfpNi9M","9","0");
INSERT INTO tblvoter VALUES("112","negers","N.","negers","negers123","UpkJ32uqh","9","0");
INSERT INTO tblvoter VALUES("113","kl","kl","kl","kl","tnGkFi6p4","7","0");
INSERT INTO tblvoter VALUES("134","uio","uo","uio","uoi","EYar6RxAW","8","0");
INSERT INTO tblvoter VALUES("143","Sash","K","Teen","121212","PFiWS8vhr","7","0");
INSERT INTO tblvoter VALUES("146","Dan","J","Jay","12345","t27RVgq7X","7","0");
INSERT INTO tblvoter VALUES("147","Kate","M","Dare","12347","ZD6XmhEN9","8","0");
INSERT INTO tblvoter VALUES("148","JanJan","J","Jun","0987","4bGDHF7xh","7","0");
INSERT INTO tblvoter VALUES("149","vcvjnnjnj","h","nhjnjn","vvffgbf","gq2xxXh9P","7","0");
INSERT INTO tblvoter VALUES("150","you","s","paks","123","jQNw5M6jn","8","0");



DROP TABLE IF EXISTS tblvotes;

CREATE TABLE `tblvotes` (
  `RID` int(5) NOT NULL AUTO_INCREMENT,
  `VoterID` int(5) NOT NULL,
  `CandidateID` int(5) NOT NULL,
  `SY` varchar(20) NOT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS tblyearselected;

CREATE TABLE `tblyearselected` (
  `YID` int(10) NOT NULL AUTO_INCREMENT,
  `SY` varchar(20) NOT NULL,
  PRIMARY KEY (`YID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tblyearselected VALUES("1","2014-2015");



