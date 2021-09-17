    <button class="btn btn-primary btn-round" id="save-selected" onclick="updateSelected()" >
        <i class="fas fa-"></i> 
        Save
    </button>
    <button class="btn btn-danger btn-round " id="cancel-selected" onclick="cancelUpdateSelected()">
        Cancel
    </button>

    <script>
         //--------Proses Batal--------
         function cancelUpdateSelected(){
            $("#save-selected").hide("fast");
            $("#cancel-selected").hide("fast");
            $(".add").show("fast");
            $(".edit_all").show("fast");
            $(".delete_all").show("fast");
            read();
        }
    </script>