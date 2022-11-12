


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
            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addSoftwareConfirmation">
                Softwarelizenzen hinzufügen
            </button>

            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#exportConfirmation">
                Export
            </button>

            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#importConfirmation">
                Import
            </button>


        </div>
    </div>


    <form action="#" method="get">
    <div class="row" style="padding-right: 30%">

        <div class="input-group mt-2 col-3" style="width: 50%; height: 2vh;">
            <input type="search" class="form-control rounded" placeholder="Suche" aria-label="Search"
                   aria-describedby="search-addon" name="search" id="search"/>
        </div>



        <div class="col mt-1">
            <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
        </div>

    </div>
    </form>


    <div>
        <div class="form-group">
            <a href="datenbank_geraete.php" class="btn btn-secondary "  role="button" aria-disabled="true">Geräte</a>
            <a href="datenbank_personen.php" class="btn btn-secondary"  role="button" aria-disabled="true">Personen</a>
            <a href="datenbank_softwarelizenzen.php" class="btn btn-primary sub"  role="button" aria-disabled="true">Lizenzen</a>

        </div>

    </div>


    <div class="container mt-3">
        <table class="table table-striped table-bordered" id="devices">
            <thead>
            <tr>
                <th onclick="sortTable(0, devices)">Name</th>
                <th onclick="sortTable(1, devices)">Erworben am</th>
                <th onclick="sortTable(2, devices)">Ablauf am</th>
                <th onclick="sortTable(3, devices)">Installationen</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>MS Office</td>
                <td>20.10.2022</td>
                <td>20.10.2024</td>
                <td>187</td>
            </tr>

            <tr>
                <td>Microsoft Visual Studio 2022</td>
                <td>01.09.2022</td>
                <td>01.10.2024</td>
                <td>207</td>
            </tr>

            <tr>
                <td>Intel Quartus Prime</td>
                <td>01.01.1906</td>
                <td>01.01.2026</td>
                <td>17</td>
            </tr>



            </tbody>
        </table>
    </div>

</div>
</body>
<footer class="py-3 my-4 footerBot">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item nav-link px-2 text-muted">Angemeldet als Benutzer ef8366m</li>
        <li class="nav-item"><a href="dashboard_admin.php" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="https://www.fh-aachen.de/impressum/" class="nav-link px-2 text-muted" target="_blank">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>
</footer>

<!-- The Modal -->
<div class="modal" id="editConfirmation">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hier kommt das Formular zum Bearbeiten hin.</h4>
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

<div class="modal" id="exportConfirmation">
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

<div class="modal" id="importConfirmation">
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

<div class="modal" id="addSoftwareConfirmation">
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


<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</html>
