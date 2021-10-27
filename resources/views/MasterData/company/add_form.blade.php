<tr id="add_form">
    <td></td>
    <td></td>
    <td> <div class="input-div"><input type="text" class="input" id="company_name" placeholder="Company Name" required></i></td>
    <td>
        <select class="select" id="seller_id" name="seller_id">
            <option value="" disabled selected >Pilih Seller</option>
            @foreach ($seller as $sellers)
                <option value="{{ $sellers->id }}" {{ old('seller_id') == $sellers->id ? 'selected':'' }}>{{ $sellers->seller_name }}</option>
            @endforeach
        </select>
    </td>
    <td><div class="input-div"><input type="text" class="input" id="customer_code" placeholder="Customer Code" required></i></td>
    <td>
        <select class="select" id="no_agreement_letter_id" name="no_agreement_letter_id">
            <option value="">Pilih No Agreement</option>

            @foreach ($seller as $item)
            <option value="{{ $item->id }}" {{ old('no_agreement_letter_id') == $item->id ? 'selected':'' }}>{{ $item->no_agreement_letter }}</option>
            @endforeach

        </select>
    </td>
        
   <td>
       <select class="select" id="status" name="status">
            <option selected><<--Pilih status-->></option>
            <option value="Contract">Contract</option>
            <option value="Terminate">Terminate</option>
            <option value="Trial">Trial</option>
            <option value="Register">Register</option>
        </select>
    </td>
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="seller_id"]').on('change', function() {
                var itemID = $(this).val();
                if(itemID) {
                    $.ajax({
                        url: '/dependent_company/'+itemID,
                        method: "GET",
                        success:function(data) {
                            
                            $('select[name="no_agreement_letter_id').empty();
                           
                                $.each(data, function(key, value) {
                                    $('select[name="no_agreement_letter_id').append('<option value="'+ key +'">'+ value.no_agreement_letter +'</option>');
                                   
                                });
                        }
                    });
                }else{
                    $('select[name="no_agreement_letter_id"]').empty();
                   
                }
        
            });
        });
    </script>  

</tr>

