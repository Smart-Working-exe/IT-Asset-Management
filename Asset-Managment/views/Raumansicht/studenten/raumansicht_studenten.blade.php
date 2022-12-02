@extends('Raumansicht.studenten.layout_raumansicht_studenten')
@extends('header_footer')



@section('content')

    <table class="table table-striped table-bordered" id="Raumansicht_studenten" >
        <thead>
        <tr>
            <th>Raum</th>
            <th>Anzahl Workstations</th>
            <th>Belegte Workstations</th>
            <th>Auslastung</th>
        </tr>
        </thead>

        <tr>
            <td>A001</td>
            <td>15</td>
            <td>13</td>
            <td><div class=" mt-1 col-10">
                    <div class="progress position-relative">
                        <div class="progress-bar" role="progressbar"
                             style="width:86.7%; background-color: red" aria-valuenow="86.7" aria-valuemin="0"
                             aria-valuemax="100">
                            <small class="justify-content-center d-flex position-absolute w-100">13/15</small>
                        </div>
                        <div class="progress-bar" role="progressbar"
                             style="width:13.3%; background-color: black"></div>
                    </div>
                </div></td>

        </tr>
        <tr>
            <td>A002</td>
            <td>15</td>
            <td>2</td>
            <td><div class=" mt-1 col-10">
                    <div class="progress position-relative">
                        <div class="progress-bar" role="progressbar"
                             style="width:13.3%; background-color: green" aria-valuenow="13.3" aria-valuemin="0"
                             aria-valuemax="100">
                            <small class="justify-content-center d-flex position-absolute w-100">2/15</small>
                        </div>
                        <div class="progress-bar" role="progressbar"
                             style="width:86.7%; background-color: black"></div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>A003</td>
            <td>10</td>
            <td>9</td>
            <td>
                <div class=" mt-1 col-10">
                    <div class="progress position-relative">
                        <div class="progress-bar" role="progressbar"
                             style="width:90%; background-color: red" aria-valuenow="90" aria-valuemin="0"
                             aria-valuemax="100">
                            <small class="justify-content-center d-flex position-absolute w-100">9/10</small>
                        </div>
                        <div class="progress-bar" role="progressbar"
                             style="width:10%; background-color: black"></div>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>A004</td>
            <td>16</td>
            <td>0</td>
            <td>
                <div class=" mt-1 col-10">
                    <div class="progress position-relative">
                        <div class="progress-bar" role="progressbar"
                             style="width:0%; background-color: limegreen" aria-valuenow="0" aria-valuemin="0"
                             aria-valuemax="100">
                            <small class="justify-content-center d-flex position-absolute w-100">0/16</small>
                        </div>
                        <div class="progress-bar" role="progressbar"
                             style="width:100%; background-color: black"></div>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>A101</td>
            <td>20</td>
            <td>15</td>
            <td>
                <div class=" mt-1 col-10">
                    <div class="progress position-relative">
                        <div class="progress-bar" role="progressbar"
                             style="width:75%; background-color: orange" aria-valuenow="75" aria-valuemin="0"
                             aria-valuemax="100">
                            <small class="justify-content-center d-flex position-absolute w-100">15/20</small>
                        </div>
                        <div class="progress-bar" role="progressbar"
                             style="width:25%; background-color: black"></div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>A102</td>
            <td>16</td>
            <td>6</td>
            <td>
                <div class=" mt-1 col-10">
                    <div class="progress position-relative">
                        <div class="progress-bar" role="progressbar"
                             style="width:37.5%; background-color: yellowgreen" aria-valuenow="37.5" aria-valuemin="0"
                             aria-valuemax="100">
                            <small class="justify-content-center d-flex position-absolute w-100">6/16</small>
                        </div>
                        <div class="progress-bar" role="progressbar"
                             style="width:62.5%; background-color: black"></div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>A103</td>
            <td>12</td>
            <td>6</td>
            <td>
                <div class=" mt-1 col-10">
                    <div class="progress position-relative">
                        <div class="progress-bar" role="progressbar"
                             style="width:50%; background-color: #ffe135" aria-valuenow="50" aria-valuemin="0"
                             aria-valuemax="100">
                            <small class="justify-content-center d-flex position-absolute w-100">6/12</small>
                        </div>
                        <div class="progress-bar" role="progressbar"
                             style="width:50%; background-color: black"></div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>A104</td>
            <td>10</td>
            <td>7</td>
            <td>
                <div class=" mt-1 col-10">
                    <div class="progress position-relative">
                        <div class="progress-bar" role="progressbar"
                             style="width:70%; background-color: orange" aria-valuenow="70" aria-valuemin="0"
                             aria-valuemax="100">
                            <small class="justify-content-center d-flex position-absolute w-100">7/10</small>
                        </div>
                        <div class="progress-bar" role="progressbar"
                             style="width:30%; background-color: black"></div>
                    </div>
                </div>
            </td>
        </tr>
    </table>

@endsection