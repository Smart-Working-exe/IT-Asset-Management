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
    <title>Ausleihe</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <a href="dashboard_studenten.php" class="col-3"><img class="img-fluid"
                                                             src="/img/fh-aachen_university-of-applied-sciences_303_logo.png"
                                                             alt="fhlogo"></a>
        <a href="dashboard_studenten.php" class="nav-link col-6"><p class="h1 text-center mt-4">IT Asset Management</p>
        </a>
        <div class="col-3">
            <!-- <form method="get"> -->
            <a href="login.php">
                <button type="submit" class="btn btn-danger mt-4">Abmelden</button>
            </a>
            <!-- </form> -->
        </div>
    </div>
    <div class="row mt-4 ">
        <p class="display-6> Verleihung an den Studenten</p>
    </div>
    <div class="row mt-5 row justify-content-between">
        <div class="btn-group-vertical col-lg-6 mt-3 tbodyDiv">

            <h3> Ausleihen </h3>
            <table class="table table-bordered table-striped" id="Anfrage">
                <thead class="sticky-top bg-white">
                <tr >
                    <th>Anfragender </th>
                    <th>Geräte </th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Müller Max</td>
                    <td>Praktikumsboard ARBKVS</td>
                    <td>
                        <button type="submit" style="background-color :springgreen" >Annehmen</button>
                    </td>
                    <td>
                        <button type="submit" style="background-color :red" >Ablehnen</button>
                    </td>
                </tr>
                <tr>
                    <td>Ackerman Levi</td>
                    <td>TI-Board</td>
                    <td>
                        <button type="submit" style="background-color :springgreen" >Annehmen</button>
                    </td>
                    <td>
                        <button type="submit" style="background-color :red" >Ablehnen</button>
                    </td>
                </tr>
                <tr>
                    <td> Son Goku </td>
                    <td> Lötset</td>
                    <td>
                        <button type="submit" style="background-color :springgreen" >Annehmen</button>
                    </td>
                    <td>
                        <button type="submit" style="background-color :red" >Ablehnen</button>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td>

                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td>

                    </td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="btn-group-vertical col-lg-6 mt-3 tbodyDiv">

            <h3> Rückgaben </h3>
            <table class="table table-bordered table-striped" id="Anfrage">
                <thead class="sticky-top bg-white">
                <tr >
                    <th>Anfragender </th>
                    <th>Geräte </th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Alter Johannes</td>
                    <td>Praktikumsboard ARBKVS</td>
                    <td>
                        <button type="submit" style="background-color :springgreen" >Annehmen</button>
                    </td>
                    <td>
                        <button type="submit" style="background-color :red" >Ablehnen</button>
                    </td>
                </tr>
                <tr>
                    <td>Classy Claßen</td>
                    <td>Lötset</td>
                    <td>
                        <button type="submit" style="background-color :springgreen" >Annehmen</button>
                    </td>
                    <td>
                        <button type="submit" style="background-color :red" >Ablehnen</button>
                    </td>
                </tr>
                <tr>
                    <td> Okazaki Tomoya </td>
                    <td> Praktikumsboard ARBKVS</td>
                    <td>
                        <button type="submit" style="background-color :springgreen" >Annehmen</button>
                    </td>
                    <td>
                        <button type="submit" style="background-color :red" >Ablehnen</button>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td>

                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td>

                    </td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <a href="dashboard_studenten.php" >
        <button type="submit" class="btn btn-primary sub col-4 offset-2">Zurück </button>
    </a>
    <!-- Button triggert Modal -->

    <button type="submit" class="btn btn-primary sub col-4" data-bs-toggle="modal" data-bs-target="#confirmation">
        Auswahl bestätigen
    </button>

    <!-- The Modal -->
    <div class="modal" id="confirmation" data-keyboard="false" data-backdrop="static">
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
<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item nav-link px-2 text-muted">Angemeldet als Benutzer lk8776s</li>
        <li class="nav-item"><a href="dashboard_studenten.php" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="https://www.fh-aachen.de/impressum/" class="nav-link px-2 text-muted"
                                target="_blank">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>
</footer>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>