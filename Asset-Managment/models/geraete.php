<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/filter.php');


const SEPERATOR = ';';


function teste_dich_gluecklich()
{
    $db = connectdb();
    for ($i = 0; $i < 0; $i++) {
        $name = "T_PC_V3_" . $i;
        $typ = 1;
        $hersteller = "Matrix";
        $age = date('Y-m-d', strtotime("22.12.2022"));
        $betrieb = date('Y-m-d', strtotime("22.12.2022"));

        $room = "Test";
        $ausleihbar = 0;
        $technischeEckdaten = "Ein Test" . $i . " ;noch einer" . $i . " ; und noch einen" . $i;
        $kommentar = "Nein, ich bin der beste PC";


        $absenden = $db->prepare("INSERT INTO geraet(name, typ, hersteller, age, betrieb,raumnummer,technische_eckdaten,kommentar,ausleihbar) VALUES(?,?,?,?,?,?,?,?,?)");
        $absenden->bind_param('ssssssssi', $name, $typ, $hersteller, $age, $betrieb, $room, $technischeEckdaten, $kommentar, $ausleihbar);
        $absenden->execute();

        $order_id = $db->insert_id;

        $used_randomNumbers = [];
        for ($b = 0; $b < random_int(1, 4); $b++) {
            $betriebssystem = random_int(1, 6);
            if (!isset($used_randomNumbers[$betriebssystem])) {
                $absenden2 = $db->prepare("INSERT INTO geraet_hat_betriebssystem(geraetid,betriebssystemid)VALUES (?,?)");
                $absenden2->bind_param('ii', $order_id, $betriebssystem);
                $absenden2->execute();
                $used_randomNumbers[$betriebssystem] = "aipsgfj";
            }
        }

        $used_randomNumbers2 = [];
        for ($b = 0; $b < random_int(1, 5); $b++) {
            $software = random_int(35, 39);
            if (!isset($used_randomNumbers2[$software])) {
                $absenden2 = $db->prepare("INSERT INTO geraet_hat_software(geraetid,softwarelizenzid)VALUES (?,?)");
                $absenden2->bind_param('ii', $order_id, $software);
                $absenden2->execute();
                $used_randomNumbers2[$software] = "aipsgfj";
            }
        }

    }
    $db->close();

}

/**gibt die view view_get_geraet_hat_software als hashMap zurueck <br>
 * name und version werden zusammengefasst
 * @return array die keys fuer die hashmap sind die geraete id's
 */
function get_geraet_hat_software(): array
{
    $link = connectdb();
    $sql = "SELECT * FROM view_geraet_hat_software";

    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // zur hashmap
    foreach ($data as $value)
        $return_data[$value['geraetid']][] = $value['name'];

    return $return_data;
}

function get_geraet_hat_software_id(): array
{
    $link = connectdb();
    $sql = "SELECT * FROM geraet_hat_software";

    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // zur hashmap
    foreach ($data as $value)
        $return_data[$value['geraetid']][] = $value['softwarelizenzid'];

    return $return_data;
}

/**gibt die view view_get_geraet_hat_betriebssystem als hashMap zurueck <br>
 * name und version werden zusammengefasst
 * @return array die keys fuer die hashmap sind die geraete id's
 */
function get_geraet_hat_betriebssystem(): array
{
    $link = connectdb();
    $sql = "SELECT * FROM view_geraet_hat_betriebssystem";

    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);


    // zur hashmap
    foreach ($data as $value)
        $return_data[$value['geraetid']][] = $value['name'];

    return $return_data;
}


function get_geraet_hat_betriebssystem_id(): array
{
    $link = connectdb();
    $sql = "SELECT * FROM geraet_hat_betriebssystem";

    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);


    // zur hashmap
    foreach ($data as $value)
        $return_data[$value['geraetid']][] = $value['betriebssystemid'];

    return $return_data;
}

/**
 * Gibt alle Geräte aus der Datenbank wieder, auf den den $filter passen
 * @param $filter array der Schlüssel gibt an, nach welcher Eigenschaft gefiltert wird, diese MÜSSEN der Eigenschafts-Namen in der Datenbank entsprechen! Für Namen und technische Daten als Schlüssel 'suche'<br>
 *                      Der Wert, was die Eigenschaft sein soll. <br>
 * <br>
 *                      Softwarelizenzen und Betriessystem MÜSSEN als die entsprechende id uebergeben werden und der Schlüssel so heißen wie sie im table gerät_hat... benannt sind.<br>
 * <br>
 *                      Als Beispiel 'Array([age] => 3 [betriebssystem] => 1)' sucht nach einem Gerät welches 3 Jahre alt ist und Windows 10 besitzt.
 * @return array array gibt Geräte als 2 Dimensionales array wieder 1 Dimension = das Gerät 2 Dimension = eigenschaften des Gerätes,
 * wobei die Schlüssel für die Zweite DImension den Namen in der Datenbank entsprechend sind. <br> <br>
 * Als Beispiel: $array[0]['name'] gibt den Namen
 * des ersten Gerätes wieder <br>
 * @author jan
 */
