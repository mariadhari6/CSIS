
    <td>
        <div class="input-div">
            <input type="text" class="input" id="sensor_name" placeholder="Sensor Name" value="{{ $sensor_name->sensor_name}}" required>
        </div>
    </td>



    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="update({{ $sensor_name->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
<script>



</script>
