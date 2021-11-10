<tr id="add_form">

    <td></td>
    <td></td>
    <td>
        <select class="select" id="status_gsm" name="status" aria-label=".form-select-lg example" required>
            <option value="" class="hidden">--Pilih Status--</option>
            {{-- <option value="">-</option> --}}
            <option value="Ready">Ready</option>
            <option value="Active">Active</option>
            <option value="Terminate">Terminate</option>
        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="gsm_number" placeholder="GSM Number" required>
    </td>
    <td id="td-company">
        <select class="select" id="company_id" name="company_id" required>

          <option value="" class="hidden">--Pilih Company--</option>
         @foreach ($company as $item)
          <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
         @endforeach

        </select>
     </td>
    <td>
<<<<<<< HEAD
        <div class="input-div"><input type="text" class="input icc_id-{{$GsmMaster->id}}" id="icc_id" placeholder="ICC_ID" value="{{ $GsmMaster->icc_id}}"></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input imsi-{{$GsmMaster->id}}" id="imsi" placeholder="IMSI" value="{{ $GsmMaster->imsi}}"></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input res_id-{{$GsmMaster->id}}" id="res_id" placeholder="Res ID" value="{{ $GsmMaster->res_id}}"></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input request_date-{{$GsmMaster->id}}" id="request_date" placeholder="Request Date" value="{{ $GsmMaster->expired_date}}"></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input expired_date-{{$GsmMaster->id}}" id="expired_date" placeholder="Expired Date" value="{{ $GsmMaster->expired_date}}"></div>
=======
        <div class="input-div"><input type="text" class="input" id="serial_number" placeholder="Serial Number" required>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="icc_id" placeholder="ICC ID">
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="imsi" placeholder="IMSI">
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="res_id" placeholder="Res ID">
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="request_date" placeholder="Request Date">
>>>>>>> 5a99c6506f6410c9f7e3c4dc995040fa8c8c3b7d
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="expired_date" placeholder="Expired Date">
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="active_date" placeholder="Active Date">
    </td>
    <td>
<<<<<<< HEAD
        <textarea class="form-control note-{{$GsmMaster->id}}" id="note" name="note" >{{$GsmMaster->note}}</textarea>
=======
        <div class="input-div"><input type="date" class="input" id="terminate_date" placeholder="Terminate Date">
>>>>>>> 5a99c6506f6410c9f7e3c4dc995040fa8c8c3b7d
    </td>
    <td>
        <textarea class="form-control" id="note" name="note"></textarea>
    </td>
     <td>
        <div class="input-div"><input type="text" class="input" id="provider" placeholder="Provider">
    </td>

    <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    <td>
</tr>

<script>
     // Status ready tidak bisa pilih company
         $('select[name="status"]').on('change', function() {
            var itemID = $(this).val();
           if(itemID == "Ready"){
               $('#td-company').empty();
               $('#td-company').append(
                 `<select class="select" id="" disable>
                     <option value="">-</option>


                </select>`
               );
           }else if(itemID == "Active" || "Terminate"){
                $('#td-company').empty();
                $('#td-company').append(
                `<select class="select" id="company_id" disable>
                <option value="" class="hidden">--Pilih Company--</option>
                        @foreach ($company as $item)
                        <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
                        @endforeach


                </select>`
                );
           }
        });
</script>
