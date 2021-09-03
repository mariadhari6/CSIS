@foreach ($GsmPreActive as $GsmPreActives)
    <tr id="edit-form-{{ $GsmPreActives->id }}">
         <td id="td-checkbox-{{ $GsmPreActives->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$GsmPreActives->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="td-button-{{ $GsmPreActives->id }}">
            <div id="button-{{ $GsmPreActives->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $GsmPreActives->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $GsmPreActives->id }})"></i>
            </div>
        </td>
        {{-- <td id="item-company_id-{{ $sellers->id}}">
                {{ $sellers->company->company_name}}
        </td> --}}
        <td id="item-gsm_number-{{ $GsmPreActives->id}}">
            {{ $GsmPreActives->gsm_number }}
        </td>
          <td id="item-serial_number-{{ $GsmPreActives->id }}">
            {{ $GsmPreActives->serial_number }}
        </td>
          <td id="item-icc_id-{{ $GsmPreActives->id }}">
            {{ $GsmPreActives->icc_id }}
        </td>
        <td id="item-imsi-{{ $GsmPreActives->id }}">
            {{ $GsmPreActives->imsi }}
        </td>
        <td id="item-res_id-{{ $GsmPreActives->id }}">
            {{ $GsmPreActives->res_id }}
        </td>
          <td id="item-expired_date-{{ $GsmPreActives->id }}">
            {{ $GsmPreActives->expired_date }}
          </td>
          <td id="item-note-{{ $GsmPreActives->id }}">
            {{ $GsmPreActives->note }}
          </td>
    </tr>
@endforeach

