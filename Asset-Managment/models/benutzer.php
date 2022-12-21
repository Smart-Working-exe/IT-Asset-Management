<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "gerichte"
 */
function get_user_data(){
    $link = connectdb();
    mysqli_begin_transaction($link);
    // mysqli_real_escape_string($link, $date);

    $sql = "SELECT fh_kuerzel, passwort, rolle FROM personen";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);
    mysqli_commit($link);


    mysqli_close($link);
    return $data;
}

/**Siehe function getGeraeteData, selbes Prinzip
 * @param $filter
 * @return array
 */
function get_user_tabledata($filter = []) : array
{

    $link = connectdb();

    $sql = "SELECT vorname,nachname, fh_kuerzel, rolle FROM personen";


    $sql = filter_to_sql($sql,2,$filter);

    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($data as $key => $value)
    {
        if($value['rolle'] == 1)
            $data[$key]['rolle'] = "Admin";
        elseif ($value['rolle'] == 2)
            $data[$key]['rolle'] = "Mitarbeiter";
        elseif ($value['rolle'] == 3)
            $data[$key]['rolle'] = "Student";
    }

    mysqli_close($link);
    return $data;

}

/*function update_anmeldung($mail){
    $link = connectdb();
    mysqli_begin_transaction($link);
    $mail = mysqli_real_escape_string($link,$mail);
    $sql = "UPDATE benutzer SET anzahlanmeldung= anzahlanmeldung + 1 where email='$mail'";
    mysqli_query($link, $sql);
    mysqli_commit($link);
    mysqli_close($link);
}

function update_anmeldung_fehler($mail){
    $link = connectdb();
    mysqli_begin_transaction($link);
    $mail = mysqli_real_escape_string($link,$mail);
    $sql = "UPDATE benutzer SET anzahlfehler= anzahlfehler + 1 where email='$mail'";
    mysqli_query($link, $sql);
    mysqli_commit($link);
    mysqli_close($link);
}

function update_anmeldung_zeit($mail){
    $link = connectdb();
    mysqli_begin_transaction($link);
    $mail = mysqli_real_escape_string($link,$mail);
    $sql = "UPDATE benutzer SET letzteanmeldung= NOW() where email='$mail'";
    mysqli_query($link, $sql);
    mysqli_commit($link);
    mysqli_close($link);
}

function update_anmeldung_zeit_fehler($mail){
    $link = connectdb();
    mysqli_begin_transaction($link);
    $mail = mysqli_real_escape_string($link,$mail);
    $sql = "UPDATE benutzer SET letzterfehler= NOW() where email='$mail'";
    mysqli_query($link, $sql);
    mysqli_commit($link);
    mysqli_close($link);
}*/


function update_User(RequestData $rd){
    $link = connectdb();

    $sql = 'UPDATE personen SET fh_kuerzel = "' . $rd->query['form_personIdentifier'] . '", vorname = "' . $rd->query['form_firstName'] . '", nachname = "' . $rd->query['form_SurName'] . '", rolle = ' . $rd->query['form_role']  . ' WHERE fh_kuerzel = "' .$rd->query['form_oldIdentifier'].'" ; ';
    //

    $result = mysqli_query($link, $sql);

    mysqli_close($link);
}

function get_hash($pw){
    $passwort = $pw;
    $salt = 'dontedit';

    $hash = sha1($salt.$passwort);

    return $hash;
}
function delete_user(RequestData $rd){
    $link = connectdb();

    $kill=$rd->query['submit_delete_person'];
    $sql = "DELETE FROM personen WHERE fh_kuerzel='$kill'";

    if ($link->query($sql) === TRUE) {
   //     echo "Record deleted successfully";
   //     print_r("worked");
    } else {
        echo "Error deleting record: " . $link->error;
        print_r('failed');
    }

    //$sql = 'DELETE FROM personen WHERE fh_kuerzel = '.$rd->query['submit_delete_person'].';';

    //mysqli_query($link, $sql);
    mysqli_close($link);
}
