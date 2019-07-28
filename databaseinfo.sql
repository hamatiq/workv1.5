create database inventory;
use inventory;

CREATE TABLE car (
  stock INT(11) NOT NULL,
  vin CHAR(17) unique DEFAULT NULL,
  year INT(11) DEFAULT NULL,
  make CHAR(10) DEFAULT NULL,
  model CHAR(10) DEFAULT NULL,
  milage INT(11) DEFAULT NULL,
  color CHAR(10) DEFAULT NULL,
  cost INT(11) DEFAULT NULL,
  expences INT(11) DEFAULT NULL,
  inspection DATE DEFAULT NULL,
  pictures TINYINT(1) DEFAULT NULL,
  title TINYINT(1) DEFAULT NULL,
  date_added DATETIME DEFAULT NULL,
  PRIMARY KEY (stock)
);

CREATE TABLE job (
  id INT(11) NOT NULL AUTO_INCREMENT,
  stock INT(11) DEFAULT NULL,
  description TEXT DEFAULT NULL,
  part_ordered TINYINT(1) DEFAULT NULL,
  part_cost INT(11) DEFAULT NULL,
  date_added DATE DEFAULT NULL,
  PRIMARY KEY (id)
);
CREATE TABLE job_done (
  id INT(11) NOT NULL AUTO_INCREMENT,
  stock INT(11) DEFAULT NULL,
  description TEXT DEFAULT NULL,
  cost INT(11) DEFAULT NULL,
  date_finished DATE DEFAULT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE soldcar (
  stock INT(11) NOT NULL,
  vin CHAR(17) DEFAULT NULL,
  year INT(11) DEFAULT NULL,
  make CHAR(10) DEFAULT NULL,
  model CHAR(10) DEFAULT NULL,
  milage INT(11) DEFAULT NULL,
  color CHAR(10) DEFAULT NULL,
  cost INT(11) DEFAULT NULL,
  sell_date DATE DEFAULT NULL,
  PRIMARY KEY (stock)
);

show tables;