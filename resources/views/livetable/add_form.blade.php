<tr id="add_form">
    <td><i class="fas fa-check add" id="add" ></i><i class="fas fa-times cancel"></i></td>
    <td> <div class="input-div"><input type="text" class="input" id="FirstName" placeholder="First Name"></i></div></td>
    <td> <div class="input-div"><input type="text" class="input" id="LastName" placeholder="Last Name"></i></td>
</tr>    

<script>
    // ---- Tombol Cancel -----
    $('.cancel').click(function() {
      $("#add_form").slideUp("fast");
    });
    // ---- Tombol add -----
    $('.add').click(function() {
      store()
    });
   

    
</script>
