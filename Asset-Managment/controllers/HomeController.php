<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/geraete.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/betriessystem.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/softwarelizenzen.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/filter.php');

/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request) {
        return view('home', ['rd' => $request ]);
    }
    
   /*public function login(RequestData $rd){
       //Set true to show "incorrect login data" warning
       $loginFailed = false;
        return view('Login.login', ['rq'=>$rd,'loginFailed'=>$loginFailed]);
   }*/
    public function dashboard(RequestData $rd){

        if (!isset($_SESSION['login_ok'])) {
            $_SESSION['target'] = '/dashboard';
            header('Location: /login');
        }
        if($_SESSION['Rolle'] == 1){
            return view('Dashboard.dashboard_admin', ['rq'=>$rd]);
        }
        elseif ($_SESSION['Rolle'] == 2){
            return view('Dashboard.dashboard_mitarbeiter', ['rq'=>$rd]);
        }
        elseif($_SESSION['Rolle'] == 3){
            return view('Dashboard.dashboard_student', ['rq'=>$rd]);
        }
    }

    public function dashboard_mitarbeiter(RequestData $rd){
        if (!isset($_SESSION['login_ok']) || !($_SESSION['Rolle'] == 2)) {
            $_SESSION['target'] = '/dashboard_mitarbeiter';
            header('Location: /login');
        }
    }
    public function dashboard_student(RequestData $rd){
        if (!isset($_SESSION['login_ok']) && !($_SESSION['Rolle'] == 3)) {
            $_SESSION['target'] = '/dashboard_student';
            header('Location: /login');
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
        return view('Systemlogs.systemlogs',[]);

    }

    public function softwarelizenzen(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok']) && !($_SESSION['Rolle'] == 1)) {
            $_SESSION['target'] = '/softwarelizenzen';
            header('Location: /login');
        }
        return view('Softwarelizenzen.softwarelizenzen',[]);

    }

    public function raumauswahl(RequestData $rd)
    {
        $student = false;//set true um raumauswahl fuer studenten zu bekommen
        if($student)
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
                'filter_variable_data' => get_softwarelizenzen_betriessystem() //Variable filter Daten wie zmb. softwarelizenzen
        ]);
    }

    public function eigeneGeraete(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok']) && !($_SESSION['Rolle'] == 2)) {
            $_SESSION['target'] = '/eigeneGeraete';
            header('Location: /login');
        }
        return view('EigeneGeraete.eigeneGeraete', [
            'database_filter' => true,
            'filter_variable_data' => get_softwarelizenzen_betriessystem() //Variable filter Daten wie zmb. softwarelizenzen
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
                    'typ' => 'personen'
                ]);
            } elseif ($rd->query['database'] == 'lizenzen') {
                return view('Datenbank.datenbank_lizenzen', [
                    'typ' => 'lizenzen'
                ]);
            }
        }

        return view('Datenbank.datenbank_geraete',[
            'typ' => 'geraete',
            'database_filter' => true,
            'data' => getGeraeteData(get_filter_data($rd)),
            'filter_variable_data' => get_softwarelizenzen_betriessystem(), //Variable filter Daten wie zmb. softwarelizenzen
            'test' => get_filter_data($rd)
        ]);
    }


    // zum testen, im browser einfach /test aufrufen
    public function  test(RequestData $rd)
    {
        return view('test',[
            'data' => get_softwarelizenzen_betriessystem()
        ]);
    }

}