/* SQLEditor (MySQL (2))*/

CREATE TABLE `category`
(
`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
`group` VARCHAR(255),
`name` VARCHAR(255),
PRIMARY KEY (`id`)
);

CREATE TABLE `quality`
(
`id` INTEGER UNIQUE,
`rating` VARCHAR(255),
PRIMARY KEY (`id`)
);

CREATE TABLE `location`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`address` VARCHAR(500),
`website` VARCHAR(255),
PRIMARY KEY (`id`)
);

CREATE TABLE `unit_of_measurement_type`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`type` VARCHAR(50) UNIQUE,
`conversion_ratio` FLOAT,
PRIMARY KEY (`id`)
);

CREATE TABLE `ingredient`
(
`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
`name` VARCHAR(255),
`unit_of_measurement_id` INTEGER,
`initial_amount` INTEGER,
`cost` FLOAT,
`cost_unit_of_measurement` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `ingredient_source`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`ingredient_id` INTEGER NOT NULL,
`location_id` INTEGER NOT NULL,
`cost` FLOAT,
`quality_id` INTEGER,
`comments` VARCHAR(1024),
PRIMARY KEY (`id`)
);

CREATE TABLE `login`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`username` VARCHAR(255),
`password` VARCHAR(255),
`first_name` VARCHAR(255),
`last_name` VARCHAR(255),
`email` VARCHAR(255),
PRIMARY KEY (`id`)
);

CREATE TABLE `menu`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`name` VARCHAR(255),
`description` VARCHAR(1024),
`menu_id` INTEGER NOT NULL,
`recipe_id` INTEGER NOT NULL,
`owner_id` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `meal_type`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`name` VARCHAR(255) UNIQUE,
PRIMARY KEY (`id`)
);

CREATE TABLE `recipe`
(
`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
`name` VARCHAR(255),
`description` VARCHAR(500),
`Instructions` VARCHAR(2048),
`preparation_time` TIME,
`serving_size` INTEGER,
`owner_id` INTEGER,
`meal_type_id` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `recipe_category_assn`
(
`recipe_id` INTEGER NOT NULL,
`category_id` INTEGER NOT NULL
);

CREATE TABLE `menu_recipe_assn`
(
`menu_id` INTEGER NOT NULL,
`recipe_id` INTEGER NOT NULL
);

CREATE TABLE `recipe_ingredient_assn`
(
`recipe_id` INTEGER NOT NULL,
`ingredient_id` INTEGER NOT NULL
);

ALTER TABLE `ingredient` ADD FOREIGN KEY unit_of_measurement_id_idxfk (`unit_of_measurement_id`) REFERENCES `unit_of_measurement_type` (`id`);

ALTER TABLE `ingredient` ADD FOREIGN KEY cost_unit_of_measurement_idxfk (`cost_unit_of_measurement`) REFERENCES `unit_of_measurement_type` (`id`);

ALTER TABLE `ingredient_source` ADD FOREIGN KEY ingredient_id_idxfk (`ingredient_id`) REFERENCES `ingredient` (`id`);

ALTER TABLE `ingredient_source` ADD FOREIGN KEY location_id_idxfk (`location_id`) REFERENCES `location` (`id`);

ALTER TABLE `ingredient_source` ADD FOREIGN KEY quality_id_idxfk (`quality_id`) REFERENCES `quality` (`id`);

CREATE INDEX `username_idx` ON `login`(`username`);
ALTER TABLE `menu` ADD FOREIGN KEY owner_id_idxfk (`owner_id`) REFERENCES `login` (`id`);

ALTER TABLE `recipe` ADD FOREIGN KEY owner_id_idxfk_1 (`owner_id`) REFERENCES `login` (`id`);

ALTER TABLE `recipe` ADD FOREIGN KEY meal_type_id_idxfk (`meal_type_id`) REFERENCES `meal_type` (`id`);

ALTER TABLE `recipe_category_assn` ADD FOREIGN KEY recipe_id_idxfk (`recipe_id`) REFERENCES `recipe` (`id`);

ALTER TABLE `recipe_category_assn` ADD FOREIGN KEY category_id_idxfk (`category_id`) REFERENCES `category` (`id`);

ALTER TABLE `menu_recipe_assn` ADD FOREIGN KEY menu_id_idxfk (`menu_id`) REFERENCES `menu` (`id`);

ALTER TABLE `menu_recipe_assn` ADD FOREIGN KEY recipe_id_idxfk_1 (`recipe_id`) REFERENCES `recipe` (`id`);

ALTER TABLE `recipe_ingredient_assn` ADD FOREIGN KEY recipe_id_idxfk_2 (`recipe_id`) REFERENCES `recipe` (`id`);

ALTER TABLE `recipe_ingredient_assn` ADD FOREIGN KEY ingredient_id_idxfk_1 (`ingredient_id`) REFERENCES `ingredient` (`id`);
