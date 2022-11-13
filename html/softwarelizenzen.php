<html>
<head>
    <title>Softwarelizenzen</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <div class="row mt-4 ">
        <p class="display-6 col-3">Softwarelizenzen</p class="display-6 col-3">
        <div class="form-group">
            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addSoftware">
                Softwarelizenz hinzufügen
            </button>
        </div>

        <div class="container mt-3">
            <table class="table table-striped table-bordered" id="license">
                <thead>
                <tr>
                    <th onclick="sortTable(0, license)">Name <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                  width="20px"></th>
                    <th onclick="sortTable(1, license)">Erworben am <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                         width="20px"></th>
                    <th onclick="sortTable(2, license)">Ablauf am <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                       width="20px"></th>
                    <th onclick="sortTable(3, license)">Installationen <img
                                src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th>Bearbeiten</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>MS Office</td>
                    <td>20.10.2022</td>
                    <td>20.10.2024</td>
                    <td>
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:18%; background-color: green" aria-valuenow="187" aria-valuemin="0"
                                 aria-valuemax="1000">
                                <small class="justify-content-center d-flex position-absolute w-100">187/1000</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:82%; background-color: black"></div>
                        </div>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                                data-bs-target="#editSoftware">Softwarelizenz bearbeiten
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>Microsoft Visual Studio 2022</td>
                    <td>01.09.2022</td>
                    <td>01.10.2024</td>
                    <td>
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:25%; background-color: yellowgreen" aria-valuenow="207" aria-valuemin="0"
                                 aria-valuemax="800">
                                <small class="justify-content-center d-flex position-absolute w-100">207/800</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:75%; background-color: black"></div>
                        </div>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                                data-bs-target="#editSoftware">Softwarelizenz bearbeiten
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>Intel Quartus Prime</td>
                    <td>01.01.1996</td>
                    <td>01.01.2026</td>
                    <td>
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:92%; background-color: red" aria-valuenow="17" aria-valuemin="0"
                                 aria-valuemax="100">
                                <small class="justify-content-center d-flex position-absolute w-100">92/100</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:8%; background-color: black"></div>
                        </div>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                                data-bs-target="#editSoftware">Softwarelizenz bearbeiten
                        </button>
                    </td>
                </tr>


                </tbody>
            </table>

            <a href="dashboard_admin.php">
                <button type="submit" class="btn btn-primary sub">Zurück zum Dashboard</button>
            </a>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="addSoftware" tabindex="-1" aria-labelledby="addSoftware" aria-hidden="true">
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
                                <input class="form-control" type="text" id="deviceName"
                                       placeholder="Name der Lizenz*">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Hersteller*">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <div class="input-group date" id="datepickerAvailable">
                                    <input type="text" class="form-control" placeholder="Erwerbsdatum">
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
                            <div class="form-group">
                                <div class="input-group date" id="datepickerNotAvailable">
                                    <input type="text" class="form-control" placeholder="Ablaufdatum">
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
                            <input class="form-control" type="number" id="deviceName"
                                   placeholder="Anzahl verfügbarer Installation">
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
    <!-- The Modal -->
    <div class="modal fade" id="editSoftware" tabindex="-1" aria-labelledby="editSoftware" aria-hidden="true">
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
                                <input class="form-control" type="text" id="deviceName"
                                       placeholder="Name der Lizenz*" value="Visual Studio 2022">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Hersteller*"
                                       value="Microsoft">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <div class="input-group date" id="datepickerEditAvailable">
                                    <input type="text" class="form-control" placeholder="Erwerbsdatum"
                                           value="27.05.2022">
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
                            <div class="form-group">
                                <div class="input-group date" id="datepickerEditNotAvailable">
                                    <input type="text" class="form-control" placeholder="Ablaufdatum"
                                           value="27.05.2023">
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
                            <input class="form-control" type="number" id="deviceName"
                                   placeholder="Anzahl verfügbarer Installation" value="800">
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger">Softwarelizenz Löschen</button>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="py-3 my-4 footerBot">
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
        $('#datepickerAvailable').datepicker({
            format: 'dd.mm.yyyy'
        });
    });
    $(function () {
        $('#datepickerNotAvailable').datepicker({
            format: 'dd.mm.yyyy'
        });
    });
    $(function () {
        $('#datepickerEditAvailable').datepicker({
            format: 'dd.mm.yyyy'
        });
    });
    $(function () {
        $('#datepickerEditNotAvailable').datepicker({
            format: 'dd.mm.yyyy'
        });
    });
</script>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
