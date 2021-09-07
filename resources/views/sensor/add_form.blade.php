<tr id="add_form">
    <td></td>
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>

    {{-- <td> <div class="input-div"><input type="text" class="input" id="seller_id" placeholder="Seller id"></i></div></td> --}}
    <td> <div class="input-div"><input type="text" class="input" id="sensor_name" placeholder="Sensor Name"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="merk_sensor" placeholder="Merk Sensor"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="serial_number" placeholder="Serial Number"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="rab_number" placeholder="Rab Number"></i></td>
    <td> <div class="input-div"><input type="date" class="input" id="waranty" placeholder="Waranty"></i></td>
    {{-- <td> <div class="input-div"><input type="text" class="input" id="status" placeholder="Status"></i></td> --}}
    {{-- <td> <div class="input-div"><input type="text" class="input" id="status" placeholder="Status"></i></td> --}}
    <td><select class="form-select" id="status" aria-label=".form-select-lg example">
    <option selected>Pilih status</option>
    <option value="Active">Active</option>
    <option value="In Active">In Active</option>
    </select></i></td>
</tr>