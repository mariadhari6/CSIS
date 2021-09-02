@foreach ($sensor as $sensor)
    <tr id="edit-form-{{ $sensor->id }}">
        <td id="td-button-{{ $sensor->id }}">
            <div id="button-{{ $sensor->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $sensor->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $sensor->id }})"></i>
            </div>
        </td>
        <td id="item-sensor_name-{{ $sensor->id}}">
                {{ $sensor->sensor_name}}
        </td>
        <td id="item-merk_sensor-{{ $sensor->id}}">
            {{ $sensor->merk_sensor }}
        </td>
          <td id="item-serial_number-{{ $sensor->id }}">
            {{ $sensor->serial_number }}
        </td>
          <td id="item-rab_number-{{ $sensor->id }}">
            {{ $sensor->rab_number }}
        </td>
          <td id="item-waranty-{{ $sensor->id }}">
            {{ $sensor->waranty }}
        </td>
        <td id="item-status-{{ $sensor->id }}">
            {{ $sensor->status }}
        </td>
    </tr>
@endforeach