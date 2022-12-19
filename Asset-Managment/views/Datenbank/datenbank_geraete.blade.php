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
                <td>{{$geraet['typ']}}</td>
                <td>{{$geraet['hersteller']}}</td>
                <td>{{$geraet['age']}} Jahre</td>
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
                    @if(!empty($geraet['technische_eckdaten'][0]))
                        <ul>
                            @foreach($geraet['technische_eckdaten'] as $value)
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
            <form action="/datenbank" method="post" role="form" >
                <input type="hidden" name="form_id" value="{{$geraet['id']}}">
                <div class="modal fade" id="editDevice{{$geraet['id']}}" tabindex="-1" aria-labelledby="editDevice" aria-hidden="true">
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
                                            <select class="form-select" aria-label="Default select example" name="form_deviceType">
                                                <option>Typ*</option>
                                                @if($geraet['typ'] == 1)
                                                    <option value="1" id="deviceTyp1111" selected>PC</option>
                                                    <option value="2" id="deviceTyp1111">Laptop</option>
                                                    <option value="3" id="deviceTyp1111" >Monitor</option>
                                                    <option value="4" id="deviceTyp1111">Tastatur</option>
                                                    <option value="5" id="deviceTyp1111">Maus</option>
                                                    <option value="6" id="deviceTyp1111">Praktikumsmaterial</option>
                                                    <option value="7" id="deviceTyp1111">Sonstiges</option>
                                                @elseif($geraet['typ'] == 2)
                                                    <option value="1" id="deviceTyp" >PC</option>
                                                    <option value="2" id="deviceTyp" selected>Laptop</option>
                                                    <option value="3" id="deviceTyp" >Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikumsmaterial</option>
                                                    <option value="7" id="deviceTyp">Sonstiges</option>
                                                @elseif($geraet['typ'] == 3)
                                                    <option value="1" id="deviceTyp" >PC</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp" selected>Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikumsmaterial</option>
                                                    <option value="7" id="deviceTyp">Sonstiges</option>
                                                @elseif($geraet['typ'] == 4)
                                                    <option value="1" id="deviceTyp" >PC</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp" >Monitor</option>
                                                    <option value="4" id="deviceTyp"selected>Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikumsmaterial</option>
                                                    <option value="7" id="deviceTyp">Sonstiges</option>
                                                @elseif($geraet['typ'] == 5)
                                                    <option value="1" id="deviceTyp" >PC</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp" >Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp"selected>Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikumsmaterial</option>
                                                    <option value="7" id="deviceTyp">Sonstiges</option>
                                                @elseif($geraet['typ'] == 6)
                                                    <option value="1" id="deviceTyp" >PC</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp" >Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp"selected>Praktikumsmaterial</option>
                                                    <option value="7" id="deviceTyp">Sonstiges</option>
                                                @else
                                                    <option value="1" id="deviceTyp" >PC</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp" >Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikumsmaterial</option>
                                                    <option value="7" id="deviceTyp"selected>Sonstiges</option>
                                                @endif

                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" aria-label="Default select example" name="form_OperationSystem">
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
                                            <input class="form-control" type="text" name="form_name123" placeholder="Name*"
                                                   value="{{$geraet['name']}}"></div>
                                        <div class="col">
                                            <input class="form-control" type="text" name="form_ipAdress" placeholder="IP-Adresse"
                                                   value="{{$geraet['ip_adresse']}}"></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <input class="form-control" type="text" name="form_hersteller" placeholder="Hersteller"
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
                                                    <input type="text" class="form-control" placeholder="erste Inbetriebname*"
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
                                                    <input type="text" class="form-control" placeholder="alter des Gerätes"
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
                                    <div class="row mt-3">
                                        <div class="col">
                                    <textarea class="form-control" name="form_technischeEckdaten" rows="5"
                                              placeholder="Technische Eckdaten, mit Semikolon trennen">16GB RAM; 1000GB SSD; NVIDIA RTX3070</textarea>
                                        </div>
                                        <div class="col">
                                    <textarea class="form-control" name="form_comment" rows="5"
                                              placeholder="Kommentar zum Gerät">{{$geraet['kommentar']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label for="dataImport" class="form-label">Aus Datei importieren</label>
                                        <input class="form-control" type="file" name="form_dataImport" placeholder="Aus Datei importieren">
                                    </div>
                                </div>

                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger">Gerät Löschen</button>
                                <div>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"  name="submit" value="1">Speichern</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Abbrechen</button>
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
