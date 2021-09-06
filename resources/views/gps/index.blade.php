@extends('layouts.v_main')
@section('title','Gps')

<<<<<<< HEAD

=======
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
@section('content')

<div align="right">
  </div>
  <br>
  <div id="message"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
<<<<<<< HEAD
            <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary btn-round mr-2 add"><i class="fas fa-plus" id="add"></i></button>
                <button class="btn btn-success btn-round mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger btn-round delete_all"><i class="fas fa-trash"></i></button>
=======
            <div class="text-right">
                <button type="button" name="add" id="add" class="btn btn-primary btn-round btn-xs   "><i class="fas fa-plus"></i> Add</button>
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
            </div>
            <br>

          <table class="table table-hover data" class="table_id" id="table_id" >
            <thead>
              <tr>
<<<<<<< HEAD
                <th>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
=======
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
                <th scope="col">Action</th>
                <th scope="col">Merk</th>
                <th scope="col">Type</th>
                <th scope="col">IMEI</th>
                <th scope="col">Waranty</th>
<<<<<<< HEAD
                <th scope="col">Po Date</th>
=======
                <th scope="col">PO Date</th>
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>
<<<<<<< HEAD

=======
        </div>
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
      </div>
    </div>
  </div>

<<<<<<< HEAD


  <script>
    $(document).ready(function() {
      read()
    });
    // ------ Tampil Data ------
    function read(){

      $.get("{{ url('item_data_gps') }}", {}, function(data, status) {
        $("#item_data").html(data);
        $('#table_id').DataTable();
      });
    }
=======
  <script>
    $(document).ready(function() {

      read()

    });


    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data_gps') }}", {}, function(data, status) {
        $("#item_data").html(data);
        $('#table_id').DataTable();

      });

    }

>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

     // ------ Tambah Form Input ------
     $('#add').click(function() {
        $.get("{{ url('add_form_gps') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });
<<<<<<< HEAD
=======

>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
    // ----- Proses Tambah data ------
    function store() {
        var merk = $("#merk").val();
        var type = $("#type").val();
        var imei = $("#imei").val();
        var waranty = $("#waranty").val();
        var po_date = $("#po_date").val();
        var status = $("#status").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_gps') }}",
            data: {
              merk: merk,
<<<<<<< HEAD
              type:type,
              imei: imei,
              waranty: waranty,
              po_date: po_date,
              status:status
            },
            success: function(data) {
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
                        swal("Done!","It was succesfully deleted!","success");
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
        $("#item-type-"+id).hide("fast");
        $("#item-imei-"+id).hide("fast");
        $("#item-waranty-"+id).hide("fast");
        $("#item-po_date-"+id).hide("fast");
        $("#item-status-"+id).hide("fast");
=======
              type: type,
              imei: imei,
              waranty: waranty,
              po_date: po_date,
              status: status
            },
            success: function(data) {
              read()
            }
        })
    }



    // -----Proses Delete Data ------
    function destroy(id) {
        var id = id;
        confirm("Delete ?");
        $.ajax({
            type: "get",
            url: "{{ url('destroy_gps') }}/" + id,
            data: "id=" + id,
            success: function(data) {
              read()
            }
        })
    }

    // ------ Edit Form Data ------
    function edit(id){
        var id = id;
        $("#td-button-"+id).slideUp("fast");
        $("#item-merk-"+id).slideUp("fast");
        $("#item-type-"+id).slideUp("fast");
        $("#item-imei-"+id).slideUp("fast");
        $("#item-waranty-"+id).slideUp("fast");
        $("#item-po_date-"+id).slideUp("fast");
        $("#item-status-"+id).slideUp("fast");
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
        $.get("{{ url('show_gps') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
<<<<<<< HEAD
    // ------ Proses Update Data ------
        function update(id) {
            var merk = $("#merk").val();
            var type = $("#type").val();
            var imei = $("#imei").val();
            var waranty = $("#waranty").val();
            var po_date = $("#po_date").val();
            var status = $("#status").val();
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
                status:status
                },
                success: function(data) {
                read()
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
                                swal("Done!","It was succesfully deleted!","success");
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
                $.get("{{ url('selected') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-merk-"+value).hide("fast");
                    $("#item-type-"+value).hide("fast");
                    $("#item-imei-"+value).hide("fast");
                    $("#item-waranty-"+value).hide("fast");
                    $("#item-po_date-"+value).hide("fast");
                    $("#item-status-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_gps') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
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

                $.each(allVals, function(index, value){
                    var merk = $(".merk-"+value).val();
                    var type = $(".type-"+value).val();
                    var imei = $(".imei-"+value).val();
                    var waranty = $(".waranty-"+value).val();
                    var po_date = $(".po_date-"+value).val();
                    var status = $(".status-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_gps') }}/"+value,
                    data: {
                     merk: merk,
                    type:type,
                    imei: imei,
                    waranty: waranty,
                    po_date: po_date,
                    status:status
                    },
                    success: function(data) {
                    read()
                    }
                });
            });


        }

        //--------Proses Batal--------
        function cancel(){
            read();
        }




  </script>
   @endsection

=======

    // ------ Proses Update Data ------
    function update(id) {
        var merk = $("#merk").val();
        var type = $("#type").val();
        var imei = $("#imei").val();
        var waranty = $("#waranty").val();
        var po_date = $("#po_date").val();
        var status = $("#status").val();
        var id = id;
        $.ajax({
            type: "get",
            url: "{{ url('update_gps') }}/"+id,
            data: {
              merk: merk,
              type: type,
              imei: imei,
              waranty: waranty,
              po_date: po_date,
              status: status
            },
            success: function(data) {
              read()
            }
        })
    }


  </script>

   @endsection
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
