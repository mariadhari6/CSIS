<td></td>
    <td></td>
    <td>
        <div class="input-div"><input type="text" class="input po_number-{{$master_po->id}}" id="po_number" placeholder="Po Number" value="{{ $master_po->po_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input po_date-{{$master_po->id}}" id="po_date" placeholder="Po Date" value="{{ $master_po->po_date}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input jumlah_unit_po-{{$master_po->id}}" id="jumlah_unit_po" placeholder="Jumlah Unit Po" value="{{ $master_po->jumlah_unit_po}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input selles-{{$master_po->id}}" id="selles" placeholder="Selles" value="{{ $master_po->selles}}"></i></div>
    </td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $master_po->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>