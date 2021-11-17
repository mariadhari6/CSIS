    <td></td>
    <td>
        <div class="input-div">
            <input type="text" class="input" id="name" placeholder="Name" value="{{ $user->name}}" required>
        </div>
    </td>
    <td>
        <div class="input-div">
            <input type="email" class="input" id="email" placeholder="Email" value="{{ $user->email}}" required>
        </div>
    </td>
    <td>
        <div class="input-div">
            <input type="password" class="input" id="password" placeholder="Current Password" required>
        </div>
        <div class="input-div">
            <input type="password" class="input" id="password2" placeholder="New Password" required>
        </div>
        <div class="input-div">
            <input type="password" class="input" id="password3" placeholder="Password Confirmation" required>
        </div>
    </td>
    <td>
        <select class="select" id="role" aria-label=".form-select-lg example" required>
            <option value="{{ $user->roles[0]['name'] }}">
                {{ $user->roles[0]['name'] == 'superAdmin' ? 'Super Admin' : null }}
                {{ $user->roles[0]['name'] == 'cs' ? 'CS' : null }}
                {{ $user->roles[0]['name'] == 'teknisi' ? 'Teknisi' : null }}
            </option>
            <option value="superAdmin">Super Admin</option>
            <option value="cs">CS</option>
            <option value="teknisi">Teknisi</option>
        </select>
    </td>
    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="update({{ $user->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
<script>



</script>

