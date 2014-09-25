DROP TABLE IF EXISTS vip_lottery_rule;
CREATE TABLE vip_lottery_rule (
 id INT(11) NOT NULL AUTO_INCREMENT,
 date DATE,
 scope_type SMALLINT NOT NULL,
 store_id INT(8),
 region_id INT(11),
 city_id INT(11),
 lottery_id INT(11),
 count SMALLINT,
 draw_status SMALLINT DEFAULT 0,
 createtime DATE ,
 updatetime DATE ,
 PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
