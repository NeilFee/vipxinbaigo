DROP TABLE IF EXISTS vip_lottery;
CREATE TABLE vip_lottery (
 id INT(11) NOT NULL AUTO_INCREMENT,
 name VARCHAR(255) NOT NULL,
 starttime date,
 endtime date,
 description VARCHAR(255),
 status boolean,
 createtime date,
 updatetime date,
 PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;