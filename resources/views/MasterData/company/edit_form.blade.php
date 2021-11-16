    <td></td>
    <td></td>


    <td>
        <div class="input-div"><input type="text" class="input company_name-{{$company->id}}" id="company_name" placeholder="Company Name" value="{{ $company->company_name}}" required></i>
        </div>
    </td>
    <td>
       <select class="select seller_id-{{$company->id}}"  id="seller_id" name="seller_id" required>
        {{-- <option class="hidden" selected value="{{ $company->seller_id}}">
            {{ $company->seller_id }}
        </option> --}}

       @foreach ($seller as $item)
        <option value="{{ $item->seller_name}}">
            {{ $item->seller_name }}
        </option>
       @endforeach

        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input customer_code-{{$company->id}}" id="customer_code" placeholder="Customer Code" value="{{ $company->customer_code}}" required>
        </div>
    </td>
    <td id="td-no_agreement">
        <select class="select no_agreement_letter_id-{{$company->id}}" id="no_agreement_letter_id" name="no_agreement_letter_id" required>
        @foreach ($seller as $item)
        <option value="{{ $item->id }}" >
            {{ $item->no_agreement_letter }}
        </option>
        @endforeach

        </select>
    </td>
    <td>
        <select class="select status-{{$company->id}}" id="status" name="status" required>
            <option selected class="hidden" value="{{$company->status}}">{{$company->status}}</option>
             <option value="Active">Active</option>
            <option value="In Active">In Active</option>
        </select>
    </td>
    <td class="action sticky-col first-col">
        <i class="fas fa-check add" id="edit" onclick="update({{ $company->id}})"></i>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
  <script type="text/javascript">
   $('select[name="seller_id"]').on('change', function(){

                // var Id = $(this).val();
                var Id = $('#seller_id option:selected').text();
                // alert(Id);
                if(Id != 'Integrasia Utama, PT' ){
                    $.ajax({
                        url: '/dependent_company/'+ Id,
                        method: "GET",
                        success:function(data) {
                            $('select[name="no_agreement_letter_id').empty();
                            $.each(data, function(key, value) {
                                $('select[name="no_agreement_letter_id').append('<option value="'+ value.no_agreement_letter +'">'+ value.no_agreement_letter +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="no_agreement_letter_id').empty();
                     $('#td-no_agreement').empty();
                    $('#td-no_agreement').append(
                    `<div class="input-div"><input type="text" class="input" id="no_agreement_letter_id" placeholder="No Agreement Letter"></div>`
                    );
                }

            });

</script>
