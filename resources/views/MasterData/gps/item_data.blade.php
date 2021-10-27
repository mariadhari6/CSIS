@foreach ($gps as $gpses)
<?php $no=1; ?>
    <tr id="edit-form-{{ $gpses->id }}">
        <td id="td-checkbox-{{ $gpses->id }}">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$gpses->id}}">
                    <span class="form-check-sign"></span>
                </label>
        </td>
        <td id="item-no-{{ $gpses->id}}">
            {{ $no++ }}
        </td>
        <td id="item-merk-{{ $gpses->id}}">
            {{ $gpses->merk }}
        </td>
          <td id="item-type-{{ $gpses->id }}">
            {{ $gpses->type }}
        </td>
          <td id="item-imei-{{ $gpses->id }}">
            {{ $gpses->imei }}
        </td>
        <td id="item-waranty-{{ $gpses->id }}">
            {{ $gpses->waranty }}
        </td>
        <td id="item-po_date-{{ $gpses->id }}">
            {{ $gpses->po_date }}
        </td>
          <td id="item-status-{{ $gpses->id }}">
            {{ $gpses->status }}
          </td>
          <td id="item-status_ownership-{{ $gpses->id }}">
            {{ $gpses->status_ownership }}
          </td>
          <td id="td-button-{{ $gpses->id }}">
            <div id="button-{{ $gpses->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $gpses->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $gpses->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach

