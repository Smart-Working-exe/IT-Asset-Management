<!doctype html>

<!--
 - SmartWorking.exe
-->

<html lang="de">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="IE=edge" name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/fh-aachen_university-of-applied-sciences_303_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/custom.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
<div class="container">
    </style>
    <div class="row">
        <a href="dashboard_admin.php" class="col-3"><img class="img-fluid"
                                                         src="/img/fh-aachen_university-of-applied-sciences_303_logo.png"
                                                         alt="fhlogo"></a>
        <a href="dashboard_admin.php" class="nav-link col-6"><p class="h1 text-center mt-4">IT Asset Management</p></a>
        <div class="col-3">
            <!-- <form method="get"> -->
            <a href="login.php">
                <button type="submit" class="btn btn-danger mt-4">Abmelden</button>
            </a>
            <!-- </form> -->
        </div>
    </div>
    <div class="row  justify-content-between" style="padding: 10%; font-size: 36px;">
        <div class="btn-group-vertical col-5 mt-3 offset-1">
            <a style="padding: 3% ;" href="raumauswahl.php" type="button" class="btn btn-primary staticButton sub">Raumansicht</a>
            <a style="padding: 3%;" href="datenbank_geraete.php" type="button"
               class="btn btn-primary staticButton sub mt-2">Datenbank</a>
            <a style="padding: 3%;" href="#" type="button" class="btn btn-primary staticButton sub mt-2">Ausleihe</a>
            <button type="submit" class="btn btn-primary staticButton sub mt-2" data-bs-toggle="modal"
                    data-bs-target="#addDevice">Geräte hinzufügen
            </button>
            <button type="submit" class="btn btn-primary staticButton sub mt-2" data-bs-toggle="modal"
                    data-bs-target="#addUser">Benutzer hinzufügen
            </button>
            <a style="padding: 3%;" href="softwarelizenzen.php" type="button"
               class="btn btn-primary staticButton sub mt-2">Softwarelizenzen</a>
            <a style="padding: 3%;" href="systemlog.php" type="button"
               class="btn btn-primary staticButton sub mt-2">System-logs</a>
            <a style="padding: 3%;" href="benachrichtigungseinstellungen.php" type="button"
               class="btn btn-primary staticButton sub mt-2">Einstellungen</a>
        </div>
        <div class="col-5">
            <div class="row">
                <p class="display-6 h6 text-center col-4 mt-3">Benachrichtungen</p>
            </div>

            <div class="toast show col-6 mt-2">
                <div class="toast-header ">
                    Important
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    Die Lizenz von Microsoft Visual Studio läuft auf PC1 in 3 Tagen ab.
                </div>
            </div>

            <div class="toast show col-6 mt-2">
                <div class="toast-header">
                    Important
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Die Lizenz von MS Office läuft auf PC2 in 14 Tagen ab.
                </div>
            </div>

            <div class="toast show col-6 mt-2">
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
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUser" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Benutzer Hinzufügen</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="row mt-3">
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" id="role">
                                    <option selected>Rolle*</option>
                                    <option value="1" id="deviceTyp">Administrator</option>
                                    <option value="2" id="deviceTyp">Mitarbeiter</option>
                                    <option value="3" id="deviceTyp">Student</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Vorname*"></div>
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Name*"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="E-Mail Adresse*">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Benutzerkennung*">
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <p>mit * makierte Felder sind Pflichtfelder</p>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">+</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addDevice" tabindex="-1" aria-labelledby="addDevice" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Gerät Hinzufügen</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="row mt-3">
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" id="deviceTyp">
                                    <option selected>Typ*</option>
                                    <option value="1" id="deviceTyp">Computer</option>
                                    <option value="2" id="deviceTyp">Accessoir</option>
                                    <option value="3" id="deviceTyp">Eigener Typ</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" id="deviceTyp">
                                    <option selected disabled>Typ*</option>
                                    <option value="1" id="deviceTyp">Windows</option>
                                    <option value="2" id="deviceTyp">Ubuntu</option>
                                    <option value="3" id="deviceTyp">Debian</option>
                                    <option value="3" id="deviceTyp">MacOS</option>
                                    <option value="3" id="deviceTyp">Neues Betriebssystem</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Name*"></div>
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="IP-Adresse"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Hersteller"></div>
                            <div class="col">
                                <select class="form-select" data-mdb-clear-button="true"
                                        placeholder="Software des Gerätes">
                                    <option selected>Software des Gerätes</option>
                                    <option value="1">Microsoft Visual Studio 2022</option>
                                    <option value="2">Intel Quartus Prime</option>
                                    <option value="3">MS Office</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group date" id="datepickerUsage">
                                        <input type="text" class="form-control" placeholder="erste Inbetriebname*">
                                        <span class="input-group-append">
                                        <span class="input-group-text bg-white d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group date" id="datepickerBuild">
                                        <input type="text" class="form-control" placeholder="alter des Gerätes">
                                        <span class="input-group-append">
                                        <span class="input-group-text bg-white d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <textarea class="form-control" id="technischeEckdaten" rows="5"
                                          placeholder="Technische Eckdaten"></textarea>
                            </div>
                            <div class="col">
                                <textarea class="form-control" id="comment" rows="5"
                                          placeholder="Kommentar zum Geräte"></textarea>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="dataImport" class="form-label">Aus Datei importieren</label>
                            <input class="form-control" type="file" id="dataImport" placeholder="Aus Datei importieren">
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <p>mit * makierte Felder sind Pflichtfelder</p>
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
        <li class="nav-item"><a href="https://www.fh-aachen.de/impressum/" class="nav-link px-2 text-muted"
                                target="_blank">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>
</footer>
<script type="text/javascript">
    $(function () {
        $('#datepickerUsage').datepicker();
    });

    $(function () {
        $('#datepickerBuild').datepicker();
    });
</script>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
