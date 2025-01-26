CREATE TABLE IF NOT EXISTS `products` (
    `product_id` int(11) NOT NULL AUTO_INCREMENT,
    `product_name` varchar(100) NOT NULL,
    `product_description` varchar(225) NOT NULL,
    `product_image` varchar(225) NOT NULL,
    `product_image2` varchar(225) NOT NULL,
    `product_image3` varchar(225) NOT NULL,
    `product_image4` varchar(225) NOT NULL,
    `product_price` decimal(6,2) NOT NULL,
    `product_special_offer` integer(2) NOT NULL,
    `product_color` varchar(100) NOT NULL,
    `product_size` varchar(2) NOT NULL,
    PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `orders` (
    `order_id` int(11) NOT NULL AUTO_INCREMENT,
    `order-cost` decimal(6,2) NOT NULL,
    `order-status` varchar(100) NOT NULL DEFAULT 'on_hold',
    `user-id` int(11) NOT NULL,
    `user_phone` int(11) NOT NULL,
    `user_city` varchar(225) NOT NULL,
    `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`order_id`)
)  ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `order_items` (
    `item_id` int(11)  NOT NULL AUTO_INCREMENT,
    `order_id` int(12) NOT NULL,
    `product_id` varchar(225) NOT NULL,
    `product_name` varchar(225) NOT NULL,
    `product_image` varchar(225) NOT NULL,
    `user_id` int(11) NOT NULL,
    `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_name` varchar(100) NOT NULL,
    `user_email` varchar(100) NOT NULL,
    PRIMARY KEY (`user_id`),
    UNIQUE KEY `UX_Constraint` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE IF NOT EXISTS `products` (
    `product_id` int(11) NOT NULL AUTO_INCREMENT,
    `product_name` varchar(100) NOT NULL,
    `product_description` varchar(225) NOT NULL,
    `product_image` varchar(225) NOT NULL,
    `product_image2` varchar(225) NOT NULL,
    `product_image3` varchar(225) NOT NULL,
    `product_image4` varchar(225) NOT NULL,
    `product_price` decimal(6,2) NOT NULL,
    `product_special_offer` interger(2) NOT NULL,
    `product_color` varchar(100) NOT NULL,
    `product_size` varchar(2) NOT NULL,
    PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `orders` (
    `order_id` int(11) NOT NULL AUTO_INCREMENT,
    `order-cost` decimal(6,2) NOT NULL,
    `order-status` varchar(100) NOT NULL DEFAULT `on_hold`,
    `user-id` int(11) NOT NULL,
    `user_phone`, int(11) NOT NULL,
    `user_city`, varchar(225) NOT NULL,
    `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`order_id`)
)  ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `order_items` (
    `item_id` int(11)  NOT NULL AUTO_INCREMENT,
    `order_id` int(11) NOT NULL,
    `product_id` varchar(225) NOT NULL,
    `product_name` varchar(225) NOT NULL,
    `product_image` varchar(225) NOT NULL,
    `user_id` int(11) NOT NULL,
    `order_id` int(11) NOT NULL,
    `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_name` varchar(100) NOT NULL,
    `user_email` varchar(100) NOT NULL,
    PRIMARY KEY (`user_id`),
    UNIQUE KEY `UX_Constraint (`user_email`)`
) ENGINE=InnoDB DEFAULT CHARSET=latin1;