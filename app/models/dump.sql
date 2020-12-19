


-- user table for the shared post model
CREATE TABLE `user` (   id  MEDIUMINT NOT NULL AUTO_INCREMENT,  `name` varchar(255) DEFAULT NULL,`email` varchar(255) DEFAULT NULL, `password` varchar(255) DEFAULT NULL,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,  PRIMARY KEY (id) );


-- used to dump data on test table created for test

--

INSERT INTO `post` (`ID`, `title`) VALUES
( NULL, 'Demo'), (NULL , 'review'),;


