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
    <title>Raumansicht</title>

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
        <p class="display-6 col-3">Raumansicht</p> </div>
    <div class="container mt-3">
        <table class="table table-striped table-bordered" id="Raumansicht_studenten" >
            <thead>
            <tr>
                <th>Raum</th>
                <th>Anzahl Workstations</th>
                <th>Belegte Workstations</th>
                <th>Auslastung</th>
            </tr>
            </thead>

            <tr>
                <td>A001</td>
                <td>15</td>
                <td>13</td>
                <td><div class=" mt-1 col-10">
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:86.7%; background-color: red" aria-valuenow="86.7" aria-valuemin="0"
                                 aria-valuemax="100">
                                <small class="justify-content-center d-flex position-absolute w-100">13/15</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:13.3%; background-color: black"></div>
                        </div>
                    </div></td>

            </tr>
            <tr>
                <td>A002</td>
                <td>15</td>
                <td>2</td>
                <td><div class=" mt-1 col-10">
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:13.3%; background-color: green" aria-valuenow="13.3" aria-valuemin="0"
                                 aria-valuemax="100">
                                <small class="justify-content-center d-flex position-absolute w-100">2/15</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:86.7%; background-color: black"></div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>A003</td>
                <td>10</td>
                <td>9</td>
                <td>
                    <div class=" mt-1 col-10">
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:90%; background-color: red" aria-valuenow="90" aria-valuemin="0"
                                 aria-valuemax="100">
                                <small class="justify-content-center d-flex position-absolute w-100">9/10</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:10%; background-color: black"></div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>A004</td>
                <td>16</td>
                <td>0</td>
                <td>
                    <div class=" mt-1 col-10">
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:0%; background-color: limegreen" aria-valuenow="0" aria-valuemin="0"
                                 aria-valuemax="100">
                                <small class="justify-content-center d-flex position-absolute w-100">0/16</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:100%; background-color: black"></div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>A101</td>
                <td>20</td>
                <td>15</td>
                <td>
                    <div class=" mt-1 col-10">
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:75%; background-color: orange" aria-valuenow="75" aria-valuemin="0"
                                 aria-valuemax="100">
                                <small class="justify-content-center d-flex position-absolute w-100">15/20</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:25%; background-color: black"></div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>A102</td>
                <td>16</td>
                <td>6</td>
                <td>
                    <div class=" mt-1 col-10">
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:37.5%; background-color: yellowgreen" aria-valuenow="37.5" aria-valuemin="0"
                                 aria-valuemax="100">
                                <small class="justify-content-center d-flex position-absolute w-100">6/16</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:62.5%; background-color: black"></div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>A103</td>
                <td>12</td>
                <td>6</td>
                <td>
                    <div class=" mt-1 col-10">
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:50%; background-color: #ffe135" aria-valuenow="50" aria-valuemin="0"
                                 aria-valuemax="100">
                                <small class="justify-content-center d-flex position-absolute w-100">6/12</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:50%; background-color: black"></div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>A104</td>
                <td>10</td>
                <td>7</td>
                <td>
                    <div class=" mt-1 col-10">
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:70%; background-color: orange" aria-valuenow="70" aria-valuemin="0"
                                 aria-valuemax="100">
                                <small class="justify-content-center d-flex position-absolute w-100">7/10</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:30%; background-color: black"></div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <a href="dashboard_studenten.php">
            <button type="submit" class="btn btn-primary sub">Zurück zum Dashboard</button>
        </a>
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