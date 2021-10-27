<?php $no=1; ?>
@foreach ($pic as $pics)
    <tr id="edit-form-{{ $pics->id }}">
         <td id="td-checkbox-{{ $pics->id }}">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$pics->id}}">
                    <span class="form-check-sign"></span>
                </label>
        </td>
        <td id="item-no-{{ $pics->id}}">
            {{ $no++ }}
        </td>
        <td id="item-company_id-{{ $pics->id}}">
                {{ $pics->company->company_name}}
        </td>
        <td id="item-pic_name-{{ $pics->id}}">
            {{ $pics->pic_name }}
        </td>
         <td id="item-phone-{{ $pics->id }}">
            {{ $pics->phone }}
        </td>
          <td id="item-email-{{ $pics->id }}">
            {{ $pics->email }}
        </td>
          <td id="item-position-{{ $pics->id }}">
            {{ $pics->position }}
        </td>

        <td id="item-date_of_birth-{{ $pics->id }}">
            {{ $pics->date_of_birth }}
        </td>
        <td id="td-button-{{ $pics->id }}">
            <div id="button-{{ $pics->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $pics->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $pics->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach

