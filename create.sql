CREATE TABLE `books` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(100) NOT NULL,
	`autor` VARCHAR(100) NOT NULL,
	`year` INT NOT NULL,
	`genre` INT NOT NULL,
	`count` INT NOT NULL,
	`closet` INT NOT NULL,
	`shelf` INT NOT NULL,
	`user` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `genres` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`login` VARCHAR(50) NOT NULL UNIQUE,
	`pass` VARCHAR(50) NOT NULL,
	`name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `books` ADD CONSTRAINT `books_fk0` FOREIGN KEY (`genre`) REFERENCES `genres`(`id`);

ALTER TABLE `books` ADD CONSTRAINT `books_fk1` FOREIGN KEY (`user`) REFERENCES `users`(`id`);