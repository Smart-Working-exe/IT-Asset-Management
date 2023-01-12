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
                @foreach($rentables as $i => $device)
                    <tr>
                        <td>{{$device['name']}}</td>
                        <td>{{$typen[$device['typ']]}}</td>
                        <td>{{$device['kommentar']}}</td>
                        <td class="text-center"><input class="form-check-input" name="loan[<?php $i ?>]" value={{$device['name']}} type="checkbox" id="flexCheckChecked" ></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <div class="btn-group-vertical col-lg-6 mt-3 tbodyDiv">
            <h5> Eigene Geräte </h5>
            <table class="table table-bordered table-striped" id="gelieheneGeraete">
                <thead class="sticky-top bg-white">
                <tr>
                    <th onclick="sortTable(0, gelieheneGeraete)">Gerät<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(1, gelieheneGeraete)">Ausgeliehen<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(2, gelieheneGeraete)">Rückgabefrist<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(3, gelieheneGeraete)">Zurückgeben<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(4, gelieheneGeraete)">Status<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($owndevices as $i => $device)
                    <tr>
                        <td>{{$device['geraet']}}</td>
                        <td>{{$device['ausleihdatum']}}</td>
                        <td>{{$device['rueckgabedatum']}}</td>
                        <td class="text-center"><input name="return[<?php $i ?>]" value="{{$device['id']}}" class="form-check-input" type="checkbox" id="flexCheckChecked"></td>
                        <td>
                            @if($device['art'] == 1)
                                @if($device['status'] == 0)
                                    Rückgabe angefragt
                                @elseif($device['status'] == 1)
                                    Rückgabe angenommen
                                @elseif($device['status'] == 2)
                                    Rückgabe abgelehnt
                                @endif
                            @elseif($device['art'] == 0)
                                Ausgeliehen
                            @endif
                        </td>
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