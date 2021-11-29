    <td></td>
    <td></td>
    <td>
<<<<<<< HEAD
        <select class="select company_id-{{$vehicle->id}}" id="company_id" name="company_id">
=======
        <select class="select company_id-{{$vehicle->id}}" id="company_id" name="company_id" required>
            <option class="hidden" value="{{$vehicle->company_id}}">{{$vehicle->company->company_name}}</option>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ $item->id == $vehicle->company_id ? 'selected' : '' }}>{{ $item->company_name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input license_plate-{{$vehicle->id}}" id="license_plate" value="{{ $vehicle->license_plate }}"></div>
    </td>
    <td>
<<<<<<< HEAD
        <select class="select vehicle_id-{{$vehicle->id}}" id="vehicle_id" name="vehicle_id">
=======
        <select class="select vehicle_id-{{$vehicle->id}}" id="vehicle_id" name="vehicle_id" required>
            <option class="hidden" value="{{$vehicle->vehicle_id}}">{{$vehicle->vehicle->name}}</option>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            @foreach ($vehicleType as $item)
                <option value="{{ $item->id }}" {{ $item->id == $vehicle->vehicle_id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input pool_name-{{$vehicle->id}}" id="pool_name" value="{{ $vehicle->pool_name }}"></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input pool_location-{{$vehicle->id}}" id="pool_location" value="{{ $vehicle->pool_location }}"></div>
    </td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $vehicle->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
