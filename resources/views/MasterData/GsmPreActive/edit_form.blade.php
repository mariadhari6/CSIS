<td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $GsmPreActive->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>

    <td>
        <div class="input-div"><input type="text" class="input gsm_number-{{$GsmPreActive->id}}" id="gsm_number" placeholder="Gsm Number" value="{{ $GsmPreActive->gsm_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input serial_number-{{$GsmPreActive->id}}" id="serial_number" placeholder="Serial Number" value="{{ $GsmPreActive->serial_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input icc_id-{{$GsmPreActive->id}}" id="icc_id" placeholder="ICC_ID" value="{{ $GsmPreActive->icc_id}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input imsi-{{$GsmPreActive->id}}" id="imsi" placeholder="IMSI" value="{{ $GsmPreActive->imsi}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input res_id-{{$GsmPreActive->id}}" id="res_id" placeholder="Res ID" value="{{ $GsmPreActive->res_id}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input expired_date-{{$GsmPreActive->id}}" id="expired_date" placeholder="Expired Date" value="{{ $GsmPreActive->expired_date}}"></i></div>
    </td>
      <td><textarea class="form-control note-{{$GsmPreActive->id}}" id="note" name="note" >{{$GsmPreActive->note}}</textarea></i></td>