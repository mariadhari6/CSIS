

<tr id="add_form">
    <td></td>
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="company_name" placeholder="Company Name" required></i></td>
    <td><select class="form-control" id="seller_id" name="seller_id">
       @foreach ($seller as $sellers)
        <option value="{{ $sellers->id }}" {{ old('seller_id') == $sellers->id ? 'selected':'' }}>{{ $sellers->seller_name }}</option>
           <option value="{{ $sellers->id }}">{{ $sellers->seller_name}}</option>
       @endforeach
    </select></i></td>
    {{-- <td> <div class="input-div"><input type="text" class="input" id="seller_id" placeholder="Seller id"></i></div></td> --}}
    <td> <div class="input-div"><input type="text" class="input" id="customer_code" placeholder="Customer Code" required></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="no_po" placeholder="No Po" required></i></td>
    <td> <div class="input-div"><input type="date" class="input" id="po_date" placeholder="po date" required></i></td>
        <td><select class="form-control" id="no_agreement_letter_id" name="no_agreement_letter_id">
       @foreach ($seller as $sellers)
        <option value="{{ $sellers->id }}" {{ old('no_agreement_letter_id') == $sellers->id ? 'selected':'' }}>{{ $sellers->no_agreement_letter }}</option>

          {{-- <option value="{{ $sellers->id }}">{{ $sellers->seller_name}}</option> --}}
       @endforeach
    </select></i></td>
   <td><select class="form-control" id="status" name="status">
    <option selected><<--Pilih status-->></option>
    <option value="Contract">Contract</option>
    <option value="Terminate">Terminate</option>
    <option value="Trial">Trial</option>
    <option value="Register">Register</option>
    </select></i></td>

</tr>
