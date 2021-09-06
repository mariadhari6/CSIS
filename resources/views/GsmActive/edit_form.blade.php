<td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $GsmActive->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
     <td><select class="form-control gsm_pre_active_id-{{$GsmActive->id}}" id="gsm_pre_active_id" name="gsm_pre_active_id">
       @foreach ($GsmPreActive as $GsmPreActives)
        <option value="{{ $GsmPreActives->id }}" {{ old('gsm_pre_active_id') == $GsmPreActives->id ? 'selected':'' }}>{{ $GsmPreActives->gsm_active_id }}</option>

       @endforeach
    </select></i></td>

    <td>
        <div class="input-div"><input type="date" class="input request_date-{{$GsmActive->id}}" id="request_date" placeholder="Request Date" value="{{ $GsmActive->request_date}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input active_date-{{$GsmActive->id}}" id="active_date" placeholder="Active Date" value="{{ $GsmActive->active_date}}"></i></div>
    </td>
   <td><select class="form-select status_active-{{$GsmActive->id}}" id="status_active" aria-label=".form-select-lg example">
    <option selected>{{$GsmActive->status_active}}</option>
    <option value="Active">Active</option>
    <option value="In Active">In Active</option>
    </select></i></td>
    <td><select class="form-control company_id-{{$GsmActive->id}}" id="company_id" name="company_id">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>

       @endforeach
    </select></i></td>
      <td><textarea class="form-control note-{{$GsmActive->id}}" id="note" name="note" rows="3">{{$GsmActive->note}}</textarea></i></td>


