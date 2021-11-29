
    <td>
        <div class="input-div">
            <input type="text" class="input" id="name" placeholder="service status name" value="{{ $vehicle_type->name}}" required>
        </div>
    </td>



    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="update({{ $vehicle_type->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
<script>



</script>
