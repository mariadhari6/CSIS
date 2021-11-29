<tr id="add_form">
    <td></td>
    <td></td>
    <td>
<<<<<<< HEAD
        <select class="select" id="status_gsm" aria-label=".form-select-lg example">
            <option style="display: none"></option>
=======
        <select class="select" id="status_gsm" name="status" aria-label=".form-select-lg example" required>
            <option value="" class="hidden">--Pilih Status--</option>
            {{-- <option value="">-</option> --}}
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            <option value="Ready">Ready</option>
            <option value="Active">Active</option>
            <option value="Terminate">Terminate</option>
        </select></i>
    </td>
    <td> 
        <div class="input-div"><input type="text" class="input" id="gsm_number" placeholder="GSM Number">
    </td>
<<<<<<< HEAD
    <td>
        <select class="select" id="company_id" name="company_id"> 
            <option style="display: none"></option>
            @foreach ($company as $item)
            <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
            @endforeach
=======
    <td id="td-company">
        <select class="select" id="company_id" name="company_id" required>

          <option value="" class="hidden">--Pilih Company--</option>
         @foreach ($company as $item)
          <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
         @endforeach

>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
        </select>
     </td>
    <td> 
        <div class="input-div"><input type="text" class="input" id="serial_number" placeholder="Serial Number">
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
<<<<<<< HEAD
        <textarea class="form-control" id="note" name="note" ></textarea>
=======
        <textarea class="form-control" id="note" name="note"></textarea>
    </td>
     <td>
        <div class="input-div"><input type="text" class="input" id="provider" placeholder="Provider">
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
    </td>
    <td>
        <select class="select" id="provider">
            <option style="display: none"></option>
            <option value="Telkomsel">Telkomsel</option>
            <option value="XL Axiata">XL Axiata</option>
            <option value="Tri">Tri</option>
            <option value="Indosat">Indosat</option>
            <option value="Smartfren">SmartFrend</option>
        </select>
    </td>
    <td class="sticky-col first-col">
        <i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
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
