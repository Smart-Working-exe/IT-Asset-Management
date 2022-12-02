@extends('Dashboard.layout_dashboard')
@extends('header_footer')


@section('Navigation')
    <div class="row mt-5 row justify-content-between">
        <div class="btn-group-vertical col-5 mt-3 offset-1">

            <a style="padding: 3%;" href="/raumauswahl" type="button"
               class="btn btn-primary staticButton sub text-center">Raumansicht</a>
            <a style="padding: 3%;" href="/ausleihe" type="button"
               class="btn btn-primary staticButton sub mt-2 text-center">Ausleihe</a>
            <a style="padding: 3%;" href="/einstellungen" type="button"
               class="btn btn-primary staticButton sub mt-2">Einstellungen</a>

        </div>
        <div class="col-5">
            <div class="row">
                <p class="display-6 h6 text-center col-4 mt-3">Benachrichtungen</p>
            </div>

            <div style="overflow-y: scroll;margin-right:20%; height:300px;">
                <div class="toast show col-6 mt-2">
                    <div class="toast-header ">
                        Ausleihfrist
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        Ihre Ausleihfrist für Ihr Gerät "ARBKVS_Steckboard_74866" läuft in 3 Tagen ab.
                    </div>
                </div>

                <div class="toast show col-6 mt-2">
                    <div class="toast-header ">
                        Ausleihfrist
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        Ihre Ausleihfrist für Ihr Gerät "HP_Maus_94471" läuft in 6 Tagen ab.
                    </div>
                </div>
                <div class="toast show col-6 mt-2">
                    <div class="toast-header">
                        Ausleihfrist
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        Ihre Ausleihfrist für Ihr Gerät "Lötset" läuft in 9 Tagen ab.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsextra')
    <script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
@endsection


