<tr id="add_form">

    <td></td>
    <td></td>
    <td>
        <select class="select" id="company_id" name="company_id" required>
            <option class="hidden">--Pilih Company--</option>
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}">{{ $companys->company_name }}</option>
       @endforeach
    </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="po_number" placeholder="Po Number" required></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="po_date" placeholder="Po Date" required></div>
    </td>
    <td>
        <div class="input-div"><input type="number" class="input" id="harga_layanan" placeholder="Harga Layanan" required></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="jumlah_unit_po" placeholder="Jumlah Unit Po" required></div>
    </td>
    <td>
        <select class="select" id="status_po" name="status_po" aria-label=".form-select-lg example">
            <option selected class="hidden" value="not selected">--Pilih Status--</option>
            <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Beli">Beli</option>
            <option value="Trial">Trial</option>
        </select>
    </td>
     <td>
        <select class="select" id="sales_id" name="sales_id" required>
            <option class="hidden">--Pilih Salles--</option>
       @foreach ($sales as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
       @endforeach
    </select>
    </td>
    <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit" id="add">
            <i class="fas fa-check add"  onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    <td>
</tr>
<script>
    $('select[name="status_po"]').on('change', function() {
            var itemID = $(this).val();
           if(itemID == "On Progress"){
               $('#td-solve').empty();
               $('#td-solve').append(
                `<div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="Waktu Solve" disabled></div>`
               );
           }else{
                $('#td-solve').empty();
                $('#td-solve').append(
                `<div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="Waktu Solve"></div>`
                );
           }
        });

</script>
