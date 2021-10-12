<td></td>
    <td></td>
    <td>
        <div class="input-div"><input type="text" class="input company_id-{{$master_po->id}}" id="company_id" placeholder="Company Id" value="{{ $master_po->po_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input po_number-{{$master_po->id}}" id="po_number" placeholder="Po Number" value="{{ $master_po->po_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input po_date-{{$master_po->id}}" id="po_date" placeholder="Po Date" value="{{ $master_po->po_date}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input harga_layanan-{{$master_po->id}}" id="harga_layanan" placeholder="Harga Layanan" value="{{ $master_po->harga_layanan}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input jumlah_unit_po-{{$master_po->id}}" id="jumlah_unit_po" placeholder="Jumlah Unit Po" value="{{ $master_po->jumlah_unit_po}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input status_po-{{$master_po->id}}" id="status_po" placeholder="Status Po" value="{{ $master_po->status_po}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input selles-{{$master_po->id}}" id="selles" placeholder="Selles" value="{{ $master_po->selles}}"></i></div>
    </td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $master_po->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>