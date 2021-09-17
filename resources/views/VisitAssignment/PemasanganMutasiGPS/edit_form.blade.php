 <td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $pemasangan_mutasi_GPS->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <td>
        <select class="form-control company-{{$pemasangan_mutasi_GPS->id}}" id="company" name="company">

        <option value=""> {{$pemasangan_mutasi_GPS->requestComplain->company->company_name}} </option>
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('company') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->companyRequest->company_name}}
        </option>

       @endforeach
    </select></i>
    </td>

     <td><select class="form-control tanggal-{{$pemasangan_mutasi_GPS->id}}" id="tanggal" name="tanggal">
        <option value=""> {{$pemasangan_mutasi_GPS->requestComplain->waktu_kesepakatan}} </option>
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('tanggal') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->waktu_kesepakatan}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="form-control kendaraan_awal-{{$pemasangan_mutasi_GPS->id}}" id="kendaraan_awal" name="kendaraan_awal">
        <option value=""> {{$pemasangan_mutasi_GPS->requestComplain->vehicle}} </option>
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('kendaraan_awal') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->vehicle}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="form-control imei-{{$pemasangan_mutasi_GPS->id}}" id="imei" name="imei">
        <option value=""> {{$pemasangan_mutasi_GPS->detailCustomer->gps->imei}} </option>
        @foreach ($details as $detail)
        <option value="{{ $detail->id }}" {{ old('imei') == $detail->id  ? 'selected':'' }}>
        {{$detail->gps->imei}}
        </option>

       @endforeach
    </select></i></td>

     <td><select class="form-control gsm-{{$pemasangan_mutasi_GPS->id}}" id="gsm" name="gsm">
        <option value=""> {{$pemasangan_mutasi_GPS->detailCustomer->gsmActive->gsmPreActive->gsm_number}} </option>
        @foreach ($details as $detail)
        <option value="{{ $detail->id }}" {{ old('gsm') == $detail->id  ? 'selected':'' }}>
        {{$detail->gsm->gsmPreActive->gsm_number}}
        </option>

       @endforeach
    </select></i></td>

<td><select class="form-control kendaraan_pasang-{{$pemasangan_mutasi_GPS->id}}" id="kendaraan_pasang" name="kendaraan_pasang">
        <option value=""> {{$pemasangan_mutasi_GPS->requestComplain->vehicle}} </option>
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('kendaraan_pasang') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->vehicle}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="form-control jenis_pekerjaan-{{$pemasangan_mutasi_GPS->id}}" id="jenis_pekerjaan" name="jenis_pekerjaan">
        <option value=""> {{$pemasangan_mutasi_GPS->requestComplain->task}} </option>
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('jenis_pekerjaan') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->task}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="form-control equipment_terpakai_gps-{{$pemasangan_mutasi_GPS->id}}" id="equipment_terpakai_gps" name="equipment_terpakai_gps">
        <option value=""> {{$pemasangan_mutasi_GPS->gpsPemasangan->type}} </option>
        @foreach ($gps as $gpses)
        <option value="{{ $gpses->id }}" {{ old('equipment_terpakai_gps') == $gpses->id  ? 'selected':'' }}>
        {{$gpses->type}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="form-control equipment_terpakai_sensor-{{$pemasangan_mutasi_GPS->id}}" id="equipment_terpakai_sensor" name="equipment_terpakai_sensor">
        <option value=""> {{$pemasangan_mutasi_GPS->sensorPemasangan->sensor_name}} </option>
        @foreach ($sensor as $sensors)
        <option value="{{ $sensors->id }}" {{ old('equipment_terpakai_sensor') == $sensors->id  ? 'selected':'' }}>
        {{$sensors->sensor_name}}
        </option>
       @endforeach
    </select></i></td>

    <td><select class="form-control teknisi-{{$pemasangan_mutasi_GPS->id}}" id="teknisi" name="teknisi" aria-label=".form-select-lg example">
    <option value=""> {{$pemasangan_mutasi_GPS->teknisi}} </option>
    <option value="Khatam">Khatam</option>
    <option value="Rifai">Rifai</option>
    <option value="Arief">Arief</option>
    <option value="Mukhti">Mukhti</option>
    </select></i></td>

    <td>
        <div class="input-div"><input type="number" class="input uang_transportasi-{{$pemasangan_mutasi_GPS->id}}" id="uang_transportasi" placeholder="Uang Transportasi" value="{{ $pemasangan_mutasi_GPS->uang_transportasi}}"></i></div>
    </td>

    <td><select class="form-control" id="type_visit" name="type_visit" aria-label=".form-select-lg example">
    <option value="Visit SLA">Visit SLA</option>
    <option value="Visit Berbayar">Visit Berbayar</option>
    </select></i></td>

    <td><textarea class="form-control note-{{$pemasangan_mutasi_GPS->id}}" id="note" name="note" rows="3">{{$pemasangan_mutasi_GPS->note}}</textarea></i></td>


