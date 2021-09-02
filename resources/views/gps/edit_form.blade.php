<td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $gps->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="merk" placeholder="Type" value="{{ $gps->merk}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="type" placeholder="Type" value="{{ $gps->type}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="imei" placeholder="Imei" value="{{ $gps->imei}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="waranty" placeholder="Waranty" value="{{ $gps->waranty}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="po_date" placeholder="Po Date" value="{{ $gps->po_date}}"></i></div>
    </td>
     <td>
        <div class="input-div"><input type="text" class="input" id="status" placeholder="Status" value="{{ $gps->status}}"></i></div>
    </td>