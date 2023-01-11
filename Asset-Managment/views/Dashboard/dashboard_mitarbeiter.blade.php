@extends('Dashboard.layout_dashboard')
@extends('header_footer')

@section('Navigation')
    <div class="row mt-5 row justify-content-between">
        <div class="btn-group-vertical col-5 mt-3 offset-1">
            <a style="padding: 3%;" href="/raumauswahl" type="button" class="btn btn-primary staticButton sub">Raumauswahl</a>
            <a style="padding: 3%;" href="/eigeneGeraete?kuerzel={{$_SESSION['name']}}" type="button"
               class="btn btn-primary staticButton sub mt-2">Eigene Geräte</a>
            <a style="padding: 3%;" href="/verleihung" type="button"
               class="btn btn-primary staticButton sub mt-2">Verleihung an Studenten</a>
            <a style="padding: 3%;" href="/einstellungen" type="button"
               class="btn btn-primary staticButton sub mt-2">Einstellungen</a>
        </div>

@endsection


@section("Benachrichtigungen")
    <div class="col-5">
        <div class="row">
            <p class="display-6 h6 text-center col-4 mt-3">Benachrichtigungen</p>
        </div>

        <div style="overflow-y: scroll;margin-right:20%; height:300px;">

        @foreach ($notifs as $benachrichtigung)
            @if(@isset($benachrichtigung['geraet']))
                <div class="toast show col-6 mt-2">
                    <div class="toast-header ">
                        Important
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        @if($benachrichtigung['ablaufzeitraum'] < -1)
                            Die Lizenz von {{ $benachrichtigung['name'] }} {{ $benachrichtigung['version'] }} auf {{ $benachrichtigung['geraet'] }}
                            ist vor {{ -1*$benachrichtigung['ablaufzeitraum'] }} Tagen abgelaufen.
                        @elseif($benachrichtigung['ablaufzeitraum'] == -1)
                            Die Lizenz von {{ $benachrichtigung['name'] }} {{ $benachrichtigung['version'] }} auf {{ $benachrichtigung['geraet'] }}
                            ist vor {{ -1*$benachrichtigung['ablaufzeitraum'] }} Tag abgelaufen.
                        @elseif($benachrichtigung['ablaufzeitraum'] == 0)
                            Die Lizenz von {{ $benachrichtigung['name'] }} {{ $benachrichtigung['version'] }} läuft auf {{ $benachrichtigung['geraet'] }} heute ab.
                        @elseif($benachrichtigung['ablaufzeitraum'] == 1)
                            Die Lizenz von {{ $benachrichtigung['name'] }} {{ $benachrichtigung['version'] }} läuft auf {{ $benachrichtigung['geraet'] }}
                            in {{ $benachrichtigung['ablaufzeitraum'] }} Tag ab.
                        @else($benachrichtigung['ablaufzeitraum'] < 1)
                            Die Lizenz von {{ $benachrichtigung['name'] }} {{ $benachrichtigung['version'] }} läuft auf {{ $benachrichtigung['geraet'] }}
                            in {{ $benachrichtigung['ablaufzeitraum'] }} Tagen ab.
                        @endif
                    </div>
                </div>
            @elseif(@isset($benachrichtigung['anzahl']) && $benachrichtigung['anzahl'] != 0)
                <div class="toast show col-6 mt-2">
                    <div class="toast-header ">
                        Important
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        @if($benachrichtigung['anzahl'] == 1)
                        Es gibt {{ $benachrichtigung['anzahl'] }} <a href="/verleihung">unbeantwortete Anfrage</a> von Studierenden.
                        @else
                        Es gibt {{ $benachrichtigung['anzahl'] }} <a href="/verleihung">unbeantwortete Anfragen</a> von Studierenden.
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
            @if(sizeof($notifs) == 1 & $notifs['anzahl'] == 0)
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

    </div>
@endsection


@section('jsextra')
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
@endsection
