<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/custom.css">
    <link rel="icon" type="image/x-icon" href="/img/fh-aachen_university-of-applied-sciences_303_logo.png">
    <title>Raumauswahl</title>
</head>
<body>
<div class="container">
    <div class="row">
        <a href="dashboard_admin.php" class="col-3"><img class="img-fluid" src="/img/fh-aachen_university-of-applied-sciences_303_logo.png" alt="fhlogo"></a>
        <a href="dashboard_admin.php" class="nav-link col-6"><p class="h1 text-center mt-4">IT Asset Management</p></a>
        <div class="col-3">
            <!-- <form method="get"> -->
            <a href="login.php"><button type="submit" class="btn btn-danger mt-4">Abmelden</button></a>
            <!-- </form> -->
        </div>
    </div>
    <div class="row p-4 mt-4">
        <img src="../img/Lageplan.png" alt="lagepln" class="col-lg-8" style="height: 60vh;">
        <div id="accordion " class="col-lg-4">

            <div class="card">
                <div class="card-header">
                    <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                        Gebäude A
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                    <div class="card-body">
                        <a href="#"> Raum A001</a>
                        <a href="+"> Raum A002</a>
                        <a href="#"> Raum A003</a>
                        <a href="#"> Raum A004</a>
                        <a href="#"> Raum A101</a>
                        <a href="raumansicht.php"> Raum A102</a>
                        <a href="#"> Raum A103</a>
                        <a href="#"> Raum A104</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                        Gebäude B
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                        Gebäude C
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="btn" data-bs-toggle="collapse" href="#collapseFour">
                        Gebäude D
                    </a>
                </div>
                <div id="collapseFour" class="collapse show" data-bs-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFive">
                        Gebäude E
                    </a>
                </div>
                <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse6">
                        Gebäude F
                    </a>
                </div>
                <div id="collapse6" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="btn" data-bs-toggle="collapse" href="#collapse7">
                        Gebäude G
                    </a>
                </div>
                <div id="collapse7" class="collapse show" data-bs-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse8">
                        Gebäude H
                    </a>
                </div>
                <div id="collapse8" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse9">
                        Gebäude W
                    </a>
                </div>
                <div id="collapse9" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse10">
                        Home-Office
                    </a>
                </div>
                <div id="collapse10" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
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
        <li class="nav-item"><a href="impressum.php" class="nav-link px-2 text-muted">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>
</footer>

<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
