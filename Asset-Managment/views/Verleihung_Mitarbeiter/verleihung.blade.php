@extends('Verleihung_Mitarbeiter.layout_verleihung')
@extends('header_footer')


@section('content')
    <div class=" sometimes_row mt-5 justify-content-between">
        <div class="btn-group-vertical col-6 mt-3 tbodyDiv ">

            <h3> Ausleihe </h3>
            <table class="table table-bordered table-striped ausleih_tabel" id="Anfrage">
                <thead class="sticky-top bg-white">
                <tr>
                    <th>Student*in</th>
                    <th>Gerat</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($anfragen as $anfrage)
                    @if($anfrage['art'] == 0)
                        <tr>
                            <td>{{$anfrage['student']}}</td>
                            <td>{{$anfrage['geraet']}}</td>
                            <td>
                                <form action="/verleihung" method="post">
                                    <button type="submit" class="btn btn-primary sub" name="accept_loan" value={{$anfrage['id']}}  >Annehmen</button>
                                </form>
                            </td>
                            <td>
                                <form action="/verleihung" method="post">
                                    <button type="submit" class="btn btn-danger" name="reject" value={{$anfrage['id']}}  >Ablehnen</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <div class="btn-group-vertical col-6 mt-3 tbodyDiv">
            <h3>Rückgabe</h3>
            <table class="table table-bordered table-striped ausleih_tabel" id="Anfrage">
                <thead class="sticky-top bg-white">
                <tr>
                    <th>Student*in</th>
                    <th>Gerat</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($anfragen as $anfrage)
                    @if($anfrage['art'] == 1)
                    <tr>
                        <td>{{$anfrage['student']}}</td>
                        <td>{{$anfrage['geraet']}}</td>
                        <td>
                            <form action="/verleihung" method="post">
                                <button type="submit" class="btn btn-primary sub"  name="accept_return" value={{$anfrage['id']}}  >Annehmen</button>
                            </form>
                        </td>
                        <td>
                            <form action="/verleihung" method="post">
                                <button type="submit" class="btn btn-danger" name="reject" value={{$anfrage['id']}}  >Ablehnen</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection