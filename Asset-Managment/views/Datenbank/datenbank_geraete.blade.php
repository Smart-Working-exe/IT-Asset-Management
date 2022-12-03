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
        <tr>
            <td>PC-1</td>
            <td>Tower-Pc</td>
            <td>Dell</td>
            <td>6 Jahre</td>
            <td>111.111.112.1</td>
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
            <td>E145</td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editDevice">Geräte bearbeiten
                </button>
            </td>
        </tr>

        <tr>
            <td>PC-2</td>
            <td>Tower-Pc</td>
            <td>Dell</td>
            <td>6 Jahre</td>
            <td>111.111.112.2</td>
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
            <td>E144</td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editConfirmation">Geräte bearbeiten
                </button>
            </td>
        </tr>

        <tr>
            <td>PC-3</td>
            <td>Tower-Pc</td>
            <td>Dell</td>
            <td>6 Jahre</td>
            <td>111.111.112.3</td>
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
            <td>E144</td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editConfirmation">Geräte bearbeiten
                </button>
            </td>
        </tr>

        <tr>
            <td>HDMI Kabel</td>
            <td>Sonstiges</td>
            <td>Amazon</td>
            <td>2 Jahre</td>
            <td></td>
            <td></td>
            <td>
            </td>
            <td>
                <ul>
                    <li>HDMI 2.0</li>
                    <li>2 Meter</li>

                </ul>
            </td>
            <td class="no_nowrap">Ist eigentlich nur 1,97m lang</td>
            <td>Lager</td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editConfirmation">Geräte bearbeiten
                </button>
            </td>
        </tr>

        <tr>
            <td>Maus</td>
            <td>Pc-Maus</td>
            <td>Logischtech</td>
            <td>1 Jahr</td>
            <td></td>
            <td></td>
            <td>

            </td>
            <td>
                <ul>
                    <li>Kabelgebunden</li>
                    <li>1000 Hz</li>
                </ul>
            </td>
            <td>Sie ist gerne microchips</td>
            <td>Lager</td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editConfirmation">Geräte bearbeiten
                </button>
            </td>
        </tr>

        </tbody>
    </table>

@endsection
