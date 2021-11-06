    <td></td>
    <td></td>

    <td>
        <select class="select company_id-{{$maintenanceGps->id}}"  id="{{$maintenanceGps->id}}" name="company_id">
            <option selected value="{{ $maintenanceGps->company_id}}">
                {{ $maintenanceGps->companyRequest->company_name??''}}
            </option>

            @foreach ($details as $item)
            <option value="{{ $item->company_id }}">{{ $item->company->company_name }}</option>
            @endforeach

        </select>
    </td>
     <td>
        <select class="select task-{{$maintenanceGps->id}}" id="task" name="task-{{$maintenanceGps->id}}">
            <option selected value="{{ $maintenanceGps->task}}">
                {{ $maintenanceGps->taskRequest->task }}
            </option>

            @foreach ($task as $item)
            <option value="{{ $item->id }}">
                {{ $item->task }}
            </option>
            @endforeach

        </select>
    </td>
    <td>
          <select class="select vehicle-{{$maintenanceGps->id}}" id="vehicle" name="vehicle">
            <option value="{{$maintenanceGps->vehicle}}">
                {{ $maintenanceGps->detailCustomerVehicle->vehicle->license_plate??'' }}
            </option>
            @foreach ($details as $item)
                <option value="{{ $item->id }}" {{ old('vehicle') == $item->id ? 'selected':'' }}>{{ $item->vehicle}}</option>

            @endforeach
         </select></i>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input waktu_kesepakatan-{{$maintenanceGps->id}}" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" value="{{ str_replace(" ", "T", $maintenanceGps->waktu_kesepakatan) }}"></i></div>
    </td>
    <td>
        <select class="select type_gps_id-{{$maintenanceGps->id}}" id="type_gps_id" name="type_gps_id" required>
            {{-- <option selected value="">
                {{ $maintenanceGps->gpsType->type??'' }}
            </option> --}}

            @foreach ($details as $item)
            <option value="{{ $item->id }}" >
                {{ $item->type }}
            </option>
            @endforeach


        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input equipment_gps_id-{{$maintenanceGps->id}}" id="equipment_gps_id" value="{{$maintenanceGps->equipment_gps_id}}"></i>
        </div>
    </td>

    <td>
        <div class="input-div"><input type="text" class="input equipment_sensor_id-{{$maintenanceGps->id}}" id="equipment_sensor_id" value="{{$maintenanceGps->equipment_sensor_id}}"></i>
        </div>
    </td>


     <td><select class="select equipment_gsm-{{$maintenanceGps->id}}" id="equipment_gsm" name="equipment_gsm">
        <option value="{{$maintenanceGps->equipment_gsm}}"> {{$maintenanceGps->gsm->gsm_number?? ''}} </option>
        @foreach ($gsm_master as $item)
        <option value="{{ $item->id }}" {{ old('equipment_gsm') == $item->id  ? 'selected':'' }}>
        {{$item->gsm_number}}
        </option>

       @endforeach
    </select></i></td>

 <td><select class="select ketersediaan_kendaraan-{{$maintenanceGps->id}}" id="ketersediaan_kendaraan" name="ketersediaan_kendaraan" aria-label=".form-select-lg example">
    <option value=" {{$maintenanceGps->ketersediaan_kendaraan}}"> {{$maintenanceGps->ketersediaan_kendaraan}} </option>
    <option value="Tersedia">Tersedia</option>
    <option value="Tidak tersedia">Tidak tersedia</option>
    </select></i></td>
    <td>
        <div class="input-div"><input type="text" class="input keterangan-{{$maintenanceGps->id}}" id="keterangan" value="{{$maintenanceGps->keterangan}}"></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input hasil-{{$maintenanceGps->id}}" id="hasil" value="" required></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="number" class="input biaya_transportasi-{{$maintenanceGps->id}}" id="biaya_transportasi" value="" required></i>
        </div>
    </td>
   <td>
        <select class="select teknisi_maintenance-{{$maintenanceGps->id}}" id="teknisi_maintenance" name="teknisi_maintenance" required>
            <option selected value="">{{$maintenanceGps->teknisiMaintenance->teknisi_name?? ''}}</option>
            @foreach ($teknisi_maintenance as $item)
                <option value="{{ $item->id }}">{{ $item->teknisi_name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select req_by-{{$maintenanceGps->id}}" id="req_by" aria-label=".form-select-lg example">
            <option selected value="{{  $maintenanceGps->req_by == 'Customer' ? 'Customer' : 'CS'}}">
                {{  $maintenanceGps->req_by == 'Customer' ? 'Customer' : 'CS'}}
            </option>
            <option value="{{  $maintenanceGps->req_by == 'Customer' ? 'CS' : 'Customer'}}">
                {{  $maintenanceGps->req_by == 'Customer' ? 'CS' : 'Customer'}}
            </option>
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input note_maintenance-{{$maintenanceGps->id}}" id="note_maintenance" value="{{$maintenanceGps->note_maintenance}}"></i>
        </div>
    </td>
    <td><select class="select status-{{$maintenanceGps->id}}" id="status" name="status" aria-label=".form-select-lg example" required>
    <option value=""> {{$maintenanceGps->status}} </option>
    <option value="Done">Done</option>
    <option value="On Progress">On Progress</option>
    </select></i></td>
   <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $maintenanceGps->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>

    <script>
          $('select[name="company_id"]').on('change', function() {
            var itemID = $(this).val();
            // alert(itemID);
            if(itemID) {
                $.ajax({
                    url: '/based_vehicle/'+ itemID,
                    method: "GET",
                    success:function(data) {
                        //alert(data.length);
                        $('select[name="vehicle').empty();
                        $('select[name="vehicle').append('<option value=""> </option>');
                            for(var i = 0 ; i < data.length ; i++) {
                                $('select[name="vehicle').append('<option value="'+ data[i].id + '"> '+ data[i].vehicle_id +'</option>');
                                // 16-Nov-2021   alert(data[i].serial_number)
                            }
                    }
                });
                $.ajax({
                    url: '/based_vehicle/'+ itemID,
                    method: "GET",
                    success:function(data) {
                        //alert(data.length);
                        $('select[name="type_gps_id').empty();
                        $('select[name="type_gps_id').append('<option value=""> </option>');
                            for(var i = 0 ; i < data.length ; i++) {
                                $('select[name="type_gps_id').append('<option value="'+ data[i].id + '"> '+ data[i].type+'</option>');
                                // 16-Nov-2021   alert(data[i].serial_number)
                            }
                    }
                });
                }else{
                $('select[name="vehicle"]').empty();
                // $('select[name="imei"]').empty();

            }
         });

</script>


