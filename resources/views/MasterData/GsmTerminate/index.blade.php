@extends('layouts.v_main')
@section('title','Gsm Terminate')

@section('content')
<<<<<<< HEAD
<h4 class="page-title">GSM Terminate</h4>
=======

<div align="right">
  </div>
  <br>
  <div id="message"></div>

>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
<<<<<<< HEAD
          <div class="text-right mt-3" id="selected">
            <button type="button" class="btn btn-primary float-left mr-2 add add-button" id="add">
              <b>Add</b>
              <i class="fas fa-plus ml-2" ></i>
            </button>
            <button class="btn btn-success  mr-2 edit_all"> 
              <i class="fas fa-pen"></i>
            </button>
            <button class="btn btn-danger  delete_all">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <table class="table table-responsive data" class="table_id" id="table_id" >
=======
             <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary float-left mr-2 add"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
                <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
            </div>
            <br>

          <table class="table table-hover data" class="table_id" id="table_id" >
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
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
                <th scope="col" class="action">Action</th>
                <th scope="col" class="list">Request Date</th>
                <th scope="col" class="list">Terminate Date</th>
                <th scope="col" class="list">Gsm Number</th></th>
                <th scope="col" class="list">Status Active</th>
                <th scope="col" class="list">Company</th>
                <th scope="col" class="list">Note</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
=======
                <th scope="col">Action</th>
                <th scope="col">Request Date</th>
                <th scope="col">Terminate Date</th>
                <th scope="col">Gsm Number</th></th>
                <th scope="col">Status Active</th>
                <th scope="col">Company</th>
                <th scope="col">Note</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{ csrf_field() }}
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {

<<<<<<< HEAD
      read();
=======
      read()
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131

    });


    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data_GsmTerminate') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
<<<<<<< HEAD
        $('#table_id').dataTable( {

            "dom": '<"top"f>rt<"bottom"lp><"clear">'
            // "dom": '<lf<t>ip>'
            });
=======
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
        $('#table_id').DataTable().draw();
      });

    }

    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

<<<<<<< HEAD

     // ------ Tambah Form Input ------
     $('#add').click(function() {
=======
     // ------ Tambah Form Input ------
     $('.add').click(function() {
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
        $.get("{{ url('add_form_GsmTerminate') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });
<<<<<<< HEAD
=======

>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
    // ----- Proses Tambah data ------
    function store() {
        var gsm_active_id = $("#gsm_active_id").val();
        var request_date = $("#request_date").val();
<<<<<<< HEAD
        var terminate_date = $("#terminate_date").val();
        var status_active = $("#status_active").val();
        var company_id = $("#company_id").val();
        var note = $("#note").val();
        // alert(request_date)
=======
        var active_date = $("#active_date").val();
        var status_active = $("#status_active").val();
        var company_id = $("#company_id").val();
        var note = $("#note").val();
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
        $.ajax({
            type: "get",
            url: "{{ url('store_GsmTerminate') }}",
            data: {
              gsm_active_id: gsm_active_id,
              request_date: request_date,
<<<<<<< HEAD
              terminate_date: terminate_date,
=======
              active_date: active_date,
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
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
            }).catch(function(timeout) { });
              read();
            }
        })
    }
<<<<<<< HEAD
=======



>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
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
                    url: "{{ url('destroy_GsmTerminate') }}/" + id,
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
<<<<<<< HEAD
=======

>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
              });
            },
            allowOutsideClick: false
      });
    }
<<<<<<< HEAD
=======

>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
    // ------ Edit Form Data ------
    function edit(id){
        var id = id;
        $("#td-button-"+id).slideUp("fast");
        $("#td-checkbox-"+id).hide("fast");
        $("#item-gsm_active_id-"+id).slideUp("fast");
        $("#item-request_date-"+id).slideUp("fast");
<<<<<<< HEAD
        $("#item-terminate_date-"+id).slideUp("fast");
=======
        $("#item-active_date-"+id).slideUp("fast");
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
        $("#item-status_active-"+id).slideUp("fast");
        $("#item-company_id-"+id).slideUp("fast");
        $("#item-note-"+id).slideUp("fast");
        $.get("{{ url('show_GsmTerminate') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
<<<<<<< HEAD
        var gsm_active_id =$('select[name="gsm_active_id"]').val();
        var request_date = $("#request_date").val();
        var terminate_date = $("#terminate_date").val();
=======
        var gsm_active_id = $("#gsm_active_id").val();
        var request_date = $("#request_date").val();
        var active_date = $("#active_date").val();
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
        var status_active = $("#status_active").val();
        var company_id = $("#company_id").val();
        var note = $("#note").val();
        var id = id;
<<<<<<< HEAD
        // alert(company_id);
=======
        // console.log('test');
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
        $.ajax({
            type: "get",
            url: "{{ url('update_GsmTerminate') }}/"+id,
            data: {
               gsm_active_id: gsm_active_id,
              request_date: request_date,
<<<<<<< HEAD
              terminate_date: terminate_date,
=======
              active_date: active_date,
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
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
        })
    }

<<<<<<< HEAD
    // Check all
=======
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
     $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
    });

<<<<<<< HEAD
    // Delete All
=======
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
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
                            url: "{{ url('/selectedDelete_GsmTerminate') }}",
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

<<<<<<< HEAD
        // Edit All
        $('.edit_all').on('click', function(e){
            var allVals = [];
            var _token = $('input[name="_token"]').val();
=======
        $('.edit_all').on('click', function(e){

            var allVals = [];
            var _token = $('input[name="_token"]').val();

>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
            if (allVals.length > 0){
                // alert(allVals);
                $(".edit_all").hide("fast");
                $(".delete_all").hide("fast");
<<<<<<< HEAD
                $.get("{{ url('selected_GsmTerminate') }}", {}, function(data, status) {
=======
                $.get("{{ url('selected') }}", {}, function(data, status) {
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-gsm_active_id-"+value).slideUp("fast");
                    $("#item-request_date-"+value).slideUp("fast");
<<<<<<< HEAD
                    $("#item-terminate_date-"+value).slideUp("fast");
=======
                    $("#item-active_date-"+value).slideUp("fast");
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
                    $("#item-status_active-"+value).slideUp("fast");
                    $("#item-company_id-"+value).slideUp("fast");
                    $("#item-note-"+value).slideUp("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_GsmTerminate') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
                        $("#master").prop('checked', false);
<<<<<<< HEAD
=======

>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
                    });
                });
            }else{
                alert('Select the row you want to edit')
            }
        });

<<<<<<< HEAD
        // Proses Edit All
            function updateSelected() {
            var allVals = [];
=======
            function updateSelected() {
            var allVals = [];

>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
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
                    var gsm_active_id = $(".gsm_active_id-"+value).val();
                    var request_date = $(".request_date-"+value).val();
<<<<<<< HEAD
                    var terminate_date = $(".terminate_date-"+value).val();
=======
                    var active_date = $(".active_date-"+value).val();
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
                    var status_active = $(".status_active-"+value).val();
                    var company_id = $(".company_id-"+value).val();
                    var note = $(".note-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_GsmTerminate') }}/"+value,
                    data: {
                        gsm_active_id: gsm_active_id,
                        request_date: request_date,
<<<<<<< HEAD
                        terminate_date: terminate_date,
=======
                        active_date: active_date,
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
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
=======
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

        function batal(){
            $(".save").hide("fast");
            $(".cancel").hide("fast");
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
            $(".add").show("fast");
            $(".edit_all").show("fast");
            $(".delete_all").show("fast");
            read();
        }

<<<<<<< HEAD
=======


>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
  </script>

   @endsection
