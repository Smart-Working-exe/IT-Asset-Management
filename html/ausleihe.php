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
    <a href="dashboard_studenten.php"><input type="submit" class="btn btn-primary sub col-4 offset-2" value="Zurück"></a>
    <input type="submit" class="btn btn-primary sub col-4" value="Auswahl bestätigen">
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