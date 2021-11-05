<?php $no=1; ?>
<<<<<<< HEAD
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
=======
@foreach ($seller as $item)
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

        <td id="item-seller_name-{{ $item->id}}">
            {{ $item->seller_name }}
        </td>
        <td id="item-seller_code-{{ $item->id }}">
            {{ $item->seller_code }}
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
        </td>
            <td id="item-no_agreement_letter-{{ $item->id }}">
            {{ $item->no_agreement_letter }}
        </td>
        <td id="item-status-{{ $item->id }}">
            {{ $item->status }}
        </td>
<<<<<<< HEAD
          <td id="item-status-{{ $sellers->id }}">
            {{ $sellers->status }}
          </td>
          <td id="td-button-{{ $sellers->id }}">
            <div id="button-{{ $sellers->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $sellers->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $sellers->id }})"></i>
            </div>
        </td>
=======
           <td class="action sticky-col first-col" id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>

>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
    </tr>
@endforeach

