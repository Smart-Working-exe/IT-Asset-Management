-- RÄUME
INSERT INTO raum (raumnummer, `ip-adressbereich_beginn`, `ip-adressbereich_ende`, anzahl_ws, belegte_ws, belegung_ip, anzahl_ip, gebaude)
VALUES ('A001', '156.0.0.0', '156.0.0.255', 20, 20, 1, 254, 'A'),
('A002', '156.0.1.0', '156.0.1.255', 20, 0, 2, 254, 'A'),
('A003', '156.0.2.0', '156.0.2.255', 20, 20, 0, 254, 'A'),
('B013', '156.0.3.0', '156.0.3.255', 1, 0, 0, 254, 'B'),
('B014', '156.0.4.0', '156.0.4.255', 1, 0, 0, 254, 'B'),
('B015', '156.0.5.0', '156.0.5.255', 1, 0, 0, 254, 'B'),
('C101', '156.0.6.0', '156.0.6.255', 1, 0, 0, 254, 'C'),
('C102', '156.0.7.0', '156.0.7.255', 1, 0, 0, 254, 'C'),
('C103', '156.0.8.0', '156.0.8.255', 1, 0, 0, 254, 'C'),
('D001', '156.0.9.0', '156.0.9.255', 1, 0, 0, 254, 'D'),
('D002', '156.0.10.0', '156.0.10.255', 1, 0, 0, 254, 'D'),
('D006', '156.0.11.0', '156.0.11.255', 1, 0, 0, 254, 'D'),
('D101', '156.0.12.0', '156.0.12.255', 1, 0, 0, 254, 'D'),
('D102', '156.0.13.0', '156.0.13.255', 1, 0, 0, 254, 'D'),
('D110', '156.0.14.0', '156.0.14.255', 1, 0, 0, 254, 'D'),
('F104', '156.0.15.0', '156.0.15.31', 3, 0, 2, 30, 'F'),
('F105', '156.0.15.32', '156.0.15.63', 1, 0, 0, 30, 'F'),
('F106', '156.0.15.64', '156.0.15.95', 1, 0, 0, 30, 'F'),
('F111', '156.0.15.96', '156.0.15.127', 4, 1, 4, 30, 'F'),
('F205', '156.0.15.128', '156.0.15.159', 1, 0, 0, 30, 'F'),
('F207', '156.0.15.160', '156.0.15.191', 1, 0, 0, 30, 'F'),
('F214', '156.0.15.192', '156.0.15.223', 1, 0, 0, 30, 'F'),
('Lager', '', '', 1, 0, 0, 10000, ''),
('Test', '', '', 1, 0, 0, 10000, '');


-- BETRIEBSSYSTEM
INSERT INTO betriebssystem (id, hersteller, name, version) VALUES 
(1, "Microsoft", "Windows", "10"),
(2, "Microsoft", "Windows", "7"),
(3, "Apple", "macOS", "Big Sur"),
(4, "Linux", "Ubuntu", "20.04 LTS"),
(5, "Microsoft", "Windows", "8.1"),
(6, "Apple", "macOS", "Catalina"),
(7, "Linux", "Mint", "20"),
(8, "Linux", "Debian", "10"),
(9, "Apple", "macOS", "Mojave"),
(10, "Linux", "Fedora", "32"),
(11, "Microsoft", "Windows", "Vista"),
(12, "Apple", "macOS", "Sierra"),
(13, "Linux", "Arch", ""),
(14, "Microsoft", "Windows", "Server 2008"),
(15, "Apple", "macOS", "El Capitan"),
(16, "Linux", "CentOS", "8"),
(17, "Microsoft", "Windows", "XP"),
(18, "Apple", "macOS", "Mountain Lion"),
(19, "Linux", "OpenSUSE", "Leap 15.2"),
(20, "Microsoft", "Windows", "Server 2003"),
(21, "Apple", "macOS", "Lion"),
(22, "Linux", "Slackware", "14.2"),
(23, "Microsoft", "Windows", "2000"),
(24, "Apple", "macOS", "Snow Leopard"),
(25, "Linux", "Gentoo", "");


