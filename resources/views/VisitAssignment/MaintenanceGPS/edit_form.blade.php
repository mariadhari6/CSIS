    <td></td>
    <td></td>

    <td>
        <select class="select company_id-{{$maintenanceGps->id}}"  id="{{$maintenanceGps->id}}" name="company_id">
            <option selected value="{{ $maintenanceGps->company_id}}">
                {{ $maintenanceGps->companyRequest->company_name}}
            </option>

            @foreach ($company as $item)
            <option value="{{ $item->id }}">{{ $item->company_name }}</option>
            @endforeach

        </select>
    </td>
    <td><select class="select vehicle-{{$maintenanceGps->id}}" id="vehicle" id="vehicle" aria-label=".form-select-lg example">
    <option value="{{$maintenanceGps->vehicle}}"> {{$maintenanceGps->vehicle}} </option>
    <option value="B-94828-YTS">B-94828-YTS</option>
    <option value="B-76267-TWS">B-76267-TWS</option>
    </select></i></td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input waktu_kesepakatan-{{$maintenanceGps->id}}" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" value="{{ str_replace(" ", "T", $maintenanceGps->waktu_kesepakatan) }}"></i></div>
    </td>
    <td>
        <select class="select type_gps_id-{{$maintenanceGps->id}}" id="type_gps_id" name="type_gps_id-{{$maintenanceGps->id}}">
            <option selected value="{{ $maintenanceGps->type_gps_id }}">
                {{ $maintenanceGps->gpsMaintenance->typeGps->type_gps }}
            </option>

            @foreach ($gps as $item)
            <option value="{{ $item->id }}">
                {{ $item->typeGps->type_gps }}
            </option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="select equipment_gps_id-{{$maintenanceGps->id}}" id="equipment_gps_id" name="equipment_gps_id-{{$maintenanceGps->id}}">
            <option selected value="{{ $maintenanceGps->equipment_gps_id }}">
                {{ $maintenanceGps->gpsMaintenance->typeGps->type_gps }}
            </option>

            @foreach ($gps as $item)
            <option value="{{ $item->id }}">
                {{ $item->typeGps->type_gps }}
            </option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="select equipment_sensor_id-{{$maintenanceGps->id}}" id="equipment_sensor_id" name="equipment_sensor_id-{{$maintenanceGps->id}}">
            <option selected value="{{ $maintenanceGps->equipment_sensor_id}}">
                {{ $maintenanceGps->sensorMaintenance->sensor_name }}
            </option>

            @foreach ($sensor as $item)
            <option value="{{ $item->id }}">
                {{ $item->sensor_name }}
            </option>
            @endforeach

        </select>
    </td>
     <td><select class="select equipment_gsm-{{$maintenanceGps->id}}" id="equipment_gsm" name="equipment_gsm">
        <option value="{{$maintenanceGps->equipment_gsm}}"> {{$maintenanceGps->gsm->gsm_number}} </option>
        @foreach ($gsm_master as $gsm_masters)
        <option value="{{ $gsm_masters->id }}" {{ old('equipment_gsm') == $gsm_masters->id  ? 'selected':'' }}>
        {{$gsm_masters->gsm_number}}
        </option>

       @endforeach
    </select></i></td>
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
        <div class="input-div"><input type="text" class="input ketersediaan_kendaraan-{{$maintenanceGps->id}}" id="ketersediaan_kendaraan" value="{{$maintenanceGps->ketersediaan_kendaraan}}"></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input keterangan-{{$maintenanceGps->id}}" id="keterangan" value="{{$maintenanceGps->keterangan}}"></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input hasil-{{$maintenanceGps->id}}" id="hasil" value="{{$maintenanceGps->hasil}}"></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input biaya_transportasi-{{$maintenanceGps->id}}" id="biaya_transportasi" value="{{$maintenanceGps->biaya_transportasi}}"></i>
        </div>
    </td>
   <td>
        <select class="select teknisi_maintenance-{{$maintenanceGps->id}}" id="teknisi_maintenance" name="teknisi_maintenance">
            <option selected value="{{$maintenanceGps->teknisi_maintenance}}">{{$maintenanceGps->teknisiMaintenance->teknisi_name?? ''}}</option>
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
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $maintenanceGps->id }})"></i>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>


