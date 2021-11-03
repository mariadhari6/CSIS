
    <td></td>
    <td></td>



    <td><select class="select company_id-{{$request_complain->id}}" id="company_id" name="company_id" required>
        <option value="{{$request_complain->company_id}}"> {{$request_complain->companyRequest->company_name??''}} </option>
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>

       @endforeach
    </select></i></td>

    <td><select class="select internal_eksternal-{{$request_complain->id}}" id="internal_eksternal" name="internal_eksternal" aria-label=".form-select-lg example" required>
    <option value="{{$request_complain->internal_eksternal}}"> {{$request_complain->internal_eksternal}} </option>
    <option selected>{{$request_complain->internal_eksternal}}</option>
   <option value="Request Internal">Request Internal</option>
    <option value="Complain Internal">Complain Internal</option>
    <option value="Request Eksternal">Request Eksternal</option>
    <option value="Complain Eksternal">Complain Eksternal</option>
    </select></i></td>

    <td><select class="select pic_id-{{$request_complain->id}}" id="pic_id" name="pic_id" required>
    <option value="{{$request_complain->pic_id}}"> {{$request_complain->pic->pic_name??''}} </option>

       @foreach ($pic as $pics)
        <option value="{{ $pics->id }}" {{ old('pic_id') == $pics->id ? 'selected':'' }}>{{ $pics->pic_name }}</option>

       @endforeach
    <td>
          <select class="select vehicle-{{$request_complain->id}}" id="vehicle" name="vehicle" required>
            <option value=""> {{$request_complain->vehicleRequest->license_plate??''}} </option>

            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('vehicle') == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>

            @endforeach
         </select></i>
      </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input waktu_info-{{$request_complain->id}}" id="waktu_info" placeholder="Waktu Info" value="{{ str_replace(" ", "T", $request_complain->waktu_info) }}" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input waktu_respond-{{$request_complain->id}}" id="waktu_respond" placeholder="Waktu Respond" value="{{ str_replace(" ", "T", $request_complain->waktu_respond) }}" required ></i></div>
    </td>

    <td>
        <select class="select task-{{$request_complain->id}}" id="task" name="task" required>
        <option value="{{$request_complain->task}}"> {{$request_complain->taskRequest->task??''}} </option>
       @foreach ($task_request as $item)
        <option value="{{ $item->id }}" {{ old('task') == $item->id ? 'selected':'' }}>{{ $item->task }}</option>

       @endforeach
    </select></i>
    </td>

     <td><select class="select platform-{{$request_complain->id}}" id="platform" id="platform" aria-label=".form-select-lg example" required>
    <option value="{{$request_complain->platform}}"> {{$request_complain->platform}} </option>
    <option value="WA">WA</option>
    <option value="SMS">SMS</option>
    <option value="E-mail">E-mail</option>
    <option value="Telepon">Telepon</option>
    </select></i></td>

    <td><textarea class="form-control detail_task-{{$request_complain->id}}" id="detail_task" required >{{$request_complain->detail_task}}</textarea></i></td>
    <td>
        <div class="input-div"><input type="text" class="input divisi-{{$request_complain->id}}" id="divisi" placeholder="Divisi" value="{{ $request_complain->divisi}}" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input respond-{{$request_complain->id}}" id="respond" placeholder="Respond" value="{{ $request_complain->respond}}" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input waktu_kesepakatan-{{$request_complain->id}}" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" value="{{ str_replace(" ", "T", $request_complain->waktu_kesepakatan) }}" required ></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input waktu_solve-{{$request_complain->id}}" id="waktu_solve" placeholder="waktu Solve" value="{{ str_replace(" ", "T", $request_complain->waktu_solve) }}" required></i></div>
    </td>
   <td>
        <select class="select status-{{$request_complain->id}}"  id="status" aria-label=".form-select-lg example" required>
            <option value="{{$request_complain->status}}"> {{$request_complain->status}} </option>
            <option value="On Progress">On Progress</option>
            <option value="Done">Done</option>
        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input status_akhir-{{$request_complain->id}}" id="status_akhir" placeholder="status akhir" value="{{ $request_complain->status_akhir}}" required ></i></div>
    </td>
    <td class="action sticky-col first-col">
        <i class="fas fa-check add" id="edit" onclick="update({{ $request_complain->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>


