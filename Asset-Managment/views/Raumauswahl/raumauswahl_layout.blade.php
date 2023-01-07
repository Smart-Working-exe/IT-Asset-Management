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

    @yield('header')


    <div class="row p-4 mt-4">
        <img  src="../img/Lageplan.png" alt="Lageplan der FH-Aachen, Eupener Straße 33" class="col-8" style="height: 60vh; @media (max-width: 600px){height: 40vh}">
        <div id="accordion " class="col-4">

            @yield('content')
        </div>

    </div>
</div>
<footer class="py-3 my-4 footerBot">
    @yield('footer')
</footer>

<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

