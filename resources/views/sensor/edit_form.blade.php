<td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $sensor->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="sensor_name" placeholder="Sensor_name" value="{{ $sensor->sensor_name}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="merk_sensor" placeholder="Merk_sensor" value="{{ $sensor->merk_sensor}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="serial_number" placeholder="Serial_number" value="{{ $sensor->serial_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="rab_number" placeholder="RAB_number" value="{{ $sensor->rab_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="waranty" placeholder="Waranty" value="{{ $sensor->waranty}}"></i></div>
    </td>
     <td>
        <div class="input-div"><input type="text" class="input" id="status" placeholder="Status" value="{{ $sensor->status}}"></i></div>
    </td>