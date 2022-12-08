<?php


function notif_admin()
{
    $self = $_SESSION['name'];   // Platzhalter

    $link = connectdb();
    // get einstellungen
    $settings_request = "SELECT benachrichtigung from personen where fh_kuerzel = '$self'";
    $settings = mysqli_query($link,$settings_request);
    $data1 = mysqli_fetch_all($settings, MYSQLI_NUM);

    // get softwarelizenzen
    $setting_sw = $data1[0][0]; // Platzhalter
    echo $setting_sw;
    $sw_request = "SELECT name, anzahl_gerate, DATEDIFF(ablaufdatum,NOW()) AS ablaufzeitraum 
                    FROM softwarelizenzen HAVING ablaufzeitraum <= '$setting_sw'";
    $sw = mysqli_query($link,$sw_request);

    // get IP TODO
    $setting_ip = 0.9;      // Platzhalter
    $ip_request = "SELECT raumnummer, anzahl_ip, belegung_ip FROM raum WHERE (belegung_ip/anzahl_ip) >= '$setting_ip'";
    $ip = mysqli_query($link,$ip_request);

    $data2 = mysqli_fetch_all($sw, MYSQLI_ASSOC);
    $data3 = mysqli_fetch_all($ip,MYSQLI_ASSOC);

    mysqli_close($link);
    return array_merge($data2, $data3);
}

function notif_employee()
{
    $self = $_SESSION['name'];

    $link = connectdb();
    // get einstellungen
    $settings_request = "SELECT benachrichtigung from personen where fh_kuerzel = '$self'";
    $settings = mysqli_query($link, $settings_request);
    $data1 = mysqli_fetch_all($settings, MYSQLI_ASSOC);

    // get softwarelizenzen
    $setting_sw = $data1['benachrichtigung'];
    $sw_request = "SELECT g.name, s.name, DATEDIFF(s.ablaufdatum,NOW()) AS ablaufzeitraum 
                    FROM geraet g, softwarelizenzen s
                    WHERE g.personen_id = '.$self.' HAVING ablaufzeitraum <= '$setting_sw'";
    $sw = mysqli_query($link,$sw_request);

    // get loan
    $loan_request = 'SELECT COUNT(*) AS anzahl FROM ausleihanfragen where status = 0';
    $loan = mysqli_query($link,$loan_request);

    $data2 = mysqli_fetch_all($sw, MYSQLI_ASSOC);
    $data3 = mysqli_fetch_all($loan,MYSQLI_ASSOC);

    mysqli_close($link);
    return array_merge($data2, $data3);
}

function notif_student()
{
    $self = $_SESSION['name'];

    $link = connectdb();
    // get einstellungen
    $settings_request = "SELECT benachrichtigung from personen where fh_kuerzel = '$self'";
    $settings = mysqli_query($link, $settings_request);
    $data1 = mysqli_fetch_all($settings, MYSQLI_ASSOC);

    // get Ausleihbenachrichtigungen
    $loan_request = "SELECT art, geraet, status, DATEDIFF(rueckgabedatum, NOW()) AS zeitraum FROM ausleihanfragen where student = '$self'";
    $loan = mysqli_query($link,$loan_request);

    $data2 = mysqli_fetch_all($loan, MYSQLI_ASSOC);

    mysqli_close($link);
    return $data2;
}