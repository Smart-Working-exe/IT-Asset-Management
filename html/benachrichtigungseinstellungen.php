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
        <p class="display-6 col-lg-3"> Softwarelizenzen</p>


        <div class="form-group">
            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addConfirmation">
                Softwarelizenzen
            </button>
        </div>
        <div> <br></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addConfirmation2">
                    IP-Adressräume
                </button>
            </div>
        <div> <br></div>

            <a href="dashboard_admin.php">
                <button type="submit" class="btn btn-primary sub">Zurück zum Dashboard</button>
            </a>
    </div>


        <!-- The Modal -->


        <div class="modal" id="addConfirmation">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Softwarelizenzen</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                            Das Frühwarnsystem warnt momentan 1 Monat vor Ablauf der Softwarelizenz. <br>
                            Der neue Zeitraum für das Frühwarnsystem beträgt: <br>

                        <form action="" method="post">
                            <input type="radio" id="week" name=warning value="1 Woche">
                            <label for="week">1 Woche</label><br>
                            <input type="radio" id="2 weeks" name=warning value="2 Wochen">
                            <label for="2 weeks">2 Wochen</label><br>
                            <input type="radio" id="Monat" name=warning value="1 Monat">
                            <label for="Monat">1 Monat</label> <br>
                            <input type="radio" id="sonstiges" name=warning value="sonst">
                            <label for="sonstiges">sonstiges</label><br>

                   <!--         <script>
                                $(document).ready(function() {
                                    $("input[name$='warning']").click(function() {
                                        var test = $(this).val();
                                        $("#" + test).show();
                                    });
                                });
                            </script>
                            <div class="desc" id="sonst" style="display: none;">
                                Anzahl Tage
                                <input type="text" />
                            </div>-->
                        </form>


                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                    </div>
                </div>
            </div>
        </div>


    <div class="modal" id="addConfirmation2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">IP-Adressräume</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    Das Frühwarnsystem warnt momentan wenn der Addressbereich nur noch 100 freie Plätze hat <br>
                     <br>

                    <form action="" method="post">
                        <input type="radio" id="10 IP" name=Adressraum value="10 frei">
                        <label for="week">10 freie Adressen</label><br>
                        <input type="radio" id="20 IP" name=Adressraum value="20 frei">
                        <label for="2 weeks">20 freie  Adressen </label><br>
                        <input type="radio" id="50 IP" name=Adressraum value="50 frei">
                        <label for="Monat">50 freie Addressen</label> <br>
                        <input type="radio" id="sonstig" name=Adressraum value="sonsti">
                        <label for="sonstig">sonstiges</label><br>

                        <!--         <script>
                                     $(document).ready(function() {
                                         $("input[name$='Adressraum']").click(function() {
                                             var test = $(this).val();
                                             $("#" + test).show();
                                         });
                                     });
                                 </script>
                                 <div class="descr" id="sonsti" style="display: none;">
                                     Anzahl Tage
                                     <input type="text" />
                                 </div>-->
                    </form>


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
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

    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
