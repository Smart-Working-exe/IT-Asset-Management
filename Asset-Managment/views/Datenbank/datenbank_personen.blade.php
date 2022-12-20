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
                              data-bs-target="#editUser{{$person['fh_kuerzel']}}">Benutzer bearbeiten
                      </button>
                  </td>
            </tr>

            <form action="datenbank?database=personen" method="POST">
                <input type="hidden" name="form_oldIdentifier" value="{{$person['fh_kuerzel']}}">
                <div class="modal fade" id="editUser{{$person['fh_kuerzel']}}" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
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
                                            <select class="form-select" aria-label="Default select example" name="form_role">
                                                <option disabled>Rolle*</option>
                                                @if($person['rolle'] == 'Admin')
                                                    <option value="1" id="deviceTyp" selected>Administrator</option>
                                                    <option value="2" id="deviceTyp" >Mitarbeiter</option>
                                                    <option value="3" id="deviceTyp">Student</option>
                                                @elseif($person['rolle'] == 'Mitarbeiter')
                                                    <option value="1" id="deviceTyp">Administrator</option>
                                                    <option value="2" id="deviceTyp" selected>Mitarbeiter</option>
                                                    <option value="3" id="deviceTyp">Student</option>
                                                @else
                                                    <option value="1" id="deviceTyp">Administrator</option>
                                                    <option value="2" id="deviceTyp" >Mitarbeiter</option>
                                                    <option value="3" id="deviceTyp" selected>Student</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <input class="form-control" type="text" name="form_firstName" placeholder="Vorname*"
                                                   value="{{$person['vorname']}}">
                                        </div>
                                        <div class="col">
                                            <input class="form-control" type="text" name="form_SurName"  placeholder="Name*"
                                                   value="{{$person['nachname']}}"></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <input class="form-control" type="text" name="form_personIdentifier"  placeholder="Benutzerkennung*"
                                                   value="{{$person['fh_kuerzel']}}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger">Benutzer Löschen</button>
                                <div>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="submit" value="2">Speichern</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abbrechen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        @endforeach
        </tbody>
    </table>


@endsection
