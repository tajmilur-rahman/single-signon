CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL auto_increment,
  `uUsername` varchar(128) NOT NULL,
  `uPassword` varchar(40) NOT NULL,
  `uSalt` varchar(128) NOT NULL,
  `uActivity` datetime NOT NULL,
  `uCreated` datetime NOT NULL,
  PRIMARY KEY  (`userId`),
  UNIQUE KEY `uUsername` (`uUsername`)
	) ENGINE=INNODB AUTO_INCREMENT=1 ;
	
CREATE TABLE IF NOT EXISTS `users_information` (
  `userId` int(11) NOT NULL,
  `infoKey` varchar(128) NOT NULL,
  `InfoValue` text NOT NULL,
  KEY `userId` (`userId`)
) ENGINE=INNODB;
