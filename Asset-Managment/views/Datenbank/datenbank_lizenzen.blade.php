@extends('Datenbank.datenbank_layout')
@extends('header_footer')
@extends('modals.Eintraege.software')
@extends('Filter.software')
@extends('modals.export_import')



@section('content')

    <table class="table table-striped table-bordered" id="devices">
        <thead>
        <tr>
            <th onclick="sortTable(0, devices)">Name <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                          width="20px"></th>
            <th onclick="sortTable(1, devices)">Erworben am <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                 width="20px"></th>
            <th onclick="sortTable(2, devices)">Ablauf am <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                               width="20px"></th>
            <th onclick="sortTable(3, devices)">Installationen <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                    width="20px"></th>
            <th>Bearbeiten</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $lizenz)

            <tr>
                <td>{{$lizenz['name']}}</td>
                <td>{{$lizenz['erwerbsdatum']}}</td>
                <td>{{$lizenz['ablaufdatum']}}</td>
                <td>
                    <div class="progress position-relative">
                        <div class="progress-bar @if($lizenz['anzahl_installationen_prozent'] <=25) bg-success @elseif($lizenz['anzahl_installationen_prozent'] >25 && $lizenz['anzahl_installationen_prozent'] <=50) bg-info
                             @elseif($lizenz['anzahl_installationen_prozent'] > 50 && $lizenz['anzahl_installationen_prozent'] <=75) bg-warning @else bg-danger" @endif role="progressbar"
                             style="width:{{$lizenz['anzahl_installationen_prozent']}}%; background-color: green" aria-valuenow="{{$lizenz['anzahl_installationen']}}" aria-valuemin="0"
                             aria-valuemax="{{$lizenz['anzahl_gerate']}}">
                            <small class="justify-content-center d-flex position-absolute w-100" style="color: black">{{$lizenz['anzahl_installationen']}}/{{$lizenz['anzahl_gerate']}}</small>
                        </div>
                    </div>

                </td>
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editSoftware">Softwarelizenz bearbeiten
                    </button>
                </td>
            </tr>

        @endforeach


        </tbody>
    </table>


@endsection