<tr id="add_form">
    <td></td>
    <td></td>

    <td>
        <div class="input-div">
            <input type="text" class="input" id="seller_name" placeholder="Seller name">
        </div>
    </td>
    <td>
        <div class="input-div">
            <input type="text" class="input" id="seller_code" placeholder="Seller code">
        </div>
    </td>
    <td>
        <div class="input-div">
            <input type="text" class="input" id="no_agreement_letter" placeholder="No. Agreement Letter">
        </div>
    </td>
    <td>
        <select class="select" id="status" aria-label=".form-select-lg example">
            <option selected>Pilih status</option>
            <option value="Active">Active</option>
            <option value="In Active">In Active</option>
        </select>
    </td>
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
</tr>

