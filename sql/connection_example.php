<?php
/**
 * - Praktikum DBWT. Autoren:
 * - Julian Grillenmeier, 3275807
 */
//get mysql login data from privat file
include('./mysql_data.php');

//check if mysql data is set correctly | if not, sideloading will be stopped
if (!(isset($db_host) && isset($db_user) && isset($db_pass) && isset($db_database) && isset($db_port))) {
    echo 'Error while loading database-credentials from mysql_data.php.php file!';
    exit(0);
}

//connect to db
$db = mysqli_connect($db_host, $db_user, $db_pass, $db_database, $db_port);

//print error and stop sideloading if the db is not reachable
if (!$db) {
    echo "Error while connecting to database: ", mysqli_connect_error();
    exit();
}

$sql = "SELECT id, name, hersteller, age FROM geraet";

$result = mysqli_query($db, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<li>', $row['id'], ':', $row['name'], '</li>';
}

mysqli_free_result($result);
mysqli_close($db);
