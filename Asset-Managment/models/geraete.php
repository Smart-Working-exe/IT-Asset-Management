<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/filter.php');


const SEPERATOR = ';';

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
    $sql = 'SELECT id,name,typ,hersteller,age,raumnummer,`ip_adresse`,ausleihbar,technische_eckdaten,kommentar FROM geraet';

    $sql = filter_to_sql($sql, 1, $filter);


    $result = mysqli_query($link, $sql);


    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);


    foreach ($data as $key => $value) {

        $value_id = $value['id'];

        if($value['typ'] == 1 || $value['typ'] == 2) {
            //get betriebssystem
            $sql = "SELECT  b.name FROM geraet_hat_betriebssystem gb LEFT JOIN betriebssystem b On gb.betriebssystemid = b.id where gb.geraetid = $value_id ";
            $result_betriebssystem = mysqli_query($link, $sql);


            $data_betriebssystem = mysqli_fetch_all($result_betriebssystem, MYSQLI_NUM);

            // entfernt array klammern
            foreach ($data_betriebssystem as $value2)
                foreach ($value2 as $value3)
                    $data[$key]['betriebssystem'][] = $value3;


            //get software
            $sql = "SELECT  s.name FROM geraet_hat_software gs LEFT JOIN softwarelizenzen s On gs.softwarelizenzid = s.id where gs.geraetid = $value_id ";
            $result_software = mysqli_query($link, $sql);


            $data_software = mysqli_fetch_all($result_software, MYSQLI_NUM);

            // entfernt array klammern
            foreach ($data_software as $value4)
                foreach ($value4 as $value5)
                    $data[$key]['software'][] = $value5;


        }

        //technische_eckdaten von string zu array
        if(!empty($data[$key]['technische_eckdaten']))
            $data[$key]['technische_eckdaten_liste'] = explode(SEPERATOR,$value['technische_eckdaten']);

        $data[$key]['alter'] = floor((time()- strtotime($value['age']))/31556926 );

        //$data[$key]['age'] = date_create($value['age']) ->format('d.m.Y');
        //$data[$key]['betrieb'] = date_create($value['betrieb']) ->format('d.m.Y');
    }

    mysqli_close($link);

//1 = Computer, 2 = Laptop, 3 = Monitor, 4 = Tastatur, 5 = Maus, 6 = Praktikum Utensilien, 7 = Accessoires

    foreach ($data as $key => $value)
    {
        switch ($value['typ']){

            case 1:
                $data[$key]['typ'] = "PC";
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

function editGeraete(RequestData $rd){

    $link = connectdb();

    if (empty($rd->query['form_Ausleihbar'])==1)
        $ausleihbar=0;
    else
        $ausleihbar=1;

    $sql = 'UPDATE geraet SET NAME = "' . $rd->query['form_name123'] . '", typ = ' . $rd->query['form_deviceType'] . ', hersteller = "' . $rd->query['form_hersteller'] . '", raumnummer = "' . $rd->query['form_room'] . '", ausleihbar = "' . $ausleihbar . '", technische_eckdaten = "' . $rd->query['form_technischeEckdaten'] . '", kommentar = "' . $rd->query['form_comment'] . '" WHERE id =' .$rd->query['form_id'].' ; ';
    //

    mysqli_query($link, $sql);

    mysqli_close($link);
};

function addComment(RequestData $rd){
    $link = connectdb();

    $sql = 'UPDATE geraet SET kommentar = "' . $rd->query['form_comment'] . '" WHERE id =' .$rd->query['form_deviceID'].' ; ';
    //

    $result = mysqli_query($link, $sql);

    mysqli_close($link);

}

function getGeraeteID_name(){
    $link = connectdb();

    // get geräte
    $sql = 'SELECT id,name FROM geraet';
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);

    return $data;
}


function deleteDevice(RequestData $rd){
    $link = connectdb();

    $sql = 'DELETE FROM geraet WHERE id = ' . $rd->query['submit_delete'] . ';';

    mysqli_query($link, $sql);

    mysqli_close($link);
}