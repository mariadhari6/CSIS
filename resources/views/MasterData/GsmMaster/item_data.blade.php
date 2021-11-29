<?php $no=1; ?>
@foreach ($GsmMaster as $item)
<<<<<<< HEAD
    <tr id="edit-form-{{ $item->id }}">
         <td id="td-checkbox-{{ $item->id }}">
            <label class="form-check-label">
                <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                <span class="form-check-sign"></span>
            </label>
=======
    <tr id="edit-form-{{ $item->id }}" {{ $item->was_maintenance === "1" ? 'style=background-color:#e8837d' : ""  }}>
        <td id="td-checkbox-{{ $item->id }}" class="{{ $item->id }}">
            <div>
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
        </td>
        <td id="item-no-{{ $item->id}}">
            {{ $no++ }}
        </td>
        <td id="item-status_gsm-{{ $item->id}}" class="status" name="{{ $item->status_gsm }}">
            {{ $item->status_gsm }}
        </td>
<<<<<<< HEAD
        <td id="item-gsm_number-{{ $item->id}}">
            {{ $item->gsm_number }}
        </td>
        <td id="item-company_id-{{ $item->id}}">
            
            @if ( $item->company_id != null)
                {{ $item->company->company_name }}
            @else
                {{ $item->company_id }}
            @endif
        </td>
        <td id="item-serial_number-{{ $item->id }}">
=======
        <td id="item-gsm_number-{{ $item->id}}" class="gsm-number" name="{{ $item->gsm_number }}">
            {{ $item->gsm_number }}
        </td>
        <td id="item-company_id-{{ $item->id}}">
            {{ $item->company->company_name??''}}
        </td>
        <td id="item-serial_number-{{ $item->id }}" class="item-serial_number-{{ $item->id }} red" name="{{ $item->serial_number }}">
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            {{ $item->serial_number }}
        </td>
          <td id="item-icc_id-{{ $item->id }}">
            {{ $item->icc_id }}
        </td>
        <td id="item-imsi-{{ $item->id }}">
            {{ $item->imsi }}
        </td>
        <td id="item-res_id-{{ $item->id }}">
            {{ $item->res_id }}
        </td>
        <td id="item-request_date-{{ $item->id }}">
            {{ $item->request_date }}
        </td>
        <td id="item-expired_date-{{ $item->id }}">
            {{ $item->expired_date }}
        </td>
        <td id="item-active_date-{{ $item->id }}">
            {{ $item->active_date }}
        </td>
        <td id="item-terminate_date-{{ $item->id }}">
            {{ $item->terminate_date }}
        </td>
        <td id="item-note-{{ $item->id }}">
            {{ $item->note }}
        </td>
        <td id="item-provider-{{ $item->id }}">
          {{ $item->provider }}
      </td>
        <td id="td-button-{{ $item->id }}" class="sticky-col first-col">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach
