<?php

function change_setting(int $days)
{
    $self = 'ab1234c';   // Platzhalter

    $link = connectdb();
    $settings_request = "UPDATE personen SET benachrichtigung = '$days' WHERE fh_kuerzel = '$self'";
    mysqli_query($link, $settings_request);
    mysqli_close($link);

}