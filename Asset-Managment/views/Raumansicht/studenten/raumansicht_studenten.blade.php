@extends('Raumansicht.studenten.layout_raumansicht_studenten')
@extends('header_footer')



@section('content')

    <table class="table table-striped table-bordered" id="Raumansicht_studenten" >
        <thead>
        <tr>
            <th>Raum</th>
            <th>Anzahl Workstations</th>
            <th>Belegte Workstations</th>
            <th>Auslastung</th>
        </tr>
        </thead>

        @for($i = 0; $i < count($belegung); $i++)
        <tr>
            <td>{{$belegung[$i]['name']}}</td>
            <td>{{$belegung[$i]['cur']}}</td>
            <td>{{$belegung[$i]['max']}}</td>
            <td><div class=" mt-1 col-10">
                    <div class="progress position-relative">
                        <div class="progress-bar" role="progressbar"
                             style="width:{{((int)$belegung[$i]['cur']/(int)$belegung[$i]['max'])*100}}%; background-color: {{$color[$i]}};"  aria-valuenow="86.7" aria-valuemin="0"
                             aria-valuemax="100">
                            <small class="justify-content-center d-flex position-absolute w-100" style="color: black">{{$belegung[$i]['cur']}}/{{$belegung[$i]['max']}}</small>
                        </div>
                    </div>
                </div></td>

        </tr>
        @endfor
    </table>

@endsection