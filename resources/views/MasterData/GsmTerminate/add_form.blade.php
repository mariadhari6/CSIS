<tr id="add_form">
    <td></td>
<<<<<<< HEAD
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()">
    </td>
    <td> 
        <div class="input-div">
            <input type="date" class="input" id="request_date" placeholder="Request Date" >
        </div>
    </td>
    <td> 
        <div class="input-div"><input type="date" class="input" id="terminate_date" placeholder="Terminate_date">
        </div>
    </td>
    <td>
        <select class="form-control" id="gsm_active_id" name="gsm_active_id">
        @foreach ($GsmActive as $item)
        <option value="{{ $item->gsmPreActive->id }}">
            {{$item->gsmPreActive->gsm_number}}
        </option>
        @endforeach
        </select>
    </td>
    <td>
        <select class="form-control" id="status_active" id="status_active" aria-label=".form-select-lg example">
        <option value="Sukses">Sukses</option>
        <option value="Tidak Sukses">Tidak Sukses</option>
        </select></i></td>
    <td>
        <select class="form-control" id="company_id" name="company_id">
            @foreach ($GsmActive as $item)
            <option value="{{ $item->company_id }}">
            {{$item->company->company_name}}
            </option>
            @endforeach
        </select>
    </td>
    <td>
        <textarea class="form-control" id="note" name="note" rows="3"></textarea>
    </td>

=======
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>
     <td> <div class="input-div"><input type="date" class="input" id="request_date" placeholder="Request Date" ></i></td>
    <td> <div class="input-div"><input type="date" class="input" id="active_date" placeholder="Active_date"></i></td>
    <td><select class="form-control" id="gsm_active_id" name="gsm_active_id">
       @foreach ($GsmActive as $GsmActives)
        <option value="{{ $GsmActives->id }}" {{ old('gsm_active_id') == $GsmActives->id  ? 'selected':'' }}>
        {{$GsmActives->gsmPreActive->gsm_number}}

            {{-- @foreach ($GsmTerminate as $GsmTerminates)
                {{ $GsmTerminates->gsmActive->gsm_pre_active_id}}
        @endforeach --}}
        </option>

       @endforeach
    </select></i></td>
    {{-- <td> <div class="input-div"><input type="text" class="input" id="seller_id" placeholder="Seller id"></i></div></td> --}}

    <td><select class="form-control" id="status_active" id="status_active" aria-label=".form-select-lg example">
    {{-- <option selected>Pilih status</option> --}}
    <option value="Sukses">Sukses</option>
    <option value="Tidak Sukses">Tidak Sukses</option>
    </select></i></td>

    <td><select class="form-control" id="company_id" name="company_id">

       @foreach ($GsmActive as $GsmActives)

        <option value="{{ $GsmActives->id }}" {{ old('company_id') == $GsmActives->id  ? 'selected':'' }}>
        {{$GsmActives->company->company_name}}
       </option>
       @endforeach
    </select></i></td>

      <td><textarea class="form-control" id="note" name="note" rows="3"></textarea></i></td>
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
    <script type="text/javascript">
   $(document).ready(function() {
       $('select[name="gsm_active_id"]').on('change', function() {
           var stateID = $(this).val();
           if(stateID) {
               $.ajax({
                   url: '/dependent_terminate/'+stateID,
                   type: "GET",
                   dataType: "json",
                   success:function(data) {
                       $('select[name="company_id"]').empty();
                       $.each(data, function(key, value) {
<<<<<<< HEAD
=======

>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
                           //------///
                         var compID = value;
                           $.ajax({
                              url: '/show_company/'+compID,
                              type: "GET",
                              dataType: "json",
                              success:function(data) {
                                 $('select[name="company_id"]').empty();
                                 $.each(data, function(key, value) {
<<<<<<< HEAD
                                       //------///
                                        $('select[name="company_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                                       //---///
                                    });
                                }
                            });
=======

                                       //------///




                                       //---///
                                 $('select[name="company_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                                 });
                              }
                           });


>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
                           //---///
                       });
                   }
               });
           }else{
               $('select[name="company_id"]').empty();
           }
       });
   });
</script>
</tr>
<<<<<<< HEAD
=======

>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
