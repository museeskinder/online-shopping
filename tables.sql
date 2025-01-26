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


/* Adding products on table */
INSERT INTO `products` (
    `product_name`, 
    `product_category`,
    `product_description`,
    `product_image`,
    `product_image2`,
    `product_image3`,
    `product_image4`,
    `product_price`,
    `product_special_offer`,
    `product_color`,
    `product_size`
) VALUES (
    'bono men hoodie',
    'hoodies',
    'grey men hoodie style',
    'bono.webp',
    'grey-hoodie-2.webp',
    'grey-hoodie-3.webp',
    'grey-hoodie-4.webp',
    58.90,
    0,
    'grey',
    'L'
);

/* oversized tee black*/
INSERT INTO `products` (
    `product_name`, 
    `product_category`,
    `product_description`,
    `product_image`,
    `product_image2`,
    `product_image3`,
    `product_image4`,
    `product_price`,
    `product_special_offer`,
    `product_color`,
    `product_size`
) VALUES (
    'oversized tee black',
    'T-shirt',
    'black oversized thirt for men',
    'oversized-tee-black.webp',
    'oversized-tee-black-2.webp',
    'oversized-tee-black-3.webp',
    'oversized-tee-black-4.webp',
    40.43,
    20,
    'black',
    'L, XL, S, XS'
);

/* oversized tee pearl pink */
INSERT INTO `products` (
    `product_name`, 
    `product_category`,
    `product_description`,
    `product_image`,
    `product_image2`,
    `product_image3`,
    `product_image4`,
    `product_price`,
    `product_special_offer`,
    `product_color`,
    `product_size`
) VALUES (
    'oversized tee pearl pink',
    'T-shirt',
    'pink oversized thirt for men',
    'oversized-tee-pearl-pink.webp',
    'oversized-tee-pearl-pink-2.webp',
    'oversized-tee-pearl-pink-3.webp',
    'oversized-tee-pearl-pink-4.webp',
    45.57,
    0,
    'pink',
    'L, S, XS, M'
);

/* pure beige cotton */
    INSERT INTO `products` (
        `product_name`, 
        `product_category`,
        `product_description`,
        `product_image`,
        `product_image2`,
        `product_image3`,
        `product_image4`,
        `product_price`,
        `product_special_offer`,
        `product_color`,
        `product_size`
    ) VALUES (
        'pure cotton beige',
        'T-shirt',
        'beige cotton tshirt for men',
        'pure-cotton-biege.webp',
        'pure-biege-cotton-2.webp',
        'pure-biege-cotton-3.webp',
        'pure-biege-cotton-4.webp',
        44.00,
        0,
        'biege',
        'L, XL, M'
    );

