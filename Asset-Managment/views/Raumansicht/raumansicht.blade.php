@extends('Raumansicht.layout_raumansicht')
@extends('header_footer')
@extends('modals.Eintraege.Device')
@extends('Filter.geraete')


@section('sub_header')

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
                        <small class="justify-content-center d-flex position-absolute w-100">6/6</small></div>
                    <div class="progress-bar" style="width:0%; background-color: black"></div>
                </div>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addDevice">
                    Gerät hinzufügen
                </button>
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
                     style="width:100%; background-color: red"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="30">
                    <small class="justify-content-center d-flex position-absolute w-100">6/6</small></div>
                <div class="progress-bar" style="width:0%; background-color: black"></div>
            </div>
        </div>
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
                <th >Kommentieren</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>PC-1</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>6 Jahren</td>
                <td>111.111.111.2</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>8GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX4090</li>
                    </ul>
                </td>
                <td>Game Design geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editDevice">Bearbeiten
                    </button></td>
            </tr>

            <tr>
                <td>PC-2</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>6 Jahren</td>
                <td>111.111.111.3</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>16GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX3070</li>
                    </ul>
                </td>
                <td>Virtualization geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editKommentar">Kommentieren
                    </button></td>
            </tr>
            <tr>
                <td>PC-3</td>
                <td>Tower-P</td>
                <td>HP</td>
                <td>3 Jahren</td>
                <td>111.111.111.4</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>8GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX4090</li>
                    </ul>
                </td>
                <td>Game Design geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editKommentar">Kommentieren
                    </button></td>
            </tr>
            <tr>
                <td>PC-4</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>3 Jahren</td>
                <td>111.111.111.5</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>16GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX3070</li>
                    </ul>
                </td>
                <td>Virtualization geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editKommentar">Kommentieren
                    </button></td>
            </tr>
            <tr>
                <td>PC-5</td>
                <td>Desktop</td>
                <td>HP</td>
                <td>2 Jahren</td>
                <td>111.111.111.6</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>8GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX4090</li>
                    </ul>
                </td>
                <td>Game Design geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editKommentar">Kommentieren
                    </button></td>
            </tr>
            <tr>
                <td>PC-6</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>1 Jahren</td>
                <td>111.111.111.7</td>
                <td>Windows10</td>
                <td>
                    <ul>
                        <li>MSOffice</li>
                        <li>Visual Studio</li>
                        <li>Microchip Studio</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>16GB RAM</li>
                        <li>1000GB SSD</li>
                        <li>NVIDIA RTX3070</li>
                    </ul>
                </td>
                <td>Virtualization geeignet</td>
                <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editKommentar">Kommentieren
                    </button></td>
            </tr>
            </tbody>
        </table>
        <a href="dashboard_mitglieder.php">
            <button type="submit" class="btn btn-primary sub">Zurück zum Dashboard</button>
        </a>
    </div>



@endsection