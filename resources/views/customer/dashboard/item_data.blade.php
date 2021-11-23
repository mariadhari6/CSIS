@foreach ($company as $item)
<tr>
        <td class="sticky-col company-col"" style="text-align: center; border-right: 3px solid black; border-left: 3px solid black"">{{ $item->company->company_name }}</td>
        <td>
            @if (count($item->pic) > 0)
                @foreach ($item->pic as $pic_name)
                    {{ $pic_name->pic_name}}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td>
            @if (count($item->pic) > 0)
                @foreach ($item->pic as $email)
                    {{ $email->email}}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td style="text-align: center">
            @if (count($item->pic) > 0)
                @foreach ($item->pic as $position)
                    {{ $position->position}}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td style="text-align: center; border-right: 3px solid black"">
            @if (count($item->pic) > 0)
                @foreach ($item->pic as $birth)
                    {{ $birth->date_of_birth}}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td style="text-align: center">
            @if (count($item->total_gps_installed) > 0)
                @foreach ($item->total_gps_installed as $total_gps)
                    {{ $total_gps->total_gps_installed}}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td style="text-align: center; border-right: 3px solid black"">
            @if (count($item->total_sensor_installed) > 0)
                @foreach ($item->total_sensor_installed as $total_sensor)
                    @if ( $total_sensor->total_sensor_installed != null)
                        {{ $total_sensor->total_sensor_installed}}<br>
                    @else
                        -
                    @endif
                @endforeach
            @endif
        </td>
        <td style="text-align: center">
            @if (count($item->sensor) > 0)
                @foreach ($item->sensor as $sensor_name)
                    {{ $sensor_name['sensor_name'] }}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td style="text-align: center; border-right: 3px solid black"">
            @if (count($item->sensor) > 0)
                @foreach ($item->sensor as $sensor_name)
                    {{ $sensor_name['sensor_total'] }}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td style="text-align: center">
            @if (count($item->vehicle) > 0)
                @foreach ($item->vehicle as $vehicle_name)
                    {{ $vehicle_name['vehicle_name'] }}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td style="text-align: center; border-right: 3px solid black"">
            @if (count($item->vehicle) > 0)
                @foreach ($item->vehicle as $vehicle_total)
                    {{ $vehicle_total['vehicle_total'] }}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td style="text-align: center">
            @if (count($item->pool) > 0)
                @foreach ($item->pool as $pool_name)
                    {{ $pool_name['pool_name'] }}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td>
            @if (count($item->pool) > 0)
                @foreach ($item->pool as $pool_location)
                    {{ $pool_location['pool_loc'] }}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td>
            -
        </td>
        <td style="text-align: center; border-right: 3px solid black"">
            @if (count($item->pool) > 0)
                @foreach ($item->pool as $pool_total)
                    {{ $pool_total['pool_total'] }}<br>
                @endforeach
            @else
                -
            @endif
        </td>
        <td id="item-fitur-{{ $item->company_id }}">
            @foreach ($item->note as $note)
                @if ($note->fitur_yang_digunakan != null)
                    {{ $note->fitur_yang_digunakan }}<br>
                @else
                    -
                @endif
            @endforeach
        </td>
        <td id="item-business-{{ $item->company_id }}">
            @foreach ($item->note as $note)
                @if ($note->business_type != null)
                    {{ $note->business_type }}<br>
                @else
                    -
                @endif
            @endforeach
        </td>
        <td id="item-description-{{ $item->company_id }}">
            @foreach ($item->note as $note)
                @if ($note->description_business_type != null)
                    {{ $note->description_business_type }}<br>
                @else
                    -
                @endif
            @endforeach
        </td>
        <td id="item-address-{{ $item->company_id }}">
            @foreach ($item->note as $note)
                @if ($note->address != null)
                    {{ $note->address }}<br>
                @else
                    -
                @endif
            @endforeach
        </td>
        <td id="item-coordinate-{{ $item->company_id }}" style="text-align: center">
            @foreach ($item->note as $note)
                @if ($note->coordinate_address != null)
                    {{ $note->coordinate_address }}<br>
                @else
                    -
                @endif
            @endforeach
        </td>
        <td id="item-customer-{{ $item->company_id }}" style="border-right: 3px solid black; text-align: center">
            @foreach ($item->note as $note)
                @if ($note->customer != null)
                    {{ $note->customer }}<br>
                @else
                    -
                @endif
            @endforeach
        </td>
        <td class="sticky-col action-col"  id="item-update-{{ $item->company_id }}" style="border-left: 3px solid black">
            <i class="fas fa-pen edit" style="margin: auto" onclick="edit({{ $item->company_id }})"></i>
        </td>

      </tr>
@endforeach
