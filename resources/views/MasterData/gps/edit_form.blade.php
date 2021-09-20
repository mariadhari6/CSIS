    <td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $gps->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>

    <td>
        <div class="input-div"><input type="text" class="input merk-{{$gps->id}}" id="merk" placeholder="Merk" value="{{ $gps->merk}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input type-{{$gps->id}}" id="type" placeholder="Type" value="{{ $gps->type}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input imei-{{$gps->id}}" id="imei" placeholder="IMEI" value="{{ $gps->imei}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input waranty-{{$gps->id}}" id="waranty" placeholder="Waranty" value="{{ $gps->waranty}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input po_date-{{$gps->id}}" id="po_date" placeholder="Po Date" value="{{ $gps->po_date}}"></i></div>
    </td>
    <td>
        <select class="form-control status-{{$gps->id}}" id="status" aria-label=".form-select-lg example">
            <option selected>{{$gps->status}}</option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select></i>
    </td>
    <td>
        <select class="form-control status_ownership-{{$gps->id}}" id="status_ownership" aria-label=".form-select-lg example">
            <option selected>{{$gps->status_ownership}}</option>
            <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Trial">Trial</option>
            <option value="Beli">Beli</option>
        </select></i>
    </td>

