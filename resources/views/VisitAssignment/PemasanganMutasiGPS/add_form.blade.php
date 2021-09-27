<tr id="add_form">
   <td></td>
   <td></td>
   <td>
       <select class="select" id="company_id" name="company_id">
           <option value="" disabled selected>Company</option>

           @foreach ($request_complain as $item)
               <option value="{{ $item->id }}" }>
                  {{ $item->company->company_name }}
               </option>
           @endforeach

       </select>
   </td>
   <td>
      <select class="select" id="tanggal" name="tanggal">
         <option value="" disabled selected>Tanggal</option>

         @foreach ($request_complain as $request_complains)
            <option value="{{ $request_complains->id }}" {{ old('tanggal') == $request_complains->id  ? 'selected':'' }}>
               {{$request_complains->waktu_kesepakatan}}
            </option>
         @endforeach

      </select>
   </td>
   <td>
      <select class="select" id="kendaraan_awal" name="kendaraan_awal">
         <option value="" disabled selected>Kendaraan Awal</option>

         @foreach ($request_complain as $item)
            <option value="{{ $item->id }}" {{ old('kendaraan_awal') == $item->id  ? 'selected':'' }}>
               {{$item->vehicle}}
            </option>
         @endforeach

      </select>
   </td>
   <td>
      <select class="select" id="imei" name="imei">
         <option value="" disabled selected>IMEI</option>

         @foreach ($details as $detail)
            <option value="{{ $detail->id }}" {{ old('imei') == $detail->id  ? 'selected':'' }}>
               {{$detail->imei}}
            </option>
         @endforeach

      </select>
   </td>
   <td>
      <select class="select" id="gsm_pemasangan" name="gsm_pemasangan">
         <option value="" disabled selected>GSM Pemsangan</option>

         @foreach ($details as $detail)
            <option value="{{ $detail->id }}" {{ old('gsm_pemasangan') == $detail->id  ? 'selected':'' }}>
               {{$detail->gsm}}
            </option>
         @endforeach

      </select>
   </td>
   <td>
      <select class="select" id="kendaraan_pasang" name="kendaraan_pasang">
         <option value="" disabled selected>Kendaraan Pasang</option>

         @foreach ($request_complain as $item)
            <option value="{{ $item->id }}" {{ old('kendaraan_pasang') == $item->id  ? 'selected':'' }}>
               {{$item->vehicle}}
            </option>
         @endforeach

      </select>
   </td>
   <td>
      <select class="select" id="jenis_pekerjaan" name="jenis_pekerjaan">
         <option value="" disabled selected>Jenis Pekerjaan</option>

         @foreach ($request_complain as $item)
            <option value="{{ $item->id }}" {{ old('jenis_pekerjaan') == $item->id  ? 'selected':'' }}>
               {{$item->task}}
            </option>
         @endforeach

      </select>
   </td>
    <td>
      <select class="select" id="equipment_terpakai_gps" name="equipment_terpakai_gps">
         <option value="" disabled selected>equipment GPS</option>

         @foreach ($gps as $item)
            <option value="{{ $item->id }}" {{ old('equipment_terpakai_gps') == $item->id  ? 'selected':'' }}>
               {{$item->type}}
            </option>
         @endforeach

      </select>
   </td>
   <td>
      <select class="select" id="equipment_terpakai_sensor" name="equipment_terpakai_sensor">
         <option value="" disabled selected>equipment Sensor </option>

         @foreach ($sensor as $item)
         <option value="{{ $item->id }}" {{ old('equipment_terpakai_sensor') == $item->id  ? 'selected':'' }}>
         {{$item->sensor_name}}
         </option>
         @endforeach

      </select>
   </td>
   <td>
      <select class="select" id="teknisi" name="teknisi" aria-label=".form-select-lg example">
         <option value="" disabled selected>Teknisi</option>
         <option value="Khatam">Khatam</option>
         <option value="Rifai">Rifai</option>
         <option value="Arief">Arief</option>
         <option value="Mukhti">Mukhti</option>
      </select>
   </td>
   <td> 
      <div class="input-div"><input type="number" class="input" id="uang_transportasi" placeholder="Uang Transpotasi" >
   </td>
   <td>
      <select class="select" id="type_visit" name="type_visit" aria-label=".form-select-lg example">
         <option value="" disabled selected>Type Visit</option>
         <option value="Visit SLA">Visit SLA</option>
         <option value="Visit Berbayar">Visit Berbayar</option>
      </select>   
   <td>
      <textarea class="form-control" id="note" name="note" rows="3"></textarea>  
   </td>
   <td>
      <i class="fas fa-check add" id="add" onclick="store()"></i>
      <i class="fas fa-times cancel" onclick="cancel()"></i>
  </td>

<script type="text/javascript">
   $(document).ready(function() {
       $('select[name="company_id"]').on('change', function() {
           var itemID = $(this).val();
           if(itemID) {
               $.ajax({
                   url: '/dependent_pemasanganmutasi/'+itemID,
                   method: "GET",
                   dataType: "json",
                   success:function(data) {
                       $('select[name="tanggal').empty();
                           $.each(data, function(key, value) {
                               $('select[name="tanggal').append('<option value="'+ key +'">'+ value +'</option>');
                           });
                   }
               });
               $.ajax({
                   url: '/dependent_JenisPekerjaan/'+itemID,
                   method: "GET",
                   dataType: "json",
                   success:function(data) {
                       $('select[name="jenis_pekerjaan').empty();
                           $.each(data, function(key, value) {
                               $('select[name="jenis_pekerjaan').append('<option value="'+ key +'">'+ value +'</option>');
                           });
                   }
               });
           }else{
               $('select[name="tanggal"]').empty();
               $('select[name="jenis_pekerjaan"]').empty();
           }
       });
   });
</script>


</tr>