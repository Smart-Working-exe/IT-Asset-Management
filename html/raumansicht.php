<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/custom.css">
    <title>Raumansicht</title>
</head>
<body>
<div class="container">
    <div class="row">
        <img class="col-lg-3 img-fluid" src="/img/fh-aachen_university-of-applied-sciences_303_logo.png" alt="fhlogo">
        <div class="col-lg-6"><p class="h1 text-center mt-4"> IT Asset Management</p></div>
        <div class="col-lg-3">
            <form method="get">
                <button type="submit" class="btn btn-danger mt-4">Abmelden</button>
            </form>
        </div>
    </div>
    <div class="row mt-4 ">
        <p class="display-6 col-lg-3"> Raum A102</p>
        <div class="input-group mt-2 col-lg-3" style="width: 30%; height: 2vh;">
            <input type="search" class="form-control rounded" placeholder="Suche" aria-label="Search"
                   aria-describedby="search-addon"/>
            <button type="button" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
        </div>
    </div>
    <div class="row">
        <p class="col-lg-3"><b>IP-Adressen: 111.111.111.000/27</b></p>
        <div class="progress mt-1 col-lg-2">
            <div class="progress-bar" style="width:70%; background-color: #40BEA9;">70%</div>
        </div>
        <p class="col-lg-3"><b>Belegung Workstations:</b></p>
        <div class="progress mt-1 col-lg-2">
            <div class="progress-bar" style="width:40%; background-color: #40BEA9;">40%</div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary sub" value="Gerät hinzufügen">
        </div>
    </div>
    <div class="container mt-3">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Typ</th>
                <th>Hersteller</th>
                <th>Alter</th>
                <th>IP-Adresse</th>
                <th>Betriebsystem</th>
                <th>Software</th>
                <th>Technische Daten</th>
                <th>Kommentar</th>
                <th>Bearbeit</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>PC-1</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>3 Jahren</td>
                <td>111.111.111.2</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microship Studio</li>
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
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
            </tr>

            <tr>
                <td>PC-2</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>3 Jahren</td>
                <td>111.111.111.3</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microship Studio</li>
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
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked></td>
            </tr>
            <tr>
                <td>PC-3</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>3 Jahren</td>
                <td>111.111.111.4</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microship Studio</li>
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
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
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
                        <li>Microship Studio</li>
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
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
            </tr>
            <tr>
                <td>PC-5</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>3 Jahren</td>
                <td>111.111.111.6</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microship Studio</li>
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
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked></td>
            </tr>
            <tr>
                <td>PC-6</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>3 Jahren</td>
                <td>111.111.111.7</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microship Studio</li>
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
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" unchecked></td>
            </tr>


            </tbody>
        </table>
    </div>

</div>
<footer class="py-3 my-4 footerBot">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item nav-link px-2 text-muted">Angemeldet als Benutzer ab1876m</li>
        <li class="nav-item"><a href="dashboard_admin.php" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="impressum.php" class="nav-link px-2 text-muted">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>
</footer>

<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
