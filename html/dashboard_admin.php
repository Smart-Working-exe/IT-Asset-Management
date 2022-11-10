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
    <title>Dashboard</title>
</head>
<body>
<div class="container"">
    </style>
    <div class="row">
        <a href="dashboard_admin.php" class="col-3"><img class="img-fluid" src="/img/fh-aachen_university-of-applied-sciences_303_logo.png" alt="fhlogo"></a>
        <a href="dashboard_admin.php" class="nav-link col-6"><p class="h1 text-center mt-4">IT Asset Management</p></a>
        <div class="col-3">
            <!-- <form method="get"> -->
            <a href="login.php"><button type="submit" class="btn btn-danger mt-4">Abmelden</button></a>
            <!-- </form> -->
        </div>
    </div>
    <div class="row  justify-content-between" style="padding: 10%;">
        <div class="btn-group-vertical col-lg-5 mt-3 offset-1">
            <a href="raumauswahl.php" type="button" class="btn btn-primary staticButton sub">Raumansicht</a>
            <a href="#" type="button" class="btn btn-primary staticButton sub mt-2">Datenbank</a>
            <a href="#" type="button" class="btn btn-primary staticButton sub mt-2">Ausleihe</a>
            <button type="submit" class="btn btn-primary staticButton sub mt-2" data-bs-toggle="modal" data-bs-target="#addConfirmation">Geräte hinzufügen</button>
            <a href="#" type="button" class="btn btn-primary staticButton sub mt-2">Person hinzufügen</a>
            <a href="#" type="button" class="btn btn-primary staticButton sub mt-2">Softwarelizenzen</a>
            <a href="#" type="button" class="btn btn-primary staticButton sub mt-2">System-logs</a>
            <a href="#" type="button" class="btn btn-primary staticButton sub mt-2">Einstellungen</a>
        </div>
        <div class="col-lg-5">
            <div class="row">
                <p class="display-6 h6 text-center col-lg-4 mt-3">Benachrichtungen</p>
            </div>

            <div class="toast show col-lg-6 mt-2">
                <div class="toast-header ">
                    Important
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    Die Lizenz von Microsoft Visual Studio läuft auf PC1 in 3 Tagen ab.
                </div>
            </div>

            <div class="toast show col-lg-6 mt-2">
                <div class="toast-header">
                    Important
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Die Lizenz von MS Office läuft auf PC2 in 14 Tagen ab.
                </div>
            </div>

            <div class="toast show col-lg-6 mt-2">
                <div class="toast-header ">
                    Important
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    In Raum A001 sind 30 von 32 IP-Adressen belegt.
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="addConfirmation">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Hier kommt das Formular für das Hinzufügen hin.</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">+</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="py-3 my-4">
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