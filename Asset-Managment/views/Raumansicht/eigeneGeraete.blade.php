@extends('Raumansicht.layout_raumansicht')
@extends('header_footer')
@extends('modals.Eintraege.Device')
@extends('Filter.geraete')
@extends('modals.export_import')




@section('sub_header')
    <div class="row mt-4 ">
        <p class="display-6 col-3"> Eigene Geräte</p>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#addDevice">
            Gerät hinzufügen
        </button>
        <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                data-bs-target="#export">
            Export
        </button>
    </div>



@endsection



@section('content')
    <div class="container mt-3">
        <table class="table table-striped table-bordered" id="ownDevices">
            <thead>
            <tr>
                <th onclick="sortTable(0, ownDevices)">Name <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
                </th>
                <th onclick="sortTable(1, ownDevices)">Typ <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
                </th>
                <th onclick="sortTable(2, ownDevices)">Hersteller <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                       width="20px"></th>
                <th onclick="sortTable(3, ownDevices)">Alter <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                  width="20px"></th>
                <th onclick="sortTable(5, ownDevices)">Betriebssystem <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                           width="20px"></th>
                <th onclick="sortTable(6, ownDevices)">Software <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                     width="20px"></th>
                <th onclick="sortTable(7, ownDevices)">Technische Daten <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                             width="20px"></th>
                <th onclick="sortTable(8, ownDevices)">Kommentar <img src="/img/up-and-down-arrows-svgrepo-com.svg"
                                                                      width="20px"></th>
                <th>Kommentieren</th>
                <th onclick="sortTable(9, ownDevices)">Raum</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>PC-1</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>6 Jahren</td>
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
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editRoom">Ändern
                    </button>
                </td>
                </td>
            </tr>
            <tr>
                <td>PC-2</td>
                <td>Tower-P</td>
                <td>Dell</td>
                <td>6 Jahren</td>
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
                <td>A102
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editRoom" style="width: 100px">Ändern
                    </button>
                </td>

            </tr>

            </tbody>
        </table>

    </div>


@endsection