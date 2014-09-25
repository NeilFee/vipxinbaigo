DROP TABLE IF EXISTS vip_lottery_applicant;
CREATE TABLE vip_lottery_applicant (
  id INT(11) NOT NULL AUTO_INCREMENT,
  date DATETIME,
  vip_code VARCHAR(255) NOT NULL,
  real_name VARCHAR(255),
  mobile_phone VARCHAR(255),
  store_id INT(11) NOT NULL,
  lottery_id INT(11) NOT NULL,
  draw_result SMALLINT DEFAULT 0,
  create_time DATETIME,
  update_time DATETIME,
  FOREIGN KEY (store_id) REFERENCES vipdata3.vip_store (id) ON DELETE NO ACTION,
  FOREIGN KEY (lottery_id) REFERENCES vipdata3.vip_lottery (id) ON DELETE NO ACTION,
  FOREIGN KEY (wined_rule_id) REFERENCES vipdata3.vip_lottery_rule (id) ON DELETE NO ACTION,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;