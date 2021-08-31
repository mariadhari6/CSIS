<tr id="add_form">
    <td></td>
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>

    {{-- <td> <div class="input-div"><input type="text" class="input" id="seller_id" placeholder="Seller id"></i></div></td> --}}
    <td> <div class="input-div"><input type="text" class="input" id="seller_name" placeholder="Seller name"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="seller_code" placeholder="Seller code"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="no_agreement_letter" placeholder="No_agreement_later"></i></td>
    {{-- <td> <div class="input-div"><input type="text" class="input" id="status" placeholder="Status"></i></td> --}}
    <td><select class="form-select" id="status" aria-label=".form-select-lg example">
    <option selected>Pilih status</option>
    <option value="Active">Active</option>
    <option value="In Active">In Active</option>
    </select></i></td>
</tr>

