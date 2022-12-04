
@section('geraetefilter')

    <form  method="post" >
        <div class="row">

            <div class="input-group mt-2 col-3" style="width: 20%; height: 2vh;">
                <input type="search" class="form-control rounded" placeholder="Suche" aria-label="Search"
                       aria-describedby="search-addon" name="suche" id="suche"/>
            </div>

            <div class="col mt-2">

                <select class="form-select" name="Typ" id="Typ">
                    <option value="" selected>Typ</option>
                    <option value="PC">PC</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Monitor">Monitor</option>
                    <option value="Maus">Maus</option>
                    <option value="Tastatur">Tastatur</option>
                    <option value="Praktikumsmaterial">Praktikumsmaterial</option>
                    <option value="Sontiges">Sonstiges</option>
                </select>

            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Hersteller" aria-label="Search"
                       name="hersteller" id="hersteller">
            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Alter" aria-label="Search"
                       name="age" id="age">
            </div>

            <div class="col mt-2">
                <select class="form-select" name="betriebssystem" id="betriebssystem">
                    <option value="" selected>Betriebssystem</option>
                    @foreach($filter_variable_data['betriessystem'] as $key => $data)
                        <option value="{{$key}}">{{$data}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col mt-2">
                <select class="form-select" name="software" id="software">
                    <option value="" selected>Software</option>
                    @foreach($filter_variable_data['softwarelizenzen'] as $key => $data)
                        <option value="{{$key}}">{{$data}}</option>
                    @endforeach
                </select>
            </div>

            <!--zeigt das Element nicht an wenn database false ist keine Ahnung wieso  -->
            <div class=" mt-2 col-3" style="width: 10%; height: 2vh; @if($database_filter) display:none@endif">
                <input type="search" class="form-control rounded" placeholder="Raum" aria-label="Search"
                       aria-describedby="search-addon" name="raumnummer" id="raumnummer"/>
            </div>
            @endif


            <div class="col mt-1">
                <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
            </div>

        </div>
    </form>

    {{print_r($test)}}


@endsection
