<?php $no=1;  ?>
@foreach ($company as $companys)
    <tr id="edit-form-{{ $companys->id }}">
        <td id="td-checkbox-{{ $companys->id }}">        
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$companys->id}}">
                    <span class="form-check-sign"></span>
                </label>
        </td>
        <td id="item-no-{{ $companys->id}}">
            {{ $no++ }}
        </td>
        <td id="item-company_name-{{ $companys->id}}">
            {{ $companys->company_name }}
        </td>
        <td id="item-seller_id-{{ $companys->id}}">
                {{ $companys->seller->seller_name }} 
        </td>
        <td id="item-customer_code-{{ $companys->id }}">
            {{ $companys->customer_code }}
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
            @endif
        </td>
        <td id="td-button-{{ $companys->id }}">
            <div id="button-{{ $companys->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $companys->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $companys->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach

