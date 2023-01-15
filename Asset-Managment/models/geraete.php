<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/filter.php');


const SEPERATOR = ';';


function teste_dich_gluecklich()
{
    $db = connectdb();

    $original_time_limit = ini_get("max_execution_time");
    set_time_limit(1200); // Erhöhe die maximale Ausführungszeit auf 5 Minuten (300 Sekunden)

    $hersteller_array = array("Samsung", "LG", "Apple", "Dell", "HP", "Lenovo", "Acer", "ASUS", "Microsoft", "Sony");

    $tech_specs = array(
        "Intel Core i9-9900K",
        "NVIDIA GeForce RTX 3080",
        "32 GB DDR4 RAM",
        "2 TB NVMe SSD",
        "ASUS ROG Maximus XI Hero",
        "Corsair RM850x 850W 80+ Gold",
        "Corsair H150i Elite Capellix",
        "Corsair Dominator Platinum RGB 32 GB (4 x 8 GB) DDR4-3200",
        "Samsung 970 EVO 2 TB NVMe SSD",
        "ASUS ROG Swift PG279QZ 27.0\" 1440p 165Hz G-Sync",
        "Corsair K95 RGB Platinum XT",
        "Corsair Dark Core RGB/SE Wireless Gaming Mouse",
        "Corsair MM1000 Qi Wireless Charging Mouse Pad",
        "LG 34UM68-P 34.0\" 1080p 75Hz Freesync",
        "Corsair Vengeance LPX 16 GB (2 x 8 GB) DDR4-3000",
        "Samsung 860 EVO 1 TB 2.5\" Solid State Drive",
        "ASRock Z270M-ITX/ac",
        "Seasonic FOCUS Plus Gold 750 W 80+ Gold",
        "Corsair H100i v2 70.7 CFM Liquid CPU Cooler",
        "Corsair Vengeance LPX 16 GB (2 x 8 GB) DDR4-3200",
        "Samsung 860 EVO 1 TB 2.5\" Solid State Drive",
        "ASRock Z270M-ITX/ac",
        "Seasonic FOCUS Plus Gold 750 W 80+ Gold",
        "Corsair H100i v2 70.7 CFM Liquid CPU Cooler",
        "Corsair Vengeance LPX 16 GB (2 x 8 GB) DDR4-3200",
        "Samsung 860 EVO 1 TB 2.5\" Solid State Drive",
        "ASRock Z270M-ITX/ac",
        "Seasonic FOCUS Plus Gold 750 W 80+ Gold",
        "Corsair H100i v2 70.7 CFM Liquid CPU Cooler");

    $comments = array(
        "Flackert manchmal",
        "Gut für Bildverarbeitung",
        "Gut für VMs",
        "Schnelles Booten",
        "Leicht überhitzt",
        "Tastatur etwas laut",
        "Gute Klangqualität",
        "Geringe Lüftergeräusche",
        "Leicht zu transportieren",
        "Braucht häufiges Neustarten",
        "Gute Performance für Spiele",
        "Etwas schwerer",
        "Gut für Entwicklungsumgebungen",
        "Gute Wlan-Reichweite",
        "Sehr schnelles booten"
    );


    for ($i = 1; $i <= 500; $i++) {
        $name = "Laptop_V4_" . $i;
        $typ = 2;
        $hersteller = $hersteller_array[array_rand($hersteller_array)];
        $age = date('Y-m-d', strtotime("-" . rand(0, 365 * 10) . " days"));
        $betrieb = date('Y-m-d', strtotime("-" . rand(0, 365 * 10) . " days"));
        if ($betrieb > $age) {
            $betrieb = $age;
        }
        $room = "Lager";
        $ausleihbar = 0;

        $tech_specs_count = rand(0, 2);
        $comments_count = rand(0, 3);

        $random_tech_specs = array();
        for ($j = 0; $j < $tech_specs_count; $j++) {
            $random_tech_specs[] = $tech_specs[array_rand($tech_specs)];
        }
        $random_comments = array();
        for ($j = 0; $j < $comments_count; $j++) {
            $random_comments[] = $comments[array_rand($comments)];
        }
        $technischeEckdaten = implode("; ", $random_tech_specs);
        $kommentar = implode("; ", $random_comments);

        $absenden = $db->prepare("INSERT INTO geraet(name, typ, hersteller, age, betrieb,raumnummer,technische_eckdaten,kommentar,ausleihbar) VALUES(?,?,?,?,?,?,?,?,?)");
        $absenden->bind_param('ssssssssi', $name, $typ, $hersteller, $age, $betrieb, $room, $technischeEckdaten, $kommentar, $ausleihbar);
        $absenden->execute();
        $order_id = $db->insert_id;

        do {
            $result = $db->query("SELECT raumnummer, anzahl_ws, belegung_ip FROM raum ORDER BY RAND() LIMIT 1");
            $randomRoom = $result->fetch_array();
            $randomRoomNumber = $randomRoom['raumnummer'];
            $randomRoomWS = $randomRoom['belegung_ip'];
            $randomRoomMaxWS = $randomRoom['anzahl_ws'];
            if ($randomRoomNumber == "Lager") {
                break;
            }
        } while ($randomRoomWS >= $randomRoomMaxWS);

        $absenden3 = $db->prepare("UPDATE geraet SET raumnummer = ? WHERE id = ?");
        $absenden3->bind_param('si', $randomRoomNumber, $order_id);
        $absenden3->execute();

        $result = $db->query("SELECT * FROM raum WHERE raumnummer = '$randomRoomNumber'");
        $row = $result->fetch_array();
        $ip_range_start = $row["ip-adressbereich_beginn"];
        $ip_range_end = $row["ip-adressbereich_ende"];
        $ip_range_count = $row["anzahl_ws"];
        $ip_range_used = $row["belegung_ip"];

        $ip_range_used++;
        $new_ip = ip2long($ip_range_start) + $ip_range_used;
        $new_ip = long2ip($new_ip);

        $absenden4 = $db->prepare("UPDATE geraet SET ip_adresse = ? WHERE id = ?");
        $absenden4->bind_param('si', $new_ip, $order_id);
        $absenden4->execute();

        $random_ws = mt_rand(0, $ip_range_count - 1);
        $absenden5 = $db->prepare("UPDATE raum SET belegung_ip = ?, belegte_ws = ? WHERE raumnummer = ?");
        $absenden5->bind_param('iis', $ip_range_used, $random_ws, $randomRoomNumber);
        $absenden5->execute();

        $used_randomNumbers = [];
        for ($b = 0; $b < random_int(1, 3); $b++) {
            $betriebssystem = random_int(1, 25);
            if (!isset($used_randomNumbers[$betriebssystem])) {
                $query = "SELECT * FROM betriebssystem WHERE id = ?";
                $stmt = $db->prepare($query);
                $stmt->bind_param('i', $betriebssystem);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $betriebssystemid = $row['id'];
                    $absenden2 = $db->prepare("INSERT INTO geraet_hat_betriebssystem(geraetid,betriebssystemid)VALUES (?,?)");
                    $absenden2->bind_param('ii', $order_id, $betriebssystemid);
                    $absenden2->execute();
                    $used_randomNumbers[$betriebssystem] = "aipsgfj";
                }
            }
        }


        $used_randomNumbers2 = [];
        for ($b = 0; $b < random_int(1, 10); $b++) {
            $software = random_int(1, 55);
            if (!isset($used_randomNumbers2[$software])) {
                // Überprüfe die maximale Anzahl der verfügbaren Lizenzen
                $check_query = $db->prepare("SELECT anzahl_gerate FROM softwarelizenzen WHERE id = ?");
                $check_query->bind_param('i', $software);
                $check_query->execute();
                $check_result = $check_query->get_result();
                $max_anzahl = $check_result->fetch_assoc()['anzahl_gerate'];

                // Überprüfe die Anzahl der verwendeten Lizenzen
                $check_query = $db->prepare("SELECT COUNT(*) as count FROM geraet_hat_software WHERE softwarelizenzid = ?");
                $check_query->bind_param('i', $software);
                $check_query->execute();
                $check_result = $check_query->get_result();
                $used_anzahl = $check_result->fetch_assoc()['count'];

                if ($used_anzahl < $max_anzahl) {
                    $absenden2 = $db->prepare("INSERT INTO geraet_hat_software(geraetid,softwarelizenzid)VALUES (?,?)");
                    $absenden2->bind_param('ii', $order_id, $software);
                    $absenden2->execute();
                    $used_randomNumbers2[$software] = "aipsgfj";
                }
            }
        }
    }

    set_time_limit($original_time_limit); // Setze die maximale Ausführungszeit zurück auf den ursprünglichen Wert

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
    $sql = 'SELECT id,name,typ,hersteller,age,betrieb,raumnummer,`ip_adresse`,ausleihbar,technische_eckdaten,kommentar FROM geraet ';

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

        //technische_eckdaten von string zu array
        if (!empty($data[$key]['kommentar']))
            $data[$key]['kommentar_liste'] = explode(SEPERATOR, $value['kommentar']);

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
    $deviceID = $rd->query['form_id'];
    $get = 'SELECT typ, raumnummer, ip_adresse from geraet where id = ' . $deviceID . ';';
    $sqlget = mysqli_query($link, $get);
    $data = mysqli_fetch_all($sqlget);

    $typ = $data[0][0];
    $raum_alt = $data[0][1];
    $oldIP = $data[0][2];
    $raum_neu = $rd->query['form_room'];

    //Raum updaten, falls Laptop oder PC und Raumänderung
    if ($raum_alt != $raum_neu && ($typ == 1 || $typ == 2)) {
        if ($raum_alt == 'Lager') {  // nur neuen Raum ändern
            $update = "UPDATE raum set anzahl_ws = anzahl_ws+1, belegung_ip = IF(belegung_ip < raum.anzahl_ip, belegung_ip+1, belegung_ip) where raumnummer = '$raum_neu'";
            mysqli_query($link, $update);
            update_room_ips_up($raum_neu, $deviceID);
        } else if ($raum_neu == 'Lager') {   // nur alten Raum ändern
            $update = "UPDATE raum set anzahl_ws = IF(anzahl_ws > 1, anzahl_ws-1, anzahl_ws), belegung_ip = 
                        IF(belegung_ip > 0, belegung_ip-1, belegung_ip) WHERE raumnummer = '$raum_alt' ";
            mysqli_query($link, $update);
            update_room_ips_down($oldIP, $raum_alt);
        } else {   // Beide ändern
            $update = "UPDATE raum set anzahl_ws = anzahl_ws+1, belegung_ip = IF(belegung_ip < raum.anzahl_ip, belegung_ip+1, belegung_ip) where raumnummer = '$raum_neu';";
            $update .= "UPDATE raum set anzahl_ws = IF(anzahl_ws > 1, anzahl_ws-1, anzahl_ws), belegung_ip = IF(belegung_ip > 0, belegung_ip-1, belegung_ip) where raumnummer = '$raum_alt';";
            mysqli_multi_query($link, $update);
            update_room_ips_down($oldIP, $raum_alt);
            update_room_ips_up($raum_neu, $deviceID);
            while (mysqli_next_result($link)) ;
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

//Rechnet alle IPs -1 wenn ein Gerät gelöscht oder bearbeitet wird.
function update_room_ips_down($deleted_ip, $room)
{
    $db = connectdb();
    $query = "UPDATE geraet SET ip_adresse = INET_NTOA(INET_ATON(ip_adresse) - 1) WHERE raumnummer = ? AND INET_ATON(ip_adresse) > INET_ATON(?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", $room, $deleted_ip);
    $stmt->execute();
    $db->close();
}

//Updated die IP
function update_room_ips_up($room, $deviceID)
{
    // Connect to the database
    $db = connectdb();

    // Get the next available IP for the room
    $result = $db->query("SELECT * FROM raum WHERE raumnummer = '$room'");
    $row = $result->fetch_array();
    $ip_range_start = $row["ip-adressbereich_beginn"];
    $ip_range_end = $row["ip-adressbereich_ende"];
    $ip_range_count = $row["anzahl_ws"];
    $ip_range_used = $row["belegung_ip"];

    $ip_range_used++;
    $new_ip = ip2long($ip_range_start) + $ip_range_used;
    $new_ip = long2ip($new_ip);

    // Update the device with the next available IP
    $stmt = $db->prepare("UPDATE geraet SET ip_adresse = ? WHERE id = ? LIMIT 1");
    $stmt->bind_param('ss', $new_ip, $deviceID);
    $stmt->execute();

    // Close the database connection
    $db->close();
}


function addComment(RequestData $rd)
{
    $link = connectdb();

    $sql = 'UPDATE geraet SET kommentar = "' . $rd->query['form_comment'] . '" WHERE id =' . $rd->query['form_deviceID'] . ' ; ';

    mysqli_query($link, $sql);

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
    $get = 'SELECT typ, raumnummer, ip from geraet where id = ' . $rd->query['submit_delete'] . ';';
    $sqlget = mysqli_query($link, $get);
    $data = mysqli_fetch_all($sqlget);
    $typ = $data[0][0];
    $raum = $data[0][1];
    $ip = $data[0][2];

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
    update_room_ips_down($ip, $raum);
}

function set_user_for_device($id)
{
    $link = connectdb();
    $user = $_SESSION['name'];
    $sql = "UPDATE geraet SET personen_id = '$user' WHERE id = '$id'";

    mysqli_query($link, $sql);

    mysqli_close($link);
}


function set_device_to_raum($id, $raum)
{
    $link = connectdb();

    $sql = "UPDATE geraet SET raumnummer = '$raum' WHERE id = '$id'";

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