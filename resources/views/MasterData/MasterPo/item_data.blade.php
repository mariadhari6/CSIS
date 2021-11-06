<?php $no=1; ?>
@foreach ($master_po as $item)
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
        <td id="item-company_id-{{ $item->id}}">
            {{ $item->company->company_name??''}}
        </td>
        <td id="item-po_number-{{ $item->id}}">
            {{ $item->po_number }}
        </td>
          <td id="item-po_date-{{ $item->id }}">
            {{ $item->po_date }}
        </td>
        <td id="item-harga_layanan-{{ $item->id}}">
        <span>Rp. </span>{{ number_format( $item->harga_layanan)}}

        </td>
          <td id="item-jumlah_unit_po-{{ $item->id }}">
            {{ $item->jumlah_unit_po }}
        </td>
        <td id="item-status_po-{{ $item->id }}">

            @if ($item->status_po == 'Beli')
                <span class="badge badge-info">{{ $item->status_po }}</span>
            @elseif ($item->status_po == 'Trial')
                <span class="badge badge-danger">{{ $item->status_po }}</span>
            @elseif($item->status_po == 'Sewa Beli')
                <span class="badge badge-primary">{{ $item->status_po }}</span>
            @elseif($item->status_po == 'Sewa')
                <span class="badge badge-success">{{ $item->status_po }}</span>
            @endif
        </td>
        <td id="item-selles-{{ $item->id }}">
            {{ $item->selles }}
        </td>
         <td class="action sticky-col first-col"id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>

    </tr>
@endforeach
