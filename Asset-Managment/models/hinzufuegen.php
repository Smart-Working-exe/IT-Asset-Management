<?php
function db_add_device()
{
    $db = connectdb();

    // set devices
    $stmt = mysqli_stmt_init($db);
    mysqli_stmt_prepare($stmt, "INSERT INTO geraet (id, name, typ, betrieb, hersteller, age, ip-adresse, technische_eckdaten, kommentar) VALUES (?,?,?,?,?,?,?,?,?);");
    mysqli_stmt_bind_param($stmt, 'issssssss', $id, $name, $typ, $betrieb, $hersteller, $age, $ip_adresse, $technische_eckdaten, $kommentar);
    mysqli_stmt_execute($stmt);
    mysqli_close($db);
}

function db_add_user()
{
    $db = connectdb();

    // set user
    $stmt = mysqli_stmt_init($db);
    mysqli_stmt_prepare($stmt, "INSERT INTO personen (fh_kuerzel, vorname, nachname, rolle, passwort) VALUES (?,?,?,?,?);");
    mysqli_stmt_bind_param($stmt, 'sssis', $fh_kuerzel, $vorname, $nachname, $rolle, $passwort);
    mysqli_stmt_execute($stmt);
    mysqli_close($db);
}

function db_add_software()
{
    $db = connectdb();

    // set software
    $stmt = mysqli_stmt_init($db);
    mysqli_stmt_prepare($stmt, "INSERT INTO softwarelizenzen(hersteller,name,version,anzahl_gerate,erwerbsdatum,ablaufdatum) VALUES(?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt, 'sssiss',$hersteller,$name,$version,$anzahl_geräte,$erwerbsdatum,$ablaufdatum);
    mysqli_stmt_execute($stmt);
    mysqli_close($db);
}