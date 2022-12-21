@extends('Dashboard.layout_dashboard')
@extends('header_footer')
@extends('modals.Eintraege.User')
@extends('modals.Eintraege.Device')



@section('Navigation')
    <div class="row  justify-content-between" style="padding: 10%; font-size: 36px;">
        <div class="btn-group-vertical col-5 mt-3 offset-1">

            <a style="padding: 3%;" href="/raumauswahl" type="button"
               class="btn btn-primary staticButton sub text-center">Raumansicht</a>
            <a style="padding: 3%;" href="/ausleihe" type="button"
               class="btn btn-primary staticButton sub mt-2 text-center">Ausleihe</a>
            <a style="padding: 3%;" href="/einstellungen" type="button"
               class="btn btn-primary staticButton sub mt-2">Einstellungen</a>

        </div>
        @endsection

        @section('Benachrichtigungen')
            <div class="col-5">
                <div class="row">
                    <p class="display-6 h6 text-center col-4 mt-3">Benachrichtigungen</p>
                </div>

                <div style="overflow-y: scroll;margin-right:20%; height:300px;">
                    @foreach ($notifs as $benachrichtigung)
                        @if(isset($benachrichtigung['art']))
                        <div class="toast show col-6 mt-2">
                            <div class="toast-header ">
                                Ausleihfrist
                                <form>
                                    <button type="submit" action="/dashboard" method="get" name="delete" value={{$benachrichtigung['geraet']}} class="btn-close" data-bs-dismiss="toast"></button>
                                </form>
                            </div>
                            <div class="toast-body">
                            {{-- Angenommene Anfrage -> Ausleihfrist --}}
                            @if($benachrichtigung['art'] == 0 && $benachrichtigung['status'] == 1)
                                    @if($benachrichtigung['zeitraum'] < -1)
                                        Die Ausleihfrist für das Gerät "{{ $benachrichtigung['geraet'] }}" ist vor {{ -1*$benachrichtigung['zeitraum'] }} Tagen abgelaufen.
                                    @elseif($benachrichtigung['zeitraum'] == -1)
                                        Die Ausleihfrist für das Gerät "{{ $benachrichtigung['geraet'] }}" ist vor {{ -1*$benachrichtigung['zeitraum'] }} Tag abgelaufen.
                                    @elseif($benachrichtigung['zeitraum'] == 0)
                                        Die Ausleihfrist für das Gerät "{{ $benachrichtigung['geraet'] }}" läuft heute ab.
                                    @elseif($benachrichtigung['zeitraum'] == 1)
                                            Die Ausleihfrist für das Gerät "{{ $benachrichtigung['geraet'] }}" läuft in {{ $benachrichtigung['zeitraum'] }} Tag ab.
                                    @else($benachrichtigung['zeitraum'] > 1)
                                            Die Ausleihfrist für das Gerät "{{ $benachrichtigung['geraet'] }}" läuft in {{ $benachrichtigung['zeitraum'] }} Tagen ab.
                                    @endif
                            {{-- Angenommene Rückgabe -> Glückwunsch --}}
                            @elseif($benachrichtigung['art'] == 1 && $benachrichtigung['status'] == 1)
                                    Die Rückgabe-Anfrage für "{{ $benachrichtigung['geraet'] }}" wurde angenommen.
                            {{-- Abgelehnte Rückgabe -> Sorry --}}
                            @elseif($benachrichtigung['art'] == 1 && $benachrichtigung['status'] == 2)
                                    Die Rückgabe-Anfrage für "{{ $benachrichtigung['geraet'] }}" wurde abgelehnt.
                                    Wenden Sie sich an Mitarbeitende der Fachhochschule Aachen.
                                    {{-- Abgelehnte Rückgabe -> Sorry --}}
                            @elseif($benachrichtigung['art'] == 0 && $benachrichtigung['status'] == 2)
                                    Die Ausleih-Anfrage für "{{ $benachrichtigung['geraet'] }}" wurde abgelehnt.
                            @endif
                                </div>
                            </div>
                        @elseif(empty($benachrichtigung))
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


                    @endforeach
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
