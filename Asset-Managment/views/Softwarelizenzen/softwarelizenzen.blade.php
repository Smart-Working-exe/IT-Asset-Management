@extends('Softwarelizenzen.softwarelizenzen_layout')
@extends('header_footer')
@extends('modals.Eintraege.Software')
@extends('Filter.software')


@section('content')


        <table class="table table-striped table-bordered" id="license">
            <thead>
            <tr>
                <th onclick="sortTable(0, license)">Name <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                              width="20px"></th>
                <th onclick="sortTable(1, license)">Erworben am </th>
                <th onclick="sortTable(2, license)">Ablaufdatum</th>
                <th onclick="sortTable(3, license)">Installationen </th>
                <th>Bearbeiten</th>
            </tr>
            </thead>
            <tbody>

                @foreach($data as $lizenz)

                <tr>
                    <td>{{$lizenz['name'] . " " . $lizenz['version']}}</td>
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
                                data-bs-target="#editSoftware{{$lizenz['id']}}">Bearbeiten
                        </button>
                    </td>
                </tr>

                <form action="softwarelizenzen" method="POST">
                    <input type="hidden" name="form_id" value="{{$lizenz['id']}}">
                    <!-- The Modal -->
                    <div class="modal fade" id="editSoftware{{$lizenz['id']}}" tabindex="-1" aria-labelledby="editSoftware"
                         aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Softwarelizenz bearbeiten von Software {{$lizenz['name']}}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="row mt-3">
                                            <div class="col">
                                                <input class="form-control" type="text" name="form_lizenzname"
                                                       placeholder="Name der Lizenz*" value="{{$lizenz['name']}}">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <input class="form-control" type="text" name="form_lizenzhersteller"
                                                       placeholder="Hersteller*" value="{{$lizenz['hersteller']}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <input class="form-control" type="text" name="form_softwareversion"
                                                   placeholder="Version" value="{{$lizenz['version']}}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="input-group date" id="datepickerEditAvailable">
                                                    <input type="text" name="form_lizenzerwerb" class="form-control"
                                                           placeholder="Erwerbsdatum" value="{{$lizenz['erwerbsdatum']}}">
                                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="input-group date" id="datepickerEditNotAvailable">
                                                    <input type="text" name="form_lizenzablauf" class="form-control"
                                                           placeholder="Ablaufdatum" value="{{$lizenz['ablaufdatum']}}">
                                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <input class="form-control" type="number" name="form_lizenzanzahl"
                                                   placeholder="Anzahl verfügbarer Installation"
                                                   value="{{$lizenz['anzahl_gerate']}}">
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer justify-content-between">
                                    <button type="submit"  name="submit_delete_license" value="{{$lizenz['id']}}" class="btn btn-danger">Softwarelizenz Löschen</button>
                                    <div>
                                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="submit"
                                                value="3">Speichern
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            @endforeach


            </tbody>
        </table>


@endsection