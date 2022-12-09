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

        @foreach($data as $person)

            <tr>
                  <td>{{$person['nachname']}}</td>
                  <td>{{$person['vorname']}}</td>
                  <td>{{$person['rolle']}}</td>
                  <td>{{$person['fh_kuerzel']}}</td>

                  <td>
                      <button type="submit" class="btn btn-primary sub" data-bs-toggle="modal"
                              data-bs-target="#editUser">Benutzer bearbeiten
                      </button>
                  </td>
            </tr>

        @endforeach

        </tbody>
    </table>


@endsection
