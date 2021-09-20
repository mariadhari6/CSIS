<<<<<<< HEAD
    <td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $company->id}})"></i>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input company_name-{{$company->id}}" id="company_name" placeholder="Company Name" value="{{ $company->company_name}}"></i>
        </div>
    </td>
    <td>
       <select class="form-control seller_id-{{$company->id}}"  id="{{$company->id}}" name="seller_id">
        <option selected value="{{ $company->seller->id}}">
            {{ $company->seller->seller_name }}
        </option>

       @foreach ($seller as $item)
        <option value="{{ $item->id }}">
            {{ $item->seller_name }}
        </option>
       @endforeach

        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input customer_code-{{$company->id}}" id="customer_code" placeholder="Customer Code" value="{{ $company->customer_code}}">
        </div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input no_po-{{$company->id}}" id="no_po" placeholder="No Po" value="{{ $company->no_po}}">
        </div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input po_date-{{$company->id}}" id="po_date" placeholder="Po Date" value="{{ $company->po_date}}">
        </div>
    </td>
    <td>
        <select class="form-control no_agreement_letter_id-{{$company->id}}" id="no_agreement_letter_id" name="no_agreement_letter_id-{{$company->id}}">
        
        @foreach ($seller as $item)
        <option value="{{ $item->id }}" {{ old('no_agreement_letter_id') == $item->id ? 'selected':'' }}>
            {{ $item->no_agreement_letter }}
        </option>
        @endforeach
        
        </select>
    </td>
    <td>
        <select class="form-control status-{{$company->id}}" id="status" name="status">
            <option selected value="{{$company->status}}">{{$company->status}}</option>
            <option value="Contract">Contract</option>
            <option value="Terminate">Terminate</option>
            <option value="Trial">Trial</option>
            <option value="Register">Register</option>
        </select>
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
=======

    <td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $company->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
       <td>
        <div class="input-div"><input type="text" class="input company_name-{{$company->id}}" id="company_name" placeholder="Company Name" value="{{ $company->company_name}}"></i></div>
    </td>
    <td>
       <select class="form-control seller_id-{{$company->id}}"  id="seller_id" name="seller_id">
       @foreach ($seller as $sellers)
        <option value="{{ $sellers->id }}" {{ old('seller_id') == $sellers->id ? 'selected':'' }}>{{ $sellers->seller_name }}</option>

       @endforeach
    </select></td>

    <td>
        <div class="input-div"><input type="text" class="input customer_code-{{$company->id}}" id="customer_code" placeholder="Customer Code" value="{{ $company->customer_code}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input no_po-{{$company->id}}" id="no_po" placeholder="No Po" value="{{ $company->no_po}}"></i></div>
    </td>
     <td>
        <div class="input-div"><input type="date" class="input po_date-{{$company->id}}" id="po_date" placeholder="Po Date" value="{{ $company->po_date}}"></i></div>
    </td>
        <td><select class="form-control no_agreement_letter_id-{{$company->id}}" id="no_agreement_letter_id" name="no_agreement_letter_id">
       @foreach ($seller as $sellers)
        <option value="{{ $sellers->id }}" {{ old('no_agreement_letter_id') == $sellers->id ? 'selected':'' }}>{{ $sellers->no_agreement_letter }}</option>

          {{-- <option value="{{ $sellers->id }}">{{ $sellers->seller_name}}</option> --}}
       @endforeach
    </select></i></td>
    <td><select class="form-control" id="status" name="status">
    <option selected>{{$company->status}}</option>
    <option value="Contract">Contract</option>
    <option value="Terminate">Terminate</option>
    <option value="Trial">Trial</option>
    <option value="Register">Register</option>
    </select></i></td>
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
