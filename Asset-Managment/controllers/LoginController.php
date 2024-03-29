<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/logs.php');

class LoginController
{
    public function login(RequestData $rq)
    {
        $msg = $_SESSION['login_result_message'] ?? null;
        return view('Login.login', ['msg' => $msg]);
    }

    public function logout(RequestData $rq)
    {
        logger($_SESSION['name'], 2, "Erfolgreich abgemeldet");
        session_destroy();
        header('Location: /dashboard');
    }

    public function check_passwort($name, $pwd): bool{
        $n = str_split($name, 7);
        $name = $n[0];


        $user_data = get_user_data();
        //$passwort = 'admin';
        //$passwort = 'mitarbeiter';
        //$passwort = 'student';

        $salt = 'dontedit';

        $hash = sha1($salt.$pwd);//$name
        for($i = 0; $i < count($user_data);$i++){
            if($user_data[$i]['fh_kuerzel'] == $name && $user_data[$i]['passwort'] == $hash){
                header('Location: /dashboard');  // https://www.fh-aachen.de/');
                $_SESSION['Rolle'] = $user_data[$i]['rolle'];
                return true;
            }
        }
        return false;
    }



    public function login_verify(RequestData $rq){
        $u = $_POST['username'] ?? false;
        $n = str_split($u, 7);
        $username = $n[0];
        $password = $_POST['password'] ?? false;
        // Überprüfung Eingabedaten
        $_SESSION['login_result_message'] = null;
        if ($this->check_passwort($username, $password)) {//db op
            $_SESSION['login_ok'] = true;
            $_SESSION['name'] = $username;
           logger($_SESSION['name'], 1, "Erfolgreich angemeldet");
            $insert = 'Location: '.$_SESSION['target'];
            header($insert);
        } else {
            $_SESSION['login_result_message'] =
                'Name oder Passwort falsch';
            header('Location: /login');
        }
    }
}
