<?php

function db_getAll_Softwarelizenzen()
{

    $link = connectdb();


    $sql = 'SELECT * FROM softwarelizenzen ORDER BY Name ASC';
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

    $sql = 'UPDATE softwarelizenzen SET name = "' . $rd->query['form_lizenzname'] . '", version = "' . $rd->query['form_softwareversion'] . '", hersteller = "' . $rd->query['form_lizenzhersteller'] . '", anzahl_gerate = ' . $rd->query['form_lizenzanzahl']  . ' WHERE id = ' .$rd->query['form_id'].'; ';

    mysqli_query($link, $sql);

    $erwerbsdatum = date('Y-m-d', strtotime($rd->query['form_lizenzerwerb']));
    $ablaufdatum = date('Y-m-d', strtotime($rd->query['form_lizenzablauf']));
    $id=$rd->query['form_id'];

    $sql = "UPDATE softwarelizenzen SET erwerbsdatum='$erwerbsdatum' WHERE id=$id";
    mysqli_query($link, $sql);
    
    $sql = "UPDATE softwarelizenzen SET ablaufdatum='$ablaufdatum' WHERE id=$id";
    mysqli_query($link, $sql);

    mysqli_close($link);

}

function delete_license(RequestData $rd){
    $link = connectdb();


    $sql = 'DELETE FROM softwarelizenzen WHERE id = ' . $rd->query['submit_delete_license'] . ';';

    mysqli_query($link, $sql);

    mysqli_close($link);
}
