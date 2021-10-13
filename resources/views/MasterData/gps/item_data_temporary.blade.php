@foreach ($gps as $item)
    <tr>
        <td class="temporary-merk" id="{{ $item->merk }}" >
            {{ $item->merkGps->merk }}
        </td>
        <td class="temporary-type" id="{{ $item->type }}">
            {{ $item->typeGps->type }}
        </td>
        <td class="temporary-imei" id="{{ $item->imei}}">
            {{ $item->imei }}
        </td>
        <td class="temporary-waranty" id="{{ $item->waranty }}">
            {{ $item->waranty }}
        </td>
        <td class="temporary-po_date" id="{{ $item->po_date }}">
            {{ $item->po_date }}
        </td>
        <td class="temporary-status" id="{{ $item->status }}">
            {{ $item->status }}
        </td>
        <td class="temporary-status_ownership" id="{{ $item->status_ownership }}">
            {{ $item->status_ownership }}
        </td>

    </tr>
@endforeach

