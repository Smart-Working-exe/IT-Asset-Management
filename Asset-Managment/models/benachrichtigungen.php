<?php


function notif_admin()
{
    $self = $_SESSION['name'];
    $link = connectdb();
    mysqli_begin_transaction($link);
    // get einstellungen
    $settings_request = "SELECT benachrichtigung, benachrichtigung_ip from personen where fh_kuerzel = '$self'";
    $settings = mysqli_query($link,$settings_request);
    $data1 = mysqli_fetch_all($settings);

    // get softwarelizenzen
    $setting_sw = $data1[0][0];
    $sw_request = "SELECT name, anzahl_gerate, DATEDIFF(ablaufdatum,NOW()) AS ablaufzeitraum FROM softwarelizenzen 
                HAVING ablaufzeitraum <= '$setting_sw' AND -'$setting_sw' <= ablaufzeitraum ORDER BY ablaufzeitraum";
    $sw = mysqli_query($link,$sw_request);

    // get IP
    $setting_ip = $data1[1][0];
    $ip_request = "SELECT raumnummer, anzahl_ip, belegung_ip FROM raum WHERE (anzahl_ip - belegung_ip) <= '$setting_ip'";
    $ip = mysqli_query($link,$ip_request);

    $data2 = mysqli_fetch_all($sw, MYSQLI_ASSOC);
    $data3 = mysqli_fetch_all($ip,MYSQLI_ASSOC);

    mysqli_commit($link);
    mysqli_close($link);
    return array_merge($data2, $data3);
}

function notif_employee()
{
    $self = $_SESSION['name'];
    $link = connectdb();
    mysqli_begin_transaction($link);

    // get einstellungen
    $settings_request = "SELECT benachrichtigung from personen where fh_kuerzel = '$self'";
    $settings = mysqli_query($link, $settings_request);
    $data1 = mysqli_fetch_all($settings);

    // get softwarelizenzen
    $setting_sw = $data1[0][0];
    $sw_request = "SELECT g.name, s.name, DATEDIFF(s.ablaufdatum,NOW()) AS ablaufzeitraum 
                FROM geraet g, softwarelizenzen s WHERE g.personen_id = '.$self.' 
                HAVING ablaufzeitraum <= '$setting_sw' AND -'$setting_sw' <= ablaufzeitraum ORDER BY ablaufzeitraum";
    $sw = mysqli_query($link,$sw_request);

    // get loan
    $loan_request = 'SELECT COUNT(*) AS anzahl FROM ausleihanfragen where status = 0';
    $loan = mysqli_query($link,$loan_request);

    $data2 = mysqli_fetch_all($sw, MYSQLI_ASSOC);
    $data3 = mysqli_fetch_all($loan,MYSQLI_ASSOC);

    mysqli_commit($link);
    mysqli_close($link);
    return array_merge($data2, $data3);
}

function notif_student()
{
    $self = $_SESSION['name'];
    $link = connectdb();
    mysqli_begin_transaction($link);

    // get einstellungen
    $settings_request = "SELECT benachrichtigung from personen where fh_kuerzel = '$self'";
    $settings = mysqli_query($link, $settings_request);
    $data1 = mysqli_fetch_all($settings);

    // Löschen oder Status ändern
    $setting = $data1[0][0];
    $loan_request = "SELECT art, geraet, status, DATEDIFF(rueckgabedatum,NOW()) AS zeitraum FROM ausleihanfragen where student = '$self' AND status > 0
                     HAVING zeitraum <= '$setting' AND -'$setting' <= zeitraum ORDER BY zeitraum";
    $loan = mysqli_query($link,$loan_request);

    $data2 = mysqli_fetch_all($loan, MYSQLI_ASSOC);

    mysqli_commit($link);
    mysqli_close($link);
    return $data2;
}

function delete_notif_loan($geraet) {

    $self = $_SESSION['name'];
    $link = connectdb();
    mysqli_begin_transaction($link);

    // get request data
    $request = "SELECT art, status from ausleihanfragen where student = '$self' AND geraet = '$geraet'";
    $settings = mysqli_query($link, $request);
    $data = mysqli_fetch_all($settings,MYSQLI_BOTH);
    $art = $data['art'];
    $status = $data['status'];

    // delete Benachrichtigung
    $request = "";
    if(($art == 0 && $status == 2) || ($art == 1 && $status == 1)) {
        $request = "DELETE FROM ausleihanfragen where student = '$self' 
                    AND geraet = '$geraet'";
    }
    else if($art == 0 && $status == 2) {
        $request = "UPDATE ausleihanfragen SET art = 0, status = 1 
                    where student = '$self' AND geraet = '$geraet'";
    }

    mysqli_query($link, $request);
    mysqli_commit($link);
    mysqli_close($link);

}