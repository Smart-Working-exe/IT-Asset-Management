<?php
/**
 * Diese Datei enthält alle SQL Statements für die Funktionalität Benachrichtigungen
 */

function notif_software()
{
    $einstellung_sw = 5;
    try {
        $link = connectdb();
        $sql = "SELECT name, anzahl_gerate, ablaufzeitraum FROM softwarelizenzen 
                        WHERE ablaufzeitraum <= '".$einstellung_sw."' ORDER BY ablaufzeitraum";
        $result = sw_times($link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_BOTH);
        mysqli_close($link);
    } catch (Exception $ex) {
        $data = array(
            'id' => '-1',
            'error' => true,
            'name' => 'Datenbankfehler ' . $ex->getCode(),
            'beschreibung' => $ex->getMessage());
    } finally {
        return $data;
    }
}

function notif_ip()
{
    $einstellung_ip = 0.9;
    try {
        $link = connectdb();
        $sql = "SELECT raumnummer, belegung_ip, anzahl_ip FROM raum 
                        WHERE belegung_ip/anzahl_ip >= '".$einstellung_ip."'";
        $result = sw_times($link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_BOTH);
        mysqli_close($link);
    } catch (Exception $ex) {
        $data = array(
            'id' => '-1',
            'error' => true,
            'name' => 'Datenbankfehler ' . $ex->getCode(),
            'beschreibung' => $ex->getMessage());
    } finally {
        return $data;
    }
}

function notif_loan_student()
{
    $student = 'sp5111s';
    try {
        $link = connectdb();
        $sql = "SELECT art, geraet, status FROM ausleihanfragen
                        WHERE student = '".$student."'";
        $result = sw_times($link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_BOTH);
        mysqli_close($link);
    } catch (Exception $ex) {
        $data = array(
            'id' => '-1',
            'error' => true,
            'name' => 'Datenbankfehler ' . $ex->getCode(),
            'beschreibung' => $ex->getMessage());
    } finally {
        return $data;
    }
}

function notif_loan_employee()
{
    try {
        $link = connectdb();
        // Status = 0 bedeutet offene Anfragen, um die sich MAs kümmern können
        $sql = "SELECT COUNT() FROM ausleihanfragen WHERE status = 0";
        $result = sw_times($link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_BOTH);
        mysqli_close($link);
    } catch (Exception $ex) {
        $data = array(
            'id' => '-1',
            'error' => true,
            'name' => 'Datenbankfehler ' . $ex->getCode(),
            'beschreibung' => $ex->getMessage());
    } finally {
        return $data;
    }
}