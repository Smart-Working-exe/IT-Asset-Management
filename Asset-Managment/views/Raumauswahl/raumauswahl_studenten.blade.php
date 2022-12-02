@extends('Raumauswahl.raumauswahl_layout')
@extends('header_footer')



@section('content')
    <div class="card">
        <div class="card-header">
            <a class="collapsed btn"  href="/raumansicht?gebaeude=a">
                Gebäude A
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a class="collapsed btn"  href="/raumansicht?gebaeude=b">
                Gebäude B
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a class="collapsed btn"  href="#collapseThree">
                Gebäude C
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a class="collapsed btn"  href="#collapseFour">
                Gebäude D
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a class="collapsed btn"  href="#collapseFive">
                Gebäude E
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse6">
                Gebäude F
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapse7">
                Gebäude G
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse8">
                Gebäude H
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse9">
                Gebäude W
            </a>
        </div>
    </div>



@endsection
