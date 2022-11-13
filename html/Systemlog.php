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
        <p class="display-6 col-3"> Systemlog</p>
    </div>


    <div class="container mt-3">
        <table class="table table-striped table-bordered" id="log">
            <thead>
            <tr>
                <th onclick="sortTable(0, log)">Benutzer <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                <th onclick="sortTable(1, log)">Benutzer <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                <th onclick="sortTable(2, log)">Aktion <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                <th onclick="sortTable(3, log)">Beschreibung <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>2021.12.13</td>
                <td>mm5645s</td>
                <td>Anmeldung</td>
                <td>Der Benutzer mm5645s hat sich angemeldet</td>

            </tr>

            <tr>
                <td>2013.02.14</td>
                <td>mm8536m</td>
                <td>Abmeldung</td>
                <td>Der Benutzer mm8536m hat sich abgemeldet</td>

            </tr>

            <tr>
                <td>2013.02.13</td>
                <td>ls0420</td>
                <td>Gerät löschen</td>
                <td>Der Benutzer ls0420 hat ein Gerät im Raum A112 gelöscht</td>

            </tr>

            <tr>
                <td>2022.02.12</td>
                <td>cd5679</td>
                <td>Gerät einfügen</td>
                <td>Der Benutzer cd5679 hat ein Gerät im Raum A112 eingefügt</td>

            </tr>

            <tr>
                <td>2022.07.27</td>
                <td>fy2134</td>
                <td>Ausleihe</td>
                <td>Der Benutzer fy2134 hat eine Anfrage für die Ausleihe gesendet</td>

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
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</html>
