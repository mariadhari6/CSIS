@extends('layouts.v_main')
@section('title','Tes')

@section('content')

<div align="right">
  </div>
  <br>
  <div id="message"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right">
                <button type="button" name="add" id="add" class="btn btn-primary btn-round btn-xs"><i class="fas fa-plus"></i> Add</button>
            </div>
            <div class="text-right mt-3">
                <button class="btn btn-success btn-round mr-2 edit_all">Edit Selected</button>
                <button class="btn btn-danger btn-round delete_all">Delete Selected</button>
            </div>
            <br>

          <table class="table table-hover data" class="table_id" id="table_id" >
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
                <th scope="col">Action</th>
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
  </div>



  <script>
    $(document).ready(function() {

      read()

    });


    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data') }}", {}, function(data, status) {
        $("#item_data").html(data);
        $('#table_id').DataTable();

      });

    }

    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }


    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }


     // ------ Tambah Form Input ------
     $('#add').click(function() {
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
        $("#td-button-"+id).slideUp("fast");
        $("#item-FirstName-"+id).slideUp("fast");
        $("#item-LastName-"+id).slideUp("fast");
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
                read()
                }


            });
        }


        // checkbox all
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".task-select").prop('checked', true);

         } else {
            $(".task-select").prop('checked',false);

         }

        });

         // Delete All

        $('.delete_all').on('click', function(event){
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
                            method: "GET",
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


        $('.edit_all').on('click', function(event){
            event.preventDefault();

            var allVals = [];

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));

            });

            alert(allVals);

            $("#td-button-"+id).slideUp("fast");
        $("#item-FirstName-"+id).slideUp("fast");
        $("#item-LastName-"+id).slideUp("fast");


        })




  </script>
   @endsection
