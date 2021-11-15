
    <td></td>
    <td></td>
    <td>
    <select class="select company_id-{{$master_po->id}}" id="company_id" name="company_id" required>
        <option class="hidden" value="{{$master_po->company_id}}"> {{$master_po->company->company_name??''}}</option>
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>
       @endforeach
    </select></i>
    <td>
        <div class="input-div"><input type="text" class="input po_number-{{$master_po->id}}" id="po_number" placeholder="Po Number" value="{{ $master_po->po_number}}" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input po_date-{{$master_po->id}}" id="po_date" placeholder="Po Date" value="{{ str_replace(" ", "T", $master_po->po_date) }}" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input harga_layanan-{{$master_po->id}}" id="harga_layanan" placeholder="Harga Layanan" value="{{ $master_po->harga_layanan}}" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input jumlah_unit_po-{{$master_po->id}}" id="jumlah_unit_po" placeholder="Jumlah Unit Po" value="{{ $master_po->jumlah_unit_po}}" required></i></div>
    </td>
    <td>
        <select class="select status_po-{{$master_po->id}}" id="status_po" aria-label=".form-select-lg example">
            <option selected class="hidden" value="{{$master_po->status_po}}">{{$master_po->status_po}}</option>
             <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Beli">Beli</option>
            <option value="Trial">Trial</option>
        </select>
    </td>
    <td>
        <select class="select sales_id-{{$master_po->id}}" id="sales_id" name="sales_id" required>
            <option value="{{$master_po->sales_id}}" class="hidden">{{$master_po->sales->name??''}}</option>
       @foreach ($sales as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
       @endforeach
    </select>
    </td>
     <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $master_po->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
