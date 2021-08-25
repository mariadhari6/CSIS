@foreach ($usernames as $username)
    <tr id="edit-form-{{ $username->id }}">
        <td id="td-button-{{ $username->id }}"><div id="button-{{ $username->id }}"><i class="fas fa-pen edit" onclick="edit({{ $username->id }})"></i><i class="fas fa-trash delete" onclick="destroy({{ $username->id }})"></i></div></td>
        <td id="td-{{ $username->id }}"><div id="item-{{ $username->id }}">{{ $username->FirstName}}</div></td>
        <td>{{ $username->LastName }}</td>
    </tr>
@endforeach

