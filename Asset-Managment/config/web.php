<?php
/**
 * Mapping of paths to controllers.
 * Note, that the path only supports one level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as expected
 */

return array(
    '/'                     => "HomeController@login",
    '/login'                => "HomeController@login",
    //Sicherheitsproblem Frage wie schränke ich den Zugriff ein? Scheinbar über index.php
    //Diese Links sind also nur zum testen während der Programmierung und werden später entfernt
    // Ich würde immer /dashboard aufrufen und bei dieser controller-Funktion dann die unterscheidung machen -jan
    '/dashboard_admin'      => "HomeController@dashboard_admin",
    '/dashboard_mitarbeiter'=> "HomeController@dashboard_mitarbeiter",
    '/dashboard_student'    => "HomeController@dashboard_student",

    '/einstellungen'        => "HomeController@einstellungen",
    '/verleihung'           => "HomeController@verleihung",
    '/systemlogs'           => "HomeController@systemlogs",
    '/softwarelizenzen'     => "HomeController@softwarelizenzen",
    '/raumauswahl'          => "HomeController@raumauswahl",
    '/ausleihe'             => "HomeController@ausleihe",
    '/raumansicht'          => "HomeController@raumansicht",
    '/eigeneGeraete'        => "HomeController@eigeneGeraete",
    '/datenbank'            => 'HomeController@datenbank',
    '/lizenzhinzufugen'     => "HomeController@softwarelizenzen",

    '/test'                 => 'HomeController@test'
);