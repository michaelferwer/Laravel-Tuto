CREATE TABLE User
(id INTEGER     NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
 email            VARCHAR(255) NOT NULL,
 password         VARCHAR(255)) NOT NULL;