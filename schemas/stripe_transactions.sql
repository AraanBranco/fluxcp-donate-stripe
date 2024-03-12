CREATE TABLE
  `stripe_transactions` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `event_reference_id` varchar(255) DEFAULT NULL,
    `account_id` int(11) unsigned DEFAULT 0,
    `email` varchar(60) DEFAULT NULL,
    `server_name` varchar(255) DEFAULT NULL,
    `credits` int(11) DEFAULT NULL,
    `amount` int(11) DEFAULT NULL,
    `settleAmount` int(11) DEFAULT NULL,
    `settleCurrency` varchar(3) DEFAULT NULL,
    `status` varchar(10) DEFAULT NULL,
    `payment_status` varchar(10) DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `stripe_transactions_event_index` (`event_reference_id`),
    KEY `stripe_transactions_account_index` (`account_id`)
  ) ENGINE = myisam DEFAULT CHARSET = utf8mb4
