@extends('Dashboard.layout_dashboard')
@extends('header_footer')


@section('Navigation')
    <div class="row mt-5 row justify-content-between">
        <div class="btn-group-vertical col-5 mt-3 offset-1">
            <a style="padding: 3%;" href="raumauswahl.php" type="button" class="btn btn-primary staticButton sub">Raumauswahl</a>
            <a style="padding: 3%;" href="eigeneGeraete.php" type="button"
               class="btn btn-primary staticButton sub mt-2">Eigene Geräte</a>
            <a style="padding: 3%;" href="/verleihung" type="button"
               class="btn btn-primary staticButton sub mt-2">Verleihung an Studenten</a>
            <a style="padding: 3%;" href="/einstellungen" type="button"
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


@section('jsextra')
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
@endsection
