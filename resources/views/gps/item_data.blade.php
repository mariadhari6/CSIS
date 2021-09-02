@foreach ($gps as $gps)
    <tr id="edit-form-{{ $gps->id }}">
        <td id="td-button-{{ $gps->id }}">
            <div id="button-{{ $gps->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $gps->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $gps->id }})"></i>
            </div>
        </td>
        <td id="item-merk-{{ $gps->id}}">
                {{ $gps->merk}}
        </td>
        <td id="item-type-{{ $gps->id}}">
            {{ $gps->type }}
        </td>
          <td id="item-imei-{{ $gps->id }}">
            {{ $gps->imei }}
        </td>
          <td id="item-waranty-{{ $gps->id }}">
            {{ $gps->waranty }}
        </td>
          <td id="item-po_date-{{ $gps->id }}">
            {{ $gps->po_date }}
        </td>
        <td id="item-status-{{ $gps->id }}">
            {{ $gps->status }}
        </td>
    </tr>
@endforeach