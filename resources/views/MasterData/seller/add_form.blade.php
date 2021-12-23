
<tr id="add_form">



    <td></td>
    <td></td>

    <td>
        <div class="input-div">
            <input type="text" class="input" id="seller_name" placeholder="Seller name" required>
        </div>
        {{-- <code id="required-seller_name" style="color: red"></code> --}}
    </td>
    <td>
        <div class="input-div">
            <input type="text" class="input" id="seller_code" placeholder="Seller code" required>
        </div>
        {{-- <code id="required-seller_code" style="color: red"></code> --}}
    </td>
    <td>
        <div class="input-div">
            <input type="text" class="input" id="no_agreement_letter" placeholder="No. Agreement Letter" required>
        </div>
        {{-- <code id="required-no_agreement_letter" style="color: red"></code> --}}
    </td>
    <td>
        <select class="select" id="status" aria-label=".form-select-lg example" required>
            <option  class="hidden" value="">--Pilih Status--</option>
            <option value="Active">Active</option>
            <option value="In Active">In Active</option>
        </select>
    </td>
    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
       <button class="unstyled-button" type="submit">
        <i class="fas fa-times cancel" onclick="cancel()"></i>
       </button>
    </td>

</tr>
<script>



</script>

