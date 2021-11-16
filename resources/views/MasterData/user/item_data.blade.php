<?php $no=1; ?>
@foreach ($user as $item)
    <tr id="edit-form-{{ $item->id }}">
        <td id="td-checkbox-{{ $item->id }}">
            <div>
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="item-no-{{ $item->id}}">
            {{ $no++ }}
        </td>
        <td id="item-name-{{ $item->id}}">
            {{ $item->name }}
        </td>
        <td id="item-email-{{ $item->id }}">
            {{ $item->email }}
        </td>
        <td id="item-password-{{ $item->id }}">
            {{ $item->password }}
        </td>
        <td id="item-role-{{ $item->id }}">
            {{ $item->roles[0]['name'] == 'superAdmin' ? 'Super Admin' : null }}
            {{ $item->roles[0]['name'] == 'cs' ? 'CS' : null }}
            {{ $item->roles[0]['name'] == 'teknisi' ? 'Teknisi' : null }}
        </td>
        <td class="action sticky-col first-col" id="td-button-{{ $item->id }}">
        <div id="button-{{ $item->id }}">
            <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
            <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
        </div>
        </td>
    </tr>                           
@endforeach

