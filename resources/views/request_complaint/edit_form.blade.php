<td></td>
<td></td>

<td>
    <select class="select company_id-{{$request_complain->id}}" id="company_id" name="company_id">
        <option value="{{$request_complain->company}}"> {{$request_complain->company_id}} </option>
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>
       @endforeach
    </select></i>
</td>
<td>
    <select class="select internal_eksternal-{{$request_complain->id}}" id="internal_eksternal" name="internal_eksternal" aria-label=".form-select-lg example">
        <option value="{{$request_complain->internal_eksternal}}"> {{$request_complain->internal_eksternal}} </option>
        <option selected>{{$request_complain->internal_eksternal}}</option>
        <option value="Internal Request">Internal Request</option>
        <option value="Internal Complain">Internal Complain</option>
        <option value="Eksternal Request">Eksternal Request</option>
        <option value="Eksternal Complain">Eksternal Complain</option>
    </select></i>
</td>
<td>
    <select class="select pic-{{$request_complain->id}}" id="pic" name="pic">
        <option value="{{$request_complain->pic}}"> {{$request_complain->pic_id}} </option>
       @foreach ($pic as $pics)
        <option value="{{ $pics->id }}" {{ old('pic') == $pics->id ? 'selected':'' }}>{{ $pics->pic_name }}</option>
        @endforeach
    </select></i>
</td>
<td>
    <select class="select vehicle-{{$request_complain->id}}" id="vehicle" id="vehicle" aria-label=".form-select-lg example">
        <option value="{{$request_complain->vehicle}}"> {{$request_complain->vehicle}} </option>
        <option value="B-94828-YTS">B-94828-YTS</option>
        <option value="B-76267-TWS">B-76267-TWS</option>
    </select></i>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_info-{{$request_complain->id}}" id="waktu_info" placeholder="Waktu Info" value="{{ str_replace(" ", "T", $request_complain->waktu_info) }}"></i></div>
</td>
<td>
    <textarea class="form-control task-{{$request_complain->id}}" id="task" name="task" >{{$request_complain->task}}</textarea></i></td>
<td>
    <select class="select platform-{{$request_complain->id}}" id="platform" id="platform" aria-label=".form-select-lg example">
        <option value="{{$request_complain->platform}}"> {{$request_complain->platform}} </option>
        <option value="WA">WA</option>
        <option value="SMS">SMS</option>
        <option value="E-mail">E-mail</option>
        <option value="Telepon">Telepon</option>
    </select></i>
</td>
<td>
    <textarea class="form-control detail_task-{{$request_complain->id}}" id="detail_task" >{{$request_complain->detail_task}}</textarea></i></td>
<td>
    <select class="select divisi-{{$request_complain->id}} " id="divisi" id="divisi" aria-label=".form-select-lg example">
        <option selected>Divisi</option>
        <option value="Operasional (CS)">Operasional (CS)</option>
        <option value="Lintas Divisi">Lintas Divisi</option>
        <option value="Operasional (Implementor)">Operasional (Implementor)</option>
    </select></i>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_respond-{{$request_complain->id}}" id="waktu_respond" placeholder="Waktu Respond" value="{{ str_replace(" ", "T", $request_complain->waktu_respond) }}"></i></div>
</td>
<td>
    <div class="input-div"><input type="text" class="input respond-{{$request_complain->id}}" id="respond" placeholder="Respond" value="{{ $request_complain->respond}}"></i></div>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_kesepakatan-{{$request_complain->id}}" id="waktu_kesepakatan" placeholder="Waktu Kesepakatan" value="{{ str_replace(" ", "T", $request_complain->waktu_kesepakatan) }}"></i></div>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_solve-{{$request_complain->id}}" id="waktu_solve" placeholder="Waktu Solve" value="{{ str_replace(" ", "T", $request_complain->waktu_solve) }}"></i></div>
</td>
<td>
    <select class="select status-{{$request_complain->id}}"  id="status" aria-label=".form-select-lg example">
        <option value="{{$request_complain->status}}"> {{$request_complain->status}} </option>
        <option value="On Progress">On Progress</option>
        <option value="Done">Done</option>
    </select></i>
</td>
<td>
    <div class="input-div"><input type="text" class="input status_akhir-{{$request_complain->id}}" id="status_akhir" placeholder="Status Akhir" value="{{ $request_complain->status_akhir}}"></i></div>
</td>
<td>
    <i class="fas fa-check add" id="edit" onclick="update({{ $request_complain->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
</td>