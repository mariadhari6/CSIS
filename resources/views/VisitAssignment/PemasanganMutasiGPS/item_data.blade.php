<?php $no=1; ?>
@foreach ($pemasangan_mutasi_GPS as $item)
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
            {{ $item->companyRequest->company_name??''}}
        </td>
          <td id="item-task-{{ $item->id }}">
            {{ $item->taskRequest->task }}
        </td>
        <td id="item-waktu_kesepakatan-{{ $item->id }}">
            {{ $item->waktu_kesepakatan }}
        </td>
        @if ($item->vehicle != null)
             <td id="item-vehicle-{{ $item->id}}">
                {{ $item->detailCustomerVehicle->vehicle->license_plate?? ''}}
            </td>
        @elseif ($item->vehicle == null)
             <td id="item-vehicle-{{ $item->id}}">
                -
            </td>
        @endif

        @if ($item->kendaraan_pasang != null)
        <td id="item-kendaraan_pasang-{{ $item->id }}">
            {{  $item->vehicleKendaraanPasang->license_plate?? ''}}
        </td>
        @elseif ($item->kendaraan_pasang == null)
        <td id="item-kendaraan_pasang-{{ $item->id }}">
            -
        </td>
          <td id="item-imei-{{ $item->id }}">
            -
        </td>
        @endif

        @if ($item->gsm_pemasangan != null)
          <td id="item-gsm_pemasangan-{{ $item->id }}">
            {{ $item->detailCustomer->gsm}}
        </td>

        @if ($item->equipment_terpakai_sensor != null)
        <td id="item-equipment_terpakai_sensor-{{ $item->id }}">
            {{$item->equipment_terpakai_sensor}}
        </td>
        @elseif ($item->equipment_terpakai_gps == null)
        <td id="item-equipment_terpakai_gps-{{ $item->id }}">
            -
        </td>
        @endif
        @if ($item->equipment_terpakai_sensor_all_name != null)
        <td id="item-equipment_terpakai_sensor-{{ $item->id }}">
             <i class="fas fa-eye" data-toggle="popover"  data-placement="bottom" data-content="{{ $item->equipment_terpakai_sensor_all_name }}" ></i>

        </td>

        <td id="item-equipment_terpakai_sensor-{{ $item->id }}">
            {{$item->sensor->sensor_name}}
        </td>

        <td id="item-teknisi-{{ $item->id }}">
            {{ $item->teknisi}}
        </td>
        @endif

         <td id="item-uang_transportasi-{{ $item->id }}">
        <span>Rp. </span>{{ number_format( $item->uang_transportasi)}}

        </td>
         <td id="item-type_visit-{{ $item->id }}">
            {{ $item->type_visit}}
        </td>
        @elseif ($item->type_visit == null)
        <td id="item-type_visit-{{ $item->id }}">
            -
        </td>
        @endif

        @if ($item->note_pemasangan != null)
        <td id="item-note_pemasangan-{{ $item->id }}">
            {{ $item->note_pemasangan }}
        </td>
        @elseif ($item->note_pemasangan == null)
        <td id="item-note_pemasangan-{{ $item->id }}">
           -
        </td>
        @endif

         <td id="item-status-{{ $item->id }}">
            {{ $item->status}}
        </td>
        <td class="action sticky-col first-col" id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </div>
        </td>
    </tr>
      <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
        });
    </script>

@endforeach
