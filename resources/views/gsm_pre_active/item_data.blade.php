@foreach ($gsm_pre_active as $gsm_pre_actives)
    <tr id="edit-form-{{ $gsm_pre_actives->id }}">
        <td id="td-button-{{ $gsm_pre_actives->id }}">
            <div id="button-{{ $gsm_pre_actives->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $gsm_pre_actives->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $gsm_pre_actives->id }})"></i>
            </div>
        </td>
        <td id="item-gsm_number-{{ $gsm_pre_actives->id}}">
                {{ $gsm_pre_actives->gsm_number}}
        </td>
        <td id="item-serial_number-{{ $gsm_pre_actives->id}}">
            {{ $gsm_pre_actives->serial_number }}
        </td>
          <td id="item-icc_id-{{ $gsm_pre_actives->id }}">
            {{ $gsm_pre_actives->icc_id }}
        </td>
          <td id="item-imsi-{{ $gsm_pre_actives->id }}">
            {{ $gsm_pre_actives->imsi }}
        </td>
          <td id="item-res_id-{{ $gsm_pre_actives->id }}">
            {{ $gsm_pre_actives->res_id }}
        </td>
        <td id="item-expired_date-{{ $gsm_pre_actives->id }}">
            {{ $gsm_pre_actives->expired_date }}
        </td>
        <td id="item-note-{{ $gsm_pre_actives->id }}">
            {{ $gsm_pre_actives->note }}
        </td>
    </tr>
@endforeach