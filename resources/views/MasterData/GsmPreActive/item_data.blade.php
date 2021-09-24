<<<<<<< HEAD
@foreach ($GsmPreActive as $GsmPreActives)
    <tr id="edit-form-{{ $GsmPreActives->id }}">
         <td id="td-checkbox-{{ $GsmPreActives->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$GsmPreActives->id}}">
=======
@foreach ($GsmPreActive as $item)
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
        <td id="td-button-{{ $GsmPreActives->id }}">
            <div id="button-{{ $GsmPreActives->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $GsmPreActives->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $GsmPreActives->id }})"></i>
=======
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
            </div>
        </td>
        {{-- <td id="item-company_id-{{ $sellers->id}}">
                {{ $sellers->company->company_name}}
        </td> --}}
<<<<<<< HEAD
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
=======
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

>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
