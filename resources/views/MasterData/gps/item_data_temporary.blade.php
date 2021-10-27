@foreach ($gps as $item)
    <tr>
        <td type="hide" class="temporary-id-{{ $item->id }}" id="{{ $item->id }}" >
            {{ $item->id }}
        </td>
        <td bgcolor='{{$item->merk== "" ? "ff8080" : ""}}' class="temporary-merk-{{$item->id}}" id="{{ $item->merk }}" >
            {{ $item->merk == "" ? "column empty or fail format" : $item->merkGps->merk}}
        </td>
        <td bgcolor='{{$item->type== "" ? "ff8080" : ""}}' class="temporary-type-{{$item->id}}" id="{{ $item->type }}">
            {{ $item->type == "" ? "column empty or fail format" : $item->typeGps->type_gps}}
        </td>
        <td bgcolor='{{$item->imei== "" ? "ff8080" : ""}}'  class="temporary-imei-{{$item->id}}" id="{{ $item->imei}}">
            {{ $item->imei == "" ? "column empty or fail format" : $item->imei }}
        </td>
        <td bgcolor='{{$item->waranty== "" ? "ff8080" : ""}}' class="temporary-waranty-{{$item->id}}" id="{{ $item->waranty }}">
            {{ $item->waranty== "" ? "column empty or fail format" : $item->waranty }}
        </td>
        <td bgcolor='{{$item->po_date== "" ? "ff8080" : ""}}' class="temporary-po_date-{{$item->id}}" id="{{ $item->po_date }}">
            {{ $item->po_date == "" ? "column empty or fail format" : $item->po_date }}
        </td>
        <td bgcolor='{{$item->status== "" ? "ff8080" : ""}}' class="temporary-status-{{$item->id}}" id="{{ $item->status }}">
            {{ $item->status == "" ? "column empty or fail format" : $item->status }}
        </td>
        <td bgcolor='{{$item->status_ownership== "" ? "ff8080" : ""}}' class="temporary-status_ownership-{{$item->id}}" id="{{ $item->status_ownership }}">
            {{ $item->status_ownership == "" ? "column empty or fail format" : $item->status_ownership }}
        </td>

    </tr>
@endforeach

