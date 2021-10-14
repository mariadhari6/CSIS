<tr id="add_form">
    <td></td>
    <td></td>

    <td>
        <div class="input-div"><input type="text" class="input" id="sensor_name" placeholder="Sensor Name">
    </td>
    <td>
        <select class="select" id="merk_sensor" name="merk_sensor">
            <option selected disabled>Merk Sensor</option>

            @foreach ($merk_sensor as $item)
            <option value="{{ $item->id }}" {{ old('merk_sensor') == $item->id ? 'selected':'' }}>{{ $item->merk_sensor}}</option>
            @endforeach

        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="serial_number" placeholder="Serial Number">
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="rab_number" placeholder="Rab Number">
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="waranty" placeholder="Waranty">
    </td>
    <td>
        <select class="select" id="status" aria-label=".form-select-lg example">
            <option selected>Pilih status</option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select>
    </td>
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()">
    </td>
</tr>

