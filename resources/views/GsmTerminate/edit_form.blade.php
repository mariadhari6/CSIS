<td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $GsmTerminate->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
     <td><select class="form-control gsm_active_id-{{$GsmTerminate->id}}" id="gsm_active_id" name="gsm_active_id">
       @foreach ($GsmActive as $GsmActives)
        <option value="{{ $GsmActives->id }}" {{ old('gsm_active_id') == $GsmActives->id ? 'selected':'' }}>{{ $GsmActives->gsm_pre_active_id }}</option>

       @endforeach
    </select></i></td>

    <td>
        <div class="input-div"><input type="date" class="input request_date-{{$GsmTerminate->id}}" id="request_date" placeholder="Request Date" value="{{ $GsmTerminate->request_date}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input active_date-{{$GsmTerminate->id}}" id="active_date" placeholder="Active Date" value="{{ $GsmTerminate->active_date}}"></i></div>
    </td>
   <td><select class="form-select status_active-{{$GsmTerminate->id}}" id="status_active" aria-label=".form-select-lg example">
    <option selected>{{$GsmTerminate->status_active}}</option>
    <option value="Active">Active</option>
    <option value="In Active">In Active</option>
    </select></i></td>
    <td><select class="form-control company_id-{{$GsmTerminate->id}}" id="company_id" name="company_id">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>

       @endforeach
    </select></i></td>
      <td><textarea class="form-control note-{{$GsmTerminate->id}}" id="note" name="note" rows="3">{{$GsmTerminate->note}}</textarea></i></td>

