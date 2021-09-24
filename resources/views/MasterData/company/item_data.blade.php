<<<<<<< HEAD
@foreach ($company as $companys)
    <tr id="edit-form-{{ $companys->id }}">
        <td id="td-checkbox-{{ $companys->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$companys->id}}">
=======
@foreach ($company as $item)
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
        <td id="td-button-{{ $companys->id }}">
            <div id="button-{{ $companys->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $companys->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $companys->id }})"></i>
            </div>
        </td>
        <td id="item-company_name-{{ $companys->id}}">
            {{ $companys->company_name }}
        </td>
        <td id="item-seller_id-{{ $companys->id}}">
                {{ $companys->seller->seller_name}}
        </td>
        <td id="item-customer_code-{{ $companys->id }}">
            {{ $companys->customer_code }}
          <td id="item-no_po-{{ $companys->id }}">
            {{ $companys->no_po }}
        </td>
        <td id="item-po_date-{{ $companys->id }}">
            {{ $companys->po_date }}
        </td>
        <td id="item-no_agreement_letter_id-{{ $companys->id}}">
                {{ $companys->seller->no_agreement_letter}}
        </td>
        <td id="item-status-{{ $companys->id }}">
        @if ($companys->status == 'Contract')
                <span class="badge badge-info">{{ $companys->status }}</span>
            @elseif ($companys->status == 'Terminate')
                <span class="badge badge-danger">{{ $companys->status }}</span>
            @elseif($companys->status == 'Trial')
                <span class="badge badge-primary">{{ $companys->status }}</span>
            @elseif($companys->status == 'Register')
                <span class="badge badge-success">{{ $companys->status }}</span>
=======
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
        <td id="item-company_name-{{ $item->id}}">
            {{ $item->company_name }}
        </td>
        <td id="item-seller_id-{{ $item->id}}">
            {{ $item->seller->seller_name}}
        </td>
        <td id="item-customer_code-{{ $item->id }}">
            {{ $item->customer_code }}
        </td>
          <td id="item-no_po-{{ $item->id }}">
            {{ $item->no_po }}
        </td>
        <td id="item-po_date-{{ $item->id }}">
            {{ $item->po_date }}
        </td>

        <td id="item-no_agreement_letter_id-{{ $item->id}}">
                {{ $item->seller->no_agreement_letter}}
        </td>
        <td id="item-status-{{ $item->id }}">

            @if ($item->status == 'Contract')
                <span class="badge badge-info">{{ $item->status }}</span>
            @elseif ($item->status == 'Terminate')
                <span class="badge badge-danger">{{ $item->status }}</span>
            @elseif($item->status == 'Trial')
                <span class="badge badge-primary">{{ $item->status }}</span>
            @elseif($item->status == 'Register')
                <span class="badge badge-success">{{ $item->status }}</span>
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
            @endif
        </td>
    </tr>
@endforeach

