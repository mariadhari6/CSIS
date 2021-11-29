
    <td>
        <div class="input-div">
            <input type="text" class="input" id="merk_gps" placeholder="merk_gps" value="{{ $merk_gps->merk_gps}}" required>
        </div>
    </td>
    <td>
        <div class="input-div">
            <input type="text" class="input" id="type_gps" placeholder="type_gps" value="{{ $merk_gps->type_gps}}" required>
        </div>
    </td>


    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="update({{ $merk_gps->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
<script>



</script>
