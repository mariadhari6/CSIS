<?php $no=1; ?>
@foreach ($company as $item)
    <tr id="edit-form-{{ $item->id }}">
        <td id="td-checkbox-{{ $item->id }}">
            <div>
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="item-no-{{ $item->id}}">
            {{ $no++ }}
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
            @endif
        </td>
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach

