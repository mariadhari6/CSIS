@foreach ($GsmActive as $GsmActives)
    <tr id="edit-form-{{ $GsmActives->id }}">
         <td id="td-checkbox-{{ $GsmActives->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$GsmActives->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="td-button-{{ $GsmActives->id }}">
            <div id="button-{{ $GsmActives->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $GsmActives->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $GsmActives->id }})"></i>
            </div>
        </td>
        <td id="item-request_date-{{ $GsmActives->id}}">
            {{ $GsmActives->request_date }}
        </td>
          <td id="item-active_date-{{ $GsmActives->id }}">
            {{ $GsmActives->active_date }}
        </td>
        <td id="item-gsm_pre_active_id-{{ $GsmActives->id}}">
                {{ $GsmActives->gsmPreActive->gsm_number}}
        </td>
          <td id="item-status_active-{{ $GsmActives->id }}">
            {{ $GsmActives->status_active }}
        </td>
          <td id="item-company_id-{{ $GsmActives->id }}">
            {{ $GsmActives->company->company_name}}
        </td>
        <td id="item-note-{{ $GsmActives->id }}">
            {{ $GsmActives->note }}
        </td>
    </tr>
@endforeach

