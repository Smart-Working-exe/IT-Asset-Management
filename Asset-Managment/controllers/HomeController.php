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
        //Set true to show "incorrect login data" warning
        return view('Dashboard.dashboard_admin', ['rq'=>$rd]);
    }

    public function dashboard_mitarbeiter(RequestData $rd){
        //Set true to show "incorrect login data" warning
        return view('Dashboard.dashboard_mitarbeiter', ['rq'=>$rd]);
    }
    public function dashboard_student(RequestData $rd){
        //Set true to show "incorrect login data" warning
        return view('Dashboard.dashboard_mitarbeiter', ['rq'=>$rd]);
    }
}