 <td></td>
 <td></td>

    <td>
        <select class="select company_id-{{$pemasangan_mutasi_GPS->id}}" id="company_id" name="company_id">

        <option value="{{$pemasangan_mutasi_GPS->company_id}}"> {{$pemasangan_mutasi_GPS->requestComplain->companyRequest->company_name}} </option>
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('company_id') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->companyRequest->company_name}}
        </option>

       @endforeach
    </select></i>

    <td><select class="select jenis_pekerjaan-{{$pemasangan_mutasi_GPS->id}}" id="jenis_pekerjaan" name="jenis_pekerjaan">
        <option value="{{$pemasangan_mutasi_GPS->jenis_pekerjaan}} "> {{$pemasangan_mutasi_GPS->requestComplain->taskRequest->task}} </option>
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('jenis_pekerjaan') == $request_complains->id  ? 'selected':'' }}>
         {{-- @if ($request_complains->task =='Pemasangan'||'Mutasi'||'Pelepasan GPS') --}}
            {{$request_complains->taskRequest->task}}

         {{-- @endif --}}
            {{-- {{$request_complains->task}} --}}
        </option>

       @endforeach
    </select></i></td>
    </td>

     <td><select class="select tanggal-{{$pemasangan_mutasi_GPS->id}}" id="tanggal" name="tanggal">
        <option value="{{$pemasangan_mutasi_GPS->tanggal}}"> {{$pemasangan_mutasi_GPS->requestComplain->waktu_kesepakatan}} </option>
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('tanggal') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->waktu_kesepakatan}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select kendaraan_awal-{{$pemasangan_mutasi_GPS->id}}" id="kendaraan_awal" name="kendaraan_awal">
        <option value="{{$pemasangan_mutasi_GPS->kendaraan_awal}} "> {{$pemasangan_mutasi_GPS->requestComplain->vehicle}} </option>
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('kendaraan_awal') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->vehicle}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select imei-{{$pemasangan_mutasi_GPS->id}}" id="imei" name="imei">
        <option value="{{$pemasangan_mutasi_GPS->imei}}"> {{$pemasangan_mutasi_GPS->detailCustomer->imei}} </option>
        @foreach ($details as $detail)
        <option value="{{ $detail->id }}" {{ old('imei') == $detail->id  ? 'selected':'' }}>
        {{$detail->imei}}

        </option>

       @endforeach
    </select></i></td>

     <td><select class="select gsm_pemasangan-{{$pemasangan_mutasi_GPS->id}}" id="gsm_pemasangan" name="gsm_pemasangan">
        <option value="{{$pemasangan_mutasi_GPS->gsm_pemasangan}}"> {{$pemasangan_mutasi_GPS->detailCustomer->gsm}} </option>
        @foreach ($details as $detail)
        <option value="{{ $detail->id }}" {{ old('gsm_pemasangan') == $detail->id  ? 'selected':'' }}>
        {{$detail->gsm}}
        </option>

       @endforeach
    </select></i></td>

<td><select class="select kendaraan_pasang-{{$pemasangan_mutasi_GPS->id}}" id="kendaraan_pasang" name="kendaraan_pasang">
        <option value="{{$pemasangan_mutasi_GPS->kendaraan_pasang}} "> {{$pemasangan_mutasi_GPS->requestComplain->vehicle}} </option>
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('kendaraan_pasang') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->vehicle}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select jenis_pekerjaan-{{$pemasangan_mutasi_GPS->id}}" id="jenis_pekerjaan" name="jenis_pekerjaan">
        <option value="{{$pemasangan_mutasi_GPS->jenis_pekerjaan}} "> {{$pemasangan_mutasi_GPS->requestComplain->task}} </option>
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('jenis_pekerjaan') == $request_complains->id  ? 'selected':'' }}>
         {{-- @if ($request_complains->task =='Pemasangan'||'Mutasi'||'Pelepasan GPS') --}}
            {{$request_complains->task}}
         {{-- @endif --}}
            {{-- {{$request_complains->task}} --}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select equipment_terpakai_gps-{{$pemasangan_mutasi_GPS->id}}" id="equipment_terpakai_gps" name="equipment_terpakai_gps">
        <option value="{{$pemasangan_mutasi_GPS->equipment_terpakai_gps}}"> {{$pemasangan_mutasi_GPS->gps->type}} </option>
        @foreach ($gps as $gpses)
        <option value="{{ $gpses->id }}" {{ old('equipment_terpakai_gps') == $gpses->id  ? 'selected':'' }}>
        {{$gpses->type}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select equipment_terpakai_sensor-{{$pemasangan_mutasi_GPS->id}}" id="equipment_terpakai_sensor" name="equipment_terpakai_sensor">
        <option value="{{$pemasangan_mutasi_GPS->equipment_terpakai_sensor}}"> {{$pemasangan_mutasi_GPS->sensor->sensor_name}} </option>
        @foreach ($sensor as $sensors)
        <option value="{{ $sensors->id }}" {{ old('equipment_terpakai_sensor') == $sensors->id  ? 'selected':'' }}>
        {{$sensors->sensor_name}}
        </option>
       @endforeach
    </select></i></td>

     <td>
        <select class="select teknisi-{{$pemasangan_mutasi_GPS->id}}" id="teknisi" name="teknisi">
            <option selected value="{{$pemasangan_mutasi_GPS->teknisi_id}}">{{$pemasangan_mutasi_GPS->teknisiPemasangan->teknisi_name}}</option>
            @foreach ($teknisi_pemasangan_mutasi as $item)
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

    <td><textarea class="form-control note-{{$pemasangan_mutasi_GPS->id}}" id="note" name="note" rows="3">{{$pemasangan_mutasi_GPS->note}}</textarea></i></td>
     <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $pemasangan_mutasi_GPS->id}})"></i>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
<script type="text/javascript">
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
</script>
