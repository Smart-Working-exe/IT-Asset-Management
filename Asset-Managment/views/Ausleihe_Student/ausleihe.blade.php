@extends('Ausleihe_Student.layout_ausleihe')
@extends('header_footer')



@section('content')
    <form method="post" action="/ausleihe">
    <div class="row mt-5 row justify-content-between">
        <div class="btn-group-vertical col-lg-6 mt-3 tbodyDiv">
            <h5> Verfügbare Geräte </h5>
            <table class="table table-bordered table-striped" id="verfuegbareGeräte">
                <thead class="sticky-top bg-white">
                <tr>
                    <th onclick="sortTable(0, verfuegbareGeräte)">Name <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(1, verfuegbareGeräte)">Typ <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(2, verfuegbareGeräte)">Kommentar <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(3, verfuegbareGeräte)">Ausleihen <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($rentables as $device)
                    <tr>
                        <td>{{$device['name']}}</td>
                        <td>{{$device['typ']}}</td>
                        <td>{{$device['kommentar']}}</td>
                        <td class="text-center"><input class="form-check-input" name="loan[]" value={{$device['name']}} type="checkbox" id="flexCheckChecked" ></td>
                    </tr>
                @endforeach
                <tr>
                    <td>Laptop</td>
                    <td>Computer</td>
                    <td>
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:84%; background-color: green" aria-valuenow="212" aria-valuemin="0"
                                 aria-valuemax="250">
                                <small class="justify-content-center d-flex position-absolute w-100">212/250</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:16%; background-color: black" aria-valuenow="438" aria-valuemin="0"
                                 aria-valuemax="648"></div>
                        </div>
                    </td>
                    <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckChecked"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="btn-group-vertical col-lg-6 mt-3 tbodyDiv">
            <h5> Eigene Geräte </h5>
            <table class="table table-bordered table-striped" id="gelieheneGeraete">
                <thead class="sticky-top bg-white">
                <tr>
                    <th onclick="sortTable(0, gelieheneGeraete)">Name<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(2, gelieheneGeraete)">Ausgeliehen<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(3, gelieheneGeraete)">Rückgabefrist<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(4, gelieheneGeraete)">Zurückgeben<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($owndevices as $device)
                    <tr>
                        <td>{{$device['geraet']}}</td>
                        <td>{{$device['ausleihdatum']}}</td>
                        <td>{{$device['rueckgabedatum']}}</td>
                        <td class="text-center"><input name="return" value="{{$device['geraet']}}" class="form-check-input" type="checkbox" id="flexCheckChecked"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Button to go back Home -->
    <a href="dashboard">
        <button type="button" class="btn btn-primary sub col-4 offset-2">Zurück</button>
    </a>
    <!-- Button triggert Modal -->
    <button type="submit" class="btn btn-primary sub col-4" data-bs-toggle="modal" data-bs-target="#confirmation">
        Auswahl bestätigen
    </button>
    </form>

@endsection




@section('confirmation')
    <div class="modal" id="confirmation">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Auswahl bestätigt</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Eine Anfrage wurde an einem Mitarbeiter gesendet
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
                </div>

            </div>
        </div>
    </div>

@endsection