-- SOFTWARELIZENZEN
-- Skript 1
INSERT INTO `softwarelizenzen` (`name`, `hersteller`, `version`, `anzahl_gerate`, `erwerbsdatum`, `ablaufdatum`) VALUES 
('Visual Studio', 'Microsoft', '2022', 10, '2022-12-06', '2024-06-10'),
('PhpStorm', 'JetBrains', '2022.3', 15, '2022-10-01', '2024-10-01'),
('IntelliJ IDEA', 'JetBrains', '2022.3', 8, '2022-09-01', '2024-09-01'),
('WebStorm', 'JetBrains', '2022.3', 12, '2022-08-01', '2024-08-01'),
('Git', 'Git', '2.27.0', 20, '2021-07-01', '2024-07-01'),
('Eclipse', 'Eclipse Foundation', '2022-12', 5, '2022-06-01', '2024-06-01'),
('Sublime Text', 'Sublime HQ', '4083', 15, '2022-05-01', '2024-05-01'),
('Autodesk AutoCAD', 'Autodesk', '2022', 20, '2022-04-01', '2024-04-01'),
('Blender', 'Blender Foundation', '2.93.1', 10, '2022-03-01', '2024-08-01');

-- Skript 2
INSERT INTO `softwarelizenzen` (`name`, `hersteller`, `version`, `anzahl_gerate`, `erwerbsdatum`, `ablaufdatum`) VALUES 
('Adobe Photoshop', 'Adobe', '2022', 15, '2022-02-01', '2024-02-01'),
('Adobe Illustrator', 'Adobe', '2022', 10, '2022-01-01', '2024-01-01'),
('Adobe InDesign', 'Adobe', '2022', 5, '2021-12-01', '2023-12-01'),
('Adobe Premiere Pro', 'Adobe', '2022', 20, '2021-11-01', '2023-11-01'),
('Adobe After Effects', 'Adobe', '2022', 15, '2021-10-01', '2023-10-01'),
('Microsoft Office', 'Microsoft', '2022', 25, '2021-09-01', '2023-09-01'),
('Microsoft Excel', 'Microsoft', '2022', 15, '2021-08-01', '2023-08-01'),
('Microsoft PowerPoint', 'Microsoft', '2022', 10, '2021-07-01', '2023-07-01'),
('Microsoft Word', 'Microsoft', '2022', 20, '2021-06-01', '2023-06-01'),
('SAS', 'SAS Institute', '9.4', 5, '2021-05-01', '2023-05-01');

-- Skript 3
INSERT INTO `softwarelizenzen` (`name`, `hersteller`, `version`, `anzahl_gerate`, `erwerbsdatum`, `ablaufdatum`) VALUES 
('R', 'R Core Team', '4.0.3', 15, '2021-04-01', '2023-04-01'),
('Python', 'Python Software Foundation', '3.9.2', 20, '2021-03-01', '2023-03-01'),
('Java', 'Oracle', '15', 25, '2021-02-01', '2023-02-01'),
('C++', 'ISO', '20', 10, '2021-01-01', '2023-01-01'),
('C#', 'Microsoft', '10', 15, '2020-12-01', '2022-12-01'),
('MATLAB', 'MathWorks', 'R2022b', 5, '2020-11-01', '2022-11-01'),
('LaTeX', 'LaTeX Project', '2.11', 10, '2020-10-01', '2022-10-01'),
('SQL', 'ANSI', '2011', 15, '2020-09-01', '2022-09-01'),
('VBA', 'Microsoft', '7', 20, '2020-08-01', '2022-08-01'),
('Unity', 'Unity Technologies', '2022.2', 10, '2020-07-01', '2022-07-01');


