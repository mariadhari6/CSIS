@extends('layouts.v_main')
@section('title','CSIS | Gps')


@section('content')

<h4 class="page-title">GPS</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="text-right mt-3" id="selected">
              <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
              <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-pen"></i></button>
              <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
          </div>
          <table class="table table-responsive data" class="table_id" id="table_id" >
            <thead>
              <tr>
                <th width="10px">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th scope="col" class="action">No.</th>
                <th scope="col" class="list" >Merk</th>
                <th scope="col" class="list" >Type</th>
                <th scope="col" class="list" >IMEI</th>
                <th scope="col" class="list" >Waranty</th>
                <th scope="col" class="list" >Po Date</th>
                <th scope="col" class="list" >Status</th>
                <th scope="col" class="list" >Status Ownership</th>
                <th scope="col" class="action">Action</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>
        {{-- </div> --}}
        </div>
      </div>
    </div>
  </div>



  <script>
    $(document).ready(function() {
      read()
    });
    // ------ Tampil Data ------
    function read(){

      $.get("{{ url('item_data_gps') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable( {

            "dom": '<"top"f>rt<"bottom"lp><"clear">'
            // "dom": '<lf<t>ip>'
            });
        $('#table_id').DataTable().draw();
      });
    }
    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }
     // ------ Tambah Form Input ------
     $('.add').click(function() {
        $.get("{{ url('add_form_gps') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });
    // ----- Proses Tambah data ------
    function store() {
        var merk = $("#merk").val();
        var type = $("#type").val();
        var imei = $("#imei").val();
        var waranty = $("#waranty").val();
        var po_date = $("#po_date").val();
        var status = $("#status").val();
        var status_ownership = $("#status_ownership").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_gps') }}",
            data: {
              merk: merk,
              type: type,
              imei: imei,
              waranty: waranty,
              po_date: po_date,
              status: status,
              status_ownership: status_ownership
            },
            success: function(data) {
              swal({
                type: 'success',
                title: 'Data Saved',
                showConfirmButton: false,
                timer: 1500
            }).catch(function(timeout) { });
              read();

            }
        })
    }
    // -----Proses Delete Data ------
    function destroy(id) {
        var id = id;
        swal({
            title: 'Are you sure?',
            text: "You want delete to this data!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes Delete',
            showLoaderOnConfirm: true,
            preConfirm: function() {
              return new Promise(function(resolve) {
                $.ajax({
                    type: "get",
                    url: "{{ url('destroy_gps') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Deleted',
                            showConfirmButton: false,
                            timer: 1500
                        }).catch(function(timeout) { });
                        read();
                    }
                });

              });
            },
            allowOutsideClick: false
      });
    }
    // ------ Edit Form Data ------
    function edit(id){
        var id = id;
        $("#td-checkbox-"+id).hide("fast");
        $("#td-button-"+id).hide("fast");
        $("#item-merk-"+id).hide("fast");
        $("#item-no-"+id).hide("fast");
        $("#item-type-"+id).hide("fast");
        $("#item-imei-"+id).hide("fast");
        $("#item-waranty-"+id).hide("fast");
        $("#item-po_date-"+id).hide("fast");
        $("#item-status-"+id).hide("fast");
        $("#item-status_ownership-"+id).hide("fast");
        $.get("{{ url('show_gps') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {
            var merk = $("#merk").val();
            var type = $("#type").val();
            var imei = $("#imei").val();
            var waranty = $("#waranty").val();
            var po_date = $("#po_date").val();
            var status = $("#status").val();
            var status_ownership = $("#status_ownership").val();
            var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update_gps') }}/"+id,
                data: {
                merk: merk,
                type:type,
                imei: imei,
                waranty: waranty,
                po_date: po_date,
                status:status,
                status_ownership:status_ownership
                },
                success: function(data) {
                swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { });
                read();

                }
            });
        }
        // checkbox all
        $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
        });
         // Delete All
        $('.delete_all').on('click', function(){
          event.preventDefault();
            var allVals = [];
            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
                if (allVals.length > 0) {
                    var _token = $('input[name="_token"]').val();
                    // alert(allVals);
                    swal({
                    title: 'Are you sure?',
                    text: "You want delete Selected data !",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes Delete',
                    showLoaderOnConfirm: true,
                    preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                            url: "{{ url('/selectedDelete_gps') }}",
                            method: "get",
                            data: {
                                id: allVals,
                                _token: _token
                            },
                            success: function(data) {
                               swal({
                                    type: 'success',
                                    title: 'The selected data has been deleted',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).catch(function(timeout) { });
                                $("#master").prop('checked', false);
                                read();
                            }
                            });
                    });
                    },
                    allowOutsideClick: false
                });
            }else{
                alert('Select the row you want to delete')
            }
        });

        // Form Edit All
        $('.edit_all').on('click', function(e){

            var allVals = [];
            var _token = $('input[name="_token"]').val();

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
            if (allVals.length > 0){
                // alert(allVals);
                $(".edit_all").hide("fast");
                $(".delete_all").hide("fast");
                $.get("{{ url('selected_gps') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-merk-"+value).hide("fast");
                    $("#item-no-"+value).hide("fast");
                    $("#item-type-"+value).hide("fast");
                    $("#item-imei-"+value).hide("fast");
                    $("#item-waranty-"+value).hide("fast");
                    $("#item-po_date-"+value).hide("fast");
                    $("#item-status-"+value).hide("fast");
                    $("#item-status_ownership-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_gps') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
                        $("#master").prop('checked', false);

                    });
                });
            }else{
                alert('Select the row you want to edit')
            }
        });

        // ------ Proses Update Data ------
        function updateSelected() {
            var allVals = [];

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
            swal({
                title: "Are you sure?",
                text: "Do you want to do an update?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: '#00FF00',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes Update',
                showLoaderOnConfirm: true,
            }).then((willDelete) => {
                $.each(allVals, function(index, value){
                    var merk = $(".merk-"+value).val();
                    var type = $(".type-"+value).val();
                    var imei = $(".imei-"+value).val();
                    var waranty = $(".waranty-"+value).val();
                    var po_date = $(".po_date-"+value).val();
                    var status = $(".status-"+value).val();
                    var status_ownership = $(".status_ownership-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_gps') }}/"+value,
                    data: {
                     merk: merk,
                    type:type,
                    imei: imei,
                    waranty: waranty,
                    po_date: po_date,
                    status:status,
                    status_ownership:status_ownership
                    },
                    success: function(data) {
                            swal({
                                    type: 'success',
                                    title: 'The selected data has been updated',
                                    showConfirmButton: false,
                                    timer: 1500
                                // $(".save").hide();
                                });
                                read();

                                $(".add").show("fast");
                                $(".edit_all").show("fast");
                                $(".delete_all").show("fast");
                                $(".btn-round").hide("fast");
                                $(".btn-round").hide("fast");


                            }
                         });
                    });
                });
        }

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
   @endsection

