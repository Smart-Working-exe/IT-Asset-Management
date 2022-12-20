<?php

function get_rentable_devices() {
    $link = connectdb();

    $devices = "SELECT name, typ, kommentar FROM geraet WHERE ausleihbar = true AND personen_id is null";
    $requests = mysqli_query($link,$devices);
    $data = mysqli_fetch_all($requests, MYSQLI_ASSOC);

    mysqli_close($link);
    return $data;
}

function get_own_devices() {
    $self = $_SESSION['name'];
    $link = connectdb();

    $devices = "SELECT geraet, art, status, ausleihdatum, rueckgabedatum, typ FROM ausleihanfragen a left join geraet g ON a.geraet = g.name
                WHERE student = '$self' AND ((art = 0 AND status = 1) OR (art = 1 AND status = 0) OR (art = 1 AND status = 2))";
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
        }
    }
    else {
        $request = "INSERT INTO ausleihanfragen(student, geraet) values('$self','$devices')";
        mysqli_query($link,$request);
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

    $open_requests = "SELECT student, art, geraet FROM ausleihanfragen WHERE status = 0;";
    $requests = mysqli_query($link,$open_requests);

    $data = mysqli_fetch_all($requests, MYSQLI_ASSOC);

    mysqli_close($link);
    return $data;
}

function accept_loan($device) {
    $link = connectdb();
    mysqli_begin_transaction($link);

    // Update Status
    $request = "UPDATE ausleihanfragen SET status = 1 , ausleihdatum = NOW(), rueckgabedatum = DATE_ADD(NOW(), INTERVAL 30 DAY) WHERE geraet = '$device' AND status = 0";
    mysqli_query($link,$request);
    // Get Student
    $request2 = "SELECT student from ausleihanfragen where geraet = '$device'";
    $sql = mysqli_query($link, $request2);
    $data = mysqli_fetch_all($sql,MYSQLI_BOTH);
    $student = $data['student'];
    // Update Geraet
    $request3 = "UPDATE geraet SET personen_id = '$student' WHERE name = '$device'";
    mysqli_query($link,$request3);

    mysqli_commit($link);
    mysqli_close($link);
}

function accept_return($device) {
    $link = connectdb();
    mysqli_begin_transaction($link);

    // Update Status
    $request = "UPDATE ausleihanfragen SET status = 1 WHERE geraet = '$device' AND status = 0";
    mysqli_query($link,$request);
    // Update Geraet
    $request3 = "UPDATE geraet SET personen_id = null WHERE name = '$device'";
    mysqli_query($link,$request3);

    mysqli_commit($link);
    mysqli_close($link);
}

function reject($device) {
    $link = connectdb();

    $request = "UPDATE ausleihanfragen SET status = 2 WHERE geraet = '$device' AND status = 0";
    $sql = mysqli_query($link,$request);

    mysqli_close($link);
}