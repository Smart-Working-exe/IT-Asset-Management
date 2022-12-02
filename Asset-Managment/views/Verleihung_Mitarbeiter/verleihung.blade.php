@extends('Verleihung_Mitarbeiter.layout_verleihung')
@extends('header_footer')



@section('content')
    <div class=" row mt-5 justify-content-between">
        <div class="btn-group-vertical col-6 mt-3 tbodyDiv">

            <h3> Ausleihen </h3>
            <table class="table table-bordered table-striped" id="Anfrage">
                <thead class="sticky-top bg-white">
                <tr>
                    <th>Anfragender</th>
                    <th>Geräte</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>ok7698s</td>
                    <td>Praktikumsboard ARBKVS</td>
                    <td>
                        <button type="submit" class="btn btn-primary sub">Annehmen</button>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-danger">Ablehnen</button>
                    </td>
                </tr>
                <tr>
                    <td>Ackerman Levi</td>
                    <td>TI-Board</td>
                    <td>
                        <button type="submit" class="btn btn-primary sub">Annehmen</button>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-danger">Ablehnen</button>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td>

                    </td>
                    <td></td>
                </tr><tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td>

                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td>

                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td>

                    </td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="btn-group-vertical col-6 mt-3 tbodyDiv">
            <h3>Verlängern</h3>
            <table class="table table-bordered table-striped" id="Anfrage">
                <thead class="sticky-top bg-white">
                <tr>
                    <th>Anfragender</th>
                    <th>Geräte</th>
                    <th>Ausgeliehen am</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>mm5475s</td>
                    <td>Praktikumsboard ARBKVS</td>
                    <td type="date">25.08.2022</td>
                    <td>

                        <button type="submit" class="btn btn-primary sub">4 Wochen Verlängern</button>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-danger">Ablehnen</button>
                    </td>
                </tr>
                <tr>
                    <td>ku2243s</td>
                    <td>Praktikumsboard ARBKVS</td>
                    <td type="date">17.11.2022</td>
                    <td>
                        <button type="submit" class="btn btn-primary sub">4 Wochen Verlängern</button>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-danger">Ablehnen</button>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr><tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="btn-group-vertical col-6 mt-3 tbodyDiv">
            <h3>Rückgabe</h3>
            <table class="table table-bordered table-striped" id="Anfrage">
                <thead class="sticky-top bg-white">
                <tr>
                    <th>Anfragender</th>
                    <th>Geräte</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>mm5475s</td>
                    <td>Praktikumsboard ARBKVS</td>
                    <td>
                        <button type="submit" class="btn btn-primary sub">Gerät ohne Probleme</button>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-danger">Gerät beschädigt</button>
                    </td>
                </tr>
                <tr>
                    <td>ku2243s</td>
                    <td>Praktikumsboard ARBKVS</td>
                    <td>
                        <button type="submit" class="btn btn-primary sub">Gerät ohne Probleme</button>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-danger">Gerät beschädigt</button>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr><tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection