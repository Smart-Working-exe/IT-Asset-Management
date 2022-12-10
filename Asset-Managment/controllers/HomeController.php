<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/geraete.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/betriessystem.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/softwarelizenzen.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/filter.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/hinzufuegen.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/benachrichtigungen.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/logs.php');

/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request) {
        return view('home', ['rd' => $request ]);
    }

    public function dashboard(RequestData $rd){

        if (!isset($_SESSION['login_ok'])) {
            $_SESSION['target'] = '/dashboard';
            header('Location: /login');
        }
        if($_SESSION['Rolle'] == 1){
            $notifs = notif_admin();
            return view('Dashboard.dashboard_admin', ['rq'=>$rd, 'notifs'=>$notifs]);
        }
        elseif ($_SESSION['Rolle'] == 2){
            $notifs = notif_employee();
            return view('Dashboard.dashboard_mitarbeiter', ['rq'=>$rd, 'notifs'=>$notifs]);
        }
        elseif($_SESSION['Rolle'] == 3){
            $notifs = notif_student();
            return view('Dashboard.dashboard_student', ['rq'=>$rd, 'notifs'=>$notifs]);
        }
    }

    public function einstellungen(RequestData $rd){
        if (!isset($_SESSION['login_ok'])) {
            $_SESSION['target'] = '/einstellungen';
            header('Location: /login');
        }
        return view ('Einstellungen.einstellungen',['user' => $_SESSION['Rolle']]);
    }

    public function verleihung(RequestData $rd)
    {

        //ist das nur für mitarbeiter?
        return view('Verleihung_Mitarbeiter.verleihung',[]);
    }

    public function systemlogs(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok']) && !($_SESSION['Rolle'] == 1)) {
            $_SESSION['target'] = '/systemlogs';
            header('Location: /login');
        }
        return view('Systemlogs.systemlogs',[
                    'data' => get_logs(get_filter_data($rd,4)),
                    'selected_filter' => get_filter_data($rd,4)
        ]);
    }

    public function softwarelizenzen(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok']) && !($_SESSION['Rolle'] == 1)) {
            $_SESSION['target'] = '/softwarelizenzen';
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
        if ($var['software_add_name'] != null)
            db_add_software($var);
        return view('Softwarelizenzen.softwarelizenzen',[
                    'data' => get_SoftwarlizenzenTabledata(get_filter_data($rd,3)),
                    'selected_filter' => get_filter_data($rd,3)
        ]);
    }

    public function raumauswahl(RequestData $rd)
    {
        if($_SESSION['Rolle'] >= 3)
             return view('Raumauswahl.raumauswahl_studenten',[]);
        else
            return view('Raumauswahl.raumauswahl',[]);

    }

    public function ausleihe(RequestData $rd)
    {
        return view('Ausleihe_Student.ausleihe',[]);
    }

    public function raumansicht(RequestData $rd)
    {
        // 1 = Admin, 2 = Mitarbeiter, 3 = Student

        if (!isset($_SESSION['login_ok'])) {
            $_SESSION['target'] = '/raumansicht';
            header('Location: /login');
        }

        if($_SESSION['Rolle'] >= 3) {
            return view('Raumansicht.studenten.raumansicht_studenten', [
                'gebaeude' => $rd->query['gebaeude'] ?? 'a'
            ]);
        }

        return view('Raumansicht.raumansicht',[
                'room' => $rd->query['raum'] ?? 'a001',
                'user' => $_SESSION['Rolle'],
                'database_filter' => false,
                'data' => getGeraeteData(get_filter_data($rd,1)),
                'filter_variable_data' => get_softwarelizenzen_betriessystem(), //Variable filter Daten wie zmb. softwarelizenzen
                'selected_filter' => get_filter_data($rd,1)
        ]);
    }

    public function eigeneGeraete(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok']) && !($_SESSION['Rolle'] == 2)) {
            $_SESSION['target'] = '/eigeneGeraete';
            header('Location: /login');
        }

        //damit, sollte jemand die url im Browser bearbeiten man immer nur auf seine eigenen Geräte kommt
        if(empty($rd->query['kuerzel']) ||$rd->query['kuerzel'] != $_SESSION['name'] ) {
            header('Location: /eigeneGeraete?kuerzel='.$_SESSION['name']);
        }
        return view('EigeneGeraete.eigeneGeraete', [
            'database_filter' => true,
            'data' => getGeraeteData(get_filter_data($rd,1)),
            'filter_variable_data' => get_softwarelizenzen_betriessystem(), //Variable filter Daten wie zmb. softwarelizenzen
            'selected_filter' => get_filter_data($rd,1)
        ]);
    }

    public function datenbank(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok']) && !($_SESSION['Rolle'] == 1)) {
            $_SESSION['target'] = '/datenbank';
            header('Location: /login');
        }
        if(isset($rd->query['database'])) {
            if ($rd->query['database'] == 'personen') {
                return view('Datenbank.datenbank_personen', [
                    'typ' => 'personen',
                    'data' => get_user_tabledata(get_filter_data($rd,2)),
                    'selected_filter' => get_filter_data($rd,2)
                ]);
            } elseif ($rd->query['database'] == 'lizenzen') {
                return view('Datenbank.datenbank_lizenzen', [
                    'typ' => 'lizenzen',
                    'data' => get_SoftwarlizenzenTabledata(get_filter_data($rd,3)),
                    'selected_filter' => get_filter_data($rd,3)
                ]);
            }
        }

        return view('Datenbank.datenbank_geraete',[
            'typ' => 'geraete',
            'database_filter' => true,
            'data' => getGeraeteData(get_filter_data($rd,1)),
            'filter_variable_data' => get_softwarelizenzen_betriessystem(), //Variable filter Daten wie zmb. softwarelizenzen
            'selected_filter' => get_filter_data($rd,1)
        ]);
    }


    // zum testen, im browser einfach /test aufrufen
    public function test(RequestData $rd)
    {
        return view('test',[
            'data' => get_softwarelizenzen_betriessystem()
        ]);
    }

}