<tr >
    <td></td>
    <td></td>
    <td>
        <select class="select" id="sensor_name" name="sensor_name" aria-placeholder="Sensor_name">
<<<<<<< HEAD
            <option style="display:none;"></option>
=======
            <option class="hidden">--Pilih Sensor Name--</option>

>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            @foreach ($sensorName as $item)
            <option value="{{ $item->sensor_name }}" {{ old('sensor_name') == $item->id ? 'selected':'' }}>{{ $item->sensor_name}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="merk_sensor">
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="serial_number" required>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="rab_number" required>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="waranty" >
    </td>
    <td>
        <select class="select" id="status" aria-label=".form-select-lg example" >
<<<<<<< HEAD
            <option style="display:none;"></option>
=======
            <option selected class="hidden">--Pilih Status--</option>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select>
    </td>
     <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
</tr>

