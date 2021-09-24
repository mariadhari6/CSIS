@extends('layouts.v_main')
<<<<<<< HEAD
@section('title','Gsm Active')

@section('content')

<div align="right">
  </div>
  <br>
  <div id="message"></div>

=======
@section('title','CSIS | Gsm Active')

@section('content')
<h4 class="page-title">GSM Active</h4>
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
             <div class="text-right mt-3" id="selected">
<<<<<<< HEAD
             <button type="button" class="btn btn-primary float-left mr-2 add"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
                <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
            </div>   
            <br>
            
            <div class="table-responsive">
            <table class="table table-hover data" class="table_id" id="table_id" >
=======
                <button type="button" class="btn btn-primary float-left mr-2 add add-button">
                  <b>Add</b>
                  <i class="fas fa-plus ml-2" id="add"></i>
                </button>
                <button class="btn btn-success  mr-2 edit_all"> 
                  <i class="fas fa-pen"></i>
                </button>
                <button class="btn btn-danger  delete_all">
                  <i class="fas fa-trash"></i>
                </button>
            </div>
          <table class="table table-responsive data" class="table_id" id="table_id" >
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
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
<<<<<<< HEAD
                <th scope="col" width="80px">Action</th>
                <th scope="col">Request Date</th>
                <th scope="col">Active Date</th>
                <th scope="col">Gsm Number</th></th>
                <th scope="col">Status Active</th>
                <th scope="col">Company</th>
                <th scope="col">Note</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{ csrf_field() }}
            </tbody>
          </table>
