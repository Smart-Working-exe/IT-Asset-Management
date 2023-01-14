<html>
<head>
       <title>Datenbank</title>
{{--    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="IE=edge" name="viewport"--}}
{{--          content="width=device-width, initial-scale=1.0">--}}
{{--    <link rel="icon" type="image/x-icon" href="/img/fh-aachen_university-of-applied-sciences_303_logo.png">--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="/styles/bootstrap.css">--}}
{{--    <link rel="stylesheet" href="/styles/custom.css">--}}
{{--    <link rel="stylesheet"--}}
{{--          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>--}}
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
    <script src="../js/hideEntity.js"></script>
</head>
<body>
<div class="container">

    @yield('header')

    <div class="row mt-4 ">
        <p class="display-6 col-3">Datenbank</p>
    </div>
    <div>
        <div class="form-group">
            @if($typ == 'geraete')
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addDevice">
                    Geräte hinzufügen
                </button>
            @elseif($typ == 'personen')
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addUser">
                    Benutzer hinzufügen
                </button>
            @elseif($typ == 'lizenzen')
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addSoftware">
                    Softwarelizenz hinzufügen
                </button>
            @endif

            @yield('export')
            <!-- <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                    data-bs-target="#importConfirmation">
                Import
            </button> -->
            @if($_SESSION['dup_entry'])
                <div style="font-family: Arial,serif; font-weight: bold; Color: red;">
                    Dieses Geräte existiert bereits wählen Sie einen anderen Namen.
                </div>
                {{$_SESSION['dup_entry']= false}}
            @endif

        </div>

    </div>



    @if($typ == 'geraete')
        @yield('geraetefilter')
        @yield('addDevice')
        @yield('editDevice')
    @elseif($typ == 'personen')
        @yield('userfilter')
        @yield('addfilter')
        @yield('editfilter')
    @elseif($typ == 'lizenzen')
        @yield('softwarefilter')
        @yield('addsoftware')
        @yield('editsoftware')
    @endif

    <div class="container">
    <div class="row">
        <div class="form-group ">
            <a href="/datenbank?database=geraete" class="btn  @if($typ == 'geraete') btn-primary sub @else btn-secondary @endif " role="button" aria-disabled="true">Geräte</a>

            <a href="/datenbank?database=personen" class="btn @if($typ == 'personen') btn-primary sub @else btn-secondary @endif" role="button" aria-disabled="true">Personen</a>

            <a href="/datenbank?database=lizenzen" class="btn @if($typ == 'lizenzen') btn-primary sub @else btn-secondary @endif" role="button" aria-disabled="true">Lizenzen</a>

            @if(!empty($selected_filter) && $typ == "geraete")
                <a href="/datenbank?database=geraete" class="btn  btn-primary sub " role="button" aria-disabled="true" style="margin-left: 65%">Filter Zurücksetzten</a>
            @endif
        </div>


    </div>
</div>


    <div class="container mt-3">

        @yield('content')

        <a href="/dashboard">
            <button type="submit" class="btn btn-primary sub">Zurück zum Dashboard</button>
        </a>
    </div>

</div>
</body>
<footer class="py-3 my-4 footerBot">
  @yield('footer')
</footer>

@yield('addDevice')
@yield('editDevice')


@if($typ == 'geraete')
    @yield('addDevice')
    @yield('editDevice')

@elseif($typ == 'personen')
    @yield('addUser')
    @yield('editUser')

@elseif($typ == 'lizenzen')
    @yield('addSoftware')
    @yield('editSoftware')
@endif

<script type="text/javascript">
    $(function () {
        $('#datepickerBuild').datepicker({
            format: 'dd.mm.yyyy'
        });
    });

    $(function () {
        $('#datepickerUsage').datepicker({
            format: 'dd.mm.yyyy'
        });
    });
    $(function () {
        $('#datepickerEditBuild').datepicker({
            format: 'dd.mm.yyyy'
        });
    });

    $(function () {
        $('#datepickerEditUsage').datepicker({
            format: 'dd.mm.yyyy'
        });
    });
</script>

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
</html>
