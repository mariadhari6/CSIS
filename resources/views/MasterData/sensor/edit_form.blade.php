    <td></td>
    <td></td>
    <td>
        <div class="input-div"><input type="text" class="input sensor_name-{{$sensor->id}}" id="sensor_name" placeholder="Sensor Name" value="{{ $sensor->sensor_name}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input merk_sensor-{{$sensor->id}}" id="merk_sensor" placeholder="Merk Sensor" value="{{ $sensor->merk_sensor}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input serial_number-{{$sensor->id}}" id="serial_number" placeholder="Serial Number" value="{{ $sensor->serial_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input rab_number-{{$sensor->id}}" id="rab_number" placeholder="Rab Number" value="{{ $sensor->rab_number}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input waranty-{{$sensor->id}}" id="waranty" placeholder="Waranty" value="{{ $sensor->waranty}}"></i></div>
    </td>
    <td>
        <select class="select status-{{$sensor->id}}" id="status" aria-label=".form-select-lg example">
            <option selected>{{$sensor->status}}</option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select>
    </td>
<td>
    <i class="fas fa-check add" id="edit" onclick="update({{ $sensor->id}})"></i>
    <i class="fas fa-times cancel" onclick="cancel()"></i>
</td>


