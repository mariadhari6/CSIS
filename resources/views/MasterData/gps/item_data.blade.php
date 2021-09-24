<<<<<<< HEAD
@foreach ($gps as $gpses)
    <tr id="edit-form-{{ $gpses->id }}">
         <td id="td-checkbox-{{ $gpses->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$gpses->id}}">
=======
@foreach ($gps as $item)
    <tr id="edit-form-{{ $item->id }}">
         <td id="td-checkbox-{{ $item->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
<<<<<<< HEAD
        <td id="td-button-{{ $gpses->id }}">
            <div id="button-{{ $gpses->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $gpses->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $gpses->id }})"></i>
=======
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
            </div>
        </td>
        {{-- <td id="item-company_id-{{ $sellers->id}}">
                {{ $sellers->company->company_name}}
        </td> --}}
<<<<<<< HEAD
        <td id="item-merk-{{ $gpses->id}}">
            {{ $gpses->merk }}
        </td>
          <td id="item-type-{{ $gpses->id }}">
            {{ $gpses->type }}
        </td>
          <td id="item-imei-{{ $gpses->id }}">
            {{ $gpses->imei }}
        </td>
        <td id="item-waranty-{{ $gpses->id }}">
            {{ $gpses->waranty }}
        </td>
        <td id="item-po_date-{{ $gpses->id }}">
            {{ $gpses->po_date }}
        </td>
          <td id="item-status-{{ $gpses->id }}">
            {{ $gpses->status }}
          </td>
          <td id="item-status_ownership-{{ $gpses->id }}">
            {{ $gpses->status_ownership }}
          </td>
    </tr>
@endforeach
=======
        <td id="item-merk-{{ $item->id}}">
            {{ $item->merk }}
        </td>
          <td id="item-type-{{ $item->id }}">
            {{ $item->type }}
        </td>
          <td id="item-imei-{{ $item->id }}">
            {{ $item->imei }}
        </td>
        <td id="item-waranty-{{ $item->id }}">
            {{ $item->waranty }}
        </td>
        <td id="item-po_date-{{ $item->id }}">
            {{ $item->po_date }}
        </td>
          <td id="item-status-{{ $item->id }}">
            {{ $item->status }}
          </td>
          <td id="item-status_ownership-{{ $item->id }}">
            {{ $item->status_ownership }}
          </td>
    </tr>
@endforeach

>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
