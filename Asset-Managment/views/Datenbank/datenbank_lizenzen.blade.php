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
            <th onclick="sortTable(1, devices)">Erworben am </th>
            <th onclick="sortTable(2, devices)">Ablaufdatum </th>
            <th onclick="sortTable(3, devices)">Installationen </th>
            <th>Bearbeiten</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $lizenz)

            <tr>
                <td>{{$lizenz['name'] . " " . $lizenz['version']}}</td>
                <td>{{$lizenz['erwerbsdatum']}}</td>
                <td>{{$lizenz['ablaufdatum']}}</td>
                <td>
                    <div class="progress position-relative">
                        <div class="progress-bar @if($lizenz['anzahl_installationen_prozent'] <=25) bg-success @elseif($lizenz['anzahl_installationen_prozent'] >25 && $lizenz['anzahl_installationen_prozent'] <=50) bg-info
                             @elseif($lizenz['anzahl_installationen_prozent'] > 50 && $lizenz['anzahl_installationen_prozent'] <=75) bg-warning @else bg-danger"
                             @endif role="progressbar"
                             style="width:{{$lizenz['anzahl_installationen_prozent']}}%; background-color: green"
                             aria-valuenow="{{$lizenz['anzahl_installationen']}}" aria-valuemin="0"
                             aria-valuemax="{{$lizenz['anzahl_gerate']}}">
                            <small class="justify-content-center d-flex position-absolute w-100"
                                   style="color: black">{{$lizenz['anzahl_installationen']}}/{{$lizenz['anzahl_gerate']}}</small>
                        </div>
                    </div>

                </td>
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editSoftware{{$lizenz['id']}}">Bearbeiten
                    </button>
                </td>
            </tr>


            <form action="datenbank?database=lizenzen" method="post">
                <input type="hidden" name="form_id" value="{{$lizenz['id']}}">
                <!-- The Modal -->
                <div class="modal fade" id="editSoftware{{$lizenz['id']}}" tabindex="-1" aria-labelledby="editSoftware"
                     aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Softwarelizenz bearbeiten von Software {{$lizenz['name']}}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="row mt-3">
                                        <div class="col">
                                            <input class="form-control" type="text" name="form_lizenzname"
                                                   placeholder="Name der Lizenz*" value="{{$lizenz['name']}}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <input class="form-control" type="text" name="form_lizenzhersteller"
                                                   placeholder="Hersteller*" value="{{$lizenz['hersteller']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input class="form-control" type="text" name="form_softwareversion"
                                               placeholder="Version" value="{{$lizenz['version']}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group date" id="datepickerEditAvailable">
                                                <input type="text" name="form_lizenzerwerb" class="form-control"
                                                       placeholder="Erwerbsdatum" value="{{$lizenz['erwerbsdatum']}}">
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
                                        <div class="form-group">
                                            <div class="input-group date" id="datepickerEditNotAvailable">
                                                <input type="text" name="form_lizenzablauf" class="form-control"
                                                       placeholder="Ablaufdatum" value="{{$lizenz['ablaufdatum']}}">
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
                                        <input class="form-control" type="number" name="form_lizenzanzahl"
                                               placeholder="Anzahl verfügbarer Installation"
                                               value="{{$lizenz['anzahl_gerate']}}">
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer justify-content-between">

                                <button type="submit" id="submit_delete_license" name="submit_delete_license" value="{{$lizenz['id']}}" class="btn btn-danger">Softwarelizenz Löschen</button>

                                <div>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="submit"
                                            value="3">Speichern
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen
                                    </button>
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
@section('export')

    <button class="btn btn-primary sub" type="button" onclick="tableToCSV() ">
        Export
    </button>
    <script type="text/javascript">
        function tableToCSV() {

            // Variable to store the final csv data
            var csv_data = [];
            var test=["Name-;-Erworben am-;-Abgelaufen am-;-Installationen"];
            csv_data.push(test);
            // Get each row data
            var rows = document.getElementsByTagName('tr')


            for (var i = 0; i < rows.length; i++) {

                // Get each column data
                var cols = rows[i].querySelectorAll('td');

                // Stores each csv row data
                var csvrow = [];

                for (var j = 0; j < cols.length-1; j++) {

                    // Get the text data of each cell
                    // of a row and push it to csvrow

                    if(j==3){

                        var Stringzumspalten=cols[j].innerHTML;
                        var result=Stringzumspalten.split('>');
                        var rein=result[3].toString();
                        var bitte=rein.split('<');
                        var funktionier=bitte[0];
                        var letsgo=funktionier.replace('/', ' von ');
                        var neu=letsgo.replaceAll("\n", "");
                        csvrow.push(neu);
                    }
                    else{
                        csvrow.push(cols[j].innerHTML);
                    }
                }

                // Combine each column value with comma
                if(i!=0) {
                    csv_data.push(csvrow.join("-;-"));
                }
            }
            // Combine each row data with new line character
            csv_data = csv_data.join('\n');

            // Call this function to download csv file
            downloadCSVFile(csv_data);
        }

        function downloadCSVFile(csv_data) {
            // Create CSV file object and feed
            // our csv_data into it
            CSVFile = new Blob([csv_data], {
                type: "text/csv"
            });

            // Create to temporary link to initiate
            // download process
            var temp_link = document.createElement('a');

            // Download csv file
            temp_link.download = "Softwarelizenzen.csv";
            var url = window.URL.createObjectURL(CSVFile);
            temp_link.href = url;

            // This link should not be displayed
            temp_link.style.display = "none";
            document.body.appendChild(temp_link);

            // Automatically click the link to
            // trigger download
            temp_link.click();
            document.body.removeChild(temp_link);
        }
    </script>
@endsection