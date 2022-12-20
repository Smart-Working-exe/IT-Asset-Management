@section('geraetefilter')

    <form method="post">
        <div class="row">

            <div class="input-group mt-2 col-2" style="width: 20%; height: 2vh;">
                <input type="search" class="form-control rounded" placeholder="Suche" aria-label="Search"
                       aria-describedby="search-addon" name="filter_suche" id="filter_suche"
                       @if(!empty($selected_filter['suche'])) value="{{$selected_filter['suche']}}"@endif >
            </div>

            <div class="col-2 mt-2">


                <select class="form-select" name="filter_Typ" id="filter_Typ">
                    @if(empty($selected_filter['Typ']))
                        <option value="" selected>Typ</option>
                        <option value="1" >PC</option>
                        <option value="2">Laptop</option>
                        <option value="3">Monitor</option>
                        <option value="4">Tastatur</option>
                        <option value="5">Maus</option>
                        <option value="6">Praktikumsmaterial</option>
                        <option value="7">Accessoires</option>
                    @else
                        <option value="">Typ</option>
                        <option value="1" @if($selected_filter['Typ'] == 1) selected @endif>PC</option>
                        <option value="2" @if($selected_filter['Typ'] == 2) selected @endif>Laptop</option>
                        <option value="3" @if($selected_filter['Typ'] == 3) selected @endif>Monitor</option>
                        <option value="4" @if($selected_filter['Typ'] == 4) selected @endif>Tastatur</option>
                        <option value="5" @if($selected_filter['Typ'] == 5) selected @endif>Maus</option>
                        <option value="6" @if($selected_filter['Typ'] == 6) selected @endif>Praktikumsmaterial</option>
                        <option value="7" @if($selected_filter['Typ'] == 7) selected @endif>Accessoires</option>
                    @endif
                </select>

            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Hersteller" aria-label="Search"
                       name="filter_hersteller" id="filter_hersteller"
                       @if(!empty($selected_filter['hersteller'])) value="{{$selected_filter['hersteller']}}"@endif>
            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Alter in Jahren" aria-label="Search"
                       name="filter_age" id="filter_age"
                       @if(!empty($selected_filter['age'])) value="{{$selected_filter['age']}}"@endif>
            </div>

            <div class="col mt-2">
                <select class="form-select" name="filter_betriebssystem" id="filter_betriebssystem">

                    @if(empty($selected_filter['betriebssystemid']))
                        <option value="" selected>Betriebssystem</option>
                        @foreach($filter_variable_data['betriebssystem'] as $key => $data)
                            <option value="{{$key}}">{{$data}}</option>
                        @endforeach
                    @else
                        <option value="">Betriebssystem</option>
                        @foreach($filter_variable_data['betriebssystem'] as $key => $data)
                            <option value="{{$key}}"
                                    @if($selected_filter['betriebssystemid'] == $key) selected @endif>{{$data}}</option>
                        @endforeach
                    @endif


                </select>
            </div>

            <div class="col mt-2">
                <select class="form-select" name="filter_software" id="filter_software">
                    @if(empty($selected_filter['softwarelizenzid']))
                        <option value="" selected>Software</option>
                        @foreach($filter_variable_data['softwarelizenzen'] as $key => $data)
                            <option value="{{$key}}">{{$data}}</option>
                        @endforeach
                    @else
                        <option value="" selected>Software</option>
                        @foreach($filter_variable_data['softwarelizenzen'] as $key => $data)
                            <option value="{{$key}}"
                                    @if($selected_filter['softwarelizenzid'] == $key) selected @endif>{{$data}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <!--zeigt das Element nicht an, wenn database false ist keine Ahnung wieso  -->
            <div class=" mt-2 col-3" style="width: 10%; height: 2vh; @if($database_filter) display:none@endif">
                <input type="search" class="form-control rounded" placeholder="Raum" aria-label="Search"
                       aria-describedby="search-addon" name="raum" id="raum"
                       @if(!empty($selected_filter['raum'])) value="{{$selected_filter['raum']}}"@endif />
            </div>
            @endif


            <div class="col-1 mt-1" style="margin-right: 0">
                <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>

            </div>
        </div>
    </form>
@endsection
