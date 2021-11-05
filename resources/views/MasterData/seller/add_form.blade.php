<<<<<<< HEAD
<tr>
    <td></td>
    <td></td>
    <td> <div class="input-div"><input type="text" class="input" id="seller_name" placeholder="Seller name" required></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="seller_code" placeholder="Seller code" required></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="no_agreement_letter" placeholder="No_agreement_later"  data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"></i></td>
    <td>
        <select class="select" id="status" required>
            <option selected>Pilih status</option>
=======

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
        <code id="required-no_agreement_letter" style="color: red"></code>
    </td>
    <td>
        <select class="select" id="status" aria-label=".form-select-lg example" required>
            <option value="">Pilih status</option>
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
            <option value="Active">Active</option>
            <option value="In Active">In Active</option>
        </select>
    </td>
<<<<<<< HEAD
    <td>
        <button type="submit" class="unstyled-button">
=======
    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
<<<<<<< HEAD
=======

>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
</tr>


