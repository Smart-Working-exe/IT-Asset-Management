<?php
/**
 * Mapping of paths to controllers.
 * Note, that the path only supports one level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as expected
 */

return array(
    '/'       => "HomeController@login",
    '/login'       => "HomeController@login",
    //Sicherheitsproblem Frage wie schränke ich den Zugriff ein? Scheinbar über index.php
    //Diese Links sind also nur zum testen während der Programmierung und werden später entfernt
    '/dashboard_admin'       => "HomeController@dashboard_admin",
    '/dashboard_mitarbeiter'       => "HomeController@dashboard_mitarbeiter",
    '/dashboard_student'       => "HomeController@dashboard_student"
);