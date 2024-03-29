<html>
<head>
    <title>Softwarelizenzen</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/img/fh-aachen_university-of-applied-sciences_303_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/custom.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
<div class="container">

    @yield('header')

    <div class="row mt-4 ">
        <p class="display-6 col-3">Softwarelizenzen</p>

        <div class="form-group">
            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addSoftware">
                Softwarelizenz hinzufügen
            </button>
        </div>


        @yield('softwarefilter')
        <div class="container mt-3">

        @yield('content')

            <a href="/dashboard">
                <button type="submit" class="btn btn-primary sub">Zurück zum Dashboard</button>
            </a>
        </div>
    </div>

    @yield('addSoftware')
    <footer class="py-3 my-4 footerBot">
        @yield('footer')
    </footer>

    <script type="text/javascript">
        $(function () {
            $('#datepickerAvailable').datepicker({
                format: 'dd.mm.yyyy'
            });
        });
        $(function () {
            $('#datepickerNotAvailable').datepicker({
                format: 'dd.mm.yyyy'
            });
        });
        $(function () {
            $('#datepickerEditAvailable').datepicker({
                format: 'dd.mm.yyyy'
            });
        });
        $(function () {
            $('#datepickerEditNotAvailable').datepicker({
                format: 'dd.mm.yyyy'
            });
        });
    </script>
    <script type="text/javascript" src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>