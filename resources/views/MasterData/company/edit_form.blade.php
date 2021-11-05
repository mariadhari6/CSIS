<<<<<<< HEAD
    <td></td>
=======
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
    <td></td>
    <td></td>


    <td>
<<<<<<< HEAD
        <div class="input-div"><input type="text" class="input company_name-{{$company->id}}" id="company_name" placeholder="Company Name" value="{{ $company->company_name}}"></i></div>
    </td>
    <td>
       <select class="form-control seller_id-{{$company->id}}"  id="seller_id" name="seller_id">
            @foreach ($seller as $sellers)
                <option value="{{ $sellers->id }}" {{ old('seller_id') == $sellers->id ? 'selected':'' }}>{{ $sellers->seller_name }}</option>
            @endforeach
=======
        <div class="input-div"><input type="text" class="input company_name-{{$company->id}}" id="company_name" placeholder="Company Name" value="{{ $company->company_name}}" required></i>
        </div>
    </td>
    <td>
       <select class="select seller_id-{{$company->id}}"  id="{{$company->id}}" name="seller_id" required>
        <option selected value="{{ $company->seller->id}}">
            {{ $company->seller->seller_name }}
        </option>

       @foreach ($seller as $item)
        <option value="{{ $item->id }}">
            {{ $item->seller_name }}
        </option>
       @endforeach

>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input customer_code-{{$company->id}}" id="customer_code" placeholder="Customer Code" value="{{ $company->customer_code}}" required>
        </div>
    </td>
    <td>
<<<<<<< HEAD
        <select class="form-control no_agreement_letter_id-{{$company->id}}" id="no_agreement_letter_id" name="no_agreement_letter_id">
            @foreach ($seller as $sellers)
                <option value="{{ $sellers->id }}" {{ old('no_agreement_letter_id') == $sellers->id ? 'selected':'' }}>{{ $sellers->no_agreement_letter }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="form-control" id="status" name="status">
            <option selected>{{$company->status}}</option>
            <option value="Contract">Contract</option>
            <option value="Terminate">Terminate</option>
            <option value="Trial">Trial</option>
            <option value="Register">Register</option>
        </select>
    </td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $company->id}})"></i>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
=======
        <select class="select no_agreement_letter_id-{{$company->id}}" id="no_agreement_letter_id" name="no_agreement_letter_id-{{$company->id}}" required>
        @foreach ($seller as $item)
        <option value="{{ $item->id }}" {{ old('no_agreement_letter_id') == $item->id ? 'selected':'' }}>
            {{ $item->no_agreement_letter }}
        </option>
        @endforeach

        </select>
    </td>
    <td>
        <select class="select status-{{$company->id}}" id="status" name="status" required>
            <option selected value="{{$company->status}}">{{$company->status}}</option>
             <option value="Active">Active</option>
            <option value="In Active">In Active</option>
        </select>
    </td>
    <td class="action sticky-col first-col">
        <i class="fas fa-check add" id="edit" onclick="update({{ $company->id}})"></i>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="seller_id"]').on('change', function() {
                var id = $(this).attr("id");
                var itemID = $(this).val();
                if(itemID) {
                    $.ajax({
                        url: '/dependent_company/'+itemID,
                        method: "GET",
                        dataType: "json",
                        success:function(data) {

                            $('select[name="no_agreement_letter_id-'+ id +'"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="no_agreement_letter_id-'+ id +'"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                        }
                    });
                }else{
                    $('select[name="no_agreement_letter_id-'+ id +'"]').empty();
                }
            });
        });
    </script>
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
