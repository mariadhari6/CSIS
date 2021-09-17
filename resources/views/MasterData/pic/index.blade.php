@extends('layouts.v_main')
@section('title','PIC Company')

@section('content')

<h4 class="page-title">PIC</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="text-right mt-3" id="selected">
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
            <thead>
              <tr>
                <th>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th scope="col" class="action">Action</th>
                <th scope="col" class="list">Company</th>
                <th scope="col" class="list">Pic Name</th>
                <th scope="col" class="list">Phone</th>
                <th scope="col" class="list">Email</th>
                <th scope="col" class="list">Position</th>
                <th scope="col" class="list">Date of birth</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>
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
      $.get("{{ url('item_data_pic') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable( {

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
        $.get("{{ url('add_form_pic') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var company_id = $("#company_id").val();
        var pic_name = $("#pic_name").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var position = $("#position").val();
        var date_of_birth = $("#date_of_birth").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_pic') }}",
            data: {
              company_id: company_id,
              pic_name: pic_name,
              phone: phone,
              email: email,
              position: position,
              date_of_birth:date_of_birth
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
                    url: "{{ url('destroy_pic') }}/" + id,
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
        $("#td-button-"+id).slideUp("fast");
        $("#td-checkbox-"+id).hide("fast");
        $("#item-company_id-"+id).slideUp("fast");
        $("#item-pic_name-"+id).slideUp("fast");
        $("#item-phone-"+id).slideUp("fast");
        $("#item-email-"+id).slideUp("fast");
        $("#item-position-"+id).slideUp("fast");
        $("#item-date_of_birth-"+id).slideUp("fast");
        $.get("{{ url('show_pic') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var company_id = $("#company_id").val();
        var pic_name = $("#pic_name").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var position = $("#position").val();
        var date_of_birth = $("#date_of_birth").val();
        var id = id;
        // console.log('test');
        $.ajax({
            type: "get",
            url: "{{ url('update_pic') }}/"+id,
            data: {
             company_id: company_id,
              pic_name: pic_name,
              phone: phone,
              email: email,
              position: position,
             date_of_birth:date_of_birth
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

     $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
    });

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
                            url: "{{ url('/selectedDelete_pic') }}",
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
                    $("#item-company_id-"+value).slideUp("fast");
                    $("#item-pic_name-"+value).slideUp("fast");
                    $("#item-phone-"+value).slideUp("fast");
                    $("#item-email-"+value).slideUp("fast");
                    $("#item-position-"+value).slideUp("fast");
                    $("#item-date_of_birth-"+value).slideUp("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_pic') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
                        $("#master").prop('checked', false);

                    });
                });
            }else{
                alert('Select the row you want to edit')
            }
        });

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
                    var company_id = $(".company_id-"+value).val();
                    var pic_name = $(".pic_name-"+value).val();
                    var phone = $(".phone-"+value).val();
                    var email = $(".email-"+value).val();
                    var position = $(".position-"+value).val();
                    var date_of_birth = $(".date_of_birth-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_pic') }}/"+value,
                    data: {
                        company_id: company_id,
                        pic_name: pic_name,
                        phone: phone,
                        email: email,
                        position: position,
                        date_of_birth:date_of_birth
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
        function batal(){
            $(".save").hide("fast");
            $(".cancel").hide("fast");
            $(".add").show("fast");
            $(".edit_all").show("fast");
            $(".delete_all").show("fast");
            read();
            }


  </script>

   @endsection
