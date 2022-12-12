<?php

function get_raum_belegung($raum)
{
    $link = connectdb();

    $sql = "select belegte_ws as cur, anzahl_ws as max from raum where raumnummer = '$raum'";
    $result = mysqli_query($link, $sql);

 //   return mysqli_fetch_assoc($result);
   return mysqli_fetch_assoc($result);
}