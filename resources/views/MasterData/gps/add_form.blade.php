<tr>
    <td></td>
    <td></td>
    <td>
        <select class="select" id="merk" name="merk" required>
           <option style="display: none"></option>
            @foreach ($merk as $item)
                <option value="{{ $item->merk_gps }}"  {{ old('merk') == $item->id ? 'selected':'' }}>{{ $item->merk_gps}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="type" name="type" required></select>
    </td>
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
            <option style="display: none"></option>
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

        if(itemID == 'Ready') {
            $('#statusOwnership').empty();
            $('#statusOwnership').append(
                `<select class="select" id="status_ownership"  disable>
                    <option value="-">-</option>
                </select>`
            );
        }else if(itemID == 'Error') {
            $('#statusOwnership').empty();
            $('#statusOwnership').append(
                `<select class="select" id="status_ownership">
                    <option style="display: none"></option>
                    <option value="Lokasi Customer">Lokasi Customer</option>
                    <option value="Lokasi Integrasia">Lokasi Integrasia</option>
                    <option value="GPS sudah di Return">GPS sudah di Return</option>
                </select>`
            );
        }else {
            $('#statusOwnership').empty();
            $('#statusOwnership').append(
                `<select class="select" id="status_ownership">
                    <option style="display: none"></option>
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
                    $('select[name="type').empty();
                    $('select[name="type').append('<option style="display: none"></option>');
                    for(var i = 0 ; i < data.length ; i++) {
                        $('select[name="type').append('<option value="'+ data[i].type_gps+ '"> '+ data[i].type_gps +'</option>');
                    }
                }                    
            });
        }
        else{
            $('select[name="type"]').empty();
        }
    });


</script>


 
    
    