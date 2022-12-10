CREATE TABLE `personen` (
                            `vorname` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
                            `nachname` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
                            `fh_kuerzel` CHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
                            `rolle` INT(11) NOT NULL,
                            `passwort` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
                            UNIQUE INDEX `fh_kuerzel` (`fh_kuerzel`) USING BTREE
)
    COLLATE='utf8mb4_general_ci'
    ENGINE=InnoDB
;

CREATE TABLE `geraet` (
                          `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Evtl. einfach hochzählen beim Anlegen',
                          `name` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
                          `Typ` VARCHAR(30) NOT NULL COMMENT 'Auswahl aus Liste (Monitor, Maus, Tastatur, Kabel, PC, Praktikumsmaterial…)' COLLATE 'utf8mb4_general_ci',
                          `hersteller` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
                          `age` DATE NULL DEFAULT betrieb COMMENT 'Optional, wenn kein Wert dann = Betrieb',
                          `betrieb` DATE NOT NULL,
                          `ausleihbar` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0 = nein, 1 = ja',
                          `personen_id` VARCHAR(7) NULL DEFAULT NULL COMMENT 'Referenz auf Person, bei Ausgeliehen oder Mitarbeiter zugeordnet ausgefüllt' COLLATE 'utf8mb4_general_ci',
                          `raumnummer` VARCHAR(4) NULL DEFAULT NULL COMMENT 'Referenz auf raum',
                          `ip-adresse` VARCHAR(16) NULL DEFAULT '127.0.0.1' COMMENT 'Optional' COLLATE 'utf8mb4_general_ci',
                          `technische_eckdaten` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Optional' COLLATE 'utf8mb4_general_ci',
                          `kommentar` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Optional' COLLATE 'utf8mb4_general_ci',
                          PRIMARY KEY (`id`) USING BTREE,
                          UNIQUE INDEX `name` (`name`) USING BTREE,
                          INDEX (raumnummer) USING BTREE,
                          FOREIGN KEY (raumnummer)   REFERENCES raum(raumnummer) ,
                          FOREIGN KEY (personen_id) REFERENCES personen(fh_kuerzel)
)
    COLLATE='utf8mb4_general_ci'
    ENGINE=InnoDB
;

CREATE TABLE `raum` (
                        `raumnummer` CHAR(4) NOT NULL,
                        `ip-adressbereich_beginn` VARCHAR(50) NOT NULL DEFAULT '127.0.0.1',
                        `ip-adressbereich_ende` VARCHAR(50) NOT NULL DEFAULT '127.0.0.1',
                        `anzahl_ws` INT NOT NULL COMMENT 'Was ist mit Büros, Räumen mit Geräten aber ohne Laborrechner. Möglich aus Anzahl von PCs im raum zu berechnen',
                        `belegte_ws` INT NOT NULL DEFAULT '0',
                    PRIMARY KEY (raumnummer)
)
    COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `betriebssystem` (
                                  `id` INT NOT NULL COMMENT 'Evtl. einfach hochzählen beim Anlegen',
                                  `hersteller` VARCHAR(50) NOT NULL DEFAULT '',
                                  `name` VARCHAR(100) NOT NULL DEFAULT '',
                                  `version` VARCHAR(20) NOT NULL DEFAULT '',
                                  PRIMARY KEY (`id`)
)
    COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `softwarelizenzen` (
                                    `id` INT(11) NOT NULL COMMENT 'Evtl. einfach hochzählen beim Anlegen',
                                    `hersteller` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
                                    `name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
                                    `version` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
                                    `anzahl_gerate` INT(11) NOT NULL COMMENT 'Berechnet aus Anzahl Geräte auf denen SW installiert ist',
                                    PRIMARY KEY (`id`) USING BTREE
)
    COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `ausleihanfragen` (
                                   `id` INT NOT NULL COMMENT 'Evtl. einfach hochzählen beim Anlegen',
                                   `student` CHAR(7) NOT NULL COMMENT 'Student, der Anfrage schickt',
                                   `mitarbeiter` CHAR(7) NULL COMMENT 'Mitarbeiter, der Anfrage bearbeitet hat',
                                   `art` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0 = Ausleihe, 1 = Rückgabe',
                                   `geraet` INT NOT NULL,
                                   `status` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0 = Angefragt, 1 = Angenommen (2 = Abgelehnt ?)',
                                   PRIMARY KEY (`id`)
)
    COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `geraet_hat_betriebssystem` (
                                             `geraetid` INT NOT NULL COMMENT 'Referenz auf Geräte',
                                             `betriebssystemid` INT NOT NULL COMMENT 'Referenz auf Betriebssystem ',
                                             FOREIGN KEY (geraetid) REFERENCES geraet(id),
                                             FOREIGN KEY (betriebssystemid) REFERENCES betriebssystem(id)
)
    COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `geraet_hat_software` (
                                       `geraetid` INT NOT NULL COMMENT 'Referenz auf Geräte',
                                       `softwarelizenzid` INT NOT NULL COMMENT 'Referenz auf Software',
                                       FOREIGN KEY (geraetid) REFERENCES geraet(id),
                                       FOREIGN KEY (softwarelizenzid) REFERENCES softwarelizenzen(id)
)
    COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `logs` (
                        `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Evtl. einfach hochzählen beim Anlegen  ',
                        `datum` DATETIME NOT NULL COMMENT 'Datum der Aktion',
                        `benutzer` CHAR(7) NOT NULL COMMENT 'Admin, Mitarbeiter oder Student welcher die Aktion ausgeführt hat' COLLATE 'utf8mb4_general_ci',
                        `aktion` INT(8) NOT NULL COMMENT 'Was für Aktionen gibt es alles??',
                        `beschreibung` VARCHAR(200) NOT NULL COMMENT 'Beschreibt den Vorgang ' COLLATE 'utf8mb4_general_ci',
                        `geraetid` INT(11) NULL DEFAULT NULL COMMENT 'Optional, Referenz auf Gerät',
                        `raumnummer` CHAR(4) NULL DEFAULT NULL COMMENT 'Optional Referenz auf raum',
                        PRIMARY KEY (`id`) USING BTREE
)
    COLLATE='utf8mb4_general_ci'
;

DROP TABLE `personen`;
DROP TABLE `geraet`;
DROP TABLE `raum`;
DROP TABLE `betriebssystem`;
DROP TABLE `softwarelizenzen`;
DROP TABLE `ausleihanfragen`;
DROP TABLE `geraet_hat_betriebssystem`;
DROP TABLE `geraet_hat_software`;
DROP TABLE `logs`;
