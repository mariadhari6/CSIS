<tr id="add_form">
    <td></td>
<<<<<<< HEAD
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>
    <td><select class="form-control" id="company_id" name="company_id">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>

       @endforeach
    </select></i></td>
    {{-- <td> <div class="input-div"><input type="text" class="input" id="seller_id" placeholder="Seller id"></i></div></td> --}}
    <td> <div class="input-div"><input type="text" class="input" id="pic_name" placeholder="Pic Name"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="phone" placeholder="Phone"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="email" placeholder="Email"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="position" placeholder="Position"></i></td>
    <td> <div class="input-div"><input type="date" class="input" id="date_of_birth" placeholder="Date of birth"></i></td>
=======
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
    <td>
        <select class="select" id="company_id" name="company_id">

        @foreach ($company as $item)
            <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
        @endforeach

        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="pic_name" placeholder="Pic Name">
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="phone" placeholder="Phone">
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="email" placeholder="Email">
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="position" placeholder="Position">
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="date_of_birth" placeholder="Date of birth">
    </td>
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
</tr>

