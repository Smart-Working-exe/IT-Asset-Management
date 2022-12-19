<?php

function db_getAll_Softwarelizenzen()
{

    $link = connectdb();


    $sql = 'SELECT id,name, version FROM softwarelizenzen';
    $result = mysqli_query($link,$sql);


    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);


    mysqli_close($link);
    return $data;
}


/** Gibt die Daten zu Softwarelizenzen in passender Form für die Tabelle zurück
 * @param $filter
 * @return array
 */
function get_SoftwarlizenzenTabledata($filter = [] ) :array
{
    $link = connectdb();


    $sql = 'SELECT id,name,hersteller, version,erwerbsdatum, ablaufdatum, anzahl_gerate FROM softwarelizenzen';

    $sql = filter_to_sql($sql,3,$filter);

    $result = mysqli_query($link,$sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);



    foreach ($data as $key => $value)
    {
        $name = $value['name'] ;

        if(!empty($value['version']))
            $name .=  " " . $value['version'];

        $data[$key]['name'] = $name;
        $data[$key]['erwerbsdatum'] = date_create($value['erwerbsdatum']) ->format('d.m.Y');
        $data[$key]['ablaufdatum'] = date_create($value['ablaufdatum']) ->format('d.m.Y');


        $sql = "SELECT COUNT(geraetid) FROM geraet_hat_software where softwarelizenzid = $value[id] ";
        $result = mysqli_query($link,$sql);
        $data2 = mysqli_fetch_all($result, MYSQLI_NUM);

        // entfernt array klammern
        foreach ($data2 as $data3)
            foreach ($data3 as $data4)
                $data[$key]['anzahl_installationen'] = $data4;

        $data[$key]['anzahl_installationen_prozent'] = ($data[$key]['anzahl_installationen'] / $data[$key]['anzahl_gerate']) * 100;

    }


    mysqli_close($link);

    return $data;



}


function update_licences(RequestData $rd){
    $link = connectdb();

    $sql = 'UPDATE softwarelizenzen SET name = "' . $rd->query['form_lizenzname'] . '", hersteller = "' . $rd->query['form_lizenzhersteller'] . '", anzahl_gerate = ' . $rd->query['form_lizenzanzahl']  . ' WHERE id = ' .$rd->query['form_id'].'; ';
    //
    $result = mysqli_query($link, $sql);

    mysqli_close($link);
}