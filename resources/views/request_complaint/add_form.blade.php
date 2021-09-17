<tr id="add_form">
    <td></td>
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>
    <td><select class="form-control" id="company" name="company">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>

       @endforeach
    </select></i></td>
    <td><select class="form-control" id="internal_eksternal" name="internal_eksternal" aria-label=".form-select-lg example">
    <option selected>Pilih status</option>
    <option value="Internal Request">Internal Request</option>
    <option value="Internal Complain">Internal Complain</option>
    <option value="Eksternal Request">Eksternal Request</option>
    <option value="Eksternal Complain">Eksternal Complain</option>
    </select></i></td>
    <td><select class="form-control" id="gsm_pre_active_id" name="gsm_pre_active_id">
       @foreach ($GsmPreActive as $GsmPreActives)
        <option value="{{ $GsmPreActives->id }}" {{ old('gsm_pre_active_id') == $GsmPreActives->id ? 'selected':'' }}>{{ $GsmPreActives->gsm_number }}</option>

       @endforeach
    </select></i></td>
    <td> <div class="input-div"><input type="date" class="input" id="request_date" placeholder="Request Date" rows=""></i></td>
    <td> <div class="input-div"><input type="date" class="input" id="active_date" placeholder="Active_date"></i></td>

    <td><select class="form-control" id="status_active" id="status_active" aria-label=".form-select-lg example">
    <option selected>Pilih status</option>
    <option value="Active">Active</option>
    <option value="In Active">In Active</option>
    </select></i></td>

    <td><select class="form-control" id="company_id" name="company_id">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>

       @endforeach
    </select></i></td>

      <td><textarea class="form-control" id="note" name="note" rows="3"></textarea></i></td>

</tr>

