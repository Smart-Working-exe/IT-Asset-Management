@extends('Dashboard.layout_dashboard')
@extends('header_footer')
@extends('modals.Eintraege.User')
@extends('modals.Eintraege.Device')



@section('Navigation')
    <div class=" col justify-content-between" style="padding: 10%; font-size: 36px; ">
        <div class="btn-group-vertical col mt-3 " style="width:100%">
            <a style="padding: 3% ;" href="/raumauswahl" type="button" class="btn btn-primary staticButton sub">Raumansicht</a>
            <a style="padding: 3%;" href="/datenbank" type="button"
               class="btn btn-primary staticButton sub mt-2">Datenbank</a>
            @if($_SESSION['dup_entry'])
                <div style="font-family: Arial,serif; font-weight: bold; Color: red; font-size: small">
                    Dieses Geräte existiert bereits wählen Sie einen anderen Namen.
                </div>
                {{$_SESSION['dup_entry']= false}}
            @endif
            <button type="submit" class="btn btn-primary staticButton sub mt-2" data-bs-toggle="modal"
                    data-bs-target="#addDevice">Geräte hinzufügen
            </button>
            <button type="submit" class="btn btn-primary staticButton sub mt-2" data-bs-toggle="modal"
                    data-bs-target="#addUser">Benutzer hinzufügen
            </button>
            <a style="padding: 3%;" href="/softwarelizenzen" type="button"
               class="btn btn-primary staticButton sub mt-2">Softwarelizenzen</a>
            <a style="padding: 3%;" href="/systemlogs" type="button"
               class="btn btn-primary staticButton sub mt-2">System-Logs</a>
            <a style="padding: 3%;" href="/einstellungen" type="button"
               class="btn btn-primary staticButton sub mt-2">Einstellungen</a>
        </div>
    </div>
        @endsection

        @section('Benachrichtigungen')
            <div class="col">

                    <p class="display-6 h6 text-center col-4 mt-3">Benachrichtigungen</p>

                <div style="overflow-y: scroll;margin-right:20%; height:500px;">

                    @foreach ($notifs as $benachrichtigung)
                        @if(@isset($benachrichtigung['name']))
                            <div class="toast show col-6 mt-2">
                                <div class="toast-header ">
                                    Important
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                                </div>
                                <div class="toast-body">
                                    @if($benachrichtigung['ablaufzeitraum'] < -1)
                                        Die Lizenz von {{ $benachrichtigung['name'] }} {{ $benachrichtigung['version'] }} ist vor {{ -1*$benachrichtigung['ablaufzeitraum'] }} Tagen abgelaufen.
                                    @elseif($benachrichtigung['ablaufzeitraum'] == -1)
                                        Die Lizenz von {{ $benachrichtigung['name'] }} {{ $benachrichtigung['version'] }} ist vor {{ -1*$benachrichtigung['ablaufzeitraum'] }} Tag abgelaufen.
                                    @elseif($benachrichtigung['ablaufzeitraum'] == 0)
                                        Die Lizenz von {{ $benachrichtigung['name'] }} {{ $benachrichtigung['version'] }} läuft heute ab.
                                    @elseif($benachrichtigung['ablaufzeitraum'] == 1)
                                        Die Lizenz von {{ $benachrichtigung['name'] }} {{ $benachrichtigung['version'] }} läuft in {{ $benachrichtigung['ablaufzeitraum'] }} Tag ab.
                                    @elseif($benachrichtigung['ablaufzeitraum'] > 1)
                                        Die Lizenz von {{ $benachrichtigung['name'] }} {{ $benachrichtigung['version'] }} läuft in {{ $benachrichtigung['ablaufzeitraum'] }} Tagen ab.
                                    @endif
                                </div>
                            </div>
                        @elseif(@isset($benachrichtigung['raumnummer']))
                            <div class="toast show col-6 mt-2">
                                <div class="toast-header ">
                                    Important
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                                </div>
                                <div class="toast-body">
                                    In Raum {{ $benachrichtigung['raumnummer'] }} sind {{ $benachrichtigung['belegung_ip'] }} von {{ $benachrichtigung['anzahl_ip'] }} IP-Adressen belegt.
                                </div>
                            </div>
                        @endif
                    @endforeach
                        @if(empty($notifs))
                            <div class="toast show col-6 mt-2">
                                <div class="toast-header ">
                                    Info
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                                </div>
                                <div class="toast-body">
                                    Keine Benachrichtigungen vorhanden.
                                </div>
                            </div>
                        @endif
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