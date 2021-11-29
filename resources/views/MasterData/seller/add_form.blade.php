<tr>
    <td></td>
    <td></td>
    <td> <div class="input-div"><input type="text" class="input" id="seller_name" placeholder="Seller name" required></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="seller_code" placeholder="Seller code" required></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="no_agreement_letter" placeholder="No_agreement_later"  data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"></i></td>
    <td>
<<<<<<< HEAD
        <select class="select" id="status" required>
            <option style="display:none;"></option>
=======
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
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            <option value="Active">Active</option>
            <option value="In Active">In Active</option>
        </select>
    </td>
    <td>
        <button type="submit" class="unstyled-button">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
</tr>
<script>



</script>

