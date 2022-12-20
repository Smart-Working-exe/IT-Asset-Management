<?php

function get_raum_belegung($raum)
{
    $link = connectdb();

    $sql = "select belegte_ws as cur, anzahl_ws as max from raum where raumnummer = '$raum'";
    $result = mysqli_query($link, $sql);

 //   return mysqli_fetch_assoc($result);
   return mysqli_fetch_assoc($result);
}

function get_belegung_gebaude($gebaude)
{
    $link = connectdb();

    $sql = "select raumnummer as name, belegte_ws as cur, anzahl_ws as max from raum where gebaude = '$gebaude'";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}

function get_raume(){

    $link = connectdb();

    $sql = "select raumnummer, gebaude from raum order by gebaude";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;

}

function set_raum_belegung($num,$raum){
    $link = connectdb();

    $sql = "UPDATE raum SET belegte_ws = '$num' where raumnummer='$raum'";
    mysqli_query($link, $sql);
    mysqli_close($link);
}

//TODO: Fehlermeldung wenn Raum nicht bekannt ist im System, Fall wird abgefangen aber es fehlt eine Schöne Ausgabe an den Benutzer
function isRoomnumberValid(RequestData $rd){
    $link = connectdb();

    $sql = 'select raumnummer from raum WHERE raumnummer = "'. $rd->query['form_room'] . '"';

    $data = mysqli_fetch_all(mysqli_query($link, $sql), MYSQLI_BOTH);

    if( empty($data)){
        echo "Unbekannte Raumnummer";
        return;
    }

    if($data[0]['raumnummer'] == $rd->query['form_room']) {
        $sql = 'UPDATE geraet SET raumnummer = "' . $rd->query['form_room'] . '" WHERE id =' .$rd->query['form_deviceID'].' ; ';
        mysqli_query($link, $sql);

    }

    mysqli_close($link);

}
