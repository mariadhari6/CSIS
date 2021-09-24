<tr id="add_form">

<td></td>
<td></td>
    <td>
        <div class="input-div"><input type="text" class="input" id="merk" placeholder="Merk"></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="type" placeholder="Type"></i>
    </td>
    <td>
        <div class="input-div"><input type="number" class="input" id="imei" placeholder="IMEI"></i>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="waranty" placeholder="Waranty"></i>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="po_date" placeholder="Po Date"></i>
    </td>
    <td>
        <select class="select" id="status" aria-label=".form-select-lg example">
            <option selected>Pilih status</option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select></i>
    </td>
    <td>
        <select class="select" id="status_ownership" aria-label=".form-select-lg example">
            <option selected>Pilih Status</option>
            <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Trial">Trial</option>
            <option value="Beli">Beli</option>
        </select></i>
    </td>


    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i></td>
    <td>

</tr>

