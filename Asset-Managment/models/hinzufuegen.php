<?php

function db_add_device($var, $var_OS, $var_Software,)
{
    $db = connectdb();
    $name = $var['addDeviceName'];
    $typ = $var['addDevicedeviceTyp'];
    $hersteller = $var['addDeviceHersteller'];
    $betrieb = date('Y-m-d', strtotime($var['addDeviceersteInbetriebname']));
    if (!empty($var['addDevicealterGerat']))
        $age = date('Y-m-d', strtotime($var['addDevicealterGerat']));
    else
        $age = $betrieb;
    if (!empty($var['addDeviceRoom']))
        $room = $var['addDeviceRoom'];
    else
        $room = "Lager";
    $ausleihbar = $var['addDeviceAusleihbar'];
    $technischeEckdaten = $var['addDevicetechnischeEckdaten'];
    $kommentar = $var['addDeviceKommentarGerat'];
    //$betriebssystem = $var['addDeviceBetriebssystem'];

    $copytesterString = "SELECT name FROM geraet WHERE name = '$name'";
    $copytesterResult = mysqli_query($db, $copytesterString);
    $copytesterData = mysqli_fetch_all($copytesterResult);
    var_dump($copytesterResult);
    if ($copytesterData[0][0] == $name) {
        $_SESSION['dup_entry'] = true;
        return;
    }
    $tmp_room = "Lager";
    $absenden = $db->prepare("INSERT INTO geraet(name, typ, hersteller, age, betrieb,raumnummer,technische_eckdaten,kommentar,ausleihbar) VALUES(?,?,?,?,?,?,?,?,?)");
    $absenden->bind_param('ssssssssi', $name, $typ, $hersteller, $age, $betrieb, $tmp_room, $technischeEckdaten, $kommentar, $ausleihbar);
    $absenden->execute();
    $order_id = $db->insert_id;
    $stmt = $db->prepare("UPDATE geraet SET raumnummer = ? WHERE id = ?");
    $stmt->bind_param('si', $room, $order_id);
    $stmt->execute();

    // Raum WS und IP updaten
    if (($var['addDevicedeviceTyp'] == 1 || $var['addDevicedeviceTyp'] == 2) && $room != "Lager") {
        $stmt = $db->prepare("UPDATE raum SET anzahl_ws = anzahl_ws+1, belegung_ip = IF(belegung_ip < anzahl_ip, belegung_ip+1, belegung_ip) WHERE raumnummer = ?");
        $stmt->bind_param("s", $room);
        $stmt->execute();
        update_room_ips_up($room, $order_id);
    }



    foreach ($var_OS as $value) {
        $stmt = $db->prepare("INSERT INTO geraet_hat_betriebssystem(geraetid,betriebssystemid) VALUES (?,?)");
        $stmt->bind_param('ii', $order_id, $value);
        $stmt->execute();
    }

    foreach ($var_Software as $value2) {
        $stmt = $db->prepare("INSERT INTO geraet_hat_software(geraetid,softwarelizenzid) VALUES (?,?)");
        $stmt->bind_param('ii', $order_id, $value2);
        $stmt->execute();
    }


    $db->close();
}

function db_add_user($var)
{
    $db = connectdb();
    $fh_kuerzel = $var['user_add_fh_kuerzel'];
    $vorname = $var['user_add_vorname'];
    $nachname = $var['user_add_nachname'];
    $rolle = $var['user_add_rolle'];
    $passwort = 'f7e45b03e124f58c149a52b32af49a4da0694131';
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

function getAll_Betriebssysteme()
{
    $db = connectdb();

    $sql = 'SELECT * FROM betriebssystem ORDER BY name ASC';
    $result = mysqli_query($db, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($db);
    return $data;
}

function getAll_Rooms()
{
    $db = connectdb();

    $sql = 'SELECT * FROM raum ORDER BY raumnummer ASC';
    $result = mysqli_query($db, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($db);
    return $data;
}