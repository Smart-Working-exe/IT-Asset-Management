<?php

function db_getAll_Softwarelizenzen()
{

    $link = connectdb();

    // get geräte
    $sql = 'SELECT id,name, version FROM softwarelizenzen';
    $result = mysqli_query($link,$sql);


    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);


    mysqli_close($link);
    return $data;
}
