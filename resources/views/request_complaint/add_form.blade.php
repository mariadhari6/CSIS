<tr id="add_form">

    <td></td>
    <td></td>
    <td>
        <select class="select" id="company_id" name="company_id" required>
            <option selected disabled></option>

            @foreach ($pic as $item )
            <option value="{{ $item->company_id }}">{{ $item->company->company_name ?? '' }}</option>

            @endforeach
        </select></i>
    </td>
    <td>
        <select class="select" id="internal_eksternal" name="internal_eksternal" aria-label=".form-select-lg example">
            <option selected></option>
            <option value="Request Internal">Request Internal </option>
            <option value="Complain Internal ">Complain Internal </option>
            <option value="Request Eksternal ">Request Eksternal </option>
            <option value="Complain Eksternal ">Complain Eksternal</option>
        </select></i>
    </td>
    <td>
        <select class="select" id="pic" name="pic" required>
            <option selected disabled>-</option>
            @foreach ($pic as $item)
                <option value="{{ $item->id }}" {{ old('pic_id') == $item->id ? 'selected':'' }}>{{ $item->pic_name }}</option>
            @endforeach
        </select></i>
    </td>
    <td>
        <select class="select" id="vehicle" name="vehicle">
            <option selected disabled value=""></option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('vehicle') == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>

            @endforeach
         </select>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_info" placeholder="Waktu Info"></div>
    </td>
    <td>
        <textarea class="form-control" id="task" name="task" ></textarea>
    </td>
    <td>
        <select class="select" id="platform" id="platform" aria-label=".form-select-lg example" required>
            <option selected></option>
            <option value="WA">WA</option>
            <option value="SMS">SMS</option>
            <option value="E-mail">E-mail</option>
            <option value="Telepon">Telepon</option>
        </select></i>
    </td>
    <td>
        <textarea class="form-control" id="detail_task" name="detail_task" ></textarea>
    </td>
    <td>
        <select class="select" id="divisi" id="divisi" aria-label=".form-select-lg example">
        <option selected></option>
            <option value="Operasional (CS)">Operasional (CS)</option>
            <option value="Lintas Divisi">Lintas Divisi</option>
            <option value="Operasional (Implementor)">Operasional (Implementor)</option>
        </select>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_respond" placeholder="Waktu Respond"></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="respond" placeholder="" ></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_kesepakatan" placeholder="Waktu Kesepakatan" ></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="Waktu Solve" ></div>
    </td>
    <td>
        <select class="select"  id="status" aria-label=".form-select-lg example">
            <option disabled value="On Progress">On Progress</option>
            <option value="On Progress">On Progress</option>
            <option value="Done">Done</option>
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="status_akhir" placeholder="" ></div>
    </td>
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>

    {{--  <select class="select @error('type') is-invalid @enderror" id="type" name="type" required>

        @foreach ($pic as $item )
        <option value="{{ $item->id }}" {{ old('type') == $item->id ? 'selected':'' }}>{{ $item->company->company_name }}

        @endforeach
    </select>  --}}


<script>
    $('select[name="company_id"]').on('change', function() {
            var itemID = $(this).val();
           // {{--  alert(itemID);  --}}
            if(itemID) {
                $.ajax({
                    url: '/based_pic/'+ itemID,
                    method: "GET",
                    success:function(data) {
                        //alert(data.length);
                        $('select[name="pic').empty();
                        $('select[name="pic').append('<option value=""> </option>');
                            for(var i = 0 ; i < data.length ; i++) {
                                $('select[name="pic').append('<option value="'+ data[i].id + '"> '+ data[i].pic_name +'</option>');
                                // 16-Nov-2021   alert(data[i].serial_number)
                            }
                    }
                });
            }
            else{
                $('select[name="pic"]').empty();

            }

         });
</script>

</tr>
