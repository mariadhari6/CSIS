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

    <td>
        <select class="select" id="no_agreement_letter_id" name="no_agreement_letter_id" required disabled>

            @foreach ($seller as $item)
            <option value="{{ $item->id }}" {{ old('no_agreement_letter_id') == $item->id ? 'selected':'' }}>{{ $item->no_agreement_letter }}</option>
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
    $(document).ready(function() {
        $('select[name="seller_id"]').on('change', function() {
            var itemID = $(this).val();
            if(itemID) {
                // alert(itemID);
                $.ajax({
                    url: '/dependent_company/'+ itemID,
                    method: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="no_agreement_letter_id').empty();
                            $.each(data, function(key, value) {
                                $('select[name="no_agreement_letter_id').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                    }
                });

            }else{
                // alert(itemID);
                        $('select[name="no_agreement_letter_id').empty();

            //     $('#td-no_agreement_letter').empty();
            //    $('#td-no_agreement_letter').append(
            //     `<div class="input-div"><input type="text" class="input" id="no_agreement_letter_id" placeholder="No Agreement Letter"></div>`);
            }
        });
    });

</script>

</tr>

