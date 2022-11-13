<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/custom.css">
    <link rel="icon" type="image/x-icon" href="/img/fh-aachen_university-of-applied-sciences_303_logo.png">
    <title>Datenbank</title>
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
        <p class="display-6 col-3"> Datenbank</p>
    </div>

    <div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addUser">
                Benutzer hinzufügen
            </button>

            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                    data-bs-target="#exportConfirmation">
                Export
            </button>

            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                    data-bs-target="#importConfirmation">
                Import
            </button>


        </div>
    </div>


    <form action="#" method="get">
        <div class="row" style="padding-right: 50%">

            <div class="input-group mt-2 col-3" style="width: 50%; height: 2vh;">
                <input type="search" class="form-control rounded" placeholder="Suche" aria-label="Search"
                       aria-describedby="search-addon" name="search" id="search"/>
            </div>

            <div class="col mt-2" ;
            ">

            <select class="form-select" name="rolle" id="rolle">
                <option value="none" selected>Rolle</option>
                <option value="admin">Admin</option>
                <option value="mitarbeiter">Mitarbeiter</option>
                <option value="student">Student</option>
            </select>
        </div>

        <div class="col mt-1">
            <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
        </div>

</div>
</form>


<div>
    <div class="form-group">
        <a href="datenbank_geraete.php" class="btn btn-secondary " role="button" aria-disabled="true">Geräte</a>

        <a href="datenbank_personen.php" class="btn btn-primary sub" role="button" aria-disabled="true">Personen</a>

        <a href="datenbank_softwarelizenzen.php" class="btn btn-secondary" role="button"
           aria-disabled="true">Lizenzen</a>

    </div>

</div>


<div class="container mt-3">
    <table class="table table-striped table-bordered" id="person">
        <thead>
        <tr>
            <th onclick="sortTable(0, person)">Name <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
            </th>
            <th onclick="sortTable(1, person)">Vorname <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
            </th>
            <th onclick="sortTable(2, person)">Rolle <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
            </th>
            <th onclick="sortTable(3, person)">Kürzel <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
            </th>
            <th>Bearbeiten</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>Musterstudent</td>
            <td>Max</td>
            <td>Student</td>
            <td>mm5645s</td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editUser">Benutzer bearbeiten
                </button>
            </td>
        </tr>

        <tr>
            <td>Mustermitarbeiter</td>
            <td>Martin</td>
            <td>Mitarbeiter</td>
            <td>mm8536m</td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editUser">Benutzer bearbeiten
                </button>
            </td>
        </tr>
        <tr>
            <td>Musteradmin</td>
            <td>Maurice</td>
            <td>Admin</td>
            <td>mm2109a</td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editUser">Benutzer bearbeiten
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
</body>
<footer class="py-3 my-4 footerBot">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item nav-link px-2 text-muted">Angemeldet als Benutzer ef8366m</li>
        <li class="nav-item"><a href="dashboard_admin.php" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="https://www.fh-aachen.de/impressum/" class="nav-link px-2 text-muted"
                                target="_blank">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>
</footer>

<!-- The Modal -->
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
                                <option selected disabled>Rolle*</option>
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

<!-- The Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
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
                                <option disabled>Rolle*</option>
                                <option value="1" id="deviceTyp">Administrator</option>
                                <option value="2" id="deviceTyp" selected>Mitarbeiter</option>
                                <option value="3" id="deviceTyp">Student</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input class="form-control" type="text" id="deviceName" placeholder="Vorname*" value="Max">
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" id="deviceName" placeholder="Name*"
                                   value="Musterstudent"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input class="form-control" type="text" id="deviceName" placeholder="Benutzerkennung*"
                                   value="mm8536m">
                        </div>
                    </div>
                </div>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger">Benutzer Löschen</button>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="exportConfirmation">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hier kommt das Formular für das Expotieren hin.</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="importConfirmation">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hier kommt das Formular für den Import hin.</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</html>
