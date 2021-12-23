
    <td></td>
    <td></td>
    <td>
        <select class="select status_gsm-{{$GsmTerminate->id}}" id="status_gsm" name="status_gsm" required>
            <option value="Ready" {{ $GsmTerminate->status_gsm == 'Ready' ? 'selected' : ''  }}>Ready</option>
            <option value="Active" {{ $GsmTerminate->status_gsm == 'Active' ? 'selected' : ''  }}>Active</option>
            <option value="Terminate" {{ $GsmTerminate->status_gsm == 'Terminate' ? 'selected' : ''  }}>Terminate</option>
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input gsm_number-{{$GsmTerminate->id}}" id="gsm_number" placeholder="Gsm Number" value="{{ $GsmTerminate->gsm_number}}" required></div>
    </td>
    <td>

        <select class="select company_id-{{$GsmTerminate->id}}" id="company_id" name="company_id" required>
            @foreach ($company as $item)
            <option value="{{ $item->id }}" {{ $item->id == $GsmTerminate->company_id ? 'selected' : '' }}>{{ $item->company_name }}</option>
            @endforeach
        </select></i>
    </td>
    <td>

        <div class="input-div"><input type="date" class="input request_date-{{$GsmTerminate->id}}" id="request_date" placeholder="Request Date" value="{{ $GsmTerminate->request_date}}" required>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input terminate_date-{{$GsmTerminate->id}}" id="terminate_date" placeholder="Active Date" value="{{ $GsmTerminate->terminate_date}}" required>
        </div>
    </td>
    <td>
        <textarea class="form-control note-{{$GsmTerminate->id}}" id="note" name="note" rows="3" required>{{$GsmTerminate->note}}</textarea>
    </td>
     <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $GsmTerminate->id}})"></i>
        </button>
         <button class="unstyled-button" type="submit">
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
         </button>
    </td>


<script type="text/javascript">
   $(document).ready(function() {
       $('select[name="gsm_active_id"]').on('change', function() {
           var id = $(this).attr("id");
           var stateID = $(this).val();
           if(stateID) {
               $.ajax({
                   url: '/dependent_terminate/'+stateID,
                   type: "GET",
                   dataType: "json",
                   success:function(data) {
                       $('select[name="company_id-'+id+'"]').empty();
                       $.each(data, function(key, value) {
                           //------///
                         var compID = value;
                           $.ajax({
                              url: '/show_company/'+compID,
                              type: "GET",
                              dataType: "json",
                              success:function(data) {
                                 $('select[name="company_id-'+id+'"]').empty();
                                 $.each(data, function(key, value) {
                                       //------///
                                       //---///
                                 $('select[name="company_id-'+id+'"]').append('<option value="'+ key +'">'+ value +'</option>');
                                 });
                              }
                           });
                           //---///
                       });
                   }
               });
           }else{
               $('select[name="company_id-'+id+'"]').empty();
           }
       });
   });
</script>
