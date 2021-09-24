<<<<<<< HEAD
@foreach ($pic as $pics)
    <tr id="edit-form-{{ $pics->id }}">
         <td id="td-checkbox-{{ $pics->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$pics->id}}">
=======
@foreach ($pic as $item)
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
        <td id="td-button-{{ $pics->id }}">
            <div id="button-{{ $pics->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $pics->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $pics->id }})"></i>
            </div>
        </td>
        <td id="item-company_id-{{ $pics->id}}">
                {{ $pics->company->company_name}}
        </td>
        <td id="item-pic_name-{{ $pics->id}}">
            {{ $pics->pic_name }}
            </td>
         <td id="item-phone-{{ $pics->id }}">
            {{ $pics->phone }}
        </td>
        <td id="item-email-{{ $pics->id }}">
            {{ $pics->email }}
        </td>
          <td id="item-position-{{ $pics->id }}">
            {{ $pics->position }}
        </td>
        <td id="item-date_of_birth-{{ $pics->id }}">
            {{ $pics->date_of_birth }}
=======
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
        <td id="item-company_id-{{ $item->id}}">
            {{ $item->company->company_name}}
        </td>
        <td id="item-pic_name-{{ $item->id}}">
            {{ $item->pic_name }}
        </td>
         <td id="item-phone-{{ $item->id }}">
            {{ $item->phone }}
        </td>
          <td id="item-email-{{ $item->id }}">
            {{ $item->email }}
        </td>
          <td id="item-position-{{ $item->id }}">
            {{ $item->position }}
        </td>
        <td id="item-date_of_birth-{{ $item->id }}">
            {{ $item->date_of_birth }}
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
        </td>
    </tr>
@endforeach

