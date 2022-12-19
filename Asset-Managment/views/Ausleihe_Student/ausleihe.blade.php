@extends('Ausleihe_Student.layout_ausleihe')
@extends('header_footer')



@section('content')
    <div class="row mt-5 row justify-content-between">
        <div class="btn-group-vertical col-lg-6 mt-3 tbodyDiv">
            <h5> Verfuegbare Geräte </h5>
            <table class="table table-bordered table-striped" id="verfuegbareGeräte">
                <thead class="sticky-top bg-white">
                <tr>
                    <th onclick="sortTable(0, verfuegbareGeräte)">Geräte Name <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(1, verfuegbareGeräte)">Geräte Typ <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(2, verfuegbareGeräte)">Verfügbare Geräte <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(3, verfuegbareGeräte)">Auswahl <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>ARBKVS-Board</td>
                    <td>Microchip</td>
                    <td>
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:68%; background-color: yellowgreen" aria-valuenow="438" aria-valuemin="0"
                                 aria-valuemax="648">
                                <small class="justify-content-center d-flex position-absolute w-100">438/648</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:32%; background-color: black" aria-valuenow="438" aria-valuemin="0"
                                 aria-valuemax="648"></div>
                        </div>
                    </td>
                    <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckChecked"></td>
                </tr>
                <tr>
                    <td>TI-Board</td>
                    <td>Schaltboard</td>
                    <td>
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:48%; background-color: #ffe135" aria-valuenow="154" aria-valuemin="0"
                                 aria-valuemax="312">
                                <small class="justify-content-center d-flex position-absolute w-100">312/648</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:51%; background-color: black" aria-valuenow="438" aria-valuemin="0"
                                 aria-valuemax="648"></div>
                        </div>
                    </td>
                    <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                   checked></td>
                </tr>
                <tr>
                    <td>Laptop</td>
                    <td>Computer</td>
                    <td>
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:84%; background-color: green" aria-valuenow="212" aria-valuemin="0"
                                 aria-valuemax="250">
                                <small class="justify-content-center d-flex position-absolute w-100">212/250</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:16%; background-color: black" aria-valuenow="438" aria-valuemin="0"
                                 aria-valuemax="648"></div>
                        </div>
                    </td>
                    <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                   checked></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:0%; background-color: green" aria-valuenow="0" aria-valuemin="0"
                                 aria-valuemax="0">
                                <small class="justify-content-center d-flex position-absolute w-100">0/0</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:100%; background-color: black" aria-valuenow="438" aria-valuemin="0"
                                 aria-valuemax="0"></div>
                        </div>
                    </td>
                    <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckChecked" onclick="return false;"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="progress position-relative">
                            <div class="progress-bar" role="progressbar"
                                 style="width:0%; background-color: green" aria-valuenow="0" aria-valuemin="0"
                                 aria-valuemax="0">
                                <small class="justify-content-center d-flex position-absolute w-100">0/0</small>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                 style="width:100%; background-color: black" aria-valuenow="438" aria-valuemin="0"
                                 aria-valuemax="0"></div>
                        </div>
                    </td>
                    <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckChecked" onclick="return false;"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="btn-group-vertical col-lg-6 mt-3 tbodyDiv">
            <h5> Eigene Geräte </h5>
            <table class="table table-bordered table-striped" id="gelieheneGeraete">
                <thead class="sticky-top bg-white">
                <tr>
                    <th onclick="sortTable(0, gelieheneGeraete)">Geräte Name<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(1, gelieheneGeraete)">Geräte Typ<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(2, gelieheneGeraete)">Ausgeliehen<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(3, gelieheneGeraete)">Rückgabefrist<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                    <th onclick="sortTable(4, gelieheneGeraete)">Auswahl<img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>ARBKVS-Board</td>
                    <td>Microchip</td>
                    <td>21.09.2022</td>
                    <td>02.11.2022</td>
                    <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                   checked></td>
                </tr>
                <tr>
                    <td>Laptop</td>
                    <td>Werkzeug</td>
                    <td>27.10.2022</td>
                    <td>10.11.2022</td>
                    <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckChecked"{{$geraet['id']}}></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckChecked" onclick="return false;"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckChecked" onclick="return false;"></td>
                </tr><tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckChecked" onclick="return false;"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Button to go back Home -->
    <a href="dashboard_studenten.php">
        <button type="submit" class="btn btn-primary sub col-4 offset-2">Zurück</button>
    </a>
    <!-- Button triggert Modal -->
    <button type="submit" class="btn btn-primary sub col-4" data-bs-toggle="modal" data-bs-target="#confirmation">
        Auswahl bestätigen
    </button>

@endsection




@section('confirmation')
    <div class="modal" id="confirmation">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Auswahl bestätigt</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Eine Anfrage wurde an einem Mitarbeiter gesendet
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
                </div>

            </div>
        </div>
    </div>

@endsection