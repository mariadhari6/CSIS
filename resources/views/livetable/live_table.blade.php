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
                <button type="button" name="add" id="add" class="btn btn-primary btn-round btn-xs   "><i class="fas fa-plus"></i> Add</button>
            </div>
            <br>
            <table class="table table-hover data" class="table_id" id="table_id" >
            <thead>
              <tr>
                <th>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input select-all-checkbox" type="checkbox" data-select="checkbox" data-target=".task-select">
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
              read()
            }
        })
    }

      // hapus data
      $(document).on('click', '.delete', function(event) {
        event.preventDefault();

        var id = $(this).attr("id");
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
                      url: "{{ route('livetable.delete_data') }}",
                      method: "POST",
                      data: {
                        id: id,
                        _token: _token
                      },
                      success: function(data) {
                        swal("Done!","It was succesfully deleted!","success");
                        fetch_data();
                      }
                    });
              });
            },
            allowOutsideClick: false
      });

      });


    // -----Proses Delete Data ------
    function destroy(id) {
        var id = id;
        confirm("Delete ?");
        $.ajax({
            type: "get",
            url: "{{ url('destroy') }}/" + id,
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
        })
    }

    });

  </script>

   @endsection
