@foreach ($pemasangan_mutasi_GPS as $pemasangan_mutasi_GPSes)
    <tr id="edit-form-{{ $pemasangan_mutasi_GPSes->id }}">
         <td id="td-checkbox-{{ $pemasangan_mutasi_GPSes->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$pemasangan_mutasi_GPSes->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="td-button-{{ $pemasangan_mutasi_GPSes->id }}">
            <div id="button-{{ $pemasangan_mutasi_GPSes->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $pemasangan_mutasi_GPSes->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $pemasangan_mutasi_GPSes->id }})"></i>
            </div>
        </td>

        <td id="item-company_id-{{ $pemasangan_mutasi_GPSes->id}}">
            {{ $pemasangan_mutasi_GPSes->requestComplain->companyRequest->company_name}}
        </td>
          <td id="item-tanggal-{{ $pemasangan_mutasi_GPSes->id }}">
            {{ $pemasangan_mutasi_GPSes->requestComplain->waktu_kesepakatan }}
        </td>
        <td id="item-kendaraan_awal-{{ $pemasangan_mutasi_GPSes->id}}">
                {{ $pemasangan_mutasi_GPSes->requestComplain->vehicle}}
        </td>
          <td id="item-imei-{{ $pemasangan_mutasi_GPSes->id }}">
            {{ $pemasangan_mutasi_GPSes->detailCustomer->imei}}
        </td>
          <td id="item-gsm_pemasangan-{{ $pemasangan_mutasi_GPSes->id }}">
            {{ $pemasangan_mutasi_GPSes->detailCustomer->gsm}}
        </td>

        <td id="item-kendaraan_pasang-{{ $pemasangan_mutasi_GPSes->id }}">
            {{ $pemasangan_mutasi_GPSes->requestComplain->vehicle}}
        </td>
        <td id="item-jenis_pekerjaan-{{ $pemasangan_mutasi_GPSes->id }}">
            {{ $pemasangan_mutasi_GPSes->requestComplain->task}}
        </td>

        <td id="item-equipment_terpakai_gps-{{ $pemasangan_mutasi_GPSes->id }}">
            {{$pemasangan_mutasi_GPSes->gps->type}}
        </td>

        <td id="item-equipment_terpakai_sensor-{{ $pemasangan_mutasi_GPSes->id }}">
            {{$pemasangan_mutasi_GPSes->sensor->sensor_name}}
        </td>

        <td id="item-teknisi-{{ $pemasangan_mutasi_GPSes->id }}">
            {{ $pemasangan_mutasi_GPSes->teknisi}}
        </td>
         <td id="item-uang_transportasi-{{ $pemasangan_mutasi_GPSes->id }}">
        <span>Rp. </span>{{ number_format( $pemasangan_mutasi_GPSes->uang_transportasi)}}

        </td>
         <td id="item-type_visit-{{ $pemasangan_mutasi_GPSes->id }}">
            {{ $pemasangan_mutasi_GPSes->type_visit}}
        </td>
        <td id="item-note-{{ $pemasangan_mutasi_GPSes->id }}">
            {{ $pemasangan_mutasi_GPSes->note }}
        </td>
    </tr>
@endforeach

