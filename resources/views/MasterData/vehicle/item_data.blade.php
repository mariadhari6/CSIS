@foreach ($vehicle as $item)
    <tr id="edit-form-{{ $item->id }}">
        <td id="td-checkbox-{{ $item->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
        <td id="item-company_id-{{ $item->id}}">
            {{ $item->company->company_name }}
        </td>
        <td id="item-license_plate-{{ $item->id}}">
                {{ $item->license_plate }} 
        </td>
        <td id="item-vehicle_id-{{ $item->id }}">
            {{ $item->vehicle->name }}
        </td>
        <td id="item-pool_name-{{ $item->id}}">
                {{ $item->pool_name }} 
        </td>
        <td id="item-pool_location-{{ $item->id}}">
            {{ $item->pool_location }} 
        </td>        
    </tr>
@endforeach

