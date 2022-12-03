@extends('Dashboard.layout_dashboard')
@extends('header_footer')
@extends('modals.Eintraege.User')
@extends('modals.Eintraege.Device')



@section('Navigation')
    <div class="row  justify-content-between" style="padding: 10%; font-size: 36px;">
        <div class="btn-group-vertical col-5 mt-3 offset-1">
            <a style="padding: 3% ;" href="/raumauswahl" type="button" class="btn btn-primary staticButton sub">Raumansicht</a>
            <a style="padding: 3%;" href="/datenbank" type="button"
               class="btn btn-primary staticButton sub mt-2">Datenbank</a>
            <button type="submit" class="btn btn-primary staticButton sub mt-2" data-bs-toggle="modal"
                    data-bs-target="#addDevice">Geräte hinzufügen
            </button>
            <button type="submit" class="btn btn-primary staticButton sub mt-2" data-bs-toggle="modal"
                    data-bs-target="#addUser">Benutzer hinzufügen
            </button>
            <a style="padding: 3%;" href="/softwarelizenzen" type="button"
               class="btn btn-primary staticButton sub mt-2">Softwarelizenzen</a>
            <a style="padding: 3%;" href="/systemlogs" type="button"
               class="btn btn-primary staticButton sub mt-2">System-logs</a>
            <a style="padding: 3%;" href="/einstellungen" type="button"
               class="btn btn-primary staticButton sub mt-2">Einstellungen</a>
        </div>
        @endsection

        @section('Benachrichtigungen')
            <div class="col-5">
                <div class="row">
                    <p class="display-6 h6 text-center col-4 mt-3">Benachrichtungen</p>
                </div>

                <div class="toast show col-6 mt-2">
                    <div class="toast-header ">
                        Important
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        Die Lizenz von Microsoft Visual Studio läuft auf PC1 in 3 Tagen ab.
                    </div>
                </div>

                <div class="toast show col-6 mt-2">
                    <div class="toast-header">
                        Important
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Die Lizenz von MS Office läuft auf PC2 in 14 Tagen ab.
                    </div>
                </div>

                <div class="toast show col-6 mt-2">
                    <div class="toast-header ">
                        Important
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        In Raum A001 sind 30 von 32 IP-Adressen belegt.
                    </div>
                </div>
            </div>
        @endsection



        @section('jsextra')
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
            </script>
            <script type="text/javascript" src="../js/custom.js"></script>
            <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
@endsection