@foreach ($GsmTerminate as $GsmTerminates)
    <tr id="edit-form-{{ $GsmTerminates->id }}">
         <td id="td-checkbox-{{ $GsmTerminates->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$GsmTerminates->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="td-button-{{ $GsmTerminates->id }}">
            <div id="button-{{ $GsmTerminates->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $GsmTerminates->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $GsmTerminates->id }})"></i>
            </div>
        </td>
       
        <td id="item-request_date-{{ $GsmTerminates->id}}">
            {{ $GsmTerminates->request_date }}
        </td>
          <td id="item-active_date-{{ $GsmTerminates->id }}">
            {{ $GsmTerminates->active_date }}
        </td>
        </td>
         <td id="item-gsm_active_id-{{ $GsmTerminates->id}}">
                {{ $GsmTerminates->gsmActive->gsmPreActive->gsm_number}}
        </td>
          <td id="item-status_active-{{ $GsmTerminates->id }}">
            {{ $GsmTerminates->status_active }}
        </td>
          <td id="item-company_id-{{ $GsmTerminates->id }}">
            {{ $GsmTerminates->gsmActive->company->company_name}}
        </td>
        <td id="item-note-{{ $GsmTerminates->id }}">
            {{ $GsmTerminates->note }}
        </td>
    </tr>
@endforeach