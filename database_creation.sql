CREATE DATABASE it_asset_managment;

USE it_asset_managment;

CREATE TABLE `betriebssystem` (
	`id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Evtl. einfach hochzählen beim Anlegen',
	`hersteller` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`name` VARCHAR(100) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`version` VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `logs` (
	`id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Evtl. einfach hochzählen beim Anlegen  ',
	`datum` DATETIME NOT NULL COMMENT 'Datum der Aktion',
	`benutzer` CHAR(7) NOT NULL COMMENT 'Admin, Mitarbeiter oder Student welcher die Aktion ausgeführt hat' COLLATE 'utf8mb4_general_ci',
	`aktion` INT(8) NOT NULL COMMENT 'Was für Aktionen gibt es alles??',
	`beschreibung` VARCHAR(200) NOT NULL COMMENT 'Beschreibt den Vorgang ' COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1257
;


CREATE TABLE `personen` (
	`fh_kuerzel` CHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`vorname` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nachname` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`rolle` TINYINT(2) NOT NULL DEFAULT '3' COMMENT '0=Administrator, 1=Mitarbeiter oder 2=Studierende,  ',
	`passwort` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`benachrichtigung` INT(11) NOT NULL DEFAULT '30',
	`benachrichtigung_ip` TINYINT(4) NOT NULL DEFAULT '5',
	PRIMARY KEY (`fh_kuerzel`) USING BTREE,
	UNIQUE INDEX `fh_kuerzel` (`fh_kuerzel`) USING BTREE,
	FULLTEXT INDEX `fh_kuerzel_2` (`fh_kuerzel`),
	CONSTRAINT `CONSTRAINT_1` CHECK (`rolle` > 0 and `rolle` < 4),
	CONSTRAINT `CONSTRAINT_2` CHECK (`benachrichtigung` >= 0 and `benachrichtigung` <= 60),
	CONSTRAINT `CONSTRAINT_3` CHECK (`benachrichtigung_ip` >= 0 and `benachrichtigung_ip` <= 60)
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `raum` (
	`raumnummer` VARCHAR(5) NOT NULL DEFAULT 'Lager' COLLATE 'utf8mb4_general_ci',
	`ip-adressbereich_beginn` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`ip-adressbereich_ende` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`anzahl_ws` INT(11) NOT NULL DEFAULT '0' COMMENT 'Was ist mit Büros, Räumen mit Geräten aber ohne Laborrechner. Möglich aus Anzahl von PCs im raum zu berechnen',
	`belegte_ws` INT(11) NOT NULL DEFAULT '0',
	`belegung_ip` INT(11) NOT NULL DEFAULT '0' COMMENT 'Errechnet sich durch Anzahl der Geräte deren IP zwischen IP-Adressbereich_anfang und IP-Adressbereich_ende liegen, aber wie? String vergleichen...',
	`anzahl_ip` INT(11) NOT NULL DEFAULT '0',
	`gebaude` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`raumnummer`) USING BTREE,
	CONSTRAINT `CONSTRAINT_1` CHECK (`belegung_ip` <= `anzahl_ip` and `belegte_ws` <= `anzahl_ws`),
	CONSTRAINT `CONSTRAINT_2` CHECK (`anzahl_ip` >= 0 and `belegung_ip` >= 0 and `anzahl_ws` >= 0 and `belegte_ws` >= 0)
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `softwarelizenzen` (
	`id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Evtl. einfach hochzählen beim Anlegen',
	`name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`hersteller` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`version` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`anzahl_gerate` INT(11) NOT NULL COMMENT 'GIbt an die Maximalen Installationen der Software',
	`erwerbsdatum` DATE NOT NULL,
	`ablaufdatum` DATE NOT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=49
;

CREATE TABLE `geraet` (
	`id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Evtl. einfach hochzählen beim Anlegen',
	`name` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`typ` TINYINT(3) NOT NULL DEFAULT '0' COMMENT 'Auswahl aus Liste (1 = Computer, 2 = Laptop, 3 = Monitor, 4 = Tastatur, 5 = Maus, 6 = Praktikum Utensilien, 7 = Accessoires)',
	`hersteller` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`age` DATE NULL DEFAULT `betrieb` COMMENT 'Optional, wenn kein Wert dann = Betrieb',
	`betrieb` DATE NOT NULL,
	`ausleihbar` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0 = nein, 1 = ja',
	`personen_id` VARCHAR(7) NULL DEFAULT NULL COMMENT 'Referenz auf Person, bei Ausgeliehen oder Mitarbeiter zugeordnet ausgefüllt' COLLATE 'utf8mb4_general_ci',
	`raumnummer` VARCHAR(5) NULL DEFAULT NULL COMMENT 'Referenz auf raum' COLLATE 'utf8mb4_general_ci',
	`ip_adresse` VARCHAR(16) NULL DEFAULT NULL COMMENT 'Optional' COLLATE 'utf8mb4_general_ci',
	`technische_eckdaten` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Optional' COLLATE 'utf8mb4_general_ci',
	`kommentar` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Optional' COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `name` (`name`) USING BTREE,
	INDEX `raumnummer` (`raumnummer`) USING BTREE,
	INDEX `aenderungen` (`personen_id`) USING BTREE,
	FULLTEXT INDEX `name_2` (`name`),
	FULLTEXT INDEX `hersteller` (`hersteller`),
	FULLTEXT INDEX `technische_eckdaten` (`technische_eckdaten`),
	FULLTEXT INDEX `kommentar` (`kommentar`),
	CONSTRAINT `FK_geraet_raum` FOREIGN KEY (`raumnummer`) REFERENCES `raum` (`raumnummer`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1442
;

CREATE TABLE `geraet_hat_betriebssystem` (
	`geraetid` INT(11) NOT NULL COMMENT 'Referenz auf Geräte',
	`betriebssystemid` INT(11) NOT NULL COMMENT 'Referenz auf Betriebssystem ',
	PRIMARY KEY (`geraetid`, `betriebssystemid`) USING BTREE,
	INDEX `aenderung_bs` (`betriebssystemid`) USING BTREE,
	CONSTRAINT `aenderung_bs` FOREIGN KEY (`betriebssystemid`) REFERENCES `betriebssystem` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT `aenderung_geraet2` FOREIGN KEY (`geraetid`) REFERENCES `geraet` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT `geraet_hat_betriebssystem_ibfk_1` FOREIGN KEY (`geraetid`) REFERENCES `geraet` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT `geraet_hat_betriebssystem_ibfk_2` FOREIGN KEY (`betriebssystemid`) REFERENCES `betriebssystem` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `geraet_hat_software` (
	`geraetid` INT(11) NOT NULL COMMENT 'Referenz auf Geräte',
	`softwarelizenzid` INT(11) NOT NULL COMMENT 'Referenz auf Software',
	PRIMARY KEY (`geraetid`, `softwarelizenzid`) USING BTREE,
	INDEX `aenderung_sw` (`softwarelizenzid`) USING BTREE,
	CONSTRAINT `FK_geraet_hat_software_softwarelizenzen` FOREIGN KEY (`softwarelizenzid`) REFERENCES `softwarelizenzen` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `aenderung_geraet` FOREIGN KEY (`geraetid`) REFERENCES `geraet` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT `aenderung_sw` FOREIGN KEY (`softwarelizenzid`) REFERENCES `softwarelizenzen` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

/*
CREATE DEFINER=`it_asset_managment`@`%` PROCEDURE `anzahl_geraete_sw`(
	IN `id` INT,
	OUT `anzahl` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT ''
BEGIN
    SELECT Count(*) into anzahl from geraet_hat_software where softwarelizenzid = id;
END

select `gb`.`geraetid` AS `geraetid`,concat_ws('',trim(concat_ws(' ',`b`.`name`,ifnull(`b`.`version`,''))),'') AS `name` from (`geraet_hat_betriebssystem` `gb` left join `betriebssystem` `b` on(`gb`.`betriebssystemid` = `b`.`id`))

select `gs`.`geraetid` AS `geraetid`,concat_ws('',trim(concat_ws(' ',`s`.`name`,ifnull(`s`.`version`,''))),'') AS `name` from (`geraet_hat_software` `gs` left join `softwarelizenzen` `s` on(`gs`.`softwarelizenzid` = `s`.`id`))
*/