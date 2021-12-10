<?php $no=1; ?>

@foreach ($vehicle as $item)
    <tr id="edit-form-{{ $item->id }}">
        <td id="td-checkbox-{{ $item->id }}">
            <div>
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="item-no-{{ $item->id}}">
            {{ $no++ }}
        </td>
        <td id="item-company_id-{{ $item->id}}">
            {{ $item->company->company_name?? '' }}
        </td>
        <td id="item-license_plate-{{ $item->id }}" name="{{$item->license_plate}}" class="item-license_plate-{{$item->id}}">
                {{ $item->license_plate }}
        </td>
        <td id="item-vehicle_id-{{ $item->id }}">
            {{ $item->vehicle->name??'' }}
        </td>
        <td id="item-pool_name-{{ $item->id}}">
                {{ $item->pool_name }}
        </td>
        <td id="item-pool_location-{{ $item->id}}">
            {{ $item->pool_location }}
        </td>
        <td id="item-status-{{ $item->id}}">
            {{ $item->status }}
        </td>

        <td class="action sticky-col first-col" id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach
