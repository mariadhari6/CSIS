<<<<<<< HEAD
<tr>
    <td></td>
    <td></td> 
    <td>
        <select class="select" id="company_id" name="company_id">
            <option value="" selected disabled>Pilih Company</option>
            @foreach ($company as $companys)
                <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>
            @endforeach
        </select>
    </td>
    <td> <div class="input-div"><input type="text" class="input" id="pic_name" placeholder="Pic Name"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="phone" placeholder="Phone"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="email" placeholder="Email"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="position" placeholder="Position"></i></td>
    <td> <div class="input-div"><input type="date" class="input" id="date_of_birth" placeholder="Date of birth"></i></td>
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
=======
<tr id="add_form">


    <td></td>
    <td></td>

    <td>
        <select class="select" id="company_id" name="company_id" required>

        @foreach ($company as $item)
            <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
        @endforeach

        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="pic_name" placeholder="Pic Name" required>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="phone" placeholder="Phone" required>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="email" placeholder="Email" required>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="position" placeholder="Position" required>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="date_of_birth" placeholder="Date of birth">
    </td>
     <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    <td>

>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb
</tr>
