<?php $no=1; ?>
@foreach ($request_complain as $item)
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
            {{ $item->company->company_name}}
        </td>
          <td id="item-internal_eksternal-{{ $item->id }}">
            {{ $item->internal_eksternal }}
        </td>
        <td id="item-pic-{{ $item->id}}">
                {{ $item->pic->pic_name}}
        </td>
          <td id="item-vehicle-{{ $item->id }}">
            {{ $item->vehicleRequest->license_plate?? ''}}
        </td>
          <td id="item-waktu_info-{{ $item->id }}">
            {{ $item->waktu_info}}
        </td>
        <td id="item-task-{{ $item->id }}">
            {{ $item->task}}
        </td>
        <td id="item-platform-{{ $item->id }}">
        {{ $item->platform}}
        </td>
        <td id="item-detail_task-{{ $item->id }}">
            {{ $item->detail_task}}
        </td>
        <td id="item-divisi-{{ $item->id }}">
            {{ $item->divisi}}
        </td>
        <td id="item-waktu_respond-{{ $item->id }}">
            {{ $item->waktu_respond}}
        </td>
        <td id="item-respond-{{ $item->id }}">
            {{ $item->respond}}
        </td>
         <td id="item-waktu_kesepakatan-{{ $item->id }}">
            {{ $item->waktu_kesepakatan}}
        </td>
         <td id="item-waktu_solve-{{ $item->id }}">
            {{ $item->waktu_solve}}
        </td>
        <td id="item-status-{{ $item->id }}">
            {{ $item->status }}
        </td>
        <td id="item-status_akhir-{{ $item->id }}">
            {{ $item->status_akhir }}
        </td>
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach
