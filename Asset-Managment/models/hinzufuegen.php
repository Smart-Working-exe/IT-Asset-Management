<?php
function db_add_device()
{
    $db = connectdb();



}

function db_add_user()
{
    $db = connectdb();
}

function db_add_software()
{
    $db = connectdb();

    $absenden=$db->prepare("INSERT INTO softwarelizenzen(hersteller,name,version,anzahl_gerate,erwerbsdatum,ablaufdatum)
                                        VALUES(?,?,?,?,?,?,?)");

    $absenden->bind_param('sssiss',$hersteller,$name,$version,$anzahl_geräte,$erwerbsdatum,$ablaufdatum);
    $absenden->execute();
    mysqli_close($db);
}