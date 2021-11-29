<tr id="add_form">
    <td></td>
    <td></td>
    <td>
        <div class="input-div">
            <input type="text" class="input" id="company_name" placeholder="Company Name" required>
        </td>
    <td>
        <select class="select" id="seller_id" name="seller_id" required>
            <option class="hidden" value="">--Pilih Seller--</option>
            @foreach ($seller as $item)
            <option value="{{ $item->id }}" {{ old('seller_id') == $item->id ? 'selected':'' }}>{{ $item->seller_name }}</option>
            @endforeach

        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="customer_code" placeholder="Customer Code" required>
    </td>

    <td id="td-no_agreement">
        <select class="select" id="no_agreement_letter_id" name="no_agreement_letter_id" required>

            @foreach ($seller as $item)
            <option value="{{ $item->no_agreement_letter }}" {{ old('no_agreement_letter_id') == $item->id ? 'selected':'' }}>{{ $item->no_agreement_letter }}</option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="select" id="status" name="status" required>
            <option value="Active">Active</option>
            <option value="In Active">In Active</option>
        </select>
    </td>
    <td class="action sticky-col first-col">
        <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>


<script type="text/javascript">
   $('select[name="seller_id"]').on('change', function(){

                var Id = $(this).val();
                // var Id = $('#seller_id option:selected').text();
                if(Id != 22 ){
                    $.ajax({
                        url: '/dependent_company/'+ Id,
                        method: "GET",
                        success:function(data) {
                            $('select[name="no_agreement_letter_id').empty();
                            $.each(data, function(key, value) {
                                $('select[name="no_agreement_letter_id').append('<option value="'+ value.no_agreement_letter +'">'+ value.no_agreement_letter +'</option>');
                            });

                            $('select[name="free"]').hide();
                            $('#td-no_agreement').empty();
                            $.each(data, function(key, value) {
                                $('#td-no_agreement').append(
                                    '<select class="select" id="no_agreement_letter_id" name="no_agreement_letter_id" required>'
                                        +'<option value="'+ value.no_agreement_letter +'">'+ value.no_agreement_letter +'</option>'+
                                    '</select>'
                                );
                            });
                        }
                    });
                }else{
                    $('select[name="no_agreement_letter_id"]').hide();
                    $('#td-no_agreement').empty();
                    $('#td-no_agreement').append(
                        `<div class="input-div" name="free"><input type="text" class="input" id="no_agreement_letter_id" placeholder="No Agreement Letter"></div>`
                    );
                }

            });

</script>

</tr>

