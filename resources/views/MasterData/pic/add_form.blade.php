<tr id="add_form">
    <td></td>
    <td></td>
    <td>
        <select class="select" id="company_id" name="company_id" required>
        <option value="" class="hidden">--Pilih Company--</option>
        @foreach ($company as $item)
            <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
        @endforeach

        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="pic_name" required>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="phone" required>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="email"  required>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="position"  required>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="date_of_birth">
    </td>
     <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    <td>

</tr>
