<?php

function db_getAll_Betriebssystem()
{

    $link = connectdb();

    // get geräte
    $sql = 'SELECT id,name, version FROM betriebssystem';
    $result = mysqli_query($link,$sql);


    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);


    mysqli_close($link);
    return $data;
}
