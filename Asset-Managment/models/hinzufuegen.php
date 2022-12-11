<?php
function db_add_device($var)
{
    $db = connectdb();
    $name=$var['addDeviceName'];
    $typ =$var['addDevicedeviceTyp'];
    $hersteller=$var['addDeviceHersteller'];
    $age= date('Y-m-d', strtotime($var['addDevicealterGerat']));
    $betrieb= date('Y-m-d', strtotime($var['addDeviceersteInbetriebname']));
    $ip=$var['addDeviceIP'];
    $technischeEckdaten=$var['addDevicetechnischeEckdaten'];
    $kommentar=$var['addDeviceKommentarGerat'];
    print_r($age);
    print_r($betrieb);
    $absenden = $db->prepare("INSERT INTO geraet(name, typ, hersteller, age, betrieb,ip_adresse,technische_eckdaten,kommentar) VALUES(?,?,?,?,?,?,?,?)");
    $absenden->bind_param('ssssssss', $name, $typ, $hersteller, $age, $betrieb, $ip, $technischeEckdaten,$kommentar);
    $absenden->execute();
}

function db_add_user($var)
{
    $db = connectdb();
    $fh_kuerzel = $var['user_add_fh_kuerzel'];
    $vorname = $var['user_add_vorname'];
    $nachname = $var['user_add_nachname'];
    $rolle = $var['user_add_rolle'];
    $passwort = $var['user_add_passwort'];
    $absenden = $db->prepare("INSERT INTO personen(fh_kuerzel, vorname, nachname, rolle, passwort) VALUES(?,?,?,?,?)");
    $absenden->bind_param('sssis', $fh_kuerzel, $vorname, $nachname, $rolle, $passwort);
    $absenden->execute();
    mysqli_close($db);
}

function db_add_software($var)
{
    $db = connectdb();
    $hersteller = $var['software_add_hersteller'];
    $name = $var['software_add_name'];
    $version = $var['software_add_version'];
    $anzahl_gerate = $var['software_add_anzahl_gerate'];
    $erwerbsdatum = date('Y-m-d', strtotime($var['software_add_erwerbsdatum']));
    $ablaufdatum = date('Y-m-d', strtotime($var['software_add_ablaufdatum']));
    $absenden = $db->prepare("INSERT INTO softwarelizenzen(hersteller, name, version, anzahl_gerate, erwerbsdatum, ablaufdatum) VALUES(?,?,?,?,?,?)");
    //$absenden=$db->prepare("INSERT INTO softwarelizenzen(hersteller, name, version, anzahl_gerate,erwerbsdatum,ablaufdatum,ablaufzeitraum) values ('$hersteller','$name','$version','$anzahl_gerate','$erwerbsdatum','$ablaufdatum','$ablaufdatum');");
    $absenden->bind_param('sssiss', $hersteller, $name, $version, $anzahl_gerate, $erwerbsdatum, $ablaufdatum);
    $absenden->execute();
    mysqli_close($db);
}
