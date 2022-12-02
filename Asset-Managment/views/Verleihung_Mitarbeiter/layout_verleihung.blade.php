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
    <title>Verleihung</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container">

    @yield('header')
    <div class="row mt-4">
        <p class="display-6 col-3"> Verleihung an den Studenten</p>
    </div>

    @yield('content')

    <a href="dashboard_mitglieder.php">
        <button type="submit" class="btn btn-primary sub">Zurück zum Dashboard</button>
    </a>
</div>


</div>
<footer class="py-3 my-4">
    @yield('footer')
</footer>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
