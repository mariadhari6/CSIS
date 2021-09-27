<?php $no=1; ?>
@foreach ($sensor as $item)
    <tr id="edit-form-{{ $item->id }}">
         <td id="td-checkbox-{{ $item->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="item-no-{{ $item->id}}">
            {{ $no++ }}
        </td>
        <td id="item-sensor_name-{{ $item->id}}">
            {{ $item->sensor_name }}
        </td>
          <td id="item-merk_sensor-{{ $item->id }}">
            {{ $item->merk_sensor }}
        </td>
          <td id="item-serial_number-{{ $item->id }}">
            {{ $item->serial_number }}
        </td>
        <td id="item-rab_number-{{ $item->id }}">
            {{ $item->rab_number }}
        </td>
        <td id="item-waranty-{{ $item->id }}">
            {{ $item->waranty }}
        </td>
        <td id="item-status-{{ $item->id }}">
            {{ $item->status }}
        </td>
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach

