<?php $no=1; ?>
<<<<<<< HEAD
@foreach ($gps as $gpses)
    <tr id="edit-form-{{ $gpses->id }}">
        <td id="td-checkbox-{{ $gpses->id }}">
=======
@foreach ($gps as $item)
    <tr id="edit-form-{{ $item->id }}">

         <td id="td-checkbox-{{ $item->id }}" class="{{ $item->id }}">
            <div>
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
        </td>
<<<<<<< HEAD
        <td id="item-no-{{ $gpses->id}}">
          {{ $no++ }}
        </td>
        <td id="item-merk-{{ $gpses->id}}">
            {{ $gpses->merk }}
=======
        <td id="item-no-{{ $item->id}}">
            {{ $no++ }}
        </td>

        {{-- <td id="item-company_id-{{ $sellers->id}}">
                {{ $sellers->company->company_name}}
        </td> --}}
        <td id="item-merk-{{ $item->id}}">
            {{ $item->merk}}
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
        </td>
          <td id="item-type-{{ $item->id }}">
            {{ $item->type }}
        </td>
          <td id="item-imei-{{ $item->id }}" name="{{$item->imei}}" class="item-imei-{{$item->id}}">
            {{ $item->imei }}
        </td>
        <td id="item-waranty-{{ $item->id }}">
            {{ $item->waranty }}
        </td>
        <td id="item-po_date-{{ $item->id }}">
            {{ $item->po_date }}
        </td>
          <td id="item-status-{{ $item->id }}">
            {{ $item->status }}
          </td>
          <td id="item-status_ownership-{{ $item->id }}">
            {{ $item->status_ownership }}
          </td>
<<<<<<< HEAD
          <td id="td-button-{{ $gpses->id }}">
            <div id="button-{{ $gpses->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $gpses->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $gpses->id }})"></i>
=======
          <td class="sticky-col first-col" id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
            </div>
        </td>
    </tr>
@endforeach

