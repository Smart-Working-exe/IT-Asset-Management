@extends('Raumansicht.layout_raumansicht')
@extends('header_footer')
@extends('modals.Eintraege.Device')
@extends('Filter.geraete')


@section('sub_header')

    <div class="row mt-4 ">
        <p class="display-6 col-3"> Raum {{strtoupper($room)}}</p>
    </div>

    @if($user == 1) <!-- admin -->

        <div class="row"> <!-- Wegen Row ist die Progressbar abgeschnitten -->
            <p class="col-3"><b>IP-Adressbereich: 111.111.111.000/27</b></p>
            <div class=" mt-1 col-2">
                <div class="progress position-relative">
                    <div class="progress-bar" style="width:20%; background-color: green"
                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                        <small class="justify-content-center d-flex position-absolute w-100">6/30</small></div>
                    <div class="progress-bar" style="width:80%; background-color: black"></div>
                </div>
            </div>
            <p class="col-2 offset-1"><b>Belegung Workstations:</b></p>
            <div class=" mt-1 col-2">
                <div class="progress position-relative">
                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                         style="width:100%; background-color: red"
                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                        <small class="justify-content-center d-flex position-absolute w-100">{{$curr_belegung}}/{{$max_belegung}}</small></div>
                    <div class="progress-bar" style="width:0%; background-color: black"></div>
                </div>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addDevice">
                    Gerät hinzufügen
                </button>

                @if(!empty($selected_filter['suche']) || !empty($selected_filter['Typ']) || !empty($selected_filter['hersteller']) || !empty($selected_filter['age']) || !empty($selected_filter['betriebssystemid']) || !empty($selected_filter['softwarelizenzid'])  )
                        <a href="" class="btn  btn-primary sub  text-nowrap" style="margin-left: 72%" role="button" aria-disabled="true">Filter Zurücksetzten</a>
                @endif

            </div>
        </div>
    @elseif($user == 2)<!-- mitarbeiter -->
    <div class="row"> <!-- Wegen Row ist die Progressbar abgeschnitten -->
        <p class="col-4"><b>IP-Adressbereich: 111.111.111.000/27</b></p>
        <div class=" mt-1 col-2">
            <div class="progress position-relative">
                <div class="progress-bar" style="width:20%; background-color: green"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                    <small class="justify-content-center d-flex position-absolute w-100">6/30</small></div>
                <div class="progress-bar" style="width:80%; background-color: black"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <p class="col-2 "><b>Belegung Workstations:
            </b>
        </p>
        <div class="col-2">
            <input style="height:25px; width:120px;" class="form-control" type="number" id="deviceName" placeholder="6">
        </div>
        <div class=" mt-1 col-2">
            <div class="progress position-relative">
                <div class="progress-bar progress-bar-striped progress-bar-animated"
                     style="width:{{((int)$cur_belegung/(int)$max_belegung)*100}}%; background-color: red"
                     aria-valuenow="10" aria-valuemin="0" aria-valuemax="20">
                    <small class="justify-content-center d-flex position-absolute w-100">{{$cur_belegung}}/{{$max_belegung}}</small></div>
                <div class="progress-bar" style="width:0%; background-color: black"></div>
            </div>
        </div>

        @if(!empty($selected_filter['suche']) || !empty($selected_filter['Typ']) || !empty($selected_filter['hersteller']) || !empty($selected_filter['age']) || !empty($selected_filter['betriebssystemid']) || !empty($selected_filter['softwarelizenzid'])  )
            <div class="col" style="margin-left: 32%">
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
                <th onclick="sortTable(4, devices)">IP-Adresse<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                   width="20px"></th>
                <th onclick="sortTable(5, devices)">Betriebssystem<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                       width="20px"></th>
                <th onclick="sortTable(6, devices)">Software<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                 width="20px"></th>
                <th onclick="sortTable(7, devices)">Technische Daten<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                         width="20px"></th>
                <th onclick="sortTable(8, devices)">Kommentar<img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                  width="20px"></th>
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
                    <td>

                        @if($user == 1)
                        <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                                data-bs-target="#editDevice">Bearbeiten
                        </button>
                        @else
                            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                                    data-bs-target="#editKommentar">Kommentieren
                            </button>
                        @endif
                    </td>



                </tr>

            @endforeach
            </tbody>
        </table>

    </div>



@endsection