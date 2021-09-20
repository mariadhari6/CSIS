@foreach ($usernames as $username)
    <tr id="edit-form-{{ $username->id }}">
        <td id="td-checkbox-{{ $username->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$username->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="td-button-{{ $username->id }}">
            <div id="button-{{ $username->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $username->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $username->id }})"></i>
            </div>
        </td>
        <td id="item-FirstName-{{ $username->id }}">
                {{ $username->FirstName}}
        </td>
        <td id="item-LastName-{{ $username->id }}">
            {{ $username->LastName }}
        </td>
    </tr>
@endforeach
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 7cd2d07c2ab3cbf0c5f32627c5faf59078754169
=======
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
