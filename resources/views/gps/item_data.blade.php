<<<<<<< HEAD
@foreach ($gps as $gpses)
    <tr id="edit-form-{{ $gpses->id }}">
         <td id="td-checkbox-{{ $gpses->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$gpses->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="td-button-{{ $gpses->id }}">
            <div id="button-{{ $gpses->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $gpses->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $gpses->id }})"></i>
            </div>
        </td>
        {{-- <td id="item-company_id-{{ $sellers->id}}">
                {{ $sellers->company->company_name}}
        </td> --}}
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
    </tr>
@endforeach

=======
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
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
