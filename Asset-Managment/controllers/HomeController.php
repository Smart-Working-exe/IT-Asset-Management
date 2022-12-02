<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');

/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request) {
        return view('home', ['rd' => $request ]);
    }
    
   public function login(RequestData $rd){
       //Set true to show "incorrect login data" warning
       $loginFailed = false;
        return view('Login.login', ['rq'=>$rd,'loginFailed'=>$loginFailed]);
   }
    public function dashboard_admin(RequestData $rd){

        return view('Dashboard.dashboard_admin', ['rq'=>$rd]);
    }

    public function dashboard_mitarbeiter(RequestData $rd){

        return view('Dashboard.dashboard_mitarbeiter', ['rq'=>$rd]);
    }
    public function dashboard_student(RequestData $rd){

        return view('Dashboard.dashboard_student', ['rq'=>$rd]);
    }

    public function einstellungen(RequestData $rd){
        //User => 1 wenn admin, 2 = Mitarbeiter, 3 = student
        return view ('Einstellungen.einstellungen',['user' => 2]);
    }

    public function verleihung(RequestData $rd)
    {
        return view('Verleihung_Mitarbeiter.verleihung',[]);
    }

    public function systemlogs(RequestData $rd)
    {
        return view('Systemlogs.systemlogs',[]);

    }

    public function softwarelizenzen(RequestData $rd)
    {
        return view('Softwarelizenzen.softwarelizenzen',[]);

    }

    public function raumauswahl(RequestData $rd)
    {
        $student = false;//set true um raumauswahl fuer studenten zu bekommen
        if($student)
             return view('Raumauswahl.raumauswahl_studenten',[]);
        else
            return view('Raumauswahl.raumauswahl',[]);

    }

    public function ausleihe(RequestData $rd)
    {
        return view('Ausleihe_Student.ausleihe',[]);
    }

}