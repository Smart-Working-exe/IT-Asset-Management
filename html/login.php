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
    <style>
    </style>
</head>
<body>
<div class="container justify-content-center align-items-center" id="login">
    <div class="row mt-5 justify-content-center">
        <img class="img-fluid col-lg-4" src="/img/fh-aachen_university-of-applied-sciences_303_logo.png" alt="FH Aachen Logo">
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4 "><p class="text-center display-3 login">Login</p></div>
    </div>

    <div class="row mt-3 justify-content-center align-items-center">
        <div class="col-lg-4">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group mb-3 mt-3">
                <label for="username">Benutzername*</label>
                <input type="text" name="username" id="username" required="true"
                       class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                       placeholder="Benutzername">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group mb-3">
                <label for="pwd">Passwort*</label>
                <input type="password" name="password" id="pwd" required="true"
                       class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                       placeholder="Passwort">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary sub" value="Login">
            </div>
        </form>
    </div>
    </div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>