<td></td>
<td></td>
<td>
<select class="select company_id-{{ $request_complaint->id }}" id="company_id" name="company_id">
    @foreach ($company as $item)
    <option value="{{ $item->id }}" {{ old('company') == $item->id ? 'selected':'' }}>
        {{ $item->company_name }}
    </option>

    @endforeach
</select>
</td>
    <td>
        <select class="form-control internal_eksternal-{{ $request_complaint->id }}" id="internal_eksternal" name="internal_eksternal">
            <option value="{{$request_complaint->internal_eksternal}}" selected> {{$request_complaint->internal_eksternal}} </option>
            <option value="Internal">Internal</option>
            <option value="Eksternal">Eksternal</option>
        </select>
    </td>
<td>
<select class="select pic_id-{{ $request_complaint->id }}" id="pic_id" name="pic_id">
    @foreach ($pic as $item)
    <option value="{{ $item->id }}" {{ old('pic') == $item->id ? 'selected':'' }}>{{ $item->pic_name }}</option>

    @endforeach
</select>
</td>
<td>
    <div class="input-div"><input type="text" class="input vehicle-{{$request_complaint->id}}" id="vehicle" placeholder="vehicle" value="{{ $request_complaint->vehicle}}">
</div>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_info-{{$request_complaint->id}}" id="waktu_info" placeholder="waktu_info" value="{{ $request_complaint->waktu_info}}">
</div>
</td>
    <td>
        <select class="form-control task-{{ $request_complaint->id }}" id="task" name="task">
            <option value="{{$request_complaint->task}}" selected>{{$request_complaint->task}}</option>
            <option value="Pemasangan Mutasi & Pelepasan GPS">Pemasangan Mutasi & Pelepasan GPS</option>
            <option value="Maintenance">Maintenance</option>
</select>
</td>
    <td>
        <select class="form-control platform-{{ $request_complaint->id }}" id="platform" name="platform">
            <option selected>{{$request_complaint->platform}}</option>
            <option value="Wa">Wa</option>
        </select>
    </td>
<td>
    <div class="input-div"><input type="text" class="input detail_task-{{$request_complaint->id}}" id="detail_task" placeholder="detail_task" value="{{ $request_complaint->detail_task}}"></i></div>
</td>
    <td>
        <select class="form-control divisi-{{ $request_complaint->id }}" id="divisi" name="divisi">
            <option selected>{{$request_complaint->divisi}}</option>
            <option value="Operasional (CS)">Operasional (CS)</option>
            <option value="Lintas Divisi">Lintas Divisi</option>
</select>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_respond-{{$request_complaint->id}}" id="waktu_respond" placeholder="waktu_respond" value="{{ $request_complaint->waktu_respond}}"></i></div>
</td>
    <td>
        <select class="form-control respond-{{ $request_complaint->id }}" id="respond" name="respond">
            <option selected>{{$request_complaint->respond}}</option>
            <option value="Ambar">Ambar</option>
        </select>
    </td>
<td>
    <div class="input-div"><input type="datetime" class="input waktu_kesepakatan-{{$request_complaint->id}}" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" value="{{ $request_complaint->waktu_kesepakatan}}"></i></div>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_solve-{{$request_complaint->id}}" id="waktu_solve" placeholder="waktu_solve" value="{{ $request_complaint->waktu_solve}}"></i></div>
</td>
    <td>
        <select class="form-control status-{{ $request_complaint->id }}" id="status" name="status">
            <option selected>{{$request_complaint->status}}</option>
            <option value="Done">Done</option>
            <option value="On Progress">On Progress</option>
        </select>
    </td>
<td>
    <div class="input-div"><input type="text" class="input status_akhir-{{$request_complaint->id}}" id="status_akhir" placeholder="status_akhir" value="{{ $request_complaint->status_akhir}}"></i></div>
</td>
<td>
    <i class="fas fa-check add" id="edit" onclick="update({{ $request_complaint->id}})"></i><i class="fas fa-times cancel" onclick="cancel()"></i>
</td>