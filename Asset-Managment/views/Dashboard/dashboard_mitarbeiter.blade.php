@extends('layout_dashboard')
@section('header')
<div class="row">
    <a href="/dashboard_mitarbeiter" class="col-3"><img class="img-fluid" src="/img/fh-aachen_university-of-applied-sciences_303_logo.png" alt="fhlogo"></a>
    <a href="/dashboard_mitarbeiter" class="nav-link col-6"><p class="h1 text-center mt-4">IT Asset Management</p></a>
    <div class="col-3">
        <!-- <form method="get"> -->
        <a href="/login"><button type="submit" class="btn btn-danger mt-4">Abmelden</button></a>
        <!-- </form> -->
    </div>
</div>
@endsection

@section('Navigation')
    <div class="row mt-5 row justify-content-between">
        <div class="btn-group-vertical col-5 mt-3 offset-1">
            <a style="padding: 3%;" href="raumauswahl.php" type="button" class="btn btn-primary staticButton sub">Raumauswahl</a>
            <a style="padding: 3%;" href="eigeneGeraete.php" type="button" class="btn btn-primary staticButton sub mt-2">Eigene Geräte</a>
            <a style="padding: 3%;" href="verleihung_studenten.php" type="button" class="btn btn-primary staticButton sub mt-2">Verleihung an Studenten</a>
            <a style="padding: 3%;" href="benachrichtigungseinstellungen_mitarbeiter.php" type="button"
               class="btn btn-primary staticButton sub mt-2">Einstellungen</a>
        </div>
        <div class="col-5">
            <div class="row">
                <p class="display-6 h6 text-center col-4 mt-3">Benachrichtigungen</p>
            </div>

            <div class="toast show col-6 mt-2">
                <div class="toast-header ">
                    Info
                </div>
                <div class="toast-body">
                    Keine Benachrichtigungen vorhanden.
                    <!--
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item nav-link px-2 text-muted">Angemeldet als Benutzer ab1876m</li>
        <li class="nav-item"><a href="/dashboard_mitarbeiter" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="https://www.fh-aachen.de/impressum/" class="nav-link px-2 text-muted" target="_blank">Impressum</a></li>
    </ul>
@endsection

@section('jsextra')
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
@endsection
