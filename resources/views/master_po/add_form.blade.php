<tr id="add_form">
    <td></td>
    <td></td>
    <td> 
        <select class="select" id="company_id">
            @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
            @endforeach
        </select>  
    </td>
    <td> 
        <div class="input-div"><input type="text" class="input" id="po_number" placeholder="Po Number">
    </td>
    <td> 
        <div class="input-div"><input type="date" class="input" id="po_date" placeholder="Po Date">
    </td>
    <td> 
        <div class="input-div"><input type="text" class="input" id="harga_layanan" placeholder="Harga Layanan">
    </td>
    <td> 
        <div class="input-div"><input type="text" class="input" id="jumlah_unit_po" placeholder="Jumlah Unit Po">
    </td>
    <td> 
        <select class="select" id="status_po">
            <option style="display: none"></option>
            <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Trial">Trial</option>
            <option value="Beli">Beli</option>
        </select>
    </td>
    <td> 
        <select class="select" id="sales_id">
            <option style="display: none"></option>
            @foreach ($sales as $item)
                <option value="{{ $item->id }}" {{ old('sales_id') == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
            @endforeach
        </select>  
    </td>
    <td class="action sticky-col first-col">
        <i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()">
    </td>
</tr>