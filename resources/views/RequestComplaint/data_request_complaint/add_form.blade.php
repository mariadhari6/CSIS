<tr id="add_form">
   <td></td>
   <td>
      <i class="fas fa-check add" id="add" onclick="store()"></i>
      <i class="fas fa-times cancel" onclick="cancel()"></i>
   </td>
   <td>
      <select class="select" id="company_id" name="company_id">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>
           
       @endforeach
      </select>
   </td>
   <td>
      <select class="select" id="internal_eksternal" name="internal_eksternal" aria-label=".form-select-lg example">
         <option value="" disable selected>Internal_Eksternal</option>
         <option value="Internal Request">Internal Request</option>
         <option value="Internal Complain">Internal Complain</option>
         <option value="Eksternal Request">Eksternal Request</option>
         <option value="Eksternal Complain">Eksternal Complain</option>
      </select>
   </td>
   <td>
      <select class="select" id="pic" name="pic">
       @foreach ($pic as $pics)
       <option value="{{ $pics->id }}" {{ old('pic') == $pics->id ? 'selected':'' }}>{{ $pics->pic_name }}</option>
           
       @endforeach
      </select>
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
         <option value="" disable selected>Platform</option>
         <option value="Wa">Wa</option>
         <option value="SMS">SMS</option>
         <option value="E-mail">E-mail</option>
         <option value="Telepon">Telepon</option>
    </select>
   </td>

    <td> 
       <textarea class="form-control" id="detail_task" name="detail_task" ></textarea></i>
   </td>

    <td>
       <select class="select" id="divisi" name="divisi">
         <option value="" disable selected>Divisi</option>
         <option value="Operasional (CS)">Operasional (CS)</option>
         <option value="Lintas Divisi">Lintas Divisi</option>
    </select>
   </td>

    <td> 
       <div class="input-div"><input type="datetime-local" class="input" id="waktu_respond" placeholder="waktu_respond" required>
   </td>

    <td>
       <select class="select" id="respond" name="respond">
         <option value="" disable selected>Respond</option>
         <option value="Ambar">Ambar</option>
    </select>
   </td>

    <td> 
       <div class="input-div"><input type="datetime-local" class="input" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" required>
   </td>

    <td> 
       <div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="waktu_solve" required>
   </td>
   
    <td><select class="select" id="status" name="status">
    <option value="" disable selected>Status</option>
    <option value="Done">Done</option>
    <option value="On Progress">On Progress</option>
    </select>
   </td>

    <td> 
       <div class="input-div"><input type="text" class="input" id="status_akhir" placeholder="" required>
   </td>


</tr>
