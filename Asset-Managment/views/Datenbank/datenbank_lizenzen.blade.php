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

        <tr>
            <td>MS Office</td>
            <td>20.10.2022</td>
            <td>20.10.2024</td>
            <td>
                <div class="progress position-relative">
                    <div class="progress-bar" role="progressbar"
                         style="width:18%; background-color: green" aria-valuenow="187" aria-valuemin="0"
                         aria-valuemax="1000">
                        <small class="justify-content-center d-flex position-absolute w-100">187/1000</small>
                    </div>
                    <div class="progress-bar" role="progressbar"
                         style="width:82%; background-color: black"></div>
                </div>
            </td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editSoftware">Softwarelizenz bearbeiten
                </button>
            </td>
        </tr>

        <tr>
            <td>Microsoft Visual Studio 2022</td>
            <td>01.09.2022</td>
            <td>01.10.2024</td>
            <td>
                <div class="progress position-relative">
                    <div class="progress-bar" role="progressbar"
                         style="width:25%; background-color: yellowgreen" aria-valuenow="207" aria-valuemin="0"
                         aria-valuemax="800">
                        <small class="justify-content-center d-flex position-absolute w-100">207/800</small>
                    </div>
                    <div class="progress-bar" role="progressbar"
                         style="width:75%; background-color: black"></div>
                </div>
            </td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editSoftware">Softwarelizenz bearbeiten
                </button>
            </td>
        </tr>

        <tr>
            <td>Intel Quartus Prime</td>
            <td>01.01.1906</td>
            <td>01.01.2026</td>
            <td>
                <div class="progress position-relative">
                    <div class="progress-bar" role="progressbar"
                         style="width:92%; background-color: red" aria-valuenow="17" aria-valuemin="0"
                         aria-valuemax="100">
                        <small class="justify-content-center d-flex position-absolute w-100">92/100</small>
                    </div>
                    <div class="progress-bar" role="progressbar"
                         style="width:8%; background-color: black"></div>
                </div>
            </td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editSoftware">Softwarelizenz bearbeiten
                </button>
            </td>
        </tr>


        </tbody>
    </table>


@endsection