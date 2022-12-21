@extends('Systemlogs.systemlogs_layout')
@extends('header_footer')


@section('content')

    <form method="post">
        <div class="row">

            <div class="input-group mt-2 col-3" style="width: 20%; height: 2vh;">
                <input type="search" class="form-control rounded" placeholder="Suche" aria-label="Search"
                       aria-describedby="search-addon" name="filter_suche" id="filter_suche" @if(!empty($selected_filter['suche'] )) value="{{$selected_filter['suche']}}" @endif />
            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Datum" aria-label="Search"
                       name="filter_datum" id="filter_datum" @if(!empty($selected_filter['datum'] )) value="{{$selected_filter['datum']}} " @endif >
            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Benutzer" aria-label="Search"
                       name="filter_benutzer" id="filter_benutzer" @if(!empty($selected_filter['benutzer'])) value="{{$selected_filter['benutzer']}}" @endif>
            </div>

            <div class="col mt-2">
                <select class="form-select" name="filter_aktion" id="filter_aktion">
                    @if(!empty($selected_filter['aktion']))
                        <option value="">Aktion</option>
                        <option value="1" @if($selected_filter['aktion'] == 1) selected @endif >Anmeldung</option>
                        <option value="2" @if($selected_filter['aktion'] == 2) selected @endif >Abmeldung</option>
                        <option value="3" @if($selected_filter['aktion'] == 3) selected @endif >Ausleihe</option>
                        <option value="4" @if($selected_filter['aktion'] == 4) selected @endif >Gerät bearbeiten</option>
                        <option value="5" @if($selected_filter['aktion'] == 5) selected @endif >Gerät kommentieren</option>
                        <option value="6" @if($selected_filter['aktion'] == 6) selected @endif >Gerät hinzufügen</option>
                        <option value="7" @if($selected_filter['aktion'] == 7) selected @endif >Gerät gelöscht</option>
                        <option value="8" @if($selected_filter['aktion'] == 8) selected @endif >Person bearbeitet</option>
                        <option value="9" @if($selected_filter['aktion'] == 9) selected @endif >Person hinzugefügt</option>
                        <option value="10" @if($selected_filter['aktion'] == 10) selected @endif> Person gelöscht</option>
                        <option value="11" @if($selected_filter['aktion'] == 11) selected @endif> Softwarelizenz bearbeiten</option>
                        <option value="12" @if($selected_filter['aktion'] == 12) selected @endif> Softwarelizenz hinzugefügt</option>
                        <option value="13" @if($selected_filter['aktion'] == 13) selected @endif> Softwarelizenz gelöscht</option>
                        <option value="13" @if($selected_filter['aktion'] == 14) selected @endif> Raumbelegung geändert</option>

                    @else
                        <option value="" selected>Aktion</option>
                        <option value="1" >Anmeldung</option>
                        <option value="2" >Abmeldung</option>
                        <option value="3" >Ausleihe</option>
                        <option value="4" >Gerät bearbeiten</option>
                        <option value="5" >Gerät kommentieren</option>
                        <option value="6" >Gerät hinzufügen</option>
                        <option value="7" >Gerät gelöscht</option>
                        <option value="8" >Person bearbeitet</option>
                        <option value="9" >Person hinzugefügt</option>
                        <option value="10"> Person gelöscht</option>
                        <option value="11"> Softwarelizenz bearbeiten</option>
                        <option value="12"> Softwarelizenz hinzugefügt</option>
                        <option value="13"> Softwarelizenz gelöscht</option>
                        <option value="14"> Raumbelegung geändert</option>

                    @endif

                </select>


            </div>

            <div class="mt-1" style="width: 80px">
                <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
            </div>
                <div class="col mt-2">
                    @if(!empty($selected_filter))
                    <a href="" class="btn  btn-primary sub  text-nowrap" role="button" aria-disabled="true">Filter Zurücksetzten</a>
                    @endif
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
         @foreach($data as $value)
             <tr>
                 <td>{{$value['datum']}}</td>
                 <td>{{$value['benutzer']}}</td>
                 <td>{{$value['aktion']}}</td>
                 <td class="no_nowrap">{{$value['beschreibung']}}</td>
             </tr>
         @endforeach

            </tbody>
        </table>

@endsection