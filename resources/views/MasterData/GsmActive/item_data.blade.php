<<<<<<< HEAD
@foreach ($GsmActive as $GsmActives)
    <tr id="edit-form-{{ $GsmActives->id }}">
         <td id="td-checkbox-{{ $GsmActives->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$GsmActives->id}}">
=======
@foreach ($GsmActive as $item)
    <tr id="edit-form-{{ $item->id }}">
         <td id="td-checkbox-{{ $item->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
<<<<<<< HEAD
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
=======
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>

        <td id="item-request_date-{{ $item->id}}">
            {{ $item->request_date }}
        </td>
          <td id="item-active_date-{{ $item->id }}">
            {{ $item->active_date }}
        </td>
        <td id="item-gsm_pre_active_id-{{ $item->id}}">
            {{ $item->gsmPreActive->gsm_number}}
        </td>
          <td id="item-status_active-{{ $item->id }}">
            {{ $item->status_active }}
        </td>
          <td id="item-company_id-{{ $item->id }}">
            {{ $item->company->company_name}}
        </td>
        <td id="item-note-{{ $item->id }}">
            {{ $item->note }}
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
        </td>
    </tr>
@endforeach

