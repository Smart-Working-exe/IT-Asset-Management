
@section('header')
    <div class="row">
        <a href="/dashboard" class="col-3"><img class="img-fluid"
                                                      src="/img/fh-aachen_university-of-applied-sciences_303_logo.png"
                                                      alt="fhlogo"></a>
        <a href="/dashboard" class="nav-link col-6"><p class="h1 text-center mt-4">IT Asset Management</p></a>
        <div class="col-3">
            <!-- <form method="get"> -->
            <a href="/logout">
                <button type="submit" class="btn btn-danger mt-4">Abmelden</button>
            </a>
            <!-- </form> -->
        </div>
    </div>

@endsection


@section('footer')
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item nav-link px-2 text-muted">Angemeldet als Benutzer {{$_SESSION['name']}}</li>
        <li class="nav-item"><a href="/dashboard" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="https://www.fh-aachen.de/impressum/" class="nav-link px-2 text-muted"
                                target="_blank">Impressum</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 SmartWorking.exe</p>

@endsection
