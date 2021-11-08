<tr>
    <td></td>
    <td></td>
    <td> <div class="input-div"><input type="text" class="input" id="seller_name" placeholder="Seller name" required></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="seller_code" placeholder="Seller code" required></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="no_agreement_letter" placeholder="No_agreement_later"  data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"></i></td>
    <td>
        <select class="select" id="status" required>
            <option style="display:none;"></option>
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


