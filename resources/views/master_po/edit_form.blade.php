    <td></td>
    <td></td>
    <td>
        <select class="select company_id-{{ $master_po->id }}" id="company_id">    
            <option value="{{ $master_po->company_id }}" class="input company_id-{{ $master_po->id }}">{{ $master_po->company->company_name }}</option>
            @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':''}}>{{ $item->company_name }}</option>
            @endforeach
        </select>
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
        <select class="select status_po-{{ $master_po->id }}" id="status_po">    
            <option value="{{ $master_po->status_po }}" class="input status_po-{{ $master_po->id }}">{{ $master_po->status_po }}</option>
            <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Trial">Trial</option>
            <option value="Beli">Beli</option>
        </select>

    </td>
    <td>
        <select class="select sales_id-{{ $master_po->id }}" id="sales_id">    
            <option value="{{ $master_po->sales_id }}" class="input sales_id-{{ $master_po->id }}">{{ $master_po->sales->name }}</option>
            @foreach ($sales as $item)
                <option value="{{ $item->id }}" {{ old('sales_id') == $item->id ? 'selected':''}}>{{ $item->name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $master_po->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>