<tr id="add_form">
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>
    <td><select class="form-control" id="company_id" name="company_id">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>

          {{-- <option value="{{ $sellers->id }}">{{ $sellers->seller_name}}</option> --}}
       @endforeach
    </select></i></td>
    {{-- <td> <div class="input-div"><input type="text" class="input" id="seller_id" placeholder="Seller id"></i></div></td> --}}
    <td> <div class="input-div"><input type="text" class="input" id="pic_name" placeholder="Pic Name"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="email" placeholder="Email"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="position" placeholder="Position"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="phone" placeholder="Phone"></i></td>
    <td> <div class="input-div"><input type="date" class="input" id="date_of_birth" placeholder="Date of birth"></i></td>
</tr>

