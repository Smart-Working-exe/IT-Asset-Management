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

    /*// set user
    $stmt = mysqli_stmt_init($db);
    mysqli_stmt_prepare($stmt, "INSERT INTO personen (fh_kuerzel, vorname, nachname, rolle, passwort) VALUES (?,?,?,?,?);");
    mysqli_stmt_bind_param($stmt, 'sssis', $fh_kuerzel, $vorname, $nachname, $rolle, $passwort);
    mysqli_stmt_execute($stmt);
    mysqli_close($db);*/
    $userRole = null;
    $userFirstName = null;
    $userLastName = null;
    $userFH_Name = null;
    $userPass = null;
    print_r($userFirstName + ", " + $userLastName + ", " + $userRole + ", " + $userFH_Name + ", " + $userPass);
    if (isset($_POST['addUserSubmit'])) {
        if (isset($_POST['userRole'])) {
            $userRole = trim($_POST['userRole']);
        }
        if (isset($_POST['userFirstName'])) {
            $userFirstName = trim($_POST['userFirstName']);
        }
        if (isset($_POST['userLastName'])) {
            $userLastName = trim($_POST['userLastName']);
        }
        if (isset($_POST['userFH_Name'])) {
            $userFH_Name = trim($_POST['userFH_Name']);
        }
        if (isset($_POST['$userPass'])) {
            $userPass = trim($_POST['$userPass']);
        }

        if (isset($db)) {
            $userRole = mysqli_real_escape_string($db, $userRole);
            $userFirstName = mysqli_real_escape_string($db, $userFirstName);
            $userLastName = mysqli_real_escape_string($db, $userLastName);
            $userFH_Name = mysqli_real_escape_string($db, $userFH_Name);
            $userPass = mysqli_real_escape_string($db, $userPass);
            $stmt = mysqli_stmt_init($db);
            mysqli_stmt_prepare($stmt, "SELECT * FROM personen WHERE fh_kuerzel LIKE ?");
            mysqli_stmt_bind_param($stmt, 's', $userFH_Name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            //If user allready exist, skip
            if (!$result) {
                mysqli_stmt_prepare($stmt, "INSERT INTO ersteller (fh_kuerzel, vorname, nachname, rolle) VALUES (?,?,?,?,?);");
                mysqli_stmt_bind_param($stmt, 'sssss', $userFH_Name, $userFirstName, $userLastName, $userRole,);

                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                //$result = mysqli_query($db, $sql1);
            }
            mysqli_free_result($result);
        }
    }
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