=======
                <th scope="col" class="action">Action</th>
                <th scope="col" class="list">Request Date</th>
                <th scope="col" class="list">Active Date</th>
                <th scope="col" class="list">Gsm Number</th></th>
                <th scope="col" class="list">Status Active</th>
                <th scope="col" class="list">Company</th>
                <th scope="col" class="list">Note</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>
         {{-- </div> --}}
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
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
      $.get("{{ url('item_data_GsmActive') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
<<<<<<< HEAD
        $('#table_id').DataTable().draw();

=======
        $('#table_id').dataTable( {

            "dom": '<"top"f>rt<"bottom"lp><"clear">'
            // "dom": '<lf<t>ip>'
            });
        $('#table_id').DataTable().draw();



>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
      });

    }

    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

     // ------ Tambah Form Input ------
     $('.add').click(function() {
        $.get("{{ url('add_form_GsmActive') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var request_date = $("#request_date").val();
        var active_date = $("#active_date").val();
        var gsm_pre_active_id = $("#gsm_pre_active_id").val();
        var status_active = $("#status_active").val();
        var company_id = $("#company_id").val();
        var note = $("#note").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_GsmActive') }}",
            data: {
              request_date: request_date,
              active_date: active_date,
              gsm_pre_active_id: gsm_pre_active_id,
              status_active: status_active,
              company_id: company_id,
              note:note
            },
            success: function(data) {
              swal({
                type: 'success',
                title: 'Data Saved',
                showConfirmButton: false,
                timer: 1500
<<<<<<< HEAD
              }).catch(function(timeout) { });
              read();
=======
            }).catch(function(timeout) { });
              read();

>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
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
                    url: "{{ url('destroy_GsmActive') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        swal({
<<<<<<< HEAD
                          type: 'success',
=======
                            type: 'success',
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
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
        $("#td-button-"+id).slideUp("fast");
        $("#td-checkbox-"+id).hide("fast");
        $("#item-request_date-"+id).slideUp("fast");
        $("#item-active_date-"+id).slideUp("fast");
        $("#item-gsm_pre_active_id-"+id).slideUp("fast");
        $("#item-status_active-"+id).slideUp("fast");
        $("#item-company_id-"+id).slideUp("fast");
        $("#item-note-"+id).slideUp("fast");
        $.get("{{ url('show_GsmActive') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var request_date = $("#request_date").val();
        var active_date = $("#active_date").val();
        var gsm_pre_active_id = $("#gsm_pre_active_id").val();
        var status_active = $("#status_active").val();
        var company_id = $("#company_id").val();
        var note = $("#note").val();
        var id = id;
        // console.log('test');
        $.ajax({
            type: "get",
            url: "{{ url('update_GsmActive') }}/"+id,
            data: {
              request_date: request_date,
              active_date: active_date,
<<<<<<< HEAD
              gsm_pre_active_id: gsm_pre_active_id,
=======
               gsm_pre_active_id: gsm_pre_active_id,
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
              status_active: status_active,
              company_id: company_id,
              note:note
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
<<<<<<< HEAD

=======
    // Check All
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
     $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
    });
<<<<<<< HEAD

=======
    // Delete All
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
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
                            url: "{{ url('/selectedDelete_GsmActive') }}",
                            method: "get",
                            data: {
                                id: allVals,
                                _token: _token
                            },
                            success: function(data) {
                                swal({
<<<<<<< HEAD
                                  type: 'success',
=======
                                    type: 'success',
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
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
<<<<<<< HEAD

=======
        // Edit All
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
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
<<<<<<< HEAD
                $.get("{{ url('selected') }}", {}, function(data, status) {
=======
                $.get("{{ url('selected_GsmActive') }}", {}, function(data, status) {
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-request_date-"+value).slideUp("fast");
                    $("#item-active_date-"+value).slideUp("fast");
                    $("#item-gsm_pre_active_id-"+value).slideUp("fast");
                    $("#item-status_active-"+value).slideUp("fast");
                    $("#item-company_id-"+value).slideUp("fast");
                    $("#item-note-"+value).slideUp("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_GsmActive') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
                        $("#master").prop('checked', false);
<<<<<<< HEAD
=======

>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
                    });
                });
            }else{
                alert('Select the row you want to edit')
            }
        });
<<<<<<< HEAD

=======
        // Proses Update all
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
            function updateSelected() {
            var allVals = [];

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
<<<<<<< HEAD

            swal({
=======
             swal({
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
                title: "Are you sure?",
                text: "Do you want to do an update?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: '#00FF00',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes Update',
                showLoaderOnConfirm: true,
            }).then((willDelete) => {
<<<<<<< HEAD

=======
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
                $.each(allVals, function(index, value){
                    var request_date = $(".request_date-"+value).val();
                    var active_date = $(".active_date-"+value).val();
                    var gsm_pre_active_id = $(".gsm_pre_active_id-"+value).val();
                    var status_active = $(".status_active-"+value).val();
                    var company_id = $(".company_id-"+value).val();
                    var note = $(".note-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_GsmActive') }}/"+value,
                    data: {
                        request_date: request_date,
                        active_date: active_date,
                        gsm_pre_active_id: gsm_pre_active_id,
                        status_active: status_active,
                        company_id: company_id,
                        note:note
                    },
                    success: function(data) {
                    swal({
<<<<<<< HEAD
                      type: 'success',
                                    title: 'The selected data has been updated',
                                    showConfirmButton: false,
                                    timer: 1500
                                // $(".save").hide();
                                });
                                read();
=======
                                    type: 'success',
                                    title: 'The selected data has been updated',
                                    showConfirmButton: false,
                                    timer: 1500

                                // $(".save").hide();
                                });
                                read();

>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
                                $(".add").show("fast");
                                $(".edit_all").show("fast");
                                $(".delete_all").show("fast");
                                $(".btn-round").hide("fast");
                                $(".btn-round").hide("fast");

<<<<<<< HEAD
                    }
                    });
                });
            });


        }
        function batal(){
            $(".save").hide("fast");
            $(".cancel").hide("fast");
            $(".add").show("fast");
            $(".edit_all").show("fast");
            $(".delete_all").show("fast");
            read();
            }
=======

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

>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e


  </script>

   @endsection
