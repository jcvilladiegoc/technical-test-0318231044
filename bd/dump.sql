-- Script to init BD

-- `docker-db`.company definition

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO company (id, name) VALUES(1, 'Company 1');
INSERT INTO company (id, name) VALUES(2, 'Company 2');
INSERT INTO company (id, name) VALUES(3, 'Company 3');
