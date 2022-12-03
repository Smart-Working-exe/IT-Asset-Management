
@section('geraetefilter')

    <form action="#" method="get">
        <div class="row">

            <div class="input-group mt-2 col-3" style="width: 20%; height: 2vh;">
                <input type="search" class="form-control rounded" placeholder="Suche" aria-label="Search"
                       aria-describedby="search-addon" name="search" id="search"/>
            </div>

            <div class="col mt-2">

                <select class="form-select" name="typ" id="typ">
                    <option value="none" selected>Typ</option>
                    <option value="pC">PC</option>
                    <option value="laptop">Laptop</option>
                    <option value="sontiges">Sonstiges</option>
                </select>

            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Hersteller" aria-label="Search"
                       name="hersteller" id="hersteller">
            </div>

            <div class="col mt-2">
                <input type="search" class="form-control rounded" placeholder="Alter" aria-label="Search"
                       name="alter" id="alter">
            </div>

            <div class="col mt-2">
                <select class="form-select" name="betriebssystem" id="betriebssystem">
                    <option value="none" selected>Betriebssystem</option>
                    <option value="windows">Windows</option>
                    <option value="mac">Mac</option>
                    <option value="linux">Linux</option>
                </select>
            </div>

            <div class="col mt-2">
                <select class="form-select" name="software" id="software">
                    <option value="none" selected>Software</option>
                    <option value="msoffice">MSOffice</option>
                    <option value="visualstudio">Visual Studio</option>
                    <option value="microchipstudio">Microchip Studio</option>
                </select>
            </div>

            <div class="col mt-1">
                <button type="submit" class="btn btn-primary sub"><img src="/img/search_icon.svg" width="30px"></button>
            </div>

        </div>
    </form>




@endsection