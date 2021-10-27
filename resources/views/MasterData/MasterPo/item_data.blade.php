<?php $no=1; ?>
@foreach ($master_po as $item)
    <tr id="edit-form-{{ $item->id }}">
         <td id="td-checkbox-{{ $item->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="item-no-{{ $item->id}}">
            {{ $no++ }}
        </td>
        <td id="item-company_id-{{ $item->id}}">
            {{ $item->company->company_name ??''}}
        </td>
        <td id="item-po_number-{{ $item->id}}">
            {{ $item->po_number }}
        </td>
          <td id="item-po_date-{{ $item->id }}">
            {{ $item->po_date }}
        </td>
        <td id="item-harga_layanan-{{ $item->id}}">
            {{ $item->harga_layanan }}
        </td>
          <td id="item-jumlah_unit_po-{{ $item->id }}">
            {{ $item->jumlah_unit_po }}
        </td>
        <td id="item-status_po-{{ $item->id }}">
            {{ $item->status_po }}
        </td>
        <td id="item-selles-{{ $item->id }}">
            {{ $item->selles }}
        </td>

        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach
