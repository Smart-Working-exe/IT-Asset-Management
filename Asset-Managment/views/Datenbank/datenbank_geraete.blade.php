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
            <th onclick="sortTable(2, devices)">Ip-Adresse</th>
            <th onclick="sortTable(4, devices)">Betriebssystem </th>
            <th onclick="sortTable(5, devices)">Software </th>
            <th onclick="sortTable(6, devices)">Technische Daten </th>
            <th onclick="sortTable(7, devices)">Kommentar</th>
            <th onclick="sortTable(8, devices)">Raum </th>
            <th>Bearbeiten</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $geraet)
            <tr>
                <td>{{$geraet['name']}}</td>
                <td>{{$geraet['typ']}}</td>
                <td>{{$geraet['hersteller']}}</td>
{{--                <td>{{$geraet['alter']}} Jahre</td>--}}
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
                <td class="no_nowrap">@if(!empty($geraet['kommentar_liste'][0]))
                        <ul>
                            @foreach($geraet['kommentar_liste'] as $value)
                                <li>{{$value}}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>{{$geraet['raumnummer']}}</td>
                <td>
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                            data-bs-target="#editDevice{{$geraet['id']}}">Bearbeiten
                    </button>
                </td>


            </tr>

            <form action="/datenbank" method="post" role="form">
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
                                            <select class="form-select" aria-label="Default select example"
                                                    name="form_deviceType" required>
                                                <option value="" disabled>Typ*</option>
                                                @if($geraet['typ'] == "Computer")
                                                    <option value="1" selected>Computer</option>
                                                @elseif($geraet['typ'] == "Laptop")
                                                    <option value="2" selected>Laptop</option>
                                                @elseif($geraet['typ'] == "Monitor")
                                                    <option value="3" selected>Monitor</option>
                                                @elseif($geraet['typ'] == "Tastatur")
                                                    <option value="4" id="deviceTyp" selected>Tastatur</option>
                                                @elseif($geraet['typ'] == "Maus")

                                                    <option value="1" id="deviceTyp">Computer</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp">Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp" selected>Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikumsmaterial</option>
                                                    <option value="7" id="deviceTyp">Accessoires</option>
                                                @elseif($geraet['typ'] == "Praktikumsmaterial")
                                                    <option value="1" id="deviceTyp">Computer</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp">Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp" selected>Praktikumsmaterial</option>
                                                    <option value="7" id="deviceTyp">Accessoires</option>
                                                @else
                                                    <option value="1" id="deviceTyp">Computer</option>
                                                    <option value="2" id="deviceTyp">Laptop</option>
                                                    <option value="3" id="deviceTyp">Monitor</option>
                                                    <option value="4" id="deviceTyp">Tastatur</option>
                                                    <option value="5" id="deviceTyp">Maus</option>
                                                    <option value="6" id="deviceTyp">Praktikumsmaterial</option>
                                                    <option value="7" id="deviceTyp" selected>Accessoires</option>
                                                @endif

                                            </select>
                                        </div>
                                        <div class="col"
                                            @if(!($geraet['typ'] == "Computer" || $geraet['typ'] == "Laptop" || $geraet['typ'] == "Accessoires"))
                                                style="display: none;"
                                            @endif>
                                            <div class="dropdown"
                                                 >
                                                <button class="form-select" data-mdb-clear-button="true" type="button" id="form_OperationSystem" multiple="multiple" data-bs-toggle="dropdown">Betriebssystem</button>
                                                <ul class="dropdown-menu form-select" aria-labelledby="form_OperationSystem" style="max-height: 280px; overflow-y: auto">
                                                    <li><h6 class="dropdown-header">Betriebssystem</h6>
                                                    @foreach($filter_variable_data['betriebssystem'] as $key => $betriebssystem_name)
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"  name="form_OperationSystem[]" value="{{$key}}" id="Checkme {{$key}}"
                                                                           {{$vorhanden=false}}
                                                                    @if(isset($geraet['betriebssystem']))
                                                                        {{$vorhanden=false}}
                                                                        @foreach($geraet['betriebssystem'] as $value)
                                                                            @if($value==$betriebssystem_name)
                                                                               {{$vorhanden=true}}
                                                                            @endif
                                                                        @endforeach
                                                                    @endif

                                                                    @if($vorhanden ?? false ) checked @endif />
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
                                            <input class="form-control" type="text" name="form_name123"
                                                   placeholder="Name*"
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
                                            <input class="form-control" type="text" name="form_hersteller"
                                                   placeholder="Hersteller"
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
                                                                           @if($vorhanden ?? false  ) checked @endif />
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
                                                    <input type="text" id="Inbetriebname" class="form-control" placeholder="erste Inbetriebname*" value="{{$geraet['betrieb']}}" name="form_betrieb">
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
                                                    <input type="text" id="AlterdesGer" class="form-control"
                                                           placeholder="alter des Gerätes"
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
                                        <div class="col mt-3"
                                             @if(!($geraet['typ'] == "Praktikumsmaterial"))
                                                 style="display: none;"
                                                @endif>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="form_Ausleihbar" name="form_Ausleihbar" checked>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Ausleihbar</label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col mt-3"
                                             @if(!($geraet['typ'] == "Praktikumsmaterial"))
                                                 style="display: none;"
                                                @endif>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="form_Ausleihbar" name="form_Ausleihbar">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Ausleihbar</label>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row mt-3">
                                        <div class="col">
                                    <textarea class="form-control" name="form_technischeEckdaten" rows="5"
                                              placeholder="Technische Eckdaten, mit Semikolon trennen">{{$geraet['technische_eckdaten']}}</textarea>
                                        </div>
                                        <div class="col">
                                            <textarea class="form-control" name="form_comment" rows="5"
                                                      placeholder="Kommentar zum Gerät">{{$geraet['kommentar']}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer justify-content-between">
                                <button type="submit"  name="submit_delete" value="{{$geraet['id']}}" class="btn btn-danger">Gerät Löschen</button>
                                <div>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="submit"
                                            value="1">Speichern
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
            var test=["Name;Typ;Hersteller;Alter;IP-Adresse;Betriebsystem;Software;Technische Daten;Kommentar;Raum"];
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

                    if(j==7|j==6|j==5){
                        var Stringzumspalten=cols[j].innerHTML;
                        var arrayzumkillen=Stringzumspalten.split('<').join(',').split('>').join(',').split(',');
                        var Werte=[];

                        for(var k=0;k < arrayzumkillen.length;k++){

                            if(arrayzumkillen[k].includes("li") && arrayzumkillen[k].length<=3){
                            }
                            else if (arrayzumkillen[k].includes("ul") && arrayzumkillen[k].length<=3){
                            }
                            else{
                                Werte.push(arrayzumkillen[k]);
                            }

                        }
                        var reinda=Werte.toString();
                        var rein=reinda.substring(4);
                        var plz=rein.replaceAll(","," ");
                        var plz2=plz.replaceAll("\n","");
                        var plz21=plz2.replace(" ","");
                        var plz3=plz21.replace(" ","");
                            plz3=plz3.replace(" ","");
                        if(j!=7){
                            var plz4=plz3.replaceAll("     ",", ");
                            var plz5=plz4.substring(0,plz4.length-4);
                            csvrow.push(plz5);}
                        else{
                            var plz4=plz3.replaceAll("     ",",");
                            var plz5=plz4.substring(0,plz4.length-3);
                            csvrow.push(plz5);
                        }
                       // csvrow.push(arrayzumkillen);

                    }
                    else if(j==8){
                        var Stringzumspalten=cols[j].innerHTML;
                        var arrayzumkillen=Stringzumspalten.split('<').join(',').split('>').join(',').split(',');
                        var Werte=[];

                        for(var k=0;k < arrayzumkillen.length;k++){

                            if(arrayzumkillen[k].includes("li") && arrayzumkillen[k].length<=3){
                            }
                            else if (arrayzumkillen[k].includes("ul") && arrayzumkillen[k].length<=3){
                            }
                            else{
                                Werte.push(arrayzumkillen[k]);
                            }

                        }
                        var reinda=Werte.toString();
                        var rein=reinda.substring(4);
                        var plz=rein.replaceAll(","," ");
                        var plz2=plz.replaceAll("\n","");
                        var plz3=plz2.replace(" ","");
                        plz3=plz3.replace(" ","");
                        var plz4=plz3.replaceAll("     ",", ");
                        var plz5=plz4.substring(0,plz4.length-3);
                        csvrow.push(plz5);

                    }
                    else if(j==3){
                             var Stringzumspalten=cols[j].innerHTML;
                            var plz=Stringzumspalten.replaceAll("\n","");

                             csvrow.push(plz);

                    }
                    else{
                        csvrow.push(cols[j].innerHTML);
                    }


                }

                // Combine each column value with comma
                if(i!=0) {
                    csv_data.push(csvrow.join(";"));
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
            temp_link.download = "Geräte.csv";
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