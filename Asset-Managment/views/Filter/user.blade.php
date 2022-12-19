@section('userfilter')
    <form method="post">
        <div class="row" style="padding-right: 50%">

            <div class="input-group mt-2 col-3" style="width: 50%; height: 2vh;">
                <input type="search" class="form-control rounded" placeholder="Suche" aria-label="Search"
                       aria-describedby="search-addon" name="filter_suche" id="filter_suche" @if(!empty($selected_filter['suche'])) value="{{$selected_filter['suche']}}" @endif/>
            </div>

            <div class="col-3 mt-2" >

            <select class="form-select" name="filter_rolle" id="filter_rolle">


                @if(empty($selected_filter['rolle']))
                <option value="" selected>Rolle</option>
                <option value="1">Admin</option>
                <option value="2">Mitarbeiter</option>
                <option value="3">Student</option>
                @else
                    <option value="" >Rolle</option>
                    <option value="1" @if($selected_filter['rolle'] == 1) selected @endif >Admin</option>
                    <option value="2" @if($selected_filter['rolle'] == 2) selected @endif >Mitarbeiter</option>
                    <option value="3" @if($selected_filter['rolle'] == 3) selected @endif >Student</option>
                @endif

            </select>

            </div>

                <div class="col mt-1">
                    <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
                </div>

            @if(!empty($selected_filter))
                <div class="col-1 mt-1">
                <a href="" class="btn  btn-primary sub  text-nowrap" role="button" aria-disabled="true">Filter Zurücksetzten</a>
                </div>
            @endif

        </div>

    </form>
@endsection
