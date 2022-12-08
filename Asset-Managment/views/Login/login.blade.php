<!doctype html>
<!--
 - SmartWorking.exe
-->

<html lang="de">
<head>
    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="IE=edge" name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/custom.css">
    <link rel="icon" type="image/x-icon" href="/img/fh-aachen_university-of-applied-sciences_303_logo.png">
    <title>Login</title>
    <style>
    </style>
</head>
<body>
<div class="container justify-content-center align-items-center" id="login">
    <div class="row mt-5 justify-content-center">
        <img class="img-fluid col-3" src="/img/fh-aachen_university-of-applied-sciences_303_logo.png" alt="FH Aachen Logo">
        <h2 class="text-center mt-4">IT Asset Management</h2>
    </div>

    <div class="row mt-3 justify-content-center align-items-center">
        <div class="col-4">

            <form action="/login_verify" method="post">
                <div class="form-group mb-3 mt-3">
                    <label for="username">Benutzername*</label>
                    <input type="text" name="username" id="username" required="true"
                           class="form-control {{(!empty($username_err)) ? 'is-invalid' : ''}}"
                           placeholder="Benutzername"
                    >
                    <span class="invalid-feedback">{{$username_err}}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="pwd">Passwort*</label>
                    <input type="password" name="password" id="pwd" required="true"
                           class="form-control {{(!empty($password_err)) ? 'is-invalid' : ''}}"
                           placeholder="Passwort">
                    <span class="invalid-feedback">{{$password_err}}</span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary sub" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<footer class="py-3 my-4" >
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">

        <li class="nav-item"><a href="https://www.fh-aachen.de/impressum/" class="nav-link px-2 text-muted" target="_blank">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>
</footer>
</html>