DROP TABLE IF EXISTS `tb_warranty`;

CREATE TABLE `tb_warranty` (
  `warranty_id` int(11) NOT NULL AUTO_INCREMENT,
  `warranty_serial_number` varchar(150) DEFAULT NULL,
  `warranty_name` VARCHAR(150) DEFAULT NULL,
  `warranty_surname` VARCHAR(150) DEFAULT NULL,
  `warranty_address` VARCHAR(400) DEFAULT NULL,
  `warranty_telephone` varchar(150) DEFAULT NULL,
  `warranty_email` varchar(150) DEFAULT NULL,
  `warranty_product_name` varchar(150) DEFAULT NULL,
  `warranty_type_name` varchar(150) DEFAULT NULL,
  `warranty_lot` varchar(150) DEFAULT NULL,
  `warranty_shop_name` varchar(150) DEFAULT NULL,
  `warranty_buy_date` DATE DEFAULT NULL,
  `warranty_bill_reciept_image` varchar(150) DEFAULT NULL,
  `warranty_why_know_yuwell` varchar(300) DEFAULT NULL,
  `warranty_decision_buy_because` varchar(300) DEFAULT NULL,
  `warranty_created_at` datetime DEFAULT NULL,
  `warranty_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`warranty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_service_report`;

CREATE TABLE `tb_service_report` (
  `service_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_report_repair_code` VARCHAR(150) DEFAULT NULL,
  `service_report_serial_number` varchar(150) DEFAULT NULL,
  `service_report_name` VARCHAR(150) DEFAULT NULL,
  `service_report_surname` VARCHAR(150) DEFAULT NULL,
  `service_report_telephone` VARCHAR(150) DEFAULT NULL,
  `service_report_address` VARCHAR(400) DEFAULT NULL,

  `service_report_email` VARCHAR(150) DEFAULT NULL,
  `service_report_shop_name` VARCHAR(150) DEFAULT NULL,
  `service_report_buy_date` DATE DEFAULT NULL,
  `service_report_product_name` VARCHAR(150) DEFAULT NULL,
  `service_report_type_name` VARCHAR(150) DEFAULT NULL,
  `service_report_lot` VARCHAR(150) DEFAULT NULL,

  `service_report_service_date` DATE DEFAULT NULL,
  `service_report_problem` varchar(150) DEFAULT NULL,
  `service_report_repair_status_id` int(11) DEFAULT NULL,

  `service_report_close_date` DATE DEFAULT NULL,
  `service_report_return_date` DATE DEFAULT NULL,
  `service_report_how_to_fix_problem` varchar(300) DEFAULT NULL,
  `service_report_replacement_parts` varchar(300) DEFAULT NULL,
  `service_report_expense` varchar(150) DEFAULT NULL,
  `service_report_note` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`service_report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_serial_number`;

CREATE TABLE `tb_serial_number` (
  `serial_number_id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_number_no` varchar(150) DEFAULT NULL,
  `serial_number_product_name` varchar(150) DEFAULT NULL,
  `serial_number_type_name` varchar(150) DEFAULT NULL,
  `serial_number_lot` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`serial_number_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_serial_number`
(
  `serial_number_id`,
  `serial_number_no`,
  `serial_number_product_name`,
  `serial_number_type_name`,
  `serial_number_lot`
) VALUES (
  1,
  'SN01',
  'โต๊ะ การแพทย์ ขนาด A',
  'เครื่องมือการแพทย์',
  'ABCD'
);

INSERT INTO `tb_serial_number`
(
  `serial_number_id`,
  `serial_number_no`,
  `serial_number_product_name`,
  `serial_number_type_name`,
  `serial_number_lot`
) VALUES (
  2,
  'SN02',
  'โต๊ะ การแพทย์ ขนาด B',
  'เครื่องมือการแพทย์',
  'ABC'
);

INSERT INTO `tb_serial_number`
(
  `serial_number_id`,
  `serial_number_no`,
  `serial_number_product_name`,
  `serial_number_type_name`,
  `serial_number_lot`
) VALUES (
  3,
  'SN03',
  'โต๊ะ การแพทย์ ขนาด C',
  'เครื่องมือการแพทย์',
  'AB'
);

INSERT INTO `tb_serial_number`
(
  `serial_number_id`,
  `serial_number_no`,
  `serial_number_product_name`,
  `serial_number_type_name`,
  `serial_number_lot`
) VALUES (
  4,
  'SN04',
  'เก้าอี้ การแพทย์ ขนาด A',
  'เครื่องมือการแพทย์',
  'UUUU'
);

INSERT INTO `tb_serial_number`
(
  `serial_number_id`,
  `serial_number_no`,
  `serial_number_product_name`,
  `serial_number_type_name`,
  `serial_number_lot`
) VALUES (
  5,
  'SN05',
  'เก้าอี้ การแพทย์ ขนาด B',
  'เครื่องมือการแพทย์',
  'HHHH'
);

INSERT INTO `tb_serial_number`
(
  `serial_number_id`,
  `serial_number_no`,
  `serial_number_product_name`,
  `serial_number_type_name`,
  `serial_number_lot`
) VALUES (
  6,
  'SN06',
  'เก้าอี้ การแพทย์ ขนาด C',
  'เครื่องมือการแพทย์',
  'XXXX'
);

INSERT INTO `tb_serial_number`
(
  `serial_number_id`,
  `serial_number_no`,
  `serial_number_product_name`,
  `serial_number_type_name`,
  `serial_number_lot`
) VALUES (
  7,
  'SN07',
  'เครื่องช่วยหายใจ การแพทย์ ขนาด A',
  'เครื่องมือการแพทย์',
  'DEFG'
);

INSERT INTO `tb_serial_number`
(
  `serial_number_id`,
  `serial_number_no`,
  `serial_number_product_name`,
  `serial_number_type_name`,
  `serial_number_lot`
) VALUES (
  8,
  'SN08',
  'เครื่องช่วยหายใจ การแพทย์ ขนาด B',
  'เครื่องมือการแพทย์',
  'FFFF'
);

INSERT INTO `tb_serial_number`
(
  `serial_number_id`,
  `serial_number_no`,
  `serial_number_product_name`,
  `serial_number_type_name`,
  `serial_number_lot`
) VALUES (
  9,
  'SN09',
  'เครื่องช่วยหายใจ การแพทย์ ขนาด C',
  'เครื่องมือการแพทย์',
  'TTTT'
);

INSERT INTO `tb_serial_number`
(
  `serial_number_id`,
  `serial_number_no`,
  `serial_number_product_name`,
  `serial_number_type_name`,
  `serial_number_lot`
) VALUES (
  10,
  'SN10',
  'โต๊ะยา การแพทย์ ขนาด XXX',
  'เครื่องมือการแพทย์',
  'UIUI'
);






DROP TABLE IF EXISTS `tb_repair_status`;

CREATE TABLE `tb_repair_status` (
  `repair_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `repair_status_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`repair_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_repair_status`
(
  `repair_status_id`,
  `repair_status_name`
) VALUES (
  1,
  'รอรับเครื่องจากคลังสินค้า'
);

INSERT INTO `tb_repair_status`
(
  `repair_status_id`,
  `repair_status_name`
) VALUES (
  2,
  'ตรวจสอบอาการเสีย'
);

INSERT INTO `tb_repair_status`
(
  `repair_status_id`,
  `repair_status_name`
) VALUES (
  3,
  'ดำเนินการเสนอราคาอะไหล่'
);

INSERT INTO `tb_repair_status`
(
  `repair_status_id`,
  `repair_status_name`
) VALUES (
  4,
  'รอชำระเงิน'
);

INSERT INTO `tb_repair_status`
(
  `repair_status_id`,
  `repair_status_name`
) VALUES (
  5,
  'ดำเนินการเปลี่ยนอะไหล่'
);

INSERT INTO `tb_repair_status`
(
  `repair_status_id`,
  `repair_status_name`
) VALUES (
  6,
  'ส่งคืนเครื่องคลังสินค้า'
);

INSERT INTO `tb_repair_status`
(
  `repair_status_id`,
  `repair_status_name`
) VALUES (
  7,
  'ปิดงาน'
);

DROP TABLE IF EXISTS `tb_service_report_image`;

CREATE TABLE `tb_service_report_image` (
  `service_report_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_report_id` int(11) NOT NULL,
  `service_report_image_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`service_report_image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ALTER TABLE tb_service_report
-- ADD service_report_repair_code VARCHAR(150) DEFAULT NULL AFTER service_report_id; 

-- ALTER TABLE tb_service_report
-- ADD service_report_repair_status_id int(11) DEFAULT NULL AFTER service_report_engineer_sign_date; 

-- ALTER TABLE tb_warranty
-- ADD warranty_created_at datetime DEFAULT NULL AFTER warranty_decision_buy_because; 
-- ALTER TABLE tb_warranty
-- ADD warranty_updated_at datetime DEFAULT NULL AFTER warranty_created_at; 
-- ALTER TABLE tb_warranty
-- ADD warranty_bill_reciept_image VARCHAR(150) DEFAULT NULL AFTER warranty_buy_date; 

-- ALTER TABLE tb_service_report DROP COLUMN service_report_service_type;
-- ALTER TABLE tb_service_report DROP COLUMN service_report_list_1;
-- ALTER TABLE tb_service_report DROP COLUMN service_report_quantity_1;
-- ALTER TABLE tb_service_report DROP COLUMN service_report_how_to_fix_problem;
-- ALTER TABLE tb_service_report DROP COLUMN service_report_note;
-- ALTER TABLE tb_service_report DROP COLUMN service_report_result_type;
-- ALTER TABLE tb_service_report DROP COLUMN service_report_result_type_not_good;
-- ALTER TABLE tb_service_report DROP COLUMN service_report_customer_sign_name;
-- ALTER TABLE tb_service_report DROP COLUMN service_report_customer_sign_date;
-- ALTER TABLE tb_service_report DROP COLUMN service_report_engineer_sign_name;
-- ALTER TABLE tb_service_report DROP COLUMN service_report_engineer_sign_date;

-- ALTER TABLE tb_service_report ADD service_report_email VARCHAR(150) DEFAULT NULL AFTER service_report_address; 
-- ALTER TABLE tb_service_report ADD service_report_shop_name VARCHAR(150) DEFAULT NULL AFTER service_report_email; 
-- ALTER TABLE tb_service_report ADD service_report_buy_date DATE DEFAULT NULL AFTER service_report_shop_name; 
-- ALTER TABLE tb_service_report ADD service_report_product_name VARCHAR(150) DEFAULT NULL AFTER service_report_buy_date; 
-- ALTER TABLE tb_service_report ADD service_report_type_name VARCHAR(150) DEFAULT NULL AFTER service_report_product_name; 
-- ALTER TABLE tb_service_report ADD service_report_lot VARCHAR(150) DEFAULT NULL AFTER service_report_type_name; 

-- ALTER TABLE tb_service_report ADD service_report_close_date DATE DEFAULT NULL AFTER service_report_repair_status_id; 
-- ALTER TABLE tb_service_report ADD service_report_return_date DATE DEFAULT NULL AFTER service_report_close_date; 
-- ALTER TABLE tb_service_report ADD service_report_how_to_fix_problem varchar(300) DEFAULT NULL AFTER service_report_problem; 
-- ALTER TABLE tb_service_report ADD service_report_replacement_parts varchar(300) DEFAULT NULL AFTER service_report_how_to_fix_problem; 
-- ALTER TABLE tb_service_report ADD service_report_expense varchar(150) DEFAULT NULL AFTER service_report_replacement_parts; 
-- ALTER TABLE tb_service_report ADD service_report_note varchar(300) DEFAULT NULL AFTER service_report_expense; 

