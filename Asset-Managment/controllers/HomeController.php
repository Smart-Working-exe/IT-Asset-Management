<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/geraete.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/betriessystem.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/softwarelizenzen.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/filter.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/hinzufuegen.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/benachrichtigungen.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/logs.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/raum.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/einstellungen.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/ausleihanfragen.php');

/* Datei: controllers/HomeController.php */

class HomeController
{
    public function index(RequestData $request)
    {
        return view('home', ['rd' => $request]);
    }

    public function dashboard(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok'])) {
            $_SESSION['target'] = '/dashboard';
            header('Location: /login');
        }
        if ($_SESSION['Rolle'] == 1) {
            $notifs = notif_admin();
            return view('Dashboard.dashboard_admin', ['rq' => $rd, 'notifs' => $notifs]);
        } elseif ($_SESSION['Rolle'] == 2) {
            $notifs = notif_employee();
            return view('Dashboard.dashboard_mitarbeiter', ['rq'=>$rd, 'notifs'=>$notifs]);
        }
        elseif($_SESSION['Rolle'] == 3){
            if(isset($_POST['delete'])) { delete_notif_loan($_POST['delete']); }
            $notifs = notif_student();
            return view('Dashboard.dashboard_student', ['rq' => $rd, 'notifs' => $notifs]);
        }
    }

    public function einstellungen(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok'])) {
            $_SESSION['target'] = '/einstellungen';
            header('Location: /login');
        }
        if ($_SESSION['Rolle'] == 1) {
            if (isset($_POST["neue_einstellung_s"]) and $_POST["neue_einstellung_s"] != "") {
                change_setting($_POST["neue_einstellung_s"]);
            } else if (isset($_POST["neue_einstellung"])) {
                change_setting($_POST["neue_einstellung"]);
            }
            if (isset($_POST["neue_einstellung_ip_s"]) and $_POST["neue_einstellung_ip_s"] != "") {
                change_setting_ip($_POST["neue_einstellung_ip_s"]);
            } else if (isset($_POST["neue_einstellung_ip"])) {
                change_setting_ip($_POST["neue_einstellung_ip"]);
            }
            $setting = get_setting();
            return view('Einstellungen.einstellungen', ['user' => $_SESSION['Rolle'], 'setting' => $setting]);
        } else {
            if (isset($_POST["neue_einstellung_s"]) and $_POST["neue_einstellung_s"] != "") {
                change_setting($_POST["neue_einstellung_s"]);
            } else if (isset($_POST["neue_einstellung"])) {
                change_setting($_POST["neue_einstellung"]);
            }
            $setting = get_setting();
            return view('Einstellungen.einstellungen', ['user' => $_SESSION['Rolle'], 'setting' => $setting]);
        }
    }

    public function verleihung(RequestData $rd)
    {
        if(isset($_POST['accept_loan'])) {
            logger($_SESSION['name'], 3, "Leihe von ".$_POST['accept_loan']." wurde angenommen");
            accept_loan($_POST['accept_loan']);}
        if(isset($_POST['accept_return'])) {
            logger($_SESSION['name'], 3, "Gerät wurde ".$_POST['accept_return']." zurückgenommen");
            accept_return($_POST['accept_return']);}
        if(isset($_POST['reject'])) { reject($_POST['reject']);}
        $requests = get_open_requests();
        return view('Verleihung_Mitarbeiter.verleihung',['anfragen' => $requests]);
    }

    public function systemlogs(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok']) || !($_SESSION['Rolle'] == 1)) {
            $_SESSION['target'] = '/systemlogs';
            header('Location: /login');
        }
        return view('Systemlogs.systemlogs', [
            'data' => get_logs(get_filter_data($rd, 4)),
            'selected_filter' => get_filter_data($rd, 4,false)
        ]);
    }

    public function softwarelizenzen(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok']) || !($_SESSION['Rolle'] == 1)) {
            $_SESSION['target'] = '/softwarelizenzen';
            header('Location: /login');
        }
        if (isset($_POST['submit']) and $_POST['submit'] == 3) {
            logger($_SESSION['name'], 11, $rd->query['form_lizenzname']." wurde bearbeitet.");
            update_licences($rd);
        }
        if (isset($_POST['submit_delete_license'])) {
            delete_license($rd);
        }
        return view('Softwarelizenzen.softwarelizenzen', [
            'data' => get_SoftwarlizenzenTabledata(get_filter_data($rd, 3)),
            'selected_filter' => get_filter_data($rd, 3,false)
        ]);
    }

    public function raumauswahl(RequestData $rd)
    {
        if ($_SESSION['Rolle'] >= 3)
            return view('Raumauswahl.raumauswahl_studenten', []);
        else
            $raume = get_raume();
        return view('Raumauswahl.raumauswahl', ['raume' => $raume]);
    }

    public function ausleihe(RequestData $rd)
    {
        if (isset($_SESSION['login_ok']) && ($_SESSION['Rolle'] == 3)) {
            if (isset($_SESSION['login_ok']) && ($_SESSION['Rolle'] == 3)) {
                if (isset($_POST['loan'])) {
                    logger($_SESSION['name'], 3, "Ausleihe wurde für ".$_POST['loan'][0]." angefragt."); //Wo stehen die User und Geräte Daten
                    request_loan($_POST['loan']);
                }
                if (isset($_POST['return'])) {
                    logger($_SESSION['name'], 3, $_POST['return'][0]." wurde zurückgegeben angefragt.");
                    request_return($_POST['return']);
                }
                $eigene_geraete = get_own_devices();
                $ausleihbare_geraete = get_rentable_devices();
                $typen = ['','PC','Laptop','Maus','Monitor','Tastatur','Praktikumsmaterial','Sonstiges'];
                return view('Ausleihe_Student.ausleihe', ['owndevices' => $eigene_geraete, 'rentables' => $ausleihbare_geraete, 'typen' => $typen]);
            }
        }
    }

    public function get_color($max, $cur)
    {
        //$max = get_raum_belegung( $rd->query['raum'] ?? 'a001')['max'];
        //$cur = get_raum_belegung( $rd->query['raum'] ?? 'a001')['cur'];

        // Damit nie durch null geteilt werden kann
        if($max <= 0)
            return 'white';

        $diff = $cur / $max;
        if ($diff <= 1 / 5) {
            return 'darkgreen';
        } elseif ($diff > 1 / 5 && $diff <= 2 / 5) {
            return '#00a300';
        } elseif ($diff > 2 / 5 && $diff <= 3 / 5) {
            return 'yellow';
        } elseif ($diff > 3 / 5 && $diff <= 4 / 5) {
            return 'orange';
        } elseif ($diff > 4 / 5 && $diff <= 5 / 5) {
            return 'red';
        }
    }

    public function get_color_build($gebaude)
    {

        for ($i = 0; $i < count($gebaude); $i++) {
            $data[$i] = $this->get_color($gebaude[$i]['max'], $gebaude[$i]['cur']);
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
        if (isset($_POST['belegung'])) {
            logger($_SESSION['name'], 14, "In Raum ". $rd->query['raum']. " wurde die Belegung auf ".$_POST['belegung']. " geändert." );
            set_raum_belegung($_POST['belegung'], $rd->query['raum']);
        }

        if (isset($_POST['submit'])) {
            logger($_SESSION['name'], 4, $rd->query['form_name123']." wurde bearbeitet.");
            $edit_OOS=$_POST['form_OperationSystem'] ?? null;
            $edit_Software=$_POST['form_Software'] ?? null;
            editGeraete($rd,$edit_Software,$edit_OOS);
        }

        if (isset($_POST['submit_kommentar'])) {
            $rd->query['form_comment'] = $rd->query['textfeld'];
            $rd->query['form_deviceID'] = $rd->query['form_id'];
            addComment($rd);
        }


        if (isset($_POST['submit_delete'])) {
            logger($_SESSION['name'], 7, id_to_name($rd->query['submit_delete'])['name']." wurde gelöscht.");
            deleteDevice($rd);
        }

        if ($_SESSION['Rolle'] >= 3) {
            return view('Raumansicht.studenten.raumansicht_studenten', [
                'gebaeude' => $rd->query['gebaeude'] ?? 'a',
                'belegung' => get_belegung_gebaude($rd->query['gebaeude'] ?? 'a'),
                'ip' => get_raum_ip($rd->query['raum'] ?? 'Lager'),
                'color' => $this->get_color_build(get_belegung_gebaude($rd->query['gebaeude'] ?? 'a'))
            ]);
        }


        return view('Raumansicht.raumansicht', [
            'room' => $rd->query['raum'] ?? 'Lager',
            'user' => $_SESSION['Rolle'],
            'database_filter' => false,
            'data' => getGeraeteData(get_filter_data($rd, 1)),
            'filter_variable_data' => get_softwarelizenzen_betriessystem(), //Variable filter Daten wie zmb. softwarelizenzen
            'selected_filter' => get_filter_data($rd, 1,false),
            'max_belegung' => get_raum_belegung($rd->query['raum'] ?? 'a001')['max'],
            'cur_belegung' => get_raum_belegung($rd->query['raum'] ?? 'a001')['cur'],
            'ip' => get_raum_ip($rd->query['raum'] ?? 'a001'),
            'color' => $this->get_color(get_raum_belegung($rd->query['raum'] ?? 'a001')['max'], get_raum_belegung($rd->query['raum'] ?? 'a001')['cur']),
            'colorIP' => $this->get_color(get_raum_ip($rd->query['raum'] ?? 'a001')['anzahl_ip'], get_raum_ip($rd->query['raum'] ?? 'a001')['belegung_ip']),
            'raueme' => getAll_Rooms(),
            'dev'=> getGeraeteID_name(),
            'nicht_eigeneGeraete' => true
        ]);
    }

    public function eigeneGeraete(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok']) || !($_SESSION['Rolle'] == 2)) {
            $_SESSION['target'] = '/eigeneGeraete';
            header('Location: /login');
        }

        //damit, sollte jemand die url im Browser bearbeiten man immer nur auf seine eigenen Geräte kommt
        if (empty($rd->query['kuerzel']) || $rd->query['kuerzel'] != $_SESSION['name']) {
            header('Location: /eigeneGeraete?kuerzel=' . $_SESSION['name']);
        }

        if(isset($_POST['submit']) and $_POST['submit'] == "Submit"){
            isRoomnumberValid($rd);
        }
        if(isset($_POST['submit']) and $_POST['submit'] == "Submit2"){
             logger($_SESSION['name'], 5, id_to_name($rd->query['form_deviceID'])['name']." wurde kommentiert.");
            addComment($rd);
        }

        if(isset($_POST['to_remove'])){
            reset_used_by($_POST['to_remove']);
        }

        if (isset($_POST['submit']) and $_POST['submit'] == 1) {
            logger($_SESSION['name'], 4, $rd->query['form_name123']." wurde bearbeitet.");
            if(isset($_POST['form_Software'])){
                $edit_Software=$_POST['form_Software'];}
            else{
                $edit_Software=NULL;
            }
            if(isset($_POST['form_OperationSystem'])){
                $edit_OOS=$_POST['form_OperationSystem'];}
            else{
                $edit_OOS=NULL;
            }
            editGeraete($rd,$edit_Software,$edit_OOS);
        }

        return view('EigeneGeraete.eigeneGeraete', [
            'database_filter' => true,
            'data' => getGeraeteData(get_filter_data($rd, 1)),
            'filter_variable_data' => get_softwarelizenzen_betriessystem(), //Variable filter Daten wie zmb. softwarelizenzen
            'selected_filter' => get_filter_data($rd, 1,false),
            'dev'=> getGeraeteID_name(),
            'raueme' => getAll_Rooms()
        ]);
    }

    public function datenbank(RequestData $rd)
    {
        if (!isset($_SESSION['login_ok']) || !($_SESSION['Rolle'] == 1)) {
            $_SESSION['target'] = '/datenbank';
            header('Location: /login');
        }
        if (isset($rd->query['database'])) {
            if ($rd->query['database'] == 'personen') {
                if (isset($_POST['submit']) and $_POST['submit'] == 2) {
                    logger($_SESSION['name'], 8, $rd->query['form_personIdentifier']." wurde bearbeitet.");
                    update_User($rd);
                }
                if (isset($_POST['submit_delete_person'])) {
                    print_r($_POST['submit_delete_person']);
                    logger($_SESSION['name'], 10, $rd->query['form_personIdentifier']." wurde gelöscht.");
                    delete_user($rd);
                }

                return view('Datenbank.datenbank_personen', [
                    'typ' => 'personen',
                    'data' => get_user_tabledata(get_filter_data($rd, 2)),
                    'selected_filter' => get_filter_data($rd, 2,false)
                ]);
            } elseif ($rd->query['database'] == 'lizenzen') {
                if (isset($_POST['submit']) and $_POST['submit'] == 3) {
                    logger($_SESSION['name'], 11, $rd->query['form_lizenzname']." wurde bearbeitet.");
                    update_licences($rd);
                }
                if (isset($_POST['submit_delete_license'])) {
                  //  print_r("Hallo ");
                    logger($_SESSION['name'], 13, $rd->query['form_lizenzname']." wurde gelöscht.");
                    delete_license($rd);
                }


                return view('Datenbank.datenbank_lizenzen', [
                    'typ' => 'lizenzen',
                    'data' => get_SoftwarlizenzenTabledata(get_filter_data($rd, 3)),
                    'selected_filter' => get_filter_data($rd, 3,false)
                ]);
            }
        }

        if (isset($_POST['submit']) and $_POST['submit'] == 1) {
            logger($_SESSION['name'], 4, $rd->query['form_name123']." wurde bearbeitet.");
            if(isset($_POST['form_Software'])){
                $edit_Software=$_POST['form_Software'];}
            else{
                $edit_Software=NULL;
            }
            if(isset($_POST['form_OperationSystem'])){
                $edit_OOS=$_POST['form_OperationSystem'];}
            else{
                $edit_OOS=NULL;
            }
            editGeraete($rd,$edit_Software,$edit_OOS);
        }

        if (isset($_POST['submit_delete'])) {
            logger($_SESSION['name'], 7, id_to_name($rd->query['submit_delete'])['name']." wurde gelöscht.");
            deleteDevice($rd);
        }

        $filter_data = get_filter_data($rd, 1);

        return view('Datenbank.datenbank_geraete', [
            'typ' => 'geraete',
            'database_filter' => true,
            'data' => getGeraeteData($filter_data),
            'filter_variable_data' => get_softwarelizenzen_betriessystem(), //Variable filter Daten wie zmb. softwarelizenzen
            'selected_filter' => get_filter_data($rd, 1,false),
            'raueme' => getAll_Rooms(),
        ]);
    }

    // zum testen, im browser einfach /test aufrufen
    public function test(RequestData $rd)
    {
        teste_dich_gluecklich();
        return view('test', [
            'data' => $rd->query
        ]);
    }

}