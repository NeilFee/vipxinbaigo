DROP TABLE IF EXISTS vip_region;
CREATE TABLE vip_region (
 id int(11) NOT NULL AUTO_INCREMENT,
 name varchar(255) NOT NULL,
 createtime date,
 updatetime date,
 PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;