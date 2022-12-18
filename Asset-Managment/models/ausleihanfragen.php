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

function show_ausgeraete () {
    $link = connectdb();
    $sql = " SELECT name,typ,
           ";


}

function show_vergeraete () {

}