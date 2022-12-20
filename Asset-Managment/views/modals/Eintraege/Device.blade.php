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
                                    <select class="form-select" aria-label="Default select example" id="deviceTyp"
                                            name="addDevicedeviceTyp">
                                        <option disabled selected>Typ*</option>
                                        <option value="1">Computer</option>
                                        <option value="2">Laptop</option>
                                        <option value="3">Monitor</option>
                                        <option value="4">Tastatur</option>
                                        <option value="5">Maus</option>
                                        <option value="6">Praktikum Utensilien</option>
                                        <option value="7">Accessoires</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select" aria-label="Default select example" id="deviceTyp"
                                            name="addDeviceBetriebssystem">
                                        <option selected disabled>Betriebssystem*</option>
                                        <option value="1" id="addDeviceBetriebssystem">Windows</option>
                                        <option value="2" id="addDeviceBetriebssystem">Ubuntu</option>
                                        <option value="3" id="addDeviceBetriebssystem">Debian</option>
                                        <option value="4" id="addDeviceBetriebssystem">MacOS</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input class="form-control" type="text" id="deviceName" name="addDeviceName"
                                           placeholder="Name*"></div>
                                <div class="col">
                                    <input class="form-control" type="text" id="deviceRoom" name="addDeviceRoom"
                                           placeholder="Raum"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input class="form-control" type="text" id="deviceManufacture" name="addDeviceHersteller"
                                           placeholder="Hersteller"></div>
                                <div class="col">
                                    <select class="form-select" data-mdb-clear-button="true"
                                            placeholder="Software des Gerätes" name="addDeviceSoftware">
                                        <option selected>Software des Gerätes</option>
                                        <option value="1" id="addDeviceSoftware">Microsoft Visual Studio 2022</option>
                                        <option value="2" id="addDeviceSoftware">Intel Quartus Prime</option>
                                        <option value="3" id="addDeviceSoftware">MS Office</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group date" id="datepickerUsage">
                                            <input type="text" class="form-control" placeholder="erste Inbetriebname*"
                                                   name="addDeviceersteInbetriebname">
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
                            <div class="col mt-3">
                                <div class="form-check form-switch green">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="addDeviceAusleihbar">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Ausleihbar</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <textarea class="form-control" id="technischeEckdaten" rows="5" placeholder="Technische Eckdaten" name="addDevicetechnischeEckdaten"></textarea>
                                </div>
                                <div class="col">
                                    <textarea class="form-control" id="comment" rows="5" placeholder="Kommentar zum Geräte" name="addDeviceKommentarGerat"></textarea>
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

@section('editKommentar')
    <!-- The Modal -->
    <div class="modal" id="editKommentar">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Kommentar</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    <fieldset>
                        <textarea id="kommentar" name="textfeld" cols="45" rows="4"></textarea>
                    </fieldset>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('editRoom')
    <div class="modal fade" id="editRoom">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Hier kommt das Formular für den Raum ändern hin.</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('jsextra')
    <script src="../js/multiselect-dropdown.js"></script>
@endsection