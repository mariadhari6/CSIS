 <td></td>
 <td></td>

    <td>
        <select class="select company_id-{{$pemasangan_mutasi_GPS->id}}" id="company_id" name="company_id">

        <option value="{{$pemasangan_mutasi_GPS->company_id}}"> {{$pemasangan_mutasi_GPS->companyRequest->company_name}} </option>
        @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id  ? 'selected':'' }}>
        {{$companys->company_name}}
        </option>

       @endforeach
    </select></i>

    <td><select class="select task-{{$pemasangan_mutasi_GPS->id}}" id="task" name="task">
        <option value="{{$pemasangan_mutasi_GPS->task}} "> {{$pemasangan_mutasi_GPS->taskRequest->task}} </option>
        @foreach ($task as $tasks)
        <option value="{{ $tasks->id }}" {{ old('task') == $tasks->id  ? 'selected':'' }}>
            {{$tasks->task}}
        </option>

       @endforeach
    </select></i></td>
    </td>

      <td>
        <div class="input-div"><input type="datetime-local" class="input waktu_kesepakatan-{{$pemasangan_mutasi_GPS->id}}" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" value="{{ str_replace(" ", "T", $pemasangan_mutasi_GPS->waktu_kesepakatan) }}"></i></div>
    </td>

    <td>
          <select class="select vehicle-{{$pemasangan_mutasi_GPS->id}}" id="vehicle" name="vehicle">
            <option selected value="">
                {{ $pemasangan_mutasi_GPS->vehicleRequest->license_plate }}
            </option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('vehicle') == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>

            @endforeach
         </select></i>
    </td>

    <td><select class="select imei-{{$pemasangan_mutasi_GPS->id}}" id="imei" name="imei">
        <option value="{{$pemasangan_mutasi_GPS->imei}}"> {{$pemasangan_mutasi_GPS->detailCustomer->imei?? ''}} </option>
        @foreach ($details as $detail)
        <option value="{{ $detail->id }}" {{ old('imei') == $detail->id  ? 'selected':'' }}>
        {{$detail->imei}}
        </option>
       @endforeach
    </select></i></td>

     <td><select class="select gsm_pemasangan-{{$pemasangan_mutasi_GPS->id}}" id="gsm_pemasangan" name="gsm_pemasangan">
        <option value="{{$pemasangan_mutasi_GPS->gsm_pemasangan}}"> {{$pemasangan_mutasi_GPS->gsmMaster->gsm_number?? ''}} </option>
        @foreach ($gsm_master as $gsm_masters)
        <option value="{{ $gsm_masters->id }}" {{ old('gsm_pemasangan') == $gsm_masters->id  ? 'selected':'' }}>
        {{$gsm_masters->gsm_number}}
        </option>

       @endforeach
    </select></i></td>
     <td><select class="select equipment_terpakai_sensor-{{$pemasangan_mutasi_GPS->id}}" id="equipment_terpakai_sensor" name="equipment_terpakai_sensor">
        <option value="{{$pemasangan_mutasi_GPS->equipment_terpakai_sensor}}"> {{$pemasangan_mutasi_GPS->sensor->sensor_name?? ''}} </option>
        @foreach ($sensor as $sensors)
        <option value="{{ $sensors->id }}" {{ old('equipment_terpakai_sensor') == $sensors->id  ? 'selected':'' }}>
        {{$sensors->sensor_name}}
        </option>
       @endforeach
    </select></i></td>

    <td><select class="select equipment_terpakai_gps-{{$pemasangan_mutasi_GPS->id}}" id="equipment_terpakai_gps" name="equipment_terpakai_gps">
        <option value="{{$pemasangan_mutasi_GPS->equipment_terpakai_gps}}"> {{$pemasangan_mutasi_GPS->gpsPemasangan->typeGps->type_gps??''}} </option>
        @foreach ($gps as $gpses)
        <option value="{{ $gpses->id }}" {{ old('equipment_terpakai_gps') == $gpses->id  ? 'selected':'' }}>
        {{$gpses->typeGps->type_gps}}
        </option>

       @endforeach
    </select></i></td>



     <td>
        <select class="select teknisi_pemasangan-{{$pemasangan_mutasi_GPS->id}}" id="teknisi_pemasangan" name="teknisi_pemasangan">
            <option selected value="{{$pemasangan_mutasi_GPS->teknisi_pemasangan}}">{{$pemasangan_mutasi_GPS->teknisi->teknisi_name?? ''}}</option>
            @foreach ($teknisi as $item)
                <option value="{{ $item->id }}">{{ $item->teknisi_name }}</option>
            @endforeach
        </select>
    </td>

    <td>
        <div class="input-div"><input type="number" class="input uang_transportasi-{{$pemasangan_mutasi_GPS->id}}" id="uang_transportasi" placeholder="Uang Transportasi" value="{{ $pemasangan_mutasi_GPS->uang_transportasi}}"></i></div>
    </td>

    <td><select class="select type_visit-{{$pemasangan_mutasi_GPS->id}}" id="type_visit" name="type_visit" aria-label=".form-select-lg example">
    <option value=" {{$pemasangan_mutasi_GPS->type_visit}}"> {{$pemasangan_mutasi_GPS->type_visit}} </option>
    <option value="Visit SLA">Visit SLA</option>
    <option value="Visit Berbayar">Visit Berbayar</option>
    </select></i></td>

    <td><textarea class="form-control note_pemasangan-{{$pemasangan_mutasi_GPS->id}}" id="note_pemasangan" name="note_pemasangan" rows="3">{{$pemasangan_mutasi_GPS->note_pemasangan}}</textarea></i></td>
     <td>
          <select class="select kendaraan_pasang-{{$pemasangan_mutasi_GPS->id}}" id="kendaraan_pasang" name="kendaraan_pasang">
            <option selected value="">
                {{ $pemasangan_mutasi_GPS->vehicleKendaraanPasang->license_plate ??''}}
            </option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('vehicle') == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>

            @endforeach
         </select></i>
    </td>

    <td><select class="select status_pemasangan-{{$pemasangan_mutasi_GPS->id}}" id="status_pemasangan" name="status_pemasangan" aria-label=".form-select-lg example">
    <option value=" {{$pemasangan_mutasi_GPS->status_pemasangan}}"> {{$pemasangan_mutasi_GPS->status_pemasangan}} </option>
    <option value="Done">Done</option>
    <option value="On Progress">On Progress</option>
    </select></i></td>
     <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $pemasangan_mutasi_GPS->id}})"></i>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
{{-- <script type="text/javascript">
    $(document).ready(function() {
        $('select[name="company_id"]').on('change', function() {
            var itemID = $(this).val();
            if(itemID) {
                $.ajax({
                    url: '/dependent_pemasanganmutasi/'+itemID,
                    method: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="tanggal').empty();
                            $.each(data, function(key, value) {
                                $('select[name="tanggal').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                    }
                });

                $.ajax({
                    url: '/dependent_JenisPekerjaan/'+itemID,
                    method: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="jenis_pekerjaan').empty();
                            $.each(data, function(key, value) {
                                $('select[name="jenis_pekerjaan').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                    }
                });


            }else{
                $('select[name="tanggal"]').empty();
                $('select[name="jenis_pekerjaan"]').empty();

            }
        });
    });
</script> --}}
