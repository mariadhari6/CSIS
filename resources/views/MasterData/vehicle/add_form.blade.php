<tr>
    <td></td>
    <td></td>
    
    <td>
<<<<<<< HEAD
        <select class="select" id="company_id">
            <option style="display: none"></option>
=======
        <select class="select" id="company_id" required>
            <option value="" class="hidden">--Pilih Company--</option>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
            @endforeach
        </select>
    </td>
<<<<<<< HEAD
    <td><div class="input-div"><input type="text" class="input" id="license_plate"></td>
    <td>
        <select class="select" id="vehicle_id">
            <option style="display: none"></option>
=======
    <td><div class="input-div"><input type="text" placeholder="License Plate" class="input" id="license_plate" required></td>
    <td>
        <select class="select" id="vehicle_id" required>
            <option value="" class="hidden">--Pilih Vehicle--</option>

>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            @foreach ($vehicleType as $item)
                <option value="{{ $item->id }}" {{ old('vehicle_id') == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </td>
    <td><div class="input-div"><input type="text" placeholder="Pool Name" class="input" id="pool_name" required></td>
    <td><div class="input-div"><input type="text" placeholder="Pool Location" class="input" id="pool_location" required></td>
    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>

</tr>
