<?php

function notif_admin()
{
    $link = connectdb();

    // get softwarelizenzen
    $setting_sw = 1;       // Platzhalter
    $sw_request = "SELECT name, anzahl_gerate, DATEDIFF(NOW(),ablaufdatum ) AS ablaufzeitraum 
                    FROM softwarelizenzen HAVING ablaufzeitraum <= '$setting_sw'";
    $sw = mysqli_query($link,$sw_request);
    // get IP
    $setting_ip = 0.9;      // Platzhalter
    $ip_request = "SELECT raumnummer, anzahl_ip, belegung_ip FROM raum where (belegung_ip/anzahl_ip) >= '$setting_ip'";
    $ip = mysqli_query($link,$ip_request);

    $data1 = mysqli_fetch_all($sw, MYSQLI_ASSOC);
    $data2 = mysqli_fetch_all($ip,MYSQLI_ASSOC);

    mysqli_close($link);
    return array_merge($data1, $data2);
}

function notif_employee()
{
    $link = connectdb();
    $self = 'ab1234c';   // Platzhalter
    // get softwarelizenzen
    $setting_sw = 1;    // Platzhalter
    $sw_request = "SELECT g.name, DATEDIFF(NOW(),s.ablaufdatum) AS ablaufzeitraum 
                    FROM geraet g, softwarelizenzen s
                    WHERE g.personen_id = '.$self.', ablaufzeitraum <= '$setting_sw'";
    $sw = mysqli_query($link,$sw_request);
    // get loan
    $loan_request = 'SELECT COUNT(*) FROM ausleihanfragen where status = 0';
    $loan = mysqli_query($link,$loan_request);

    $data1 = mysqli_fetch_all($sw, MYSQLI_ASSOC);
    $data2 = mysqli_fetch_all($loan,MYSQLI_ASSOC);

    mysqli_close($link);
    return array_merge($data1, $data2);
}

function notif_student()
{
    $link = connectdb();

    // get Ausleihbenachrichtigungen
    $self = 'ab1234c';      // Platzhalter
    $loan_request = "SELECT art, geraet, status, rueckgabedatum FROM ausleihanfragen where student = '$self'";
    $loan = mysqli_query($link,$loan_request);

    $data1 = mysqli_fetch_all($loan, MYSQLI_ASSOC);

    mysqli_close($link);
    return $data1;
}