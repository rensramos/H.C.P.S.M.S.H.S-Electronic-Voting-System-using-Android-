DROP TABLE IF EXISTS tbladmin;

CREATE TABLE `tbladmin` (
  `AID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`AID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO tbladmin VALUES("5","haha","hahaha","hahaha");
INSERT INTO tbladmin VALUES("6","Bryan Kier Aradanas","User123","32250170a0dca92d53ec9624f336ca24");
INSERT INTO tbladmin VALUES("7","Fortage jise","bam123","07037c50dd2076c57dc72d8698bd6184");



DROP TABLE IF EXISTS tblcandidate;

CREATE TABLE `tblcandidate` (
  `CID` int(5) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) NOT NULL,
  `MidInitial` varchar(5) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `PositionID` int(5) NOT NULL,
  `PartyListID` int(5) NOT NULL,
  `Photo` blob NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO tblcandidate VALUES("7","Shastyn","D","Manuel","1","1","../photo/16-08-2014-1408202456.jpg");
INSERT INTO tblcandidate VALUES("8","Kier","A","Aradanas","2","1","../photo/Candidates/24-08-2014-1408848286.jpg");
INSERT INTO tblcandidate VALUES("9","Rens","M","Ramosa","3","1","../photo/Candidates/18-08-2014-1408387110.jpg");
INSERT INTO tblcandidate VALUES("10","Erwin","L","Valdez","4","1","../photo/30-07-2014-1406740678.png");
INSERT INTO tblcandidate VALUES("11","Jacky","L","Hermano","1","2","../photo/30-07-2014-1406740712.png");
INSERT INTO tblcandidate VALUES("12","Christ","T","Vicente","2","2","../photo/30-07-2014-1406740734.png");
INSERT INTO tblcandidate VALUES("13","Charmaine","C","Quilana","3","2","../photo/30-07-2014-1406740757.png");
INSERT INTO tblcandidate VALUES("14","Hylarie","M","Natividad","4","2","../photo/30-07-2014-1406740803.png");
INSERT INTO tblcandidate VALUES("15","Rodrigo","J","San Juan","1","3","../photo/30-07-2014-1406740839.png");
INSERT INTO tblcandidate VALUES("16","Justine","M","Cruz","2","3","../photo/30-07-2014-1406740864.png");
INSERT INTO tblcandidate VALUES("17","Kathy","M","Cruz","3","3","../photo/30-07-2014-1406740940.png");
INSERT INTO tblcandidate VALUES("18","Ann","C","Jimenez","4","3","../photo/30-07-2014-1406740959.png");
INSERT INTO tblcandidate VALUES("19","Karen","F.","Balaria","5","1","../photo/Candidates/Unknown.jpg");
INSERT INTO tblcandidate VALUES("20","Araine","J","Pabulayan","6","1","../photo/Candidates/Unknown.jpg");
INSERT INTO tblcandidate VALUES("21","Nikk","E","Ronquillo","7","1","../photo/Candidates/Unknown.jpg");
INSERT INTO tblcandidate VALUES("22","Maricris","N.","Alvarez","8","1","../photo/Candidates/Unknown.jpg");
INSERT INTO tblcandidate VALUES("23","Dan","R","Baluyot","9","1","../photo/Candidates/Unknown.jpg");
INSERT INTO tblcandidate VALUES("25","Jhen","i","Ang","10","1","../photo/Candidates/Unknown.jpg");



DROP TABLE IF EXISTS tblpartylist;

CREATE TABLE `tblpartylist` (
  `PLID` int(5) NOT NULL AUTO_INCREMENT,
  `PLName` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Logo` blob,
  `PLNameAb` varchar(30) NOT NULL,
  PRIMARY KEY (`PLID`),
  UNIQUE KEY `PLName` (`PLName`),
  UNIQUE KEY `PLName_2` (`PLName`),
  UNIQUE KEY `PLNameAb` (`PLNameAb`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tblpartylist VALUES("1","dsdfsdfsd","nonenone","","WALAKAYO");
INSERT INTO tblpartylist VALUES("2","Friendly Leader Aim to Motivate and Enhance Skills","Nothing","","FLAMES");
INSERT INTO tblpartylist VALUES("3","blahblahblah","nothing","","HAIST");



DROP TABLE IF EXISTS tblposition;

CREATE TABLE `tblposition` (
  `PID` int(5) NOT NULL AUTO_INCREMENT,
  `PositionName` varchar(20) NOT NULL,
  `AllowedVoters` int(5) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO tblposition VALUES("1","President","1");
INSERT INTO tblposition VALUES("2","Vice-President","1");
INSERT INTO tblposition VALUES("3","Secretary","1");
INSERT INTO tblposition VALUES("4","Treasurer","1");
INSERT INTO tblposition VALUES("5","Auditor","1");
INSERT INTO tblposition VALUES("6","P.I.O","1");
INSERT INTO tblposition VALUES("7","Peace Officer","1");
INSERT INTO tblposition VALUES("8","Grade 8 Rep.","7");
INSERT INTO tblposition VALUES("9","Grade 9 Rep.","8");
INSERT INTO tblposition VALUES("10","Grade 10 Rep.","9");



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
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

INSERT INTO tblvoter VALUES("1","Bryan Kier","R.","Aradanas","Kier","Kier","9","1");
INSERT INTO tblvoter VALUES("2","Cedric","D.","Marce","ced","ced","8","1");
INSERT INTO tblvoter VALUES("3","Erwin","N.","Valdez","erwin","erwin","9","1");
INSERT INTO tblvoter VALUES("4","Jackylyn","R.","Hermano","acky","acky","7","1");
INSERT INTO tblvoter VALUES("5","Shastyn","D","Manuel","shastyn","shastyn","8","1");
INSERT INTO tblvoter VALUES("8","Christ","T","Vicente","christ","christ","8","1");
INSERT INTO tblvoter VALUES("9","Charmaine","C","Quilana","chacha","chacha","8","1");
INSERT INTO tblvoter VALUES("10","Ann","J","Tan","annann","8UAaCW4a5","7","1");
INSERT INTO tblvoter VALUES("11","Joyce","C","Duria","joycee","joycee","9","1");
INSERT INTO tblvoter VALUES("12","Jazmeen","C","Capuyon","jazmeen","jazmeen","7","1");
INSERT INTO tblvoter VALUES("13","Roshiel","A","Santos","roshiel","roshiel","8","1");
INSERT INTO tblvoter VALUES("14","Melvin","J","Quizon","melvin","melvin","9","1");
INSERT INTO tblvoter VALUES("15","Justine","L","Diaz","justine","justine","7","1");
INSERT INTO tblvoter VALUES("16","Kristine","K","Lucas","kristine","kristine","8","0");
INSERT INTO tblvoter VALUES("17","Karlla","O","Perez","karlla","karlla","9","1");
INSERT INTO tblvoter VALUES("18","Rosell","P","Juanito","rosell","rosell","7","0");
INSERT INTO tblvoter VALUES("19","Winnie","G","Lopez","winnie","winnie","8","0");
INSERT INTO tblvoter VALUES("20","Quenie","B","Timoteo","quenie","quenie","8","0");
INSERT INTO tblvoter VALUES("21","Elaine","P","Amolo","elaine","elaine","9","0");
INSERT INTO tblvoter VALUES("22","Benjoe","J","Lanorio","benjoe","MgzzSJ2cM","7","0");
INSERT INTO tblvoter VALUES("23","Jerimiah","V","Martinez","jerimiah","jerimiah","8","0");
INSERT INTO tblvoter VALUES("24","Dorender","F","Tamang","dorender","dorender","9","1");
INSERT INTO tblvoter VALUES("25","Jennilyn","D","Romero","jennilyn","jennilyn","9","0");
INSERT INTO tblvoter VALUES("26","Julie","C","Batarlo","juliee","juliee","7","0");
INSERT INTO tblvoter VALUES("27","Xavier","L","Ablanque","xavier","xavier","8","0");
INSERT INTO tblvoter VALUES("28","Melson","G","Mendoza","melson","melson","8","0");
INSERT INTO tblvoter VALUES("29","Perrie","R","Ricomano","perrie","perrie","9","0");
INSERT INTO tblvoter VALUES("30","James","H","Rubio","james1","james1","7","0");
INSERT INTO tblvoter VALUES("31","Cindie","G","Scarlet","cindie","cindie","8","0");
INSERT INTO tblvoter VALUES("32","Arnold","K","Lim","arnold","TDUrhb369","9","0");
INSERT INTO tblvoter VALUES("33","Sandara","L","Park","sandara","sandara","7","0");
INSERT INTO tblvoter VALUES("34","Eric","J","Rismal","eric12","eric12","8","0");
INSERT INTO tblvoter VALUES("35","Khiane","K","Lacsina","khiane","khiane","9","0");
INSERT INTO tblvoter VALUES("36","Adelle","J","Cruz","adelle","6RQXfZnPm","7","0");
INSERT INTO tblvoter VALUES("37","Trisha","M","Pangilinan","trisha","trisha","7","0");
INSERT INTO tblvoter VALUES("38","Meelka","M","Manalo","meelka","meelka","8","0");
INSERT INTO tblvoter VALUES("39","Johnny","L","Manolo","johnny","johnny","9","0");
INSERT INTO tblvoter VALUES("40","Abigael","C","Cruz","abigael","GchW4diKt","8","0");
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
INSERT INTO tblvoter VALUES("72","Kean","R.","Belen","Kean","keanbelen","4","0");
INSERT INTO tblvoter VALUES("73","Alvin","L.","Pascual","pascual","6HA6x2MgY","7","0");
INSERT INTO tblvoter VALUES("74","Ivan","C.","Lopez","ivan","ivanlopez","8","0");
INSERT INTO tblvoter VALUES("75","Paula Rescia","P.","Dalmacio","rescia","rescia","8","0");
INSERT INTO tblvoter VALUES("76","Sarah Lee","C.","Cipriano","Sarah Lee","sarahlee","4","0");
INSERT INTO tblvoter VALUES("77","Lorenzo","P.","Aquino","Lorenzo","lorenzo","9","0");
INSERT INTO tblvoter VALUES("78","Kevin","P.","Brazal","brazal","brazal","4","0");
INSERT INTO tblvoter VALUES("79","Eldon","P.","Malubag","malubag","malubag","8","0");
INSERT INTO tblvoter VALUES("80","Reynaldo","C.","Carpio","reynaldo","reynaldo","9","0");
INSERT INTO tblvoter VALUES("81","Darren Gabriel","R.","Hermano","darren","darren","9","0");
INSERT INTO tblvoter VALUES("82","Audrey Nicole","M.","Hermano","Audrey","audrey","4","0");
INSERT INTO tblvoter VALUES("83","Andrei Jamerick","M.","Hermano","andrei","TjMqpbZ38","9","0");
INSERT INTO tblvoter VALUES("84","Rens Marco","B.","Hermano","marco","rensmarco","8","0");
INSERT INTO tblvoter VALUES("85","Rizza Mae","B.","Hermano","rizza","rizzamae","8","0");
INSERT INTO tblvoter VALUES("86","John Kyle","S.","Hermano","johnkyle","johnkyle","9","0");
INSERT INTO tblvoter VALUES("87","Jannella","S.","Salvador","jannella","jannella","9","0");
INSERT INTO tblvoter VALUES("88","Maja","S.","Salvador","salvador","salvador","4","0");
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



DROP TABLE IF EXISTS tblvotes;

CREATE TABLE `tblvotes` (
  `RID` int(5) NOT NULL AUTO_INCREMENT,
  `VoterID` int(5) NOT NULL,
  `CandidateID` int(5) NOT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

INSERT INTO tblvotes VALUES("11","1","11");
INSERT INTO tblvotes VALUES("12","1","8");
INSERT INTO tblvotes VALUES("13","1","17");
INSERT INTO tblvotes VALUES("14","1","14");
INSERT INTO tblvotes VALUES("15","2","7");
INSERT INTO tblvotes VALUES("16","2","8");
INSERT INTO tblvotes VALUES("17","2","13");
INSERT INTO tblvotes VALUES("18","2","14");
INSERT INTO tblvotes VALUES("19","3","7");
INSERT INTO tblvotes VALUES("20","3","9");
INSERT INTO tblvotes VALUES("21","3","8");
INSERT INTO tblvotes VALUES("22","3","10");
INSERT INTO tblvotes VALUES("23","4","15");
INSERT INTO tblvotes VALUES("24","4","12");
INSERT INTO tblvotes VALUES("25","4","13");
INSERT INTO tblvotes VALUES("26","4","10");
INSERT INTO tblvotes VALUES("27","5","11");
INSERT INTO tblvotes VALUES("28","5","8");
INSERT INTO tblvotes VALUES("29","5","9");
INSERT INTO tblvotes VALUES("30","5","18");
INSERT INTO tblvotes VALUES("31","14","7");
INSERT INTO tblvotes VALUES("32","14","16");
INSERT INTO tblvotes VALUES("33","14","17");
INSERT INTO tblvotes VALUES("34","14","10");
INSERT INTO tblvotes VALUES("35","15","11");
INSERT INTO tblvotes VALUES("36","15","8");
INSERT INTO tblvotes VALUES("37","15","9");
INSERT INTO tblvotes VALUES("38","15","18");
INSERT INTO tblvotes VALUES("39","8","15");
INSERT INTO tblvotes VALUES("40","8","8");
INSERT INTO tblvotes VALUES("41","8","17");
INSERT INTO tblvotes VALUES("42","8","14");
INSERT INTO tblvotes VALUES("43","9","7");
INSERT INTO tblvotes VALUES("44","9","8");
INSERT INTO tblvotes VALUES("45","9","17");
INSERT INTO tblvotes VALUES("46","9","10");
INSERT INTO tblvotes VALUES("47","10","11");
INSERT INTO tblvotes VALUES("48","10","16");
INSERT INTO tblvotes VALUES("49","10","13");
INSERT INTO tblvotes VALUES("50","10","10");
INSERT INTO tblvotes VALUES("51","11","11");
INSERT INTO tblvotes VALUES("52","11","8");
INSERT INTO tblvotes VALUES("53","11","13");
INSERT INTO tblvotes VALUES("54","11","10");
INSERT INTO tblvotes VALUES("55","12","7");
INSERT INTO tblvotes VALUES("56","12","8");
INSERT INTO tblvotes VALUES("57","12","9");
INSERT INTO tblvotes VALUES("58","12","14");
INSERT INTO tblvotes VALUES("93","13","9");
INSERT INTO tblvotes VALUES("94","13","10");
INSERT INTO tblvotes VALUES("95","13","19");
INSERT INTO tblvotes VALUES("96","13","20");
INSERT INTO tblvotes VALUES("97","13","21");
INSERT INTO tblvotes VALUES("98","13","22");
INSERT INTO tblvotes VALUES("99","17","7");
INSERT INTO tblvotes VALUES("100","17","8");
INSERT INTO tblvotes VALUES("101","17","9");
INSERT INTO tblvotes VALUES("102","17","10");
INSERT INTO tblvotes VALUES("103","17","19");
INSERT INTO tblvotes VALUES("104","17","20");
INSERT INTO tblvotes VALUES("105","17","21");
INSERT INTO tblvotes VALUES("106","17","22");
INSERT INTO tblvotes VALUES("115","24","8");
INSERT INTO tblvotes VALUES("116","24","0");
INSERT INTO tblvotes VALUES("117","24","13");
INSERT INTO tblvotes VALUES("118","24","14");
INSERT INTO tblvotes VALUES("119","24","19");
INSERT INTO tblvotes VALUES("120","24","20");
INSERT INTO tblvotes VALUES("121","24","21");
INSERT INTO tblvotes VALUES("122","24","22");



