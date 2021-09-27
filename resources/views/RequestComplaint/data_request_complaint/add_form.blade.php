
<tr id="add_form">
   <td></td>
   <td></td>
   <td>
      <select class="select" id="company_id" name="company_id">
         @foreach ($company as $item)
         <option value="{{ $item->id }}" >{{ $item['company_name'] }}</option>
         @endforeach
      </select>   
   </td>
   <td>
      <select class="select" id="internal_eksternal">
         <option value="" disable selected>Internal_Eksternal</option>
         <option value="Internal">Internal</option>
         <option value="Eksternal">Eksternal</option>
      </select></i>
   </td>
   <td>
      <select class="select" id="pic_id" name="pic_id">
       @foreach ($pic as $item)
        <option value="{{ $item->id }}" >{{ $item['pic_name'] }}</option>
           
       @endforeach
      </select></i>
   </td>
   <td> 
      <div class="input-div"><input type="text" class="input" id="vehicle" placeholder="vehicle"></div>
   </td>

      <td> <div class="input-div"><input type="datetime-local" class="input" id="waktu_info" placeholder="waktu_info" required>
   </td>
   <td>
       <select class="select" id="task" name="task">
         <option value="" disable selected>Task</option>
         <option value="Pemasangan Mutasi & Pelepasan GPS">Pemasangan Mutasi & Pelepasan GPS</option>
         <option value="Maintenance">Maintenance</option>
      </select>   
   </td>
   <td>
      <select class="select" id="platform" name="platform">
         <option value="Platform" selected>Platform</option>
         <option value="Wa">Wa</option>
      </select>  
   </td>
   <td> 
       <div class="input-div"><input type="text" class="input" id="detail_task" placeholder="detail_task" required>
   </td>
   <td>
       <select class="select" id="divisi" name="divisi">
         <option value="" disable selected>Divisi</option>
         <option value="Operasional (CS)">Operasional (CS)</option>
         <option value="Lintas Divisi">Lintas Divisi</option>
      </select></i>
   </td>
   <td> 
      <div class="input-div"><input type="datetime-local" class="input" id="waktu_respond" placeholder="waktu_respond" required>
   </td>
   <td>
      <select class="select" id="respond" name="respond">
         <option value="" disable selected>Respond</option>
         <option value="Ambar">Ambar</option>
      </select></i>
   </td>
   <td> 
      <div class="input-div"><input type="datetime-local" class="input" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" required>
   </td>
   <td> 
      <div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="waktu_solve" required>
   </td>
   <td>
      <select class="select" id="status" name="status">
         <option value="" disable selected>Status</option>
         <option value="Done">Done</option>
         <option value="On Progress">On Progress</option>
      </select>   
   </td>
   <td> 
      <div class="input-div"><input type="text" class="input" id="status_akhir" placeholder="" required>
   </td>
   <td>
      <i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i>
   </td>


</tr>