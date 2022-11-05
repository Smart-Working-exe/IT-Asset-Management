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
<div class="container"">
    </style>
    <div class="row">
        <img class="col-lg-3 img-fluid" src="/img/fh-aachen_university-of-applied-sciences_303_logo.png" alt="fhlogo">
        <div class="col-lg-6"><p class="h1 text-center mt-4"> IT Asset Management</p></div>
        <div class="col-lg-3">
            <form method="get">
                <button type="submit" class="btn btn-danger mt-4">Abmelden</button>
            </form>
        </div>
    </div>
    <div class="row  justify-content-between" style="padding: 10%;">
        <div class="btn-group-vertical col-lg-5 mt-3 offset-1">
            <button type="button" class="btn btn-primary staticButton sub">Raumansicht</button>
            <button type="button" class="btn btn-primary staticButton sub mt-2">Datenbank</button>
            <button type="button" class="btn btn-primary staticButton sub mt-2">Ausleihe</button>
            <button type="button" class="btn btn-primary staticButton sub mt-2">Gerät hinzufügen</button>
            <button type="button" class="btn btn-primary staticButton sub mt-2">Person hinzufügen</button>
            <button type="button" class="btn btn-primary staticButton sub mt-2">Softwarelizenzen</button>
            <button type="button" class="btn btn-primary staticButton sub mt-2">Systemlogs</button>
            <button type="button" class="btn btn-primary staticButton sub mt-2">Einstellungen</button>
        </div>
        <div class="col-lg-5">
            <div class="row">
                <p class="display-6 h6 text-center col-lg-4 mt-3"> Benachrichtungen</p>
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
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>