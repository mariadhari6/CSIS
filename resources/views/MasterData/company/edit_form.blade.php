    <td></td>
    <td></td>
    <td>
        <div class="input-div"><input type="text" class="input company_name-{{$company->id}}" id="company_name" placeholder="Company Name" value="{{ $company->company_name}}"></i></div>
    </td>
    <td>
       <select class="form-control seller_id-{{$company->id}}"  id="seller_id" name="seller_id">
            @foreach ($seller as $sellers)
                <option value="{{ $sellers->id }}" {{ old('seller_id') == $sellers->id ? 'selected':'' }}>{{ $sellers->seller_name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input customer_code-{{$company->id}}" id="customer_code" placeholder="Customer Code" value="{{ $company->customer_code}}"></i></div>
    </td>
    <td>
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
