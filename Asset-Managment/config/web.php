<?php
/**
 * Mapping of paths to controllers.
 * Note, that the path only supports one level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as expected
 */

return array(
    '/'       => "HomeController@dashboard",
    '/login'       => "LoginController@login",
    '/login_verify'       => "LoginController@login_verify",
    '/logout'       => "LoginController@logout",
    // Ich würde immer /dashboard aufrufen und bei dieser controller-Funktion dann die unterscheidung machen -jan ist mir auch gerade aufgefallen danke :D
    '/dashboard'       => "HomeController@dashboard",



    '/einstellungen'    => "HomeController@einstellungen",
    '/verleihung' => "HomeController@verleihung",
    '/systemlogs' => "HomeController@systemlogs",
    '/softwarelizenzen' => "HomeController@softwarelizenzen",
    '/raumauswahl' => "HomeController@raumauswahl",
    '/ausleihe' => "HomeController@ausleihe",
    '/raumansicht' => "HomeController@raumansicht",
    '/eigeneGeraete' => "HomeController@eigeneGeraete",
    '/datenbank' => 'HomeController@datenbank',

    '/test' => 'HomeController@test'
);