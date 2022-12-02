@extends('Raumauswahl.raumauswahl_layout')
@extends('header_footer')



@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                Gebäude A
            </a>
        </div>
        <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
            <div class="card-body">
                <a href="/raumansicht?raum=a001"> Raum A001</a>
                <a href="/raumansicht?raum=a002"> Raum A002</a>
                <a href="/raumansicht?raum=a003"> Raum A003</a>
                <a href="/raumansicht?raum=a004"> Raum A004</a>
                <a href="/raumansicht?raum=a101"> Raum A101</a>
                <a href="/raumansicht?raum=a102"> Raum A102</a>
                <a href="/raumansicht?raum=a103"> Raum A103</a>
                <a href="/raumansicht?raum=a104"> Raum A104</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                Gebäude B
            </a>
        </div>
        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                Lorem ipsum..
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                Gebäude C
            </a>
        </div>
        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                Lorem ipsum..
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseFour">
                Gebäude D
            </a>
        </div>
        <div id="collapseFour" class="collapse show" data-bs-parent="#accordion">
            <div class="card-body">
                Lorem ipsum..
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFive">
                Gebäude E
            </a>
        </div>
        <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                Lorem ipsum..
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse6">
                Gebäude F
            </a>
        </div>
        <div id="collapse6" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                Lorem ipsum..
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapse7">
                Gebäude G
            </a>
        </div>
        <div id="collapse7" class="collapse show" data-bs-parent="#accordion">
            <div class="card-body">
                Lorem ipsum..
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse8">
                Gebäude H
            </a>
        </div>
        <div id="collapse8" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                Lorem ipsum..
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse9">
                Gebäude W
            </a>
        </div>
        <div id="collapse9" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                Lorem ipsum..
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse10">
                Home-Office
            </a>
        </div>
        <div id="collapse10" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                Lorem ipsum..
            </div>
        </div>
    </div>



@endsection
