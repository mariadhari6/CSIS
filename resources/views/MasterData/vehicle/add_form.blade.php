<tr>
    <td></td>
    <td></td>
    
    <td>
        <select class="select" id="company_id">
            <option style="display: none"></option>
            @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
            @endforeach
        </select>
    </td>
    <td><div class="input-div"><input type="text" class="input" id="license_plate"></td>
    <td>
        <select class="select" id="vehicle_id">
            <option style="display: none"></option>
            @foreach ($vehicleType as $item)
                <option value="{{ $item->id }}" {{ old('vehicle_id') == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </td>
    <td><div class="input-div"><input type="text" class="input" id="pool_name" required></td>
    <td><div class="input-div"><input type="text" class="input" id="pool_location" required></td>
    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>

</tr>
