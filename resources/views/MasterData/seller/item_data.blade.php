<<<<<<< HEAD
@foreach ($seller as $sellers)
    <tr id="edit-form-{{ $sellers->id }}">
         <td id="td-checkbox-{{ $sellers->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$sellers->id}}">
=======
@foreach ($seller as $item)
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
        <td id="td-button-{{ $sellers->id }}">
            <div id="button-{{ $sellers->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $sellers->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $sellers->id }})"></i>
            </div>
        </td>
        {{-- <td id="item-company_id-{{ $sellers->id}}">
                {{ $sellers->company->company_name}}
        </td> --}}
        <td id="item-seller_name-{{ $sellers->id}}">
            {{ $sellers->seller_name }}
        </td>
          <td id="item-seller_code-{{ $sellers->id }}">
            {{ $sellers->seller_code }}
        </td>
          <td id="item-no_agreement_letter-{{ $sellers->id }}">
            {{ $sellers->no_agreement_letter }}
        </td>
          <td id="item-status-{{ $sellers->id }}">
            {{ $sellers->status }}
          </td>
=======
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
        <td id="item-seller_name-{{ $item->id}}">
            {{ $item->seller_name }}
        </td>
        <td id="item-seller_code-{{ $item->id }}">
            {{ $item->seller_code }}
        </td>
            <td id="item-no_agreement_letter-{{ $item->id }}">
            {{ $item->no_agreement_letter }}
        </td>
        <td id="item-status-{{ $item->id }}">
            {{ $item->status }}
        </td>
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
    </tr>
@endforeach

