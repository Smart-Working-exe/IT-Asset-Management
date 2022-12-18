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
                    <form action="/einstellungen" method="post">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Softwarelizenzen</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            Aktuell werden Benachrichtigungen ab {{ $setting }} Tag(e) vor Ablauf der Softwarelizenz generiert.
                            Ab wann soll das System Benachrichtigungen anzeigen: <br><br>
                            <div>
                                <label>
                                    <input type="radio" name="neue_einstellung"
                                           value="7"> 1 Woche vor Ablauf der Softwarelizenz</label> <br>
                                <label>
                                    <input type="radio" name="neue_einstellung"
                                           value="14"> 2 Wochen vor Ablauf der Softwarelizenz</label><br>
                                <label>
                                    <input type="radio" name="neue_einstellung"
                                           value="30"> 1 Monat vor Ablauf der Softwarelizenz</label><br>
                                <label>
                                    <input type="radio" name="neue_einstellung"
                                           value="Sonstiges"> Sonstiges </label><br>
                            </div>

                            <div class="Sonstiges selectt">
                                <label>
                                    <input style="height: 18px;width: 50px;" type="number" min=0 max=60 name="neue_einstellung_s">
                                    Tage vor Ablauf der Softwarelizenz (Es werden Werte zwischen 0 und 60 akzeptiert)</label><br>
                            </div>


                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="submit" value="Speichern" class="btn btn-primary" data-bs-dismiss="modal">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





        <div class="modal" id="ip-adressraeume_benarichtigungen">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/einstellungen" method="post">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">IP-Adressräume</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            Aktuell werden Benachrichtigungen ab {{ $setting_ip }} freien IP-Adressen im Raum Benachrichtigungen generiert.
                            Ab wann soll das System Benachrichtigungen anzeigen:
                            <br> <br>
                            <div>
                                <label>
                                    <input type="radio" name="neue_einstellung_ip"
                                           value="5"> 5 freie Adressen
                                </label> <br>
                                <label>
                                    <input type="radio" name="neue_einstellung_ip"
                                           value="8"> 8 freie Adressen</label><br>
                                <label>
                                    <input type="radio" name="neue_einstellung_ip"
                                           value="10"> 10 freie Adressen</label><br>
                                <label>
                                    <input type="radio" name="neue_einstellung_ip"
                                           value="Sonstiges2"> Sonstiges </label><br>
                            </div>
                            <div class="Sonstiges2 selectt">
                                <label>
                                    <input style="height: 18px;width: 50px;" type="number"  min=0 max = 20 name="neue_einstellung_ip_s">
                                    freie Adressen (Es werden Werte zwischen 0 und 20 akzeptiert)</label><br>
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="submit" value="Speichern" class="btn btn-primary" data-bs-dismiss="modal">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




            <div class="modal" id="ausleihfrist_benarichtigungen">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="/einstellungen" method="post">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Ausleihfrist</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                Aktuell werden Benachrichtigungen ab {{ $setting }} Tag(e) vor Ablauf der Ausleihfrist generiert.
                                Ab wann soll das System Benachrichtigungen anzeigen: <br> <br>
                                <div>
                                    <label>
                                        <input type="radio" name="neue_einstellung"
                                               value="3"> 3 Tage vor Ablauf der Ausleihfrist
                                    </label>
                                    <label>
                                        <input type="radio" name="neue_einstellung"
                                               value="7"> 1 Woche vor Ablauf der Ausleihfrist</label><br>
                                    <label>
                                        <input type="radio" name="neue_einstellung"
                                               value="14"> 2 Wochen vor Ablauf der Ausleihfrist</label><br>
                                    <label>
                                        <input type="radio" name="neue_einstellung"
                                               value="Sonstiges"> Sonstiges </label><br>
                                </div>

                                <div class="Sonstiges selectt">
                                    <label>
                                        <input style="height: 18px;width: 50px;" type="number" min=0 max=60 name="neue_einstellung_s"
                                               value=""> Tage vor Ablauf der Ausleihfrist (Es werden Werte zwischen 0 und 60 akzeptiert)</label><br>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <input type="submit" value="Speichern" class="btn btn-primary" data-bs-dismiss="modal">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>





    @endsection
