@extends('layouts.v_main')
@section('title','Tes')

@section('content')

<div align="right">
    <a class="btn btn-secondary  mr-2" href="{{ route('export') }}"><i class="fas fa-file-excel mr-2"></i>Export</a>
</div>
  <br>
  <div id="message"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
                <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
            </div>


          <table class="table table-hover data" class="table_id" id="table_id" >
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
                <th scope="col" width="80px">Action</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>

      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      read();



    });
    // ------ Tampil Data ------
    function read(){

      $.get("{{ url('item_data') }}", {}, function(data, status) {
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
        $.get("{{ url('add_form') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);

        });
      });
    // ----- Proses Tambah data ------
    function store() {
        var FirstName = $("#FirstName").val();
        var LastName = $("#LastName").val();
        $.ajax({
            type: "get",
            url: "{{ url('store') }}",
            data: {
              FirstName: FirstName,
              LastName: LastName
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
                    url: "{{ url('destroy') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        // swal("Done!","It was succesfully deleted!","success");
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
        $("#item-FirstName-"+id).hide("fast");
        $("#item-LastName-"+id).hide("fast");
        $.get("{{ url('show') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {
            var FirstName = $("#FirstName").val();
            var LastName = $("#LastName").val();
            var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update') }}/"+id,
                data: {
                FirstName: FirstName,
                LastName: LastName
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
          if($(this).is(':checked',true) ){
                $(".task-select").prop('checked', true)
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
                            url: "{{ route('livetable.delete_all') }}",
                            method: "get",
                            data: {
                                id: allVals,
                                _token: _token
                            },
                            success: function(data) {
                                // swal("Done!","It was succesfully deleted!","success");
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
                $.get("{{ url('selected') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-FirstName-"+value).hide("fast");
                    $("#item-LastName-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
                        $("#master").prop('checked', false);
                    });
                });
            }else{
                alert('Select the row you want to edit')
            }
        });


        // --- Proses Update Multiple ---
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
                    var FirstName = $(".FirstName-"+value).val();
                    var LastName = $(".LastName-"+value).val();
                    $.ajax({
                        type: "get",
                        url: "{{ url('update') }}/"+value,
                        data: {
                        FirstName: FirstName,
                        LastName: LastName
                        },
                        success: function(data) {
                                // swal("Done!","It was succesfully Update","success");
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
