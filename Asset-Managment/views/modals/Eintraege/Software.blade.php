@section('addSoftware')
    <div class="modal fade" id="addSoftware" tabindex="-1" aria-labelledby="addSoftware" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <form action="/addSoftware" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Softwarelizenz Hinzufügen</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="row">
                             <div class="row mt-3">
                                <div class="col">
                                    <input class="form-control" type="text" id="software_add_lizenzname" name="software_add_lizenzname"
                                          placeholder="Name der Lizenz*" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input class="form-control" type="text" name="software_add_hersteller"
                                           id="software_add_hersteller" placeholder="Hersteller*" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input class="form-control" type="text" name="software_add_softwareversion" id="software_add_softwareversion" placeholder="Version">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group date" id="datepickerAvailable">
                                            <input type="text" class="form-control" id="software_add_erwerbedatum" name="software_add_erwerbedatum" placeholder="Erwerbsdatum*" required>
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
                                        <div class="input-group date" id="datepickerNotAvailable">
                                            <input type="text" class="form-control"   id="software_add_ablaufdatum"
                                                   name="software_add_ablaufdatum" placeholder="Ablaufdatum*" required>
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
                                    <input class="form-control" min="0" type="number" name="software_add_anzahl_gerate" id="software_add_anzahl_gerate"
                                           placeholder="Anzahl verfügbarer Installation*" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <p>mit * makierte Felder sind Pflichtfelder</p>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                                name="software_add_submit" id="software_add_submit" value="Speichern">Speichern</button>
                        <button type="button" class="btn btn-danger" id="software_add_cancle" name="software_add_cancle" data-bs-dismiss="modal">Abbrechen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
