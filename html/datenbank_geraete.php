



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
            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addConfirmation">
                Geräte hinzufügen
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
            <select class="form-select" name="hersteller" id="hersteller">
                <option value="none" selected>Hersteller</option>
                <option value="dell">Dell</option>
                <option value="hp">Hp</option>
            </select>
        </div>

        <div class="col mt-2">
            <input type="search" class="form-control rounded" placeholder="Alter" aria-label="Search"
            name="alter" id = "alter">
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

        <div class="col mt-2">
            <input type="search" class="form-control rounded" placeholder="Raum" aria-label="Search"
                   name="raum" id = "raum">
        </div>


        <div class="col mt-1">
            <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
        </div>

    </div>
    </form>


    <div>
        <div class="form-group">
            <a href="datenbank_geraete.php" class="btn btn-primary sub "  role="button" aria-disabled="true">Geräte</a>

            <a href="datenbank_personen.php" class="btn btn-secondary"  role="button" aria-disabled="true">Personen</a>

            <a href="datenbank_softwarelizenzen.php" class="btn btn-secondary"  role="button" aria-disabled="true">Lizenzen</a>

        </div>

    </div>


    <div class="container mt-3">
        <table class="table table-striped table-bordered" id="devices">
            <thead>
            <tr>
                <th onclick="sortTable(0)">Name</th>
                <th onclick="sortTable(1)">Typ</th>
                <th onclick="sortTable(2)">Hersteller</th>
                <th onclick="sortTable(3)">Alter</th>
                <th onclick="sortTable(4)">Betriebssystem</th>
                <th onclick="sortTable(5)">Software</th>
                <th onclick="sortTable(6)">Technische Daten</th>
                <th onclick="sortTable(7)">Kommentar</th>
                <th onclick="sortTable(8)">Raum</th>
                <th>Bearbeiten</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>PC-1</td>
                <td>Tower-Pc</td>
                <td>Dell</td>
                <td>6 Jahre</td>
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
                <td>E145</td>
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editConfirmation">Geräte bearbeiten
                    </button>
                </td>
            </tr>

            <tr>
                <td>PC-2</td>
                <td>Tower-Pc</td>
                <td>Dell</td>
                <td>6 Jahre</td>
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
                <td>E144</td>
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editConfirmation">Geräte bearbeiten
                    </button>
                </td>
            </tr>

            <tr>
                <td>PC-3</td>
                <td>Tower-Pc</td>
                <td>Dell</td>
                <td>6 Jahre</td>
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
                <td>E144</td>
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editConfirmation">Geräte bearbeiten
                    </button>
                </td>
            </tr>

            <tr>
                <td>HDMI Kabel</td>
                <td>Sonstiges</td>
                <td>Amazon</td>
                <td>2 Jahre</td>
                <td></td>
                <td>
                </td>
                <td>
                    <ul>
                        <li>HDMI 2.0</li>
                        <li>2 Meter</li>

                    </ul>
                </td>
                <td>Ist eigentlich nur 1,97m lang</td>
                <td>Lager</td>
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editConfirmation">Geräte bearbeiten
                    </button>
                </td>
            </tr>

            <tr>
                <td>Maus</td>
                <td>Pc-Maus</td>
                <td>Logischtech</td>
                <td>1 Jahr</td>
                <td></td>
                <td>

                </td>
                <td>
                    <ul>
                        <li>Kabelgebunden</li>
                        <li>1000 Hz</li>
                    </ul>
                </td>
                <td>Sie ist gerne microchips</td>
                <td>Lager</td>
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editConfirmation">Geräte bearbeiten
                    </button>
                </td>
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

<div class="modal" id="addConfirmation">
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


<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("devices");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Get the two elements you want to compare,
                one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /* Check if the two rows should switch place,
                based on the direction, asc or desc: */
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                // Each time a switch is done, increase this count by 1:
                switchcount++;
            } else {
                /* If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again. */
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</html>
