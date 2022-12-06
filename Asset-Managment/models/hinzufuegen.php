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

function db_add_software($var)
{   print_r($var);
    $ablaufzeitraum=date('y-m-d h:i:s');
    $db = connectdb();

    $hersteller=$var['hersteller'];
    $name=$var['name'];
    $version=$var['version'];
    $anzahl_gerate=$var['anzahl_gerate'];
    $erwerbsdatum=date('Y-m-d',strtotime($var['erwerbsdatum']));
    print_r($var);
    print_r($erwerbsdatum);
    $ablaufdatum=date('Y-m-d',strtotime($var['ablaufdatum']));
    print_r($ablaufdatum);
   // $absenden=$db->prepare("INSERT INTO softwarelizenzen(hersteller,name,version,anzahl_gerate,erwerbsdatum,ablaufdatum)
     //                                   VALUES(?,?,?,?,?,?)");
    $absenden=$db->prepare("INSERT INTO softwarelizenzen(hersteller,name, version, anzahl_gerate,erwerbsdatum,ablaufdatum,ablaufzeitraum)
        values ('$hersteller','$name','$version','$anzahl_gerate','$erwerbsdatum','$ablaufdatum','$ablaufdatum');");
   // $absenden->bind_param('sssisss',$hersteller,$name,$version,$anzahl_gerate,$erwerbsdatum,$ablaufdatum,$ablaufdatum);
    $absenden->execute();
    mysqli_close($db);
}