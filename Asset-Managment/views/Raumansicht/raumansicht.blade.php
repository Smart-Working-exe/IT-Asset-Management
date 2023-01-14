@extends('Raumansicht.layout_raumansicht')
@extends('header_footer')
@extends('modals.Eintraege.Device')
@extends('Filter.geraete')
@extends('modals.Eintraege.chooseDevice')

@section('sub_header')

    <div class="row mt-4 ">
        <p class="display-6 col-3"> Raum {{strtoupper($room)}}</p>
    </div>

    @if($user == 1) <!-- admin -->


        <div class="row"> <!-- Wegen Row ist die Progressbar abgeschnitten -->
            @if($room != 'Lager')
            <p class="col-3"><b>IP-Adressbereich: {{$ip['ip-adressbereich_beginn']}}/@if($ip['anzahl_ip'] <= 4)30
                @elseif($ip['anzahl_ip'] <= 8)29
                @elseif($ip['anzahl_ip'] <= 16)28
                @elseif($ip['anzahl_ip'] <= 32)27
                @elseif($ip['anzahl_ip'] <= 64)26
                @elseif($ip['anzahl_ip'] <= 128)25
                @elseif($ip['anzahl_ip'] <= 256)24
                @elseif($ip['anzahl_ip'] <= 512)23
                @endif</b></p>
            <div class=" mt-1 col-2">
                <div class="progress position-relative">
                    <div class="progress-bar" style="width:{{((int)$ip['belegung_ip']/(int)$ip['anzahl_ip'])*100}}%; background-color: green{{--$color--}}"
                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                        <small class="justify-content-center d-flex position-absolute w-100" style="color: black">{{$ip['belegung_ip']}}/{{$ip['anzahl_ip']}}</small></div>
                </div>
            </div>
            <p class="col-2 offset-1"><b>Belegung Workstations:</b></p>
            <div class="mt-1 col-2 offset-1">
                <div class="progress position-relative">
                    <div class="progress-bar"
                         style="width:{{((int)$cur_belegung/(int)$max_belegung)*100}}%; background-color: {{$color}}"
                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                        <small class="justify-content-center d-flex position-absolute w-100" style="color: black">{{$cur_belegung}}/{{$max_belegung}}</small></div>
                </div>
            </div>
            <div class="col-2 offset-lg-9">
                <form action="/raumansicht?raum={{$room}}" method="post">
                    <input style="height:25px; width:120px;" class="form-control" type="number" id="deviceName" placeholder="Menge" name="belegung" min="0" max="{{$max_belegung}}">
                    <input style="background: transparent; border: none !important; font-size:0; margin-left: -9999999px;{{--Bester Bugfix ever haha--}}" class="form-control" type="submit">
                </form>
            </div>

            @endif

            @if($_SESSION['dup_entry'])
                <div style="font-family: Arial,serif; font-weight: bold; Color: red">
                    Dieses Geräte existiert bereits wählen Sie einen anderen Namen.
                </div>
                {{$_SESSION['dup_entry']= false}}
            @endif

            <div class="form-group">
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addDevice">
                    Geräte hinzufügen
                </button>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#chooseDevice">
                    Bestehendes Gerät hinzufügen
                </button>

                @if(!empty($selected_filter['suche']) || !empty($selected_filter['Typ']) || !empty($selected_filter['hersteller']) || !empty($selected_filter['age']) || !empty($selected_filter['betriebssystemid']) || !empty($selected_filter['softwarelizenzid'])  )
                        <a href="" class="btn  btn-primary sub  text-nowrap" style="margin-left: 72%" role="button" aria-disabled="true">Filter Zurücksetzten</a>
                @endif

            </div>
        </div>
    @elseif($user == 2)<!-- mitarbeiter -->
    <div class="row"> <!-- Wegen Row ist die Progressbar abgeschnitten -->
        @if($room != 'Lager')
        <p class="col-3"><b>IP-Adressbereich: {{$ip['ip-adressbereich_beginn']}}/@if($ip['anzahl_ip'] <= 4)30
                @elseif($ip['anzahl_ip'] <= 8)29
                @elseif($ip['anzahl_ip'] <= 16)28
                @elseif($ip['anzahl_ip'] <= 32)27
                @elseif($ip['anzahl_ip'] <= 64)26
                @elseif($ip['anzahl_ip'] <= 128)25
                @elseif($ip['anzahl_ip'] <= 256)24
                @elseif($ip['anzahl_ip'] <= 512)23
                @endif</b></p>
            <div class=" mt-1 col-2">
                <div class="progress position-relative">
                    <div class="progress-bar" style="width:{{((int)$ip['belegung_ip']/(int)$ip['anzahl_ip'])*100}}%; background-color: green{{--$color--}}"
                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                        <small class="justify-content-center d-flex position-absolute w-100" style="color: black">{{$ip['belegung_ip']}}/{{$ip['anzahl_ip']}}</small></div>
                </div>
            </div>
        <p class="col-2 offset-1"><b>Belegung Workstations:</b></p>
        <div class="mt-1 col-2 offset-1">
            <div class="progress position-relative">
                <div class="progress-bar"
                     style="width:{{((int)$cur_belegung/(int)$max_belegung)*100}}%; background-color: {{$color}}"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                    <small class="justify-content-center d-flex position-absolute w-100" style="color: black">{{$cur_belegung}}/{{$max_belegung}}</small></div>
            </div>
        </div>
        <div class="col-2 offset-lg-9">
            <form action="/raumansicht?raum={{$room}}" method="post">
                <input style="height:25px; width:120px;" class="form-control" type="number" id="deviceName" placeholder="Menge" name="belegung" min="0" max="{{$max_belegung}}">
                <input style="background: transparent; border: none !important; font-size:0; margin-left: -9999999px;{{--Bester Bugfix ever haha--}}" class="form-control" type="submit">
            </form>
        </div>


        @endif

        @if(!empty($selected_filter['suche']) || !empty($selected_filter['Typ']) || !empty($selected_filter['hersteller']) || !empty($selected_filter['age']) || !empty($selected_filter['betriebssystemid']) || !empty($selected_filter['softwarelizenzid'])  )
            <div class="col" style="margin-left: 72%">
             <a href="" class="btn  btn-primary sub  text-nowrap" role="button" aria-disabled="true">Filter Zurücksetzten</a>
            </div>
        @endif

    </div>
    @endif




