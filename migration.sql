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
  `warranty_why_know_yuwell` varchar(150) DEFAULT NULL,
  `warranty_decision_buy_because` varchar(150) DEFAULT NULL,

  `warranty_service_date` DATE DEFAULT NULL,
  `warranty_service_type` varchar(150) DEFAULT NULL,
  `warranty_problem` varchar(150) DEFAULT NULL,
  `warranty_supply_list_1` varchar(150) DEFAULT NULL,
  `warranty_supply_quantity_1` varchar(150) DEFAULT NULL,
  `warranty_how_to_fix_problem` varchar(150) DEFAULT NULL,
  `warranty_note` varchar(150) DEFAULT NULL,
  `warranty_result_type` varchar(150) DEFAULT NULL,
  `warranty_result_type_not_good` varchar(150) DEFAULT NULL,
  `warranty_customer_sign_name` varchar(150) DEFAULT NULL,
  `warranty_customer_sign_date` DATE DEFAULT NULL,
  `warranty_engineer_sign_name` varchar(150) DEFAULT NULL,
  `warranty_engineer_sign_date` DATE DEFAULT NULL,

  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`warranty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;