<tr id="add_form">


<td></td>
<td></td>

    <td>
        <select class="select" id="merk" name="merk" required>
            {{-- <option value=""></option> --}}
            @foreach ($merk as $item)
            <option value="{{ $item->merk_gps }}"  {{ old('merk') == $item->id ? 'selected':'' }}>{{ $item->merk_gps}}</option>
            @endforeach
        </select>

    </td>

    <td>
        <select class="select @error('type') is-invalid @enderror" id="type" name="type" required>

            @foreach ($merk as $item)
            <option value="{{ $item->id }}" {{ old('type') == $item->id ? 'selected':'' }}>{{ $item->type_gps}}</option>
            @endforeach

        </select>
         @error('type')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
     {{-- <td>
        <div class="input-div"><input type="text" class="input" id="merk" placeholder="Merk"></i>
    </td> --}}
    <td>
        <div class="input-div"><input type="number" class="input" id="imei" name="imei" placeholder="IMEI" value="{{old('imei')}}" required></i>

    </td>

    <td>
        <div class="input-div"><input type="date" class="input @error('waranty') is-invalid @enderror" id="waranty" placeholder="Waranty" name="waranty" value="{{old('waranty')}}"></i>
        @error('waranty')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
    <td>
        <div class="input-div"><input type="date" class="input @error('po_date') is-invalid @enderror" id="po_date" placeholder="Po Date" name="po_date" value="{{old('po_date')}}" required></i>
        @error('po_date')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
    <td>
        <select class="select @error('status') is-invalid @enderror" id="status" aria-label=".form-select-lg example" name="status" aria-placeholder="status" required>
            <option value=""></option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select></i>
        @error('status')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
    <td id="statusOwnership">
        <select class="select" id="status_ownership" name= "status_ownership"aria-label=".form-select-lg example">
            {{-- <option selected disabled value="-">Pilih Status</option> --}}
            {{-- <option value="-">-</option> --}}

            <option value="-">-</option>
            <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Trial">Trial</option>
            <option value="Beli">Beli</option>
        </select></i>
        @error('status_ownership')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
  <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    <td>




</tr>
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

                if(itemID) {
                    $.ajax({
                        url: '/based_merksensor/'+ itemID,
                        method: "GET",
                        success:function(data) {
                            // alert(data.length);
                            $('select[name="type').empty();
                            $('select[name="type').append('<option value=""> </option>');
                                for(var i = 0 ; i < data.length ; i++) {
                                    $('select[name="type').append('<option value="'+ data[i].type_gps+ '"> '+ data[i].type_gps +'</option>');
                                        // alert(data[i].serial_number)
                                }
                        }
                    });
                }else{
                    $('select[name="type"]').empty();

                }
            });
</script>



