DROP TABLE IF EXISTS vip_lottery_wined_applicant;
CREATE TABLE vip_lottery_wined_applicant (
 id INT(11) NOT NULL AUTO_INCREMENT,
 applicant_id INT(11),
 applied_rule_id INT(11),
 FOREIGN KEY (applicant_id) REFERENCES vip_lottery_applicant (id),
 FOREIGN KEY (applied_rule_id) REFERENCES vip_lottery_rule (id),
 PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
