<tr id="add_form">
    <td>
        <div class="form-check" >
            <label class="form-check-label">
                <input class="form-check-input task-select" type="checkbox" name="ids" data-id ="' + data[count].id + '">
                <span class="form-check-sign"></span>
            </label>
        </div>
    </td>
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="FirstName" placeholder="First Name"></i></div></td>
    <td> <div class="input-div"><input type="text" class="input" id="LastName" placeholder="Last Name"></i></td>
</tr>

