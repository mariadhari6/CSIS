<?php $no=1; ?>
@foreach ($gps as $item)
    <tr id="edit-form-{{ $item->id }}">
         <td id="td-checkbox-{{ $item->id }}" class="{{ $item->id }}">
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
        <td id="item-merk-{{ $item->id}}">
            {{ $item->merk}}
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
          <td class="sticky-col first-col" id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach
