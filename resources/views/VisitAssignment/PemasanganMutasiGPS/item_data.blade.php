<?php $no=1; ?>
@foreach ($pemasangan_mutasi_GPS as $item)
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
            {{ $item->requestComplain->companyRequest->company_name}}
        </td>
          <td id="item-tanggal-{{ $item->id }}">
            {{ $item->requestComplain->waktu_kesepakatan }}
        </td>
        <td id="item-kendaraan_awal-{{ $item->id}}">
                {{ $item->requestComplain->vehicle}}
        </td>
          <td id="item-imei-{{ $item->id }}">
            {{ $item->detailCustomer->imei}}
        </td>
          <td id="item-gsm_pemasangan-{{ $item->id }}">
            {{ $item->detailCustomer->gsm}}
        </td>

        <td id="item-kendaraan_pasang-{{ $item->id }}">
            {{ $item->requestComplain->vehicle}}
        </td>
        <td id="item-jenis_pekerjaan-{{ $item->id }}">
            {{ $item->requestComplain->taskRequest->task}}
        </td>

        <td id="item-equipment_terpakai_gps-{{ $item->id }}">
            {{$item->gps->typeGps->type}}
        </td>

        <td id="item-equipment_terpakai_sensor-{{ $item->id }}">
            {{$item->sensor->sensor_name}}
        </td>

        <td id="item-teknisi-{{ $item->id }}">
            {{ $item->teknisiPemasangan->teknisi_name}}
        </td>
         <td id="item-uang_transportasi-{{ $item->id }}">
        <span>Rp. </span>{{ number_format( $item->uang_transportasi)}}

        </td>
         <td id="item-type_visit-{{ $item->id }}">
            {{ $item->type_visit}}
        </td>
        <td id="item-note-{{ $item->id }}">
            {{ $item->note }}
        </td>
        <td id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
    </tr>
@endforeach

