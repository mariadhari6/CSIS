    <td></td>
    <td></td>
    <td>
        <select class="select sensor_name-{{$sensor->id}}" id="sensor_name" name="sensor_name" >
            <option class="hidden" value="{{$sensor->sensor_name}}">{{$sensor->sensor_name}}</option>

            @foreach ($sensorName as $item)
            <option value="{{ $item->id }}" {{ old('sensor_name') == $item->id ? 'selected':'' }}>{{ $item->sensor_name}}</option>
            @endforeach

        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input merk_sensor-{{$sensor->id}}" id="merk_sensor" placeholder="Merk sensor" value="{{ $sensor->merk_sensor}}" required></div>
    </td>

    <td>
        <div class="input-div"><input type="text" class="input serial_number-{{$sensor->id}}" id="serial_number" placeholder="Serial Number" value="{{ $sensor->serial_number}}" required></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input rab_number-{{$sensor->id}}" id="rab_number" placeholder="Rab Number" value="{{ $sensor->rab_number}}" required></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input waranty-{{$sensor->id}}" id="waranty" placeholder="Waranty" value="{{ $sensor->waranty}}" ></div>
    </td>
    <td>
        <select class="select status-{{$sensor->id}}" id="status" aria-label=".form-select-lg example" >
            <option selected class="hidden" value="{{$sensor->status}}">{{$sensor->status}}</option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select>
    </td>
     <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $sensor->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>

