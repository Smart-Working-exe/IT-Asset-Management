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
    $sql = 'SELECT id,name,typ,hersteller,age,raumnummer,`ip-adresse`,technische_eckdaten,kommentar FROM geraet';

    $sql = filter_to_sql($sql, 1, $filter);


    $result = mysqli_query($link, $sql);


    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);


    foreach ($data as $key => $value) {

        $value_id = $value['id'];

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


        //technische_eckdaten von string zu array
        $data[$key]['technische_eckdaten'] = explode(SEPERATOR, $value['technische_eckdaten']);
        $data[$key]['age'] = floor((time() - strtotime($value['age'])) / 31556926);
    }

    mysqli_close($link);

    return $data;


}
