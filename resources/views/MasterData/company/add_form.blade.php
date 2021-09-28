

<tr id="add_form">
    <td></td>
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="company_name" placeholder="Company Name" required></i></td>
    <td><select class="select" id="seller_id" name="seller_id">
    <option value="" disabled selected >Pilih Seller</option>
       @foreach ($seller as $sellers)
        <option value="{{ $sellers->id }}" {{ old('seller_id') == $sellers->id ? 'selected':'' }}>{{ $sellers->seller_name }}</option>

          {{-- <option value="{{ $sellers->id }}">{{ $sellers->seller_name}}</option> --}}
       @endforeach
    </select></i></td>
    {{-- <td> <div class="input-div"><input type="text" class="input" id="seller_id" placeholder="Seller id"></i></div></td> --}}
    <td> <div class="input-div"><input type="text" class="input" id="customer_code" placeholder="Customer Code" required></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="no_po" placeholder="No Po" required></i></td>
    <td> <div class="input-div"><input type="date" class="input" id="po_date" placeholder="po date" required></i></td>
        <td><select class="select" id="no_agreement_letter_id" name="no_agreement_letter_id">
    <option value="">----Pilih No Agreement----</option>
       @foreach ($seller as $sellers)
        <option value="{{ $sellers->id }}" {{ old('no_agreement_letter_id') == $sellers->id ? 'selected':'' }}>
            {{  $sellers->no_agreement_letter }}
        </option>
       @endforeach
    </select></i></td>
   <td><select class="select" id="status" name="status">
    <option selected><<--Pilih status-->></option>
    <option value="Contract">Contract</option>
    <option value="Terminate">Terminate</option>
    <option value="Trial">Trial</option>
    <option value="Register">Register</option>
    </select></i></td>

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

