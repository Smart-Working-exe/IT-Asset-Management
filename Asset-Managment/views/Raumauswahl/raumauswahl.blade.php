@extends('Raumauswahl.raumauswahl_layout')
@extends('header_footer')


@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                Gebäude A
            </a>
        </div>
        <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                @foreach($raume as $raum)
                    @if($raum['gebaude'] == 'a' || $raum['gebaude'] == 'A')
                        <a href={{'/raumansicht?raum=' . $raum['raumnummer']}}  > {{$raum['raumnummer']}}</a>
                    @else
                        @break
                    @endif
                @endforeach
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
                @foreach($raume as $raum)
                    @if($raum['gebaude'] == 'b' || $raum['gebaude'] == 'B')
                        <a href={{'/raumansicht?raum=' . $raum['raumnummer']}}  > {{$raum['raumnummer']}}</a>
                    @else
                        @break
                    @endif
                @endforeach
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
                @foreach($raume as $raum)
                    @if($raum['gebaude'] == 'c' || $raum['gebaude'] == 'C')
                        <a href={{'/raumansicht?raum=' . $raum['raumnummer']}}  > {{$raum['raumnummer']}}</a>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseFour">
                Gebäude D
            </a>
        </div>
        <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                @foreach($raume as $raum)
                    @if($raum['gebaude'] == 'd' || $raum['gebaude'] == 'D')
                        <a href={{'/raumansicht?raum=' . $raum['raumnummer']}}  > {{$raum['raumnummer']}}</a>
                    @else
                        @break
                    @endif
                @endforeach
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
                @foreach($raume as $raum)
                    @if($raum['gebaude'] == 'e' || $raum['gebaude'] == 'E')
                        <a href={{'/raumansicht?raum=' . $raum['raumnummer']}}  > {{$raum['raumnummer']}}</a>
                    @else
                        @break
                    @endif
                @endforeach
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
                @foreach($raume as $raum)
                    @if($raum['gebaude'] == 'f' || $raum['gebaude'] == 'F')
                        <a href={{'/raumansicht?raum=' . $raum['raumnummer']}}  > {{$raum['raumnummer']}}</a>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapse7">
                Gebäude G
            </a>
        </div>
        <div id="collapse7" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                @foreach($raume as $raum)
                    @if($raum['gebaude'] == 'g' || $raum['gebaude'] == 'G')
                        <a href={{'/raumansicht?raum=' . $raum['raumnummer']}}  > {{$raum['raumnummer']}}</a>
                    @else
                        @break
                    @endif
                @endforeach
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
                @foreach($raume as $raum)
                    @if($raum['gebaude'] == 'h' || $raum['gebaude'] == 'H')
                        <a href={{'/raumansicht?raum=' . $raum['raumnummer']}}  > {{$raum['raumnummer']}}</a>
                    @else
                        @break
                    @endif
                @endforeach
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
                @foreach($raume as $raum)
                    @if($raum['gebaude'] == 'w' || $raum['gebaude'] == 'W')
                        <a href={{'/raumansicht?raum=' . $raum['raumnummer']}}  > {{$raum['raumnummer']}}</a>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse10">
                Lager
            </a>
        </div>
        <div id="collapse10" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                @foreach($raume as $raum)
                    @if($raum['gebaude'] == 'lager' || $raum['gebaude'] == 'Lager')
                        <a href={{'/raumansicht?raum=' . $raum['raumnummer']}}  > {{$raum['raumnummer']}}</a>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>



@endsection
