@foreach ($GsmPreActive as $item)
    <tr id="edit-form-{{ $item->id }}">
         <td id="td-checkbox-{{ $item->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
        {{-- <td id="item-company_id-{{ $sellers->id}}">
                {{ $sellers->company->company_name}}
        </td> --}}
        <td id="item-gsm_number-{{ $item->id}}">
            {{ $item->gsm_number }}
        </td>
          <td id="item-serial_number-{{ $item->id }}">
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
          <td id="item-expired_date-{{ $item->id }}">
            {{ $item->expired_date }}
          </td>
          <td id="item-note-{{ $item->id }}">
            {{ $item->note }}
          </td>
    </tr>
@endforeach

