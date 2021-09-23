<td></td>
<td>
    <i class="fas fa-check add" id="edit" onclick="update({{ $request_complaint->id}})"></i><i class="fas fa-times cancel" onclick="cancel()"></i>
</td>
<td>
<select class="select company_id-{{ $request_complaint->id }}" id="company_id" name="company_id">
    @foreach ($company as $item)
    <option value="{{ $item->id }}" {{ old('company') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>

    @endforeach
</select></td>
    <td><select class="form-control" id="internal_exsternal" name="internal_exsternal">
    <option selected>{{$request_complaint->internal_exsternal}}</option>
    <option value="Internal">Internal</option>
    <option value="Eksternal">Eksternal</option>
    </select></i></td>
<td>
<select class="select pic_id-{{ $request_complaint->id }}" id="pic_id" name="pic_id">
    @foreach ($pic as $item)
    <option value="{{ $item->id }}" {{ old('pic') == $item->id ? 'selected':'' }}>{{ $item->pic_name }}</option>

    @endforeach
</select></td>
<td>
    <div class="input-div"><input type="text" class="input vehicle-{{$request_complaint->id}}" id="vehicle" placeholder="vehicle" value="{{ $request_complaint->vehicle}}"></i></div>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_info-{{$request_complaint->id}}" id="waktu_info" placeholder="waktu_info" value="{{ $request_complaint->waktu_info}}"></i></div>
</td>
</select></td>
    <td><select class="form-control" id="task" name="task">
    <option selected>{{$request_complaint->task}}</option>
    <option value="Pemasangan / Maintenance / Mutasi / Pelepasan GPS">Pemasangan / Maintenance / Mutasi / Pelepasan GPS</option>
    <option value="Tampilan OSLOG">Tampilan OSLOG</option>
</select></i></td>
</select></td>
    <td><select class="form-control" id="platform" name="platform">
    <option selected>{{$request_complaint->platform}}</option>
    <option value="Wa">Wa</option>
</select></i></td>
<td>
    <div class="input-div"><input type="text" class="input detail_task-{{$request_complaint->id}}" id="detail_task" placeholder="detail_task" value="{{ $request_complaint->detail_task}}"></i></div>
</td>
</select></td>
    <td><select class="form-control" id="divisi" name="divisi">
    <option selected>{{$request_complaint->divisi}}</option>
    <option value="Operasional (CS)">Operasional (CS)</option>
    <option value="Lintas Divisi">Lintas Divisi</option>
</select></i></td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_respond-{{$request_complaint->id}}" id="waktu_respond" placeholder="waktu_respond" value="{{ $request_complaint->waktu_respond}}"></i></div>
</td>
</select></td>
    <td><select class="form-control" id="respond" name="respond">
    <option selected>{{$request_complaint->respond}}</option>
    <option value="Ambar">Ambar</option>
</select></i></td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_kesepakatan-{{$request_complaint->id}}" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" value="{{ $request_complaint->waktu_kesepakatan}}"></i></div>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_solve-{{$request_complaint->id}}" id="waktu_solve" placeholder="waktu_solve" value="{{ $request_complaint->waktu_solve}}"></i></div>
</td>
</select></td>
    <td><select class="form-control" id="status" name="status">
    <option selected>{{$request_complaint->status}}</option>
    <option value="Done">Done</option>
    <option value="On Progress">On Progress</option>
</select></i></td>
<td>
    <div class="input-div"><input type="text" class="input status_akhir-{{$request_complaint->id}}" id="status_akhir" placeholder="status_akhir" value="{{ $request_complaint->status_akhir}}"></i></div>
</td>