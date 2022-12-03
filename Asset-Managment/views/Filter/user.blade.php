

@section('userfilter')
    <form action="#" method="get">
        <div class="row" style="padding-right: 50%">

            <div class="input-group mt-2 col-3" style="width: 50%; height: 2vh;">
                <input type="search" class="form-control rounded" placeholder="Suche" aria-label="Search"
                       aria-describedby="search-addon" name="search" id="search"/>
            </div>

            <div class="col mt-2" >

            <select class="form-select" name="rolle" id="rolle">
                <option value="none" selected>Rolle</option>
                <option value="admin">Admin</option>
                <option value="mitarbeiter">Mitarbeiter</option>
                <option value="student">Student</option>
            </select>

            </div>

                <div class="col mt-1">
                    <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
                </div>

        </div>

    </form>




@endsection