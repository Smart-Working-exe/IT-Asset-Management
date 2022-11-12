<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/custom.css">
    <link rel="icon" type="image/x-icon" href="/img/fh-aachen_university-of-applied-sciences_303_logo.png">
    <title>Softwarelizenzen</title>
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
        <p class="display-6 col-3">Softwarelizenzen</p>


        <div class="form-group">
            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addConfirmation">
                Softwarelizenz hinzufügen
            </button>
        </div>

    <div class="container mt-3">
        <table class="table table-striped table-bordered" id="license">
            <thead>
            <tr>
                <th onclick="sortTable(0, license)">Name <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                <th onclick="sortTable(1, license)">Erworben am <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                <th onclick="sortTable(2, license)">Ablauf am <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                <th onclick="sortTable(3, license)">Installationen <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
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
            </tr>

            <tr>
                <td>Microsoft Visual Studio 2022</td>
                <td>01.09.2022</td>
                <td>01.10.2024</td>
                <td>
                    <div class="progress position-relative">
                        <div class="progress-bar" role="progressbar"
                             style="width:25%; background-color: green" aria-valuenow="207" aria-valuemin="0"
                             aria-valuemax="800">
                            <small class="justify-content-center d-flex position-absolute w-100">207/800</small>
                        </div>
                        <div class="progress-bar" role="progressbar"
                             style="width:75%; background-color: black"></div>
                    </div>
                </td>>
            </tr>

            <tr>
                <td>Intel Quartus Prime</td>
                <td>01.01.1996</td>
                <td>01.01.2026</td>
                <td>
                    <div class="progress position-relative">
                        <div class="progress-bar" role="progressbar"
                             style="width:92%; background-color: darkred" aria-valuenow="17" aria-valuemin="0"
                             aria-valuemax="100">
                            <small class="justify-content-center d-flex position-absolute w-100">92/100</small>
                        </div>
                        <div class="progress-bar" role="progressbar"
                             style="width:8%; background-color: black"></div>
                    </div>
                </td>
            </tr>



            </tbody>
        </table>

        <a href="dashboard_admin.php">
            <button type="submit" class="btn btn-primary sub">Zurück zum Dashboard</button>
        </a>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="addConfirmation">
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
<footer class="py-3 my-4 footerBot">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item nav-link px-2 text-muted">Angemeldet als Benutzer ef8366m</li>
        <li class="nav-item"><a href="dashboard_admin.php" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="https://www.fh-aachen.de/impressum/" class="nav-link px-2 text-muted" target="_blank">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>
</footer>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
