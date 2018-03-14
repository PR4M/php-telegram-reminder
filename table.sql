CREATE TABLE `reminders` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`body` VARCHAR(255) NOT NULL,
	`frequency` VARCHAR(255) NOT NULL,
	`day` INT(11) NULL DEFAULT NULL,
	`date` INT(11) NULL DEFAULT NULL,
	`time` VARCHAR(255) NOT NULL,
	`expression` VARCHAR(255) NOT NULL,
	`run_once` TINYINT(1) NOT NULL DEFAULT '0',
	`created_at` DATETIME NULL,
	`updated_at` DATETIME NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=7
;