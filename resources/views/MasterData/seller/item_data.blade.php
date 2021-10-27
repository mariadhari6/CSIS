<?php $no=1; ?>
@foreach ($seller as $sellers)
    <tr id="edit-form-{{ $sellers->id }}">
        <td id="td-checkbox-{{ $sellers->id }}">  
          <label class="form-check-label">
            <input class="form-check-input task-select" type="checkbox" id="{{$sellers->id}}">
            <span class="form-check-sign"></span>
          </label>      
        </td>
        <td id="item-no-{{ $sellers->id}}">
          {{ $no++}}
        </td>
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
          <td id="td-button-{{ $sellers->id }}">
            <div id="button-{{ $sellers->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $sellers->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $sellers->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach

