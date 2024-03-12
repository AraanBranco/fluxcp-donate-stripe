CREATE TABLE
  `stripe_transaction_logs` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `event_id` varchar(255) NOT NULL,
    `event_reference_id` varchar(255) DEFAULT NULL,
    `object` varchar(100) DEFAULT NULL,
    `amount` int(11) DEFAULT NULL,
    `currency` varchar(3) DEFAULT NULL,
    `status` varchar(10) DEFAULT NULL,
    `error` varchar(100) DEFAULT NULL,
    `error_reason` varchar(100) DEFAULT NULL,
    `json_payload` longtext DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `stripe_transaction_logs_event_index` (`event_id`),
    KEY `stripe_transaction_logs_event_reference_index` (`event_reference_id`)
  ) ENGINE = myisam DEFAULT CHARSET = utf8mb4
