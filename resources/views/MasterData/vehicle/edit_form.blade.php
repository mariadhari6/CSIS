 <td></td>
 <td></td>

    <td>
        <select class="select company_id-{{$vehicle->id}}" id="company_id" name="company_id" required>
            <option class="hidden" value="{{$vehicle->company_id}}">{{$vehicle->company->company_name}}</option>
            @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ $item->id == $vehicle->company_id ? 'selected' : '' }}>{{ $item->company_name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input license_plate-{{$vehicle->id}}" id="license_plate" value="{{ $vehicle->license_plate }}" required></div>
    </td>
    <td>
        <select class="select vehicle_id-{{$vehicle->id}}" id="vehicle_id" name="vehicle_id" required>
            <option class="hidden" value="{{$vehicle->vehicle_id}}">{{$vehicle->vehicleType->name}}</option>
            @foreach ($vehicleType as $item)
                <option value="{{ $item->id }}" {{ $item->id == $vehicle->vehicle_id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input pool_name-{{$vehicle->id}}" id="pool_name" value="{{ $vehicle->pool_name }}" required></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input pool_location-{{$vehicle->id}}" id="pool_location" value="{{ $vehicle->pool_location }}" required></div>
    </td>
    <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $vehicle->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
