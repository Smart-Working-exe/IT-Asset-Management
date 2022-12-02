@extends('Systemlogs.systemlogs_layout')
@extends('header_footer')


@section('content')

    <form action="#" method="get">
        <div class="row">

            <div class="input-group mt-2 col-3" style="width: 20%; height: 2vh;">
                <input type="search" class="form-control rounded" placeholder="Suche" aria-label="Search"
                       aria-describedby="search-addon" name="search" id="search"/>
            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Datum" aria-label="Search"
                       name="Datum" id="Datum">
            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Benutzer" aria-label="Search"
                       name="Benutzer" id="Benutzer">
            </div>

            <div class="col mt-2">

                <select class="form-select" name="Aktion" id="Aktion">
                    <option value="none" selected>Aktion</option>
                    <option value="Abmeldung">Abmeldung</option>
                    <option value="Anmeldung">Anmeldung</option>
                    <option value="Ausleihe">Ausleihe</option>
                    <option value="Gerät bearbeiten">Gerät bearbeiten</option>
                    <option value="Gerät einfügen">Gerät einfügen</option>
                    <option value="Gerät löschen">Gerät löschen</option>
                </select>

            </div>



            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Description" aria-label="Search"
                       name="Description" id="Description">
            </div>
            <div class="col mt-1">
                <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
            </div>

        </div>
    </form>

    <div class="container mt-3">
        <table class="table table-striped table-bordered" id="log">
            <thead>
            <tr>
                <th onclick="sortTable(0, log)">Datum <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                <th onclick="sortTable(1, log)">Benutzer <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                <th onclick="sortTable(2, log)">Aktion <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>
                <th onclick="sortTable(3, log)">Beschreibung <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px"></th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>2021.12.13</td>
                <td>mm5645s</td>
                <td>Anmeldung</td>
                <td>Der Benutzer mm5645s hat sich angemeldet</td>

            </tr>

            <tr>
                <td>2013.02.14</td>
                <td>mm8536m</td>
                <td>Abmeldung</td>
                <td>Der Benutzer mm8536m hat sich abgemeldet</td>

            </tr>

            <tr>
                <td>2013.02.13</td>
                <td>ls0420</td>
                <td>Gerät löschen</td>
                <td>Der Benutzer ls0420 hat ein Gerät im Raum A112 gelöscht</td>

            </tr>

            <tr>
                <td>2022.02.12</td>
                <td>cd5679</td>
                <td>Gerät einfügen</td>
                <td>Der Benutzer cd5679 hat ein Gerät im Raum A112 eingefügt</td>

            </tr>

            <tr>
                <td>2022.07.27</td>
                <td>fy2134</td>
                <td>Ausleihe</td>
                <td>Der Benutzer fy2134 hat eine Anfrage für die Ausleihe gesendet</td>

            </tr>

            </tbody>
        </table>

@endsection