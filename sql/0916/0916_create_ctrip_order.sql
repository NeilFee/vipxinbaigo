DROP TABLE IF EXISTS vip_ctrip_order;
CREATE TABLE vip_ctrip_order (
 id INT(11) NOT NULL AUTO_INCREMENT,
 fullrequest VARCHAR(255),
 ordertype VARCHAR(255),
 ordertype VARCHAR(255),
 price DECIMAL(19,2),
 sex VARCHAR(255),
 surname VARCHAR(255),
 telephone VARCHAR(255),
 vipcode VARCHAR(255),
 vipid VARCHAR(255),
 vipaccountno VARCHAR(255),
 PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;