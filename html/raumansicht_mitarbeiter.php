<html>
<head>
    <title>Raumansicht</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/img/fh-aachen_university-of-applied-sciences_303_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
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
        <p class="display-6 col-3"> Raum A102</p>
    </div>
    <div class="row"> <!-- Wegen Row ist die Progressbar abgeschnitten -->
        <p class="col-4"><b>IP-Adressbereich: 111.111.111.000/27</b></p>
        <div class=" mt-1 col-2">
            <div class="progress position-relative">
                <div class="progress-bar" style="width:20%; background-color: green"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                    <small class="justify-content-center d-flex position-absolute w-100">6/30</small></div>
                <div class="progress-bar" style="width:80%; background-color: black"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <p class="col-2 "><b>Belegung Workstations:
            </b>
        </p>
        <div class="col-2">
            <input style="height:25px; width:120px;" class="form-control" type="number" id="deviceName" placeholder="6">
        </div>
        <div class=" mt-1 col-2">
            <div class="progress position-relative">
                <div class="progress-bar progress-bar-striped progress-bar-animated"
                     style="width:100%; background-color: red"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                    <small class="justify-content-center d-flex position-absolute w-100">6/6</small></div>
                <div class="progress-bar" style="width:0%; background-color: black"></div>
            </div>
        </div>
    </div>


    <form action="#" method="get">
        <div class="row">

            <div class="input-group mt-2 col-3" style="width: 20%; height: 2vh;">
                <input type="search" class="form-control rounded" placeholder="Suche" aria-label="Search"
                       aria-describedby="search-addon" name="search" id="search"/>
            </div>

            <div class="col mt-2">

                <select class="form-select" name="typ" id="typ">
                    <option value="none" selected>Typ</option>
                    <option value="pC">PC</option>
                    <option value="laptop">Laptop</option>
                    <option value="sontiges">Sonstiges</option>
                </select>

            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Hersteller" aria-label="Search"
                       name="hersteller" id="hersteller">
            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Alter" aria-label="Search"
                       name="alter" id="alter">
            </div>

            <div class="col mt-2">
                <select class="form-select" name="betriebssystem" id="betriebssystem">
                    <option value="none" selected>Betriebssystem</option>
                    <option value="windows">Windows</option>
                    <option value="mac">Mac</option>
                    <option value="linux">Linux</option>
                </select>
            </div>

            <div class="col mt-2">
                <select class="form-select" name="software" id="software">
                    <option value="none" selected>Software</option>
                    <option value="msoffice">MSOffice</option>
                    <option value="visualstudio">Visual Studio</option>
                    <option value="microchipstudio">Microchip Studio</option>
                </select>
            </div>

            <div class="col mt-1">
                <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
            </div>

        </div>
    </form>
    <div class="container mt-3">
        <table class="table table-striped table-bordered" id="devices">
            <thead>
            <tr>
                <th onclick="sortTable(0, devices)">Name<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
                </th>
                <th onclick="sortTable(1, devices)">Typ<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
                </th>
                <th onclick="sortTable(2, devices)">Hersteller<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                   width="20px"></th>
                <th onclick="sortTable(3, devices)">Alter<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                              width="20px"></th>
                <th onclick="sortTable(4, devices)">IP-Adresse<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                   width="20px"></th>
                <th onclick="sortTable(5, devices)">Betriebssystem<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                       width="20px"></th>
                <th onclick="sortTable(6, devices)">Software<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                 width="20px"></th>
                <th onclick="sortTable(7, devices)">Technische Daten<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                         width="20px"></th>
                <th onclick="sortTable(8, devices)">Kommentar<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                  width="20px"></th>
                <th >Kommentieren</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>PC-1</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>6 Jahren</td>
                <td>111.111.111.2</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>8GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX4090</li>
                    </ul>
                </td>
                <td>Game Design geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editKommentar">Kommentieren
                    </button></td>
            </tr>

            <tr>
                <td>PC-2</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>6 Jahren</td>
                <td>111.111.111.3</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>16GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX3070</li>
                    </ul>
                </td>
                <td>Virtualization geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editKommentar">Kommentieren
                    </button></td>
            </tr>
            <tr>
                <td>PC-3</td>
                <td>Tower-P</td>
                <td>HP</td>
                <td>3 Jahren</td>
                <td>111.111.111.4</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>8GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX4090</li>
                    </ul>
                </td>
                <td>Game Design geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editKommentar">Kommentieren
                    </button></td>
            </tr>
            <tr>
                <td>PC-4</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>3 Jahren</td>
                <td>111.111.111.5</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>16GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX3070</li>
                    </ul>
                </td>
                <td>Virtualization geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editKommentar">Kommentieren
                    </button></td>
            </tr>
            <tr>
                <td>PC-5</td>
                <td>Desktop</td>
                <td>HP</td>
                <td>2 Jahren</td>
                <td>111.111.111.6</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>8GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX4090</li>
                    </ul>
                </td>
                <td>Game Design geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editKommentar">Kommentieren
                    </button></td>
            </tr>
            <tr>
                <td>PC-6</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>1 Jahren</td>
                <td>111.111.111.7</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>16GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX3070</li>
                    </ul>
                </td>
                <td>Virtualization geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editKommentar">Kommentieren
                    </button></td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div class="modal" id="editKommentar">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Kommentar</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                  <fieldset>
                      <textarea id="kommentar" name="textfeld" cols="45" rows="4"></textarea>
                  </fieldset>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
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