function getGeraeteData($filter = [])
{


    $link = connectdb();

    // get geräte
    $sql = 'SELECT id,name,typ,hersteller,age,betrieb,raumnummer,`ip_adresse`,ausleihbar,technische_eckdaten,kommentar FROM geraet';

    $sql = filter_to_sql($sql, 1, $filter);


    $result = mysqli_query($link, $sql);


    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $geraet_hat_betriebssystem = get_geraet_hat_betriebssystem();
    $geraet_hat_betriebssystem_id = get_geraet_hat_betriebssystem_id();
    $geraet_hat_software = get_geraet_hat_software();
    $geraet_hat_software_id = get_geraet_hat_software_id();

    foreach ($data as $key => $value) {


        // nur pcs oder laptops, hinzufuegen von betriebssystemen und software
        if ($value['id'] >= 2) {
            if (!empty($geraet_hat_betriebssystem[$value['id']])) {
                $data[$key]['betriebssystem'] = $geraet_hat_betriebssystem[$value['id']];
                $data[$key]['betriebssystem_id'] = $geraet_hat_betriebssystem_id[$value['id']];
            }
            if (!empty($geraet_hat_software[$value['id']])) {
                $data[$key]['software'] = $geraet_hat_software[$value['id']];
                $data[$key]['software_id'] = $geraet_hat_software_id[$value['id']];
            }
        }


        //technische_eckdaten von string zu array
        if (!empty($data[$key]['technische_eckdaten']))
            $data[$key]['technische_eckdaten_liste'] = explode(SEPERATOR, $value['technische_eckdaten']);

        $data[$key]['alter'] = floor((time() - strtotime($value['age'])) / 31556926);

        $data[$key]['age'] = date_create($value['age'])->format('d.m.Y');
        $data[$key]['betrieb'] = date_create($value['betrieb'])->format('d.m.Y');
    }

    mysqli_close($link);

//1 = Computer, 2 = Laptop, 3 = Monitor, 4 = Tastatur, 5 = Maus, 6 = Praktikum Utensilien, 7 = Accessoires

    foreach ($data as $key => $value) {
        switch ($value['typ']) {

            case 1:
                $data[$key]['typ'] = "Computer";
                break;
            case 2:
                $data[$key]['typ'] = "Laptop";
                break;
            case 3:
                $data[$key]['typ'] = "Monitor";
                break;
            case 4:
                $data[$key]['typ'] = "Tastatur";
                break;
            case 5:
                $data[$key]['typ'] = "Maus";
                break;
            case 6:
                $data[$key]['typ'] = "Praktikumsmaterial";
                break;
            case 7:
                $data[$key]['typ'] = "Accessoires";
                break;

        }


    }


    return $data;

}

