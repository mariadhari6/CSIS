
    <td></td>
    <td></td>
<<<<<<< HEAD
    <td></td>
    <td>
        <select class="select company_id-{{$pic->id}}" id="company_id" name="company_id">
            @foreach ($company as $companys)
                <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>
            @endforeach
        </select>
=======

    <td>
        <select class="select company_id-{{$pic->id}}" id="company_id" name="company_id" required>
        <option value="{{ $pic->company->id }}">{{ $pic->company->company_name }}</option>

        @foreach ($company as $item)
        <option value="{{ $item->id }}">{{ $item->company_name }}</option>
        @endforeach

        </select></i>
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
    </td>
    <td>
        <div class="input-div"><input type="text" class="input pic_name-{{$pic->id}}" id="pic_name" placeholder="Pic Name" value="{{ $pic->pic_name}}" required></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input phone-{{$pic->id}}" id="phone" placeholder="Phone" value="{{ $pic->phone}}" required></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="email" class="input email-{{$pic->id}}" id="email" placeholder="Email" value="{{ $pic->email}}" required></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input position-{{$pic->id}}" id="position" placeholder="Position" value="{{ $pic->position}}" required></i>
        </div>
    </td>
     <td>
        <div class="input-div"><input type="date" class="input date_of_birth-{{$pic->id}}" id="date_of_birth" placeholder="date_of_birth" value="{{ $pic->date_of_birth}}"></i>
        </div>
    </td>
     <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $pic->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
<<<<<<< HEAD
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $pic->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
=======

>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
