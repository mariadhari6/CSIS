
    <td>
        <div class="input-div">
            <input type="text" class="input" id="service_status_name" placeholder="service status name" value="{{ $status_layanan->service_status_name}}" required>
        </div>
    </td>



    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="update({{ $status_layanan->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
<script>



</script>
