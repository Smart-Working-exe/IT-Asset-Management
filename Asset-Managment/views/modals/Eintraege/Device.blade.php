@section('addDevice')
    <div class="modal fade" id="addDevice" tabindex="-1" aria-labelledby="addDevice" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

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
                                <select class="form-select" aria-label="Default select example" id="deviceTyp">
                                    <option selected>Typ*</option>
                                    <option value="1" id="deviceTyp">Computer</option>
                                    <option value="2" id="deviceTyp">Accessoir</option>
                                    <option value="3" id="deviceTyp">Eigener Typ</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" id="deviceTyp">
                                    <option selected disabled>Typ*</option>
                                    <option value="1" id="deviceTyp">Windows</option>
                                    <option value="2" id="deviceTyp">Ubuntu</option>
                                    <option value="3" id="deviceTyp">Debian</option>
                                    <option value="3" id="deviceTyp">MacOS</option>
                                    <option value="3" id="deviceTyp">Neues Betriebssystem</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Name*"></div>
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="IP-Adresse"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Hersteller"></div>
                            <div class="col">
                                <select class="form-select" data-mdb-clear-button="true"
                                        placeholder="Software des Gerätes">
                                    <option selected>Software des Gerätes</option>
                                    <option value="1">Microsoft Visual Studio 2022</option>
                                    <option value="2">Intel Quartus Prime</option>
                                    <option value="3">MS Office</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group date" id="datepickerUsage">
                                        <input type="text" class="form-control" placeholder="erste Inbetriebname*">
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
                                        <input type="text" class="form-control" placeholder="alter des Gerätes">
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
                    <textarea class="form-control" id="technischeEckdaten" rows="5"
                              placeholder="Technische Eckdaten"></textarea>
                            </div>
                            <div class="col">
                    <textarea class="form-control" id="comment" rows="5"
                              placeholder="Kommentar zum Geräte"></textarea>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="dataImport" class="form-label">Aus Datei importieren</label>
                            <input class="form-control" type="file" id="dataImport" placeholder="Aus Datei importieren">
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <p>mit * makierte Felder sind Pflichtfelder</p>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">+</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('editDevice')
    <!-- The Modal -->
    <div class="modal fade" id="editDevice" tabindex="-1" aria-labelledby="editDevice" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Gerät bearbeiten</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="row mt-3">
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" id="deviceTyp">
                                    <option>Typ*</option>
                                    <option value="1" id="deviceTyp" selected>Computer</option>
                                    <option value="2" id="deviceTyp">Accessoir</option>
                                    <option value="3" id="deviceTyp">Eigener Typ</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" id="deviceTyp">
                                    <option disabled>Typ*</option>
                                    <option value="1" id="deviceTyp" selected>Windows 10</option>
                                    <option value="2" id="deviceTyp">Ubuntu</option>
                                    <option value="3" id="deviceTyp">Debian</option>
                                    <option value="3" id="deviceTyp">MacOS</option>
                                    <option value="3" id="deviceTyp">Neues Betriebssystem</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Name*"
                                       value="PC-2"></div>
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="IP-Adresse"
                                       value="111.111.111.3"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Hersteller"
                                       value="Dell"></div>
                            <div class="col">
                                <select class="form-select" data-mdb-clear-button="true"
                                        placeholder="Software des Gerätes">
                                    <option>Software des Gerätes</option>
                                    <option value="1" selected>Microsoft Visual Studio 2022</option>
                                    <option value="2">Intel Quartus Prime</option>
                                    <option value="3" selected>MS Office</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group date" id="datepickerEditUsage">
                                        <input type="text" class="form-control" placeholder="erste Inbetriebname*"
                                               value="27/07/2017">
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
                                    <div class="input-group date" id="datepickerEditBuild">
                                        <input type="text" class="form-control" placeholder="alter des Gerätes"
                                               value="27/07/2017">
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
                                <textarea class="form-control" id="technischeEckdaten" rows="5"
                                          placeholder="Technische Eckdaten, mit Semikolon trennen">16GB RAM; 1000GB SSD; NVIDIA RTX3070</textarea>
                            </div>
                            <div class="col">
                                <textarea class="form-control" id="comment" rows="5"
                                          placeholder="Kommentar zum Gerät">Virtualization geeignet; </textarea>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="dataImport" class="form-label">Aus Datei importieren</label>
                            <input class="form-control" type="file" id="dataImport" placeholder="Aus Datei importieren">
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger">Gerät Löschen</button>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                    </div>
                </div>
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

