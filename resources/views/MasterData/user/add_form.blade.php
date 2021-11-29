
<tr id="add_form">
    <td></td>
    <td>
        <div class="input-div">
            <input type="text" class="input" id="name" placeholder="Name" required>
        </div>
    </td>
    <td>
        <div class="input-div">
            <input type="email" class="input" id="email" placeholder="Email" required>
        </div>
    </td>
    <td>
        <div class="input-div">
            <input type="password" class="input" id="password" placeholder="Password" required>
        </div>
        <div class="input-div">
            <input type="password" class="input" id="password2" placeholder="Password Confirmation" required>
        </div>
    </td>
    <td>
        <select class="select" id="role" aria-label=".form-select-lg example" required>
            <option  class="hidden" value="">-</option>
            <option value="superAdmin">Super Admin</option>
            <option value="cs">CS</option>
            <option value="teknisi">Teknisi</option>
        </select>
    </td>
    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
</tr>
<script>



</script>
