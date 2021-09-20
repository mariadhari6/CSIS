<tr id="add_form">
    <td></td>
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i></td>
    <td>
        <select class="select" id="company_id" name="company_id">
            @foreach ($request_complain as $request_complains)
                <option value="{{ $request_complains->id }}" {{ old('company_id') == $request_complains->id  ? 'selected':'' }}>
                   {{$request_complains->companyRequest->company_name}}
                </option>
            @endforeach
        </select></i></td>
    <td><select class="select" id="tanggal" name="tanggal">
       @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('tanggal') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->waktu_kesepakatan}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select" id="kendaraan_awal" name="kendaraan_awal">
       @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('kendaraan_awal') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->vehicle}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select" id="imei" name="imei">
       @foreach ($details as $detail)
        <option value="{{ $detail->id }}" {{ old('imei') == $detail->id  ? 'selected':'' }}>
        {{$detail->imei}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select" id="gsm_pemasangan" name="gsm_pemasangan">
       @foreach ($details as $detail)
        <option value="{{ $detail->id }}" {{ old('gsm_pemasangan') == $detail->id  ? 'selected':'' }}>
        {{$detail->gsm}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select" id="kendaraan_pasang" name="kendaraan_pasang">
        @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('kendaraan_pasang') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->vehicle}}
        </option>

       @endforeach
    </select></i></td>

     <td><select class="select" id="jenis_pekerjaan" name="jenis_pekerjaan">
       @foreach ($request_complain as $request_complains)
        <option value="{{ $request_complains->id }}" {{ old('jenis_pekerjaan') == $request_complains->id  ? 'selected':'' }}>
        {{$request_complains->task}}
        </option>

       @endforeach
    </select></i></td>

     <td><select class="select" id="equipment_terpakai_gps" name="equipment_terpakai_gps">
       @foreach ($gps as $gpses)
        <option value="{{ $gpses->id }}" {{ old('equipment_terpakai_gps') == $gpses->id  ? 'selected':'' }}>
        {{$gpses->type}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select" id="equipment_terpakai_sensor" name="equipment_terpakai_sensor">
       @foreach ($sensor as $sensors)
        <option value="{{ $sensors->id }}" {{ old('equipment_terpakai_sensor') == $sensors->id  ? 'selected':'' }}>
        {{$sensors->sensor_name}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select" id="teknisi" name="teknisi" aria-label=".form-select-lg example">
    <option value="Khatam">Khatam</option>
    <option value="Rifai">Rifai</option>
    <option value="Arief">Arief</option>
    <option value="Mukhti">Mukhti</option>
    </select></i></td>

    <td> <div class="input-div"><input type="number" class="input" id="uang_transportasi" placeholder="Uang Transpotasi" ></i></td>
     <td><select class="select" id="type_visit" name="type_visit" aria-label=".form-select-lg example">
    <option value="Visit SLA">Visit SLA</option>
    <option value="Visit Berbayar">Visit Berbayar</option>
    </select></i></td>

      <td><textarea class="form-control" id="note" name="note" rows="3"></textarea></i></td>




</tr>
