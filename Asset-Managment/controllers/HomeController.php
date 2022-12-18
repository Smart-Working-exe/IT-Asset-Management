<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/geraete.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/betriessystem.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/softwarelizenzen.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/filter.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/hinzufuegen.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/benachrichtigungen.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/logs.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/raum.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/einstellungen.php');

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
            delete_notif_loan($_GET['delete']);
            $notifs = notif_student();
            return view('Dashboard.dashboard_student', ['rq'=>$rd, 'notifs'=>$notifs]);
        }
    }

    public function einstellungen(RequestData $rd){
        if (!isset($_SESSION['login_ok'])) {
            $_SESSION['target'] = '/einstellungen';
            header('Location: /login');
        }
        if($_SESSION['Rolle'] == 1){
            if($_POST["neue_einstellung_s"] != "") {change_setting($_POST["neue_einstellung_s"]);}
            else if(isset($_POST["neue_einstellung"])) {change_setting($_POST["neue_einstellung"]);}
            if($_POST["neue_einstellung_ip_s"] != "") {change_setting_ip($_POST["neue_einstellung_ip_s"]);}
            else if(isset($_POST["neue_einstellung_ip"])) {change_setting_ip($_POST["neue_einstellung_ip"]);}
            $setting = get_setting();
            $setting_ip = get_setting_ip();
            return view('Einstellungen.einstellungen', ['user' => $_SESSION['Rolle'], 'setting' => $setting, 'setting_ip' => $setting_ip]);
        }
        else{
            if($_POST["neue_einstellung_s"] != "") {change_setting($_POST["neue_einstellung_s"]);}
            else if(isset($_POST["neue_einstellung"])) {change_setting($_POST["neue_einstellung"]);}
            $setting = get_setting();
            return view ('Einstellungen.einstellungen',['user' => $_SESSION['Rolle'], 'setting' => $setting]);
        }
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
            $raume = get_raume();
            return view('Raumauswahl.raumauswahl',['raume' => $raume]);
    }

    public function ausleihe(RequestData $rd)
    {
        if ( isset($_SESSION['login_ok']) && ($_SESSION['Rolle'] == 3)) {


            return view('Ausleihe_Student.ausleihe',[]);
        }

    }

    public function get_color($max, $cur){
        //$max = get_raum_belegung( $rd->query['raum'] ?? 'a001')['max'];
        //$cur = get_raum_belegung( $rd->query['raum'] ?? 'a001')['cur'];
        $diff = $cur/$max;
        if($diff <= 1/5){
            return 'darkgreen';
        }elseif ($diff > 1/5 && $diff <= 2/5){
            return '#00ff00';
        }elseif ($diff > 2/5 && $diff <= 3/5){
            return 'yellow';
        }elseif ($diff > 3/5 && $diff <= 4/5){
            return 'orange';
        }elseif ($diff > 4/5 && $diff <= 5/5){
            return 'red';
        }
    }

    public function get_color_build($gebaude){

        for($i = 0; $i<count($gebaude); $i++){
            $data[$i] = $this->get_color( $gebaude[$i]['max'],$gebaude[$i]['cur']);
        }
        return $data;
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
                'gebaeude' => $rd->query['gebaeude'] ?? 'a',
                'belegung' => get_belegung_gebaude($rd->query['gebaeude'] ?? 'a'),
                'color' => $this->get_color_build(get_belegung_gebaude($rd->query['gebaeude'] ?? 'a'))
            ]);
        }



        return view('Raumansicht.raumansicht',[
                'room' => $rd->query['raum'] ?? 'a001',
                'user' => $_SESSION['Rolle'],
                'database_filter' => false,
                'data' => getGeraeteData(get_filter_data($rd,1)),
                'filter_variable_data' => get_softwarelizenzen_betriessystem(), //Variable filter Daten wie zmb. softwarelizenzen
                'selected_filter' => get_filter_data($rd,1),
                'max_belegung' => get_raum_belegung( $rd->query['raum'] ?? 'a001')['max'],
                'cur_belegung' => get_raum_belegung( $rd->query['raum'] ?? 'a001')['cur'],
                'color' => $this->get_color(get_raum_belegung( $rd->query['raum'] ?? 'a001')['max'],get_raum_belegung( $rd->query['raum'] ?? 'a001')['cur'])
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