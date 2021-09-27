<?php $no=1; ?>
@foreach ($GsmTerminate as $item)
    <tr id="edit-form-{{ $item->id }}">
         <td id="td-checkbox-{{ $item->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="item-no-{{ $item->id}}">
            {{ $no++ }}
        </td>
        <td id="item-request_date-{{ $item->id}}">
            {{ $item->request_date }}
        </td>
          <td id="item-terminate_date-{{ $item->id }}">
            {{ $item->terminate_date }}
        </td>
         <td id="item-gsm_active_id-{{ $item->id}}">
            {{ $item->gsmActive->gsmPreActive->gsm_number}}
        </td>
          <td id="item-status_active-{{ $item->id }}">
            {{ $item->status_active }}
        </td>
          <td id="item-company_id-{{ $item->id }}">
            {{ $item->gsmActive->company->company_name}}
        </td>
        <td id="item-note-{{ $item->id }}">
            {{ $item->note }}
        </td>
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach
