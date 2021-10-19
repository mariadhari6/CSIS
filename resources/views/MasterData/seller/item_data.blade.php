<?php $no=1; ?>
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
        </td>
            <td id="item-no_agreement_letter-{{ $item->id }}">
            {{ $item->no_agreement_letter }}
        </td>
        <td id="item-status-{{ $item->id }}">
            {{ $item->status }}
        </td>
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach

