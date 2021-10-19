    <td></td>
    <td></td>
    <td>
        <div class="input-div"><input type="text" class="input sensor_name-{{$sensor->id}}" id="sensor_name" placeholder="Sensor Name" value="{{ $sensor->sensor_name}}" required></div>
    </td>
    <td>
        <select class="select merk_sensor-{{$sensor->id}}" id="merk_sensor" name="merk_sensor" required>
            <option value="{{$sensor->merk_sensor}}">{{$sensor->sensorMerk->merk_sensor}}</option>

            @foreach ($merk_sensor as $item)
            <option value="{{ $item->id }}" {{ old('merk_sensor') == $item->id ? 'selected':'' }}>{{ $item->merk_sensor}}</option>
            @endforeach

        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input serial_number-{{$sensor->id}}" id="serial_number" placeholder="Serial Number" value="{{ $sensor->serial_number}}" required></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input rab_number-{{$sensor->id}}" id="rab_number" placeholder="Rab Number" value="{{ $sensor->rab_number}}" required></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input waranty-{{$sensor->id}}" id="waranty" placeholder="Waranty" value="{{ $sensor->waranty}}" required></div>
    </td>
    <td>
        <select class="select status-{{$sensor->id}}" id="status" aria-label=".form-select-lg example" required>
            <option selected>{{$sensor->status}}</option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select>
    </td>
     <td>
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $sensor->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>

