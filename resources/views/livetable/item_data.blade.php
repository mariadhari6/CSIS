@foreach ($usernames as $username)
    <tr id="edit-form-{{ $username->id }}">
        <td>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$username->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="td-button-{{ $username->id }}">("#td-button-"+id).slideUp("fast");
            $("#item-FirstName-"+id).slideUp("fast");
            $("#item-LastName-"+id).slideUp("fast");


        </td>
        <td id="item-FirstName-{{ $username->id }}">
                {{ $username->FirstName}}
        </td>
        <td id="item-LastName-{{ $username->id }}">
            {{ $username->LastName }}
        </td>
    </tr>
@endforeach

