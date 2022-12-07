

@section('addUser')
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUser" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <form action="add_user" method="post">
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
                                    <select class="form-select" aria-label="Default select example" id="userRole" @if(isset($_POST['userRole'])) {{'value="' . $_POST['userRole'] . '"'}} @endif>
                                        <option selected disabled>Rolle*</option>
                                        <option value="0" id="userRole">Administrator</option>
                                        <option value="1" id="userRole">Mitarbeiter</option>
                                        <option value="2" id="userRole">Student</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input class="form-control" type="text" id="userFirstName" placeholder="Vorname*"  @if(isset($_POST['userFirstName'])) {{'value="' . $_POST['userFirstName'] . '"'}} @endif></div>
                                <div class="col">
                                    <input class="form-control" type="text" id="userLastName" placeholder="Name*" @if(isset($_POST['userLastName'])) {{'value="' . $_POST['userLastName'] . '"'}} @endif></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input class="form-control" type="text" id="userFH_Name" placeholder="Benutzerkennung*" @if(isset($_POST['userFH_Name'])) {{'value="' . $_POST['userFH_Name'] . '"'}} @endif>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input class="form-control" type="password" id="userPass" placeholder="Passwort*" @if(isset($_POST['userPass'])) {{'value="' . $_POST['userPass'] . '"'}} @endif>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <p>mit * makierte Felder sind Pflichtfelder</p>
                        <button type="submti" class="btn btn-primary" data-bs-dismiss="modal" id="addUserSubmit">Speichern</button>
                        <button type="cancle" class="btn btn-danger" data-bs-dismiss="modal" id="cancleUserSubmit">Abbrechen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('editUser')
    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Benutzer bearbeiten</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="row mt-3">
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" id="role">
                                    <option disabled>Rolle*</option>
                                    <option value="1" id="deviceTyp">Administrator</option>
                                    <option value="2" id="deviceTyp" selected>Mitarbeiter</option>
                                    <option value="3" id="deviceTyp">Student</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Vorname*"
                                       value="Max">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Name*"
                                       value="Musterstudent"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input class="form-control" type="text" id="deviceName" placeholder="Benutzerkennung*"
                                       value="mm8536m">
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger">Benutzer Löschen</button>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
