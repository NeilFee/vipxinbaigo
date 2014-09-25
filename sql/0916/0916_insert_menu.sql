LOCK TABLES `vip_menu` WRITE;
INSERT INTO `vip_menu` (parentid, app, model, action, type, status, name, listorder) VALUES (264, 'Admin', 'Lottery', 'lotteryAll', 1, 1, '积分抽奖',0),(250, 'Admin', 'Region', 'regionAll', 1, 1, '区域管理',0);
UNLOCK TABLES;