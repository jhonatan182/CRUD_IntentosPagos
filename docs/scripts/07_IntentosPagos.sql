CREATE TABLE `intentospagos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NULL DEFAULT NOW(),
  `cliente` VARCHAR(120) NULL,
  `monto` DECIMAL(13,2) NULL,
  `fechaVencimiento` DATE NULL,
  `estado` ENUM('ENV','PGD','CNL','ERR') NULL ,
  PRIMARY KEY (`id`)
  );