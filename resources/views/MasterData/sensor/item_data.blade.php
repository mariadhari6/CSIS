<?php $no=1; ?>
@foreach ($sensor as $sensors)
    <tr id="edit-form-{{ $sensors->id }}">
         <td id="td-checkbox-{{ $sensors->id }}">
            <div>
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$sensors->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="item-no-{{ $sensors->id}}">
            {{ $no++ }}
        </td>

        {{-- <td id="item-company_id-{{ $sellers->id}}">
                {{ $sellers->company->company_name}}
        </td> --}}
        <td id="item-sensor_name-{{ $sensors->id}}">
            {{ $sensors->sensor_name }}
        </td>
          <td id="item-merk_sensor-{{ $sensors->id }}">
            {{ $sensors->sensorMerk->merk_sensor}}
        </td>
        <td id="item-serial_number-{{ $sensors->id }}">
            {{ $sensors->serial_number}}
        </td>
        <td id="item-rab_number-{{ $sensors->id }}">
            {{ $sensors->rab_number }}
        </td>
        <td id="item-waranty-{{ $sensors->id }}">
            {{ $sensors->waranty }}
        </td>
        <td id="item-status-{{ $sensors->id }}">
            {{ $sensors->status }}
        </td>
          <td id="td-button-{{ $sensors->id }}">
            <div id="button-{{ $sensors->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $sensors->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $sensors->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach

