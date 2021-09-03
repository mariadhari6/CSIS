@foreach ($company as $companys)
    <tr id="edit-form-{{ $companys->id }}">
        <td id="td-checkbox-{{ $companys->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$companys->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
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
        </td>
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
            {{ $companys->status }}
        </td>
    </tr>
@endforeach