@endsection



@section('content')
    <div class="container mt-3">
        <table class="table table-striped table-bordered" id="devices">
            <thead>
            <tr>
                <th onclick="sortTable(0, devices)">Name<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
                </th>
                <th onclick="sortTable(1, devices)">Typ<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
                </th>
                <th onclick="sortTable(2, devices)">Hersteller<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                   width="20px"></th>
                <th onclick="sortTable(3, devices)">Alter<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                              width="20px"></th>
                <th onclick="sortTable(4, devices)">IP-Adresse</th>
                <th onclick="sortTable(5, devices)">Betriebssystem</th>
                <th onclick="sortTable(6, devices)">Software</th>
                <th onclick="sortTable(7, devices)">Technische Daten</th>
                <th onclick="sortTable(8, devices)">Kommentar</th>
                <th >  @if($user == 1)
                            Bearbeiten
                         @else
                           Kommentar
                         @endif
                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($data as $geraet)
                <tr>
                    <td>{{$geraet['name']}}</td>
                    <td>{{$geraet['typ']}}</td>
                    <td>{{$geraet['hersteller']}}</td>
                    <td>@if(strval($geraet['alter']) == strval(-1))
                            0 Jahre
                        @else
                            {{$geraet['alter']}} Jahre
                        @endif</td>
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
                    <td class="no_nowrap">
                        @if(!empty($geraet['technische_eckdaten_liste'][0]))
                            <ul>
                                @foreach($geraet['technische_eckdaten_liste'] as $value)
                                    <li>{{$value}} </li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td class="no_nowrap">{{$geraet['kommentar']}}</td>
                    <td>

                        @if($user == 1)
                        <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                                data-bs-target="#editDevice{{$geraet['id']}}">Bearbeiten
                        </button>
                        @else
                            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                                    data-bs-target="#editKommentar">Kommentieren
                            </button>
                        @endif
                    </td>



                </tr>
                <form action="/raumansicht?raum={{$room}}" method="post" role="form" >
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
                                                <select class="form-select" aria-label="Default select example" id ="AlterdesGer"
                                                        name="form_deviceType" required >
                                                    <option value="" disabled>Typ*</option>
                                                    @if($geraet['typ'] == "Computer")
                                                        <option value="1"  selected>Computer</option>
                                                    @elseif($geraet['typ'] == "Laptop")
                                                        <option value="2"  selected>Laptop</option>
                                                    @elseif($geraet['typ'] == "Monitor")
                                                        <option value="3"  selected>Monitor</option>
                                                    @elseif($geraet['typ'] == "Tastatur")
                                                        <option value="4"  selected>Tastatur</option>
                                                    @elseif($geraet['typ'] == "Maus")
                                                        <option value="5"  selected>Maus</option>
                                                    @elseif($geraet['typ'] == "Praktikumsmaterial")
                                                        <option value="6"  selected>Praktikumsmaterial</option>
                                                    @else
                                                        <option value="7" selected>Accessoires</option>
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="col"
                                                 @if(!($geraet['typ'] == "Computer" || $geraet['typ'] == "Laptop" || $geraet['typ'] == "Accessoires"))
                                                  style="display: none;"
                                                 @endif>
                                                <div class="dropdown">
                                                    <button class="form-select" data-mdb-clear-button="true" type="button" id="form_OperationSystem" name="form_OperationSystem[]" multiple="multiple" data-bs-toggle="dropdown">Betriebssystem</button>
                                                    <ul class="dropdown-menu form-select" aria-labelledby="form_OperationSystem" style="max-height: 280px; overflow-y: auto">
                                                        <li><h6 class="dropdown-header">Betriebssystem</h6>
                                                        @foreach($filter_variable_data['betriebssystem'] as $key => $betriebssystem_name)
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"  name="form_OperationSystem[]" value="{{$key}}" id="Checkme {{$key}}"
                                                                               @if(isset($geraet['betriebssystem']))
                                                                                   {{$vorhanden=false}}
                                                                                   @foreach($geraet['betriebssystem'] as $value)
                                                                                       @if($value==$betriebssystem_name)
                                                                                           $vorhan{{$vorhanden=true}}
                                                                                       @endif
                                                                                   @endforeach
                                                                               @endif

                                                                               @if($vorhanden) checked @endif />
                                                                        <label class="form-check-label" for="Checkme {{$key}}">{{$betriebssystem_name}}</label>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <input class="form-control" type="text" name="form_name123" placeholder="Name*"
                                                       value="{{$geraet['name']}}"></div>
                                            <div class="col">
                                                <select class="form-select" data-mdb-clear-button="true" placeholder="Raum" name="form_room" style="max-height: 180px; overflow-y: auto">
                                                    @foreach($raueme as $raum)
                                                        <option value="{{$raum['raumnummer']}}" @if($raum['raumnummer'] == $geraet['raumnummer']) selected @endif>{{$raum['raumnummer']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <input class="form-control" type="text" name="form_hersteller" placeholder="Hersteller"
                                                       value="{{$geraet['hersteller']}}"></div>
                                            <div class="col"
                                                 @if(!($geraet['typ'] == "Computer" || $geraet['typ'] == "Laptop" || $geraet['typ'] == "Accessoires"))
                                                    style="display: none;"
                                                @endif>
                                                <div class="dropdown">
                                                    <button class="form-select" data-mdb-clear-button="true" type="button" id="form_Software" name="form_Software[]" multiple="multiple" data-bs-toggle="dropdown">Software des Gerätes</button>
                                                    <ul class="dropdown-menu form-select" aria-labelledby="form_Software" style="max-height: 280px; overflow-y: auto">
                                                        <li><h6 class="dropdown-header">Software des Gerätes</h6></li>
                                                        @foreach($filter_variable_data['softwarelizenzen'] as $key_softwareid => $data_softwarename)
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="form_Software[]" value="{{$key_softwareid}}" id="Checkme {{$key_softwareid}}"
                                                                               @if(isset($geraet['software']))
                                                                                   {{$vorhanden=false}}
                                                                                   @foreach($geraet['software'] as $value)
                                                                                       @if($value==$data_softwarename)
                                                                                           $vorhan{{$vorhanden=true}}
                                                                                       @endif
                                                                                   @endforeach
                                                                               @endif
                                                                               @if($vorhanden) checked @endif />
                                                                        <label class="form-check-label" for="Checkme {{$key_softwareid}}">{{$data_softwarename}}</label>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                        <label for="Inbetriebname">Inbetriebname</label>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group date" id="datepickerEditUsage">
                                                        <input type="text" id="Inbetriebname" class="form-control" placeholder="erste Inbetriebname*"
                                                               value="{{$geraet['betrieb']}}" name="form_betrieb">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text bg-white d-block">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="AlterdesGer">Alter des Geräts</label>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group date" id="datepickerEditBuild">
                                                        <input type="text" id="AlterdesGer" class="form-control" placeholder="alter des Gerätes"
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
                                            <div class="col mt-3"  @if(!($geraet['typ'] == "Praktikumsmaterial"))
                                                style="display: none;"
                                                    @endif>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="form_Ausleihbar" name="form_Ausleihbar" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Ausleihbar</label>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col mt-3">
                                                <div class="form-check form-switch"  @if(!($geraet['typ'] == "Praktikumsmaterial"))
                                                    style="display: none;"
                                                @endif">
                                                    <input class="form-check-input" type="checkbox" id="form_Ausleihbar" name="form_Ausleihbar">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Ausleihbar</label>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row mt-3">
                                            <div class="col">
                                                <textarea class="form-control" name="form_technischeEckdaten" rows="5" placeholder="Technische Eckdaten, mit Semikolon trennen">{{$geraet['technische_eckdaten']}}</textarea>
                                            </div>
                                            <div class="col">
                                                <textarea class="form-control" name="form_comment" rows="5" placeholder="Kommentar zum Gerät">{{$geraet['kommentar']}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer justify-content-between">
                                    <button type="submit"  name="submit_delete" value="{{$geraet['id']}}" class="btn btn-danger">Gerät Löschen</button>
                                    <div>
                                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"  name="submit" value="submitted">Speichern</button>
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

    </div>



@endsection