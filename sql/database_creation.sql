CREATE TABLE `Personen` (
	`Vorname` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Nachname` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`FH-Kürzel` CHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`Rolle` INT(11) NOT NULL,
	`Passwort` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	UNIQUE INDEX `FH-Kürzel` (`FH-Kürzel`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `Geraet` (
	`ID` INT(11) NOT NULL COMMENT 'Evtl. einfach hochzählen beim Anlegen',
	`Name` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Typ` VARCHAR(30) NOT NULL COMMENT 'Auswahl aus Liste (Monitor, Maus, Tastatur, Kabel, PC, Praktikumsmaterial…)' COLLATE 'utf8mb4_general_ci',
	`Hersteller` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Alter` DATE NULL DEFAULT NULL COMMENT 'Optional, wenn kein Wert dann = Betrieb',
	`Betrieb` DATE NOT NULL,
	`Ausleihbar` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0 = nein, 1 = ja',
	`Personen_ID` VARCHAR(7) NULL DEFAULT NULL COMMENT 'Referenz auf Person, bei Ausgeliehen oder Mitarbeiter zugeordnet ausgefüllt' COLLATE 'utf8mb4_general_ci',
	`Raum_ID` INT(11) NULL DEFAULT NULL COMMENT 'Referenz auf Raum',
	`IP-Adresse` VARCHAR(16) NULL DEFAULT '127.0.0.1' COMMENT 'Optional' COLLATE 'utf8mb4_general_ci',
	`Column 11` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Optional' COLLATE 'utf8mb4_general_ci',
	`Column 12` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Optional' COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`ID`) USING BTREE,
	UNIQUE INDEX `Name` (`Name`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `Raum` (
	`ID` INT NOT NULL COMMENT 'Evtl. einfach hochzählen beim Anlegen',
	`Raumnummer` CHAR(4) NOT NULL,
	`IP-Adressbereich_beginn` VARCHAR(50) NOT NULL DEFAULT '127.0.0.1',
	`IP-Adressbereich_ende` VARCHAR(50) NOT NULL DEFAULT '127.0.0.1',
	`anzahl_ws` INT NOT NULL COMMENT 'Was ist mit Büros, Räumen mit Geräten aber ohne Laborrechner. Möglich aus Anzahl von PCs im Raum zu berechnen',
	`belegte_ws` INT NOT NULL DEFAULT '0'
)
COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `Betriebssystem` (
	`ID` INT NOT NULL COMMENT 'Evtl. einfach hochzählen beim Anlegen',
	`Hersteller` VARCHAR(50) NOT NULL DEFAULT '',
	`Name` VARCHAR(100) NOT NULL DEFAULT '',
	`Version` VARCHAR(20) NOT NULL DEFAULT '',
	PRIMARY KEY (`ID`)
)
COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `Softwarelizenzen` (
	`ID` INT(11) NOT NULL COMMENT 'Evtl. einfach hochzählen beim Anlegen',
	`Hersteller` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Version` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`anzahl_gerate` INT(11) NOT NULL COMMENT 'Berechnet aus Anzahl Geräte auf denen SW installiert ist',
	PRIMARY KEY (`ID`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `Ausleihanfragen` (
	`ID` INT NOT NULL COMMENT 'Evtl. einfach hochzählen beim Anlegen',
	`Student` CHAR(7) NOT NULL COMMENT 'Student, der Anfrage schickt',
	`Mitarbeiter` CHAR(7) NULL COMMENT 'Mitarbeiter, der Anfrage bearbeitet hat',
	`Art` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0 = Ausleihe, 1 = Rückgabe',
	`Geraet` INT NOT NULL,
	`Status` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0 = Angefragt, 1 = Angenommen (2 = Abgelehnt ?)',
	PRIMARY KEY (`ID`)
)
COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `Geraet_hat_Betriebssystem` (
	`GeraetID` INT NOT NULL COMMENT 'Referenz auf Geräte',
	`BetriebssystemID` INT NOT NULL COMMENT 'Referenz auf Betriebssystem '
)
COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `Geraet_hat_Software` (
	`GerätID` INT NOT NULL COMMENT 'Referenz auf Geräte',
	`SoftwarelizenzID` INT NOT NULL COMMENT 'Referenz auf Software'
)
COLLATE='utf8mb4_general_ci'
;

CREATE TABLE `Logs` (
	`ID` INT(11) NOT NULL COMMENT 'Evtl. einfach hochzählen beim Anlegen  ',
	`Datum` DATETIME NOT NULL COMMENT 'Datum der Aktion',
	`Benutzer` CHAR(7) NOT NULL COMMENT 'Admin, Mitarbeiter oder Student welcher die Aktion ausgeführt hat' COLLATE 'utf8mb4_general_ci',
	`Aktion` INT(8) NOT NULL COMMENT 'Was für Aktionen gibt es alles??',
	`Beschreibung` VARCHAR(200) NOT NULL COMMENT 'Beschreibt den Vorgang ' COLLATE 'utf8mb4_general_ci',
	`GeraetID` INT(11) NULL DEFAULT NULL COMMENT 'Optional, Referenz auf Gerät',
	`RaumID` INT(11) NULL DEFAULT NULL COMMENT 'Optional Referenz auf Raum',
	PRIMARY KEY (`ID`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
;
