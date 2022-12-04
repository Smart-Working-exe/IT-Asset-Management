<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/betriessystem.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/softwarelizenzen.php');


/**Gibt die Variablen Daten für den Filter zurück
 * also Betriebssysteme und Softwarelizenzen
 *
 * @return array array mit ['betriessystem'] sämtliche betriebssysteme,
 *                   ['softwarelizenzen'] sämtliche softwarelizenzen.
 *                 Der Schlüssel für die einzelnen Betriebssysteme und Softwarelizenzen ist die entsprechende id
 * @author jan
 */
function get_softwarelizenzen_betriessystem(): array
{
    $betriebssysteme = db_getAll_Betriebssystem();
    $softwarelizenzen = db_getAll_Softwarelizenzen();


    $result = [];

    foreach ($betriebssysteme as $btrsys )
    {

        $name = $btrsys['name'] ;

        if(!empty($btrsys['version']))
            $name .=  " " . $btrsys['version'];

        $result['betriessystem'][$btrsys['id']] = $name;
    }

    foreach ($softwarelizenzen as $swl )
    {

        $name = $swl['name'] ;

        if(!empty($swl['version']))
            $name .=  " " . $swl['version'];

        $result['softwarelizenzen'][$swl['id']] = $name;

    }



    return $result;

}


/**Gibt sämtliche vorhandenen Filterdaten zurück, welche über post oder get übermittelt worden sind
 * @param RequestData $rd benötigt die request data
 * @return array ein array entsprechend der Anforderungen von der Funktion getGeraeteData. Softwarelizenzen und Betriebssysteme als id
 * @author jan
 */
function get_filter_data(RequestData &$rd) : array
{

    $filter_search = [];


    if($rd->query['suche'] ?? false)
        $filter_search['suche'] = $rd->query['suche'];

    if($rd->query['Typ'] ?? false)
        $filter_search['Typ'] = $rd->query['Typ'];

    if($rd->query['hersteller'] ?? false)
        $filter_search['hersteller'] = $rd->query['hersteller'];

    if($rd->query['age'] ?? false)
        $filter_search['age'] = $rd->query['age'];

    if($rd->query['betriebssystem'] ?? false)
        $filter_search['betriebssystemid'] = $rd->query['betriebssystem'];

    if($rd->query['software'] ?? false)
        $filter_search['softwarelizenzid'] = $rd->query['software'];

    if($rd->query['raumnummer'] ?? false)
        $filter_search['raumnummer'] = $rd->query['raumnummer'];


    return $filter_search;
}


/**
 * Hängt Filter Bedingungen an ein sql statement. Dies passiert über wheres
 * @param $sql string das Sql statment
 * @param $eintrag int für welchen typ 1 = Geräte 2 = Personen 3 = Softwarelizenzen
 * @param $filter array der Schlüssel gibt an, nach welcher Eigenschaft gefiltert wird, diese MÜSSEN der Eigenschafts-Namen in der Datenbank entsprechen! Der Wert was die Eigenschaft sein soll.
 *                      Als Beispiel 'Array([age] => 3 [betriebssystem] => Windows 10)' sucht nach einem Gerät welches 3 Jahre alt ist und WIndows 10 besitzt.
 * @return string das Sql-Statment als String
 * @author jan
 */
function filter_to_sql($sql,$eintrag, &$filter =[] ) : string
    {
        $complet_sql = $sql. " WHERE true";

        // Geräte
        if($eintrag == 1) {


            if (!empty($filter['raumnummer']))
                $complet_sql .= " And raumnummer = '$filter[raumnummer]'";

            if(!empty($filter['Typ']))
                $complet_sql .= " And Typ = '$filter[Typ]'";

            if(!empty($filter['suche']))
                $complet_sql .= " And (name like '%$filter[suche]%' OR kommentar like '%$filter[suche]%' OR technische_eckdaten like '%$filter[suche]%')";

            if(!empty($filter['hersteller']))
                $complet_sql .= " And hersteller like '%$filter[hersteller]%'";

            if(!empty($filter['age'])) {
                $vor_age_Jahren = date("Y-m-d",strtotime("-$filter[age] year "));
                $vor_age_plus_eins_Jahren = $filter['age'] +1;
                $vor_age_plus_eins_Jahren = date("Y-m-d",strtotime("-$vor_age_plus_eins_Jahren year"));
                $complet_sql .= " AND age BETWEEN '$vor_age_plus_eins_Jahren' AND '$vor_age_Jahren'";
            }

            //TODO software
            //TODO Betriebssystem
        }




        return $complet_sql;

    }
