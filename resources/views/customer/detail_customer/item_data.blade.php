<?php $no=1; ?>
@foreach ($details as $detail )
<tr id="edit-form-{{ $detail->id }}">
        <td id="td-checkbox-{{ $detail->id }}">
            <div>
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$detail->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="item-no-{{ $detail->id}}">
            {{ $no++ }}  
        </td>
        <td id="item-CompanyId-{{ $detail->id }}">
            {{ $detail->company->company_name}}
        </td>
        <td id="item-LicencePlate-{{ $detail->id }}">
            {{ $detail->vehicle->license_plate}}
        </td>
        <td id="item-VihecleType-{{ $detail->id }}">
            {{ $detail->vehicle->vehicle->name}}
        </td>
        <td id="item-PoNumber-{{ $detail->id }}">
            {{ $detail->po->po_number }}
        </td>
        <td id="item-HargaLayanan-{{ $detail->id }}">
            {{ $detail->po->harga_layanan }} 
        </td>
        <td id="item-PoDate-{{ $detail->id }}">
            {{ date('d-M-Y', strtotime($detail->po->po_date))}}
        </td>
        <td id="item-StatusPo-{{ $detail->id }}">
            {{ $detail->po->status_po }}
        </td>
        <td id="item-Imei-{{ $detail->id }}">
            {{ $detail->gps->imei }}
        </td>
        <td id="item-Merk-{{ $detail->id }}">
            {{ $detail->gps->merk }}
        </td>
        <td id="item-Type-{{ $detail->id }}">
            {{ $detail->gps->type }}
        </td>
        <td id="item-GSM-{{ $detail->id }}">
            {{ $detail->gsm->gsm_number }}
        </td>
        <td id="item-Provider-{{ $detail->id }}">
            {{ $detail->gsm->provider }}
        </td>
        <td id="item-SensorAll-{{ $detail->id }}">
            @if ($detail->sensor_all_name == "")
                -
            @else
                <i class="fas fa-eye" data-toggle="popover"  data-placement="bottom" data-content="{{ $detail->sensor_all_name }}" ></i>
            @endif
        </td>
        <td id="item-PoolName-{{ $detail->id }}">
            {{ $detail->vehicle->pool_name }}
        </td>
        <td id="item-PoolLocation-{{ $detail->id }}">
            {{ $detail->vehicle->pool_location }}
        </td>
        <td id="item-Waranty-{{ $detail->id }}">
            @if ($detail->waranty == "")
                -
            @else 
            {{ date('d-M-Y', strtotime($detail->waranty)) }}
            @endif
        </td>
        <td id="item-StatusLayanan-{{ $detail->id }}">
            {{ $detail->status->service_status_name }}
        </td>
        <td id="item-TanggalPasang-{{ $detail->id }}">
             {{-- {{ $detail->tanggal_pasang }}->format('d/m/Y');  --}}
            {{ date('d-M-Y', strtotime($detail->tanggal_pasang)) }} 
        </td>
        <td id="item-TanggalNonAktif-{{ $detail->id }}">
            @if ($detail->tanggal_non_aktif == null)
                {{ $detail->tanggal_non_aktif }}
            @else
                {{ date('d-M-Y', strtotime($detail->tanggal_non_aktif)) }}
            @endif 
        </td>
        <td id="item-TanggalReaktivasi-{{ $detail->id }}">
            @if ($detail->tgl_reaktivasi_gps == null)
                {{ $detail->tgl_reaktivasi_gps }}
            @else
                {{ date('d-M-Y', strtotime($detail->tgl_reaktivasi_gps)) }}
            @endif 
        </td>
        <td  class="action sticky-col first-col" id="td-button-{{ $detail->id }}" >
            <div id="button-{{ $detail->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $detail->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $detail->id }})"></i>
            </div>
        </td>
    </tr>

    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });
    </script>

   @endforeach

<<<<<<< HEAD
 
=======


>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
