@foreach ($gps as $item)
    <tr>
        <td type="hide" class="temporary-id-{{ $item->id }}" id="{{ $item->id }}" >
            {{ $item->id }}
        </td>
        <td class="temporary-merk-{{$item->id}}" id="{{ $item->merk }}" >
            {{ $item->merkGps->merk }}
        </td>
        <td class="temporary-type-{{$item->id}}" id="{{ $item->type }}">
            {{ $item->typeGps->type }}
        </td>
        <td class="temporary-imei-{{$item->id}}" id="{{ $item->imei}}">
            {{ $item->imei }}
        </td>
        <td class="temporary-waranty-{{$item->id}}" id="{{ $item->waranty }}">
            {{ $item->waranty }}
        </td>
        <td class="temporary-po_date-{{$item->id}}" id="{{ $item->po_date }}">
            {{ $item->po_date }}
        </td>
        <td class="temporary-status-{{$item->id}}" id="{{ $item->status }}">
            {{ $item->status }}
        </td>
        <td class="temporary-status_ownership-{{$item->id}}" id="{{ $item->status_ownership }}">
            {{ $item->status_ownership }}
        </td>

    </tr>
@endforeach

