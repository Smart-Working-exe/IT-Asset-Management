<?php

function get_rentable_devices() {
    $link = connectdb();

    $devices = "SELECT name, typ, kommentar FROM geraet WHERE ausleihbar = 1";
    $requests = mysqli_query($link,$devices);
    $data = mysqli_fetch_all($requests, MYSQLI_ASSOC);

    mysqli_close($link);
    return $data;
}

function get_own_devices() {
    $self = $_SESSION['name'];
    $link = connectdb();

    $devices = "SELECT a.id, geraet, art, status, ausleihdatum, rueckgabedatum, typ FROM ausleihanfragen a left join geraet g ON a.geraet = g.name
                WHERE student = '$self' AND ((art = 0 AND status = 1) OR (art = 1 AND status = 0) OR (art = 1 AND status = 2)) ORDER BY ausleihdatum";
    $requests = mysqli_query($link,$devices);
    $data = mysqli_fetch_all($requests, MYSQLI_ASSOC);

    mysqli_close($link);
    return $data;
}

function request_loan($devices) {
    $self = $_SESSION['name'];
    $link = connectdb();
    mysqli_begin_transaction($link);

    foreach($devices as $device) {
        $request = "INSERT INTO ausleihanfragen(student, geraet) values('$self','$device');";
        $request .= "UPDATE geraet set ausleihbar = 2 where name = '$device'";

        mysqli_multi_query($link,$request);
        do {} while (mysqli_next_result($link));
    }

    mysqli_commit($link);
    mysqli_close($link);
}

function request_return($ids) {
    $link = connectdb();
    mysqli_begin_transaction($link);

    foreach($ids as $id) {
        $request = "UPDATE ausleihanfragen set art = 1, status = 0 WHERE id = '$id'";
        mysqli_query($link,$request);
    }

    mysqli_commit($link);
    mysqli_close($link);
}


function get_open_requests() {

    $link = connectdb();

    $open_requests = "SELECT id, student, art, geraet FROM ausleihanfragen WHERE status = 0;";
    $requests = mysqli_query($link,$open_requests);

    $data = mysqli_fetch_all($requests, MYSQLI_ASSOC);

    mysqli_close($link);
    return $data;
}

function accept_loan($id) {
    $link = connectdb();
    mysqli_begin_transaction($link);

    // Get Student und Gerätename
    $request = "SELECT geraet, student from ausleihanfragen where id = '$id'";
    $sql = mysqli_query($link, $request);
    $data = mysqli_fetch_all($sql,MYSQLI_BOTH);
    $student = $data[0]['student'];
    $geraet = $data[0]['geraet'];
    // Get Gerätestatus
    $request2 = "SELECT personen_id from geraet where name = '$geraet'";
    $sql = mysqli_query($link, $request2);
    $data = mysqli_fetch_all($sql,MYSQLI_BOTH);
    $status = $data[0]['personen_id'];

    // Gerät noch nicht verliehen
    if(empty($status) or $status == "") {
        // Update Status & Geraet
        $request3 = "UPDATE ausleihanfragen SET status = 1 , ausleihdatum = NOW(), 
                        rueckgabedatum = DATE_ADD(NOW(), INTERVAL 30 DAY) WHERE id = '$id';";
        $request3 .= "UPDATE geraet SET personen_id = '$student' WHERE name = '$geraet'";
        mysqli_multi_query($link,$request3);
        do {} while (mysqli_next_result($link));

    }
    // Gerät schon verliehen
    else{
        $request = "UPDATE ausleihanfragen SET status = 2 WHERE id = '$id'";
        mysqli_query($link,$request);
    }

    mysqli_commit($link);
    mysqli_close($link);
}

function accept_return($id) {
    $link = connectdb();
    mysqli_begin_transaction($link);

    // Get Gerätename
    $request = "SELECT geraet from ausleihanfragen where id = '$id'";
    $sql = mysqli_query($link, $request);
    $data = mysqli_fetch_all($sql,MYSQLI_BOTH);
    $geraet = $data[0]['geraet'];
    // Update Status & Geraet
    $request2 = "UPDATE ausleihanfragen SET status = 1 WHERE id = '$id';";
    $request2 .= "UPDATE geraet SET personen_id = null, ausleihbar = 1 WHERE name = '$geraet'";
    mysqli_multi_query($link,$request2);
    do {} while (mysqli_next_result($link));

    mysqli_commit($link);
    mysqli_close($link);
}

function reject($id) {
    $link = connectdb();

    $request = "UPDATE ausleihanfragen SET status = 2 WHERE id = '$id'";
    mysqli_query($link,$request);

    // Get Gerätename
    $request2 = "SELECT geraet from ausleihanfragen where id = '$id'";
    $sql = mysqli_query($link, $request2);
    $data = mysqli_fetch_all($sql,MYSQLI_BOTH);
    $geraet = $data[0]['geraet'];
    // Get Gerätestatus
    $request3 = "SELECT personen_id from geraet where name = '$geraet'";
    $sql = mysqli_query($link, $request3);
    $data = mysqli_fetch_all($sql,MYSQLI_BOTH);
    $status = $data[0]['personen_id'];

    // Gerät nicht verliehen, Status zurück ändern
    if(empty($status) or $status == "" or $status == "NULL") {
        // Update Status
        $change_device_availability = "UPDATE geraet set ausleihbar = 1 where name = '$geraet'";
        mysqli_query($link,$change_device_availability);
    }

    mysqli_close($link);
}