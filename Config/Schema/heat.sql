DROP TABLE
IF EXISTS `outletpneu_cz`.`heats`;

CREATE TABLE `outletpneu_cz`.`heats` (
	`id` INT (11) NOT NULL AUTO_INCREMENT,
	`x` INT (11) NOT NULL,
	`y` INT (11) NOT NULL,
	`type` VARCHAR (20) NOT NULL,
	`target` VARCHAR (255) DEFAULT NULL,
	`value` VARCHAR (255) DEFAULT NULL,
	`url` VARCHAR (255) NOT NULL,
	`key` VARCHAR (20) DEFAULT NULL,
	PRIMARY KEY (`id`),
	KEY `x` (`x`),
	KEY `y` (`y`),
	KEY `x_y` (`y`, `x`),
	KEY `type` (`type`),
	KEY `url` (`url`),
	KEY `key` (`key`)
);

