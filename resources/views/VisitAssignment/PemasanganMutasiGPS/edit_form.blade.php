<td></td>
<td></td>
<td>
   {{-- <textarea class="form-control note-{{$pemasangan_mutasi_GPS->id}}" id="note" name="note" rows="3" required>{{$pemasangan_mutasi_GPS->note_pemasangan}}</textarea></i> --}}
   <label for="cars">Choose a car:</label>
   <select name="cars" id="cars" required>
      <option value="">None</option>
      <option value="volvo">Volvo</option>
      <option value="saab">Saab</option>
      <option value="mercedes">Mercedes</option>
      <option value="audi">Audi</option>
   </select>
</td>
<td>
   <button class="unstyled-button" type="submit">
      <i class="fas fa-check add" id="edit" onclick="update({{ $pemasangan_mutasi_GPS->id}})"></i>
   </button>
   <i class="fas fa-times cancel" onclick="cancel()" ></i>
</td>

<script type="text/javascript">
// $(document).ready(function() {
//     $('select[name="company_id"]').on('change', function() {
//         var itemID = $(this).val();
//         if(itemID) {
//             $.ajax({
//                 url: '/dependent_pemasanganmutasi/'+itemID,
//                 method: "GET",
//                 dataType: "json",
//                 success:function(data) {
//                     $('select[name="tanggal').empty();
//                         $.each(data, function(key, value) {
//                             $('select[name="tanggal').append('<option value="'+ key +'">'+ value +'</option>');
//                         });
//                 }
//             });
//             $.ajax({
//                 url: '/dependent_JenisPekerjaan/'+itemID,
//                 method: "GET",
//                 dataType: "json",
//                 success:function(data) {
//                     $('select[name="jenis_pekerjaan').empty();
//                         $.each(data, function(key, value) {
//                             $('select[name="jenis_pekerjaan').append('<option value="'+ key +'">'+ value +'</option>');
//                         });
//                 }
//             });
//         }else{
//             $('select[name="tanggal"]').empty();
//             $('select[name="jenis_pekerjaan"]').empty();
//         }
//     });
// });
</script>