-- Skript 4
INSERT INTO `softwarelizenzen` (`name`, `hersteller`, `version`, `anzahl_gerate`, `erwerbsdatum`, `ablaufdatum`) VALUES 
('Unreal Engine', 'Epic Games', '5.0', 5, '2020-06-01', '2022-06-01'),
('Maya', 'Autodesk', '2022', 15, '2020-05-01', '2022-05-01'),
('3ds Max', 'Autodesk', '2022', 10, '2020-04-01', '2022-04-01'),
('Cinema 4D', 'MAXON', 'R22', 5, '2020-03-01', '2022-03-01'),
('Houdini', 'SideFX', '18.0', 10, '2020-02-01', '2022-02-01'),
('Zbrush', 'Pixologic', '2022', 15, '2020-01-01', '2022-01-01'),
('Mudbox', 'Autodesk', '2022', 10, '2019-12-01', '2021-12-01'),
('Blender', 'Blender Foundation', '2.93.1', 20, '2019-11-01', '2021-11-01'),
('Lightwave', 'NewTek', '2022', 5, '2019-10-01', '2022-04-01');

-- Skript 5
INSERT INTO `softwarelizenzen` (`name`, `hersteller`, `version`, `anzahl_gerate`, `erwerbsdatum`, `ablaufdatum`) VALUES 
('DAZ Studio', 'DAZ 3D', '4.12', 10, '2019-09-01', '2021-09-01'),
('V-Ray', 'Chaos Group', '5.0', 15, '2019-08-01', '2021-08-01'),
('Corona Renderer', 'Corona Labs', '6.0', 20, '2019-07-01', '2021-07-01'),
('Octane Render', 'OTOY', '2022', 10, '2019-06-01', '2021-06-01'),
('Arnold', 'Solid Angle', '6.0', 5, '2019-05-01', '2021-05-01'),
('Redshift', 'Redshift Rendering Technologies', '3.0', 10, '2019-04-01', '2021-04-01'),
('FStormRender', 'FStorm', '1.5', 15, '2019-03-01', '2021-03-01'),
('Marmoset Toolbag', 'Marmoset', '4.0', 20, '2019-02-01', '2021-02-01'),
('Substance Painter', 'Allegorithmic', '2022', 10, '2019-01-01', '2021-01-01'),
('Keyshot', 'Luxion', '10.0', 5, '2018-12-01', '2020-12-01');

-- Skript 6
INSERT INTO `softwarelizenzen` (`name`, `hersteller`, `version`, `anzahl_gerate`, `erwerbsdatum`, `ablaufdatum`) VALUES 
('Nuke', 'The Foundry', '14', 5, '2018-11-01', '2020-11-01'),
('After Effects', 'Adobe', '2022', 15, '2018-10-01', '2020-10-01'),
('Premiere Pro', 'Adobe', '2022', 10, '2018-09-01', '2020-09-01'),
('Final Cut Pro', 'Apple', '10.5', 5, '2018-08-01', '2020-08-01'),
('Avenger', 'Frantic Films', '2.5', 10, '2018-07-01', '2020-07-01'),
('Trapcode Suite', 'Red Giant', '15', 15, '2018-06-01', '2020-06-01'),
('Magic Bullet Suite', 'Red Giant', '15', 10, '2018-05-01', '2020-05-01'),
('Shaderlight', 'ArtVPS', '7', 20, '2018-04-01', '2020-04-01'),
('Brazil', 'SplutterFish', '2', 5, '2018-03-01', '2020-03-01'),
('FurryBall', 'FurryBall', '4', 10, '2018-02-01', '2020-02-01');

-- ADMIN-USER
INSERT INTO `personen` (`fh_kuerzel`, `vorname`, `nachname`, `rolle`, `passwort`, `benachrichtigung`, `benachrichtigung_ip`) VALUES ('ad1234a', 'Admin', 'Admin', 1, '56c07ea30691771bedcd0b16584797af121cfa31', 14, 5);
