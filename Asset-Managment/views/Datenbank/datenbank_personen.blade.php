@extends('Datenbank.datenbank_layout')
@extends('header_footer')
@extends('modals.Eintraege.User')
@extends('Filter.user')
@extends('modals.export_import')



@section('content')

    <table class="table table-striped table-bordered" id="person">
        <thead>
        <tr>
            <th onclick="sortTable(0, person)">Name <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
            </th>
            <th onclick="sortTable(1, person)">Vorname <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
            </th>
            <th onclick="sortTable(2, person)">Rolle <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
            </th>
            <th onclick="sortTable(3, person)">Kürzel <img src="/img/up-and-down-arrows-svgrepo-com.svg" width="20px">
            </th>
            <th>Bearbeiten</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>Musterstudent</td>
            <td>Max</td>
            <td>Student</td>
            <td>mm5645s</td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editUser">Benutzer bearbeiten
                </button>
            </td>
        </tr>

        <tr>
            <td>Mustermitarbeiter</td>
            <td>Martin</td>
            <td>Mitarbeiter</td>
            <td>mm8536m</td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editUser">Benutzer bearbeiten
                </button>
            </td>
        </tr>
        <tr>
            <td>Musteradmin</td>
            <td>Maurice</td>
            <td>Admin</td>
            <td>mm2109a</td>
            <td>
                <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                        data-bs-target="#editUser">Benutzer bearbeiten
                </button>
            </td>
        </tr>

        </tbody>
    </table>


@endsection
