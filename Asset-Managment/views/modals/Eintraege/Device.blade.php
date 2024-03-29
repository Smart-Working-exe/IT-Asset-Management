@section('addDevice')
    <div class="modal fade" id="addDevice" tabindex="-1" aria-labelledby="addDevice" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <form action="/addDevice" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Gerät Hinzufügen</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="row mt-3">
                                <div class="col">
                                    <select required class="form-select" aria-label="Default select example" id="deviceTyp"
                                            name="addDevicedeviceTyp">
                                        <option value="" disabled selected>Typ*</option>
                                        <option value="1">Computer</option>
                                        <option value="2">Laptop</option>
                                        <option value="3">Monitor</option>
                                        <option value="4">Tastatur</option>
                                        <option value="5">Maus</option>
                                        <option value="6">Praktikumsmaterial</option>
                                        <option value="7">Accessoires</option>
                                    </select>
                                </div>
                                <div class="col" id="sometimesHide1">
                                    <div class="dropdown" >
                                        <button class="form-select" data-mdb-clear-button="true" type="button" id="addDeviceBetriebssystem"  multiple="multiple" data-bs-toggle="dropdown">Betriebssystem</button>
                                        <ul class="dropdown-menu form-select" aria-labelledby="addDeviceBetriebssystem" style="max-height: 280px; overflow-y: auto">
                                            <li><h6 class="dropdown-header">Betriebssystem</h6></li>
                                            @foreach(getAll_Betriebssysteme() as $betriebssystem)
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="Checkme {{$betriebssystem['id']}}" name="addDeviceBetriebssystem[]" value="{{$betriebssystem['id']}}"  /> <!--id="Checkme $betriebssystem['id']}}"-->
                                                            <label class="form-check-label" for="Checkme {{$betriebssystem['id']}}">{{$betriebssystem['name']}} @if(!empty($betriebssystem['version'])) {{$betriebssystem['version']}}  @endif</label>
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
                                    <input class="form-control" type="text" id="deviceName" name="addDeviceName" placeholder="Name*">
                                </div>
                               @if(!isset($_GET['raum']))
                                    <div class="col">
                                        <select class="form-select" data-mdb-clear-button="true" placeholder="Raum" name="addDeviceRoom" style="max-height: 180px; overflow-y: auto">
                                            @foreach(getAll_Rooms() as $room)
                                                <option value="{{$room['raumnummer']}}" @if($room['raumnummer'] == "Lager") selected @endif>{{$room['raumnummer']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                               @else
                                    <div class="col">
                                        <select class="form-select" data-mdb-clear-button="true" placeholder="Raum" name="addDeviceRoom" style="max-height: 180px; overflow-y: auto;">
                                                <option value="{{$_GET['raum']}}" selected >{{$_GET['raum']}}</option>
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input class="form-control" type="text" id="deviceManufacture"
                                           name="addDeviceHersteller"
                                           placeholder="Hersteller"></div>
                                <div class="col" id="sometimesHide2">
                                    <div class="dropdown" >
                                        <button class="form-select" data-mdb-clear-button="true" type="button" id="addDeviceSoftware"  multiple="multiple" data-bs-toggle="dropdown">Software des Gerätes</button>
                                        <ul class="dropdown-menu form-select" aria-labelledby="addDeviceSoftware" style="max-height: 280px; overflow-y: auto">
                                            <li><h6 class="dropdown-header">Software des Gerätes</h6></li>
                                            @foreach(db_getAll_Softwarelizenzen() as $software)
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="addDeviceSoftware[]" value="{{$software['id']}}" id="Checkme {{$software['id']}}" />
                                                            <label class="form-check-label" for="Checkme {{$software['id']}}">{{$software['name']}} @if(!empty($software['version'])) {{$software['version']}}  @endif</label>
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
                                    <div class="form-group">
                                        <div class="input-group date" id="datepickerUsage">
                                            <input type="text" class="form-control" placeholder="erste Inbetriebname*"
                                                   name="addDeviceersteInbetriebname" required>
                                            <span class="input-group-append">
                                            <span class="input-group-text bg-white d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group date" id="datepickerBuild">
                                            <input type="text" class="form-control" placeholder="alter des Gerätes"
                                                   name="addDevicealterGerat">
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-white d-block">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mt-3" id="DisplaySlide" style="display:none;">
                                <div class="form-check form-switch green">
                                    <input class="form-check-input" type="checkbox" id="addDeviceAusleihbar"
                                           name="addDeviceAusleihbar">
                                    <label class="form-check-label" for="addDeviceAusleihbar">Ausleihbar</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <textarea class="form-control" id="technischeEckdaten" rows="5"
                                              placeholder="Technische Eckdaten"
                                              name="addDevicetechnischeEckdaten"></textarea>
                                </div>
                                <div class="col">
                                    <textarea class="form-control" id="comment" rows="5"
                                              placeholder="Kommentar zum Geräte"
                                              name="addDeviceKommentarGerat"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <p>mit * makierte Felder sind Pflichtfelder</p>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="device_add_submit">
                            Speichern
                        </button>

                        <button type="cancle" class="btn btn-danger" data-bs-dismiss="modal" id="device_add_cancle">
                            Abbrechen
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('jsextra')
    <script src="../js/multiselect-dropdown.js"></script>
@endsection

