<tr id="add_form">
   <td></td>
   <td></td>
   <td>
       <select class="select" id="company_id" name="company_id">
      @foreach ($company as $companys)
       <option value="{{ $companys->id }}">{{ $companys->company_name }}</option>
      @endforeach
   </select>
   </td>
   <td>
       <select class="select" id="internal_eksternal" name="internal_eksternal" aria-label=".form-select-lg example">
           <option selected>Pilih status</option>
           <option value="Request Internal">Internal Request</option>
           <option value="Complain Internal ">Internal Complain </option>
           <option value="Request Eksternal ">Ekternal Request </option>
           <option value="Complain Eksternal ">Eksternal Complain</option>
       </select>
   </td>
     <td>
         <select class="select" id="pic" name="pic">
           @foreach ($pic as $item)
               <option value="{{ $item->id }}">{{ $item->pic_name }}</option>
           @endforeach
        </select>
     </td>
   <td>
       <select class="select" id="vehicle" id="vehicle" aria-label=".form-select-lg example">
           <option selected>Vehicle</option>
           <option value="B-94828-YTS">B-94828-YTS</option>
           <option value="B-76267-TWS">B-76267-TWS</option>
       </select>
   </td>
   <td>
       <div class="input-div"><input type="datetime-local" class="input" id="waktu_info" placeholder="Waktu Info"></div>
   </td>
   <td>
   <select class="select" id="task" name="task">
      @foreach ($task_request as $item)
      <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->task }}</option>

      @endforeach
      </select>
   </td>
   <td>
       <select class="select" id="platform" id="platform" aria-label=".form-select-lg example">
           <option selected>Platform</option>
           <option value="WA">WA</option>
           <option value="SMS">SMS</option>
           <option value="E-mail">E-mail</option>
           <option value="Telepon">Telepon</option>
       </select>
   </td>
   <td>
       <textarea class="form-control" id="detail_task" name="detail_task" ></textarea>
   </td>
   <td>
       <select class="select" id="divisi" id="divisi" aria-label=".form-select-lg example">
       <option selected>Divisi</option>
           <option value="Operasional (CS)">Operasional (CS)</option>
           <option value="Lintas Divisi">Lintas Divisi</option>
           <option value="Operasional (Implementor)">Operasional (Implementor)</option>
       </select>
   </td>
   <td>
       <div class="input-div"><input type="datetime-local" class="input" id="waktu_respond" placeholder="Waktu Respond"></div>
   </td>
   <td>
       <div class="input-div"><input type="text" class="input" id="respond" placeholder="Respond" ></div>
   </td>
   <td>
       <div class="input-div"><input type="datetime-local" class="input" id="waktu_kesepakatan" placeholder="Waktu Kesepakatan" ></div>
   </td>
   <td>
       <div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="Waktu Solve" ></div>
   </td>
   <td>
       <select class="select"  id="status" aria-label=".form-select-lg example">
           <option selected>Platform</option>
           <option value="On Progress">On Progress</option>
           <option value="Done">Done</option>
       </select>
   </td>
   <td>
       <div class="input-div"><input type="text" class="input" id="status_akhir" placeholder="Status Akhir" ></div>
   </td>
   <td>
       <i class="fas fa-check add" id="add" onclick="store()"></i>
       <i class="fas fa-times cancel" onclick="cancel()"></i>
   </td>

</tr>