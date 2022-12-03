

INSERT INTO raum (raumnummer, `ip-adressbereich_beginn`, `ip-adressbereich_ende`, anzahl_ws, belegte_ws) values
                                                                                                             ('a001','156.0.0.0','156.0.0.255',30,0),
                                                                                                             ('a002','156.0.1.0','156.0.1.255',30,0);

INSERT INTO personen (vorname, nachname, fh_kuerzel, rolle, passwort) VALUES
    ('Thomas','Wagner','tw0850m',2,'springenderTitan');

INSERT INTO geraet (name, Typ, hersteller, betrieb, ausleihbar, raumnummer, `ip-adresse`, technische_eckdaten, kommentar) VALUES
                                                                                                                              ('PC-1','PC','Dell','20-11-30',0,'a001','156.0.0.1','USB 3.0; HDMI',''),
                                                                                                                              ('PC-2','PC','Dell','20-11-30',0,'a001','156.0.0.2','USB 3.0; HDMI',''),
                                                                                                                              ('PC-3','PC','Dell','20-11-30',0,'a002','156.0.1.1','USB 3.0; HDMI','Der Kommentar'),
                                                                                                                              ('PC-4','PC','Dell','20-11-30',0,'a002','156.0.1.2','USB 3.0; HDMI',''),
                                                                                                                              ('Monitor-1','Monitor','Dell','20-12-1',0,'a001','','24 Zoll;Display Port; HDMI',''),
                                                                                                                              ('Monitor-2','Monitor','Dell','20-11-30',0,'a001','','24 Zoll;Display Port; HDMI','Pixelfehler in der Mitte'),
                                                                                                                              ('Monitor-3','Monitor','Dell','20-12-1',0,'a002','','24 Zoll;Display Port; HDMI',''),
                                                                                                                              ('Monitor-4','Monitor','Dell','20-11-30',0,'a002','','24 Zoll;Display Port; HDMI',''),
                                                                                                                              ('Maus-1','Maus','Corsair','20-12-1',0,'a001','','1000 mhz',''),
                                                                                                                              ('Maus-2','Maus','Corsair','20-11-30',0,'a001','','1000 mhz','Mausrad defekt'),
                                                                                                                              ('Maus-3','Maus','Corsair','20-12-1',0,'a002','','1000 mhz',''),
                                                                                                                              ('Maus-4','Maus','Corsair','20-11-30',0,'a002','','1000 mhz',''),
                                                                                                                              ('Tastatur-1','Tastatur','Logitech','20-12-1',0,'a001','','',''),
                                                                                                                              ('Tastatur-2','Tastatur','Logitech','20-11-30',0,'a001','','',''),
                                                                                                                              ('Tastatur-3','Tastatur','Logitech','20-12-1',0,'a002','','',''),
                                                                                                                              ('Tastatur-4','Tastatur','Logitech','20-11-30',0,'a002','','',' Numpad funktioniert nicht');

INSERT INTO geraet( name, Typ, hersteller, betrieb, personen_id, technische_eckdaten, kommentar) VALUES
    ('Laptop-1','Laptop','Lenovo','220-08-05','tw0850m','14 Zoll; HDMI','');


INSERT INTO betriebssystem(id, hersteller, name, version) VALUES
                                                              (1,'Microsoft','Windows','10'),
                                                              (2,'Torvald','Linux','');

INSERT INTO geraet_hat_betriebssystem(geraetid, betriebssystemid) VALUES
                                                                      (37,1),
                                                                      (37,2),
                                                                      (38,1),
                                                                      (38,2),
                                                                      (39,1),
                                                                      (40,1),
                                                                      (41,1);


Insert Into softwarelizenzen(id, hersteller, name, version, anzahl_gerate) VALUES
                                                                               (1,'microsoft','Visual Studio', '2020',5),
                                                                               (2,'microsoft','Microchip', '7.0',1);

INSERT INTO geraet_hat_software(geraetid, softwarelizenzid) VALUES
                                                                (37,1),
                                                                (37,2),
                                                                (38,1),
                                                                (39,1),
                                                                (40,1),
                                                                (41,1);




