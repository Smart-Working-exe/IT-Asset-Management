<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/geraete.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/betriessystem.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/softwarelizenzen.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/filter.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/hinzufuegen.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/benachrichtigungen.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/logs.php');

/* Datei: controllers/AddController.php */
class AddController
{
    public function addSoftware(RequestData $rd)
    {

        if (!isset($_SESSION['login_ok']) && !($_SESSION['Rolle'] == 1)) {
            $_SESSION['target'] = $_SERVER["HTTP_REFERER"];
            header('Location: /login');
        }
        $var=[
            'software_add_hersteller'    => filter_input(INPUT_POST,'software_add_hersteller'),
            'software_add_name'          => filter_input(INPUT_POST,'software_add_lizenzname'),
            'software_add_version'       => filter_input(INPUT_POST,'software_add_softwareversion'),
            'software_add_anzahl_gerate' => filter_input(INPUT_POST,'software_add_anzahl_gerate'),
            'software_add_erwerbsdatum'  => filter_input(INPUT_POST,'software_add_erwerbedatum'),
            'software_add_ablaufdatum'   => filter_input(INPUT_POST,'software_add_ablaufdatum')
        ];
        //print_r($var);
        if ($var['software_add_name'] != null)
            db_add_software($var);
        //print_r('Location: ' . $_SERVER["HTTP_REFERER"]);

        if (isset($_SERVER["HTTP_REFERER"]))
            header('Location: ' . $_SERVER["HTTP_REFERER"]);
        //return view($_SERVER["HTTP_REFERER"],[]);
    }
}