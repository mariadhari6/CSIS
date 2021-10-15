<?php $no=1; ?>
@foreach ($maintenanceGps as $item)
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
            {{ $item->companyRequest->company_name }}
        </td>
        <td id="item-vehicle-{{ $item->id}}">
            {{ $item->vehicle }}
        </td>
        <td id="item-waktu_kesepakatan-{{ $item->id }}">
            {{ $item->waktu_kesepakatan }}
        </td>
        <td id="item-type_gps_id-{{ $item->id }}">
            {{ $item->gpsMaintenance->typeGps->type_gps?? ''}}
        </td>
        <td id="item-equipment_gps_id-{{ $item->id }}">
            {{ $item->gpsMaintenance->typeGps->type_gps?? '' }}
        </td>
        <td id="item-equipment_sensor_id-{{ $item->id}}">
            {{ $item->sensorMaintenance->sensor_name?? '' }}
        </td>
        <td id="item-equipment_gsm-{{ $item->id}}">
            {{ $item->gsm->gsm_number}}
        </td>
        <td id="item-task-{{ $item->id}}">
            {{ $item->taskRequest->task }}
        </td>
        <td id="item-ketersediaan_kendaraan-{{ $item->id}}">
            {{ $item->ketersediaan_kendaraan }}
        </td>
        <td id="item-keterangan-{{ $item->id}}">
            {{ $item->keterangan }}
        </td>
        <td id="item-hasil-{{ $item->id}}">
            {{ $item->hasil }}
        </td>
        <td id="item-biaya_transportasi-{{ $item->id}}">
        <span>Rp. </span>{{ number_format( $item->biaya_transportasi)}}

        </td>
        <td id="item-teknisi_maintenance-{{ $item->id}}">
            {{ $item->teknisiMaintenance->teknisi_name??'' }}
        </td>
        <td id="item-req_by-{{ $item->id}}">
            {{ $item->req_by }}
        </td>
        <td id="item-note_maintenance-{{ $item->id}}">
            {{ $item->note_maintenance }}
        </td>
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                {{-- <button onclick="edit({{ $item->id }})">edit</button> --}}
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
                {{-- <button onclick="destroy({{ $item->id }})">hapus</button> --}}
            </div>
        </td>
    </tr>
@endforeach

