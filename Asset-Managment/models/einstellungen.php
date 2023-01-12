<?php

function get_setting()
{
    $self = $_SESSION['name'];
    $link = connectdb();

    $settings_request = "SELECT benachrichtigung, benachrichtigung_ip from personen where fh_kuerzel = '$self'";
    $settings = mysqli_query($link,$settings_request);
    $data1 = mysqli_fetch_all($settings, MYSQLI_BOTH);
    mysqli_close($link);

    return $data1;
}

function change_setting(int $days)
{
    $self = $_SESSION['name'];

    // Nur Werte zwischen 1 und 60 gültig
    ($days < 1) ? ($optimized_setting = 1) : ($optimized_setting = $days);
    ($days > 60) ? ($optimized_setting = 60) : ($optimized_setting = $days);

    $link = connectdb();
    $settings_request = "UPDATE personen SET benachrichtigung = '$optimized_setting' WHERE fh_kuerzel = '$self'";
    mysqli_query($link, $settings_request);
    mysqli_close($link);

}


function change_setting_ip(int $free)
{
    $self = $_SESSION['name'];
    // Nur Werte zwischen 1 und 20 gültig
    ($free < 1) ? ($optimized_setting = 1) : ($optimized_setting = $free);
    ($free > 20) ? ($optimized_setting = 20) : ($optimized_setting = $free);

    $link = connectdb();
    $settings_request = "UPDATE personen SET benachrichtigung_ip = '$optimized_setting' WHERE fh_kuerzel = '$self'";
    mysqli_query($link, $settings_request);
    mysqli_close($link);

}