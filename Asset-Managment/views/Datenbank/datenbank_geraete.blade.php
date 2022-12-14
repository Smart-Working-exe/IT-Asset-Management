@extends('Datenbank.datenbank_layout')
@extends('header_footer')
@extends('Filter.geraete')
@extends('modals.Eintraege.Device')
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
                                        <select class="form-select" aria-label="Default select example" id="deviceTyp">
                                            <option>Typ*</option>
                                            <option value="1" id="deviceTyp" selected>Computer</option>
                                            <option value="2" id="deviceTyp">Accessoir</option>
                                            <option value="3" id="deviceTyp">Eigener Typ</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-select" aria-label="Default select example" id="deviceTyp">
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
                                        <input class="form-control" type="text" id="deviceName" placeholder="Name*"
                                               value="PC-2"></div>
                                    <div class="col">
                                        <input class="form-control" type="text" id="deviceName" placeholder="IP-Adresse"
                                               value="111.111.111.3"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input class="form-control" type="text" id="deviceName" placeholder="Hersteller"
                                               value="Dell"></div>
                                    <div class="col">
                                        <select class="form-select" data-mdb-clear-button="true"
                                                placeholder="Software des Gerätes">
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
                                                       value="27/07/2017">
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
                                                       value="27/07/2017">
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
                                <textarea class="form-control" id="technischeEckdaten" rows="5"
                                          placeholder="Technische Eckdaten, mit Semikolon trennen">16GB RAM; 1000GB SSD; NVIDIA RTX3070</textarea>
                                    </div>
                                    <div class="col">
                                <textarea class="form-control" id="comment" rows="5"
                                          placeholder="Kommentar zum Gerät">Virtualization geeignet; </textarea>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="dataImport" class="form-label">Aus Datei importieren</label>
                                    <input class="form-control" type="file" id="dataImport" placeholder="Aus Datei importieren">
                                </div>
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger">Gerät Löschen</button>
                            <div>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach




        </tbody>
    </table>

@endsection
