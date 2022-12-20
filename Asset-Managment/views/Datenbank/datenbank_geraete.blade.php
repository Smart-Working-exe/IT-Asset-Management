@extends('Datenbank.datenbank_layout')
@extends('header_footer')
@extends('modals.Eintraege.Device')
@extends('Filter.geraete')
@extends('modals.export_import')




@section('content')

    <table class="table table-striped table-bordered" id="devices">
        <thead>
        <tr>
            <th onclick="sortTable(0, devices)">Name <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                          width="20px"></th>
            <th onclick="sortTable(1, devices)">Typ <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
            </th>
            <th onclick="sortTable(2, devices)">Hersteller <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                width="20px"></th>
            <th onclick="sortTable(3, devices)">Alter <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                           width="20px"></th>
            <th onclick="sortTable(2, devices)">Ip-Adresse<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                               width="20px"></th>
            <th onclick="sortTable(4, devices)">Betriebssystem <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                    width="20px"></th>
            <th onclick="sortTable(5, devices)">Software <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                              width="20px"></th>
            <th onclick="sortTable(6, devices)">Technische Daten <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                      width="20px"></th>
            <th onclick="sortTable(7, devices)">Kommentar <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                               width="20px"></th>
            <th onclick="sortTable(8, devices)">Raum <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                          width="20px"></th>
            <th>Bearbeiten</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $geraet)
            <tr>
                <td>{{$geraet['name']}}</td>
                @switch($geraet['typ'])
                    @case(1)
                        <td>Computer</td>
                        @break(1)
                    @case(2)
                        <td>Laptop</td>
                        @break(1)
                    @case(3)
                        <td>Monitor</td>
                        @break(1)
                    @case(4)
                        <td>Tastatur</td>
                        @break(1)
                    @case(5)
                        <td>Maus</td>
                        @break(1)
                    @case(6)
                        <td>Praktikum Utensilien</td>
                        @break(1)
                    @case(7)
                        <td>Accessoires</td>
                @endswitch
                <td>{{$geraet['hersteller']}}</td>
                <td>{{$geraet['alter']}} Jahre</td>
                <td>{{$geraet['ip_adresse']}}</td>
                <td>
                    @if(isset($geraet['betriebssystem']))
                        <ul>
                            @foreach($geraet['betriebssystem'] as $value)
                                <li>{{$value}} </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    @if(isset($geraet['software']))
                        <ul>
                            @foreach($geraet['software'] as $value)
                                <li>{{$value}} </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    @if(!empty($geraet['technische_eckdaten_liste'][0]))
                        <ul>
                            @foreach($geraet['technische_eckdaten_liste'] as $value)
                                <li>{{$value}} </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td class="no_nowrap">{{$geraet['kommentar']}}</td>
                <td>{{$geraet['raumnummer']}}</td>
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editDevice{{$geraet['id']}}">Bearbeiten
                    </button>
                </td>


            </tr>
            <form action="/datenbank" method="post" role="form">
                <input type="hidden" name="form_id" value="{{$geraet['id']}}">
                <div class="modal fade" id="editDevice{{$geraet['id']}}" tabindex="-1" aria-labelledby="editDevice"
                     aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Gerät bearbeiten {{$geraet['name']}}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="row mt-3">
                                        <div class="col">
                                            <select class="form-select" aria-label="Default select example"
                                                    name="form_deviceType">
                                                <option>Typ*</option>
                                                @if($geraet['typ'] == 1)
                                                    <option value="1" id="deviceTyp1111" selected>Computer</option>
                                                    <option value="2" id="deviceTyp1111">Laptop</option>
                                                    <option value="3" id="deviceTyp1111">Monitor</option>
                                                    <option value="4" id="deviceTyp1111">Tastatur</option>
                                                    <option value="5" id="deviceTyp1111">Maus</option>
                                                    <option value="6" id="deviceTyp1111">Praktikum Utensilien</option>
                                                    <option value="7" id="deviceTyp1111">Accessoires</option>
                                                @elseif($geraet['typ'] == 2)
                                                    <option value="1" id="deviceTyp">Computer</option>
                                                    <option value="2" id="deviceTyp" selected>Laptop</option>
                                                    <option value="3" id="deviceTyp">Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikum Utensilien</option>
                                                    <option value="7" id="deviceTyp">Accessoires</option>
                                                @elseif($geraet['typ'] == 3)
                                                    <option value="1" id="deviceTyp">Computer</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp" selected>Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikum Utensilien</option>
                                                    <option value="7" id="deviceTyp">Accessoires</option>
                                                @elseif($geraet['typ'] == 4)
                                                    <option value="1" id="deviceTyp">Computer</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp">Monitor</option>
                                                    <option value="4" id="deviceTyp" selected>Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikum Utensilien</option>
                                                    <option value="7" id="deviceTyp">Accessoires</option>
                                                @elseif($geraet['typ'] == 5)
                                                    <option value="1" id="deviceTyp">Computer</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp">Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp" selected>Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikum Utensilien</option>
                                                    <option value="7" id="deviceTyp">Accessoires</option>
                                                @elseif($geraet['typ'] == 6)
                                                    <option value="1" id="deviceTyp">Computer</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp">Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp" selected>Praktikum Utensilien</option>
                                                    <option value="7" id="deviceTyp">Accessoires</option>
                                                @else
                                                    <option value="1" id="deviceTyp">Computer</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp">Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikum Utensilien</option>
                                                    <option value="7" id="deviceTyp" selected>Accessoires</option>
                                                @endif

                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" aria-label="Default select example"
                                                    name="form_OperationSystem">
                                                <option disabled>Typ*</option>
                                                <option value="1" id="deviceTyp" selected>Windows 10</option>
                                                <option value="2" id="deviceTyp">Ubuntu</option>
                                                <option value="3" id="deviceTyp">Debian</option>
                                                <option value="3" id="deviceTyp">MacOS</option>
                                                <option value="3" id="deviceTyp">Neues Betriebssystem</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <input class="form-control" type="text" name="form_name123"
                                                   placeholder="Name*"
                                                   value="{{$geraet['name']}}"></div>
                                        <div class="col">
                                            <input class="form-control" type="text" name="form_ipAdress"
                                                   placeholder="IP-Adresse"
                                                   value="{{$geraet['ip_adresse']}}"></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <input class="form-control" type="text" name="form_hersteller"
                                                   placeholder="Hersteller"
                                                   value="{{$geraet['hersteller']}}"></div>
                                        <div class="col">
                                            <select class="form-select" data-mdb-clear-button="true"
                                                    placeholder="Software des Gerätes" name="form_Software">
                                                <option>Software des Gerätes</option>
                                                <option value="1" selected>Microsoft Visual Studio 2022</option>
                                                <option value="2">Intel Quartus Prime</option>
                                                <option value="3" selected>MS Office</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="input-group date" id="datepickerEditUsage">
                                                    <input type="text" class="form-control"
                                                           placeholder="erste Inbetriebname*"
                                                           value="{{$geraet['betrieb']}}" name="form_betrieb">
                                                    <span class="input-group-append">
                                                        <span class="input-group-text bg-white d-block">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="input-group date" id="datepickerEditBuild">
                                                    <input type="text" class="form-control"
                                                           placeholder="alter des Gerätes"
                                                           value="{{$geraet['age']}}" name="form_age">
                                                    <span class="input-group-append">
                                                        <span class="input-group-text bg-white d-block">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($geraet['ausleihbar']==1)
                                        <div class="col mt-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="form_Ausleihbar" name="form_Ausleihbar" checked>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Ausleihbar</label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col mt-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="form_Ausleihbar" name="form_Ausleihbar">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Ausleihbar</label>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row mt-3">
                                        <div class="col">
                                    <textarea class="form-control" name="form_technischeEckdaten" rows="5"
                                              placeholder="Technische Eckdaten, mit Semikolon trennen">{{$geraet['technische_eckdaten']}}</textarea>
                                        </div>
                                        <div class="col">
                                            <textarea class="form-control" name="form_comment" rows="5"
                                                      placeholder="Kommentar zum Gerät">{{$geraet['kommentar']}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger">Gerät Löschen</button>
                                <div>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="submit"
                                            value="1">Speichern
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
