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
    <title>Ausleihe</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <a href="dashboard_studenten.php" class="col-lg-3"><img class="img-fluid" src="/img/fh-aachen_university-of-applied-sciences_303_logo.png" alt="fhlogo"></a>
        <div class="col-lg-6"><p class="h1 text-center mt-4"> IT Asset Management</p></div>
        <div class="col-lg-3">
            <form method="get">
                <a href="login.php"><button type="submit" class="btn btn-danger mt-4">Abmelden</button></a>
            </form>
        </div>
    </div>

    <div class="row mt-5 row justify-content-between">
        <div class="btn-group-vertical col-lg-6 mt-3 tbodyDiv">
            <table class="table table-bordered table-striped text-center" id="verfügbareGeräte">
                <thead class="sticky-top bg-white">
                <tr>
                    <th>Geräte Name</th>
                    <th>Geräte Typ</th>
                    <th>Auswahl</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>ARBKVS-Board</td>
                    <td>Microchip</td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
                </tr>
                <tr>
                    <td>TI-Board</td>
                    <td>Schaltboard</td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked></td>
                </tr>
                <tr>
                    <td>Kabelmaus</td>
                    <td>Accessoir</td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
                </tr>
                <tr>
                    <td>Funkmaus</td>
                    <td>Accessoir</td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
                </tr>
                <tr>
                    <td>3D Maus</td>
                    <td>Accessoir</td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked></td>
                </tr>
                <tr>
                    <td>Laptop</td>
                    <td>Computer</td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked></td>
                </tr>
                <tr>
                    <td>Lötset</td>
                    <td>Werkzeug</td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="btn-group-vertical col-lg-6 mt-3 tbodyDiv">
            <table class="table table-bordered table-striped text-center" id="verfügbareGeräte">
                <thead class="sticky-top bg-white">
                <tr>
                    <th>Geräte Name</th>
                    <th>Geräte Typ</th>
                    <th>Ausgeliehen</th>
                    <th>Rückgabefrist</th>
                    <th>Auswahl</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>ARBKVS-Board</td>
                    <td>Microchip</td>
                    <td>21.09.2022
                    <td>02.11.2022</td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked></td>
                </tr>
                <tr>
                    <td>Lötset</td>
                    <td>Werkzeug</td>
                    <td>27.10.2022
                    <td>10.11.2022</td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                    <td></td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                    <td></td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                    <td></td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                    <td></td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                    <td></td>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a href="dashboard_studenten.php"><button type="submit" class="btn btn-primary sub col-4 offset-2">Zurück</button></a>
    <!-- Butteon triggert Modal -->
    <button type="submit" class="btn btn-primary sub col-4" data-bs-toggle="modal" data-bs-target="#confirmation">Auswahl bestätigen</button>

    <!-- The Modal -->
    <div class="modal" id="confirmation">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Auswahl bestätigt</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Anfrage wurde an einem Mitarbeiter gesendet
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
                </div>

            </div>
        </div>
    </div>
    
</div>
<footer class="py-3 my-4 footerBot">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item nav-link px-2 text-muted">Angemeldet als Benutzer lk8776s</li>
        <li class="nav-item"><a href="dashboard_studenten.php" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="impressum.php" class="nav-link px-2 text-muted">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>
</footer>

<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>