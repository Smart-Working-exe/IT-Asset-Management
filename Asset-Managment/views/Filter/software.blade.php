@section('softwarefilter')

    <form method="post">
        <div class="row" style="padding-right: 30%">

            <div class="input-group mt-2 col-3" style="width: 50%; height: 2vh;">
                <input type="search" class="form-control rounded" placeholder="Name" aria-label="Search"
                       aria-describedby="search-addon" name="filter_suche" id="filter_suche" @if(!empty($selected_filter['suche'])) value="{{$selected_filter['suche']}}" @endif "  />
            </div>

            <div class="col mt-1">
                <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
            </div>



            @if(!empty($selected_filter))
                <div class="col mt-1">
                    <a href="" class="btn  btn-primary sub  text-nowrap" role="button" aria-disabled="true">Filter Zurücksetzten</a>
                </div>
            @endif

        </div>



    </form>


@endsection
