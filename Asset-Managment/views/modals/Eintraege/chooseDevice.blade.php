@section('chooseDevice')
    <div class="modal fade" id="chooseDevice" tabindex="-1" aria-labelledby="chooseDevice" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <form action="@if($nicht_eigeneGeraete ?? false)/chooseDevice?raum={{$room}} @else/chooseDevice @endif " method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Gerät Hinzufügen</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="row mt-3">
                                <div class="col">
                                    <select class="form-select" aria-label="Default select example" id="user_add_rolle" name="selected_device" required>
                                        @foreach($dev as $devices)

                                                <option value="{{$devices['id']}}" id="DeviceID">{{$devices['name']}}</option>
                                                 @if($devices['personen_id'] == null && $devices['ausleihbar']== 0)
                                                        <option value="{{$devices['id']}}" id="DeviceID">{{$devices['name']}}</option>
                                                 @endif

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="choose_device_submit">Speichern</button>
                        <button type="cancle" class="btn btn-danger" data-bs-dismiss="modal" id="choose_device_cancel">Abbrechen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



