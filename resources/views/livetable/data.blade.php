@foreach ($usernames as $username)
    <tr id="edit-form-{{ $username->id }}">
        <td id="td-button-{{ $username->id }}"><div id="button-{{ $username->id }}"><i class="fas fa-pen edit" onclick="edit({{ $username->id }})"></i><i class="fas fa-trash delete" onclick="destroy({{ $username->id }})"></i></div></td>
        <td id="td-{{ $username->id }}"><div id="item-{{ $username->id }}">{{ $username->FirstName}}</div></td>
        <td>{{ $username->LastName }}</td>
    </tr>
@endforeach

<script>
    // ----- Delete ------
    function destroy(id) {
        var id = id;
        confirm("Delete ?");
        $.ajax({
            type: "get",
            url: "{{ url('destroy') }}/" + id,
            data: "id=" + id,
            success: function(data) {
              read()
            }
        })
    }

    // ------ Edit Data ------
    function edit(id){
        var id = id;
        $("#td-button-"+id).slideUp("fast");
        $.get("{{ url('show') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    

</script>