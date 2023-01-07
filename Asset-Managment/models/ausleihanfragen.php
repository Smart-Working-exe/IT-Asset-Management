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

    $devices = "SELECT geraet, art, status, ausleihdatum, rueckgabedatum, typ FROM ausleihanfragen a left join geraet g ON a.geraet = g.name
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
    if(is_array($devices)) {
        foreach($devices as $device) {
            $request = "INSERT INTO ausleihanfragen(student, geraet) values('$self','$device')";
            mysqli_query($link,$request);
            $change_device_availability = "UPDATE geraet set ausleihbar = 2 where name = '$device'";
            mysqli_query($link,$change_device_availability);
        }
    }
    else {
        $request = "INSERT INTO ausleihanfragen(student, geraet) values('$self','$devices')";
        mysqli_query($link,$request);
        $change_device_availability = "UPDATE geraet set ausleihbar = 2 where name = '$devices'";
        mysqli_query($link,$change_device_availability);
    }

    mysqli_commit($link);
    mysqli_close($link);
}

function request_return($devices) {
    $self = $_SESSION['name'];
    $link = connectdb();
    mysqli_begin_transaction($link);

    if(is_array($devices)) {
        foreach($devices as $device) {
            $request = "UPDATE ausleihanfragen set art = 1, status = 0 WHERE student = '$self' AND geraet = '$device'";
            mysqli_query($link,$request);
        }
    }
    else {
        $request = "UPDATE ausleihanfragen set art = 1, status = 0 WHERE student = '$self' AND geraet = '$devices'";
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
        // Update Status
        $request3 = "UPDATE ausleihanfragen SET status = 1 , ausleihdatum = NOW(), rueckgabedatum = DATE_ADD(NOW(), INTERVAL 30 DAY) WHERE id = '$id'";
        mysqli_query($link,$request3);
        // Update Geraet
        $request4 = "UPDATE geraet SET personen_id = '$student' WHERE name = '$geraet'";
        mysqli_query($link,$request4);
    }
    // Gerät schon verliehen
    else{
        $request = "UPDATE ausleihanfragen SET status = 2 WHERE geraet = '$id' AND status = 0 AND student = '$student'";
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
    // Update Status
    $request2 = "UPDATE ausleihanfragen SET status = 1 WHERE id = '$id' AND status = 0";
    mysqli_query($link,$request2);
    // Update Geraet
    $request3 = "UPDATE geraet SET personen_id = null, ausleihbar = 1 WHERE name = '$geraet'";
    mysqli_query($link,$request3);

    mysqli_commit($link);
    mysqli_close($link);
}

function reject($id) {
    $link = connectdb();

    $request = "UPDATE ausleihanfragen SET status = 2 WHERE id = '$id' AND status = 0";
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

    // Gerät noch nicht verliehen, Status zurück ändern
    if(empty($status) or $status == "" or $status == "NULL") {
        // Update Status
        $change_device_availability = "UPDATE geraet set ausleihbar = 1 where name = '$geraet'";
        mysqli_query($link,$change_device_availability);
    }

    mysqli_close($link);
}