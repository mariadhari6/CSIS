<td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $gsm_pre_active->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="gsm_number" placeholder="GSM Number" value="{{ $gsm_pre_active->gsm_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="serial_number" placeholder="Serial Number" value="{{ $gsm_pre_active->serial_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="icc_id" placeholder="ICC ID" value="{{ $gsm_pre_active->icc_id}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="imsi" placeholder="IMSI" value="{{ $gsm_pre_active->imsi}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="res_id" placeholder="Res ID" value="{{ $gsm_pre_active->res_id}}"></i></div>
    </td>
     <td>
        <div class="input-div"><input type="date" class="input" id="expired_date" placeholder="Expired Date" value="{{ $gsm_pre_active->expired_date}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="note" placeholder=" Note" value="{{ $gsm_pre_active->note}}"></i></div>
    </td>