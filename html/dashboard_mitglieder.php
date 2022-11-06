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
    <title>Dashboard</title>
</head>
<body>
<div class="container">
    <div class="row">
        <img class="col-lg-3 img-fluid" src="/img/fh-aachen_university-of-applied-sciences_303_logo.png" alt="fhlogo">
        <div class="col-lg-6"><p class="h1 text-center mt-4"> IT Asset Management</p></div>
        <div class="col-lg-3">
            <form method="get">
                <button type="submit" class="btn btn-danger mt-4">Abmelden</button>
            </form>
        </div>
    </div>
    <div class="row mt-5 row justify-content-between">
        <div class="btn-group-vertical col-lg-5 mt-3 offset-1">
            <button type="button" class="btn btn-primary staticButton sub">Raumansicht</button>
            <button type="button" class="btn btn-primary staticButton sub mt-2">Eigene Geräte</button>
            <button type="button" class="btn btn-primary staticButton sub mt-2">Verleihung an Studeenten</button>
        </div>
        <div class="col-lg-5">
            <div class="row">
                <p class="display-6 h6 text-center col-lg-4 mt-3"> Benachrichtungen</p>
            </div>

            <div class="toast show col-lg-6 mt-2">
                <div class="toast-header ">
                    Info
                </div>
                <div class="toast-body">
                    Keine Benachrichtigungen vorhanden.
                    <!--
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="py-3 my-4 footerBot">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="dashboard_studenten.php" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="impressum.php" class="nav-link px-2 text-muted">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>
</footer>

<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>