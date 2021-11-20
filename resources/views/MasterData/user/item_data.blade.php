<?php $no=1; ?>
@foreach ($user as $item)
    <tr id="edit-form-{{ $item->id }}">
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
            {{  $item->getRoleNames()->first()  == 'superAdmin' ? 'Super Admin' : null }}
            {{  $item->getRoleNames()->first()  == 'cs' ? 'CS' : null }}
            {{  $item->getRoleNames()->first()  == 'teknisi' ? 'Teknisi' : null }}

            {{-- {{   preg_replace("/<!--.*?-->/", "", $item->roles->pluck('name')); }} --}}
            {{-- {{  $item->getRoleNames()->first() }} --}}
        </td>
        <td class="action sticky-col first-col" id="td-button-{{ $item->id }}">
        <div id="button-{{ $item->id }}">
            <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
            <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
        </div>
        </td>
    </tr>
@endforeach
