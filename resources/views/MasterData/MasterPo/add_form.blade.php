<tr id="add_form">
    <td></td>
    <td></td>
    <td>
        <select class="select" id="company_id" name="company_id">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}">{{ $companys->company_name }}</option>
       @endforeach
    </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="po_number" placeholder="Po Number">
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="po_date" placeholder="Po Date"></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="harga_layanan" placeholder="Harga Layanan">
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="jumlah_unit_po" placeholder="Jumlah Unit Po">
    </td>
    <td>
        <select class="select" id="status_po" aria-label=".form-select-lg example">
            <option selected value="not selected">Pilih status</option>
            <option value="Beli">Beli</option>
            <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Trial">Trial</option>
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="selles" placeholder="Selles">
    </td>
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()">
    </td>
</tr>
