
    <td>
        <div class="input-div">
            <input type="text" class="input" id="task" placeholder="task" value="{{ $task->task}}" required>
        </div>
    </td>
    <td>
        <div class="input-div">
            <input type="text" class="input" id="jenis" placeholder="jenis" value="{{ $task->jenis}}" required>
        </div>
    </td>


    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="update({{ $task->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
<script>



</script>
