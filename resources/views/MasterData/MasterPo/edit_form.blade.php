    <td></td>
    <td></td>
    <td>
    <select class="select company_id-{{$master_po->id}}" id="company_id" name="company_id">
        <option value="{{$master_po->company}}"> {{$master_po->company_id}} </option>
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>
       @endforeach
    </select></i>
    <td>
        <div class="input-div"><input type="text" class="input po_number-{{$master_po->id}}" id="po_number" placeholder="Po Number" value="{{ $master_po->po_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input po_date-{{$master_po->id}}" id="po_date" placeholder="Po Date" value="{{ str_replace(" ", "T", $master_po->po_date) }}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input harga_layanan-{{$master_po->id}}" id="harga_layanan" placeholder="Harga Layanan" value="{{ $master_po->harga_layanan}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input jumlah_unit_po-{{$master_po->id}}" id="jumlah_unit_po" placeholder="Jumlah Unit Po" value="{{ $master_po->jumlah_unit_po}}"></i></div>
    </td>
    <td>
        <select class="form-control status_po-{{$master_po->id}}" id="status_po" aria-label=".form-select-lg example">
            <option selected value="{{$master_po->status_po}}">{{$master_po->status_po}}</option>
            <option value="Contract">Contract</option>
            <option value="Terminate">Terminate</option>
            <option value="Trial">Trial</option>
            <option value="Register">Register</option>
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input selles-{{$master_po->id}}" id="selles" placeholder="Selles" value="{{ $master_po->selles}}"></i></div>
    </td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $master_po->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>