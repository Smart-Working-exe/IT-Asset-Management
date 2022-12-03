@extends('Einstellungen.layout_einstellungen')
@extends('header_footer')

@section('buttons')

    <div class="row mt-4 ">
        <p class="display-6 col-3"> Benachrichtigungseinstellungen</p>

    @if($user == 1)<!-- admin -->


            <div class="form-group">
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#softwarlizenzen_benarichtigungen">
                    Softwarelizenzen
                </button>
            </div>
            <div><br></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#ip-adressraeume_benarichtigungen">
                    IP-Adressräume
                </button>
            </div>

    @elseif($user == 2)<!-- mitarbeiter -->

                <div class="form-group">
                    <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#softwarlizenzen_benarichtigungen">
                        Softwarelizenzen
                    </button>
                </div>


    @else<!-- student -->

        <div class="form-group">
            <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal" data-bs-target="#ausleihfrist_benarichtigungen">
                Ausleihfrist
            </button>

    @endif

            <div><br></div>


            <!-- Hier spaeter href aendern aktuell nur auf admin -->
            <a href="/dashboard_admin">
                <button type="submit" class="btn btn-primary sub">Zurück zum Dashboard</button>
            </a>
        </div>



@endsection

    @section('modals')
        <div class="modal" id="softwarlizenzen_benarichtigungen">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Softwarelizenzen</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        Das Frühwarnsystem schlägt momentan 1 Monat vor Ablauf der Softwarelizenz aus. <br>
                        Der neue Zeitraum für das Frühwarnsystem beträgt: <br> <br>
                        <div>
                            <label>
                                <input type="radio" name="Warnsystem_Softwarelizenz"
                                       value="1 Woche"> 1 Woche vor Ablauf der Softwarelizenz
                            </label> <br>
                            <label>
                                <input type="radio" name="Warnsystem_Softwarelizenz"
                                       value="2 Wochen"> 2 Wochen vor Ablauf der Softwarelizenz</label><br>
                            <label>
                                <input type="radio" name="Warnsystem_Softwarelizenz"
                                       value="1 Monat"> 1 Monat vor Ablauf der Softwarelizenz</label><br>
                            <label>
                                <input type="radio" name="Warnsystem_Softwarelizenz"
                                       value="Sonstiges"> Sonstiges </label><br>
                        </div>

                        <div class="Sonstiges selectt">
                            <label>
                                <input style="height: 18px;width: 50px;" type="input" name="Warnsystem_Softwarelizenz"
                                       value=""> Tage vor Ablauf der Softwarelizenz </label><br>
                        </div>


                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                    </div>
                </div>
            </div>
        </div>





        <div class="modal" id="ip-adressraeume_benarichtigungen">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">IP-Adressräume</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        Das Frühwarnsystem warnt momentan, wenn der Adressbereich 50 freie Adressen unterschreitet. <br>
                        Der neue Grenze für das Frühwarnsystem beträgt:
                        <br> <br>
                        <div>
                            <label>
                                <input type="radio" name="Warnsystem_IP-Adressraum"
                                       value="10 Adresseen"> 10 freie Adressen
                            </label> <br>
                            <label>
                                <input type="radio" name="Warnsystem_IP-Adressraum"
                                       value="20 Adresseen"> 20 freie Adressen</label><br>
                            <label>
                                <input type="radio" name="Warnsystem_IP-Adressraum"
                                       value="30 Adresseen"> 50 freie Adressen</label><br>
                            <label>
                                <input type="radio" name="Warnsystem_IP-Adressraum"
                                       value="Sonstiges2"> Sonstiges </label><br>
                        </div>
                        <div class="Sonstiges2 selectt">
                            <label>
                                <input style="height: 18px;width: 50px;" type="input" name="Warnsystem_Softwarelizenz"
                                       value=""> freie Adressen </label><br>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                    </div>
                </div>
            </div>
        </div>




            <div class="modal" id="ausleihfrist_benarichtigungen">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Ausleihfrist</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            Das Frühwarnsystem schlägt momentan 1 Woche vor Ablauf der Ausleihfrist aus. <br>
                            Der neue Zeitraum für das Frühwarnsystem beträgt: <br> <br>
                            <div>
                                <label>
                                    <input type="radio" name="Warnsystem_Ausleihfrist"
                                           value="3"> 3 Tage vor Ablauf der Ausleihfrist
                                </label>
                                <label>
                                    <input type="radio" name="Warnsystem_Ausleihfrist"
                                           value="7"> 1 Woche vor Ablauf der Ausleihfrist</label><br>
                                <label>
                                    <input type="radio" name="Warnsystem_Ausleihfrist"
                                           value="14"> 2 Wochen vor Ablauf der Ausleihfrist</label><br>
                                <label>
                                    <input type="radio" name="Warnsystem_Ausleihfrist"
                                           value="Sonstiges"> Sonstiges </label><br>
                            </div>

                            <div class="Sonstiges selectt">
                                <label>
                                    <input style="height: 18px;width: 50px;" type="input" name="Warnsystem_Ausleihfrist"
                                           value=""> Tage vor Ablauf der Ausleihfrist </label><br>
                            </div>

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