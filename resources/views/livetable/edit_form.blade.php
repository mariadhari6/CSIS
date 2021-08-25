    <td>
        <i class="fas fa-check add" id="add" onclick="update({{ $usernames->id}})"></i><i class="fas fa-times cancel"></i></td>
    <td>
        <div class="input-div"><input type="text" class="input" id="FirstName" placeholder="First Name" value="{{ $usernames->FirstName}}"></i></div>
    </td>

<script>

function update(id) {
        var FirstName = $("#FirstName").val();
        var id = id;
        $.ajax({
            type: "get",
            url: "{{ url('update') }}/"+id,
            data: "FirstName=" + FirstName,
            success: function(data) {
              read()
            }
        })
    }

    // ---- Tombol Cancel -----
    $('.cancel').click(function() {
        read()
    });

    
</script>