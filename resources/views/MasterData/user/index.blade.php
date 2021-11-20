@extends('layouts.v_main')
@section('title','CSIS | User')
@section('title-table', 'User')
@section('master','show')
@section('user','active')

@section('content')
<form onsubmit="return false">
    <div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="text-right" id="selected">
                <button type="button" class="btn btn-primary float-left mr-2 add" id="add" >
                  <b>Add</b>
                  <i class="fas fa-plus ml-2" ></i>
                </button>
            </div>
          <table class="table table-responsive data" class="table_id" id="table_id" >
            <thead>
              <tr>
                <th scope="col" class="action-no">No.</th>
                <th scope="col" class="list-sellerName">Name*</th>
                <th scope="col" class="list-sellerCode">Email*</th>
                <th scope="col" class="list-seller">Password*</th>
                <th scope="col" class="list-seller">Role*</th>
                <th scope="col" class="action sticky-col first-col">Action</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>

          </table>
        </div>
      </div>
    </form>

  <script>

    $(document).ready(function() {

      read()

      //  ----- freeze table -------
       jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');


    });


    function read(){
      $.get("{{ url('item_data_user') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable( {
            "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],

            "dom": '<"top"f>rt<"bottom"lp><"clear">'
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
        $.get("{{ url('add_form_user') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });
    // Tambah Data
      function store() {
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var role = $("#role").val();

        if (password != password2) {
        swal({
              type: 'warning',
              text: 'Wrong Password Confirmation',
              showCloseButton: true,
              showConfirmButton: false
            }).catch(function(timeout) { });
        } else {
          $.ajax({
            type: "get",
            url: "{{ url('store_user') }}",
            data: {
              name: name,
              email: email,
              password: password,
              role:role
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
        });

        }
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
                    url: "{{ url('destroy_user') }}/" + id,
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
        $("#item-no-"+id).hide("fast");
        $("#td-button-"+id).hide("fast");
        $("#item-no-"+id).hide("fast");
        $("#item-name-"+id).hide("fast");
        $("#item-email-"+id).hide("fast");
        $("#item-password-"+id).hide("fast");
        $("#item-role-"+id).hide("fast");
        $.get("{{ url('edit_form_user') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

     // ------ Proses Update Data ------
     function update(id) {
      var name = $("#name").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var password2 = $("#password2").val();
      var password3 = $("#password3").val();
      var role = $("#role").val();
      var id = id;

      if(
          name == "" ||
          email == "" ||
          password == "" ||
          password2 == "" ||
          password3 == "" ||
          id == "" ){

      } else {
      if (password2 != password3) {
        swal({
              type: 'warning',
              text: 'Wrong Password Confirmation',
              showCloseButton: true,
              showConfirmButton: false
            }).catch(function(timeout) { });
        } else {
          $.ajax({
              type: "get",
              url: "{{ url('update_user') }}/"+id,
              data: {
                name: name,
                email: email,
                password: password,
                password2: password3,
                role:role,
                id: id
              },
              success: function(data) {
              //  alert(data)
                if (data == 'fail email') {
                  swal({
                    type: 'warning',
                    text: 'Email already exist',
                    showCloseButton: true,
                    showConfirmButton: false
                  }).catch(function(timeout) { });
                } else if (data == 'fail password') {
                  swal({
                    type: 'warning',
                    text: 'Current password does not match! ',
                    showCloseButton: true,
                  showConfirmButton: false
                  }).catch(function(timeout) { });
                } else if(data == 'success') {
                  swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                  }).catch(function(timeout) { });
                  read();
                } else {
                  console.log(data)
                }
              }
          });
        }
      }
    }


  </script>

@endsection
