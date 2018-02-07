CREATE TABLE `user` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(15) NOT NULL,
    `last_name` VARCHAR(15) NOT NULL,
    `birth_name` DATE NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `address` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `zip` INT(6),
    `city` VARCHAR(50),
    `street` VARCHAR(50),
    `house` VARCHAR(6),
    PRIMARY KEY (`id`)
);

CREATE TABLE `user_address` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `address_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
    FOREIGN KEY (`address_id`) REFERENCES `address` (`id`)
);

SELECT `u`.*, `a`.* FROM `user` `u`
JOIN `user_address` `ua` ON (`ua`.`user_id` = `u`.`id`)
JOIN `address` `a` ON (`ua`.`address_id` = `a`.`id`)
WHERE TIMESTAMPDIFF(YEAR,`u`.`birth_name`,CURDATE()) = 22;