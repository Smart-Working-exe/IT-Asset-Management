<?php


/**
 * Gibt alle Geräte aus der Datenbank wieder, auf den den $filter passen
 * @param $filter  Array folgt noch
 * @return array gibt Geräte als 2 Dimensionales array wieder 1 Dimension = das Gerät 2 Dimension = eigenschaften des Gerätes,
 * wobei die Schlüssel für die Zweite DImension den Namen in der Datenbank entsprechend sind, als Beispiel: $array[0]['name'] gibt den Namen
 * des ersten Gerätes wieder
 * @author jan
 */
function getGeraeteData ($filter = []) {




    $link = connectdb();

    // get geräte
    $sql = 'SELECT id,name,typ,hersteller,age,raumnummer,`ip-adresse`,technische_eckdaten,kommentar FROM geraet';
    $result = mysqli_query($link,$sql);


    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);


    foreach ($data as $key => $value) {

        $value_id = $value['id'];

        //get betriebssystem
        $sql = "SELECT  b.name FROM geraet_hat_betriebssystem gb LEFT JOIN betriebssystem b On gb.betriebssystemid = b.id where gb.geraetid = $value_id " ;
        $result_betriebssystem = mysqli_query($link, $sql);


        $data_betriebssystem = mysqli_fetch_all($result_betriebssystem, MYSQLI_NUM);

            // entfernt array klammern
            foreach ($data_betriebssystem as $value2)
                foreach ($value2 as $value3)
                    $data[$key]['betriebssystem'][] = $value3;




        //get software
        $sql = "SELECT  s.name FROM geraet_hat_software gs LEFT JOIN softwarelizenzen s On gs.softwarelizenzid = s.id where gs.geraetid = $value_id " ;
        $result_software = mysqli_query($link, $sql);


        $data_software = mysqli_fetch_all($result_software, MYSQLI_NUM);

        // entfernt array klammern
        foreach ($data_software as $value4)
            foreach ($value4 as $value5)
                $data[$key]['software'][] = $value5;





        //technische_eckdaten von string zu array
        $data[$key]['technische_eckdaten'] = explode(';',$value['technische_eckdaten']);

        // TODO alter als Zahl nicht mehr als Datum
    }

    mysqli_close($link);

    return $data;


}
