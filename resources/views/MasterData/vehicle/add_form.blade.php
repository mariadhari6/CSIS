<tr id="add_form">
    <td></td>
    <td></td>
    <td>
        <select class="select" id="company_id">
            @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
            @endforeach
        </select>
    </td>
    <td><div class="input-div"><input type="text" class="input" id="license_plate"></td>
    <td>
        <select class="select" id="vehicle_id">
            @foreach ($vehicleType as $item)
                <option value="{{ $item->id }}" {{ old('vehicle_id') == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </td>
    <td><div class="input-div"><input type="text" class="input" id="pool_name" required></td>
    <td><div class="input-div"><input type="text" class="input" id="pool_location" required></td>
    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>


      {{-- <script type="text/javascript">
   $(document).ready(function() {
       $('select[name="seller_id"]').on('change', function() {
           var stateID = $(this).val();
           if(stateID) {
               $.ajax({
                   url: '/dependent_company/'+stateID,
                   method: "GET",
                   dataType: "json",
                   success:function(data) {
                       $('select[name="no_agreement_letter_id"]').empty();
                       $.each(data, function(key, value) {
                           //------///
                         var compID = value;
                           $.ajax({
                              url: '/show_no_agreement/'+compID,
                              method: "GET",
                              dataType: "json",
                              success:function(data) {
                                 $('select[name="no_agreement_letter_id"]').empty();
                                 $.each(data, function(key, value) {
                                       //------///
                                       //---///
                                 $('select[name="no_agreement_letter_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                                 });
                              }
                           });
                           //---///
                       });
                   }
               });
           }else{
               $('select[name="no_agreement_letter_id"]').empty();
           }
       });
   });
</script> --}}

</tr>
