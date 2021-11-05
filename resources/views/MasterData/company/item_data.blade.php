<<<<<<< HEAD
<?php $no=1;  ?>
@foreach ($company as $companys)
    <tr id="edit-form-{{ $companys->id }}">
        <td id="td-checkbox-{{ $companys->id }}">        
=======
<?php $no=1; ?>
@foreach ($company as $item)
    <tr id="edit-form-{{ $item->id }}">
        <td id="td-checkbox-{{ $item->id }}">
            <div>
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
        </td>
<<<<<<< HEAD
        <td id="item-no-{{ $companys->id}}">
            {{ $no++ }}
        </td>
        <td id="item-company_name-{{ $companys->id}}">
            {{ $companys->company_name }}
        </td>
        <td id="item-seller_id-{{ $companys->id}}">
                {{ $companys->seller->seller_name }} 
=======
         <td id="item-no-{{ $item->id}}">
            {{ $no++ }}
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
        </td>

        <td id="item-company_name-{{ $item->id}}">
            {{ $item->company_name }}
        </td>
<<<<<<< HEAD
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
=======
        <td id="item-seller_id-{{ $item->id}}">
            {{ $item->seller->seller_name?? ''}}
        </td>
        <td id="item-customer_code-{{ $item->id }}">
            {{ $item->customer_code }}
        </td>

        <td id="item-no_agreement_letter_id-{{ $item->id}}">
                {{ $item->seller->no_agreement_letter?? ''}}
        </td>
        <td id="item-status-{{ $item->id }}">
                {{-- {{ $item->status}} --}}

            @if ($item->status == 'Active')
                <span class="badge badge-info">{{ $item->status }}</span>
            @elseif ($item->status == 'In Active')
                <span class="badge badge-danger">{{ $item->status }}</span>
            @endif
        </td>
         <td class="action sticky-col first-col" id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
            </div>
        </td>
    </tr>
@endforeach

