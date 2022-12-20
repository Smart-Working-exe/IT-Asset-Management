<?php


/** Gibt, die log Daten aus der Datenbank wieder
 * @param $filter
 * @return array
 */
function get_logs($filter = []) : array
{

    $link = connectdb();

    // get geräte
    $sql = 'SELECT datum, benutzer,aktion,beschreibung FROM logs';

    $sql = filter_to_sql($sql,4,$filter);

    $result = mysqli_query($link,$sql);


    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);


    foreach ($data as $key => $value)
    {


        $data[$key]['datum'] = date_create($value['datum']) ->format('d.m.Y H:i:s');

        if($value['aktion'] == 1)
            $data[$key]['aktion'] = 'Anmeldung';
        elseif($value['aktion'] == 2)
            $data[$key]['aktion'] = 'Abmeldung';
        elseif($value['aktion'] == 3)
            $data[$key]['aktion'] = 'Ausleihe';
        elseif ($value['aktion'] == 4)
            $data[$key]['aktion'] = 'Gerät bearbeiten';
        elseif ($value['aktion'] == 5)
            $data[$key]['aktion'] = 'Gerät kommentieren';
        elseif ($value['aktion'] == 6)
            $data[$key]['aktion'] = 'Gerät hinzufügen';
        elseif ($value['aktion'] == 7)
            $data[$key]['aktion'] = 'Gerät gelöscht';
        elseif ($value['aktion'] == 8)
            $data[$key]['aktion'] = 'Person bearbeitet';
        elseif ($value['aktion'] == 9)
            $data[$key]['aktion'] = 'Person hinzugefügt';
        elseif ($value['aktion'] == 10)
            $data[$key]['aktion'] = 'Person gelöscht';
        elseif ($value['aktion'] == 11)
            $data[$key]['aktion'] = 'Softwarelizenz bearbeitet';
        elseif ($value['aktion'] == 12)
            $data[$key]['aktion'] = 'Softwarelizenz hinzugefügt';
        elseif ($value['aktion'] == 13)
            $data[$key]['aktion'] = 'Softwarelizenz gelöscht';
    }
    return $data;
}

function logger($user, $aktion,$desc){
    $link = connectdb();

    $sql = "INSERT INTO logs (datum, benutzer, aktion, beschreibung) VALUES (NOW(), '$user', '$aktion', '$desc')";
    mysqli_query($link, $sql);
    mysqli_close($link);
}