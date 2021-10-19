    <td></td>
    <td></td>

    <td>
        <select class="select company_id-{{$pic->id}}" id="company_id" name="company_id" required>
        <option value="{{ $pic->company->id }}">{{ $pic->company->company_name }}</option>

        @foreach ($company as $item)
        <option value="{{ $item->id }}">{{ $item->company_name }}</option>
        @endforeach

        </select></i>
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
        <div class="input-div"><input type="date" class="input date_of_birth-{{$pic->id}}" id="date_of_birth" placeholder="date_of_birth" value="{{ $pic->date_of_birth}}" required></i>
        </div>
    </td>
   <td>
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $pic->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
