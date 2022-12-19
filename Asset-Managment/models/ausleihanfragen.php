<?php
function send_ausanfrage ($geraetname, $student) {
    $link = connectdb();
    $sql = "
           INSERT INTO ausleihanfragen(student,mitarbeiter,art,geraet,status,rueckgabedatum) 
            ($student,NULL,0,$geraetname,0,NULL);
           ";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
}

function send_ruckanfrage ( $geraetname, $student) {
    $link = connectdb();
    $sql = "
           INSERT INTO ausleihanfragen(student,mitarbeiter,art,geraet,status,rueckgabedatum) 
            ($student,NULL,1,$geraetname,0,NULL);
           ";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
}


function get_open_request() {

    $link = connectdb();

    $open_requests = "SELECT student, art, geraet FROM ausleihanfragen WHERE status = 0;";
    $requests = mysqli_query($link,$open_requests);

    $data = mysqli_fetch_all($requests, MYSQLI_ASSOC);

    mysqli_close($link);
    return $data;
}

function accept($device) {
    $link = connectdb();

    $request = "UPDATE ausleihanfragen SET status = 1 WHERE geraet = '$device' AND status = 0";
    $sql = mysqli_query($link,$request);

    mysqli_close($link);
}

function reject($device) {
    $link = connectdb();

    $request = "UPDATE ausleihanfragen SET status = 2 WHERE geraet = '$device' AND status = 0";
    $sql = mysqli_query($link,$request);

    mysqli_close($link);
}