    <td></td>
    <td></td>


    <td>
        <div class="input-div"><input type="text" class="input company_name-{{$company->id}}" id="company_name" placeholder="Company Name" value="{{ $company->company_name}}" required></i>
        </div>
    </td>
    <td>
       <select class="select seller_id-{{$item->id}}"  id="{{$item->id}}" name="seller_id">
        <option selected value="{{ $item->seller->id}}">
            {{ $item->seller->seller_name }}
        </option>

       @foreach ($seller as $item)
        <option value="{{ $item->id }}">
            {{ $item->seller_name }}
        </option>
       @endforeach

        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input customer_code-{{$company->id}}" id="customer_code" placeholder="Customer Code" value="{{ $company->customer_code}}" required>
        </div>
    </td>
    <td>
        <select class="form-control no_agreement_letter_id-{{$item->id}}" id="no_agreement_letter_id" name="no_agreement_letter_id-{{$item->id}}">

        <option selected value="{{ $item->seller->id}}">
            {{ $item->seller->no_agreement_letter }}
        </option>

        @foreach ($seller as $item)
        <option value="{{ $item->id }}" {{ old('no_agreement_letter_id') == $item->id ? 'selected':'' }}>
            {{ $item->no_agreement_letter }}
        </option>
        @endforeach

        </select>
    </td>
    <td>
        <select class="form-control status-{{$item->id}}" id="status" name="status">
            <option selected value="{{$item->status}}">{{$item->status}}</option>
            <option value="Contract">Contract</option>
            <option value="Terminate">Terminate</option>
            <option value="Trial">Trial</option>
            <option value="Register">Register</option>
        </select>
    </td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $item->id}})"></i>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
