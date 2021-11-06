
    <td></td>
    <td></td>
    <td>
        <select class="select merk-{{$gps->id}}" id="merk" name="merk" required>
            {{-- <option value=""></option> --}}

            @foreach ($merk as $item)
            <option value="{{ $item->merk_gps }}" {{ old('merk') == $item->id ? 'selected':'' }}>{{ $item->merk_gps}}</option>
            @endforeach

        </select>
    </td>

    <td>
        <select class="select type-{{$gps->id}}" id="type" name="type" required>
            {{-- <option value="{{$gps->type}}">{{$gps->type}}</option> --}}

            @foreach ($merk as $item)
            <option value="{{ $item->id }}" {{ old('type') == $item->id ? 'selected':'' }}>{{ $item->type_gps}}</option>
            @endforeach

        </select>
    </td>
    {{-- <td>
        <div class="input-div"><input type="text" class="input type-{{$gps->id}}" id="type" placeholder="Type" value="{{ $gps->type}}"></i></div>
    </td> --}}
    <td>
        <div class="input-div"><input type="text" class="input imei-{{$gps->id}}" id="imei" placeholder="IMEI" value="{{ $gps->imei}}" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input waranty-{{$gps->id}}" id="waranty" placeholder="Waranty" value="{{ $gps->waranty}}" ></i></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input po_date-{{$gps->id}}" id="po_date" placeholder="Po Date" value="{{ $gps->po_date}}" required></i></div>
    </td>
    <td>
        <select class="select status-{{$gps->id}}" id="status" name="status" aria-label=".form-select-lg example" required>
            <option class="hidden" selected>{{$gps->status}}</option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select></i>
    </td>
    <td  id="statusOwnership">
        <select class="select status_ownership-{{$gps->id}}" id="status_ownership" name="status_ownership"aria-label=".form-select-lg example">
            <option class="hidden" selected>{{$gps->status_ownership}}</option>
            {{-- <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Trial">Trial</option>
            <option value="Beli">Beli</option> --}}
        </select></i>
    </td>

    <td class="action sticky-col first-col">
        <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $gps->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>

<script>
     $('select[name="status"]').on('change', function() {
                var itemID = $(this).val();
                // alert(itemID);

                if(itemID == 'Ready') {
                    $('#statusOwnership').empty();
                   $('#statusOwnership').append(
                       `<select class="select"  disable>
                            <option value="">-</option>
                        </select>`
                       );
                }else if(itemID == 'Error'){
                    $('#statusOwnership').empty();
                        $('#statusOwnership').append(
                            `<select class="select" id="status_ownership">
                                    <option value="Lokasi Customer">Lokasi Customer</option>
                                    <option value="Lokasi Integrasia">Lokasi Integrasia</option>
                                    <option value="GPS sudah di Return">GPS sudah di Return</option>

                            </select>`
                        );


                }else {
                        $('#statusOwnership').empty();
                        $('#statusOwnership').append(
                            `<select class="select" id="status_ownership">
                                    <option value="Sewa">Sewa</option>
                                    <option value="Sewa Beli">Sewa Beli</option>
                                    <option value="Trial">Trial</option>
                                    <option value="Beli">Beli</option>
                            </select>`
                        );
                }



            });
    $('select[name="merk"]').on('change', function() {
                var itemID = $(this).val();
                // alert(itemID);
                if(itemID) {
                    $.ajax({
                        url: '/based_merksensor/'+ itemID,
                        method: "GET",
                        success:function(data) {
                            // alert(data.length);
                            $('select[name="type').empty();
                            $('select[name="type').append('<option value=""> </option>');
                                for(var i = 0 ; i < data.length ; i++) {
                                    $('select[name="type').append('<option value="'+ data[i].type_gps + '"> '+ data[i].type_gps +'</option>');
                                        // alert(data[i].serial_number)
                                }
                        }
                    });
                }
                else{
                    $('select[name="type"]').empty();

                }

            });
</script>





