<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/hinzufuegen.php');

/* Datei: controllers/AddController.php */
class AddController
{
    public function addSoftware(RequestData $rd)
    {

        if (!isset($_SESSION['login_ok']) && !($_SESSION['Rolle'] == 1)) {
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


    public function addUser(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok']) && !($_SESSION['Rolle'] == 1)) {
            header('Location: /login');
        }
        $var = [
            'user_add_fh_kuerzel' => filter_input(INPUT_POST, 'user_add_fh_kuerzel'),
            'user_add_vorname' => filter_input(INPUT_POST, 'user_add_vorname'),
            'user_add_nachname' => filter_input(INPUT_POST, 'user_add_nachname'),
            'user_add_rolle' => filter_input(INPUT_POST, 'user_add_rolle'),
            'user_add_passwort' => filter_input(INPUT_POST, 'user_add_passwort')
        ];
        //print_r($var);
        if ($var['user_add_vorname'] != null)
            db_add_user($var);
        //print_r('Location: ' . $_SERVER["HTTP_REFERER"]);

        if (isset($_SERVER["HTTP_REFERER"]))
            header('Location: ' . $_SERVER["HTTP_REFERER"]);
        return view($_SERVER["HTTP_REFERER"], []);
    }

    public function addDevice(RequestData $rd)
    {

        if (!isset($_SESSION['login_ok']) && !($_SESSION['Rolle'] == 1)) {
            $_SESSION['target'] = $_SERVER["HTTP_REFERER"];
            header('Location: /login');
        }
        $var=[
            'addDevicedeviceTyp'            => filter_input(INPUT_POST,'addDevicedeviceTyp'),
            'addDeviceName'                 => filter_input(INPUT_POST,'addDeviceName'),
            'addDeviceBetriebssystem'       => filter_input(INPUT_POST,'addDeviceBetriebssystem'),
            'addDeviceIP'                   => filter_input(INPUT_POST,'addDeviceIP'),
            'addDeviceHersteller'           => filter_input(INPUT_POST,'addDeviceHersteller'),
            'addDeviceSoftware'             => filter_input(INPUT_POST,'addDeviceSoftware'),
            'addDeviceersteInbetriebname'   => filter_input(INPUT_POST,'addDeviceersteInbetriebname'),
            'addDevicealterGerat'           => filter_input(INPUT_POST,'addDevicealterGerat'),
            'addDevicetechnischeEckdaten'   => filter_input(INPUT_POST,'addDevicetechnischeEckdaten'),
            'addDeviceKommentarGerat'       => filter_input(INPUT_POST,'addDeviceKommentarGerat')
        ];

        if ($var['addDeviceName'] != null)
            db_add_device($var);
        //print_r('Location: ' . $_SERVER["HTTP_REFERER"]);

        if (isset($_SERVER["HTTP_REFERER"]))
            header('Location: ' . $_SERVER["HTTP_REFERER"]);
        return view($_SERVER["HTTP_REFERER"],[]);

    }
}