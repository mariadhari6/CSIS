<tr id="add_form">
    <td></td>
    <td></td>
    <td>
        <div class="input-div">
            <input type="date" class="input" id="request_date" placeholder="Request Date" required>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="terminate_date" placeholder="Terminate_date" required>
        </div>
    </td>
    <td>
        <select class="select" id="gsm_active_id" name="gsm_active_id" required>
        @foreach ($GsmActive as $item)
        <option value="{{ $item->gsmPreActive->id }}">
            {{$item->gsmPreActive->gsm_number}}
        </option>
        @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="status_active" id="status_active" aria-label=".form-select-lg example" required>
        <option value="Sukses">Sukses</option>
        <option value="Tidak Sukses">Tidak Sukses</option>
        </select></i></td>
    <td>
        <select class="select" id="company_id" name="company_id" required>
            @foreach ($GsmActive as $item)
            <option value="{{ $item->company_id }}">
            {{$item->company->company_name}}
            </option>
            @endforeach
        </select>
    </td>
    <td>
        <textarea class="form-control" id="note" name="note" rows="3" required></textarea>
    </td>
    <td>
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    <td>


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
                           //------///
                         var compID = value;
                           $.ajax({
                              url: '/show_company/'+compID,
                              type: "GET",
                              dataType: "json",
                              success:function(data) {
                                 $('select[name="company_id"]').empty();
                                 $.each(data, function(key, value) {
                                       //------///
                                        $('select[name="company_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                                       //---///
                                    });
                                }
                            });
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
