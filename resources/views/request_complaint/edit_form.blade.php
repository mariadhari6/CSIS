<td></td>
<td></td>
<td>
    <select class="select company_id-{{$request_complain->id}}" id="company_id" name="company_id" required>
        <option value="{{$request_complain->company_id}}"> {{$request_complain->companyRequest->company_name??''}} </option>
        @foreach ($detail as $item )
        <option name="company" value="{{ $item->company_id }}">{{ $item->company->company_name }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select internal_eksternal-{{$request_complain->id}}" id="internal_eksternal" name="internal_eksternal" aria-label=".form-select-lg example" required>
        <option value="{{$request_complain->internal_eksternal}}"> {{$request_complain->internal_eksternal}} </option>
        <option selected>{{$request_complain->internal_eksternal}}</option>
        <option value="Request Internal">Request Internal</option>
        <option value="Complain Internal">Complain Internal</option>
        <option value="Request Eksternal">Request Eksternal</option>
        <option value="Complain Eksternal">Complain Eksternal</option>
    </select>
</td>
<td>
    <select class="select pic_id-{{$request_complain->id}}" id="pic_id" name="pic_id" required>
        <option value="{{$request_complain->pic_id}}"> {{$request_complain->pic->pic_name??''}} </option>
        @foreach ($pic as $pics)
        <option value="{{ $pics->id }}" {{ old('pic_id') == $pics->id ? 'selected':'' }}>{{ $pics->pic_name }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select vehicle-{{$request_complain->id}}" id="vehicle" name="vehicle" required>
      <option value="{{$request_complain->vehicle}}"> {{$request_complain->vehicleRequest->license_plate??''}} </option>
      @foreach ($detail as $item)
          <option value="{{ $item->id }}" {{ $request_complain->id == $item->id ? 'selected':'' }}>{{ $item->vehicle->license_plate??'' }}</option>
      @endforeach 
    </select>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_info-{{$request_complain->id}}" id="waktu_info" placeholder="Waktu Info" value="{{ str_replace(" ", "T", $request_complain->waktu_info) }}" ></i></div>
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
    </select>
</td>
<td>
    <select class="select platform-{{$request_complain->id}}" id="platform" id="platform" aria-label=".form-select-lg example" required>
        <option value="{{$request_complain->platform}}"> {{$request_complain->platform}} </option>
        <option value="WA">WA</option>
        <option value="SMS">SMS</option>
        <option value="E-mail">E-mail</option>
        <option value="Telepon">Telepon</option>
    </select>
</td>
<td><textarea class="form-control detail_task-{{$request_complain->id}}" id="detail_task" required >{{$request_complain->detail_task}}</textarea></i></td>
<td>
    <select class="select" id="divisi" name="divisi" aria-label=".form-select-lg example" required>
        <option selected value="{{$request_complain->detail_task}}">{{$request_complain->detail_task}}</option>
        <option value="Opersional (CS)">Opersional (CS)</option>
        <option value="Lintas Divisi">Lintas Divisi</option>
        <option value="Operasional (Implementor)">Operasional (Implementor)</option>
    </select>
</td>
<td>
    <div class="input-div"><input type="text" class="input respond-{{$request_complain->id}}" id="respond" placeholder="Respond" value="{{ $request_complain->respond}}" required></i></div>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_kesepakatan-{{$request_complain->id}}" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" value="{{ str_replace(" ", "T", $request_complain->waktu_kesepakatan) }}" required ></i></div>
</td>
<td>
    <select class="select status-{{$request_complain->id}}"  id="status" aria-label=".form-select-lg example" required>
        <option value="{{$request_complain->status}}"> {{$request_complain->status}} </option>
        <option value="On Progress">On Progress</option>
        <option value="Done">Done</option>
    </select>
</td>
<td>
    <div class="input-div"><input type="datetime-local" class="input waktu_solve-{{$request_complain->id}}" id="waktu_solve" placeholder="waktu Solve" value="{{ str_replace(" ", "T", $request_complain->waktu_solve) }}" required></i></div>
</td>
<td>
    <div class="input-div"><input type="text" class="input status_akhir-{{$request_complain->id}}" id="status_akhir" placeholder="status akhir" value="{{ $request_complain->status_akhir}}" required ></i></div>
</td>
<td class="action sticky-col first-col">
    <i class="fas fa-check add" id="edit" onclick="update({{ $request_complain->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
</td>

<script>
    $('select[name="company_id"]').on('change', function() {
        var itemID = $(this).val();
        // alert(itemID);
        if(itemID) {
            $.ajax({
                url: '/based_pic/'+ itemID,
                method: "GET",
                success:function(data) {
                    $('select[name="pic_id').empty();
                    $('select[name="pic_id').append('<option value=""> </option>');
                        for(var i = 0 ; i < data.length ; i++) {
                            $('select[name="pic_id').append('<option value="'+ data[i].id + '"> '+ data[i].pic_name +'</option>');
                            // 16-Nov-2021   alert(data[i].serial_number)
                        }
                }
            });
             $.ajax({
                url: '/based_vehicle/'+ itemID,
                method: "GET",
                success:function(data) {
                
                    $('select[name="vehicle').empty();
                    $('select[name="vehicle').append('<option value=""> </option>');
                        for(var i = 0 ; i < data.length ; i++) {
                            $('select[name="vehicle').append('<option value="'+ data[i].id + '"> '+ data[i].vehicle_id +'</option>');
                            
                        }
                }
            });
        }
        else{
            $('select[name="pic_id"]').empty();
            $('select[name="vehicle"]').empty();

        }
    });

    
    $('select[name="status"]').on('change', function() {
        var itemID = $(this).val();
        
        if(itemID == "On Progress"){
           $('#td-solve').empty();
           $('#td-solve').append(
            `<div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="Waktu Solve" disabled></div>`
           );
        }
        else{
            $('#td-solve').empty();
            $('#td-solve').append(
            `<div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="Waktu Solve"></div>`
            );
        }
    });


</script>
    

    
 
  
   

    

     

    
    
   
   
   
   
    
   

 


