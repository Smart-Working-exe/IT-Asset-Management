<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/custom.css">
    <link rel="icon" type="image/x-icon" href="/img/fh-aachen_university-of-applied-sciences_303_logo.png">
    <title>Systemlogs</title>

    <style>
        #verschieben{margin-top:-20px}

    </style>
</head>

<body >
<div class="container">
    <div class="row">
        <a href="dashboard_admin.php" class="col-3"><img class="img-fluid" src="/img/fh-aachen_university-of-applied-sciences_303_logo.png" alt="fhlogo"></a>
        <a href="dashboard_admin.php" class="nav-link col-6"><p class="h1 text-center mt-4">IT Asset Management</p></a>
        <div class="col-3">
            <!-- <form method="get"> -->
            <a href="login.php"><button type="submit" class="btn btn-danger mt-4">Abmelden</button></a>
            <!-- </form> -->
        </div>
    </div>
    <div> <br> <br></div>
    <fieldset class="border p-3">
        <legend  class="float-none w-auto" id="verschieben">Systemlogs</legend>
        <div>
            Jan 21: ma1234 hat sich abgemeldet. <br>
            Jan 21: ma1234 hat die Raumbelegung in F111 angepasst. <br>
            Jan 21: ma1234 hat sich angemeldet. <br>
            Jan 18: cd5678 hat ein Gerät in F111 kommentiert.<br>
            ...
        </div>
    </fieldset>
    <br>
    <a href="dashboard_admin.php">
        <button type="submit" class="btn btn-primary sub">Zurück zum Dashboard</button>
    </a>
</div>
<footer  >
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item nav-link px-2 text-muted">Angemeldet als Benutzer ef8366m</li>
        <li class="nav-item"><a href="dashboard_admin.php" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="https://www.fh-aachen.de/impressum/" class="nav-link px-2 text-muted" target="_blank">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>
</footer>

<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