function editGeraete(RequestData $rd, $edit_Software, $edit_OOS)
{

    $link = connectdb();
    mysqli_begin_transaction($link);

    if (empty($rd->query['form_Ausleihbar']) == 1)
        $ausleihbar = 0;
    else
        $ausleihbar = 1;

    // get Typ und Raum (zum aendern von WS und IP count)
    $get = 'SELECT typ, raumnummer from geraet where id = ' . $rd->query['form_id'] . ';';
    $sqlget = mysqli_query($link, $get);
    $data = mysqli_fetch_all($sqlget);
    $typ = $data[0][0];
    $raum_alt = $data[0][1];
    $raum_neu = $rd->query['form_room'];
    //var_dump($raum_neu,$raum_alt);
    //Raum updaten, falls Laptop oder PC und Raumänderung
    if ($raum_alt != $raum_neu && ($typ == 1 || $typ == 2)) {
        if ($raum_alt == 'Lager') {  // nur neuen Raum ändern
            $update = "UPDATE raum set anzahl_ws = anzahl_ws+1, belegung_ip = IF(belegung_ip < raum.anzahl_ip, belegung_ip+1, belegung_ip) where raumnummer = '$raum_neu'";
            mysqli_query($link, $update);
        } else if ($raum_neu == 'Lager') {   // nur alten Raum ändern
            $update = "UPDATE raum set anzahl_ws = IF(anzahl_ws > 1, anzahl_ws-1, anzahl_ws), belegung_ip = 
                        IF(belegung_ip > 0, belegung_ip-1, belegung_ip) WHERE raumnummer = '$raum_alt' ";
            mysqli_query($link, $update);
        } else {   // Beide ändern
            $update = "UPDATE raum set anzahl_ws = anzahl_ws+1, belegung_ip = IF(belegung_ip < raum.anzahl_ip, belegung_ip+1, belegung_ip) where raumnummer = '$raum_neu';";
            $update .= "UPDATE raum set anzahl_ws = IF(anzahl_ws > 1, anzahl_ws-1, anzahl_ws), belegung_ip = IF(belegung_ip > 0, belegung_ip-1, belegung_ip) where raumnummer = '$raum_alt';";
            mysqli_multi_query($link, $update);
            do {
            } while (mysqli_next_result($link));
        }
    }

    $sql = 'UPDATE geraet SET name = "' . $rd->query['form_name123'] . '", typ = ' . $rd->query['form_deviceType'] . ', 
            hersteller = "' . $rd->query['form_hersteller'] . '", raumnummer = "' . $rd->query['form_room'] . '", 
            ausleihbar = "' . $ausleihbar . '", technische_eckdaten = "' . $rd->query['form_technischeEckdaten'] . '", 
            kommentar = "' . $rd->query['form_comment'] . '" WHERE id =' . $rd->query['form_id'] . ' ; ';
    //

    mysqli_query($link, $sql);

    $age = date('Y-m-d', strtotime($rd->query['form_age']));
    $betrieb = date('Y-m-d', strtotime($rd->query['form_betrieb']));
    $id = $rd->query['form_id'];

    $sql = "UPDATE geraet SET betrieb ='$betrieb', age ='$age' WHERE id ='$id'";
    mysqli_query($link, $sql);
    $order_id = $rd->query['form_id'];

    $sql = 'DELETE FROM geraet_hat_betriebssystem WHERE geraetid = ' . $rd->query['form_id'] . ';';
    mysqli_query($link, $sql);
    $sql = 'DELETE FROM geraet_hat_software WHERE geraetid = ' . $rd->query['form_id'] . ';';
    mysqli_query($link, $sql);

    if ($edit_OOS != NULL) {
        foreach ($edit_OOS as $value) {
            $absenden2 = $link->prepare("INSERT INTO geraet_hat_betriebssystem(geraetid,betriebssystemid)VALUES (?,?)");
            $value = (int)$value;
            $absenden2->bind_param('ii', $order_id, $value);
            $absenden2->execute();
        }
    }
    if ($edit_Software != NULL) {
        foreach ($edit_Software as $value2) {
            $absenden3 = $link->prepare("INSERT INTO geraet_hat_software(geraetid,softwarelizenzid)VALUES (?,?)");
            $value2 = (int)$value2;
            $absenden3->bind_param('ii', $order_id, $value2);
            $absenden3->execute();
        }
    }

    mysqli_commit($link);
    mysqli_close($link);
}

;

function addComment(RequestData $rd)
{
    $link = connectdb();

    $sql = 'UPDATE geraet SET kommentar = "' . $rd->query['form_comment'] . '" WHERE id =' . $rd->query['form_deviceID'] . ' ; ';
    //

    $result = mysqli_query($link, $sql);

    mysqli_close($link);

}

function getGeraeteID_name()
{
    $link = connectdb();

    // get geräte
    $sql = 'SELECT id,name, personen_id, ausleihbar FROM geraet';
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);

    return $data;
}


function deleteDevice(RequestData $rd)
{
    $link = connectdb();
    mysqli_begin_transaction($link);

    // get Typ und Raum (zum aendern von WS und IP count)
    $get = 'SELECT typ, raumnummer from geraet where id = ' . $rd->query['submit_delete'] . ';';
    $sqlget = mysqli_query($link, $get);
    $data = mysqli_fetch_all($sqlget);
    $typ = $data[0][0];
    $raum = $data[0][1];

    // Löschen
    $sql = 'DELETE FROM geraet WHERE id = ' . $rd->query['submit_delete'] . ';';
    mysqli_query($link, $sql);

    // Raum updaten
    if (($typ == 1 || $typ == 2) && $raum != "Lager") {
        $update = "UPDATE raum set anzahl_ws = IF(anzahl_ws > 1, anzahl_ws-1, anzahl_ws), belegung_ip = 
                        IF(belegung_ip > 0, belegung_ip-1, belegung_ip) where raumnummer = '$raum'";
        mysqli_query($link, $update);
    }

    mysqli_commit($link);
    mysqli_close($link);
}

function set_user_for_device($id)
{
    $link = connectdb();
    $user = $_SESSION['name'];
    $sql = "UPDATE geraet SET personen_id = '$user' WHERE id = '$id'";

    mysqli_query($link, $sql);

    mysqli_close($link);
}

function id_to_name($id)
{
    $link = connectdb();

    $sql = "SELECT name FROM geraet where id = '$id'  ";
    $result = mysqli_query($link, $sql);

    return mysqli_fetch_assoc($result);
}

function reset_used_by($id)
{
    $link = connectdb();

    $sql = "UPDATE geraet SET personen_id = null WHERE id = '$id';";

    mysqli_query($link, $sql);

    mysqli_close($link);
}