@section('addUser')
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUser" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Benutzer Hinzufügen</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="row mt-3">
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" id="role">
                                    <option selected>Rolle*</option>
                                    <option value="1" id="deviceTyp">Administrator</option>
                                    <option value="2" id="deviceTyp">Mitarbeiter</option>
                                    <option value="3" id="deviceTyp">Student</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Vorname*"></div>
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Name*"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Benutzerkennung*">
                            </div>
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
