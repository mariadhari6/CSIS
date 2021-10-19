<tr id="add_form">
    <td></td>
    <td></td>
    <td>
        <select class="select" id="status_gsm" aria-label=".form-select-lg example" required>
            <option value="-">-</option>
            <option value="Ready">Ready</option>
            <option value="Active">Active</option>
            <option value="Terminate">Terminate</option>
        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="gsm_number" placeholder="GSM Number" required>
    </td>
    <td>
        <select class="form-control" id="company_id" name="company_id" required>

          <option value="-" >-</option>
         @foreach ($company as $item)
          <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
         @endforeach

        </select>
     </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="serial_number" placeholder="Serial Number" required>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="icc_id" placeholder="ICC ID" required>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="imsi" placeholder="IMSI" required>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="res_id" placeholder="Res ID" required>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="request_date" placeholder="Request Date" required>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="expired_date" placeholder="Expired Date" required>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="active_date" placeholder="Active Date">
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="terminate_date" placeholder="Terminate Date">
    </td>
    <td>
        <textarea class="form-control" id="note" name="note" required ></textarea>
    </td>
     <td>
        <div class="input-div"><input type="text" class="input" id="provider" placeholder="Provider">
    </td>
    <td>
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    <td>


</tr>
