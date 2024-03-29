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
        $name = $btrsys['name'];

        if($btrsys['version'] != "")
            $name .=  " " . $btrsys['version'];

        $result['betriebssystem'][$btrsys['id']] = $name;
    }

    foreach ($softwarelizenzen as $swl )
    {
        $name = $swl['name'] ;

        if(($swl['version'] != ""))
            $name .=  " " . $swl['version'];

        $result['softwarelizenzen'][$swl['id']] = $name;

    }
    return $result;
}


/**Gibt sämtliche vorhandenen Filterdaten zurück, welche über post oder get übermittelt worden sind
 * @param RequestData $rd benötigt die request data
 *  * @param $eintrag int für welchen typ 1 = Geräte 2 = Personen 3 = Softwarelizenzen 4 = Logs
 * * @param bool $secure auf false fuer keine ueberabeitung der eingaben
 * @return array ein array entsprechend der Anforderungen von der Funktion get...Data. Softwarelizenzen und Betriebssysteme als id
 * @author jan
 */
function get_filter_data(RequestData &$rd,$eintrag,$secure = true) : array
{

    $filter_search = [];

    if ($eintrag == 1) {


        if ($rd->query['filter_suche'] ?? false)
            $filter_search['suche'] = $rd->query['filter_suche'];


        if ($rd->query['filter_Typ'] ?? false)
            $filter_search['Typ'] = $rd->query['filter_Typ'];


        if ($rd->query['filter_hersteller'] ?? false)
            $filter_search['hersteller'] = $rd->query['filter_hersteller'];


        if ($rd->query['filter_age'] ?? false)
            $filter_search['age'] = (int)$rd->query['filter_age'];


        if ($rd->query['filter_betriebssystem'] ?? false)
            $filter_search['betriebssystemid'] = $rd->query['filter_betriebssystem'];


        if ($rd->query['filter_software'] ?? false)
            $filter_search['softwarelizenzid'] = $rd->query['filter_software'];


        if ($rd->query['raum'] ?? false)
            $filter_search['raum'] = $rd->query['raum'];

        if ($rd->query['kuerzel'] ?? false)
            $filter_search['kuerzel'] = $rd->query['kuerzel'];


    }
    elseif($eintrag == 2){


        if ($rd->query['filter_suche'] ?? false)
            $filter_search['suche'] = $rd->query['filter_suche'];

        if ($rd->query['filter_rolle'] ?? false)
            $filter_search['rolle'] = $rd->query['filter_rolle'];


    }elseif ($eintrag == 3) {

        if ($rd->query['filter_suche'] ?? false)
            $filter_search['suche'] = $rd->query['filter_suche'];

    }elseif ($eintrag == 4)
    {
        if ($rd->query['filter_aktion'] ?? false)
            $filter_search['aktion'] = $rd->query['filter_aktion'];

        if ($rd->query['filter_benutzer'] ?? false)
            $filter_search['benutzer'] = $rd->query['filter_benutzer'];

        if ($rd->query['filter_datum'] ?? false)
            $filter_search['datum'] = $rd->query['filter_datum'];

        if ($rd->query['filter_suche'] ?? false)
            $filter_search['suche'] = $rd->query['filter_suche'];


    }



    if($secure)
        foreach ($filter_search as $key => $value)
            $filter_search[$key] = str_replace('%','\%',$value);


    return $filter_search;
}


/**
 * Hängt Filter Bedingungen an ein sql statement. Dies passiert über wheres
 * @param $sql string das Sql statment
 * @param $eintrag int für welchen typ 1 = Geräte 2 = Personen 3 = Softwarelizenzen 4 = Logs
 * @param $filter array der Schlüssel gibt an, nach welcher Eigenschaft gefiltert wird, diese MÜSSEN der Eigenschafts-Namen in der Datenbank entsprechen! Der Wert was die Eigenschaft sein soll.
 *                      Als Beispiel 'Array([age] => 3 [betriebssystem] => Windows 10)' sucht nach einem Gerät welches 3 Jahre alt ist und WIndows 10 besitzt.
 * @return string das Sql-Statment als String
 * @author jan
 */
function filter_to_sql($sql,$eintrag, &$filter =[] ) : string
    {

        $where_sql = " WHERE true";
        $join_sql = "";

        // Geräte
        if($eintrag == 1) {


            if (!empty($filter['raum'])) {
                $where_sql .= " And raumnummer like '%$filter[raum]%'";

                if($filter['raum'] != 'Test')
                    $where_sql .= " And raumnummer not like '%Test%'";
            }else
                $where_sql .= " And raumnummer not like '%Test%'";


            if(!empty($filter['Typ']))
                $where_sql .= " And Typ = '$filter[Typ]'";

            if(!empty($filter['suche']))
                $where_sql .= " And (name like '%$filter[suche]%' OR kommentar like '%$filter[suche]%' OR technische_eckdaten like '%$filter[suche]%')";

            if(!empty($filter['hersteller']))
                $where_sql .= " And hersteller like '%$filter[hersteller]%'";

            if(!empty($filter['kuerzel']))
                $where_sql .= " And personen_id like '%$filter[kuerzel]%'";

            if(!empty($filter['age'])) {
                $vor_age_Jahren = date("Y-m-d",strtotime("-$filter[age] year "));
                $vor_age_plus_eins_Jahren = $filter['age'] +1;
                $vor_age_plus_eins_Jahren = date("Y-m-d",strtotime("-$vor_age_plus_eins_Jahren year"));
                $where_sql .= " AND age BETWEEN '$vor_age_plus_eins_Jahren' AND '$vor_age_Jahren'";
            }

            if(!empty($filter['softwarelizenzid']))
            {

                $join_sql .= " LEFT JOIN geraet_hat_software gs on id = gs.geraetid ";
                $where_sql .= " And gs.softwarelizenzid = '$filter[softwarelizenzid]' ";

            }

            if(!empty($filter['betriebssystemid']))
            {
                $join_sql .= " LEFT JOIN geraet_hat_betriebssystem gb On id = gb.geraetid ";
                $where_sql .= " And gb.betriebssystemid = '$filter[betriebssystemid]' ";

            }


        }
        elseif ($eintrag == 2)
        {

            if (!empty($filter['rolle']))
                $where_sql .= " And rolle = '$filter[rolle]' ";

            if(!empty($filter['suche']))
                $where_sql .= " And (vorname like '%$filter[suche]%' OR nachname like '%$filter[suche]%' OR fh_kuerzel like '%$filter[suche]%')";

        }
        elseif ($eintrag == 3)
        {

            if(!empty($filter['suche']))
                $where_sql .= " And (name like '%$filter[suche]%' OR version like '%$filter[suche]%')";

        }
        elseif ($eintrag == 4)
        {
            if(!empty($filter['suche']))
                $where_sql .= " And beschreibung like '%$filter[suche]%' ";

            if (!empty($filter['aktion']))
                $where_sql .= " And aktion = '$filter[aktion]' ";

            if(!empty($filter['benutzer']))
                $where_sql .= " And benutzer like '%$filter[benutzer]%' ";

            if(!empty($filter['datum'])) {
                
                $date = date("Y-m-d",strtotime($filter['datum']));

                // ein tag daraufadieren
                $next_date = date("Y-m-d",strtotime($date) + (3600 * 24));

                $where_sql .= " AND datum BETWEEN '$date' AND '$next_date' ";
            }




        }

        $complet_sql = $sql;

        if(!empty($join_sql))
            $complet_sql .= $join_sql . $where_sql . " Group by id " ;

        else
            $complet_sql .=  $where_sql;



        return $complet_sql ;

    }
