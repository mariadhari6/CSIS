    <td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $usernames->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input FirstName-{{ $usernames->id}}" id="FirstName" placeholder="First Name" value="{{ $usernames->FirstName}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input LastName-{{ $usernames->id}}" id="LastName" placeholder="Last Name" value="{{ $usernames->LastName}}"></i></div>
    </td>
