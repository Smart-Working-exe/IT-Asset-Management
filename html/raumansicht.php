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
        <p class="col-3"><b>IP-Adressbereich: 111.111.111.000/27</b></p>
        <div class=" mt-1 col-2">
            <div class="progress position-relative">
                <div class="progress-bar" style="width:20%; background-color: green"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                    <small class="justify-content-center d-flex position-absolute w-100">6/30</small></div>
                <div class="progress-bar" style="width:80%; background-color: black"></div>
            </div>
        </div>
        <p class="col-2 offset-1"><b>Belegung Workstations:</b></p>
        <div class=" mt-1 col-2">
            <div class="progress position-relative">
                <div class="progress-bar progress-bar-striped progress-bar-animated"
                     style="width:100%; background-color: red"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                    <small class="justify-content-center d-flex position-absolute w-100">6/6</small></div>
                <div class="progress-bar" style="width:0%; background-color: black"></div>
            </div>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addConfirmation">
                Geräte hinzufügen
            </button>
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
                <th>Bearbeiten</th>
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
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editConfirmation">Geräte bearbeiten
                    </button>
                </td>
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
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editConfirmation">Geräte bearbeiten
                    </button>
                </td>
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
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editConfirmation">Geräte bearbeiten
                    </button>
                </td>
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
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editConfirmation">Geräte bearbeiten
                    </button>
                </td>
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
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editConfirmation">Geräte bearbeiten
                    </button>
                </td>
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
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editConfirmation">Geräte bearbeiten
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="editConfirmation" tabindex="-1" aria-labelledby="editConfirmation" aria-hidden="true">
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
                                    <option >Typ*</option>
                                    <option value="1" id="deviceTyp" selected>Computer</option>
                                    <option value="2" id="deviceTyp">Accessoir</option>
                                    <option value="3" id="deviceTyp">Eigener Typ</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" id="deviceTyp">
                                    <option disabled>Typ*</option>
                                    <option value="1" id="deviceTyp" selected>Windows 10</option>
                                    <option value="2" id="deviceTyp">Ubuntu</option>
                                    <option value="3" id="deviceTyp">Debian</option>
                                    <option value="3" id="deviceTyp">MacOS</option>
                                    <option value="3" id="deviceTyp">Neues Betriebssystem</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Name*" value="PC-2"></div>
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="IP-Adresse" value="111.111.111.3"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Hersteller" value="Dell"></div>
                            <div class="col">
                                <select class="form-select" data-mdb-clear-button="true"
                                        placeholder="Software des Gerätes">
                                    <option>Software des Gerätes</option>
                                    <option value="1" selected>Microsoft Visual Studio 2022</option>
                                    <option value="2">Intel Quartus Prime</option>
                                    <option value="3" selected>MS Office</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group date" id="datepickerUsage">
                                        <input type="text" class="form-control" placeholder="erste Inbetriebname*" value="07/27/2017">
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
                                        <input type="text" class="form-control" placeholder="alter des Gerätes" value="07/27/2017">
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
                                          placeholder="Technische Eckdaten, mit Semikolon trennen">16GB RAM; 1000GB SSD; NVIDIA RTX3070</textarea>
                            </div>
                            <div class="col">
                                <textarea class="form-control" id="comment" rows="5"
                                          placeholder="Kommentar zum Geräte">Virtualization geeignet; </textarea>
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

    <!-- The Modal -->
    <div class="modal fade" id="addConfirmation" tabindex="-1" aria-labelledby="addConfirmation" aria-hidden="true">
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
                                <select class="form-select" data-mdb-clear-button="true" placeholder="Software des Gerätes">
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
                                <textarea class="form-control" id="technischeEckdaten" rows="5" placeholder="Technische Eckdaten"></textarea>
                            </div>
                            <div class="col">
                                <textarea class="form-control" id="comment" rows="5" placeholder="Kommentar zum Geräte"></textarea>
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
