    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $pic->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <td><select class="form-control" id="company_id" name="company_id">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>

          {{-- <option value="{{ $sellers->id }}">{{ $sellers->seller_name}}</option> --}}
       @endforeach
    </select></i></td>

    <td>
        <div class="input-div"><input type="text" class="input" id="pic_name" placeholder="Pic Name" value="{{ $pic->pic_name}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="email" class="input" id="email" placeholder="Email" value="{{ $pic->email}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="position" placeholder="Position" value="{{ $pic->position}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="phone" placeholder="Phone" value="{{ $pic->phone}}"></i></div>
    </td>
     <td>
        <div class="input-div"><input type="date" class="input" id="date_of_birth" placeholder="date_of_birth" value="{{ $pic->date_of_birth}}"></i></div>
    </td>
