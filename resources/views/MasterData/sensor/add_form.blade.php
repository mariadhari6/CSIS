<tr >
    <td></td>
    <td></td>
    <td> 
        <select class="select" id="sensor_name" name="sensor_name">
            <option value="" ></option>
            @foreach ($sensor as $item)
                <option value="{{ $item->sensor_name }}" {{ old('sensor_name') == $item->id ? 'selected':'' }}>{{ $item->sensor_name }}</option>
            @endforeach
        </select>     
    </td>
    <td> <div class="input-div"><input type="text" class="input" id="merk_sensor" placeholder="Merk Sensor"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="serial_number" placeholder="Serial Number"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="rab_number" placeholder="Rab Number"></i></td>
    <td> <div class="input-div"><input type="date" class="input" id="waranty" placeholder="Waranty"></i></td>
    <td>
        <select class="select" id="status" aria-label=".form-select-lg example">
            <option selected>Pilih status</option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select>
    </td>
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
</tr>

