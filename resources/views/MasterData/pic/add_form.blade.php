<tr id="add_form">
    <td></td>
    <td></td>
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
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
</tr>

