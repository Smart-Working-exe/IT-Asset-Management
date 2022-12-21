@extends('EigeneGeraete.layout_eigeneGeraete')
@extends('header_footer')
@extends('modals.Eintraege.Device')
@extends('modals.Eintraege.chooseDevice')
@extends('Filter.geraete')
@extends('modals.export_import')




@section('sub_header')
    <div class="row mt-4 ">
        <p class="display-6 col-3"> Eigene Geräte</p>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#chooseDevice">
            Gerät hinzufügen
        </button>
        <button class="btn btn-primary sub" type="button" onclick="tableToCSV() ">
            Export
        </button>

        @if(!empty($selected_filter['suche']) || !empty($selected_filter['Typ']) || !empty($selected_filter['hersteller']) || !empty($selected_filter['age']) || !empty($selected_filter['betriebssystemid']) || !empty($selected_filter['softwarelizenzid'])  )
            <a href="" class="btn  btn-primary sub  text-nowrap" style="margin-left: 68%" role="button" aria-disabled="true">Filter Zurücksetzten</a>
        @endif
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
            @foreach($data as $geraet)
                <tr>
                    <td>{{$geraet['name']}}</td>
                    <td>{{$geraet['typ']}}</td>
                    <td>{{$geraet['hersteller']}}</td>
                    <td>{{$geraet['alter']}} Jahre</td>
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
                        @if(!empty($geraet['technische_eckdaten_liste'][0]))
                            <ul>
                                @foreach($geraet['technische_eckdaten_liste'] as $value)
                                    <li>{{$value}} </li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td class="no_nowrap">{{$geraet['kommentar']}}</td>
                    <td><button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                                data-bs-target="#editComment{{$geraet['name']}}">Kommentieren
                        </button></td>
                    <td>{{$geraet['raumnummer']}}
                        <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                                data-bs-target="#editRoom{{$geraet['name']}}">Ändern
                        </button></td>
                </tr>

                <form action="eigeneGeraete?kuerzel={{$_SESSION['name']}}" method="POST">
                    <input type="hidden" name="form_deviceID" value="{{$geraet['id']}}">
                    <div class="modal fade" id="editRoom{{$geraet['name']}}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Raum von Gerät {{$geraet['name']}} ändern</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                   <input type="text" id="inputroom" name="form_room" value="{{$geraet['raumnummer']}}"  onkeyup="this.value = this.value.toUpperCase();">

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                                    <button type="submit"  name="to_remove" value="{{$geraet['id']}}" class="btn btn-danger">Gerät entfernen</button>
{{--                                    <button type="submit" class="btn btn-danger mt-4" data-bs-dismiss="modal" name="to_remove" value="{{$geraet['id']}}">Gerät entfernen</button>--}}
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="eigeneGeraete?kuerzel={{$_SESSION['name']}}" method="POST">
                    <input type="hidden" name="form_deviceID" value="{{$geraet['id']}}">
                    <div class="modal fade" id="editComment{{$geraet['name']}}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Kommentar von Gerät {{$geraet['name']}} ändern</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <textarea name="form_comment" rows="10" cols="30">{{$geraet['kommentar']}}</textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" name="submit" value="Submit2" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
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
@section('export')

<script type="text/javascript">
    function tableToCSV() {

        // Variable to store the final csv data
        var csv_data = [];
        var test=["Name","Typ","Hersteller", "Alter","Betriebsystem","Software","Technische Daten","Kommentar","Raum"];
        csv_data.push(test);
        // Get each row data
        var rows = document.getElementsByTagName('tr')


        for (var i = 0; i < rows.length; i++) {

            // Get each column data
            var cols = rows[i].querySelectorAll('td');

            // Stores each csv row data
            var csvrow = [];

            for (var j = 0; j < cols.length; j++) {

                // Get the text data of each cell
                // of a row and push it to csvrow

                if(j==4|j==5|j==6){
                    var Stringzumspalten=cols[j].innerHTML;
                    var help=Stringzumspalten.replace("\n","");
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
                    var plz=rein.replaceAll(",","");
                    var plz2=plz.replaceAll("\n","");

                    csvrow.push(plz2);
                    // csvrow.push(arrayzumkillen);

                }
                else if(j==8){
                continue;
                }
                else if(j==9){
                    var splitstring=cols[j].innerHTML;
                    var gespaltet=splitstring.substring(0,4);
                    csvrow.push(gespaltet);
                }
                else{
                    csvrow.push(cols[j].innerHTML);
                }


            }

            // Combine each column value with comma
            if(i!=0) {
                csv_data.push(csvrow.join(","));
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
        temp_link.download = "EigeneGeräte.csv";
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

<!--  <div> /*    if(j==7){

      var Stringzumspalten=cols[j].innerHTML;
      var help=Stringzumspalten.replace("\n","");
      var arrayzumkillen=Stringzumspalten.split(">");
      var arrayzumkillen2=arrayzumkillen.split("<");
      var Werte=[];

      for(var k=0;k<arrayzumkillen2.length;k++){

      if(arrayzumkillen2[k].includes("li") && arrayzumkillen2[k].length()<=3){

      }
      else if (arrayzumkillen2[k].includes("ul") && arrayzumkillen2[k].length()<=3){

      }
      else{
      Werte.push(arrayzumkillen2[k]);
      }
      var reinda=Werte.toString();
      csvrow.push(reinda);
      }*/</div>-->



@endsection