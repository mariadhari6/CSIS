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
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="expired_date" placeholder="Expired Date">
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="active_date" placeholder="Active Date">
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="terminate_date" placeholder="Terminate Date">
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
               document.getElementById("terminate_date").disabled = true;
               document.getElementById("active_date").disabled = true;
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
                if(itemID == "Active"){
                    document.getElementById("terminate_date").disabled = true;
                    document.getElementById("active_date").disabled = false;
                }else if(itemID == "Terminate"){
                    document.getElementById("terminate_date").disabled = false;
                    document.getElementById("active_date").disabled = true;
                }
           }
        });
</script>
